<?php
/**
 * Created by PhpStorm.
 * User: Fu4ng
 * Date: 2018/4/25
 * Time: 18:07
 */
include('conn.php');
$conn->query("set names 'utf8'"); //数据库输出编码 应该与你的数据库编码保持一致.南昌网站建设公司百恒网络PHP工程师建议用UTF-8 国际标准编码.
$conn -> select_db($mysql_database); //打开数据库
$sql ="select * from user WHERE id = '1625131022'"; //SQL语句
$result = $conn->query($sql); //查询成功
$data=array();
echo "start";
    while ($tmp=$result->fetch_assoc())
    {
        $data[]=$tmp;
    }
echo $data["id"];
echo "end";
?>
