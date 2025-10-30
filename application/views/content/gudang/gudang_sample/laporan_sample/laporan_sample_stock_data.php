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
                                    <!-- <h5 class="m-b-10">Data Sample Stok</h5> -->
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">Laporan Sample Stok</a></li>
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
                                        <h5>Data Sample Stok</h5>
                                        <div class="float-right">
                                            <div class="input-group">
                                                <select class="form-control chosen-select" id="filter_barang" name="filter_barang">
                                                    <option value="">-- Semua Barang --</option>
                                                    <?php foreach ($res_barang as $rb) { ?>
                                                        <option <?= $id_barang == $rb['id_barang'] ? 'selected' : '' ?> value="<?= $rb['id_barang'] ?>">
                                                            <?= $rb['nama_barang'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary" id="lihat" type="button">Lihat</button>
                                                    <button class="btn btn-primary" id="export" type="button">Cetak</button>
                                                    <a href="<?= base_url() ?>gudang/gudang_sample/Laporan_sample_stock/pdf_laporan_surat" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table class="table datatable table-hover table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nama Barang</th>
                                                        <th>Mesh</th>
                                                        <th class="text-center">Stok</th>
                                                        <th class="text-center">Rincian</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $no = 1;
                                                    if (!empty($result)) {
                                                        foreach($result as $k){ 
                                                    ?>
                                                    <tr>
                                                        <th scope="row"><?=$no++?></th>
                                                        <td><?=htmlspecialchars($k['nama_barang'])?></td>
                                                        <td><?=htmlspecialchars($k['mesh'])?></td>
                                                        <td class="text-center"><?=number_format($k['total_masuk'], 0, ",", ".")?></td> 
                                                        <!-- <td class="text-center"><?=number_format($k['total_keluar'], 0, ",", ".")?></td>  -->
                                                        <!-- <td class="text-center"><strong><?=number_format($k['stok_akhir'], 0, ",", ".")?> Kg</strong></td> -->
                                                        <!-- <td class="text-center"><?=htmlspecialchars($k['satuan'])?></td> -->
                                                        <td class="text-center">
                                                            <div class="btn-group" role="group">
                                                                <button type="button" 
                                                                    class="btn btn-info btn-square btn-sm btn-rincian"
                                                                    data-id-barang="<?= $k['id_barang'] ?>"
                                                                    data-nama-barang="<?= htmlspecialchars($k['nama_barang']) ?>"
                                                                    data-toggle="modal" 
                                                                    data-target="#detail">
                                                                    <i class="feather icon-eye"></i> Rincian
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                        }
                                                    } else { ?>
                                                    <tr>
                                                        <td colspan="8" class="text-center">Tidak ada data sample</td>
                                                    </tr>
                                                    <?php } ?>
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
        window.location = "<?= base_url() ?>gudang/gudang_sample/Laporan_sample_stock/pdf_laporan_surat";
      } else {
        var url = "<?= base_url() ?>gudang/gudang_sample/Laporan_sample_stock/pdf_laporan_surat" + filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
        window.open(url, 'gudang/gudang_sample/Laporan_sample_stock/', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    })

  })
</script>

<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailLabel">Rincian Sample Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal Masuk</th>
                            <th>Kode Sample In</th>
                            <th>Nama Barang</th>
                            <th>No Batch</th>
                            <th>Customer</th>
                            <th>Jumlah Masuk</th>
                            <th>Satuan</th>
                            
                        </tr>
                    </thead>
                    <tbody id="detail-body">
                        <tr><td colspan="9" class="text-center">Pilih barang untuk melihat rincian...</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- [ HTML structure tetap sama ... ] -->

<script type="text/javascript">
$(document).ready(function() {
    // ... kode lainnya ...

    $('.btn-rincian').on('click', function() {
        let id_barang = $(this).data('id-barang');
        let nama_barang = $(this).data('nama-barang');
        
        console.log('ID Barang:', id_barang); // Debug di console
        console.log('Nama Barang:', nama_barang); // Debug di console
        
        $('#detailLabel').text('Rincian Sample: ' + nama_barang);
        $('#detail-body').html('<tr><td colspan="9" class="text-center">Memuat data...</td></tr>');

        $.ajax({
            url: "<?= base_url('gudang/gudang_sample/laporan_sample_stock/get_rincian_sample') ?>",
            type: "POST",
            data: { 
                id_barang: id_barang 
            },
            dataType: "json",
            success: function(res) {
                console.log('Response:', res); // Debug di console
                
                if (res.length > 0) {
                    let rows = '';
                    $.each(res, function(i, item) {
                        rows += `
                            <tr>
                                <td>${i+1}</td>
                                <td>${item.tgl_masuk_sample || '-'}</td>
                                <td>${item.kode_sample_in || '-'}</td>
                                <td>${item.nama_barang || '-'}</td>
                                <td>${item.no_batch || '-'}</td>
                                <td>${item.nama_customer || '-'}</td>
                                <td class="text-right">${Number(item.jumlah_masuk).toLocaleString('id-ID')}</td>
                                <td>${item.satuan || '-'}</td>
                            </tr>`;
                    });
                    $('#detail-body').html(rows);
                } else {
                    $('#detail-body').html('<tr><td colspan="9" class="text-center">Tidak ada data sample masuk</td></tr>');
                }
            },
            error: function(xhr, status, error) {
                console.log('AJAX Error:', error); // Debug di console
                console.log('Status:', status); // Debug di console
                console.log('Response:', xhr.responseText); // Debug di console
                
                $('#detail-body').html('<tr><td colspan="9" class="text-center text-danger">Gagal memuat data. Error: ' + error + '</td></tr>');
            }
        });
    });
});
</script>