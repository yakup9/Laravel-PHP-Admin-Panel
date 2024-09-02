<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <?php helper::flashDataView("statu"); ?>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Fatura Düzenle</h3>
                        </div>

                        <form action="<?=SITE_URL;?>/fatura/update/<?=$params['data']['id'];?>" method="post">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Fatura Tipi</label>
                                        <select name="tip" class="form-control">
                                            <option <?php if ($params['data']['tip']==0){ echo 'selected';} ?> value="0">Gelir</option>
                                            <option <?php if ($params['data']['tip']==1){ echo 'selected';} ?> value="1">Gider</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Müşteri Seçin</label>
                                        <select name="musteri_id" class="form-control">
                                            <?php
                                            foreach ($params['musteriler'] as $key=>$value){
                                                ?>
                                                <option <?php if ($params['data']['musteri_id']==$value['id']){ echo 'selected';} ?> value="<?=$value['id'];?>"><?=$value['ad']." ".$value['soyad'];?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Fatura No</label>
                                        <input type="text" name="fatura_no" class="form-control" value="<?=$params['data']['fatura_no'];?>">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Fatura Tutar</label>
                                        <input type="text" name="tutar" class="form-control" value="<?=$params['data']['tutar'];?>">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="exampleInputEmail1">Fatura Açıklama</label>
                                        <textarea name="aciklama" cols="20" rows="10" class="form-control"><?=$params['data']['aciklama'];?></textarea>
                                    </div>
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