<?php
  class Account extends Controller {
    public $data = [];
    public function __construct(){
      Session::checkLoginAdmin();
      $this->__accountModel = $this->model('AccountModel');
    }
    public function index() {
      $data = $this->__accountModel->getAll();
      $this->data['content'] ='admin/account/list';
      $this->data['sub_content'] = [
        'account' => $data,
        'nameTable' => 'Bảng tài khoản'
      ];
      $this->data['title'] = 'Admin account page';
      $this->render('layouts/admin_layout',$this->data);
    }
    public function form_add(){
      $this->data['sub_content']= [
        'nameTable' => 'Thêm tài khoản'
      ];
      $this->data['title'] = 'Admin thêm tài khoản';
      $this->data['content'] ='admin/account/add';
      $this->render('layouts/admin_layout',$this->data);
      if(isset($_REQUEST['btnGhiLai'])){
        if($this->__accountModel->getDetail($_POST['ID'])){
          echo "
            <script>
              (Swal.fire({
                icon: 'error',
                title: 'Lỗi dữ liệu...',
                text: 'Mã tài khoản đã tồn tại!',
              }))()
            </script>
            ";
        }else {
          $insert=[
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'email' => $_POST['email'],
            'level' => $_POST['level'],
          ];
          $result =$this->__accountModel->create($insert);
          if($result == "true"){
            echo "
                  <script type='text/javascript'>
                    ( Swal.fire({
                        icon: 'success',
                        title: 'Thêm mới thành công',
                        showConfirmButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'Stop add',
                        cancelButtonText: 'Continute add',
                        confirmButtonColor: '#FF7F50',
                        cancelButtonColor: '#3085d6',

                      }).then((result) => {
                        if (result.isConfirmed) {
                          window.location.assign('"._WEB_ROOT."/admin\/account"."')
                        }
                      })
                    )()
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
    }

    public function form_update($id){
      $account = $this->__accountModel->getDetail($id);
      $this->data['sub_content']= [
        'nameTable' => 'Sửa thông tin tài khoản',
        'account' => $account,
      ];
      $this->data['title'] = 'Admin cập nhật tài khoản';
      $this->data['content'] ='admin/account/update';
      $this->render('layouts/admin_layout',$this->data);
      // Action update
      if(isset($_REQUEST['btnUpdate'])){
        $data_update=[
          'username' => $_POST['username'],
          'password' => $_POST['password'],
          'email' => $_POST['email'],
          'level' => $_POST['level'],
        ];
        $result = $this->__accountModel->updateData($id,$data_update);
        if($result == "true"){
          echo "
              <script>
                Swal.fire({
                  icon: 'success',
                  title: 'Cập nhật thành công!',
                  showConfirmButton: true,
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.assign('"._WEB_ROOT."/admin\/account"."')
                  }
                })
              </script>
            ";
          }else{
            echo "
                <script>
                  Swal.fire({
                    icon: 'error',
                    title: 'Cập nhật thất bại thất bại!',
                    showConfirmButton: false,
                    timer:2000
                  })
                </script>
              ";
        }
      }
    }

    public function delete($id){
      $result = $this->__accountModel->destroy($id);
      echo $result;
      if($result == "true"){
        header("location:"._WEB_ROOT."/admin/account");
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
