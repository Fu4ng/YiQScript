<?php
/**
 * Created by PhpStorm.
 * User: Fu4ng
 * Date: 2018/4/24
 * Time: 21:47
 */
$host = 'localhost';
$name = 'root';
$db_name = 'yiq';
$pwd = 'kkuu9038';
$conn = @mysqli_connect($host,$name,$db_name,$pwd) or die("error！") ;
mysqli_query($conn,"set names utf8");
?>