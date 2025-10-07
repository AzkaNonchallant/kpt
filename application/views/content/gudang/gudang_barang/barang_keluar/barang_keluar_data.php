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
                  <!-- <h5 class="m-b-10">Data Barang Keluar</h5> -->
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Barang Keluar</a></li>
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
                    <h5>Data Barang Keluar</h5>
                    <div class="float-right">
                      <div class="input-group">
                        <select class="form-control chosen-select" id="filter_sppb" name="filter_sppb">
                          <option value="" disabled selected hidden>- NO SPPB -</option>
                          <?php
                          foreach ($res_sppb as $ns) { ?>
                            <option <?= $no_sppb === $ns['no_sppb'] ? 'selected' : '' ?> value="<?= $ns['no_sppb'] ?>"><?= $ns['no_sppb'] ?></option>
                          <?php } ?>
                        </select>
                        <select class="form-control chosen-select" id="filter_customer" name="filter_customer">
                          <option value="" disabled selected hidden>- Nama Customer -</option>
                          <?php
                          foreach ($res_customer as $rc) { ?>
                            <option <?= $nama_customer === $rc['nama_customer'] ? 'selected' : '' ?> value="<?= $rc['nama_customer'] ?>"><?= $rc['nama_customer'] ?></option>
                          <?php } ?>
                        </select>
                        <input type="text" id="filter_tgl" value="<?= $tgl == null ? '' : $tgl ?>" class="form-control datepicker" placeholder="Dari Tanggal" aria-label="Recipient's username" aria-describedby="basic-addon2" autocomplete="off">
                        <input type="text" id="filter_tgl2" value="<?= $tgl2 == null ? '' : $tgl2 ?>" class="form-control datepicker" placeholder="Sampai Tanggal" aria-label="Recipient's username" aria-describedby="basic-addon2" autocomplete="off">
                        <div class="input-group-append">
                          <button class="btn btn-secondary" id="lihat" type="button">Lihat</button>
                          <button class="btn btn-primary" id="export" type="button">Cetak</button>
                          <a href="<?= base_url() ?>gudang/gudang_barang/barang_keluar/barang_keluar" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
                        </div>
                      </div>
                      <!-- Button trigger modal -->
                      <!-- <button type="button" class="btn btn-primary float-right btn-sm mt-3" data-toggle="modal" data-target="#Add">
                        <i class="feather icon-plus"></i>Tambah Produk Keluar
                      </button> -->
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
                            <th>Tanggal Kirim</th>
                            <th>No SPPB</th>
                            <th>No Surat Jalan</th>
                            <th>Nama Customer</th>
                            <th>Detail</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('level');
                          $no = 1;
                          foreach ($result as $k) :
                            $tgl_kirim = explode('-', $k['tgl_kirim'])[2]."/".explode('-', $k['tgl_kirim'])[1]."/".explode('-', $k['tgl_kirim'])[0];
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $tgl_kirim ?></td>
                              <td><?= $k['no_sppb'] ?></td>
                              <td><?= $k['no_surat_jalan'] ?></td>
                              <td><?= $k['nama_customer'] ?></td>
                              <td class="text-right">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button"
                                    class="btn btn-info btn-square btn-sm"
                                    data-toggle="modal"
                                    data-target="#view"
                                    data-id_barang_keluar="<?= $k['id_barang_keluar'] ?>"
                                    data-kode_tf_out="<?= $k['kode_tf_out'] ?>"
                                    data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>"
                                    data-id_customer="<?= $k['id_customer'] ?>"
                                    data-nama_customer="<?= $k['nama_customer'] ?>"
                                    data-id_barang="<?= $k['id_barang'] ?>"
                                    data-nama_barang="<?= $k['nama_barang'] ?>"
                                    data-id_mkt_sppb="<?= $k['id_mkt_sppb'] ?>"
                                    data-no_sppb="<?= $k['no_sppb'] ?>"
                                    data-mesh="<?= $k['mesh'] ?>"
                                    data-bloom="<?= $k['bloom'] ?>"
                                    data-jumlah_kirim="<?= $k['jumlah_kirim'] ?>"
                                    data-tgl_kirim="<?= $k['tgl_kirim'] ?>"
                                    data-note_gudang="<?= $k['note_gudang'] ?>"
                                    data-gdg_admin="<?= $k['gdg_admin'] ?>">
                                    <i class="feather icon-eye"></i>Detail
                                  </button>
                                </div>
                              </td>
                              <td class="text-right">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <?php if ($level === "0") { ?>
                                    <button type="button"
                                      class="btn btn-warning btn-square btn-sm"
                                      data-toggle="modal"
                                      data-target="#Edit"
                                      data-id_barang_keluar="<?= $k['id_barang_keluar'] ?>"
                                      data-kode_tf_out="<?= $k['kode_tf_out'] ?>"
                                      data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>"
                                      data-id_customer="<?= $k['id_customer'] ?>"
                                      data-nama_customer="<?= $k['nama_customer'] ?>"
                                      data-id_barang="<?= $k['id_barang'] ?>"
                                      data-nama_barang="<?= $k['nama_barang'] ?>"
                                      data-id_mkt_sppb="<?= $k['id_mkt_sppb'] ?>"
                                      data-no_sppb="<?= $k['no_sppb'] ?>"
                                      data-mesh="<?= $k['mesh'] ?>"
                                      data-bloom="<?= $k['bloom'] ?>"
                                      data-jumlah_kirim="<?= $k['jumlah_kirim'] ?>"
                                      data-tgl_kirim="<?= $tgl_kirim ?>"
                                      data-note_gudang="<?= $k['note_gudang'] ?>"
                                      data-gdg_admin="<?= $k['gdg_admin'] ?>">
                                      <i class="feather icon-edit-2"></i>Edit
                                    </button>
                                  <?php } ?>
                                  <a
                                    target="_blank"
                                      class="btn btn-success btn-square text-light btn-sm"
                                      onclick="window.open(`<?= base_url() ?>gudang/gudang_barang/barang_keluar/barang_keluar/pdf_surat_jalan/<?= str_replace('/', '--', $k['kode_tf_out']) ?>`, 'surat_jalan', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes'); ">
                                      <i class="feather icon-file"></i>Cetak PDF
                                  </a>
                                  <a
                                    href="<?= base_url() ?>gudang/gudang_barang/barang_keluar/barang_keluar/delete/<?= str_replace('/', '--', $k['id_barang_keluar']) ?>"
                                    class="btn btn-danger btn-square text-light btn-sm"
                                    onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                    <i class="feather icon-trash-2"></i>hapus
                                  </a>
                                </div>
                              </td>
                            </tr>
                          <?php
                          endforeach;
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
    $('#export').click(function() {
      var filter_tgl = $('#filter_tgl').val();
      if (filter_tgl == '') {
        window.location = "<?= base_url() ?>laporan_barang_stok/pdf_laporan_barang_stok";
      } else {
        var url = "<?= base_url() ?>laporan_barang_stok/pdf_laporan_barang_stok/" + filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
        window.open(url, 'pdf_laporan_barang_stok', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    })

  })
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#lihat').click(function () {

      var filter_sppb = $('#filter_sppb').find(':selected').val();
      var filter_customer = $('#filter_customer').find(':selected').val();
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();

      var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
      var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];
      
      if (filter_tgl =='' && filter_tgl2 !='') {
        window.location = "<?=base_url()?>gudang/gudang_barang/barang_keluar/barang_keluar?alert=warning&msg=dari tanggal belum diisi";
      }else if (filter_tgl !='' && filter_tgl2=='') {
        window.location = "<?=base_url()?>gudang/gudang_barang/barang_keluar/barang_keluar?alert=warning&msg=sampai tanggal belum diisi";
      }else{
        const query = new URLSearchParams({
                    nama_customer: filter_customer,
                    no_sppb: filter_sppb,
                    date_from: filter_tgl,
                    date_until: filter_tgl2
                })

        window.location = "<?=base_url() ?>gudang/gudang_barang/barang_keluar/barang_keluar/index?"+ query.toString()
        
      }
    })
  })
