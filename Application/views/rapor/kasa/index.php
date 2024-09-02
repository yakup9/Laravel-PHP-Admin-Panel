<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Kasa Listesi</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kasa Adı</th>
                                    <th>Toplam Gider</th>
                                    <th>Toplam Giren Ürün</th>
                                    <th>Toplam Gelir</th>
                                    <th>Toplam Çıkan Ürün</th>
                                    <th>Kalan Fiyat</th>
                                </tr>
                                </thead>
                                <?php if (count($params['data']) != 0) {
                                    foreach ($params['data'] as $key => $value) {
                                        $toplamGiren=$this->model('raporModel')->girenUrunToplamKasa($value['id']);
                                        $toplamCikan=$this->model('raporModel')->cikanUrunToplamKasa($value['id']);

                                        $toplamKalan=$toplamCikan-$toplamGiren;

                                        $girenAdet=$this->model('raporModel')->girenUrunAdetKasa($value['id']);
                                        $cikanAdet=$this->model('raporModel')->cikanUrunAdetKasa($value['id']);

                                        ?>

                                        <tbody>
                                        <tr>
                                            <td><?=$value['id'];?></td>
                                            <td><?=$value['ad'];?></td>
                                            <td>-<?=$toplamGiren;?> ₺</td>
                                            <td><?=$girenAdet;?></td>
                                            <td><?=$toplamCikan;?> ₺</td>
                                            <td><?=$cikanAdet;?></td>
                                            <td><?=$toplamKalan;?> ₺</td>
                                        </tr>
                                        </tbody>
                                        <?php
                                    }
                                } ?>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>