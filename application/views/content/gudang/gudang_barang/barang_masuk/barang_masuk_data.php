<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Spbm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --barang: #436;
            --upd: #f72585;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --info: #4895ef;
            --warning: #ae4976ff;
            --danger: #e63946;
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #6c757d;
            --light-gray: #e9ecef;
            --border-radius: 12px;
            --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }
        
        .barang-container {
            padding: 20px;
            background-color: #f5f7fb;
            min-height: 100vh;
        }
        
        .page-header {
            margin-bottom: 25px;
        }
        
        .page-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark);
            display: flex;
            align-items: center;
        }
        
        .page-title i {
            margin-right: 10px;
            color: var(--primary);
        }
        
        .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 0;
        }
        
        .breadcrumb-item a {
            color: var(--primary);
            text-decoration: none;
        }
        
        .card {
            width: 100%;
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 25px;
        }
        
        .card-header {
            background: white;
            border-bottom: 1px solid var(--light-gray);
            padding: 15px 15px;
            border-radius: var(--border-radius) var(--border-radius) 0 0 !important;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .card-header h5 {
            font-size: 18px;
            font-weight: 700;
            color: var(--dark);
            margin: 0;
        }
        
        .btn-group {
            display: flex;
            gap: 10px;
        }
        
        .btn {
            border-radius: 8px;
            font-weight: 600;
            padding: 8px 16px;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 5px;
            border: none;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(67, 97, 238, 0.3);
        }
        
        .btn-success {
            background: linear-gradient(135deg, var(--success), var(--info));
            color: white;
        }
        
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(76, 201, 240, 0.3);
        }
        
        .btn-info {
            background: linear-gradient(135deg, var(--info), #3a86ff);
            color: white;
        }
        
        .btn-warning {
            background: linear-gradient(135deg, var(--warning), #b5179e);
            color: white;
        }
        
        .btn-danger {
            background: linear-gradient(135deg, var(--danger), #d00000);
            color: white;
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, var(--gray), #495057);
            color: white;
        }
        
        .table-responsive {
            border-radius: 0 0 var(--border-radius) var(--border-radius);
            overflow: hidden;
        }
        
        .table {
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }
        
        .table thead th {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            padding: 8px 9px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            line-height: 1.5;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }
        
        .table tbody td {
            padding: 10px 8px;
            vertical-align: middle;
            border-bottom: 1px solid var(--light-gray);
            white-space: nowrap;
            font-size: 13px;
        }
        
        .table tbody tr {
            transition: var(--transition);
        }
        
        .table tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.05);
            transform: translateY(-1px);
        }
        
        .table tbody tr:last-child td {
            border-bottom: none;
        }
        
        .badge {
            padding: 6px 8px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 11px;
        }
        
        .badge-success {
            background-color: rgba(76, 201, 240, 0.1);
            color: var(--success);
        }
        
        .badge-primary {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary);
        }
        
        .badge-warning {
        background-color: rgba(205, 148, 3, 0.96);
        color: #000000ff;
       
    }
        
        .modal-content {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        
        .modal-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
            padding: 20px 25px;
        }

        .modal-up {
            background: linear-gradient(135deg, var(--upd), var(--warning));
            color: white;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
            padding: 20px 25px;
        }

        .modal-barang {
            background: linear-gradient(135deg, var(--barang), var(--secondary));
            color: white;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
            padding: 20px 25px;
        }
        
        .modal-title {
            font-weight: 700;
            font-size: 18px;
            left: 100%;
            color: white;
        }
        
        .close {
            color: white;
            opacity: 0.8;
        }
        
        .close:hover {
            color: white;
            opacity: 1;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-control {
            border: 1px solid var(--light-gray);
            border-radius: 8px;
            padding: 10px 15px;
            transition: var(--transition);
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        
        .form-label i {
            color: var(--primary);
            font-size: 14px;
            width: 16px;
        }
        
        .invalid-feedback {
            font-size: 12px;
            margin-top: 5px;
        }
        
        .action-buttons {
            display: flex;
            gap: 4px;
            justify-content: center;
            flex-wrap: nowrap;
        }
        
        .table .btn-sm {
            padding: 6px 10px;
            font-size: 11px;
            line-height: 1.5;
            white-space: nowrap;
        }
        
        .table .btn i {
            font-size: 15px;
            margin-right: 2px;
        }
        
        .filter-section {
            background: white;
            padding: 20px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 25px;
            border-left: 4px solid var(--primary);
        }
        
        .filter-row {
            display: flex;
            gap: 15px;
            align-items: end;
            flex-wrap: wrap;
        }
        
        .filter-group {
            flex: 1;
            min-width: 180px;
            margin-bottom: 0;
        }
        
        .filter-actions {
            display: flex;
            gap: 10px;
            align-items: end;
        }
        
        .filter-actions .btn {
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            white-space: nowrap;
        }
        
        .stats-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }
        
        .stats-card .number {
            font-size: 32px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 5px;
        }
        
        .stats-card .label {
            font-size: 14px;
            color: var(--gray);
            font-weight: 600;
        }
        
        @media (max-width: 768px) {
            .card-header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .btn-group {
                width: 100%;
                justify-content: flex-start;
            }
            
            .filter-row {
                flex-direction: column;
            }
            
            .filter-group {
                width: 100%;
                min-width: auto;
            }
            
            .filter-actions {
                width: 100%;
                justify-content: stretch;
                margin-top: 10px;
            }
            
            .filter-actions .btn {
                flex: 1;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 3px;
            }
        }
    </style>
</head>
<body>
  
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
                                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Barang Masuk</a></li>
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
                                            <h5>Data Barang Masuk</h5>
                                              <div class="float-right">
                                              <div class="input-group">
                                              <select class="form-control chosen-select" id="filter_batch" name="filter_batch">
                                                  <option value="" disabled selected hidden>- NO Batch -</option>
                                                    <?php
                                                      foreach ($res_batch as $nb) { ?>
                                                        <option <?= $no_batch === $nb['no_batch'] ? 'selected' : '' ?> value="<?= $nb['no_batch'] ?>"><?= $nb['no_batch'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <select class="form-control chosen-select" id="filter_barang" name="filter_barang">
                                                  <option value="" disabled selected hidden>- Nama Barang -</option>
                                                    <?php
                                                      foreach ($res_barang as $rb) { ?>
                                                        <option <?= $nama_barang === $rb['nama_barang'] ? 'selected' : '' ?> value="<?= $rb['nama_barang'] ?>"><?= $rb['nama_barang'] ?> - Mesh <?= $rb['mesh'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                        <input type="text" id="filter_tgl" value="<?= $tgl == null ? '' : $tgl ?>" class="form-control datepicker" placeholder="Dari Tanggal" aria-label="Recipient's username" aria-describedby="basic-addon2" autocomplete="off">
                                                        <input type="text" id="filter_tgl2" value="<?= $tgl2 == null ? '' : $tgl2 ?>" class="form-control datepicker" placeholder="Sampai Tanggal" aria-label="Recipient's username" aria-describedby="basic-addon2" autocomplete="off">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-secondary" id="lihat" type="button">Lihat</button>
                                                            <button class="btn btn-primary" id="export" type="button">Cetak</button>
                                                            <a href="<?=base_url()?>gudang/gudang_barang/barang_masuk/export/excel/" class="btn btn-success" type="button">Export To Excel</a>
                                                            <a href="<?=base_url()?>gudang/gudang_barang/barang_masuk/barang_masuk" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
                                                        </div>
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
                                                            <th>Tgl Msk</th>
                                                            <th>No Batch</th>
                                                            <th>Nama Barang</th>
                                                            <th>Mesh</th>
                                                            <th>Bloom</th>
                                                            <th class="text-center">Qty</th>
                                                            <th class="text-center">Detail</th>
                                                            <!-- <th class="text-center">Aksi</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    	<?php
                                                      $level = $this->session->userdata('level');
                                                    	$no=1;
                                                    	foreach($result as $k){ 
                                                        $tgl_msk_gdg =  explode('-', $k['tgl_msk_gdg'])[2]."/".explode('-', $k['tgl_msk_gdg'])[1]."/".explode('-', $k['tgl_msk_gdg'])[0];
                                                        // $tgl_bayar_pib =  explode('-', $k['tgl_bayar_pib'])[2]."/".explode('-', $k['tgl_bayar_pib'])[1]."/".explode('-', $k['tgl_bayar_pib'])[0];
                                                        // $tgl_exp =  explode('-', $k['tgl_exp'])[2]."/".explode('-', $k['tgl_exp'])[1]."/".explode('-', $k['tgl_exp'])[0];
                                                      ?>
                                                    	<tr>
                                                            <th scope="row"><?=$no++?></th>
                                                            <td><?=$tgl_msk_gdg?></td>
                                                            <td><?=$k['no_batch']?></td>
                                                            <td><?=$k['nama_barang']?></td>
                                                            <td><?=$k['mesh']?></td>
                                                            <td><?=$k['bloom']?></td>
                                                            <td class="text-left"><?=number_format($k['gdg_qty_in'],0,",",".")?> <?=$k['satuan']?></td>
                                                            <td class="text-right">
                                                              <div class="btn-group" role="group" aria-label="Basic example">
                                                                <button type="button" 
                                                                  class="btn btn-info btn-square btn-sm" 
                                                                  data-toggle="modal" 
                                                                  data-target="#detail"
                                                                  data-id_barang_masuk="<?=$k['id_barang_masuk']?>"
                                                                  data-kode_tf_in="<?=$k['kode_tf_in']?>"
                                                                  data-tgl_msk_gdg="<?=$tgl_msk_gdg?>"
                                                                  
                                                                  data-nama_supplier="<?=$k['nama_supplier']?>"
                                                                  data-no_batch="<?=$k['no_batch']?>"
                                                                  data-id_barang="<?=$k['id_barang']?>"
                                                                  data-nama_barang="<?=$k['nama_barang']?>"
                                                                  data-mesh="<?=$k['mesh']?>"
                                                                  data-bloom="<?=$k['bloom']?>"
                                                                  data-gdg_qty_in="<?=number_format($k['gdg_qty_in'],0,",",".")?>"
                                                                  data-gdg_admin="<?=$k['gdg_admin']?>"

                                                                >
                                                                  <i class="feather icon-eye"></i>Detail
                                                                </button>
                                                            </td>
                                                            <!-- <td class="text-right">
                                                              <div class="btn-group  " role="group" aria-label="Basic example">
                                                              
                                                                <button type="button" 
                                                                  class="btn btn-warning btn-square btn-sm text-light" 
                                                                  data-toggle="modal" 
                                                                  data-target="#edit" 



                                                                >
                                                                  <i class="feather icon-edit-2"></i>Edit
                                                                </button>
                                                                <a  
                                                                  href="<?=base_url()?>barang_masuk/delete/<?=$k['id_barang_masuk']?>" 
                                                                  class="btn btn-danger btn-square text-light btn-sm" 
                                                                  onclick = "if (! confirm('Apakah Anda Yakin?')) { return false; }"
                                                                >
                                                                  <i class="feather icon-trash-2"></i>hapus
                                                                </a>
                                                              </div>
                                                              
                                                            </td> -->
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
    $('#lihat').click(function () {

      var filter_barang = $('#filter_barang').find(':selected').val();
      var filter_batch = $('#filter_batch').find(':selected').val();
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();

      var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
      var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];
      
      if (filter_tgl =='' && filter_tgl2 !='') {
        window.location = "<?=base_url()?>gudang/gudang_barang/barang_masuk/barang_masuk?alert=warning&msg=dari tanggal belum diisi";
      }else if (filter_tgl !='' && filter_tgl2=='') {
        window.location = "<?=base_url()?>gudang/gudang_barang/barang_masuk/barang_masuk?alert=warning&msg=sampai tanggal belum diisi";
      }else{
        const query = new URLSearchParams({
                    no_batch: filter_batch,
                    nama_barang: filter_barang,
                    date_from: filter_tgl,
                    date_until: filter_tgl2
                })

        window.location = "<?=base_url() ?>gudang/gudang_barang/barang_masuk/barang_masuk/index?"+ query.toString()
        
      }
    })
    $('#export').click(function () {
      
      var filter_barang = $('#filter_barang').find(':selected').val();
      var filter_batch = $('#filter_batch').find(':selected').val();
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();

      var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
      var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];

      if (filter_tgl == '' && filter_tgl2 != '') {
        window.location = "<?= base_url() ?>gudang/gudang_barang/barang_masuk/barang_masuk?alert=warning&msg=dari tanggal belum diisi";
        alert("dari tanggal belum diisi")
      } else if (filter_tgl != '' && filter_tgl2 == '') {
        window.location = "<?= base_url() ?>gudang/gudang_barang/barang_masuk/barang_masuk?alert=warning&msg=sampai tanggal belum diisi";
      } else {
        const query = new URLSearchParams({
                no_batch: filter_batch,
                nama_barang: filter_barang,
                date_from: filter_tgl,
                date_until: filter_tgl2
        })
        var url = "<?= base_url() ?>gudang/gudang_barang/barang_masuk/barang_masuk/pdf_barang_masuk?" + query.toString();
        window.open(url, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    })
  })
</script>

<!-- Modal Detail -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Barang masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- Hidden ID -->
        <input type="hidden" id="v-prc_po_pembelian" name="id_prc_po_pembelian">

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Kode TF IN</label>
              <input type="text" class="form-control" id="v-kode_tf_in" readonly>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Tanggal Masuk Gudang</label>
              <input type="text" class="form-control" id="v-tgl_msk_gdg" readonly>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>No Batch</label>
              <input type="text" class="form-control" id="v-no_batch" readonly>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Nama Barang</label>
              <input type="text" class="form-control" id="v-id_barang" readonly>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Mesh</label>
              <input type="text" class="form-control" id="v-mesh" readonly>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Bloom</label>
              <input type="text" class="form-control" id="v-bloom" readonly>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Nama Supplier</label>
              <input type="text" class="form-control" id="v-nama_supplier" readonly>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Jumlah (Kg)</label>
              <input type="text" class="form-control" id="v-gdg_qty_in" readonly>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Gudang Admin</label>
              <input type="text" class="form-control" id="v-gdg_admin" readonly>
            </div>
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
  $('#detail').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // tombol pemicu modal

    var kode_tf_in          = button.data('kode_tf_in');
    var tgl_msk_gdg         = button.data('tgl_msk_gdg');
    var no_batch            = button.data('no_batch');
    var nama_supplier       = button.data('nama_supplier');
    var id_barang           = button.data('nama_barang');
    var mesh                = button.data('mesh');
    var bloom               = button.data('bloom');
    var gdg_qty_in          = button.data('gdg_qty_in');
    var gdg_admin           = button.data('gdg_admin');

    // Set value ke input
    $('#v-kode_tf_in').val(kode_tf_in);
    $('#v-tgl_msk_gdg').val(tgl_msk_gdg);
    $('#v-no_batch').val(no_batch);
    $('#v-nama_supplier').val(nama_supplier);
    $('#v-id_barang').val(id_barang);
    $('#v-mesh').val(mesh);
    $('#v-bloom').val(bloom);
    $('#v-gdg_qty_in').val(gdg_qty_in);
    $('#v-gdg_admin').val(gdg_admin);
  });
});
</script>
                  </body>
                  </html>