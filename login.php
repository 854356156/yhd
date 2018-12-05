<?php
//连接数据库
$dbhost = 'localhost';
$dbuser = 'admin';
$dbpwd = 'admin';
$dbname = 'test';

$db = new mysqli($dbhost, $dbuser, $dbpwd, $dbname );

if($db->connect_errno !=0){
    echo '连接失败';
    echo $db->connect_error;
}

$db->query('SET NAMES UTF8');

//获取登录数据
$user = $_POST['user'];
$pwd = $_POST['pwd'];

//获取表的名称$table
//$result = $db->query('SHOW TABLES');
//$tables = [];
//$tabless = '';
//while($arr = $result->fetch_assoc()){
//    $tables[] = $arr;
//}
//foreach ($tables as $abc){
//    if($abc['Tables_in_login'] === 'info'){
//        $tabless = $abc;
//    } ;
//}
//$table = implode(",", $tabless);

$table = 'info';
//查询
//$sql = 'SELECT * FROM '.$table.' WHERE user='.'\''.$user.'\''.' and pwd='.'\''.$pwd.'\'';
//$sql = 'SELECT * FROM '.$table.' WHERE user='.'\''.$user.'\''.' and pwd='.'\''.$pwd.'\'';
$sql = 'SELECT * FROM '.$table.' WHERE user='.'\''.$user.'\''.' and pwd='.'\''.$pwd.'\'';
$res = $db->query($sql);

//判断有没有值
if($res->num_rows){
    setcookie('user',$user,time()+24*3600*7);
    header("location: /");
}else{
    echo "<script>alert('账号或密码出错，请重新输入');location.href='/#/login';</script>";

}




