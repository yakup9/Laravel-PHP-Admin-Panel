<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Müşteri Rapor Listesi</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Müşteri Adı Soyadı</th>
                                    <th>Kesilen Faturalar</th>
                                    <th>Alınan Faturalar</th>
                                    <th>Toplam Alınan Ürün</th>
                                    <th>Toplam Satılan Ürün</th>
                                    <th>Toplam Kazanılan Para</th>
                                    <th>Toplam Kaybedilen Para</th>
                                    <th>Kalan Para</th>
                                </tr>
                                </thead>
                                <?php if (count($params['data']) != 0) {
                                    foreach ($params['data'] as $key => $value) {

                                        $kesilenFaturalar=$this->model('raporModel')->faturaGelir($value['id']);
                                        $alinanFaturalar=$this->model('raporModel')->faturaGider($value['id']);
                                        $toplamAlinanUrun=$this->model('raporModel')->toplamAlinanUrun($value['id']);
                                        $toplamSatilanUrun=$this->model('raporModel')->toplamSatilanUrun($value['id']);

                                        $toplamKazanilanPara=$this->model('raporModel')->toplamKazanilanPara($value['id']);
                                        $toplamKaybedilenPara=$this->model('raporModel')->toplamKaybedilenPara($value['id']);

                                        $kalan=$toplamKazanilanPara-$toplamKaybedilenPara - $kesilenFaturalar + $alinanFaturalar;
                                        ?>

                                        <tbody>
                                        <tr>
                                            <td><?= $value['id']; ?></td>
                                            <td><?= $value['ad']." ".$value['soyad']; ?></td>
                                            <td><?= $kesilenFaturalar; ?></td>
                                            <td><?= $alinanFaturalar; ?></td>
                                            <td><?= $toplamAlinanUrun; ?></td>
                                            <td><?= $toplamSatilanUrun; ?></td>
                                            <td><?= $toplamKazanilanPara; ?> ₺</td>
                                            <td>-<?= $toplamKaybedilenPara; ?> ₺</td>
                                            <td><?= $kalan; ?> ₺</td>
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