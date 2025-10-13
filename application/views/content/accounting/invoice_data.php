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
                                                            <th>Tgl Invoice</th>
                                                            <th>No Invoice</th>
                                                            <th>Customer</th>
                                                            <th>Nama Barang</th>
                                                            <th>Jumlah PO</th>
                                                            <th>Harga PO</th>
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
                                                      $tgl_invoice =  explode('-', $k['tgl_invoice'])[2]."/".explode('-', $k['tgl_invoice'])[1]."/".explode('-', $k['tgl_invoice'])[0];
                                                      ?>

                                                    	<tr>
                                                            <th scope="row"><?=$no++?></th>
                                                            <td><?=$tgl_invoice?></td>
                                                            <td><?=$k['no_invoice']?></td>
                                                            <td><?=$k['nama_customer']?></td>
                                                            <td><?=$k['nama_barang']?></td>
                                                            <td class="text-right"><?=number_format($k['jumlah_po_customer'],0,",",".")?> <?=$k['satuan']?></td>
                                                            <td class="text-right">Rp. <?=number_format($k['harga_po_customer'],0,",",".")?></td>
                                                            <td><?=$k['status_invoice']?></td>
                                                            <td class="text-center">
                                                              <div class="btn-group " role="group" aria-label="Basic example">
                                                                <button type="button" 
                                                                  class="btn btn-info btn-square btn-sm" 
                                                                  data-toggle="modal" 
                                                                  data-target="#detail" 

                                                                  data-id_mkt_po_customer="<?=$k['id_mkt_po_customer']?>"
                                                                  data-no_po="<?=$k['no_po_customer']?>"
                                                                  data-tgl_po="<?=$tgl_invoice?>"
                                                                  
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
                                                                  data-status_invoice="<?= $k['status_invoice']?>"
                                                                  data-mkt_admin="<?=$k['mkt_admin']?>"
                                                                >
                                                                  <i class="feather icon-eye"></i>Detail
                                                                </button>
                                                              </div>
                                                            </td>
                                                            <td class="text-center">
                                                              <div class="btn-group " role="group" aria-label="Basic example">
                                                              <?php if ($level === "0") { ?>
                                                              </div>
                                                             <a target="_blank"
                                                                class="btn btn-info btn-square text-light btn-sm"
                                                                onclick="window.open(`<?= base_url() ?>accounting/invoice/pdf_invoice/<?= $k['id_acc_invoice'] ?>`, 'invoice_pdf', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');">
                                                                <i class="feather icon-file"></i>Cetak PDF
                                                              </a>
                                    
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
                    <label for="exampleFormControlInput1">Jumlah (Rp)</label>
                      <input type="text" class="form-control" id="v-jumlah" name="jumlah_po" placeholder="Jumlah Po" autocomplete="off" readonly>
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
                    <label for="exampleFormControlInput1">Keterangan Po</label>
                      <textarea type="text" class="form-control" id="v-keterangan" name="keterangan" autocomplete="off" readonly></textarea>
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

     function formatRupiah(angka) {
      if(!angka) {
        return '0';
      }
      let number_string = angka.replace(/[^,\d]/g, '').toString(),
          split   		= number_string.split('.'),
          sisa     		= split[0].length % 3,
          rupiah     	= split[0].substr(0, sisa),
          ribuan     	= split[0].substr(sisa).match(/\d{3}/gi);

      if (ribuan) {
        let separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      rupiah = split[1] != undefined ? rupiah + '.' + split[1] : rupiah;
      return rupiah;
    }

    function rupiahToInt(rupiah) {
  if (!rupiah) return 0;
  // Hapus semua karakter selain angka
  let clean = rupiah.toString().replace(/[^\d]/g, '');
  return parseInt(clean, 10) || 0;
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
  var status_invoice = $(event.relatedTarget).data('status_invoice')
  var mkt_admin = $(event.relatedTarget).data('mkt_admin') 

 // Konversi ke angka bersih sebelum dihitung
    // let jumlah = jumlah_po.toString().replace(/\./g, '').replace(/,/g, '');
    // let harga = harga_po.toString().replace(/\./g, '').replace(/,/g, '');
let total = rupiahToInt(jumlah_po) * rupiahToInt(harga_po);
  $(this).find('#v-mkt_po_customer').val(id_mkt_po_customer)
  $(this).find('#v-no_po').val(no_po)
  $(this).find('#v-tgl_po').val(tgl_po)
  $(this).find('#v-id_customer').val(id_customer)
  $(this).find('#v-id_customer').trigger("chosen:updated");
  $(this).find('#v-id_barang').val(id_barang)
  $(this).find('#v-id_barang').trigger("chosen:updated");
  $(this).find('#v-mesh').val(mesh)
  $(this).find('#v-bloom').val(bloom)
  $(this).find('#v-keterangan').val(keterangan)
  $(this).find('#v-jumlah_po').val(formatRupiah(jumlah_po.toString()))
  $(this).find('#v-harga_po').val(formatRupiah(harga_po.toString()))
  $(this).find('#v-jumlah').val(formatRupiah(total.toString()));
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

    <!-- Modal EDIT-->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>accounting/invoice/update_status">
      <div class="modal-body">
      <input type="hidden" id="e-id_mkt_po_customer" name="id_mkt_po_customer">
        
        <div class="row">
     <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlInput1">No PO</label>
                  <input type="text" class="form-control" id="e-no_po" name="no_po" placeholder="No PO" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" readonly>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      Maaf No PO sudah ada.
                    </div>
              </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="tgl_po">Tanggal PO</label>
                        <input type="text" class="form-control datepicker" id="e-tgl_po" name="tgl_po"  placeholder="Tanggal PO" autocomplete="off" readonly>
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="id_customer">Nama Customer</label>
                  <input type="text" class="form-control" id="e-id_customer" name="id_customer" autocomplete="off" readonly>
              </div>
            </div>
  
            <div class="col-md-6">
              <div class="form-group">
                <label for="id_barang">Nama Barang</label>
                  <input type="text" class="form-control" id="e-id_barang" name="id_barang" autocomplete="off" readonly>
              </div>
            </div>
  
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Mesh</label>
                  <input class="form-control" id=e-mesh" name="mesh" placeholder="Mesh" autocomplete="off" readonly>
              </div>
            </div>
        
            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Bloom</label>
                      <input type="text" class="form-control" id="e-bloom" name="bloom" placeholder="Bloom"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah(kg)</label>
                      <input type="number" class="form-control" id="e-jumlah_po" name="jumlah_po" placeholder="Jumlah(Kg)" autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Harga(Rp/Kg)</label>
                      <input type="number" class="form-control" id="e-harga_po" name="harga_po" placeholder="Harga(Rp/Kg)" autocomplete="off" readonly>
                  </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Jenis Pembayaran</label>
                    <select class="form-control chosen-select" id="e-jenis_pembayaran" name="jenis_pembayaran" autocomplete="off">
                        <option value="">- Pilih Jenis Pembayaran -</option>
                        <option value="Cash">Cash</option>
                        <option value="Kredit">Kredit</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Status</label>
                    <select class="form-control chosen-select" id="e-status_invoice" name="status_invoice" autocomplete="off">
                        <option value="">- Pilih Status -</option>
                        <option value="Unpaid">Unpaid</option>
                        <option value="Partial">Partial</option>
                        <option value="Paid">Paid</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Marketing Admin</label>
                      <input type="text" class="form-control" id="e-mkt_admin" name="mkt_admin" value="<?=$this->session->userdata('nama')?>"  autocomplete="off" readonly>
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
    $('#edit').on('show.bs.modal', function (event) {
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

  $(this).find('#e-id_mkt_po_customer').val(id_mkt_po_customer)
  $(this).find('#e-no_po').val(no_po)
  $(this).find('#e-tgl_po').val(tgl_po)
  $(this).find('#e-id_customer').val(id_customer)
  $(this).find('#e-id_customer').trigger("chosen:updated");
  $(this).find('#e-id_barang').val(id_barang)
  $(this).find('#e-id_barang').trigger("chosen:updated");
  $(this).find('#e-mesh').val(mesh)
  $(this).find('#e-bloom').val(bloom)
  $(this).find('#e-jumlah_po').val(jumlah_po)
  $(this).find('#e-harga_po').val(harga_po)
  $(this).find('#e-jenis_pembayaran').val(jenis_pembayaran)
  $(this).find('#e-jenis_pembayaran').trigger("chosen:updated");
  $(this).find('#e-status_invoice').val(status_invoice)
  $(this).find('#e-status_invoice').trigger("chosen:updated");
  $(this).find('#e-mkt_admin').val(mkt_admin)


  $(this).find('#e-tgl_po').datepicker().on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();
  });

  $("#e-no_po").keyup(function(){
      var no_po =  $("#e-no_po").val();
      jQuery.ajax({
        url: "<?=base_url()?>marketing/po_customer/cek_no_po",
        dataType:'text',
        type: "post",
        data:{no_po:no_po},
        success:function(response){
          if (response =="true") {
            $("#e-no_po").addClass("is-invalid");
            $("#simpan").attr("disabled","disabled");
          }else{
            $("#e-no_po").removeClass("is-invalid");
            $("#simpan").removeAttr("disabled");
          }
        }            
      });
    })

    $("select").on('change', function() {
      const selected = $(this).find(':selected').attr('data-mesh')
      mesh = selected.replaceAll(' ', '')
      $('#e-mesh').val(mesh)
    });

    $("select").on('change', function() {
      const selected = $(this).find(':selected').attr('data-bloom')
      bloom = selected.replaceAll(' ', '')
      $('#e-bloom').val(bloom)
    });

})

})

</script>