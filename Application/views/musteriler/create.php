<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <?php helper::flashDataView("statu"); ?>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Yeni Müşteri Oluştur</h3>
                        </div>

                        <form action="<?=SITE_URL;?>/musteriler/send" method="post">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Adı</label>
                                    <input type="text" class="form-control" name="ad">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Soyadı</label>
                                    <input type="text" class="form-control" name="soyad">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Şirket</label>
                                    <input type="text" class="form-control" name="sirket">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telefon</label>
                                    <input type="text" class="form-control" name="telefon">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Adres</label>
                                    <input type="text" class="form-control" name="adres">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tc</label>
                                    <input type="text" class="form-control" name="tc">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Notu</label>
                                    <input type="text" class="form-control" name="notu">
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