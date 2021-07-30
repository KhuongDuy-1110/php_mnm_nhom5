<?php
include "models/ModelCart.php";
class ControllerCart extends Controller{
    use modelCart;
    public function __construct()
    {
        if (isset($_SESSION["cart"]) == false)
            $_SESSION["cart"] = array();
        $_SESSION["totals"] = $this->cartTotal();
    }
//        hien thi danh sach san pham trong gio hang
    public function index(){
        $this->loadView("ViewCart.php");
    }
//        them san pham vao gio hang
    public function create(){
        $id = isset($_GET["id"]) ?  $_GET["id"] : 0;
//            goi ham model
        $this->cartAdd($id);
        header("location:index.php?controller=cart");
    }
//        xoa san pham khoi gio hang
    public function delete(){
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
//            goi ham model
        $this->cartDelete($id);
        header("location:index.php?controller=cart");
    }
//        xoa toan bo san pham khoi gio hang
    public function destroy(){
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        $this->cartDestroy();
        header("location:index.php?controller=cart");
    }
//        cap nhat so luong san pham
    public function update(){
        foreach ($_SESSION["cart"] as $product) {
            $name = "product_".$product["id"];
            $number = $_POST[$name];
            $this->cartUpdate($product["id"],$number);
        }
        header("location:index.php?controller=cart");
    }
//        thanh toan gio hang
    public function checkout(){
//            kiem tra neu user chua dang nhap thi yeu cau dang nhap
        if(isset($_SESSION["customer_email"]) == false)
            header("location:index.php?controller=account&action=login");
        else{
            $this->cartCheckOut();
            header("location:index.php?controller=cart");
        }
    }
}
?>
