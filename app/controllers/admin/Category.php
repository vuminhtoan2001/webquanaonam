<?php
  class Category extends Controller {
    public $data = [];
    public function __construct(){
      Session::checkLoginAdmin();
      $this->__categoryModel = $this->model('CategoryModel');
    }
    public function index() {
      $data = $this->__categoryModel->getAll();
      $this->data['content'] ='admin/category/list';
      $this->data['sub_content'] = [
        'category' => $data,
        'nameTable' => 'Bảng danh mục'
      ];
      $this->data['title'] = 'Admin category page';
      $this->render('layouts/admin_layout',$this->data);
    }
    public function form_add(){
      $this->data['sub_content']= [
        'nameTable' => 'Thêm danh mục'
      ];
      $this->data['title'] = 'Admin thêm danh mục';
      $this->data['content'] ='admin/category/add';
      $this->render('layouts/admin_layout',$this->data);
      if(isset($_REQUEST['btnGhiLai'])){
        if($this->__categoryModel->getDetail($_POST['MALOAI'])){
          echo "
            <script>
              (Swal.fire({
                icon: 'error',
                title: 'Lỗi dữ liệu...',
                text: 'Mã danh mục đã tồn tại!',
              }))()
            </script>
            ";
        }else {
          $insert=[
            'MALOAI' => $_POST['MALOAI'],
            'TENLOAI' => $_POST['TENLOAI'],
          ];
          $result =$this->__categoryModel->create($insert);
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
                          window.location.assign('"._WEB_ROOT."/admin\/category"."')
                        }
                      })
                    )()
                  </script>
                ";
            // header("location:"._WEB_ROOT."/admin/categorys");
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
      $category = $this->__categoryModel->getDetail($id);
      $this->data['sub_content']= [
        'nameTable' => 'Sửa thông tin danh mục',
        'category' => $category,
      ];
      $this->data['title'] = 'Admin cập nhật danh mục';
      $this->data['content'] ='admin/category/update';
      $this->render('layouts/admin_layout',$this->data);
      // Action update
      if(isset($_REQUEST['btnUpdate'])){
        $data_update=[
          'TENLOAI' => $_POST['TENLOAI'],
        ];
        $result = $this->__categoryModel->updateData($id,$data_update);
        if($result == "true"){
          echo "
              <script>
                Swal.fire({
                  icon: 'success',
                  title: 'Cập nhật thành công!',
                  showConfirmButton: true,
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.assign('"._WEB_ROOT."/admin\/category"."')
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
      $result = $this->__categoryModel->destroy($id);
      echo $result;
      if($result == "true"){
        header("location:"._WEB_ROOT."/admin/category");
      }else{
        echo "
          <script>
            alert('Xóa thất bại!')
          </script>
        ";
      }


      //  header("location:"._WEB_ROOT."/admin/categorys");
    }

  }
?>
