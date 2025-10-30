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
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url() ?>"><i class="feather icon-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="javascript:">Purchasing</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">PO Reg</a></li>
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url('Purchasing/PO_Reg/Prc_po_reg') ?>">PO Reg</a>
                                    </li>
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
                                        <h5>Data PO Reg <b>(Approval)</b></h5>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
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
                                                        <th class="text-center">No PO Reg</th>
                                                        <th class="text-center">Details</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $level = $this->session->userdata('level');
                                                    $no = 1;
                                                    foreach ($result as $k) {
                                                        // Split and format the date as dd/mm/yyyy
                                                        $tgl_po_reg = implode('/', array_reverse(explode('-', $k['tgl_po_reg'])));
                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td class="text-center"><?= $tgl_po_reg ?></td>
                                                            <td class="text-center"><?= $k['no_po_reg'] ?></td>
                                                            <td class="text-center">
                                                                <div class="action-buttons">
                                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail"
                                                                        data-id_prc_po_reg="<?= $k['id_prc_po_reg'] ?>"
                                                                        data-no_po_reg="<?= $k['no_po_reg'] ?>"
                                                                        data-tgl_po_reg="<?= $tgl_po_reg ?>"
                                                                        data-id_barang="<?= $k['id_barang'] ?>"
                                                                        data-mesh="<?=$k['mesh']?>"
                                                                        data-bloom="<?=$k['bloom']?>"
                                                                        data-id_supplier="<?= $k['id_supplier'] ?>"
                                                                        data-jumlah="<?= $k['jumlah'] ?>"
                                                                        data-harga_perunit="<?= $k['harga_perunit'] ?>"
                                                                        data-metode="<?= $k['metode'] ?>"
                                                                        data-shipment="<?= $k['shipment'] ?>"
                                                                        data-pic1="<?= $k['pic1'] ?>"
                                                                        data-pic2="<?= $k['pic2'] ?>"
                                                                        data-pajak="<?= $k['pajak'] ?>"
                                                                        data-total_harga="<?= $k['total_harga'] ?>"
                                                                        data-prc_admin="<?= $k['prc_admin'] ?>"
                                                                        data-nama_barang="<?= $k['nama_barang'] ?>"
                                                                        data-nama_supplier="<?= $k['nama_supplier'] ?>"
                                                                        data-pic_supplier="<?=$k['pic_supplier']?>"
                                                                    >
                                                                        <i class="feather icon-eye"></i>Details
                                                                    </button>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php if ($level === "0") { ?>
                                                                    <div class="action-buttons">
                                                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit"
                                                                            data-id_prc_po_reg="<?= $k['id_prc_po_reg'] ?>"
                                                                            data-no_po_reg="<?= $k['no_po_reg'] ?>"
                                                                            data-tgl_po_reg="<?= $tgl_po_reg ?>"
                                                                            data-id_barang="<?= $k['id_barang'] ?>"
                                                                            data-mesh="<?=$k['mesh']?>"
                                                                            data-bloom="<?=$k['bloom']?>"
                                                                            data-id_supplier="<?= $k['id_supplier'] ?>"
                                                                            data-pic_supplier="<?=$k['pic_supplier']?>"
                                                                            data-jumlah="<?= $k['jumlah'] ?>"
                                                                            data-harga_perunit="<?= $k['harga_perunit'] ?>"
                                                                            data-total_harga="<?= $k['total_harga'] ?>"
                                                                            data-metode="<?= $k['metode'] ?>"
                                                                            data-shipment="<?= $k['shipment'] ?>"
                                                                            data-pic1="<?= $k['pic1'] ?>"
                                                                            data-pic2="<?= $k['pic2'] ?>"
                                                                            data-prc_admin="<?= $k['prc_admin'] ?>"
                                                                            data-nama_barang="<?= $k['nama_barang'] ?>"
                                                                            data-nama_supplier="<?= $k['nama_supplier'] ?>"
                                                                        >
                                                                            <i class="feather icon-edit-2"></i>Edit
                                                                        </button>
                                                                        <a href="<?= base_url() ?>purchasing/po_regional/po_reg/delete/<?= $k['id_prc_po_reg'] ?>" class="btn btn-danger btn-sm" onclick="if (!confirm('Apakah Anda Yakin?')) { return false; }">
                                                                            <i class="feather icon-trash-2"></i>Hapus
                                                                        </a>
                                                                    </div>
                                                                <?php } ?>
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
                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>                         
</section>
                                                                                                                                                                   
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah PO Reg</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="form_add" action="<?= base_url() ?>purchasing/po_regional/po_reg/add">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tgl_po_reg">Tanggal PO Reg</label>
                                <input type="text" class="form-control datepicker" id="tgl_po_reg" name="tgl_po_reg" placeholder="Tanggal PO Reg" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_po_reg">No PO Reg</label>
                                <input type="text" class="form-control" id="no_po_reg" name="no_po_reg" maxlength="20" placeholder="No PO Reg" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" autocomplete="off" required>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    Maaf Nomor PO Import sudah ada.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="id_supplier">Nama Supplier</label>
                                <select class="form-control chosen-select" id="id_supplier" name="id_supplier" required>
                                    <option value="" disabled selected hidden>- Pilih Nama Supplier -</option>
                                    <?php foreach ($res_supplier as $s): ?>
                                    <option value="<?= $s['id_supplier'] ?>" data-nama_supplier="<?= $s['nama_supplier'] ?>" data-pic_supplier="<?=$s['pic_supplier']?>"><?= $s['nama_supplier'] ?> (<?= $s['pic_supplier'] ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="golongan">Pic Supplier</label>
                                <input type="text" class="form-control" id="pic_supplier" name="pic_supplier" placeholder="pic supplier" readonly>
                            </div>
                        </div>
                                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="id_prc_master_barang">Nama Barang</label>
                                <select class="form-control chosen-select" id="id_barang" name="id_barang" required>
                                    <option value="" disabled selected hidden>- Pilih Nama Barang -</option>
                                    <?php foreach ($res_barang as $b): ?>
                                    <option value="<?= $b['id_barang'] ?>" 
                                    data-mesh="<?= $b['mesh'] ?>" data-bloom="<?=$b['bloom']?>"><?= $b['nama_barang'] ?> (<?= $b['no_batch'] ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mesh">Mesh</label>
                                <input type="text" class="form-control" id="mesh" name="mesh" placeholder="Mesh" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bloom">Bloom</label>
                                <input type="text" class="form-control" id="bloom" name="bloom" placeholder="Bloom" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" oninput="calculateTotal()" autocomplete="off">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="harga_perunit">Harga Perunit</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="harga_perunit" name="harga_perunit" placeholder="Harga Perunit"  oninput="calculateTotal()" autocomplete="off" required>
                                </div>             
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="metode">Metode</label>
                                <input type="text" class="form-control" id="metode" name="metode" placeholder="Metode">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="shipment">Shipment</label>
                                <input type="text" class="form-control" id="shipment" name="shipment" placeholder="Shipment">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pic1">PIC Kapsulindo 1</label>
                                <input type="text" class="form-control" id="pic1" name="pic1" placeholder="Pic1">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pic2">PIC Kapsulindo 2</label>
                                <input type="text" class="form-control" id="pic2" name="pic2" placeholder="Pic2">
                            </div>  
                        </div>

                        <!-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="pajak">Pajak</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="pajak" name="pajak" placeholder="Pajak" required>
                                </div>             
                            </div>
                        </div> -->

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="total_harga">Total Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="total_harga" name="total_harga" placeholder="Total Harga" readonly>
                                </div>                            
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="prc_admin">Prc Admin</label>
                                <input type="text" class="form-control" id="prc_admin" name="prc_admin" value="<?= $this->session->userdata('username') ?>" maxlength="20" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
  // Ubah dari rupiah ke integer
  function unformatRupiah(rupiah) {
    if (!rupiah) return 0;
    return parseInt(rupiah.toString().replace(/[^0-9]/g, ''), 10);
  }

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
 
    function calculateTotal() {
    const jumlah = unformatRupiah($('#jumlah').val());
    const hargaPerUnit = unformatRupiah($('#harga_perunit').val());
    const totalHarga = jumlah * hargaPerUnit;
    $('#total_harga').val(formatRupiah(totalHarga));
  }

   $('#jumlah, #harga_perunit').on('input', function() {
    calculateTotal();
  });


    document.getElementById('jumlah').addEventListener('keyup', function(e) {
    let value = this.value.replace(/\D/g,'');
    value = new Intl.NumberFormat('id-ID').format(value);
    this.value = value;
    });

    document.getElementById('harga_perunit').addEventListener('keyup', function(e) {
    let value = this.value.replace(/\D/g,'');
    value = new Intl.NumberFormat('id-ID').format(value);
    this.value = value;
    });

  $('#id_barang').change(function() {
    var selectedOption = $(this).find('option:selected');
    var mesh = selectedOption.data('mesh');
    var bloom = selectedOption.data('bloom');
    $('#mesh').val(mesh);  
    $('#bloom').val(bloom);  
  });

  $('#id_supplier').change(function() {
    var selectedOption = $(this).find('option:selected');
    var golongan = selectedOption.data('pic_supplier');
    $('#pic_supplier').val(golongan);  
  });

  $("#no_po_reg").keyup(function() {
    var no_po_reg = $(this).val();
    $.ajax({
      url: "<?= base_url() ?>purchasing/po_regional/po_reg/check_no_po_reg",
      dataType: 'text',
      type: "post",
      data: { no_po_reg },
      success: function(response) {
        if (response == "true") {
          $("#no_po_reg").addClass("is-invalid");
          $("#simpan").attr("disabled", "disabled");
        } else {
          $("#no_po_reg").removeClass("is-invalid");
          $("#simpan").removeAttr("disabled");
        }
      }
    });
});
    $('#add').on('submit', function(e) {
    // Ambil nilai aslinya (tanpa format)
    const jumlah = unformatRupiah($('#jumlah').val());
    const harga = unformatRupiah($('#harga_perunit').val());
    const total = unformatRupiah($('#total_harga').val());

    // Ubah isi input ke integer agar dikirim bersih ke backend
    $('#jumlah').val(jumlah);
    $('#harga_perunit').val(harga);
    $('#total_harga').val(total);
    
    // Setelah ini form dikirim secara normal
  });

});
</script>


<!-- Modal Detail -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail PO Reg</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="form_add">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="v-id_prc_po_reg" name="id_prc_po_reg">

                        <!-- Tanggal PO Reg -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-tgl_po_reg">Tanggal PO Reg</label>
                                <input type="text" class="form-control datepicker" id="v-tgl_po_reg" name="tgl_po_reg" placeholder="Tanggal PO Reg" autocomplete="off" readonly>
                            </div>
                        </div>

                        <!-- No PO Reg -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-no_po_reg">No PO Reg</label>
                                <input type="text" class="form-control" id="v-no_po_reg" name="no_po_reg" maxlength="20" placeholder="No PO Reg" aria-describedby="validationServer03Feedback" autocomplete="off" readonly>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    Maaf Nomor PO Import sudah ada.
                                </div>
                            </div>
                        </div>

                        <!-- Nama Supplier -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-id_supplier">Nama Supplier</label>
                                <input type="text" class="form-control" id="v-id_supplier" name="id_supplier" readonly>
                            </div>
                        </div>

                        <!-- Golongan -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-golongan">Pic Supplier</label>
                                <input type="text" class="form-control" id="v-pic_supplier" name="pic_supplier" readonly>
                            </div>
                        </div>

                        <!-- Nama Barang -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-id_prc_master_barang">Nama Barang</label>
                                <input type="text" class="form-control" id="v-nama_barang" name="id_barang" readonly>
                            </div>
                        </div>

                        <!-- Spesifikasi -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-spek">Mesh</label>
                                <input type="text" class="form-control" id="v-mesh" name="mesh" placeholder="Mesh" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-spek">Bloom</label>
                                <input type="text" class="form-control" id="v-bloom" name="mesh" placeholder="Bloom" readonly>
                            </div>
                        </div>

                        <!-- Jumlah -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-jumlah">Jumlah</label>
                                <input type="text" class="form-control" id="v-jumlah" name="jumlah" placeholder="Jumlah" oninput="calculateTotal()" readonly>
                            </div>
                        </div>

                        <!-- Harga Perunit -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-harga_perunit">Harga Perunit</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="v-harga_perunit" name="harga_perunit" placeholder="Harga Perunit" readonly>
                                </div>             
                            </div>
                        </div>



                        <!-- Metode -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-metode">Metode</label>
                                <input type="text" class="form-control" id="v-metode" name="metode" placeholder="Metode" readonly>
                            </div>
                        </div>

                        <!-- Shipment -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-shipment">Shipment</label>
                                <input type="text" class="form-control" id="v-shipment" name="shipment" placeholder="Shipment" readonly>
                            </div>
                        </div>

                        <!-- PIC Kapsulindo 1 -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-pic1">PIC Kapsulindo 1</label>
                                <input type="text" class="form-control" id="v-pic1" name="pic1" placeholder="Pic1" readonly>
                            </div>
                        </div>

                        <!-- PIC Kapsulindo 2 -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-pic2">PIC Kapsulindo 2</label>
                                <input type="text" class="form-control" id="v-pic2" name="pic2" placeholder="Pic2" readonly>
                            </div>
                        </div>

                        <!-- Pajak -->
                        <!-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-pajak">Pajak</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="v-pajak" name="pajak" placeholder="Pajak" readonly>
                                </div>             
                            </div>
                        </div> -->

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-total_harga">Total Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="v-total_harga" name="total_harga" placeholder="Total Harga" readonly>
                                </div>                            
                            </div>
                        </div>

                        <!-- Prc Admin -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="prc_admin">Prc Admin</label>
                                <input type="text" class="form-control" id="prc_admin" name="prc_admin" value="<?= $this->session->userdata('username') ?>" maxlength="20" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
    $('#detail').on('show.bs.modal', function(event) {
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

    function unformatRupiah(rupiah) {
    if (!rupiah) return 0;
    return parseInt(rupiah.toString().replace(/[^0-9]/g, ''), 10);
        }
      var button = $(event.relatedTarget);

    var total_harga = button.data('total_harga');
    var harga_perunit = button.data('harga_perunit');
    var tgl_po_reg = button.data('tgl_po_reg');
    var jumlah = button.data('jumlah');
    var id_prc_po_reg = button.data('id_prc_po_reg');
    var mesh = button.data('mesh');
    var bloom = button.data('bloom');
    var id_supplier = button.data('id_supplier');
    var pic1 = button.data('pic1');
    var pic2 = button.data('pic2');
    var metode = button.data('metode');
    var shipment = button.data('shipment');
    var no_po_reg = button.data('no_po_reg');
    var id_barang = button.data('id_barang');
    var prc_admin = button.data('prc_admin');
    var nama_supplier = button.data('nama_supplier');
    var nama_barang = button.data('nama_barang');
    var pic_supplier = button.data('pic_supplier');


      $(this).find('#v-no_po_reg').val(no_po_reg);
      $(this).find('#v-id_prc_po_reg').val(id_prc_po_reg);
      $(this).find('#v-id_supplier').val(nama_supplier);
      $(this).find('#v-tgl_po_reg').val(tgl_po_reg);
      $(this).find('#v-id_barang').val(id_barang);
      $(this).find('#v-jumlah').val(formatRupiah(jumlah.toString()));
      $(this).find('#v-harga_perunit').val(formatRupiah(harga_perunit.toString()));
      $(this).find('#v-shipment').val(shipment);
      $(this).find('#v-metode').val(metode);
      $(this).find('#v-pic1').val(pic1);
      $(this).find('#v-pic2').val(pic2);
      $(this).find('#v-prc_admin').val(prc_admin);
      $(this).find('#v-nama_supplier').val(nama_supplier);
      $(this).find('#v-nama_barang').val(nama_barang);
      $(this).find('#v-total_harga').val(formatRupiah(total_harga.toString()));
      $(this).find('#v-mesh').val(mesh);
      $(this).find('#v-bloom').val(bloom);
      $(this).find('#v-pic_supplier').val(pic_supplier);
    });
});
</script>


