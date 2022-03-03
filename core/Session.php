<?php
  class Session {
    // public function __construct(){
    //   if(!isset($_SESSION)){
    //     session_start();
    //   }
    // }
    public static function set($key, $val) {
      $_SESSION['$key'] = $val;
    }
    public static function get($key) {
      if(isset($_SESSION['$key'])){
        return $_SESSION['$key'];
      }else{
        return false;
      }
    }
    public static function checkLoginAdmin(){
      if(empty(self::get('admin'))){
        header("location:"._WEB_ROOT."/login");
      }
    }
    public static function destroy(){
      session_destroy();
    }
    public static function unset($key) {
      session_unset($key);
    }
  }
?>