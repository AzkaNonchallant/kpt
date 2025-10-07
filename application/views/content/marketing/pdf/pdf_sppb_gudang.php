<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Laporan PO Customer</title>
  <style>
    body { font-family: sans-serif; font-size: 11px; }
    table { border-collapse: collapse; width: 100%; }
    th, td { border: 1px solid #000; padding: 5px; }
    th { background: #f2f2f2; }
    .center { text-align: center; }
    .right { text-align: right; }
  </style>
</head>
<body>

  <table width="100%">
    <tr>
      <td width="20%">
        <img src="file://<?= FCPATH ?>assets/images/Logo_baru.jpg" width="70">
      </td>
      <td class="center">
        <h2 style="margin:0;">PT KAPSULINDO PUTRA TRADING</h2>
        <p style="margin:0;">PEDAGANG BESAR FARMASI (PBF)</p>
        <p style="margin:0;">Jl. Pancasila 1 Cicadas, Gunung Putri - Bogor</p>
      </td>
      <td width="20%">
        <img src="file://<?= FCPATH ?>assets/images/pom.jpeg" width="70">
      </td>
    </tr>
  </table>

  <hr>

  <h3 class="center">LAPORAN PO CUSTOMER</h3>
  <p class="center">Periode: <?= $tgl ?> s/d <?= $tgl2 ?></p>

  <table>
    <thead>
      <tr class="center">
        <th>No</th>
        <th>Nama Customer</th>
        <th>Nama Barang</th>
        <th>Qty</th>
        <th>Tanggal PO</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; $total = 0; ?>
      <?php foreach($result as $r): ?>
        <?php $total += $r['jumlah_po_pembelian'] ?? 0; ?>
        <tr>
          <td class="center"><?= $no++ ?></td>
          <td><?= $r['nama_customer'] ?></td>
          <td><?= $r['nama_barang'] ?></td>
          <td class="right"><?= number_format($r['jumlah_po_pembelian'],0,",",".") ?></td>
          <td class="center"><?= date('d-m-Y', strtotime($r['tgl_po_customer'])) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="3" class="right"><b>Total</b></td>
        <td class="right"><b><?= number_format($total,0,",",".") ?></b></td>
        <td></td>
      </tr>
    </tfoot>
  </table>

</body>
</html>
