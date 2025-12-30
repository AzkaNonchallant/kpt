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
        padding: 15px;
        background-color: #f5f7fb;
        min-height: 100vh;
        max-width: 100%;
        overflow-x: hidden;
    }
    
    .page-header {
        margin-bottom: 20px;
        max-width: 100%;
    }
    
    .page-title {
        font-size: clamp(18px, 4vw, 24px);
        font-weight: 700;
        margin-bottom: 10px;
        color: var(--dark);
        display: flex;
        align-items: center;
        word-wrap: break-word;
    }
    
    .page-title i {
        margin-right: 10px;
        color: var(--primary);
        flex-shrink: 0;
    }
    
    .breadcrumb {
        background: transparent;
        padding: 0;
        margin-bottom: 0;
        flex-wrap: wrap;
    }
    
    .breadcrumb-item {
        white-space: nowrap;
    }
    
    .breadcrumb-item a {
        color: var(--primary);
        text-decoration: none;
        font-size: clamp(12px, 3vw, 14px);
    }
    
    .card {
        width: 100%;
        max-width: 100%;
        border: none;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        margin-bottom: 20px;
        overflow: hidden;
    }
    
    .card-header {
        background: white;
        border-bottom: 1px solid var(--light-gray);
        padding: 15px 20px;
        border-radius: var(--border-radius) var(--border-radius) 0 0 !important;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
    }
    
    .card-header h5 {
        font-size: clamp(16px, 3vw, 18px);
        font-weight: 700;
        color: var(--dark);
        margin: 0;
        flex: 1;
        min-width: 200px;
    }
    
    .btn-group {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
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
        font-size: clamp(12px, 2.5vw, 14px);
        white-space: nowrap;
        flex-shrink: 0;
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
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    
    .table {
        margin-bottom: 0;
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
        min-width: 800px;
    }
    
    .table thead th {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
        border: none;
        padding: 12px 8px;
        font-weight: 600;
        text-transform: uppercase;
        font-size: clamp(10px, 2vw, 12px);
        line-height: 1.5;
        letter-spacing: 0.5px;
        white-space: nowrap;
        position: sticky;
        top: 0;
    }
    
    .table tbody td {
        padding: 12px 8px;
        vertical-align: middle;
        border-bottom: 1px solid var(--light-gray);
        white-space: nowrap;
        font-size: clamp(11px, 2.5vw, 13px);
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
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 600;
        font-size: clamp(10px, 2vw, 11px);
        min-width: 60px;
        display: inline-block;
        text-align: center;
        white-space: nowrap;
    }
    
    .badge-success {
        background-color: rgba(76, 201, 240, 0.15);
        color: #4cc9f0;
        border: 1px solid #4cc9f0;
    }
    
    .badge-primary {
        background-color: rgba(67, 97, 238, 0.1);
        color: var(--primary);
        border: 1px solid var(--primary);
    }
    
    .badge-warning {
        background-color: rgba(205, 148, 3, 0.96);
        color: #000000ff;
       
    }
    
    .modal-content {
        border: none;
        border-radius: var(--border-radius);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        max-width: 95vw;
        margin: 0 auto;
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
        font-size: clamp(16px, 3vw, 18px);
        color: white;
        word-wrap: break-word;
    }
    
    .close {
        color: white;
        opacity: 0.8;
        font-size: clamp(16px, 3vw, 20px);
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
        font-size: clamp(13px, 2.5vw, 14px);
        width: 100%;
        box-sizing: border-box;
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
        font-size: clamp(13px, 2.5vw, 14px);
    }
    
    .form-label i {
        color: var(--primary);
        font-size: 14px;
        width: 16px;
        flex-shrink: 0;
    }
    
    .invalid-feedback {
        font-size: clamp(11px, 2vw, 12px);
        margin-top: 5px;
    }
    
    .action-buttons {
        display: flex;
        gap: 4px;
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .table .btn-sm {
        padding: 6px 10px;
        font-size: clamp(10px, 2vw, 11px);
        line-height: 1.5;
        white-space: nowrap;
    }
    
    .table .btn i {
        font-size: clamp(12px, 2.5vw, 14px);
        margin-right: 2px;
    }
    
    .text-right {
        text-align: right;
    }
    
    .text-center {
        text-align: center;
    }

    /* Mobile First Approach */
    @media (max-width: 576px) {
        .barang-container {
            padding: 10px;
        }
        
        .card-header {
            padding: 12px 15px;
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
        
        .card-header h5 {
            min-width: auto;
            width: 100%;
        }
        
        .btn-group {
            width: 100%;
            justify-content: flex-start;
        }
        
        .btn {
            padding: 6px 12px;
            font-size: 12px;
            flex: 1;
            min-width: 0;
            justify-content: center;
        }
        
        .table-responsive {
            border-radius: 8px;
        }
        
        .table thead th {
            padding: 8px 6px;
            font-size: 10px;
        }
        
        .table tbody td {
            padding: 8px 6px;
            font-size: 11px;
        }
        
        .badge {
            padding: 4px 8px;
            font-size: 9px;
            min-width: 50px;
        }
        
        .action-buttons {
            flex-direction: column;
            gap: 3px;
        }
        
        .modal-content {
            margin: 10px;
            width: calc(100% - 20px);
        }
        
        .modal-header,
        .modal-up,
        .modal-barang {
            padding: 15px 20px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-control {
            padding: 8px 12px;
        }
    }

    @media (min-width: 577px) and (max-width: 768px) {
        .barang-container {
            padding: 15px;
        }
        
        .card-header {
            flex-direction: row;
        }
        
        .btn {
            flex: none;
        }
        
        .table thead th {
            padding: 10px 8px;
        }
        
        .table tbody td {
            padding: 10px 8px;
        }
        
        .action-buttons {
            flex-direction: row;
        }
    }

    @media (min-width: 769px) and (max-width: 1200px) {
        .barang-container {
            padding: 20px;
        }
        
        .card {
            margin-bottom: 25px;
        }
    }

    @media (min-width: 1201px) {
        .barang-container {
            padding: 25px;
            max-width: 1400px;
            margin: 0 auto;
        }
    }

    /* Utility classes for better responsiveness */
    .text-truncate-mobile {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    
    .d-none-mobile {
        display: none;
    }

    @media (max-width: 768px) {
        .text-truncate-mobile {
            max-width: 120px;
        }
        
        .d-none-mobile {
            display: none !important;
        }
        
        /* Hide less important columns on mobile */
        .table td:nth-child(6),
        .table th:nth-child(6),
        .table td:nth-child(7),
        .table th:nth-child(7) {
            display: none;
        }
    }

    /* Ensure modals are properly sized on mobile */
    @media (max-width: 576px) {
        .modal-dialog {
            margin: 10px;
            max-width: calc(100% - 20px);
        }
        
        .modal-xl {
            max-width: calc(100% - 20px);
        }
    }

    /* Fix for chosen select on mobile */
    .chosen-container {
        width: 100% !important;
    }

    /* Ensure datepicker works on mobile */
    .datepicker {
        font-size: 16px !important; /* Prevents zoom on iOS */
    }
</style>
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
                                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">PO Sample</a></li>
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
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Data PO Sample</h5>
                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <table class="table datatable table-hover table-striped table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Tgl PO Sample</th>
                                                            <th>Customer</th>
                                                            <th>Nama Barang</th>
                                                            <th>Jumlah KG</th>
                                                            <th>JUmlah Zak</th>
                                                            <th>Kode Sample OUT</th>
                                                            <th>Keterangan</th>
                                                            
                                                            <th>Status</th> 
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                  <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $level = $this->session->userdata('level');
                                                        foreach($result as $k): 
                                                            if (!empty($k['tgl_po_sample'])) {
                                                                $tglParts = explode('-', $k['tgl_po_sample']);
                                                                if (count($tglParts) === 3) {
                                                                    $tgl_po_sample = $tglParts[2] . "/" . $tglParts[1] . "/" . $tglParts[0];
                                                                } else {
                                                                    $tgl_po_sample = "-";
                                                                }
                                                            } else {
                                                                $tgl_po_sample = "-";
                                                            }
                                                            
                                                            // Tentukan status dan warna badge
                                                            $status = $k['status'] ?? 'pending';
                                                            $status_badge = '';
                                                            if ($status == 'processed') {
                                                                $status_badge = '<span class="badge badge-success">Processed</span>';
                                                            } else {
                                                                $status_badge = '<span class="badge badge-warning">Pending</span>';
                                                            }
                                                        ?>
                                                        <tr>
                                                            <th scope="row"><?=$no++?></th>
                                                            <td><?=$tgl_po_sample?></td>
                                                            <td><?=$k['nama_customer']?></td>
                                                            <td><?=$k['nama_barang']?></td>
                                                            <td class="text-right"><?=number_format($k['jumlah_po_sample'],0,",",".")?> <?=$k['satuan']?></td>
                                                            <td>-</td>
                                                            <td><?=$k['kode_sample_out']?></td>
                                                            <td><?=$k['ket_po_sample']?></td>
                                                            
                                                            <td class="text-center"><?=$status_badge?></td> <!-- Kolom Status -->
                                                            <td class="text-center">
                                                                <div class="action-buttons">
                                                                    <?php if ($status != 'processed'): ?>
                                                                    <!-- Tombol Proses hanya muncul jika status bukan 'processed' -->
                                                                    <button type="button" 
                                                                        class="btn btn-warning btn-sm text-light" 
                                                                        data-toggle="modal" 
                                                                        data-target="#proses"
                                                                        data-id_mkt_po_sample="<?=$k['id_mkt_po_sample']?>"
                                                                        data-tgl_po_sample="<?=$tgl_po_sample?>"
                                                                        data-id_customer="<?=$k['id_customer']?>"
                                                                        data-nama_customer="<?=$k['nama_customer']?>"
                                                                        data-id_barang="<?=$k['id_barang']?>"
                                                                        data-nama_barang="<?=$k['nama_barang']?>"
                                                                        data-mesh="<?=$k['mesh']?>"
                                                                        data-bloom="<?=$k['bloom']?>"
                                                                        data-kode_tf_in="<?=$k['kode_sample_out']?>"
                                                                        data-jumlah_po_sample="<?=number_format($k['jumlah_po_sample'],0,",",".")?>"
                                                                        data-ket_po_sample="<?=$k['ket_po_sample']?>"
                                                                       
                                                                        <i class="feather icon-edit-2"></i>Proses
                                                                    </button>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
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

    <!-- Modal Proses -->
    <div class="modal fade" id="proses" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Proses PO Sample</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?=base_url()?>gudang/gudang_admin/admin_sample_keluar/proses">
                    <div class="modal-body">
                        <input type="hidden" id="p-id_mkt_po_sample" name="id_mkt_po_sample">
                        
                        <center><label for="pemeriksaan" class="font-weight-bold">Keterangan Barang</label></center>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>No PO Sample</label>
                                    <input type="text" class="form-control" id="p-no_po_sample" name="no_po_sample" readonly>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tanggal PO Sample</label>
                                    <input type="text" class="form-control" id="p-tgl_po_sample" name="tgl_po_sample" readonly>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Customer</label>
                                    <input type="text" class="form-control" id="p-nama_customer" name="nama_customer" readonly>
                                    <input type="hidden" id="p-id_customer" name="id_customer">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Barang</label>
                                    <input type="text" class="form-control" id="p-nama_barang" name="nama_barang" readonly>
                                    <input type="hidden" id="p-id_barang" name="id_barang">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Mesh</label>
                                    <input type="text" class="form-control" id="p-mesh" name="mesh" readonly>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Bloom</label>
                                    <input type="text" class="form-control" id="p-bloom" name="bloom" readonly>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Jumlah Sample</label>
                                    <input type="text" class="form-control" id="p-jumlah_po_sample2" name="jumlah_po_sample" readonly>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>KODE SAMPLE OUT</label>
                                    <input type="text" class="form-control" id="p-kode_tf_in" name="kode_sample_out" readonly>
                                </div>
                            </div>
                        </div>

                        <center><label for="pemeriksaan" class="font-weight-bold">Data Proses Sample</label></center>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tanggal Keluar Sample</label>
                                    <input type="text" class="form-control datepicker" id="tgl_masuk_sample" name="tgl_masuk_sample" placeholder="Tanggal Keluar Sample" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Jumlah Dikirim (Kg)</label>
                                    <input type="text" class="form-control" id="p-jumlah_po_sample" name="jumlah_keluar" placeholder="Jumlah Dikirim" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" readonly>
                                    <div id="validationServer03FeedbackCustomer" class="invalid-feedback">
                                        Maaf Jumlah tidak boleh lebih dari Jumlah Sample.
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Gudang Admin</label>
                                    <input type="text" class="form-control" id="gudang_admin" name="gudang_admin" value="<?=$this->session->userdata('nama')?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="simpan" class="btn btn-primary"
                        onclick="if (! confirm('Apakah Anda Yakin Untuk Memproses Sample Ini?')) { return false; }">Proses Sample</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit PO Sample</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?=base_url()?>gudang/gudang_admin/admin_sample/update">
                    <div class="modal-body">
                        <input type="hidden" id="e-id_mkt_po_sample" name="id_mkt_po_sample">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="e-tgl_po_sample">Tanggal PO Sample</label>
                                    <input type="text" class="form-control datepicker" id="e-tgl_po_sample" name="tgl_po_sample" placeholder="DD/MM/YYYY" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_customer">Customer</label>
                                    <select class="form-control chosen-select" id="e-id_customer" name="id_customer" required>
                                        <option value="">Pilih Customer</option>
                                        <?php foreach($res_customer as $rc): ?>
                                            <option value="<?=$rc['id_customer']?>">(<?= $rc['kode_customer']?>)<?=$rc['nama_customer']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_barang">Barang</label>
                                    <select class="form-control chosen-select" id="e-id_barang" name="id_barang" autocomplete="off"  required>
                                        <option value="">Pilih Barang</option>
                                        <?php foreach($res_barang as $b): ?>
                                            <option data-kode_tf_in="<?=$b['kode_tf_in']?>" data-mesh="<?= $b['mesh'] ?>" data-bloom="<?= $b['bloom'] ?>"value="<?=$b['id_barang']?>">(<?=$b['kode_barang']?>) <?=$b['nama_barang']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kode_tf_in">Kode Transfer IN</label>
                                    <input type="text" class="form-control" id="e-kode_tf_in" name="kode_tf_in" placeholder="Kode TF IN" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="e-bloom">Bloom</label>
                                    <input type="text" class="form-control" id="e-bloom" name="kode_tf_in" placeholder="Kode TF IN" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="e-mesh">Mesh</label>
                                    <input type="text" class="form-control" id="e-mesh" name="kode_tf_in" placeholder="Kode TF IN" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="e-jumlah_po_sample">Jumlah PO Sample</label>
                                    <input type="text" class="form-control" id="e-jumlah_po_sample" name="jumlah_po_sample" placeholder="Jumlah" autocomplete="off" required>
                                </div>
                            </div>
                           
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="e-ket_po_sample">Keterangan</label>
                                    <textarea class="form-control" id="e-ket_po_sample" name="ket_po_sample" rows="3" placeholder="Keterangan"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            // Format number untuk input jumlah
            $('#jumlah_po_sample, #e-jumlah_po_sample, #jumlah_dikirim').on('keyup', function(e) {
                let value = this.value.replace(/\D/g,'');
                value = new Intl.NumberFormat('id-ID').format(value);
                this.value = value;
            });
            $('#proses').on('show.bs.modal', function (event) {
            // Modal proses show event
                var button = $(event.relatedTarget);
                
                var id_mkt_po_sample = button.data('id_mkt_po_sample');
                var tgl_po_sample = button.data('tgl_po_sample');
                var id_customer = button.data('id_customer');
                var nama_customer = button.data('nama_customer');
                var id_barang = button.data('id_barang');
                var nama_barang = button.data('nama_barang');
                var mesh = button.data('mesh');
                var bloom = button.data('bloom');
                var kode_tf_in = button.data('kode_tf_in');
                var jumlah_po_sample = button.data('jumlah_po_sample');
                var ket_po_sample = button.data('ket_po_sample');
               

                $(this).find('#p-id_mkt_po_sample').val(id_mkt_po_sample);
                $(this).find('#p-tgl_po_sample').val(tgl_po_sample);
                $(this).find('#p-nama_customer').val(nama_customer);
                $(this).find('#p-nama_barang').val(nama_barang);
                $(this).find('#p-id_customer').val(id_customer);
                $(this).find('#p-id_barang').val(id_barang);
                $(this).find('#p-mesh').val(mesh);
                $(this).find('#p-bloom').val(bloom);
                $(this).find('#p-kode_tf_in').val(kode_tf_in);
                $(this).find('#p-jumlah_po_sample').val(jumlah_po_sample);
                $(this).find('#p-jumlah_po_sample2').val(jumlah_po_sample);
                
                $("#jumlah_keluar").keyup(function() {
                var jumlah_po = $("#jumlah_keluar").val().replaceAll('.', '');
                var gdg_qty_in = $("#p-jumlah_po_sample").val().replaceAll('.', '');
                var gdg_qty_in = $("#p-jumlah_po_sample2").val().replaceAll('.', '');
                if (parseInt(jumlah_po) > parseInt(gdg_qty_in)) {
                    $("#jumlah_keluar").addClass("is-invalid");
                    $("#simpan").attr("disabled", "disabled");
                } else {
                    $("#jumlah_keluar").removeClass("is-invalid");
                    $("#simpan").removeAttr("disabled");
                }
                })

                var no_po_sample = "PO-SAMPLE-" + id_mkt_po_sample.toString().padStart(3, '0');
                $(this).find('#p-no_po_sample').val(no_po_sample);
                
                // Datepicker untuk modal proses
                $(this).find('#tgl_masuk_sample').datepicker().on('show.bs.modal', function(e) {
                    e.stopPropagation();
                });

            document.getElementById('jumlah_keluar').addEventListener('keyup', function(e) {
            let value = this.value.replace(/\D/g,'');
            value = new Intl.NumberFormat('id-ID').format(value);
            this.value = value;
            });
            });

            // Modal edit show event
            $('#edit').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                
                var id_mkt_po_sample = button.data('id_mkt_po_sample');
                var tgl_po_sample = button.data('tgl_po_sample');
                var id_customer = button.data('id_customer');
                var id_barang = button.data('id_barang');
                var mesh = button.data('mesh');
                var bloom = button.data('bloom');
                var kode_tf_in = button.data('kode_tf_in');
                var jumlah_po_sample = button.data('jumlah_po_sample');
                var ket_po_sample = button.data('ket_po_sample');
                var mkt_admin = button.data('mkt_admin');

                $(this).find('#e-id_mkt_po_sample').val(id_mkt_po_sample);
                $(this).find('#e-tgl_po_sample').val(tgl_po_sample);
                $(this).find('#e-id_customer').val(id_customer).trigger("chosen:updated");
                $(this).find('#e-id_barang').val(id_barang).trigger("chosen:updated");
                $(this).find('#e-mesh').val(mesh);
                $(this).find('#e-bloom').val(bloom);
                $(this).find('#e-kode_tf_in').val(kode_tf_in);
                $(this).find('#e-jumlah_po_sample').val(jumlah_po_sample);
                $(this).find('#e-ket_po_sample').val(ket_po_sample);
                $(this).find('#e-mkt_admin').val(mkt_admin);
            });

            // Ambil mesh dan bloom dan kode_tf_in dari dropdown
            $("#e-id_barang").on('change', function() {
                let opt = $(this).find(':selected');
                $(this).closest('.modal').find('#e-mesh').val(opt.data('mesh') || '');
                $(this).closest('.modal').find('#e-bloom').val(opt.data('bloom') || '');
                $(this).closest('.modal').find('#e-kode_tf_in').val(opt.data('kode_tf_in') || '');
            });

            $(this).find('#e-tgl_po_sample').datepicker().on('show.bs.modal', function(e) {
                e.stopPropagation();
            });
        });
    </script>