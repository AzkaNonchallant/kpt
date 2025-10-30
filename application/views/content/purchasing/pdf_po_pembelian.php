<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Laporan PO Pembelian</title>
  <style>
    * {
      font-family: "DejaVu Sans", sans-serif;
      box-sizing: border-box;
    }
    body {
      font-size: 11pt;
      margin: 15px;
      color: #000;
    }

    /* HEADER */
    .header-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 10px;
    }
    .header-table td {
      border: none;
      vertical-align: middle;
      padding: 0;
    }
    .company-info h2 {
      font-size: 18pt;
      margin: 0;
      padding: 0;
      line-height: 1.2;
    }
    .company-info h3 {
      font-size: 13pt;
      margin: 0;
      padding: 0;
      line-height: 1.2;
    }
    .company-info p {
      font-size: 9pt;
      margin: 0;
      line-height: 1.3;
    }

    hr {
      border: 1px solid #000;
      margin: 5px 0 15px 0;
    }

    /* TITLE */
    .title {
      text-align: center;
      margin-bottom: 10px;
    }
    .title h3 {
      font-size: 14pt;
      margin-bottom: 2px;
    }
    .title p {
      font-size: 10pt;
      margin: 0;
    }

    /* FILTER INFO */
    .filter-table {
      margin: 0 auto 10px auto;
      width: 60%;
      border: none;
      font-size: 10pt;
    }
    .filter-table td {
      border: none;
      text-align: left;
      padding: 2px 5px;
    }

    /* MAIN TABLE */
    table.main {
      width: 100%;
      border-collapse: collapse;
      font-size: 10pt;
      margin-top: 10px;
    }
    table.main th {
      background: #f2f2f2;
      border: 1px solid #555;
      text-align: center;
      padding: 6px;
      font-weight: bold;
    }
    table.main td {
      border: 1px solid #555;
      padding: 6px;
      vertical-align: top;
    }

    /* FOOTER */
    footer {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      text-align: right;
      font-size: 9pt;
      border-top: 1px solid #aaa;
      padding-top: 3px;
    }
  </style>
</head>
<body>

  <!-- HEADER -->
  <table class="header-table">
    <tr>
      <td style="width: 15%;">
        <img src="<?= FCPATH . 'assets/images/Logo_baru.jpg'?>" style="width: 70px; height: 90px;">
      </td>
      <td class="company-info" style="width: 70%; text-align: center;">
        <h2>PT KAPSULINDO NUSANTARA</h2>
        <h3>Pedagang Besar Bahan Baku Farmasi</h3>
        <p>Jl. Pancasila 1 Cicadas Gunung Putri - Kab. Bogor 16964, Indonesia</p>
        <p>Tlp:(021) 8671165 | Fax:(021) 8671168 | Email: pbbbf@kapsulindo.co.id</p>
      </td>
      <td style="width: 15%; text-align: right;">
        <img src="<?= FCPATH . 'assets/images/pom.jpeg'?>" style="width: 100px; height: 90px;">
      </td>
    </tr>
  </table>

  <hr>

  <!-- TITLE -->
  <div class="title">
    <h3>PO PEMBELIAN</h3>
    <br>
    <?php if(!empty($tgl) && !empty($tgl2)) : ?>
      <p>Periode : <?= $tgl ?> - <?= $tgl2 ?></p>
    <?php endif; ?>
    
    <?php if(!empty($nama_barang)) : ?>
      <p>Barang : <?= $nama_barang ?></p>
      <?php endif; ?>
      
      <?php if(!empty($nama_supplier)) : ?>
        <p>Supplier : <?= $nama_supplier ?></p>
        <?php endif; ?>


  </div>

  <!-- MAIN TABLE -->
   
  <table class="main">
    <thead>
      <tr>
        <th style="width: 30px;">#</th>
        <th>No PO</th>
        <th>Nama Barang</th>
        <th>Mesh</th>
        <th>Bloom</th>
        <th>Supplier</th>
        <th>Jumlah</th>
        <th>Harga</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; foreach($result as $k): ?>
        <tr>
          <td style="text-align:center;"><?= $no++ ?></td>
          <td><?= $k['no_po_pembelian'] ?></td>
          <td><?= $k['nama_barang'] ?></td>
          <td style="text-align:center;"><?= $k['mesh'] ?></td>
          <td style="text-align:center;"><?= $k['bloom'] ?></td>
          <td><?= $k['nama_supplier'] ?></td>
          <td style="text-align:right;"><?= number_format($k['jumlah_po_pembelian'], 0, ",", ".") ?> <?= $k['satuan'] ?></td>
          <td style="text-align:right;">Rp <?= number_format($k['harga_po_pembelian'], 0, ",", ".") ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <!-- FOOTER -->
  <footer>
    <!-- Halaman {PAGE_NUM} dari {PAGE_COUNT} -->
  </footer>

</body>
</html>