<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ANASAYFA</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $this->model('raporModel')->toplamGelir(); ?></h3>
                            <p>Toplam Gelir</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $this->model('raporModel')->toplamGider(); ?></h3>
                            <p>Toplam Gider</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $this->model('raporModel')->toplamGelir() - $this->model('raporModel')->toplamGider(); ?></h3>
                            <p>Kalan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">
                    <div class="col-md-12">

                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Hızlı Arama</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="ad" placeholder="Ürün Adı Giriniz">
                                    </div>
                                    <?php
                                    if ($_POST){
                                        $data=$this->model('urunlerModel')->ara($_POST['ad']);
                                        if (count($data)!=0){ ?>
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Ürün Adı</th>
                                            <th>Stok Giriş</th>
                                            <th>Stok Çıkış</th>
                                            <th>Stok Kalan</th>
                                        </tr>
                                        </thead>
                                        <?php
                                            foreach ($data as $key=>$value){
                                                $girenAdet=$this->model('raporModel')->girenUrunAdet($value['id']);
                                                $cikanAdet=$this->model('raporModel')->cikanUrunAdet($value['id']);
                                                ?>
                                                <tbody>
                                                <tr>
                                                    <td><?=$value['id'];?></td>
                                                    <td><?=$value['ad'];?></td>
                                                    <td><?=$girenAdet;?></td>
                                                    <td><?=$cikanAdet;?></td>
                                                    <td><?=$girenAdet-$cikanAdet;?></td>
                                                </tr>
                                                </tbody>

                                    <?php
                                            }
                                            ?>
                                    </table>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="card-footer">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary">Gönder</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>

                </section>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
