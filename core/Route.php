<?php
  class Route {
    function handleRoute($url){
      global $routes;
      unset($routes['default_controller']);
      unset($routes['default_action']);
      $url = trim($url,'/');
      $handleUrl = $url;
      if(!empty($routes)){
        foreach($routes as $key => $value){
          if(preg_match('~'.$key.'~is',$url)){
            $handleUrl = preg_replace('~'.$key.'~is',$value, $url);
          }
        }
      }
      return $handleUrl;
    }
  }
?>