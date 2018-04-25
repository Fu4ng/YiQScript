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
$sql = "select * from user where id='1625131022'";
$rs = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($rs);
if($row["pwd"] == $userpwd){
    $status=$row["type"];
}else{
       //登录失败
    $status = 0;
    echo "登录失败";
}
echo "$status";

?>