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
                                        <li class="breadcrumb-item"><a href="javascript:">Invoice</a></li>
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
                                            <h5>Data Invoice</h5>

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
                                                            <a href="<?=base_url()?>marketing/po_customer" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
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
                                                            <!-- <th>Outstanding</th> -->
                                                            <th>Status</th>
                                                            <th>Detail</th>
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
                                                            <td><?=$k['no_po_customer']?></td>
                                                            <td><?=$k['nama_customer']?></td>
                                                            <td><?=$k['nama_barang']?></td>
                                                            <td class="text-right"><?=number_format($k['jumlah_po_customer'],0,",",".")?> <?=$k['satuan']?></td>
                                                            <td class="text-right"><?=number_format($k['harga_po_customer'],0,",",".")?> <?=$k['satuan']?></td>
                                                            <!-- <td class="text-right"><?=number_format($k['sisa'],0,",",".")?> <?=$k['satuan']?></td> -->
                                                            <td><?=$k['status_invoice']?></td>
                                                            <td class="text-center">
                                                              <div class="btn-group " role="group" aria-label="Basic example">
                                                                <button type="button" 
                                                                  class="btn btn-info btn-square btn-sm" 
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
                                                                  data-jenis_pembayaran="<?=$k['jenis_pembayaran_customer']?>"
                                                                  data-status_invoice="<?= $k['status_invoice']?>"
                                                                  data-mkt_admin="<?=$k['mkt_admin']?>"
                                                                >
                                                                  <i class="feather icon-eye"></i>Detail
                                                                </button>
                                                              </div>
                                                            </td>
                                                            <td class="text-center">
                                                              <div class="btn-group <?=$ds?>" role="group" aria-label="Basic example">
                                                              <?php if ($level === "0" && !$k['is_invoice_exist']) { ?>
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
                                                                  data-jenis_pembayaran="<?=$k['jenis_pembayaran_customer']?>"
                                                                  data-status_invoice="<?= $k['status_invoice']?>"
                                                                  data-mkt_admin="<?=$k['mkt_admin']?>"
                                                                >
                                                                  <i class="feather icon-package"></i>Kirim
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
        window.location = "<?=base_url()?>marketing/po_customer?alert=warning&msg=dari tanggal belum diisi";
      }else if (filter_tgl !='' && filter_tgl2=='') {
        window.location = "<?=base_url()?>marketing/po_customer?alert=warning&msg=sampai tanggal belum diisi";
      }else{
        const query = new URLSearchParams({
                    nama_customer: filter_customer,
                    nama_barang: filter_barang,
                    date_from: filter_tgl,
                    date_until: filter_tgl2
                })

        window.location = "<?=base_url() ?>accounting/invoice?"+ query.toString()
        
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
                      <input type="number" class="form-control" id="v-jumlah_po" name="jumlah_po" placeholder="Jumlah(Kg)" autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Harga(Rp/Kg)</label>
                      <input type="number" class="form-control" id="v-harga_po" name="harga_po" placeholder="Harga(Rp/Kg)" autocomplete="off" readonly>
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
  var id_mkt_po_customer = $(event.relatedTarget).data('id_mkt_po_customer') 
  var no_po = $(event.relatedTarget).data('no_po')
  var tgl_po = $(event.relatedTarget).data('tgl_po')
  var id_customer = $(event.relatedTarget).data('nama_customer') 
  var id_barang = $(event.relatedTarget).data('nama_barang')
  var mesh = $(event.relatedTarget).data('mesh') 
  var bloom = $(event.relatedTarget).data('bloom') 
  var jumlah_po = $(event.relatedTarget).data('jumlah_po') 
  var harga_po = $(event.relatedTarget).data('harga_po') 
  var jenis_pembayaran = $(event.relatedTarget).data('jenis_pembayaran')
  var status_invoice = $(event.relatedTarget).data('status_invoice')
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
  $(this).find('#v-jumlah_po').val(jumlah_po)
  $(this).find('#v-harga_po').val(harga_po)
  $(this).find('#v-jenis_pembayaran').val(jenis_pembayaran)
  $(this).find('#v-jenis_pembayaran').trigger("chosen:updated");
  $(this).find('#v-status').val(status_invoice)
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
                      <input type="number" class="form-control" id="k-jumlah_po" name="jumlah_po" placeholder="Jumlah(Kg)" autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Harga(Rp/Kg)</label>
                      <input type="number" class="form-control" id="k-harga_po" name="harga_po" placeholder="Harga(Rp/Kg)" autocomplete="off" readonly>
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
                      <input type="text" class="form-control" id="k-status_invoice" name="status" placeholder="Status Invoice" autocomplete="off" readonly>
                </div>
            </div>
            <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Marketing Admin</label>
                      <input type="text" class="form-control" id="k-mkt_admin" name="mkt_admin" value="<?=$this->session->userdata('nama')?>"  autocomplete="off" readonly>
                  </div>
            </div>
            
          </div>
          <center><label for="pemeriksaan" class="font-weight-bold">Proses</label></center>
          <div class="row">
            
          <div class="col-md-3">
                <div class="form-group">
                  <label for="exampleFormControlInput1">No inovoice</label>
                    <input type="text" class="form-control" id="k-no_invoice" name="no_invoice" placeholder="No Invoice"  autocomplete="off" required>
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
  var id_mkt_po_customer = $(event.relatedTarget).data('id_mkt_po_customer') 
  var no_po = $(event.relatedTarget).data('no_po')
  var tgl_po = $(event.relatedTarget).data('tgl_po')
  var id_customer = $(event.relatedTarget).data('nama_customer') 
  var id_barang = $(event.relatedTarget).data('nama_barang')
  var mesh = $(event.relatedTarget).data('mesh') 
  var bloom = $(event.relatedTarget).data('bloom') 
  var jumlah_po = $(event.relatedTarget).data('jumlah_po') 
  var harga_po = $(event.relatedTarget).data('harga_po') 
  var jenis_pembayaran = $(event.relatedTarget).data('jenis_pembayaran')
  var status_invoice = $(event.relatedTarget).data('status_invoice')
  var mkt_admin = $(event.relatedTarget).data('mkt_admin') 

  $(this).find('#k-id_mkt_po_customer').val(id_mkt_po_customer)
  $(this).find('#k-no_po').val(no_po)
  $(this).find('#k-tgl_po').val(tgl_po)
  $(this).find('#k-id_customer').val(id_customer)
  $(this).find('#k-id_barang').val(id_barang)
  $(this).find('#k-mesh').val(mesh)
  $(this).find('#k-bloom').val(bloom)
  $(this).find('#k-jumlah_po').val(jumlah_po)
  $(this).find('#k-harga_po').val(harga_po)
  $(this).find('#k-jenis_pembayaran').val(jenis_pembayaran)
  $(this).find('#k-status_invoice').val(status_invoice)
  $(this).find('#k-mkt_admin').val(mkt_admin)


  $(this).find('#k-tgl_po').datepicker().on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();
  });

  $("#k-no_po").keyup(function(){
      var no_po =  $("#k-no_po").val();
      jQuery.ajax({
        url: "<?=base_url()?>marketing/po_customer/cek_no_po",
        dataType:'text',
        type: "post",
        data:{no_po:no_po},
        success:function(response){
          if (response =="true") {
            $("#k-no_po").addClass("is-invalid");
            $("#simpan").attr("disabled","disabled");
          }else{
            $("#k-no_po").removeClass("is-invalid");
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