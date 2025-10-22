<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Keluar</title>
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
                    <h5 class="m-b-10">Data Sample Keluar</h5>
                  </div>
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fas fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Gudang</a></li>
                    <li class="breadcrumb-item active">Sample Keluar</li>
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
                      <h5><i class="fas fa-boxes me-2"></i>Data Sample Keluar</h5>
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
                          <input type="text" id="filter_tgl" value="<?= $tgl == null ? '' : $tgl ?>" class="form-control datepicker" placeholder="Dari Tanggal" autocomplete="off">
                          <input type="text" id="filter_tgl2" value="<?= $tgl2 == null ? '' : $tgl2 ?>" class="form-control datepicker" placeholder="Sampai Tanggal" autocomplete="off">
                          <div class="input-group-append">
                            <button class="btn btn-secondary" id="lihat" type="button">
                              <i class="fas fa-eye me-1"></i> Lihat
                            </button>
                            <button class="btn btn-primary" id="export" type="button">
                              <i class="fas fa-print me-1"></i> Cetak
                            </button>
                            <a href="<?=base_url()?>gudang/sample_masuk" class="btn btn-warning" id="refresh" type="button">
                              <i class="fas fa-refresh"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-block table-border-style">
                      <?php if (!empty($_GET['msg'])): ?>
                        <div class="alert alert-<?= $_GET['alert'] ?? 'info' ?> alert-dismissible fade show" role="alert">
                          <?= $_GET['msg'] ?>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      <?php endif; ?>

                      <div class="table-responsive">
                        <table class="table datatable table-hover table-striped table-sm">
                          <thead>
                            <tr>
                              <th class="text-center">No</th>
                              <th>Tanggal Masuk</th>
                              <th>Kode Sample</th>
                              <th>Nama Barang</th>
                              <th>Nama Customer</th>
                              <th>ID Barang</th>
                              <th class="text-center">Jumlah</th>
                              <th class="text-center">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if (!empty($result)): ?>
                              <?php $no = 1; foreach ($result as $row): ?>
                                <tr>
                                  <td class="text-center"><?= $no++ ?></td>
                                  <td>
                                    <?php 
                                    if (!empty($row['tgl_masuk_sample'])) {
                                      $tglParts = explode('-', $row['tgl_masuk_sample']);
                                      if (count($tglParts) === 3) {
                                        echo $tglParts[2] . "/" . $tglParts[1] . "/" . $tglParts[0];
                                      } else {
                                        echo $row['tgl_masuk_sample'];
                                      }
                                    } else {
                                      echo '-';
                                    }
                                    ?>
                                  </td>
                                  <td>
                                    <?php if (!empty($row['kode_sample_out'])): ?>
                                      <span class="badge bg-primary"><?= $row['kode_sample_out'] ?></span>
                                    <?php else: ?>
                                      -
                                    <?php endif; ?>
                                  </td>
                                  <td><?= $row['nama_barang'] ?? '-' ?></td>
                                  <td><?= $row['nama_customer'] ?? '-' ?></td>
                                  <td><?= $row['id_barang'] ?? '-' ?></td>
                                  <td class="text-center">
                                    <?php 
                                    if (isset($row['jumlah_masuk'])) {
                                      echo '<span class="badge bg-success">' . number_format($row['jumlah_masuk'], 0, ",", ".") . '</span>';
                                    } else {
                                      echo '-';
                                    }
                                    ?>
                                  </td>
                                 
                                  <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <button type="button" 
                                        class="btn btn-info btn-sm" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#detailModal"
                                        data-id_sample_masuk="<?= $row['id_sample_masuk'] ?? '' ?>"
                                        data-tgl_masuk_sample="<?= $row['tgl_masuk_sample'] ?? '' ?>"
                                        data-kode_sample_out="<?= $row['kode_sample_out'] ?? '' ?>"
                                        data-nama_barang="<?= $row['nama_barang'] ?? '' ?>"
                                        data-nama_customer="<?= $row['nama_customer'] ?? '' ?>"
                                        data-id_barang="<?= $row['id_barang'] ?? '' ?>"
                                        data-jumlah_masuk="<?= $row['jumlah_masuk'] ?? '' ?>"
                                       
                                        data-ket_masuk="<?= $row['ket_masuk'] ?? '' ?>"
                                        data-gudang_admin="<?= $row['gudang_admin'] ?? '' ?>"
                                      >
                                        <i class="fas fa-eye me-1"></i> Detail
                                      </button>
                                    </div>
                                  </td>
                                </tr>
                              <?php endforeach; ?>
                            <?php else: ?>
                              <tr>
                                <td colspan="9" class="text-center no-data">
                                  <i class="fas fa-inbox fa-3x mb-3 text-muted"></i>
                                  <p class="mb-0">Belum ada data sample keluar.</p>
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

  <!-- Modal Detail Sample Masuk -->
  <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detailModalLabel">
            <i class="fas fa-info-circle me-2"></i>Detail Sample Keluar
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Kode Sample Out</label>
              <input type="text" class="form-control" id="v-kode_sample_out" readonly>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">Tanggal Masuk Sample</label>
              <input type="text" class="form-control" id="v-tgl_masuk_sample" readonly>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">Nama Barang</label>
              <input type="text" class="form-control" id="v-nama_barang" readonly>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">ID Barang</label>
              <input type="text" class="form-control" id="v-id_barang" readonly>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">Nama Customer</label>
              <input type="text" class="form-control" id="v-nama_customer" readonly>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">Jumlah Masuk</label>
              <input type="text" class="form-control" id="v-jumlah_masuk" readonly>
            </div>


            <div class="col-md-6 mb-3">
              <label class="form-label">Gudang Admin</label>
              <input type="text" class="form-control" id="v-gudang_admin" readonly>
            </div>

            <div class="col-md-12 mb-3">
              <label class="form-label">Keterangan Masuk</label>
              <textarea class="form-control" id="v-ket_masuk" rows="3" readonly></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="fas fa-times me-1"></i> Tutup
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.id.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      // Inisialisasi datepicker
      $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        language: 'id',
        autoclose: true,
        todayHighlight: true
      });

      // Filter Lihat
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

      // Export PDF
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

      // Modal Detail
      var detailModal = document.getElementById('detailModal');
      detailModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        
        // Ambil data dari atribut data-*
        var tgl_masuk_sample = button.getAttribute('data-tgl_masuk_sample');
        var kode_sample_out = button.getAttribute('data-kode_sample_out');
        var nama_barang = button.getAttribute('data-nama_barang');
        var nama_customer = button.getAttribute('data-nama_customer');
        var id_barang = button.getAttribute('data-id_barang');
        var jumlah_masuk = button.getAttribute('data-jumlah_masuk');
        var ket_masuk = button.getAttribute('data-ket_masuk');
        var gudang_admin = button.getAttribute('data-gudang_admin');

        // Format tanggal jika perlu
        if (tgl_masuk_sample) {
          var tglParts = tgl_masuk_sample.split('-');
          if (tglParts.length === 3) {
            tgl_masuk_sample = tglParts[2] + "/" + tglParts[1] + "/" + tglParts[0];
          }
        }

        // Format jumlah masuk
        if (jumlah_masuk) {
          jumlah_masuk = Number(jumlah_masuk).toLocaleString('id-ID');
        }

        // Set nilai ke modal
        document.getElementById('v-tgl_masuk_sample').value = tgl_masuk_sample || '-';
        document.getElementById('v-kode_sample_out').value = kode_sample_out || '-';
        document.getElementById('v-nama_barang').value = nama_barang || '-';
        document.getElementById('v-nama_customer').value = nama_customer || '-';
        document.getElementById('v-id_barang').value = id_barang || '-';
        document.getElementById('v-jumlah_masuk').value = jumlah_masuk || '-';
        document.getElementById('v-no_pengiriman').value = no_pengiriman || '-';
        
        document.getElementById('v-gudang_admin').value = gudang_admin || '-';
      });
    });
  </script>

</body>
</html>