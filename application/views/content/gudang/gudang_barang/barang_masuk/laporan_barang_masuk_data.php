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
                                                      <option value="" disabled selected hidden>- Batch -</option>
                                                        <?php
                                                          foreach ($res_batch as $rb) { ?>
                                                            <option <?= $batch === $rb['no_batch'] ? 'selected' : '' ?> value="<?= $rb['no_batch'] ?>"><?= $rb['no_batch'] ?></option>
                                                        <?php } ?>
                                                        </select>
                                                        <input type="text" id="filter_tgl" value="<?= $tgl == null ? '' : $tgl ?>" class="form-control datepicker" placeholder="Fiter Dari Tanggal" aria-label="Recipient's username" aria-describedby="basic-addon2" autocomplete="off">
                                                        <input type="text" id="filter_tgl2" value="<?= $tgl2 == null ? '' : $tgl2 ?>" class="form-control datepicker" placeholder="Fiter Sampai Tanggal" aria-label="Recipient's username" aria-describedby="basic-addon2" autocomplete="off">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-secondary" id="lihat" type="button">Lihat</button>
                                                            <button class="btn btn-primary" id="export" type="button">Cetak</button>
                                                            <a href="<?=base_url()?>gudang/gudang_barang/barang_masuk/laporan_barang_masuk" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
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
                                                            <th>Tanggal masuk</th>
                                                            <th>No Batch</th>
                                                            <th>Nama Barang</th>
                                                            <th>Nama Supplier</th>
                                                            <th>Status</th>
                                                            <th class="text-right">Qty IN</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    	<?php 
                                                    	$no=1;
                                                    	foreach($result as $k){ 
                                                        // $tgl =  explode('-', $k['tgl'])[2]."/".explode('-', $k['tgl'])[1]."/".explode('-', $k['tgl'])[0];
                                                    	?>
                                                    	<tr>
                                                            <th scope="row"><?=$no++?></th>
                                                            <td><?=$tgl?></td>
                                                            <td><?=$k['no_batch']?></td>
                                                            <td><?=$k['nama_barang']?></td>
                                                            <td><?=$k['nama_supplier']?></td>
                                                            <td><?=isset($k['status']) ? $k['status'] : '-'?></td>
                                                           <td style="text-align: right;"><?=isset($k['qty']) ? number_format($k['qty'],0,",",".") : 0?><?=$k['satuan']?></td>
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

      var filter_batch = $('#filter_batch').find(':selected').val();
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();

      var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
      var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];
      
      if (filter_tgl =='' && filter_tgl2 !='') {
        window.location = "<?=base_url()?>laporan_barang_masuk?alert=warning&msg=dari tanggal belum diisi";
      }else if (filter_tgl !='' && filter_tgl2=='') {
        window.location = "<?=base_url()?>laporan_barang_masuk?alert=warning&msg=sampai tanggal belum diisi";
      }else{
        const query = new URLSearchParams({
                    batch: filter_batch,
                    date_from: filter_tgl,
                    date_until: filter_tgl2
                })

        window.location = "<?=base_url() ?>Laporan_barang_masuk/index?"+ query.toString()
        
      }
    })
    $('#export').click(function () {
      
      var filter_batch = $('#filter_batch').find(':selected').val();
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();

      var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
      var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];

      if (filter_tgl == '' && filter_tgl2 != '') {
        window.location = "<?= base_url() ?>Laporan_barang_masuk?alert=warning&msg=dari tanggal belum diisi";
        alert("dari tanggal belum diisi")
      } else if (filter_tgl != '' && filter_tgl2 == '') {
        window.location = "<?= base_url() ?>Laporan_barang_masuk?alert=warning&msg=sampai tanggal belum diisi";
      } else {
        const query = new URLSearchParams({
          batch: filter_batch,
          date_from: filter_tgl,
          date_until: filter_tgl2
        })
        var url = "<?= base_url() ?>Laporan_barang_masuk/pdf_laporan_barang_masuk?" + query.toString();
        window.open(url, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    })
  })
</script>