<?php
 session_start();
 //注意如此此处存在中文验证码时，用Ajax传值要注意存在中文乱码的问题
 $validateCode=$_POST['validateCode'];
 if(strtoupper($validateCode)==strtoupper($_SESSION['checkCode']))          //判断文本框中输入的值和$_SESSION中保存的验证码值是否相等
  echo "1";         
 else 
  echo "0";
?>