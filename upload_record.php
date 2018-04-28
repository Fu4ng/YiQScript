<?php
/**
 * Created by PhpStorm.
 * User: Fu4ng
 * Date: 2018/4/27
 * Time: 12:42
 */
include ("conn.php");
$json_post = file_get_contents("php://input");
$j_object = json_decode($json_post,true);
$faclityid = $j_object['facilityid'];
$fixadminid = $j_object['fixadminid'];
$fixtext = $j_object['fixtext'];
$back['fixstatus'] = 1;
$fixsql = "UPDATE facility SET Cstatus = 1 WHERE FID = '{$faclityid}'";

//修改记录
$ur =mysqli_query($conn,$fixsql);
if($ur){
    //插入成功
    $back['fixstatus']=0;
}else{
    //插入失败
    $back['fixstatus']=1;
}

echo json_encode($back);

?>