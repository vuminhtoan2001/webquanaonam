<?php
  class Forget_password extends Controller {
    public $data = [];

    public function __construct(){
      $this->__accountModel = $this->model('AccountModel');
    }

    public function index() {
      $this->data['sub_content']=[
      ];
      $this->data['title'] = 'Login';
      $this->data['content'] = 'client/account/resetpassword';
      $this->render('layouts/client_layout', $this->data);
      if(isset($_REQUEST['submit-register'])){
        $this->resetAccount();
      }
    }
    public function resetAccount(){
      $result = $this->__accountModel->findUser($_POST['email']);
      if(!empty($result)){
        $data=[
          'password' => $_POST['password'],
        ];
        echo $_POST['username'];
        $result =$this->__accountModel->resetPassword($_POST['email'],$data);
        if($result == "true"){
          echo "
            <script>
              Swal.fire({
                icon: 'success',
                title: 'Reset thành công!',
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
                    title: 'Reset thất bại!',
                    showConfirmButton: false,
                    timer:2000
                  })
                </script>
              ";
        }
      }
      // echo "
      //     <script>
      //       alert('submit thành công".$_POST['username']."')
      //     </script>
      //   ";
    }
  }
?>