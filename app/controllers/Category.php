<?php
  class Category extends Controller {
    public $data = [];
    private $categoryModel;
    public function __construct(){
      $this->categoryModel = $this->model('CategoryModel');
    }
    public function index() {
      $data = $this->categoryModel->getAll(
        ['TENLOAI'],
        ['MALOAI','asc'],
        3
      );
      $this->data['content']='products/category';
      $this->data['sub_content'] =[
        'title' => 'Danh mục sản phẩm',
        'categorys' => $data,
      ];
      $this->render('layouts/client_layout',$this->data);
    }

    public function detail($id){
      $category = $this->categoryModel->getById($id);
      $data =$this->categoryModel->getProductsById($id);
      $this->data['content'] = 'products/category';
      $this->data['sub_content']=[
        'products' => $data,
        'category' => $category
      ];
      $this->render('layouts/client_layout',$this->data);
    }


  }
?>