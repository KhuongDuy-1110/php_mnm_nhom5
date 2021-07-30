<?php
// include file model
include "models/ModelProducts.php";
class ControllerProducts extends Controller{
    // ke thua class model
    use ModelProducts;
    public function category(){
        $category_id = isset($_GET["id"]) ? $_GET["id"] : 0;
        // quy dinh so ban ghi tren mot trang
        $recordPerPage = 40;
        // tinh so trang
        $numPage = ceil($this->modelTotalRecord()/$recordPerPage);
        // lay du lieu tu model
        $data = $this->modelRead($recordPerPage);
        // goi view, truyen du lieu ra view
        $this->loadView("ViewCategory.php",array("data"=>$data,"numPage"=>$numPage,"category_id"=>$category_id));
    }
    public function allcategory(){
        // quy dinh so ban ghi tren mot trang
        $recordPerPage = 40;
        // tinh so trang
        $numPage = ceil($this->modelTotalRecord()/$recordPerPage);
        $data = $this->modelGetAllCategory();
        $this->loadView("ViewCategory.php",array("data"=>$data,"numPage"=>$numPage));
    }
//    chi tiet san pham
    public function detail(){
        $record = $this->modelGetRecord();
        $this->loadView("ViewDetail.php",array("record"=>$record));
    }
//    rating
    public function rating(){
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        $this->modelRating();
        header("location:index.php?controller=products&action=detail&id=$id");
    }
}
?>