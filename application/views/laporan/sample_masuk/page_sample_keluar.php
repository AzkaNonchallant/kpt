<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Laporan Sample Masuk</title>
  <style>
    @page {
      size: landscape;
      margin: 20mm 10mm;
    }
    body {
      font-family: sans-serif;
      font-size: 14px;
      margin: 0px;
      padding: 0px;
      line-height: 1;
      display: flex;
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

    .pom-logo {
      width: 300;
      right: 50px;
      top: 100px;
      z-index: 0;
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
  </style>
</head>
<body>
    
  <div class="content">
    <!-- Header Perusahaan -->
    <div class="company-container">
      <img src="assets/images/logo_kanan.jpg" alt="" style="margin-left: 490;">
      
      <div class="company-details">
        <table class="header-table company-header">
          <tr>
            <td width="70%">
              <h2 style="margin:0; font-size: 20px;">PT KAPSULINDO PUTRA TRADING</h2>
              <p style="margin:0; font-size:12px;">PEDAGANG BESAR FARMASI</p>
              <p style="margin:0; font-size:12px;">JL. PANCASILA I CICADAS</p>
              <p style="margin:0; font-size:12px;">GUNUNG PUTRI - BOGOR</p>
            </td>
           
            <td width="30%" style="vertical-align: top;">
              <table class="no-border">
                <tr>
                  <td><b>NPWP</b></td>
                  <td>: </td>
                </tr>
                <tr>
                  <td><b>PBF No.</b></td>
                  <td>: </td>
                </tr>
                <tr>
                  <td><b>CDOB No.</b></td>
                  <td>: </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </div>
    </div>

    <!-- Judul Laporan Sample Masuk -->
    <h3 class="center" style="margin-bottom: 3px; margin-top: 10px;">LAPORAN SAMPLE MASUK</h3>
    
    <!-- Nomor dan Tanggal -->
    <table class="no-border header-info">
      <tr>
        <td width="15%"><b>KODE SAMPLE</b></td>
        <td width="2%">:</td>
        <td width="33%"><?= $row['kode_sample_out'] ?? '-' ?></td>
        <td width="15%"><b>NO. BATCH</b></td>
        <td width="2%">:</td>
        <td width="33%"><?= $row['no_batch'] ?? '-' ?></td>
      </tr>
      <tr>
        <td><b>TANGGAL MASUK</b></td>
        <td>:</td>
        <td><?= date('d-M-Y', strtotime($row['tgl_masuk_sample'])) ?></td>
        <td><b>GUDANG ADMIN</b></td>
        <td>:</td>
        <td><?= $row['gudang_admin'] ?? '-' ?></td>
      </tr>
    </table>

    <hr style="margin: 5px 0;">

    <!-- Informasi Customer -->
    <div style="margin-bottom: 8px;">
      <p style="margin: 0 0 2px 0; font-weight: bold;">INFORMASI CUSTOMER</p>
      <table class="no-border">
        <tr>
          <td width="15%">NAMA CUSTOMER</td>
          <td width="2%">:</td>
          <td width="83%"><?= $row['nama_customer'] ?? '-' ?></td>
        </tr>
        <tr>
          <td>ALAMAT</td>
          <td>:</td>
          <td><?= $row['alamat_customer'] ?? '-' ?></td>
        </tr>
        <tr>
          <td>KETERANGAN</td>
          <td>:</td>
          <td><?= $row['ket_masuk'] ?? '-' ?></td>
        </tr>
      </table>
    </div>

    <!-- Tabel Barang Sample Masuk -->
    <table>
      <thead style="border: 1px solid;">
        <tr class="center bold" style="border:1px solid;">
          <th width="5%">No</th>
          <th width="25%">Nama Barang</th>
          <th width="15%">Jumlah Masuk</th>
          <th width="15%">No. Batch</th>
          <th width="15%">Kode Sample</th>
          <th width="15%">Tanggal Masuk</th>
          <th width="10%">Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no = 1; 
        $total = 0;
        foreach ($detail as $d): 
          $total += $d['jumlah_keluar'];
          
          $nama_barang_formatted = $d['nama_barang'];
          if (!empty($d['bloom']) || !empty($d['mesh'])) {
              $nama_barang_formatted .= " Bloom: " . $d['bloom'] . " Mesh: " . $d['mesh'];
          }
        ?>
        <tr>
          <td class="center"><?= $no++ ?></td>
          <td><?= $nama_barang_formatted ?></td>
          <td class="center"><?= number_format($d['jumlah_keluar'], 3) ?> <?= $d['satuan'] ?? 'Unit' ?></td>
          <td class="center"><?= $d['no_batch'] ?></td>
          <td class="center"><?= $d['kode_sample_out'] ?></td>
          <td class="center">
            <?= !empty($d['tgl_masuk_sample']) ? date('d/m/Y', strtotime($d['tgl_masuk_sample'])) : '-' ?>
          </td>
          <td class="center"><?= $d['ket_masuk'] ?? '-' ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
      <?php if(count($detail) > 1): ?>
      <tfoot>
        <tr class="bold">
          <td colspan="2" class="right">Total Sample Masuk</td>
          <td class="center"><?= number_format($total, 3) ?> <?= $d['satuan'] ?? 'Unit' ?></td>
          <td colspan="4"></td>
        </tr>
      </tfoot>
      <?php endif; ?>
    </table>
  </div>

  
  <div class="footer">
    <table class="tab-footer" width="100%" style="border: none;">
      <tr>
        <td width="50%" style="text-align:left; vertical-align: top;">
          <p style="margin:0;">Penanggung Jawab Gudang</p>
          <p style="margin:0;">Bogor, <?= date('d-m-Y') ?></p>
          <div class="signature-space"></div>
          <p style="margin:0;">_</p>
          <p style="margin:0;"><u>apt. Ahmad Farhan, S.Farm</u></p>
          <br>
          <p style="margin:0; font-size: 9px;">500.16.7.2/251/SIPA-1/00233/DPMPTSP/2025</p>
        </td>
        <td width="50%" style="text-align:left; vertical-align: top;">
          <p style="margin-left: 400px;">Sample diterima dalam kondisi baik tanggal...... oleh :</p>
          <div class="signature-space"></div>
          <p style="margin-left: 400px;">_</p>
          <p style="margin-left: 400px;">Pandu A</p>
          <p style="margin-left: 400px;">Nama Jelas & Stempel Perusahaan</p>
        </td>
      </tr>
    </table>
    <br>
    <br>
    <p style="font-size:14px; margin-top:10px; text-align:center; border: 1px solid">
      <i>Catatan: Laporan sample masuk ini dibuat secara otomatis dari sistem</i>
    </p>
  </div>

  <img src="assets/images/gambar_kiri.jpg" alt="blank" style="margin-right: 300px;">

</body>
</html>