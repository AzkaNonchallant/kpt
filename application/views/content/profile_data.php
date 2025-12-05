<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

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
                                    <h5 class="m-b-10">Profile Perusahaan</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">Profile</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">Profile Perusahaan</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                
                <div class="main-body">
                    <div class="page-wrapper">
                        <style>
                            :root {
                                --primary: #4d73c4ff;
                                --tex:  #ffffffff ;
                                --logoAd: #74a5f3ff;
                                --logoA: #00ffccff;
                                --baw: rgba(208, 114, 255, 1);
                                --at:   rgba(119, 21, 169, 1);
                                --secondary: #3f37c9;
                                --success: #4cc9f0;
                                --info: #4895ef;
                                --warning: #f72585;
                                --danger: #e63946;
                                --light: #f8f9fa;
                                --dark: #212529;
                                --gray: #6c757d;
                                --light-gray: #e9ecef;
                                --border-radius: 8px;
                                --box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
                                --transition: all 0.3s ease;
                            }
                            
                            .profile-container {
                                background-color: #f5f7fb;
                                min-height: calc(100vh - 140px);
                            }
                            
                            .page-title {
                                font-size: 24px;
                                font-weight: 700;
                                margin-bottom: 20px;
                                color: var(--dark);
                                display: flex;
                                align-items: center;
                                justify-content: space-between;
                            }
                            
                            .page-title i {
                                margin-right: 10px;
                                color: var(--primary);
                            }
                            
                            .title-section {
                                display: flex;
                                align-items: center;
                            }
                            
                            /* Stats Grid Layout */
                            .stats-grid {
                                display: grid;
                                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                                gap: 20px;
                                margin-bottom: 30px;
                            }
                            
                            .profile-info-card {
                                background: white;
                                border-radius: var(--border-radius);
                                box-shadow: var(--box-shadow);
                                padding: 20px;
                                transition: var(--transition);
                                border-left: 4px solid var(--primary);
                                position: relative;
                                overflow: hidden;
                                border: 1px solid #dee2e6;
                            }
                            
                            .profile-info-card::before {
                                content: '';
                                position: absolute;
                                top: 0;
                                left: 0;
                                right: 0;
                                height: 3px;
                                background: linear-gradient(90deg, var(--primary), transparent);
                            }
                            
                            .profile-info-card:hover {
                                transform: translateY(-3px);
                                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                            }
                            
                            .card-header {
                                display: flex;
                                align-items: center;
                                margin-bottom: 15px;
                                padding-bottom: 10px;
                                border-bottom: 1px solid var(--light-gray);
                            }
                            
                            .card-icon {
                                width: 40px;
                                height: 40px;
                                border-radius: 50%;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                margin-right: 12px;
                                font-size: 18px;
                                color: white;
                                flex-shrink: 0;
                            }
                            
                            .icon-primary {
                                background: linear-gradient(135deg, var(--primary), var(--secondary));
                            }
                            
                            .icon-success {
                                background: linear-gradient(135deg, var(--success), var(--info));
                            }
                            
                            .icon-warning {
                                background: linear-gradient(135deg, var(--warning), #ff4081);
                            }
                            
                            .icon-info {
                                background: linear-gradient(135deg, var(--at), var(--baw));
                            }
                            
                            .card-title {
                                font-size: 16px;
                                font-weight: 600;
                                color: var(--dark);
                                margin: 0;
                            }
                            
                            .card-subtitle {
                                font-size: 12px;
                                color: var(--gray);
                                margin-top: 3px;
                            }
                            
                            /* Form Grid Layout */
                            .form-grid {
                                display: grid;
                                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                                gap: 15px;
                                margin-bottom: 25px;
                            }
                            
                            .form-card {
                                background: white;
                                border-radius: var(--border-radius);
                                box-shadow: var(--box-shadow);
                                padding: 15px;
                                transition: var(--transition);
                                border: 1px solid #dee2e6;
                            }
                            
                            .form-card:hover {
                                transform: translateY(-2px);
                                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                            }
                            
                            .form-group {
                                margin-bottom: 15px;
                            }
                            
                            .form-group label {
                                font-weight: 600;
                                color: var(--dark);
                                margin-bottom: 5px;
                                display: block;
                                font-size: 13px;
                            }
                            
                            .form-control {
                                border: 1px solid #ced4da;
                                border-radius: 4px;
                                padding: 8px 12px;
                                font-size: 13px;
                                transition: var(--transition);
                                height: 38px;
                                width: 100%;
                                box-sizing: border-box;
                                background-color: #f8f9fa;
                                cursor: default;
                            }
                            
                            .form-control:focus {
                                border-color: #ced4da;
                                box-shadow: none;
                                outline: none;
                            }
                            
                            /* Info Box */
                            .info-box {
                                background: #f8f9fa;
                                border-radius: 6px;
                                padding: 10px;
                                margin-top: 8px;
                                font-size: 12px;
                            }
                            
                            .expiry-status {
                                display: inline-block;
                                padding: 3px 8px;
                                border-radius: 20px;
                                font-size: 11px;
                                font-weight: 600;
                                margin-left: 8px;
                            }
                            
                            .status-valid {
                                background: linear-gradient(135deg, var(--logoA), var(--logoAd));
                                color: var(--tex);
                            }
                            
                            .status-expired {
                                background: linear-gradient(135deg, var(--at), var(--baw));
                                color: var(--tex);
                            }
                            
                            .status-warning {
                                background: linear-gradient(135deg, #ff9e00, #ffcc00);
                                color: white;
                            }
                            
                            /* Action Card */
                            .action-card {
                                background: white;
                                border-radius: var(--border-radius);
                                box-shadow: var(--box-shadow);
                                padding: 20px;
                                text-align: center;
                                grid-column: 1 / -1;
                                margin-top: 20px;
                                border: 1px solid #dee2e6;
                            }
                            
                            .btn {
                                padding: 8px 20px;
                                border-radius: 6px;
                                font-weight: 600;
                                font-size: 13px;
                                border: none;
                                cursor: pointer;
                                transition: var(--transition);
                                display: inline-flex;
                                align-items: center;
                                justify-content: center;
                            }
                            
                            .btn-primary {
                                background: linear-gradient(135deg, var(--primary), var(--secondary));
                                color: white;
                            }
                            
                            .btn-primary:hover {
                                transform: translateY(-2px);
                                box-shadow: 0 4px 12px rgba(77, 115, 196, 0.3);
                            }
                            
                            .btn-primary i {
                                margin-right: 6px;
                            }
                            
                            /* Status Badge */
                            .status-badge {
                                display: inline-block;
                                padding: 3px 6px;
                                font-size: 10px;
                                font-weight: 600;
                                line-height: 1;
                                text-align: center;
                                white-space: nowrap;
                                vertical-align: baseline;
                                border-radius: 4px;
                                margin-left: 8px;
                            }
                            
                            .badge-success {
                                color: #fff;
                                background-color: var(--success);
                            }
                            
                            .badge-danger {
                                color: #fff;
                                background-color: var(--danger);
                            }
                            
                            .badge-warning {
                                color: #fff;
                                background-color: #ff9e00;
                            }
                            
                            /* Alert */
                            .alert-custom {
                                margin-bottom: 20px;
                                border-radius: var(--border-radius);
                                padding: 12px 15px;
                                display: flex;
                                align-items: center;
                            }
                            
                            .alert-custom i {
                                margin-right: 10px;
                                font-size: 18px;
                            }
                            
                            .no-data {
                                text-align: center;
                                padding: 30px 15px;
                            }
                            
                            .no-data i {
                                font-size: 50px;
                                margin-bottom: 15px;
                                color: #dee2e6;
                            }
                            
                            .no-data h4 {
                                color: var(--gray);
                                margin-bottom: 10px;
                                font-size: 18px;
                            }
                            
                            .no-data p {
                                color: var(--gray);
                                font-size: 13px;
                            }
                            
                            /* Edit Button */
                            .btn-edit {
                                background: linear-gradient(135deg, var(--warning), #b5179e);
                                color: white;
                                padding: 6px 15px;
                                font-size: 12px;
                            }
                            
                            .btn-edit:hover {
                                transform: translateY(-2px);
                                box-shadow: 0 4px 12px rgba(247, 37, 133, 0.3);
                            }
                            
                            @media (max-width: 768px) {
                                .stats-grid,
                                .form-grid {
                                    grid-template-columns: 1fr;
                                }
                                
                                .profile-info-card,
                                .form-card {
                                    padding: 15px;
                                }
                                
                                .page-title {
                                    flex-direction: column;
                                    align-items: flex-start;
                                }
                                
                                .btn-edit {
                                    margin-top: 10px;
                                }
                            }
                        </style>
                        
                        <div class="profile-container">
                            <h1 class="page-title">
                                <div class="title-section">
                                    <i class="fas fa-building"></i> Profile Perusahaan
                                </div>
                                <button type="button" class="btn btn-edit" id="btn-edit-profile">
                                    <i class="fas fa-edit"></i> Edit Profile
                                </button>
                            </h1>
                            
                            <?php if ($this->input->get('alert')): ?>
                                <div class="alert alert-<?= $this->input->get('alert') ?> alert-custom">
                                    <i class="fas fa-<?= $this->input->get('alert') == 'success' ? 'check-circle' : 'exclamation-circle' ?>"></i>
                                    <?= urldecode($this->input->get('msg')) ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php if (!empty($result) && is_array($result)): ?>
                                <?php foreach ($result as $profile): ?>
                                <form id="form-profile" method="POST" action="<?= base_url('profile/profile/update') ?>" style="display: none;">
                                    <input type="hidden" name="id_profile_pt" value="<?= $profile['id_profile_pt'] ?>">
                                    
                                    <!-- Informasi Perusahaan -->
                                    <div class="stats-grid">
                                        <div class="profile-info-card">
                                            <div class="card-header">
                                                <div class="card-icon icon-primary">
                                                    <i class="fas fa-info-circle"></i>
                                                </div>
                                                <div>
                                                    <h3 class="card-title">Informasi Perusahaan</h3>
                                                    <p class="card-subtitle">Data utama perusahaan</p>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nama_perusahaan" class="required">Nama Perusahaan</label>
                                                        <input type="text" class="form-control editable" id="nama_perusahaan" 
                                                               name="nama_perusahaan" value="<?= htmlspecialchars($profile['nama_perusahaan']) ?>" 
                                                               placeholder="Masukkan Nama Perusahaan" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nama_apy" class="required">Nama APT</label>
                                                        <input type="text" class="form-control editable" id="nama_apy" 
                                                               name="nama_apy" value="<?= htmlspecialchars($profile['nama_apy']) ?>" 
                                                               placeholder="Masukkan Nama APY" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Form Grid untuk Dokumen -->
                                    <div class="form-grid">
                                        <!-- Izin PBF Card -->
                                        <div class="form-card">
                                            <div class="card-header">
                                                <div class="card-icon icon-success">
                                                    <i class="fas fa-file-certificate"></i>
                                                </div>
                                                <div>
                                                    <h3 class="card-title">Izin PBF</h3>
                                                    <p class="card-subtitle">Dokumen izin PBF perusahaan</p>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="izin_pbf_available" class="required">Tanggal Available</label>
                                                <div class="datepicker-wrapper">
                                                    <input type="text" class="form-control datepicker editable" id="izin_pbf_available" 
                                                           name="izin_pbf_available" 
                                                           value="<?= !empty($profile['izin_pbf_available']) && $profile['izin_pbf_available'] != '0000-00-00' ? date('d/m/Y', strtotime($profile['izin_pbf_available'])) : '' ?>" 
                                                           placeholder="DD/MM/YYYY" required>
                                                </div>
                                                
                                                <?php 
                                                if (!empty($profile['izin_pbf_available']) && $profile['izin_pbf_available'] != '0000-00-00'):
                                                    $availableDate = strtotime($profile['izin_pbf_available']);
                                                    $expiryDate = strtotime($profile['izin_pbf_exp']);
                                                    $today = time();
                                                    $daysLeft = ceil(($expiryDate - $today) / (60 * 60 * 24));
                                                ?>
                                                <div class="info-box">
                                                    <strong>Status:</strong> 
                                                    <?php if ($daysLeft > 30): ?>
                                                        <span class="status-valid">Valid</span>
                                                        <span class="status-badge badge-success">Sisa <?= $daysLeft ?> hari</span>
                                                    <?php elseif ($daysLeft > 0 && $daysLeft <= 30): ?>
                                                        <span class="status-warning">Akan Kadaluarsa</span>
                                                        <span class="status-badge badge-warning">Sisa <?= $daysLeft ?> hari</span>
                                                    <?php else: ?>
                                                        <span class="status-expired">Kadaluarsa</span>
                                                        <span class="status-badge badge-danger">Expired</span>
                                                    <?php endif; ?>
                                                    <br>
                                                    <small>Available: <?= date('d/m/Y', $availableDate) ?> | Expired: <?= date('d/m/Y', $expiryDate) ?></small>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="izin_pbf_exp" class="required">Tanggal Expired</label>
                                                <div class="datepicker-wrapper">
                                                    <input type="text" class="form-control datepicker editable" id="izin_pbf_exp" 
                                                           name="izin_pbf_exp" 
                                                           value="<?= !empty($profile['izin_pbf_exp']) && $profile['izin_pbf_exp'] != '0000-00-00' ? date('d/m/Y', strtotime($profile['izin_pbf_exp'])) : '' ?>" 
                                                           placeholder="DD/MM/YYYY" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- CDOD Card -->
                                        <div class="form-card">
                                            <div class="card-header">
                                                <div class="card-icon icon-warning">
                                                    <i class="fas fa-id-card"></i>
                                                </div>
                                                <div>
                                                    <h3 class="card-title">CDOB</h3>
                                                    <p class="card-subtitle">Sertifikat distribusi obat</p>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="cdob_available" class="required">Tanggal Available</label>
                                                <div class="datepicker-wrapper">
                                                    <input type="text" class="form-control datepicker editable" id="cdob_available" 
                                                           name="cdob_available" 
                                                           value="<?= !empty($profile['cdob_available']) && $profile['cdob_available'] != '0000-00-00' ? date('d/m/Y', strtotime($profile['cdob_available'])) : '' ?>" 
                                                           placeholder="DD/MM/YYYY" required>
                                                </div>
                                                
                                                <?php 
                                                if (!empty($profile['cdob_available']) && $profile['cdob_available'] != '0000-00-00'):
                                                    $availableDate = strtotime($profile['cdob_available']);
                                                    $expiryDate = strtotime($profile['cdob_exp']);
                                                    $today = time();
                                                    $daysLeft = ceil(($expiryDate - $today) / (60 * 60 * 24));
                                                ?>
                                                <div class="info-box">
                                                    <strong>Status:</strong> 
                                                    <?php if ($daysLeft > 30): ?>
                                                        <span class="status-valid">Valid</span>
                                                        <span class="status-badge badge-success">Sisa <?= $daysLeft ?> hari</span>
                                                    <?php elseif ($daysLeft > 0 && $daysLeft <= 30): ?>
                                                        <span class="status-warning">Akan Kadaluarsa</span>
                                                        <span class="status-badge badge-warning">Sisa <?= $daysLeft ?> hari</span>
                                                    <?php else: ?>
                                                        <span class="status-expired">Kadaluarsa</span>
                                                        <span class="status-badge badge-danger">Expired</span>
                                                    <?php endif; ?>
                                                    <br>
                                                    <small>Available: <?= date('d/m/Y', $availableDate) ?> | Expired: <?= date('d/m/Y', $expiryDate) ?></small>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="cdob_exp" class="required">Tanggal Expired</label>
                                                <div class="datepicker-wrapper">
                                                    <input type="text" class="form-control datepicker editable" id="cdob_exp" 
                                                           name="cdob_exp" 
                                                           value="<?= !empty($profile['cdob_exp']) && $profile['cdob_exp'] != '0000-00-00' ? date('d/m/Y', strtotime($profile['cdob_exp'])) : '' ?>" 
                                                           placeholder="DD/MM/YYYY" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- No SPA Card -->
                                        <div class="form-card">
                                            <div class="card-header">
                                                <div class="card-icon icon-info">
                                                    <i class="fas fa-file-contract"></i>
                                                </div>
                                                <div>
                                                    <h3 class="card-title">No SPA</h3>
                                                    <p class="card-subtitle">Surat penunjukan agen</p>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="no_spa_available" class="required">Tanggal Available</label>
                                                <div class="datepicker-wrapper">
                                                    <input type="text" class="form-control datepicker editable" id="no_spa_available" 
                                                           name="no_spa_available" 
                                                           value="<?= !empty($profile['no_spa_available']) && $profile['no_spa_available'] != '0000-00-00' ? date('d/m/Y', strtotime($profile['no_spa_available'])) : '' ?>" 
                                                           placeholder="DD/MM/YYYY" required>
                                                </div>
                                                
                                                <?php 
                                                if (!empty($profile['no_spa_available']) && $profile['no_spa_available'] != '0000-00-00'):
                                                    $availableDate = strtotime($profile['no_spa_available']);
                                                    $expiryDate = strtotime($profile['no_spa_exp']);
                                                    $today = time();
                                                    $daysLeft = ceil(($expiryDate - $today) / (60 * 60 * 24));
                                                ?>
                                                <div class="info-box">
                                                    <strong>Status:</strong> 
                                                    <?php if ($daysLeft > 30): ?>
                                                        <span class="status-valid">Valid</span>
                                                        <span class="status-badge badge-success">Sisa <?= $daysLeft ?> hari</span>
                                                    <?php elseif ($daysLeft > 0 && $daysLeft <= 30): ?>
                                                        <span class="status-warning">Akan Kadaluarsa</span>
                                                        <span class="status-badge badge-warning">Sisa <?= $daysLeft ?> hari</span>
                                                    <?php else: ?>
                                                        <span class="status-expired">Kadaluarsa</span>
                                                        <span class="status-badge badge-danger">Expired</span>
                                                    <?php endif; ?>
                                                    <br>
                                                    <small>Available: <?= date('d/m/Y', $availableDate) ?> | Expired: <?= date('d/m/Y', $expiryDate) ?></small>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="no_spa_exp" class="required">Tanggal Expired</label>
                                                <div class="datepicker-wrapper">
                                                    <input type="text" class="form-control datepicker editable" id="no_spa_exp" 
                                                           name="no_spa_exp" 
                                                           value="<?= !empty($profile['no_spa_exp']) && $profile['no_spa_exp'] != '0000-00-00' ? date('d/m/Y', strtotime($profile['no_spa_exp'])) : '' ?>" 
                                                           placeholder="DD/MM/YYYY" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Action Card -->
                                    <div class="action-card">
                                        <button type="submit" class="btn btn-primary" id="submit-btn">
                                            <i class="fas fa-save"></i> Update Profile Perusahaan
                                        </button>
                                        <button type="button" class="btn btn-secondary" id="btn-cancel-edit">
                                            <i class="fas fa-times"></i> Batal
                                        </button>
                                        <p style="margin-top: 10px; font-size: 12px; color: var(--gray);">
                                            <i class="fas fa-info-circle"></i> Pastikan semua data telah diisi dengan benar sebelum menyimpan
                                        </p>
                                    </div>
                                </form>
                                
                                <!-- VIEW ONLY SECTION -->
                                <div id="view-profile">
                                    <!-- Informasi Perusahaan -->
                                    <div class="stats-grid">
                                        <div class="profile-info-card">
                                            <div class="card-header">
                                                <div class="card-icon icon-primary">
                                                    <i class="fas fa-info-circle"></i>
                                                </div>
                                                <div>
                                                    <h3 class="card-title">Informasi Perusahaan</h3>
                                                    <p class="card-subtitle">Data utama perusahaan</p>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nama Perusahaan</label>
                                                        <div class="form-control view-only"><?= htmlspecialchars($profile['nama_perusahaan']) ?></div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nama APT</label>
                                                        <div class="form-control view-only"><?= htmlspecialchars($profile['nama_apy']) ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Dokumen Grid -->
                                    <div class="form-grid">
                                        <!-- Izin PBF Card -->
                                        <div class="form-card">
                                            <div class="card-header">
                                                <div class="card-icon icon-success">
                                                    <i class="fas fa-file-certificate"></i>
                                                </div>
                                                <div>
                                                    <h3 class="card-title">Izin PBF</h3>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Tanggal Available</label>
                                                <div class="form-control view-only">
                                                    <?= !empty($profile['izin_pbf_available']) && $profile['izin_pbf_available'] != '0000-00-00' ? date('d/m/Y', strtotime($profile['izin_pbf_available'])) : '-' ?>
                                                </div>
                                                
                                                <?php 
                                                if (!empty($profile['izin_pbf_available']) && $profile['izin_pbf_available'] != '0000-00-00'):
                                                    $availableDate = strtotime($profile['izin_pbf_available']);
                                                    $expiryDate = strtotime($profile['izin_pbf_exp']);
                                                    $today = time();
                                                    $daysLeft = ceil(($expiryDate - $today) / (60 * 60 * 24));
                                                ?>
                                                <div class="info-box">
                                                    <strong>Status:</strong> 
                                                    <?php if ($daysLeft > 30): ?>
                                                        <span class="status-valid">Valid</span>
                                                        <span class="status-badge badge-success">Sisa <?= $daysLeft ?> hari</span>
                                                    <?php elseif ($daysLeft > 0 && $daysLeft <= 30): ?>
                                                        <span class="status-warning">Akan Kadaluarsa</span>
                                                        <span class="status-badge badge-warning">Sisa <?= $daysLeft ?> hari</span>
                                                    <?php else: ?>
                                                        <span class="status-expired">Kadaluarsa</span>
                                                        <span class="status-badge badge-danger">Expired</span>
                                                    <?php endif; ?>
                                                    <br>
                                                    <small>Available: <?= date('d/m/Y', $availableDate) ?> | Expired: <?= date('d/m/Y', $expiryDate) ?></small>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Tanggal Expired</label>
                                                <div class="form-control view-only">
                                                    <?= !empty($profile['izin_pbf_exp']) && $profile['izin_pbf_exp'] != '0000-00-00' ? date('d/m/Y', strtotime($profile['izin_pbf_exp'])) : '-' ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- CDOD Card -->
                                        <div class="form-card">
                                            <div class="card-header">
                                                <div class="card-icon icon-warning">
                                                    <i class="fas fa-id-card"></i>
                                                </div>
                                                <div>
                                                    <h3 class="card-title">CDOB</h3>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Tanggal Available</label>
                                                <div class="form-control view-only">
                                                    <?= !empty($profile['cdob_available']) && $profile['cdob_available'] != '0000-00-00' ? date('d/m/Y', strtotime($profile['cdob_available'])) : '-' ?>
                                                </div>
                                                
                                                <?php 
                                                if (!empty($profile['cdob_available']) && $profile['cdob_available'] != '0000-00-00'):
                                                    $availableDate = strtotime($profile['cdob_available']);
                                                    $expiryDate = strtotime($profile['cdob_exp']);
                                                    $today = time();
                                                    $daysLeft = ceil(($expiryDate - $today) / (60 * 60 * 24));
                                                ?>
                                                <div class="info-box">
                                                    <strong>Status:</strong> 
                                                    <?php if ($daysLeft > 30): ?>
                                                        <span class="status-valid">Valid</span>
                                                        <span class="status-badge badge-success">Sisa <?= $daysLeft ?> hari</span>
                                                    <?php elseif ($daysLeft > 0 && $daysLeft <= 30): ?>
                                                        <span class="status-warning">Akan Kadaluarsa</span>
                                                        <span class="status-badge badge-warning">Sisa <?= $daysLeft ?> hari</span>
                                                    <?php else: ?>
                                                        <span class="status-expired">Kadaluarsa</span>
                                                        <span class="status-badge badge-danger">Expired</span>
                                                    <?php endif; ?>
                                                    <br>
                                                    <small>Available: <?= date('d/m/Y', $availableDate) ?> | Expired: <?= date('d/m/Y', $expiryDate) ?></small>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Tanggal Expired</label>
                                                <div class="form-control view-only">
                                                    <?= !empty($profile['cdob_exp']) && $profile['cdob_exp'] != '0000-00-00' ? date('d/m/Y', strtotime($profile['cdob_exp'])) : '-' ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- No SPA Card -->
                                        <div class="form-card">
                                            <div class="card-header">
                                                <div class="card-icon icon-info">
                                                    <i class="fas fa-file-contract"></i>
                                                </div>
                                                <div>
                                                    <h3 class="card-title">No SPA</h3>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Tanggal Available</label>
                                                <div class="form-control view-only">
                                                    <?= !empty($profile['no_spa_available']) && $profile['no_spa_available'] != '0000-00-00' ? date('d/m/Y', strtotime($profile['no_spa_available'])) : '-' ?>
                                                </div>
                                                
                                                <?php 
                                                if (!empty($profile['no_spa_available']) && $profile['no_spa_available'] != '0000-00-00'):
                                                    $availableDate = strtotime($profile['no_spa_available']);
                                                    $expiryDate = strtotime($profile['no_spa_exp']);
                                                    $today = time();
                                                    $daysLeft = ceil(($expiryDate - $today) / (60 * 60 * 24));
                                                ?>
                                                <div class="info-box">
                                                    <strong>Status:</strong> 
                                                    <?php if ($daysLeft > 30): ?>
                                                        <span class="status-valid">Valid</span>
                                                        <span class="status-badge badge-success">Sisa <?= $daysLeft ?> hari</span>
                                                    <?php elseif ($daysLeft > 0 && $daysLeft <= 30): ?>
                                                        <span class="status-warning">Akan Kadaluarsa</span>
                                                        <span class="status-badge badge-warning">Sisa <?= $daysLeft ?> hari</span>
                                                    <?php else: ?>
                                                        <span class="status-expired">Kadaluarsa</span>
                                                        <span class="status-badge badge-danger">Expired</span>
                                                    <?php endif; ?>
                                                    <br>
                                                    <small>Available: <?= date('d/m/Y', $availableDate) ?> | Expired: <?= date('d/m/Y', $expiryDate) ?></small>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Tanggal Expired</label>
                                                <div class="form-control view-only">
                                                    <?= !empty($profile['no_spa_exp']) && $profile['no_spa_exp'] != '0000-00-00' ? date('d/m/Y', strtotime($profile['no_spa_exp'])) : '-' ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="form-card">
                                    <div class="no-data">
                                        <i class="fas fa-building"></i>
                                        <h4>Data Profile Tidak Ditemukan</h4>
                                        <p>Silahkan tambahkan data profile perusahaan terlebih dahulu</p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- [ Main Content ] end -->

<script>
$(document).ready(function() {
    // Mode default: VIEW ONLY
    $('#form-profile').hide();
    $('#view-profile').show();
    
    // Tombol Edit diklik
    $('#btn-edit-profile').click(function() {
        $('#view-profile').hide();
        $('#form-profile').show();
        $('.editable').removeAttr('readonly').css({
            'background-color': 'white',
            'cursor': 'text'
        });
        $(this).hide();
        
        // Inisialisasi datepicker untuk input yang editable
        $('.datepicker.editable').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            todayHighlight: true,
            language: 'id',
            orientation: 'bottom auto'
        });
    });
    
    // Tombol Batal diklik
    $('#btn-cancel-edit').click(function() {
        $('#form-profile').hide();
        $('#view-profile').show();
        $('.editable').attr('readonly', 'readonly').css({
            'background-color': '#f8f9fa',
            'cursor': 'default'
        });
        $('#btn-edit-profile').show();
    });
    
    // Validasi form saat submit
    $('#form-profile').validate({
        rules: {
            nama_perusahaan: {
                required: true,
                minlength: 3
            },
            nama_apy: {
                required: true,
                minlength: 3
            },
            izin_pbf_available: {
                required: true,
                date: true
            },
            izin_pbf_exp: {
                required: true,
                date: true
            },
            cdob_available: {
                required: true,
                date: true
            },
            cdob_exp: {
                required: true,
                date: true
            },
            no_spa_available: {
                required: true,
                date: true
            },
            no_spa_exp: {
                required: true,
                date: true
            }
        },
        messages: {
            nama_perusahaan: {
                required: "Nama perusahaan harus diisi",
                minlength: "Minimal 3 karakter"
            },
            nama_apy: {
                required: "Nama APY harus diisi",
                minlength: "Minimal 3 karakter"
            },
            izin_pbf_available: {
                required: "Tanggal available harus diisi",
                date: "Format tanggal tidak valid (DD/MM/YYYY)"
            },
            izin_pbf_exp: {
                required: "Tanggal expired harus diisi",
                date: "Format tanggal tidak valid (DD/MM/YYYY)"
            },
            cdob_available: {
                required: "Tanggal available harus diisi",
                date: "Format tanggal tidak valid (DD/MM/YYYY)"
            },
            cdob_exp: {
                required: "Tanggal expired harus diisi",
                date: "Format tanggal tidak valid (DD/MM/YYYY)"
            },
            no_spa_available: {
                required: "Tanggal available harus diisi",
                date: "Format tanggal tidak valid (DD/MM/YYYY)"
            },
            no_spa_exp: {
                required: "Tanggal expired harus diisi",
                date: "Format tanggal tidak valid (DD/MM/YYYY)"
            }
        },
        errorElement: 'span',
        errorClass: 'help-block text-danger',
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        submitHandler: function(form) {
            // Show loading state
            const submitBtn = $('#submit-btn');
            const originalText = submitBtn.html();
            submitBtn.html('<i class="fas fa-spinner fa-spin"></i> Memproses...').prop('disabled', true);
            
            // Validasi tanggal expired > available
            const datePairs = [
                { available: 'izin_pbf_available', expired: 'izin_pbf_exp' },
                { available: 'cdob_available', expired: 'cdob_exp' },
                { available: 'no_spa_available', expired: 'no_spa_exp' }
            ];
            
            let isValid = true;
            
            datePairs.forEach(pair => {
                const availableField = $(`[name="${pair.available}"]`);
                const expiredField = $(`[name="${pair.expired}"]`);
                
                if (availableField.val() && expiredField.val()) {
                    const availableDate = convertToDate(availableField.val());
                    const expiredDate = convertToDate(expiredField.val());
                    
                    if (expiredDate <= availableDate) {
                        expiredField.closest('.form-group').addClass('has-error');
                        if (!expiredField.next('.help-block').length) {
                            expiredField.after(`<span class="help-block text-danger">Tanggal expired harus setelah tanggal available</span>`);
                        }
                        isValid = false;
                    }
                }
            });
            
            if (!isValid) {
                submitBtn.html(originalText).prop('disabled', false);
                return false;
            }
            
            // Submit form
            form.submit();
        }
    });
    
    function convertToDate(dateStr) {
        const parts = dateStr.split('/');
        return new Date(parts[2], parts[1] - 1, parts[0]);
    }
    
    // Auto close alert after 5 seconds
    setTimeout(function() {
        $('.alert-custom').fadeOut('slow');
    }, 5000);
});
</script>