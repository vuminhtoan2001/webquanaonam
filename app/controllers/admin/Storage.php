<?php
  class Storage extends Controller {
    public $data = [];
    public function __construct(){
      Session::checkLoginAdmin();
      $this->__storageModel = $this->model('StorageModel');
    }
    public function index() {
      $data = $this->__storageModel->getStorage();
      $this->data['content'] ='admin/storage/list';
      $this->data['sub_content'] = [
        'storages' => $data,
        'nameTable' => 'Bảng kho hàng'
      ];
      $this->data['title'] = 'Admin storage page';
      $this->render('layouts/admin_layout',$this->data);
    }
  }
?>
