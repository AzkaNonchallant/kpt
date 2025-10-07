

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
                                        <li class="breadcrumb-item"><a href="javascript:">Barang Masuk</a></li>
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
                                            <h5>Data Barang Masuk</h5>
                                              <div class="float-right">
                                              <div class="input-group">
                                              <select class="form-control chosen-select" id="filter_batch" name="filter_batch">
                                                  <option value="" disabled selected hidden>- NO Batch -</option>
                                                    <?php
                                                      foreach ($res_batch as $nb) { ?>
                                                        <option <?= $no_batch === $nb['no_batch'] ? 'selected' : '' ?> value="<?= $nb['no_batch'] ?>"><?= $nb['no_batch'] ?></option>
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
                                                            <a href="<?=base_url()?>gudang/gudang_barang/barang_masuk/barang_masuk" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
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
                                                            <th>Tgl Msk</th>
                                                            <th>No Batch</th>
                                                            <th>Nama Barang</th>
                                                            <th>Mesh</th>
                                                            <th>Bloom</th>
                                                            <th class="text-center">Qty</th>
                                                            <th class="text-center">Detail</th>
                                                            <!-- <th class="text-center">Aksi</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    	<?php
                                                      $level = $this->session->userdata('level');
                                                    	$no=1;
                                                    	foreach($result as $k){ 
                                                        $tgl_msk_gdg =  explode('-', $k['tgl_msk_gdg'])[2]."/".explode('-', $k['tgl_msk_gdg'])[1]."/".explode('-', $k['tgl_msk_gdg'])[0];
                                                        // $tgl_bayar_pib =  explode('-', $k['tgl_bayar_pib'])[2]."/".explode('-', $k['tgl_bayar_pib'])[1]."/".explode('-', $k['tgl_bayar_pib'])[0];
                                                        // $tgl_exp =  explode('-', $k['tgl_exp'])[2]."/".explode('-', $k['tgl_exp'])[1]."/".explode('-', $k['tgl_exp'])[0];
                                                      ?>
                                                    	<tr>
                                                            <th scope="row"><?=$no++?></th>
                                                            <td><?=$tgl_msk_gdg?></td>
                                                            <td><?=$k['no_batch']?></td>
                                                            <td><?=$k['nama_barang']?></td>
                                                            <td><?=$k['mesh']?></td>
                                                            <td><?=$k['bloom']?></td>
                                                            <td class="text-left"><?=number_format($k['gdg_qty_in'],0,",",".")?> <?=$k['satuan']?></td>
                                                            <td class="text-right">
                                                              <div class="btn-group" role="group" aria-label="Basic example">
                                                                <button type="button" 
                                                                  class="btn btn-info btn-square btn-sm" 
                                                                  data-toggle="modal" 
                                                                  data-target="#detail"
                                                                  data-id_barang_masuk="<?=$k['id_barang_masuk']?>"
                                                                  data-kode_tf_in="<?=$k['kode_tf_in']?>"
                                                                  data-tgl_msk_gdg="<?=$tgl_msk_gdg?>"
                                                                  
                                                                  data-nama_supplier="<?=$k['nama_supplier']?>"
                                                                  data-no_batch="<?=$k['no_batch']?>"
                                                                  data-id_barang="<?=$k['id_barang']?>"
                                                                  data-nama_barang="<?=$k['nama_barang']?>"
                                                                  data-mesh="<?=$k['mesh']?>"
                                                                  data-bloom="<?=$k['bloom']?>"
                                                                  data-gdg_qty_in="<?=number_format($k['gdg_qty_in'],0,",",".")?>"
                                                                  data-gdg_admin="<?=$k['gdg_admin']?>"

                                                                >
                                                                  <i class="feather icon-eye"></i>Detail
                                                                </button>
                                                            </td>
                                                            <!-- <td class="text-right">
                                                              <div class="btn-group  " role="group" aria-label="Basic example">
                                                              
                                                                <button type="button" 
                                                                  class="btn btn-warning btn-square btn-sm text-light" 
                                                                  data-toggle="modal" 
                                                                  data-target="#edit" 



                                                                >
                                                                  <i class="feather icon-edit-2"></i>Edit
                                                                </button>
                                                                <a  
                                                                  href="<?=base_url()?>barang_masuk/delete/<?=$k['id_barang_masuk']?>" 
                                                                  class="btn btn-danger btn-square text-light btn-sm" 
                                                                  onclick = "if (! confirm('Apakah Anda Yakin?')) { return false; }"
                                                                >
                                                                  <i class="feather icon-trash-2"></i>hapus
                                                                </a>
                                                              </div>
                                                              
                                                            </td> -->
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
      var filter_batch = $('#filter_batch').find(':selected').val();
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();

      var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
      var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];
      
      if (filter_tgl =='' && filter_tgl2 !='') {
        window.location = "<?=base_url()?>gudang/gudang_barang/barang_masuk/barang_masuk?alert=warning&msg=dari tanggal belum diisi";
      }else if (filter_tgl !='' && filter_tgl2=='') {
        window.location = "<?=base_url()?>gudang/gudang_barang/barang_masuk/barang_masuk?alert=warning&msg=sampai tanggal belum diisi";
      }else{
        const query = new URLSearchParams({
                    no_batch: filter_batch,
                    nama_barang: filter_barang,
                    date_from: filter_tgl,
                    date_until: filter_tgl2
                })

        window.location = "<?=base_url() ?>gudang/gudang_barang/barang_masuk/barang_masuk/index?"+ query.toString()
        
      }
    })
    $('#export').click(function () {
      
      var filter_barang = $('#filter_barang').find(':selected').val();
      var filter_batch = $('#filter_batch').find(':selected').val();
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();

      var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
      var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];

      if (filter_tgl == '' && filter_tgl2 != '') {
        window.location = "<?= base_url() ?>gudang/gudang_barang/barang_masuk/barang_masuk?alert=warning&msg=dari tanggal belum diisi";
        alert("dari tanggal belum diisi")
      } else if (filter_tgl != '' && filter_tgl2 == '') {
        window.location = "<?= base_url() ?>gudang/gudang_barang/barang_masuk/barang_masuk?alert=warning&msg=sampai tanggal belum diisi";
      } else {
        const query = new URLSearchParams({
                no_batch: filter_batch,
                nama_barang: filter_barang,
                date_from: filter_tgl,
                date_until: filter_tgl2
        })
        var url = "<?= base_url() ?>gudang/gudang_barang/barang_masuk/barang_masuk/pdf_barang_masuk?" + query.toString();
        window.open(url, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    })
  })
