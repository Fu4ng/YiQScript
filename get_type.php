<?php
/**
 * Created by PhpStorm.
 * User: Fu4ng
 * Date: 2018/4/25
 * Time: 13:16
 */

header("Content-Type:text/html;charset=utf-8");
include("conn.php");
mysqli_query($db,"set names utf8");
$json_post = file_get_contents("php://input");
$j_object = json_decode($json_post,true);
$post_type = $j_object['gettype'];
$back['status'] =1;//返回的数据
if($post_type == 0){
     //待维修设备
    $back['status']=0;
    $sql = "select * from facility WHERE Status =0";
    $rs = mysqli_query($conn,$sql);
    $rownum = mysqli_num_rows($rs);
    $back['facility']=array();
    for($i = 0;$i<$rownum;$i++){
        $row = mysqli_fetch_assoc($rs);
        //Fid
        $back_f['facilityid'] = $row['FID'];
        //设备类型
        $k = (int)$i;
        if($row['Type']==1){
            $back_f['facilitytype']="空调";
        }elseif ($row['Type']==2){
            $back_f['facilitytype']="电梯";
        }
        else{
            $back_f['facilitytype']="未知设备";
        }
        //设备地址
        $back_f['facilityaddress']=$row['address'];
        $back_f['facilitydetail']="无法运行";
        array_push($back['facility'],$back_f);
    }

    echo json_encode($back);
}
elseif ($post_type==1){
    //待检查设备
    $back['status']=0;
    $sql = "select * from facility";
    $rs = mysqli_query($conn,$sql);
    $rownum = mysqli_num_rows($rs);
    $back['facility']=array();
    for($i = 1;$i<=$rownum;$i++){
        $row = mysqli_fetch_assoc($rs);
        //Fid
        $back_f['facilityid'] = $row['FID'];
        //设备类型
        if($row['Type']==1){
            $back_f['facilitytype']="空调";
        }elseif ($row['Type']==2){
            $back_f['facilitytype']="电梯";
        }
        else{
            $back_f['facilitytype']="未知设备";
        }
        //设备地址
        $back_f['facilityaddress']=$row['address'];
        array_push($back['facility'],$back_f);
    }

    echo json_encode($back);
}
elseif ($post_type==2){
    //维修记录
    $back['status']=0;
    $sql = "select * from m_records";
    $rs = mysqli_query($conn,$sql);
    $rownum = mysqli_num_rows($rs);
    $back['facility']=array();
    for($i = 1;$i<=$rownum;$i++){
        $row = mysqli_fetch_assoc($rs);
        //Fid
        $back_f['facilityid'] = $row['FID'];
        //设备类型
        $FID = $row['FID'];
        //使用正则判断类型
        $str = $FID;
        $pat = '/KT/';
        $back_f['facilitytype'] = preg_match($pat,$str)?"空调":"电梯";
        $back_f['fixdate'] = $row['Date'];
        $back_f['fixadmin'] = $row['ID'];
        array_push($back['facility'],$back_f);
    }

    echo json_encode($back);
}
elseif ($post_type==3){
    //全部设备
    $back['status']=0;
    $sql = "select * from facility";
    $rs = mysqli_query($conn,$sql);
    $rownum = mysqli_num_rows($rs);
    $back['facility']=array();
    for($i = 0;$i<$rownum;$i++){
        $row = mysqli_fetch_assoc($rs);
        //Fid
        $back_f['facilityid'] = $row['FID'];
        //设备类型
        if($row['Type']==1){
            $back_f['facilitytype']="空调";
        }elseif ($row['Type']==2){
            $back_f['facilitytype']="电梯";
        }
        else{
            $back_f['facilitytype']="未知设备";
        }
        //设备地址
        $back_f['facilityaddress']=$row['address'];
        if($row['Status']==0){
            $back_f['facilitydetail']="无法运行";
        }else{
            $back_f['facilitydetail']="正常运行";
        }

        array_push($back['facility'],$back_f);
    }

    echo json_encode($back);
}
?>