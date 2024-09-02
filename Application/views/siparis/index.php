<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sipariş Listesi</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Sipariş No</th>
                                    <th>Müşteri</th>
                                    <th>Firma</th>
                                    <th>Detay</th>
                                    <th>Düzenle</th>
                                    <th>Kaldır</th>
                                </tr>
                                </thead>
                                <?php if (count($params['data']) != 0) {
                                    foreach ($params['data'] as $key => $value) {

                                        $musteriRow=$this->model('musterilerModel')->getData($value['musteri_id']);
                                        ?>

                                        <tbody>
                                        <tr>
                                            <td><?=$value['id'];?></td>
                                            <td><?=$value['sip_no'];?></td>
                                            <td><?=$musteriRow['ad'];?> <?=$musteriRow['soyad'];?></td>
                                            <td><?=$value['firma_adi'];?></td>
                                            <td><a href="<?=SITE_URL;?>/siparis/detail/<?=$value['id'];?>">Detay</a></td>
                                            <td><a href="<?=SITE_URL;?>/siparis/edit/<?=$value['id'];?>">Düzenle</a></td>
                                            <td><a href="<?=SITE_URL;?>/siparis/delete/<?=$value['id'];?>">Sil</a></td>
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