<?php ob_start();
 if(!isset($_SESSION['App_ID']))
{
header("Location:index.php");
}

if(!isset($_SESSION['App_UserName']))
{
header("Location:index.php");
}
//if(!isset($_SESSION['Is_Admin']))
//{
//header("Location:index.php");
//}
ob_flush();?>