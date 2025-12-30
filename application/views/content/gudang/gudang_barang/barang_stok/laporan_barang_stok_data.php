<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Barang Stok</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --info: #4895ef;
            --warning: #ae4976ff;
            --danger: #e63946;
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #6c757d;
            --light-gray: #e9ecef;
            --border-radius: 12px;
            --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }

        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        .page-header {
            margin-bottom: 25px;
        }

        .page-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark);
            display: flex;
            align-items: center;
        }

        .page-title i {
            margin-right: 10px;
            color: var(--primary);
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 0;
        }

        .breadcrumb-item a {
            color: var(--primary);
            text-decoration: none;
        }

        .card {
            width: 100%;
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 25px;
        }

        .card-header {
            background: white;
            border-bottom: 1px solid var(--light-gray);
            padding: 15px 20px;
            border-radius: var(--border-radius) var(--border-radius) 0 0 !important;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-header h5 {
            font-size: 18px;
            font-weight: 700;
            color: var(--dark);
            margin: 0;
        }

        .btn {
            border-radius: 8px;
            font-weight: 600;
            padding: 8px 16px;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 5px;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(67, 97, 238, 0.3);
        }

        .btn-secondary {
            background: linear-gradient(135deg, var(--gray), #495057);
            color: white;
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
        }

       .badge-warning {
        background-color: rgba(205, 148, 3, 0.96);
        color: #000000ff;
       
    }

        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(174, 73, 118, 0.3);
        }

        .btn-info {
            background: linear-gradient(135deg, var(--info), #3a86ff);
            color: white;
        }

        .btn-info:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(72, 149, 239, 0.3);
        }

        .table-responsive {
            border-radius: 0 0 var(--border-radius) var(--border-radius);
            overflow: hidden;
        }

        .table {
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }

        .table thead th {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            padding: 13px 10px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            line-height: 1.5;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 12px 10px;
            vertical-align: middle;
            border-bottom: 1px solid var(--light-gray);
            white-space: nowrap;
            font-size: 13px;
        }

        .table tbody tr {
            transition: var(--transition);
        }

        .table tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.05);
            transform: translateY(-1px);
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .badge {
            padding: 6px 10px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 11px;
        }

        .badge-success {
            background-color: rgba(76, 201, 240, 0.1);
            color: var(--success);
            border: 1px solid rgba(76, 201, 240, 0.2);
        }

       .badge-warning {
        background-color: rgba(205, 148, 3, 0.96);
        color: #000000ff;
       
    }

        .badge-danger {
            background-color: rgba(230, 57, 70, 0.1);
            color: var(--danger);
            border: 1px solid rgba(230, 57, 70, 0.2);
        }

        .modal-content {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
            padding: 20px 25px;
        }

        .modal-title {
            font-weight: 700;
            font-size: 18px;
            color: white;
        }

        .close {
            color: white;
            opacity: 0.8;
        }

        .close:hover {
            color: white;
            opacity: 1;
        }

        .filter-section {
            background: white;
            padding: 20px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 25px;
            border-left: 4px solid var(--primary);
        }

        .filter-row {
            display: flex;
            gap: 15px;
            align-items: end;
            flex-wrap: wrap;
        }

        .filter-group {
            flex: 1;
            min-width: 250px;
            margin-bottom: 0;
        }

        .filter-actions {
            display: flex;
            gap: 10px;
            align-items: end;
        }

        .filter-actions .btn {
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            white-space: nowrap;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid var(--light-gray);
            padding: 10px 12px;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
        }

        .stock-positive {
            color: #28a745;
            font-weight: bold;
        }

        .stock-negative {
            color: #dc3545;
            font-weight: bold;
        }

        .stock-zero {
            color: #6c757d;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .card-header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .filter-row {
                flex-direction: column;
            }

            .filter-group {
                width: 100%;
                min-width: auto;
            }

            .filter-actions {
                width: 100%;
                justify-content: stretch;
                margin-top: 10px;
            }

            .filter-actions .btn {
                flex: 1;
            }
        }
    </style>
</head>

<body>

