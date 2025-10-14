<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Inventory</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            --border-radius: 12px;
            --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }
        
        .dashboard-container {
            padding: 20px;
            background-color: #f5f7fb;
            min-height: 100vh;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 25px;
            transition: var(--transition);
            display: flex;
            align-items: center;
            border-left: 4px solid var(--primary);
            position: relative;
            overflow: hidden;
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), transparent);
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }
        
        .stat-card.primary {
            border-left-color: var(--primary);
        }
        
        .stat-card.success {
            border-left-color: var(--success);
        }
        
        .stat-card.danger {
            border-left-color: var(--danger);
        }
        
        .stat-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            font-size: 28px;
            color: white;
            flex-shrink: 0;
        }
        
        .stat-icon.primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
        }
        
        .stat-icon.success {
            background: linear-gradient(135deg, var(--success), var(--info));
        }
        
        .stat-icon.danger {
            background: linear-gradient(135deg, var(--danger), #d00000);
        }
        
        .stat-info {
            flex: 1;
        }
        
        .stat-info h3 {
            font-size: 28px;
            margin-bottom: 5px;
            color: var(--dark);
            font-weight: 700;
        }
        
        .stat-info h5 {
            color: var(--gray);
            font-size: 14px;
            font-weight: 500;
        }
        
        .stat-info .text-muted {
            color: #adb5bd !important;
            font-size: 12px;
        }
        
        .content-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 25px;
        }
        
        @media (max-width: 1200px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
        }
        
        .summary-cards {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .summary-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 20px;
            transition: var(--transition);
        }
        
        .summary-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }
        
        .summary-card h6 {
            font-size: 16px;
            margin-bottom: 15px;
            color: var(--gray);
            font-weight: 600;
        }
        
        .summary-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .summary-value {
            display: flex;
            align-items: center;
            font-size: 24px;
            font-weight: 700;
            color: var(--dark);
        }
        
        .summary-value i {
            margin-right: 10px;
            font-size: 28px;
        }
        
        .summary-value .green {
            color: var(--success);
        }
        
        .summary-value .yellow {
            color: #ff9e00;
        }
        
        .summary-value .blue {
            color: var(--info);
        }
        
        .users-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
        }
        
        .card-header {
            padding: 20px 25px;
            border-bottom: 1px solid var(--light-gray);
            background: white;
        }
        
        .card-header h5 {
            font-size: 18px;
            font-weight: 700;
            color: var(--dark);
            margin: 0;
        }
        
        .table-responsive {
            overflow-x: auto;
        }
        
        .users-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .users-table tbody tr {
            border-bottom: 1px solid var(--light-gray);
            transition: background-color 0.2s;
        }
        
        .users-table tbody tr:hover {
            background-color: #f8f9fa;
        }
        
        .users-table tbody tr:last-child {
            border-bottom: none;
        }
        
        .users-table td {
            padding: 15px 25px;
            vertical-align: middle;
        }
        
        .user-info {
            display: flex;
            align-items: center;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 15px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            flex-shrink: 0;
        }
        
        .user-details h6 {
            font-size: 16px;
            margin-bottom: 5px;
            color: var(--dark);
            font-weight: 600;
        }
        
        .user-details p {
            font-size: 14px;
            color: var(--gray);
            margin: 0;
        }
        
        .user-address {
            color: var(--gray);
            font-size: 14px;
        }
        
        .user-role {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .role-admin {
            background: linear-gradient(135deg, var(--logoA), var(--logoAd));
            color: var(--tex);
            padding: 5px 10px;
        }
        
        .role-user {
            background: linear-gradient(135deg, var(--at), var(--baw));
            color: var(--tex);
            padding: 5px 15px;
        }
        
        .page-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 25px;
            color: var(--dark);
            display: flex;
            align-items: center;
        }
        
        .page-title i {
            margin-right: 10px;
            color: var(--primary);
        }
        
        .badge {
            display: inline-block;
            padding: 4px 8px;
            font-size: 11px;
            font-weight: 600;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 4px;
        }
        
        .badge-success {
            color: #fff;
            background-color: var(--success);
        }
        
        .badge-primary {
            color: #fff;
            background-color: var(--primary);
        }
        
        .badge-danger {
            color: #fff;
            background-color: var(--danger);
        }
    </style>