</script>

<!-- Modal Add -->
  <div class="modal fade" id="Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Keluar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="<?= base_url() ?>gudang/gudang_barang/barang_keluar/barang_keluar/add">
          <input type="hidden" id="e-id_barang_keluar" name="id_barang_keluar">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="kode_tf_out">Kode TF Out</label>
                  <input type="text" class="form-control" id="e-kode_tf_out" name="kode_tf_out" aria-describedby="validationServer03Feedback" autocomplete="off" readonly>
                  <div id="validationServer03Feedback" class="invalid-feedback">
                    Maaf Kode TF Out sudah ada.
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="no_surat_jalan">No Surat Jalan</label>
                  <!-- <input type="text" class="form-control" id="no_surat_jalan" name="no_surat_jalan" placeholder="No Surat Jalan" maxlength="20" required> -->
                  <input type="text" class="form-control" id="e-no_surat_jalan" name="no_surat_jalan" autocomplete="off" required>
                </div>
              </div>

            <div class="col-md-4">
                    <div class="form-group">
                  <label for="id_mkt_po_customer">Nomor SPPB</label>
                    <select class="form-control chosen-select" id="id_mkt_sppb" name="id_mkt_sppb" autocomplete="off" required>
                      <option value="">-Pilih NO SPPB -</option>
                        <?php 
                          foreach($res_sppb as $rs){ 
                            // $tgl_kirim =  explode('-', $rs['tgl_kirim'])[2]."/".explode('-', $rs['tgl_kirim'])[1]."/".explode('-', $rs['tgl_kirim'])[0];
                        ?>
                      <option 
                      data-nama_customer="<?= $rs['nama_customer'] ?>"
                      data-nama_barang="<?= $rs['nama_barang'] ?>"
                      data-mesh="<?= $rs['mesh'] ?>"
                      data-bloom="<?= $rs['bloom'] ?>"
                      data-jumlah_kirim="<?= $rs['jumlah_kirim'] ?>"
                      data-tgl_kirim="<?= $rs['tgl_kirim'] ?>"
                      data-note_gudang="<?= $rs['note_gudang'] ?>"
                      value="<?=$rs['id_mkt_sppb']?>"><?=$rs['no_sppb']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
              </div>


              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Nama Customer</label>
                  <input type="text" class="form-control" id="e-nama_customer" name="nama_customer" placeholder="Nama Customer" autocomplete="off" readonly>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nama Barang </label>
                  <input class="form-control" id="e-nama_barang" name="nama_barang" placeholder="Nama Barang" autocomplete="off" readonly>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Mesh </label>
                  <input type="text" class="form-control" id="e-mesh" name="mesh" placeholder="Mesh" autocomplete="off" readonly>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Bloom </label>
                  <input type="text" class="form-control" id="e-bloom" name="bloom" placeholder="Bloom" autocomplete="off" readonly>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Jumlah Kirim (Kg) </label>
                  <input type="text" class="form-control" id="e-jumlah_kirim" name="jumlah_kirim" placeholder="Jumlah Kirim" autocomplete="off" readonly>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Tanggal Kirim </label>
                  <input type="text" class="form-control" id="e-tgl_kirim" name="tgl_kirim" placeholder="Tanggal Kirim" autocomplete="off" readonly>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="note_gudang">Note Untuk Gudang</label>
                  <textarea class="form-control" id="e-note_gudang" name="note_gudang" rows="3" placeholder="Note Untuk Gudang" autocomplete="off" readonly></textarea>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Gudang Admin</label>
                  <input type="text" class="form-control" id="e-gdg_admin" name="gdg_admin" value="<?= $this->session->userdata('nama') ?>" autocomplete="off" readonly>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary"
                onclick="if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali.')) { return false; }">Simpan</button>

            </div>
        </form>
      </div>
    </div>
  </div>

<!-- Modal View dan Edit tetap sama seperti sebelumnya -->

<script type="text/javascript">
  $(document).ready(function() {

    // Event: saat modal Add dibuka
    $('#Add').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget); // tombol yang trigger modal

      // ambil data dari tombol
      var id_barang_keluar = button.data('id_barang_keluar');
      var kode_tf_out = button.data('kode_tf_out');
      var no_surat_jalan = button.data('no_surat_jalan');
      var gdg_admin = button.data('gdg_admin');

      // isi form hidden / readonly
      $('#e-id_barang_keluar').val(id_barang_keluar);
      $('#e-kode_tf_out').val(kode_tf_out);
      $('#e-no_surat_jalan').val(no_surat_jalan);
      $('#e-gdg_admin').val(gdg_admin);
    });

    // Event: saat pilih NO SPPB
    $('#id_mkt_sppb').on('change', function() {
      let selected = $(this).find(':selected');
      $('#e-nama_customer').val(selected.data('nama_customer'));
      $('#e-nama_barang').val(selected.data('nama_barang'));
      $('#e-mesh').val(selected.data('mesh'));
      $('#e-bloom').val(selected.data('bloom'));
      $('#e-jumlah_kirim').val(selected.data('jumlah_kirim'));
      $('#e-tgl_kirim').val(selected.data('tgl_kirim'));
      $('#e-note_gudang').val(selected.data('note_gudang'));
    });

    // Reset form saat modal ditutup
    $('#Add').on('hidden.bs.modal', function() {
      $(this).find('form')[0].reset();
    });

  });
