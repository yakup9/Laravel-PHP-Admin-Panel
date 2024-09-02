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
                                    <th>Ad</th>
                                    <th>Düzenle</th>
                                    <th>Kaldır</th>
                                </tr>
                                </thead>
                                <?php if (count($params['data']) != 0) {
                                    foreach ($params['data'] as $key => $value) {

                                        ?>

                                        <tbody>
                                        <tr>
                                            <td><?=$value['id'];?></td>
                                            <td><?=$value['ad'];?></td>
                                            <td><a href="<?=SITE_URL;?>/kasa/edit/<?=$value['id'];?>">Düzenle</a></td>
                                            <td><a href="<?=SITE_URL;?>/kasa/delete/<?=$value['id'];?>">Sil</a></td>
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