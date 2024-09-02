<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Ürün Rapor Listesi</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ürün Adı</th>
                                    <th>Toplam Gider</th>
                                    <th>Toplam Giren Ürün</th>
                                    <th>Toplam Gelir</th>
                                    <th>Toplam Çıkan Ürün</th>
                                    <th>Kalan Fiyat</th>
                                    <th>Kalan Ürün</th>
                                </tr>
                                </thead>
                                <?php if (count($params['data']) != 0) {
                                    foreach ($params['data'] as $key => $value) {
                                        $toplamGiren=$this->model('raporModel')->girenUrunToplam($value['id']);
                                        $toplamCikan=$this->model('raporModel')->cikanUrunToplam($value['id']);

                                        $toplamKalan=$toplamCikan-$toplamGiren;

                                        $girenAdet=$this->model('raporModel')->girenUrunAdet($value['id']);
                                        $cikanAdet=$this->model('raporModel')->cikanUrunAdet($value['id']);

                                        $toplamAdet=$girenAdet-$cikanAdet;
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
                                            <td><?=$toplamAdet;?></td>
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