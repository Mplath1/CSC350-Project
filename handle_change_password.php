<?php
if (!isset($_SESSION)) session_start();

require 'database_connection.php';

$username = filter_var($_REQUEST['username'],FILTER_SANITIZE_STRING);
$current_password = filter_var($_REQUEST['current_password'],FILTER_SANITIZE_STRING);
$new_password = filter_var($_REQUEST['new_password'],FILTER_SANITIZE_STRING);

$msg = "";

function check_user($dbc,$username,$current_password,$msg){
	$query = "SELECT username, password from users WHERE username=?";
	$stmt = mysqli_prepare($dbc, $query);
	mysqli_stmt_bind_param($stmt, 's', $username);
	mysqli_stmt_execute($stmt);
  //TRYING TO CHECK USER EXISTS BEFORE UPDATING> STMT RETURNS -1?
	mysqli_stmt_bind_result($stmt, $stmtUsername, $stmtPassword);
  echo mysqli_stmt_error($stmt);
	$row = mysqli_stmt_fetch($stmt);

  if(mysqli_stmt_affected_rows($stmt)>0){
    if($stmtPassword == sha1($password)){
  		mysqli_stmt_close($stmt);
      if(update_password($dbc,$username,$current_password,$new_password)){
      $msg="Password updated for ".$username."!";
    }else{
      $msg="Problem updating password!<br>Contact Administrator!";
    }
      }else{
      mysqli_stmt_close($stmt);
      $msg = "Unable to reset password! Current Password invalid!";
     }
  }else{
    $msg = "Unable to reset password!<br>".$username." does not exist!";
  }
  return $msg;
}

function update_password($dbc,$username,$current_password,$new_password){

  $query = "UPDATE users SET password=sha1(?) WHERE username=?";
  $stmt = mysqli_prepare($dbc, $query);
	mysqli_stmt_bind_param($stmt, 'ss',$new_password,$username);
  mysqli_stmt_execute($stmt);
  return mysqli_stmt_bind_result($stmt,$updated);
		//exit;
}






if(!empty($username)){
	if(!empty($current_password) && !empty($new_password)){
		$dbc = connect_to_database();
		$msg=check_user($dbc,$username,$current_password,$msg);
	}else{
		$msg = "You must enter a Password!";
	}
}else{
	$msg = "You must enter a Username!";
}
include ('login.php'); //likely not the best way to do this
?>
