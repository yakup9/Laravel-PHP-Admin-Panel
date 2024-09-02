<?php

class urunlerModel extends model
{

    public function listview(){
        $query=$this->db->prepare('select * from urunler');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($ad,$kategori_id,$ozellik,$date=null){
        $query=$this->db->prepare("insert into urunler(ad,kategori_id,ozellikler,date)values(?,?,?,?)");
        if ($date!=""){
            $date=$date;
        }else {
            $date = date("Y-m-d");
        }
        $insert=$query->execute(array($ad,$kategori_id,$ozellik,$date));
        if ($insert){
            return true;
        }else{
            return false;
        }
    }

    public function getData($id){
        $query=$this->db->prepare("select * from urunler where id=?");
        $query->execute(array($id));
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function updateData($id,$ad,$kategori_id,$ozellik){
        $query=$this->db->prepare("update urunler set ad=?, kategori_id=?, ozellikler=? where id=?");
        $update=$query->execute(array($ad,$kategori_id,$ozellik,$id));
        if ($update){
            return true;
        }else{
            return false;
        }
    }

    public function getDelete($id){
        $query=$this->db->prepare("delete from urunler where id=?");
        $query->execute(array($id));
    }

    public function ara($name){
        $query=$this->db->prepare("select * from urunler where ad like ?");
        $query->execute(array("%".$name."%"));
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


    public function createExcel($ad,$kategori_id,$ozellik,$date=null)
    {

        $query = $this->db->prepare("select * from urunler where ad=?");
        $query->execute(array($ad));
        if ($query->rowCount() == 0) {
            $query = $this->db->prepare("insert into urunler(ad,kategori_id,ozellikler,date)values(?,?,?,?)");
            if ($date != "") {
                $date = $date;
            } else {
                $date = date("Y-m-d");
            }
            $insert = $query->execute(array($ad, $kategori_id, $ozellik, $date));
            if ($insert) {
                return true;
            } else {
                return false;
            }
        }
    }

}