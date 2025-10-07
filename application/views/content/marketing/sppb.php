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
                                        <li class="breadcrumb-item"><a href="javascript:">SPPB</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:"></a></li>
                                        <!-- Button trigger modal -->
                      										<button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      											<i class="feather icon-plus"></i>Tambah SPPB
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
                                            <h5>Data SPPB</h5>

                                            <!-- <div class="float-right">
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
                                                            <th>Tgl SPPB</th>
                                                            <th>No SPPB</th>
                                                            <th>Customer</th>
                                                            <th>Jumlah Kirim</th>
                                                            <th>Tanggal Kirim</th>
                                                            <th>Status</th>
                                                            <th>Detail</th>
                                                            <th>Print</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    	<?php
                                                      $level = $this->session->userdata('level');
                                                    	$no=1;
                                                    	foreach($result as $k){ 
                                                        $tgl_sppb =  explode('-', $k['tgl_sppb'])[2]."/".explode('-', $k['tgl_sppb'])[1]."/".explode('-', $k['tgl_sppb'])[0];
                                                    	  $tgl_kirim =  explode('-', $k['tgl_kirim'])[2]."/".explode('-', $k['tgl_kirim'])[1]."/".explode('-', $k['tgl_kirim'])[0];
                                                       
                                                        if ($k['status_sppb']=='Proses') {
                                                          $ds="";
                                                        }else{
                                                          $ds="d-none";
                                                        } 
                                                        
                                                        
                                                      ?>
                                                    	<tr>
                                                            <th scope="row"><?=$no++?></th>
                                                            <td><?=$tgl_sppb?></td>
                                                            <td><?=$k['no_sppb']?></td>
                                                            <td><?=$k['nama_customer']?></td>
                                                            <td class="text-left"><?=number_format($k['jumlah_kirim'],0,",",".")?> <?=$k['satuan']?></td>
                                                            <td><?=$tgl_kirim?></td>
                                                            <td><?=$k['status_sppb']?></td>
                                                            <td class="text-center">
                                                              <div class="btn-group" role="group" aria-label="Basic example">
                                                                <button type="button" 
                                                                  class="btn btn-info btn-square btn-sm" 
                                                                  data-toggle="modal"
                                                                  data-target="#detail"
                                                                  data-id_mkt_sppb="<?=$k['id_mkt_sppb']?>"
                                                                  data-no_sppb="<?=$k['no_sppb']?>"
                                                                  data-tgl_sppb="<?=$tgl_sppb?>"
                                                                  
                                                                  data-id_mkt_po_customer="<?=$k['id_mkt_po_customer']?>"
                                                                  data-no_po="<?=$k['no_po_customer']?>"
                                                                  data-nama_customer="<?=$k['nama_customer']?>"
                                                                  data-nama_barang="<?=$k['nama_barang']?>"
                                                                  data-kode_tf_in="<?=$k['kode_tf_in']?>"
                                                                  data-jumlah_po="<?=$k['jumlah_po_customer']?>"
                                                                  data-mesh="<?=$k['mesh']?>"
                                                                  data-bloom="<?=$k['bloom']?>"

                                                                  data-tgl_kirim="<?=$tgl_kirim?>"
                                                                  data-jumlah_kirim="<?=$k['jumlah_kirim']?>"
                                                                  data-note_gudang="<?=$k['note_gudang']?>"
                                                                  data-harga_kirim="<?=$k['harga_kirim']?>"
                                                                  data-note_pembayaran="<?=$k['note_pembayaran']?>"
                                                                  data-mkt_admin="<?=$k['mkt_admin']?>"
                                                                >
                                                                  <i class="feather icon-eye"></i>Detail
                                                                </button>
                                                              </div>
                                                            </td>
                                                            <td class="text-center">
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a type="button" class="btn btn-success btn-square btn-sm text-light" onclick="window.open(<?= base_url() ?>marketing/sppb/pdf_sppb_gudang/<?= str_replace('/', '--', $k['no_sppb']) ?>, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes'); ">
                                                                            <i class="feather icon-file"></i>Gdg
                                                                        </a>
                                                                    </div>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a type="button" class="btn btn-warning btn-square btn-sm text-light" onclick="window.open(<?= base_url() ?>marketing/sppb/pdf_sppb_accounting/<?= str_replace('/', '--', $k['no_sppb']) ?>, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes'); ">
                                                                            <i class="feather icon-file"></i>Acc
                                                                        </a>
                                                                    </div>
                                                            </td>
                                                            <td class="text-center">
                                                              <div class="btn-group <?=$ds?>" role="group" aria-label="Basic example">
                                                              <?php if ($level === "0") { ?>
                                                                <button type="button" 
                                                                  class="btn btn-warning btn-square btn-sm text-light" 
                                                                  data-toggle="modal" 
                                                                  data-target="#edit" 

                                                                  data-id_mkt_sppb="<?=$k['id_mkt_sppb']?>"
                                                                  data-no_sppb="<?=$k['no_sppb']?>"
                                                                  data-tgl_sppb="<?=$tgl_sppb?>"
                                                                  
                                                                  data-id_mkt_po_customer="<?=$k['id_mkt_po_customer']?>"
                                                                  data-no_po="<?=$k['no_po_customer']?>"
                                                                  data-nama_customer="<?=$k['nama_customer']?>"
                                                                  data-nama_barang="<?=$k['nama_barang']?>"
                                                                  data-kode_tf_in="<?=$k['kode_tf_in']?>"
                                                                  data-jumlah_po="<?=$k['jumlah_po_customer']?>"
                                                                  data-mesh="<?=$k['mesh']?>"
                                                                  data-bloom="<?=$k['bloom']?>"

                                                                  data-tgl_kirim="<?=$tgl_kirim?>"
                                                                  data-jumlah_kirim="<?=$k['jumlah_kirim']?>"
                                                                  data-note_gudang="<?=$k['note_gudang']?>"
                                                                  data-harga_kirim="<?=$k['harga_kirim']?>"
                                                                  data-note_pembayaran="<?=$k['note_pembayaran']?>"
                                                                  data-mkt_admin="<?=$k['mkt_admin']?>"

                                                                >
                                                                  <i class="feather icon-edit-2"></i>Edit
                                                                </button>
                                                              </div>
                                                              <div class="btn-group <?=$ds?>" role="group" aria-label="Basic example">
                                                                <a  
                                                                  href="<?=base_url()?>marketing/sppb/delete/<?=$k['id_mkt_sppb']?>" 
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah SPPB</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>marketing/sppb/add">
      <div class="modal-body">
        
        <div class="row">
  
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlInput1">No SPPB</label>
                  <input type="text" class="form-control" id="no_sppb" name="no_sppb" placeholder="No SPPB" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      Maaf No SPPB sudah ada.
                    </div>
              </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="tgl_sppb">Tanggal SPPB</label>
                        <input type="text" class="form-control datepicker" id="tgl_sppb" name="tgl_sppb"  placeholder="Tanggal SPPB" autocomplete="off" required>
                </div>
            </div>

            <div class="col-md-4">

            </div>
  
            <div class="col-md-4">
                  <div class="form-group">
                <label for="id_mkt_po_customer">Nomor PO</label>
                  <select class="form-control chosen-select" id="id_mkt_po_customer" name="id_mkt_po_customer" autocomplete="off" required>
                    <option value="">-Pilih NO PO -</option>
                      <?php 
                        foreach($res_po as $rp){ 
                      ?>
                    <option data-nama_customer="<?= $rp['nama_customer'] ?>"
                    data-nama_barang="<?= $rp['nama_barang'] ?>"
                    data-kode_tf_in="<?= $rp['kode_tf_in'] ?>"
                    data-mesh="<?= $rp['mesh'] ?>"
                    data-bloom="<?= $rp['bloom'] ?>"
                    data-jumlah_po="<?=number_format($rp['jumlah_po_customer'],0,",",".")?>"
                    data-sisa="<?=number_format($rp['sisa'],0,",",".")?>"
                     value="<?=$rp['id_mkt_po_customer']?>"> <?=$rp['no_po_customer']?></option>
                      <?php
                      }
                      ?>
                  </select>
              </div>
            </div>
  
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Nama Customer</label>
                  <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Nama Customer" autocomplete="off" readonly>
              </div>
            </div>
        
            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Nama Barang </label>
                      <input class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Kode TF IN </label>
                      <input class="form-control" id="kode_tf_in" name="kode_tf_in" placeholder="KODE TF IN"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Mesh </label>
                      <input type="text" class="form-control" id="mesh" name="mesh" placeholder="Mesh"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Bloom </label>
                      <input type="text" class="form-control" id="bloom" name="bloom" placeholder="Bloom"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah PO (Kg) </label>
                      <input type="text" class="form-control" id="jumlah_po" name="jumlah_po" placeholder="Jumlah PO"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Outstanding (Kg) </label>
                      <input type="text" class="form-control" id="sisa" name="sisa" placeholder="Outstanding"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="tgl_kirim">Tanggal Kirim</label>
                        <input type="text" class="form-control datepicker" id="tgl_kirim" name="tgl_kirim"  placeholder="Tanggal kirim" autocomplete="off" required>
                </div>
            </div>

            <div class="col-md-4">
                  <div class="form-group">
                    <label for="jumlah_kirim">Jumlah Kirim (kg)</label>
                      <input type="text" class="form-control" id="jumlah_kirim" name="jumlah_kirim" placeholder="Jumlah Kirim(Kg)" autocomplete="off"  aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()"  required>
                      <div id="validationServer03Feedback" class="invalid-feedback">
                        Maaf Jumlah Kirim tidak boleh lebih dari Outstanding.
                      </div>
                  </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="note_gudang">Note Untuk Gudang</label>
                        <textarea class="form-control" id="note_gudang" name="note_gudang" rows="3" placeholder="Note Untuk Gudang" autocomplete="off"></textarea>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="harga_kirim">Harga Kirim (Rp/Kg)</label>
                        <input type="text" class="form-control" id="harga_kirim" name="harga_kirim"  placeholder="Harga Kirim" autocomplete="off" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="note_pembayaran">Note Pembayaran</label>
                        <textarea class="form-control" id="note_pembayaran" name="note_pembayaran" rows="3" placeholder="Note Pembayaran" autocomplete="off"></textarea>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="mkt_admin">Marketing Admin</label>
                        <input type="text" class="form-control" id="mkt_admin" name="mkt_admin"  value="<?=$this->session->userdata('nama')?>" autocomplete="off" readonly>
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
      
      $("#no_sppb").keyup(function(){
        var no_sppb =  $("#no_sppb").val();
        jQuery.ajax({
          url: "<?=base_url()?>marketing/sppb/cek_no_sppb",
          dataType:'text',
          type: "post",
          data:{no_sppb:no_sppb},
          success:function(response){
          if (response =="true") {
            $("#no_sppb").addClass("is-invalid");
            $("#simpan").attr("disabled","disabled");
          }else{
            $("#no_sppb").removeClass("is-invalid");
            $("#simpan").removeAttr("disabled");
          }
        }            
      });
    })
    
    $("#jumlah_kirim").keyup(function(){
      var jumlah_kirim =  $("#jumlah_kirim").val().replaceAll('.','');
      var sisa =  $("#sisa").val().replaceAll('.','');
      if (parseInt(jumlah_kirim) > parseInt(sisa)) {
        $("#jumlah_kirim").addClass("is-invalid");
        $("#simpan").attr("disabled","disabled");
      }else{
        $("#jumlah_kirim").removeClass("is-invalid");
        $("#simpan").removeAttr("disabled");
      }
    })

    $("select").on('change', function() {
      const selected = $(this).find(':selected').attr('data-nama_customer')
      nama_customer = selected.replaceAll(' ', ' ')
      $('#nama_customer').val(nama_customer)
    });
    
    $("select").on('change', function() {
      const selected = $(this).find(':selected').attr('data-nama_barang')
      nama_barang = selected.replaceAll(' ', ' ')
      $('#nama_barang').val(nama_barang)
    });
    
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
      const selected = $(this).find(':selected').attr('data-jumlah_po')
      jumlah_po = selected.replaceAll(' ', ' ')
      $('#jumlah_po').val(jumlah_po)
    });
    
    $("select").on('change', function() {
      const selected = $(this).find(':selected').attr('data-sisa')
      sisa = selected.replaceAll(' ', ' ')
      $('#sisa').val(sisa)
    });

    document.getElementById('jumlah_kirim').addEventListener('keyup', function(e) {
      let value = this.value.replace(/\D/g,'');
      value = new Intl.NumberFormat('id-ID').format(value);
      this.value = value;
    });
    
    document.getElementById('harga_kirim').addEventListener('keyup', function(e) {
      let value = this.value.replace(/\D/g,'');
      value = new Intl.NumberFormat('id-ID').format(value);
      this.value = value;
    });
    
  });
