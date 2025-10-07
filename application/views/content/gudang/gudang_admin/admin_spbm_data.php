

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
                                            <h5>Data Surat Persetujuan Barang Masuk</h5>

                                            <!-- <div class="float-right">
                                              <div class="input-group">
                                              <select class="form-control chosen-select" id="filter_supplier" name="filter_supplier">
                                                  <option value="" disabled selected hidden>- Nama supplier -</option>
                                                    <?php
                                                      foreach ($res_supplier as $rc) { ?>
                                                        <option <?= $nama_supplier === $rc['nama_supplier'] ? 'selected' : '' ?> value="<?= $rc['nama_supplier'] ?>"><?= $rc['nama_supplier'] ?></option>
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
                                                            <a href="<?=base_url()?>purchasing/po_pembelian" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
                                                        </div>
                                                    </div>
                                              </div> -->
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
                                                            <th>supplier</th>
                                                            <th>Nama Barang</th>
                                                            <th>Jumlah PO</th>
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
                                                        $tgl_po_pembelian =  explode('-', $k['tgl_po_pembelian'])[2]."/".explode('-', $k['tgl_po_pembelian'])[1]."/".explode('-', $k['tgl_po_pembelian'])[0];
                                                    	?>
                                                    	<tr>
                                                            <th scope="row"><?=$no++?></th>
                                                            <td><?=$tgl_po_pembelian?></td>
                                                            <td><?=$k['no_po_pembelian']?></td>
                                                            <td><?=$k['nama_supplier']?></td>
                                                            <td><?=$k['nama_barang']?></td>
                                                            <td class="text-left"><?=number_format($k['jumlah_po_pembelian'],0,",",".")?> <?=$k['satuan']?></td>
                                                            <td><?=$k['status_po_pembelian']?></td>
                                                            <td class="text-center">
                                                              <div class="btn-group" role="group" aria-label="Basic example">
                                                                <button type="button" 
                                                                  class="btn btn-info btn-square btn-sm" 
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
                                                                  data-jumlah_po_pembelian="<?=number_format($k['jumlah_po_pembelian'],0,",",".")?>"
                                                                  data-harga_po_pembelian="<?=number_format($k['harga_po_pembelian'],0,",",".")?>"
                                                                  data-jenis_pembayaran="<?=$k['jenis_pembayaran']?>"
                                                                  data-prc_admin="<?=$k['prc_admin']?>"
                                                                >
                                                                  <i class="feather icon-eye"></i>Detail
                                                                </button>
                                                              </div>
                                                            </td>
                                                            <td class="text-center">
                                                              <div class="btn-group" role="group" aria-label="Basic example">
                                                              <?php if ($level === "0") { ?>
                                                                <button type="button" 
                                                                  class="btn btn-warning btn-square btn-sm text-light" 
                                                                  data-toggle="modal" 
                                                                  data-target="#proses" 

                                                                  data-id_prc_po_pembelian="<?=$k['id_prc_po_pembelian']?>"
                                                                  data-no_po_pembelian="<?=$k['no_po_pembelian']?>"
                                                                  data-tgl_po_pembelian="<?=$tgl_po_pembelian?>"
                                                                  
                                                                  data-id_supplier="<?=$k['id_supplier']?>"
                                                                  data-nama_supplier="<?=$k['nama_supplier']?>"
                                                                  data-id_barang="<?=$k['id_barang']?>"
                                                                  data-nama_barang="<?=$k['nama_barang']?>"
                                                                  data-mesh="<?=$k['mesh']?>"
                                                                  data-bloom="<?=$k['bloom']?>"
                                                                  data-jumlah_po_pembelian="<?=number_format($k['jumlah_po_pembelian'],0,",",".")?>"
                                                                  data-harga_po_pembelian="<?=number_format($k['harga_po_pembelian'],0,",",".")?>"
                                                                  data-jenis_pembayaran="<?=$k['jenis_pembayaran']?>"
                                                                  data-prc_admin="<?=$k['prc_admin']?>"
                                                                  data-kode_tf_in="<?=$k['kode_tf_in']?>"
                                                                >
                                                                  <i class="feather icon-edit-2"></i>Proses
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
      var filter_supplier = $('#filter_supplier').find(':selected').val();
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();

      var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
      var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];
      
      if (filter_tgl =='' && filter_tgl2 !='') {
        window.location = "<?=base_url()?>purchasing/po_pembelian?alert=warning&msg=dari tanggal belum diisi";
      }else if (filter_tgl !='' && filter_tgl2=='') {
        window.location = "<?=base_url()?>purchasing/po_pembelian?alert=warning&msg=sampai tanggal belum diisi";
      }else{
        const query = new URLSearchParams({
                    nama_supplier: filter_supplier,
                    nama_barang: filter_barang,
                    date_from: filter_tgl,
                    date_until: filter_tgl2
                })

        window.location = "<?=base_url() ?>purchasing/po_pembelian/index?"+ query.toString()
        
      }
    })
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
    })
  })
