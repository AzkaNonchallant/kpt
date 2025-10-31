<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <!-- <h5 class="m-b-10">Data Barang Masuk</h5> -->
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Laporan Barang Stok</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <div class="main-body">
          <div class="page-wrapper">
            <!-- [ Main Content ] start -->
            <div class="row">
              <!-- [ basic-table ] start -->
              <div class="col-xl-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Data Barang Stok</h5>
                    <div class="float-right">
                      <div class="input-group">
                        <select class="form-control chosen-select" id="filter_barang" name="filter_barang">
                          <?php
                          foreach ($res_barang as $rb) { ?>
                            <option <?= $id_barang === $rb['id_barang'] ? 'selected' : '' ?> value="<?= $rb['id_barang'] ?>">
                              <?= $rb['nama_barang'] ?>
                            </option>
                          <?php } ?>
                        </select>
                        <div class="input-group-append">
                          <button class="btn btn-secondary" id="lihat" type="button">Lihat</button>
                          <button class="btn btn-primary" id="export" type="button">Cetak</button>
                          <a href="<?= base_url() ?>gudang/gudang_barang/barang_stok/laporan_barang_stok" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="card-block table-border-style">

                      <?php
                      // print_r($result);
                      ?>
                      <div class="table-responsive">
                        <table class="table datatable table-hover table-striped table-sm">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Nama Barang</th>
                              <th>Nama Supplier</th>
                              <th class="text-center">Stok</th>
                              <th class="text-center">Rincian</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $k) {
                            ?>
                              <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $k['nama_barang'] ?></td>
                                <td><?= $k['nama_supplier'] ?></td>
                                <td style="text-align: center;"> <?= number_format($k['stok_akhir'] ?? 0, 0, ",", ".") ?> <?= $k['satuan'] ?? '' ?></td>

                                <td>
                                  <div class="text-center">
                                    <div class="btn-group " role="group" aria-label="Basic example">
                                      <button type="button"
                                        class="btn btn-info btn-square btn-sm btn-rincian"
                                        data-nama-barang="<?= $k['nama_barang'] ?>"
                                        data-toggle="modal"
                                        data-target="#detail">
                                        <i class="feather icon-eye"></i> Rincian
                                      </button>
                                    </div>
                                </td>
                              </tr>
                            <?php
                            }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- [ basic-table ] end -->

              </div>
              <!-- [ Main Content ] end -->
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<script type="text/javascript">
  $(document).ready(function() {
    $('#lihat').click(function() {

      var filter_barang = $('#filter_barang').find(':selected').val();

      const query = new URLSearchParams({
        id_barang: filter_barang,
      })

      window.location = "<?= base_url() ?>gudang/gudang_barang/barang_stok/laporan_barang_stok/index?" + query.toString()
    })
    $('#export').click(function() {

      var filter_batch = $('#filter_batch').find(':selected').val();
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();

      var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
      var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];

      if (filter_tgl == '' && filter_tgl2 != '') {
        window.location = "<?= base_url() ?>Laporan_barang_masuk?alert=warning&msg=dari tanggal belum diisi";
        alert("dari tanggal belum diisi")
      } else if (filter_tgl != '' && filter_tgl2 == '') {
        window.location = "<?= base_url() ?>Laporan_barang_masuk?alert=warning&msg=sampai tanggal belum diisi";
      } else {
        const query = new URLSearchParams({
          batch: filter_batch,
          date_from: filter_tgl,
          date_until: filter_tgl2
        })
        var url = "<?= base_url() ?>Laporan_barang_masuk/pdf_laporan_barang_masuk?" + query.toString();
        window.open(url, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    })
  })
</script>

<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailLabel">Rincian Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>No PO</th>
              <th>Tanggal Masuk</th>
              <th>Kode Tf In</th>
              <th>Nama Barang</th>
              <th>No Batch</th>
              <th>Tanggal Expired</th>
              <th>Jenis transaksi Gudang</th>
              <th>Jumlah Stok</th>
              <th>Satuan</th>
            </tr>
          </thead>
          <tbody id="detail-body">
            <tr>
              <td colspan="5" class="text-center">Memuat data...</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function() {

    $('.btn-rincian').on('click', function() {
      let nama_barang = $(this).data('nama-barang');
      $('#detailLabel').text('Rincian Barang: ' + nama_barang);
      $('#detail-body').html('<tr><td colspan="5" class="text-center">Memuat data...</td></tr>');

      $.ajax({
        url: "<?= base_url('gudang/gudang_barang/barang_stok/laporan_barang_stok/get_rincian_barang') ?>",
        type: "POST",
        data: {
          nama_barang: nama_barang
        },
        dataType: "json",
        success: function(res) {
          if (res.length > 0) {
            let rows = '';
            $.each(res, function(i, item) {
              rows += `
              <tr>
          <td>${i+1}</td>
          <td>${item.no_po || '-'}</td>
          <td>${item.tgl_masuk || '-'}</td>
          <td>${item.kode_tf_in || '-'}</td>
          <td>${item.nama_barang || '-'}</td>
          <td>${item.no_batch || '-'}</td>
          <td>${item.tgl_exp || '-'}</td>
          <td>${item.jumlah_out || '-'}</td>
          <td>${Number(item.stok_akhir || 0).toLocaleString('id-ID')}</td>
          <td>${item.satuan || '-'}</td>
              </tr>`;
            });
            $('#detail-body').html(rows);
          } else {
            $('#detail-body').html('<tr><td colspan="5" class="text-center">Tidak ada data</td></tr>');
          }
        },
        error: function() {
          $('#detail-body').html('<tr><td colspan="5" class="text-center text-danger">Gagal memuat data</td></tr>');
        }
      });
    });

  });
</script>