<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit PO Reg</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="form_update" action="<?= base_url() ?>purchasing/po_regional/po_reg/update/">
                 <input type="hidden" id="e-id_prc_po_reg" name="id_prc_po_reg">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-tgl_po_reg">Tanggal PO Reg</label>
                                <input type="text" class="form-control datepicker" id="e-tgl_po_reg" name="tgl_po_reg" placeholder="Tanggal PO Reg" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-no_po_reg">No PO Reg</label>
                                <input type="text" class="form-control" id="e-no_po_reg" name="no_po_reg" maxlength="20" placeholder="No PO Reg" aria-describedby="validationServer03Feedback" autocomplete="off" required>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    Maaf Nomor PO Import sudah ada.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-id_supplier">Nama Supplier</label>
                                <select class="form-control chosen-select" id="e-id_supplier" name="id_supplier" required>
                                    <option value="" disabled selected hidden>- Pilih Nama Supplier -</option>
                                    <?php foreach ($res_supplier as $s): ?>
                                    <option value="<?= $s['id_supplier'] ?>" data-nama_supplier="<?= $s['nama_supplier'] ?>" data-pic_supplier="<?= $s['pic_supplier'] ?>"><?= $s['nama_supplier'] ?> (<?= $s['pic_supplier'] ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-golongan">Pic Suppler</label>
                                <input type="text" class="form-control" id="e-pic_supplier" name="pic_supplier" placeholder="Pic Supplier" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-id_barang">Nama Barang</label>
                                <select class="form-control chosen-select" id="e-id_barang" name="id_barang" required>
                                    <option value="" disabled selected hidden>- Pilih Nama Barang -</option>
                                    <?php foreach ($res_barang as $b): ?>
                                    <option value="<?= $b['id_barang'] ?>" data-mesh="<?= $b['mesh'] ?>" data-bloom="<?=$b['bloom']?>"><?= $b['nama_barang'] ?> (<?= $b['kode_barang'] ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-mesh">Mesh</label>
                                <input type="text" class="form-control" id="e-mesh" name="mesh" placeholder="mesh" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-bloom">Bloom</label>
                                <input type="text" class="form-control" id="e-bloom" name="bloom" placeholder="bloom" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-jumlah">Jumlah</label>
                                <input type="text" class="form-control" id="e-jumlah" name="jumlah" placeholder="Jumlah" oninput="calculateTotal()">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-harga_perunit">Harga Perunit</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="e-harga_perunit" name="harga_perunit" placeholder="Harga Perunit"  oninput="calculateTotal()"  required>
                                </div>             
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-metode">Metode</label>
                                <input type="text" class="form-control" id="e-metode" name="metode" placeholder="Metode">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-shipment">Shipment</label>
                                <input type="text" class="form-control" id="e-shipment" name="shipment" placeholder="Shipment">
                            </div>
                        </div>    

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-pic1">PIC Kapsulindo 1</label>
                                <input type="text" class="form-control" id="e-pic1" name="pic1" placeholder="Pic1">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-pic2">PIC Kapsulindo 2</label>
                                <input type="text" class="form-control" id="e-pic2" name="pic2" placeholder="Pic2">
                                </div>
                            </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-total_harga">Total Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="e-total_harga" name="total_harga" placeholder="Total Harga" readonly>
                                </div>                            
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="prc_admin">Prc Admin</label>
                                <input type="text" class="form-control" id="prc_admin" name="prc_admin" value="<?= $this->session->userdata('username') ?>" maxlength="20" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script type="text/javascript">
$(document).ready(function() {
    
    // ====== Fungsi bantu ======
    function formatRupiah(angka) {
      if (!angka) return '0';
      let number_string = angka.toString().replace(/[^,\d]/g, ''),
          split = number_string.split(','),
          sisa = split[0].length % 3,
          rupiah = split[0].substr(0, sisa),
          ribuan = split[0].substr(sisa).match(/\d{3}/gi);
          if (ribuan) {
              let separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
      return split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    }
    
    function unformatRupiah(angka) {
      if (!angka) return 0;
      return parseInt(angka.replace(/\./g, '').replace(/[^0-9]/g, ''), 10);
    }
    
    // ====== Hitung total ======
    function calculateTotal() {
      const jumlah = unformatRupiah($('#e-jumlah').val());
      const hargaPerUnit = unformatRupiah($('#e-harga_perunit').val());
      const totalHarga = jumlah * hargaPerUnit;
      $('#e-total_harga').val(formatRupiah(totalHarga));
    }
    $('#edit').on('show.bs.modal', function(event) {
    
    // ====== Ambil data dari tombol ======
    var button = $(event.relatedTarget);
    $('#e-id_prc_po_reg').val(button.data('id_prc_po_reg'));
    $('#e-no_po_reg').val(button.data('no_po_reg'));
    $('#e-tgl_po_reg').val(button.data('tgl_po_reg'));
    $('#e-id_supplier').val(button.data('id_supplier')).trigger("chosen:updated");
    $('#e-id_barang').val(button.data('id_barang')).trigger("chosen:updated");
    $('#e-jumlah').val(formatRupiah(button.data('jumlah').toString()));
    $('#e-harga_perunit').val(formatRupiah(button.data('harga_perunit').toString()));
    $('#e-total_harga').val(formatRupiah(button.data('total_harga').toString()));
    $('#e-metode').val(button.data('metode'));
    $('#e-shipment').val(button.data('shipment'));
    $('#e-pic1').val(button.data('pic1'));
    $('#e-pic2').val(button.data('pic2'));
    $('#e-prc_admin').val(button.data('prc_admin'));
    $('#e-pic_supplier').val(button.data('pic_supplier'));
    $('#e-mesh').val(button.data('mesh'));
    $('#e-bloom').val(button.data('bloom'));

    // ====== Event perubahan input ======
    $('#e-jumlah, #e-harga_perunit').on('keyup', function() {
      let value = this.value.replace(/\D/g, '');
      this.value = new Intl.NumberFormat('id-ID').format(value);
      calculateTotal();
    });

    // ====== Update mesh & bloom saat barang berubah ======
    $('#e-id_barang').on('change', function() {
      let opt = $(this).find(':selected');
      $('#e-mesh').val(opt.data('mesh') || '');
      $('#e-bloom').val(opt.data('bloom') || '');
    });

    // ====== Update PIC Supplier saat supplier berubah ======
    $('#e-id_supplier').on('change', function() {
      var pic_supplier = $(this).find('option:selected').data('pic_supplier');  
      $('#e-pic_supplier').val(pic_supplier);
    });

    $(this).find('#e-tgl_po_reg').datepicker().on('show.bs.modal', function(e) {
      e.stopPropagation();
    });

    // ====== Sebelum submit, ubah kembali ke integer ======
});
$('#edit').on('submit', function() {
  $('#e-jumlah').val(unformatRupiah($('#e-jumlah').val()));
  $('#e-harga_perunit').val(unformatRupiah($('#e-harga_perunit').val()));
  $('#e-total_harga').val(unformatRupiah($('#e-total_harga').val()));
});



});
</script>