<?php
  class Logout extends Controller {
    public function index(){
      Session::destroy();
      header("location:"._WEB_ROOT);
    }
  }
?>