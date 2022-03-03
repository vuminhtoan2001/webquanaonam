<?php
  class Login extends Controller {
    public $data = [];
    public function __construct(){
      $this->__accountModel = $this->model('AccountModel');
    }
    public function index() {
      $this->data['sub_content']=[];
      $this->data['title'] = 'Login';
      $this->data['content'] = 'client/account/login';
      $this->render('layouts/client_layout', $this->data);
      if(isset($_REQUEST['submit-login'])){
        $this->checkUser($_POST['email'], $_POST['password']);
      }
    }
    public function checkUser($email, $password){
      $result = $this->__accountModel->findUser($email);
      $username = $result['username'];
      if(!empty($result)){
        // echo "
        // <script>
        //   alert('password: ".$result['password']."')
        // </script>
        // ";
        if($result['password'] == $password){
          if($result['level'] == 1){
            Session::set('admin',$username);
            echo "
            <script>
              Swal.fire({
                icon: 'success',
                title: 'Đăng nhập thành công!',
                showConfirmButton: false,
                timer:2000
              })
              setTimeout(function(){
                window.location.assign('"._WEB_ROOT."/admin/dashboard"."')
            }, 2000)
            </script>
          ";
          }else{
            $_SESSION["user"]=$username;
            echo "
            <script>
              Swal.fire({
                icon: 'success',
                title: 'Đăng nhập thành công!',
                showConfirmButton: false,
                timer:2000
              })
              setTimeout(function(){
                window.location.assign('"._WEB_ROOT."')
            }, 2000)
            </script>
          ";
          }

        }else{
          $_SESSION["thongbao"]="Mật khẩu không đúng !";
          echo "
            <script>
              Swal.fire({
                icon: 'error',
                title: 'Mật khẩu không đúng!',
                showConfirmButton: false,
                timer:2000
              })
            </script>
          ";
        }
      }else{
        $_SESSION["thongbao"]="Email không đúng !";
        echo "
          <script>
            Swal.fire({
              icon: 'error',
              title: 'Email không đúng!',
              showConfirmButton: false,
              timer:2000
            })
          </script>
        ";
      }

    }

  }
?>