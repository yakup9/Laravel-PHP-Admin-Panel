<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="card-body">
                    <form method="get">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Başlangıç Tarihi</label>
                            <input type="date" name="firstDate" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Bitiş Tarihi</label>
                            <input type="date" name="lastDate" class="form-control">
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="col-md-12">
                            <button class="btn btn-info">Sorgula</button>
                        </div>
                    </div>
                    </form>
                </div>


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
                                    <th>Toplam Giriş</th>
                                    <th>Toplam Giren Ürün</th>
                                    <th>Toplam Çıkış</th>
                                    <th>Toplam Çıkan Ürün</th>
                                    <th>Kalan Fiyat</th>
                                    <th>Kalan Ürün</th>
                                </tr>
                                </thead>
                                <?php if (count($params['data']) != 0) {
                                    foreach ($params['data'] as $key => $value) {
                                        $urunRow=$this->model('urunlerModel')->getData($value['urun_id']);
                                        $toplamGiren=$this->model('raporModel')->girenUrunToplam($value['urun_id']);
                                        $toplamCikan=$this->model('raporModel')->cikanUrunToplam($value['urun_id']);

                                        $toplamKalan=$toplamCikan-$toplamGiren;

                                        $girenAdet=$this->model('raporModel')->girenUrunAdet($value['urun_id']);
                                        $cikanAdet=$this->model('raporModel')->cikanUrunAdet($value['urun_id']);

                                        $toplamAdet=$girenAdet-$cikanAdet;
                                        ?>

                                        <tbody>
                                        <tr>
                                            <td><?=$value['id'];?></td>
                                            <td><?=$urunRow['ad'];?></td>
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