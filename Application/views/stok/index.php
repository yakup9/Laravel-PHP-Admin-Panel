<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Stok İşlemleri Listesi</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ürün Adı</th>
                                    <th>Kasa Adı</th>
                                    <th>İşlem Tipi</th>
                                    <th>Adeti</th>
                                    <th>Toplam Fiyat</th>
                                    <th>Düzenle</th>
                                    <th>Kaldır</th>
                                </tr>
                                </thead>
                                <?php if (count($params['data']) != 0) {
                                    foreach ($params['data'] as $key => $value) {
                                        $urunler = $this->model('urunlerModel')->getData($value['urun_id']);
                                        $kasa=$this->model('kasaModel')->getData($value['kasa_id']);
                                        if ($value['islem_tipi'] == 0) {
                                            $islem = "Stok Giriş";
                                            $toplamfiyat ="-".$value['adet'] * $value['fiyat'];
                                        } else {
                                            $islem = "Stok Çıkış";
                                            $toplamfiyat = $value['adet'] * $value['fiyat'];
                                        }
                                        ?>

                                        <tbody>
                                        <tr>
                                            <td><?= $value['id']; ?></td>
                                            <td><?= $urunler['ad']; ?></td>
                                            <td><?= $kasa['ad']??""; ?></td>
                                            <td><?= $islem; ?></td>
                                            <td><?= $value['adet']; ?></td>
                                            <td><?= $toplamfiyat; ?></td>
                                            <td><a href="<?= SITE_URL; ?>/stok/edit/<?= $value['id']; ?>">Düzenle</a>
                                            </td>
                                            <td><a href="<?= SITE_URL; ?>/stok/delete/<?= $value['id']; ?>">Sil</a></td>
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