</script>

 <!-- Modal DETAIL-->
 <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail SPPB</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <div class="row">
  
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlInput1">No SPPB</label>
                  <input type="text" class="form-control" id="v-no_sppb" name="no_sppb" placeholder="No SPPB" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" readonly>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      Maaf No SPPB sudah ada.
                    </div>
              </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="tgl_sppb">Tanggal SPPB</label>
                        <input type="text" class="form-control" id="v-tgl_sppb" name="tgl_sppb"  placeholder="Tanggal SPPB" autocomplete="off" readonly>
                </div>
            </div>

            <div class="col-md-4">

            </div>
  
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">No PO</label>
                  <input type="text" class="form-control" id="v-no_po" name="no_po" placeholder="No_po" autocomplete="off" readonly>
              </div>
            </div>
  
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Nama Customer</label>
                  <input type="text" class="form-control" id="v-nama_customer" name="nama_customer" placeholder="Nama Customer" autocomplete="off" readonly>
              </div>
            </div>
        
            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Nama Barang </label>
                      <input class="form-control" id="v-nama_barang" name="nama_barang" placeholder="Nama Barang"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Kode TF IN </label>
                      <input class="form-control" id="v-kode_tf_in" name="kode_tf_in" placeholder="KODE TF IN"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Mesh </label>
                      <input type="text" class="form-control" id="v-mesh" name="mesh" placeholder="Mesh"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Bloom </label>
                      <input type="text" class="form-control" id="v-bloom" name="bloom" placeholder="Bloom"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah PO (Kg) </label>
                      <input type="text" class="form-control" id="v-jumlah_po" name="jumlah_po" placeholder="Jumlah PO"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="tgl_kirim">Tanggal Kirim</label>
                        <input type="text" class="form-control" id="v-tgl_kirim" name="tgl_kirim"  placeholder="Tanggal kirim" autocomplete="off" readonly>
                </div>
            </div>

            <div class="col-md-4">
                  <div class="form-group">
                    <label for="jumlah_kirim">Jumlah Kirim (kg)</label>
                      <input type="number" class="form-control" id="v-jumlah_kirim" name="jumlah_kirim" placeholder="Jumlah Kirim(Kg)" autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="note_gudang">Note Untuk Gudang</label>
                        <textarea class="form-control" id="v-note_gudang" name="note_gudang" rows="3" placeholder="Note Untuk Gudang" autocomplete="off" readonly></textarea>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="harga_kirim">Harga Kirim (Rp/Kg)</label>
                        <input type="number" class="form-control" id="v-harga_kirim" name="harga_kirim"  placeholder="Harga Kirim" autocomplete="off" readonly>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="note_pembayaran">Note Pembayaran</label>
                        <textarea class="form-control" id="v-note_pembayaran" name="note_pembayaran" rows="3" placeholder="Note Pembayaran" autocomplete="off" readonly></textarea>
                </div>
            </div>

            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Marketing Admin</label>
                      <input type="text" class="form-control" id="v-mkt_admin" name="mkt_admin" value="<?=$this->session->userdata('nama')?>"  autocomplete="off" readonly>
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
  var id_mkt_sppb = $(event.relatedTarget).data('id_mkt_sppb')
  var no_sppb = $(event.relatedTarget).data('no_sppb')
  var tgl_sppb = $(event.relatedTarget).data('tgl_sppb')
  
  var id_mkt_po_customer = $(event.relatedTarget).data('id_mkt_po_customer')
  var no_po = $(event.relatedTarget).data('no_po')  
  var nama_customer = $(event.relatedTarget).data('nama_customer')
  var nama_barang = $(event.relatedTarget).data('nama_barang')
  var kode_tf_in = $(event.relatedTarget).data('kode_tf_in')
  var id_customer = $(event.relatedTarget).data('nama_customer') 
  var id_barang = $(event.relatedTarget).data('nama_barang')
  var mesh = $(event.relatedTarget).data('mesh') 
  var bloom = $(event.relatedTarget).data('bloom')
  var jumlah_po = $(event.relatedTarget).data('jumlah_po') 

  var tgl_kirim = $(event.relatedTarget).data('tgl_kirim') 
  var jumlah_kirim = $(event.relatedTarget).data('jumlah_kirim') 
  var note_gudang = $(event.relatedTarget).data('note_gudang')
  var harga_kirim = $(event.relatedTarget).data('harga_kirim')
  var note_pembayaran = $(event.relatedTarget).data('note_pembayaran') 
  var mkt_admin = $(event.relatedTarget).data('mkt_admin')

  $(this).find('#v-id_mkt_sppb').val(id_mkt_sppb)
  $(this).find('#v-no_sppb').val(no_sppb)
  $(this).find('#v-tgl_sppb').val(tgl_sppb)
  $(this).find('#v-id_mkt_po_customer').val(id_mkt_po_customer)
  $(this).find('#v-id_mkt_po_customer').trigger("chosen:updated");
  $(this).find('#v-no_po').val(no_po)
  $(this).find('#v-nama_customer').val(nama_customer)
  $(this).find('#v-nama_barang').val(nama_barang)
  $(this).find('#v-kode_tf_in').val(kode_tf_in)
  $(this).find('#v-mesh').val(mesh)
  $(this).find('#v-bloom').val(bloom)
  $(this).find('#v-jumlah_po').val(jumlah_po)

  $(this).find('#v-tgl_kirim').val(tgl_kirim)
  $(this).find('#v-jumlah_kirim').val(jumlah_kirim)
  $(this).find('#v-note_gudang').val(note_gudang)
  $(this).find('#v-harga_kirim').val(harga_kirim)
  $(this).find('#v-note_pembayaran').val(note_pembayaran)
  $(this).find('#v-mkt_admin').val(mkt_admin)


  $(this).find('#v-tgl_sppb').datepicker().on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();
  });

  $(this).find('#v-tgl_kirim').datepicker().on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();
  });
})

})

