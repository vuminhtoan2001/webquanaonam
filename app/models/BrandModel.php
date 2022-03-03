<?php
  class BrandModel extends Model {
    const TABLE = 'hangsx';

    public function getAll($select=['*'], $oderBy= [], $limit = null){
      return $this->all(BrandModel::TABLE, $select, $oderBy, $limit);
    }
    public function getDetail($id){
      return $this->findById(BrandModel::TABLE, 'MAHANGSX',$id);
    }
    public function getProductsById($id){
      $sql ="SELECT * FROM hangsp WHERE MAHANGSX = '${id}'";
      return $this->_query($sql);
    }
    public function create($data){
      return $this->store(BrandModel::TABLE,$data);
    }
    public function updateData($id,$data){
      return $this->update(BrandModel::TABLE,'MAHANGSX', $id, $data);
    }
    public function destroy($id){
      return $this->delete(BrandModel::TABLE,'MAHANGSX',$id);
    }

  }
?>