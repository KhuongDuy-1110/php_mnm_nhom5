<?php
trait ModelHome{
//        lay cac san pham noi bat
    public function modelHotProduct()
    {
        $conn=Connection::getInstance();
        $query=$conn->query("select * from products where hot=1 order by id desc limit 0,8");
        return $query->fetchAll();
    }
//        lay cac danh muc co san pham thuoc danh muc (nhung danh muc chua co san pham thi chua hien thi len)
    public function modelCategories(){
        $conn=Connection::getInstance();
        $query=$conn->query("select * from categories where id in (select category_id from products)");
        return $query->fetchAll();
    }
//        lay cac san pham thuoc danh muc
    public function modelProducts($category_id){
        $conn=Connection::getInstance();
        $query=$conn->query("select * from products where category_id=$category_id order by id desc limit 0,6");
        return $query->fetchAll();
    }
//        lay cac tin tuc noi bat
    public function modelHotNews(){
        $conn=Connection::getInstance();
        $query=$conn->query("select * from news where hot=1 order by id desc limit 0,6");
        return $query->fetchAll();
    }
}
?>