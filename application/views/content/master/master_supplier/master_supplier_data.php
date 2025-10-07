

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
                                        <!-- <h5 class="m-b-10">Data Supplier</h5> -->
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Master Supplier</a></li>
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
                                            <h5>Data Master Supplier</h5>
                                            
                                            <div class="float-right">
                                              <div class="input-group">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-success float-right btn-sm" id="export" type="button">Cetak Vendor List</button>
                                                        </div>
                                            <!-- Button trigger modal -->
                      											<button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      												<i class="feather icon-user-plus"></i>Tambah Supplier
                      											</button>
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
                                                            <th>Kode Supplier</th>
                                                            <th>Nama Supplier</th>
                                                            <th>PIC Supplier</th>
                                                            <th class="text-center">Detail</th>
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
                                                            <td><?=$k['kode_supplier']?></td>
                                                            <td><?=$k['nama_supplier']?></td>
                                                            <td><?=$k['pic_supplier']?></td>
                                                            <td class="text-center">
                                                              <div class="btn-group" role="group" aria-label="Basic example">
                                                                <button type="button" 
                                                                  class="btn btn-info btn-square btn-sm" 
                                                                  data-toggle="modal" 
                                                                  data-target="#detail" 

                                                                  data-id_supplier="<?=$k['id_supplier']?>"
                                                                  data-kode_supplier="<?=$k['kode_supplier']?>"
                                                                  data-nama_supplier="<?=$k['nama_supplier']?>"
                                                                  data-alamat_supplier="<?=$k['alamat_supplier']?>"
                                                                  data-negara_asal="<?=$k['negara_asal']?>"
                                                                  data-pic_supplier="<?=$k['pic_supplier']?>"
                                                                  data-no_sertif_halal="<?=$k['no_sertif_halal']?>"
                                                                >
                                                                  <i class="feather icon-eye"></i>Detail
                                                                </button>
                                                              </div>
                                                            <td class="text-center">
                                                              <div class="btn-group" role="group" aria-label="Basic example">
                                                                <button type="button" 
                                                                  class="btn btn-warning btn-square btn-sm" 
                                                                  data-toggle="modal" 
                                                                  data-target="#edit" 

                                                                  data-id_supplier="<?=$k['id_supplier']?>"
                                                                  data-kode_supplier="<?=$k['kode_supplier']?>"
                                                                  data-nama_supplier="<?=$k['nama_supplier']?>"
                                                                  data-alamat_supplier="<?=$k['alamat_supplier']?>"
                                                                  data-negara_asal="<?=$k['negara_asal']?>"
                                                                  data-pic_supplier="<?=$k['pic_supplier']?>"
                                                                  data-no_sertif_halal="<?=$k['no_sertif_halal']?>"
                                                                >
                                                                  <i class="feather icon-edit-2"></i>Update
                                                                </button>
                                                                <a  
                                                                  href="<?=base_url()?>master/master_supplier/delete/<?=$k['id_supplier']?>" 
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah supplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>master/master_supplier/add">
      <div class="modal-body">

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlInput1">Kode Supplier</label>
                <input type="text" class="form-control" id="kode_supplier" name="kode_supplier" placeholder="Kode Supplier" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                  <div id="validationServer03Feedback" class="invalid-feedback">
                    Maaf Kode supplier sudah ada.
                  </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlInput1">Nama Supplier</label>
                <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" placeholder="Nama Supplier" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
            </div>
          </div>

          <div class="col-md-6">
		        <div class="form-group">
		          <label for="exampleFormControlInput1">PIC Supplier</label>
		            <input type="text" class="form-control" id="pic_supplier" name="pic_supplier" placeholder="PIC Supplier" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
		        </div>
          </div>
      
          <div class="col-md-6">
		        <div class="form-group">
		          <label for="exampleFormControlInput1">Negara Asal</label>
		            <input type="text" class="form-control" id="negara_asal" name="negara_asal" placeholder="Negara Asal" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
		        </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Alamat Supplier</label>
                <textarea class="form-control" id="alamat_supplier" name="alamat_supplier" rows="3" placeholder="Alamat Supplier" autocomplete="off"></textarea>
            </div>
          </div>

          <div class="col-md-6">
		        <div class="form-group">
		          <label for="exampleFormControlInput1">Nomor Sertifikat Halal</label>
		            <input type="text" class="form-control" id="no_sertif_halal" name="no_sertif_halal" placeholder="No Sertifikat Halal" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
		        </div>
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="simpan" class="btn btn-primary"
        onclick = "if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali.')) { return false; }">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {

    $("#kode_supplier").keyup(function(){
      var kode_supplier =  $("#kode_supplier").val();
      jQuery.ajax({
        url: "<?=base_url()?>master/master_supplier/cek_kode_supplier",
        dataType:'text',
        type: "post",
        data:{kode_supplier:kode_supplier},
        success:function(response){
          if (response =="true") {
            $("#kode_supplier").addClass("is-invalid");
            $("#simpan").attr("disabled","disabled");
          }else{
            $("#kode_supplier").removeClass("is-invalid");
            $("#simpan").removeAttr("disabled");
          }
        }            
      });
    })
  });
</script>

