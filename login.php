<?php
/**
 * Created by PhpStorm.
 * User: Fu4ng
 * Date: 2018/4/24
 * Time: 21:42
 */

include ("conn.php");//引用

$userid = $_POST['userid'];
$userpwd = $_POST['userpwd'];
$status = 0;
echo "$userid";
mysqli_query($conn,"set names utf8");
$sql = "select * from user where id='{$userid}'";
$rs = mysqli_query($conn,$sql);
if($rs['pwd'] == $userpwd){
    $status=$rs['type'];
}else{
       //登录失败
    $status = 0;
}
echo $status;

?>