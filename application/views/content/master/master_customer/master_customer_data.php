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
                                        <!-- <h5 class="m-b-10">Data Customer</h5> -->
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Master Customer</a></li>
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
                                            <h5>Data Master Customer</h5>
                                            <div class="float-right">
                                              <div class="input-group">
                                                <div class="input-group-append">
                                                  <button class="btn btn-success float-right btn-sm" id="export" type="button">Cetak Customer List</button>
                                                </div>
                                            <!-- Button trigger modal -->
                      											      <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      												      <i class="feather icon-user-plus"></i>Tambah Master Customer
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
                                                            <th>Kode Customer</th>
                                                            <th>Nama Customer</th>
                                                            <th>Kegiatan Usaha</th>
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
                                                            <td><?=$k['kode_customer']?></td>
                                                            <td><?=$k['nama_customer']?></td>
                                                            <td><?=$k['kegiatan_usaha']?></td>
                                                            <td class="text-right">
                                                              <div class="btn-group" role="group" aria-label="Basic example">
                                                                <button type="button" 
                                                                  class="btn btn-info btn-square btn-sm" 
                                                                  data-toggle="modal" 
                                                                  data-target="#detail" 

                                                                  data-id_customer="<?=$k['id_customer']?>"
                                                                  data-kode_customer="<?=$k['kode_customer']?>"
                                                                  data-nama_customer="<?=$k['nama_customer']?>"
                                                                  data-kegiatan_usaha="<?=$k['kegiatan_usaha']?>"
                                                                  data-alamat_customer="<?=$k['alamat_customer']?>"
                                                                  data-provinsi="<?=$k['provinsi']?>"
                                                                  data-kota_kab="<?=$k['kota_kab']?>"
                                                                  data-nib="<?=$k['nib']?>"
                                                                >
                                                                  <i class="feather icon-eye"></i>Detail
                                                                </button>
                                                              </div>
                                                            </td>
                                                            <td class="text-right">
                                                              <div class="btn-group" role="group" aria-label="Basic example">
                                                                <button type="button" 
                                                                  class="btn btn-warning btn-square btn-sm" 
                                                                  data-toggle="modal" 
                                                                  data-target="#edit" 

                                                                  data-id_customer="<?=$k['id_customer']?>"
                                                                  data-kode_customer="<?=$k['kode_customer']?>"
                                                                  data-nama_customer="<?=$k['nama_customer']?>"
                                                                  data-kegiatan_usaha="<?=$k['kegiatan_usaha']?>"
                                                                  data-alamat_customer="<?=$k['alamat_customer']?>"
                                                                  data-provinsi="<?=$k['provinsi']?>"
                                                                  data-kota_kab="<?=$k['kota_kab']?>"
                                                                  data-nib="<?=$k['nib']?>"
                                                                >
                                                                  <i class="feather icon-edit-2"></i>Edit
                                                                </button>
                                                                <a  
                                                                  href="<?=base_url()?>master/master_customer/delete/<?=$k['id_customer']?>" 
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>master/master_customer/add">
      <div class="modal-body">

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlInput1">Kode Customer</label>
                <input type="text" class="form-control" id="kode_customer" name="kode_customer" placeholder="Kode Customer" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                  <div id="validationServer03Feedback" class="invalid-feedback">
                    Maaf Kode Customer sudah ada.
                  </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlInput1">Nama Customer</label>
                <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Nama Customer" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="kegiatan_usaha">Kegiatan Usaha</label>
                <select class="form-control chosen-select" id="kegiatan_usaha" name="kegiatan_usaha" autocomplete="off">
                  <option value="">- Pilih Kegiatan Usaha -</option>
                  <option value="Produksi">Produksi</option>
                  <option value="Distributor">Distributor</option>
                </select>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Alamat Customer</label>
                <textarea class="form-control" id="alamat_customer" name="alamat_customer" rows="3" placeholder="Alamat Customer" autocomplete="off"></textarea>
            </div>
          </div>
      
          <div class="col-md-6">
		        <div class="form-group">
		          <label for="exampleFormControlInput1">Provinsi</label>
		            <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Provinsi" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
		        </div>
          </div>

          <div class="col-md-6">
		        <div class="form-group">
		          <label for="exampleFormControlInput1">Kota/Kab</label>
		            <input type="text" class="form-control" id="kota_kab" name="kota_kab" placeholder="Kota/Kab" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
		        </div>
          </div>

          <div class="col-md-6">
		        <div class="form-group">
		          <label for="exampleFormControlInput1">NIB</label>
		            <input type="text" class="form-control" id="nib" name="nib" placeholder="NIB" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
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

    $("#kode_customer").keyup(function(){
      var kode_customer =  $("#kode_customer").val();
      jQuery.ajax({
        url: "<?=base_url()?>master/master_customer/cek_kode_customer",
        dataType:'text',
        type: "post",
        data:{kode_customer:kode_customer},
        success:function(response){
          if (response =="true") {
            $("#kode_customer").addClass("is-invalid");
            $("#simpan").attr("disabled","disabled");
          }else{
            $("#kode_customer").removeClass("is-invalid");
            $("#simpan").removeAttr("disabled");
          }
        }            
      });
    })
  });
