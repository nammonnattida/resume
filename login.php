<?php
 session_start();
 header ('Content-type: text/html; charset=utf-8');
 
 mysql_connect("localhost","root","abcd1234");  //install web server
 mysql_select_db("sunzandesign");
 
 $username = isset($_POST['username']) ? $_POST['username'] : '';
 $password = isset($_POST['password']) ? $_POST['password'] : '';
 
 $strSQL = "SELECT * FROM tb_user WHERE user_name = '".mysql_real_escape_string($username)."' 
 AND user_password = '".mysql_real_escape_string($password)."'";
 $qry = mysql_query($strSQL) or die('Disconnect to database Error : '. mysql_error());
 $row = mysql_fetch_assoc($qry);
 if(!$row)
 {
   echo "

Username or Password incorrect!

";
 }
 else
 {
   //creata SESSION 
   $_SESSION["user_id"]   = $row["user_id"];
   $_SESSION["user_level"]  = $row["user_level"];
   $_SESSION["user_fullname"]  = $row["user_fullname"];

   session_write_close();// end SESSION

   header("location:index.php");//go homepage
 }
 mysql_close();//stop connect
?>