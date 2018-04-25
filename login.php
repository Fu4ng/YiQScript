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
$sql = "select * from user";
$rs = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_assoc($rs)){
    echo $row['id'];
    echo $row['type'];
}
?>