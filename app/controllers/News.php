<?php
  class News extends Controller {
    public $data = [];
    private $newsModel;

    public function __construct(){
      $this->newsModel = $this->model('NewsModel');
    }

    public function index() {
      //pagination
      $item_per_page = 4;
      $current_page = !empty($_GET['page'])? $_GET['page'] : 1;
      $offset = ($current_page -1)*$item_per_page;
      $string_limit=$offset.",".$item_per_page;
      $sum_products= $this->newsModel->getSumNews()[0][0];
      $sum_page = ceil($sum_products / $item_per_page);
      $data = $this->newsModel->getAll(['*'],[],$string_limit);
      $type_news = $this->newsModel->getTypeNews();
      $this->data['sub_content'] = [
        'title' => 'Tin tức',
        'news_list' => $data,
        'type_news' => $type_news,
        'current_page' => $current_page,
        'sum_page' => $sum_page,
      ];
      $this->data['title'] = "Tin tức";
      $this->data['content'] = 'client/news/list';
      $this->render('layouts/client_layout',$this->data);
    }
    public function detail($id=0){
      $data = $this->newsModel->getDetail($id);
      $new_news = $this->newsModel->newNews();
      $this->data['sub_content']= [
        'title' => 'Chi tiết sản phẩm',
        'news' => $data,
        'newnews' => $new_news
      ];
      $this->data['title'] = 'Chi tiết sản phẩm';
      $this->data['content'] ='client/news/detail';
      $this->render('layouts/client_layout',$this->data);
    }
    public function category($id=0){
      $news_category = $this->newsModel->getByCategory($id);
      $type_news = $this->newsModel->getTypeNews();
      $this->data['sub_content'] = [
        'title' => $news_category[0]['LOAITIN'],
        'news_list' => $news_category,
        'type_news' => $type_news,
      ];
      $this->data['title'] = $news_category[0]['LOAITIN'];
      $this->data['content'] ='client/news/category';
      $this->render('layouts/client_layout',$this->data);


    }


  }
?>