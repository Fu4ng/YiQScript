<?php
/**
 * Created by PhpStorm.
 * User: Fu4ng
 * Date: 2018/4/25
 * Time: 18:07
 */
$mysql_server_name='127.0.0.1'; //改成自己的mysql数据库服务器
$mysql_username="root"; //改成自己的mysql数据库用户名
$mysql_password="toor"; //改成自己的mysql数据库密码
$mysql_database="yiq"; //改成自己的mysql数据库名
$conn=new mysqli($mysql_server_name,$mysql_username,$mysql_password); //连接数据库
if($conn==false)
{
    echo "数据连接失败！";
}
else
{
    echo "数据连接成功！";
}

$conn->query("set names ‘utf8‘"); //数据库输出编码 应该与你的数据库编码保持一致.南昌网站建设公司百恒网络PHP工程师建议用UTF-8 国际标准编码.
$conn -> select_db($mysql_database); //打开数据库
$sql ="select * from user "; //SQL语句
$result = $conn->query($sql); //查询成功
$data=array();
echo "start";
    while ($tmp=$result->fetch_assoc())
    {
        $data[]=$tmp;
    }
var_dump($data);
echo "end";
?>
