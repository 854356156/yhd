<?php
//连接数据库
$dbhost = 'localhost';
$dbuser = 'admin';
$dbpwd = 'admin';
$dbname = 'test';

$db = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);

if($db->connect_errno !=0){
    echo '连接失败';
    echo $db->connect_error;
}

$db->query('SET NAMES UTF8');

//获取注册信息
$user = $_POST['user'];
$pwd = $_POST['pwd'];
$pwd1 = $_POST['pwd1'];

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
//查询账号语句
$sql = 'SELECT * FROM '.$table.' WHERE user='.'\''.$user.'\'';
//增加账号语句
$add = 'INSERT INTO '.$table.' (user, pwd) VALUES ('.'\''.$user.'\','.'\''.$pwd.'\')';

//判断账号是否存在
$res = $db->query($sql);

if($res->num_rows !=0){
    echo "<script> alert('账号已被注册,请从新输入');location.href='/#/regist'</script>";
}else{
    $res2 = $db->query($add);
    echo "<script> alert('账号注册成功');location.href='/'</script>";
}

