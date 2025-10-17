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
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Purchasing</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">PO Import</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('Purchasing/PO_Import/Prc_po_import') ?>">PO Import</a></li>
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
                    <h5>Data PO Import <b>(Approval)</b></h5>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      <i class="feather icon-plus"></i>Tambah Data
                    </button>
                  </div>
                  <div class="card-block table-border-style">
                    <div class="table-responsive">
                      <table class="table datatable table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">No PO Import</th>
                            <!-- <th class="text-center">Jumlah</th> -->
                            <th class="text-center">Details</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('level');
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl_po_import =  explode('-', $k['tgl_po_import'])[2] . "/" . explode('-', $k['tgl_po_import'])[1] . "/" . explode('-', $k['tgl_po_import'])[0];
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td class="text-center"><?= $tgl_po_import?></td>
                              <td class="text-center"><?= $k['no_po_import'] ?></td>
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#detail" 
                                  data-id_prc_po_import_tf="<?= $k['id_prc_po_import_tf']?>" 
                                  data-no_po_import="<?= $k['no_po_import']?>"
                                  data-tgl_po_import="<?= $tgl_po_import?>"
                                  data-metode="<?= $k['metode']?>" 
                                  data-shipment="<?= $k['shipment']?>" 
                                  data-pic1="<?= $k['pic1']?>" 
                                  data-pic2="<?= $k['pic2']?>"       
                                   >
                                    <i class="feather icon-eye"></i>Details
                                  </button>
                                </div>
                              </td>
                              <td class="text-center">
                                <?php if ($level === "0")  { ?>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit" 
                                  data-id_prc_po_import_tf="<?= $k['id_prc_po_import_tf']?>" 
                                  data-prc_admin="<?= $k['prc_admin']?>"
                                  data-no_po_import="<?= $k['no_po_import']?>" 
                                  data-tgl_po_import="<?= $tgl_po_import?>" 
                                  data-metode="<?= $k['metode']?>" 
                                  data-shipment="<?= $k['shipment']?>" 
                                  data-pic1="<?= $k['pic1']?>" 
                                  data-pic2="<?= $k['pic2']?>"
                                   >
                                      <i class="feather icon-edit-2"></i>Edit
                                    </button>
                                  </div>
                                  <div class="btn-group" role="group">
                                    <a href="<?= base_url() ?>purchasing/po_import/delete/<?= $k['no_po_import'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { false; }">
                                      <i class="feather icon-trash-2"></i>Hapus
                                    </a>
                                  </div>
                                <?php } ?>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah PO Import</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="form_add" action="<?= base_url() ?>Purchasing/po_import/add/">
        <div class="modal-body">
          
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="tgl_po_import">Tanggal PO Import</label>
                <input type="text" class="form-control datepicker" id="tgl_po_import" name="tgl_po_import" placeholder="Tanggal PO Import" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="no_po_import">No PO Import</label>
                <input type="text" class="form-control" id="no_po_import" name="no_po_import" maxlength="20" placeholder="No PO Import" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" autocomplete="off" required>
                <div id="validationServer03Feedback" class="invalid-feedback">
                  Maaf Nomor PO Import sudah ada.
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="id_prc_master_barang">Nama Barang</label>
                <select class="form-control chosen-select" id="id_barang" name="id_barang" required>
                  <option disabled selected hidden value="">-Pilih Barang-</option>
                  <?php foreach ($res_barang as $s) { ?>
                    <option
                      data-satuan="<?= $s['satuan'] ?>"
                      data-nama_barang="<?= $s['nama_barang'] ?>" 
                      data-nama_supplier="<?= $s['nama_supplier'] ?>" 
                      data-pic_supplier="<?= $s['pic_supplier'] ?>" 
                      value="<?= $s['nama_barang'] ?>,<?= $s['id_barang']?>">
                      <?= $s['nama_barang'] ?> | <?= $s['nama_supplier'] ?> | <?= $s['satuan'] ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="nama_po_supplier">Supplier</label>
                <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" placeholder="Supplier" autocomplete="off" readonly>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="pic_po_supplier">PIC Supplier</label>
                <input type="text" class="form-control" id="pic_supplier" name="pic_supplier" placeholder="PIC Supplier" autocomplete="off" readonly>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" autocomplete="off" required>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan" readonly>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="harga_perunit">Harga Perunit</label>
                <input type="text" class="form-control" id="harga_perunit" name="harga_perunit" placeholder="Harga Perunit" oninput="calculateTotal()" autocomplete="off">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="total_harga">Total Harga</label>
                <input type="text" class="form-control" id="total_harga" name="total_harga" placeholder="Total Harga" readonly>
              </div>
            </div>

            <div class="col-md-1 text-right">
              <a href="javascript:void(0)" id="input" class="btn btn-primary" style="margin-top: 31px;">
                <b class="text">Input</b>
              </a>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>Nama Barang</th>
                  <th>Supplier</th>
                  <th>PIC Supplier</th>
                  <th>Jumlah</th>
                  <th>Harga Perunit</th>
                  <th>Total Harga</th>
                  <th class="text-right">Hapus</th>
                </tr>
              </thead>
              <tbody id="insert_batch"></tbody>
            </table>
          </div>

         <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="metode">Metode</label>
                <input type="text" class="form-control" id="metode" name="metode" placeholder="Metode" autocomplete="off">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="shipment">Shipment</label>
                <input type="text" class="form-control" id="shipment" name="shipment" placeholder="Shipment" autocomplete="off">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="pic1">PIC Kapsulindo 1</label>
                <input type="text" class="form-control" id="pic1" name="pic1" placeholder="Pic1" autocomplete="off">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="pic2">PIC Kapsulindo 2</label>
                <input type="text" class="form-control" id="pic2" name="pic2" placeholder="Pic2" autocomplete="off"x`>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
  // Format Rupiah
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

  // Ubah dari rupiah ke integer
  function unformatRupiah(rupiah) {
    if (!rupiah) return 0;
    return parseInt(rupiah.toString().replace(/[^0-9]/g, ''), 10);
  }

  // Hitung total harga
  function calculateTotal() {
    const jumlah = unformatRupiah($('#jumlah').val());
    const hargaPerUnit = unformatRupiah($('#harga_perunit').val());
    const totalHarga = jumlah * hargaPerUnit;
    $('#total_harga').val(formatRupiah(totalHarga));
  }

  // Format input saat diketik
  function formatAngka(input) {
    let angka = input.value.replace(/\D/g, '');
    let angkaFormat = angka.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    input.value = angkaFormat;
  }

  // Event hitung otomatis
  $('#jumlah, #harga_perunit').on('input', function() {
    formatAngka(this);
    calculateTotal();
  });

  // Pilihan barang otomatis isi supplier
  $('#id_barang').change(function() {
    const selected = $(this).find('option:selected');
    $('#satuan').val(selected.data('satuan'));
    $('#pic_supplier').val(selected.data('pic_supplier'));
    $('#nama_supplier').val(selected.data('nama_supplier'));
  });

  // Tombol tambah ke tabel
  $('#input').on('click', function(e) {
    e.preventDefault();

    const kode = $('#id_barang').val();
    if (!kode) return alert('Pilih barang terlebih dahulu.');

    const [nama_barang, id_prc_master_barang, id_prc_master_barang_detail] = kode.split(",");
    const nama_po_supplier = $('#nama_supplier').val();
    const pic_po_supplier = $('#pic_supplier').val();
    const jumlah = $('#jumlah').val();
    const harga_perunit = $('#harga_perunit').val();
    const total_harga = $('#total_harga').val();
    const nextform = Date.now();
    const no_batch = 'Batch-' + nextform;

    $('#insert_batch').append(`
      <tr id="tr_${nextform}">
        <input type="hidden" name="id_barang[]" value="${id_prc_master_barang}">
        <input type="hidden" name="nama_barang[]" value="${nama_barang}">
        <input type="hidden" name="nama_supplier[]" value="${nama_po_supplier}">
        <input type="hidden" name="pic_supplier[]" value="${pic_po_supplier}">
        <input type="hidden" name="jumlah[]" value="${unformatRupiah(jumlah)}">
        <input type="hidden" name="harga_perunit[]" value="${unformatRupiah(harga_perunit)}">
        <input type="hidden" name="total_harga[]" value="${unformatRupiah(total_harga)}">
        <input type="hidden" name="id_prc_master_barang_detail[]" value="${id_prc_master_barang_detail}">
        <td>${nama_barang}</td>
        <td>${nama_po_supplier}</td>
        <td>${pic_po_supplier}</td>
        <td>${jumlah}</td>
        <td>${harga_perunit}</td>
        <td>${total_harga}</td>
        <td class="text-right">
          <a href="javascript:void(0)" onclick="remove(${nextform})" class="text-danger">
            <i class="feather icon-trash-2"></i>
          </a>
        </td>
      </tr>
    `);
  });

  // Cek nomor PO
  $("#no_po_import").keyup(function() {
    var no_po_import = $(this).val();
    $.ajax({
      url: "<?= base_url() ?>purchasing/po_import/cek_no_po_import/",
      dataType: 'text',
      type: "post",
      data: { no_po_import },
      success: function(response) {
        if (response == "true") {
          $("#no_po_import").addClass("is-invalid");
          $("#simpan").attr("disabled", "disabled");
        } else {
          $("#no_po_import").removeClass("is-invalid");
          $("#simpan").removeAttr("disabled");
        }
      }
    });
  });
});
    
</script>

<!-- Modal Detail -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail PO Import</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="form_add" action="<?= base_url() ?>M_purchasing/M_po_impport/M_prc_po_import/">
        <div class="modal-body">
          
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="v-tgl_po_import">Tanggal PO Import</label>
                <input type="text" class="form-control" id="v-tgl_po_import" name="tgl_po_import" placeholder="Tanggal PO Import" autocomplete="off" required readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="v-no_po_import">No PO Import</label>
                <input type="text" class="form-control" id="v-no_po_import" name="no_po_import" maxlength="20" placeholder="No PO Import" aria-describedby="validationServer03Feedback" autocomplete="off" readonly required>
                <div id="validationServer03Feedback" class="invalid-feedback">
                  Maaf Nomor PO Import sudah ada.
                </div>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>Nama Barang</th>
                  <th>Supplier</th>
                  <th>PIC Supplier</th>
                  <th>Jumlah</th>
                  <th>Harga Perunit</th>
                  <th>Total Harga</th>
                  
                </tr>
              </thead>
              <tbody id="v-ppb_po_barang"></tbody>
            </table>
          </div>

         <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="v-metode">Metode</label>
                <input type="text" class="form-control" id="v-metode" name="metode" placeholder="Metode" readonly>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="v-shipment">Shipment</label>
                <input type="text" class="form-control" id="v-shipment" name="shipment" placeholder="Shipment" readonly>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="v-pic1">PIC Kapsulindo 1</label>
                <input type="text" class="form-control" id="v-pic1" name="pic1" placeholder="Pic1" readonly>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="v-pic2">PIC Kapsulindo 2</label>
                <input type="text" class="form-control" id="v-pic2" name="pic2" placeholder="Pic2" readonly>
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
  $('#detail').on('show.bs.modal', function(event) {

    
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
    var button = $(event.relatedTarget); 
    var id_prc_po_import = button.data('id_prc_po_import_tf');
    var no_po_import = button.data('no_po_import');
    var tgl_po_import = button.data('tgl_po_import');
    var metode = button.data('metode');
    var shipment = button.data('shipment');
    var pic1 = button.data('pic1');
    var pic2 = button.data('pic2');

    

    $(this).find('#v-id_prc_po_import').val(id_prc_po_import);
    $(this).find('#v-no_po_import').val(no_po_import);
    $(this).find('#v-tgl_po_import').val(tgl_po_import);
    $(this).find('#v-metode').val(metode);
    $(this).find('#v-shipment').val(shipment);
    $(this).find('#v-pic1').val(pic1);
    $(this).find('#v-pic2').val(pic2);

  jQuery.ajax({
        url: "<?= base_url() ?>purchasing/po_import/det_ppb_barang",
        dataType: 'json',
        type: "post",
        data: {
          no_po_import: no_po_import
        },
        success: function(response) {
          var data = response;
          var $id = $('#v-ppb_po_barang');
          $id.empty(); 
          for (var i = 0; i < data.length; i++) {
            $id.append(`
              <tr>
                <td>` + data[i].nama_barang + `</td>
                <td>` + data[i].nama_supplier + `</td>
                <td>` + data[i].pic_supplier + `</td>
                
                <td>` + data[i].jumlah + `</td>
                <td>` + data[i].harga_perunit + `</td>


                <td class="text-right">` + data[i].total_harga + "&nbsp" + `</td>
              </tr>
            `);
          }
        }
      });
  });

});

</script>

<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail PO Import</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="form_add" action="<?= base_url() ?>purchasing/po_import/update/">
        <div class="modal-body">
          <input type="hidden" id="e-id_prc_po_import" name="id_prc_po_import_tf">
          <input type="hidden" id="e-prc_admin" name="prc_admin">
          
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="v-tgl_po_import">Tanggal PO Import</label>
                <input type="text" class="form-control datepicker" id="e-tgl_po_import" name="tgl_po_import" placeholder="Tanggal PO Import" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="v-no_po_import">No PO Import</label>
                <input type="text" class="form-control" id="e-no_po_import" name="no_po_import" maxlength="20" placeholder="No PO Import" aria-describedby="validationServer03Feedback" autocomplete="off" readonly>
                <div id="validationServer03Feedback" class="invalid-feedback">
                  Maaf Nomor PO Import sudah ada.
                </div>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>Nama Barang</th>
                  <th>Supplier</th>
                  <th>PIC Supplier</th>
                  <th>Jumlah</th>
                  <th>Harga Perunit</th>
                  <th>Total Harga</th>
                  
                </tr>
              </thead>
              <tbody id="e-ppb_po_barang"></tbody>
            </table>
          </div>

         <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="v-metode">Metode</label>
                <input type="text" class="form-control" id="e-metode" name="metode" placeholder="Metode" required>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="v-shipment">Shipment</label>
                <input type="text" class="form-control" id="e-shipment" name="shipment" placeholder="Shipment" required>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="v-pic1">PIC Kapsulindo 1</label>
                <input type="text" class="form-control" id="e-pic1" name="pic1" placeholder="Pic1" required>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="v-pic2">PIC Kapsulindo 2</label>
                <input type="text" class="form-control" id="e-pic2" name="pic2" placeholder="Pic2" required>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- jQuery to Update Spec and Unit -->
<script type="text/javascript">
$(document).ready(function() {
  $('#edit').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget); 
    var id_prc_po_import = button.data('id_prc_po_import_tf');
    var no_po_import = button.data('no_po_import');
    var tgl_po_import = button.data('tgl_po_import');
    var metode = button.data('metode');
    var shipment = button.data('shipment');
    var pic1 = button.data('pic1');
    var pic2 = button.data('pic2');
    var prc_admin = button.data('prc_admin');

    $('#e-id_prc_po_import').val(id_prc_po_import);
    $('#e-prc_admin').val(prc_admin);
    $('#e-no_po_import').val(no_po_import);
    $('#e-tgl_po_import').val(tgl_po_import); 
    $('#e-metode').val(metode);
    $('#e-shipment').val(shipment);
    $('#e-pic1').val(pic1);
    $('#e-pic2').val(pic2);
    
    $("#e-no_po_import").keyup(function() {
      var no_po_import = $("#e-no_po_import").val();
      jQuery.ajax({
        url: "<?= base_url() ?>purchasing/po_import/cek_no_po_import",
        dataType: 'text',
        type: "post",
        data: {
          no_po_import: no_po_import
        },
        success: function(response) {
          if (response == "true") {
            $("#e_no_po_import").addClass("is-invalid");
            $("#simpan").attr("disabled", "disabled");
          } else {
            $("#e_no_po_import").removeClass("is-invalid");
            $("#simpan").removeAttr("disabled");
          }
        }
      });
    })
    $(this).find('#e-tgl_po_import').datepicker().on('show.bs.modal', function(event) {
      event.stopImmediatePropagation();
    });
    jQuery.ajax({
      url: "<?= base_url() ?>purchasing/po_import/det_ppb_barang",
      dataType: 'json',
      type: "post",
      data: {
        no_po_import: no_po_import
      },
      success: function(response) {
        var data = response;
        var $id = $('#e-ppb_po_barang');
        $id.empty(); 
        for (var i = 0; i < data.length; i++) {
          $id.append(`
          <tr>
          <td>` + data[i].nama_barang + `</td>
          <td>` + data[i].nama_supplier + `</td>
          <td>` + data[i].pic_supplier + `</td>
          
          <td>` + data[i].jumlah + `</td>
          <td>` + data[i].harga_perunit + `</td>
          
          
          <td class="text-right">` + data[i].total_harga + "&nbsp" + `</td>
          </tr>
          `);
        }
      }
    });
  });
  });
</script>
