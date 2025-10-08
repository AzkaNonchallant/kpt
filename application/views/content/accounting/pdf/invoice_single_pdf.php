<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice <?php echo $invoice->no_invoice; ?></title>
    <style>
        body { font-family: Helvetica, Arial, sans-serif; margin: 20px; font-size: 12px; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #333; padding-bottom: 20px; }
        .header h1 { margin: 0; color: #333; font-size: 20px; }
        .company-info { margin-bottom: 30px; }
        .invoice-info { margin-bottom: 20px; }
        .table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .table th { background-color: #f2f2f2; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .total-section { margin-top: 30px; }
        .footer { margin-top: 50px; text-align: center; font-size: 10px; color: #666; }
    </style>
</head>
<body>
    <div class="header">
        <h1>INVOICE</h1>
        <h2><?php echo $invoice->no_invoice; ?></h2>
    </div>

    <div class="company-info">
        <h3>PT. EXAMPLE COMPANY</h3>
        <p>Jl. Contoh Alamat No. 123</p>
        <p>Telp: (021) 123-4567 | Email: company@example.com</p>
    </div>

    <div class="invoice-info">
        <table width="100%">
            <tr>
                <td width="50%">
                    <strong>Kepada:</strong><br>
                    <?php echo $invoice->nama_customer; ?><br>
                    Customer ID: <?php echo $invoice->id_customer; ?>
                </td>
                <td width="50%" class="text-right">
                    <strong>Tanggal Invoice:</strong> <?php echo date('d/m/Y', strtotime($invoice->tgl_invoice)); ?><br>
                    <strong>Status:</strong> <?php echo $invoice->status; ?>
                </td>
            </tr>
        </table>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Deskripsi</th>
                <th>Quantity</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Produk / Jasa</td>
                <td>1</td>
                <td>Rp <?php echo number_format($invoice->total, 0, ',', '.'); ?></td>
                <td>Rp <?php echo number_format($invoice->total, 0, ',', '.'); ?></td>
            </tr>
        </tbody>
    </table>

    <div class="total-section text-right">
        <h3>Total: Rp <?php echo number_format($invoice->total, 0, ',', '.'); ?></h3>
        <p>Terbilang: <em><?php echo $this->M_invoice->terbilang($invoice->total); ?> Rupiah</em></p>
    </div>

    <?php if (!empty($invoice->keterangan)): ?>
    <div class="notes">
        <strong>Keterangan:</strong><br>
        <?php echo nl2br($invoice->keterangan); ?>
    </div>
    <?php endif; ?>

    <div class="footer">
        <p>Invoice ini dibuat secara otomatis dan tidak memerlukan tanda tangan</p>
        <p>Dicetak pada: <?php echo date('d/m/Y H:i:s'); ?></p>
    </div>
</body>
</html>