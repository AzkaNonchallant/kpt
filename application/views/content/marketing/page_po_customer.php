<html>

<head>

  <title>Export Laporan PO Customer</title>
  <style type="text/css">
  body{
    font-family: sans-serif;
  }
  table{
    width: 100%;
    margin: 20px auto;
    border-collapse: collapse;
  }
  table th,
  table td{
    border: 1px solid #3c3c3c;
    padding: 3px 8px;
  }
  table td{
    vertical-align: top;
  }
  a{
    background: blue;
    color: #fff;
    padding: 8px 10px;
    text-decoration: none;
    border-radius: 2px;
  }
  .hh tr td{
    border: 0;
    padding: 0
  }
  .hh{
    margin-bottom: 2px;
  }
  </style>
</head>
<body>
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
    $per = "Customer : ".$nama_customer. "<br><br><br><br><br><br><br><br><br><br><br>Barang : ".$nama_barang;
  } else {
    $per = "Customer : ".$nama_customer. "<br><br><br><br><br><br><br><br><br><br><br>Barang : ".$nama_barang.
    "<br><br><br><br><br><br><br><br><br><br><br>Periode : ".$tgl." - ".$tgl2;
  }
    
    ?>
  
    <table class="hh">
      <tr>
        <td>
          
        </td>
        <td style="text-align: center;padding: -20px;">
          <img style="width: 60px;height: 100px;" src="<?= FCPATH.'assets/images/Logo_baru.jpg' ?>">
        </td>
        <td style="width: 460px;">
    <h2 style="line-height: 0.01; font-size: 30px;">PT KAPSULINDO NUSANTARA</h2>
    <h3 style="line-height: 0.01; font-size: 23px;">Pedagang Besar Bahan Baku Farmasi</h3>
    <p style="line-height: 0.01;font-size: 12px;">Jl. Pancasila 1 Cicadas Gunung Putrri - Kab. Bogor 16964, Indonesia</p>
    <p style="line-height: 0.01;font-size: 12px;">Tlp:(021) 8671165. Fax:(021) 8671168,86861734. Email: pbbbf@kapsulindo.co.id</p>
        </td>
        <td style="padding:-10px; ">
          <img style="width: 120px;height: 100px;" src="<?= FCPATH.'assets/images/pom.jpeg' ?>">
        </td>
        <td>
          
        </td>]
      </tr>
    </table>
    <hr style="line-height: 0.01;">
    <div style="text-align: center;padding-top: 5px;">
    <h3 style="float: center;line-height: 0.2;">Report PO Customer</h3>
    <p style="line-height: 0.1;font-size: 12px;"><?=$per?></p>
  </div>
  
    <?php 
    if(count($result) == 0){
      echo "<center style='text-align: center;'><h3>Data Kosong</h3></center>";
      // $d = "display:none;";
    }else{
?>

    
  
                                                  <table style="width: 1000px;">
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
                                                    	<?php
                                                    	}
                                                    	?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                          <th colspan="6" class="center">Jumlah (Kg)</th><th style="text-align: right;"><?=number_format($jml,0,",",".")?>&nbsp;<?=$k['satuan']?></th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
  <?php      
    }
    ?>
  </body>
</html>