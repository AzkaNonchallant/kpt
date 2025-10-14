<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Surat Jalan</title>
  <style>
    body {
      font-family: sans-serif;
      font-size: 14px;
      /* margin: 15px 20px 10px 20px; */
      line-height: 1;
      display: flex;
      flex-direction: column;
      min-height: 95vh;
    }

    .content {
      flex: 1;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 5px;
    }

    td {
      border: 1px solid #000;
      padding: 3px;
      text-align: left;
      height: 30px;
    }

    th {
      background-color: #007bff;
      color: white;
      font-weight: bold;
      padding: 4px;
    }

    .no-border td {
      border: none;
      padding: 1px 0;
    }

    .center { text-align: center; }
    .right { text-align: right; }
    .bold { font-weight: bold; }
    .header-table td { border: none; }

    /* Footer at bottom */
    .footer {
      margin-top: auto;
      font-size: 14px;
      padding-top: 10px;
    }

    .note {
      font-style: italic;
      font-size: 10px;
      margin-top: 3px;
    }
    
    .tab-footer td {
      border: none;
      padding: 3px;
      vertical-align: top;
    }
    
    .info-table {
      width: 100%;
      margin: 5px 0;
    }
    
    .info-table td {
      padding: 1px 3px;
      vertical-align: top;
    }
    
    .signature-table {
      width: 100%;
      margin-top: 20px;
    }
    
    .signature-table td {
      border: none;
      padding: 3px;
      vertical-align: top;
    }
    
    .underline {
      text-decoration: underline;
    }
    
    .header-info {
      margin-bottom: 8px;
    }
    
    .header-info p {
      margin: 1px 0;
    }
    
    .company-header {
      margin-bottom: 8px;
    }
    
    .company-container {
      display: flex;
      align-items: flex-start;
      gap: 10px;
      margin-bottom: 5px;
    }
    
    .company-icon {
      width: 60px;
      height: 60px;
      flex-shrink: 0;
    }
    
    .company-details {
      flex: 1;
    }

    h3.center {
      margin: 8px 0 3px 0;
    }

    hr {
      margin: 5px 0;
    }

    /* Signature spacing */
    .signature-space {
      height: 50px;
      margin: 8px 0;
    }

    /* Force footer to bottom */
    .footer-container {
      position: relative;
      width: 100%;
    }

    img {
      max-width: 100%;
    }

    .image {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: auto;
      z-index: -100;
      /* opacity: 0.5; */
    }
  </style>
</head>
<body>

  <img src="<?= FCPATH . 'assets/images/Kop_Atas.png'?>" alt="">
  <div class="content">
    <!-- Header Perusahaan -->
    <div class="company-container">
    <!-- Judul Surat Jalan -->
    <h3 class="center" style="margin-bottom: 3px; margin-top: 10px;">SURAT JALAN</h3>
    
    <!-- Nomor dan Tanggal -->
    <table class="no-border header-info" ">
      <tr>
        <td width="5%"><b>NO</b></td>
        <td width="2%">:</td>
        <td width="33%"><?= $row['no_surat_jalan'] ?></td>
      </tr>
      <tr>
        <td><b>NO. SPPB</b></td>
        <td>:</td>
        <td><?= $row['no_sppb'] ?></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
         <td width="15%"><b>TANGGAL</b></td>
        <td width="2%">:</td>
        <td width="33%"><?= date('d-M-Y', strtotime($row['tgl'])) ?></td>
      </tr>
    </table>

    <hr style="margin: 5px 0;">

    <!-- Informasi Pembeli -->
    <div style="margin-bottom: 8px;">
      <p style="margin: 0 0 2px 0; font-weight: bold;">PEMBELI</p>
      <table class="no-border">
        <tr>
          <td width="15%">NAMA</td>
          <td width="2%">:</td>
          <td width="83%"><?= $row['nama_customer'] ?></td>
        </tr>
        <tr>
          <td>No. PO</td>
          <td>:</td>
          <td><?= $row['no_po'] ?></td>
        </tr>
        <tr>
          <td>ALAMAT</td>
          <td>:</td>
          <td><?= $row['alamat_customer'] ?></td>
        </tr>
        <tr>
          <td>ALAMAT KIRIM</td>
          <td>:</td>
          <td><?= $row['alamat_customer'] ?></td>
        </tr>
      </table>
    </div>

    <!-- Tabel Barang -->
    <table>
      <thead>
        <tr class="center bold" style="border:1px solid;">
          <th width="5%">No</th>
          <th width="40%">Nama Barang</th>
          <th width="15%">Jumlah</th>
          <th width="15%">No. Batch</th>
          <th width="15%">Tgl Expired</th>
          <th width="10%">Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no = 1; 
        $total = 0;
        foreach ($detail as $d): 
          $total += $d['jumlah_kirim'];
          
          $nama_barang_formatted = $d['nama_barang'];
          if (!empty($d['bloom']) || !empty($d['mesh'])) {
              $nama_barang_formatted .= " Bloom : " . $d['bloom'] . " Mesh : " . $d['mesh'];
          }
        ?>
        <tr>
          <td class="center"><?= $no++ ?></td>
          <td><?= $nama_barang_formatted ?></td>
          <td class="center"><?= number_format($d['jumlah_kirim'], 3) ?> <?= $d['satuan'] ?></td>
          <td class="center"><?= $d['no_batch'] ?></td>
          <td class="center">
            <?= !empty($d['tgl_exp']) ? date('d/m/Y', strtotime($d['tgl_exp'])) : '-' ?>
          </td>
          <td class="center"><?= $d['note_gudang'] ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
      <?php if(count($detail) > 1): ?>
      <tfoot>
        <tr class="bold">
          <td colspan="2" class="right">Total</td>
          <td class="center"><?= number_format($total, 3) ?> <?= $d['satuan'] ?></td>
          <td colspan="3"></td>
        </tr>
      </tfoot>
      <?php endif; ?>
    </table>
  </div>

  
  <br>
  <br>
  <br>
  <br>
  <br>
  <div class="footer">
    <table class="tab-footer" width="100%" style="border: none;">
      <tr>
        <td width="50%" style="text-align:left; vertical-align: top;">
          <p style="margin:0;">Penanggung Jawab PBF</p>
          <p style="margin:0;">Bogor, <?= date('d-m-Y', strtotime($row['tgl'])) ?></p>
          <div class="signature-space"></div>
          <p style="margin:0;">_________________________</p>
          <br>
          <p style="margin:0;">apt. Ahmad Farhan, S.Farm</p>
          <br>
          <p style="margin:0; font-size: 9px;">500.16.7.2/251/SIPA-1/00233/DPMPTSP/2025</p>
        </td>
        <td width="50%" style="text-align:left; vertical-align: top;">
          <p style="margin:0;">Barang diterima dalam kondisi baik tanggal...... oleh :</p>
          <div class="signature-space"></div>
          <p style="margin:0;">_________________________</p>
          <br>
          <p style="margin:0;">Pandu A</p>
          <br>
          <p style="margin:0;">Nama Jelas & Stempel Perusahaan</p>
        </td>
      </tr>
    </table>
    <br>
    <br>
    <br>
    <br>
    <p style="font-size:12px; margin-top:10px; text-align:center; ">
      <i>Pengembalian dan penukaran barang maksimum 7 hari setelah barang diterima</i>
    </p>
  </div>

  <img class="image" src="<?= FCPATH . '/assets/images/Kop_Bawah.png'?>" alt="">
</body>
</html>