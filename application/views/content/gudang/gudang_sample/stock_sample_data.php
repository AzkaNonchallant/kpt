<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Masuk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        
        .sample-container {
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
        }
        
        .alert {
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid transparent;
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
                    <!-- <h5 class="m-b-10">Data Sample Masuk</h5> -->
                  </div>
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="javascript:">Sample Masuk</a></li>
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
                      <h5>Data Sample Masuk</h5>
                      <div class="float-right">
                        <div class="input-group">
                          <select class="form-control chosen-select" id="filter_barang" name="filter_barang">
                            <option value="" disabled selected hidden>- Nama Barang -</option>
                            <?php foreach ($res_barang as $rb): ?>
                              <option <?= $nama_barang === $rb['nama_barang'] ? 'selected' : '' ?> value="<?= $rb['nama_barang'] ?>">
                                <?= $rb['nama_barang'] ?>
                              </option>
                            <?php endforeach; ?>
                          </select>
                          <select class="form-control chosen-select" id="filter_customer" name="filter_customer">
                            <option value="" disabled selected hidden>- Nama Customer -</option>
                            <?php foreach ($res_customer as $rc): ?>
                              <option <?= $nama_customer === $rc['nama_customer'] ? 'selected' : '' ?> value="<?= $rc['nama_customer'] ?>">
                                <?= $rc['nama_customer'] ?>
                              </option>
                            <?php endforeach; ?>
                          </select>
                          
                          <div class="input-group-append">
                            <button class="btn btn-secondary" id="lihat" type="button">Lihat</button>
                            <button class="btn btn-primary" id="export" type="button">Cetak</button>
                            <a href="<?=base_url()?>gudang/sample_masuk" style="width: 40px;" class="btn btn-warning" id="refresh" type="button">
                              <i class="feather icon-refresh-ccw"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-block table-border-style">
                      <?php if (!empty($_GET['msg'])): ?>
                        <div class="alert alert-<?= $_GET['alert'] ?? 'info' ?>">
                          <?= $_GET['msg'] ?>
                        </div>
                      <?php endif; ?>

                      <div class="table-responsive">
                        <table class="table datatable table-hover table-striped table-sm">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Barang</th>
                              <th>Nama Gudang</th>
                              <th class="text-center">Jumlah</th>
                              <th>IN</th>
                              <th>OUT</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                            <?php if (!empty($result)): ?>
                              <?php $no = 1; foreach ($result as $row): ?>
                                <tr>
                                  <td class="text-center"><?= $no++ ?></td>
                                 
                                  
                                  <td><?= $row['nama_barang'] ?? '-' ?></td>
                                  <td><?= $row['nama_customer'] ?? '-' ?></td>
                                  <td class="text-center">
                                    <?php 
                                    if (isset($row['jumlah_masuk'])) {
                                      echo number_format($row['jumlah_masuk'], 0, ",", ".");
                                    } else {
                                      echo '-';
                                    }
                                    ?>
                                  </td>
                                  <td>-</td>
                                  <td>-</td>
                                </tr>
                              <?php endforeach; ?>
                            <?php else: ?>
                              <tr>
                                <td colspan="9" class="text-center no-data">
                                  Belum ada data sample masuk.
                                </td>
                              </tr>
                            <?php endif; ?>
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

        if (filter_tgl == '' && filter_tgl2 != '') {
          window.location = "<?=base_url()?>gudang/sample_masuk?alert=warning&msg=dari tanggal belum diisi";
        } else if (filter_tgl != '' && filter_tgl2 == '') {
          window.location = "<?=base_url()?>gudang/sample_masuk?alert=warning&msg=sampai tanggal belum diisi";
        } else {
          const query = new URLSearchParams({
            nama_barang: filter_barang,
            nama_customer: filter_customer,
            date_from: filter_tgl,
            date_until: filter_tgl2
          })

          window.location = "<?=base_url() ?>gudang/sample_masuk?" + query.toString()
        }
      });

      $('#export').click(function () {
        var filter_barang = $('#filter_barang').find(':selected').val();
        var filter_customer = $('#filter_customer').find(':selected').val();
        var filter_tgl = $('#filter_tgl').val();
        var filter_tgl2 = $('#filter_tgl2').val();

        if (filter_tgl == '' && filter_tgl2 != '') {
          alert("Dari tanggal belum diisi");
        } else if (filter_tgl != '' && filter_tgl2 == '') {
          alert("Sampai tanggal belum diisi");
        } else {
          const query = new URLSearchParams({
            nama_barang: filter_barang,
            nama_customer: filter_customer,
            date_from: filter_tgl,
            date_until: filter_tgl2
          })
          
          var url = "<?= base_url() ?>gudang/sample_masuk/pdf_sample_masuk?" + query.toString();
          window.open(url, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
        }
      });
    });
  </script>

</body>
</html>