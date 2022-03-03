<?php
  class Register extends Controller {
    public $data = [];

    public function __construct(){
      $this->__loginModel = $this->model('AccountModel');
    }

    public function index() {
      $this->data['sub_content']=[
      ];
      $this->data['title'] = 'Login';
      $this->data['content'] = 'client/account/register';
      $this->render('layouts/client_layout', $this->data);
      if(isset($_REQUEST['submit-register'])){
        $this->register();
      }
    }
    public function register(){
      // echo "
      //     <script>
      //       alert('submit thành công".$_POST['username']."')
      //     </script>
      //   ";
      $insert=[
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'email' => $_POST['email'],
        'level' => 0,
      ];
      echo $_POST['username'];
      $result =$this->__loginModel->create($insert);
      if($result == "true"){
        echo "
          <script>
            Swal.fire({
              icon: 'success',
              title: 'Đăng ký thành công!',
              showConfirmButton: false,
              timer:2000
            })
            setTimeout(function(){
              window.location.assign('"._WEB_ROOT."/login"."')
          }, 2000)
          </script>
        ";
        // header("location:"._WEB_ROOT."/admin/accounts");
      }else{
        echo "
              <script>
                Swal.fire({
                  icon: 'error',
                  title: 'Thêm mới thất bại!',
                  showConfirmButton: false,
                  timer:2000
                })
              </script>
            ";
      }
    }
  }
?>