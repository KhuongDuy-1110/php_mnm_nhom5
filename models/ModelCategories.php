<?php
trait ModelCategories{
    public function modelListCategoriesSub($products_id){
        $conn = Connection::getInstance();
        $query = $conn->query("select * from categories where parent_id = $products_id");
        return $query->fetchAll();
    }
    public function modelListCategories(){
        $conn = Connection::getInstance();
        $query = $conn->query("select * from categories where parent_id = 0 order by id desc");
        return $query->fetchAll();
    }
}
?>
