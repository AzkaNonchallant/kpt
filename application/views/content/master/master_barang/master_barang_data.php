<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Barang</title>
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
            width: 1200px;
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
        
        /* .btn-sm {
            padding: 9px 8px;
            font-size: 11px;
            min-width: 60px;
        } */
        
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
        
        .table thead th:nth-child(1),
        .table tbody td:nth-child(1) {
            width: 20px;
            text-align: center;
        }
        
        .table thead th:nth-child(2),
        .table tbody td:nth-child(2) {
            width: 20px;
        }
        
        .table thead th:nth-child(3),
        .table tbody td:nth-child(3) {
            width: 20px;
        }
        
        .table thead th:nth-child(4),
        .table tbody td:nth-child(4) {
            width: 20px;
            text-align: center;
        }
        
        .table thead th:nth-child(5),
        .table tbody td:nth-child(5) {
            width: 20px;
            text-align: center;
        }
        
        .table thead th:nth-child(6),
        .table tbody td:nth-child(6) {
            width: 20px;
            text-align: center;
        }
        
        .table thead th:nth-child(7),
        .table tbody td:nth-child(7) {
            width: 20px;
            text-align: center;
        }
        
        .table thead th:nth-child(8),
        .table tbody td:nth-child(8) {
            width: 30px;
            text-align: center;
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
            gap: 4px;
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
            font-size: 10px;
            margin-right: 2px;
        }
        
         /* .btn-detail {
            min-width: 60px;
        } */
        
       
        /* .btn-action {
            min-width: 50px;
        } */
        
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
                padding: 2px 4px;
                font-size: 9px;
                min-width: 45px;
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
                                        <!-- <h5 class="m-b-10"></h5> -->
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fas fa-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Barang</a></li>
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
                                                <h5><i class="fas fa-list"></i> Daftar Barang</h5>
                                                <div class="btn-group">
                                                    <button class="btn btn-success btn-sm" id="export" type="button">
                                                        <i class="fas fa-print"></i> Cetak Daftar Barang
                                                    </button>
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
                                                        <i class="fas fa-plus-circle"></i> Tambah Barang
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table datatable table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Kode Bahan Baku</th>
                                                                <th>Nama Bahan Baku</th>
                                                                <th>Mesh</th>
                                                                <th>Satuan</th>
                                                                <th>Bloom</th>
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
                                                                    <span class="badge badge-primary"><?=$k['kode_barang']?></span>
                                                                </td>
                                                                <td>
                                                                    <strong><?=$k['nama_barang']?></strong>
                                                                </td>
                                                                <td class="text-center"><?=$k['mesh']?></td>
                                                                <td class="text-center"><?=$k['satuan']?></td>
                                                                <td class="text-center"><?=$k['bloom']?></td>
                                                                <td class="text-center">
                                                                    <button type="button" 
                                                                        class="btn btn-info btn-sm btn-detail" 
                                                                        data-toggle="modal" 
                                                                        data-target="#detail" 
                                                                        data-id_barang="<?=$k['id_barang']?>"
                                                                        data-kode_barang="<?=$k['kode_barang']?>"
                                                                        data-kode_barang_bpom="<?=$k['kode_barang_bpom']?>"
                                                                        data-nama_barang="<?=$k['nama_barang']?>"
                                                                        data-mesh="<?=$k['mesh']?>"
                                                                        data-bloom="<?=$k['bloom']?>"
                                                                        data-satuan="<?=$k['satuan']?>"
                                                                        data-id_supplier="<?=$k['id_supplier']?>"
                                                                        data-nama_supplier="<?=$k['nama_supplier']?>">
                                                                        <i class="fas fa-eye"></i> Detail
                                                                    </button>
                                                                </td>
                                                                <td class="text-center">
                                                                    <div class="action-buttons">
                                                                        <button type="button" 
                                                                            class="btn btn-warning btn-sm btn-action" 
                                                                            data-toggle="modal" 
                                                                            data-target="#edit"
                                                                            data-id_barang="<?=$k['id_barang']?>"
                                                                            data-kode_barang="<?=$k['kode_barang']?>"
                                                                            data-kode_barang_bpom="<?=$k['kode_barang_bpom']?>"
                                                                            data-nama_barang="<?=$k['nama_barang']?>"
                                                                            data-mesh="<?=$k['mesh']?>"
                                                                            data-bloom="<?=$k['bloom']?>"
                                                                            data-satuan="<?=$k['satuan']?>"
                                                                            data-id_supplier="<?=$k['id_supplier']?>"
                                                                            data-nama_supplier="<?=$k['nama_supplier']?>">
                                                                            <i class="fas fa-edit"></i> Edit
                                                                        </button>
                                                                        <a  
                                                                            href="<?=base_url()?>master/master_barang/delete/<?=$k['id_barang']?>" 
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
                <div class="modal-barang">
                    <h5 class="modal-title"><i class="fas fa-plus-circle"></i> Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?=base_url()?>master/master_barang/add">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Kode Bahan Baku BPOM</label>
                                    <input type="text" class="form-control" id="kode_barang_bpom" name="kode_barang_bpom" value="010186" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Kode Bahan Baku</label>
                                    <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Kode Barang" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        Maaf Kode Bahan Baku sudah ada.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nama Bahan Baku</label>
                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Bahan Baku" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Mesh</label>
                                    <input class="form-control" id="mesh" name="mesh" placeholder="Mesh" autocomplete="off" required>
                                </div>
                            </div>
                    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Bloom</label>
                                    <input type="text" class="form-control" id="bloom" name="bloom" placeholder="Bloom" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Satuan</label>
                                    <select class="form-control chosen-select" id="satuan" name="satuan" autocomplete="off">
                                        <option value="">- Pilih Satuan -</option>
                                        <option value="Kg">Kg</option>
                                        <option value="g">g</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nama Supplier</label>
                                    <select class="form-control chosen-select" id="id_supplier" name="id_supplier" autocomplete="off" required>
                                        <option value="">-Pilih Nama Supplier -</option>
                                        <?php 
                                        foreach($res_supplier as $s){ 
                                        ?>
                                        <option value="<?=$s['id_supplier']?>">(<?=$s['kode_supplier']?>) <?=$s['nama_supplier']?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
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
                    <h5 class="modal-title"><i class="fas fa-eye"></i> Detail Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Kode Bahan Baku BPOM</label>
                                <input type="text" class="form-control" id="v_kode_barang_bpom" name="kode_barang_bpom" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Kode Bahan Baku</label>
                                <input type="text" class="form-control" id="v_kode_barang" name="kode_barang" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Nama Bahan Baku</label>
                                <input type="text" class="form-control" id="v_nama_barang" name="nama_barang" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Mesh</label>
                                <input class="form-control" id="v_mesh" name="mesh" readonly>
                            </div>
                        </div>
                
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Bloom</label>
                                <input type="text" class="form-control" id="v_bloom" name="bloom" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Satuan</label>
                                <input type="text" class="form-control" id="v_satuan" name="satuan" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Nama Supplier</label>
                                <input type="text" class="form-control" id="v_nama_supplier" name="nama_supplier" readonly>
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
                    <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Master Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?=base_url()?>master/master_barang/update">
                    <input type="hidden" id="e_id_barang" name="id_barang">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Kode Bahan Baku BPOM</label>
                                    <input type="text" class="form-control" id="e_kode_barang_bpom" name="kode_barang_bpom" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Kode Bahan Baku</label>
                                    <input type="text" class="form-control" id="e_kode_barang" name="kode_barang" placeholder="Kode Barang" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        Maaf Kode Bahan Baku sudah ada.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nama Bahan Baku</label>
                                    <input type="text" class="form-control" id="e_nama_barang" name="nama_barang" placeholder="Nama Bahan Baku" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Mesh</label>
                                    <input class="form-control" id="e_mesh" name="mesh" placeholder="Mesh" autocomplete="off" required>
                                </div>
                            </div>
                    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Bloom</label>
                                    <input type="text" class="form-control" id="e_bloom" name="bloom" placeholder="Bloom" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Satuan</label>
                                    <select class="form-control chosen-select" id="e_satuan" name="satuan" autocomplete="off">
                                        <option value="">- Pilih Satuan -</option>
                                        <option value="Kg">Kg</option>
                                        <option value="g">g</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nama Supplier</label>
                                    <select class="form-control chosen-select" id="e_id_supplier" name="id_supplier" autocomplete="off" required>
                                        <option value="">-Pilih Nama Supplier -</option>
                                        <?php 
                                        foreach($res_supplier as $s){ 
                                        ?>
                                        <option value="<?=$s['id_supplier']?>">(<?=$s['kode_supplier']?>) <?=$s['nama_supplier']?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
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
            $("#kode_barang").keyup(function(){
                var kode_barang =  $("#kode_barang").val();
                jQuery.ajax({
                    url: "<?=base_url()?>master/master_barang/cek_kode_barang",
                    dataType:'text',
                    type: "post",
                    data:{kode_barang:kode_barang},
                    success:function(response){
                        if (response =="true") {
                            $("#kode_barang").addClass("is-invalid");
                            $("#simpan").attr("disabled","disabled");
                        }else{
                            $("#kode_barang").removeClass("is-invalid");
                            $("#simpan").removeAttr("disabled");
                        }
                    }            
                });
            });

            $('#detail').on('show.bs.modal', function (event) {
                var id_barang = $(event.relatedTarget).data('id_barang') 
                var kode_barang = $(event.relatedTarget).data('kode_barang')
                var kode_barang_bpom = $(event.relatedTarget).data('kode_barang_bpom') 
                var nama_barang = $(event.relatedTarget).data('nama_barang') 
                var mesh = $(event.relatedTarget).data('mesh') 
                var satuan = $(event.relatedTarget).data('satuan') 
                var bloom = $(event.relatedTarget).data('bloom')
                var id_supplier = $(event.relatedTarget).data('id_supplier') 
                var nama_supplier = $(event.relatedTarget).data('nama_supplier') 

                $(this).find('#v_kode_barang').val(kode_barang)
                $(this).find('#v_kode_barang_bpom').val(kode_barang_bpom)
                $(this).find('#v_nama_barang').val(nama_barang)
                $(this).find('#v_mesh').val(mesh)
                $(this).find('#v_satuan').val(satuan)
                $(this).find('#v_bloom').val(bloom)
                $(this).find('#v_nama_supplier').val(nama_supplier)
            });

            $('#edit').on('show.bs.modal', function (event) {
                var id_barang = $(event.relatedTarget).data('id_barang') 
                var kode_barang = $(event.relatedTarget).data('kode_barang')
                var kode_barang_bpom = $(event.relatedTarget).data('kode_barang_bpom') 
                var nama_barang = $(event.relatedTarget).data('nama_barang') 
                var mesh = $(event.relatedTarget).data('mesh') 
                var satuan = $(event.relatedTarget).data('satuan') 
                var bloom = $(event.relatedTarget).data('bloom')
                var id_supplier = $(event.relatedTarget).data('id_supplier') 
                var nama_supplier = $(event.relatedTarget).data('nama_supplier') 

                $(this).find('#e_id_barang').val(id_barang)
                $(this).find('#e_kode_barang').val(kode_barang)
                $(this).find('#e_kode_barang_bpom').val(kode_barang_bpom)
                $(this).find('#e_nama_barang').val(nama_barang)
                $(this).find('#e_mesh').val(mesh)
                $(this).find('#e_satuan').val(satuan)
                $(this).find('#e_satuan').trigger("chosen:updated");
                $(this).find('#e_bloom').val(bloom)
                $(this).find('#e_id_supplier').val(id_supplier)
                $(this).find('#e_id_supplier').trigger("chosen:updated");
            });

            $("#e_kode_barang").keyup(function(){
                var kode_barang =  $("#e_kode_barang").val();
                jQuery.ajax({
                    url: "<?=base_url()?>master/master_barang/cek_kode_barang",
                    dataType:'text',
                    type: "post",
                    data:{kode_barang:kode_barang},
                    success:function(response){
                        if (response =="true") {
                            $("#e_kode_barang").addClass("is-invalid");
                            $("#simpan").attr("disabled","disabled");
                        }else{
                            $("#e_kode_barang").removeClass("is-invalid");
                            $("#simpan").removeAttr("disabled");
                        }
                    }            
                });
            });

            $('#export').click(function () {
                var url = "<?=base_url()?>master/master_barang/pdf_daftar_barang/";
                window.open(url, 'pdf_laporan_daftar_barang', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
            });
        });
    </script>
</body>
</html>