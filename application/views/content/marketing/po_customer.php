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
                                        <li class="breadcrumb-item"><a href="javascript:">PO Customer</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:"></a></li>
                                        <!-- Button trigger modal -->
                      										<button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      											<i class="feather icon-plus"></i>Tambah PO Customer
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
                                            <h5>Data PO Customer</h5>

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
                                                            <!-- <th>Harga PO</th> -->
                                                            <th>Outstanding</th>
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
                                                            <!-- <td class="text-right"><?=number_format($k['harga_po_customer'],0,",",".")?> <?=$k['satuan']?></td> -->
                                                            <td class="text-right"><?=number_format($k['sisa'],0,",",".")?> <?=$k['satuan']?></td>
                                                            <td><?=$status?></td>
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
                                                                  data-keterangan="<?=$k['keterangan_po_customer']?>"
                                                                  data-jenis_pembayaran="<?=$k['jenis_pembayaran_customer']?>"
                                                                  data-mkt_admin="<?=$k['mkt_admin']?>"
                                                                >
                                                                  <i class="feather icon-eye"></i>Detail
                                                                </button>
                                                              </div>
                                                            </td>
                                                            <td class="text-center">
                                                              <div class="btn-group <?=$ds?>" role="group" aria-label="Basic example">
                                                              <?php if ($level === "0") { ?>
                                                                <button type="button" 
                                                                  class="btn btn-warning btn-square btn-sm" 
                                                                  data-toggle="modal" 
                                                                  data-target="#edit" 

                                                                  data-id_mkt_po_customer="<?=$k['id_mkt_po_customer']?>"
                                                                  data-no_po="<?=$k['no_po_customer']?>"
                                                                  data-tgl_po="<?=$tgl_po?>"
                                                                  
                                                                  data-id_customer="<?=$k['id_customer']?>"
                                                                  data-id_barang="<?=$k['id_barang']?>"
                                                                  data-nama_barang="<?=$k['nama_barang']?>"
                                                                  data-mesh="<?=$k['mesh']?>"
                                                                  data-bloom="<?=$k['bloom']?>"
                                                                  data-jumlah_po="<?=$k['jumlah_po_customer']?>"
                                                                  data-harga_po="<?=$k['harga_po_customer']?>"
                                                                  data-keterangan="<?=$k['keterangan_po_customer']?>"
                                                                  data-jenis_pembayaran="<?=$k['jenis_pembayaran_customer']?>"
                                                                  data-mkt_admin="<?=$k['mkt_admin']?>"
                                                                >
                                                                  <i class="feather icon-edit-2"></i>Edit
                                                                </button>
                                                                <a  
                                                                  href="<?=base_url()?>marketing/po_customer/delete/<?=$k['id_mkt_po_customer']?>" 
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

        window.location = "<?=base_url() ?>marketing/po_customer/index?"+ query.toString()
        
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

    <!-- Modal ADD-->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah PO Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>marketing/po_customer/add">
      <div class="modal-body">
        
        <div class="row">

            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlInput1">No PO</label>
                  <input type="text" class="form-control" id="no_po" name="no_po" placeholder="No PO" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      Maaf No PO sudah ada.
                    </div>
              </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="tgl_po">Tanggal PO</label>
                        <input type="text" class="form-control datepicker" id="tgl_po" name="tgl_po"  placeholder="Tanggal PO" autocomplete="off" required>
                </div>
          </div>

          <div class="col-md-4">
                  <div class="form-group">
                <label for="id_customer">Nama Customer</label>
                  <select class="form-control chosen-select" id="id_customer" name="id_customer" autocomplete="off" required>
                    <option value="">-Pilih Nama Customer -</option>
                      <?php 
                        foreach($res_customer as $c){ 
                      ?>
                    <option value="<?=$c['id_customer']?>">(<?=$c['kode_customer']?>) <?=$c['nama_customer']?></option>
                      <?php
                      }
                      ?>
                  </select>
              </div>
            </div>
  
            <div class="col-md-4">
                  <div class="form-group">
                <label for="id_barang">Nama Barang</label>
                  <select class="form-control chosen-select" id="id_barang" name="id_barang" autocomplete="off" required>
                    <option value="">-Pilih Nama Barang -</option>
                      <?php 
                        foreach($res_barang as $b){ 
                          
                      ?>
                    <option data-kode_tf_in="<?= $b['kode_tf_in'] ?>" data-mesh="<?= $b['mesh'] ?>" data-bloom="<?= $b['bloom'] ?>" data-gdg_qty_in="<?= $b['gdg_qty_in'] ?>" value="<?=$b['id_barang']?>">(<?=$b['kode_barang']?>) <?=$b['nama_barang']?></option>
                      <?php
                      }
                      ?>
                  </select>
              </div>
            </div>
  
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Kode TF IN</label>
                  <input class="form-control" id="kode_tf_in" name="kode_tf_in" placeholder="Kode TF IN" autocomplete="off" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Mesh</label>
                  <input class="form-control" id="mesh" name="mesh" placeholder="Mesh" autocomplete="off" readonly>
              </div>
            </div>
        
            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Bloom</label>
                      <input type="text" class="form-control" id="bloom" name="bloom" placeholder="Bloom"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Stock</label>
                      <input type="text" class="form-control" id="gdg_qty_in" name="gdg_qty_in" placeholder="Stock"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah(kg)</label>
                      <input type="text" class="form-control" id="jumlah_po" name="jumlah_po" placeholder="Jumlah(Kg)" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                      <div id="validationServer03Feedback" class="invalid-feedback">
                        Maaf Jumlah Kirim tidak boleh lebih dari Stock.
                      </div>
                  </div>
            </div>

            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Harga(Rp/Kg)</label>
                      <input type="text" class="form-control" id="harga_po" name="harga_po" placeholder="Harga(Rp/Kg)" autocomplete="off" required>
                  </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="total_harga">Jumlah Harga (Rp)</label>
                <input type="text" class="form-control" id="total_harga" name="total_harga" placeholder="Total Harga (Rp)" readonly>
              </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="note_gudang">Keterangan Po</label>
                        <textarea class="form-control" id="note_gudang" name="keterangan" rows="3" placeholder="Keterangan Po" autocomplete="off"></textarea>
                </div>
            </div>
  
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlInput1">Jenis Pembayaran</label>
                  <select class="form-control chosen-select" id="jenis_pembayaran" name="jenis_pembayaran" autocomplete="off">
                    <option value="">- Pilih Jenis Pembayaran -</option>
                    <option value="Cash">Cash</option>
                    <option value="Kredit">Kredit</option>
                  </select>
              </div>
            </div>

            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Marketing Admin</label>
                      <input type="text" class="form-control" id="mkt_admin" name="mkt_admin" value="<?=$this->session->userdata('nama')?>"  autocomplete="off" readonly>
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

    $("#no_po").keyup(function(){
      var no_po =  $("#no_po").val();
      jQuery.ajax({
        url: "<?=base_url()?>marketing/po_customer/cek_no_po",
        dataType:'text',
        type: "post",
        data:{no_po:no_po},
        success:function(response){
          if (response =="true") {
            $("#no_po").addClass("is-invalid");
            $("#simpan").attr("disabled","disabled");
          }else{
            $("#no_po").removeClass("is-invalid");
            $("#simpan").removeAttr("disabled");
          }
        }            
      });
    })

    // === START: OTOMATIS HITUNG TOTAL HARGA ===
    $('#jumlah_po, #harga_po').on('keyup change', function() {
      // ambil nilai dan bersihkan dari titik
      let jumlah_po = $('#jumlah_po').val().replace(/\./g, '');
      let harga_po = $('#harga_po').val().replace(/\./g, '');
      
      if (jumlah_po && harga_po) {
        let total = parseInt(jumlah_po) * parseInt(harga_po);
        $('#total_harga').val(formatRupiah(total.toString()));
      } else {
        $('#total_harga').val('');
      }
    });
    // === END ===


    $("#jumlah_po").keyup(function(){
      var jumlah_po =  $("#jumlah_po").val().replaceAll('.','');
      var gdg_qty_in =  $("#gdg_qty_in").val().replaceAll('.','');
      if (parseInt(jumlah_po) > parseInt(gdg_qty_in)) {
        $("#jumlah_po").addClass("is-invalid");
        $("#simpan").attr("disabled","disabled");
      }else{
        $("#jumlah_po").removeClass("is-invalid");
        $("#simpan").removeAttr("disabled");
      }
    })

    $("select").on('change', function() {
      const selected = $(this).find(':selected').attr('data-kode_tf_in')
      kode_tf_in = selected.replaceAll(' ', ' ')
      $('#kode_tf_in').val(kode_tf_in)
    });

    $("select").on('change', function() {
      const selected = $(this).find(':selected').attr('data-mesh')
      mesh = selected.replaceAll(' ', ' ')
      $('#mesh').val(mesh)
    });

    $("select").on('change', function() {
      const selected = $(this).find(':selected').attr('data-bloom')
      bloom = selected.replaceAll(' ', ' ')
      $('#bloom').val(bloom)
    });

    $("select").on('change', function() {
  const selected = $(this).find(':selected').attr('data-gdg_qty_in');
  // Pastikan nilainya berupa angka dulu
  let gdg_qty_in = selected ? selected.replace(/\D/g, '') : 0;
  // Format ke rupiah (tanpa "Rp", hanya angka dengan titik)
  gdg_qty_in = new Intl.NumberFormat('id-ID').format(gdg_qty_in);
  // Masukkan hasil format ke input
  $('#gdg_qty_in').val(gdg_qty_in);
});


    document.getElementById('jumlah_po').addEventListener('keyup', function(e) {
    let value = this.value.replace(/\D/g,'');
    value = new Intl.NumberFormat('id-ID').format(value);
    this.value = value;
    });

    document.getElementById('harga_po').addEventListener('keyup', function(e) {
    let value = this.value.replace(/\D/g, ''); // Hanya angka
    value = new Intl.NumberFormat('id-ID').format(value); // Format ke ribuan
    this.value = value;
    });

  });
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
                <label for="total_harga">Jumlah Harga (Rp)</label>
                <input type="text" class="form-control" id="v-total_harga" name="total_harga" placeholder="Total Harga (Rp)" readonly>
              </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="note_gudang">Keterangan Po</label>
                        <textarea class="form-control" id="v-keterangan" name="keterangan_po" rows="3" placeholder="Note Untuk Gudang" autocomplete="off" readonly></textarea>
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
        if (!angka) return '0';
      let number_string = angka.replace(/[^,\d]/g, '').toString(),
          split   		= number_string.split('.'),
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
  $(this).find('#v-mkt_admin').val(mkt_admin)
  let total = parseInt(jumlah_po) * parseInt(harga_po);
  $(this).find('#v-total_harga').val(formatRupiah(total.toString()));
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
        <h5 class="modal-title" id="exampleModalLabel">Edit PO Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>marketing/po_customer/update">
      <div class="modal-body">
      <input type="hidden" id="e-id_mkt_po_customer" name="id_mkt_po_customer">
        
        <div class="row">
  
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlInput1">No PO</label>
                  <input type="text" class="form-control" id="e-no_po" name="no_po" placeholder="No PO" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      Maaf No PO sudah ada.
                    </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="tgl_po">Tanggal PO</label>
                  <input type="text" class="form-control datepicker" id="e-tgl_po" name="tgl_po"  placeholder="Tanggal PO" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="id_customer">Nama Customer</label>
                  <select class="form-control chosen-select" id="e-id_customer" name="id_customer" autocomplete="off" required>
                    <option value="">-Pilih Nama Customer -</option>
                      <?php 
                        foreach($res_customer as $c){ 
                      ?>
                        <option value="<?=$c['id_customer']?>">(<?=$c['kode_customer']?>) <?=$c['nama_customer']?></option>
                      <?php
                      }
                      ?>
                  </select>
              </div>
            </div>
  
            <div class="col-md-6">
                  <div class="form-group">
                <label for="id_barang">Nama Barang</label>
                  <select class="form-control chosen-select" id="e-id_barang" name="id_barang" autocomplete="off" required>
                    <option value="">-Pilih Nama Barang -</option>
                      <?php 
                        foreach($res_barang as $b) :  
                      ?>
                    <option data-kode_tf_in="<?= $b['kode_tf_in'] ?>" data-mesh="<?= $b['mesh'] ?>" data-bloom="<?= $b['bloom'] ?>" data-gdg_qty_in="<?= $b['gdg_qty_in'] ?>" value="<?=$b['id_barang']?>">(<?=$b['kode_barang']?>) <?=$b['nama_barang']?></option>
                      <?php
                      endforeach;
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
                    <label for="exampleFormControlInput1">Jumlah(kg)</label>
                      <input type="number" class="form-control" id="e-jumlah_po" name="jumlah_po" placeholder="Jumlah(Kg)" autocomplete="off" required>
                  </div>
            </div>

            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Harga(Rp/Kg)</label>
                      <input type="number" class="form-control" id="e-harga_po" name="harga_po" placeholder="Harga(Rp/Kg)" autocomplete="off" required>
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
                    <label for="note_gudang">Keterangan Po</label>
                        <textarea class="form-control" id="e-keterangan" name="keterangan" rows="3" placeholder="Note Untuk Gudang" autocomplete="off"></textarea>
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

  // Fungsi format angka ke rupiah
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

  // Saat modal EDIT ditampilkan
  $('#edit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);

    // Ambil data dari tombol trigger
    var id_mkt_po_customer = button.data('id_mkt_po_customer');
    var no_po = button.data('no_po');
    var tgl_po = button.data('tgl_po');
    var id_customer = button.data('id_customer');
    var id_barang = button.data('id_barang');
    var mesh = button.data('mesh');
    var bloom = button.data('bloom');
    var jumlah_po = button.data('jumlah_po');
    var harga_po = button.data('harga_po');
    var keterangan = button.data('keterangan');
    var jenis_pembayaran = button.data('jenis_pembayaran');
    var mkt_admin = button.data('mkt_admin');

    // Isi data ke form edit
    var modal = $(this);
    modal.find('#e-id_mkt_po_customer').val(id_mkt_po_customer);
    modal.find('#e-no_po').val(no_po);
    modal.find('#e-tgl_po').val(tgl_po);
    modal.find('#e-id_customer').val(id_customer).trigger("chosen:updated");
    modal.find('#e-id_barang').val(id_barang).trigger("chosen:updated");
    modal.find('#e-mesh').val(mesh);
    modal.find('#e-bloom').val(bloom);
    modal.find('#e-jumlah_po').val(jumlah_po);
    modal.find('#e-harga_po').val(harga_po);
    modal.find('#e-keterangan').val(keterangan);
    modal.find('#e-jenis_pembayaran').val(jenis_pembayaran).trigger("chosen:updated");
    modal.find('#e-mkt_admin').val(mkt_admin);

    // === Tambahan field total harga (otomatis dihitung) ===
    let total = (parseFloat(jumlah_po) || 0) * (parseFloat(harga_po) || 0);
    modal.find('#e-total_harga').val(formatRupiah(total));

    // Jalankan datepicker aman
    modal.find('#e-tgl_po').datepicker().on('show.bs.modal', function(e) {
      e.stopPropagation();
    });

    // Cek No PO agar tidak duplikat
    $("#e-no_po").on('keyup', function(){
      let no_po = $(this).val();
      $.ajax({
        url: "<?= base_url('marketing/po_customer/cek_no_po') ?>",
        type: "post",
        data: { no_po: no_po },
        success: function(response){
          if (response === "true") {
            $("#e-no_po").addClass("is-invalid");
            $("#simpan").attr("disabled", true);
          } else {
            $("#e-no_po").removeClass("is-invalid");
            $("#simpan").attr("disabled", false);
          }
        }
      });
    });

    // Ambil mesh dan bloom dari dropdown
    $("#e-id_barang").on('change', function() {
      let opt = $(this).find(':selected');
      $('#e-mesh').val(opt.data('mesh') || '');
      $('#e-bloom').val(opt.data('bloom') || '');
    });

    // === Perhitungan otomatis total harga ===
    $("#e-jumlah_po, #e-harga_po").on('keyup change', function() {
      let jumlah = parseFloat($("#e-jumlah_po").val().replace(/\./g,'')) || 0;
      let harga = parseFloat($("#e-harga_po").val().replace(/\./g,'')) || 0;
      let total = jumlah * harga;
      $("#e-total_harga").val(formatRupiah(total));
    });
  });
});
</script>


<!-- <script type="text/javascript">
$(document).ready(function() {
    $('#edit').on('show.bs.modal', function (event) {

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
  var id_customer = $(event.relatedTarget).data('id_customer') 
  var id_barang = $(event.relatedTarget).data('id_barang')
  var mesh = $(event.relatedTarget).data('mesh') 
  var bloom = $(event.relatedTarget).data('bloom') 
  var jumlah_po = $(event.relatedTarget).data('jumlah_po') 
  var harga_po = $(event.relatedTarget).data('harga_po') 
  var jenis_pembayaran = $(event.relatedTarget).data('jenis_pembayaran')
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

</script> -->