<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <?php helper::flashDataView("statu"); ?>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Kullanıcı Düzenle</h3>
                        </div>

                        <form action="<?= SITE_URL; ?>/kullanici/update/<?=$params['data']['id'];?>" method="post">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Kullanıcı Adı Soyadı</label>
                                        <input type="text" class="form-control" name="name" value="<?=$params['data']['name'];?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Kullanıcı Email</label>
                                        <input type="email" class="form-control" name="email" value="<?=$params['data']['email'];?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Kullanıcı Şifre</label>
                                        <input type="text" class="form-control" name="password">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Kullanıcı İzinler: </label><br>
                                        <?php
                                        foreach (PERMISSIONS as $key => $value) {
                                            ?>
                                            <input type="checkbox" <?php if(in_array($key,explode(',',$params['data']['permission']))){echo 'checked';} ?> name="permission[]" value="<?= $key; ?>"><?= $value; ?>
                                            <br>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Ekle</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>