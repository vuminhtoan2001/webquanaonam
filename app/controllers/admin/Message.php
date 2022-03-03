<?php
  class Message extends Controller {
    public $data = [];
    public function __construct(){
      Session::checkLoginAdmin();
      $this->__messageModel = $this->model('MessageModel');
    }
    public function index() {
      $data = $this->__messageModel->getAll();
      $this->data['content'] ='admin/message/list';
      $this->data['sub_content'] = [
        'message' => $data,
        'nameTable' => 'Bảng tin nhắn'
      ];
      $this->data['title'] = 'Admin message page';
      $this->render('layouts/admin_layout',$this->data);
    }
    public function delete($id){
      $result = $this->__messageModel->destroy($id);
      echo $result;
      if($result == "true"){
        header("location:"._WEB_ROOT."/admin/message");
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
