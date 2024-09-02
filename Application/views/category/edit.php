<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <?php helper::flashDataView("statu"); ?>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Kategori Düzenle</h3>
                        </div>

                        <form action="<?= SITE_URL; ?>/category/update/<?= $params['data']['id']; ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kategori Adı</label>
                                    <input type="text" class="form-control" name="ad"
                                           value="<?= $params['data']['ad']; ?>">
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Düzenle</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>