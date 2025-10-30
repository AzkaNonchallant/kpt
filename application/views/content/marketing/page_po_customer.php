<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Laporan PO Pembelian</title>
  <style>
    @page {
      margin: 35px 25px;
    }

    * {
      font-family: "DejaVu Sans", sans-serif;
      box-sizing: border-box;
    }

    body {
      font-size: 11pt;
      margin: 0;
      color: #000;
    }

    /* === HEADER === */
    .header-table {
      width: 100%;
      border-bottom: 2px solid #000;
      margin-bottom: 15px;
      border-collapse: collapse;
    }

    .header-table td {
      border: none;
      vertical-align: middle;
      text-align: center;
      padding: 0;
    }

    .header-table img {
      width: 85px;
      height: auto;
    }

    .company-info h2 {
      font-size: 18pt;
      margin: 0;
      line-height: 1.2;
      letter-spacing: 0.5px;
      text-transform: uppercase;
    }

    .company-info h3 {
      font-size: 12pt;
      margin: 0;
      font-weight: normal;
      line-height: 1.2;
    }

    .company-info p {
      font-size: 9pt;
      margin: 2px 0;
      line-height: 1.4;
    }

    hr {
      border: 1px solid #000;
      margin: 0 0 15px 0;
    }

    /* === TITLE === */
    .title {
      text-align: center;
      margin-bottom: 5px;
    }

    .title h3 {
      font-size: 14pt;
      margin: 0;
      text-transform: uppercase;
      border-bottom: 2px solid #000;
      display: inline-block;
      padding-bottom: 3px;
      letter-spacing: 0.5px;
    }

    .title p {
      font-size: 10pt;
      margin: 3px 0;
    }

    /* === FILTER INFO === */
    .filter p {
      text-align: center;
      font-size: 10pt;
      margin: 2px 0;
    }

    /* === MAIN TABLE === */
    table.main {
      width: 100%;
      border-collapse: collapse;
      font-size: 10pt;
      margin-top: 10px;
    }

    table.main th {
      background: #1d3b74;
      color: #fff;
      border: 1px solid #000;
      text-align: center;
      padding: 6px;
      font-weight: bold;
    }

    table.main td {
      border: 1px solid #555;
      padding: 6px 8px;
      vertical-align: top;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .text-center { text-align: center; }
    .text-right { text-align: right; }
    .text-left { text-align: left; }

    /* === FOOTER === */
    footer {
      position: fixed;
      bottom: 10px;
      left: 0;
      right: 0;
      text-align: center;
      font-size: 9pt;
      color: #444;
      border-top: 1px solid #aaa;
      padding-top: 3px;
    }
  </style>
</head>

<body>

  <!-- HEADER -->
  <table class="header-table">
    <tr>
      <td style="width: 100px; text-align: left;">
        <img src="<?= FCPATH . 'assets/images/Logo_baru.jpg' ?>" alt="Logo Kapsulindo">
      </td>
      <td class="company-info" style="width: auto;">
        <h2>PT KAPSULINDO NUSANTARA</h2>
        <h3>Pedagang Besar Bahan Baku Farmasi</h3>
        <p>Jl. Pancasila 1, Cicadas Gunung Putri - Kab. Bogor 16964, Indonesia</p>
        <p>Telp: (021) 8671165 | Fax: (021) 8671168 | Email: pbbbf@kapsulindo.co.id</p>
      </td>
      <td style="width: 100px; text-align: right;">
        <img src="<?= FCPATH . 'assets/images/pom.jpeg' ?>" alt="Logo BPOM">
      </td>
    </tr>
  </table>

  <!-- TITLE -->
  <div class="title">
    <h3>PO CUSTOMER</h3>
  </div>

  <!-- FILTER INFO -->
  <div class="filter">
    <?php if(!empty($tgl) && !empty($tgl2)) : ?>
      <p>Periode : <?= $tgl ?> - <?= $tgl2 ?></p>
    <?php endif; ?>

    <?php if(!empty($nama_barang)) : ?>
      <p>Barang : <?= $nama_barang ?></p>
    <?php endif; ?>
  </div>

  <!-- MAIN TABLE -->
   <?php  if(!empty($result)) : ?>
  <table class="main">
    <thead>
      <tr>
        <th style="width:4%;">#</th>
        <th style="width:12%;">Tanggal Po</th>
        <th style="width:26%;">Customer</th>
        <th style="width:8%;">Nama Barang</th>
        <th style="width:8%;">Mesh</th>
        <th style="width:20%;">Bloom</th>
        <th style="width:10%;">QTY (Kg)</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; $jml= 0;  foreach($result as $k):
          $tgl_po =  explode('-', $k['tgl_po_customer'])[2]."/".explode('-', $k['tgl_po_customer'])[1]."/".explode('-', $k['tgl_po_customer'])[0];   
          $jml += $k['jumlah_po_customer']; 

        
        ?>
        <tr>
          <td class="text-center"><?= $no++ ?></td>
          <td class="text-left"><?=  $tgl_po ?></td>
          <td class="text-left"><?= strtoupper($k['nama_customer']) ?></td>
          <td class="text-center"><?= $k['nama_barang'] ?></td>
          <td class="text-center"><?= $k['mesh'] ?></td>
          <td class="text-left"><?= strtoupper($k['bloom']) ?></td>
          <td class="text-right"><?= number_format($k['jumlah_po_customer'], 0, ",", ".") ?> <?= $k['satuan'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
    tfoot>
        <tr>
          <th colspan="6" class="center">Jumlah (Kg)</th>
          <th style="text-align: right;"><?=number_format($jml,0,",",".")?>&nbsp;<?=$k['satuan']?></th>
        </tr>
      </tfoot>

  </table>

  <?php endif; ?>
  <?php if(empty($result)) : ?>

    <center><h2>Data Kosong</h2></center>
    <?php endif; ?>
  <!-- FOOTER -->
  <footer>
    Dicetak otomatis oleh sistem | <?= date('d/m/Y H:i:s') ?>
  </footer>

</body>
</html>
