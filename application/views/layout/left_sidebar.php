<?php
$id_user = $this->session->userdata('id_user');
$query = $this->db->get_where('tb_user', ['id_user' => $id_user]);
$user = $query->row();
$departemen = $user->departement; 
$level = $this->session->userdata('level');
?>

<!--[ navigation menu ] start -->
    <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a href="" class="b-brand">
                    <!-- <div class="b-bg">
                        <i class="feather icon-trending-up"></i>
                    </div> -->
                    <div style="width: 15px;margin-top:15px;height: 60px;border-radius: 6px;">
                        <img src="<?=base_url('assets/images/kapsul.jpg')?>" style="width: 35px;border-radius: 50px;height: auto;margin-left: -8.5px;">
                    </div>
                    <span class="b-title" style="text-decoration: none;">&nbsp;&nbsp;Kapsulindo Nusantara</span>
                </a>
                <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <?php
                    $uri = $this->uri->segment(1);
                ?>
                <ul class="nav pcoded-inner-navbar" style="list-style: none;">
                    
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigation</label>
                    </li>
                    <li class="nav-item <?=$uri == ''?'active':''?>">
                        <a href="<?=base_url()?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                    <?php if ($departemen == 'Marketing' || $departemen== 'Purchasing' || $level == 0) : ?>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Master </label>
                    </li>
                    <?php endif; ?>
                    <?php if ($departemen == 'Purchasing' || $level == 0) : ?>
                    <li class="nav-item <?=$uri == 'supplier'?'active':''?>">
                        <a href="<?=base_url('master/master_supplier')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-download"></i></span><span class="pcoded-mtext">Supplier</span></a>
                    </li>
                    <?php endif; ?>
                    <?php if ($departemen == 'Marketing' || $level == 0) : ?>
                    <li class="nav-item <?=$uri == 'customer'?'active':''?>">
                        <a href="<?=base_url('master/master_customer')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Customer</span></a>
                    </li>
                    <?php endif; ?>
                    <?php if ($departemen == 'Purchasing' || $level == 0) : ?>
                    <li class="nav-item <?=$uri == 'master_barang'?'active':''?>">
                        <a href="<?=base_url('master/master_barang')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Bahan Baku</span></a>
                    </li>
                    <?php endif; ?>
                    <?php if ($departemen == 'Purchasing' || $level == 0) : ?>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Purchasing </label>
                    </li>
                    <li class="nav-item <?=$uri == 'purchasing/po_pembelian'?'active':''?>">
                        <a href="<?=base_url('purchasing/po_pembelian')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-download"></i></span><span class="pcoded-mtext">PO Pembelian</span></a>
                    </li>
                    <?php endif; ?>

                    <?php if ($departemen == 'Marketing' || $level == 0) : ?>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Marketing </label>
                    </li>
                    <li class="nav-item <?=$uri == 'marketing/po_customer'?'active':''?>">
                        <a href="<?=base_url('marketing/po_customer')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-download"></i></span><span class="pcoded-mtext">PO Customer</span></a>
                    </li>
                     <li class="nav-item <?=$uri == 'marketing/po_customer'?'active':''?>">
                        <a href="<?=base_url('marketing/po_sample')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-download"></i></span><span class="pcoded-mtext">PO Sample</span></a>
                    </li>
                    <li class="nav-item <?=$uri == 'marketing/sppb'?'active':''?>">
                        <a href="<?=base_url('marketing/sppb')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-plus-square"></i></span><span class="pcoded-mtext">SPPB</span></a>
                    </li>
                    <?php endif; ?>
                    <?php if ($departemen == 'Gudang' || $level == 0) : ?>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Gudang Administrasi </label>
                    </li>
                    <?php if ($departemen == 'Gudang' || $level == 0) : ?>
                    <li class="nav-item  <?=$uri == 'gudang/gudang_admin/admin_spbm'?'active':''?>">
                        <a href="<?=base_url('gudang/gudang_admin/admin_spbm')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-plus-circle"></i></span><span class="pcoded-mtext">SPBM
                            <?php if ($cek_spbm != 0) { ?>
                                <span class="badge badge-pill badge-warning"><?= $cek_spbm ?></span>
                            <?php } ?>
                            </span>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>
                    
                    <?php if ($departemen == 'Gudang' || $level == 0) : ?>
                    <li class="nav-item  <?=$uri == 'gudang/gudang_admin/admin_spbm'?'active':''?>">
                        <a href="<?=base_url('gudang/gudang_admin/admin_spbm')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-plus-circle"></i></span><span class="pcoded-mtext">Sample
                            <?php if ($cek_spbm != 0) { ?>
                                <span class="badge badge-pill badge-warning"><?= $cek_spbm ?></span>
                            <?php } ?>
                            </span>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if ($departemen == 'Gudang' || $level == 0) : ?>
                    <li class="nav-item <?= $uri == 'gudang/gudang_admin/admin_sppb' ? 'active' : '' ?>">
                                <a href="<?= base_url('gudang/gudang_admin/admin_sppb') ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-plus-circle"></i></span><span class="pcoded-mtext">SPPB
                                    <?php if ($cek_sppb != 0) { ?>
                                        <span class="badge badge-pill badge-warning"><?= $cek_sppb ?></span>
                                    <?php } ?>
                                    </span>
                                </a>
                            </li>
                    <?php endif; ?>
                         <?php if ($departemen == 'Accounting' || $level == 0) : ?>
                            <li class="nav-item pcoded-menu-caption">
                        <label>Accounting</label>
                         <?php if ($departemen == 'Accounting' || $level == 0) : ?>
                        <li class="nav-item <?=$uri == 'invoice'?'active':''?>">
                        <a href="<?=base_url('accounting/order')?>" class="nav-link "><span class="pcoded-micon"><i class="fas fa-briefcase"></i></span><span class="pcoded-mtext">Order
                                        <?php if ($cek_order != 0) { ?>
                                        <span class="badge badge-pill badge-warning"><?= $cek_order ?></span>
                                    <?php } ?>
                        </span>
                    </a>
                    </li>
                    <?php endif; ?>
                     <?php endif; ?>
                      <?php if ($departemen == 'Accounting' || $level == 0) : ?>
                            <li class="nav-item <?=$uri == 'invoice'?'active':''?>">
                        <a href="<?=base_url('accounting/invoice')?>" class="nav-link "><span class="pcoded-micon"><i class="fas fa-money-bill-wave"></i></span><span class="pcoded-mtext">Invoice</span></a>
                    </li>
                    <?php endif; ?>
                        <?php if ($departemen == 'Gudang' || $level == 0) : ?>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Gudang Stok</label>
                    </li>
                    <?php endif; ?>
                    <?php if ($departemen == 'Gudang' || $level == 0) : ?>
                    <li class="nav-item <?=$uri == 'barang_stok'?'active':''?>">
                        <a href="<?=base_url('gudang/gudang_barang/barang_stok/barang_stok')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-grid"></i></span><span class="pcoded-mtext">Stok Barang</span></a>
                    </li>
                    <?php endif; ?>
                    <?php if ($departemen == 'Gudang' || $level == 0) : ?>
                    <li class="nav-item  <?=$uri == 'barang_masuk'?'active':''?>">
                        <a href="<?=base_url('gudang/gudang_barang/barang_masuk/barang_masuk')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-plus-circle"></i></span><span class="pcoded-mtext">Barang Masuk</span></a>
                    </li>
                    <?php endif; ?>
                    <?php if ($departemen == 'Gudang' || $level == 0) : ?>
                    <li class="nav-item  <?=$uri == 'barang_keluar'?'active':''?>">
                        <a href="<?=base_url('gudang/gudang_barang/barang_keluar/barang_keluar')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-minus-circle"></i></span><span class="pcoded-mtext">Barang Keluar</span></a>
                    </li>
                    <?php endif; ?>

                    <?php if ($departemen == 'Gudang' || $level == 0) : ?>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Gudang Sample</label>
                    </li>
                    <?php endif; ?>

                     <?php if ($departemen == 'Gudang' || $level == 0) : ?>
                    <li class="nav-item  <?=$uri == 'barang_keluar'?'active':''?>">
                        <a href="<?=base_url('gudang/gudang_barang/barang_keluar/barang_keluar')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-chevrons-right"></i></span><span class="pcoded-mtext">Sample Stock</span></a>
                    </li>
                    <?php endif; ?>
                    <?php if ($departemen == 'Gudang' || $level == 0) : ?>
                    <li class="nav-item  <?=$uri == 'barang_keluar'?'active':''?>">
                        <a href="<?=base_url('gudang/gudang_barang/barang_keluar/barang_keluar')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-plus-circle"></i></span><span class="pcoded-mtext">Sample Masuk</span></a>
                    </li>
                    <?php endif; ?>
                    <?php if ($departemen == 'Gudang' || $level == 0) : ?>
                    <li class="nav-item  <?=$uri == 'barang_keluar'?'active':''?>">
                        <a href="<?=base_url('gudang/gudang_barang/barang_keluar/barang_keluar')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-minus-circle"></i></span><span class="pcoded-mtext">Sample Keluar</span></a>
                    </li>
                    <?php endif; ?>`
                
                   <li class="nav-item <?= $uri == 'barang_keluar' || $uri == 'laporan_barang_keluar' ? 'active pcoded-hasmenu' : 'pcoded-hasmenu' ?>">
                    <!-- <li class="nav-item pcoded-menu-caption">
                        <label>Stock Sample</label>
                    </li>
                    <li class="nav-item  <?=$uri == 'sample_in'?'active':''?>">
                        <a href="<?=base_url('sample_in')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-plus-circle"></i></span><span class="pcoded-mtext">Sample IN</span></a>
                    </li>
                    <li class="nav-item  <?=$uri == 'sample_out'?'active':''?>">
                        <a href="<?=base_url('sample_out')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-minus-circle"></i></span><span class="pcoded-mtext">Sample OUT</span></a>
                    </li> -->
                    <?php if ($departemen == 'Gudang' || $level == 0) : ?>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Laporan</label>
                    </li>
                    <?php endif; ?>
                    <?php if ($departemen == 'Gudang' || $level == 0) : ?>
                    <li class="nav-item  <?=$uri == 'laporan_barang_stok'?'active':''?>">
                        <a href="<?=base_url('gudang/gudang_barang/barang_stok/laporan_barang_stok')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-chevrons-right"></i></span><span class="pcoded-mtext">Laporan Stok Barang</span></a>
                    </li>
                    <?php endif; ?>
                    <?php if ($departemen == 'Gudang' || $level == 0) : ?>
                    <li class="nav-item  <?=$uri == 'laporan_barang_stok'?'active':''?>">
                        <a href="<?=base_url('gudang/gudang_barang/barang_stok/laporan_kartu_stok')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-chevrons-right"></i></span><span class="pcoded-mtext">Laporan Kartu Stok</span></a>
                    </li>
                    <?php endif; ?>
                    <?php if ($departemen == 'Gudang' || $level == 0) : ?>
                    <li class="nav-item  <?=$uri == 'laporan_barang_masuk'?'active':''?>">
                        <a href="<?=base_url('gudang/gudang_barang/barang_masuk/laporan_barang_masuk')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-chevrons-right"></i></span><span class="pcoded-mtext">Laporan Barang Masuk</span></a>
                    </li>
                    <?php endif; ?>
                    <?php if ($departemen == 'Gudang' || $level == 0) : ?>
                    <li class="nav-item  <?=$uri == 'laporan_barang_keluar'?'active':''?>">
                        <a href="<?=base_url('gudang/gudang_barang/barang_keluar/laporan_barang_keluar')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-chevrons-right"></i></span><span class="pcoded-mtext">Laporan Barang Keluar</span></a>
                    </li>
                    <?php endif; ?>
                    <!-- <li class="nav-item  <?=$uri == 'laporan_barang_stok_2'?'active':''?>">
                        <a href="<?=base_url('laporan_barang_stok_2')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-chevrons-right"></i></span><span class="pcoded-mtext">Laporan Stok Barang</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Laporan Sample</label>
                    </li> -->
                    <!-- <li class="nav-item  <?=$uri == 'laporan_sample_in'?'active':''?>">
                        <a href="<?=base_url('laporan_sample_in')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-chevrons-right"></i></span><span class="pcoded-mtext">Laporan Sample In</span></a>
                    </li>
                    <li class="nav-item  <?=$uri == 'laporan_sample_out'?'active':''?>">
                        <a href="<?=base_url('laporan_sample_out')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-chevrons-right"></i></span><span class="pcoded-mtext">Laporan Sample Out</span></a>
                    </li> -->


                    <?php
                        if ($this->session->userdata('level')=='0') {
                            $display="";
                        }else{
                            $display="d-none";
                        }
                    ?>
                    <li class="nav-item pcoded-menu-caption <?=$display?>">
                        <label>Users</label>
                    </li>
                    <li class="nav-item  <?=$uri == 'users'?'active':''?>  <?=$display?>">
                        <a href="<?=base_url('users')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Kelola User</span></a>
                    </li>
                    <!-- <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Master</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="<?=base_url('supplier')?>" class="">Supplier</a></li>
                            <li class=""><a href="bc_badges.html" class="">Badges</a></li>
                            <li class=""><a href="bc_breadcrumb-pagination.html" class="">Breadcrumb & paggination</a></li>
                            <li class=""><a href="bc_collapse.html" class="">Collapse</a></li>
                            <li class=""><a href="bc_tabs.html" class="">Tabs & pills</a></li>
                            <li class=""><a href="bc_typography.html" class="">Typography</a></li>


                            <li class=""><a href="icon-feather.html" class="">Feather<span class="pcoded-badge label label-danger">NEW</span></a></li>
                        </ul>
                    </li> -->
                    <!-- <li class="nav-item pcoded-menu-caption">
                        <label>Forms & table</label>
                    </li>
                    <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item">
                        <a href="form_elements.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Form elements</span></a>
                    </li>
                    <li data-username="Table bootstrap datatable footable" class="nav-item">
                        <a href="tbl_bootstrap.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-server"></i></span><span class="pcoded-mtext">Table</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Chart & Maps</label>
                    </li>
                    <li data-username="Charts Morris" class="nav-item"><a href="chart-morris.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">Chart</span></a></li>
                    <li data-username="Maps Google" class="nav-item"><a href="map-google.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-map"></i></span><span class="pcoded-mtext">Maps</span></a></li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Pages</label>
                    </li>
                    <li data-username="Authentication Sign up Sign in reset password Change password Personal information profile settings map form subscribe" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span class="pcoded-mtext">Authentication</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="auth-signup.html" class="" target="_blank">Sign up</a></li>
                            <li class=""><a href="auth-signin.html" class="" target="_blank">Sign in</a></li>
                        </ul>
                    </li>
                    <li data-username="Sample Page" class="nav-item"><a href="sample-page.html" class="nav-link"><span class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span class="pcoded-mtext">Sample page</span></a></li>
                    <li data-username="Disabled Menu" class="nav-item disabled"><a href="javascript:" class="nav-link"><span class="pcoded-micon"><i class="feather icon-power"></i></span><span class="pcoded-mtext">Disabled menu</span></a></li> -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end