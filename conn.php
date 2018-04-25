<?php
/**
 * Created by PhpStorm.
 * User: Fu4ng
 * Date: 2018/4/24
 * Time: 21:47
 */
$mysql_server_name='127.0.0.1'; //改成自己的mysql数据库服务器
$mysql_username="root"; //改成自己的mysql数据库用户名
$mysql_password="toor"; //改成自己的mysql数据库密码
$mysql_database="yiq"; //改成自己的mysql数据库名
$conn=new mysqli($mysql_server_name,$mysql_username,$mysql_password)or die("error！") ;
mysqli_select_db($conn,$mysql_database);
?>