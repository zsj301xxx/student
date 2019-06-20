<?php
$type=$_POST['type'];
$val=$_POST['val'];
$id=$_POST['id'];
$mysql = new mysqli('localhost','root','','testfirst','3306');


if($mysql->connect_errno){
    echo '数据库连接失败，失败原因'.$mysql->connect_errno;
    exit();
}
$sql = "update biao2 set $type='$val' where id=$id";
$mysql->query($sql);
$result =$mysql->affected_rows;
if($result==1){
    echo json_encode([
        'code'=>1,
        'msg'=>'更新成功'
    ]);}else{
    echo json_encode([
        'code'=>0,
        'msg'=>'更新失败'
    ]);

}