</script>


<!-- Modal Edit-->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlInput1">Kode Customer</label>
                <input type="text" class="form-control" id="v_kode_customer" name="kode_customer" placeholder="Kode Customer" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" readonly>
                  <div id="validationServer03Feedback" class="invalid-feedback">
                    Maaf Kode Customer sudah ada.
                  </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlInput1">Nama Customer</label>
                <input type="text" class="form-control" id="v_nama_customer" name="nama_customer" placeholder="Nama Customer" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" readonly>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="kegiatan_usaha">Kegiatan Usaha</label>
              <input type="text" class="form-control" id="v_kegiatan_usaha" name="kegiatan_usaha" placeholder="Kegiatan usaha" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" readonly>

            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Alamat Customer</label>
                <textarea class="form-control" id="v_alamat_customer" name="alamat_customer" rows="3" placeholder="Alamat Customer" autocomplete="off" readonly></textarea>
            </div>
          </div>
      
          <div class="col-md-6">
		        <div class="form-group">
		          <label for="exampleFormControlInput1">Provinsi</label>
		            <input type="text" class="form-control" id="v_provinsi" name="provinsi" placeholder="Provinsi" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" readonly>
		        </div>
          </div>

          <div class="col-md-6">
		        <div class="form-group">
		          <label for="exampleFormControlInput1">Kota/Kab</label>
		            <input type="text" class="form-control" id="v_kota_kab" name="kota_kab" placeholder="Kota/Kab" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" readonly>
		        </div>
          </div>

          <div class="col-md-6">
		        <div class="form-group">
		          <label for="exampleFormControlInput1">NIB</label>
		            <input type="text" class="form-control" id="v_nib" name="nib" placeholder="NIB" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" readonly>
		        </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#detail').on('show.bs.modal', function (event) {
  var id_customer = $(event.relatedTarget).data('id_customer') 
  var kode_customer = $(event.relatedTarget).data('kode_customer') 
  var nama_customer = $(event.relatedTarget).data('nama_customer') 
  var kegiatan_usaha = $(event.relatedTarget).data('kegiatan_usaha') 
  var alamat_customer = $(event.relatedTarget).data('alamat_customer')
  var provinsi = $(event.relatedTarget).data('provinsi') 
  var kota_kab = $(event.relatedTarget).data('kota_kab') 
  var nib = $(event.relatedTarget).data('nib')  

  $(this).find('#v_id_customer').val(id_customer)
  $(this).find('#v_kode_customer').val(kode_customer)
  $(this).find('#v_nama_customer').val(nama_customer)
  $(this).find('#v_kegiatan_usaha').val(kegiatan_usaha)
  $(this).find('#v_alamat_customer').val(alamat_customer)
  $(this).find('#v_provinsi').val(provinsi)
  $(this).find('#v_kota_kab').val(kota_kab)
  $(this).find('#v_nib').val(nib)
})

})

