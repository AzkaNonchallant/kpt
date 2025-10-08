<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <title>Surat Jalan</title>

  <style>

    body {

      font-family: sans-serif;

      font-size: 12px;

      margin: 20px;

      line-height: 1.2;

    }



    table {

      width: 100%;

      border-collapse: collapse;

      margin-top: 10px;

    }



    td {

      border: 1px solid #000;

      padding: 5px;

      text-align: left;

      vertical-align: top;

    }



    th {

  background-color: #007bff; /* Warna biru */

  color: white; /* Warna teks putih */

  font-weight: bold;

  }



    .no-border td {

      border: none;

      padding: 2px 0;

    }



    .center { text-align: center; }

    .right { text-align: right; }

    .bold { font-weight: bold; }

    .header-table td { border: none; }



    /* Fix Footer */

    .footer {

      margin-top: 30px;

      font-size: 11px;

    }



    .note {

      font-style: italic;

      font-size: 11px;

      margin-top: 5px;

    }

    

    .tab-footer td {

      border: none;

      padding: 5px;

      vertical-align: top;

    }

    

    .info-table {

      width: 100%;

      margin: 10px 0;

    }

    

    .info-table td {

      padding: 2px 5px;

      vertical-align: top;

    }

    

    .signature-table {

      width: 100%;

      margin-top: 40px;

    }

    

    .signature-table td {

      border: none;

      padding: 5px;

      vertical-align: top;

    }

    

    .underline {

      text-decoration: underline;

    }

    

    .header-info {

      margin-bottom: 15px;

    }

    

    .header-info p {

      margin: 2px 0;

    }

    

    .company-header {

      margin-bottom: 10px;

    }

    

    .company-container {

      display: flex;

      align-items: flex-start;

      gap: 15px;

    }

    

    .company-icon {

      width: 60px;

      height: 60px;

      flex-shrink: 0;

    }

    

    .company-details {

      flex: 1;

    }

  </style>

</head>

<body>



  <!-- Header Perusahaan -->

  <div class="company-container">

    <!-- Ikon Perusahaan -->

    <img src="<?= FCPATH . 'assets/images/Logo_baru.jpg' ?>" class="company-icon" alt="Logo Perusahaan">

    

    <div class="company-details">

      <table class="header-table company-header">

        <tr>

          <td width="70%">

            <h2 style="margin:0;">PT KAPSULINDO PUTRA TRADING</h2>

            <p style="margin:0; font-size: 14px;">PEDAGANG BESAR FARMASI</p>

            <p style="margin:0;">JL. PANCASILA I CICADAS</p>

            <p style="margin:0;">GUNUNG PUTRI - BOGOR</p>

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



  <!-- Judul Surat Jalan -->

  <h3 class="center" style="margin-bottom: 5px; margin-top: 20px;">SURAT JALAN</h3>

  

  <!-- Nomor dan Tanggal -->

  <table class="no-border header-info">

    <tr>

      <td width="5%"><b>NO</b></td>

      <td width="2%">:</td>

      <td width="33%"><?= $row['no_surat_jalan'] ?></td>

      <td width="15%"><b>TANGGAL</b></td>

      <td width="2%">:</td>

      <td width="33%"><?= date('d-M-Y', strtotime($row['tgl'])) ?></td>

    </tr>

    <tr>

      <td><b>NO. SPPB</b></td>

      <td>:</td>

      <td><?= $row['no_sppb'] ?></td>

      <td></td>

      <td></td>

      <td></td>

    </tr>

  </table>



  <hr style="margin: 10px 0;">



  <!-- Informasi Pembeli -->

  <div style="margin-bottom: 10px;">

    <p style="margin: 0; font-weight: bold;">PEMBELI</p>

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

      <tr class="center bold">

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

        

        // Format nama barang sesuai contoh PDF: "Gelatine: GLOBAL Bloom : 150 Mesh : 08"

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



  



  <!-- Tanda Tangan -->

  <div class="footer">

    <table class="tab-footer" width="100%" style="border: none;">

      <tr>

        <td width="50%" style="text-align:left; vertical-align: top;">

          <p style="margin:0;">Penanggung Jawab PBF</p>

          <p style="margin:0;">Bogor, <?= date('d-m-Y', strtotime($row['tgl'])) ?></p>

          <br><br><br>

          <p style="margin:0;">_</p>

          <p style="margin:0;"><u>apt. Ahmad Farhan, S.Farm</u></p>

          <p style="margin:0; font-size: 10px;">500.16.7.2/251/SIPA-1/00233/DPMPTSP/2025</p>

        </td>

        <td width="50%" style="text-align:left; vertical-align: top;">

          <p style="margin:0;">Barang diterima dalam kondisi baik tanggal...... oleh :</p>

          <br><br><br>

          <p style="margin:0;">_</p>

          <p style="margin:0;">Pandu A</p>

          <p style="margin:0;">Nama Jelas & Stempel Perusahaan</p>

        </td>

      </tr>

    </table>

    <p style="font-size:10px; margin-top:20px; text-align:center;">

      <i>Pengembalian dan penukaran barang maksimum 7 hari setelah barang diterima</i>

    </p>

  </div>



</body>

</html>