<?php
  class Database {
    private $__conn;
    public function __construct(){
      global $db_Config;
      $this->__conn = Connection::connect($db_Config);
      // var_dump($this->__conn);
    }
    public function query($sql){
      if($sql){
        $result = false;
        if(mysqli_query($this->__conn,$sql)){
          $result = true;
        }
        return json_encode($result);
      }else{
        $err['message'] = 'Không có câu lệnh truy vấn!';
        App::$app->loadError('database', $err);
        die();
      }
    }
    public function getData($sql,$data){
        $query = mysqli_query($this->__conn,$sql);
        if(mysqli_num_rows($query)>0){
          while($row = mysqli_fetch_array($query)){
            array_push($data, $row);
          }
        }
      return $data;
    }
    public function getOneData($sql){
      $data=null;
      $query = mysqli_query($this->__conn,$sql);
      if($query){
        if(mysqli_num_rows($query)>0){
          $data = mysqli_fetch_array($query);
        }
      }
      return $data;
    }

  }
?>