<?php

class raporModel extends model
{
    public function girenUrunToplam($id)
    {
        $query = $this->db->prepare("select SUM(fiyat*adet) as toplam from stok where urun_id=? and islem_tipi='0'");
        $query->execute(array($id));
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc['toplam']);
    }

    public function cikanUrunToplam($id)
    {
        $query = $this->db->prepare("select SUM(fiyat*adet) as toplam from stok where urun_id=? and islem_tipi='1'");
        $query->execute(array($id));
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc['toplam']);
    }

    public function girenUrunAdet($id){
        $query = $this->db->prepare("select SUM(adet) from stok where urun_id=? and islem_tipi='0'");
        $query->execute(array($id));
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc['SUM(adet)']);
    }

    public function cikanUrunAdet($id){
        $query = $this->db->prepare("select SUM(adet) from stok where urun_id=? and islem_tipi='1'");
        $query->execute(array($id));
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc['SUM(adet)']);
    }

    public function toplamAlinanUrun($id) {   //müsteri id
        $query = $this->db->prepare("select SUM(adet) from stok where musteri_id=? and islem_tipi='0'");
        $query->execute(array($id));
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc['SUM(adet)']);
    }

    public function toplamSatilanUrun($id) {   //müsteri id
        $query = $this->db->prepare("select SUM(adet) from stok where musteri_id=? and islem_tipi='1'");
        $query->execute(array($id));
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc['SUM(adet)']);
    }

    public function toplamKazanilanPara($id){  //müşteri_id
        $query = $this->db->prepare("select SUM(fiyat*adet) as toplam from stok where musteri_id=? and islem_tipi='1'");
        $query->execute(array($id));
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc['toplam']);
    }

    public function toplamKaybedilenPara($id){  //müşteri_id
        $query = $this->db->prepare("select SUM(fiyat*adet) as toplam from stok where musteri_id=? and islem_tipi='0'");
        $query->execute(array($id));
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc['toplam']);
    }

    public function filtrele($firstDate,$lastDate){
        $query=$this->db->prepare("select * from stok where date between ? and ? group by urun_id");
        $query->execute(array($firstDate,$lastDate));
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function toplamGelir(){
        $query=$this->db->prepare("select SUM(fiyat*adet) as toplam from stok where islem_tipi='1'");
        $query->execute();
        $sonuc=$query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc['toplam']);
    }

    public function toplamGider(){
        $query=$this->db->prepare("select SUM(fiyat*adet) as toplam from stok where islem_tipi='0'");
        $query->execute();
        $sonuc=$query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc['toplam']);
    }

    public function girenUrunToplamKasa($id)
    {
        $query = $this->db->prepare("select SUM(fiyat*adet) as toplam from stok where kasa_id=? and islem_tipi='0'");
        $query->execute(array($id));
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc['toplam']);
    }

    public function cikanUrunToplamKasa($id)
    {
        $query = $this->db->prepare("select SUM(fiyat*adet) as toplam from stok where kasa_id=? and islem_tipi='1'");
        $query->execute(array($id));
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc['toplam']);
    }

    public function girenUrunAdetKasa($id){
        $query = $this->db->prepare("select SUM(adet) from stok where kasa_id=? and islem_tipi='0'");
        $query->execute(array($id));
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc['SUM(adet)']);
    }

    public function cikanUrunAdetKasa($id){
        $query = $this->db->prepare("select SUM(adet) from stok where kasa_id=? and islem_tipi='1'");
        $query->execute(array($id));
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc['SUM(adet)']);
    }

    public function faturaGelir($id){   //musteri id
        $query=$this->db->prepare("select SUM(tutar) from faturalar where musteri_id=? and tip='0'");
        $query->execute(array($id));
        $sonuc=$query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc['SUM(tutar)']);
    }

    public function faturaGider($id){   //musteri id
        $query=$this->db->prepare("select SUM(tutar) from faturalar where musteri_id=? and tip='1'");
        $query->execute(array($id));
        $sonuc=$query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc['SUM(tutar)']);
    }

}