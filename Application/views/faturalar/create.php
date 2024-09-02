<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <?php helper::flashDataView("statu"); ?>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Yeni Fatura Oluştur</h3>
                        </div>

                        <form action="<?=SITE_URL;?>/fatura/send" method="post">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-6">
                                    <label for="exampleInputEmail1">Fatura Tipi</label>
                                    <select name="tip" class="form-control">
                                        <option value="0">Gelir</option>
                                        <option value="1">Gider</option>
                                    </select>
                                    </div>

                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Müşteri Seçin</label>
                                    <select name="musteri_id" class="form-control">
                                        <?php
                                        foreach ($params['musteriler'] as $key=>$value){
                                            ?>
                                            <option value="<?=$value['id'];?>"><?=$value['ad']." ".$value['soyad'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Fatura No</label>
                                        <input type="text" name="fatura_no" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Fatura Tutar</label>
                                        <input type="text" name="tutar" class="form-control">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="exampleInputEmail1">Fatura Açıklama</label>
                                        <textarea name="aciklama" cols="30" rows="10" class="form-control"></textarea>
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