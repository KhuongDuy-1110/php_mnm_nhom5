<?php
//    load file LayoutTrangChu.php
$this->fileLayout = "LayoutTrangTrong.php";
?>
<?php
if (isset($_GET["email"]) && !empty($_GET["email"]) AND isset($_GET["hash"]) && !empty($_GET["hash"])) {
    $email = $_GET["email"];
    $hash = $_GET["hash"];
    $active = 0;
    $conn = Connection::getInstance();
    $query = $conn->query("SELECT email, hash, active FROM customers WHERE email='".$email."' AND hash='".$hash."' AND active=0");
    //$query->execute(array("var_email"=>$email,"var_hash"=>$hash,"var_active"=>$active));
    $match = $query->rowCount();
    if($match>0){
        $query1 = $conn->query("UPDATE customers SET active=1 WHERE email='".$email."' AND hash='".$hash."' AND active=0");
        $query1->execute();
        echo "Your email were activated successfully";
    }
    else{
        echo "Your account need to activate";
    }
} else {
    echo "no result";
}
?>
