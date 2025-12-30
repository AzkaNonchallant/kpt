<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Keluar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --barang: #436;
            --upd: #f72585;
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
        
        .barang-container {
            padding: 20px;
            background-color: #f5f7fb;
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
            padding: 15px 15px;
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
        
        .btn-group {
            display: flex;
            gap: 10px;
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
        
        .btn-success {
            background: linear-gradient(135deg, var(--success), var(--info));
            color: white;
        }
        
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(76, 201, 240, 0.3);
        }
        
        .btn-info {
            background: linear-gradient(135deg, var(--info), #3a86ff);
            color: white;
        }
        
        .btn-warning {
            background: linear-gradient(135deg, var(--warning), #b5179e);
            color: white;
        }
        
        .btn-danger {
            background: linear-gradient(135deg, var(--danger), #d00000);
            color: white;
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, var(--gray), #495057);
            color: white;
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
            padding: 8px 9px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            line-height: 1.5;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }
        
        .table tbody td {
            padding: 10px 8px;
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
            padding: 6px 8px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 11px;
        }
        
        .badge-success {
            background-color: rgba(76, 201, 240, 0.1);
            color: var(--success);
        }
        
        .badge-primary {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary);
        }
        
        .badge-warning {
        background-color: rgba(205, 148, 3, 0.96);
        color: #000000ff;
       
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

        .modal-up {
            background: linear-gradient(135deg, var(--upd), var(--warning));
            color: white;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
            padding: 20px 25px;
        }

        .modal-barang {
            background: linear-gradient(135deg, var(--barang), var(--secondary));
            color: white;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
            padding: 20px 25px;
        }
        
        .modal-title {
            font-weight: 700;
            font-size: 18px;
            left: 100%;
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
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-control {
            border: 1px solid var(--light-gray);
            border-radius: 8px;
            padding: 10px 15px;
            transition: var(--transition);
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        
        .form-label i {
            color: var(--primary);
            font-size: 14px;
            width: 16px;
        }
        
        .invalid-feedback {
            font-size: 12px;
            margin-top: 5px;
        }
        
        .action-buttons {
            display: flex;
            gap: 4px;
            justify-content: center;
            flex-wrap: nowrap;
        }
        
        .table .btn-sm {
            padding: 6px 10px;
            font-size: 11px;
            line-height: 1.5;
            white-space: nowrap;
        }
        
        .table .btn i {
            font-size: 15px;
            margin-right: 2px;
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
            min-width: 180px;
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
        
        .stats-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }
        
        .stats-card .number {
            font-size: 32px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 5px;
        }
        
        .stats-card .label {
            font-size: 14px;
            color: var(--gray);
            font-weight: 600;
        }
        
        @media (max-width: 768px) {
            .card-header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .btn-group {
                width: 100%;
                justify-content: flex-start;
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
            
            .action-buttons {
                flex-direction: cAolumn;
                gap: 3px;
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
                  <!-- <h5 class="m-b-10">Data Barang Keluar</h5> -->
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Barang Keluar</a></li>
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
                    <h5>Data Barang Keluar</h5>
                    <div class="float-right">
                      <div class="input-group">
                        <select class="form-control chosen-select" id="filter_sppb" name="filter_sppb">
                          <option value="" disabled selected hidden>- NO SPPB -</option>
                          <?php
                          foreach ($res_sppb as $ns) { ?>
                            <option <?= $no_sppb === $ns['no_sppb'] ? 'selected' : '' ?> value="<?= $ns['no_sppb'] ?>"><?= $ns['no_sppb'] ?></option>
                          <?php } ?>
                        </select>
                        <select class="form-control chosen-select" id="filter_customer" name="filter_customer">
                          <option value="" disabled selected hidden>- Nama Customer -</option>
                          <?php
                          foreach ($res_customer as $rc) { ?>
                            <option <?= $nama_customer === $rc['nama_customer'] ? 'selected' : '' ?> value="<?= $rc['nama_customer'] ?>"><?= $rc['nama_customer'] ?></option>
                          <?php } ?>
                        </select>
                        <input type="text" id="filter_tgl" value="<?= $tgl == null ? '' : $tgl ?>" class="form-control datepicker" placeholder="Dari Tanggal" aria-label="Recipient's username" aria-describedby="basic-addon2" autocomplete="off">
                        <input type="text" id="filter_tgl2" value="<?= $tgl2 == null ? '' : $tgl2 ?>" class="form-control datepicker" placeholder="Sampai Tanggal" aria-label="Recipient's username" aria-describedby="basic-addon2" autocomplete="off">
                        <div class="input-group-append">
                          <button class="btn btn-secondary" id="lihat" type="button">Lihat</button>
                          <button class="btn btn-primary" id="export" type="button">Cetak</button>
                          <a href="<?= base_url() ?>gudang/gudang_barang/barang_keluar/barang_keluar/" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
                        </div>
                      </div>
                      <!-- Button trigger modal -->
                      <!-- <button type="button" class="btn btn-primary float-right btn-sm mt-3" data-toggle="modal" data-target="#Add">
                        <i class="feather icon-plus"></i>Tambah Produk Keluar
                      </button> -->
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
                            <th>Tanggal Kirim</th>
                            <th>No SPPB</th>
                            <th>No Surat Jalan</th>
                            <th>Nama Customer</th>
                            <th>Detail</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('level');
                          $no = 1;
                          foreach ($result as $k) :
                            $tgl_kirim = explode('-', $k['tgl_kirim'])[2]."/".explode('-', $k['tgl_kirim'])[1]."/".explode('-', $k['tgl_kirim'])[0];
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $tgl_kirim ?></td>
                              <td><?= $k['no_sppb'] ?></td>
                              <td><?= $k['no_surat_jalan'] ?></td>
                              <td><?= $k['nama_customer'] ?></td>
                              <td class="text-right">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button"
                                    class="btn btn-info btn-square btn-sm"
                                    data-toggle="modal"
                                    data-target="#view"
                                    data-id_barang_keluar="<?= $k['id_barang_keluar'] ?>"
                                    data-kode_tf_out="<?= $k['kode_tf_out'] ?>"
                                    data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>"
                                    data-id_customer="<?= $k['id_customer'] ?>"
                                    data-nama_customer="<?= $k['nama_customer'] ?>"
                                    data-id_barang="<?= $k['id_barang'] ?>"
                                    data-nama_barang="<?= $k['nama_barang'] ?>"
                                    data-id_mkt_sppb="<?= $k['id_mkt_sppb'] ?>"
                                    data-no_sppb="<?= $k['no_sppb'] ?>"
                                    data-mesh="<?= $k['mesh'] ?>"
                                    data-bloom="<?= $k['bloom'] ?>"
                                    data-jumlah_kirim="<?= $k['jumlah_kirim'] ?>"
                                    data-tgl_kirim="<?= $k['tgl_kirim'] ?>"
                                    data-note_gudang="<?= $k['note_gudang'] ?>"
                                    data-gdg_admin="<?= $k['gdg_admin'] ?>">
                                    <i class="feather icon-eye"></i>Detail
                                  </button>
                                </div>
                              </td>
                              <td class="text-right">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <?php if ($level === "0") { ?>
                                    <button type="button"
                                      class="btn btn-warning btn-square btn-sm"
                                      data-toggle="modal"
                                      data-target="#Edit"
                                      data-id_barang_keluar="<?= $k['id_barang_keluar'] ?>"
                                      data-kode_tf_out="<?= $k['kode_tf_out'] ?>"
                                      data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>"
                                      data-id_customer="<?= $k['id_customer'] ?>"
                                      data-nama_customer="<?= $k['nama_customer'] ?>"
                                      data-id_barang="<?= $k['id_barang'] ?>"
                                      data-nama_barang="<?= $k['nama_barang'] ?>"
                                      data-id_mkt_sppb="<?= $k['id_mkt_sppb'] ?>"
                                      data-no_sppb="<?= $k['no_sppb'] ?>"
                                      data-mesh="<?= $k['mesh'] ?>"
                                      data-bloom="<?= $k['bloom'] ?>"
                                      data-jumlah_kirim="<?= $k['jumlah_kirim'] ?>"
                                      data-tgl_kirim="<?= $tgl_kirim ?>"
                                      data-note_gudang="<?= $k['note_gudang'] ?>"
                                      data-gdg_admin="<?= $k['gdg_admin'] ?>">
                                      <i class="feather icon-edit-2"></i>Edit
                                    </button>
                                  <?php } ?>
                                  <a
                                    target="_blank"
                                      class="btn btn-success btn-square text-light btn-sm"
                                      onclick="window.open(`<?= base_url() ?>gudang/gudang_barang/barang_keluar/barang_keluar/pdf_surat_jalan/<?= str_replace('/', '--', $k['kode_tf_out']) ?>`, 'surat_jalan', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes'); ">
                                      <i class="feather icon-file"></i>Cetak PDF
                                  </a>
                                  <a
                                    href="<?= base_url() ?>gudang/gudang_barang/barang_keluar/barang_keluar/delete/<?= str_replace('/', '--', $k['id_barang_keluar']) ?>"
                                    class="btn btn-danger btn-square text-light btn-sm"
                                    onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                    <i class="feather icon-trash-2"></i>hapus
                                  </a>
                                </div>
                              </td>
                            </tr>
                          <?php
                          endforeach;
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
    $('#export').click(function() {
      var filter_tgl = $('#filter_tgl').val();
      if (filter_tgl == '') {
        window.location = "<?= base_url() ?>gudang/gudang_barang/barang_keluar/barang_keluar/landscape_surat_jalan";
      } else {
        var url = "<?= base_url() ?>gudang/gudang_barang/barang_keluar/barang_keluar/landscape_surat_jalan" + filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
        window.open(url, 'gudang/gudang_barang/barang_keluar/barang_keluar/', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    })

  })
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#lihat').click(function () {

      var filter_sppb = $('#filter_sppb').find(':selected').val();
      var filter_customer = $('#filter_customer').find(':selected').val();
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();

      var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
      var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];
      
      if (filter_tgl =='' && filter_tgl2 !='') {
        window.location = "<?=base_url()?>gudang/gudang_barang/barang_keluar/barang_keluar?alert=warning&msg=dari tanggal belum diisi";
      }else if (filter_tgl !='' && filter_tgl2=='') {
        window.location = "<?=base_url()?>gudang/gudang_barang/barang_keluar/barang_keluar?alert=warning&msg=sampai tanggal belum diisi";
      }else{
        const query = new URLSearchParams({
                    nama_customer: filter_customer,
                    no_sppb: filter_sppb,
                    date_from: filter_tgl,
                    date_until: filter_tgl2
                })

        window.location = "<?=base_url() ?>gudang/gudang_barang/barang_keluar/barang_keluar/index?"+ query.toString()
        
      }
    })
  })
</script>




<!-- Modal View dan Edit scripts tetap sama seperti sebelumnya -->

<div class="modal fade" id="Edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Barang Keluar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span>&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>gudang/gudang_barang/barang_keluar/barang_keluar/update">
        <input type="hidden" id="edit-id_barang_keluar" name="id_barang_keluar">
        <div class="modal-body">
          <div class="row">
            <!-- Contoh field edit -->
            <div class="col-md-4">
              <div class="form-group">
                <label>Kode TF Out</label>
                <input type="text" class="form-control" id="edit-kode_tf_out" name="kode_tf_out" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>No Surat Jalan</label>
                <input type="text" class="form-control" id="edit-no_surat_jalan" name="no_surat_jalan" required>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>Nama Customer</label>
                <input type="text" class="form-control" id="edit-nama_customer" name="nama_customer" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" class="form-control" id="edit-nama_barang" name="nama_barang" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"
            onclick="return confirm('Yakin update data ini?')">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function() {
    $('#Edit').on('show.bs.modal', function(event) {
      var id_barang_keluar = $(event.relatedTarget).data('id_barang_keluar')
      var kode_tf_out = $(event.relatedTarget).data('kode_tf_out')
      var no_surat_jalan = $(event.relatedTarget).data('no_surat_jalan')
      var nama_customer = $(event.relatedTarget).data('nama_customer')
      var id_mkt_sppb = $(event.relatedTarget).data('id_mkt_sppb')
      var no_sppb = $(event.relatedTarget).data('no_sppb')
      var nama_barang = $(event.relatedTarget).data('nama_barang')
      var mesh = $(event.relatedTarget).data('mesh')
      var bloom = $(event.relatedTarget).data('bloom')
      var jumlah_kirim = $(event.relatedTarget).data('jumlah_kirim')
      var tgl_kirim = $(event.relatedTarget).data('tgl_kirim')
      var note_gudang = $(event.relatedTarget).data('note_gudang')
      var gdg_admin = $(event.relatedTarget).data('gdg_admin')


      $(this).find('#edit-id_barang_keluar').val(id_barang_keluar)
      $(this).find('#edit-kode_tf_out').val(kode_tf_out)
      $(this).find('#edit-no_surat_jalan').val(no_surat_jalan)
      $(this).find('#edit-nama_customer').val(nama_customer)
      $(this).find('#edit-id_mkt_sppb').val(id_mkt_sppb)
      $(this).find('#edit-id_mkt_sppb').trigger("chosen:updated");
      $(this).find('#edit-no_sppb').val(no_sppb)
      $(this).find('#edit-nama_barang').val(nama_barang)
      $(this).find('#edit-mesh').val(mesh)
      $(this).find('#edit-bloom').val(bloom)
      $(this).find('#edit-jumlah_kirim').val(jumlah_kirim)
      $(this).find('#edit-tgl_kirim').val(tgl_kirim)
      $(this).find('#edit-note_gudang').val(note_gudang)
      $(this).find('#edit-gdg_admin').val(gdg_admin)
      $(this).find('#edit-tgl_kirim').datepicker().on('show.bs.modal', function(event) {
        // prevent datepicker from firing bootstrap modal "show.bs.modal"
        event.stopPropagation();
      });

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
        const selected = $(this).find(':selected').attr('data-jumlah_kirim')
        jumlah_kirim = selected.replaceAll(' ', ' ')
        $('#jumlah_kirim').val(jumlah_kirim)
      });

      $("select").on('change', function() {
        const selected = $(this).find(':selected').attr('data-tgl_kirim')
        tgl_kirim = selected.replaceAll(' ', ' ')
        $('#tgl_kirim').val(tgl_kirim)
      });

      $("select").on('change', function() {
        const selected = $(this).find(':selected').attr('data-note_gudang')
        note_gudang = selected.replaceAll(' ', ' ')
        $('#note_gudang').val(note_gudang)
      });

      $('#Edit').on('hidden.bs.modal', function() {
        $(this).find('form')[0].reset();
      });
    })
  })
</script>


<div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Barang Keluar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>barang_keluar/update">
        <input type="hidden" id="e-id_barang_keluar" name="id_barang_keluar">
        <div class="modal-body">
        <div class="row">
        <div class="col-md-4">
          <div class="form-group">
              <label for="kode_tf_out">Kode TF Out</label>
              <input type="text" class="form-control" id="v-kode_tf_out" name="kode_tf_out" aria-describedby="validationServer03Feedback" autocomplete="off" readonly>
              <div id="validationServer03Feedback" class="invalid-feedback">
                Maaf Kode TF Out sudah ada.
          </div>
        </div>
        </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="no_surat_jalan">No Surat Jalan</label>
              <!-- <input type="text" class="form-control" id="no_surat_jalan" name="no_surat_jalan" placeholder="No Surat Jalan" maxlength="20" required> -->
              <input type="text" class="form-control" id="v-no_surat_jalan" name="no_surat_jalan" autocomplete="off" required readonly>
            </div>
          </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="id_mkt_sppb">Nomor SPPB</label>
                <input type="text" class="form-control" id="v-no_sppb" name="no_sppb" autocomplete="off" required readonly>
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
                <input class="form-control" id="v-nama_barang" name="nama_barang" placeholder="Nama Barang" autocomplete="off" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlInput1">Mesh </label>
                <input type="text" class="form-control" id="v-mesh" name="mesh" placeholder="Mesh" autocomplete="off" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlInput1">Bloom </label>
                <input type="text" class="form-control" id="v-bloom" name="bloom" placeholder="Bloom" autocomplete="off" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlInput1">Jumlah Kirim (Kg) </label>
                <input type="text" class="form-control" id="v-jumlah_kirim" name="jumlah_kirim" placeholder="Jumlah Kirim" autocomplete="off" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlInput1">Tanggal Kirim </label>
                <input type="text" class="form-control" id="v-tgl_kirim" name="tgl_kirim" placeholder="Tanggal Kirim" autocomplete="off" readonly>
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
                <label for="exampleFormControlInput1">Gudang Admin</label>
                <input type="text" class="form-control" id="v-gdg_admin" name="gdg_admin" value="<?= $this->session->userdata('nama') ?>" autocomplete="off" readonly>
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
    $('#view').on('show.bs.modal', function(event) {

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

      var id_barang_keluar = $(event.relatedTarget).data('id_barang_keluar')
      var kode_tf_out = $(event.relatedTarget).data('kode_tf_out')
      var no_surat_jalan = $(event.relatedTarget).data('no_surat_jalan')
      var nama_customer = $(event.relatedTarget).data('nama_customer')
      var id_mkt_sppb = $(event.relatedTarget).data('id_mkt_sppb')
      var no_sppb = $(event.relatedTarget).data('no_sppb')
      var nama_barang = $(event.relatedTarget).data('nama_barang')
      var mesh = $(event.relatedTarget).data('mesh')
      var bloom = $(event.relatedTarget).data('bloom')
      var jumlah_kirim = $(event.relatedTarget).data('jumlah_kirim')
      var tgl_kirim = $(event.relatedTarget).data('tgl_kirim')
      var note_gudang = $(event.relatedTarget).data('note_gudang')
      var gdg_admin = $(event.relatedTarget).data('gdg_admin')


      $(this).find('#v-id_barang_keluar').val(id_barang_keluar)
      $(this).find('#v-kode_tf_out').val(kode_tf_out)
      $(this).find('#v-no_surat_jalan').val(no_surat_jalan)
      $(this).find('#v-nama_customer').val(nama_customer)
      $(this).find('#v-id_mkt_sppb').val(id_mkt_sppb)
      $(this).find('#v-no_sppb').val(no_sppb)
      $(this).find('#v-nama_barang').val(nama_barang)
      $(this).find('#v-mesh').val(mesh)
      $(this).find('#v-bloom').val(bloom)
      $(this).find('#v-jumlah_kirim').val(formatRupiah(jumlah_kirim.toString()))
      $(this).find('#v-tgl_kirim').val(tgl_kirim)
      $(this).find('#v-note_gudang').val(note_gudang)
      $(this).find('#v-gdg_admin').val(gdg_admin)
      $(this).find('#v-tgl_kirim').datepicker().on('show.bs.modal', function(event) {
        // prevent datepicker from firing bootstrap modal "show.bs.modal"
        event.stopPropagation();
      });

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
        const selected = $(this).find(':selected').attr('data-jumlah_kirim')
        jumlah_kirim = selected.replaceAll(' ', ' ')
        $('#jumlah_kirim').val(jumlah_kirim)
      });

      $("select").on('change', function() {
        const selected = $(this).find(':selected').attr('data-tgl_kirim')
        tgl_kirim = selected.replaceAll(' ', ' ')
        $('#tgl_kirim').val(tgl_kirim)
      });

      $("select").on('change', function() {
        const selected = $(this).find(':selected').attr('data-note_gudang')
        note_gudang = selected.replaceAll(' ', ' ')
        $('#note_gudang').val(note_gudang)
      });

      $('#edit').on('hidden.bs.modal', function() {
        $(this).find('form')[0].reset();
      });
    })
  })
</script>