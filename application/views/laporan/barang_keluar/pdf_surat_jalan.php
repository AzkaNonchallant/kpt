<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Surat Jalan</title>
  <style>
    body { font-family: sans-serif; font-size: 12px; }
    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    th, td { border: 1px solid #000; padding: 5px; text-align: left; }
    .no-border td { border: 0; }
    .center { text-align: center; }
    .right { text-align: right; }
    .bold { font-weight: bold; }
    .header-table td { border: none; }
  </style>
</head>
<body>

  <!-- Header -->
  <table class="header-table">
    <tr>
      <td width="20%">
        <img src="<?= base_url('assets/images/icon.png') ?>" width="70">
      </td>
      <td class="center">
        <h2 style="margin:0;">PT KAPSULINDO PUTRA TRADING</h2>
        <p style="margin:0;">PEDAGANG BESAR FARMASI (PBF)</p>
        <p style="margin:0;">Jl. Pancasila 1 Cicadas, Gunung Putri - Bogor</p>
        <p style="margin:0;">Telp: (021) 8671165 | Fax: (021) 8671168</p>
      </td>
      <td width="20%">
        <img src="<?= base_url('assets/images/pom.jpeg') ?>" width="80">
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
      <td><b>Tanggal</b></td><td>: <?= date('d-M-Y', strtotime($row['tgl'])) ?></td>
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
        <th width="15%">No Batch</th>
        <th width="15%">Exp Date</th>
        <th width="10%">Qty</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $no=1; $total=0;
      foreach($detail as $d): 
        $total += $d['qty'];
      ?>
      <tr>
        <td class="center"><?= $no++ ?></td>
        <td><?= $d['nama_barang'] ?></td>
        <td class="center"><?= $d['mesh'] ?></td>
        <td class="center"><?= $d['bloom'] ?></td>
        <td class="center"><?= $d['no_batch'] ?></td>
        <td class="center"><?= date('d/m/Y', strtotime($d['exp'])) ?></td>
        <td class="right"><?= number_format($d['qty'],0,",",".") ?> <?= $d['satuan'] ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
      <tr class="bold">
        <td colspan="6" class="right">Total</td>
        <td class="right"><?= number_format($total,0,",",".") ?> <?= $d['satuan'] ?></td>
      </tr>
    </tfoot>
  </table>

  <p><i>Note: COA & Sertifikat Halal Terlampir</i></p>

  <!-- Footer -->
  <br><br>
  <table class="no-border" style="text-align:center;">
    <tr>
      <td>Diterima Oleh,<br><br><br><br>___________________<br>Pharmacist</td>
      <td></td>
      <td>
        Bogor, <?= date('d-m-Y', strtotime($row['tgl'])) ?><br>
        Diserahkan Oleh,<br>
        <img src="<?= base_url('assets/images/ttd2.png') ?>" width="100"><br>
        <b>(Apt. Ahmad Farhan, S.Farm)</b><br>
        <small>SIPA: 199911112/SIPA_32.01/DPMPTSP/2018/1-00040</small>
      </td>
    </tr>
  </table>

</body>
</html>
