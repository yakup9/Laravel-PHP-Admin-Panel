<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->
<a href="<?=SITE_URL;?>" class="brand-link">
    <img src="<?=IMG_PATH;?>/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Stok Takip</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="<?=IMG_PATH;?>/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block"><?=$this->myuserinfo['name']; ?></a>
        </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <?php if ($this->model('uyeModel')->permission($this->myuserid,0)){ ?>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Kategoriler
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?=SITE_URL;?>/category/create" class="nav-link">
                            <p>Kategori Oluştur</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=SITE_URL;?>/category/" class="nav-link">
                            <p>Kategori Listele</p>
                        </a>
                    </li>
                </ul>
            </li>
            <?php } ?>

            <?php if ($this->model('uyeModel')->permission($this->myuserid,1)){ ?>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>
                        Ürünler
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?=SITE_URL;?>/urunler/create" class="nav-link">
                            <p>Yeni Ürün Ekle</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=SITE_URL;?>/urunler/" class="nav-link">
                            <p>Ürünleri Listele</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=SITE_URL;?>/excel/importForm" class="nav-link">
                            <p>Ürünleri Import</p>
                        </a>
                    </li>
                </ul>
            </li>
            <?php } ?>

            <?php if ($this->model('uyeModel')->permission($this->myuserid,2)){ ?>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Müşteriler
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?=SITE_URL;?>/musteriler/create" class="nav-link">
                            <p>Yeni Müşteri Ekle</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=SITE_URL;?>/musteriler/" class="nav-link">
                            <p>Müşterileri Listele</p>
                        </a>
                    </li>
                </ul>
            </li>
            <?php } ?>

            <?php if ($this->model('uyeModel')->permission($this->myuserid,3)){ ?>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                        Stok İşlemleri
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?=SITE_URL;?>/stok/create" class="nav-link">
                            <p>Yeni Stok Ekle</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=SITE_URL;?>/stok/" class="nav-link">
                            <p>Stok İşlemleri Listele</p>
                        </a>
                    </li>
                </ul>
            </li>
            <?php }?>

            <?php if ($this->model('uyeModel')->permission($this->myuserid,4)){ ?>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>
                        Kasa İşlemleri
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?=SITE_URL;?>/kasa/create" class="nav-link">
                            <p>Yeni Kasa Oluştur</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=SITE_URL;?>/kasa/" class="nav-link">
                            <p>Kasa Listele</p>
                        </a>
                    </li>
                </ul>
            </li>
            <?php }?>


            <?php if ($this->model('uyeModel')->permission($this->myuserid,8)){ ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Sipariş İşlemleri
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?=SITE_URL;?>/siparis/create" class="nav-link">
                                <p>Yeni Sipariş Oluştur</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=SITE_URL;?>/siparis/" class="nav-link">
                                <p>Siparişleri Listele</p>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php }?>


            <?php if ($this->model('uyeModel')->permission($this->myuserid,5)){ ?>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-money-bill"></i>
                    <p>
                        Fatura İşlemleri
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?=SITE_URL;?>/fatura/create" class="nav-link">
                            <p>Yeni Fatura Oluştur</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=SITE_URL;?>/fatura/" class="nav-link">
                            <p>Faturaları Listele</p>
                        </a>
                    </li>
                </ul>
            </li>
            <?php }?>

            <?php if ($this->model('uyeModel')->permission($this->myuserid,6)){ ?>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Kullanıcı İşlemleri
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?=SITE_URL;?>/kullanici/create" class="nav-link">
                            <p>Yeni Kullanıcı Oluştur</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=SITE_URL;?>/kullanici/" class="nav-link">
                            <p>Kullanıcıları Listele</p>
                        </a>
                    </li>
                </ul>
            </li>
            <?php }?>

            <?php if ($this->model('uyeModel')->permission($this->myuserid,7)){ ?>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>
                        Rapor İşlemleri
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?=SITE_URL;?>/rapor/urun" class="nav-link">
                            <p>Ürün Listesi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=SITE_URL;?>/rapor/musteri" class="nav-link">
                            <p>Müşteri Listesi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=SITE_URL;?>/rapor/kasa" class="nav-link">
                            <p>Kasa Raporu</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=SITE_URL;?>/rapor/tarih" class="nav-link">
                            <p>Tarih Bazlı Raporlama</p>
                        </a>
                    </li>
                </ul>
            </li>
            <?php }?>

            <li class="nav-item">
                <a href="<?=SITE_URL;?>/logout" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        Çıkış
                    </p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
  </aside>