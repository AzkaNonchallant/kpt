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
                    <h5 class="m-b-10">Data Stock Sample</h5>
                  </div>
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fas fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Gudang</a></li>
                    <li class="breadcrumb-item active">Stock Sample</li>
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
                      <h5><i class="fas fa-boxes me-2"></i>Data Stock Sample</h5>
                      <div class="float-right">
                        <div class="input-group">
                          <select class="form-control chosen-select" id="filter_barang" name="filter_barang">
                            <option value="" disabled selected hidden>- Nama Barang -</option>
                            <?php if (isset($res_barang)): ?>
                              <?php foreach ($res_barang as $rb): ?>
                                <option value="<?= $rb['nama_barang'] ?>">
                                  <?= $rb['nama_barang'] ?>
                                </option>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                          <select class="form-control chosen-select" id="filter_customer" name="filter_customer">
                            <option value="" disabled selected hidden>- Nama Customer -</option>
                            <?php if (isset($res_customer)): ?>
                              <?php foreach ($res_customer as $rc): ?>
                                <option value="<?= $rc['nama_customer'] ?>">
                                  <?= $rc['nama_customer'] ?>
                                </option>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                          <div class="input-group-append">
                            <button class="btn btn-secondary" id="lihat" type="button">
                              <i class="fas fa-eye me-1"></i> Lihat
                            </button>
                            <button class="btn btn-primary" id="export" type="button">Cetak</button>
                            <a href="<?= base_url() ?>gudang/gudang_sample/sample_stock/pdf_stock_sample" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
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
                        <table class="table datatable table-hover table-striped table-sm" id="table-stock">
                          <thead>
                            <tr>
                              <th class="text-center">No</th>
                              <th>No Batch</th>
                              <th>Kode Sample</th>
                              <th>Nama Barang</th>
                              <th>Nama Customer</th>
                              <th class="text-center">Total Masuk</th>
                              <th class="text-center">Total Keluar</th>
                              <th class="text-center">Stok Akhir</th>

                            </tr>
                          </thead>
                          <tbody>
                            <?php if (!empty($result)): ?>
                              <?php foreach ($result as $row): ?>
                                <tr>
                                  <td class="text-center"><?= $row['no'] ?></td>
                                  <td>
                                    <?php if (!empty($row['no_batch'])): ?>
                                      <span class="badge bg-primary"><?= $row['no_batch'] ?></span>
                                    <?php else: ?>
                                      -
                                    <?php endif; ?>
                                  </td>
                                  <td><?= $row['kode_sample_in'] ?? '-' ?></td>
                                  <td><?= $row['nama_barang'] ?? '-' ?></td>
                                  <td><?= $row['nama_customer'] ?? '-' ?></td>
                                  <td class="text-center">
                                    <span class="badge bg-success"><?= number_format($row['jumlah_masuk'], 0, ",", ".") ?></span>
                                  </td>
                                  <td class="text-center">
                                    <span class="badge bg-warning"><?= number_format($row['jumlah_keluar'], 0, ",", ".") ?></span>
                                  </td>
                                  <td class="text-center">
                                    <span class="badge bg-<?= $row['stok'] > 0 ? 'info' : 'danger' ?>">
                                      <?= number_format($row['stok'], 0, ",", ".") ?>
                                    </span>
                                  </td>

                                </tr>
                              <?php endforeach; ?>
                            <?php else: ?>
                              <tr>
                                <td colspan="9" class="text-center no-data">
                                  <i class="fas fa-inbox fa-3x mb-3 text-muted"></i>
                                  <p class="mb-0">Belum ada data stock sample.</p>
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

  <!-- Modal Detail Stock Sample -->
  <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail Stock Sample - Batch: <span id="detailBatch"></span></h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Summary -->
          <div class="row mb-4">
            <div class="col-md-3">
              <div class="info-box bg-success">
                <span class="info-box-icon"><i class="fa fa-box"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Masuk</span>
                  <span class="info-box-number" id="totalMasuk">0</span>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="info-box bg-warning">
                <span class="info-box-icon"><i class="fa fa-share"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Keluar</span>
                  <span class="info-box-number" id="totalKeluar">0</span>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="info-box bg-info">
                <span class="info-box-icon"><i class="fa fa-cubes"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Stok Akhir</span>
                  <span class="info-box-number" id="stokAkhir">0</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Data Masuk -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Sample Masuk</h3>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-sm">
                <thead>
                  <tr>
                    <th>Tanggal Masuk</th>
                    <th>Kode Sample</th>
                    <th>Jumlah Masuk</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody id="tbodyMasuk">
                  <!-- Data akan diisi oleh JavaScript -->
                </tbody>
              </table>
            </div>
          </div>

          <!-- Data Keluar -->
          <div class="card card-warning mt-3">
            <div class="card-header">
              <h3 class="card-title">Data Sample Keluar</h3>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-sm">
                <thead>
                  <tr>
                    <th>Tanggal Keluar</th>
                    <th>Kode Sample</th>
                    <th>Jumlah Keluar</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody id="tbodyKeluar">
                  <!-- Data akan diisi oleh JavaScript -->
                </tbody>
              </table>
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
      $('#lihat').click(function() {
        var filter_barang = $('#filter_barang').find(':selected').val();
        var filter_customer = $('#filter_customer').find(':selected').val();

        const query = new URLSearchParams({
          nama_barang: filter_barang,
          nama_customer: filter_customer
        })

        window.location = "<?= base_url() ?>sample_stock?" + query.toString()
      });

      // Export PDF
      $('#export').click(function() {
        var filter_barang = $('#filter_barang').find(':selected').val();
        var filter_customer = $('#filter_customer').find(':selected').val();

        const query = new URLSearchParams({
          nama_barang: filter_barang,
          nama_customer: filter_customer
        })

        var url = "<?= base_url() ?>gudang/gudang_sample/sample_stock/pdf_stock_sample?" + query.toString();
        window.open(url, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      });

      // Detail Button Click
      $('.btn-detail').click(function() {
        var noBatch = $(this).data('batch');
        loadDetailData(noBatch);
      });

      function loadDetailData(noBatch) {
        $.ajax({
          url: '<?= site_url('sample_stock/get_detail_batch') ?>',
          type: 'GET',
          data: {
            no_batch: noBatch
          },
          dataType: 'json',
          success: function(response) {
            if (!response.error) {
              // Set header
              $('#detailBatch').text(response.no_batch);
              $('#totalMasuk').text(response.total_masuk.toLocaleString('id-ID'));
              $('#totalKeluar').text(response.total_keluar.toLocaleString('id-ID'));
              $('#stokAkhir').text(response.stok_akhir.toLocaleString('id-ID'));

              // Isi data masuk
              var tbodyMasuk = $('#tbodyMasuk');
              tbodyMasuk.empty();
              if (response.masuk_list.length > 0) {
                $.each(response.masuk_list, function(index, item) {
                  // Format tanggal
                  var tglMasuk = '-';
                  if (item.tgl_masuk_sample) {
                    var tglParts = item.tgl_masuk_sample.split('-');
                    if (tglParts.length === 3) {
                      tglMasuk = tglParts[2] + "/" + tglParts[1] + "/" + tglParts[0];
                    }
                  }

                  tbodyMasuk.append(
                    '<tr>' +
                    '<td>' + tglMasuk + '</td>' +
                    '<td>' + (item.kode_sample_in || '-') + '</td>' +
                    '<td class="text-center"><span class="badge bg-success">' + (item.jumlah_masuk || '0') + '</span></td>' +
                    '<td>' + (item.ket_masuk || '-') + '</td>' +
                    '</tr>'
                  );
                });
              } else {
                tbodyMasuk.append('<tr><td colspan="4" class="text-center">Tidak ada data</td></tr>');
              }

              // Isi data keluar
              var tbodyKeluar = $('#tbodyKeluar');
              tbodyKeluar.empty();
              if (response.keluar_list.length > 0) {
                $.each(response.keluar_list, function(index, item) {
                  // Format tanggal
                  var tglKeluar = '-';
                  if (item.tgl_keluar_sample) {
                    var tglParts = item.tgl_keluar_sample.split('-');
                    if (tglParts.length === 3) {
                      tglKeluar = tglParts[2] + "/" + tglParts[1] + "/" + tglParts[0];
                    }
                  }

                  tbodyKeluar.append(
                    '<tr>' +
                    '<td>' + tglKeluar + '</td>' +
                    '<td>' + (item.kode_sample_out || '-') + '</td>' +
                    '<td class="text-center"><span class="badge bg-warning">' + (item.jumlah_keluar || '0') + '</span></td>' +
                    '<td>' + (item.ket_keluar || '-') + '</td>' +
                    '</tr>'
                  );
                });
              } else {
                tbodyKeluar.append('<tr><td colspan="4" class="text-center">Tidak ada data</td></tr>');
              }

              // Show modal
              var modal = new bootstrap.Modal(document.getElementById('modalDetail'));
              modal.show();
            }
          }
        });
      }
    });
  </script>

</body>

</html>