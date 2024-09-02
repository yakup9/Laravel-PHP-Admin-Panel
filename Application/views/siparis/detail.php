<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sipariş Detayı</h3>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Müşteri Seçiniz:</label>
                                <?= $params['musteri']['ad']; ?> <?= $params['musteri']['soyad']; ?>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Firma Adı</label>
                                <?= $params['data']['firma_adi']; ?>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sipariş Tarihi</label>
                                <?= $params['data']['tarih']; ?>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sipariş Tutarı</label>
                                <?= $params['data']['fiyat']; ?>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sipariş Numarası</label>
                                <?= $params['data']['sip_no']; ?>
                            </div>

                            <div class="form-group">
                                <label>Ürün Detayları</label>
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Ürün Adı</th>
                                        <th>Ürün Adeti</th>
                                        <th>Ürün Fiyatı</th>
                                        <th>Ürün Toplam Fiyat</th>
                                    </tr>
                                    </thead>
                                    <?php
                                    if (count(json_decode($params['data']['urunler'], true)) != 0) {
                                        foreach (json_decode($params['data']['urunler'], true) as $key => $value) {
                                            $urunRow=$this->model('urunlerModel')->getData($value['id']);
                                            $toplamFiyat=intval($value['adet'])*$value['fiyat'];
                                            ?>

                                            <tbody>
                                            <tr>
                                                <td><?=$urunRow['ad'];?></td>
                                                <td><?=$value['adet'];?></td>
                                                <td><?=$value['fiyat'];?></td>
                                                <td><?=$toplamFiyat;?></td>
                                            </tr>
                                            </tbody>
                                            <?php
                                        }
                                    }
                                    ?>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>