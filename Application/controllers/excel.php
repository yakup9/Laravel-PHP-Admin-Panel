<?php

class excel extends controller
{

    public function export(){
        require_once 'Classes/PHPExcel.php';
        $Excel=new PHPExcel();
        $tumUrunler=$this->model('urunlerModel')->listview();
        $Excel->getActiveSheet()->setTitle('Sayfa1');
        $Excel->getActiveSheet()->setCellValue('A1','Urun Adi');
        $Excel->getActiveSheet()->setCellValue('B1','Urun Kategori');
        $Excel->getActiveSheet()->setCellValue('C1','Urun Özellikleri');
        $Excel->getActiveSheet()->setCellValue('D1','Eklenme Tarihi');

        $a=2;
        foreach ($tumUrunler as $key=>$value){
            $ozellikler=$this->ozellikOlustur(json_decode($value['ozellikler'],true));
            $kategoriData=$this->model('categorysModel')->getData($value['kategori_id']);
            $Excel->getActiveSheet()->setCellValue('A'.$a,$value['ad']);
            $Excel->getActiveSheet()->setCellValue('B'.$a,$kategoriData['ad']);
            $Excel->getActiveSheet()->setCellValue('C'.$a,$ozellikler);
            $Excel->getActiveSheet()->setCellValue('D'.$a,$value['date']);
            $a++;
        }

        $Kaydet=PHPExcel_IOFactory::createWriter($Excel,'Excel2007');
        $filename=rand(1,1000).".xlsx";
        $Kaydet->save($filename);
    }

    public function ozellikOlustur($array=[]){
        $returnArray=[];
        foreach ($array as $key=>$value){
            $returnArray[]=$value['name'].":".$value['value'];
        }
        return implode(',',$returnArray);
    }

    public function importForm(){
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('urunler/import');
        $this->render('site/footer');
    }

    public function import(){

        $temp_name=$_FILES['file']['tmp_name'];
        require_once 'Classes/PHPExcel.php';
        $Excel=new PHPExcel();
        $objPHPExcel=PHPExcel_IOFactory::load($temp_name);
        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
            $worksheetTitle=$worksheet->getTitle();
            $highestRow=$worksheet->getHighestRow();        //1,2....100...
            $highestColumn=$worksheet->getHighestColumn(); //A,B,C,D,E...
            $highestColumnIndex=PHPExcel_Cell::columnIndexFromString($highestColumn);

            for ($row=2;$row<=$highestRow;++$row){

                $cell=$worksheet->getCellByColumnAndRow(0,$row);
                $urunlerAdi=$cell->getValue();

                $cell2=$worksheet->getCellByColumnAndRow(1,$row);
                $kategori=$cell2->getValue();

                $kategori_id=$this->model('categorysModel')->getExcelId($kategori);

                $cell3=$worksheet->getCellByColumnAndRow(2,$row);
                $ozellikler=$cell3->getValue();
                $ozellikjson=$this->ozellikBirlestir($ozellikler);

                $cell4=$worksheet->getCellByColumnAndRow(3,$row);
                $tarih=$cell4->getValue();

                $this->model('urunlerModel')->createExcel($urunlerAdi,$kategori_id,$ozellikjson,$tarih);

            }
        }

        helper::flashData("statu","Ürün Başarıyla Aktarıldı");
        helper::redirect(SITE_URL."/excel/importForm");
    }

    public function ozellikBirlestir($x){

        $returnArray=[];
        $explode=explode(',',$x);
         foreach ($explode as $key=>$value){
             $ex1=explode(':',$value);
             $returnArray[$key]['name']=$ex1[0];
             $returnArray[$key]['value']=$ex1[1];
         }

         return json_encode($returnArray);
    }
}