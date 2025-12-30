<style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --info: #4895ef;
            --warning: #ae4976ff;
            --danger: #e63946;
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #6c757d;
            --light-gray: #e9ecef;
            --border-radius: 12px;
            --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }

        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        .page-header {
            margin-bottom: 25px;
        }

        .page-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark);
            display: flex;
            align-items: center;
        }

        .page-title i {
            margin-right: 10px;
            color: var(--primary);
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 0;
        }

        .breadcrumb-item a {
            color: var(--primary);
            text-decoration: none;
        }

        .card {
            width: 100%;
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 25px;
        }

        .card-header {
            background: white;
            border-bottom: 1px solid var(--light-gray);
            padding: 15px 20px;
            border-radius: var(--border-radius) var(--border-radius) 0 0 !important;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-header h5 {
            font-size: 18px;
            font-weight: 700;
            color: var(--dark);
            margin: 0;
        }

        .btn {
            border-radius: 8px;
            font-weight: 600;
            padding: 8px 16px;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 5px;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(67, 97, 238, 0.3);
        }

        .btn-secondary {
            background: linear-gradient(135deg, var(--gray), #495057);
            color: white;
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
        }

       .badge-warning {
        background-color: rgba(205, 148, 3, 0.96);
        color: #000000ff;
       
    }

        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(174, 73, 118, 0.3);
        }

        .btn-info {
            background: linear-gradient(135deg, var(--info), #3a86ff);
            color: white;
        }

        .btn-info:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(72, 149, 239, 0.3);
        }

        .table-responsive {
            border-radius: 0 0 var(--border-radius) var(--border-radius);
            overflow: hidden;
        }

        .table {
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }

        .table thead th {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            padding: 13px 10px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            line-height: 1.5;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 12px 10px;
            vertical-align: middle;
            border-bottom: 1px solid var(--light-gray);
            white-space: nowrap;
            font-size: 13px;
        }

        .table tbody tr {
            transition: var(--transition);
        }

        .table tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.05);
            transform: translateY(-1px);
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .badge {
            padding: 6px 10px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 11px;
        }

        .badge-success {
            background-color: rgba(76, 201, 240, 0.1);
            color: var(--success);
            border: 1px solid rgba(76, 201, 240, 0.2);
        }

       .badge-warning {
        background-color: rgba(205, 148, 3, 0.96);
        color: #000000ff;
       
    }

        .badge-danger {
            background-color: rgba(230, 57, 70, 0.1);
            color: var(--danger);
            border: 1px solid rgba(230, 57, 70, 0.2);
        }

        .modal-content {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
            padding: 20px 25px;
        }

        .modal-title {
            font-weight: 700;
            font-size: 18px;
            color: white;
        }

        .close {
            color: white;
            opacity: 0.8;
        }

        .close:hover {
            color: white;
            opacity: 1;
        }

        .filter-section {
            background: white;
            padding: 20px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 25px;
            border-left: 4px solid var(--primary);
        }

        .filter-row {
            display: flex;
            gap: 15px;
            align-items: end;
            flex-wrap: wrap;
        }

        .filter-group {
            flex: 1;
            min-width: 250px;
            margin-bottom: 0;
        }

        .filter-actions {
            display: flex;
            gap: 10px;
            align-items: end;
        }

        .filter-actions .btn {
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            white-space: nowrap;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid var(--light-gray);
            padding: 10px 12px;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
        }

        .stock-positive {
            color: #28a745;
            font-weight: bold;
        }

        .stock-negative {
            color: #dc3545;
            font-weight: bold;
        }

        .stock-zero {
            color: #6c757d;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .card-header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .filter-row {
                flex-direction: column;
            }

            .filter-group {
                width: 100%;
                min-width: auto;
            }

            .filter-actions {
                width: 100%;
                justify-content: stretch;
                margin-top: 10px;
            }

            .filter-actions .btn {
                flex: 1;
            }
        }
    </style>

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
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url() ?>"><i class="feather icon-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="javascript:">Kelola Sumber</a></li>
                                    </li>
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
                                        <h5>Data Sumber</h5>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#addLocation">
                                            <i class="feather icon-plus"></i>Tambah Data
                                        </button>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table class="table datatable table-hover table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th class="text-center">Nama Provinsi</th>
                                                        <th class="text-center">Nama Kota</th>
                                                        <th class="text-center">Detail</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $level = $this->session->userdata('level');
                                                    $no = 1;
                                                    foreach ($result as $k) {
                                                        // Split and format the date as dd/mm/yyyy
                                                        // $tgl_po_reg = implode('/', array_reverse(explode('-', $k['tgl_po_reg'])));
                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td class="text-center"><?=$k['nama_provinsi']?></td>
                                                            <td class="text-center"><?=$k['nama_kota']?></td>
                                                            <td class="text-center">
                                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                                    <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#detail"
                                                                    data-nama_provinsi="<?=$k['nama_provinsi']?>"
                                                                    data-id_provinsi="<?=$k['id_provinsi']?>"
                                                                    data-nama_kota="<?=$k['nama_kota']?>"
                                                                    data-id_kota="<?=$k['id_kota']?>"
                                                                    >
                                                                        <i class="feather icon-eye"></i>Details
                                                                    </button>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php if ($level === "0") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit"
                                                                        data-id_sumber="<?=$k['id_sumber']?>"
                                                                        data-nama_provinsi="<?=$k['nama_provinsi']?>"
                                                                        data-id_provinsi="<?=$k['id_provinsi']?>"
                                                                        data-nama_kota="<?=$k['nama_kota']?>"
                                                                        data-id_kota="<?=$k['id_kota']?>"
                                                                        >
                                                                            <i class="feather icon-edit-2"></i>Edit
                                                                        </button>
                                                                    </div>
                                                                    <div class="btn-group" role="group">
                                                                        <a href="<?= base_url() ?>sumber/delete/<?=$k['id_sumber']?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (!confirm('Apakah Anda Yakin?')) { return false; }">
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
                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>                         
</section>
                                                                                                                                                                   
<!-- Modal -->
<!-- Modal Pilih Lokasi -->
<div class="modal fade" id="addLocation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Provinsi dan Kota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="post" id="form_add_lokasi" action="<?= base_url('sumber/add')?>">
        <div class="modal-body">
          <div class="row">
            
            <div class="col-md-6">
              <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <select class="form-control chosen-select" id="provinsi" name="provinsi" required>
                  <option value="" disabled selected hidden>- Pilih Provinsi -</option>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="kota">Kota / Kabupaten</label>
                <select class="form-control chosen-select" id="kota" name="kota" required>
                  <option value="" disabled selected hidden>- Pilih Kota -</option>
                </select>
              </div>
            </div>

          </div>
        </div>

        <input type="hidden" name="provinsi_nama" id="provinsi_nama">
        <input type="hidden" name="kota_nama" id="kota_nama">

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script>
$(document).ready(function() {
   
    // fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
    // .then(r => r.json())
    // .then(console.log)
    
    // Load daftar provinsi dari API
    $.ajax({
        url: 'https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json',
        method: 'GET',
        success: function(data) {
            // Tambahkan option provinsi
            $('#provinsi').empty().append('<option value="" disabled selected hidden>- Pilih Provinsi -</option>');
            $.each(data, function(i, provinsi) {
        $('#provinsi').append('<option value="'+ provinsi.id +'" data-nama="'+ provinsi.name +'">'+ provinsi.name + ' ('+ provinsi.id +')</option>');
      });
      
      // Penting! Refresh plugin chosen setelah data dimasukkan
      $('#provinsi').trigger("chosen:updated");
    },
    error: function(xhr, status, error) {
        console.error('Gagal memuat provinsi:', error);
        alert('Gagal memuat daftar provinsi.');
    }
});
    //simpan ke hidden input nama provinsi
    // Ketika provinsi dipilih → load kota
  $('#provinsi').on('change', function() {
    var provId = $(this).val();
    var provNama = $(this).find(':selected').data('nama');
    $('#provinsi_nama').val(provNama); // simpan ke hidden input
    });
// Load kota berdasarkan provinsi yang dipilih
  $('#provinsi').on('change', function() {
      var provId = $(this).val();
      $('#kota').empty().append('<option disabled selected hidden>Loading...</option>').trigger("chosen:updated");
      
      $.ajax({
          url: 'https://www.emsifa.com/api-wilayah-indonesia/api/regencies/' + provId + '.json',
          method: 'GET',
          success: function(data) {
              $('#kota').empty().append('<option value="" disabled selected hidden>- Pilih Kota -</option>');
              $.each(data, function(i, kota) {
                  $('#kota').append('<option value="'+ kota.id +'"  data-nama="'+ kota.name +'">'+ kota.name + ' ('+ kota.id +')</option>');
                });
                
                // Refresh chosen biar muncul di UI
                $('#kota').trigger("chosen:updated");
            },
            error: function(xhr, status, error) {
                console.error('Gagal memuat kota:', error);
                alert('Gagal memuat daftar kota.');
            }
        });
    });
    //simpan ke hidden input nama kota
     // Ketika kota dipilih → simpan nama kotanya juga
  $('#kota').on('change', function() {
    var kotaNama = $(this).find(':selected').data('nama');
    $('#kota_nama').val(kotaNama);
  });

     $('#detail').on('show.bs.modal', function(event) {
         // === 3. Saat form disubmit ===
         $('#form_add_lokasi').on('submit', function(e) {
             e.preventDefault();
             const provinsiId = $('#provinsi').val();
             const provinsiNama = $('#provinsi_nama').val();
             const kotaId = $('#kota').val();
             const kotaNama = $('#kota_nama').val();
    // alert(
    //       ✅ Data yang dipilih:\n\nProvinsi: ${provinsiNama} (ID: ${provinsiId})\nKota: ${kotaNama} (ID: ${kotaId})
    //     ); 
    });
});
    
});
</script>


<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Provinsi dan Kota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="post" id="form_add_lokasi" action="<?= base_url('sumber/add')?>">
        <div class="modal-body">
          <div class="row">
            
            <div class="col-md-6">
              <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <input type="text" class="form-control" id="v-provinsi" name="provinsi" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="kota">Kota / Kabupaten</label>
                <input type="text" class="form-control" id="v-kota" name="kota" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="id_provinsi">ID Provinsi</label>
                <input type="text" class="form-control" id="v-id-provinsi" name="id_provinsi" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="id_kota">ID Kota / Kabupaten</label>
                <input type="text" class="form-control" id="v-id-kota" name="id_kota" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
    $('#detail').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var nama_provinsi = button.data('nama_provinsi')
      var id_provinsi = button.data('id_provinsi')
      var nama_kota = button.data('nama_kota')
      var id_kota = button.data('id_kota')
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content.
      var modal = $(this)
      modal.find('#v-provinsi').val(nama_provinsi)
      modal.find('#v-id-provinsi').val(id_provinsi)
      modal.find('#v-kota').val(nama_kota)
      modal.find('#v-id-kota').val(id_kota)
    });
});
</script>


