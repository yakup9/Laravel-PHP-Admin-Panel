<?php

class category extends controller
{
    public function index(){

        if (!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if (!$this->model('uyeModel')->permission($this->myuserid,0)){helper::redirect(SITE_URL);die();}
        $data=$this->model('categorysModel')->listview();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('category/index',['data'=>$data]);
        $this->render('site/footer');

    }

    public function create(){
        if (!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if (!$this->model('uyeModel')->permission($this->myuserid,0)){helper::redirect(SITE_URL);die();}
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('category/create');
        $this->render('site/footer');
    }

    public function send(){

        if (!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if (!$this->model('uyeModel')->permission($this->myuserid,0)){helper::redirect(SITE_URL);die();}
        if ($_POST){
            $ad=helper::cleaner($_POST['ad']);
            if ($ad!=""){
                $ekle=$this->model('categorysModel')->create($ad);
                if ($ekle){
                    helper::flashData("statu","Kategori Başarıyla Eklendi");
                    helper::redirect(SITE_URL."/category/create");
                }else{

                    helper::flashData("statu","Kategori Eklenemedi");
                    helper::redirect(SITE_URL."/category/create");
                }
            }else{
                helper::flashData("statu","Lütfen Tüm Alanları Giriniz");
                helper::redirect(SITE_URL."/category/create");
            }
        }else{
            exit("Giriş Yok");
        }
    }

    public function edit($id){

        if (!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if (!$this->model('uyeModel')->permission($this->myuserid,0)){helper::redirect(SITE_URL);die();}
        $data=$this->model('categorysModel')->getData($id);
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('category/edit',['data'=>$data]);
        $this->render('site/footer');
    }

    public function update($id){

        if (!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if (!$this->model('uyeModel')->permission($this->myuserid,0)){helper::redirect(SITE_URL);die();}
        if ($_POST){
            $ad=helper::cleaner($_POST['ad']);
            if ($ad!=""){
                $duzenle=$this->model('categorysModel')->updateData($id,$ad);
                if ($duzenle){

                    helper::flashData("statu","Kategori Başarıyla Düzenlendi");
                    helper::redirect(SITE_URL."/category/edit/".$id);
                }else{

                    helper::flashData("statu","Kategori Düzenlenemedi");
                    helper::redirect(SITE_URL."/category/edit/".$id);
                }
            }else{
                helper::flashData("statu","Lütfen Tüm Alanları Giriniz");
                helper::redirect(SITE_URL."/category/edit/".$id);
            }
        }else{
            exit("Giriş Yok");
        }
    }

    public function delete($id){
        if (!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if (!$this->model('uyeModel')->permission($this->myuserid,0)){helper::redirect(SITE_URL);die();}
        $delete=$this->model('categorysModel')->deleteData($id);
        helper::redirect(SITE_URL."/category");
    }
}