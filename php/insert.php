<?php
$name = $_POST['name'];
$sex= $_POST['sex'];
$age= $_POST['age'];
$major= $_POST['major'];


$mysql = new mysqli('localhost','root','','testfirst','3306');
$mysql->query('set names utf8');
if($mysql->connect_errno){
    echo '数据库连接失败，失败原因'.$mysql->connect_errno;
    exit();
}
$sql = "INSERT INTO `biao2` (`name`, `sex`, `age`, `major`) VALUES ( '$name', '$sex', '$age', '$major')";

$mysql->query($sql);
$result =$mysql->affected_rows;
if($result==1){
    $id=$mysql->insert_id;
    echo json_encode([
        'code'=>1,
        'id'=>$id
    ]);}else{
    echo json_encode([
        'code'=>0,
    ]);

}
