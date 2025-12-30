<html>

<head>
  <title>Master Barang List</title>
  <style type="text/css">
    @page {
      margin: 40px 25px;
    }

    body {
      font-family: "DejaVu Sans", Arial, sans-serif;
      font-size: 12px;
      color: #333;
    }

    /* Header perusahaan */
    .header-table {
      width: 100%;
      border-bottom: 2px solid #000;
      margin-bottom: 20px;
    }

    .header-table td {
      vertical-align: middle;
      text-align: center;
      border: none;
    }

    .header-table .logo-left img,
    .header-table .logo-right img {
      width: 85px;
      height: auto;
    }

    .header-table .company-info {
      text-align: center;
      padding: 0 10px;
    }

    .company-info h2 {
      margin: 0;
      font-size: 22px;
      letter-spacing: 1px;
      text-transform: uppercase;
    }

    .company-info h3 {
      margin: 0;
      font-size: 15px;
      font-weight: normal;
    }

    .company-info p {
      margin: 2px 0;
      font-size: 11px;
      color: #444;
    }

    /* Judul laporan */
    .judul {
      text-align: center;
      margin-bottom: 10px;
    }

    .judul h3 {
      display: inline-block;
      border-bottom: 2px solid #000;
      padding-bottom: 3px;
      font-size: 16px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    /* Tabel utama */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }

    table th {
      background: #1d3b74;
      color: #fff;
      padding: 8px;
      border: 1px solid #000;
      font-weight: bold;
      text-align: center;
      font-size: 12px;
    }

    table td {
      border: 1px solid #555;
      padding: 6px 8px;
      font-size: 12px;
      vertical-align: top;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .text-center {
      text-align: center;
    }

    .text-left {
      text-align: left;
    }

    /* Footer */
    .footer {
      position: fixed;
      bottom: 10px;
      left: 0;
      right: 0;
      text-align: center;
      font-size: 10px;
      color: #555;
    }
  </style>
</head>

<body>

  <!-- HEADER -->
  <table class="header-table">
    <tr>
      <td class="logo-left" style="width: 100px;">
        <img src="<?= FCPATH . 'assets/images/Logo_baru.jpg' ?>" alt="Logo Kapsulindo">
      </td>
      <td class="company-info">
        <h2>PT KAPSULINDO NUSANTARA</h2>
        <h3>Pedagang Besar Bahan Baku Farmasi</h3>
        <p>Jl. Pancasila 1, Cicadas Gunung Putri - Kab. Bogor 16964, Indonesia</p>
        <p>Telp: (021) 8671165 | Fax: (021) 8671168, 86861734 | Email: pbbbf@kapsulindo.co.id</p>
      </td>
      <td class="logo-right" style="width: 100px;">
        <img src="<?= FCPATH . 'assets/images/pom.jpeg' ?>" alt="Logo BPOM">
      </td>
    </tr>
  </table>

  <!-- JUDUL -->
  <div class="judul">
    <h3> PO IMPORT </h3>
  </div>

  <!-- TABEL -->
  <table>
    <thead>
      <tr>
        <th style="width:5%;">#</th>
        <th style="width:20%;">Nama Barang</th>
        <th style="width:20%;">No PO</th>
        <th style="width:35%;">Status</th>
        <th style="width:10%;">Nama Supplier</th>
        <th style="width:10%;">Jumlah</th>
      </tr>
    </thead>
   <tbody>
<?php if (!empty($result)) : ?>
    <?php $no = 1; foreach ($result as $k) : ?>
        <tr>
            <td class="text-center"><?= $no++ ?></td>
            <td class="text-center"><?= $k['nama_barang'] ?></td>
            <td class="text-center"><?= $k['no_po_import'] ?></td>
            <td class="text-center"><?= $k['status_po_import'] ?></td>
            <td class="text-center"><?= $k['nama_supplier'] ?></td>
            <td class="text-center"><?= $k['jumlah'] ?></td>
        </tr>
    <?php endforeach; ?>
<?php else : ?>
    <tr>
        <td colspan="4" class="text-center">Data tidak tersedia</td>
    </tr>
<?php endif; ?>
</tbody>

  </table>

  <!-- FOOTER -->
  <div class="footer">
    <p>Dicetak otomatis oleh sistem | <?= date('d/m/Y H:i:s') ?></p>
  </div>

</body>

</html>
