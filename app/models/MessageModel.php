<?php
  class MessageModel extends Model {
    const TABLE ='khachhang';
    public function getAll($select= ['*'], $orderBy= [], $limit = null) {
      return $this->all(MessageModel::TABLE, $select, $orderBy, $limit);
    }
    public function destroy($id){
      return $this->delete(MessageModel::TABLE,'ID',$id);
    }
    public function getAmountMessage(){
      $sql="SELECT COUNT(ID) FROM `khachhang`";
      return $this->_query($sql);
    }
    public function create($data){
      return $this->store(MessageModel::TABLE,$data);
    }
  }
?>