</script>

<!-- Modal Edit-->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>master/master_customer/update">
      <input type="hidden" id="e_id_customer" name="id_customer">
      <div class="modal-body">
      <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlInput1">Kode Customer</label>
                <input type="text" class="form-control" id="e_kode_customer" name="kode_customer" placeholder="Kode Customer" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                  <div id="validationServer03Feedback" class="invalid-feedback">
                    Maaf Kode Customer sudah ada.
                  </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlInput1">Nama Customer</label>
                <input type="text" class="form-control" id="e_nama_customer" name="nama_customer" placeholder="Nama Customer" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="kegiatan_usaha">Kegiatan Usaha</label>
                <select class="form-control chosen-select" id="e_kegiatan_usaha" name="kegiatan_usaha" autocomplete="off">
                  <option value="">- Pilih Kegiatan Usaha -</option>
                  <option value="Produksi">Produksi</option>
                  <option value="Distributor">Distributor</option>
                </select>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Alamat Customer</label>
                <textarea class="form-control" id="e_alamat_customer" name="alamat_customer" rows="3" placeholder="Alamat Customer" autocomplete="off"></textarea>
            </div>
          </div>
      
          <div class="col-md-6">
		        <div class="form-group">
		          <label for="exampleFormControlInput1">Provinsi</label>
		            <input type="text" class="form-control" id="e_provinsi" name="provinsi" placeholder="Provinsi" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
		        </div>
          </div>

          <div class="col-md-6">
		        <div class="form-group">
		          <label for="exampleFormControlInput1">Kota/Kab</label>
		            <input type="text" class="form-control" id="e_kota_kab" name="kota_kab" placeholder="Kota/Kab" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
		        </div>
          </div>

          <div class="col-md-6">
		        <div class="form-group">
		          <label for="exampleFormControlInput1">NIB</label>
		            <input type="text" class="form-control" id="e_nib" name="nib" placeholder="NIB" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
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
  var id_customer = $(event.relatedTarget).data('id_customer') 
  var kode_customer = $(event.relatedTarget).data('kode_customer') 
  var nama_customer = $(event.relatedTarget).data('nama_customer') 
  var kegiatan_usaha = $(event.relatedTarget).data('kegiatan_usaha') 
  var alamat_customer = $(event.relatedTarget).data('alamat_customer')
  var provinsi = $(event.relatedTarget).data('provinsi') 
  var kota_kab = $(event.relatedTarget).data('kota_kab') 
  var nib = $(event.relatedTarget).data('nib')  

  $(this).find('#e_id_customer').val(id_customer)
  $(this).find('#e_kode_customer').val(kode_customer)
  $(this).find('#e_nama_customer').val(nama_customer)
  $(this).find('#e_kegiatan_usaha').val(kegiatan_usaha)
  $(this).find('#e_kegiatan_usaha').trigger("chosen:updated");
  $(this).find('#e_alamat_customer').val(alamat_customer)
  $(this).find('#e_provinsi').val(provinsi)
  $(this).find('#e_kota_kab').val(kota_kab)
  $(this).find('#e_nib').val(nib)

      $("#e_kode_customer").keyup(function(){
      var kode_customer =  $("#e_kode_customer").val();
      jQuery.ajax({
        url: "<?=base_url()?>master/master_customer/cek_kode_customer",
        dataType:'text',
        type: "post",
        data:{kode_customer:kode_customer},
        success:function(response){
          if (response =="true") {
            $("#e_kode_customer").addClass("is-invalid");
            $("#simpan").attr("disabled","disabled");
          }else{
            $("#e_kode_customer").removeClass("is-invalid");
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

        var url = "<?=base_url()?>master/master_customer/pdf_customer_list/";
        window.open(url, 'pdf_laporan_customer_list', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      
    })
    
  })
</script>