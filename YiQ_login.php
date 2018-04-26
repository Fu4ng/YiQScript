<?php
/**
 * Created by PhpStorm.
 * User: Fu4ng
 * Date: 2018/4/24
 * Time: 21:42
 */

include ("conn.php");//引用
$json_post = file_get_contents("php://input");
$j_object = json_decode($json_post,true);
$userid = $j_object['userid'];
$userpwd = $j_object['userpwd'];
$sql = "select * from user where id='{$userid}'";
$back['status']=0;
$rs = mysqli_query($conn,$sql);
$rownum =mysqli_num_rows($rs);
if($rownum){
    $row = mysqli_fetch_array($rs);
    if($userpwd == $row['pwd']){
        //登陆成功返回身份
        $type = (int)$row['Type'];
        $back['status']=$type;
    }else{
        //登陆失败
        $back['status']=0;
    }
}
$myfile = fopen("testfile.txt", "w");
fwrite($myfile,$userid);
fwrite($myfile,$userpwd);
echo(json_encode($back));
?>