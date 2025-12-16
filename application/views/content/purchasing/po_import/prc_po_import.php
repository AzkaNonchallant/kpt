<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Master Customer</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary: #4361ee;
      --cust: #436;
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

    .customer-container {
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
      position: center;
      width: 100%;
      border: none;
      border-radius: var(--border-radius);
      box-shadow: var(--box-shadow);
      margin-bottom: 25px;
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
    }

    .btn-sm {
      padding: 5px 10px;
      font-size: 12px;
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
      font-size: 13px;
      letter-spacing: 0.2px;
      line-height: 1.4;
      white-space: nowrap;
    }


    .table tbody td {
      padding: 12px 15px;
      vertical-align: middle;
      border-bottom: 1px solid var(--light-gray);
      white-space: nowrap;
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

    .table thead th:nth-child(1),
    .table tbody td:nth-child(1) {
      width: 50px;
      text-align: center;
    }

    .table thead th:nth-child(2),
    .table tbody td:nth-child(2) {
      width: 120px;
    }

    .table thead th:nth-child(3),
    .table tbody td:nth-child(3) {
      width: 150px;

    }

    .table thead th:nth-child(4),
    .table tbody td:nth-child(4) {
      width: 100px;

    }

    .table thead th:nth-child(5),
    .table tbody td:nth-child(5) {
      width: 200px;
      text-align: center;
    }

    .badge {
      padding: 6px 12px;
      border-radius: 20px;
      font-weight: 600;
      font-size: 12px;
    }

    .badge-success {
      background-color: rgba(76, 201, 240, 0.1);
      color: var(--success);
    }

    .badge-primary {
      background-color: rgba(67, 97, 238, 0.1);
      color: var(--primary);
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
      padding: 15px 20px;
    }

    .modal-up {
      background: linear-gradient(135deg, var(--upd), var(--warning));
      color: white;
      border-radius: var(--border-radius) var(--border-radius) 0 0;
      padding: 15px 20px;
    }

    .modal-cust {
      background: linear-gradient(135deg, var(--cust), var(--secondary));
      color: white;
      border-radius: var(--border-radius) var(--border-radius) 0 0;
      padding: 15px 20px;
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
    }

    .invalid-feedback {
      font-size: 12px;
      margin-top: 5px;
    }

    .action-buttons {
      display: flex;
      justify-content: center;
      flex-wrap: nowrap;
      gap: 5px;
    }

    .table .btn-sm {
      padding: 4px 8px;
      font-size: 11px;
      line-height: 1.2;
      white-space: nowrap;
      min-height: 28px;
    }

    .table .btn {
      padding: 5px 10px;
      font-size: 12px;
    }

    .table .btn i {
      font-size: 11px;
      margin-right: 3px;
    }

    .btn-detail {
      min-width: 70px;
    }

    .btn-action {
      min-width: 60px;
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
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="javascript:">Purchasing</a></li>
                    <li class="breadcrumb-item"><a href="javascript:">PO Import</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('Purchasing/PO_Import/Prc_po_import') ?>">PO
                        Import</a></li>
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

                      <h5>Data PO Import <b>(Approval)</b></h5>



                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal"
                        data-target="#add">
                        <i class="feather icon-plus"></i>Tambah Data
                      </button>
                    </div>
                    <div class="card-block table-border-style">
                      <div class="table-responsive">
                        <table class="table datatable table-hover table-striped table-sm">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th class="text-center">Tanggal</th>
                              <th class="text-center">No PO Import</th>
                              <th class="text-center">Status</th>
                              <th class="text-center">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $level = $this->session->userdata('level');
                            $no = 1;
                            foreach ($result as $k) {
                              $tgl_po_import = explode('-', $k['tgl_po_import'])[2] . "/" . explode('-', $k['tgl_po_import'])[1] . "/" . explode('-', $k['tgl_po_import'])[0];
                              ?>
                             <tr>
    <th scope="row"><?= $no++ ?></th>

    <td class="text-center">
        <?= $tgl_po_import ?>
    </td>

    <td>
        <div class="action-buttons">
            <span type="button" class="btn btn-info btn-sm"
                data-toggle="modal"
                data-target="#detail"
                data-id_prc_po_import_tf="<?= $k['id_prc_po_import_tf'] ?>"
                data-no_po_import="<?= $k['no_po_import'] ?>"
                data-tgl_po_import="<?= $tgl_po_import ?>"
                data-pic1="<?= $k['pic1'] ?>"
                data-pic2="<?= $k['pic2'] ?>"
                data-payment="<?= $k['payment'] ?>">
                <i class=""></i><?= $k['no_po_import'] ?>
            </span>
        </div>
    </td>

    <td>
        <?php if ($k['status_po_import'] == 'Proses'): ?>
            <span class="badge badge-warning"><?= $k['status_po_import'] ?></span>
        <?php elseif ($k['status_po_import'] == 'Selesai'): ?>
            <span class="badge badge-success"><?= $k['status_po_import'] ?></span>
        <?php else: ?>
            <span class="badge badge-primary"><?= $k['status_po_import'] ?></span>
        <?php endif; ?>
    </td>

    <td class="text-center">
        <?php if (strtolower($k['status_po_import']) == 'proses'): ?>
            <div class="action-buttons">
                <button type="button" class="btn btn-primary btn-sm"
                    data-toggle="modal"
                    data-target="#edit"
                    data-id_prc_po_import_tf="<?= $k['id_prc_po_import_tf'] ?>"
                    data-prc_admin="<?= $k['prc_admin'] ?>"
                    data-no_po_import="<?= $k['no_po_import'] ?>"
                    data-tgl_po_import="<?= $tgl_po_import ?>"
                    data-metode="<?= $k['metode'] ?>"
                    data-pic1="<?= $k['pic1'] ?>"
                    data-pic2="<?= $k['pic2'] ?>"
                    data-payment="<?= $k['payment'] ?>">
                    <i class="feather icon-edit-2"></i>Edit
                </button>

                <a href="<?= base_url() ?>purchasing/po_import/delete/<?= $k['no_po_import'] ?>"
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('Apakah Anda Yakin?')">
                    <i class="feather icon-trash-2"></i>Hapus
                </a>
            </div>
        <?php endif; ?>
         <?php } ?>
    </td>
</tr>

                            <?php  ?>
                          </tbody>
                        </table>
                      </div>
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

  <!-- Modal Tambah -->
  <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">

        <!-- HEADER -->
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah PO Import</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <!-- FORM -->
        <form method="post" id="form_add" action="<?= base_url() ?>Purchasing/po_import/add/">
          <div class="modal-body">

            <!-- ROW 1 -->
            <div class="row">
              <!-- Tanggal -->
              <div class="col-md-3">
                <div class="form-group">
                  <label for="tgl_po_import">Tanggal PO Import</label>
                  <input type="text" class="form-control datepicker" id="tgl_po_import" name="tgl_po_import"
                         placeholder="Tanggal PO Import" autocomplete="off" required>
                </div>
              </div>

              <!-- Supplier -->
              <div class="col-md-3">
                <div class="form-group">
                  <label for="id_supplier">Supplier</label>
                  <select class="form-control chosen-select" id="id_supplier" name="id_supplier" required>
                    <option disabled selected hidden value="">- Pilih Supplier -</option>
                    <?php foreach ($res_supplier as $s) { ?>
                      <option value="<?= $s['id_supplier'] ?>"
                              data-nama_supplier="<?= $s['nama_supplier'] ?>"
                              data-pic_supplier="<?= $s['pic_supplier'] ?>"
                              data-no_po_import="<?= $s['kode_po'] ?>">
                        <?= $s['nama_supplier'] ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <!-- PIC Supplier -->
              <div class="col-md-3">
                <div class="form-group">
                  <label for="pic_supplier">PIC Supplier</label>
                  <input type="text" class="form-control" id="pic_supplier" name="pic_supplier"
                         placeholder="PIC Supplier" autocomplete="off" readonly>
                </div>
              </div>

              <!-- Kode PO -->
              <div class="col-md-3">
                <div class="form-group">
                  <label for="no_po_import">Kode PO</label>
                  <input type="text" class="form-control" id="no_po_import" name="no_po_import"
                         placeholder="Kode PO" autocomplete="off" readonly>
                </div>
              </div>
            </div>

            <!-- ROW 2 -->
            <div class="row">

              <!-- Metode -->
              <div class="col-md-3">
                <div class="form-group">
                  <label>Metode</label>
                  <select class="form-control chosen-select" id="metode" name="metode">
                    <option value="">- Pilih Metode -</option>
                    <option value="CIF SEA JAKARTA">CIF SEA JAKARTA</option>
                    <option value="C&F SEA JAKARTA">C & F SEA JAKARTA</option>
                  </select>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label for="pic1">PIC Kapsulindo 1</label>
                  <input type="text" class="form-control" id="pic1" name="pic1"
                         placeholder="PIC 1" autocomplete="off">
                </div>
              </div>

               <div class="col-md-3">
                <div class="form-group">
                  <label for="pic2">PIC Kapsulindo 2</label>
                  <input type="text" class="form-control" id="pic2" name="pic2"
                         placeholder="PIC 2" autocomplete="off">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label for="payment">Payment</label>
                  <input type="text" class="form-control datepicker" id="payment" name="payment"
                         placeholder="Tanggal payment" autocomplete="off" required>
                </div>
              </div>

              

              <!-- Checkbox Shipment -->
              <div class="col-md-4">
                <div class="form-group">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="use_ship" name="use_ship">
                    <label class="form-check-label" for="use_ship">
                      <i class="fas fa-calendar-alt"></i> Atur Tanggal Shipment
                    </label>
                  </div>
                </div>
              </div>

              <!-- Tanggal Shipment (Tersembunyi Default) -->
              <div class="col-md-3 shipment-date-section" style="display: none;">
                <div class="form-group">
                  <label for="shipment">Tanggal Shipment</label>
                  <input type="text" class="form-control datepicker" id="shipment" name="shipment"
                         placeholder="Pilih Tanggal" autocomplete="off">
                </div>
              </div>

              <input type="hidden" id="shipment2" name="shipment2" value="SECEPATNYA">

            
              

            </div>

            <!-- ROW 3 -->
            <div class="row">

              <!-- Nama Barang -->
              <div class="col-md-3">
                <div class="form-group">
                  <label for="id_barang">Nama Barang</label>
                  <select class="form-control chosen-select" id="id_barang" name="id_barang" required>
                    <option value="">- Pilih Barang -</option>
                  </select>
                </div>
              </div>

              <!-- Jumlah -->
              <div class="col-md-3">
                <div class="form-group">
                  <label for="jumlah">Jumlah</label>
                  <input type="text" class="form-control" id="jumlah" name="jumlah"
                         placeholder="Jumlah" autocomplete="off" required>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label class="form-label">Jumlah (kg)</label>
                  <input type="text" class="form-control" id="jumlah_po_pembelian" name="jumlah_po_pembelian" placeholder="Jumlah (Kg)" autocomplete="off" style="text-transform:uppercase" readonly>
                </div>
              </div>

              <!-- Satuan -->
              <div class="col-md-3">
                <div class="form-group">
                  <label for="satuan">Satuan</label>
                  <input type="text" class="form-control" id="satuan" name="satuan"
                         placeholder="Satuan" readonly>
                </div>
              </div>

            </div>

            <!-- ROW 4 -->
            <div class="row">

              <!-- Harga Perunit -->
              <div class="col-md-3">
                <div class="form-group">
                  <label for="harga_perunit">Harga Perunit</label>
                  <input type="text" class="form-control" id="harga_perunit" name="harga_perunit"
                         placeholder="Harga Perunit" autocomplete="off" oninput="calculateTotal()">
                </div>
              </div>

              <!-- Total Harga -->
              <div class="col-md-3">
                <div class="form-group">
                  <label for="total_harga">Total Harga</label>
                  <input type="text" class="form-control" id="total_harga" name="total_harga"
                         placeholder="Total Harga" readonly>
                </div>
              </div>

              <!-- Button Input -->
              <div class="col-md-1.5">
                <a href="javascript:void(0)" id="input" class="btn btn-primary" style="margin-top: 31px;">
                  <b class="text">Input</b>
                </a>
              </div>

            </div>

            <!-- TABLE -->
            <div class="table-responsive mt-3">
              <table class="table table-bordered table-sm">
                <thead>
                  <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga Perunit</th>
                    <th>Total Harga</th>
                    <th class="text-right">Hapus</th>
                  </tr>
                </thead>
                <tbody id="insert_batch"></tbody>
              </table>
            </div>

          </div>

          <!-- FOOTER -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            <button type="submit" id="simpan" class="btn btn-primary"
              onclick="return confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Cek Kembali, dan Jangan Lupa Menginputkan Barangnya');">
              Simpan
            </button>
          </div>

        </form>

      </div>
    </div>
  </div>

 <script>
    $(document).ready(function () {

      // === LOGIKA CHECKBOX SHIPMENT ===
      $('#use_ship').change(function () {
        if ($(this).is(':checked')) {
          // Tampilkan datepicker, reset shipment2 ke NULL
          $('.shipment-date-section').slideDown(300);
          $('#shipment').prop('required', true);
          // Saat checkbox dicentang, shipment2 menjadi NULL
          $('#shipment2').val('');
        } else {
          // Sembunyikan datepicker, set shipment2 ke "SECEPATNYA"
          $('.shipment-date-section').slideUp(300);
          $('#shipment').val('').prop('required', false);
          $('#shipment2').val('SECEPATNYA');
        }
      });

      // Saat tanggal shipment diubah
      $('#shipment').on('change', function () {
        if ($(this).val() !== '') {
          $('#shipment2').val(''); // Kosongkan shipment2
        }
      });

      // === FORMAT RUPIAH ===
      function formatRupiah(angka) {
        if (!angka) return '';
        let number_string = angka.toString().replace(/[^,\d]/g, ''),
          split = number_string.split(','),
          sisa = split[0].length % 3,
          rupiah = split[0].substr(0, sisa),
          ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
          let separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }
        return split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
      }

      function unformatRupiah(r) {
        if (!r) return 0;
        return parseInt(r.replace(/[^0-9]/g, ''), 10);
      }

      function formatDollar(angka) {
        if (!angka) return '$0';
        let number_string = angka.toString().replace(/[^,\d]/g, ''),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            dollar = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
        
        if (ribuan) {
            let separator = sisa ? ',' : '';
            dollar += separator + ribuan.join(',');
        }
        
        dollar = split[1] != undefined ? dollar + '.' + split[1] : dollar;
        return '$' + dollar;
      }

      function unformatDollar(angka) {
        if (!angka) return 0;
        // Hapus semua karakter non-digit kecuali koma dan titik
        let clean = angka.toString().replace(/[^\d.,]/g, '');
        // Untuk format Dolar: koma sebagai pemisah ribuan, titik sebagai desimal
        clean = clean.replace(/,/g, ''); // Hapus koma (pemisah ribuan)
        return parseFloat(clean) || 0;
      }

      function calculateTotal() {
        const jumlah = unformatRupiah($('#jumlah').val());
        const harga = unformatRupiah($('#harga_perunit').val());
        $('#total_harga').val(formatDollar(jumlah * harga));
      }

      function formatAngka(input) {
        let angka = input.value.replace(/\D/g, '');
        input.value = angka.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
      }

      $('#jumlah, #harga_perunit').on('input', function () {
        formatAngka(this);
        calculateTotal();
      });

      // === SUPPLIER CHANGE ===
      $('#id_supplier').on('change', function () {
        let selected = $(this).find(':selected');

        // FIX: ambil id supplier normal
        let id_supplier = selected.val();

        // FIX: ambil data dari data-attributes (bukan dari index string)
        let nama_supplier = selected.data('nama_supplier') || "";
        let pic_supplier = selected.data('pic_supplier') || "";
        let no_po_import = selected.data('no_po_import') || "";

        console.log("ID SUPPLIER:", id_supplier);

        $('#pic_supplier').val(pic_supplier);
        $('#no_po_import').val(no_po_import);

        $('#satuan').val('');

        // === GET BARANG DARI SUPPLIER ===
        $.ajax({
          url: "<?= base_url('purchasing/po_import/get_barang_by_supplier') ?>",
          type: "POST",
          data: { id_supplier: id_supplier },
          dataType: "json",
          success: function (res) {
            console.log("Res barang:", res);

            let html = '<option value="">-- Pilih Barang --</option>';
            res.forEach(item => {
              html += `
        <option 
            value="${item.id_barang}"
            data-satuan="${item.satuan}"
        >
            ${item.nama_barang}
        </option>
    `;
            });
            $('#id_barang').html(html).trigger("chosen:updated");


          },
          error: function (xhr, status, error) {
            console.error('Error:', error);
            alert('Gagal mengambil data barang.');
          }
        });

        // SIMPAN DI WINDOW UNTUK NANTI KE ROW
        window.active_supplier = nama_supplier;
        window.active_supplier_id = id_supplier;
        window.active_pic = pic_supplier;
        window.active_no_po_import = no_po_import;
      });

      // $('#metode').on('change', function () {
      //   const metode = $(this).val();

      //   if (!metode) {
      //       $('#shipment').val('');
      //       return;
      //   }

      //   // Ambil kata SEA atau AIR
      //   const match = metode.match(/SEA|AIR/i);
      //   const shipment = match ? match[0] : metode;

      //   $('#shipment').val(shipment);
      // });

      // === BARANG CHANGE ===
      $('#id_barang').on('change', function () {
        const selected = $(this).find(':selected');
        $('#satuan').val(selected.data('satuan'));
      });

      $('#jumlah').on('input', function() {
        let zak = unformatRupiah($(this).val());
        let kg = zak * 25; // 1 zak = 25kg
        $('#jumlah_po_pembelian').val(formatRupiah(kg));
        calculateTotal();
      });

      // === ADD TABLE ROW ===
      $('#input').on('click', function (e) {
        e.preventDefault();

        const id_barang = $('#id_barang').val();
        const nama_barang = $('#id_barang option:selected').text();
        const jumlah = $('#jumlah').val();
        const harga_perunit = $('#harga_perunit').val();
        const total_harga = $('#total_harga').val();
        const satuan = $('#satuan').val();

        if (!id_barang) return alert("Pilih barang dahulu.");
        if (!jumlah || jumlah == '0') return alert("Jumlah tidak boleh kosong.");

        const nextId = Date.now();

        $('#insert_batch').append(`
      <tr id="tr_${nextId}">
        <input type="hidden" name="id_barang[]" value="${id_barang}">
        <input type="hidden" name="id_supplier[]" value="${window.active_supplier_id}">
        <input type="hidden" name="nama_barang[]" value="${nama_barang}">
        <input type="hidden" name="nama_supplier[]" value="${window.active_supplier}">
        <input type="hidden" name="pic_supplier[]" value="${window.active_pic}">
        <input type="hidden" name="no_po_import[]" value="${window.active_no_po_import}">
        <input type="hidden" name="jumlah[]" value="${unformatRupiah(jumlah)}">
        <input type="hidden" name="harga_perunit[]" value="${unformatRupiah(harga_perunit)}">
        <input type="hidden" name="total_harga[]" value="${unformatDollar(total_harga)}">

        <td>${nama_barang}</td>
        
        <td>${jumlah} ${satuan}</td>
        <td>${formatRupiah(unformatRupiah(harga_perunit))}</td>
        <td>${formatDollar(unformatDollar(total_harga))}</td>
        <td class="text-right">
          <a href="javascript:void(0)" onclick="remove(${nextId})" class="text-danger">
            <i class="feather icon-trash-2"></i>
          </a>
        </td>
      </tr>
    `);

        $('#jumlah').val('');
        $('#harga_perunit').val('');
        $('#total_harga').val('');
      });

      window.remove = function (id) {
        $('#tr_' + id).remove();
      };

      // === LOGIKA UNTUK MODAL EDIT ===
      $('#edit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var shipment = button.data('shipment');
        var shipment2 = button.data('shipment2');
        
        console.log("Shipment data:", shipment, "Shipment2 data:", shipment2);
        
        // Jika ada tanggal shipment
        if (shipment && shipment !== '0000-00-00' && shipment !== null && shipment !== 'null') {
          $('#e-shipment').val(shipment);
          $('#e-shipment2').val('');
          $('#e-use_ship').prop('checked', true);
          $('.shipment-date-section-edit').show();
          console.log("Mode: Dengan tanggal shipment");
        } 
        // Jika ada keterangan shipment2
        else if (shipment2 && shipment2 !== 'null') {
          $('#e-shipment2').val(shipment2);
          $('#e-shipment').val('');
          $('#e-use_ship').prop('checked', false);
          $('.shipment-date-section-edit').hide();
          console.log("Mode: Dengan keterangan shipment2:", shipment2);
        } 
        // Default (tidak ada data)
        else {
          $('#e-shipment2').val('SECEPATNYA');
          $('#e-shipment').val('');
          $('#e-use_ship').prop('checked', false);
          $('.shipment-date-section-edit').hide();
          console.log("Mode: Default");
        }
        
        // Event handler untuk checkbox di modal edit
        $('#e-use_ship').off('change').on('change', function() {
          if ($(this).is(':checked')) {
            $('.shipment-date-section-edit').slideDown(300);
            $('#e-shipment2').val('');
          } else {
            $('.shipment-date-section-edit').slideUp(300);
            $('#e-shipment').val('');
            $('#e-shipment2').val('SECEPATNYA');
          }
        });

        // Saat tanggal shipment diubah di modal edit
        $('#e-shipment').off('change').on('change', function() {
          if ($(this).val() !== '') {
            $('#e-shipment2').val('');
          }
        });
      });

    });
  </script>

  <!-- Modal Edit -->
  <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit PO Import</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" id="form_add" action="<?= base_url() ?>purchasing/po_import/update/">
          <div class="modal-body">
            <input type="hidden" id="e-id_prc_po_import" name="id_prc_po_import_tf">
            <input type="hidden" id="e-prc_admin" name="prc_admin">
            <input type="hidden" id="e-shipment2" name="shipment2" value="SECEPATNYA">

            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="v-tgl_po_import">Tanggal PO Import</label>
                  <input type="text" class="form-control datepicker" id="e-tgl_po_import" name="tgl_po_import"
                    placeholder="Tanggal PO Import" autocomplete="off" required>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="v-no_po_import">No PO Import</label>
                  <input type="text" class="form-control" id="e-no_po_import" name="no_po_import" maxlength="20"
                    placeholder="No PO Import" aria-describedby="validationServer03Feedback" autocomplete="off"
                    readonly>
                  <div id="validationServer03Feedback" class="invalid-feedback">
                    Maaf Nomor PO Import sudah ada.
                  </div>
                </div>
              </div>
            </div>
            
            <div class="table-responsive">
              <table class="table table-bordered table-sm">
                <thead>
                  <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga Perunit</th>
                    <th>Total Harga</th>
                  </tr>
                </thead>
                <tbody id="e-ppb_po_barang"></tbody>
              </table>
            </div>

            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="v-metode">Metode</label>
                  <input type="text" class="form-control" id="e-metode" name="metode" placeholder="Metode" required>
                </div>
              </div>

              <!-- Checkbox Shipment untuk Edit -->
              <div class="col-md-4">
                <div class="form-group">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="e-use_ship" name="use_ship">
                    <label class="form-check-label" for="e-use_ship">
                      <i class="fas fa-calendar-alt"></i> Atur Tanggal Shipment
                    </label>
                  </div>
                </div>
              </div>

              <!-- Tanggal Shipment untuk Edit -->
              <div class="col-md-3 shipment-date-section-edit" style="display: none;">
                <div class="form-group">
                  <label for="e-shipment">Tanggal Shipment</label>
                  <input type="text" class="form-control datepicker" id="e-shipment" name="shipment"
                         placeholder="Pilih Tanggal" autocomplete="off">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label for="v-pic1">PIC Kapsulindo 1</label>
                  <input type="text" class="form-control" id="e-pic1" name="pic1" placeholder="Pic1" required>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label for="v-pic2">PIC Kapsulindo 2</label>
                  <input type="text" class="form-control" id="e-pic2" name="pic2" placeholder="Pic2" required>
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="v-payment">Tanggal Payment</label>
                <input type="text" class="form-control datepicker" id="e-payment" name="payment"
                  placeholder="Tanggal Payment" autocomplete="off" required>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="simpan" class="btn btn-primary"
              onclick="if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- jQuery untuk Modal Edit -->
  <script type="text/javascript">
    $(document).ready(function () {
      $('#edit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id_prc_po_import = button.data('id_prc_po_import_tf');
        var no_po_import = button.data('no_po_import');
        var tgl_po_import = button.data('tgl_po_import');
        var payment = button.data('payment');
        var metode = button.data('metode');
        var shipment = button.data('shipment');
        var shipment2 = button.data('shipment2');
        var pic1 = button.data('pic1');
        var pic2 = button.data('pic2');
        var prc_admin = button.data('prc_admin');

        $('#e-id_prc_po_import').val(id_prc_po_import);
        $('#e-prc_admin').val(prc_admin);
        $('#e-no_po_import').val(no_po_import);
        $('#e-tgl_po_import').val(tgl_po_import);
        $('#e-payment').val(payment);
        $('#e-metode').val(metode);
        $('#e-pic1').val(pic1);
        $('#e-pic2').val(pic2);

        // LOGIKA SHIPMENT UNTUK EDIT
        if (shipment && shipment !== '0000-00-00' && shipment !== null) {
          // Jika ada tanggal shipment
          $('#e-shipment').val(shipment);
          $('#e-shipment2').val('');
          $('#e-use_ship').prop('checked', true);
          $('.shipment-date-section-edit').show();
        } else if (shipment2) {
          // Jika ada keterangan shipment2
          $('#e-shipment2').val(shipment2);
          $('#e-shipment').val('');
          $('#e-use_ship').prop('checked', false);
          $('.shipment-date-section-edit').hide();
        } else {
          // Default
          $('#e-shipment2').val('SECEPATNYA');
          $('#e-shipment').val('');
          $('#e-use_ship').prop('checked', false);
          $('.shipment-date-section-edit').hide();
        }

        // Event handler untuk checkbox di modal edit
        $('#e-use_ship').change(function() {
          if ($(this).is(':checked')) {
            $('.shipment-date-section-edit').slideDown(300);
            $('#e-shipment2').val('');
          } else {
            $('.shipment-date-section-edit').slideUp(300);
            $('#e-shipment').val('');
            $('#e-shipment2').val('SECEPATNYA');
          }
        });

        // Saat tanggal shipment diubah di modal edit
        $('#e-shipment').on('change', function() {
          if ($(this).val() !== '') {
            $('#e-shipment2').val('');
          }
        });

        

        $("#e-no_po_import").keyup(function () {
          var no_po_import = $("#e-no_po_import").val();
          jQuery.ajax({
            url: "<?= base_url() ?>purchasing/po_import/cek_no_po_import",
            dataType: 'text',
            type: "post",
            data: {
              no_po_import: no_po_import
            },
            success: function (response) {
              if (response == "true") {
                $("#e_no_po_import").addClass("is-invalid");
                $("#simpan").attr("disabled", "disabled");
              } else {
                $("#e_no_po_import").removeClass("is-invalid");
                $("#simpan").removeAttr("disabled");
              }
            }
          });
        });

        
        $(this).find('#e-tgl_po_import').datepicker().on('show.bs.modal', function (event) {
          event.stopImmediatePropagation();
        });

        $(this).find('#e-payment').datepicker().on('show.bs.modal', function (event) {
          event.stopImmediatePropagation();
        });

        $(this).find('#e-shipment').datepicker().on('show.bs.modal', function (event) {
          event.stopImmediatePropagation();
        });

        

        jQuery.ajax({
          url: "<?= base_url() ?>purchasing/po_import/det_ppb_barang",
          dataType: 'json',
          type: "post",
          data: {
            no_po_import: no_po_import
          },
          success: function (response) {
            var data = response;
            var $id = $('#e-ppb_po_barang');
            $id.empty();
            for (var i = 0; i < data.length; i++) {
              $id.append(`
          <tr>
          <td>` + data[i].nama_barang + `</td>
          <td>` + data[i].jumlah + `</td>
          <td>` + data[i].harga_perunit + `</td>
          <td class="text-right">` + data[i].total_harga + "&nbsp" + `</td>
          </tr>
          `);
            }
          }
        });
      });
    });
  </script>
</body>
</html>