</script>

    <!-- Modal ADD
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>barang_masuk/add">
      <div class="modal-body">
        
        <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="kode_tf_in">Kode TF In</label>
                  <input type="text" class="form-control" id="kode_tf_in" name="kode_tf_in" value="TFIN<?= $no+0 ?>" aria-describedby="validationServer03Feedback" autocomplete="off" readonly>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      Maaf Kode TF IN sudah ada.
                    </div>
              </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="tgl_bayar_pib">Tanggal Bayar PIB</label>
                        <input type="text" class="form-control datepicker" id="tgl_bayar_pib" name="tgl_bayar_pib"  placeholder="Tanggal Bayar PIB" autocomplete="off" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="tgl_msk_gdg">Tanggal Masuk Gudang</label>
                        <input type="text" class="form-control datepicker" id="tgl_msk_gdg" name="tgl_msk_gdg"  placeholder="Tanggal Masuk Gudang" autocomplete="off" required>
                </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="no_batch">No Batch</label>
                  <input class="form-control" id="no_batch" name="no_batch" placeholder="No Batch" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlInput1">Jenis Transaksi</label>
                  <select class="form-control chosen-select" id="jenis_transaksi" name="jenis_transaksi" autocomplete="off">
                    <option value="">- Pilih Jenis Transaksi -</option>
                    <option value="Penerimaan">Penerimaan</option>
                    <option value="Koreksi Stok">Koreksi Stok</option>
                    <option value="Recall">Recall</option>
                    <option value="Retur">Retur</option>
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
                    <option data-mesh="<?= $b['mesh'] ?>" data-bloom="<?= $b['bloom'] ?>" data-nama_supplier="<?= $b['nama_supplier'] ?>" value="<?=$b['id_barang']?>">(<?=$b['kode_barang']?>) <?=$b['nama_barang']?></option>
                      <?php
                      }
                      ?>
                  </select>
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
                <label for="exampleFormControlTextarea1">Nama Supplier</label>
                  <input class="form-control" id="nama_supplier" name="nama_supplier" placeholder="Nama Supplier" autocomplete="off" readonly>
              </div>
            </div>

            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah(kg)</label>
                      <input type="number" class="form-control" id="qty_in" name="qty_in" placeholder="Jumlah(Kg)" autocomplete="off" required>
                  </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="tgl_msk_gdg">Tanggal Expired</label>
                        <input type="text" class="form-control datepicker" id="tgl_exp" name="tgl_exp"  placeholder="Tanggal Expired" autocomplete="off" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="no_bl">No BL</label>
                        <input type="text" class="form-control" id="no_bl" name="no_bl"  placeholder="No BL" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan"  placeholder="Keterangan" autocomplete="off" required>
                </div>
            </div>

            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Gudang Admin</label>
                      <input type="text" class="form-control" id="gdg_admin" name="gdg_admin" value="<?=$this->session->userdata('nama')?>"  autocomplete="off" readonly>
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

    $("#kode_tf_in").keyup(function(){
      var kode_tf_in =  $("#kode_tf_in").val();
      jQuery.ajax({
        url: "<?=base_url()?>barang_masuk/cek_kode_tf_in",
        dataType:'text',
        type: "post",
        data:{kode_tf_in:kode_tf_in},
        success:function(response){
          if (response =="true") {
            $("#kode_tf_in").addClass("is-invalid");
            $("#simpan").attr("disabled","disabled");
          }else{
            $("#kode_tf_in").removeClass("is-invalid");
            $("#simpan").removeAttr("disabled");
          }
        }            
      });
    })

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
      const selected = $(this).find(':selected').attr('data-nama_supplier')
      nama_supplier = selected.replaceAll(' ', ' ')
      $('#nama_supplier').val(nama_supplier)
    });

    document.getElementById('qty_in').addEventListener('keyup', function(e) {
    let value = this.value.replace(/\D/g,'');
    value = new Intl.NumberFormat('id-ID').format(value);
    this.value = value;
    });

  });
