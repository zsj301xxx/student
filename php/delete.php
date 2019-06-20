<?php
$id=$_POST['id'];


$mysql = new mysqli('localhost','root','','testfirst','3306');


if($mysql->connect_errno){
    echo '数据库连接失败，失败原因'.$mysql->connect_errno;
    exit();
}
$mysql->query('set names utf8');
$sql ="delete from biao2 where id=$id";
$mysql->query($sql);
$result =$mysql->affected_rows;


if($result==1){
    echo json_encode([
        'code'=>1,
        'msg'=>'删除成功'
    ]);}else{
    echo json_encode([
        'code'=>0,
        'msg'=>'删除失败'
    ]);

}