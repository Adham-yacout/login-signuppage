<?php require "connect.php"?>
<?php
$output ="";
if(isset($_POST['submitsignup']))
{
    $emailuser = $_POST['email'];
    $pass=$_POST['password'];
    $nameuser= $_POST['name'];
    $insert = $conn->prepare("INSERT INTO user (email, password, name)
    VALUES(:email, :password, :name)");
    $login = $conn ->query("SELECT * FROM user WHERE email = '$emailuser'");
    $login->execute();
     $data = $login->fetch(PDO::FETCH_ASSOC);
     if($login->rowCount() > 0)
     {
        $output = "email is already found in database";  
     }
     else{
        $insert->execute([

            ':email' => $emailuser,
            ':password' => password_hash($pass,PASSWORD_DEFAULT),
            ':name' => $nameuser,
        ]
        );
        header('location:index.php');
    }
     }
  
?>




<html>

<head>
<meta charset="UTF-8">
<title>
 Signup Screen
</title>
<link rel="stylesheet" href="styles2.css">
<script defer src="register.js" > </script>

</head>

<body>

    <form id="signupform" action="register.php" method="post">
        <fieldset id="Databox" >
            <div id="error" style=" text-align: center;
            font-size: 16px;
            margin-bottom: 16px;
            color: red;">
            <p><?php echo $output ?></p>
            
        </div>
            <legend id="Boxname">Register</legend>
            <label id="emaillabel">Email </label>
            <br>
            <input id="emailfield" type="email" name="email" placeholder="email">
            <br>
            <label id="namelabel">Name </label>
            <br>
            <input id="namefield" type="text" name="name" placeholder="name">
            <br>
            
            <label id="passlabel">Password </label>
            <br>
                <input id="passfield" type="password" name="password" placeholder="password">
            <br>
            <label id="passlabel2">Confirm password  </label>
            <br>
                <input id="passfield2" type="password" name="password2" placeholder="password">
            <br>
           
              
            <button id="signupbtn" name="submitsignup" type="submit " style="text-align: center;
            font-size: 24px;
            margin: auto;
          display: grid;
          margin-top: 16px;
            color: white;
            padding: 8px;
            background-color: #000000; ">Sign up </button>
            
            
  
  
    </fieldset>
    
            
</form>
       
    


</body>
</html>