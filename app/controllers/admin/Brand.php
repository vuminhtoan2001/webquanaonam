<?php
  class Brand extends Controller {
    public $data = [];
    public function __construct(){
      Session::checkLoginAdmin();
      $this->__brandModel = $this->model('BrandModel');
    }
    public function index() {
      $data = $this->__brandModel->getAll();
      $this->data['content'] ='admin/brand/list';
      $this->data['sub_content'] = [
        'brand' => $data,
        'nameTable' => 'Bảng nhãn hiệu'
      ];
      $this->data['title'] = 'Admin brand page';
      $this->render('layouts/admin_layout',$this->data);
    }
    public function form_add(){
      $this->data['sub_content']= [
        'nameTable' => 'Thêm nhãn hiệu'
      ];
      $this->data['title'] = 'Admin thêm nhãn hiệu';
      $this->data['content'] ='admin/brand/add';
      $this->render('layouts/admin_layout',$this->data);
      if(isset($_REQUEST['btnGhiLai'])){
        if($this->__brandModel->getDetail($_POST['MAHANGSX'])){
          echo "
            <script>
              (Swal.fire({
                icon: 'error',
                title: 'Lỗi dữ liệu...',
                text: 'Mã nhãn hiệu đã tồn tại!',
              }))()
            </script>
            ";
        }else {
          $insert=[
            'MAHANGSX' => $_POST['MAHANGSX'],
            'TENHANG' => $_POST['TENHANG'],
          ];
          $result =$this->__brandModel->create($insert);
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
                          window.location.assign('"._WEB_ROOT."/admin\/brand"."')
                        }
                      })
                    )()
                  </script>
                ";
            // header("location:"._WEB_ROOT."/admin/brands");
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
      $brand = $this->__brandModel->getDetail($id);
      $this->data['sub_content']= [
        'nameTable' => 'Sửa thông tin nhãn hiệu',
        'brand' => $brand,
      ];
      $this->data['title'] = 'Admin cập nhật nhãn hiệu';
      $this->data['content'] ='admin/brand/update';
      $this->render('layouts/admin_layout',$this->data);
      // Action update
      if(isset($_REQUEST['btnUpdate'])){
        $data_update=[
          'TENHANG' => $_POST['TENHANG'],
          // 'MAHANGSX' => $_POST['MAHANGSX'],
        ];
        $result = $this->__brandModel->updateData($id,$data_update);
        if($result == "true"){
          echo "
              <script>
                Swal.fire({
                  icon: 'success',
                  title: 'Cập nhật thành công!',
                  showConfirmButton: true,
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.assign('"._WEB_ROOT."/admin\/brand"."')
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
      $result = $this->__brandModel->destroy($id);
      echo $result;
      if($result == "true"){
        header("location:"._WEB_ROOT."/admin/brand");
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
