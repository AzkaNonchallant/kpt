<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Surat Jalan</title>
  <style>
    body {
      font-family: sans-serif;
      font-size: 12px;
      margin: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    th, td {
      border: 1px solid #000;
      padding: 5px;
      text-align: left;
      vertical-align: top;
    }

    .no-border td {
      border: none;
      padding: 2px 0;
    }

    .center { text-align: center; }
    .right { text-align: right; }
    .bold { font-weight: bold; }
    .header-table td { border: none; }

    /* Fix Footer Dompdf */
    .footer {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      font-size: 11px;
      text-align: center;
      border-top: 1px solid #000;
      padding-top: 5px;
    }

    /* Header spacing */
    .header-table img {
      display: block;
    }

    .note {
      font-style: italic;
      font-size: 11px;
    }
    .tab-footer td {
      border: none;
      padding: 5px;
      vertical-align: top;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <table class="header-table">
    <tr>
      <td width="20%">
        <!-- <img src="file://<?= FCPATH ?>'assets/images/Logo_baru.jpg'" width="80"> -->
         <img src="<?= FCPATH . 'assets/images/Logo_baru.jpg' ?>" width="80" style="bottom:27px; position:relative;">
      </td>
      <td class="center">
        <h2 style="margin:0;">PT KAPSULINDO PUTRA TRADING</h2>
        <p style="margin:0;">PEDAGANG BESAR FARMASI (PBF)</p>
        <p style="margin:0;">Jl. Pancasila 1 Cicadas, Gunung Putri - Bogor</p>
        <p style="margin:0;">Telp: (021) 8671165 | Fax: (021) 8671168</p>
      </td>
      <td width="20%">
        <!-- <img src="<?= base_url('assets/images/pom.jpeg') ?>" width="80"> -->
         <img src="<?= FCPATH . 'assets/images/pom.jpeg' ?>" width="80">
      </td>
    </tr>
  </table>

  <hr>

  <h3 class="center" style="margin-bottom: 0;">SURAT JALAN</h3>
  <p class="center" style="margin-top: 2px;"><b>No: <?= $row['no_surat_jalan'] ?></b></p>

  <!-- Info Utama -->
  <table class="no-border">
    <tr>
      <td><b>No. SPPB</b></td><td>: <?= $row['no_sppb'] ?></td>
      <td><b>Tanggal</b></td><td>: <?= date('d-m-Y', strtotime($row['tgl'])) ?></td>
    </tr>
    <tr>
      <td><b>Nama Customer</b></td><td>: <?= $row['nama_customer'] ?></td>
      <td><b>No. PO</b></td><td>: <?= $row['no_po'] ?></td>
    </tr>
    <tr>
      <td><b>Alamat</b></td><td colspan="3">: <?= $row['alamat_customer'] ?></td>
    </tr>
  </table>

  <!-- Tabel Barang -->
  <table>
    <thead>
      <tr class="center bold">
        <th width="5%">No</th>
        <th>Nama Barang</th>
        <th width="10%">Mesh</th>
        <th width="10%">Bloom</th>
        <th width="12%">No Batch</th>
        <th width="12%">Exp Date</th>
        <th width="12%">Qty</th>
        <th width="12%">Keterangan</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $no = 1; 
      $total = 0;
      foreach ($detail as $d): 
        $total += $d['jumlah_kirim'];
      ?>
      <tr>
        <td class="center"><?= $no++ ?></td>
        <td><?= $d['nama_barang'] ?></td>
        <td class="center"><?= $d['mesh'] ?></td>
        <td class="center"><?= $d['bloom'] ?></td>
        <td class="center"><?= $d['no_batch'] ?></td>
        <td class="center">
          <?= !empty($d['tgl_exp']) ? date('d/m/Y', strtotime($d['tgl_exp'])) : '-' ?>
        </td>
        <td class="right"><?= number_format($d['jumlah_kirim'], 3) ?> <?= $d['satuan'] ?></td>
        <td class="center"><?= $d['note_gudang'] ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
      <tr class="bold">
        <td colspan="7" class="right">Total</td>
        <td class="right"><?= number_format($total, 3) ?> <?= $d['satuan'] ?></td>
      </tr>
    </tfoot>
  </table>

  <p class="note">COA & Sertifikat Halal Terlampir</p>

  <!-- Footer Fixed -->
  <div class="footer" style="border: none;">
    <table class="tab-footer" width="100%" style="border: none;">
      <tr>
        <td width="50%" style="text-align:center;">
          Barang diterima dalam kondisi baik<br>
          Tanggal .......... oleh:<br><br><br>
          ___________________<br>
          Nama & Stempel
        </td>
        <td width="50%" style="text-align:center;">
          Bogor, <?= date('d-m-Y', strtotime($row['tgl'])) ?><br>
          Penanggung Jawab PBF<br>
          <img src="<?= FCPATH . 'assets/images/ttd2.png' ?>" width="80" style="margin-top:5px;"><br>
          (<?= $this->session->userdata('nama_lengkap'); ?>)
          <br>
          <u>apt. Ahmad Farhan, S.Farm</u><br>
          <small>SIPA: 199911112/SIPA_32.01/DPMPTSP/2018/1-00040</small>
        </td>
      </tr>
    </table>
    <p style="font-size:10px; margin-top:5px;">
      <i>Pengembalian dan penukaran barang maksimum 7 hari setelah barang diterima</i>
    </p>
  </div>

</body>
</html>
