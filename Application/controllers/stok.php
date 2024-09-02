<?php

class stok extends controller
{
    public function index(){
        if (!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if (!$this->model('uyeModel')->permission($this->myuserid,3)){helper::redirect(SITE_URL);die();}
        $data=$this->model('stokModel')->listview();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('stok/index',['data'=>$data]);
        $this->render('site/footer');
    }

    public function create(){

        if (!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if (!$this->model('uyeModel')->permission($this->myuserid,3)){helper::redirect(SITE_URL);die();}
        $urunler=$this->model('urunlerModel')->listview();
        $musteriler=$this->model('musterilerModel')->listview();
        $kasalar=$this->model('kasaModel')->listview();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('stok/create',['urunler'=>$urunler,'musteriler'=>$musteriler,'kasa'=>$kasalar]);
        $this->render('site/footer');
    }

    public function send(){
        if (!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if (!$this->model('uyeModel')->permission($this->myuserid,3)){helper::redirect(SITE_URL);die();}
        if($_POST){
            $urun_id=intval($_POST['urun_id']);
            $musteri_id=intval($_POST['musteri_id']);
            $islem_tipi=intval($_POST['islem_tipi']);
            $adet=intval($_POST['adet']);
            $fiyat=intval($_POST['fiyat']);
            $kasa_id=intval($_POST['kasa_id']);
            if ($adet!=0 and $fiyat!=""){
                $insert=$this->model('stokModel')->create($urun_id,$musteri_id,$islem_tipi,$adet,$fiyat,$kasa_id);
                if ($insert){

                    helper::flashData("statu","Stok Başarıyla Eklendi");
                    helper::redirect(SITE_URL."/stok/create");
                }else{

                    helper::flashData("statu","Stok Eklenemedi");
                    helper::redirect(SITE_URL."/stok/create");
                }
            }else{
                helper::flashData("statu","Ürün fiyat ve adeti boş bırakılamaz");
                helper::redirect(SITE_URL."/stok/create");
            }
        }else{
            exit("Yasaklı Giriş");
        }
    }

    public function edit($id){

        if (!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if (!$this->model('uyeModel')->permission($this->myuserid,3)){helper::redirect(SITE_URL);die();}
        $urunler=$this->model('urunlerModel')->listview();
        $musteriler=$this->model('musterilerModel')->listview();
        $kasalar=$this->model('kasaModel')->listview();
        $data=$this->model('stokModel')->getData($id);
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('stok/edit',['data'=>$data,'urunler'=>$urunler,'musteriler'=>$musteriler,'kasa'=>$kasalar]);
        $this->render('site/footer');
    }

    public function update($id){

        if (!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if (!$this->model('uyeModel')->permission($this->myuserid,3)){helper::redirect(SITE_URL);die();}
        if($_POST){
            $urun_id=intval($_POST['urun_id']);
            $musteri_id=intval($_POST['musteri_id']);
            $islem_tipi=intval($_POST['islem_tipi']);
            $adet=intval($_POST['adet']);
            $fiyat=intval($_POST['fiyat']);
            $kasa_id=intval($_POST['kasa_id']);
            if ($adet!=0 and $fiyat!=""){
                $insert=$this->model('stokModel')->updateData($id,$urun_id,$musteri_id,$islem_tipi,$adet,$fiyat,$kasa_id);
                if ($insert){

                    helper::flashData("statu","Stok Başarıyla Düzenlendi");
                    helper::redirect(SITE_URL."/stok/edit/".$id);
                }else{

                    helper::flashData("statu","Stok Düzenlenemedi");
                    helper::redirect(SITE_URL."/stok/edit/".$id);
                }
            }else{
                helper::flashData("statu","Ürün fiyat ve adeti boş bırakılamaz");
                helper::redirect(SITE_URL."/stok/edit/".$id);
            }
        }else{
            exit("Yasaklı Giriş");
        }

    }

    public function delete($id){
        if (!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if (!$this->model('uyeModel')->permission($this->myuserid,3)){helper::redirect(SITE_URL);die();}
        $query=$this->model('stokModel')->getDelete($id);
        helper::redirect(SITE_URL."/stok");
    }

}