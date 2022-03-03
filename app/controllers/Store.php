<?php
  class Store extends Controller {
    public $data = [];
    public function index() {
      $this->data['sub_content']=[

      ];
      $this->data['title'] = 'Hệ thống cửa hàng';
      $this->data['content'] = 'client/store/store';
      $this->render('layouts/client_layout', $this->data);
    }
  }
?>