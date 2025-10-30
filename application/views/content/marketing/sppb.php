<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sppb Marketing</title>
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
      background-color: rgba(247, 37, 133, 0.1);
      color: var(--warning);
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
        flex-direction: column;
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
                    <!-- <h5 class="m-b-10">Data Barang Masuk</h5> -->
                  </div>
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
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
                                                            <a href="<?= base_url() ?>marketing/po_customer" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
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
                            $no = 1;
                            foreach ($result as $k) {
                              $tgl_sppb =  explode('-', $k['tgl_sppb'])[2] . "/" . explode('-', $k['tgl_sppb'])[1] . "/" . explode('-', $k['tgl_sppb'])[0];
                              $tgl_kirim =  explode('-', $k['tgl_kirim'])[2] . "/" . explode('-', $k['tgl_kirim'])[1] . "/" . explode('-', $k['tgl_kirim'])[0];

                              if ($k['status_sppb'] == 'Proses') {
                                $ds = "";
                              } else {
                                $ds = "d-none";
                              }


                            ?>
                              <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $tgl_sppb ?></td>
                                <td><?= $k['no_sppb'] ?></td>
                                <td><?= $k['nama_customer'] ?></td>
                                <td class="text-left"><?= number_format($k['jumlah_kirim'], 0, ",", ".") ?> <?= $k['satuan'] ?></td>
                                <td><?= $tgl_kirim ?></td>
                                <td><?= $k['status_sppb'] ?></td>
                                <td class="text-center">
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button"
                                      class="btn btn-info btn-square btn-sm"
                                      data-toggle="modal"
                                      data-target="#detail"
                                      data-id_mkt_sppb="<?= $k['id_mkt_sppb'] ?>"
                                      data-no_sppb="<?= $k['no_sppb'] ?>"
                                      data-tgl_sppb="<?= $tgl_sppb ?>"

                                      data-id_mkt_po_customer="<?= $k['id_mkt_po_customer'] ?>"
                                      data-no_po="<?= $k['no_po_customer'] ?>"
                                      data-nama_customer="<?= $k['nama_customer'] ?>"
                                      data-nama_barang="<?= $k['nama_barang'] ?>"
                                      data-kode_tf_in="<?= $k['kode_tf_in'] ?>"
                                      data-jumlah_po="<?= $k['jumlah_po_customer'] ?>"
                                      data-mesh="<?= $k['mesh'] ?>"
                                      data-bloom="<?= $k['bloom'] ?>"

                                      data-tgl_kirim="<?= $tgl_kirim ?>"
                                      data-jumlah_kirim="<?= $k['jumlah_kirim'] ?>"
                                      data-note_gudang="<?= $k['note_gudang'] ?>"
                                      data-harga_kirim="<?= $k['harga_kirim'] ?>"
                                      data-note_pembayaran="<?= $k['note_pembayaran'] ?>"
                                      data-mkt_admin="<?= $k['mkt_admin'] ?>">
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
                                  <div class="btn-group <?= $ds ?>" role="group" aria-label="Basic example">
                                    <?php if ($level === "0") { ?>
                                      <button type="button"
                                        class="btn btn-warning btn-square btn-sm text-light"
                                        data-toggle="modal"
                                        data-target="#edit"

                                        data-id_mkt_sppb="<?= $k['id_mkt_sppb'] ?>"
                                        data-no_sppb="<?= $k['no_sppb'] ?>"
                                        data-tgl_sppb="<?= $tgl_sppb ?>"

                                        data-id_mkt_po_customer="<?= $k['id_mkt_po_customer'] ?>"
                                        data-no_po="<?= $k['no_po_customer'] ?>"
                                        data-nama_customer="<?= $k['nama_customer'] ?>"
                                        data-nama_barang="<?= $k['nama_barang'] ?>"
                                        data-kode_tf_in="<?= $k['kode_tf_in'] ?>"
                                        data-jumlah_po="<?= $k['jumlah_po_customer'] ?>"
                                        data-mesh="<?= $k['mesh'] ?>"
                                        data-bloom="<?= $k['bloom'] ?>"

                                        data-tgl_kirim="<?= $tgl_kirim ?>"
                                        data-jumlah_kirim="<?= $k['jumlah_kirim'] ?>"
                                        data-note_gudang="<?= $k['note_gudang'] ?>"
                                        data-harga_kirim="<?= $k['harga_kirim'] ?>"
                                        data-note_pembayaran="<?= $k['note_pembayaran'] ?>"
                                        data-mkt_admin="<?= $k['mkt_admin'] ?>">
                                        <i class="feather icon-edit-2"></i>Edit
                                      </button>
                                  </div>
                                  <div class="btn-group <?= $ds ?>" role="group" aria-label="Basic example">
                                    <a
                                      href="<?= base_url() ?>marketing/sppb/delete/<?= $k['id_mkt_sppb'] ?>"
                                      class="btn btn-danger btn-square text-light btn-sm"
                                      onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
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
      $('#lihat').click(function() {

        var filter_barang = $('#filter_barang').find(':selected').val();
        var filter_customer = $('#filter_customer').find(':selected').val();
        var filter_tgl = $('#filter_tgl').val();
        var filter_tgl2 = $('#filter_tgl2').val();

        var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
        var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];

        if (filter_tgl == '' && filter_tgl2 != '') {
          window.location = "<?= base_url() ?>marketing/po_customer?alert=warning&msg=dari tanggal belum diisi";
        } else if (filter_tgl != '' && filter_tgl2 == '') {
          window.location = "<?= base_url() ?>marketing/po_customer?alert=warning&msg=sampai tanggal belum diisi";
        } else {
          const query = new URLSearchParams({
            nama_customer: filter_customer,
            nama_barang: filter_barang,
            date_from: filter_tgl,
            date_until: filter_tgl2
          })

          window.location = "<?= base_url() ?>marketing/po_customer/index?" + query.toString()

        }
      })
      $('#export').click(function() {

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
        <form method="post" action="<?= base_url() ?>marketing/sppb/add">
          <div class="modal-body">

            <div class="row">

              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlInput1">No SPPB</label>
                  <input type="text" class="form-control" id="no_sppb" name="no_sppb" placeholder="No SPPB" autocomplete="off"  value="<?= $no_sppb_baru ?>" readonly>
                  <div id="validationServer03Feedback" class="invalid-feedback">
                    Maaf No SPPB sudah ada.
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="tgl_sppb">Tanggal SPPB</label>
                  <input type="text" class="form-control datepicker" id="tgl_sppb" name="tgl_sppb" placeholder="Tanggal SPPB" autocomplete="off" required>
                </div>
              </div>

              <div class="col-md-4">

              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="nama_customer">Nama Customer</label>
                  <select class="form-control chosen-select" id="nama_customer" name="nama_customer" required>
                    <option value="" disabled selected hidden>- Pilih Customer -</option>
                    <?php foreach ($res_customer as $c) { ?>
                      <option value="<?= $c['id_customer'] ?>"><?= $c['nama_customer'] ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="id_mkt_po_customer">Nomor PO</label>
                  <select class="form-control chosen-select" id="id_mkt_po_customer" name="id_mkt_po_customer" required>
                    <option value="" disabled selected hidden>- Pilih No PO -</option>
                  </select>
                </div>
              </div>


              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nama Barang </label>
                  <input class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" autocomplete="off" readonly>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Kode TF IN </label>
                  <input class="form-control" id="kode_tf_in" name="kode_tf_in" placeholder="KODE TF IN" autocomplete="off" readonly>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Mesh </label>
                  <input type="text" class="form-control" id="mesh" name="mesh" placeholder="Mesh" autocomplete="off" readonly>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Bloom </label>
                  <input type="text" class="form-control" id="bloom" name="bloom" placeholder="Bloom" autocomplete="off" readonly>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Jumlah PO (Kg) </label>
                  <input type="text" class="form-control" id="jumlah_po" name="jumlah_po" placeholder="Jumlah PO" autocomplete="off" readonly>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Outstanding (Kg) </label>
                  <input type="text" class="form-control" id="sisa" name="sisa" placeholder="Outstanding" autocomplete="off" readonly>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="tgl_kirim">Tanggal Kirim</label>
                  <input type="text" class="form-control datepicker" id="tgl_kirim" name="tgl_kirim" placeholder="Tanggal kirim" autocomplete="off" required>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="jumlah_kirim">Jumlah Kirim (kg)</label>
                  <input type="text" class="form-control" id="jumlah_kirim" name="jumlah_kirim" placeholder="Jumlah Kirim(Kg)" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
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
                  <input type="text" class="form-control" id="harga_kirim" name="harga_kirim" placeholder="Harga Kirim" autocomplete="off" required>
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
                  <input type="text" class="form-control" id="mkt_admin" name="mkt_admin" value="<?= $this->session->userdata('nama') ?>" autocomplete="off" readonly>
                </div>
              </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="simpan" class="btn btn-primary"
              onclick="if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#add').on('show.bs.modal', function(event) {
        
      });

      $('#nama_customer').on('change', function() {
        const id_customer = $(this).val();

        $('#id_mkt_po_customer').html('<option disabled selected hidden>Loading...</option>').trigger("chosen:updated");

        $.ajax({
          url: "<?= base_url('marketing/sppb/get_po_by_customer') ?>",
          type: "POST",
          data: {
            id_customer: id_customer
          },
          dataType: "json",
          success: function(data) {
            $('#id_mkt_po_customer').empty().append('<option value="" disabled selected hidden>- Pilih No PO -</option>');
            $.each(data, function(i, item) {
              $('#id_mkt_po_customer').append(`
          <option value="${item.id_mkt_po_customer}"
            data-nama_customer="${item.nama_customer}"
            data-nama_barang="${item.nama_barang}"
            data-kode_tf_in="${item.kode_tf_in}"
            data-mesh="${item.mesh}"
            data-bloom="${item.bloom}"
            data-jumlah_po="${item.jumlah_po_customer}"
            data-id_mkt_po_customer="${item.id_mkt_po_customer}"
            data-sisa="${item.sisa}">
            ${item.no_po_customer}
          </option>
        `);
            });
            $('#id_mkt_po_customer').trigger("chosen:updated");
          },
          error: function() {
            alert('Gagal memuat data PO.');
          }
        });
      });



      

      $("#jumlah_kirim").keyup(function() {
        var jumlah_kirim = $("#jumlah_kirim").val().replaceAll('.', '');
        var sisa = $("#sisa").val().replaceAll('.', '');

        if (!jumlah_kirim || !sisa) return;

        if (parseInt(jumlah_kirim) > parseInt(sisa)) {
          $("#jumlah_kirim").addClass("is-invalid");
          $("#simpan").attr("disabled", "disabled");
        } else {
          $("#jumlah_kirim").removeClass("is-invalid");
          $("#simpan").removeAttr("disabled");
        }
      });

      $('#id_mkt_po_customer').on('change', function() {
        const selected = $(this).find(':selected');

        $('#nama_barang').val(selected.data('nama_barang') || '');
        $('#kode_tf_in').val(selected.data('kode_tf_in') || '');
        $('#mesh').val(selected.data('mesh') || '');
        $('#bloom').val(selected.data('bloom') || '');
        $('#jumlah_po').val(selected.data('jumlah_po') || '');
        $('#sisa').val(selected.data('sisa') || '');
      });


      document.getElementById('jumlah_kirim').addEventListener('keyup', function(e) {
        let value = this.value.replace(/\D/g, '');
        value = new Intl.NumberFormat('id-ID').format(value);
        this.value = value;
      });

      document.getElementById('harga_kirim').addEventListener('keyup', function(e) {
        let value = this.value.replace(/\D/g, '');
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
                <input type="text" class="form-control" id="v-tgl_sppb" name="tgl_sppb" placeholder="Tanggal SPPB" autocomplete="off" readonly>
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
                <input class="form-control" id="v-nama_barang" name="nama_barang" placeholder="Nama Barang" autocomplete="off" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlInput1">Kode TF IN </label>
                <input class="form-control" id="v-kode_tf_in" name="kode_tf_in" placeholder="KODE TF IN" autocomplete="off" readonly>
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
                <label for="exampleFormControlInput1">Jumlah PO (Kg) </label>
                <input type="text" class="form-control" id="v-jumlah_po" name="jumlah_po" placeholder="Jumlah PO" autocomplete="off" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_kirim">Tanggal Kirim</label>
                <input type="text" class="form-control" id="v-tgl_kirim" name="tgl_kirim" placeholder="Tanggal kirim" autocomplete="off" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="jumlah_kirim">Jumlah Kirim (kg)</label>
                <input type="text" class="form-control" id="v-jumlah_kirim" name="jumlah_kirim" placeholder="Jumlah Kirim(Kg)" autocomplete="off" readonly>
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
                <input type="text" class="form-control" id="v-harga_kirim" name="harga_kirim" placeholder="Harga Kirim" autocomplete="off" readonly>
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
                <input type="text" class="form-control" id="v-mkt_admin" name="mkt_admin" value="<?= $this->session->userdata('nama') ?>" autocomplete="off" readonly>
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

      function formatRupiah(angka) {
        let number_string = angka.replace(/[^,\d]/g, '').toString(),
          split = number_string.split(','),
          sisa = split[0].length % 3,
          rupiah = split[0].substr(0, sisa),
          ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
          let separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return rupiah;
      }
      $('#detail').on('show.bs.modal', function(event) {
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
        $(this).find('#v-jumlah_po').val(formatRupiah(jumlah_po.toString()))

        $(this).find('#v-tgl_kirim').val(tgl_kirim)
        $(this).find('#v-jumlah_kirim').val(formatRupiah(jumlah_kirim.toString()))
        $(this).find('#v-note_gudang').val(note_gudang)
        $(this).find('#v-harga_kirim').val(formatRupiah(harga_kirim.toString()))
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
        <form method="post" action="<?= base_url() ?>marketing/sppb/update">
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
                  <input type="text" class="form-control datepicker" id="e-tgl_sppb" name="tgl_sppb" placeholder="Tanggal SPPB" autocomplete="off" required>
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
                    foreach ($res_po as $rp) {
                    ?>
                      <option data-nama_customer="<?= $rp['nama_customer'] ?>"
                        data-nama_barang="<?= $rp['nama_barang'] ?>"
                        data-kode_tf_in="<?= $rp['kode_tf_in'] ?>"
                        data-mesh="<?= $rp['mesh'] ?>"
                        data-bloom="<?= $rp['bloom'] ?>"
                        data-jumlah_po="<?= $rp['jumlah_po_customer'] ?>"
                        value="<?= $rp['id_mkt_po_customer'] ?>"><?= $rp['no_po_customer'] ?></option>
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
                  <input class="form-control" id="e-nama_barang" name="nama_barang" placeholder="Nama Barang" autocomplete="off" readonly>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Kode TF IN </label>
                  <input class="form-control" id="e-kode_tf_in" name="kode_tf_in" placeholder="KODE TF IN" autocomplete="off" readonly>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Mesh </label>
                  <input type="text" class="form-control" id="e-mesh" name="mesh" placeholder="Mesh" autocomplete="off" readonly>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Bloom </label>
                  <input type="text" class="form-control" id="e-bloom" name="bloom" placeholder="Bloom" autocomplete="off" readonly>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Jumlah PO (Kg) </label>
                  <input type="text" class="form-control" id="e-jumlah_po" name="jumlah_po" placeholder="Jumlah PO" autocomplete="off" readonly>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="tgl_kirim">Tanggal Kirim</label>
                  <input type="text" class="form-control datepicker" id="e-tgl_kirim" name="tgl_kirim" placeholder="Tanggal kirim" autocomplete="off" required>
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
                  <input type="number" class="form-control" id="e-harga_kirim" name="harga_kirim" placeholder="Harga Kirim" autocomplete="off" required>
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
                  <input type="text" class="form-control" id="e-mkt_admin" name="mkt_admin" value="<?= $this->session->userdata('nama') ?>" autocomplete="off" readonly>
                </div>
              </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="simpan" class="btn btn-primary"
              onclick="if (!confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#edit').on('show.bs.modal', function(event) {
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

        $("#e-no_sppb").keyup(function() {
          var no_sppb = $("#e-no_sppb").val();
          jQuery.ajax({
            url: "<?= base_url() ?>marketing/sppb/cek_no_sppb",
            dataType: 'text',
            type: "post",
            data: {
              no_sppb: no_sppb
            },
            success: function(response) {
              if (response == "true") {
                $("#e-no_sppb").addClass("is-invalid");
                $("#simpan").attr("disabled", "disabled");
              } else {
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