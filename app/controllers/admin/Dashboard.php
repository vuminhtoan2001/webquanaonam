<?php
  class Dashboard extends Controller {
    public $data = [];
    public function index() {
      Session::checkLoginAdmin();
      $this->__productModel = $this->model('ProductModel');
      $view = $this->__productModel->getView();
      $this->__orderModel = $this->model('OrderModel');
      $sale = $this->__orderModel->getSale();
      $date = getdate();
      $day = $date['mday'];
      $mon = $date['mon'];
      $year = $date['year'];
      $string_date = "'".$date['year']."-".$date['mon']."-".$date['mday']."'";
      $earning = $this->__orderModel->getEarning($string_date);
      $earning = (!empty($earning[0][0])) ? $earning[0][0] : 0;
      $this->__messageModel = $this->model('MessageModel');
      $message = $this->__messageModel->getAmountMessage();
      $recentOrder = $this->__orderModel->getAll(['*'],['id','DESC'],10);
      $recentCustomer = $this->__orderModel->getRecentCustomer();
      // print_r($recentOrder);
      // exit();
      $this->data['content'] ='admin/index';
      $this->data['sub_content'] = [
        "view" => $view[0][0],
        "sale" => $sale[0][0],
        "earning" => $earning,
        "message" => $message[0][0],
        "recentOrders" => $recentOrder,
        "recentCustomers" => $recentCustomer,
      ];
      $this->render('layouts/admin_layout',$this->data);
    }
  }
?>