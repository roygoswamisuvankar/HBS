<!doctype html>
<html>
    <head>
        <title>Five - Admin</title>
        <link href="../css/login.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/fontawesome.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Lobster|Lobster+Two|Noto+Serif" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">        
        <script src="https://code.jquery.com/jquery-3.6.0.js" crossorigin="anonymous"></script>
        <script src="../js/login.js" type="text/javascript"></script>
    </head>
    <body>
        <div>
            <div style="width: 100%; text-align: center;">
                <a class="brand" href="index.php"><img src="../imgs/logo.png" alt="#" /></a>
            </div>           
            <div class="signin-section">
                <img src="../imgs/hotel1.jpg" alt="" class="login-image" style="width: 23%;"/>
                <div class="centered">
                    <table class="signup">
                        <tr>
                            <td>
                                Admin Welcome!
                            </td>                           
                        </tr>
                        <tr>
                            <td>
                                Login into your system
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button><a href="../index.php" style="text-decoration: none; color: white;">Home</a></button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="login-form">   
                <?php
                    include_once 'dbconfig.php';    
	 
 
             
            session_start();
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $username = mysqli_real_escape_string($connect,$_POST['uname']);
                $password = mysqli_real_escape_string($connect,$_POST['password']);               
                
                //md5 encryption
                //$pass = md5($password);

                $sql = "select *from admin where phone = '$username' and password = '$password'";
                $result = mysqli_query($connect, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

               // $active = $row['admin_id'];
                $count = mysqli_num_rows($result);

                if($count == 1){
                    
                    $_SESSION['login_user'] = $username;
                    header("location: admin_welcome.php");
                }else{
                    echo '<script>'
                    . 'alert("Username or Password not matched!")'
                    . '</script>';
                }
            }
                ?>
                <form action="admin_login.php" method="post">
                    <table id="login-form">
                        <tr>
                            <td style="text-align: center;"><h4>Admin Welcome!</h4></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="uname" id="phone" placeholder="Enter username" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" name="password" placeholder="Enter password" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="login" value="Login"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>