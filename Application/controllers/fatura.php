<?php

class fatura extends controller
{
    public function index(){

        if (!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if (!$this->model('uyeModel')->permission($this->myuserid,5)){helper::redirect(SITE_URL);die();}
        $data=$this->model('faturaModel')->listview();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('faturalar/index',['data'=>$data]);
        $this->render('site/footer');
    }

    public function create(){

        if (!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if (!$this->model('uyeModel')->permission($this->myuserid,5)){helper::redirect(SITE_URL);die();}
        $musteriler=$this->model('musterilerModel')->listview();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('faturalar/create',['musteriler'=>$musteriler]);
        $this->render('site/footer');
    }

    public function send(){

        if (!$this->sessionManager->isLogged()) {helper::redirect(SITE_URL);die();}
        if (!$this->model('uyeModel')->permission($this->myuserid,5)){helper::redirect(SITE_URL);die();}
        if ($_POST){
            $musteri_id=intval($_POST['musteri_id']);
            $fatura_no=intval($_POST['fatura_no']);
            $tip=intval($_POST['tip']);
            $tutar=helper::cleaner($_POST['tutar']);
            $aciklama=helper::cleaner($_POST['aciklama']);
            if ($musteri_id!=0 and $fatura_no!=0 and $tutar!=""){
                $insert=$this->model('faturaModel')->create($musteri_id,$fatura_no,$tutar,$aciklama,$tip);
                if ($insert){
                    helper::flashData("statu","Fatura Başarıyla Eklendi");
                    helper::redirect(SITE_URL."/fatura/create");
                }else{
                    helper::flashData("statu","Fatura Eklenemedi");
                    helper::redirect(SITE_URL."/fatura/create");
                }
            }else{
                helper::flashData("statu","Lütfen Gerekli Yerleri Doldurunuz");
                helper::redirect(SITE_URL."/fatura/create");
            }
        }else{
            exit("Yasaklı Giriş");
        }
    }

    public function edit($id){

        if (!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if (!$this->model('uyeModel')->permission($this->myuserid,5)){helper::redirect(SITE_URL);die();}
        $musteriler=$this->model('musterilerModel')->listview();
        $data=$this->model('faturaModel')->getData($id);
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('faturalar/edit',['data'=>$data,'musteriler'=>$musteriler]);
        $this->render('site/footer');
    }

    public function update($id){

        if (!$this->sessionManager->isLogged()) {helper::redirect(SITE_URL);die();}
        if (!$this->model('uyeModel')->permission($this->myuserid,5)){helper::redirect(SITE_URL);die();}
        if ($_POST){
            $musteri_id=intval($_POST['musteri_id']);
            $fatura_no=intval($_POST['fatura_no']);
            $tip=intval($_POST['tip']);
            $tutar=helper::cleaner($_POST['tutar']);
            $aciklama=helper::cleaner($_POST['aciklama']);
            if ($musteri_id!=0 and $fatura_no!=0 and $tutar!=""){
                $insert=$this->model('faturaModel')->updateData($id,$musteri_id,$fatura_no,$tutar,$aciklama,$tip);
                if ($insert){
                    helper::flashData("statu","Fatura Başarıyla Düzenlendi");
                    helper::redirect(SITE_URL."/fatura/edit/".$id);
                }else{
                    helper::flashData("statu","Fatura Düzenlenemedi");
                    helper::redirect(SITE_URL."/fatura/edit/".$id);
                }
            }else{
                helper::flashData("statu","Lütfen Gerekli Yerleri Doldurunuz");
                helper::redirect(SITE_URL."/fatura/edit/".$id);
            }
        }else{
            exit("Yasaklı Giriş");
        }
    }

    public function delete($id){
        if (!$this->sessionManager->isLogged()) {helper::redirect(SITE_URL);die();}
        if (!$this->model('uyeModel')->permission($this->myuserid,5)){helper::redirect(SITE_URL);die();}
        $this->model('faturaModel')->getDelete($id);
        helper::redirect(SITE_URL."/fatura");
    }
}