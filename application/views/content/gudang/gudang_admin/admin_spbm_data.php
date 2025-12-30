<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin SPBM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --barang: #436;
            --upd: #f72585;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --info: #4895ef;
            --warning: #feaaffff;
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
            width: 135%;
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
            background-color: rgba(253, 192, 8, 1);
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
            padding: 6px 10px;
            font-size: 11px;
            line-height: 1.5;
            white-space: nowrap;
        }

        .table .btn i {
            font-size: 15px;
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

        /* Styling untuk input group kurs */
        .input-group-text {
            background-color: var(--light-gray);
            border: 1px solid var(--light-gray);
            color: var(--dark);
            font-weight: 600;
        }

        .input-group .form-control {
            border-left: none;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .input-group-prepend .input-group-text {
            border-right: none;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        #kurs_pib {
            text-align: right;
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
                                        <!-- <h5 class="m-b-10">Data Barang Masuk</h5> -->
                                    </div>
                                    
                                    <ul class="breadcrumb">
                                       
                                         <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="javascript:">SPPM</a></li>
                    <li class="breadcrumb-item"><a href="javascript:"></a></li> 
                                        
                                        <button type="button" class="btn btn-primary float-right btn-sm"
                                                        data-toggle="modal" data-target="#proses">
                                                        <i class="feather icon-plus"></i>Tambah Data
                                                    </button>
                                </div>
                                    </ul> 
                                    
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
                                    <div class="col-md-9">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5><i class="fas fa-list"></i> Daftar Supplier</h5>
                                                <div class="btn-group">

                                                    


                                                </div>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table datatable table-hover table-striped table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Tgl PO</th>
                                                                <th>No PO</th>
                                                                <th>Supplier</th>
                                                                <th>Nama Barang</th>
                                                                <th>Jumlah PO</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $level = $this->session->userdata('level');
                                                            $no = 1;
                                                            foreach ($result as $k):
                                                                $tgl_po_import = explode('-', $k['tgl_po_import'])[2] . "/" . explode('-', $k['tgl_po_import'])[1] . "/" . explode('-', $k['tgl_po_import'])[0];
                                                                $tgl_exp = explode('-', $k['tgl_exp'])[2] . "/" . explode('-', $k['tgl_exp'])[1] . "/" . explode('-', $k['tgl_exp'])[0];
                                                                $tgl_bayar_pib = explode('-', $k['tgl_bayar_pib'])[2] . "/" . explode('-', $k['tgl_bayar_pib'])[1] . "/" . explode('-', $k['tgl_bayar_pib'])[0];
                                                                $tgl_ski = explode('-', $k['tgl_ski'])[2] . "/" . explode('-', $k['tgl_ski'])[1] . "/" . explode('-', $k['tgl_ski'])[0];
                                                                $tgl_inv = explode('-', $k['tgl_inv'])[2] . "/" . explode('-', $k['tgl_inv'])[1] . "/" . explode('-', $k['tgl_inv'])[0];
                                                                $tgl_pack = explode('-', $k['tgl_pack'])[2] . "/" . explode('-', $k['tgl_pack'])[1] . "/" . explode('-', $k['tgl_pack'])[0];
                                                                $tgl_coo = explode('-', $k['tgl_coo'])[2] . "/" . explode('-', $k['tgl_coo'])[1] . "/" . explode('-', $k['tgl_coo'])[0];
                                                                $tgl_coa = explode('-', $k['tgl_coa'])[2] . "/" . explode('-', $k['tgl_coa'])[1] . "/" . explode('-', $k['tgl_coa'])[0];
                                                                $tgl_srp = explode('-', $k['tgl_srp'])[2] . "/" . explode('-', $k['tgl_srp'])[1] . "/" . explode('-', $k['tgl_srp'])[0];
                                                                ?>
                                                                <tr>
                                                                    <th scope="row"><?= $no++ ?></th>
                                                                    <td><?= $tgl_po_import ?></td>
                                                                    <td>
                                                                        <span type="button"
                                                                            class="btn btn-warning btn-square btn-sm text-light"
                                                                            data-toggle="modal" data-target="#detail"
                                                                            data-no_po_import="<?= $k['no_po_import'] ?>"
                                                                            data-tgl_po_import="<?= $tgl_po_import ?>"
                                                                            data-id_supplier="<?= $k['id_supplier'] ?>"
                                                                            data-nama_supplier="<?= $k['nama_supplier'] ?>"
                                                                            data-id_barang="<?= $k['id_barang'] ?>"
                                                                            data-nama_barang="<?= $k['nama_barang'] ?>"
                                                                            data-no_batch="<?= $k['no_batch'] ?>"
                                                                            data-jumlah="<?= $k['gdg_qty_in'] ?>"
                                                                            data-tgl_exp="<?= $tgl_exp ?>"
                                                                            data-mesh="<?= $k['mesh'] ?>"
                                                                            data-tgl_bayar_pib="<?= $tgl_bayar_pib ?>"
                                                                            data-no_pib="<?= $k['no_pib'] ?>"
                                                                            data-kurs_pib="<?= $k['kurs_pib'] ?>"
                                                                            data-no_ski="<?= $k['no_ski'] ?>"
                                                                            data-tgl_ski="<?= $tgl_ski ?>"
                                                                            data-no_inv="<?= $k['no_inv'] ?>"
                                                                            data-tgl_inv="<?= $tgl_inv ?>"
                                                                            data-no_pack="<?= $k['no_pack'] ?>"
                                                                            data-tgl_pack="<?= $tgl_pack ?>"
                                                                            data-no_coo="<?= $k['no_coo'] ?>"
                                                                            data-no_coa="<?= $k['no_coa'] ?>"
                                                                            data-tgl_coa="<?= $tgl_coa ?>"
                                                                            data-tgl_coo="<?= $tgl_coo ?>"
                                                                            data-no_srp="<?= $k['no_srp'] ?>"
                                                                            data-no_bl="<?= $k['no_bl'] ?>"
                                                                            data-tgl_srp="<?= $tgl_srp ?>"
                                                                            data-bloom="<?= $k['bloom'] ?>"
                                                                            data-jumlah="<?= number_format($k['jumlah'], 0, ",", ".") ?>"
                                                                            data-harga_perunit="<?= number_format($k['harga_perunit'], 0, ",", ".") ?>"
                                                                            data-prc_admin="<?= $k['prc_admin'] ?>">
                                                                            <i></i><?= $k['no_po_import'] ?>
                                                                        </span>
                                                                    </td>
                                                                    <td><?= $k['nama_supplier'] ?></td>
                                                                    <td><?= $k['nama_barang'] ?></td>
                                                                    <td class="text-left">
                                                                        <?= number_format($k['jumlah'], 0, ",", ".") ?>
                                                                        <?= $k['satuan'] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if ($k['status_po_import'] == 'proses'): ?>
                                                                            <span class="badge badge-warning">Proses</span>
                                                                        <?php elseif ($k['status_po_import'] == 'diterima'): ?>
                                                                            <span class="badge badge-success">Diterima</span>
                                                                        <?php else: ?>
                                                                            <span
                                                                                class="badge badge-secondary"><?= $k['status_po_import'] ?></span>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
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

    <!-- Modal Detail -->
    <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail PO Pembelian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="v-id_prc_po_import" name="id_prc_po_import">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No PO Pembelian</label>
                                <input type="text" class="form-control" id="v-no_po_import" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal PO Pembelian</label>
                                <input type="text" class="form-control" id="v-tgl_po_import" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" id="v-id_barang" readonly>
                            </div>
                        </div>
                        <!-- <div class="col-md-3">
                            <div class="form-group">
                                <label>Mesh</label>
                                <input type="text" class="form-control" id="v-mesh" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Bloom</label>
                                <input type="text" class="form-control" id="v-bloom" readonly>
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Supplier</label>
                                <input type="text" class="form-control" id="v-nama_supplier" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jumlah (Kg)</label>
                                <input type="text" class="form-control" id="v-jumlah" readonly>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Expired</label>
                                <input type="text" class="form-control" id="v-tgl_exp" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal bayar pib</label>
                                <input type="text" class="form-control" id="v-tgl_bayar_pib" readonly>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label>No PIB</label>
                                <input type="text" class="form-control" id="v-no_pib" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kurs PIB</label>
                                <input type="text" class="form-control" id="v-kurs_pib" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No SKI</label>
                                <input type="text" class="form-control" id="v-no_ski" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal SKI</label>
                                <input type="text" class="form-control" id="v-tgl_ski" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No Invoice</label>
                                <input type="text" class="form-control" id="v-no_inv" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Invoice</label>
                                <input type="text" class="form-control" id="v-tgl_inv" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No Packing List</label>
                                <input type="text" class="form-control" id="v-no_pack" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Packing List</label>
                                <input type="text" class="form-control" id="v-tgl_pack" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NO COO</label>
                                <input type="text" class="form-control" id="v-no_coo" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal COO</label>
                                <input type="text" class="form-control" id="v-tgl_coo" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No COA</label>
                                <input type="text" class="form-control" id="v-no_coa" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal COA</label>
                                <input type="text" class="form-control" id="v-tgl_coa" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No SRP</label>
                                <input type="text" class="form-control" id="v-no_srp" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal SRP</label>
                                <input type="text" class="form-control" id="v-tgl_srp" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No SRP</label>
                                <input type="text" class="form-control" id="v-no_srp" readonly>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label>No BL</label>
                                <input type="text" class="form-control" id="v-no_bl" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Purchasing Admin</label>
                                <input type="text" class="form-control" id="v-prc_admin" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal EDIT/PROSES -->
    <div class="modal fade" id="proses" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Proses PO Pembelian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url() ?>gudang/gudang_admin/admin_spbm/proses" id="prosesForm">
                    <div class="modal-body">
                        <!-- Input Hidden untuk ID -->
                        <input type="hidden" id="p-id_prc_po_import_tf" name="id_prc_po_import_tf">
                        <input type="hidden" id="p-id_prc_po_import" name="id_prc_po_import">
                        <input type="hidden" id="p-kode_tf_in_2" name="kode_tf_in_2">

                        <center><label for="pemeriksaan" class="font-weight-bold">Keterangan Barang</label></center>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">No PO</label>
                                    <select class="form-control chosen-select" id="p-no_po_import" name="p-no_po_import"
                                        required>
                                        <option disabled selected hidden value="">- Pilih No Po -</option>
                                        <?php foreach ($res_po as $s) { ?>
                                            <option value="<?= $s['no_po_import'] ?>"
                                                data-id_prc_po_import_tf="<?= $s['id_prc_po_import_tf'] ?>"
                                                data-no_po_import="<?= $s['no_po_import'] ?>"
                                                >
                                                <?= $s['no_po_import'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Tanggal PO</label>
                                    <input class="form-control" id="p-tgl_po_import" name="tgl_po_import" placeholder="Tanggal Po" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_barang">Nama Barang</label>
                                    <select class="form-control chosen-select" id="p-nama_barang" name="id_barang"
                                        required>
                                        <option value="">- Pilih Barang -</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Mesh</label>
                                    <input class="form-control" id="p-mesh" name="mesh" placeholder="Mesh" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Bloom</label>
                                    <input type="text" class="form-control" id="p-bloom" name="bloom" placeholder="bloom" readonly>
                                </div>
                            </div> -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nama_supplier">Supplier</label>
                                    <input type="text" class="form-control" id="p-nama_supplier" name="nama_supplier"
                                       placeholder="Supplier" readonly>
                                </div>
                            </div>
                             <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Jumlah(kg)</label>
                                    <input type="text" class="form-control" id="p-jumlah" name="jumlah"
                                        onkeypress="return hanyaAngka(event)" maxlength="15" placeholder="jumlah(kg)" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Jumlah(Zak)</label>
                                    <input type="text" class="form-control" id="p-jumlah_zak" name="jumlah_zak"
                                        onkeypress="return hanyaAngka(event)" maxlength="15" placeholder="jumlah(zak)" readonly>
                                </div>
                            </div>
                           
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Purchasing Admin</label>
                                    
                                    <input type="text" class="form-control" id="p-prc_admin" name="prc_admin"
                                    value="<?php echo $this->session->userdata('nama'); ?>" placeholder="nama" readonly>
                                    <?php
// echo '<pre>';
// print_r($this->session->userdata());
// echo '</pre>';
// ?>

                                </div>
                            </div>
                        </div>

                        <center><label for="pemeriksaan" class="font-weight-bold">Administrasi</label></center>
                        <div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>Kode Transfer IN</label>
            <input type="text" id="preview_tf_in" class="form-control" readonly>
            <input type="hidden" name="kode_tf_in" id="p-kode_tf_in">
        </div>
    </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tanggal Masuk Gudang</label>
                                    <input type="text" class="form-control datepicker" id="tgl_msk_gdg"
                                        name="tgl_msk_gdg" placeholder="Tanggal Masuk Gudang" autocomplete="off"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="id_customer">Jenis Transaksi</label>
                                    <select class="form-control chosen-select" id="jenis_transaksi"
                                        name="jenis_transaksi" autocomplete="off" required>
                                        <option value="">-Pilih Jenis Transaksi -</option>
                                        <option value="Stok Awal">Stok Awal</option>
                                        <option value="Penerimaan">Penerimaan</option>
                                        <option value="Koreksi Stok">Koreksi Stok</option>
                                        <option value="Recall">Recall</option>
                                        <option value="Return">Return</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">No Batch</label>
                                    <input type="text" class="form-control" id="no_batch" name="no_batch"
                                        placeholder="No Batch" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="jumlah_zak">Jumlah (KG)</label>
                                    <input type="text" class="form-control" id="jumlah_zak" name="jumlah_zak"
                                        placeholder="Jumlah" autocomplete="off"
                                        aria-describedby="validationServer03Feedback" style="text-transform:uppercase"
                                        onkeyup="this.value = this.value.toUpperCase()" required>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        Maaf Jumlah Kirim tidak boleh lebih dari Stock.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Jumlah (ZAK)</label>
                                    <input type="text" class="form-control" id="jumlah_kg" name="gdg_qty_in"
                                        placeholder="Jumlah" autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tanggal Expired</label>
                                    <input type="text" class="form-control datepicker" id="tgl_exp" name="tgl_exp"
                                        placeholder="Tanggal Expired" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">No PIB</label>
                                    <input type="text" class="form-control" id="no_pib" name="no_pib"
                                        placeholder="no pib" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tanggal Bayar PIB</label>
                                    <input type="text" class="form-control datepicker" id="tgl_bayar_pib"
                                        name="tgl_bayar_pib" placeholder="Tanggal Bayar PIB" autocomplete="off"
                                        required>
                                </div>
                            </div>
                            

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Kurs PIB(1$)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="text" class="form-control" id="kurs_pib" name="kurs_pib"
                                            placeholder="Kurs PIB" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">No Ski</label>
                                    <input type="text" class="form-control" id="no_ski" name="no_ski"
                                        placeholder="no ski" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tanggal Ski</label>
                                    <input type="text" class="form-control datepicker" id="tgl_ski" name="tgl_ski"
                                        placeholder="Tanggal Ski" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">No invoice</label>
                                    <input type="text" class="form-control" id="no_inv" name="no_inv"
                                        placeholder="no invoice" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tanggal invoice</label>
                                    <input type="text" class="form-control datepicker" id="tgl_inv" name="tgl_inv"
                                        placeholder="Tanggal Invoice" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">No Packing List</label>
                                    <input type="text" class="form-control" id="no_pack" name="no_pack"
                                        placeholder="no packing list" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tanggal Packing</label>
                                    <input type="text" class="form-control datepicker" id="tgl_pack" name="tgl_pack"
                                        placeholder="Tanggal Packing" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">No COO</label>
                                    <input type="text" class="form-control" id="no_coo" name="no_coo"
                                        placeholder="No COO" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tanggal COO</label>
                                    <input type="text" class="form-control datepicker" id="tgl_coo" name="tgl_coo"
                                        placeholder="Tanggal COO" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">No COA</label>
                                    <input type="text" class="form-control" id="no_coa" name="no_coa"
                                        placeholder="No COA" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tanggal COA</label>
                                    <input type="text" class="form-control datepicker" id="tgl_coa" name="tgl_coa"
                                        placeholder="Tanggal COA" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">No SRP</label>
                                    <input type="text" class="form-control" id="no_srp" name="no_srp"
                                        placeholder="No SRP" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tanggal SRP</label>
                                    <input type="text" class="form-control datepicker" id="tgl_srp" name="tgl_srp"
                                        placeholder="Tanggal SRP" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">No BL</label>
                                    <input type="text" class="form-control" id="no_bl" name="no_bl" placeholder="No BL"
                                        autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan"
                                        placeholder="Keterangan" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Purchasing Admin</label>
                                    <input type="text" class="form-control" id="gdg_admin" name="gdg_admin"
                                        placeholder="Gudang Admin" value="<?= $this->session->userdata('username') ?>"
                                        readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.id.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function () {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            language: 'id'
        });

        // Variable untuk menyimpan kode TF IN sementara
        let generatedKodeTfIn = null;

        // ===== FUNGSI GENERATE KODE TF IN (HANYA SAAT DIBUTUHKAN) =====
        function generateKodeTfIn() {
            // Jika sudah ada kode yang di-generate, gunakan yang ada
            if (generatedKodeTfIn) {
                $('#p-kode_tf_in').val(generatedKodeTfIn);
                $('#p-kode_tf_in_2').val(generatedKodeTfIn);
                return;
            }

            $.ajax({
                url: "<?= base_url('gudang/gudang_admin/admin_spbm/generate_kode_tf_in') ?>",
                type: "GET",
                dataType: "json",
                success: function(response) {
                    if(response.kode_tf_in) {
                        generatedKodeTfIn = response.kode_tf_in;
                        $('#p-kode_tf_in').val(generatedKodeTfIn);
                        $('#p-kode_tf_in_2').val(generatedKodeTfIn);
                        console.log('Kode TF IN generated:', generatedKodeTfIn);
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Gagal mengambil kode TF IN:', error);
                    // Fallback: generate manual jika AJAX gagal
                    generateKodeTfInManual();
                }
            });
        }
        

        function loadNextTFIN() {
    $.ajax({
        url: "<?= base_url('gudang/gudang_admin/admin_spbm/get_next_kode_tf_in') ?>",
        type: "GET",
        dataType: "json",
        success: function (res) {
            if (res.success) {
                // tampilkan ke user
                $('#preview_tf_in').val(res.kode_tf_in);

                // kirim ke backend
                $('#p-kode_tf_in').val(res.kode_tf_in);

                console.log('TF-IN Preview:', res.kode_tf_in);
            } else {
                $('#preview_tf_in').val('Gagal generate');
            }
        },
        error: function () {
            $('#preview_tf_in').val('Error generate TF-IN');
        }
    });
}


        // Fallback function jika AJAX gagal
        function generateKodeTfInManual() {
            const tahun = new Date().getFullYear();
            let nomor = 1;
            
            // Coba ambil nomor dari kode terakhir yang ada
            const lastKode = $('#p-kode_tf_in').val();
            if (lastKode && lastKode.startsWith('KPT-IN-')) {
                const parts = lastKode.split('-');
                if (parts.length === 4) {
                    const lastNum = parseInt(parts[3]);
                    if (!isNaN(lastNum)) {
                        nomor = lastNum + 1;
                    }
                }
            }
            
            const nomorStr = nomor.toString().padStart(3, '0');
            generatedKodeTfIn = `KPT-IN-${tahun}-${nomorStr}`;
            
            $('#p-kode_tf_in').val(generatedKodeTfIn);
            $('#p-kode_tf_in_2').val(generatedKodeTfIn);
            console.log('Kode TF IN manual generated:', generatedKodeTfIn);
        }

        // Modal Detail
        $('#detail').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);

            var id_prc_po_import = button.data('id_prc_po_import');
            var no_po_import = button.data('no_po_import');
            var tgl_po_import = button.data('tgl_po_import');
            var nama_supplier = button.data('nama_supplier');
            var id_barang = button.data('nama_barang');
            var mesh = button.data('mesh');
            var bloom = button.data('bloom');
            var jumlah = button.data('jumlah');
            var harga_perunit = button.data('harga_perunit');
            var tgl_exp = button.data('tgl_exp');
            var tgl_bayar_pib = button.data('tgl_bayar_pib');
            var no_pib = button.data('no_pib');
            var kurs_pib = button.data('kurs_pib');
            var no_ski = button.data('no_ski');
            var tgl_ski = button.data('tgl_ski');
            var no_inv = button.data('no_inv');
            var tgl_inv = button.data('tgl_inv');
            var no_pack = button.data('no_pack');
            var tgl_pack = button.data('tgl_pack');
            var no_coo = button.data('no_coo');
            var tgl_coa = button.data('tgl_coa');
            var tgl_coo = button.data('tgl_coo');
            var no_coa = button.data('no_coa');
            var no_srp = button.data('no_srp');
            var tgl_srp = button.data('tgl_srp');
            var no_bl = button.data('no_bl');
            var prc_admin = button.data('prc_admin');

            $('#v-id_prc_po_import').val(id_prc_po_import);
            $('#v-no_po_import').val(no_po_import);
            $('#v-tgl_po_import').val(tgl_po_import);
            $('#v-nama_supplier').val(nama_supplier);
            $('#v-id_barang').val(id_barang + ' | ' + mesh + ' | ' + bloom);
            $('#v-mesh').val(mesh);
            $('#v-bloom').val(bloom);
            $('#v-jumlah').val(jumlah);
            $('#v-harga_perunit').val(harga_perunit);
            $('#v-tgl_exp').val(tgl_exp);
            $('#v-tgl_bayar_pib').val(tgl_bayar_pib);
            $('#v-no_pib').val(no_pib);
            $('#v-kurs_pib').val(kurs_pib);
            $('#v-no_ski').val(no_ski);
            $('#v-tgl_ski').val(tgl_ski);
            $('#v-no_inv').val(no_inv);
            $('#v-tgl_inv').val(tgl_inv);
            $('#v-no_pack').val(no_pack);
            $('#v-tgl_pack').val(tgl_pack);
            $('#v-no_coo').val(no_coo);
            $('#v-tgl_coa').val(tgl_coa);
            $('#v-tgl_coo').val(tgl_coo);
            $('#v-no_coa').val(no_coa);
            $('#v-no_srp').val(no_srp);
            $('#v-tgl_srp').val(tgl_srp);
            $('#v-no_bl').val(no_bl);
            $('#v-prc_admin').val(prc_admin);
        });

        // Modal Proses - SAAT MODAL DIBUKA
        $('#proses').on('show.bs.modal', function (event) {
            loadNextTFIN();

            var button = $(event.relatedTarget);
            var modal = $(this);

            // Reset form terlebih dahulu
           modal.find('input:not([type="hidden"]):not(#p-prc_admin, #gdg_admin)').val('');

            
            // TIDAK generate kode TF IN di sini!
            // Hanya reset field kode TF IN
            $('#p-kode_tf_in').val('');
            $('#p-kode_tf_in_2').val('');
            
            // Reset variable generatedKodeTfIn
            generatedKodeTfIn = null;

            var selected = $('#p-no_po_import').find(':selected');
            var id_prc_po_import_tf = selected.data('id_prc_po_import_tf') || '';

            var id_prc_po_import = button.data('id_prc_po_import');
            var no_po_import = button.data('no_po_import');
            var tgl_po_import = button.data('tgl_po_import');
            var nama_supplier = button.data('nama_supplier');
            var id_barang = button.data('id_barang');
            var nama_barang = button.data('nama_barang');
            var mesh = button.data('mesh');
            var bloom = button.data('bloom');
            var jumlah = button.data('jumlah');
            var harga_perunit = button.data('harga_perunit');
            var prc_admin = button.data('prc_admin');
            var kurs_pib = button.data('kurs_pib') || '0';
            var no_pib = button.data('no_pib') || '';
            var prc_admin = button.data('prc_admin');

            function formatRupiah(angka) {
                if (!angka) return '0';
                let number_string = angka.replace(/[^,\d]/g, '').toString();
                number_string = number_string.replace(/\./g, '');
                return number_string.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }

            function unformatRupiah(angka) {
                if (!angka) return 0;
                return parseInt(angka.toString().replace(/\./g, '').replace(/[^0-9]/g, ''), 10);
            }

            function formatDollarDisplay(value) {
                if (!value || value === '0') return 'Rp0';
                let cleanValue = value.toString().replace(/[^\d]/g, '');
                if (cleanValue === '0') return 'Rp0';

                let formatted = cleanValue.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                return 'Rp.' + formatted;
            }

            let jumlah_po = unformatRupiah(jumlah);
            let zak = jumlah_po / 25;
            let formattedZak = formatRupiah(zak.toString());

            modal.find('#p-id_prc_po_import_tf').val(id_prc_po_import_tf || '');
            modal.find('#p-id_prc_po_import').val(id_prc_po_import || '');
            
            if (no_po_import) {
                modal.find('#p-no_po_import').val(no_po_import);
                modal.find('#p-tgl_po_import').val(tgl_po_import);
                modal.find('#p-nama_supplier').val(nama_supplier);
                modal.find('#p-nama_barang').val(nama_barang);
                modal.find('#p-mesh').val(mesh);
                modal.find('#p-bloom').val(bloom);
                modal.find('#p-jumlah').val(jumlah);
                modal.find('#p-jumlah_zak').val(formattedZak);
                modal.find('#p-harga_perunit').val(harga_perunit || '');
                modal.find('#p-prc_admin').val(prc_admin || '');
            }
            
            modal.find('#kurs_pib').val(formatDollarDisplay(kurs_pib));

            if (no_pib) {
                modal.find('#no_pib').val(no_pib);
            }

            modal.find("#jumlah_zak").off('keyup').on('keyup', function () {
                var jumlah_zak = $(this).val().replace(/\./g, '');
                var jumlah_po = modal.find("#p-jumlah_zak").val().replace(/\./g, '');
                if (unformatRupiah(jumlah_zak) > unformatRupiah(jumlah_po)) {
                    $(this).addClass("is-invalid");
                    modal.find("#simpan").attr("disabled", "disabled");
                } else {
                    $(this).removeClass("is-invalid");
                    modal.find("#simpan").removeAttr("disabled");
                }
            });

            modal.find('#simpan').off('click').on('click', function(e) {
                let formValid = true;
                let requiredFields = [
                    'tgl_msk_gdg',
                    'jenis_transaksi',
                    'no_batch',
                    'jumlah_zak',
                    'tgl_exp',
                    'tgl_bayar_pib',
                    'tgl_ski',
                    'no_ski',
                    'no_inv',
                    'tgl_inv',
                    'no_pack',
                    'tgl_pack',
                    'no_coo',
                    'tgl_coo',
                    'tgl_coa',
                    'no_coa',
                    'no_srp',
                    'tgl_srp',
                    'no_pib',
                    'kurs_pib',
                    'no_bl'
                ];

                requiredFields.forEach(function (fieldName) {
                    let fieldValue = $('[name="' + fieldName + '"]').val();
                    if (!fieldValue || fieldValue.trim() === '') {
                        formValid = false;
                    }
                });

                if (!formValid) {
                    e.preventDefault();
                    alert('Mohon lengkapi semua field yang wajib diisi!');
                    return false;
                }

                // Jika kode TF IN belum di-generate, generate sekarang
                if (!generatedKodeTfIn) {
                    e.preventDefault(); // Tahan submit sementara
                    
                    $.ajax({
                        url: "<?= base_url('gudang/gudang_admin/admin_spbm/generate_kode_tf_in') ?>",
                        type: "GET",
                        dataType: "json",
                        success: function(response) {
                            if(response.kode_tf_in) {
                                generatedKodeTfIn = response.kode_tf_in;
                                $('#p-kode_tf_in').val(generatedKodeTfIn);
                                $('#p-kode_tf_in_2').val(generatedKodeTfIn);
                                
                                // Sekarang submit form
                                $('#prosesForm').submit();
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log('Gagal mengambil kode TF IN:', error);
                            // Fallback: generate manual
                            generateKodeTfInManual();
                            
                            // Sekarang submit form
                            $('#prosesForm').submit();
                        }
                    });
                }
            });

            // === SUPPLIER CHANGE ===
            $('#p-no_po_import').on('change', function () {
                let selected = $(this).find(':selected');
                let no_po_import   = selected.val();
                let nama_supplier = selected.data('nama_supplier') || "";
                let tgl_po_import = selected.data('tgl_po') || "";
                let id_prc_po_import_tf = selected.data('id_prc_po_import_tf') || "";

                $('#p-tgl_po_import').val(tgl_po_import);
                $('#p-id_prc_po_import').val(id_prc_po_import);
                $('#p-id_prc_po_import_tf').val(id_prc_po_import_tf);
                $('#p-nama_supplier').val(nama_supplier);
                
                // === GET BARANG DARI SUPPLIER ===
                $.ajax({
                    url: "<?= base_url('gudang/gudang_admin/admin_spbm/get_barang_by_po_import') ?>",
                    type: "POST",
                    data: { no_po_import: no_po_import },
                    dataType: "json",
                    success: function (res) {
                        let html = '<option value="">- Pilih Barang -</option>';
                        res.forEach(item => {
                            console.log('Menambahkan barang:', item);
                            $('#p-tgl_po_import').val(item.tgl_po_import);
                            html += `
                                <option 
                                    value="${item.id_barang}"
                                    data-mesh="${item.mesh}"
                                    data-bloom="${item.bloom}"
                                    data-jumlah="${item.jumlah}"
                                    data-id_prc_po_import="${item.id_prc_po_import}"
                                    data-nama_supplier="${item.nama_supplier}">
                                    ${item.nama_barang} | ${item.mesh} | ${item.bloom}
                                </option>
                            `;
                        });
                        $('#p-nama_barang').html(html).trigger("chosen:updated");
                    }
                });
            });

            // ===== CHANGE EVENT UNTUK BARANG =====
            $('#p-nama_barang')
                .off('change')
                .on('change', function () {
                    let selected = $(this).find(':selected');
                    
                    // Isi mesh dan bloom
                    $('#p-mesh').val(selected.data('mesh') || '');
                    $('#p-bloom').val(selected.data('bloom') || '');
                    $('#p-nama_supplier').val(selected.data('nama_supplier') || '');
                    $('#p-id_prc_po_import').val(selected.data('id_prc_po_import') || '');
                    
                    // Ambil jumlah dari data atribut
                    let jumlah = selected.data('jumlah');
                    
                    // Debug log untuk memastikan data terambil
                    console.log('Jumlah dari data:', jumlah);
                    
                    if (jumlah !== undefined && jumlah !== null) {
                        // Konversi ke number jika perlu
                        if (typeof jumlah === 'string') {
                            jumlah = jumlah.replace(/\./g, '');
                        }
                        
                        // Format dengan titik sebagai pemisah ribuan
                        let formattedJumlah = Number(jumlah).toLocaleString('id-ID');
                        
                        // Isi jumlah dalam KG
                        $('#p-jumlah').val(formattedJumlah);
                        
                        // Hitung jumlah dalam ZAK (diasumsikan 1 ZAK = 25 KG)
                        let jumlahZak = Math.round(Number(jumlah) / 25);
                        let formattedZak = jumlahZak.toLocaleString('id-ID');
                        $('#p-jumlah_zak').val(formattedZak);
                    } else {
                        $('#p-jumlah').val('0');
                        $('#p-jumlah_zak').val('0');
                    }
                    
                    // Reset field jumlah input manual
                    $('#jumlah_zak').val('0');
                    $('#jumlah_kg').val('0');
                });

            modal.find('#jumlah_zak').off('input').on('input', function () {
                let zak = $(this).val().replace(/\./g, '');
                zak = parseFloat(zak) || 0;
                let kg = zak / 25;
                let formattedKg = kg.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                modal.find('#jumlah_kg').val(formattedKg);
            });

            modal.find('#jumlah_zak').off('keyup').on('keyup', function (e) {
                let value = this.value.replace(/\D/g, '');
                value = new Intl.NumberFormat('id-ID').format(value);
                this.value = value;
            });

            modal.find('#kurs_pib').off('input').on('input', function () {
                let inputValue = $(this).val();
                let cleanValue = inputValue.replace(/[^\d]/g, '');

                if (cleanValue === '') {
                    $(this).val('Rp.');
                } else if (cleanValue === '0') {
                    $(this).val('Rp.0');
                } else {
                    let formatted = cleanValue.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                    $(this).val('Rp.' + formatted);
                }

                let input = this;
                setTimeout(function () {
                    input.setSelectionRange(input.value.length, input.value.length);
                }, 0);
            });

            modal.find('#kurs_pib').off('focus').on('focus', function () {
                let value = $(this).val();
                if (value === 'Rp.0') {
                    $(this).val('Rp.');
                }
            });

            modal.find('#kurs_pib').off('blur').on('blur', function () {
                let value = $(this).val();
                let cleanValue = value.replace(/[^\d]/g, '');

                if (cleanValue === '' || cleanValue === '0') {
                    $(this).val('Rp.0');
                }
            });

            // Prevent datepicker conflict with modal
            modal.find('.datepicker').datepicker().on('show.bs.modal', function (event) {
                event.stopPropagation();
            });
        });

        // Reset kode saat modal ditutup
        $('#proses').on('hidden.bs.modal', function () {
            $('#p-kode_tf_in').val('');
            $('#p-kode_tf_in_2').val('');
            generatedKodeTfIn = null;
            // Reset form lainnya jika perlu
            $(this).find('form')[0].reset();
        });

        // Form submit handler
        $('#prosesForm').on('submit', function (e) {
            // buat konfirmasi
            if (!confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali.')) {
                e.preventDefault();
                return false;
            }

            // Pastikan kode TF IN sudah ada
            if (!$('#p-kode_tf_in').val() || $('#p-kode_tf_in').val().trim() === '') {
                e.preventDefault();
                alert('Kode TF IN belum di-generate. Silakan coba lagi.');
                return false;
            }

            // Validasi kurs PIB
            let kursPibInput = $('#kurs_pib');
            let kursValue = kursPibInput.val();
            let cleanKurs = kursValue.replace(/[^\d]/g, '');
            if (cleanKurs === '') {
                cleanKurs = '0';
            }
            kursPibInput.val(cleanKurs);

            // Validasi jumlah ZAK
            let jumlahZakInput = $('#jumlah_zak');
            let jumlahZakValue = jumlahZakInput.val().replace(/\./g, '');
            jumlahZakInput.val(jumlahZakValue || '0');

            // Validasi jumlah KG
            let jumlahKgInput = $('#jumlah_kg');
            let jumlahKgValue = jumlahKgInput.val().replace(/\./g, '');
            jumlahKgInput.val(jumlahKgValue || '0');

            console.log('Data yang akan dikirim:');
            console.log('Kode TF IN:', $('#p-kode_tf_in').val());
            $(this).find('input, select').each(function () {
                if ($(this).attr('name')) {
                    console.log($(this).attr('name') + ': ' + $(this).val());
                }
            });
        });

        // Filter functions
        $('#lihat').click(function () {
            var filter_barang = $('#filter_barang').find(':selected').val();
            var filter_supplier = $('#filter_supplier').find(':selected').val();
            var filter_tgl = $('#filter_tgl').val();
            var filter_tgl2 = $('#filter_tgl2').val();

            if (filter_tgl == '' && filter_tgl2 != '') {
                window.location = "<?= base_url() ?>gudang/gudang_admin/admin_spbm?alert=warning&msg=dari tanggal belum diisi";
            } else if (filter_tgl != '' && filter_tgl2 == '') {
                window.location = "<?= base_url() ?>gudang/gudang_admin/admin_spbm?alert=warning&msg=sampai tanggal belum diisi";
            } else {
                const query = new URLSearchParams({
                    nama_supplier: filter_supplier,
                    nama_barang: filter_barang,
                    date_from: filter_tgl,
                    date_until: filter_tgl2
                });
                window.location = "<?= base_url() ?>gudang/gudang_admin/admin_spbm?" + query.toString();
            }
        });

        // Function for numbers only
        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
    });
</script>
</body>

</html>