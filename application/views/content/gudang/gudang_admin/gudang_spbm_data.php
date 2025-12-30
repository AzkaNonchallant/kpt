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
      --upd: #e658fcff;
      --secondary: #3f37c9;
      --success: #4cc9f0;
      --info: #4895ef;
      --warning: #ffffffff;
      --danger: #e63946;
      --light: #ffffffff;
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
      background:  #e415ddff;
      color: white;
    }

    .btn-danger {
      background: linear-gradient(135deg, var(--danger), #a72701ff);
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
                                        <!-- <h5 class="m-b-10">Data Barang Masuk</h5> -->
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i
                                                    class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">SPBM</a></li>
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
                                            <h5>Data Surat Persetujuan</h5>
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
                                                            <th class="text-center">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $level = $this->session->userdata('level');
                                                        $no = 1;
                                                        foreach ($result as $k):
                                                            $tgl_po_import = explode('-', $k['tgl_po_import'])[2] . "/" . explode('-', $k['tgl_po_import'])[1] . "/" . explode('-', $k['tgl_po_import'])[0];
                                                            ?>
                                                            <tr>
                                                                <th scope="row"><?= $no++ ?></th>
                                                                <td><?= $tgl_po_import ?></td>
                                                                <td>
                                                                    <span type="button"
                                                                        class="btn btn-warning btn-square btn-sm text-light"
                                                                        data-toggle="modal" data-target="#detail"
                                                                        data-id_prc_po_import="<?= $k['id_prc_po_import_tf'] ?>"
                                                                        data-no_po_import="<?= $k['no_po_import'] ?>"
                                                                        data-tgl_po_import="<?= $tgl_po_import ?>"
                                                                        data-id_supplier="<?= $k['id_supplier'] ?>"
                                                                        data-nama_supplier="<?= $k['nama_supplier'] ?>"
                                                                        data-id_barang="<?= $k['id_barang'] ?>"
                                                                        data-nama_barang="<?= $k['nama_barang'] ?>"
                                                                        data-mesh="<?= $k['mesh'] ?>"
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

                                                                    <?php if ($k['status_po_import'] == 'gudang'): ?>
                                                                        <span class="badge badge-warning">Proses Gudang</span>
                                                                    <?php elseif ($k['status_po_import'] == 'diterima'): ?>
                                                                        <span class="badge badge-success">Diterima</span>
                                                                    <?php else: ?>
                                                                        <span
                                                                            class="badge badge-secondary"><?= $k['status_po_import'] ?></span>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <div class="btn-group" role="group"
                                                                        aria-label="Basic example">
                                                                        <?php if ($level === "0" && $k['status_po_import'] == 'gudang'): ?>
                                                                            <button type="button"
                                                                                class="btn btn-warning btn-square btn-sm text-light"
                                                                                data-toggle="modal" data-target="#proses"
                                                                                data-id_prc_po_import_tf="<?= $k['id_prc_po_import_tf'] ?>"
                                                                                data-id_prc_po_import="<?= $k['id_prc_po_import'] ?>"
                                                                                data-no_po_import="<?= $k['no_po_import'] ?>"
                                                                                data-tgl_po_import="<?= $tgl_po_import ?>"
                                                                                data-id_supplier="<?= $k['id_supplier'] ?>"
                                                                                data-nama_supplier="<?= $k['nama_supplier'] ?>"
                                                                                data-id_barang="<?= $k['id_barang'] ?>"
                                                                                data-nama_barang="<?= $k['nama_barang'] ?>"
                                                                                data-mesh="<?= $k['mesh'] ?>"
                                                                                data-bloom="<?= $k['bloom'] ?>"
                                                                                data-jumlah="<?= number_format($k['jumlah'], 0, ",", ".") ?>"
                                                                                data-harga_perunit="<?= number_format($k['harga_perunit'], 0, ",", ".") ?>"
                                                                                data-prc_admin="<?= $k['prc_admin'] ?>"
                                                                                data-kode_tf_in="<?= $k['kode_tf_in'] ?>">
                                                                                <i class="feather icon-edit-2"></i> Proses
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
                        <div class="col-md-3">
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
                        </div>
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
                <form method="post" action="<?= base_url() ?>gudang/gudang_admin/gudang_spbm/proses" id="prosesForm">
                    <div class="modal-body">
                        <input type="hidden" id="p-id_prc_po_import_tf" name="id_prc_po_import_tf">
                        <input type="hidden" id="p-id_barang" name="id_barang">
                        <input type="hidden" id="p-id_prc_po_import" name="id_prc_po_import">
                        <input type="hidden" id="p-kode_tf_in" name="kode_tf_in">

                        <center><label for="pemeriksaan" class="font-weight-bold">Keterangan Barang</label></center>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">No PO Pembelian</label>
                                    <input type="text" class="form-control" id="p-no_po_import" name="no_po_import"
                                        autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Tanggal PO</label>
                                    <input class="form-control" id="p-tgl_po_import" name="tgl_po_import" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Barang</label>
                                    <input class="form-control" id="p-nama_barang" name="id_barang" readonly>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nama_supplier">Supplier</label>
                                    <input type="text" class="form-control" id="p-nama_supplier" name="nama_supplier"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Jumlah(Zak)</label>
                                    <input type="text" class="form-control" id="p-jumlah_zak" name="jumlah_zak"
                                        onkeypress="return hanyaAngka(event)" maxlength="15" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Jumlah(kg)</label>
                                    <input type="text" class="form-control" id="p-jumlah" name="jumlah"
                                        onkeypress="return hanyaAngka(event)" maxlength="15" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Purchasing Admin</label>
                                    <input type="text" class="form-control" id="p-prc_admin" name="prc_admin"
                                        value="<?= $this->session->userdata('nama') ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <center><label for="pemeriksaan" class="font-weight-bold">administrasi</label></center>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Kode TF</label>
                                    <input type="text" class="form-control" id="p-kode_tf_in_display" 
                                        autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tanggal Proses</label>
                                    <input type="text" class="form-control datepicker" id="tgl_srp" name="tgl_srp"
                                        placeholder="Tanggal Proses" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Jumlah Di terima</label>
                                    <input type="text" class="form-control" id="p-qty" name="qty_in" placeholder="Jumlah Terima"
                                        autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Jumlah Di tolak</label>
                                    <input type="text" class="form-control" id="p-qty_out" name="qty_out" placeholder="Jumlah Tolak"
                                        autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Jumlah Di Terima(KG)</label>
                                    <input type="text" class="form-control" id="p-qty_kg" name="qty_kg" placeholder="Jumlah Di Terima"
                                        autocomplete="off" readonly>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Gudang Admin</label>
                                    <input type="text" class="form-control" id="gdg_admin" name="gdg_admin"
                                        placeholder="Gudang Admin" value="<?= $this->session->userdata('nama') ?>"
                                        readonly>
                                </div>
                            </div>
                       

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Keterangan</label>
                                    <textarea type="text" class="form-control" id="p-keterangan" name="keterangan" rows="3" placeholder="Keterangan"
                                        autocomplete="off" ></textarea>
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
                var prc_admin = button.data('prc_admin');

                $('#v-id_prc_po_import').val(id_prc_po_import);
                $('#v-no_po_import').val(no_po_import);
                $('#v-tgl_po_import').val(tgl_po_import);
                $('#v-nama_supplier').val(nama_supplier);
                $('#v-id_barang').val(id_barang);
                $('#v-mesh').val(mesh);
                $('#v-bloom').val(bloom);
                $('#v-jumlah').val(jumlah);
                $('#v-harga_perunit').val(harga_perunit);
                $('#v-prc_admin').val(prc_admin);
            });

            $('#p-qty').on('input', function () {
                // ambil nilai & hapus titik
                let jumlahZak = $('#p-jumlah_zak').val().replace(/\./g, '');
                let qty      = $(this).val().replace(/\./g, '');

                jumlahZak = parseInt(jumlahZak) || 0;
                qty      = parseInt(qty) || 0;

                // validasi
                if (qty > jumlahZak) {
                    qty = jumlahZak;
                    $(this).val(jumlahZak);
                }

                // hitung qty_out
                let qtyOut = jumlahZak - qty;
                $('#p-qty_out').val(qtyOut);
            });

            document.getElementById('p-qty').addEventListener('input', function () {
    let qty = parseFloat(this.value) || 0;
    let hasil = qty * 25 ;

    document.getElementById('p-qty_kg').value = hasil;
});

            
            $('#proses').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var modal = $(this);

                var id_prc_po_import_tf = button.data('id_prc_po_import_tf');
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
                var kode_tf_in = button.data('kode_tf_in');
                var kurs_pib = button.data('kurs_pib') || '0';
                var no_pib = button.data('no_pib') || '';

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
                    if (!value || value === '0') return '$0';
                    let cleanValue = value.toString().replace(/[^\d]/g, '');
                    if (cleanValue === '0') return '$0';

                    let formatted = cleanValue.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                    return '$' + formatted;
                }

                let jumlah_po = unformatRupiah(jumlah);
                let zak = jumlah_po / 25;
                let formattedZak = formatRupiah(zak.toString());

                // Set nilai ke input yang benar
                modal.find('#p-id_prc_po_import_tf').val(id_prc_po_import_tf);
                modal.find('#p-id_prc_po_import').val(id_prc_po_import);
                modal.find('#p-no_po_import').val(no_po_import);
                modal.find('#p-tgl_po_import').val(tgl_po_import);
                modal.find('#p-nama_supplier').val(nama_supplier);
                modal.find('#p-id_barang').val(id_barang);
                modal.find('#p-nama_barang').val(nama_barang + ' | ' + mesh + ' | ' + bloom);
                modal.find('#p-mesh').val(mesh);
                modal.find('#p-bloom').val(bloom);
                modal.find('#p-jumlah').val(jumlah);
                modal.find('#p-jumlah_zak').val(formattedZak);
                modal.find('#p-harga_perunit').val(harga_perunit);
                modal.find('#p-prc_admin').val(prc_admin);
                
                // Hanya set sekali untuk input hidden
                modal.find('#p-kode_tf_in').val(kode_tf_in);
                
                // Untuk display saja (hanya baca)
                modal.find('#p-kode_tf_in_display').val(kode_tf_in);
                
                // Reset form qty
                modal.find('#p-qty').val('');
                modal.find('#p-qty_out').val('');
                modal.find('#tgl_srp').val('');

                modal.find('#kurs_pib').val(formatDollarDisplay(kurs_pib));

                if (no_pib) {
                    modal.find('#no_pib').val(no_pib);
                }

                modal.find("#qty_out").off('keyup').on('keyup', function () {
                    var jumlah_zak = $(this).val().replace(/\./g, '');
                    var jumlah_po = modal.find("#qty_out").val().replace(/\./g, '');
                    if (unformatRupiah(jumlah_zak) > unformatRupiah(jumlah_po)) {
                        $(this).addClass("is-invalid");
                        modal.find("#simpan").attr("disabled", "disabled");
                    } else {
                        $(this).removeClass("is-invalid");
                        modal.find("#simpan").removeAttr("disabled");
                    }
                });

                modal.find('#qty').off('input').on('input', function () {
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
                        $(this).val('$');
                    } else if (cleanValue === '0') {
                        $(this).val('$0');
                    } else {
                        let formatted = cleanValue.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                        $(this).val('$' + formatted);
                    }

                    let input = this;
                    setTimeout(function () {
                        input.setSelectionRange(input.value.length, input.value.length);
                    }, 0);
                });

                modal.find('#kurs_pib').off('focus').on('focus', function () {
                    let value = $(this).val();
                    if (value === '$0') {
                        $(this).val('$');
                    }
                });

                modal.find('#kurs_pib').off('blur').on('blur', function () {
                    let value = $(this).val();
                    let cleanValue = value.replace(/[^\d]/g, '');

                    if (cleanValue === '' || cleanValue === '0') {
                        $(this).val('$0');
                    }
                });

                // Prevent datepicker conflict with modal
                modal.find('.datepicker').datepicker().on('show.bs.modal', function (event) {
                    event.stopPropagation();
                });
            });

            $('#prosesForm').on('submit', function (e) {
                // buat konfirmasi
                if (!confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali.')) {
                    e.preventDefault();
                    return false;
                }

                let kursPibInput = $('#kurs_pib');
                let kursValue = kursPibInput.val();

                let cleanKurs = kursValue.replace(/[^\d]/g, '');

                if (cleanKurs === '') {
                    cleanKurs = '0';
                }

                kursPibInput.val(cleanKurs);

                let jumlahZakInput = $('#jumlah_zak');
                let jumlahZakValue = jumlahZakInput.val().replace(/\./g, '');
                jumlahZakInput.val(jumlahZakValue || '0');

                let jumlahKgInput = $('#jumlah_kg');
                let jumlahKgValue = jumlahKgInput.val().replace(/\./g, '');
                jumlahKgInput.val(jumlahKgValue || '0');

                let requiredFields = [
                    'tgl_srp',
                    'qty'
                ];

                let missingFields = [];
                requiredFields.forEach(function (fieldName) {
                    let fieldValue = $('[name="' + fieldName + '"]').val();
                    if (!fieldValue || fieldValue.trim() === '') {
                        missingFields.push(fieldName);
                    }
                });

                if (missingFields.length > 0) {
                    e.preventDefault();
                    alert('Mohon lengkapi field berikut: ' + missingFields.join(', '));
                    return false;
                }

                console.log('Data yang akan dikirim:');
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
                    window.location = "<?= base_url() ?>gudang/gudang_admin/gudang_spbm?alert=warning&msg=dari tanggal belum diisi";
                } else if (filter_tgl != '' && filter_tgl2 == '') {
                    window.location = "<?= base_url() ?>gudang/gudang_admin/gudang_spbm?alert=warning&msg=sampai tanggal belum diisi";
                } else {
                    const query = new URLSearchParams({
                        nama_supplier: filter_supplier,
                        nama_barang: filter_barang,
                        date_from: filter_tgl,
                        date_until: filter_tgl2
                    });
                    window.location = "<?= base_url() ?>gudang/gudang_spbm/gudang_spbm?" + query.toString();
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