<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Sample</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
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
        
        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .sample-container {
            padding: 20px;
            background-color: #f5f7fb;
            min-height: 100vh;
        }
        
        .page-header {
            margin-bottom: 25px;
            background: white;
            padding: 20px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
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
            font-weight: 500;
        }
        
        .breadcrumb-item.active {
            color: var(--gray);
        }
        
        .card {
            width: 100%;
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 25px;
            transition: var(--transition);
        }
        
        .card:hover {
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
        }
        
        .card-header {
            background: white;
            border-bottom: 1px solid var(--light-gray);
            padding: 15px 10px;
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
            font-size: 14px;
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
        
        .btn-info:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(72, 149, 239, 0.3);
        }
        
        .btn-warning {
            background: linear-gradient(135deg, var(--warning), #b5179e);
            color: white;
        }
        
        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(174, 73, 118, 0.3);
        }
        
        .btn-danger {
            background: linear-gradient(135deg, var(--danger), #d00000);
            color: white;
        }
        
        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(230, 57, 70, 0.3);
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, var(--gray), #495057);
            color: white;
        }
        
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
        }
        
        .btn-sm {
            padding: 6px 12px;
            font-size: 12px;
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
            padding: 12px 15px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            line-height: 1.5;
            letter-spacing: 0.5px;
            white-space: nowrap;
            vertical-align: middle;
        }
        
        .table tbody td {
            padding: 12px 1px;
            vertical-align: middle;
            border-bottom: 1px solid var(--light-gray);
            white-space: nowrap;
            font-size: 14px;
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
        
        .text-center {
            text-align: center;
        }
        
        .text-right {
            text-align: right;
        }
        
        .text-left {
            text-align: left;
        }
        
        .no-data {
            padding: 40px !important;
            color: #6c757d;
            font-style: italic;
            background-color: #f8f9fa;
            text-align: center;
        }
        
        .alert {
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            font-weight: 500;
        }
        
        .alert-info {
            background-color: #d1ecf1;
            border-color: #bee5eb;
            color: #0c5460;
        }
        
        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
        
        .alert-warning {
            background-color: #fff3cd;
            border-color: #ffeaa7;
            color: #856404;
        }
        
        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
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
        
        .form-control {
            border: 1px solid var(--light-gray);
            border-radius: 8px;
            padding: 10px 15px;
            transition: var(--transition);
            font-size: 14px;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
        }
        
        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--dark);
        }
        
        .input-group {
            border-radius: 8px;
        }
        
        .input-group .form-control {
            border-radius: 8px;
        }
        
        .input-group-append .btn {
            border-radius: 0 8px 8px 0;
            height: 42px;
        }
        
        .modal-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
        }
        
        .modal-title {
            font-weight: 700;
        }
        
        .modal-content {
            border-radius: var(--border-radius);
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        
        .close {
            color: white;
            opacity: 0.8;
        }
        
        .close:hover {
            color: white;
            opacity: 1;
        }
        
        .badge {
            padding: 6px 10px;
            border-radius: 6px;
            font-weight: 600;
        }
        
        .status-completed {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .status-cancelled {
            background-color: #f8d7da;
            color: #721c24;
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
            
            .table-responsive {
                font-size: 12px;
            }
            
            .table thead th {
                padding: 8px 10px;
            }
            
            .table tbody td {
                padding: 8px 10px;
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
                                        <li class="breadcrumb-item"><a href="javascript:">Invoice</a></li>
                                        <!-- <li class="breadcrumb-item"><a href="javascript:"></a></li> -->
                                        <!-- Button trigger modal -->
                      										<!-- <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      											<i class="feather icon-plus"></i>Tambah PO Customer
                      										</button> -->
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
                                            <h5>Data Invoice</h5>

                                            <div class="float-right">
                                              <div class="input-group">
                                              <select class="form-control chosen-select" id="filter_customer" name="filter_customer">
                                                  <option value="" disabled selected hidden>- Nama Customer -</option>
                                                    <?php
                                                      foreach ($res_customer as $rc) { ?>
                                                        <option <?= $nama_customer === $rc['nama_customer'] ? 'selected' : '' ?> value="<?= $rc['nama_customer'] ?>"><?= $rc['nama_customer'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <select class="form-control chosen-select" id="filter_barang" name="filter_barang">
                                                  <option value="" disabled selected hidden>- Nama Barang -</option>
                                                    <?php
                                                      foreach ($res_barang as $rb) { ?>
                                                        <option <?= $nama_barang === $rb['nama_barang'] ? 'selected' : '' ?> value="<?= $rb['nama_barang'] ?>"><?= $rb['nama_barang'] ?> - Mesh <?= $rb['mesh'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                        <input type="text" id="filter_tgl" name="date_form" value="<?= $tgl == null ? '' : $tgl ?>" class="form-control datepicker" placeholder="Dari Tanggal" aria-label="Recipient's username" aria-describedby="basic-addon2" autocomplete="off">
                                                        <input type="text" id="filter_tgl2" name="date_until" value="<?= $tgl2 == null ? '' : $tgl2 ?>" class="form-control datepicker" placeholder="Sampai Tanggal" aria-label="Recipient's username" aria-describedby="basic-addon2" autocomplete="off">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-secondary" id="lihat" type="button">Lihat</button>
                                                            <button class="btn btn-primary" id="export" type="button">Cetak</button>
                                                            <a href="<?=base_url()?>marketing/po_customer" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
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
                                                            <th>Tgl Invoice</th>
                                                            <th>No Invoice</th>
                                                            <th>Customer</th>
                                                            <th>Nama Barang</th>
                                                            <th>Jumlah PO</th>
                                                            <th>Harga PO</th>
                                                            <th>Status</th>
                                                            <th>Detail</th>
                                                            <th class="text-center">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    	<?php
                                                      $level = $this->session->userdata('level');
                                                    	$no=1;
                                                    	foreach($result as $k){ 
                                                      $tgl_invoice =  explode('-', $k['tgl_invoice'])[2]."/".explode('-', $k['tgl_invoice'])[1]."/".explode('-', $k['tgl_invoice'])[0];
                                                      ?>

                                                    	<tr>
                                                            <th scope="row"><?=$no++?></th>
                                                            <td><?=$tgl_invoice?></td>
                                                            <td><?=$k['no_invoice']?></td>
                                                            <td><?=$k['nama_customer']?></td>
                                                            <td><?=$k['nama_barang']?></td>
                                                            <td class="text-right"><?=number_format($k['jumlah_po_customer'],0,",",".")?> <?=$k['satuan']?></td>
                                                            <td class="text-right">Rp. <?=number_format($k['harga_po_customer'],0,",",".")?></td>
                                                            <td><?=$k['status_invoice']?></td>
                                                            <td class="text-center">
                                                              <div class="btn-group " role="group" aria-label="Basic example">
                                                                <button type="button" 
                                                                  class="btn btn-info btn-square btn-sm" 
                                                                  data-toggle="modal" 
                                                                  data-target="#detail" 

                                                                  data-id_mkt_po_customer="<?=$k['id_mkt_po_customer']?>"
                                                                  data-no_po="<?=$k['no_po_customer']?>"
                                                                  data-tgl_po="<?=$tgl_invoice?>"
                                                                  
                                                                  data-id_customer="<?=$k['id_customer']?>"
                                                                  data-nama_customer="<?=$k['nama_customer']?>"
                                                                  data-id_barang="<?=$k['id_barang']?>"
                                                                  data-nama_barang="<?=$k['nama_barang']?>"
                                                                  data-mesh="<?=$k['mesh']?>"
                                                                  data-bloom="<?=$k['bloom']?>"
                                                                  data-jumlah_po="<?=$k['jumlah_po_customer']?>"
                                                                  data-harga_po="<?=$k['harga_po_customer']?>"
                                                                  data-keterangan="<?=$k['keterangan_po_customer']?>"
                                                                  data-jenis_pembayaran="<?=$k['jenis_pembayaran_customer']?>"
                                                                  data-status_invoice="<?= $k['status_invoice']?>"
                                                                  data-mkt_admin="<?=$k['mkt_admin']?>"
                                                                >
                                                                  <i class="feather icon-eye"></i>Detail
                                                                </button>
                                                              </div>
                                                            </td>
                                                            <td class="text-center">
                                                              <div class="btn-group " role="group" aria-label="Basic example">
                                                              </div>
                                                             <a target="_blank"
                                                                class="btn btn-info btn-square text-light btn-sm"
                                                                onclick="window.open(`<?= base_url() ?>accounting/invoice/pdf_invoice/<?= $k['id_acc_invoice'] ?>`, 'invoice_pdf', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');">
                                                                <i class="feather icon-file"></i>Cetak PDF
                                                              </a>
                                    
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
    $('#lihat').click(function () {

      var filter_barang = $('#filter_barang').find(':selected').val();
      var filter_customer = $('#filter_customer').find(':selected').val();
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();

      var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
      var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];
      
      if (filter_tgl =='' && filter_tgl2 !='') {
        window.location = "<?=base_url()?>accounting/invoice?alert=warning&msg=dari tanggal belum diisi";
      }else if (filter_tgl !='' && filter_tgl2=='') {
        window.location = "<?=base_url()?>accounting/invoice?alert=warning&msg=sampai tanggal belum diisi";
      }else{
        const query = new URLSearchParams({
                    nama_customer: filter_customer,
                    nama_barang: filter_barang,
                    date_from: filter_tgl,
                    date_until: filter_tgl2
                })

        window.location = "<?=base_url() ?>accounting/invoice?"+ query.toString()
        
      }
    })
    $('#export').click(function () {
      
      var filter_barang = $('#filter_barang').find(':selected').val();
      var filter_customer = $('#filter_customer').find(':selected').val();
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();

      var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
      var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];

      if (filter_tgl == '' && filter_tgl2 != '') {
        window.location = "<?= base_url() ?>marketing/po_customer?alert=warning&msg=dari tanggal belum diisi";
        alert("dari tanggal belum diisi")
      } else if (filter_tgl != '' && filter_tgl2 == '') {
        window.location = "<?= base_url() ?>marketing/po_customer?alert=warning&msg=sampai tanggal belum diisi";
      } else {
        const query = new URLSearchParams({
                nama_customer: filter_customer,
                nama_barang: filter_barang,
                date_from: filter_tgl,
                date_until: filter_tgl2
        })
        var url = "<?= base_url() ?>marketing/po_customer/pdf_po_customer?" + query.toString();
        window.open(url, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    })
  })
</script>


 <!-- Modal DETAIL-->
 <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail PO Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="row">
  
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlInput1">No PO</label>
                  <input type="text" class="form-control" id="v-no_po" name="no_po" placeholder="No PO" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" readonly>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      Maaf No PO sudah ada.
                    </div>
              </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="tgl_po">Tanggal PO</label>
                        <input type="text" class="form-control datepicker" id="v-tgl_po" name="tgl_po"  placeholder="Tanggal PO" autocomplete="off" readonly>
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="id_customer">Nama Customer</label>
                  <input type="text" class="form-control" id="v-id_customer" name="id_customer" autocomplete="off" readonly>
              </div>
            </div>
  
            <div class="col-md-6">
              <div class="form-group">
                <label for="id_barang">Nama Barang</label>
                  <input type="text" class="form-control" id="v-id_barang" name="id_barang" autocomplete="off" readonly>
              </div>
            </div>
  
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Mesh</label>
                  <input class="form-control" id="v-mesh" name="mesh" placeholder="Mesh" autocomplete="off" readonly>
              </div>
            </div>
        
            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Bloom</label>
                      <input type="text" class="form-control" id="v-bloom" name="bloom" placeholder="Bloom"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah(kg)</label>
                      <input type="text" class="form-control" id="v-jumlah_po" name="jumlah_po" placeholder="Jumlah(Kg)" autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Harga(Rp/Kg)</label>
                      <input type="text" class="form-control" id="v-harga_po" name="harga_po" placeholder="Harga(Rp/Kg)" autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah (Rp)</label>
                      <input type="text" class="form-control" id="v-jumlah" name="jumlah_po" placeholder="Jumlah Po" autocomplete="off" readonly>
                  </div>
            </div>
  
            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Jenis Pembayaran</label>
                      <input type="text" class="form-control" id="v-jenis_pembayaran" name="jenis_pembayaran" autocomplete="off" readonly>
                  </div>
            </div>
            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Keterangan Po</label>
                      <textarea type="text" class="form-control" id="v-keterangan" name="keterangan" autocomplete="off" readonly></textarea>
                  </div>
            </div>
            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Status</label>
                      <input type="text" class="form-control" id="v-status" name="status" autocomplete="off" readonly>
                  </div>
            </div>
            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Marketing Admin</label>
                      <input type="text" class="form-control" id="v-mkt_admin" name="mkt_admin" autocomplete="off" readonly>
                  </div>
            </div>
  
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#detail').on('show.bs.modal', function (event) {

     function formatRupiah(angka) {
      if(!angka) {
        return '0';
      }
      let number_string = angka.replace(/[^,\d]/g, '').toString(),
          split   		= number_string.split('.'),
          sisa     		= split[0].length % 3,
          rupiah     	= split[0].substr(0, sisa),
          ribuan     	= split[0].substr(sisa).match(/\d{3}/gi);

      if (ribuan) {
        let separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      rupiah = split[1] != undefined ? rupiah + '.' + split[1] : rupiah;
      return rupiah;
    }

    function rupiahToInt(rupiah) {
  if (!rupiah) return 0;
  // Hapus semua karakter selain angka
  let clean = rupiah.toString().replace(/[^\d]/g, '');
  return parseInt(clean, 10) || 0;
}


  var id_mkt_po_customer = $(event.relatedTarget).data('id_mkt_po_customer') 
  var no_po = $(event.relatedTarget).data('no_po')
  var tgl_po = $(event.relatedTarget).data('tgl_po')
  var id_customer = $(event.relatedTarget).data('nama_customer') 
  var id_barang = $(event.relatedTarget).data('nama_barang')
  var mesh = $(event.relatedTarget).data('mesh') 
  var bloom = $(event.relatedTarget).data('bloom') 
  var jumlah_po = $(event.relatedTarget).data('jumlah_po') 
  var harga_po = $(event.relatedTarget).data('harga_po') 
  var keterangan = $(event.relatedTarget).data('keterangan')
  var jenis_pembayaran = $(event.relatedTarget).data('jenis_pembayaran')
  var status_invoice = $(event.relatedTarget).data('status_invoice')
  var mkt_admin = $(event.relatedTarget).data('mkt_admin') 

 // Konversi ke angka bersih sebelum dihitung
    // let jumlah = jumlah_po.toString().replace(/\./g, '').replace(/,/g, '');
    // let harga = harga_po.toString().replace(/\./g, '').replace(/,/g, '');
let total = rupiahToInt(jumlah_po) * rupiahToInt(harga_po);
  $(this).find('#v-mkt_po_customer').val(id_mkt_po_customer)
  $(this).find('#v-no_po').val(no_po)
  $(this).find('#v-tgl_po').val(tgl_po)
  $(this).find('#v-id_customer').val(id_customer)
  $(this).find('#v-id_customer').trigger("chosen:updated");
  $(this).find('#v-id_barang').val(id_barang)
  $(this).find('#v-id_barang').trigger("chosen:updated");
  $(this).find('#v-mesh').val(mesh)
  $(this).find('#v-bloom').val(bloom)
  $(this).find('#v-keterangan').val(keterangan)
  $(this).find('#v-jumlah_po').val(formatRupiah(jumlah_po.toString()))
  $(this).find('#v-harga_po').val(formatRupiah(harga_po.toString()))
  $(this).find('#v-jumlah').val(formatRupiah(total.toString()));
  $(this).find('#v-jenis_pembayaran').val(jenis_pembayaran)
  $(this).find('#v-jenis_pembayaran').trigger("chosen:updated");
  $(this).find('#v-status').val(status_invoice)
  $(this).find('#v-mkt_admin').val(mkt_admin)


  $(this).find('#v-tgl_po').datepicker().on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();
  });
})

})

</script>

    <!-- Modal EDIT-->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>accounting/invoice/update_status">
      <div class="modal-body">
      <input type="hidden" id="e-id_mkt_po_customer" name="id_mkt_po_customer">
        
        <div class="row">
     <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlInput1">No PO</label>
                  <input type="text" class="form-control" id="e-no_po" name="no_po" placeholder="No PO" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" readonly>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      Maaf No PO sudah ada.
                    </div>
              </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="tgl_po">Tanggal PO</label>
                        <input type="text" class="form-control datepicker" id="e-tgl_po" name="tgl_po"  placeholder="Tanggal PO" autocomplete="off" readonly>
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="id_customer">Nama Customer</label>
                  <input type="text" class="form-control" id="e-id_customer" name="id_customer" autocomplete="off" readonly>
              </div>
            </div>
  
            <div class="col-md-6">
              <div class="form-group">
                <label for="id_barang">Nama Barang</label>
                  <input type="text" class="form-control" id="e-id_barang" name="id_barang" autocomplete="off" readonly>
              </div>
            </div>
  
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Mesh</label>
                  <input class="form-control" id=e-mesh" name="mesh" placeholder="Mesh" autocomplete="off" readonly>
              </div>
            </div>
        
            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Bloom</label>
                      <input type="text" class="form-control" id="e-bloom" name="bloom" placeholder="Bloom"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah(kg)</label>
                      <input type="number" class="form-control" id="e-jumlah_po" name="jumlah_po" placeholder="Jumlah(Kg)" autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Harga(Rp/Kg)</label>
                      <input type="number" class="form-control" id="e-harga_po" name="harga_po" placeholder="Harga(Rp/Kg)" autocomplete="off" readonly>
                  </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Jenis Pembayaran</label>
                    <select class="form-control chosen-select" id="e-jenis_pembayaran" name="jenis_pembayaran" autocomplete="off">
                        <option value="">- Pilih Jenis Pembayaran -</option>
                        <option value="Cash">Cash</option>
                        <option value="Kredit">Kredit</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Status</label>
                    <select class="form-control chosen-select" id="e-status_invoice" name="status_invoice" autocomplete="off">
                        <option value="">- Pilih Status -</option>
                        <option value="Unpaid">Unpaid</option>
                        <option value="Partial">Partial</option>
                        <option value="Paid">Paid</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Marketing Admin</label>
                      <input type="text" class="form-control" id="e-mkt_admin" name="mkt_admin" value="<?=$this->session->userdata('nama')?>"  autocomplete="off" readonly>
                  </div>
            </div>
  
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="simpan" class="btn btn-primary"
        onclick = "if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#edit').on('show.bs.modal', function (event) {
  var id_mkt_po_customer = $(event.relatedTarget).data('id_mkt_po_customer') 
  var no_po = $(event.relatedTarget).data('no_po')
  var tgl_po = $(event.relatedTarget).data('tgl_po')
  var id_customer = $(event.relatedTarget).data('nama_customer') 
  var id_barang = $(event.relatedTarget).data('nama_barang')
  var mesh = $(event.relatedTarget).data('mesh') 
  var bloom = $(event.relatedTarget).data('bloom') 
  var jumlah_po = $(event.relatedTarget).data('jumlah_po') 
  var harga_po = $(event.relatedTarget).data('harga_po') 
  var jenis_pembayaran = $(event.relatedTarget).data('jenis_pembayaran')
  var status_invoice = $(event.relatedTarget).data('status_invoice')
  var mkt_admin = $(event.relatedTarget).data('mkt_admin') 

  $(this).find('#e-id_mkt_po_customer').val(id_mkt_po_customer)
  $(this).find('#e-no_po').val(no_po)
  $(this).find('#e-tgl_po').val(tgl_po)
  $(this).find('#e-id_customer').val(id_customer)
  $(this).find('#e-id_customer').trigger("chosen:updated");
  $(this).find('#e-id_barang').val(id_barang)
  $(this).find('#e-id_barang').trigger("chosen:updated");
  $(this).find('#e-mesh').val(mesh)
  $(this).find('#e-bloom').val(bloom)
  $(this).find('#e-jumlah_po').val(jumlah_po)
  $(this).find('#e-harga_po').val(harga_po)
  $(this).find('#e-jenis_pembayaran').val(jenis_pembayaran)
  $(this).find('#e-jenis_pembayaran').trigger("chosen:updated");
  $(this).find('#e-status_invoice').val(status_invoice)
  $(this).find('#e-status_invoice').trigger("chosen:updated");
  $(this).find('#e-mkt_admin').val(mkt_admin)


  $(this).find('#e-tgl_po').datepicker().on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();
  });

  $("#e-no_po").keyup(function(){
      var no_po =  $("#e-no_po").val();
      jQuery.ajax({
        url: "<?=base_url()?>marketing/po_customer/cek_no_po",
        dataType:'text',
        type: "post",
        data:{no_po:no_po},
        success:function(response){
          if (response =="true") {
            $("#e-no_po").addClass("is-invalid");
            $("#simpan").attr("disabled","disabled");
          }else{
            $("#e-no_po").removeClass("is-invalid");
            $("#simpan").removeAttr("disabled");
          }
        }            
      });
    })

    $("select").on('change', function() {
      const selected = $(this).find(':selected').attr('data-mesh')
      mesh = selected.replaceAll(' ', '')
      $('#e-mesh').val(mesh)
    });

    $("select").on('change', function() {
      const selected = $(this).find(':selected').attr('data-bloom')
      bloom = selected.replaceAll(' ', '')
      $('#e-bloom').val(bloom)
    });

})

})

</script>