<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 

// FIX: Better handling for invoice data
$is_edit = isset($invoice) && !empty($invoice);
$is_add = $this->uri->segment(4) == 'add';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $is_edit ? 'Edit Invoice' : ($is_add ? 'Tambah Invoice' : 'Data Invoice') ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .header-section {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .filter-section {
            background: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .table-container {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            max-width: 800px;
            margin: 0 auto;
        }
        .table th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            font-weight: 600;
            color: #495057;
        }
        .btn-group-sm .btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }
        .btn-edit {
            background-color: #ffc107;
            border-color: #ffc107;
            color: white;
        }
        .btn-pdf {
            background-color: #28a745;
            border-color: #28a745;
            color: white;
        }
        .btn-delete {
            background-color: #dc3545;
            border-color: #dc3545;
            color: white;
        }
        .dataTables_info {
            padding-top: 10px;
        }
        .dataTables_paginate {
            padding-top: 10px;
        }
        .status-badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .badge-draft { background-color: #6c757d; color: white; }
        .badge-unpaid { background-color: #dc3545; color: white; }
        .badge-paid { background-color: #28a745; color: white; }
        .form-label {
            font-weight: 600;
            color: #495057;
        }
        .required:after {
            content: " *";
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <?php if($is_edit || $is_add): ?>
        
        <!-- FORM SECTION (Tambah/Edit Invoice) -->
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="header-section text-center">
                    <h4 class="mb-0">
                        <i class="fas <?= $is_edit ? 'fa-edit' : 'fa-file-invoice' ?> me-2"></i>
                        <?= $is_edit ? 'Edit Invoice' : 'Tambah Invoice Baru' ?>
                    </h4>
                </div>

                <div class="form-container">
                    <?php if (validation_errors()): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= validation_errors() ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('error') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="<?= $is_edit ? base_url('accounting/invoice/edit/' . $invoice->id_invoice) : base_url('accounting/invoice/add') ?>">
                        <!-- FIX: Safe property access -->
                        <?php if($is_edit): ?>
                        <input type="hidden" name="id_invoice" value="<?= isset($invoice->id_invoice) ? $invoice->id_invoice : '' ?>">
                        <?php endif; ?>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">No Invoice</label>
                                <input type="text" class="form-control" name="no_invoice" 
                                       value="<?= set_value('no_invoice', $is_edit ? (isset($invoice->no_invoice) ? $invoice->no_invoice : '') : (isset($auto_no_invoice) ? $auto_no_invoice : '')) ?>" 
                                       required <?= $is_edit ? '' : 'readonly' ?>>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Tanggal Invoice</label>
                                <input type="date" class="form-control" name="tgl_invoice" 
                                       value="<?= set_value('tgl_invoice', $is_edit ? (isset($invoice->tgl_invoice) ? $invoice->tgl_invoice : date('Y-m-d')) : date('Y-m-d')) ?>" 
                                       required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Customer</label>
                                <select class="form-select" name="id_customer" id="id_customer" required>
                                    <option value="">Pilih Customer</option>
                                    <?php foreach($res_customer as $rc): ?>
                                        <option value="<?= $rc->id_customer ?>" 
                                            <?= set_select('id_customer', $rc->id_customer, ($is_edit && isset($invoice->id_customer) && $invoice->id_customer == $rc->id_customer)) ?>
                                            data-nama-customer="<?= $rc->nama_customer ?>">
                                            <?= $rc->nama_customer ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <input type="hidden" name="nama_customer" id="nama_customer" 
                                       value="<?= set_value('nama_customer', $is_edit ? (isset($invoice->nama_customer) ? $invoice->nama_customer : '') : '') ?>">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Status</label>
                                <select class="form-select" name="status" required>
                                    <option value="draft" <?= set_select('status', 'draft', ($is_edit && isset($invoice->status) && $invoice->status == 'draft')) ?>>Draft</option>
                                    <option value="unpaid" <?= set_select('status', 'unpaid', ($is_edit && isset($invoice->status) && $invoice->status == 'unpaid')) ?>>Unpaid</option>
                                    <option value="paid" <?= set_select('status', 'paid', ($is_edit && isset($invoice->status) && $invoice->status == 'paid')) ?>>Paid</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Total (Rp)</label>
                                <input type="number" class="form-control" name="total" 
                                       value="<?= set_value('total', $is_edit ? (isset($invoice->total) ? $invoice->total : '0') : '0') ?>" 
                                       required min="0" step="0.01">
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Keterangan</label>
                                <textarea class="form-control" name="keterangan" rows="3" 
                                          placeholder="Keterangan tambahan..."><?= set_value('keterangan', $is_edit ? (isset($invoice->keterangan) ? $invoice->keterangan : '') : '') ?></textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                            <a href="<?= base_url('accounting/invoice') ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Kembali ke Data Invoice
                            </a>
                            <button type="submit" name="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>
                                <?= $is_edit ? 'Update Invoice' : 'Simpan Invoice' ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php else: ?>

        <!-- DATA SECTION (Tampil Data Invoice) -->
        <!-- Header -->
        <div class="header-section">
            <h4 class="mb-0"><i class="fas fa-file-invoice me-2"></i>Data Invoice</h4>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <div class="row g-2 align-items-center">
                <div class="col-auto">
                    <select class="form-select form-select-sm" id="filter_customer">
                        <option value="" selected>- Semua Customer -</option>
                        <?php foreach($res_customer as $rc): ?>
                            <option value="<?= $rc->nama_customer ?>" 
                                <?= (isset($_GET['nama_customer']) && $_GET['nama_customer'] == $rc->nama_customer) ? 'selected' : '' ?>>
                                <?= $rc->nama_customer ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-auto">
                    <input type="date" class="form-control form-control-sm" id="filter_tgl" 
                           value="<?= isset($_GET['date_from']) ? $_GET['date_from'] : '' ?>" placeholder="Dari Tanggal">
                </div>
                <div class="col-auto">
                    <input type="date" class="form-control form-control-sm" id="filter_tgl2" 
                           value="<?= isset($_GET['date_until']) ? $_GET['date_until'] : '' ?>" placeholder="Sampai Tanggal">
                </div>
                <div class="col-auto">
                    <button class="btn btn-secondary btn-sm" id="lihatBtn">
                        <i class="fas fa-search me-1"></i>Lihat
                    </button>
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary btn-sm" id="cetakBtn">
                        <i class="fas fa-print me-1"></i>Cetak
                    </button>
                </div>
                <div class="col-auto">
                    <a href="<?= base_url('accounting/invoice/add') ?>" class="btn btn-success btn-sm">
                        <i class="fas fa-plus me-1"></i>Tambah Invoice
                    </a>
                </div>
                <div class="col-auto">
                    <a href="<?= base_url('accounting/invoice') ?>" class="btn btn-warning btn-sm">
                        <i class="fas fa-sync"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="table-container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <label class="form-label mb-0">Show 
                        <select class="form-select form-select-sm d-inline-block w-auto" id="lengthSelect">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select> 
                        entries
                    </label>
                </div>
                <div>
                    <label class="form-label mb-0">Search:
                        <input type="search" class="form-control form-control-sm d-inline-block w-auto ms-2" id="searchInput" placeholder="Search...">
                    </label>
                </div>
            </div>

            <div class="table-responsive">
                <table id="invoiceTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="15%">No Invoice</th>
                            <th width="20%">Nama Customer</th>
                            <th width="10%">Tanggal</th>
                            <th width="15%">Total</th>
                            <th width="10%">Status</th>
                            <th width="25%">Aksi</th>
                        </tr>
                    </thead>
                    <thead>
                        <?php if(!empty($invoice)): ?>
                            <?php $no = 1; foreach($invoice as $inv): ?>
                                <?php if(is_object($inv)): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><strong><?= $inv->no_invoice ?></strong></td>
                                    <td><?= $inv->nama_customer ?></td>
                                    <td><?= date('d/m/Y', strtotime($inv->tgl_invoice)) ?></td>
                                    <td>Rp <?= number_format($inv->total, 0, ',', '.') ?></td>
                                    <td>
                                        <span class="status-badge badge-<?= $inv->status ?>">
                                            <?= strtoupper($inv->status) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="<?= base_url('accounting/invoice/edit/' . $inv->id_invoice) ?>" 
                                               class="btn btn-edit btn-sm">
                                                <i class="fas fa-edit me-1"></i>Edit
                                            </a>
                                            <a href="javascript:void(0)" 
                                               onclick="printInvoice(<?= $inv->id_invoice ?>)" 
                                               class="btn btn-pdf btn-sm">
                                                <i class="fas fa-file-pdf me-1"></i>Cetak PDF
                                            </a>
                                            <a href="<?= base_url('accounting/invoice/delete/' . $inv->id_invoice) ?>" 
                                               class="btn btn-delete btn-sm" 
                                               onclick="return confirm('Hapus invoice <?= $inv->no_invoice ?>?')">
                                                <i class="fas fa-trash me-1"></i>Hapus
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    <i class="fas fa-inbox fa-2x mb-3"></i><br>
                                    Tidak ada data invoice
                                </td>
                            </tr>
                        <?php endif; ?>
                    </thead>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="text-muted" id="infoText">
                    Showing <?= !empty($invoice) ? '1 to ' . count($invoice) . ' of ' . count($invoice) : '0' ?> entries
                </div>
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Previous</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function() {
            <?php if(!$is_edit && !$is_add): ?>
            // Inisialisasi DataTables hanya di halaman data
            var table = $('#invoiceTable').DataTable({
                "paging": true,
                "searching": true,
                "info": true,
                "lengthChange": true,
                "pageLength": 10,
                "language": {
                    "search": "Cari:",
                    "paginate": {
                        "previous": "Sebelumnya",
                        "next": "Berikutnya"
                    },
                    "info": "Menampilkan START sampai END dari TOTAL data",
                    "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                    "infoFiltered": "(disaring dari MAX total data)",
                    "lengthMenu": "Tampilkan MENU data",
                    "emptyTable": "Tidak ada data invoice",
                    "zeroRecords": "Tidak ada data yang cocok dengan pencarian"
                },
                "dom": '<"top"if>rt<"bottom"lp><"clear">',
                "columns": [
                    { "width": "5%" },
                    { "width": "15%" },
                    { "width": "20%" },
                    { "width": "10%" },
                    { "width": "15%" },
                    { "width": "10%" },
                    { "width": "25%" }
                ]
            });

            // Custom search input
            $('#searchInput').on('keyup', function() {
                table.search(this.value).draw();
            });

            // Custom length menu
            $('#lengthSelect').on('change', function() {
                table.page.len(parseInt(this.value)).draw();
            });

            // Filter functionality
            $('#lihatBtn').click(function() {
                const customer = $('#filter_customer').val();
                const dateFrom = $('#filter_tgl').val();
                const dateUntil = $('#filter_tgl2').val();
                
                // Redirect dengan parameter filter
                let url = '<?= base_url("accounting/invoice") ?>?';
                if (customer) url += 'nama_customer=' + encodeURIComponent(customer) + '&';
                if (dateFrom) url += 'date_from=' + dateFrom + '&';
                if (dateUntil) url += 'date_until=' + dateUntil;
                
                window.location.href = url;
            });

            // Cetak functionality
            $('#cetakBtn').click(function() {
                const customer = $('#filter_customer').val();
                const dateFrom = $('#filter_tgl').val();
                const dateUntil = $('#filter_tgl2').val();
                
                if (!dateFrom || !dateUntil) {
                    alert('Harap pilih tanggal mulai dan tanggal akhir');
                    return;
                }

                const url = '<?= base_url("accounting/invoice/export_pdf") ?>?customer=' + encodeURIComponent(customer) + '&date_from=' + dateFrom + '&date_until=' + dateUntil;
                window.open(url, '_blank');
            });
            <?php else: ?>
            // Script untuk form
            // Auto-fill nama customer
            $('#id_customer').change(function() {
                const selectedOption = $(this).find('option:selected');
                const namaCustomer = selectedOption.data('nama-customer');
                $('#nama_customer').val(namaCustomer);
            });

            // Set customer selection if editing
            <?php if($is_edit && isset($invoice->id_customer)): ?>
                $('#id_customer').val('<?= $invoice->id_customer ?>');
                $('#nama_customer').val('<?= $invoice->nama_customer ?>');
            <?php endif; ?>

            // Form validation
            $('form').on('submit', function(e) {
                const total = $('input[name="total"]').val();
                const customer = $('select[name="id_customer"]').val();

                if (total <= 0) {
                    e.preventDefault();
                    alert('Total harus lebih dari 0');
                    return false;
                }

                if (!customer) {
                    e.preventDefault();
                    alert('Silakan pilih customer');
                    return false;
                }

                const actionText = "<?= $is_edit ? 'mengupdate' : 'menyimpan' ?>";
                if (!confirm('Apakah Anda yakin untuk ' + actionText + ' data invoice ini?')) {
                    e.preventDefault();
                    return false;
                }

                return true;
            });
            <?php endif; ?>
        });

        function printInvoice(id) {
            window.open('<?= base_url('accounting/invoice/pdf_invoice/') ?>' + id, '_blank');
        }

        // Auto close alert setelah 5 detik
        setTimeout(function() {
            $('.alert').alert('close');
        }, 5000);
    </script>
</body>
</html>