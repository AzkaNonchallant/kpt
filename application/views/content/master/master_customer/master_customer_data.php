<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Customer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
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
            width: 100%;
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 25px;
        }

        .card-header {
            background: white;
            border-bottom: 1px solid var(--light-gray);
            padding: 70px 20px;
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
            padding: 6px 6px;
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
            padding: 5px 5px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.2px;
            line-height: 2.4;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 12px;
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
            width: 30px;
            text-align: center;
        }

        .table thead th:nth-child(2),
        .table tbody td:nth-child(2) {
            width: 30px;
        }

        .table thead th:nth-child(3),
        .table tbody td:nth-child(3) {
            width: 30px;
        }

        .table thead th:nth-child(4),
        .table tbody td:nth-child(4) {
            width: 30px;
        }

        .table thead th:nth-child(5),
        .table tbody td:nth-child(5) {
            width: 30px;
            text-align: center;
        }

        .table thead th:nth-child(6),
        .table tbody td:nth-child(6) {
            width: 30px;
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
            padding: 30px 30px;
        }

        .modal-up {
            background: linear-gradient(135deg, var(--upd), var(--warning));
            color: white;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
            padding: 20px 25px;
        }

        .modal-cust {
            background: linear-gradient(135deg, var(--cust), var(--secondary));
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
        }

        .table .btn-sm {
            padding: 4px 8px;
            font-size: 11px;
            line-height: 3.0;
            white-space: nowrap;
        }

        .table .btn i {
            font-size: 11px;
            margin-right: 3px;
        }

        .btn-detail {
            min-width: 30px;
        }

        .btn-action {
            min-width: 50px;
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

        .loading {
            color: #6c757d;
            font-style: italic;
        }

        .loading-error {
            color: #dc3545;
            font-style: italic;
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
            
            .card {
                width: 100%;
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
                                        <!-- <h5 class="m-b-10">Data Customer</h5> -->
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fas fa-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Master Customer</a></li>
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
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5><i class="fas fa-list"></i> Daftar Customer</h5>
                                            <div class="btn-group">
                                                <button class="btn btn-success btn-sm" id="export" type="button">
                                                    <i class="fas fa-print"></i> Cetak List Customer
                                                </button>
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
                                                    <i class="fas fa-plus-circle"></i> Tambah Customer
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <table class="table datatable table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Kode Customer</th>
                                                            <th>Nama Customer</th>
                                                            <th>Kegiatan Usaha</th>
                                                            <th class="text-center">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($result as $k) {
                                                        ?>
                                                            <tr>
                                                                <th scope="row"><?= $no++ ?></th>
                                                                <td>
                                                                    <span type="button"
                                                                        class="btn-detail badge badge-primary"
                                                                        data-toggle="modal"
                                                                        data-target="#detail"
                                                                        data-id_customer="<?= $k['id_customer'] ?>"
                                                                        data-kode_customer="<?= $k['kode_customer'] ?>"
                                                                        data-nama_customer="<?= $k['nama_customer'] ?>"
                                                                        data-kegiatan_usaha="<?= $k['kegiatan_usaha'] ?>"
                                                                        data-alamat_customer="<?= $k['alamat_customer'] ?>"
                                                                        data-provinsi="<?= $k['provinsi'] ?>"
                                                                        data-provinsi_nama="<?= $k['provinsi_nama'] ?>"
                                                                        data-kota_kab="<?= $k['kota_kab'] ?>"
                                                                        data-kota_nama="<?= $k['kota_nama'] ?>"
                                                                        data-nib="<?= $k['nib'] ?>"
                                                                        data-npwp="<?= $k['npwp'] ?>"
                                                                        data-alamat_kirim="<?= $k['alamat_kirim'] ?>"
                                                                        data-alamat_pjk="<?= $k['alamat_pjk'] ?>">
                                                                        <span class=""><?= $k['kode_customer'] ?></span>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <strong><?= $k['nama_customer'] ?></strong>
                                                                </td>
                                                                <td><?= $k['kegiatan_usaha'] ?></td>
                                                                <td class="text-center">
                                                                    <div class="action-buttons">
                                                                        <button
                                                                            type="button"
                                                                            class="btn btn-success"
                                                                            data-toggle="modal"
                                                                            data-target="#harga"
                                                                            data-id_customer="<?= $k['id_customer'] ?>"
                                                                            data-kode_customer="<?= $k['kode_customer'] ?>"
                                                                            data-nama_customer="<?= $k['nama_customer'] ?>">
                                                                            +
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-warning btn-sm btn-action"
                                                                            data-toggle="modal"
                                                                            data-target="#edit"
                                                                            data-id_customer="<?= $k['id_customer'] ?>"
                                                                            data-kode_customer="<?= $k['kode_customer'] ?>"
                                                                            data-nama_customer="<?= $k['nama_customer'] ?>"
                                                                            data-kegiatan_usaha="<?= $k['kegiatan_usaha'] ?>"
                                                                            data-alamat_customer="<?= $k['alamat_customer'] ?>"
                                                                            data-provinsi="<?= $k['provinsi'] ?>"
                                                                            data-provinsi_nama="<?= $k['provinsi_nama'] ?>"
                                                                            data-kota_kab="<?= $k['kota_kab'] ?>"
                                                                            data-kota_nama="<?= $k['kota_nama'] ?>"
                                                                            data-nib="<?= $k['nib'] ?>"
                                                                            data-npwp="<?= $k['npwp'] ?>"
                                                                            data-alamat_kirim="<?= $k['alamat_kirim'] ?>"
                                                                            data-alamat_pjk="<?= $k['alamat_pjk'] ?>">
                                                                            <i class="fas fa-edit"></i> Edit
                                                                        </button>
                                                                        <a
                                                                            href="<?= base_url() ?>master/master_customer/delete/<?= $k['id_customer'] ?>"
                                                                            class="btn btn-danger btn-sm btn-action"
                                                                            onclick="return confirm('Apakah Anda Yakin?')">
                                                                            <i class="fas fa-trash"></i> Hapus
                                                                        </a>
                                                                    </div>
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
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Tambah -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-cust d-flex justify-content-between align-items-center p-3">
                    <h5 class="modal-title">
                        <i class="fas fa-plus-circle"></i> Tambah Customer
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Form -->
                <form method="post" action="<?= base_url() ?>master/master_customer/add" id="formTambah">
                    <div class="modal-body">
                        <div class="row">
                            <!-- Kode Customer -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kode Customer</label>
                                    <input type="text" class="form-control" id="kode_customer" name="kode_customer"
                                        placeholder="Kode Customer" autocomplete="off"
                                        style="text-transform:uppercase"
                                        onkeyup="this.value = this.value.toUpperCase()" required>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        Maaf Kode Customer sudah ada.
                                    </div>
                                </div>
                            </div>

                            <!-- Nama Customer -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Customer</label>
                                    <input type="text" class="form-control" id="nama_customer" name="nama_customer"
                                        placeholder="Nama Customer" maxlength="100" autocomplete="off"
                                        style="text-transform:uppercase"
                                        onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>

                            <!-- Kegiatan Usaha -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kegiatan Usaha</label>
                                    <select class="form-control chosen-select" id="kegiatan_usaha" name="kegiatan_usaha">
                                        <option value="">- Pilih Kegiatan Usaha -</option>
                                        <option value="Produksi">Produksi</option>
                                        <option value="Distributor">Distributor</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Alamat Customer -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Alamat Customer</label>
                                    <textarea class="form-control" id="alamat_customer" name="alamat_customer"
                                        rows="3" placeholder="Alamat Customer" autocomplete="off"></textarea>
                                </div>
                            </div>

                            <!-- PROVINSI DAN KOTA/KAB - PERBAIKAN -->
                            <!-- Hidden inputs untuk menyimpan nama provinsi dan kota -->
                            <input type="hidden" id="provinsi_nama" name="provinsi_nama">
                            <input type="hidden" id="kota_nama" name="kota_nama">
                            
                            <!-- Provinsi -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <select class="form-control chosen-select" id="provinsi" name="provinsi" required>
                                        <option value="" disabled selected hidden>- Pilih Provinsi -</option>
                                        <!-- Data akan diisi via AJAX -->
                                    </select>
                                </div>
                            </div>

                            <!-- Kota/Kabupaten -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kota_kab">Kota / Kabupaten</label>
                                    <select class="form-control chosen-select" id="kota_kab" name="kota_kab" required disabled>
                                        <option value="" disabled selected hidden>- Pilih Kota -</option>
                                        <!-- Data akan diisi via AJAX -->
                                    </select>
                                    <small class="form-text text-muted">Pilih provinsi terlebih dahulu</small>
                                </div>
                            </div>

                            <!-- NIB -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>NIB</label>
                                    <input type="text" class="form-control" id="nib" name="nib"
                                        placeholder="NIB" autocomplete="off"
                                        style="text-transform:uppercase"
                                        onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>

                            <!-- NPWP -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>NPWP</label>
                                    <input type="text" class="form-control" id="npwp" name="npwp"
                                        placeholder="NPWP" autocomplete="off"
                                        style="text-transform:uppercase"
                                        onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Marketing Admin</label>
                                    <input type="text" class="form-control" id="mkt_admin" name="mkt_admin" placeholder="Mkt admin" value="<?= $this->session->userdata('nama') ?>" autocomplete="off" style="text-transform:uppercase" readonly>
                                </div>
                            </div>

                            <!-- Alamat Kirim -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat Kirim</label>
                                    <textarea class="form-control" id="alamat_kirim" name="alamat_kirim"
                                        rows="3" placeholder="Alamat Kirim" autocomplete="off"></textarea>
                                </div>
                            </div>

                            <!-- Alamat PJK -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat PJK</label>
                                    <textarea class="form-control" id="alamat_pjk" name="alamat_pjk"
                                        rows="3" placeholder="Alamat Pajak" autocomplete="off"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary" id="btnSimpanTambah">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-eye"></i> Detail Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Kode Customer</label>
                                <input type="text" class="form-control" id="v_kode_customer" name="kode_customer" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Nama Customer</label>
                                <input type="text" class="form-control" id="v_nama_customer" name="nama_customer" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Kegiatan Usaha</label>
                                <input type="text" class="form-control" id="v_kegiatan_usaha" name="kegiatan_usaha" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Alamat Customer</label>
                                <textarea class="form-control" id="v_alamat_customer" name="alamat_customer" rows="3" readonly></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Provinsi</label>
                                <input type="text" class="form-control" id="v_provinsi" name="provinsi" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Kota/Kab</label>
                                <input type="text" class="form-control" id="v_kota_kab" name="kota_kab" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">NIB</label>
                                <input type="text" class="form-control" id="v_nib" name="nib" readonly>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">NPWP</label>
                                <input type="text" class="form-control" id="v_npwp" name="npwp" readonly>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Alamat Kirim</label>
                                <textarea class="form-control" id="v_alamat_kirim" name="alamat_kirim" rows="3" readonly></textarea>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Alamat PJK</label>
                                <textarea class="form-control" id="v_alamat_pjk" name="alamat_pjk" rows="3" readonly></textarea>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <h6><i class="fas fa-box"></i> Daftar Barang & Harga</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm" id="tblHargaCustomer">
                            <thead class="thead-light">
                                <tr>
                                    <th style="color: white;" width="5%">No</th>
                                    <th style="color: white;">Kode Barang</th>
                                    <th style="color: white;">Nama Barang</th>
                                    <th style="color: white;">Harga</th>
                                    <th style="color: white;" width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Harga -->
    <div class="modal fade" id="modalEditHarga" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title"><i class="fas fa-edit"></i> Edit Harga</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="<?= base_url() ?>master/master_customer/update_harga" method="post" id="formEditHarga">
                    <div class="modal-body">
                        <input type="hidden" id="edit_id_harga" name="id_master_harga">
                        <div class="form-group">
                            <label>Harga(KG)</label>
                            <input type="text" id="edit_harga" name="harga" class="form-control" placeholder="Rp 0">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary btn-sm" id="btnSaveEditHarga">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Customer -->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-up">
                    <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url() ?>master/master_customer/update" id="formEdit">
                    <input type="hidden" id="e_id_customer" name="id_customer">
                    <!-- Hidden inputs untuk edit -->
                    <input type="hidden" id="e_provinsi_nama" name="provinsi_nama">
                    <input type="hidden" id="e_kota_nama" name="kota_nama">
                    
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Kode Customer</label>
                                    <input type="text" class="form-control" id="e_kode_customer" name="kode_customer" placeholder="Kode Customer" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        Maaf Kode Customer sudah ada.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nama Customer</label>
                                    <input type="text" class="form-control" id="e_nama_customer" name="nama_customer" placeholder="Nama Customer" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Kegiatan Usaha</label>
                                    <select class="form-control chosen-select" id="e_kegiatan_usaha" name="kegiatan_usaha" autocomplete="off">
                                        <option value="">- Pilih Kegiatan Usaha -</option>
                                        <option value="Produksi">Produksi</option>
                                        <option value="Distributor">Distributor</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Alamat Customer</label>
                                    <textarea class="form-control" id="e_alamat_customer" name="alamat_customer" rows="3" placeholder="Alamat Customer" autocomplete="off"></textarea>
                                </div>
                            </div>

                            <!-- PROVINSI EDIT -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Provinsi</label>
                                    <select class="form-control chosen-select" id="e_provinsi" name="provinsi" autocomplete="off" required>
                                        <option value="" disabled selected hidden>- Pilih Provinsi -</option>
                                        <!-- Data akan diisi via AJAX -->
                                    </select>
                                </div>
                            </div>

                            <!-- KOTA/KAB EDIT -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Kota/Kab</label>
                                    <select class="form-control chosen-select" id="e_kota_kab" name="kota_kab" autocomplete="off" required disabled>
                                        <option value="" disabled selected hidden>- Pilih Kota -</option>
                                        <!-- Data akan diisi via AJAX -->
                                    </select>
                                    <small class="form-text text-muted">Pilih provinsi terlebih dahulu</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">NIB</label>
                                    <input type="text" class="form-control" id="e_nib" name="nib" placeholder="NIB" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">NPWP</label>
                                    <input type="text" class="form-control" id="e_npwp" name="npwp" placeholder="NPWP" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>
                            

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Alamat Kirim</label>
                                    <textarea class="form-control" id="e_alamat_kirim" name="alamat_kirim" rows="3" placeholder="Alamat Kirim" autocomplete="off"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Alamat PJK</label>
                                    <textarea class="form-control" id="e_alamat_pjk" name="alamat_pjk" rows="3" placeholder="Alamat Pajak" autocomplete="off"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" id="btnSimpanEdit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Harga -->
    <div class="modal fade" id="harga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-cust">
                    <h5 class="modal-title"><i class="fas fa-plus-circle"></i> Tambah Harga</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url() ?>master/master_customer/add_harga" id="formTambahHarga">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Kode Customer</label>
                                    <input type="text" class="form-control" id="h-kode_customer" name="kode_customer" placeholder="Kode Customer" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" readonly>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        Maaf Kode Customer sudah ada.
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" id="h-id_customer" name="id_customer">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nama Customer</label>
                                    <input type="text" class="form-control" id="h-nama_customer" name="nama_customer" placeholder="Nama Customer" maxlength="100" autocomplete="off" style="text-transform:uppercase" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nama Barang</label>
                                    <select class="form-control chosen-select" id="h-id_barang" name="id_barang" autocomplete="off" required>
                                        <option value="">- Pilih Barang -</option>
                                        <?php
                                        foreach ($res_barang as $c) {
                                        ?>
                                            <option value="<?= $c['id_barang'] ?>">(<?= $c['kode_barang'] ?>) <?= $c['nama_barang'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Harga(KG)</label>
                                    <input type="text" class="form-control" id="h-harga" name="harga" placeholder="Rp 0" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Marketing Admin</label>
                                    <input type="text" class="form-control" id="mkt_admin" name="mkt_admin" placeholder="Mkt admin" value="<?= $this->session->userdata('nama') ?>" autocomplete="off" style="text-transform:uppercase" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" id="btnSimpanHarga" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            // Inisialisasi chosen select
            $('.chosen-select').chosen({
                width: '100%',
                search_contains: true,
                no_results_text: "Tidak ditemukan"
            });

            // ============================================
            // LOAD DATA PROVINSI DARI API
            // ============================================
            function loadProvinsi(selectElement, selectedId = null, callback = null) {
                $.ajax({
                    url: 'https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json',
                    method: 'GET',
                    beforeSend: function() {
                        $(selectElement).empty().append('<option value="" disabled selected hidden>Loading...</option>');
                        $(selectElement).trigger('chosen:updated');
                    },
                    success: function(data) {
                        $(selectElement).empty().append('<option value="" disabled selected hidden>- Pilih Provinsi -</option>');
                        
                        $.each(data, function(i, provinsi) {
                            let option = $('<option>', {
                                value: provinsi.id,
                                'data-nama': provinsi.name,
                                text: provinsi.name
                            });
                            
                            // Set selected jika ada nilai yang dipilih
                            if (selectedId && provinsi.id == selectedId) {
                                option.prop('selected', true);
                                // Simpan nama provinsi ke hidden input
                                let hiddenInput = $(selectElement).attr('id') === 'provinsi' ? '#provinsi_nama' : '#e_provinsi_nama';
                                $(hiddenInput).val(provinsi.name);
                            }
                            
                            $(selectElement).append(option);
                        });
                        
                        // Refresh chosen
                        $(selectElement).prop('disabled', false).trigger('chosen:updated');
                        
                        // Jalankan callback jika ada
                        if (typeof callback === 'function') {
                            callback();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Gagal memuat provinsi:', error);
                        $(selectElement).empty().append('<option value="" disabled selected hidden class="loading-error">Gagal memuat data</option>');
                        $(selectElement).trigger('chosen:updated');
                        alert('Gagal memuat daftar provinsi. Silakan refresh halaman.');
                    }
                });
            }

            // ============================================
            // LOAD DATA KOTA/KAB DARI API
            // ============================================
            function loadKotaKab(provinsiId, selectElement, selectedId = null, callback = null) {
                if (!provinsiId) {
                    $(selectElement).empty().append('<option value="" disabled selected hidden>- Pilih Provinsi terlebih dahulu -</option>');
                    $(selectElement).prop('disabled', true).trigger('chosen:updated');
                    return;
                }
                
                $.ajax({
                    url: 'https://www.emsifa.com/api-wilayah-indonesia/api/regencies/' + provinsiId + '.json',
                    method: 'GET',
                    beforeSend: function() {
                        $(selectElement).empty().append('<option value="" disabled selected hidden>Loading...</option>');
                        $(selectElement).prop('disabled', true).trigger('chosen:updated');
                    },
                    success: function(data) {
                        $(selectElement).empty().append('<option value="" disabled selected hidden>- Pilih Kota/Kab -</option>');
                        
                        $.each(data, function(i, kota) {
                            let option = $('<option>', {
                                value: kota.id,
                                'data-nama': kota.name,
                                text: kota.name
                            });
                            
                            // Set selected jika ada nilai yang dipilih
                            if (selectedId && kota.id == selectedId) {
                                option.prop('selected', true);
                                // Simpan nama kota ke hidden input
                                let hiddenInput = $(selectElement).attr('id') === 'kota_kab' ? '#kota_nama' : '#e_kota_nama';
                                $(hiddenInput).val(kota.name);
                            }
                            
                            $(selectElement).append(option);
                        });
                        
                        // Enable dan refresh chosen
                        $(selectElement).prop('disabled', false).trigger('chosen:updated');
                        
                        // Jalankan callback jika ada
                        if (typeof callback === 'function') {
                            callback();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Gagal memuat kota:', error);
                        $(selectElement).empty().append('<option value="" disabled selected hidden class="loading-error">Gagal memuat data</option>');
                        $(selectElement).trigger('chosen:updated');
                        alert('Gagal memuat daftar kota/kabupaten.');
                    }
                });
            }

            // ============================================
            // LOAD PROVINSI SAAT MODAL TAMBAH DIBUKA
            // ============================================
            $('#add').on('show.bs.modal', function() {
                loadProvinsi('#provinsi');
                
                // Reset kota/kab
                $('#kota_kab').empty().append('<option value="" disabled selected hidden>- Pilih Provinsi terlebih dahulu -</option>');
                $('#kota_kab').prop('disabled', true).trigger('chosen:updated');
                
                // Reset hidden fields
                $('#provinsi_nama').val('');
                $('#kota_nama').val('');
                
                // Reset form lainnya
                $('#kode_customer').val('').focus();
                $('#nama_customer').val('');
                $('#kegiatan_usaha').val('').trigger('chosen:updated');
                $('#alamat_customer').val('');
                $('#nib').val('');
                $('#npwp').val('');
                $('#alamat_kirim').val('');
                $('#alamat_pjk').val('');
            });

            // ============================================
            // EVENT CHANGE PROVINSI (TAMBAH)
            // ============================================
            $('#provinsi').on('change', function() {
                let provinsiId = $(this).val();
                let provinsiNama = $(this).find(':selected').data('nama');
                
                // Simpan nama provinsi ke hidden input
                $('#provinsi_nama').val(provinsiNama);
                
                // Load kota/kab berdasarkan provinsi
                loadKotaKab(provinsiId, '#kota_kab');
                
                // Reset hidden kota
                $('#kota_nama').val('');
            });

            // ============================================
            // EVENT CHANGE KOTA/KAB (TAMBAH)
            // ============================================
            $('#kota_kab').on('change', function() {
                let kotaNama = $(this).find(':selected').data('nama');
                $('#kota_nama').val(kotaNama);
            });

            // ============================================
            // LOAD DATA EDIT SAAT MODAL EDIT DIBUKA
            // ============================================
            $('#edit').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id_customer = button.data('id_customer');
                var kode_customer = button.data('kode_customer');
                var nama_customer = button.data('nama_customer');
                var kegiatan_usaha = button.data('kegiatan_usaha');
                var alamat_customer = button.data('alamat_customer');
                var provinsiId = button.data('provinsi'); // ID provinsi
                var provinsiNama = button.data('provinsi_nama'); // Nama provinsi
                var kotaId = button.data('kota_kab'); // ID kota
                var kotaNama = button.data('kota_nama'); // Nama kota
                var nib = button.data('nib');
                var npwp = button.data('npwp');
                var alamat_kirim = button.data('alamat_kirim');
                var alamat_pjk = button.data('alamat_pjk');

                // Set nilai ke form
                $('#e_id_customer').val(id_customer);
                $('#e_kode_customer').val(kode_customer);
                $('#e_nama_customer').val(nama_customer);
                $('#e_kegiatan_usaha').val(kegiatan_usaha);
                $('#e_alamat_customer').val(alamat_customer);
                $('#e_nib').val(nib);
                $('#e_npwp').val(npwp);
                $('#e_alamat_kirim').val(alamat_kirim);
                $('#e_alamat_pjk').val(alamat_pjk);
                
                // Set hidden values
                $('#e_provinsi_nama').val(provinsiNama);
                $('#e_kota_nama').val(kotaNama);
                
                // Load provinsi dengan selected value
                loadProvinsi('#e_provinsi', provinsiId, function() {
                    // Trigger chosen update untuk kegiatan usaha
                    $('#e_kegiatan_usaha').trigger("chosen:updated");
                    
                    // Setelah provinsi diload, load kota jika ada provinsiId
                    if (provinsiId) {
                        // Small delay untuk memastikan provinsi sudah terload
                        setTimeout(function() {
                            loadKotaKab(provinsiId, '#e_kota_kab', kotaId);
                        }, 300);
                    }
                });
            });

            // ============================================
            // EVENT CHANGE PROVINSI (EDIT)
            // ============================================
            $('#e_provinsi').on('change', function() {
                let provinsiId = $(this).val();
                let provinsiNama = $(this).find(':selected').data('nama');
                
                // Simpan nama provinsi ke hidden input
                $('#e_provinsi_nama').val(provinsiNama);
                
                // Load kota/kab berdasarkan provinsi
                loadKotaKab(provinsiId, '#e_kota_kab');
                
                // Reset hidden kota
                $('#e_kota_nama').val('');
            });

            // ============================================
            // EVENT CHANGE KOTA/KAB (EDIT)
            // ============================================
            $('#e_kota_kab').on('change', function() {
                let kotaNama = $(this).find(':selected').data('nama');
                $('#e_kota_nama').val(kotaNama);
            });

            // ============================================
            // FUNGSI FORMAT RUPIAH
            // ============================================
            
            // Fungsi untuk format Rupiah
            function formatRupiah(angka, prefix = 'Rp ') {
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
                
                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix + rupiah;
            }

            // Fungsi untuk menghapus format Rupiah (mengembalikan angka saja)
            function unformatRupiah(rupiah) {
                if (!rupiah) return 0;
                return parseInt(rupiah.toString().replace(/[^0-9]/g, ''), 10);
            }

            // Fungsi untuk auto format input Rupiah
            function setupRupiahInput(inputId) {
                $(inputId).on('keyup', function(e) {
                    // Simpan posisi cursor
                    let cursorPosition = this.selectionStart;
                    let originalLength = this.value.length;
                    
                    // Hapus semua karakter selain angka
                    let value = this.value.replace(/[^0-9]/g, '');
                    
                    // Format ke Rupiah
                    this.value = formatRupiah(value);
                    
                    // Kembalikan posisi cursor
                    let newLength = this.value.length;
                    let cursorOffset = newLength - originalLength;
                    this.setSelectionRange(cursorPosition + cursorOffset, cursorPosition + cursorOffset);
                });
            }

            // Setup format Rupiah untuk input harga
            setupRupiahInput('#h-harga');
            setupRupiahInput('#edit_harga');

            // ============================================
            // VALIDASI KODE CUSTOMER (TAMBAH)
            // ============================================
            $("#kode_customer").keyup(function() {
                var kode_customer = $("#kode_customer").val();
                jQuery.ajax({
                    url: "<?= base_url() ?>master/master_customer/cek_kode_customer",
                    dataType: 'text',
                    type: "post",
                    data: {
                        kode_customer: kode_customer
                    },
                    success: function(response) {
                        if (response == "true") {
                            $("#kode_customer").addClass("is-invalid");
                            $("#btnSimpanTambah").attr("disabled", "disabled");
                        } else {
                            $("#kode_customer").removeClass("is-invalid");
                            $("#btnSimpanTambah").removeAttr("disabled");
                        }
                    }
                });
            });

            // ============================================
            // VALIDASI KODE CUSTOMER (EDIT)
            // ============================================
            $("#e_kode_customer").keyup(function() {
                var kode_customer = $("#e_kode_customer").val();
                var original_kode = $("#e_kode_customer").data('original') || '';
                
                // Skip validation if the code hasn't changed
                if (kode_customer === original_kode) {
                    $("#e_kode_customer").removeClass("is-invalid");
                    $("#btnSimpanEdit").removeAttr("disabled");
                    return;
                }
                
                jQuery.ajax({
                    url: "<?= base_url() ?>master/master_customer/cek_kode_customer",
                    dataType: 'text',
                    type: "post",
                    data: {
                        kode_customer: kode_customer
                    },
                    success: function(response) {
                        if (response == "true") {
                            $("#e_kode_customer").addClass("is-invalid");
                            $("#btnSimpanEdit").attr("disabled", "disabled");
                        } else {
                            $("#e_kode_customer").removeClass("is-invalid");
                            $("#btnSimpanEdit").removeAttr("disabled");
                        }
                    }
                });
            });

            // Simpan kode original saat modal edit dibuka
            $('#edit').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var kode_customer = button.data('kode_customer');
                $('#e_kode_customer').data('original', kode_customer);
            });

            // ============================================
            // MODAL DETAIL CUSTOMER
            // ============================================
            $('.btn-detail').on('click', function() {
                var id_customer = $(this).data('id_customer');

                $.ajax({
                    url: "<?= base_url('master/master_customer/get_detail_customer'); ?>",
                    type: "POST",
                    data: {
                        id_customer: id_customer
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.customer) {
                            let c = response.customer;
                            $('#v_kode_customer').val(c.kode_customer);
                            $('#v_nama_customer').val(c.nama_customer);
                            $('#v_kegiatan_usaha').val(c.kegiatan_usaha);
                            $('#v_alamat_customer').val(c.alamat_customer);
                            $('#v_provinsi').val(c.provinsi_nama || c.provinsi);
                            $('#v_kota_kab').val(c.kota_nama || c.kota_kab);
                            $('#v_nib').val(c.nib);
                            $('#v_npwp').val(c.npwp);
                            $('#v_alamat_kirim').val(c.alamat_kirim);
                            $('#v_alamat_pjk').val(c.alamat_pjk);
                        }

                        // Isi tabel harga dengan format Rupiah
                        let tbody = $('#tblHargaCustomer tbody');
                        tbody.empty();

                        if (response.harga && response.harga.length > 0) {
                            $.each(response.harga, function(i, item) {
                                // Format harga ke Rupiah
                                let hargaFormatted = formatRupiah(item.harga);
                                
                                tbody.append(`
                                    <tr>
                                        <td class="text-center">${i+1}</td>
                                        <td>${item.kode_barang || '-'}</td>
                                        <td>${item.nama_barang || '-'}</td>
                                        <td class="harga-rupiah">${hargaFormatted}</td>
                                        <td class="text-center">
                                            <div style="display: flex; justify-content: center; gap: 5px;">
                                                <button class="btn btn-warning btn-sm btn-edit" 
                                                        data-id="${item.id_master_harga}" 
                                                        data-harga="${item.harga}">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <a href="<?= base_url()?>master/master_customer/delete_harga/${item.id_master_harga}" 
                                                   class="btn btn-danger btn-sm btn-delete" 
                                                   onclick="return confirm('Apakah Anda Yakin?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                `);
                            });
                        } else {
                            tbody.append(`<tr><td colspan="5" class="text-center text-muted">Belum ada harga untuk customer ini.</td></tr>`);
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan mengambil data.');
                    }
                });
            });

            // ============================================
            // MODAL EDIT HARGA
            // ============================================
            $(document).on('click', '.btn-edit', function() {
                let id = $(this).data('id');
                let harga = $(this).data('harga');
                
                $('#edit_id_harga').val(id);
                $('#edit_harga').val(formatRupiah(harga));
                $('#modalEditHarga').modal('show');
            });

            // Form submit edit harga
            $('#formEditHarga').submit(function(e) {
                // Hapus format Rupiah sebelum submit
                let hargaInput = $('#edit_harga');
                let hargaValue = unformatRupiah(hargaInput.val());
                
                // Validasi harga
                if (hargaValue <= 0) {
                    e.preventDefault();
                    alert('Harga harus lebih dari 0');
                    hargaInput.focus();
                    return false;
                }
                
                // Set nilai tanpa format
                hargaInput.val(hargaValue);
                
                // Konfirmasi
                if (!confirm('Apakah Anda yakin ingin mengubah harga?')) {
                    e.preventDefault();
                    return false;
                }
                
                return true;
            });

            // ============================================
            // MODAL TAMBAH HARGA
            // ============================================
            $('#harga').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id_customer = button.data('id_customer');
                var kode_customer = button.data('kode_customer');
                var nama_customer = button.data('nama_customer');

                $('#h-kode_customer').val(kode_customer);
                $('#h-nama_customer').val(nama_customer);
                $('#h-id_customer').val(id_customer);
                
                // Reset form
                $('#h-id_barang').val('').trigger('chosen:updated');
                $('#h-harga').val('');
                
                // Fokus ke input barang
                setTimeout(function() {
                    $('#h-id_barang').focus();
                }, 500);
            });

            // Form submit tambah harga
            $('#formTambahHarga').submit(function(e) {
                // Validasi pilihan barang
                let barang = $('#h-id_barang').val();
                if (!barang) {
                    e.preventDefault();
                    alert('Silakan pilih barang terlebih dahulu');
                    $('#h-id_barang').focus();
                    return false;
                }
                
                // Hapus format Rupiah sebelum submit
                let hargaInput = $('#h-harga');
                let hargaValue = unformatRupiah(hargaInput.val());
                
                // Validasi harga
                if (hargaValue <= 0) {
                    e.preventDefault();
                    alert('Harga harus lebih dari 0');
                    hargaInput.focus();
                    return false;
                }
                
                // Set nilai tanpa format
                hargaInput.val(hargaValue);
                
                // Konfirmasi
                if (!confirm('Apakah Anda yakin ingin menambah harga?')) {
                    e.preventDefault();
                    return false;
                }
                
                return true;
            });

            // ============================================
            // VALIDASI FORM TAMBAH CUSTOMER
            // ============================================
            $('#formTambah').submit(function(e) {
                // Validasi apakah provinsi dan kota sudah dipilih
                if (!$('#provinsi').val()) {
                    e.preventDefault();
                    alert('Silakan pilih provinsi');
                    $('#provinsi').trigger('chosen:open');
                    return false;
                }
                
                if (!$('#kota_kab').val()) {
                    e.preventDefault();
                    alert('Silakan pilih kota/kabupaten');
                    $('#kota_kab').trigger('chosen:open');
                    return false;
                }
                
                // Validasi kode customer
                if ($('#kode_customer').hasClass('is-invalid')) {
                    e.preventDefault();
                    alert('Kode Customer sudah ada, silakan gunakan kode yang lain');
                    $('#kode_customer').focus();
                    return false;
                }
                
                // Konfirmasi sebelum submit
                if (!confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali.')) {
                    e.preventDefault();
                    return false;
                }
                
                return true;
            });

            // ============================================
            // VALIDASI FORM EDIT CUSTOMER
            // ============================================
            $('#formEdit').submit(function(e) {
                // Validasi apakah provinsi dan kota sudah dipilih
                if (!$('#e_provinsi').val()) {
                    e.preventDefault();
                    alert('Silakan pilih provinsi');
                    $('#e_provinsi').trigger('chosen:open');
                    return false;
                }
                
                if (!$('#e_kota_kab').val()) {
                    e.preventDefault();
                    alert('Silakan pilih kota/kabupaten');
                    $('#e_kota_kab').trigger('chosen:open');
                    return false;
                }
                
                // Validasi kode customer
                if ($('#e_kode_customer').hasClass('is-invalid')) {
                    e.preventDefault();
                    alert('Kode Customer sudah ada, silakan gunakan kode yang lain');
                    $('#e_kode_customer').focus();
                    return false;
                }
                
                // Konfirmasi sebelum submit
                if (!confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali.')) {
                    e.preventDefault();
                    return false;
                }
                
                return true;
            });

            // ============================================
            // EKSPORT PDF
            // ============================================
            $('#export').click(function() {
                var url = "<?= base_url() ?>master/master_customer/pdf_customer_list/";
                window.open(url, 'pdf_laporan_customer_list', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
            });

            // ============================================
            // FUNGSI TAMBAHAN
            // ============================================
            
            // Fungsi untuk format input angka saat ketik
            function formatAngka(input) {
                // Hapus semua karakter selain angka
                let angka = input.value.replace(/\D/g, '');
                
                // Format dengan pemisah ribuan
                if (angka.length > 3) {
                    let bagian = [];
                    while (angka.length > 3) {
                        bagian.unshift(angka.slice(-3));
                        angka = angka.slice(0, -3);
                    }
                    bagian.unshift(angka);
                    input.value = 'Rp ' + bagian.join('.');
                } else if (angka) {
                    input.value = 'Rp ' + angka;
                } else {
                    input.value = '';
                }
            }

            // Fungsi untuk format angka ke Rupiah (tampilan saja)
            function tampilkanRupiah(angka) {
                if (!angka || isNaN(angka)) return 'Rp 0';
                
                let number_string = angka.toString();
                let sisa = number_string.length % 3;
                let rupiah = number_string.substr(0, sisa);
                let ribuan = number_string.substr(sisa).match(/\d{3}/g);
                
                if (ribuan) {
                    let separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                
                return 'Rp ' + rupiah;
            }
        });
    </script>

</body>

</html>