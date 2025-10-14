<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PO Pembelian</title>
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
            left: 100%;
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
            display: flex;
            align-items: center;
            gap: 6px;
        }
        
        .form-label i {
            color: var(--primary);
            font-size: 14px;
            width: 16px;
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
            line-height: 1.5;
            white-space: nowrap;
        }
        
        .table .btn i {
            font-size: 10px;
            margin-right: 2px;
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
                                        <!-- <h5 class="m-b-10"></h5> -->
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fas fa-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Purchasing</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">PO Pembelian</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                           
                            <!-- Filter Section - DIUBAH -->
                            <div class="filter-section">
                                <div class="filter-row">
                                    <div class="filter-group">
                                        <label class="form-label">
                                            <i class="fas fa-truck"></i>
                                            <span>Supplier</span>
                                        </label>
                                        <select class="form-control chosen-select" id="filter_supplier" name="filter_supplier">
                                            <option value="" disabled selected hidden>- Pilih Supplier -</option>
                                            <?php foreach ($res_supplier as $rc) { ?>
                                                <option <?= $nama_supplier === $rc['nama_supplier'] ? 'selected' : '' ?> value="<?= $rc['nama_supplier'] ?>"><?= $rc['nama_supplier'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    
                                    <div class="filter-group">
                                        <label class="form-label">
                                            <i class="fas fa-box"></i>
                                            <span>Barang</span>
                                        </label>
                                        <select class="form-control chosen-select" id="filter_barang" name="filter_barang">
                                            <option value="" disabled selected hidden>- Pilih Barang -</option>
                                            <?php foreach ($res_barang as $rb) { ?>
                                                <option <?= $nama_barang === $rb['nama_barang'] ? 'selected' : '' ?> value="<?= $rb['nama_barang'] ?>"><?= $rb['nama_barang'] ?> - Mesh <?= $rb['mesh'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    
                                    <div class="filter-group">
                                        <label class="form-label">
                                            <i class="fas fa-calendar-alt"></i>
                                            <span>Dari Tanggal</span>
                                        </label>
                                        <input type="text" id="filter_tgl" value="<?= $tgl == null ? '' : $tgl ?>" class="form-control datepicker" placeholder="Pilih tanggal" autocomplete="off">
                                    </div>
                                    
                                    <div class="filter-group">
                                        <label class="form-label">
                                            <i class="fas fa-calendar-alt"></i>
                                            <span>Sampai Tanggal</span>
                                        </label>
                                        <input type="text" id="filter_tgl2" value="<?= $tgl2 == null ? '' : $tgl2 ?>" class="form-control datepicker" placeholder="Pilih tanggal" autocomplete="off">
                                    </div>
                                    
                                    <div class="filter-actions">
                                        <button class="btn btn-info" id="lihat" type="button">
                                            <i class="fas fa-search"></i> Filter
                                        </button>
                                        <button class="btn btn-success" id="export" type="button">
                                            <i class="fas fa-print"></i> Cetak
                                        </button>
                                        <a href="<?=base_url()?>purchasing/po_pembelian" class="btn btn-warning" id="reset" type="button">
                                            <i class="fas fa-refresh"></i> Reset
                                        </a>
                                    </div>
                                </div>
                            </div>
                                
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5><i class="fas fa-list"></i> Data PO Pembelian</h5>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
                                                <i class="fas fa-plus-circle"></i> Tambah PO Pembelian
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table class="table datatable table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tgl PO</th>
                                                        <th>No PO</th>
                                                        <th>Supplier</th>
                                                        <th>Nama Barang</th>
                                                        <th>Jumlah PO</th>
                                                        <th>Status</th>
                                                        <th class="text-center">Detail</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $level = $this->session->userdata('level');
                                                    $no=1;
                                                    foreach($result as $k){ 
                                                        $tgl_po_pembelian =  explode('-', $k['tgl_po_pembelian'])[2]."/".explode('-', $k['tgl_po_pembelian'])[1]."/".explode('-', $k['tgl_po_pembelian'])[0];
                                                    ?>
                                                    <tr>
                                                        <th scope="row"><?=$no++?></th>
                                                        <td><?=$tgl_po_pembelian?></td>
                                                        <td>
                                                            <span class="badge badge-primary"><?=$k['no_po_pembelian']?></span>
                                                        </td>
                                                        <td><?=$k['nama_supplier']?></td>
                                                        <td><?=$k['nama_barang']?></td>
                                                        <td class="text-right"><?=number_format($k['jumlah_po_pembelian'],0,",",".")?> <?=$k['satuan']?></td>
                                                        <td>
                                                            <?php if($k['status_po_pembelian'] == 'Proses'): ?>
                                                                <span class="badge badge-warning"><?=$k['status_po_pembelian']?></span>
                                                            <?php elseif($k['status_po_pembelian'] == 'Selesai'): ?>
                                                                <span class="badge badge-success"><?=$k['status_po_pembelian']?></span>
                                                            <?php else: ?>
                                                                <span class="badge badge-primary"><?=$k['status_po_pembelian']?></span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <button type="button" 
                                                                class="btn btn-info btn-sm btn-detail" 
                                                                data-toggle="modal" 
                                                                data-target="#detail" 
                                                                data-id_prc_po_pembelian="<?=$k['id_prc_po_pembelian']?>"
                                                                data-no_po_pembelian="<?=$k['no_po_pembelian']?>"
                                                                data-tgl_po_pembelian="<?=$tgl_po_pembelian?>"
                                                                data-id_supplier="<?=$k['id_supplier']?>"
                                                                data-nama_supplier="<?=$k['nama_supplier']?>"
                                                                data-id_barang="<?=$k['id_barang']?>"
                                                                data-nama_barang="<?=$k['nama_barang']?>"
                                                                data-mesh="<?=$k['mesh']?>"
                                                                data-bloom="<?=$k['bloom']?>"
                                                                data-jumlah_po_pembelian="<?=$k['jumlah_po_pembelian']?>"
                                                                data-harga_po_pembelian="<?= $k['harga_po_pembelian'] ?>"
                                                                data-jenis_pembayaran="<?=$k['jenis_pembayaran']?>"
                                                                data-prc_admin="<?=$k['prc_admin']?>">
                                                                <i class="fas fa-eye"></i> Detail
                                                            </button>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="action-buttons">
                                                                <?php if ($level === "0" && $k['status_po_pembelian'] === "Proses") { ?>
                                                                <button type="button" 
                                                                    class="btn btn-warning btn-sm btn-action" 
                                                                    data-toggle="modal" 
                                                                    data-target="#edit"
                                                                    data-id_prc_po_pembelian="<?=$k['id_prc_po_pembelian']?>"
                                                                    data-no_po_pembelian="<?=$k['no_po_pembelian']?>"
                                                                    data-tgl_po_pembelian="<?=$tgl_po_pembelian?>"
                                                                    data-id_supplier="<?=$k['id_supplier']?>"
                                                                    data-nama_supplier="<?=$k['nama_supplier']?>"
                                                                    data-id_barang="<?=$k['id_barang']?>"
                                                                    data-nama_barang="<?=$k['nama_barang']?>"
                                                                    data-mesh="<?=$k['mesh']?>"
                                                                    data-bloom="<?=$k['bloom']?>"
                                                                    data-jumlah_po_pembelian="<?=$k['jumlah_po_pembelian']?>"
                                                                    data-harga_po_pembelian="<?=$k['harga_po_pembelian']?>"
                                                                    data-jenis_pembayaran="<?=$k['jenis_pembayaran']?>"
                                                                    data-prc_admin="<?=$k['prc_admin']?>">
                                                                    <i class="fas fa-edit"></i> Edit
                                                                </button>
                                                                <a  
                                                                    href="<?=base_url()?>purchasing/po_pembelian/delete/<?=$k['id_prc_po_pembelian']?>" 
                                                                    class="btn btn-danger btn-sm btn-action" 
                                                                    onclick = "if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                                                    <i class="fas fa-trash"></i> Hapus
                                                                </a>
                                                                <?php } ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
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
    </section>

    <!-- Modal Tambah -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-barang">
                    <h5 class="modal-title",><i class="fas fa-plus-circle"></i> Tambah PO Pembelian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?=base_url()?>purchasing/po_pembelian/add">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">No PO Pembelian</label>
                                    <input type="text" class="form-control" id="no_po_pembelian" name="no_po_pembelian" placeholder="No PO Pembelian" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        Maaf No PO Pembelian sudah ada.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Tanggal PO Pembelian</label>
                                    <input type="text" class="form-control datepicker" id="tgl_po_pembelian" name="tgl_po_pembelian" placeholder="Tanggal PO Pembelian" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nama Barang</label>
                                    <select class="form-control chosen-select" id="id_barang" name="id_barang" autocomplete="off" required>
                                        <option value="">-Pilih Nama Barang -</option>
                                        <?php foreach($res_barang as $b){ ?>
                                        <option data-mesh="<?= $b['mesh'] ?>" data-bloom="<?= $b['bloom'] ?>" data-nama_supplier="<?= $b['nama_supplier'] ?>" value="<?=$b['id_barang']?>">(<?=$b['kode_barang']?>) <?=$b['nama_barang']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Mesh</label>
                                    <input class="form-control" id="mesh" name="mesh" placeholder="Mesh" autocomplete="off" readonly>
                                </div>
                            </div>
                    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Bloom</label>
                                    <input type="text" class="form-control" id="bloom" name="bloom" placeholder="Bloom" autocomplete="off" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nama Supplier</label>
                                    <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" placeholder="Nama Supplier" autocomplete="off" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Jumlah (kg)</label>
                                    <input type="text" class="form-control" id="jumlah_po_pembelian" name="jumlah_po_pembelian" placeholder="Jumlah (Kg)" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Harga (Rp/Kg)</label>
                                    <input type="text" class="form-control" id="harga_po_pembelian" name="harga_po_pembelian" placeholder="Harga (Rp/Kg)" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Jumlah Harga (Rp)</label>
                                    <input type="text" class="form-control" id="total_harga" name="total_harga" placeholder="Total Harga (Rp)" readonly>
                                </div>
                            </div>
                    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Jenis Pembayaran</label>
                                    <select class="form-control chosen-select" id="jenis_pembayaran" name="jenis_pembayaran" autocomplete="off">
                                        <option value="">- Pilih Jenis Pembayaran -</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Kredit">Kredit</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Purchasing Admin</label>
                                    <input type="text" class="form-control" id="prc_admin" name="prc_admin" value="<?=$this->session->userdata('nama')?>" autocomplete="off" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" id="simpan" class="btn btn-primary" onclick="if (!confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">
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
                    <h5 class="modal-title"><i class="fas fa-eye"></i> Detail PO Pembelian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="v-prc_po_pembelian" name="id_prc_po_pembelian">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">No PO Pembelian</label>
                                <input type="text" class="form-control" id="v-no_po_pembelian" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Tanggal PO Pembelian</label>
                                <input type="text" class="form-control" id="v-tgl_po_pembelian" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" id="v-id_barang" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Mesh</label>
                                <input type="text" class="form-control" id="v-mesh" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Bloom</label>
                                <input type="text" class="form-control" id="v-bloom" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Nama Supplier</label>
                                <input type="text" class="form-control" id="v-nama_supplier" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Jumlah (Kg)</label>
                                <input type="text" class="form-control" id="v-jumlah_po_pembelian" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Harga (Rp/Kg)</label>
                                <input type="text" class="form-control" id="v-harga_po_pembelian" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Jumlah Harga (Rp)</label>
                                <input type="text" class="form-control" id="v-total_harga" name="total_harga" placeholder="Total Harga (Rp)" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Jenis Pembayaran</label>
                                <input type="text" class="form-control" id="v-jenis_pembayaran" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Purchasing Admin</label>
                                <input type="text" class="form-control" id="v-prc_admin" readonly>
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
                    <h5 class="modal-title"><i class="fas fa-edit"></i> Edit PO Pembelian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?=base_url()?>purchasing/po_pembelian/update">
                    <input type="hidden" id="e-id_prc_po_pembelian" name="id_prc_po_pembelian">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">No PO Pembelian</label>
                                    <input type="text" class="form-control" id="e-no_po_pembelian" name="no_po_pembelian" placeholder="No PO Pembelian" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        Maaf No PO Pembelian sudah ada.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Tanggal PO Pembelian</label>
                                    <input type="text" class="form-control datepicker" id="e-tgl_po_pembelian" name="tgl_po_pembelian" placeholder="Tanggal PO Pembelian" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nama Barang</label>
                                    <select class="form-control chosen-select" id="e-id_barang" name="id_barang" autocomplete="off" required>
                                        <option value="">-Pilih Nama Barang -</option>
                                        <?php foreach($res_barang as $b){ ?>
                                        <option data-mesh="<?= $b['mesh'] ?>" data-bloom="<?= $b['bloom'] ?>" data-nama_supplier="<?= $b['nama_supplier'] ?>" value="<?=$b['id_barang']?>">(<?=$b['kode_barang']?>) <?=$b['nama_barang']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Mesh</label>
                                    <input class="form-control" id="e-mesh" name="mesh" placeholder="Mesh" readonly>
                                </div>
                            </div>
                    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Bloom</label>
                                    <input type="text" class="form-control" id="e-bloom" name="bloom" placeholder="Bloom" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nama Supplier</label>
                                    <input type="text" class="form-control" id="e-nama_supplier" name="nama_supplier" placeholder="Nama Supplier" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Jumlah (kg)</label>
                                    <input type="text" class="form-control" id="e-jumlah_po_pembelian" name="jumlah_po_pembelian" placeholder="Jumlah (Kg)" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Harga (Rp/Kg)</label>
                                    <input type="text" class="form-control" id="e-harga_po_pembelian" name="harga_po_pembelian" placeholder="Harga (Rp/Kg)" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Jumlah Harga (Rp)</label>
                                    <input type="text" class="form-control" id="e-total_harga" name="total_harga" placeholder="Total Harga (Rp)" readonly>
                                </div>
                            </div>
                    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Jenis Pembayaran</label>
                                    <select class="form-control chosen-select" id="e-jenis_pembayaran" name="jenis_pembayaran" autocomplete="off">
                                        <option value="">- Pilih Jenis Pembayaran -</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Kredit">Kredit</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Purchasing Admin</label>
                                    <input type="text" class="form-control" id="e-prc_admin" name="prc_admin" value="<?=$this->session->userdata('nama')?>" autocomplete="off" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" id="simpan" class="btn btn-primary" onclick="if (!confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">
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
            // Filter functionality
            $('#lihat').click(function () {
                var filter_barang = $('#filter_barang').find(':selected').val();
                var filter_supplier = $('#filter_supplier').find(':selected').val();
                var filter_tgl = $('#filter_tgl').val();
                var filter_tgl2 = $('#filter_tgl2').val();

                var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
                var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];
                
                if (filter_tgl =='' && filter_tgl2 !='') {
                    window.location = "<?=base_url()?>purchasing/po_pembelian?alert=warning&msg=dari tanggal belum diisi";
                } else if (filter_tgl !='' && filter_tgl2=='') {
                    window.location = "<?=base_url()?>purchasing/po_pembelian?alert=warning&msg=sampai tanggal belum diisi";
                } else {
                    const query = new URLSearchParams({
                        nama_supplier: filter_supplier,
                        nama_barang: filter_barang,
                        date_from: filter_tgl,
                        date_until: filter_tgl2
                    })
                    window.location = "<?=base_url() ?>purchasing/po_pembelian/index?"+ query.toString()
                }
            });

            // Export functionality
            $('#export').click(function () {
                var filter_barang = $('#filter_barang').find(':selected').val();
                var filter_supplier = $('#filter_supplier').find(':selected').val();
                var filter_tgl = $('#filter_tgl').val();
                var filter_tgl2 = $('#filter_tgl2').val();

                var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
                var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];

                if (filter_tgl == '' && filter_tgl2 != '') {
                    window.location = "<?= base_url() ?>purchasing/po_pembelian?alert=warning&msg=dari tanggal belum diisi";
                    alert("dari tanggal belum diisi")
                } else if (filter_tgl != '' && filter_tgl2 == '') {
                    window.location = "<?= base_url() ?>purchasing/po_pembelian?alert=warning&msg=sampai tanggal belum diisi";
                } else {
                    const query = new URLSearchParams({
                        nama_supplier: filter_supplier,
                        nama_barang: filter_barang,
                        date_from: filter_tgl,
                        date_until: filter_tgl2
                    })
                    var url = "<?= base_url() ?>purchasing/po_pembelian/pdf_po_pembelian?" + query.toString();
                    window.open(url, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
                }
            });

            // Add modal functionality
            $("#no_po_pembelian").keyup(function(){
                var no_po_pembelian =  $("#no_po_pembelian").val();
                jQuery.ajax({
                    url: "<?=base_url()?>purchasing/po_pembelian/cek_no_po_pembelian",
                    dataType:'text',
                    type: "post",
                    data:{no_po_pembelian:no_po_pembelian},
                    success:function(response){
                        if (response =="true") {
                            $("#no_po_pembelian").addClass("is-invalid");
                            $("#simpan").attr("disabled","disabled");
                        }else{
                            $("#no_po_pembelian").removeClass("is-invalid");
                            $("#simpan").removeAttr("disabled");
                        }
                    }            
                });
            });

            // Format Rupiah function
            function formatRupiah(angka) {
                let number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split   		= number_string.split(','),
                    sisa     		= split[0].length % 3,
                    rupiah     	= split[0].substr(0, sisa),
                    ribuan     	= split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    let separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return rupiah;
            }

            // Auto calculate total harga
            $('#jumlah_po_pembelian, #harga_po_pembelian').on('keyup change', function() {
                let jumlah_po = $('#jumlah_po_pembelian').val().replace(/\./g, '');
                let harga_po = $('#harga_po_pembelian').val().replace(/\./g, '');
                
                if (jumlah_po && harga_po) {
                    let total = parseInt(jumlah_po) * parseInt(harga_po);
                    $('#total_harga').val(formatRupiah(total.toString()));
                } else {
                    $('#total_harga').val('');
                }
            });

            // Auto fill form fields
            $("select").on('change', function() {
                const selected = $(this).find(':selected')
                $('#mesh').val(selected.data('mesh') || '')
                $('#bloom').val(selected.data('bloom') || '')
                $('#nama_supplier').val(selected.data('nama_supplier') || '')
            });

            // Format number inputs
            document.getElementById('jumlah_po_pembelian').addEventListener('keyup', function(e) {
                let value = this.value.replace(/\D/g,'');
                value = new Intl.NumberFormat('id-ID').format(value);
                this.value = value;
            });

            document.getElementById('harga_po_pembelian').addEventListener('keyup', function(e) {
                let value = this.value.replace(/\D/g,'');
                value = new Intl.NumberFormat('id-ID').format(value);
                this.value = value;
            });

            // Detail modal functionality
            $('#detail').on('show.bs.modal', function (event) {
                function formatRupiah(angka) {
                    let number_string = angka.replace(/[^,\d]/g, '').toString(),
                        split   		= number_string.split(','),
                        sisa     		= split[0].length % 3,
                        rupiah     	= split[0].substr(0, sisa),
                        ribuan     	= split[0].substr(sisa).match(/\d{3}/gi);

                    if (ribuan) {
                        let separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }

                    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                    return rupiah;
                }

                var id_prc_po_pembelian = $(event.relatedTarget).data('id_prc_po_pembelian');
                var no_po_pembelian     = $(event.relatedTarget).data('no_po_pembelian');
                var tgl_po_pembelian    = $(event.relatedTarget).data('tgl_po_pembelian');
                var nama_supplier       = $(event.relatedTarget).data('nama_supplier');
                var id_barang           = $(event.relatedTarget).data('nama_barang');
                var mesh                = $(event.relatedTarget).data('mesh');
                var bloom               = $(event.relatedTarget).data('bloom');
                var jumlah_po_pembelian = $(event.relatedTarget).data('jumlah_po_pembelian');
                var harga_po_pembelian  = $(event.relatedTarget).data('harga_po_pembelian');
                var jenis_pembayaran    = $(event.relatedTarget).data('jenis_pembayaran');
                var prc_admin           = $(event.relatedTarget).data('prc_admin');
                
                $(this).find('#v-prc_po_pembelian').val(id_prc_po_pembelian);
                $(this).find('#v-no_po_pembelian').val(no_po_pembelian);
                $(this).find('#v-tgl_po_pembelian').val(tgl_po_pembelian);
                $(this).find('#v-nama_supplier').val(nama_supplier);
                $(this).find('#v-id_barang').val(id_barang);
                $(this).find('#v-mesh').val(mesh);
                $(this).find('#v-bloom').val(bloom);
                $(this).find('#v-jumlah_po_pembelian').val(jumlah_po_pembelian);
                $(this).find('#v-harga_po_pembelian').val(harga_po_pembelian);
                $(this).find('#v-jenis_pembayaran').val(jenis_pembayaran);
                $(this).find('#v-prc_admin').val(prc_admin);
                
                let total = parseInt(jumlah_po_pembelian) * parseInt(harga_po_pembelian);
                $(this).find('#v-total_harga').val(formatRupiah(total.toString()));
            });

            // Edit modal functionality
            $('#edit').on('show.bs.modal', function (event) {
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

                var button = $(event.relatedTarget);
                var id_prc_po_pembelian = button.data('id_prc_po_pembelian');
                var no_po_pembelian = button.data('no_po_pembelian');
                var tgl_po_pembelian = button.data('tgl_po_pembelian');
                var nama_supplier = button.data('nama_supplier');
                var id_barang = button.data('id_barang');
                var mesh = button.data('mesh');
                var bloom = button.data('bloom');
                var jumlah_po_pembelian = button.data('jumlah_po_pembelian');
                var harga_po_pembelian = button.data('harga_po_pembelian');
                var jenis_pembayaran = button.data('jenis_pembayaran');
                var prc_admin = button.data('prc_admin');

                var modal = $(this);
                modal.find('#e-id_prc_po_pembelian').val(id_prc_po_pembelian);
                modal.find('#e-no_po_pembelian').val(no_po_pembelian);
                modal.find('#e-tgl_po_pembelian').val(tgl_po_pembelian);
                modal.find('#e-nama_supplier').val(nama_supplier);
                modal.find('#e-id_barang').val(id_barang).trigger("chosen:updated");
                modal.find('#e-mesh').val(mesh);
                modal.find('#e-bloom').val(bloom);
                modal.find('#e-jumlah_po_pembelian').val(jumlah_po_pembelian);
                modal.find('#e-harga_po_pembelian').val(harga_po_pembelian);
                modal.find('#e-jenis_pembayaran').val(jenis_pembayaran).trigger("chosen:updated");
                modal.find('#e-prc_admin').val(prc_admin);

                let total = (parseFloat(jumlah_po_pembelian) || 0) * (parseFloat(harga_po_pembelian) || 0);
                modal.find('#e-total_harga').val(formatRupiah(total));

                modal.find('#e-tgl_po_pembelian').datepicker().on('show.bs.modal', function(e) {
                    e.stopPropagation();
                });

                $("#e-no_po_pembelian").keyup(function(){
                    var no_po_pembelian =  $("#e-no_po_pembelian").val();
                    jQuery.ajax({
                        url: "<?=base_url()?>purchasing/po_pembelian/cek_no_po_pembelian",
                        dataType:'text',
                        type: "post",
                        data:{no_po_pembelian:no_po_pembelian},
                        success:function(response){
                            if (response =="true") {
                                $("#e-no_po_pembelian").addClass("is-invalid");
                                $("#simpan").attr("disabled","disabled");
                            }else{
                                $("#e-no_po_pembelian").removeClass("is-invalid");
                                $("#simpan").removeAttr("disabled");
                            }
                        }            
                    });
                });

                $("select").on('change', function() {
                    const selected = $(this).find(':selected')
                    $('#e-mesh').val(selected.data('mesh') || '')
                    $('#e-bloom').val(selected.data('bloom') || '')
                    $('#e-nama_supplier').val(selected.data('nama_supplier') || '')
                });

                document.getElementById('e-jumlah_po_pembelian').addEventListener('keyup', function(e) {
                    let value = this.value.replace(/\D/g,'');
                    value = new Intl.NumberFormat('id-ID').format(value);
                    this.value = value;
                });

                document.getElementById('e-harga_po_pembelian').addEventListener('keyup', function(e) {
                    let value = this.value.replace(/\D/g,'');
                    value = new Intl.NumberFormat('id-ID').format(value);
                    this.value = value;
                });

                $("#e-jumlah_po_pembelian, #e-harga_po_pembelian").on('keyup change', function() {
                    let jumlah = parseFloat($("#e-jumlah_po_pembelian").val().replace(/\./g,'')) || 0;
                    let harga = parseFloat($("#e-harga_po_pembelian").val().replace(/\./g,'')) || 0;
                    let total = jumlah * harga;
                    $("#e-total_harga").val(formatRupiah(total));
                });
            });
        });
    </script>
</body>
</html>