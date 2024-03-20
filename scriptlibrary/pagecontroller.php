<?php 
$req=$_SERVER['REQUEST_URI'];
$sec=explode('/',$req)[3];
$module=isset($_GET['m'])?$_GET['m']:'dashboard';
$page=isset($_GET['p'])?$_GET['p']:'browse';
include dirname(__FILE__)."/../modules/".$sec."/".$module."/".$page.".php";
?>