</script>



<!-- Modal View dan Edit scripts tetap sama seperti sebelumnya -->

<div class="modal fade" id="Edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Barang Keluar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span>&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>gudang/gudang_barang/barang_keluar/barang_keluar/edit">
        <input type="hidden" id="edit-id_barang_keluar" name="id_barang_keluar">
        <div class="modal-body">
          <div class="row">
            <!-- Contoh field edit -->
            <div class="col-md-4">
              <div class="form-group">
                <label>Kode TF Out</label>
                <input type="text" class="form-control" id="edit-kode_tf_out" name="kode_tf_out" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>No Surat Jalan</label>
                <input type="text" class="form-control" id="edit-no_surat_jalan" name="no_surat_jalan" required>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>Nama Customer</label>
                <input type="text" class="form-control" id="edit-nama_customer" name="nama_customer" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" class="form-control" id="edit-nama_barang" name="nama_barang" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"
            onclick="return confirm('Yakin update data ini?')">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function() {
    $('#Edit').on('show.bs.modal', function(event) {
      var id_barang_keluar = $(event.relatedTarget).data('id_barang_keluar')
      var kode_tf_out = $(event.relatedTarget).data('kode_tf_out')
      var no_surat_jalan = $(event.relatedTarget).data('no_surat_jalan')
      var nama_customer = $(event.relatedTarget).data('nama_customer')
      var id_mkt_sppb = $(event.relatedTarget).data('id_mkt_sppb')
      var no_sppb = $(event.relatedTarget).data('no_sppb')
      var nama_barang = $(event.relatedTarget).data('nama_barang')
      var mesh = $(event.relatedTarget).data('mesh')
      var bloom = $(event.relatedTarget).data('bloom')
      var jumlah_kirim = $(event.relatedTarget).data('jumlah_kirim')
      var tgl_kirim = $(event.relatedTarget).data('tgl_kirim')
      var note_gudang = $(event.relatedTarget).data('note_gudang')
      var gdg_admin = $(event.relatedTarget).data('gdg_admin')


      $(this).find('#e-id_barang_keluar').val(id_barang_keluar)
      $(this).find('#e-kode_tf_out').val(kode_tf_out)
      $(this).find('#e-no_surat_jalan').val(no_surat_jalan)
      $(this).find('#e-nama_customer').val(nama_customer)
      $(this).find('#e-id_mkt_sppb').val(id_mkt_sppb)
      $(this).find('#e-id_mkt_sppb').trigger("chosen:updated");
      $(this).find('#e-no_sppb').val(no_sppb)
      $(this).find('#e-nama_barang').val(nama_barang)
      $(this).find('#e-mesh').val(mesh)
      $(this).find('#e-bloom').val(bloom)
      $(this).find('#e-jumlah_kirim').val(jumlah_kirim)
      $(this).find('#e-tgl_kirim').val(tgl_kirim)
      $(this).find('#e-note_gudang').val(note_gudang)
      $(this).find('#e-gdg_admin').val(gdg_admin)
      $(this).find('#e-tgl_kirim').datepicker().on('show.bs.modal', function(event) {
        // prevent datepicker from firing bootstrap modal "show.bs.modal"
        event.stopPropagation();
      });

      $("select").on('change', function() {
        const selected = $(this).find(':selected').attr('data-nama_customer')
        nama_customer = selected.replaceAll(' ', ' ')
        $('#nama_customer').val(nama_customer)
      });

      $("select").on('change', function() {
        const selected = $(this).find(':selected').attr('data-nama_barang')
        nama_barang = selected.replaceAll(' ', ' ')
        $('#nama_barang').val(nama_barang)
      });

      $("select").on('change', function() {
        const selected = $(this).find(':selected').attr('data-mesh')
        mesh = selected.replaceAll(' ', ' ')
        $('#mesh').val(mesh)
      });

      $("select").on('change', function() {
        const selected = $(this).find(':selected').attr('data-bloom')
        bloom = selected.replaceAll(' ', ' ')
        $('#bloom').val(bloom)
      });

      $("select").on('change', function() {
        const selected = $(this).find(':selected').attr('data-jumlah_kirim')
        jumlah_kirim = selected.replaceAll(' ', ' ')
        $('#jumlah_kirim').val(jumlah_kirim)
      });

      $("select").on('change', function() {
        const selected = $(this).find(':selected').attr('data-tgl_kirim')
        tgl_kirim = selected.replaceAll(' ', ' ')
        $('#tgl_kirim').val(tgl_kirim)
      });

      $("select").on('change', function() {
        const selected = $(this).find(':selected').attr('data-note_gudang')
        note_gudang = selected.replaceAll(' ', ' ')
        $('#note_gudang').val(note_gudang)
      });

      $('#Edit').on('hidden.bs.modal', function() {
        $(this).find('form')[0].reset();
      });
    })
  })
