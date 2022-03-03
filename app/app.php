<?php
  class App {
    private $__controller, $__action, $__params, $__routes;
    static public $app;
    function __construct() {
      self::$app = $this;
      global $routes;
      $this->__routes = new Route();
      if(!empty($routes['default_controller'])){
        $this->__controller = $routes['default_controller'];
      }
      if(!empty($routes['default_action'])){
        $this->__action = $routes['default_action'];
      }
      $this->__params = [];
      $this ->handleUrl();
    }

    function getUrl() {
      if(!empty($_SERVER['PATH_INFO'])){
        $url = $_SERVER['PATH_INFO'];
      }else{
        $url = '/';
      }
      return $url;
    }

    function handleUrl(){
      $url = $this->getUrl();
      $url = $this->__routes->handleRoute($url);
      $urlArr = array_filter(explode('/',$url));
      $urlArr = array_values($urlArr);
      //Handle : Admin->controller->action
      $urlController ='';
      if(!empty($urlArr)){
        foreach($urlArr as $key=>$item){
          $urlController .= $item.'/';
          $fileController = rtrim($urlController,'/');
          $fileArr = explode('/', $fileController);
          $fileArr[count($fileArr)-1] = ucfirst($fileArr[count($fileArr)-1]);
          $fileController = implode('/',$fileArr);
          if(!empty($urlArr[$key-1])){
          unset($urlArr[$key-1]);
          }
          if(file_exists('app/controllers/'.$fileController.'.php')){
            $urlController = $fileController;
            break;
          }
        }
      }
      $urlArr = array_values($urlArr);

      // Handle Controller
      if(!empty($urlArr[0])){
        $this->__controller =ucfirst($urlArr[0]);
      }else{
        $this->__controller =ucfirst($this->__controller);
      }
      if(empty($urlController)){
        $urlController = $this->__controller;
      }
      if(file_exists('app/controllers/'.($urlController).'.php')){
        require_once('controllers/'.($urlController).'.php');
        $this->__controller = new $this->__controller();
        unset($urlArr[0]);
      }else{
        $this->loadError();
      }

      // Handle __action
      if(!empty($urlArr[1])){
        $this->__action =$urlArr[1];
        unset($urlArr[1]);
      }else{
        $this->__action = $this->__action;
      }
      if(method_exists($this->__controller, $this->__action)){
        // Handle __params
        $this->__params = array_values($urlArr);
        call_user_func_array([$this->__controller, $this->__action],$this->__params);
      }else{
        $this->loadError();
      }
    }

    function loadError($name = '404', $data = []){
      extract($data);
      require_once 'errors/'.$name.'.php';
    }


  }

?>
