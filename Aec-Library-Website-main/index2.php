<?php
    session_start();
    if(!isset($_SESSION['nom'])){
        header('Location: index.phtml');
    }
    // if(isset($_POST['submit'])){
    //     //$_SESSION['message']=$_POST['message'];
    //     header('Location: public/feedback.php');
    //     exit();
    // }
    include "index2.phtml";

?>