</script> -->

<!-- Modal Detail -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Barang masuk</h5>
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
              <label>Kode TF IN</label>
              <input type="text" class="form-control" id="v-kode_tf_in" readonly>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Tanggal Masuk Gudang</label>
              <input type="text" class="form-control" id="v-tgl_msk_gdg" readonly>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>No Batch</label>
              <input type="text" class="form-control" id="v-no_batch" readonly>
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
              <input type="text" class="form-control" id="v-gdg_qty_in" readonly>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Gudang Admin</label>
              <input type="text" class="form-control" id="v-gdg_admin" readonly>
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

    var kode_tf_in          = button.data('kode_tf_in');
    var tgl_msk_gdg         = button.data('tgl_msk_gdg');
    var no_batch            = button.data('no_batch');
    var nama_supplier       = button.data('nama_supplier');
    var id_barang           = button.data('nama_barang');
    var mesh                = button.data('mesh');
    var bloom               = button.data('bloom');
    var gdg_qty_in          = button.data('gdg_qty_in');
    var gdg_admin           = button.data('gdg_admin');

    // Set value ke input
    $('#v-kode_tf_in').val(kode_tf_in);
    $('#v-tgl_msk_gdg').val(tgl_msk_gdg);
    $('#v-no_batch').val(no_batch);
    $('#v-nama_supplier').val(nama_supplier);
    $('#v-id_barang').val(id_barang);
    $('#v-mesh').val(mesh);
    $('#v-bloom').val(bloom);
    $('#v-gdg_qty_in').val(gdg_qty_in);
    $('#v-gdg_admin').val(gdg_admin);
  });
});
</script>

