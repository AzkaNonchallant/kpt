<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Laporan Barang Masuk</title>
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
    .company-info {
      text-align: center;
    }
    .company-info h2 {
      font-size: 18pt;
      margin: 0;
      line-height: 1.3;
    }
    .company-info h3 {
      font-size: 12pt;
      margin: 0;
      line-height: 1.2;
    }
    .company-info p {
      font-size: 9pt;
      margin: 1px 0;
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
      text-transform: uppercase;
      margin: 0;
      padding-bottom: 3px;
    }
    .filter-info {
      font-size: 10pt;
      margin-top: 5px;
      line-height: 1.3;
    }

    /* TABLE */
    table.main {
      width: 100%;
      border-collapse: collapse;
      font-size: 10pt;
      margin-top: 10px;
    }
    table.main th {
      background: #1d3b74;
      color: #fff;
      text-align: center;
      border: 1px solid #555;
      padding: 6px;
    }
    table.main td {
      border: 1px solid #555;
      padding: 6px;
      vertical-align: middle;
    }
    tr:nth-child(even) {
      background: #f9f9f9;
    }
    .text-center { text-align: center; }
    .text-right { text-align: right; }
    .text-left { text-align: left; }

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
        <img src="<?= FCPATH . 'assets/images/Logo_baru.jpg' ?>" style="width: 70px; height: 90px;">
      </td>
      <td class="company-info" style="width: 70%;">
        <h2>PT KAPSULINDO NUSANTARA</h2>
        <h3>Pedagang Besar Bahan Baku Farmasi</h3>
        <p>Jl. Pancasila 1, Cicadas Gunung Putri - Kab. Bogor 16964, Indonesia</p>
        <p>Telp:(021) 8671165 | Fax:(021) 8671168 | Email: pbbbf@kapsulindo.co.id</p>
      </td>
      <td style="width: 15%; text-align: right;">
        <img src="<?= FCPATH . 'assets/images/pom.jpeg' ?>" style="width: 100px; height: 90px;">
      </td>
    </tr>
  </table>
  
  <hr>
  
  <!-- TITLE -->
  <div class="title">
    <h3>Gudang Barang Masuk</h3>
    <div class="filter-info">
      <?php if(!empty($nama_barang)) : ?>
        <p>Nama Barang : <?= $nama_barang ?></p>
        <?php endif; ?>
        
      <?php if(!empty($no_batch)) : ?>
        <p>No Batch : <?= $no_batch ?></p>
        <?php endif; ?>

      <?php if(!empty($tgl) && !empty($tgl2)) : ?>
        <p>Periode : <?= $tgl ?> - <?= $tgl2 ?></p>
      <?php endif; ?>
    </div>
  </div>
  
  <?php if(!empty($result)) : ?>
  <!-- TABEL UTAMA -->
  <table class="main">
    <thead>
      <tr>
        <th style="width: 4%;">#</th>
        <th style="width: 10%;">Tanggal Masuk</th>
        <th style="width: 10%;">No Batch</th>
        <th style="width: 20%;">Nama Barang</th>
        <th style="width: 8%;">Mesh</th>
        <th style="width: 8%;">Bloom</th>
        <th style="width: 20%;">Supplier</th>
        <th style="width: 12%;">Jumlah</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; foreach($result as $k): ?>
        <?php 
          $tgl_msk_gdg = date('d/m/Y', strtotime($k['tgl_msk_gdg']));
        ?>
        <tr>
          <td class="text-center"><?= $no++ ?></td>
          <td class="text-center"><?= $tgl_msk_gdg ?></td>
          <td class="text-center"><?= $k['no_batch'] ?></td>
          <td class="text-left"><?= strtoupper($k['nama_barang']) ?></td>
          <td class="text-center"><?= $k['mesh'] ?></td>
          <td class="text-center"><?= $k['bloom'] ?></td>
          <td class="text-left"><?= ucfirst($k['nama_supplier']) ?></td>
          <td class="text-right"><?= number_format($k['gdg_qty_in'],0,",",".") ?> <?= $k['satuan'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <?php endif; ?>

  <?php if(empty($result)) : ?>
    <center><h4>Data Kosong</h4></center>
    <?php endif; ?>

  <!-- FOOTER -->
  <footer>
    <center>Dicetak otomatis oleh sistem | <?= date('d/m/Y H:i:s') ?></center>
  </footer>

</body>
</html>
