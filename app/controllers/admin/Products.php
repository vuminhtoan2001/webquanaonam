<?php
  class Products extends Controller {
    public $data = [];
    public function __construct(){
      Session::checkLoginAdmin();
      $this->__productModel = $this->model('ProductModel');
    }
    public function index() {
      $data = $this->__productModel->getAll();
      $this->data['content'] ='admin/products/products';
      $this->data['sub_content'] = [
        'products' => $data,
        'nameTable' => 'Bảng sản phẩm'
      ];
      $this->data['title'] = 'Admin product page';
      $this->render('layouts/admin_layout',$this->data);
    }
    public function form_add(){
      $categoryModel = $this->model('CategoryModel');
      $category = $categoryModel->getAll();
      $brandModel = $this->model('BrandModel');
      $brand = $brandModel->getAll();
      $this->data['sub_content']= [
        'title' => 'Thêm sản phẩm',
        'category' => $category,
        'brand' => $brand,
      ];
      $this->data['title'] = 'Admin thêm sản phẩm';
      $this->data['nameTable'] = 'Thêm sản phẩm';
      $this->data['content'] ='admin/products/add';
      $this->render('layouts/admin_layout',$this->data);

      if(isset($_REQUEST['btnGhiLai'])){
        if($this->__productModel->getDetail($_POST['MASP'])){
          echo "
            <script>
              (Swal.fire({
                icon: 'error',
                title: 'Lỗi dữ liệu...',
                text: 'Mã sản phẩm đã tồn tại!',
              }))()
            </script>
            ";
        }else {
          if (isset($_FILES['ANH'])){
            $FileName= $_FILES['ANH']['name'];
            $filetmp= $_FILES['ANH']['tmp_name'];
            if(empty($errors)==true){
                move_uploaded_file($filetmp,"public/DataUpload/".$FileName);
            }else{
                echo "Upload dữ liệu không thành công !";
            }
          }
          $insert=[
            'MASP' => $_POST['MASP'],
            'TENSP' => $_POST['TENSP'],
            'GIA' => $_POST['GIA'],
            'GIA_SALE' => $_POST['GIA_SALE'],
            'SOLUONG' => $_POST['SOLUONG'],
            'NGAYNHAP' => $_POST['NGAYNHAP'],
            'ANH'=> $_FILES['ANH']['name'],
            'MOTA' => $_POST['MOTA'],
            'MAUSAC' => $_POST['MAUSAC'],
            'VIEW' => 0,
            'CHATLIEU' => $_POST['CHATLIEU'],
            'MAHANGSX' => $_POST['MAHANGSX'],
            'MALOAI' => $_POST['MALOAI'],
          ];
          $result =$this->__productModel->create($insert);
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
                      window.location.assign('"._WEB_ROOT."/admin\/products"."')
                    }
                  })
                )()
              </script>
            ";
            // header("location:"._WEB_ROOT."/admin/products");
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
      $product = $this->__productModel->getProductUpdate($id);
      $categoryModel = $this->model('CategoryModel');
      $category = $categoryModel->getAll();
      $brandModel = $this->model('BrandModel');
      $brand = $brandModel->getAll();
      $this->data['sub_content']= [
        'nameTable' => 'Sửa thông tin sản phẩm',
        'category' => $category,
        'brand' => $brand,
        'product' => $product,
      ];
      $this->data['title'] = 'Admin cập nhật sản phẩm';
      $this->data['content'] ='admin/products/update';
      $this->render('layouts/admin_layout',$this->data);
      // Action update
      if(isset($_REQUEST['btnUpdate'])){
        if (isset($_FILES['ANH'])){
          $FileName= $_FILES['ANH']['name'];
          $filetmp= $_FILES['ANH']['tmp_name'];
          if(!empty($FileName)){
              move_uploaded_file($filetmp,"public/DataUpload/".$FileName);
          }else{
            $data = $this->__productModel->getDetail($id);
            $_FILES['ANH']['name'] = $data['ANH'];
          }
        }
        $data_update=[
          'TENSP' => $_POST['TENSP'],
          'GIA' => $_POST['GIA'],
          'GIA_SALE' => $_POST['GIA_SALE'],
          'SOLUONG' => $_POST['SOLUONG'],
          'NGAYNHAP' => $_POST['NGAYNHAP'],
          'ANH'=> $_FILES['ANH']['name'],
          'MOTA' => $_POST['MOTA'],
          'MAUSAC' => $_POST['MAUSAC'],
          'VIEW' => 0,
          'CHATLIEU' => $_POST['CHATLIEU'],
          'MAHANGSX' => $_POST['MAHANGSX'],
          'MALOAI' => $_POST['MALOAI'],
        ];
        $result = $this->__productModel->updateData($id,$data_update);
        if($result == "true"){
          echo "
              <script>
                Swal.fire({
                  icon: 'success',
                  title: 'Cập nhật thành công',
                  showConfirmButton: true,
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.assign('"._WEB_ROOT."/admin\/products"."')
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
      $result = $this->__productModel->destroy($id);
      echo $result;
      if($result == "true"){
        header("location:"._WEB_ROOT."/admin/products");
      }else{
        echo "
          <script>
            alert('Xóa thất bại!')
          </script>
        ";
      }


      //  header("location:"._WEB_ROOT."/admin/products");
    }

  }
?>