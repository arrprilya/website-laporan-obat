<?php 
// fungsi pengecekan level untuk menampilkan menu sesuai dengan hak akses
// jika hak akses = Super Admin, tampilkan menu
if ($_SESSION['hak_akses']=='Super Admin') { ?>
    <!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>

    <?php 
    // fungsi untuk pengecekan menu aktif
    // jika menu beranda dipilih, menu beranda aktif
    if ($_GET["module"]=="beranda") { ?>
        <li class="active">
            <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
        </li>
    <?php
    }
    // jika tidak, menu beranda tidak aktif
    else { ?>
        <li>
            <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
        </li>
    <?php
    }

    // jika menu data obat dipilih, menu data obat aktif
    if ($_GET["module"]=="obat" || $_GET["module"]=="form_obat") { ?>
        <li class="active">
            <a href="?module=obat"><i class="fa fa-folder"></i> Data Obat </a>
        </li>
    <?php
    }
    // jika tidak, menu data obat tidak aktif
    else { ?>
        <li>
            <a href="?module=obat"><i class="fa fa-folder"></i> Data Obat </a>
        </li>
    <?php
    }

    // Tambahkan menu Data Supplier di bawah menu Data Obat
    if ($_GET["module"]=="supplier" || $_GET["module"]=="form_supplier") { ?>
        <li class="active">
            <a href="?module=supplier"><i class="fa fa-truck"></i> Data Supplier </a>
        </li>
    <?php
    }
    else { ?>
        <li>
            <a href="?module=supplier"><i class="fa fa-truck"></i> Data Supplier </a>
        </li>
    <?php
    }

    // jika menu data obat masuk dipilih, menu data obat masuk aktif
    if ($_GET["module"]=="obat_masuk" || $_GET["module"]=="form_obat_masuk") { ?>
        <li class="active">
            <a href="?module=obat_masuk"><i class="fa fa-clone"></i> Data Obat Masuk </a>
        </li>
    <?php
    }
    // jika tidak, menu data obat masuk tidak aktif
    else { ?>
        <li>
            <a href="?module=obat_masuk"><i class="fa fa-clone"></i> Data Obat Masuk </a>
        </li>
    <?php
    }

    // jika menu data obat keluar dipilih, menu data obat keluar aktif
    if ($_GET["module"]=="obat_keluar" || $_GET["module"]=="form_obat_keluar") { ?>
        <li class="active">
            <a href="?module=obat_keluar"><i class="fa fa-external-link"></i> Data Obat Keluar </a>
        </li>
    <?php
    }
    // jika tidak, menu data obat keluar tidak aktif
    else { ?>
        <li>
            <a href="?module=obat_keluar"><i class="fa fa-external-link"></i> Data Obat Keluar </a>
        </li>
    <?php
    }

    // jika menu Laporan dipilih, menu Laporan aktif
    if ($_GET["module"]=="lap_stok" || $_GET["module"]=="lap_obat_masuk" || $_GET["module"]=="lap_obat_keluar") { ?>
        <li class="active treeview">
            <a href="javascript:void(0);">
                <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li <?php if ($_GET["module"]=="lap_stok") echo 'class="active"'; ?>><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Obat </a></li>
                <li <?php if ($_GET["module"]=="lap_obat_masuk") echo 'class="active"'; ?>><a href="?module=lap_obat_masuk"><i class="fa fa-circle-o"></i> Obat Masuk </a></li>
                <li <?php if ($_GET["module"]=="lap_obat_keluar") echo 'class="active"'; ?>><a href="?module=lap_obat_keluar"><i class="fa fa-circle-o"></i> Obat Keluar </a></li>
            </ul>
        </li>
    <?php
    } else { ?>
        <li class="treeview">
            <a href="javascript:void(0);">
                <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Obat </a></li>
                <li><a href="?module=lap_obat_masuk"><i class="fa fa-circle-o"></i> Obat Masuk </a></li>
                <li><a href="?module=lap_obat_keluar"><i class="fa fa-circle-o"></i> Obat Keluar </a></li>
            </ul>
        </li>
    <?php
    }

    // jika menu user dipilih, menu user aktif
    if ($_GET["module"]=="user" || $_GET["module"]=="form_user") { ?>
        <li class="active">
            <a href="?module=user"><i class="fa fa-user"></i> Manajemen User</a>
        </li>
    <?php
    }
    // jika tidak, menu user tidak aktif
    else { ?>
        <li>
            <a href="?module=user"><i class="fa fa-user"></i> Manajemen User</a>
        </li>
    <?php
    }
	    // jika menu ubah password dipilih, menu ubah password aktif
		if ($_GET["module"]=="password") { ?>
			<li class="active">
				<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
			</li>
		<?php
		}
		// jika tidak, menu ubah password tidak aktif
		else { ?>
			<li>
				<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
			</li>
		<?php
		}
		?>
		</ul>
		<!--sidebar menu end-->
	<?php
	}
	// jika hak akses = Gudang, tampilkan menu
	elseif ($_SESSION['hak_akses']=='Gudang') { ?>
		<!-- sidebar menu start -->
		<ul class="sidebar-menu">
			<li class="header">MAIN MENU</li>
	
		<?php 
		// fungsi untuk pengecekan menu aktif
		// jika menu beranda dipilih, menu beranda aktif
		if ($_GET["module"]=="beranda") { ?>
			<li class="active">
				<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
			</li>
		<?php
		}
		// jika tidak, menu beranda tidak aktif
		else { ?>
			<li>
				<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
			</li>
		<?php
		}
	
		// jika menu data obat dipilih, menu data obat aktif
		if ($_GET["module"]=="obat" || $_GET["module"]=="form_obat") { ?>
			<li class="active">
				<a href="?module=obat"><i class="fa fa-folder"></i> Data Obat </a>
			</li>
		<?php
		}
		// jika tidak, menu data obat tidak aktif
		else { ?>
			<li>
				<a href="?module=obat"><i class="fa fa-folder"></i> Data Obat </a>
			</li>
		<?php
		}
	
		// Tambahkan menu Data Supplier di bawah menu Data Obat
		if ($_GET["module"]=="supplier" || $_GET["module"]=="form_supplier") { ?>
			<li class="active">
				<a href="?module=supplier"><i class="fa fa-truck"></i> Data Supplier </a>
			</li>
		<?php
		}
		else { ?>
			<li>
				<a href="?module=supplier"><i class="fa fa-truck"></i> Data Supplier </a>
			</li>
		<?php
		}
	
		// jika menu data obat masuk dipilih, menu data obat masuk aktif
		if ($_GET["module"]=="obat_masuk" || $_GET["module"]=="form_obat_masuk") { ?>
			<li class="active">
				<a href="?module=obat_masuk"><i class="fa fa-clone"></i> Data Obat Masuk </a>
			</li>
		<?php
		}
		// jika tidak, menu data obat masuk tidak aktif
		else { ?>
			<li>
				<a href="?module=obat_masuk"><i class="fa fa-clone"></i> Data Obat Masuk </a>
			</li>
		<?php
		}
	
		// jika menu data obat keluar dipilih, menu data obat keluar aktif
		if ($_GET["module"]=="obat_keluar" || $_GET["module"]=="form_obat_keluar") { ?>
			<li class="active">
				<a href="?module=obat_keluar"><i class="fa fa-external-link"></i> Data Obat Keluar </a>
			</li>
		<?php
		}
		// jika tidak, menu data obat keluar tidak aktif
		else { ?>
			<li>
				<a href="?module=obat_keluar"><i class="fa fa-external-link"></i> Data Obat Keluar </a>
			</li>
		<?php
		}
	
		// jika menu ubah password dipilih, menu ubah password aktif
		if ($_GET["module"]=="password") { ?>
			<li class="active">
				<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
			</li>
		<?php
		}
		// jika tidak, menu ubah password tidak aktif
		else { ?>
			<li>
				<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
			</li>
		<?php
		}
		?>
		</ul>
		<!--sidebar menu end-->
	<?php
	}
	?>	