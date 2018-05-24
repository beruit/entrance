<?php
require_once('config/config.php');
require_once('config/connection.php');

//if(!isset($_SESSION['user_id']) || $_SESSION['is_log_in']!=TRUE){
//    header('Location:login.php');
//}

$urlPage=isset($_GET['page']) ? $_GET['page']:'home';
$title=$urlPage;
$urlFile=$urlPage.'.php';
$urlPath=ROOT.'pages/'.$urlFile;
require_once('layout/header.php');
//require_once('layout/top.php');
//require_once('layout/nav.php');
//echo "<section class=\"container\"><div class=\"row\">";
if(file_exists($urlPath) && is_file($urlPath)){
    require_once ($urlPath);
}else{
    require_once ROOT.'pages/error.php';
}
//echo "</div></div>";
require_once('layout/footer.php');
?>