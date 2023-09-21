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
    <li class="<?php if ($this->uri->segment('1') == 'cust') {
                    echo 'sidebar-item active';
                } ?>">
        <a href="<?php echo base_url() ?>index.php/cust">
            <i class="fa fa-user"></i> <span>Pelanggan</span>
            <span class="pull-right-container">
            </span>
        </a>
    </li>
    <li class="<?php if ($this->uri->segment('1') == 'cs') {
                    echo 'sidebar-item active';
                } ?>">
        <a href="<?php echo base_url() ?>index.php/cs">
            <i class="fa fa-user-circle"></i> <span>CS</span>
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
                        } ?>"><a
                    href="<?php echo base_url() ?>index.php/lapharian/index/<?= $tahun ?>/<?= $bulan ?>"><i
                        class="fa fa-circle-o"></i>LAPORAN HARIAN</a></li>
            <li class="<?php if ($this->uri->segment('1') == 'lapbulanan') {
                            echo 'sidebar-item active';
                        } ?>"><a href="<?php echo base_url() ?>index.php/lapbulanan/index/<?= $tahun ?>"><i
                        class="fa fa-circle-o"></i>LAPORAN BULANAN</a></li>
            <li class="<?php if ($this->uri->segment('1') == 'laporan') {
                            echo 'sidebar-item active';
                        } ?>"><a href="<?php echo base_url() ?>index.php/laporan"><i class="fa fa-circle-o"></i>LAPORAN
                    PEMBAYARAN</a></li>
        </ul>
    </li>
</ul>