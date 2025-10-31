<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Laporan Sample Masuk</title>
   <style type="text/css">
    @page {
      margin: 40px 25px;
    }

    body {
      font-family: "DejaVu Sans", Arial, sans-serif;
      font-size: 12px;
      color: #333;
    }

    /* Header perusahaan (pakai tabel biar stabil di PDF) */
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
  <!-- HEADER (pakai tabel supaya stabil di PDF) -->
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



  <!-- TITLE -->
  <div class="title">
    <center><h3>Laporan Sample Masuk</h3></center>
  </div>

  <!-- FILTER INFO -->
  <div class="filter">
    <?php if(!empty($tgl) && !empty($tgl2)) : ?>
      <p>Periode : <?= $tgl ?> - <?= $tgl2 ?></p>
    <?php endif; ?>

    <?php if(!empty($nama_barang)) : ?>
      <p>Barang : <?= $nama_barang ?></p>
    <?php endif; ?>

    <?php if(!empty($nama_customer)) : ?>
      <p>Supplier : <?= $nama_customer ?></p>
    <?php endif; ?>
  </div>


  <?php if(!empty($detail)) : ?>

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
        <td class="text-center"><?= number_format($d['jumlah_masuk']) ?> <?= $d['satuan'] ?? 'Unit' ?></td>
        <td class="text-center"><?= $d['no_batch'] ?></td>
        <td class="text-center"><?= $d['kode_sample_in'] ?></td>
        <td class="text-center"><?= !empty($d['tgl_masuk_sample']) ? date('d/m/Y', strtotime($d['tgl_masuk_sample'])) : '-' ?></td>
        <td class="text-center"><?= $d['ket_masuk'] ?? '-' ?></td>
      </tr>
      <?php endforeach; ?>
      <?php if(count($detail) > 1): ?>
      <tr style="font-weight:bold;">
        <td colspan="2" class="text-right">Total Sample Masuk</td>
        <td class="text-center"><?= number_format($total) ?> <?= $d['satuan'] ?? 'Unit' ?></td>
        <td colspan="4"></td>
      </tr>
      <?php endif; ?>
    </tbody>
  </table>

  <?php endif ;?>
  <?php if(empty($detail)) : ?>
    <center><h2>Data Kosong</h2></center>

    <?php endif;?>
  <!-- FOOTER -->
  <div class="footer">
    <p>Dicetak otomatis oleh sistem | <?= date('d/m/Y H:i:s') ?></p>
  </div>

</body>
</html>
