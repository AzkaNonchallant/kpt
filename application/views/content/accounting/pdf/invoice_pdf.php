<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Invoice</title>
    <style>
        body { font-family: Helvetica, Arial, sans-serif; margin: 20px; font-size: 11px; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #333; padding-bottom: 10px; }
        .header h1 { margin: 0; color: #333; font-size: 16px; }
        .filter-info { margin-bottom: 15px; padding: 10px; background: #f5f5f5; border-radius: 5px; }
        .table { width: 100%; border-collapse: collapse; margin-bottom: 15px; }
        .table th, .table td { border: 1px solid #ddd; padding: 6px; text-align: left; }
        .table th { background-color: #f2f2f2; font-weight: bold; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .footer { margin-top: 20px; text-align: center; font-size: 9px; color: #666; }
        .total-row { font-weight: bold; background-color: #e9e9e9; }
    </style>
</head>
<body>
    <div class="header">
        <h1>LAPORAN INVOICE</h1>
    </div>

    <div class="filter-info">
        <strong>Filter:</strong>
        <?php if (!empty($filter['date_from']) && !empty($filter['date_until'])): ?>
            Periode: <?php echo date('d/m/Y', strtotime($filter['date_from'])); ?> - <?php echo date('d/m/Y', strtotime($filter['date_until'])); ?>
        <?php endif; ?>
        <?php if (!empty($filter['customer'])): ?>
            | Customer: <?php echo $filter['customer']; ?>
        <?php endif; ?>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>No Invoice</th>
                <th>Customer</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            $total_all = 0;
            foreach ($invoices as $inv): 
                $total_all += $inv->total;
            ?>
            <tr>
                <td class="text-center"><?php echo $no++; ?></td>
                <td><?php echo $inv->no_invoice; ?></td>
                <td><?php echo $inv->nama_customer; ?></td>
                <td class="text-center"><?php echo date('d/m/Y', strtotime($inv->tgl_invoice)); ?></td>
                <td class="text-right">Rp <?php echo number_format($inv->total, 0, ',', '.'); ?></td>
                <td class="text-center"><?php echo $inv->status; ?></td>
            </tr>
            <?php endforeach; ?>
            <tr class="total-row">
                <td colspan="4" class="text-center"><strong>TOTAL</strong></td>
                <td class="text-right"><strong>Rp <?php echo number_format($total_all, 0, ',', '.'); ?></strong></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <p>Dicetak pada: <?php echo date('d/m/Y H:i:s'); ?></p>
        <p>Laporan ini dibuat secara otomatis</p>
    </div>
</body>
</html>