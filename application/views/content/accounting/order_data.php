<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Keluar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <style>
    :root {
      --primary: #4361ee;
      --barang: #436;
      --upd: #f7ed25ff;
      --secondary: #3f37c9;
      --success: #4cc9f0;
      --info: #4895ef;
      --warning: #fffb00ff;
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
      background: linear-gradient(135deg, var(--warning), #ffe313ff);
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
                                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Order</a></li>
                                        <!-- <li class="breadcrumb-item"><a href="javascript:"></a></li> -->
                                        <!-- Button trigger modal -->
                      										<!-- <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      											<i class="feather icon-plus"></i>Tambah PO Customer
                      										</button> -->
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
                                            <h5>Data Order</h5>

                                            <div class="float-right">
                                              <div class="input-group">
                                              <select class="form-control chosen-select" id="filter_customer" name="filter_customer">
                                                  <option value="" disabled selected hidden>- Nama Customer -</option>
                                                    <?php
                                                      foreach ($res_customer as $rc) { ?>
                                                        <option <?= $nama_customer === $rc['nama_customer'] ? 'selected' : '' ?> value="<?= $rc['nama_customer'] ?>"><?= $rc['nama_customer'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <select class="form-control chosen-select" id="filter_barang" name="filter_barang">
                                                  <option value="" disabled selected hidden>- Nama Barang -</option>
                                                    <?php
                                                      foreach ($res_barang as $rb) { ?>
                                                        <option <?= $nama_barang === $rb['nama_barang'] ? 'selected' : '' ?> value="<?= $rb['nama_barang'] ?>"><?= $rb['nama_barang'] ?> - Mesh <?= $rb['mesh'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                        <input type="text" id="filter_tgl" value="<?= $tgl == null ? '' : $tgl ?>" class="form-control datepicker" placeholder="Dari Tanggal" aria-label="Recipient's username" aria-describedby="basic-addon2" autocomplete="off">
                                                        <input type="text" id="filter_tgl2" value="<?= $tgl2 == null ? '' : $tgl2 ?>" class="form-control datepicker" placeholder="Sampai Tanggal" aria-label="Recipient's username" aria-describedby="basic-addon2" autocomplete="off">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-secondary" id="lihat" type="button">Lihat</button>
                                                            <button class="btn btn-primary" id="export" type="button">Cetak</button>
                                                            <a href="<?=base_url()?>accounting/order" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
                                                        </div>
                                                    </div>
                                              </div>
                                        </div>
                                        <div class="card-block table-border-style">

                                        	<?php 
                                        	// print_r($result);
                                        	?>
                                            <div class="table-responsive">
                                                <table class="table datatable table-hover table-striped table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Tgl PO</th>
                                                            <th>No PO</th>
                                                            <th>Customer</th>
                                                            <th>Nama Barang</th>
                                                            <th>Jumlah PO</th>
                                                            <th>Harga PO</th>
                                                            <th>Status</th>
                                                            <th class="text-center">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    	<?php
                                                      $level = $this->session->userdata('level');
                                                    	$no=1;
                                                    	foreach($result as $k){ 
                                                      $tgl_po =  explode('-', $k['tgl_po_customer'])[2]."/".explode('-', $k['tgl_po_customer'])[1]."/".explode('-', $k['tgl_po_customer'])[0];
                                                      if ($k['tot_sppb']==0) {
                                                        $ds="";
                                                      }else{
                                                        $ds="d-none";
                                                      }
                                                    
                                                      if ($k['tot_sppb']==0) {
                                                        $status="Draft";
                                                      }else if ($k['tot_sppb']<>0 & $k['sisa'] <>0){
                                                        $status="Proses";
                                                      }else if ($k['tot_sppb']<>0 & $k['sisa'] ==0){
                                                        $status="Selesai";
                                                      }
                                                      ?>

                                                    	<tr>
                                                            <th scope="row"><?=$no++?></th>
                                                            <td><?=$tgl_po?></td>
                                                            <td>
                                                              <span
                                                                style="cursor: pointer;"
                                                                class="badge badge-primary"
                                                                data-toggle="modal"
                                                                data-target="#detail" 
                                                                data-id_mkt_po_customer="<?=$k['id_mkt_po_customer']?>"
                                                                data-no_po="<?=$k['no_po_customer']?>"
                                                                data-tgl_po="<?=$tgl_po?>"
                                                                data-id_customer="<?=$k['id_customer']?>"
                                                                data-nama_customer="<?=$k['nama_customer']?>"
                                                                data-id_barang="<?=$k['id_barang']?>"
                                                                data-nama_barang="<?=$k['nama_barang']?>"
                                                                data-mesh="<?=$k['mesh']?>"
                                                                data-bloom="<?=$k['bloom']?>"
                                                                data-jumlah_po="<?=$k['jumlah_po_customer']?>"
                                                                data-harga_po="<?=$k['harga_po_customer']?>"
                                                                data-keterangan="<?=$k['keterangan_po_customer']?>"
                                                                data-jenis_pembayaran="<?=$k['jenis_pembayaran_customer']?>"
                                                                data-invoice="<?= $k['invoice']?>"
                                                                data-mkt_admin="<?=$k['mkt_admin']?>">
                                                                <?= $k['no_po_customer'] ?>
                                                              </span>
                                                            </td>
                                                            <td><?=$k['nama_customer']?></td>
                                                            <td><?=$k['nama_barang']?></td>
                                                            <td class="text-right"><?=number_format($k['jumlah_po_customer'],0,",",".")?> <?=$k['satuan']?></td>
                                                            <td class="text-right"><?=number_format($k['harga_po_customer'],0,",",".")?> <?=$k['satuan']?></td>
                                                            <!-- <td class="text-right"><?=number_format($k['sisa'],0,",",".")?> <?=$k['satuan']?></td> -->
                                                            <td>
                                                              <span class="badge badge-primary">
                                                                <?=$k['invoice']?>
                                                              </span>
                                                            </td>
                                                            <td class="text-center">
                                                              <div class="btn-group <?=$ds?>" role="group" aria-label="Basic example">
                                                              <?php if ( $k['invoice'] == 'Belum') { ?>
                                                                 <button type="button" 
                                                                  class="btn btn-success btn-square btn-sm" 
                                                                  data-toggle="modal" 
                                                                  data-target="#kirim" 

                                                                  data-id_mkt_po_customer="<?=$k['id_mkt_po_customer']?>"
                                                                  data-no_po="<?=$k['no_po_customer']?>"
                                                                  data-tgl_po="<?=$tgl_po?>"
                                                                  
                                                                  data-id_customer="<?=$k['id_customer']?>"
                                                                  data-nama_customer="<?=$k['nama_customer']?>"
                                                                  data-id_barang="<?=$k['id_barang']?>"
                                                                  data-nama_barang="<?=$k['nama_barang']?>"
                                                                  data-mesh="<?=$k['mesh']?>"
                                                                  data-bloom="<?=$k['bloom']?>"
                                                                  data-jumlah_po="<?=$k['jumlah_po_customer']?>"
                                                                  data-harga_po="<?=$k['harga_po_customer']?>"
                                                                  data-keterangan="<?=$k['keterangan_po_customer']?>"
                                                                  data-jenis_pembayaran="<?=$k['jenis_pembayaran_customer']?>"
                                                                  data-invoice="<?= $k['invoice']?>"
                                                                  data-mkt_admin="<?=$k['mkt_admin']?>"
                                                                >
                                                                  <i class="feather icon-package"></i>Buat Invoice
                                                                </button>
                                                              </div>
                                                              <?php } ?>
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
                                <!-- [ basic-table ] end -->

                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
  $(document).ready(function() {
    $('#lihat').click(function () {

      var filter_barang = $('#filter_barang').find(':selected').val();
      var filter_customer = $('#filter_customer').find(':selected').val();
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();

      var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
      var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];
      
      if (filter_tgl =='' && filter_tgl2 !='') {
        window.location = "<?=base_url()?>accouting/order?alert=warning&msg=dari tanggal belum diisi";
      }else if (filter_tgl !='' && filter_tgl2=='') {
        window.location = "<?=base_url()?>accounting/order?alert=warning&msg=sampai tanggal belum diisi";
      }else{
        const query = new URLSearchParams({
                    nama_customer: filter_customer,
                    nama_barang: filter_barang,
                    date_from: filter_tgl,
                    date_until: filter_tgl2
                })

        window.location = "<?=base_url() ?>accounting/order?"+ query.toString()
        
      }
    })
    $('#export').click(function () {
      
      var filter_barang = $('#filter_barang').find(':selected').val();
      var filter_customer = $('#filter_customer').find(':selected').val();
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();

      var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
      var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];

      if (filter_tgl == '' && filter_tgl2 != '') {
        window.location = "<?= base_url() ?>marketing/po_customer?alert=warning&msg=dari tanggal belum diisi";
        alert("dari tanggal belum diisi")
      } else if (filter_tgl != '' && filter_tgl2 == '') {
        window.location = "<?= base_url() ?>marketing/po_customer?alert=warning&msg=sampai tanggal belum diisi";
      } else {
        const query = new URLSearchParams({
                nama_customer: filter_customer,
                nama_barang: filter_barang,
                date_from: filter_tgl,
                date_until: filter_tgl2
        })
        var url = "<?= base_url() ?>marketing/po_customer/pdf_po_customer?" + query.toString();
        window.open(url, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    })
  })
</script>


 <!-- Modal DETAIL-->
 <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail PO Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="row">
  
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlInput1">No PO</label>
                  <input type="text" class="form-control" id="v-no_po" name="no_po" placeholder="No PO" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" readonly>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      Maaf No PO sudah ada.
                    </div>
              </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="tgl_po">Tanggal PO</label>
                        <input type="text" class="form-control datepicker" id="v-tgl_po" name="tgl_po"  placeholder="Tanggal PO" autocomplete="off" readonly>
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="id_customer">Nama Customer</label>
                  <input type="text" class="form-control" id="v-id_customer" name="id_customer" autocomplete="off" readonly>
              </div>
            </div>
  
            <div class="col-md-6">
              <div class="form-group">
                <label for="id_barang">Nama Barang</label>
                  <input type="text" class="form-control" id="v-id_barang" name="id_barang" autocomplete="off" readonly>
              </div>
            </div>
  
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Mesh</label>
                  <input class="form-control" id="v-mesh" name="mesh" placeholder="Mesh" autocomplete="off" readonly>
              </div>
            </div>
        
            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Bloom</label>
                      <input type="text" class="form-control" id="v-bloom" name="bloom" placeholder="Bloom"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah(kg)</label>
                      <input type="text" class="form-control" id="v-jumlah_po" name="jumlah_po" placeholder="Jumlah(Kg)" autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Harga(Rp/Kg)</label>
                      <input type="text" class="form-control" id="v-harga_po" name="harga_po" placeholder="Harga(Rp/Kg)" autocomplete="off" readonly>
                  </div>
            </div>
  
            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Jenis Pembayaran</label>
                      <input type="text" class="form-control" id="v-jenis_pembayaran" name="jenis_pembayaran" autocomplete="off" readonly>
                  </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlInput1">Status</label>
                <input type="text" class="form-control" id="v-status" name="status" autocomplete="off" readonly>
              </div>
            </div>
            
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="note_gudang">Keterangan Po</label>
                                    <textarea class="form-control" id="v-keterangan" name="keterangan" rows="3" placeholder="Keterangan po" autocomplete="off" readonly></textarea>
                            </div>
                        </div>
            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Marketing Admin</label>
                      <input type="text" class="form-control" id="v-mkt_admin" name="mkt_admin" autocomplete="off" readonly>
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

  var id_mkt_po_customer = $(event.relatedTarget).data('id_mkt_po_customer') 
  var no_po = $(event.relatedTarget).data('no_po')
  var tgl_po = $(event.relatedTarget).data('tgl_po')
  var id_customer = $(event.relatedTarget).data('nama_customer') 
  var id_barang = $(event.relatedTarget).data('nama_barang')
  var mesh = $(event.relatedTarget).data('mesh') 
  var bloom = $(event.relatedTarget).data('bloom') 
  var jumlah_po = $(event.relatedTarget).data('jumlah_po') 
  var harga_po = $(event.relatedTarget).data('harga_po') 
  var keterangan = $(event.relatedTarget).data('keterangan')
  var jenis_pembayaran = $(event.relatedTarget).data('jenis_pembayaran')
  var invoice = $(event.relatedTarget).data('invoice')
  var mkt_admin = $(event.relatedTarget).data('mkt_admin') 

  $(this).find('#v-mkt_po_customer').val(id_mkt_po_customer)
  $(this).find('#v-no_po').val(no_po)
  $(this).find('#v-tgl_po').val(tgl_po)
  $(this).find('#v-id_customer').val(id_customer)
  $(this).find('#v-id_customer').trigger("chosen:updated");
  $(this).find('#v-id_barang').val(id_barang)
  $(this).find('#v-id_barang').trigger("chosen:updated");
  $(this).find('#v-mesh').val(mesh)
  $(this).find('#v-bloom').val(bloom)
  $(this).find('#v-jumlah_po').val(formatRupiah(jumlah_po.toString()))
  $(this).find('#v-harga_po').val(formatRupiah(harga_po.toString()))
  $(this).find('#v-keterangan').val(keterangan)
  $(this).find('#v-jenis_pembayaran').val(jenis_pembayaran)
  $(this).find('#v-jenis_pembayaran').trigger("chosen:updated");
  $(this).find('#v-status').val(invoice)
  $(this).find('#v-mkt_admin').val(mkt_admin)


  $(this).find('#v-tgl_po').datepicker().on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();
  });
})

})

</script>

    <!-- Modal Add Invoice-->
    <div class="modal fade" id="kirim" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Proses Kirim</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>accounting/order/add">
      <div class="modal-body">
      <input type="hidden" id="k-id_mkt_po_customer" name="id_mkt_po_customer">
        
      <center><label for="pemeriksaan" class="font-weight-bold">Keterangan Barang</label></center>

        <div class="row">
     <div class="col-md-3">
              <div class="form-group">
                <label for="exampleFormControlInput1">No PO</label>
                  <input type="text" class="form-control" id="k-no_po" name="no_po" placeholder="No PO" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" readonly>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      Maaf No PO sudah ada.
                    </div>
              </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="tgl_po">Tanggal PO</label>
                        <input type="text" class="form-control datepicker" id="k-tgl_po" name="tgl_po"  placeholder="Tanggal PO" autocomplete="off" readonly>
                </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="id_customer">Nama Customer</label>
                  <input type="text" class="form-control" id="k-id_customer" name="id_customer" autocomplete="off" readonly>
              </div>
            </div>
  
            <div class="col-md-3">
              <div class="form-group">
                <label for="id_barang">Nama Barang</label>
                  <input type="text" class="form-control" id="k-id_barang" name="id_barang" autocomplete="off" readonly>
              </div>
            </div>
  
            <div class="col-md-3">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Mesh</label>
                  <input class="form-control" id="k-mesh" name="mesh" placeholder="Mesh" autocomplete="off" readonly>
              </div>
            </div>
        
            <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Bloom</label>
                      <input type="text" class="form-control" id="k-bloom" name="bloom" placeholder="Bloom"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah(kg)</label>
                      <input type="text" class="form-control" id="k-jumlah_po" name="jumlah_po" placeholder="Jumlah(Kg)" autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Harga(Rp/Kg)</label>
                      <input type="text" class="form-control" id="k-harga_po" name="harga_po" placeholder="Harga(Rp/Kg)" autocomplete="off" readonly>
                  </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Jenis Pembayaran</label>
                      <input type="text" class="form-control" id="k-jenis_pembayaran" name="jenis_pembayaran" placeholder="Jenis Pembayaran" autocomplete="off" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Status</label>
                      <input type="text" class="form-control" id="k-invoice" name="status" placeholder="Status Invoice" autocomplete="off" readonly>
                </div>
            </div>
            <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Marketing Admin</label>
                      <input type="text" class="form-control" id="k-mkt_admin" name="mkt_admin" value="<?=$this->session->userdata('nama')?>"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="note_gudang">Keterangan Po</label>
                          <textarea class="form-control" id="k-keterangan" name="keterangan" rows="3" placeholder="Keterangan po" autocomplete="off" readonly></textarea>
                </div>
            </div>
            
          </div>
          <center><label for="pemeriksaan" class="font-weight-bold">Proses</label></center>
          <div class="row">
            
          <div class="col-md-3">
                <div class="form-group">
                  <label for="exampleFormControlInput1">No inovoice</label>
                    <input type="text" class="form-control" id="k-no_invoice" name="no_invoice" placeholder="No Invoice" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                     <div id="validationServer03Feedback" class="invalid-feedback">
                      Maaf No Invoice sudah ada
                    </div>
                </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="exampleFormControlInput1">Tanggal Invoice</label>
              <input type="text" class="form-control datepicker" id="k-tanggal_invoice" name="tgl_invoice" placeholder="Tanggal Invoice"  autocomplete="off" required>
            </div>
          </div>
          
          <div class="col-md-3">
                <div class="form-group">
                  <label for="exampleFormControlInput1">OPerator Acc</label>
                    <input type="text" class="form-control" id="k-op_acc" name="op_acc" value="<?=$this->session->userdata('nama')?>"  autocomplete="off" readonly>
                </div>
          </div>

        </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="simpan" class="btn btn-primary"
        onclick = "if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#kirim').on('show.bs.modal', function (event) {

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

  var id_mkt_po_customer = $(event.relatedTarget).data('id_mkt_po_customer') 
  var no_po = $(event.relatedTarget).data('no_po')
  var tgl_po = $(event.relatedTarget).data('tgl_po')
  var id_customer = $(event.relatedTarget).data('nama_customer') 
  var id_barang = $(event.relatedTarget).data('nama_barang')
  var mesh = $(event.relatedTarget).data('mesh') 
  var bloom = $(event.relatedTarget).data('bloom') 
  var jumlah_po = $(event.relatedTarget).data('jumlah_po') 
  var harga_po = $(event.relatedTarget).data('harga_po') 
  var keterangan = $(event.relatedTarget).data('keterangan')
  var jenis_pembayaran = $(event.relatedTarget).data('jenis_pembayaran')
  var invoice = $(event.relatedTarget).data('invoice')
  var mkt_admin = $(event.relatedTarget).data('mkt_admin') 

  $(this).find('#k-id_mkt_po_customer').val(id_mkt_po_customer)
  $(this).find('#k-no_po').val(no_po)
  $(this).find('#k-tgl_po').val(tgl_po)
  $(this).find('#k-id_customer').val(id_customer)
  $(this).find('#k-id_barang').val(id_barang)
  $(this).find('#k-mesh').val(mesh)
  $(this).find('#k-bloom').val(bloom)
  $(this).find('#k-jumlah_po').val(formatRupiah(jumlah_po.toString()))
  $(this).find('#k-harga_po').val(formatRupiah(harga_po.toString()))
  $(this).find('#k-keterangan').val(keterangan)
  $(this).find('#k-jenis_pembayaran').val(jenis_pembayaran)
  $(this).find('#k-invoice').val(invoice)
  $(this).find('#k-mkt_admin').val(mkt_admin)


  $(this).find('#k-tgl_po').datepicker().on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();
  });

  $("#k-no_invoice").keyup(function(){
      var no_invoice =  $("#k-no_invoice").val();
      jQuery.ajax({
        url: "<?=base_url()?>accounting/invoice/cek_no_invoice",
        dataType:'text',
        type: "post",
        data:{no_invoice:no_invoice},
        success:function(response){
          if (response =="true") {
            $("#k-no_invoice").addClass("is-invalid");
            $("#simpan").attr("disabled","disabled");
          }else{
            $("#k-no_invoice").removeClass("is-invalid");
            $("#simpan").removeAttr("disabled");
          }
        }            
      });
    })

    $("select").on('change', function() {
      const selected = $(this).find(':selected').attr('data-mesh')
      mesh = selected.replaceAll(' ', '')
      $('#k-mesh').val(mesh)
    });

    $("select").on('change', function() {
      const selected = $(this).find(':selected').attr('data-bloom')
      bloom = selected.replaceAll(' ', '')
      $('#k-bloom').val(bloom)
    });
$(this).find('#k-tanggal_invoice').datepicker().on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();
  });
})

})

</script>