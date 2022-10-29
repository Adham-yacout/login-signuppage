<?php require "connect.php" ; ?>
<?php
session_start();
$output ="";
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $pass=$_POST['password'];
    
    $login = $conn ->query("SELECT * FROM user WHERE email = '$email'");
    $login->execute();
     $data = $login->fetch(PDO::FETCH_ASSOC);
     if($login->rowCount() > 0)
        {
            
            if(password_verify($pass,$data['password']))
            { 
              $_SESSION['username'] =$data['name'];
                header('location:main.php');
                
                
            }
            else{
              $output = "Incorrect data ";  
              
            }
        }
        else{
            
          $output = "Incorrect data ";  
           
        }

}

?>

<html>

<head>
<meta charset="UTF-8">
<title>
  Login Screen
</title>
<link rel="stylesheet" href="styles2.css">
<script defer src="login.js" > </script>

</head>

<body>

    <form id="lgnform" action="index.php" method="post">
        <fieldset id="Databox" >
            <div id="error" style=" text-align: center;
            font-size: 16px;
            margin-bottom: 16px;
            color: red;">
           <p><?php echo $output ?></p>
            
        </div>
            <legend id="Boxname">Login</legend>
            <label id="emaillabel">Email </label>
            <br>
            <input id="emailfield" type="email" name="email" placeholder="email">
            <br>
            <label id="passlabel">Password </label>
            <br>
          
                
                <input id="passfield" type="password" name="password" placeholder="password">
          
            
            <br>
           
              
            <button id="loginbtn" name="submit" type="submit " style="text-align: center;
            font-size: 24px;
            margin: auto;
          display: grid;
          margin-top: 16px;
            color: white;
            padding: 8px;
            background-color: #000000; "> Login </button>

            <a href="register.php">
              <p>
                Dont have an account?
              </p>
            </a>
            
            
  
  
    </fieldset>
    
            
</form>
       
    


</body>
</html>