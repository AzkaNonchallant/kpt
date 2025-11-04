<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Sample Stock</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 15mm 10mm;
        }

        body {
            font-family: "DejaVu Sans", sans-serif;
            font-size: 11pt;
            margin: 0;
            padding: 0;
            color: #000;
        }

        /* HEADER */
        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        .header-table td {
            border: none;
            vertical-align: top;
            padding: 2px;
        }

        .header-left img {
            width: 80px;
            height: 80px;
        }

        .header-center {
            text-align: center;
        }

        .header-center h2 {
            font-size: 16pt;
            margin: 0;
        }

        .header-center p {
            font-size: 9pt;
            margin: 2px 0;
        }

        .header-right table {
            font-size: 9pt;
        }

        .header-right td {
            padding: 1px 3px;
            border: none;
        }

        hr {
            border: 1px solid #000;
            margin: 5px 0 10px 0;
        }

        /* TITLE */
        .title {
            text-align: center;
            margin-bottom: 10px;
        }

        .title h3 {
            font-size: 14pt;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        /* INFO */
        .info-table {
            width: 100%;
            border: none;
            font-size: 10pt;
            margin-bottom: 8px;
        }

        .info-table td {
            padding: 2px 5px;
            border: none;
            vertical-align: top;
        }

        /* TABLE MAIN */
        table.main {
            width: 100%;
            border-collapse: collapse;
            font-size: 10pt;
        }

        table.main th {
            background-color: #1d3b74;
            color: white;
            text-align: center;
            padding: 6px;
            border: 1px solid #000;
        }

        table.main td {
            border: 1px solid #000;
            padding: 6px;
            vertical-align: top;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .text-left { text-align: left; }

        /* FOOTER */
        .footer {
            margin-top: 30px;
            font-size: 10pt;
        }

        .footer table {
            width: 100%;
            border: none;
        }

        .footer td {
            border: none;
            vertical-align: top;
            padding: 5px;
        }

        .signature-space {
            height: 50px;
        }

        .note {
            font-style: italic;
            font-size: 9pt;
            text-align: center;
            border: 1px solid #000;
            margin-top: 10px;
            padding: 4px;
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <table class="header-table">
        <tr>
            <td class="header-left" style="width:15%;">
                <!-- Logo perusahaan - ganti dengan path logo yang sesuai -->
                <img src="<?= FCPATH . 'assets/images/Logo_baru.jpg' ?>" alt="Logo">
            </td>
            <td class="header-center" style="width:70%;">
                <h2>PT KAPSULINDO PUTRA TRADING</h2>
                <p>Pedagang Besar Farmasi</p>
                <p>Jl. Pancasila I Cicadas, Gunung Putri - Bogor</p>
            </td>
            <td class="header-right" style="width:15%;">
               
            </td>
        </tr>
    </table>

    <hr>

    <!-- TITLE -->
    <div class="title">
        <h3>LAPORAN STOK SAMPLE</h3>
        <p>Tanggal Cetak: <?= date('d-m-Y H:i') ?></p>
    </div>

    <!-- INFORMASI CUSTOMER (opsional, dari $row) -->
   
           
    

    <!-- TABEL DATA -->
    <table class="main">
        <thead>
            <tr>
                <th width="4%">No</th>
                <th width="12%">Tanggal Masuk</th>
                <th width="20%">Nama Barang</th>
                <th width="11%">Kode Sample In</th>
                <th width="11%">No Batch</th>
                <!-- <th width="8%">IN</th> -->
                <!-- <th width="10%">OUT</th> -->
                <th width="8%">Stock</th>
                <th width="8%">Satuan</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($detail)) : ?>
                <?php $no = 1; $total = 0; ?>
                <?php foreach ($detail as $d) : ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><?= date('d/m/Y', strtotime($d['tgl_masuk_sample'])) ?></td>
                        <td><?= htmlspecialchars($d['nama_barang']) ?></td>
                        <td class="text-center"><?= htmlspecialchars($d['kode_sample_in']) ?></td>
                        <td class="text-center"><?= htmlspecialchars($d['no_batch']) ?></td>
                        <!-- <td class="text-right"><?= !empty($d['jumlah_masuk']) ? number_format($d['jumlah_masuk'], 0, ',', '.') : '0' ?></td> -->
                        <!-- <td class="text-right"><?= !empty($d['jumlah_keluar']) ? number_format($d['jumlah_keluar'], 0, ',', '.') : '0'?></td> -->
                        <td class="text-right"><?= !empty($d['stok_akhir']) ? number_format($d['stok_akhir'], 0, ',', '.') : '0'?></td>
                        <td class="text-center"><?= htmlspecialchars($d['satuan']) ?></td>
                    </tr>
                    <?php $total += $d['stok_akhir']; ?>
                <?php endforeach; ?>
                <tr style="font-weight:bold;">
                    <td colspan="5" class="text-right">Total</td>
                    <td class="text-right"><?= number_format($total, 0, ",", ".") ?></td>
                    <td colspan="1" class="text-center"><?=$d['satuan']?></td>
                </tr>
            <?php else : ?>
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data sample masuk.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- FOOTER -->
    
</body>
</html>