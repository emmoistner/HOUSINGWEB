<?php
session_start();
if(!session_is_registered(user_name)){
header("location:login_secure.php");
}
?>

<html>
<body>
Login Successful
</body>
</html>