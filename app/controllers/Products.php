<?php
  class Products extends Controller {
    public $data = [];
    private $__productModel;
    private $__categoryModel;
    public function __construct(){
      $this->__productModel = $this->model('ProductModel');
      $this->__categoryModel = $this->model('CategoryModel');
      $this->__brandModel = $this->model('BrandModel');
    }
    public function index(){
      //pagination
      $item_per_page = 9;
      $current_page = !empty($_GET['page'])? $_GET['page'] : 1;
      $offset = ($current_page -1)*$item_per_page;
      $string_limit=$offset.",".$item_per_page;
      $sum_products= $this->__productModel->getSumProducts()[0][0];
      $sum_page = ceil($sum_products / $item_per_page);
      $data = $this->__productModel->getAll(['*'],[],$string_limit);
      $category = $this->__categoryModel->getAll();
      $brand = $this->__brandModel->getAll();
      $title = "Tất cả sản phẩm";
      if(isset($_REQUEST['btnSearch'])){
        $price = isset($_POST['price']) ? $_POST['price'] : "";
        switch ($price) {
          case 1:
              $string_price = " < 200000";
              break;
          case 2:
              $string_price = "BETWEEN 200000 AND 500000 ";
              break;
          case 3:
              $string_price = "BETWEEN 500000 AND 1000000";
              break;
          case 4:
              $string_price = "BETWEEN 1000000 AND 3000000";
              break;
          case 5:
              $string_price = " > 3000000";
              break;
          default:
              $string_price = "";

        }
        $sort = isset($_POST['sort']) ? $_POST['sort'] : "";
        if (isset($_POST['brand'])) {
          $string_brand = $_POST['brand'];
        }
        $data_filter = [
          "GIA" => $string_price,
          "MAHANGSX" => $string_brand,
        ];
        $orderby = ['GIA',$sort];
        $data = $this->__productModel->getFilterProduct($data_filter,$orderby);
        // print_r($result_filter);
        $title = "Sản phẩm";
        $this->data['sub_content'] = [
          'title' => $title,
          'product_list' => $data,
          'category_list' => $category,
          'brand_list' => $brand,

        ];
        $this->data['title'] = $title;
        $this->data['content'] = 'client/products/list';
        $this->render('layouts/client_layout',$this->data);

      }else{
        $this->data['sub_content'] = [
          'title' => $title,
          'product_list' => $data,
          'category_list' => $category,
          'brand_list' => $brand,
          'current_page' => $current_page,
          'sum_page' => $sum_page,
        ];
        $this->data['title'] = $title;
        $this->data['content'] = 'client/products/list';
        $this->render('layouts/client_layout',$this->data);
      }
      //

    }
    public function detail($id=0){
      $data = $this->__productModel->getDetail($id);
      $view_update = [
        'VIEW' => $data['VIEW'] +1,
      ];
      $this->__productModel->updateData($id,$view_update);
      $siblingProduct = $this->__productModel->getByCategoryId($data['MALOAI']);
      $this->data['sub_content']= [
        'title' => 'Chi tiết sản phẩm',
        'product' => $data,
        'siblingProducts' => $siblingProduct,
      ];
      $this->data['title'] = 'Chi tiết sản phẩm';
      $this->data['content'] ='client/products/detail';
      $this->render('layouts/client_layout',$this->data);
    }
    public function category($id=0){
      $data_category = $this->__categoryModel->getById($id);
      $category = $this->__categoryModel->getAll();
      $data = $this->__productModel->getByCategoryId($id);
      $brand = $this->__brandModel->getAll();
      //Action filter
      if(isset($_REQUEST['btnSearch'])){
        $price = isset($_POST['price']) ? $_POST['price'] : "";
        switch ($price) {
          case 1:
              $string_price = " < 200000";
              break;
          case 2:
              $string_price = "BETWEEN 200000 AND 500000 ";
              break;
          case 3:
              $string_price = "BETWEEN 500000 AND 1000000";
              break;
          case 4:
              $string_price = "BETWEEN 1000000 AND 3000000";
              break;
          case 5:
              $string_price = " > 3000000";
              break;
          default:
              $string_price = "";

        }
        $sort = isset($_POST['sort']) ? $_POST['sort'] : "";
        if (isset($_POST['brand'])) {
          $string_brand = $_POST['brand'];
        }
        $data_filter = [
          "MALOAI" => $data_category['MALOAI'],
          "GIA" => $string_price,
          "MAHANGSX" => $string_brand,
        ];
        $orderby = ['GIA',$sort];
        $data = $this->__productModel->getFilterProduct($data_filter,$orderby);
        // print_r($result_filter);
        $title = "Sản phẩm";
        $this->data['sub_content'] = [
          'title' => $data_category['TENLOAI'],
          'products' => $data,
          'category_list' => $category,
          'brand_list' => $brand,
        ];
        $this->data['title'] = $title;
        $this->data['content'] = 'client/products/category';
        $this->render('layouts/client_layout',$this->data);

      }else{
        $this->data['sub_content']= [
          'title' => $data_category['TENLOAI'],
          'products' => $data,
          'category_list' => $category,
          'brand_list' => $brand,
        ];
        $this->data['title'] = $data_category['TENLOAI'];
        $this->data['content'] ='client/products/category';
        $this->render('layouts/client_layout',$this->data);
      }

    }

  }