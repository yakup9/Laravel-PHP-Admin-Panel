<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <?php helper::flashDataView("statu"); ?>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Yeni Sipariş Oluştur</h3>
                        </div>

                        <form action="<?= SITE_URL; ?>/siparis/send" method="post">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Müşteri Seçiniz:</label>
                                    <select name="musteri_id" class="form-control">
                                        <?php
                                        foreach ($this->model('musterilerModel')->listview() as $key => $value) {
                                            ?>
                                            <option value="<?= $value['id']; ?>"><?= $value['ad']; ?> <?= $value['soyad']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Firma Adı</label>
                                    <input type="text" class="form-control" name="firma_adi">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sipariş Tarihi</label>
                                    <input type="date" class="form-control" name="tarih">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sipariş Tutarı</label>
                                    <input type="text" class="form-control" name="fiyat">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sipariş Numarası</label>
                                    <input type="text" class="form-control" name="sip_no">
                                </div>

                                <div class="form-group">
                                    <label style="display: block">Ürünler</label>
                                    <button id="yeniEkle" class="btn btn-info" type="button">Yeni Ürün Ekle</button>
                                    <div id="urunOzellikAlani"></div>
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

<script src="http://mertmvc/public/plugins/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        var i = $(".items").length;
        $("#yeniEkle").click(function () {
            $.ajax({
                url: "http://mertmvc/siparis/getUrunList",
                dataType: "json",
                success: function (result) {
                    var temp = '<div class="items form-row">' +
                        '<div class="col-md-3">' +
                        '<label>Ürün Seçiniz:</label>' +
                        '<select class="form-control" name="urun[' + i + '][id]">';

                    $.each(result, function (i, item) {
                        temp += '<option value="' + item.id + '">' + item.ad + '</option>';
                    });
                    temp += '</select></div>' +
                        '<div class="col-md-3">' +
                        '<label>Ürün Adet:</label>' +
                        '<input type="text" class="form-control" name="urun[' + i + '][adet]">' +
                        '</div>' +
                        '<div class="col-md-3">' +
                        '<label>Ürün Birim Fiyat:</label>' +
                        '<input type="text" class="form-control" name="urun[' + i + '][fiyat]">' +
                        '</div>' +
                        '<div class="col-md-3">' +
                        '<label>Fazlasını Sil</label><br>' +
                        '<button type="button" id="removeItem" class="btn btn-danger">Fazlasını Sil</button>' +
                        '</div>' +
                        '</div>';
                    $("#urunOzellikAlani").append(temp);
                }
            });
            i++;
        });
        $("body").on("click","#removeItem",function (){
            $(this).closest(".items").remove();
        })
    });
</script>