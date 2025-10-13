<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Invoice</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body { font-family: sans-serif; font-size: 12px; margin: 20px;  padding: 10px; }
    table { width: 100%; border-collapse: collapse; border: 1px solid  #000; }
    th, td { border: 0.1px solid #000; padding: 6px; }
    .no-border td, .no-border th { border: none; }
    .right { text-align: right; margin-right: 20px; }
    .center { text-align: center; }
    .bold { font-weight: bold; }
    .title { text-align: center; margin-bottom: 10px; }
    .section-title { font-weight: bold; margin-top: 15px; }
    
    .bottom-image {
      object-fit: cover;
      position: absolute;
      /* margin-bottom: 0px; */
      z-index: -1;
    }
  </style>
</head>
<body>
  <img src="<?= FCPATH . 'assets/images/Kop_Atas.png' ?>" alt="" width="766px" height="" >


  <!-- HEADER -->
  <h2 class="title">FAKTUR / INVOICE</h2>
  <table class="no-border">
    <?php foreach($res_customer as $invoice) :  ?>
    <tr>
      <td><b>No :</b> <?= $invoice['no_invoice'] ?? 'KPT0001/2025' ?></td>
    </tr>
  </table>

  <br>

  <!-- DATA PENGUSAHA -->
  <table class="no-border">
    <tr><td colspan="2" class="bold">PENGUSAHA KENA PAJAK</td></tr>
    <tr><td width="20%">Nama</td><td>: PT. KAPSULINDO PUTRA TRADING</td></tr>
    <tr><td>Alamat</td><td>: Jl. Pancasila I, Cicadas, Gunung Putri</td></tr>
    <tr><td>NPWP</td><td>: 1000.0000.0078.2717</td></tr>
  </table>

  <br>

  <!-- DATA PEMBELI -->
  <table class="no-border">
    <tr><td colspan="2" class="bold">Pembeli Barang Kena Pajak / Penerima Jasa</td></tr>
    <tr><td width="20%">Nama</td><td>: <?= $invoice['nama_customer'] ?? 'PT. ABC' ?></td></tr>
    <tr><td>Alamat</td><td>: <?= $invoice['alamat_customer'] ?? 'Jl. Papandayan V , Gunung Putri - Bogor' ?></td></tr>
    <tr><td>NPWP</td><td>: <?= $invoice['npwp_customer'] ?? '0000.0000.0000.0000' ?></td></tr>
  </table>

  <br>
<?php  endforeach; ?>
  <!-- TABEL BARANG -->
  <table>
    <thead>
      <tr class="center bold">
        <th>No</th>
        <th>Barang / Jasa</th>
        <th>Kuantitas</th>
        <th>Harga Satuan</th>
        <th>Harga Jual / Penggantian</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; $total=0; foreach ($items as $item): ?>
      <tr style="font-size: 12px;">
        <td class="center"><?= $no++ ?></td>
        <td>Nama Barang:<?= $item['nama_barang'] ?> | Mesh:<?= $item['mesh']?> | Bloom:<?= $item['bloom']?></td>
        <td class="center"><?= number_format($item['jumlah_po_customer'], 2, ',', '.') ?> <?= $item['satuan'] ?></td>
        <td class="right">Rp. <?= number_format($item['harga_po_customer'], 2, ',', '.') ?></td>
        <td class="right">Rp. <?= number_format($item['jumlah_po_customer'] * $item['harga_po_customer'], 2, ',', '.') ?></td>
      </tr>
      <?php $total += ($item['jumlah_po_customer'] * $item['harga_po_customer']); endforeach; ?>
    </tbody>
  </table>

  <br>
  <table class="no-border">
    <tr>
      <td class="right bold">Jumlah Harga Jual :</td>
      <td class="right bold" width="25%">Rp. <?= number_format($total, 2, ',', '.') ?> Rp</td>
    </tr>
  </table>

  <br>

  <!-- BAGIAN FAKTUR -->
  <table class="no-border">
    <tr><td class="section-title">FAKTUR / INVOICE</td></tr>
  </table>

  <table>
    <tr><td>Jumlah Harga Jual</td><td class="right">Rp. <?= number_format($total, 2, ',', '.') ?></td></tr>
    <tr><td>Dikurangi potongan / uang muka</td><td class="right">Rp - </td></tr>
    <?php
      $dpp = ($total * 11) / 12;
      $ppn = $dpp * 0.12;
      $materai = 10000;
      $grand_total = $dpp + $ppn + $materai;
    ?>
    <tr><td>Dasar Pengenaan Pajak (11/12 x Harga Jual)</td><td class="right">Rp.<?= number_format($dpp, 2, ',', '.') ?></td></tr>
    <tr><td>PPN (12%)</td><td class="right">Rp. <?= number_format($ppn, 2, ',', '.') ?></td></tr>
    <tr><td>Materai</td><td class="right">Rp. <?= number_format($materai, 2, ',', '.') ?></td></tr>
    <tr class="bold"><td>Jumlah yang harus dibayar</td><td class="right">Rp. <?= number_format($grand_total, 2, ',', '.') ?></td></tr>
  </table>

  <br>

  <!-- CATATAN -->
   <?php  foreach ($res_customer as $invoice) ?>
  <p><b>Catatan :</b></p>
  <p>1. Pembayaran dengan giro/cheque atau transfer atas nama bila dibubuhi materai secukupnya.</p>
  <p>2. Bank: BCA Cabang Gama Tower - Jakarta Selatan</p>
  <p>&nbsp;&nbsp;&nbsp;&nbsp;a/n PT. KAPSULINDO NUSANTARA<br>&nbsp;&nbsp;&nbsp;&nbsp;a/c. 504.0000000</p>
  <p>3. Tgl Jatuh Tempo: <?= date('d F Y', strtotime($invoice['tgl_jatuh_tempo'] ?? '2025-10-31')) ?></p>

  <br><br><br>
  <p class="right">Bogor, <?= date('d F Y') ?><br><br><br>
  <b><?= $invoice['name_admin'] ?? 'SRI WULAN' ?></b></p>

  <img class="bottom-image" src="<?= FCPATH . 'assets/images/Kop_Bawah.png' ?>" alt="" width="800px" height="" >
</body>
</html>
