<?php
  class Connection {
    private static $conn = null, $instance= null;
    private function __construct($db_Config) {
      $con = mysqli_connect($db_Config['host'],$db_Config['user'],$db_Config['pass'],$db_Config['db']);
      if (!$con) {
        $err['message'] = 'Lỗi kết nỗi cơ sở dữ liệu';
        App::$app->loadError('database', $err);
        die();
      }
        mysqli_set_charset($con,"utf8");
        self::$instance = $con;
    }
    public static function connect($db_Config){
      if(self::$conn == null){
        $connection = new Connection($db_Config);
        self::$conn = self::$instance;
      }
      return self::$conn;
    }
  }
?>