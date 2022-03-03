<?php
  class Contact extends Controller {
    public $data = [];
    public function __construct(){
      $this->__contactModel = $this->model('MessageModel');
    }
    public function index() {
      $this->data['sub_content']=[];
      $this->data['title'] = 'Liên hệ';
      $this->data['content'] = 'client/contact/index';
      $this->render('layouts/client_layout', $this->data);
      if(isset($_REQUEST['submit'])){
        $hoten=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $note=$_POST['note'];
        if($hoten!="" || $email!="" || $phone!="" || $note!=""){
          $data=[
            'TENKH' => $hoten,
            'SDT' => $phone,
            'EMAIL' => $email,
            'ND' => $note,
          ];
          $result= $this->__contactModel->create($data);
          if($result == "true"){
            echo "
              <script>
                Swal.fire({
                  icon: 'success',
                  title: 'Gủi thành công!',
                  showConfirmButton: false,
                  timer:2000
                })

              </script>
            ";
          }else{
              echo "Không gửi được! Vui lòng thao tác lại. ";

          }
        }else{
          echo "
          <script>
            Swal.fire({
              icon: 'error',
              title: 'Các trường không được để trống!',
              showConfirmButton: false,
              timer:2000
            })
          </script>
        ";

        }
      }
    }

  }
?>