<!-- Modal Detail  -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail supplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlInput1">Kode Supplier</label>
                <input type="text" class="form-control" id="v-kode_supplier" name="kode_supplier" placeholder="Kode Supplier" autocomplete="off" readonly>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlInput1">Nama Supplier</label>
                <input type="text" class="form-control" id="v-nama_supplier" name="nama_supplier" placeholder="Nama Supplier" maxlength="100" autocomplete="off" readonly>
            </div>
          </div>

          <div class="col-md-6">
		        <div class="form-group">
		          <label for="exampleFormControlInput1">PIC Supplier</label>
		            <input type="text" class="form-control" id="v-pic_supplier" name="pic_supplier" placeholder="PIC Supplier" maxlength="100" autocomplete="off" readonly>
		        </div>
          </div>
      
          <div class="col-md-6">
		        <div class="form-group">
		          <label for="exampleFormControlInput1">Negara Asal</label>
		            <input type="text" class="form-control" id="v-negara_asal" name="negara_asal" placeholder="Negara Asal" maxlength="100" autocomplete="off" readonly>
		        </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Alamat Supplier</label>
                <textarea class="form-control" id="v-alamat_supplier" name="alamat_supplier" rows="3" placeholder="Alamat Supplier" autocomplete="off" readonly></textarea>
            </div>
          </div>

          <div class="col-md-6">
		        <div class="form-group">
		          <label for="exampleFormControlInput1">Nomor Sertifikat Halal</label>
		            <input type="text" class="form-control" id="v-no_sertif_halal" name="no_sertif_halal" placeholder="No Sertifikat Halal" maxlength="100" autocomplete="off" readonly>
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
  var id_supplier = $(event.relatedTarget).data('id_supplier') 
  var kode_supplier = $(event.relatedTarget).data('kode_supplier') 
  var nama_supplier = $(event.relatedTarget).data('nama_supplier') 
  var alamat_supplier = $(event.relatedTarget).data('alamat_supplier') 
  var negara_asal = $(event.relatedTarget).data('negara_asal')
  var pic_supplier = $(event.relatedTarget).data('pic_supplier')
  var no_sertif_halal = $(event.relatedTarget).data('no_sertif_halal')

  $(this).find('#v-id_supplier').val(id_supplier)
  $(this).find('#v-kode_supplier').val(kode_supplier)
  $(this).find('#v-nama_supplier').val(nama_supplier)
  $(this).find('#v-alamat_supplier').val(alamat_supplier)
  $(this).find('#v-negara_asal').val(negara_asal)
  $(this).find('#v-pic_supplier').val(pic_supplier)
  $(this).find('#v-no_sertif_halal').val(no_sertif_halal)

  })

});
</script>

<!-- Modal  Edit-->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update supplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>master/master_supplier/update">
      <div class="modal-body">

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlInput1">Kode Supplier</label>
              <input type="hidden" id="e-id_supplier" name="id_supplier">
                <input type="text" class="form-control" id="e-kode_supplier" name="kode_supplier" placeholder="Kode Supplier" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                  <div id="validationServer03Feedback" class="invalid-feedback">
                    Maaf Kode supplier sudah ada.
                  </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlInput1">Nama Supplier</label>
                <input type="text" class="form-control" id="e-nama_supplier" name="nama_supplier" placeholder="Nama Supplier" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
            </div>
          </div>

          <div class="col-md-6">
		        <div class="form-group">
		          <label for="exampleFormControlInput1">PIC Supplier</label>
		            <input type="text" class="form-control" id="e-pic_supplier" name="pic_supplier" placeholder="PIC Supplier" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
		        </div>
          </div>
      
          <div class="col-md-6">
		        <div class="form-group">
		          <label for="exampleFormControlInput1">Negara Asal</label>
		            <input type="text" class="form-control" id="e-negara_asal" name="negara_asal" placeholder="Negara Asal" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
		        </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Alamat Supplier</label>
                <textarea class="form-control" id="e-alamat_supplier" name="alamat_supplier" rows="3" placeholder="Alamat Supplier" autocomplete="off"></textarea>
            </div>
          </div>

          <div class="col-md-6">
		        <div class="form-group">
		          <label for="exampleFormControlInput1">Nomor Sertifikat Halal</label>
		            <input type="text" class="form-control" id="e-no_sertif_halal" name="no_sertif_halal" placeholder="No Sertifikat Halal" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
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
  var id_supplier = $(event.relatedTarget).data('id_supplier') 
  var kode_supplier = $(event.relatedTarget).data('kode_supplier') 
  var nama_supplier = $(event.relatedTarget).data('nama_supplier') 
  var alamat_supplier = $(event.relatedTarget).data('alamat_supplier')
  var negara_asal = $(event.relatedTarget).data('negara_asal') 
  var pic_supplier = $(event.relatedTarget).data('pic_supplier') 
  var no_sertif_halal = $(event.relatedTarget).data('no_sertif_halal') 

  $(this).find('#e-id_supplier').val(id_supplier)
  $(this).find('#e-kode_supplier').val(kode_supplier)
  $(this).find('#e-nama_supplier').val(nama_supplier)
  $(this).find('#e-alamat_supplier').val(alamat_supplier)
  $(this).find('#e-negara_asal').val(negara_asal)
  $(this).find('#e-pic_supplier').val(pic_supplier)
  $(this).find('#e-no_sertif_halal').val(no_sertif_halal)

  })

  $("#e-kode_supplier").keyup(function(){
      var kode_supplier =  $("#e-kode_supplier").val();
      jQuery.ajax({
        url: "<?=base_url()?>master/master_supplier/cek_kode_supplier",
        dataType:'text',
        type: "post",
        data:{kode_supplier:kode_supplier},
        success:function(response){
          if (response =="true") {
            $("#e-kode_supplier").addClass("is-invalid");
            $("#simpan").attr("disabled","disabled");
          }else{
            $("#e-kode_supplier").removeClass("is-invalid");
            $("#simpan").removeAttr("disabled");
          }
        }            
      });
    })

});
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#export').click(function () {

        var url = "<?=base_url()?>master/master_supplier/pdf_vendor_list/";
        window.open(url, 'pdf_laporan_vendor_list', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      
    })
    
  })
</script>