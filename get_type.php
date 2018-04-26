<?php
/**
 * Created by PhpStorm.
 * User: Fu4ng
 * Date: 2018/4/25
 * Time: 13:16
 */
include("conn.php");
$json_post = file_get_contents("php://input");
$j_object = json_decode($json_post,true);
$post_type = $j_object['gettype'];
$back['status'] =1;//返回的数据
if($post_type == 0){
     //待维修设备
    $back['status']=0;
    $sql = "select * from facility WHERE Status = 0";
    $rs = mysqli_query($conn,$sql);
    $rownum = mysqli_num_rows($rs);
    $back_f = array();
    for($i = 1;$i<=$rownum;$i++){
        $row = mysqli_fetch_assoc($rs);
        //Fid
        $back_f[$i]['facilityid'] = $row['Fid'];
        //设备类型
        if($row['Type']==1){
            $back_f[$i]['facilitytype']="空调";
        }elseif ($row['Type']==0){
            $back_f[$i]['facilitytype']="电梯";
        }
        else{
            $back_f[$i]['facilitytype']="未知设备";
        }
        //设备地址
        $back_f[$i]['facilityaddress']=$row['address'];
        $back_f[$i]['facilitydetail']="无法运行";
    }
    $back['facility'] =[];
    $back['facility'] = $back_f;

    $c = array('1','2','3');
    echo $c;
}
elseif ($post_type==1){
    //待检查设备
}
elseif ($post_type==2){
    //维修记录
}
elseif ($post_type==3){
    //全部设备
}
?>