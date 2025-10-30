<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Sample Stok</title>
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
            padding: 15px 20px;
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
            padding: 12px 15px;
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
<body></body>

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
                <ul class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="<?= base_url() ?>"><i class="feather icon-home"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:">Laporan Kartu Sample</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <div class="main-body">
          <div class="page-wrapper">
            <div class="row">

              <div class="col-xl-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Laporan Kartu Sample</h5>
                    <div class="float-right">
                      <div class="input-group">
                        <?php 
                          function newDate($date){
                            return explode('-', $date)[2]."/".explode('-', $date)[1]."/".explode('-', $date)[0];
                          }
                        ?>
                        <input type="text" id="filter_tgl" value="<?= $tgl==null?'':newDate($tgl) ?>" class="form-control datepicker" placeholder="Filter dari tanggal" autocomplete="off">
                        <input type="text" id="filter_tgl2" value="<?= $tgl2==null?'':newDate($tgl2) ?>" class="form-control datepicker" placeholder="Filter sampai tanggal" autocomplete="off">
                        <div class="input-group-append">
                          <button class="btn btn-secondary" id="lihat" type="button">Lihat</button>
                          <button class="btn btn-primary" id="export" type="button">Cetak</button>
                          <a href="<?= base_url() ?>gudang/gudang_sample/laporan_kartu_sample" class="btn btn-warning" type="button">
                            <i class="feather icon-refresh-ccw"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card-block table-border-style">
                    <?php 
                      if ($tgl == null) {
                        echo '<div class="text-center">Isi Form Periode Terlebih Dahulu</div>';
                      } else {
                    ?>
                    <div class="table-responsive">
                      <table class="table datatable table-bordered table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th rowspan="2">#</th>
                            <th rowspan="2">Kode Sample</th>
                            <th rowspan="2">Nama Sample</th>
                            <th rowspan="2" class="text-right">Stok Sebelum <?= $tgl==null?'':newDate($tgl) ?></th>
                            <th colspan="3" class="text-center"><?= $tgl==null?'':newDate($tgl) ?> - <?= $tgl2==null?'':newDate($tgl2) ?></th>
                          </tr>
                          <tr>
                            <th class="text-right">Masuk</th>
                            <th class="text-right">Keluar</th>
                            <th class="text-right">Stok Aktual</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $no = 1;
                            foreach ($result as $k) { 
                              $aktual = ($k['stok'] ?? 0) + ($k['masuk'] ?? 0) - ($k['keluar'] ?? 0);
                          ?>
                          <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $k['kode_barang'] ?></td>
                            <td><?= $k['nama_barang'] ?></td>
                            <td class="text-right"><?= number_format($k['stok'] ?? 0, 0, ",", ".") ?> <?= $k['satuan'] ?></td>
                            <td class="text-right"><?= number_format($k['masuk'] ?? 0, 0, ",", ".") ?> <?= $k['satuan'] ?></td>
                            <td class="text-right"><?= number_format($k['keluar'] ?? 0, 0, ",", ".") ?> <?= $k['satuan'] ?></td>
                            <td class="text-right"><?= number_format($aktual, 0, ",", ".") ?> <?= $k['satuan'] ?></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
$(document).ready(function() {
  $('#lihat').click(function () {
    var tgl1 = $('#filter_tgl').val();
    var tgl2 = $('#filter_tgl2').val();

    if (tgl1 == '' || tgl2 == '') {
      alert("Harap isi kedua tanggal terlebih dahulu");
      return;
    }

    var newTgl1 = tgl1.split("/")[2]+"-"+tgl1.split("/")[1]+"-"+tgl1.split("/")[0];
    var newTgl2 = tgl2.split("/")[2]+"-"+tgl2.split("/")[1]+"-"+tgl2.split("/")[0];
    window.location = "<?= base_url() ?>gudang/gudang_sample/laporan_kartu_sample/index/"+newTgl1+"/"+newTgl2;
  });

  $('#export').click(function () {
    var tgl1 = $('#filter_tgl').val();
    var tgl2 = $('#filter_tgl2').val();

    if (tgl1 == '' || tgl2 == '') {
      alert("Harap isi kedua tanggal terlebih dahulu");
      return;
    }

    var url = "<?= base_url() ?>gudang/gudang_sample/laporan_kartu_sample/pdf_laporan_kartu_stok/"
              + tgl1.split("/")[2]+"-"+tgl1.split("/")[1]+"-"+tgl1.split("/")[0]
              + "/"
              + tgl2.split("/")[2]+"-"+tgl2.split("/")[1]+"-"+tgl2.split("/")[0];

    window.open(url, 'laporan_kartu_sample_pdf', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
  });
});
</script>