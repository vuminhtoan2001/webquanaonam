<?php
  class OrderModel extends Model {
      const TABLE ='oder';

      public function getAll($select= ['*'], $orderBy= [], $limit = null) {
        return $this->all(OrderModel::TABLE, $select, $orderBy, $limit);
      }
      public function getDetail($id){
        return $this->findById(OrderModel::TABLE, 'id',$id);
      }
      public function updateData($id,$data){
        return $this->update(OrderModel::TABLE, 'id', $id, $data);
      }
      public function create($data){
        return $this->store(OrderModel::TABLE,$data);
      }
      public function createOderDetail($data){
        return $this->store("oderdetail", $data);
      }
      public function destroy($id){
        return $this->delete(OrderModel::TABLE,'id',$id);
      }
      public function destroyOderDetail($id){
        return $this->delete('oderdetail','id_order',$id);
      }
      // Table order detail
      public function getDetailOrder(){
        $order_detail = [];
        $orders = $this->getAll();
        foreach($orders as $order) {
          $id = $order['id'];
          $order_detail[$id] = $this->getByForeignKey('oderdetail','id_order', $id);
        }
        return $order_detail;
      }
      public function idMax(){
        $sql="SELECT MAX(id) FROM oder";
        return $this->_query($sql);
      }
      public function getSale(){
        $sql="SELECT COUNT(id) FROM `oder`";
        return $this->_query($sql);
      }
      public function getEarning($date){
        $sql="SELECT SUM(total) FROM `oder` WHERE ngaydathang = $date";
        return $this->_query($sql);
      }
      public function getRecentCustomer(){
        $sql = "SELECT DISTINCT name, phone FROM `oder` ORDER BY id DESC LIMIT 6";
        return $this->_query($sql);
      }
  }

?>