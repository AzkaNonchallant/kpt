

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
                                        <!-- <h5 class="m-b-10">Laporan Stok Barang</h5> -->
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Laporan Stok Barang 2</a></li>
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
                                            <h5>Laporan Stok Barang 2</h5>
                                            <div class="float-right">
                                              <div class="input-group">
                                                <?php 
                                                  function newDate($date){
                                                    return explode('-', $date)[2]."/".explode('-', $date)[1]."/".explode('-', $date)[0];
                                                  }
                                                ?>
                                                        <!-- <input type="text" id="filter_tgl" value="<?=$tgl==null?'':newDate($tgl)?>" class="form-control datepicker" placeholder="Fiter Tanggal Disini" aria-label="Recipient's username" aria-describedby="basic-addon2" autocomplete="off"> -->
                                                        <!-- <div class="input-group-append"> -->
                                                            <!-- <button class="btn btn-secondary" id="lihat" type="button">Lihat</button> -->
                                                            <!-- <button class="btn btn-primary" id="export" type="button">Cetak</button> -->
                                                            <!-- <a href="<?=base_url()?>laporan_barang_stok" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a> -->
                                                        <!-- </div> -->
                                                    <!-- </div> -->
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
                                                            <th>Kode</th>
                                                            <th>Nama</th>
                                                            <th class="text-right">Detail</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      <?php
                                                      foreach($res_batch as $b )
                                                      ?>
                                                    	<?php 
                                                    	$no=1;
                                                    	foreach($result as $k ) {
                                                    	?>
                                                    	<tr>
                                                            <th scope="row"><?=$no++?></th>
                                                            <td><?=$k['kode_barang']?></td>
                                                            <td><?=$b['nama_barang']?></td>
                                                            <td class="text-right">

                                                            
                                                              <div class="btn-group" role="group" aria-label="Basic example">
                                                                <button type="button" 
                                                                  class="btn btn-info btn-square btn-sm" 
                                                                  data-toggle="modal" 
                                                                  data-target="#view" 
                                                        
                                                                  data-id_barang="<?=$b['id_barang']?>"
                                                                  data-nama_barang="<?=$b['nama_barang']?>"
                                                                                                                              
                                                                >
                                                                  <i class="feather icon-eye"></i>Detail
                                                                </button>
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
<div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="">
      <div class="modal-body">
        <div class="row">
        <div class="table-responsive">
          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <th>Nama Barang</th><th>No Batch</th><th>Tanggal Masuk</th><th>Nama Supplier</th><th class="text-right">Qty</th>
              </tr>
            </thead>
            <tbody id="v-barang_stok">
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="submit" class="btn btn-info">Update</button> -->
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#view').on('show.bs.modal', function (event) {
  var id_barang = $(event.relatedTarget).data('id_barang')
  var nama_barang = $(event.relatedTarget).data('nama_barang')

  $(this).find('#v-id_barang').val(id_barang)
  $(this).find('#v-nama_barang').val(nama_barang)

    jQuery.ajax({
        url: "<?=base_url()?>laporan_barang_stok_2/data_barang_stok",
        dataType:'json',
        type: "post",
        data:{id_barang:id_barang},
        success:function(response){
          var data = response;
          // alert(JSON.stringify(data))
          var $id = $('#v-barang_stok');
          $id.empty();
          // $id.append('<option value=0>- Pilih Prioritas Kegiatan -</option>');
          for (var i = 0; i < data.length; i++) {
            var exp = data[i].exp.split("-")[2]+"/"+data[i].exp.split("-")[1]+"/"+data[i].exp.split("-")[0]
            $id.append(`
              <tr>
                <td>`+data[i].kode_tf_in+`</td>
                <td>`+data[i].no_batch+`</td>
                <td>`+data[i].nama_barang+`</td>
                <td>`+data[i].nama_supplier+`</td>
                <td class="text-right">`+data[i].qty+data[i].satuan+`</td>
                <td class="text-right">`+exp+`</td>
              </tr>
            `);
          }        
        }            
      });
  // $(this).find('#e_tgl').datepicker().on('show.bs.modal', function(event) {
  //   // prevent datepicker from firing bootstrap modal "show.bs.modal"
  //   event.stopPropagation();
  // });
})

})

</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#lihat').click(function () {
      var filter_tgl = $('#filter_tgl').val();
      if (filter_tgl=='') {
        window.location = "<?=base_url()?>laporan_barang_stok";
      }else{
        window.location = "<?=base_url()?>laporan_barang_stok/index/"+filter_tgl.split("/")[2]+"-"+filter_tgl.split("/")[1]+"-"+filter_tgl.split("/")[0];
      }
    })
    $('#export').click(function () {
      var filter_tgl = $('#filter_tgl').val();
      if (filter_tgl=='') {
        // window.location = "<?=base_url()?>laporan_barang_stok/pdf_laporan_barang_stok";
        var url = "<?=base_url()?>laporan_barang_stok/pdf_laporan_barang_stok";
        window.open(url, 'pdf_laporan_barang_stok', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }else{
        var url = "<?=base_url()?>laporan_barang_stok/pdf_laporan_barang_stok/"+filter_tgl.split("/")[2]+"-"+filter_tgl.split("/")[1]+"-"+filter_tgl.split("/")[0];
        window.open(url, 'pdf_laporan_barang_stok', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    })
    
  })
</script>