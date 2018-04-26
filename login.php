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
$back['status']=1;
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
echo $back;
$myfile = fopen("testfile2.txt", "w");
fwrite($myfile,$userid);
fwrite($myfile,gettype($userid));
fwrite($myfile,'\n');
fwrite($myfile,$userpwd);
fwrite($myfile,gettype($userpwd));
fclose($myfile);
?>