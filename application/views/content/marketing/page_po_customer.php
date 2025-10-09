<html>
<head>
  <title>Export Laporan PO Customer</title>
  <style type="text/css">
  @page {
    size: landscape;
    margin: 20mm 10mm;
  }
  
  body{
    font-family: sans-serif;
    margin: 0;
    padding: 0;
    
  }
  
  .header {
    position: fixed;
    top: -60px;
    left: 0;
    right: 0;
    height: 80px;
    text-align: center;
  }
  
  .footer {
    position: fixed;
    bottom: -40px;
    left: 0;
    right: 0;
    height: 60px;
    font-size: 8px;
  }
  
  .content {
    margin-top: 90px;
    margin-bottom: 50px;
  }
  
  table{
    width: 100%;
    margin: 10px auto;
    border-collapse: collapse;
    font-size: 10px;
  }
  
  table th,
  table td{
    border: 1px solid #3c3c3c;
    padding: 4px 6px;
  }
  
  table td{
    vertical-align: top;
  }
  
  .company-header {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 10px;
  }
  
  .company-header td {
    border: none;
    padding: 2px;
    vertical-align: top;
  }
  
  .logo {
    width: 80px;
    height: auto;
  }
  
  .pom-logo {
    width: 300px;
    right: 50px;
    top: 100px;
    z-index: 0;
}
  
 .footer-image {
    width: 800px;
    height: auto;
    position: absolute;
    right: 18%;
    bottom: 10%;
}
  
  .report-title {
    text-align: center;
    margin: 5px 0;
  }
  
  .filter-info {
    text-align: center;
    font-size: 11px;
    margin: 5px 0;
  }

  .hh tr td{
    border: 0;
    padding: 0
  }
  .hh{
    margin-bottom: 2px;
  }
  
  .footer-info {
    position: absolute;
    right: 10px;
    bottom: 5px;
    text-align: right;
    font-size: 9px;
  }
  </style>
</head>

<body>
  <!-- HEADER SECTION -->
  <div class="header">
    <table class="company-header">
      <tr>
        <td style="width: 15%; text-align: left; vertical-align: middle;">
          <img class="logo" src="<?= FCPATH.'assets/images/pom.jpeg' ?>" alt="Logo Perusahaan">
        </td>
        <td style="width: 70%; text-align: center;">
          <h2 style="margin: 2px 0; font-size: 16px; font-weight: bold;">PT. KAPSULINDO PUTRA TRADING</h2>
          <p style="margin: 1px 0; font-size: 10px;">+62 21 8671164 | +62 21 8672466</p>
          <p style="margin: 1px 0; font-size: 10px;">trading@kapsulindo.co.id</p>
          <p style="margin: 1px 0; font-size: 9px;">marketing_kapsulindo@yahoo.co.id – kapsulindo.trading@gmail.com</p>
          <p style="margin: 1px 0; font-size: 10px;">JI. Pancasila I, Cicadas Gunung Putri, Kab. Bogor, Jawa Barat 16964 – Indonesia</p>
        </td>
        <td style="width: 15%; text-align: right; vertical-align: middle;">
          <img class="pom-logo" src="<?= FCPATH.'assets/images/logo_kanan.jpg' ?>" alt="Logo POM">
        </td>
      </tr>
    </table>
    <hr style="margin: 2px 0;">
  </div>

  <!-- FOOTER SECTION DENGAN GAMBAR DI KIRI -->
  <div class="footer">
   
    <!-- Gambar di kiri pojok bawah -->
    <img class="footer-image" src="<?= FCPATH.'assets/images/gambar_kiri.jpg' ?>" alt="Footer Logo">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <hr >
    <!-- Informasi halaman di kanan -->
    
      
      
    </div>
  </div>

  
  <div class="content">
    <?php 
    
    if ($tgl == null & $tgl2 == null & $nama_customer == null & $nama_barang == null) {
      $per = "";
    } else if ($nama_customer == null & $nama_barang == null){
      $per = "Periode : ".$tgl." - ".$tgl2;
    } else if ($tgl == null & $tgl2 == null & $nama_barang == null){
      $per = "Customer : ".$nama_customer;
    } else if ($tgl == null & $tgl2 == null & $nama_customer == null){
      $per = "Barang : ".$nama_barang;
    } else if ($tgl == null & $tgl2 == null ){
      $per = "Customer : ".$nama_customer. "<br>Barang : ".$nama_barang;
    } else {
      $per = "Customer : ".$nama_customer. "<br>Barang : ".$nama_barang.
      "<br>Periode : ".$tgl." - ".$tgl2;
    }
    ?>
    
    <!-- Report Title -->
    <div class="report-title">
      <h3 style="margin: 5px 0; font-size: 14px;">Report PO Customer</h3>
      <?php if(!empty($per)): ?>
      <p style="line-height: 1.2;font-size: 12px;"><?=$per?></p>
      <?php endif; ?>
    </div>

    <?php 
   
    if(count($result) == 0){
      echo "<center style='text-align: center;'><h3>Data Kosong</h3></center>";
    }else{
    ?>
    
    <!-- Data Table - STRUCTURE TETAP SAMA -->
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Tanggal PO</th>
          <th>Customer</th>
          <th>Nama Barang</th>
          <th>Mesh</th>
          <th>Bloom</th>
          <th>Qty (Kg)</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no=1;
        $jml=0;
        foreach($result as $k){    
          $tgl_po =  explode('-', $k['tgl_po_customer'])[2]."/".explode('-', $k['tgl_po_customer'])[1]."/".explode('-', $k['tgl_po_customer'])[0];   
          $jml += $k['jumlah_po_customer']; 
        ?>
        <tr>
          <th><?=$no++?></th>
          <td><?=$tgl_po?></td>
          <td><?=$k['nama_customer']?></td>
          <td><?=$k['nama_barang']?></td>
          <td style="text-align: center;"><?=$k['mesh']?></td>
          <td style="text-align: center;"><?=$k['bloom']?></td>
          <td style="text-align: right;"><?=number_format($k['jumlah_po_customer'],0,",",".")?>&nbsp;<?=$k['satuan']?></td>
        </tr>
        <?php } ?>
      </tbody>
      <tfoot>
        <tr>
          <th colspan="6" class="center">Jumlah (Kg)</th>
          <th style="text-align: right;"><?=number_format($jml,0,",",".")?>&nbsp;<?=$k['satuan']?></th>
        </tr>
      </tfoot>
    </table>
    
    <?php } ?>
  </div>
</body>
</html>