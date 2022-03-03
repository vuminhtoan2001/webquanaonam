<?php
  class AccountModel extends Model {
    const TABLE = 'user';

    public function getAll($select=['*'], $oderBy= [], $limit = null){
      return $this->all(AccountModel::TABLE, $select, $oderBy, $limit);
    }
    public function getDetail($id){
      return $this->findById(AccountModel::TABLE, 'ID',$id);
    }
    public function findUser($email){
      return $this->findById(AccountModel::TABLE,'email',$email);
    }
    public function create($data){
      return $this->store(AccountModel::TABLE,$data);
    }
    public function updateData($id,$data){
      return $this->update(AccountModel::TABLE,'ID', $id, $data);
    }
    public function resetPassword($email,$data){
      return $this->update(AccountModel::TABLE,'email', $email, $data);
    }
    public function destroy($id){
      return $this->delete(AccountModel::TABLE,'ID',$id);
    }

  }
?>