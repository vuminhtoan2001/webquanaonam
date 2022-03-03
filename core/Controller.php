<?php
  class Controller {
    public function model($modelName) {
      if(file_exists(_DIR_ROOT.'/app/models/'.$modelName.'.php')){
        require_once _DIR_ROOT.'/app/models/'.$modelName.'.php';
        if(class_exists($modelName)){
          $modelName = new $modelName();
          return $modelName;
        }
      }
      return false;
    }

    public function render($viewName, $data = []){
      if($data){
        extract($data);
      }
      if(file_exists(_DIR_ROOT.'/app/views/'.$viewName.'.php')){
        require_once _DIR_ROOT.'/app/views/'.$viewName.'.php';
      }
    }


  }

?>