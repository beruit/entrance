<?php
require_once('../config/config.php');
require_once('../config/connection.php');
require_once(ROOT.'admin/layout/header.php');

$urlPage=isset($_GET['page']) ? $_GET['page']:'home';
$title=$urlPage;
$urlFile=$urlPage.'.php';
$urlPath=ROOT.'admin/pages/'.$urlFile;


if(file_exists($urlPath) && is_file($urlPath)) {
    require_once(ROOT.'admin/layout/nav.php');
    require_once(ROOT.'admin/layout/top_time.php');
    echo "<div class=\"container-fluid\"><div class=\"content\"><div class=\"row\">";
    require_once $urlPath;
    echo "</div></div></div>";
}else{
    require_once(ROOT.'admin/message/error.php');
}


require_once(ROOT.'admin/layout/footer.php');
?>