<?php
  define('_DIR_ROOT',__DIR__);
  // Handle htpp root:
  if(!empty($_SERVER['HTPPS']) && $_SERVER['HTPPS'] == 'on'){
    $web_root = 'https://'.$_SERVER['HTTP_HOST'];
  }else{
    $web_root = 'http://'.$_SERVER['HTTP_HOST'];
  }
  $dir_root= str_replace('\\','/',_DIR_ROOT);
  $folder = str_replace(strtolower($_SERVER['CONTEXT_DOCUMENT_ROOT']),"",strtolower($dir_root));
  $web_root = $web_root.$folder;
  define('_WEB_ROOT',$web_root);

  //Auto import folder configs
  $config_dir = scandir('configs');
  if(!empty($config_dir)){
    foreach($config_dir as $item){
      if($item != '.' && $item != '..' && file_exists('configs/'.$item)){
        require_once('configs/'.$item);
      }
    }
  }
  //handleRoute
  require_once ('core/Route.php');
  //Session
  require_once ('core/Session.php');
  //Load app
  require_once ("app/app.php");
  // Check database config and load Database
  if(!empty($dbConfig['database'])){
    $db_Config = $dbConfig['database'];
    if(!empty($db_Config)){
      require_once('core/Connection.php');
      require_once('core/Database.php');
    }
  }
  //Load base Model
  require_once ('core/Model.php');
  // start session
  session_start();
  //Load base Controller
  require_once ('core/Controller.php');
?>