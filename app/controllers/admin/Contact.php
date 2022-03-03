<?php
  class Contact extends Controller {
    public $data = [];
    public function __construct(){
      Session::checkLoginAdmin();
      $this->__contactModel = $this->model('ContactModel');
    }
    public function index() {
      $data = $this->__contactModel->getAll();
      $this->data['content'] ='admin/contact/list';
      $this->data['sub_content'] = [
        'contact' => $data,
        'nameTable' => 'Bảng thông tin liên hệ khách hàng'
      ];
      $this->data['title'] = 'Admin contact page';
      $this->render('layouts/admin_layout',$this->data);
    }
    public function delete($id){
      $result = $this->__contactModel->destroy($id);
      echo $result;
      if($result == "true"){
        header("location:"._WEB_ROOT."/admin/contact");
      }else{
        echo "
          <script>
            alert('Xóa thất bại!')
          </script>
        ";
      }
    }
  }
?>
