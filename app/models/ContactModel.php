<?php
  class ContactModel extends Model {
    const TABLE ='lienhe';
    public function getAll($select= ['*'], $orderBy= [], $limit = null) {
      return $this->all(ContactModel::TABLE, $select, $orderBy, $limit);
    }
    public function destroy($id){
      return $this->delete(ContactModel::TABLE,'id',$id);
    }
    public function create($data){
      return $this->store(ContactModel::TABLE,$data);
    }
  }
?>