</script>

    <!-- Modal EDIT-->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit SPPB</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>marketing/sppb/update">
      <div class="modal-body">
      <input type="hidden" id="e-id_mkt_sppb" name="id_mkt_sppb">
        <div class="row">
  
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlInput1">No SPPB</label>
                  <input type="text" class="form-control" id="e-no_sppb" name="no_sppb" placeholder="No SPPB" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      Maaf No SPPB sudah ada.
                    </div>
              </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="tgl_sppb">Tanggal SPPB</label>
                        <input type="text" class="form-control datepicker" id="e-tgl_sppb" name="tgl_sppb"  placeholder="Tanggal SPPB" autocomplete="off" required>
                </div>
            </div>

            <div class="col-md-4">

            </div>
  
            <div class="col-md-4">
                  <div class="form-group">
                <label for="id_mkt_po_customer">Nomor PO</label>
                  <select class="form-control chosen-select" id="e-id_mkt_po_customer" name="id_mkt_po_customer" autocomplete="off" required>
                    <option value="">-Pilih NO PO -</option>
                      <?php 
                        foreach($res_po as $rp){ 
                      ?>
                    <option data-nama_customer="<?= $rp['nama_customer'] ?>"
                    data-nama_barang="<?= $rp['nama_barang'] ?>"
                    data-kode_tf_in="<?= $rp['kode_tf_in'] ?>"
                    data-mesh="<?= $rp['mesh'] ?>"
                    data-bloom="<?= $rp['bloom'] ?>"
                    data-jumlah_po="<?= $rp['jumlah_po_customer'] ?>"
                     value="<?=$rp['id_mkt_po_customer']?>"><?=$rp['no_po_customer']?></option>
                      <?php
                      }
                      ?>
                  </select>
              </div>
            </div>
  
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Nama Customer</label>
                  <input type="text" class="form-control" id="e-nama_customer" name="nama_customer" placeholder="Nama Customer" autocomplete="off" readonly>
              </div>
            </div>
        
            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Nama Barang </label>
                      <input class="form-control" id="e-nama_barang" name="nama_barang" placeholder="Nama Barang"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Kode TF IN </label>
                      <input class="form-control" id="e-kode_tf_in" name="kode_tf_in" placeholder="KODE TF IN"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Mesh </label>
                      <input type="text" class="form-control" id="e-mesh" name="mesh" placeholder="Mesh"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Bloom </label>
                      <input type="text" class="form-control" id="e-bloom" name="bloom" placeholder="Bloom"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah PO (Kg) </label>
                      <input type="text" class="form-control" id="e-jumlah_po" name="jumlah_po" placeholder="Jumlah PO"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="tgl_kirim">Tanggal Kirim</label>
                        <input type="text" class="form-control datepicker" id="e-tgl_kirim" name="tgl_kirim"  placeholder="Tanggal kirim" autocomplete="off" required>
                </div>
            </div>

            <div class="col-md-4">
                  <div class="form-group">
                    <label for="jumlah_kirim">Jumlah Kirim (kg)</label>
                      <input type="number" class="form-control" id="e-jumlah_kirim" name="jumlah_kirim" placeholder="Jumlah Kirim(Kg)" autocomplete="off" required>
                  </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="note_gudang">Note Untuk Gudang</label>
                        <textarea class="form-control" id="e-note_gudang" name="note_gudang" rows="3" placeholder="Note Untuk Gudang" autocomplete="off"></textarea>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="harga_kirim">Harga Kirim (Rp/Kg)</label>
                        <input type="number" class="form-control" id="e-harga_kirim" name="harga_kirim"  placeholder="Harga Kirim" autocomplete="off" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="note_pembayaran">Note Pembayaran</label>
                        <textarea class="form-control" id="e-note_pembayaran" name="note_pembayaran" rows="3" placeholder="Note Pembayaran" autocomplete="off"></textarea>
                </div>
            </div>

            <div class="col-md-4">
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
        onclick = "if (!confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#edit').on('show.bs.modal', function (event) {
  var id_mkt_sppb = $(event.relatedTarget).data('id_mkt_sppb')
  var no_sppb = $(event.relatedTarget).data('no_sppb')
  var tgl_sppb = $(event.relatedTarget).data('tgl_sppb')
  
  var id_mkt_po_customer = $(event.relatedTarget).data('id_mkt_po_customer')
  var no_po = $(event.relatedTarget).data('no_po')  
  var nama_customer = $(event.relatedTarget).data('nama_customer')
  var nama_barang = $(event.relatedTarget).data('nama_barang')
  var kode_tf_in = $(event.relatedTarget).data('kode_tf_in')
  var id_customer = $(event.relatedTarget).data('nama_customer') 
  var id_barang = $(event.relatedTarget).data('nama_barang')
  var mesh = $(event.relatedTarget).data('mesh') 
  var bloom = $(event.relatedTarget).data('bloom')
  var jumlah_po = $(event.relatedTarget).data('jumlah_po') 

  var tgl_kirim = $(event.relatedTarget).data('tgl_kirim') 
  var jumlah_kirim = $(event.relatedTarget).data('jumlah_kirim') 
  var note_gudang = $(event.relatedTarget).data('note_gudang')
  var harga_kirim = $(event.relatedTarget).data('harga_kirim')
  var note_pembayaran = $(event.relatedTarget).data('note_pembayaran') 
  var mkt_admin = $(event.relatedTarget).data('mkt_admin')

  $(this).find('#e-id_mkt_sppb').val(id_mkt_sppb)
  $(this).find('#e-no_sppb').val(no_sppb)
  $(this).find('#e-tgl_sppb').val(tgl_sppb)
  $(this).find('#e-id_mkt_po_customer').val(id_mkt_po_customer)
  $(this).find('#e-id_mkt_po_customer').trigger("chosen:updated");
  $(this).find('#e-nama_customer').val(nama_customer)
  $(this).find('#e-nama_barang').val(nama_barang)
  $(this).find('#e-kode_tf_in').val(kode_tf_in)
  $(this).find('#e-mesh').val(mesh)
  $(this).find('#e-bloom').val(bloom)
  $(this).find('#e-jumlah_po').val(jumlah_po)

  $(this).find('#e-tgl_kirim').val(tgl_kirim)
  $(this).find('#e-jumlah_kirim').val(jumlah_kirim)
  $(this).find('#e-note_gudang').val(note_gudang)
  $(this).find('#e-harga_kirim').val(harga_kirim)
  $(this).find('#e-note_pembayaran').val(note_pembayaran)
  $(this).find('#e-mkt_admin').val(mkt_admin)


  $(this).find('#e-tgl_sppb').datepicker().on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();
  });

  $(this).find('#e-tgl_kirim').datepicker().on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();
  });

  $("#e-no_sppb").keyup(function(){
      var no_sppb =  $("#e-no_sppb").val();
      jQuery.ajax({
        url: "<?=base_url()?>marketing/sppb/cek_no_sppb",
        dataType:'text',
        type: "post",
        data:{no_sppb:no_sppb},
        success:function(response){
          if (response =="true") {
            $("#e-no_sppb").addClass("is-invalid");
            $("#simpan").attr("disabled","disabled");
          }else{
            $("#e-no_sppb").removeClass("is-invalid");
            $("#simpan").removeAttr("disabled");
          }
        }            
      });
    })


    $("select").on('change', function() {
      const selected = $(this).find(':selected').attr('data-nama_customer')
      nama_customer = selected.replaceAll(' ', '')
      $('#e-nama_customer').val(nama_customer)
    });

    $("select").on('change', function() {
      const selected = $(this).find(':selected').attr('data-nama_barang')
      nama_barang = selected.replaceAll(' ', '')
      $('#e-nama_barang').val(nama_barang)
    });

    $("select").on('change', function() {
      const selected = $(this).find(':selected').attr('data-kode_tf_in')
      kode_tf_in = selected.replaceAll(' ', '')
      $('#e-kode_tf_in').val(kode_tf_in)
    });

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
      const selected = $(this).find(':selected').attr('data-jumlah_po')
      jumlah_po = selected.replaceAll(' ', '')
      $('#e-jumlah_po').val(jumlah_po)
    });

})

})

</script>