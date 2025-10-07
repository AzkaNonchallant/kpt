

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
                                        <!-- <h5 class="m-b-10"></h5> -->
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Barang</a></li>
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
                                            <h5>Data Master Barang</h5>
                                            <div class="float-right">
                                              <div class="input-group">
                                                <div class="input-group-append">
                                                  <button class="btn btn-success float-right btn-sm" id="export" type="button">Cetak Daftar Barang</button>
                                                </div>
                                            <!-- Button trigger modal -->
                      											      <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      												      <i class="feather icon-plus"></i>Tambah Barang
                      											      </button>
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
                                                            <th>Kode Bahan Baku</th>
                                                            <th>Nama Bahan Baku</th>
                                                            <th>Mesh</th>
                                                            <th>Satuan</th>
                                                            <th>Bloom</th>
                                                            <th>Detail</th>
                                                            <th class="text-center">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    	<?php 
                                                    	$no=1;
                                                    	foreach($result as $k){ 
                                                    	?>
                                                    	<tr>
                                                            <th scope="row"><?=$no++?></th>
                                                            <td><?=$k['kode_barang']?></td>
                                                            <td><?=$k['nama_barang']?></td>
                                                            <td><?=$k['mesh']?></td>
                                                            <td><?=$k['satuan']?></td>
                                                            <td><?=$k['bloom']?></td>
                                                            <td class="text-center">
                                                              <div class="btn-group" role="group" aria-label="Basic example">
                                                                <button type="button" 
                                                                  class="btn btn-info btn-square btn-sm" 
                                                                  data-toggle="modal" 
                                                                  data-target="#detail" 

                                                                  data-id_barang="<?=$k['id_barang']?>"
                                                                  data-kode_barang="<?=$k['kode_barang']?>"
                                                                  data-kode_barang_bpom="<?=$k['kode_barang_bpom']?>"
                                                                  data-nama_barang="<?=$k['nama_barang']?>"
                                                                  data-mesh="<?=$k['mesh']?>"
                                                                  data-bloom="<?=$k['bloom']?>"
                                                                  data-satuan="<?=$k['satuan']?>"
                                                                  data-id_supplier="<?=$k['id_supplier']?>"
                                                                  data-nama_supplier="<?=$k['nama_supplier']?>"
                                                                >
                                                                  <i class="feather icon-eye"></i>Detail
                                                                </button>
                                                              </div>
                                                            </td>
                                                            <td class="text-center">
                                                              <div class="btn-group" role="group" aria-label="Basic example">
                                                                <button type="button" 
                                                                  class="btn btn-warning btn-square btn-sm" 
                                                                  data-toggle="modal" 
                                                                  data-target="#edit" 

                                                                  data-id_barang="<?=$k['id_barang']?>"
                                                                  data-kode_barang="<?=$k['kode_barang']?>"
                                                                  data-kode_barang_bpom="<?=$k['kode_barang_bpom']?>"
                                                                  data-nama_barang="<?=$k['nama_barang']?>"
                                                                  data-mesh="<?=$k['mesh']?>"
                                                                  data-bloom="<?=$k['bloom']?>"
                                                                  data-satuan="<?=$k['satuan']?>"
                                                                  data-id_supplier="<?=$k['id_supplier']?>"
                                                                  data-nama_supplier="<?=$k['nama_supplier']?>"
                                                                >
                                                                  <i class="feather icon-edit-2"></i>Edit
                                                                </button>
                                                                <a  
                                                                  href="<?=base_url()?>master/master_barang/delete/<?=$k['id_barang']?>" 
                                                                  class="btn btn-danger btn-square text-light btn-sm" 
                                                                  onclick = "if (! confirm('Apakah Anda Yakin?')) { return false; }"
                                                                >
                                                                  <i class="feather icon-trash-2"></i>hapus
                                                                </a>
                                                              </div>
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

    <!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>master/master_barang/add">
      <div class="modal-body">
        
      <div class="row">

          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlInput1">Kode Bahan Baku BPOM</label>
                <input type="text" class="form-control" id="kode_barang_bpom" name="kode_barang_bpom" value="010186" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" readonly>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlInput1">Kode Bahan Baku</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Kode Barang" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                  <div id="validationServer03Feedback" class="invalid-feedback">
                    Maaf Kode Bahan Baku sudah ada.
                  </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlInput1">Nama Bahan Baku</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Bahan Baku" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Mesh</label>
                <input class="form-control" id="mesh" name="mesh" placeholder="Mesh" autocomplete="off" required>
            </div>
          </div>
      
          <div class="col-md-6">
		        <div class="form-group">
		          <label for="exampleFormControlInput1">Bloom</label>
		            <input type="text" class="form-control" id="bloom" name="bloom" placeholder="Bloom" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
		        </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="kegiatan_usaha">Satuan</label>
                <select class="form-control chosen-select" id="satuan" name="satuan" autocomplete="off">
                  <option value="">- Pilih Satuan -</option>
                  <option value="Kg">Kg</option>
                  <option value="g">g</option>
                </select>
            </div>
          </div>

          <div class="col-md-6">
		        <div class="form-group">
              <label for="id_supplier">Nama Supplier</label>
                <select class="form-control chosen-select" id="id_supplier" name="id_supplier" autocomplete="off" required>
                  <option value="">-Pilih Nama Supplier -</option>
                    <?php 
                      foreach($res_supplier as $s){ 
                    ?>
                  <option value="<?=$s['id_supplier']?>">(<?=$s['kode_supplier']?>) <?=$s['nama_supplier']?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="simpan" class="btn btn-primary"
        onclick = "if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali.')) { return false; }">Simpan</button>
      </div>
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {

    $("#kode_barang").keyup(function(){
      var kode_barang =  $("#kode_barang").val();
      jQuery.ajax({
        url: "<?=base_url()?>master/master_barang/cek_kode_barang",
        dataType:'text',
        type: "post",
        data:{kode_barang:kode_barang},
        success:function(response){
          if (response =="true") {
            $("#kode_barang").addClass("is-invalid");
            $("#simpan").attr("disabled","disabled");
          }else{
            $("#kode_barang").removeClass("is-invalid");
            $("#simpan").removeAttr("disabled");
          }
        }            
      });
    })
  });
</script>

<!-- Modal Detail-->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
  
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlInput1">Kode Bahan Baku BPOM</label>
                  <input type="text" class="form-control" id="v_kode_barang_bpom" name="kode_barang_bpom" placeholder="Kode Barang BPOM" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" readonly>
              </div>
            </div>
  
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlInput1">Kode Bahan Baku</label>
                  <input type="text" class="form-control" id="v_kode_barang" name="kode_barang" placeholder="Kode Barang" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" readonly>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      Maaf Kode Bahan Baku sudah ada.
                    </div>
              </div>
            </div>
  
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlInput1">Nama Bahan Baku</label>
                  <input type="text" class="form-control" id="v_nama_barang" name="nama_barang" placeholder="Nama Bahan Baku" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" readonly>
              </div>
            </div>
  
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Mesh</label>
                  <input class="form-control" id="v_mesh" name="mesh" placeholder="Mesh" autocomplete="off" readonly>
              </div>
            </div>
        
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlInput1">Bloom</label>
                  <input type="text" class="form-control" id="v_bloom" name="bloom" placeholder="Bloom" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" readonly>
              </div>
            </div>
  
            <div class="col-md-6">
              <div class="form-group">
                <label for="kegiatan_usaha">Satuan</label>
                <input type="text" class="form-control" id="v_satuan" name="satuan" placeholder="Satuan" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" readonly>
              </div>
            </div>
  
            <div class="col-md-6">
              <div class="form-group">
                <label for="id_supplier">Nama Supplier</label>
                <input type="text" class="form-control" id="v_nama_supplier" name="nama_supplier" placeholder="Nama Supplier" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" readonly>

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
  var id_barang = $(event.relatedTarget).data('id_barang') 
  var kode_barang = $(event.relatedTarget).data('kode_barang')
  var kode_barang_bpom = $(event.relatedTarget).data('kode_barang_bpom') 
  var nama_barang = $(event.relatedTarget).data('nama_barang') 
  var mesh = $(event.relatedTarget).data('mesh') 
  var satuan = $(event.relatedTarget).data('satuan') 
  var bloom = $(event.relatedTarget).data('bloom')
  var id_supplier = $(event.relatedTarget).data('id_supplier') 
  var nama_supplier = $(event.relatedTarget).data('nama_supplier') 

  $(this).find('#v_id_barang').val(id_barang)
  $(this).find('#v_kode_barang').val(kode_barang)
  $(this).find('#v_kode_barang_bpom').val(kode_barang_bpom)
  $(this).find('#v_nama_barang').val(nama_barang)
  $(this).find('#v_mesh').val(mesh)
  $(this).find('#v_satuan').val(satuan)
  $(this).find('#v_bloom').val(bloom)
  $(this).find('#v_id_supplier').val(id_supplier)
  $(this).find('#v_nama_supplier').val(nama_supplier)
})

})

