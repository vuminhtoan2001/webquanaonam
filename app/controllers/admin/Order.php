<?php
  class Order extends Controller {
    public $data = [];
    public function __construct(){
      Session::checkLoginAdmin();
      $this->__orderModel = $this->model('OrderModel');
    }
    public function index() {
      $data = $this->__orderModel->getAll();
      $order_detail = $this->__orderModel->getDetailOrder();
      $this->data['content'] ='admin/order/list';
      $this->data['sub_content'] = [
        'order' => $data,
        'orderDetails' => $order_detail,
        'nameTable' => 'Danh sách hóa đơn'
      ];
      $this->data['title'] = 'Admin orders page';

      $this->render('layouts/admin_layout',$this->data);
    }
    public function form_update($id){
      $order = $this->__orderModel->getDetail($id);
      $this->data['sub_content']= [
        'nameTable' => 'Sửa thông tin hóa đơn',
        'order' => $order,
      ];
      $this->data['title'] = 'Admin cập nhật hóa đơn';
      $this->data['content'] ='admin/order/update';
      $this->render('layouts/admin_layout',$this->data);
      // Action Update
      if(isset($_REQUEST['btnUpdate'])){
        $data_update=[
          'name' => $_POST['name_cus'],
          'email' => $_POST['email_cus'],
          'phone' => $_POST['phone_cus'],
          'address' => $_POST['address'],
          'ngaydathang' => $_POST['ngaydathang'],
          'thanhtoan' => $_POST['thanhtoan'],
        ];
        $result = $this->__orderModel->updateData($id,$data_update);
        if($result == "true"){
          echo "
              <script>
                Swal.fire({
                  icon: 'success',
                  title: 'Cập nhật thành công',
                  showConfirmButton: true,
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.assign('"._WEB_ROOT."/admin\/order"."')
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
      $this->__orderModel->destroy($id);
      $this->__orderModel->destroyOderDetail($id);
       header("location:"._WEB_ROOT."/admin/order");
    }

    public function handleChecked($id) {
      $data=[
        'status' => 1,
      ];
      $this->__orderModel->updateData($id, $data);
      header("location:"._WEB_ROOT."/admin/order");

    }
    public function destroyChecked($id) {
      $data=[
        'status' => 0,
      ];
      $this->__orderModel->updateData($id, $data);
      header("location:"._WEB_ROOT."/admin/order");
    }

  }
?>