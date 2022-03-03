<?php
  class Model {
    protected $conn;
    public function __construct(){
      $this->conn = new Database();
    }
    public function all(
      $table, $select, $orderBys, $limit
      )
    {
      $columns = implode(',',$select);
      $orderBySting = implode(' ',$orderBys);
      if(!empty($limit)){
        $limitString = " LIMIT ${limit}";
      }else{
        $limitString = $limit;
      }
      if($orderBySting){
        $sql = "SELECT ${columns} FROM ${table} ORDER BY ${orderBySting} ${limitString} ";
      }else{
        $sql = "SELECT ${columns} FROM ${table} ${limitString} ";
      }
      $data = $this->conn->getData($sql,[]);
      return $data;
    }
    public function findById($table,$primaryKeyName, $id){
      $sql = "SELECT * FROM ${table} WHERE ${primaryKeyName} = '${id}' ";
      return $this->conn->getOneData($sql);
    }
    public function findByNotId($table,$columnName, $id){
      $sql = "SELECT * FROM ${table} WHERE ${columnName} = '${id}' ";
      return $this->conn->getData($sql,[]);
    }
    //Insert data
    public function store($table, $data = []){
      $stringColumns = implode(', ',array_keys($data));
      $values = array_values($data);
      $stringValues = implode(', ',array_map(function($value){
        return "'".$value."'";
      },$values));
      $sql = "INSERT INTO ${table} ( ${stringColumns})
              VALUES ( ${stringValues})";
      return $this->conn->query($sql);
    }
    public function update($table,$name_id, $id, $data){
      $dataSet =[];
      foreach($data as $key => $value){
        array_push($dataSet, "${key} = '${value}' ");
      }
      $dataSetString = implode(', ', $dataSet);

      $sql = "UPDATE ${table} SET ${dataSetString} WHERE ${name_id} = '${id}'";
      return $this->conn->query($sql);
    }
    public function filter($table,$data,$orderby,$limit){
      if($orderby[1] !== ""){
        $orderByString = implode(' ',$orderby);
      }else{
        $orderByString = "";
      }
      if(!empty($limit)){
        $limitString = " LIMIT ${limit}";
      }else{
        $limitString = $limit;
      }
      $dataSet =[];
      foreach($data as $key => $value){
        if($value !== ""){
          if($key == "GIA"){
            array_push($dataSet, "${key}  ${value} ");
          }else{
            array_push($dataSet, "${key} = '${value}' ");
          }
        }
      }
      $dataSetString = implode('AND ', $dataSet);
      if(!empty($dataSetString)){
        $dataSetString  = "WHERE ".$dataSetString;
      }
      if($orderByString){
        $sql = "SELECT * FROM ${table} ${dataSetString} ORDER BY ${orderByString}
        ${limitString}";
      }else{
        $sql = "SELECT * FROM ${table} ${dataSetString} ${limitString}";
      }

      // exit();
      $data = $this->conn->getData($sql,[]);
      return $data;
    }
    public function filter_Amount($table,$data,$orderby){
      if($orderby[1] !== ""){
        $orderByString = implode(' ',$orderby);
      }else{
        $orderByString = "";
      }

      $dataSet =[];
      foreach($data as $key => $value){
        if($value !== ""){
          if($key == "GIA"){
            array_push($dataSet, "${key}  ${value} ");
          }else{
            array_push($dataSet, "${key} = '${value}' ");
          }
        }
      }
      $dataSetString = implode('AND ', $dataSet);
      if(!empty($dataSetString)){
        $dataSetString  = "WHERE ".$dataSetString;
      }
      if($orderByString){
        $sql = "SELECT COUNT(MASP) FROM ${table} ${dataSetString} ORDER BY ${orderByString}
        ";
      }else{
        $sql = "SELECT COUNT(MASP) FROM ${table} ${dataSetString} ";
      }
      $data = $this->conn->getData($sql,[]);
      return $data;
    }
    public function delete($table,$id_name, $id){
      $sql = "DELETE FROM ${table} WHERE ${id_name} = '${id}'";
      return $this->conn->query($sql);
    }
    public function getBestSell(){
      $sql = "SELECT sanpham.MASP,sanpham.TENSP,sanpham.ANH,sanpham.GIA,
                    SUM(oderdetail.soluong) as xuatsoluong FROM oderdetail
                    JOIN sanpham ON sanpham.MASP=oderdetail.masp
                    GROUP BY oderdetail.masp ORDER BY xuatsoluong DESC LIMIT 5 OFFSET 0";
      $data = $this->_query($sql,[]);
      return $data;
    }
    public function getUpdateProduct($id){
      $sql = "SELECT hangsx.TENHANG, loaisp.TENLOAI,sanpham.* FROM hangsx
              JOIN sanpham ON sanpham.MAHANGSX=hangsx.MAHANGSX
              JOIN loaisp ON loaisp.MALOAI = sanpham.MALOAI
              WHERE sanpham.MASP = '${id}' ";
      $data = $this->conn->getOneData($sql);
      return $data;
    }
    public function getByForeignKey($table,$id_name, $id){
      $sql = "SELECT * FROM ${table} WHERE ${id_name} = '${id}' ";
      $data = $this->conn->getData($sql,[]);
      return $data;
    }

    public function _query($sql){
      $data = $this->conn->getData($sql,[]);
      return $data;
    }
  }
?>