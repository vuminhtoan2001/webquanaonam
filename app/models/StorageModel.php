<?php
  class StorageModel extends Model {
    public function getStorage(){
      $sql="SELECT sanpham.MASP, sanpham.TENSP,sanpham.ANH,sanpham.SOLUONG,xuatsoluong, (sanpham.SOLUONG - IFNULL(xuatsoluong,0)) as tonkho FROM sanpham , (SELECT oderdetail.masp, SUM(oderdetail.soluong) as xuatsoluong FROM oderdetail GROUP BY oderdetail.masp) AS xuat WHERE sanpham.MASP = xuat.masp";
      return $this->_query($sql);
    }
  }
?>