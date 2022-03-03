<?php
  class Cart extends Controller {
    public $data = [];
    public $tong=0;
    public $soluong=0;
    public function index() {
      $this->data['sub_content']=[];
      $this->data['title'] = 'Giỏ hàng';
      $this->data['content'] = 'client/cart/cart';
      $this->render('layouts/client_layout', $this->data);
    }
    public function Addtocart($id){
      $this->__productModel = $this->model('ProductModel');
      $row = $this->__productModel->getDetail($id);
      $MASP=$id;
      if($row["GIA_SALE"] > 0){
        $row["GIA"] = $row["GIA_SALE"];
      }
      if($row){
        if(isset($_SESSION["cart"])){
          if(isset($_SESSION["cart"]["$MASP"])){
              $_SESSION["cart"]["$MASP"]["qty"]+=1;
          }
          else{
              $_SESSION["cart"]["$MASP"]["qty"]=1;
          }
          $_SESSION["cart"]["$MASP"]["MASP"]=$row["MASP"];
          $_SESSION["cart"]["$MASP"]["TENSP"]=$row["TENSP"];
          $_SESSION["cart"]["$MASP"]["ANHSP"]=$row["ANH"];
          $_SESSION["cart"]["$MASP"]["GIATIEN"]=$row["GIA"];
          foreach($_SESSION["cart"] as $k=>$val){
              $this->soluong +=$val["qty"];
              $_SESSION["soluong"]=$this->soluong;
          }
          header("location:"._WEB_ROOT."/cart");
        }else{
          $_SESSION["cart"]["$MASP"]["qty"]=1;
          $_SESSION["cart"]["$MASP"]["MASP"]=$row["MASP"];
          $_SESSION["cart"]["$MASP"]["TENSP"]=$row["TENSP"];
          $_SESSION["cart"]["$MASP"]["ANHSP"]=$row["ANH"];
          $_SESSION["cart"]["$MASP"]["GIATIEN"]=$row["GIA"];
          foreach($_SESSION["cart"] as $k=>$val){
            $this->soluong+=$val["qty"];
              $_SESSION["soluong"]=$this->soluong;
          }
          header("location:"._WEB_ROOT."/cart");
        }
      }
      $this->data['sub_content']=[];
      $this->data['title'] = 'Giỏ hàng';
      $this->data['content'] = 'client/cart/addtocart';
      $this->render('layouts/client_layout', $this->data);
    }
    public function delete_cart($id){
      if(!isset($_SESSION['cart'])){
        header("location:"._WEB_ROOT);
        exit();
      }
      $key=isset($id)? $id:'';
      if($key){
        if(array_key_exists($key,$_SESSION['cart'])){

            $soluong=$_SESSION["soluong"]-$_SESSION['cart'][$key]['qty'];
            if($soluong == 0){
              $_SESSION["soluong"]="";
            }else{
              $_SESSION["soluong"]=$soluong;
            }
            unset($_SESSION['cart'][$key]);
        }
        header("location:"._WEB_ROOT."/cart");

      }

    }
    public function update_cart(){
      $_SESSION["cart"];
      foreach($_POST['qty'] as $k =>$v){
          $_SESSION['cart'][$k]['qty']=$v;
          $this->soluong += $_SESSION['cart'][$k]['qty'];
          $_SESSION["soluong"]=$this->soluong;
      }
      header("location:"._WEB_ROOT."/cart");

    }
    public function payment(){

      $this->__orderModel = $this->model('OrderModel');
      $idmax= $this->__orderModel->idMax();
      $idOrder=$idmax[0][0] +1;
      $hoten="";
      $diachi="";
      $phone="";
      $thanhtien=0;
      $tongtien=0;
      $email="";
      foreach($_SESSION["cart"]as $k => $v){
          $thanhtien=$v["qty"]*$v["GIATIEN"];
          $tongtien+=$thanhtien;
      }
      // render interface
      $this->data['sub_content']=[
        'tongtien' => $tongtien
      ];
      $this->data['title'] = 'Thanh toán';
      $this->data['content'] = 'client/cart/payment';
      $this->render('layouts/client_layout', $this->data);
      // Save Order
      if(isset($_REQUEST["save_dh"])){
          if(isset($_POST['cash'])){
            $thanhtoan=$_POST['cash'];
          }else if(isset($_POST['credit'])){
            $thanhtoan=$_POST['credit'];
          }
          $insert =[
            "id" => $idOrder,
            "name" =>$_POST["hoten"],
            "email" =>$_POST["email"],
            "address" =>$_POST["diachi"],
            "phone" =>$_POST["phone"],
            "ngaydathang"  => date("y/m/d"),
            "total" => $tongtien,
            "thanhtoan" => $thanhtoan,
            "status" => 0,
          ];
          if($_POST["hoten"]!="" && $_POST["email"]!="" && $_POST["diachi"]!="" && $_POST["phone"]!="" && $thanhtoan!=""){
              // $sql="INSERT INTO oder  VALUES('$hoten','$phone','$diachi','$email','$tongtien','$date','$thanhtoan')";
              // $ret1=false;
              $ret1 = $this->__orderModel->create($insert);
              foreach($_SESSION['cart'] as $k2 => $v2){
                $dataDetail=[
                  "id_order" => $idOrder,
                  "tensp"=>$v2['TENSP'],
                  "masp"=> $v2['MASP'],
                  "soluong"=>$v2['qty'],
                  "giatien"=>$v2['GIATIEN'],

                ];
                $ret2=$this->__orderModel->createOderDetail($dataDetail);
              }
              if($ret1){
                echo "<script>
                Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Đặt hàng thành công!',
                  showConfirmButton: false,
                  timer: 1500
                })
              </script>";
              }else{
                  echo "Không lưu được đơn hàng ";
              }
          }else{
            echo "<script>
            Swal.fire({
              icon: 'error',
              title: 'Đặt hàng không thành công!',
              text: 'Các trường thông tin không được để trống!',

            })
                  </script>";
          }
      }
    }
    public function single_cart($id){
      $this->__productModel = $this->model('ProductModel');
      $row = $this->__productModel->getDetail($id);
      $MASP=$id;
      if($row["GIA_SALE"] > 0){
        $row["GIA"] = $row["GIA_SALE"];
      }
      if($row){
        if(isset($_SESSION["cart"])){
          if(isset($_SESSION["cart"]["$MASP"])){
              $_SESSION["cart"]["$MASP"]["qty"]+=1;
          }
          else{
              $_SESSION["cart"]["$MASP"]["qty"]=1;
          }
          $_SESSION["cart"]["$MASP"]["MASP"]=$row["MASP"];
          $_SESSION["cart"]["$MASP"]["TENSP"]=$row["TENSP"];
          $_SESSION["cart"]["$MASP"]["ANHSP"]=$row["ANH"];
          $_SESSION["cart"]["$MASP"]["GIATIEN"]=$row["GIA"];
          foreach($_SESSION["cart"] as $k=>$val){
              $this->soluong +=$val["qty"];
              $_SESSION["soluong"]=$this->soluong;
          }
          header("location:"._WEB_ROOT."/cart/payment");
        }else{
          $_SESSION["cart"]["$MASP"]["qty"]=1;
          $_SESSION["cart"]["$MASP"]["MASP"]=$row["MASP"];
          $_SESSION["cart"]["$MASP"]["TENSP"]=$row["TENSP"];
          $_SESSION["cart"]["$MASP"]["ANHSP"]=$row["ANH"];
          $_SESSION["cart"]["$MASP"]["GIATIEN"]=$row["GIA"];
          foreach($_SESSION["cart"] as $k=>$val){
            $this->soluong+=$val["qty"];
              $_SESSION["soluong"]=$this->soluong;
          }
          header("location:"._WEB_ROOT."/cart/payment");
        }
      }
    }
  }
?>