<?php
  class News extends Controller {
    public $data = [];
    public function __construct(){
      Session::checkLoginAdmin();
      $this->__newsModel = $this->model('NewsModel');
    }
    public function index() {
      $data = $this->__newsModel->getAll();
      $this->data['content'] ='admin/news/news';
      $this->data['sub_content'] = [
        'news' => $data,
        'nameTable' => 'Danh sách tin tức'
      ];
      $this->data['title'] = 'Admin news page';
      $this->render('layouts/admin_layout',$this->data);
    }
    public function form_add(){
      $this->data['sub_content'] = [
        'nameTable' => 'Thêm bảng tin'
      ];
      $this->data['title'] = 'Admin thêm bảng tin';
      $this->data['content'] ='admin/news/add';
      $this->render('layouts/admin_layout',$this->data);

      if(isset($_REQUEST['btnGhiLai'])){
        if($this->__newsModel->getDetail($_POST['MATIN'])){
          echo "
            <script>
              (Swal.fire({
                icon: 'error',
                title: 'Lỗi dữ liệu...',
                text: 'Mã tin tức đã tồn tại!',
              }))()
            </script>
            ";

        }else{
          if (isset($_FILES['ANH'])){
            $FileName1= $_FILES['ANH']['name'];
            $filetmp1= $_FILES['ANH']['tmp_name'];
            move_uploaded_file($filetmp1,"public/DataUpload/tintuc/".$FileName1);
            $FileName2= $_FILES['ANH2']['name'];
            $filetmp2= $_FILES['ANH2']['tmp_name'];
            move_uploaded_file($filetmp2,"public/DataUpload/tintuc/".$FileName2);
            $FileName3= $_FILES['ANH3']['name'];
            $filetmp3= $_FILES['ANH3']['tmp_name'];
            move_uploaded_file($filetmp3,"public/DataUpload/tintuc/".$FileName3);
          }
          if(empty($_POST['NGAYDANG'])){
            $_POST['NGAYDANG'] = date("y/m/d");
          }
          $insert=[
            'MATIN' => $_POST['MATIN'],
            'TIEUDE' => $_POST['TIEUDE'],
            'ANH'=> $_FILES['ANH']['name'],
            'ANH2'=> $_FILES['ANH2']['name'],
            'ANH3'=> $_FILES['ANH3']['name'],
            'NOIDUNG' => $_POST['NOIDUNG'],
            'NDNGAN' => $_POST['NDNGAN'],
            'TIEUDE2' => $_POST['TIEUDE2'],
            'ND2' => $_POST['ND2'],
            'TIEUDE3' => $_POST['TIEUDE3'],
            'ND3' => $_POST['ND3'],
            'NGAYDANG' => $_POST['NGAYDANG'],
            'LOAITIN' => $_POST['LOAITIN'],
          ];
          $result =$this->__newsModel->create($insert);
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
                      window.location.assign('"._WEB_ROOT."/admin\/news"."')
                    }
                  })
                )()
              </script>
            ";
            // header("location:"._WEB_ROOT."/admin/news");
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
      $this->data['sub_content']= [
        'nameTable' => 'Cập nhật tin tức',
        'news' => $this->__newsModel->getDetail($id)
      ];
      $this->data['title'] = 'Admin cập nhật tin tức';
      $this->data['content'] ='admin/news/update';
      $this->render('layouts/admin_layout',$this->data);
      // Action Update
      if(isset($_REQUEST['btnUpdate'])){
        $data = $this->__newsModel->getDetail($id);
        if(isset($_FILES['ANH'])){
          $FileName1= $_FILES['ANH']['name'];
          $filetmp1= $_FILES['ANH']['tmp_name'];
          if(!empty($FileName1)){
            move_uploaded_file($filetmp1,"public/DataUpload/tintuc/".$FileName1);
          }else {
            $FileName1 = $data['ANH'];
          }
        }
        if(isset($_FILES['ANH2'])){
          $FileName2= $_FILES['ANH2']['name'];
          $filetmp2= $_FILES['ANH2']['tmp_name'];
          if(!empty($FileName2)){
            move_uploaded_file($filetmp2,"public/DataUpload/tintuc/".$FileName2);
          }else {
            $FileName2 = $data['ANH2'];
          }
        }
        if(isset($_FILES['ANH3'])){
          $FileName3= $_FILES['ANH3']['name'];
          $filetmp3= $_FILES['ANH3']['tmp_name'];
          if(!empty($FileName3)){
            move_uploaded_file($filetmp3,"public/DataUpload/tintuc/".$FileName3);
          }else {
            $FileName3 = $data['ANH3'];
          }
        }
        if(empty($_POST['NGAYDANG'])){
          $_POST['NGAYDANG'] = date("y/m/d");
        }
        $data_update=[
          'TIEUDE' => $_POST['TIEUDE'],
          'ANH'=> $FileName1,
          'ANH2'=> $FileName2,
          'ANH3'=> $FileName3,
          'NOIDUNG' => $_POST['NOIDUNG'],
          'NDNGAN' => $_POST['NDNGAN'],
          'TIEUDE2' => $_POST['TIEUDE2'],
          'ND2' => $_POST['ND2'],
          'TIEUDE3' => $_POST['TIEUDE3'],
          'ND3' => $_POST['ND3'],
          'NGAYDANG' => $_POST['NGAYDANG'],
          'LOAITIN' => $_POST['LOAITIN'],
        ];
        $result = $this->__newsModel->updateData($id,$data_update);
          // echo $result;
          // die();
        if($result == "true"){
          echo "
              <script>
                Swal.fire({
                  icon: 'success',
                  title: 'Cập nhật thành công',
                  showConfirmButton: true,
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.assign('"._WEB_ROOT."/admin\/news"."')
                  }
                })
              </script>
            ";
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

    public function delete($id){
      $result =$this->__newsModel->destroy($id);
      echo $result;
      if($result == "true"){
        header("Location:"._WEB_ROOT."/admin/news");
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

<!-- <script src = "https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.min.js"></script> -->