</head>
<body>
    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <div class="dashboard-container">
                                <h1 class="page-title">
                                    <i class="fas fa-tachometer-alt"></i> Dashboard Inventory
                                </h1>
                                
                                <!-- Stats Cards -->
                                <div class="stats-grid">
                                    <div class="stat-card primary">
                                        <div class="stat-icon primary">
                                            <i class="fas fa-box"></i>
                                        </div>
                                        <div class="stat-info">
                                            <h3><?=$tot_barang_masuk?> Batch</h3>
                                            <h5 class="text-c-green mb-0">Total Barang Masuk <span class="text-muted">Hari ini</span></h5>
                                        </div>
                                    </div>
                                    
                                    <div class="stat-card success">
                                        <div class="stat-icon success">
                                            <i class="fas fa-file"></i>
                                        </div>
                                        <div class="stat-info">
                                            <h3><?=$tot_surat_jalan?> Surat Jalan</h3>
                                            <h5 class="text-c-green mb-0">Total Surat Jalan <span class="text-muted">Hari ini</span></h5>
                                        </div>
                                    </div>
                                    
                                    <div class="stat-card danger">
                                        <div class="stat-icon danger">
                                            <i class="fas fa-box-open"></i>
                                        </div>
                                        <div class="stat-info">
                                            <h3><?=$tot_barang_keluar?> Batch</h3>
                                            <h5 class="text-c-green mb-0">Total Barang Keluar <span class="text-muted">Hari ini</span></h5>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Content Grid -->
                                <div class="content-grid">
                                    <!-- Left Column - Summary Cards -->
                                    <div class="summary-cards">
                                        <div class="summary-card">
                                            <h6>Total Barang</h6>
                                            <div class="summary-content">
                                                <div class="summary-value">
                                                    <i class="fas fa-box green"></i>
                                                    <?=$tot_barang?>
                                                </div>
                                                <span class="badge badge-success">Barang</span>
                                            </div>
                                        </div>
                                        
                                        <div class="summary-card">
                                            <h6>Total Supplier</h6>
                                            <div class="summary-content">
                                                <div class="summary-value">
                                                    <i class="fas fa-truck-loading yellow"></i>
                                                    <?=$tot_supplier?>
                                                </div>
                                                <span class="badge badge-primary">Supplier</span>
                                            </div>
                                        </div>
                                        
                                        <div class="summary-card">
                                            <h6>Total Customer</h6>
                                            <div class="summary-content">
                                                <div class="summary-value">
                                                    <i class="fas fa-users blue"></i>
                                                    <?=$tot_customer?>
                                                </div>
                                                <span class="badge badge-danger">Customer</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Right Column - Users Table -->
                                    <?php if($this->session->userdata('level') == 0) { ?>
                                    <div class="users-card">
                                        <div class="card-header">
                                            <h5>Users</h5>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="users-table">
                                                <tbody>
                                                    <?php 
                                                    foreach ($users as $key) {
                                                        $initial = strtoupper(substr($key['nama'], 0, 1));
                                                        if ($key['level']=='0') {
                                                            $role_class = 'role-admin';
                                                            $role_text = 'Admin';
                                                        } else {
                                                            $role_class = 'role-user';
                                                            $role_text = 'User';
                                                        }
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <div class="user-info">
                                                                <div class="user-avatar">
                                                                    <?= $initial ?>
                                                                </div>
                                                                <div class="user-details">
                                                                    <h6><?=$key['nama']?></h6>
                                                                    <p>Username: <?=$key['username']?></p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="user-address">
                                                            <?=$key['alamat']?>
                                                        </td>
                                                        <td>
                                                            <span class="user-role <?=$role_class?>"><?=$role_text?></span>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</body>
</html>