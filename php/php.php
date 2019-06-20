<?php

$user = $_POST['user'];
$pass = $_POST['pass'];

$mysql = new mysqli('localhost','root','','testfirst','3306');

if($mysql->connect_errno){
    echo '数据库连接失败，失败原因'.$mysql->connect_errno;
    exit();
}



$mysql->query('set names utf8');
$sql ="select * from manager";
//$mysql->query($sql);
$result =$mysql->query($sql)->fetch_all(MYSQLI_ASSOC);
//$var_dump($result);

//验证
for($i = 0;$i<count($result);$i++){
    $ele= $result[$i];
    if($ele['names']===$user && $ele['pass']===$pass){
        session_start();
        $_SESSION['username']=$user;
        echo json_encode([
            'code'=>1,
            'msg'=>'登录成功'
        ]);
        exit ;

    }
}
echo json_encode([
    'code'=>0,
    'msg'=>'登录失败'
]);
