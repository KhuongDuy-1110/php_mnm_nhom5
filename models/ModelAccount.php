<?php
trait ModelAccount{
    public function modelRegister(){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        $password = md5($password);
        $hash=md5(rand(0,1000));
        $conn = Connection::getInstance();
//            kiem tra neu email chua ton tai thi insert ban ghi
        $queryCheck = $conn->prepare("select email from customers where email=:var_email");
        $queryCheck->execute(array("var_email"=>$email));
        if($queryCheck->rowCount()>0)
            header("location:dang-ky-unsuccessful");
        else{
//                insert ban ghi
            $query = $conn->prepare("insert into customers set name=:var_name, email=:var_email, address=:var_address, phone=:var_phone, password=:var_password, hash=:var_hash");
            $query->execute(array("var_name"=>$name,"var_email"=>$email,"var_address"=>$address,"var_phone"=>$phone,"var_password"=>$password,"var_hash"=>$hash));
            $to = $_POST["email"];
            $subject = 'Signup | Verification';
            $message = '
  
            Thanks for signing up!
            Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
              
            ------------------------
            Username: '.$name.'
            Password: '.$password.'
            ------------------------
              
            Please click this link to activate your account:
            http://localhost/php54/vegetable_proj/php54_project/index.php?controller=account&action=verify&email='.$email.'&hash='.$hash.'
              
            '; // Our message above including the link
            $headers = 'From: khuongc3@gmail.com.vn' . "\r\n";
            mail($to, $subject, $message, $headers);
            header("location:xac-nhan-tai-khoan");
        }
    }
    public function modelLogin(){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password = md5($password);
        $conn = Connection::getInstance();
        $query = $conn->prepare("select id, email, password, active from customers where email=:var_email");
        $query->execute(array("var_email"=>$email));
        if($query->rowCount()>0){
            $result = $query->fetch();
            if ($password == $result->password){
                if($result->active == 1){
                    $_SESSION["customer_id"] = $result->id;
                    $_SESSION["customer_email"] = $result->email;
                    header("location:trang-chu");
                }
                else{
                    header("location:tai-khoan-chua-kich-hoat");
                }
            }
            else
                header("location:dang-nhap-unsuccessful");
        }
        else{
            header("location:dang-nhap-unsuccessful");
        }
    }
    public function modelLogout(){
        unset($_SESSION["customer_id"]);
        unset($_SESSION["customer_email"]);
        header("location:dang-nhap");
    }
    //        orders
    public function modelRead($recordPerPage){
        //lay tong to so ban ghi
        $total = $this->modelTotal();
        //tinh so trang
        $numPage = ceil($total/$recordPerPage);
        //lay so trang hien tai truyen tu url
        $page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
        //lay tu ban ghi nao
        $from = $page * $recordPerPage;
        //thuc hien truy van
        $conn = Connection::getInstance();
        $query = $conn->query("select * from orders order by id,status desc limit $from, $recordPerPage");
        //tra ve tat ca cac ban truy van duoc
        return $query->fetchAll();
    }
    //ham tinh tong so ban ghi
    public function modelTotal(){
        //---
        $conn = Connection::getInstance();
        $query = $conn->query("select id from orders");
        //lay tong so ban ghi
        return $query->rowCount();
        //---
    }
    //lay mot ban ghi trong table customers
    public function modelGetCustomers($id){
        //---
        $conn = Connection::getInstance();
        $query = $conn->query("select * from customers where id = $id");
        //tra ve mot ban ghi
        return $query->fetch();
        //---
    }
    //lay mot ban ghi trong table products
    public function modelGetProducts($id){
        //---
        $conn = Connection::getInstance();
        $query = $conn->query("select * from products where id = $id");
        //tra ve mot ban ghi
        return $query->fetch();
        //---
    }
    public function modelRemoveOrders(){
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        $conn = Connection::getInstance();
        $conn->query("update orders set status = 3 where id=$id");
    }
}
?>