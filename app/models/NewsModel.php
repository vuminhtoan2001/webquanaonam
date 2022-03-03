<?php
  class NewsModel extends Model {
    const TABLE ='tintuc';

    public function getAll($select= ['*'], $orderBy= [], $limit = null) {
      return $this->all(NewsModel::TABLE, $select, $orderBy, $limit);
    }
    public function getDetail($id){
      return $this->findById(NewsModel::TABLE, 'MATIN',$id);
    }
    public function getByCategory($id){
      return $this->findByNotId(NewsModel::TABLE, 'LOAITIN', $id);
    }
    public function create($data){
      return $this->store(NewsModel::TABLE,$data);
    }
    public function updateData($id,$data){
      return $this->update(NewsModel::TABLE,'MATIN', $id, $data);
    }
    public function destroy($id){
      return $this->delete(NewsModel::TABLE,'MATIN',$id);
    }
    public function getSellBest(){
      return $this->getBestSell();
    }
    public function getTypeNews(){
      $sql = "SELECT * FROM tintuc GROUP BY LOAITIN";
      return $this->_query($sql);
    }
    public function getSumNews(){
      $sql="SELECT COUNT(MATIN) FROM tintuc";
      return $this->_query($sql);
    }
    public function newNews(){
      $sql="SELECT * FROM tintuc ORDER BY NGAYDANG DESC LIMIT 4";
      return $this->_query($sql);
    }
    //Class End

  }
?>