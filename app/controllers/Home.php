<?php
  class Home extends Controller{
    public $model_home;
    public $model_product;
    public function __construct(){
      $this->model_home = $this->model('HomeModel');
    }
    public function index(){
      $this->model_product = $this->model('ProductModel');
      $newProduct = $this->model_product->getAll(
        ['*'],
        [ 'column' => 'NGAYNHAP','type' => 'desc'],
        5
      );
      $hotProducts = $this->model_product->getSellBest();
      $this->data['sub_content']=[
        'newProducts' => $newProduct,
        'hotProducts' => $hotProducts,
      ];
      $this->data['content'] = 'client/home/index';
      $this->render('layouts/client_layout', $this->data);
    }

  }