<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Provinsi dan Kota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="post" id="form_edit" action="<?= base_url('sumber/update')?>">
        <div class="modal-body">
          <div class="row">
            <input type="hidden" name="id_sumber" id="id_sumber">
            
            <div class="col-md-6">
              <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <select class="form-control chosen-select" id="e-provinsi" name="provinsi" required>
                  <option value="" disabled selected hidden>- Pilih Provinsi -</option>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="kota">Kota / Kabupaten</label>
                <select class="form-control chosen-select" id="e-kota" name="kota" required>
                  <option value="" disabled selected hidden>- Pilih Kota -</option>
                </select>
              </div>
            </div>

          </div>
        </div>

        <input type="hidden" name="provinsi_nama" id="e-provinsi_nama">
        <input type="hidden" name="kota_nama" id="e-kota_nama">

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
$(document).ready(function () {

  // ====== 1. Load daftar provinsi ======
  function loadProvinsi(selectedId = null, selectedKotaId = null) {
    $.ajax({
      url: "https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json",
      method: "GET",
      success: function (data) {
        $('#e-provinsi').empty().append('<option value="" disabled selected hidden>- Pilih Provinsi -</option>');
        $.each(data, function (i, provinsi) {
          const selected = provinsi.id == selectedId ? "selected" : "";
          // Build option as a normal JS string to avoid invalid unquoted tokens
          $('#e-provinsi').append('<option value="' + provinsi.id + '" data-nama="' + provinsi.name + '" ' + selected + '>' + provinsi.name + ' (' + provinsi.id + ')</option>');
        });
        $('#e-provinsi').trigger("chosen:updated");

        if (selectedId) {
          loadKota(selectedId, selectedKotaId);
        }
      },
      error: function () {
        alert("Gagal memuat daftar provinsi.");
      },
    });
  }

  // ====== 2. Load daftar kota berdasarkan provinsi ======
  function loadKota(provId, selectedKotaId = null) {
    $('#e-kota').empty().append('<option disabled selected hidden>Loading...</option>').trigger("chosen:updated");

    $.ajax({
      url: "https://www.emsifa.com/api-wilayah-indonesia/api/regencies/" + provId + ".json",
      method: "GET",
      success: function (data) {
        $('#e-kota').empty().append('<option value="" disabled selected hidden>- Pilih Kota -</option>');
        $.each(data, function (i, kota) {
          const selected = kota.id == selectedKotaId ? "selected" : "";
          $('#e-kota').append('<option value="' + kota.id + '" data-nama="' + kota.name + '" ' + selected + '>' + kota.name + ' (' + kota.id + ')</option>');
        });
        $('#e-kota').trigger("chosen:updated");
      },
      error: function () {
        alert("Gagal memuat daftar kota.");
      },
    });
  }

  // ====== 3. Saat provinsi berubah, load kota ======
  $('#e-provinsi').on('change', function () {
    const provId = $(this).val();
    const provNama = $(this).find(':selected').data('nama');
    $('#provinsi_nama').val(provNama);
    loadKota(provId);
  });

  // ====== 4. Saat kota dipilih ======
  $('#e-kota').on('change', function () {
    const kotaNama = $(this).find(':selected').data('nama');
    $('#kota_nama').val(kotaNama);
  });

  // ====== 5. Saat modal EDIT dibuka ======
  $('#edit').on('show.bs.modal', function (event) {
    const button = $(event.relatedTarget);

    const idProv = button.data('id_provinsi');
    const namaProv = button.data('nama_provinsi');
    const idKota = button.data('id_kota');
    const namaKota = button.data('nama_kota');
    const idSumber = button.data('id_sumber');

    // Set hidden input
    $('#e-provinsi_nama').val(namaProv);
    $('#e-kota_nama').val(namaKota);
    $('#id_sumber').val(idSumber);

    // Load data dropdown & set terpilih
    loadProvinsi(idProv, idKota);
  });

  // ====== 6. Saat form disubmit ======
  $('#form_edit').on('submit', function (e) {
    e.preventDefault();

    const provinsiId = $('#e-provinsi').val();
    const provinsiNama = $('#e-provinsi option:selected').data('nama');
    const kotaId = $('#e-kota').val();
    const kotaNama = $('#e-kota option:selected').data('nama');
    const idSumber = $('#id_sumber').val();

    // Simpan hidden fields
    $('#e-provinsi_nama').val(provinsiNama);
    $('#e-kota_nama').val(kotaNama);

    // Debug / cek hasil sebelum kirim
    console.log({
      provinsiId,
      provinsiNama,
      kotaId,
      kotaNama,
      idSumber
    });

    // Sekarang submit form ke server (bisa AJAX / form biasa)
    this.submit();
  });

});

</script>