<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Supplier</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --supp: #436;
            --upd:  #f72585;
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
        
        .supplier-container {
            padding: 20px;
            background-color: #f5f7fb;
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
            width: 135% ;
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 25px;
        }
        
        .card-header {
            background: white;
            border-bottom: 1px solid var(--light-gray);
            padding: 20px 25px;
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
        
        .btn-group {
            display: flex;
            gap: 10px;
        }

        
        .btn {
            border-radius: 8px;
            font-weight: 600;
            padding: 8px 16px;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .btn-sm {
            padding: 12px 8px;
            font-size: 14px;
            line-height: 1.0;
            white-space: nowrap;
        }

        .table .btn-sm {
            padding: 4px 8px;
            font-size: 14px;
            line-height: 2.0;
            white-space: nowrap;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(67, 97, 238, 0.3);
            
        }
        
        .btn-success {
            background: linear-gradient(135deg, var(--success), var(--info));
            border: none;
        }
        
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(76, 201, 240, 0.3);
             border: none;
        }
        
        .btn-info {
            background: linear-gradient(135deg, var(--info), #3a86ff);
            border: none;
        }
        
        .btn-warning {
            background: linear-gradient(135deg, var(--warning), #b5179e);
            border: none;
        }
        
        .btn-danger {
            background: linear-gradient(135deg, var(--danger), #d00000);
            border: none;
        }
        
        .table-responsive {
            border-radius: 0 0 var(--border-radius) var(--border-radius);
            overflow: hidden;
        }
        
        .table {
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
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
            padding: 10px 8px;
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
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 12px;
        }
        
        .badge-success {
            background-color: rgba(76, 201, 240, 0.1);
            color: var(--success);
        }
        
        .badge-primary {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary);
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

        .modal-up {
            background: linear-gradient(135deg, var(--upd), var(--warning));
            color: white;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
            padding: 20px 25px;
        }

        .modal-supp {
            background: linear-gradient(135deg, var(--supp), var(--secondary));
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
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-control {
            border: 1px solid var(--light-gray);
            border-radius: 8px;
            padding: 10px 15px;
            transition: var(--transition);
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
        }
        
        .invalid-feedback {
            font-size: 12px;
            margin-top: 5px;
        }
        
        .action-buttons {
            display: flex;
            gap: 6px;
            justify-content: center;
        }
        
        .stats-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }
        
        .stats-card .number {
            font-size: 32px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 5px;
        }
        
        .stats-card .label {
            font-size: 14px;
            color: var(--gray);
            font-weight: 600;
        }

        
        
        @media (max-width: 768px) {
            .card-header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .btn-group {
                width: 100%;
                justify-content: flex-start;
            }
            
            .action-buttons {
                flex-direction: column;
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
                                        <!-- <h5 class="m-b-10">Data Supplier</h5> -->
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fas fa-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Master Supplier</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            
                               
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5><i class="fas fa-list"></i> Daftar Supplier</h5>
                                                <div class="btn-group">
                                                    <button class="btn btn-success btn-sm" id="export" type="button">
                                                        <i class="fas fa-print"></i> Cetak Vendor List
                                                    </button>
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
                                                        <i class="fas fa-plus-circle"></i> Tambah Supplier
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table datatable table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Kode Supplier</th>
                                                                <th>Nama Supplier</th>
                                                                <th>PIC Supplier</th>
                                                                <th class="text-center">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                            $no=1;
                                                            foreach($result as $k){ 
                                                            ?>
                                                            <tr>
                                                                <th scope="row"><?=$no++?></th>
                                                                <td>
                                                                    
                                                                    <span class="badge badge-primary"
                                                                    style="cursor: pointer;" 
                                                                        data-toggle="modal" 
                                                                        data-target="#detail" 
                                                                        data-id_supplier="<?=$k['id_supplier']?>"
                                                                        data-kode_supplier="<?=$k['kode_supplier']?>"
                                                                        data-nama_supplier="<?=$k['nama_supplier']?>"
                                                                        data-alamat_supplier="<?=$k['alamat_supplier']?>"
                                                                        data-negara_asal="<?=$k['negara_asal']?>"
                                                                        data-pic_supplier="<?=$k['pic_supplier']?>"
                                                                        data-no_sertif_halal="<?=$k['no_sertif_halal']?>">
                                                                        <span ><?=$k['kode_supplier']?></span>
                                                              </span>
                                                                </td>
                                                                <td>
                                                                    <strong><?=$k['nama_supplier']?></strong>
                                                                </td>
                                                                <td><?=$k['pic_supplier']?></td>
                                                               
                                                                
                                                                <td class="text-center">
                                                                    <div class="action-buttons">
                                                                        <button type="button" 
                                                                            class="btn btn-warning btn-sm" 
                                                                            data-toggle="modal" 
                                                                            data-target="#edit"
                                                                            style="color: white;" 
                                                                            data-id_supplier="<?=$k['id_supplier']?>"
                                                                            data-kode_supplier="<?=$k['kode_supplier']?>"
                                                                            data-nama_supplier="<?=$k['nama_supplier']?>"
                                                                            data-alamat_supplier="<?=$k['alamat_supplier']?>"
                                                                            data-negara_asal="<?=$k['negara_asal']?>"
                                                                            data-pic_supplier="<?=$k['pic_supplier']?>"
                                                                            data-no_sertif_halal="<?=$k['no_sertif_halal']?>">
                                                                            <i class="fas fa-edit"></i> Update
                                                                        </button>
                                                                        <a  
                                                                            href="<?=base_url()?>master/master_supplier/delete/<?=$k['id_supplier']?>" 
                                                                            class="btn btn-danger btn-sm" 
                                                                            onclick = "if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                                                            <i class="fas fa-trash"></i> Hapus
                                                                        </a>
                                                                    </div>
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
                                </div>
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Tambah -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-supp">
                    <h5 class="modal-title"><i class="fas fa-plus-circle"></i> Tambah Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?=base_url()?>master/master_supplier/add">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Kode Supplier</label>
                                    <input type="text" class="form-control" id="kode_supplier" name="kode_supplier" placeholder="Kode Supplier" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        Maaf Kode supplier sudah ada.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nama Supplier</label>
                                    <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" placeholder="Nama Supplier" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">PIC Supplier</label>
                                    <input type="text" class="form-control" id="pic_supplier" name="pic_supplier" placeholder="PIC Supplier" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>
                    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Negara Asal</label>
                                    <input type="text" class="form-control" id="negara_asal" name="negara_asal" placeholder="Negara Asal" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Alamat Supplier</label>
                                    <textarea class="form-control" id="alamat_supplier" name="alamat_supplier" rows="3" placeholder="Alamat Supplier" autocomplete="off"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nomor Sertifikat Halal</label>
                                    <input type="text" class="form-control" id="no_sertif_halal" name="no_sertif_halal" placeholder="No Sertifikat Halal" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" id="simpan" class="btn btn-primary" onclick = "if (! confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali.')) { return false; }">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-eye"></i> Detail Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Kode Supplier</label>
                                <input type="text" class="form-control" id="v-kode_supplier" name="kode_supplier" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Nama Supplier</label>
                                <input type="text" class="form-control" id="v-nama_supplier" name="nama_supplier" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">PIC Supplier</label>
                                <input type="text" class="form-control" id="v-pic_supplier" name="pic_supplier" readonly>
                            </div>
                        </div>
                
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Negara Asal</label>
                                <input type="text" class="form-control" id="v-negara_asal" name="negara_asal" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Alamat Supplier</label>
                                <textarea class="form-control" id="v-alamat_supplier" name="alamat_supplier" rows="3" readonly></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Nomor Sertifikat Halal</label>
                                <input type="text" class="form-control" id="v-no_sertif_halal" name="no_sertif_halal" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-up">
                    <h5 class="modal-tittle" style="color: white;"><i class="fas fa-edit" style="color: white;"></i> Update Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?=base_url()?>master/master_supplier/update">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Kode Supplier</label>
                                    <input type="hidden" id="e-id_supplier" name="id_supplier">
                                    <input type="text" class="form-control" id="e-kode_supplier" name="kode_supplier" placeholder="Kode Supplier" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        Maaf Kode supplier sudah ada.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nama Supplier</label>
                                    <input type="text" class="form-control" id="e-nama_supplier" name="nama_supplier" placeholder="Nama Supplier" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">PIC Supplier</label>
                                    <input type="text" class="form-control" id="e-pic_supplier" name="pic_supplier" placeholder="PIC Supplier" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>
                    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Negara Asal</label>
                                    <input type="text" class="form-control" id="e-negara_asal" name="negara_asal" placeholder="Negara Asal" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Alamat Supplier</label>
                                    <textarea class="form-control" id="e-alamat_supplier" name="alamat_supplier" rows="3" placeholder="Alamat Supplier" autocomplete="off"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nomor Sertifikat Halal</label>
                                    <input type="text" class="form-control" id="e-no_sertif_halal" name="no_sertif_halal" placeholder="No Sertifikat Halal" maxlength="100" autocomplete="off" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" id="simpan" class="btn btn-primary" onclick = "if (! confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali.')) { return false; }">
                            <i class="fas fa-save"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript tetap sama -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#kode_supplier").keyup(function(){
                var kode_supplier =  $("#kode_supplier").val();
                jQuery.ajax({
                    url: "<?=base_url()?>master/master_supplier/cek_kode_supplier",
                    dataType:'text',
                    type: "post",
                    data:{kode_supplier:kode_supplier},
                    success:function(response){
                        if (response =="true") {
                            $("#kode_supplier").addClass("is-invalid");
                            $("#simpan").attr("disabled","disabled");
                        }else{
                            $("#kode_supplier").removeClass("is-invalid");
                            $("#simpan").removeAttr("disabled");
                        }
                    }            
                });
            });

            $('#detail').on('show.bs.modal', function (event) {
                var id_supplier = $(event.relatedTarget).data('id_supplier') 
                var kode_supplier = $(event.relatedTarget).data('kode_supplier') 
                var nama_supplier = $(event.relatedTarget).data('nama_supplier') 
                var alamat_supplier = $(event.relatedTarget).data('alamat_supplier') 
                var negara_asal = $(event.relatedTarget).data('negara_asal')
                var pic_supplier = $(event.relatedTarget).data('pic_supplier')
                var no_sertif_halal = $(event.relatedTarget).data('no_sertif_halal')

                $(this).find('#v-kode_supplier').val(kode_supplier)
                $(this).find('#v-nama_supplier').val(nama_supplier)
                $(this).find('#v-alamat_supplier').val(alamat_supplier)
                $(this).find('#v-negara_asal').val(negara_asal)
                $(this).find('#v-pic_supplier').val(pic_supplier)
                $(this).find('#v-no_sertif_halal').val(no_sertif_halal)
            });

            $('#edit').on('show.bs.modal', function (event) {
                var id_supplier = $(event.relatedTarget).data('id_supplier') 
                var kode_supplier = $(event.relatedTarget).data('kode_supplier') 
                var nama_supplier = $(event.relatedTarget).data('nama_supplier') 
                var alamat_supplier = $(event.relatedTarget).data('alamat_supplier')
                var negara_asal = $(event.relatedTarget).data('negara_asal') 
                var pic_supplier = $(event.relatedTarget).data('pic_supplier') 
                var no_sertif_halal = $(event.relatedTarget).data('no_sertif_halal') 

                $(this).find('#e-id_supplier').val(id_supplier)
                $(this).find('#e-kode_supplier').val(kode_supplier)
                $(this).find('#e-nama_supplier').val(nama_supplier)
                $(this).find('#e-alamat_supplier').val(alamat_supplier)
                $(this).find('#e-negara_asal').val(negara_asal)
                $(this).find('#e-pic_supplier').val(pic_supplier)
                $(this).find('#e-no_sertif_halal').val(no_sertif_halal)
            });

            $("#e-kode_supplier").keyup(function(){
                var kode_supplier =  $("#e-kode_supplier").val();
                jQuery.ajax({
                    url: "<?=base_url()?>master/master_supplier/cek_kode_supplier",
                    dataType:'text',
                    type: "post",
                    data:{kode_supplier:kode_supplier},
                    success:function(response){
                        if (response =="true") {
                            $("#e-kode_supplier").addClass("is-invalid");
                            $("#simpan").attr("disabled","disabled");
                        }else{
                            $("#e-kode_supplier").removeClass("is-invalid");
                            $("#simpan").removeAttr("disabled");
                        }
                    }            
                });
            });

            $('#export').click(function () {
                var url = "<?=base_url()?>master/master_supplier/pdf_vendor_list/";
                window.open(url, 'pdf_laporan_vendor_list', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
            });
        });
    </script>
</body>
</html>