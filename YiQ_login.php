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

$sql = "select * from user where id='{$userid}'";
$rs = mysqli_query($conn,$sql);
$rownum =mysqli_num_rows($rs);
if($rownum){
    $row = mysqli_fetch_array($rs);
    if($userpwd == $row['pwd']){
        //登陆成功返回身份
        $status=$row["Type"];
    }else{
        //登陆失败
        $status=0;
    }
    echo $status;
}
?>