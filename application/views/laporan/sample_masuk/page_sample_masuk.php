<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Laporan Sample Masuk</title>
  <style>
    @page {
      size: A4 landscape;
      margin: 15mm 10mm;
    }

    body {
      font-family: "DejaVu Sans", sans-serif;
      font-size: 11pt;
      margin: 0;
      padding: 0;
      color: #000;
    }

    /* HEADER */
    .header-table {
      width: 100%;
      border-collapse: collapse;
    }

    .header-table td {
      border: none;
      vertical-align: top;
      padding: 2px;
    }

    .header-left img {
      width: 80px;
      height: 80px;
    }

    .header-center {
      text-align: center;
    }

    .header-center h2 {
      font-size: 16pt;
      margin: 0;
    }

    .header-center p {
      font-size: 9pt;
      margin: 2px 0;
    }

    .header-right table {
      font-size: 9pt;
    }

    .header-right td {
      padding: 1px 3px;
      border: none;
    }

    hr {
      border: 1px solid #000;
      margin: 5px 0 10px 0;
    }

    /* TITLE */
    .title {
      text-align: center;
      margin-bottom: 10px;
    }

    .title h3 {
      font-size: 14pt;
      margin-bottom: 5px;
      text-transform: uppercase;
    }

    /* INFORMASI */
    .info-table {
      width: 100%;
      border: none;
      font-size: 10pt;
      margin-bottom: 8px;
    }

    .info-table td {
      padding: 2px 5px;
      border: none;
      vertical-align: top;
    }

    /* TABEL BARANG */
    table.main {
      width: 100%;
      border-collapse: collapse;
      margin-top: 5px;
      font-size: 10pt;
    }

    table.main th {
      background-color: #1d3b74;
      color: white;
      text-align: center;
      padding: 6px;
      border: 1px solid #000;
    }

    table.main td {
      border: 1px solid #000;
      padding: 6px;
      vertical-align: top;
    }

    tr:nth-child(even) {
      background-color: #f8f8f8;
    }

    .text-center { text-align: center; }
    .text-right { text-align: right; }
    .text-left { text-align: left; }

    /* FOOTER */
    .footer {
      margin-top: 30px;
      font-size: 10pt;
    }

    .footer table {
      width: 100%;
      border: none;
    }

    .footer td {
      border: none;
      vertical-align: top;
      padding: 5px;
    }

    .signature-space {
      height: 50px;
    }

    .note {
      font-style: italic;
      font-size: 9pt;
      text-align: center;
      border: 1px solid #000;
      margin-top: 10px;
      padding: 4px;
    }
  </style>
</head>