<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10 page-title">
                                        <i class="fas fa-boxes"></i>Laporan Barang Stok
                                    </h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">Laporan Barang Stok</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <!-- [ basic-table ] start -->
                            <div class="col-xl-12">
                                
                                <!-- Filter Section -->
                                <div class="filter-section">
                                    <div class="filter-row">
                                        <div class="filter-group">
                                            <label class="form-label">
                                                <i class="fas fa-filter"></i>Filter Barang
                                            </label>
                                            <select class="form-control" id="filter_barang" name="filter_barang">
                                                <option value="">-- Semua Barang --</option>
                                                <?php foreach ($res_barang as $rb) { ?>
                                                    <option <?= $id_barang === $rb['id_barang'] ? 'selected' : '' ?> value="<?= $rb['id_barang'] ?>">
                                                        <?= $rb['nama_barang'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="filter-actions">
                                            <button class="btn btn-secondary" id="lihat" type="button">
                                                <i class="fas fa-eye mr-1"></i> Lihat
                                            </button>
                                            <button class="btn btn-primary" id="export" type="button">
                                                <i class="fas fa-print mr-1"></i> Cetak
                                            </button>
                                            <a href="<?= base_url() ?>gudang/gudang_barang/barang_stok/laporan_barang_stok" class="btn btn-warning" type="button">
                                                <i class="fas fa-sync-alt"></i> Reset
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h5><i class="fas fa-table mr-2"></i>Data Barang Stok</h5>
                                        <div class="total-records">
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table datatable table-hover table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nama Barang</th>
                                                        <th>Nama Supplier</th>
                                                        <th class="text-center">Stok</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($result as $k) {
                                                        $stok = $k['stok_akhir'] ?? 0;
                                                        $badge_class = $stok > 20 ? 'badge-success' : ($stok > 0 ? 'badge-warning' : 'badge-danger');
                                                       
                                                    ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td class="font-weight-medium"><?= $k['nama_barang'] ?></td>
                                                            <td><?= $k['nama_supplier'] ?></td>
                                                            <td class="text-center">
                                                                <span class="font-weight-bold <?= $stok > 20 ? 'stock-positive' : ($stok > 0 ? 'stock-warning' : 'stock-negative') ?>">
                                                                    <?= number_format($stok, 0, ",", ".") ?> <?= $k['satuan'] ?? '' ?>
                                                                </span>
                                                            </td>
                                                           
                                                            <td class="text-center">
                                                                <button type="button"
                                                                    class="btn btn-info btn-sm btn-rincian"
                                                                    data-nama-barang="<?= $k['nama_barang'] ?>"
                                                                    data-toggle="modal"
                                                                    data-target="#detail">
                                                                    <i class="fas fa-eye mr-1"></i> Detail
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ basic-table ] end -->
                        </div>
                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Detail -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailLabel">Rincian Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th width="5%">#</th>
                                <th width="12%">No PO</th>
                                <th width="10%">Tanggal Masuk</th>
                                <th width="12%">Kode Tf In</th>
                                <th width="15%">Nama Barang</th>
                                <th width="10%">No Batch</th>
                                <th width="10%">Tanggal Expired</th>
                                <th width="10%">Jenis Transaksi</th>
                                <th width="10%">Stok Akhir</th>
                                <th width="6%">Satuan</th>
                            </tr>
                        </thead>
                        <tbody id="detail-body">
                            <tr>
                                <td colspan="10" class="text-center py-3">Pilih barang untuk melihat rincian...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times mr-1"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        // Filter dan navigasi
        $('#lihat').click(function() {
            var filter_barang = $('#filter_barang').find(':selected').val();
            const query = new URLSearchParams({
                id_barang: filter_barang,
            })
            window.location = "<?= base_url() ?>gudang/gudang_barang/barang_stok/laporan_barang_stok/index?" + query.toString()
        })

        
        $('#export').click(function() {
            var filter_barang = $('#filter_barang').find(':selected').val();
            const query = new URLSearchParams({
                id_barang: filter_barang,
            })
            window.location = "<?= base_url() ?>gudang/gudang_barang/barang_stok/laporan_barang_stok/export_laporan_stock_barang?" + query.toString()
        })
        
        // Modal detail
        $('.btn-rincian').on('click', function() {
            let nama_barang = $(this).data('nama-barang');
            $('#detailLabel').text('Rincian Barang: ' + nama_barang);
            $('#detail-body').html('<tr><td colspan="10" class="text-center py-3">Memuat data...</td></tr>');

            $.ajax({
                url: "<?= base_url('gudang/gudang_barang/barang_stok/laporan_barang_stok/get_rincian_barang') ?>",
                type: "POST",
                data: {
                    nama_barang: nama_barang
                },
                dataType: "json",
                success: function(res) {
                    if (res.length > 0) {
                        let rows = '';
                        $.each(res, function(i, item) {
                            rows += `
                            <tr>
                                <td>${i+1}</td>
                                <td>${item.no_po || '-'}</td>
                                <td>${ item.tgl_masuk ? new Date(item.tgl_masuk).toLocaleDateString('id-ID') : '-'}</td>
                                <td>${item.kode_tf_in || '-'}</td>
                                <td>${item.nama_barang || '-'}</td>
                                <td>${item.no_batch || '-'}</td>
                                <td>${ item.tgl_exp ? new Date(item.tgl_exp).toLocaleDateString('id-ID') : '-'}</td>
                                <td>${item.jumlah_out || '-'}</td>
                                <td class="text-right">${Number(item.stok_akhir || 0).toLocaleString('id-ID')}</td>
                                <td>${item.satuan || '-'}</td>
                            </tr>`;
                        });
                        $('#detail-body').html(rows);
                    } else {
                        $('#detail-body').html('<tr><td colspan="10" class="text-center py-3">Tidak ada data</td></tr>');
                    }
                },
                error: function() {
                    $('#detail-body').html('<tr><td colspan="10" class="text-center py-3 text-danger">Gagal memuat data</td></tr>');
                }
            });
        });
    });
</script>
</body>
</html>