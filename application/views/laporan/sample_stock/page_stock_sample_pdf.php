<html>
<head>
  <title>Laporan Stok Sample</title>
  <style>
    body {
      font-family: sans-serif;
      font-size: 12px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }
    th, td {
      border: 1px solid #000;
      padding: 5px;
      text-align: left;
    }
    th {
      background: #eee;
      text-align: center;
    }
    h2, h4 {
      text-align: center;
      line-height: 0.2;
    }
  </style>
</head>
<body>

  <h2>PT KAPSULINDO NUSANTARA</h2>
  <h4>Laporan Stok Sample per Batch</h4>
  <hr>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>No Batch</th>
        <th>Kode Sample In</th>
        <th>Nama Barang</th>
        <th>Customer</th>
        <th>Tgl Masuk</th>
        <th>Jumlah Masuk</th>
        <th>Jumlah Keluar</th>
        <th>Stok Akhir</th>
        <th>Gudang Admin</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $no = 1;
      foreach($result as $row): 
      ?>
      <tr>
        <td style="text-align:center;"><?= $no++ ?></td>
        <td><?= htmlspecialchars($row['no_batch']) ?></td>
        <td><?= htmlspecialchars($row['kode_sample_in']) ?></td>
        <td><?= htmlspecialchars($row['nama_barang']) ?></td>
        <td><?= htmlspecialchars($row['nama_customer']) ?></td>
        <td><?= htmlspecialchars($row['tgl_masuk_sample']) ?></td>
        <td style="text-align:right;"><?= number_format($row['jumlah_masuk'] ?? 0, 0, ',', '.') ?></td>
        <td style="text-align:right;"><?= number_format($row['jumlah_keluar'] ?? 0, 0, ',', '.') ?></td>
        <td style="text-align:right;"><?= number_format($row['stok'] ?? 0, 0, ',', '.') ?></td>
        <td><?= htmlspecialchars($row['gudang_admin']) ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</body>
</html>