<body>
  <!-- HEADER -->
  <table class="header-table">
    <tr>
      <td class="header-left" style="width:15%;">
        <img src="<?= FCPATH . 'assets/images/Logo_baru.jpg' ?>" alt="Logo Kiri">
      </td>
      <td class="header-center" style="width:70%;">
        <h2>PT KAPSULINDO PUTRA TRADING</h2>
        <p>Pedagang Besar Farmasi</p>
        <p>Jl. Pancasila I Cicadas, Gunung Putri - Bogor</p>
      </td>
      <td class="header-right" style="width:15%;">
        <table>
          <tr><td><b>NPWP</b></td><td>:</td></tr>
          <tr><td><b>PBF No.</b></td><td>:</td></tr>
          <tr><td><b>CDOB No.</b></td><td>:</td></tr>
        </table>
      </td>
    </tr>
  </table>

  <hr>

  <!-- TITLE -->
  <div class="title">
    <h3>Laporan Sample Masuk</h3>
  </div>

  <!-- DETAIL -->
  <table class="info-table">
    <tr>
      <td style="width:15%;"><b>Kode Sample</b></td>
      <td style="width:2%;">:</td>
      <td style="width:33%;"><?= $row['kode_sample_in'] ?? '-' ?></td>
      <td style="width:15%;"><b>No. Batch</b></td>
      <td style="width:2%;">:</td>
      <td><?= $row['no_batch'] ?? '-' ?></td>
    </tr>
    <tr>
      <td><b>Tanggal Masuk</b></td>
      <td>:</td>
      <td><?= !empty($row['tgl_masuk_sample']) ? date('d-M-Y', strtotime($row['tgl_masuk_sample'])) : '-' ?></td>
      <td><b>Gudang Admin</b></td>
      <td>:</td>
      <td><?= $row['gudang_admin'] ?? '-' ?></td>
    </tr>
  </table>

  <!-- INFORMASI CUSTOMER -->
  <p style="margin: 5px 0; font-weight: bold;">Informasi Customer</p>
  <table class="info-table">
    <tr><td style="width:15%;">Nama Customer</td><td style="width:2%;">:</td><td><?= $row['nama_customer'] ?? '-' ?></td></tr>
    <tr><td>Alamat</td><td>:</td><td><?= $row['alamat_customer'] ?? '-' ?></td></tr>
    <tr><td>Keterangan</td><td>:</td><td><?= $row['ket_masuk'] ?? '-' ?></td></tr>
  </table>

  <!-- TABEL DETAIL -->
  <table class="main">
    <thead>
      <tr>
        <th width="4%">No</th>
        <th width="25%">Nama Barang</th>
        <th width="12%">Jumlah Masuk</th>
        <th width="12%">No. Batch</th>
        <th width="12%">Kode Sample</th>
        <th width="12%">Tanggal Masuk</th>
        <th width="23%">Keterangan</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; $total = 0; foreach ($detail as $d): 
        $total += $d['jumlah_masuk'];
        $nama_barang_formatted = $d['nama_barang'];
        if (!empty($d['bloom']) || !empty($d['mesh'])) {
          $nama_barang_formatted .= " (Bloom: {$d['bloom']}, Mesh: {$d['mesh']})";
        }
      ?>
      <tr>
        <td class="text-center"><?= $no++ ?></td>
        <td><?= $nama_barang_formatted ?></td>
        <td class="text-center"><?= number_format($d['jumlah_masuk'], 3) ?> <?= $d['satuan'] ?? 'Unit' ?></td>
        <td class="text-center"><?= $d['no_batch'] ?></td>
        <td class="text-center"><?= $d['kode_sample_in'] ?></td>
        <td class="text-center"><?= !empty($d['tgl_masuk_sample']) ? date('d/m/Y', strtotime($d['tgl_masuk_sample'])) : '-' ?></td>
        <td class="text-center"><?= $d['ket_masuk'] ?? '-' ?></td>
      </tr>
      <?php endforeach; ?>
      <?php if(count($detail) > 1): ?>
      <tr style="font-weight:bold;">
        <td colspan="2" class="text-right">Total Sample Masuk</td>
        <td class="text-center"><?= number_format($total, 3) ?> <?= $d['satuan'] ?? 'Unit' ?></td>
        <td colspan="4"></td>
      </tr>
      <?php endif; ?>
    </tbody>
  </table>

  <!-- FOOTER -->
  <div class="footer">
    <table>
      <tr>
        <td width="50%">
          <p>Penanggung Jawab Gudang</p>
          <p>Bogor, <?= date('d-m-Y') ?></p>
          <div class="signature-space"></div>
          <p><u>apt. Ahmad Farhan, S.Farm</u></p>
          <p style="font-size:9pt;">SIPA: 500.16.7.2/251/SIPA-1/00233/DPMPTSP/2025</p>
        </td>
        <td width="50%" class="text-right">
          <p>Sample diterima dalam kondisi baik</p>
          <p>Tanggal ................................ oleh :</p>
          <div class="signature-space"></div>
          <p>( ................................................ )</p>
          <p>Nama & Stempel Perusahaan</p>
        </td>
      </tr>
    </table>

    <p class="note"><i>Catatan: Laporan sample masuk ini dibuat otomatis oleh sistem</i></p>
  </div>

</body>
</html>