</script>


<div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Barang Keluar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>barang_keluar/update">
        <input type="hidden" id="e-id_barang_keluar" name="id_barang_keluar">
        <div class="modal-body">
        <div class="row">
        <div class="col-md-4">
          <div class="form-group">
              <label for="kode_tf_out">Kode TF Out</label>
              <input type="text" class="form-control" id="e-kode_tf_out" name="kode_tf_out" aria-describedby="validationServer03Feedback" autocomplete="off" readonly>
              <div id="validationServer03Feedback" class="invalid-feedback">
                Maaf Kode TF Out sudah ada.
          </div>
        </div>
        </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="no_surat_jalan">No Surat Jalan</label>
              <!-- <input type="text" class="form-control" id="no_surat_jalan" name="no_surat_jalan" placeholder="No Surat Jalan" maxlength="20" required> -->
              <input type="text" class="form-control" id="e-no_surat_jalan" name="no_surat_jalan" autocomplete="off" required>
            </div>
          </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="id_mkt_sppb">Nomor SPPB</label>
                <select class="form-control chosen-select" id="e-id_mkt_sppb" name="id_mkt_sppb" autocomplete="off" required>
                  <option value="">-Pilih NO SPPB -</option>
                  <?php
                  foreach ($res_sppb as $rs) {
                    // $tgl_kirim =  explode('-', $rs['tgl_kirim'])[2] . "/" . explode('-', $rs['tgl_kirim'])[1] . "/" . explode('-', $rs['tgl_kirim'])[0];
                  ?>
                    <option
                      data-nama_customer="<?= $rs['nama_customer'] ?>"
                      data-nama_barang="<?= $rs['nama_barang'] ?>"
                      data-mesh="<?= $rs['mesh'] ?>"
                      data-bloom="<?= $rs['bloom'] ?>"
                      data-jumlah_kirim="<?= $rs['jumlah_kirim'] ?>"
                      data-tgl_kirim="<?= $rs['tgl_kirim'] ?>"
                      data-note_gudang="<?= $rs['note_gudang'] ?>"
                      value="<?= $rs['id_mkt_sppb'] ?>"><?= $rs['no_sppb'] ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>


            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Nama Customer</label>
                <input type="text" class="form-control" id="e-nama_customer" name="nama_customer" placeholder="Nama Customer" autocomplete="off" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlInput1">Nama Barang </label>
                <input class="form-control" id="e-nama_barang" name="nama_barang" placeholder="Nama Barang" autocomplete="off" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlInput1">Mesh </label>
                <input type="text" class="form-control" id="e-mesh" name="mesh" placeholder="Mesh" autocomplete="off" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlInput1">Bloom </label>
                <input type="text" class="form-control" id="e-bloom" name="bloom" placeholder="Bloom" autocomplete="off" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlInput1">Jumlah Kirim (Kg) </label>
                <input type="text" class="form-control" id="e-jumlah_kirim" name="jumlah_kirim" placeholder="Jumlah Kirim" autocomplete="off" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlInput1">Tanggal Kirim </label>
                <input type="text" class="form-control" id="e-tgl_kirim" name="tgl_kirim" placeholder="Tanggal Kirim" autocomplete="off" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="note_gudang">Note Untuk Gudang</label>
                <textarea class="form-control" id="e-note_gudang" name="note_gudang" rows="3" placeholder="Note Untuk Gudang" autocomplete="off" readonly></textarea>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlInput1">Gudang Admin</label>
                <input type="text" class="form-control" id="e-gdg_admin" name="gdg_admin" value="<?= $this->session->userdata('nama') ?>" autocomplete="off" readonly>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"
              onclick="if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali.')) { return false; }">Update</button>

          </div>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function() {
    $('#view').on('show.bs.modal', function(event) {
      var id_barang_keluar = $(event.relatedTarget).data('id_barang_keluar')
      var kode_tf_out = $(event.relatedTarget).data('kode_tf_out')
      var no_surat_jalan = $(event.relatedTarget).data('no_surat_jalan')
      var nama_customer = $(event.relatedTarget).data('nama_customer')
      var id_mkt_sppb = $(event.relatedTarget).data('id_mkt_sppb')
      var no_sppb = $(event.relatedTarget).data('no_sppb')
      var nama_barang = $(event.relatedTarget).data('nama_barang')
      var mesh = $(event.relatedTarget).data('mesh')
      var bloom = $(event.relatedTarget).data('bloom')
      var jumlah_kirim = $(event.relatedTarget).data('jumlah_kirim')
      var tgl_kirim = $(event.relatedTarget).data('tgl_kirim')
      var note_gudang = $(event.relatedTarget).data('note_gudang')
      var gdg_admin = $(event.relatedTarget).data('gdg_admin')


      $(this).find('#e-id_barang_keluar').val(id_barang_keluar)
      $(this).find('#e-kode_tf_out').val(kode_tf_out)
      $(this).find('#e-no_surat_jalan').val(no_surat_jalan)
      $(this).find('#e-nama_customer').val(nama_customer)
      $(this).find('#e-id_mkt_sppb').val(id_mkt_sppb)
      $(this).find('#e-id_mkt_sppb').trigger("chosen:updated");
      $(this).find('#e-no_sppb').val(no_sppb)
      $(this).find('#e-nama_barang').val(nama_barang)
      $(this).find('#e-mesh').val(mesh)
      $(this).find('#e-bloom').val(bloom)
      $(this).find('#e-jumlah_kirim').val(jumlah_kirim)
      $(this).find('#e-tgl_kirim').val(tgl_kirim)
      $(this).find('#e-note_gudang').val(note_gudang)
      $(this).find('#e-gdg_admin').val(gdg_admin)
      $(this).find('#e-tgl_kirim').datepicker().on('show.bs.modal', function(event) {
        // prevent datepicker from firing bootstrap modal "show.bs.modal"
        event.stopPropagation();
      });

      $("select").on('change', function() {
        const selected = $(this).find(':selected').attr('data-nama_customer')
        nama_customer = selected.replaceAll(' ', ' ')
        $('#nama_customer').val(nama_customer)
      });

      $("select").on('change', function() {
        const selected = $(this).find(':selected').attr('data-nama_barang')
        nama_barang = selected.replaceAll(' ', ' ')
        $('#nama_barang').val(nama_barang)
      });

      $("select").on('change', function() {
        const selected = $(this).find(':selected').attr('data-mesh')
        mesh = selected.replaceAll(' ', ' ')
        $('#mesh').val(mesh)
      });

      $("select").on('change', function() {
        const selected = $(this).find(':selected').attr('data-bloom')
        bloom = selected.replaceAll(' ', ' ')
        $('#bloom').val(bloom)
      });

      $("select").on('change', function() {
        const selected = $(this).find(':selected').attr('data-jumlah_kirim')
        jumlah_kirim = selected.replaceAll(' ', ' ')
        $('#jumlah_kirim').val(jumlah_kirim)
      });

      $("select").on('change', function() {
        const selected = $(this).find(':selected').attr('data-tgl_kirim')
        tgl_kirim = selected.replaceAll(' ', ' ')
        $('#tgl_kirim').val(tgl_kirim)
      });

      $("select").on('change', function() {
        const selected = $(this).find(':selected').attr('data-note_gudang')
        note_gudang = selected.replaceAll(' ', ' ')
        $('#note_gudang').val(note_gudang)
      });

      $('#edit').on('hidden.bs.modal', function() {
        $(this).find('form')[0].reset();
      });
    })
  })
</script>