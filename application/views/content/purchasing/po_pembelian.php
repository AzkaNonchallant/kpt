

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
                                        <li class="breadcrumb-item"><a href="javascript:">PO Pembelian</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:"></a></li>
                                        <!-- Button trigger modal -->
                      										<button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      											<i class="feather icon-plus"></i>Tambah PO Pembelian
                      										</button>
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
                                            <h5>Data PO Pembelian</h5>

                                            <div class="float-right">
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
                                                                  data-harga_po_pembelian="<?= number_format($k['harga_po_pembelian'], 0, ",", ".") ?>"
                                                                  data-jenis_pembayaran="<?=$k['jenis_pembayaran']?>"
                                                                  data-prc_admin="<?=$k['prc_admin']?>"
                                                                >
                                                                  <i class="feather icon-eye"></i>Detail
                                                                </button>
                                                              </div>
                                                            </td>
                                                            <td class="text-center">
                                                              <div class="btn-group" role="group" aria-label="Basic example">
                                                              <?php if ($level === "0" && $k['status_po_pembelian'] === "Proses") { ?>
                                                                <button type="button" 
                                                                  class="btn btn-warning btn-square btn-sm text-light" 
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
                                                                  data-jumlah_po_pembelian="<?=number_format($k['jumlah_po_pembelian'],0,",",".")?>"
                                                                  data-harga_po_pembelian="<?=number_format($k['harga_po_pembelian'],0,",",".")?>"
                                                                  data-jenis_pembayaran="<?=$k['jenis_pembayaran']?>"
                                                                  data-prc_admin="<?=$k['prc_admin']?>"
                                                                >
                                                                  <i class="feather icon-edit-2"></i>Edit
                                                                </button>
                                                                <a  
                                                                  href="<?=base_url()?>purchasing/po_pembelian/delete/<?=$k['id_prc_po_pembelian']?>" 
                                                                  class="btn btn-danger btn-square text-light btn-sm" 
                                                                  onclick = "if (! confirm('Apakah Anda Yakin?')) { return false; }"
                                                                >
                                                                  <i class="feather icon-trash-2"></i>hapus
                                                                </a>
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

    <!-- Modal ADD-->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah PO Pembelian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>purchasing/po_pembelian/add">
      <div class="modal-body">
        
        <div class="row">
  
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlInput1">No PO Pembelian</label>
                  <input type="text" class="form-control" id="no_po_pembelian" name="no_po_pembelian" placeholder="No PO Pembelian" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      Maaf No PO Pembelian sudah ada.
                    </div>
              </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="tgl_po_pembelian">Tanggal PO Pembelian</label>
                        <input type="text" class="form-control datepicker" id="tgl_po_pembelian" name="tgl_po_pembelian"  placeholder="Tanggal PO Pembelian" autocomplete="off" required>
                </div>
          </div>
  
            <div class="col-md-6">
                  <div class="form-group">
                <label for="id_barang">Nama Barang</label>
                  <select class="form-control chosen-select" id="id_barang" name="id_barang" autocomplete="off" required>
                    <option value="">-Pilih Nama Barang -</option>
                      <?php 
                        foreach($res_barang as $b){ 
                      ?>
                    <option data-mesh="<?= $b['mesh'] ?>" data-bloom="<?= $b['bloom'] ?>" data-nama_supplier="<?= $b['nama_supplier'] ?>" value="<?=$b['id_barang']?>">(<?=$b['kode_barang']?>) <?=$b['nama_barang']?></option>
                      <?php
                      }
                      ?>
                  </select>
              </div>
            </div>
  
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Mesh</label>
                  <input class="form-control" id="mesh" name="mesh" placeholder="Mesh" autocomplete="off" readonly>
              </div>
            </div>
        
            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Bloom</label>
                      <input type="text" class="form-control" id="bloom" name="bloom" placeholder="Bloom"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-6">
                  <div class="form-group">
                <label for="nama_supplier">Nama supplier</label>
                      <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" placeholder="Nama Supplier"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah(kg)</label>
                      <input type="text" class="form-control" id="jumlah_po_pembelian" name="jumlah_po_pembelian" placeholder="Jumlah(Kg)" onkeypress="return hanyaAngka(event)" maxlength="100" autocomplete="off" required>
                  </div>
            </div>

            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Harga(Rp/Kg)</label>
                      <input type="text" class="form-control" id="harga_po_pembelian" name="harga_po_pembelian" placeholder="Harga(Rp/Kg)" onkeypress="return hanyaAngka(event)" maxlength="100" autocomplete="off" required>
                  </div>
            </div>

             <div class="col-md-6">
              <div class="form-group">
                <label for="total_harga">Jumlah Harga (Rp)</label>
                <input type="text" class="form-control" id="total_harga" name="total_harga" placeholder="Total Harga (Rp)" readonly>
              </div>
            </div>
  
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlInput1">Jenis Pembayaran</label>
                  <select class="form-control chosen-select" id="jenis_pembayaran" name="jenis_pembayaran" autocomplete="off">
                    <option value="">- Pilih Jenis Pembayaran -</option>
                    <option value="Cash">Cash</option>
                    <option value="Kredit">Kredit</option>
                  </select>
              </div>
            </div>

            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Purchasing Admin</label>
                      <input type="text" class="form-control" id="prc_admin" name="prc_admin" value="<?=$this->session->userdata('nama')?>"  autocomplete="off" readonly>
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
    $('#add').on('show.bs.modal', function(event) {
    });

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
    })

    // Fungsi untuk format angka ribuan
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

    // === START: OTOMATIS HITUNG TOTAL HARGA ===
    $('#jumlah_po_pembelian, #harga_po_pembelian').on('keyup change', function() {
      // ambil nilai dan bersihkan dari titik
      let jumlah_po = $('#jumlah_po_pembelian').val().replace(/\./g, '');
      let harga_po = $('#harga_po_pembelian').val().replace(/\./g, '');
      
      if (jumlah_po && harga_po) {
        let total = parseInt(jumlah_po) * parseInt(harga_po);
        $('#total_harga').val(formatRupiah(total.toString()));
      } else {
        $('#total_harga').val('');
      }
    });
    // === END ===

    $("select").on('change', function() {
      const selected = $(this).find(':selected').attr('data-mesh')
      mesh = selected.replaceAll(' ', '')
      $('#mesh').val(mesh)
    });

    $("select").on('change', function() {
      const selected = $(this).find(':selected').attr('data-bloom')
      bloom = selected.replaceAll(' ', '')
      $('#bloom').val(bloom)
    });

    $("select").on('change', function() {
      const selected = $(this).find(':selected').attr('data-nama_supplier')
      nama_supplier = selected.replaceAll(' ', '')
      $('#nama_supplier').val(nama_supplier)
    });

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

  });
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

          <div class="col-md-6">
            <div class="form-group">
              <label>Mesh</label>
              <input type="text" class="form-control" id="v-mesh" readonly>
            </div>
          </div>

          <div class="col-md-6">
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

          <div class="col-md-6">
            <div class="form-group">
              <label>Harga (Rp/Kg)</label>
              <input type="text" class="form-control" id="v-harga_po_pembelian" readonly>
            </div>
          </div>
           <div class="col-md-6">
              <div class="form-group">
                <label for="total_harga">Jumlah Harga (Rp)</label>
                <input type="text" class="form-control" id="v-total_harga" name="total_harga" placeholder="Total Harga (Rp)" readonly>
              </div>
            </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Jenis Pembayaran</label>
              <input type="text" class="form-control" id="v-jenis_pembayaran" readonly>
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

