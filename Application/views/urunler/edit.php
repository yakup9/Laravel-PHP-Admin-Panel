<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <?php helper::flashDataView("statu"); ?>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Ürün Düzenle</h3>
                        </div>

                        <form action="<?=SITE_URL;?>/urunler/update/<?=$params['data']['id'];?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ürün Adı</label>
                                    <input type="text" class="form-control" name="ad" value="<?=$params['data']['ad'];?>">
                                </div>
                                <div class="form-group">
                                    <label>Ürün Kategorisi</label>
                                    <select name="kategori_id" class="form-control">
                                        <?php foreach ($params['category'] as $key =>$value){?>
                                            <option <?php if ($params['data']['kategori_id']==$value['id']){ echo 'selected'; } ?> value="<?=$value['id'];?>"><?=$value['ad'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label style="display: block">Ürün Özellikleri</label>
                                    <button id="yeniEkle" class="btn btn-info" type="button">Yeni Özellik Ekle</button>
                                    <div id="urunOzellikAlani">
                                        <?php
                                        if (count(json_decode($params['data']['ozellikler'],true))!=0){
                                            foreach (json_decode($params['data']['ozellikler'],true) as $key=>$value){
                                                ?>
                                                    <div class="form-row">
                                                <div class="col-md-6">
                                                    <label>Ürün Özellik Adı:</label>
                                                    <input type="text" class="form-control selectOzellik" name="ozellik[<?=$key;?>][name]" value="<?=$value['name'];?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Ürün Özellik Değeri:</label>
                                                    <input type="text" class="form-control" name="ozellik[<?=$key;?>][value]" value="<?=$value['value'];?>">
                                                </div>
                                                    </div>
                                        <?php
                                            }
                                        }
                                        ?>
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
<script src="http://mertmvc/public/plugins/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        var i=$(".selectOzellik").length;
        $("#yeniEkle").click(function (){
            var temp='<div class="form-row"><div class="col-md-6"><label>Ürün Özellik Adı:</label><input type="text" class="form-control selectOzellik" name="ozellik['+i+'][name]"></div>' +
                '<div class="col-md-6"><label>Ürün Özellik Değeri:</label><input type="text" class="form-control" name="ozellik['+i+'][value]"></div></div>';
            $("#urunOzellikAlani").append(temp);
            i++;
        });
    });
</script>