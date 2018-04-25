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
$sql = "select * from user WHERE id = '{$userid}'";
$rs = mysqli_query($conn,$sql);
$rownum = mysqli_num_rows($rs);

for($i=0;$i<$rownum;$i++){
    $row = mysqli_fetch_assoc($rs);
    echo "ID:".$row['ID']."<br/>";
    echo "Type:".$row['Type']."<br/>";
}
mysqli_free_result($rs);
mysqli_close($db);
?>