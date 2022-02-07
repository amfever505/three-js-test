<?php
session_start();
require('dbconnect.php');

if (!isset($_SESSION['join'])) {
header('Location: index.php');
exit();
}
if (!empty($_SESSION)) {
	// 登録処理をする
	$statement = $db->prepare('INSERT INTO members SET email=?,	password=?, name=?, created=NOW()');
		echo $ret = $statement->execute(array(
			$_SESSION['join']['email'],
			hash('sha256',$_SESSION['join']['password']),
			$_SESSION['join']['name']
			
		));
		    $_SESSION['message'] = '登録完了です';
		header('Location: index.php');
		exit();
	}

?>