<!-- Modal ADD
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Barang Masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>barang_masuk/update">
      <div class="modal-body">
      <input type="hidden" id="e-id_barang_masuk" name="id_barang_masuk">
        <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="kode_tf_in">Kode TF In</label>
                  <input type="text" class="form-control" id="e-kode_tf_in" name="kode_tf_in"  aria-describedby="validationServer03Feedback" autocomplete="off" readonly>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      Maaf Kode TF IN sudah ada.
                    </div>
              </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="tgl_bayar_pib">Tanggal Bayar PIB</label>
                        <input type="text" class="form-control datepicker" id="e-tgl_bayar_pib" name="tgl_bayar_pib"  placeholder="Tanggal Bayar PIB" autocomplete="off" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="tgl_msk_gdg">Tanggal Masuk Gudang</label>
                        <input type="text" class="form-control datepicker" id="e-tgl_msk_gdg" name="tgl_msk_gdg"  placeholder="Tanggal Masuk Gudang" autocomplete="off" required>
                </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="no_batch">No Batch</label>
                  <input class="form-control" id="e-no_batch" name="no_batch" placeholder="No Batch" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlInput1">Jenis Transaksi</label>
                  <select class="form-control chosen-select" id="e-jenis_transaksi" name="jenis_transaksi" autocomplete="off">
                    <option value="">- Pilih Jenis Transaksi -</option>
                    <option value="Penerimaan">Penerimaan</option>
                    <option value="Koreksi Stok">Koreksi Stok</option>
                    <option value="Recall">Recall</option>
                    <option value="Retur">Retur</option>
                  </select>
              </div>
            </div>
  
            <div class="col-md-4">
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
  
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Mesh</label>
                  <input class="form-control" id="e-mesh" name="mesh" placeholder="Mesh" autocomplete="off" readonly>
              </div>
            </div>
        
            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Bloom</label>
                      <input type="text" class="form-control" id="e-bloom" name="bloom" placeholder="Bloom"  autocomplete="off" readonly>
                  </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Nama Supplier</label>
                  <input class="form-control" id="e-nama_supplier" name="nama_supplier" placeholder="Nama Supplier" autocomplete="off" readonly>
              </div>
            </div>

            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah(kg)</label>
                      <input type="number" class="form-control" id="e-qty_in" name="qty_in" placeholder="Jumlah(Kg)" autocomplete="off" required>
                  </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="tgl_msk_gdg">Tanggal Expired</label>
                        <input type="text" class="form-control datepicker" id="e-tgl_exp" name="tgl_exp"  placeholder="Tanggal Expired" autocomplete="off" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="no_bl">No BL</label>
                        <input type="text" class="form-control" id="e-no_bl" name="no_bl"  placeholder="No BL" autocomplete="off" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="e-keterangan" name="keterangan"  placeholder="Keterangan" autocomplete="off" required>
                </div>
            </div>

            <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Gudang Admin</label>
                      <input type="text" class="form-control" id="e-gdg_admin" name="gdg_admin" value="<?=$this->session->userdata('nama')?>"  autocomplete="off" readonly>
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
  var id_barang_masuk = $(event.relatedTarget).data('id_barang_masuk') 
  var kode_tf_in = $(event.relatedTarget).data('kode_tf_in')
  var no_batch = $(event.relatedTarget).data('no_batch')
  var tgl_bayar_pib = $(event.relatedTarget).data('tgl_bayar_pib') 
  var tgl_msk_gdg = $(event.relatedTarget).data('tgl_msk_gdg')
  var jenis_transaksi = $(event.relatedTarget).data('jenis_transaksi')
  var id_barang = $(event.relatedTarget).data('id_barang') 
  var mesh = $(event.relatedTarget).data('mesh') 
  var bloom = $(event.relatedTarget).data('bloom') 
  var nama_supplier = $(event.relatedTarget).data('nama_supplier') 
  var qty_in = $(event.relatedTarget).data('qty_in')
  var tgl_exp = $(event.relatedTarget).data('tgl_exp') 
  var no_bl = $(event.relatedTarget).data('no_bl') 
  var keterangan = $(event.relatedTarget).data('keterangan') 
  var gdg_admin = $(event.relatedTarget).data('gdg_admin') 

  $(this).find('#e-id_barang_masuk').val(id_barang_masuk)
  $(this).find('#e-kode_tf_in').val(kode_tf_in)
  $(this).find('#e-no_batch').val(no_batch)
  $(this).find('#e-tgl_bayar_pib').val(tgl_bayar_pib)
  $(this).find('#e-tgl_msk_gdg').val(tgl_msk_gdg)
  $(this).find('#e-jenis_transaksi').val(jenis_transaksi)
  $(this).find('#e-jenis_transaksi').trigger("chosen:updated");
  $(this).find('#e-id_barang').val(id_barang)
  $(this).find('#e-id_barang').trigger("chosen:updated");
  $(this).find('#e-nama_supplier').val(nama_supplier)
  $(this).find('#e-mesh').val(mesh)
  $(this).find('#e-bloom').val(bloom)
  $(this).find('#e-qty_in').val(qty_in)
  $(this).find('#e-tgl_exp').val(tgl_exp)
  $(this).find('#e-no_bl').val(no_bl)
  $(this).find('#e-keterangan').val(keterangan)
  $(this).find('#e-gdg_admin').val(gdg_admin)
  $(this).find('#e-tgl_bayar_pib').datepicker().on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();
  });
  $(this).find('#e-tgl_msk_gdg').datepicker().on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();
  });
  $(this).find('#e-tgl_exp').datepicker().on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();
  });

    $("select").on('change', function() {
      const selected = $(this).find(':selected').attr('data-mesh')
      mesh = selected.replaceAll(' ', ' ')
      $('#e-mesh').val(mesh)
    });

    $("select").on('change', function() {
      const selected = $(this).find(':selected').attr('data-bloom')
      bloom = selected.replaceAll(' ', ' ')
      $('#e-bloom').val(bloom)
    });

    $("select").on('change', function() {
      const selected = $(this).find(':selected').attr('data-nama_supplier')
      nama_supplier = selected.replaceAll(' ', ' ')
      $('#e-nama_supplier').val(nama_supplier)
    });
})

})

</script> -->