</script>

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

        <!-- Hidden ID -->
        <input type="hidden" id="v-prc_po_pembelian" name="id_prc_po_pembelian">

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>No PO Pembelian</label>
              <input type="text" class="form-control" id="v-no_po_pembelian" readonly>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Tanggal PO Pembelian</label>
              <input type="text" class="form-control" id="v-tgl_po_pembelian" readonly>
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
              <input type="text" class="form-control" id="v-jumlah_po_pembelian" readonly>
            </div>
          </div>

          <!-- <div class="col-md-6">
            <div class="form-group">
              <label>Harga (Rp/Kg)</label>
              <input type="text" class="form-control" id="v-harga_po_pembelian" readonly>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Jenis Pembayaran</label>
              <input type="text" class="form-control" id="v-jenis_pembayaran" readonly>
            </div>
          </div> -->

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

<script type="text/javascript">
$(document).ready(function() {
  $('#detail').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // tombol pemicu modal

    var id_prc_po_pembelian = button.data('id_prc_po_pembelian');
    var no_po_pembelian     = button.data('no_po_pembelian');
    var tgl_po_pembelian    = button.data('tgl_po_pembelian');
    var nama_supplier       = button.data('nama_supplier');
    var id_barang           = button.data('nama_barang');
    var mesh                = button.data('mesh');
    var bloom               = button.data('bloom');
    var jumlah_po_pembelian = button.data('jumlah_po_pembelian');
    var harga_po_pembelian  = button.data('harga_po_pembelian');
    var jenis_pembayaran    = button.data('jenis_pembayaran');
    var prc_admin           = button.data('prc_admin');

    // Set value ke input
    $('#v-prc_po_pembelian').val(id_prc_po_pembelian);
    $('#v-no_po_pembelian').val(no_po_pembelian);
    $('#v-tgl_po_pembelian').val(tgl_po_pembelian);
    $('#v-nama_supplier').val(nama_supplier);
    $('#v-id_barang').val(id_barang);
    $('#v-mesh').val(mesh);
    $('#v-bloom').val(bloom);
    $('#v-jumlah_po_pembelian').val(jumlah_po_pembelian);
    $('#v-harga_po_pembelian').val(harga_po_pembelian);
    $('#v-jenis_pembayaran').val(jenis_pembayaran);
    $('#v-prc_admin').val(prc_admin);
  });
});
</script>

    <!-- Modal EDIT-->
