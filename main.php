<?php

session_start();
?>
<?php
if(isset($_POST['logoutbtn']))
{  session_start();
    session_unset();
    session_destroy();
    header('location:index.php');
   
}
?>



<html>
<head>
<title>Welcome </title>
<link rel="stylesheet" href="welcome.css">
</head>
<body >
  
    <p id="welcomemsg"><?php echo "hello : ". $_SESSION['username']?></p>
    <form method="POST">
    <button id="logout" name="logoutbtn" type="submit" >
        Logout
    </button>
    </form>
   
    
   
   

</body>
</html>