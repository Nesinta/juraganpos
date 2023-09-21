<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="<?php if ($this->uri->segment('1') == 'dashboard') {
                    echo 'sidebar-item active';
                } ?>">
        <a href="<?php echo base_url() ?>dashboard">
            <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
            <span class="pull-right-container">
            </span>
        </a>
    </li>
    <li class="<?php if ($this->uri->segment('1') == 'juragan') {
                    echo 'sidebar-item active';
                } ?>">
        <a href="<?php echo base_url() ?>index.php/juragan">
            <i class="fa fa-user-secret"></i> <span>JURAGAN</span>
            <span class="pull-right-container">
            </span>
        </a>
    </li>
    <li class="<?php if ($this->uri->segment('1') == 'cust') {
                    echo 'sidebar-item active';
                } ?>">
        <a href="<?php echo base_url() ?>index.php/cust">
            <i class="fa fa-user"></i> <span>PELANGGAN</span>
            <span class="pull-right-container">
            </span>
        </a>
    </li>
    <li class="treeview <?php if ($this->uri->segment('1') == 'operator') {
                            echo 'active treeview';
                        } ?><?php if ($this->uri->segment('1') == 'cs') {
                                echo 'active treeview';
                            } ?>">
        <a href="#">
            <i class="fa fa-user-circle"></i> <span>OPERATOR</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right-container"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="<?php if ($this->uri->segment('1') == 'operator') {
                            echo 'sidebar-item active';
                        } ?>"><a href="<?php echo base_url() ?>index.php/operator"><i class="fa fa-circle-o"></i>ADMIN</a></li>
            <li class="<?php if ($this->uri->segment('1') == 'cs') {
                            echo 'sidebar-item active';
                        } ?>"><a href="<?php echo base_url() ?>index.php/cs"><i class="fa fa-circle-o"></i>CS</a></li>
        </ul>
    </li>
    <li class="treeview <?php if ($this->uri->segment('1') == 'kategori') {
                            echo 'active treeview';
                        } ?><?php if ($this->uri->segment('1') == 'barang') {
                                echo 'active treeview';
                            } ?>">
        <a href="#">
            <i class="fa fa-folder-o"></i> <span>PRODUK</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right-container"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="<?php if ($this->uri->segment('1') == 'kategori') {
                            echo 'sidebar-item active';
                        } ?>"><a href="<?php echo base_url() ?>index.php/kategori"><i class="fa fa-circle-o"></i>KATEGORI</a></li>
            <li class="<?php if ($this->uri->segment('1') == 'barang') {
                            echo 'sidebar-item active';
                        } ?>"><a href="<?php echo base_url() ?>index.php/barang"><i class="fa fa-circle-o"></i>BARANG</a></li>
        </ul>
    </li>
    <li class="<?php if ($this->uri->segment('1') == 'stok') {
                    echo 'sidebar-item active';
                } ?>">
        <a href="<?php echo base_url() ?>index.php/stok">
            <i class="fa fa-cubes"></i> <span>STOK</span>
            <span class="pull-right-container">
            </span>
        </a>
    </li>
    <li class="<?php if ($this->uri->segment('1') == 'penjualan') {
                    echo 'sidebar-item active';
                } ?>">
        <a href="<?php echo base_url() ?>index.php/penjualan">
            <i class="fa fa-shopping-cart"></i> <span>TRANSAKSI</span>
            <span class="pull-right-container">
            </span>
        </a>
    </li>
    <li class="treeview <?php if ($this->uri->segment('1') == 'lapharian') {
                            echo 'active treeview';
                        } ?><?php if ($this->uri->segment('1') == 'lapbulanan') {
                                echo 'active treeview';
                            } ?><?php if ($this->uri->segment('1') == 'laporan') {
                                    echo 'active treeview';
                                } ?>">
        <a href="#">
            <i class="fa fa-book"></i> <span>LAPORAN</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right-container"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <?php $tahun =  date('Y');
            $bulan =  date('m'); ?>
            <li class="<?php if ($this->uri->segment('1') == 'lapharian') {
                            echo 'sidebar-item active';
                        } ?>"><a href="<?php echo base_url() ?>index.php/lapharian/index/<?= $tahun ?>/<?= $bulan ?>"><i class="fa fa-circle-o"></i>LAPORAN HARIAN</a></li>
            <li class="<?php if ($this->uri->segment('1') == 'lapbulanan') {
                            echo 'sidebar-item active';
                        } ?>"><a href="<?php echo base_url() ?>index.php/lapbulanan/index/<?= $tahun ?>"><i class="fa fa-circle-o"></i>LAPORAN BULANAN</a></li>
            <li class="<?php if ($this->uri->segment('1') == 'laporan') {
                            echo 'sidebar-item active';
                        } ?>"><a href="<?php echo base_url() ?>index.php/laporan"><i class="fa fa-circle-o"></i>LAPORAN
                    PEMBAYARAN</a></li>
        </ul>
    </li>
</ul>