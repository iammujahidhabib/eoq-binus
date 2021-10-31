<!-- Nav BAr -->

<nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                Thesisku
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav">
                <?php
                if ($this->session->id_bagian == 7) // SILAHKAN MENYESUAIKAN PAK
                {
                    // redirect berdasarkan level user
                    redirect("admin/admin");
                } elseif ($this->session->id_bagian == 8) {
                ?>
                    <li><a href="<?=site_url('manager/manager/eoq')?>"> EOQ </a></li>
                    <li><a href="<?=site_url('manager/manager/rop')?>"> ROP </a></li>
                <?php
                } elseif ($this->session->id_bagian == 9) {
                ?>
                    <li> <a href="<?=site_url('gudang/stock')?>"> Stok Barang </a></li>
                    <li><a href="<?=site_url('gudang/pengambilan')?>"> Pengambilan </a></li>
                <?php
                    // redirect("gudang/gudang/");
                } elseif ($this->session->id_bagian == 11) {
                    // redirect berdasarkan level user
                    // redirect("user/produksi/");
                } elseif ($this->session->id_bagian == 10) { ?>
                    <li><a href="index.php"> Home </a></li>
                    <li><a href="pesanan.php"> Pesan Barang </a></li>
                    <li><a href="barang_form.php"> Barang Baru</a></li>
                <?php
                    // redirect berdasarkan level user
                    // redirect("user/tukang_pesan/");
                }
                /*	elseif($value['id_level'] == 6)
                {
                    // redirect berdasarkan level user
                    header ("location:kepalabagian/index.php");
                } */ else {
                    $this->session->sess_destroy();
                    redirect("auth");
                    // unset($_SESSION["statuslogin"]);
                    // $sError = "Invalid Username and/or Password";
                    //header("Location: index.php?sError=".urlencode($sError));
                }
                ?>
            </ul>

            <!-- Navbar Right-->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"> <?php echo $this->session->nama ?> </a></li>
                <li><a href="<?= site_url('auth/logout') ?>"> Log out </a></li>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<!-- Nav Bar End -->