<!-- application/views/content/gudang/sample_masuk_data.php -->

<div class="container mt-3">
    <h2>Data Sample Masuk</h2>

    <?php if (!empty($_GET['msg'])): ?>
        <div class="alert alert-<?= $_GET['alert'] ?? 'info' ?>">
            <?= $_GET['msg'] ?>
        </div>
    <?php endif; ?>

    <div class="table-container">
        <table class="modern-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Masuk</th>
                    <th>No Pengiriman</th>
                    <th>Kurir</th>
                    <th>Nama Barang</th>
                    <th>Customer</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Gudang Admin</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($result)): ?>
                    <?php $no = 1; foreach ($result as $row): ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td>
                                <?php 
                                if (!empty($row['tgl_masuk_sample'])) {
                                    $tglParts = explode('-', $row['tgl_masuk_sample']);
                                    if (count($tglParts) === 3) {
                                        echo $tglParts[2] . "/" . $tglParts[1] . "/" . $tglParts[0];
                                    } else {
                                        echo $row['tgl_masuk_sample'];
                                    }
                                } else {
                                    echo '-';
                                }
                                ?>
                            </td>
                            <td><?= $row['no_pengiriman'] ?? '-' ?></td>
                            <td><?= $row['kurir'] ?? '-' ?></td>
                            <td><?= $row['nama_barang'] ?? '-' ?></td>
                            <td><?= $row['nama_customer'] ?? '-' ?></td>
                            <td class="text-center">
                                <?php 
                                if (isset($row['jumlah_masuk'])) {
                                    echo number_format($row['jumlah_masuk'], 0, ",", ".");
                                } else {
                                    echo '-';
                                }
                                ?>
                            </td>
                            <td><?= $row['ket_masuk'] ?? '-' ?></td>
                            <td><?= $row['gudang_admin'] ?? '-' ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" class="text-center no-data">
                            Belum ada data sample masuk.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<style>
.table-container {
    overflow-x: auto;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    border-radius: 8px;
}

.modern-table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

.modern-table thead {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.modern-table th {
    padding: 16px 12px;
    text-align: left;
    font-weight: 600;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.modern-table th:first-child {
    border-radius: 8px 0 0 0;
}

.modern-table th:last-child {
    border-radius: 0 8px 0 0;
}

.modern-table td {
    padding: 14px 12px;
    border-bottom: 1px solid #f0f0f0;
    color: #333;
}

.modern-table tbody tr {
    transition: background-color 0.2s ease;
}

.modern-table tbody tr:hover {
    background-color: #f8f9fa;
}

.modern-table tbody tr:last-child td {
    border-bottom: none;
}

.text-center {
    text-align: center;
}

.no-data {
    padding: 40px !important;
    color: #6c757d;
    font-style: italic;
    background-color: #f8f9fa;
}

.alert {
    padding: 12px 16px;
    border-radius: 6px;
    margin-bottom: 20px;
    border: 1px solid transparent;
}

.alert-info {
    background-color: #d1ecf1;
    border-color: #bee5eb;
    color: #0c5460;
}

.alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
}

.alert-warning {
    background-color: #fff3cd;
    border-color: #ffeaa7;
    color: #856404;
}

.alert-danger {
    background-color: #f8d7da;
    border-color: #f5c6cb;
    color: #721c24;
}

@media (max-width: 768px) {
    .modern-table {
        font-size: 14px;
    }
    
    .modern-table th,
    .modern-table td {
        padding: 10px 8px;
    }
    
    .container {
        padding: 0 15px;
    }
}
</style>