<?php

header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {  
  if (!empty($_GET['save'])) {
  }
  include('index.html');
  exit();
}

$name = $_POST['name'];
$email = $_POST['email'];
$dateB = $_POST['dateB'];
$gender = $_POST['gender'];
$limbs = $_POST['limbs'];
$superpowers = $_POST['superpowers'];
$biography = $_POST['biography'];

// //////// // 

$errors=FALSE;
if(empty($_POST['name'])){
    print('Заполните имя.<br/>');
    $errors=TRUE;
}
if(empty($_POST['email'])){
    print('Заполните почту.<br/>');
    $errors=TRUE;
}

if (empty($_POST['dateB'])) {
    print('Заполните дату рождения.<br/>');
    $errors = TRUE;
}

if(empty($_POST['gender'])){
    print('Выберите пол.<br/>');
    $errors=TRUE;
}

if (empty($_POST['limbs'])) {
    print('Выберите количество конечностей.<br/>');
    $errors = TRUE;
}

if (empty($_POST['biography'])){
    print('Заполните биографию.<br/>');
    $errors= TRUE;
}

if (empty($_POST['superpowers'])) {
    print('Выберите суперспособность.<br/>');
    $errors = TRUE;
}

if ($errors == TRUE) {
    exit();
}

$user='u47436';
$pass='2041646';

switch($limbs) {
    case '1': {
        $limbs='1';
        break;
    }
    case '2':{
        $limbs='2';
        break;
    }
    case '3':{
        $limbs='3';
        break;
    }
    case '4':{
        $limbs='4';
        break;
    }
};

$power1=in_array('superpower-1',$_POST['superpowers']) ? '1' : '0';
$power2=in_array('superpower-2',$_POST['superpowers']) ? '1' : '0';
$power3=in_array('superpower-3',$_POST['superpowers']) ? '1' : '0';


// $db = new PDO('mysql:host=localhost;dbname=u47436', $user, $pass, array(PDO::ATTR_PERSISTENT => true));

$db = new PDO('mysql:host=localhost;dbname=u47436', $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    $stmt = $db->prepare("INSERT INTO form (names,email,dateB,gender,limbs,biography)"."VALUES (:name,:email,:dateB,:gender,:limbs,:biography)");
    $stmt -> execute(array('name'=>$name,'email'=>$email,'dateB'=>$dateB,'gender'=>$gender,'limbs'=>$limbs,'biography'=>$biography));
    
    $stmt = $db->prepare("INSERT INTO superpower (superpowers_immor,superpowers_magic,superpowers_levit)"." VALUES (:power1,:power2,:power3)");
    $stmt -> execute(array('power1'=>$power1, 'power2'=>$power2, 'power3'=>$power3));

    print ('Спасибо, результаты сохранены.<br/>');
}
catch(PDOException $e){
  echo $e->getMessage();
  exit();
}

?>