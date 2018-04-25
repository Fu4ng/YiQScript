<?php
/**
 * Created by PhpStorm.
 * User: Fu4ng
 * Date: 2018/4/25
 * Time: 19:24
 */

$db=mysqli_connect('localhost','root','toor','yiq')or die("无法连接到数据库");
$sq = "select * from user";
$result = mysqli_query($db,$sq);
$n = mysqli_num_rows($result);
echo "查询结果有".$n."条记录";
$id = '1625131022';
$sq = "select * from user WHERE ID = '{$id}'";
$rs = mysqli_query($db,$sq);
$rownum = mysqli_num_rows($rs);

if($rownum){
    $row = mysqli_fetch_assoc($rs);
    echo "ID:".$row['ID']."<br/>";
    echo "Type:".$row['Type']."<br/>";
}
mysqli_free_result($result);
mysqli_free_result($rs);
mysqli_close($db);
?>