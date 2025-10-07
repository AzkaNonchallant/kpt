
<html>

<head>

  <title>Surat Jalan</title>
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
  #jj td{
    border: 0px;
    font-size: 13px;
    padding: 0
  }
  #jj .jdl{
    width: 30px;
    line-height: 20px;
    font-size: 14px;
  }
  #jj .td{
    width: 1px;
  }
  .hh tr td{
    border: 0;
    padding: 0;
  }
  .hh{
    margin-bottom: 2px;
  }
  </style>
</head>
<body>

    <?php
    // $tgl =  explode('-', $row['tgl'])[2]."-".explode('-', $row['tgl'])[1]."-".explode('-', $row['tgl'])[0];
    // $exp =  explode('-', $row['exp'])[2]."/".explode('-', $row['exp'])[1]."/".explode('-', $row['exp'])[0];
    ?>
    <br>
    
    <div style="border: 1; width: 100%;padding: 5;">
      <table id="jj" style="margin:0">
        <tr>
          <td colspan="2" class="jdl"><b>SURAT PERINTAH PENGIRIMAN BARANG (GELATIN)<b></td>
        </tr></br>
        <tr>
        <td class="jdl">SPPB</td><td>:</td><td class="jdl"></td>
        </tr>
        <tr>
        <td class="jdl">KPD YTH</td><td>:</td><td class="jdl"></td>
        </tr>
        <tr>
        <td class="jdl">TGL</td><td>:</td><td class="jdl"></td>
        </tr>
      </table>
    </div>
    <br>
</html>