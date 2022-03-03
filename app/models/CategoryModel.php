<?php
  class CategoryModel extends Model {
    const TABLE = 'loaisp';

    public function getAll($select=['*'], $oderBy= [], $limit = null){
      return $this->all(CategoryModel::TABLE, $select, $oderBy, $limit);
    }
    public function getByid($id){
      return $this->findByid(CategoryModel::TABLE,'MALOAI', $id); ;
    }
    public function getProductsById($id){
      $sql ="SELECT * FROM sanpham WHERE MALOAI = '${id}'";
      return $this->_query($sql);
    }
    public function getDetail($id){
      return $this->findById(CategoryModel::TABLE, 'MALOAI',$id);
    }
    public function create($data){
      return $this->store(CategoryModel::TABLE,$data);
    }
    public function updateData($id,$data){
      return $this->update(CategoryModel::TABLE,'MALOAI', $id, $data);
    }
    public function destroy($id){
      return $this->delete(CategoryModel::TABLE,'MALOAI',$id);
    }
  }
?>