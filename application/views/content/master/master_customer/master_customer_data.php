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
            width: 135%;
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
            
            /* .table .btn-sm {
                padding: 20px 20px;
                font-size: 20px;
            } */
            
        
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
                                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fas fa-home"></i></a></li>
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
                        
                                    <div class="col-md-9">
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
                                                                <th class="text-center">Detail</th>
                                                                <th class="text-center">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                            $no=1;
                                                            foreach($result as $k){ 
                                                            ?>
                                                            <tr>
                                                                <th scope="row"><?=$no++?></th>
                                                                <td>
                                                                    <span class="badge badge-primary"><?=$k['kode_customer']?></span>
                                                                </td>
                                                                <td>
                                                                    <strong><?=$k['nama_customer']?></strong>
                                                                </td>
                                                                <td><?=$k['kegiatan_usaha']?></td>
                                                                <td class="text-center">
                                                                    <button type="button" 
                                                                        class="btn btn-info btn-sm  btn-detail" 
                                                                        data-toggle="modal" 
                                                                        data-target="#detail" 
                                                                        data-id_customer="<?=$k['id_customer']?>"
                                                                        data-kode_customer="<?=$k['kode_customer']?>"
                                                                        data-nama_customer="<?=$k['nama_customer']?>"
                                                                        data-kegiatan_usaha="<?=$k['kegiatan_usaha']?>"
                                                                        data-alamat_customer="<?=$k['alamat_customer']?>"
                                                                        data-provinsi="<?=$k['provinsi']?>"
                                                                        data-kota_kab="<?=$k['kota_kab']?>"
                                                                        data-nib="<?=$k['nib']?>">
                                                                        <i class="fas fa-eye"></i> Detail
                                                                    </button>
                                                                </td>
                                                                <td class="text-center">
                                                                    <div class="action-buttons">
                                                                        <button type="button" 
                                                                            class="btn btn-warning btn-sm btn-action" 
                                                                            data-toggle="modal" 
                                                                            data-target="#edit"
                                                                            data-id_customer="<?=$k['id_customer']?>"
                                                                            data-kode_customer="<?=$k['kode_customer']?>"
                                                                            data-nama_customer="<?=$k['nama_customer']?>"
                                                                            data-kegiatan_usaha="<?=$k['kegiatan_usaha']?>"
                                                                            data-alamat_customer="<?=$k['alamat_customer']?>"
                                                                            data-provinsi="<?=$k['provinsi']?>"
                                                                            data-kota_kab="<?=$k['kota_kab']?>"
                                                                            data-nib="<?=$k['nib']?>">
                                                                            <i class="fas fa-edit"></i> Edit
                                                                        </button>
                                                                        <a  
                                                                            href="<?=base_url()?>master/master_customer/delete/<?=$k['id_customer']?>" 
                                                                            class="btn btn-danger btn-sm btn-action" 
                                                                            onclick = "if (! confirm('Apakah Anda Yakin?')) { return false; }">
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
                <div class="modal-cust">
                    <h5 class="modal-title"><i class="fas fa-plus-circle"></i> Tambah Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?=base_url()?>master/master_customer/add">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Kode Customer</label>
                                    <input type="text" class="form-control" id="kode_customer" name="kode_customer" placeholder="Kode Customer" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        Maaf Kode Customer sudah ada.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nama Customer</label>
                                    <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Nama Customer" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Kegiatan Usaha</label>
                                    <select class="form-control chosen-select" id="kegiatan_usaha" name="kegiatan_usaha" autocomplete="off">
                                        <option value="">- Pilih Kegiatan Usaha -</option>
                                        <option value="Produksi">Produksi</option>
                                        <option value="Distributor">Distributor</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Alamat Customer</label>
                                    <textarea class="form-control" id="alamat_customer" name="alamat_customer" rows="3" placeholder="Alamat Customer" autocomplete="off"></textarea>
                                </div>
                            </div>
                    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Provinsi</label>
                                    <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Provinsi" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Kota/Kab</label>
                                    <input type="text" class="form-control" id="kota_kab" name="kota_kab" placeholder="Kota/Kab" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">NIB</label>
                                    <input type="text" class="form-control" id="nib" name="nib" placeholder="NIB" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" id="simpan" class="btn btn-primary" onclick = "if (! confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali.')) { return false; }">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-up">
                    <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?=base_url()?>master/master_customer/update">
                    <input type="hidden" id="e_id_customer" name="id_customer">
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
                    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Provinsi</label>
                                    <input type="text" class="form-control" id="e_provinsi" name="provinsi" placeholder="Provinsi" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Kota/Kab</label>
                                    <input type="text" class="form-control" id="e_kota_kab" name="kota_kab" placeholder="Kota/Kab" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">NIB</label>
                                    <input type="text" class="form-control" id="e_nib" name="nib" placeholder="NIB" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" id="simpan" class="btn btn-primary" onclick = "if (! confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali.')) { return false; }">
                            <i class="fas fa-save"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#kode_customer").keyup(function(){
                var kode_customer =  $("#kode_customer").val();
                jQuery.ajax({
                    url: "<?=base_url()?>master/master_customer/cek_kode_customer",
                    dataType:'text',
                    type: "post",
                    data:{kode_customer:kode_customer},
                    success:function(response){
                        if (response =="true") {
                            $("#kode_customer").addClass("is-invalid");
                            $("#simpan").attr("disabled","disabled");
                        }else{
                            $("#kode_customer").removeClass("is-invalid");
                            $("#simpan").removeAttr("disabled");
                        }
                    }            
                });
            });

            $('#detail').on('show.bs.modal', function (event) {
                var id_customer = $(event.relatedTarget).data('id_customer') 
                var kode_customer = $(event.relatedTarget).data('kode_customer') 
                var nama_customer = $(event.relatedTarget).data('nama_customer') 
                var kegiatan_usaha = $(event.relatedTarget).data('kegiatan_usaha') 
                var alamat_customer = $(event.relatedTarget).data('alamat_customer')
                var provinsi = $(event.relatedTarget).data('provinsi') 
                var kota_kab = $(event.relatedTarget).data('kota_kab') 
                var nib = $(event.relatedTarget).data('nib')  

                $(this).find('#v_kode_customer').val(kode_customer)
                $(this).find('#v_nama_customer').val(nama_customer)
                $(this).find('#v_kegiatan_usaha').val(kegiatan_usaha)
                $(this).find('#v_alamat_customer').val(alamat_customer)
                $(this).find('#v_provinsi').val(provinsi)
                $(this).find('#v_kota_kab').val(kota_kab)
                $(this).find('#v_nib').val(nib)
            });

            $('#edit').on('show.bs.modal', function (event) {
                var id_customer = $(event.relatedTarget).data('id_customer') 
                var kode_customer = $(event.relatedTarget).data('kode_customer') 
                var nama_customer = $(event.relatedTarget).data('nama_customer') 
                var kegiatan_usaha = $(event.relatedTarget).data('kegiatan_usaha') 
                var alamat_customer = $(event.relatedTarget).data('alamat_customer')
                var provinsi = $(event.relatedTarget).data('provinsi') 
                var kota_kab = $(event.relatedTarget).data('kota_kab') 
                var nib = $(event.relatedTarget).data('nib')  

                $(this).find('#e_id_customer').val(id_customer)
                $(this).find('#e_kode_customer').val(kode_customer)
                $(this).find('#e_nama_customer').val(nama_customer)
                $(this).find('#e_kegiatan_usaha').val(kegiatan_usaha)
                $(this).find('#e_kegiatan_usaha').trigger("chosen:updated");
                $(this).find('#e_alamat_customer').val(alamat_customer)
                $(this).find('#e_provinsi').val(provinsi)
                $(this).find('#e_kota_kab').val(kota_kab)
                $(this).find('#e_nib').val(nib)
            });

            $("#e_kode_customer").keyup(function(){
                var kode_customer =  $("#e_kode_customer").val();
                jQuery.ajax({
                    url: "<?=base_url()?>master/master_customer/cek_kode_customer",
                    dataType:'text',
                    type: "post",
                    data:{kode_customer:kode_customer},
                    success:function(response){
                        if (response =="true") {
                            $("#e_kode_customer").addClass("is-invalid");
                            $("#simpan").attr("disabled","disabled");
                        }else{
                            $("#e_kode_customer").removeClass("is-invalid");
                            $("#simpan").removeAttr("disabled");
                        }
                    }            
                });
            });

            $('#export').click(function () {
                var url = "<?=base_url()?>master/master_customer/pdf_customer_list/";
                window.open(url, 'pdf_laporan_customer_list', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
            });
        });
    </script>
</body>
</html>