</script>

<!-- Modal Detail-->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Master Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?=base_url()?>master/master_barang/update">
      <input type="hidden" id="e_id_barang" name="id_barang">
      <div class="row">

          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlInput1">Kode Bahan Baku BPOM</label>
                <input type="text" class="form-control" id="e_kode_barang_bpom" name="kode_barang_bpom" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" readonly>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlInput1">Kode Bahan Baku</label>
                <input type="text" class="form-control" id="e_kode_barang" name="kode_barang" placeholder="Kode Barang" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                  <div id="validationServer03Feedback" class="invalid-feedback">
                    Maaf Kode Bahan Baku sudah ada.
                  </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlInput1">Nama Bahan Baku</label>
                <input type="text" class="form-control" id="e_nama_barang" name="nama_barang" placeholder="Nama Bahan Baku" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Mesh</label>
                <input class="form-control" id="e_mesh" name="mesh" placeholder="Mesh" autocomplete="off" required>
            </div>
          </div>
      
          <div class="col-md-6">
		        <div class="form-group">
		          <label for="exampleFormControlInput1">Bloom</label>
		            <input type="text" class="form-control" id="e_bloom" name="bloom" placeholder="Bloom" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
		        </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="kegiatan_usaha">Satuan</label>
                <select class="form-control chosen-select" id="e_satuan" name="satuan" autocomplete="off">
                  <option value="">- Pilih Satuan -</option>
                  <option value="Kg">Kg</option>
                  <option value="g">g</option>
                </select>
            </div>
          </div>

          <div class="col-md-6">
		        <div class="form-group">
              <label for="id_supplier">Nama Supplier</label>
                <select class="form-control chosen-select" id="e_id_supplier" name="id_supplier" autocomplete="off" required>
                  <option value="">-Pilih Nama Supplier -</option>
                    <?php 
                      foreach($res_supplier as $s){ 
                    ?>
                  <option value="<?=$s['id_supplier']?>">(<?=$s['kode_supplier']?>) <?=$s['nama_supplier']?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="simpan" class="btn btn-primary"
        onclick = "if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali.')) { return false; }">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#edit').on('show.bs.modal', function (event) {
  var id_barang = $(event.relatedTarget).data('id_barang') 
  var kode_barang = $(event.relatedTarget).data('kode_barang')
  var kode_barang_bpom = $(event.relatedTarget).data('kode_barang_bpom') 
  var nama_barang = $(event.relatedTarget).data('nama_barang') 
  var mesh = $(event.relatedTarget).data('mesh') 
  var satuan = $(event.relatedTarget).data('satuan') 
  var bloom = $(event.relatedTarget).data('bloom')
  var id_supplier = $(event.relatedTarget).data('id_supplier') 
  var nama_supplier = $(event.relatedTarget).data('nama_supplier') 

  $(this).find('#e_id_barang').val(id_barang)
  $(this).find('#e_kode_barang').val(kode_barang)
  $(this).find('#e_kode_barang_bpom').val(kode_barang_bpom)
  $(this).find('#e_nama_barang').val(nama_barang)
  $(this).find('#e_mesh').val(mesh)
  $(this).find('#e_satuan').val(satuan)
  $(this).find('#e_satuan').trigger("chosen:updated");
  $(this).find('#e_bloom').val(bloom)
  $(this).find('#e_id_supplier').val(id_supplier)
  $(this).find('#e_id_supplier').trigger("chosen:updated");
  $(this).find('#e_nama_supplier').val(nama_supplier)

  $("#e_kode_barang").keyup(function(){
      var kode_barang =  $("#e_kode_barang").val();
      jQuery.ajax({
        url: "<?=base_url()?>master/master_barang/cek_kode_barang",
        dataType:'text',
        type: "post",
        data:{kode_barang:kode_barang},
        success:function(response){
          if (response =="true") {
            $("#e_kode_barang").addClass("is-invalid");
            $("#simpan").attr("disabled","disabled");
          }else{
            $("#e_kode_barang").removeClass("is-invalid");
            $("#simpan").removeAttr("disabled");
          }
        }            
      });
    })
})

})

</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#export').click(function () {

        var url = "<?=base_url()?>master/master_barang/pdf_daftar_barang/";
        window.open(url, 'pdf_laporan_daftar_barang', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      
    })
    
  })
</script>