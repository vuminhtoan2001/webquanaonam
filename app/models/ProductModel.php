<?php
  class ProductModel extends Model {
    const TABLE ='sanpham';

    public function getAll($select= ['*'], $orderBy= [], $limit = null) {
      return $this->all(ProductModel::TABLE, $select, $orderBy, $limit);
    }
    public function getDetail($id){
      return $this->findById(ProductModel::TABLE, 'MASP',$id);
    }
    public function getByCategoryId($id){
      return $this->findByNotId(ProductModel::TABLE, 'MALOAI',$id);
    }
    public function create($data){
      return $this->store(ProductModel::TABLE,$data);
    }
    public function updateData($id,$data){
      return $this->update(ProductModel::TABLE,'MASP', $id, $data);
    }
    public function destroy($id){
      return $this->delete(ProductModel::TABLE,'MASP',$id);
    }
    public function getSellBest(){
      return $this->getBestSell();
    }
    public function getProductUpdate($id) {
      return $this->getUpdateProduct($id);
    }
    public function getFilterProduct($data,$orderBy,$limit=""){
      return $this->filter(ProductModel::TABLE,$data,$orderBy,$limit);
    }
    public function getSumFilter($data,$orderBy){
      return $this->filter_Amount(ProductModel::TABLE,$data,$orderBy);
    }
    public function getView(){
      $sql="SELECT SUM(VIEW) FROM `sanpham`";
      return $this->_query($sql);
    }
    public function getSumProducts(){
      $sql="SELECT COUNT(MASP) AS SUM_PRODUCTS FROM sanpham";
      return $this->_query($sql);
    }
    //Class End
  }
?>