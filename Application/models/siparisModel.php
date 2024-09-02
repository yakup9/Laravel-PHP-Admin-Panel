<?php

class siparisModel extends model
{
    public function create($musteri_id, $firma_adi, $kullanici_id, $tarih, $fiyat, $urun, $sip_no)
    {
        $query = $this->db->prepare("insert into siparis(musteri_id,firma_adi,kullanici_id,tarih,fiyat,urunler,sip_no) VALUES (?,?,?,?,?,?,?)");
        $insert = $query->execute(array($musteri_id, $firma_adi, $kullanici_id, $tarih, $fiyat, $urun, $sip_no));
        if ($insert) {
            return true;
        } else {
            return false;
        }
    }

    public function listview()
    {
        $query = $this->db->prepare('select * from siparis');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getData($id)
    {
        $query = $this->db->prepare("select * from siparis where id=?");
        $query->execute(array($id));
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function updateData($id, $musteri_id, $firma_adi, $tarih, $fiyat, $urun, $sip_no)
    {
        $query = $this->db->prepare("update siparis set musteri_id=?,firma_adi=?,tarih=?, fiyat=?, urunler=?, sip_no=? where id=?");
        return $query->execute(array($musteri_id, $firma_adi, $tarih, $fiyat, $urun, $sip_no, $id));

    }

    public function deleteData($id)
    {
        $query = $this->db->prepare("delete from siparis where id=?");
        $query->execute(array($id));
    }
}