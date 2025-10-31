<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Sample Stock</title>
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

        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
            padding: 13px 10px;
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
            background-color: rgba(247, 37, 133, 0.1);
            color: var(--warning);
        }

        .badge-danger {
            background-color: rgba(230, 57, 70, 0.1);
            color: var(--danger);
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

        .modal-title {
            font-weight: 700;
            font-size: 18px;
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

        .no-data {
            text-align: center;
            padding: 40px;
            color: #6c757d;
        }

        .stock-positive {
            color: #28a745;
            font-weight: bold;
        }

        .stock-negative {
            color: #dc3545;
            font-weight: bold;
        }

        .stock-zero {
            color: #6c757d;
            font-weight: bold;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid var(--light-gray);
            padding: 10px 12px;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
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
                                        <!-- <h5 class="m-b-10">Laporan Stok Barang</h5> -->
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Laporan Kartu Stok</a></li>
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
                                            <h5>Laporan Kartu Stok</h5>
                                            <div class="float-right">
                                              <div class="input-group">
                                                <?php 
                                                  function newDate($date){
                                                    return explode('-', $date)[2]."/".explode('-', $date)[1]."/".explode('-', $date)[0];
                                                  }
                                                ?>
                                                        <input type="text" id="filter_tgl" value="<?=$tgl==null?'':newDate($tgl)?>" class="form-control datepicker" placeholder="Fiter Tanggal Disini" aria-label="Recipient's username" aria-describedby="basic-addon2" autocomplete="off">
                                                        <input type="text" id="filter_tgl2" value="<?=$tgl2==null?'':newDate($tgl2)?>" class="form-control datepicker" placeholder="Fiter Sampai Tanggal" aria-label="Recipient's username" aria-describedby="basic-addon2" autocomplete="off">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-secondary" id="lihat" type="button">Lihat</button>
                                                            <button class="btn btn-primary" id="export" type="button">Cetak</button>
                                                            <a href="<?=base_url()?>laporan_kartu_stok" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="card-block table-border-style">

                                        	<?php 
                                        	if ($tgl == null) {
                                                echo '<div class="text-center">Isi Form Periode Terlebih Dahulu</div>';
                                            }else{
                                        	?>
                                            <div class="table-responsive">
                                                <table class="table datatable table-bordered table-hover table-striped table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="2">#</th>
                                                            <th rowspan="2">Kode</th>
                                                            <th rowspan="2">Nama</th>
                                                            <th rowspan="2" class="text-right">Stok Sebelum <?=$tgl==null?'':newDate($tgl)?></th>
                                                            <th colspan="3" class="text-center"><?=$tgl==null?'':newDate($tgl)?> - <?=$tgl2==null?'':newDate($tgl2)?></th>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <th class="text-right">Masuk</th>
                                                            <th class="text-right">Keluar</th>
                                                            <th class="text-right">Stok Aktual</th>
                                                            
                                                        </tr>
                                                        
                                                    </thead>
                                                    <tbody>
                                                    	<?php 
                                                    	$no=1;
                                                    	foreach($result as $k){ 
                                                            $aktual = $k['stok']+$k['masuk']-+$k['keluar'];
                                                    	?>
                                                    	<tr>
                                                            <th scope="row"><?=$no++?></th>
                                                            <td><?=$k['kode_barang']?></td>
                                                            <td><?=$k['nama_barang']?></td>
                                                            <td class="text-right"><?=number_format($k['stok'],0,",",".")?><?=$k['satuan']?></td>
                                                            <td class="text-right">
                                                              <?= number_format($k['masuk'] ?? 0, 0, ",", ".") ?> <?= $k['satuan'] ?>
                                                            </td>
                                                            <td class="text-right">
                                                              <?= number_format($k['keluar'] ?? 0, 0, ",", ".") ?> <?= $k['satuan'] ?>
                                                            </td>

                                                            <td class="text-right"><?=number_format($aktual,0,",",".")?><?=$k['satuan']?></td>
                                                            
                                                        </tr>
                                                    	<?php
                                                    	}
                                                    	?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php }?>
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
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();
      if (filter_tgl =='' && filter_tgl2 !='') {
        window.location = "<?=base_url()?>gudang/gudang_barang/barang_stok/laporan_kartu_stok?alert=warning&msg=dari tanggal belum diisi";
      alert("dari tanggal belum diisi")
      }else if (filter_tgl !='' && filter_tgl2=='') {
        window.location = "<?=base_url()?>gudang/gudang_barang/barang_stok/laporan_kartu_stok?alert=warning&msg=sampai tanggal belum diisi";
      }else if (filter_tgl =='' && filter_tgl2=='') {
        window.location = "<?=base_url()?>gudang/gudang_barang/barang_stok/laporan_kartu_stok?alert=warning&msg=form periode harus diisi";
      }else{
        var newFilterTgl = filter_tgl.split("/")[2]+"-"+filter_tgl.split("/")[1]+"-"+filter_tgl.split("/")[0];
        var newFilterTgl2 = filter_tgl2.split("/")[2]+"-"+filter_tgl2.split("/")[1]+"-"+filter_tgl2.split("/")[0];

        window.location = "<?=base_url()?>gudang/gudang_barang/barang_stok/laporan_kartu_stok/index/"+newFilterTgl+"/"+newFilterTgl2;
      }
    })
    $('#export').click(function () {
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();
     if (filter_tgl =='' && filter_tgl2 !='') {
        window.location = "<?=base_url()?>gudang/gudang_barang/barang_stok/laporan_kartu_stok?alert=warning&msg=dari tanggal belum diisi";
      alert("dari tanggal belum diisi")
      }else if (filter_tgl !='' && filter_tgl2=='') {
        window.location = "<?=base_url()?>gudang/gudang_barang/barang_stok/laporan_kartu_stok?alert=warning&msg=sampai tanggal belum diisi";
      }else if (filter_tgl =='' && filter_tgl2=='') {
        window.location = "<?=base_url()?>gudang/gudang_barang/barang_stok/laporan_kartu_stok?alert=warning&msg=form periode harus diisi";
      }else{
        var url = "<?=base_url()?>gudang/gudang_barang/barang_stok/laporan_kartu_stok/pdf_laporan_kartu_stok/"+filter_tgl.split("/")[2]+"-"+filter_tgl.split("/")[1]+"-"+filter_tgl.split("/")[0]+"/"+filter_tgl2.split("/")[2]+"-"+filter_tgl2.split("/")[1]+"-"+filter_tgl2.split("/")[0];
        window.open(url, 'gudang/gudang_barang/barang_stok/laporan_kartu_stok/pdf_laporan_kartu_stok', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    })
    
  })
</script>