<div class="modal fade" id="proses" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit PO Pembelian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>gudang/gudang_admin/admin_spbm/proses">
      <div class="modal-body">
      <input type="hidden" id="p-id_prc_po_pembelian" name="id_prc_po_pembelian">
      <input type="hidden" id="p-kode_tf_in_2" name="kode_tf_in_2">
        

      <center><label for="pemeriksaan" class="font-weight-bold">Keterangan Barang</label></center>
          <div class="row">
            <!-- ambil data kode tf in -->
              <!-- <input type="text" class="form-control" id="p-kode_tf_in" onkeyup="this.value = this.value.toUpperCase()" readonly hidden> -->
            <div class="col-md-3">
              <div class="form-group">
                <label for="exampleFormControlInput1">No PO Pembelian</label>
                  <input type="text" class="form-control" id="p-no_po_pembelian" name="no_po_pembelian" placeholder="No PO Pembelian" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" readonly>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Tanggal PO</label>
                  <input class="form-control" id="p-tgl_po_pembelian" name="tgl_po_pembelian" placeholder="Tanggal PO"  readonly>
              </div>
            </div>
  
            <div class="col-md-2">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Barang</label>
                  <input class="form-control" id="p-nama_barang" name="id_barang" placeholder="Nama Barang" readonly>
              </div>
            </div>
  
            <div class="col-md-2">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Mesh</label>
                  <input class="form-control" id="p-mesh" name="mesh" placeholder="Mesh"  readonly>
              </div>
            </div>
        
            <div class="col-md-2">
              <div class="form-group">
                <label for="exampleFormControlInput1">Bloom</label>
                  <input type="text" class="form-control" id="p-bloom" name="bloom" placeholder="Bloom" readonly>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="nama_supplier">Supplier</label>
                  <input type="text" class="form-control" id="p-nama_supplier" name="nama_supplier" placeholder="Nama Supplier"  autocomplete="off" readonly>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="exampleFormControlInput1">Jumlah(kg)</label>
                  <input type="text" class="form-control" id="p-jumlah_po_pembelian" name="jumlah_po_pembelian" placeholder="Jumlah(Kg)" onkeypress="return hanyaAngka(event)" maxlength="15" autocomplete="off" readonly>
              </div>
            </div>

            <!-- <div class="col-md-3">
              <div class="form-group">
                <label for="exampleFormControlInput1">Harga(Rp/kg)</label>
                  <input type="text" class="form-control" id="p-harga_po_pembelian" name="harga_po_pembelian" placeholder="Harga(Rp/Kg)" onkeypress="return hanyaAngka(event)" maxlength="15" autocomplete="off" readonly>
              </div>
            </div> -->
          
            <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Purchasing Admin</label>
                      <input type="text" class="form-control" id="p-prc_admin" name="prc_admin" value="<?=$this->session->userdata('nama')?>"  autocomplete="off" readonly>
                  </div>
            </div>
          </div>
        
      <center><label for="pemeriksaan" class="font-weight-bold">Administrasi</label></center>
          <div class="row">

            <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Kode Transfer IN</label>
                      <input type="text" class="form-control" id="p-kode_tf_in" name="kode_tf_in"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Tanggal Masuk Gudang</label>
                      <input type="text" class="form-control datepicker" id="tgl_msk_gdg" name="tgl_msk_gdg" placeholder="Tanggal Masuk Gudang" autocomplete="off" required>
                  </div>
            </div>

            <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">No Batch</label>
                      <input type="text" class="form-control" id="no_batch" name="no_batch" placeholder="No Batch" autocomplete="off" required>
                  </div>
            </div>

            <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah (Kg)</label>
                      <input type="text" class="form-control" id="gdg_qty_in" name="gdg_qty_in" placeholder="Jumlah" autocomplete="off" required>
                  </div>
            </div>

            <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Tanggal Expired</label>
                      <input type="text" class="form-control datepicker" id="tgl_exp" name="tgl_exp" placeholder="Tanggal Expired" autocomplete="off" required>
                  </div>
            </div>

            <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Tanggal Bayar PIB</label>
                      <input type="text" class="form-control datepicker" id="tgl_bayar_pib" name="tgl_bayar_pib" placeholder="Tanggal Bayar PIB" autocomplete="off" required>
                  </div>
            </div>

            <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">No BL</label>
                      <input type="text" class="form-control" id="no_bl" name="no_bl" placeholder="No BL" autocomplete="off" required>
                  </div>
            </div>

            <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Keterangan</label>
                      <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" autocomplete="off">
                  </div>
            </div>

            <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Gudang Admin</label>
                      <input type="text" class="form-control" id="gdg_admin" name="gdg_admin" placeholder="Gudang Admin" value="<?=$this->session->userdata('nama')?>" autocomplete="off" readonly>
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
    $('#proses').on('show.bs.modal', function (event) {
  var id_prc_po_pembelian = $(event.relatedTarget).data('id_prc_po_pembelian') 
  var no_po_pembelian = $(event.relatedTarget).data('no_po_pembelian')
  var tgl_po_pembelian = $(event.relatedTarget).data('tgl_po_pembelian')
  var nama_supplier = $(event.relatedTarget).data('nama_supplier') 
  var id_barang = $(event.relatedTarget).data('id_barang')
  var nama_barang = $(event.relatedTarget).data('nama_barang')
  var mesh = $(event.relatedTarget).data('mesh') 
  var bloom = $(event.relatedTarget).data('bloom') 
  var jumlah_po_pembelian = $(event.relatedTarget).data('jumlah_po_pembelian')
  var harga_po_pembelian = $(event.relatedTarget).data('harga_po_pembelian') 
  var prc_admin = $(event.relatedTarget).data('prc_admin') 
  var kode_tf_in = $(event.relatedTarget).data('kode_tf_in') 
  var kode_tf_in_2 = $(event.relatedTarget).data('kode_tf_in') 

  $(this).find('#p-id_prc_po_pembelian').val(id_prc_po_pembelian)
  $(this).find('#p-no_po_pembelian').val(no_po_pembelian)
  $(this).find('#p-tgl_po_pembelian').val(tgl_po_pembelian)
  $(this).find('#p-nama_supplier').val(nama_supplier)
  $(this).find('#p-id_barang').val(id_barang)
  $(this).find('#p-nama_barang').val(nama_barang)
  $(this).find('#p-mesh').val(mesh)
  $(this).find('#p-bloom').val(bloom)
  $(this).find('#p-jumlah_po_pembelian').val(jumlah_po_pembelian)
  $(this).find('#p-harga_po_pembelian').val(harga_po_pembelian)
  $(this).find('#p-prc_admin').val(prc_admin)
  $(this).find('#p-kode_tf_in').val(kode_tf_in)
  $(this).find('#p-kode_tf_in_2').val(kode_tf_in_2)

      document.getElementById('p-jumlah_po_pembelian').addEventListener('keyup', function(e) {
      let value = this.value.replace(/\D/g,'');
      value = new Intl.NumberFormat('id-ID').format(value);
      this.value = value;
    });

    //   document.getElementById('p-harga_po_pembelian').addEventListener('keyup', function(e) {
    //   let value = this.value.replace(/\D/g,'');
    //   value = new Intl.NumberFormat('id-ID').format(value);
    //   this.value = value;
    // });

        document.getElementById('gdg_qty_in').addEventListener('keyup', function(e) {
    let value = this.value.replace(/\D/g,'');
    value = new Intl.NumberFormat('id-ID').format(value);
    this.value = value;
    });

      $(this).find('#tgl_msk_gdg').datepicker().on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();
  });

        $(this).find('#tgl_exp').datepicker().on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();
  });

          $(this).find('#tgl_bayar_pib').datepicker().on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();
  });

})

})

</script>