<script type="text/javascript">
$(document).ready(function() {
  $('#detail').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // tombol pemicu modal
    
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
    let total = parseInt(jumlah_po_pembelian) * parseInt(harga_po_pembelian);
  $(this).find('#v-total_harga').val(formatRupiah(total.toString()));
    $('#v-jenis_pembayaran').val(jenis_pembayaran);
    $('#v-prc_admin').val(prc_admin);
  });
});
</script>

    <!-- Modal EDIT-->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit PO Pembelian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>purchasing/po_pembelian/update">
      <div class="modal-body">
      <input type="hidden" id="e-id_prc_po_pembelian" name="id_prc_po_pembelian">
        
        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlInput1">No PO Pembelian</label>
                  <input type="text" class="form-control" id="e-no_po_pembelian" name="no_po_pembelian" placeholder="No PO Pembelian" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      Maaf No PO Pembelian sudah ada.
                    </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="tgl_po">Tanggal PO Pembelian</label>
                  <input type="text" class="form-control datepicker" id="e-tgl_po_pembelian" name="tgl_po_pembelian"  placeholder="Tanggal PO Pembelian" autocomplete="off" required>
              </div>
            </div>
  
            <div class="col-md-6">
                  <div class="form-group">
                <label for="id_barang">Nama Barang</label>
                  <select class="form-control chosen-select" id="e-id_barang" name="id_barang" autocomplete="off" required>
                    <option value="">-Pilih Nama Barang -</option>
                      <?php 
                        foreach($res_barang as $b){ 
                      ?>
                    <option data-mesh="<?= $b['mesh'] ?>" data-bloom="<?= $b['bloom'] ?>" data-nama_supplier="<?= $b['nama_supplier'] ?>" value="<?=$b['id_barang']?>">(<?=$b['kode_barang']?>) <?=$b['nama_barang']?></option>
                      <?php
                      }
                      ?>
                  </select>
              </div>
            </div>
  
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Mesh</label>
                  <input class="form-control" id="e-mesh" name="mesh" placeholder="Mesh"  readonly>
              </div>
            </div>
        
            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Bloom</label>
                      <input type="text" class="form-control" id="e-bloom" name="bloom" placeholder="Bloom" readonly>
                  </div>
            </div>

            <div class="col-md-6">
                  <div class="form-group">
                <label for="nama_supplier">Nama supplier</label>
                      <input type="text" class="form-control" id="e-nama_supplier" name="nama_supplier" placeholder="Nama Supplier"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah(kg)</label>
                      <input type="text" class="form-control" id="e-jumlah_po_pembelian" name="jumlah_po_pembelian" placeholder="Jumlah(Kg)" onkeypress="return hanyaAngka(event)" maxlength="15" autocomplete="off" required>
                  </div>
            </div>

            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Harga(Rp/Kg)</label>
                      <input type="text" class="form-control" id="e-harga_po_pembelian" name="harga_po_pembelian" placeholder="Harga(Rp/Kg)" onkeypress="return hanyaAngka(event)" maxlength="20" autocomplete="off" required>
                  </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="total_harga">Jumlah Harga (Rp)</label>
                <input type="text" class="form-control" id="e-total_harga" name="total_harga" placeholder="Total Harga (Rp)" readonly>
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
                    <label for="exampleFormControlInput1">Purchasing Admin</label>
                      <input type="text" class="form-control" id="e-prc_admin" name="prc_admin" value="<?=$this->session->userdata('nama')?>"  autocomplete="off" readonly>
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

  var id_prc_po_pembelian = $(event.relatedTarget).data('id_prc_po_pembelian') 
  var no_po_pembelian = $(event.relatedTarget).data('no_po_pembelian')
  var tgl_po_pembelian = $(event.relatedTarget).data('tgl_po_pembelian')
  var nama_supplier = $(event.relatedTarget).data('nama_supplier') 
  var id_barang = $(event.relatedTarget).data('id_barang')
  var mesh = $(event.relatedTarget).data('mesh') 
  var bloom = $(event.relatedTarget).data('bloom') 
  var jumlah_po_pembelian = $(event.relatedTarget).data('jumlah_po_pembelian') 
  var harga_po_pembelian = $(event.relatedTarget).data('harga_po_pembelian') 
  var jenis_pembayaran = $(event.relatedTarget).data('jenis_pembayaran')
  var prc_admin = $(event.relatedTarget).data('prc_admin') 

  $(this).find('#e-id_prc_po_pembelian').val(id_prc_po_pembelian)
  $(this).find('#e-no_po_pembelian').val(no_po_pembelian)
  $(this).find('#e-tgl_po_pembelian').val(tgl_po_pembelian)
  $(this).find('#e-nama_supplier').val(nama_supplier)
  $(this).find('#e-id_barang').val(id_barang)
  $(this).find('#e-id_barang').trigger("chosen:updated");
  $(this).find('#e-mesh').val(mesh)
  $(this).find('#e-bloom').val(bloom)
  $(this).find('#e-jumlah_po_pembelian').val(jumlah_po_pembelian)
  $(this).find('#e-harga_po_pembelian').val(harga_po_pembelian)
  $(this).find('#e-jenis_pembayaran').val(jenis_pembayaran)
  $(this).find('#e-jenis_pembayaran').trigger("chosen:updated");
  $(this).find('#e-prc_admin').val(prc_admin)

  // === Tambahan field total harga (otomatis dihitung) ===
    let total = (parseFloat(jumlah_po_pembelian) || 0) * (parseFloat(harga_po_pembelian) || 0);
    $(this).find('#e-total_harga').val(formatRupiah(total));

  $(this).find('#e-tgl_po_pembelian').datepicker().on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();
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

    $("select").on('change', function() {
      const selected = $(this).find(':selected').attr('data-nama_supplier')
      nama_supplier = selected.replaceAll(' ', '')
      $('#e-nama_supplier').val(nama_supplier)
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

})

})

</script>