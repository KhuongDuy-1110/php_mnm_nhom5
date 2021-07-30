<?php
    include "models/ModelHome.php";
    class ControllerHome extends Controller{
        use modelHome;
        public function index(){
            $this->loadView("ViewHome.php");
        }
    }
?>