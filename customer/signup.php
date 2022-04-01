<!doctype html>
<html>
    <head>
        <title>Five - Signup</title>
        <link href="../css/login.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/fontawesome.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Lobster|Lobster+Two|Noto+Serif" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">  
        <script src="https://code.jquery.com/jquery-3.6.0.js" crossorigin="anonymous"></script>
        <script src="../js/script.js" type="text/javascript"></script>
    </head>
    <body>
        <div>
            <div style="width: 100%; text-align: center;">
                <a class="brand" href="index.php"><img src="../imgs/logo.png" alt="#" /></a>
            </div>           
            <div class="signin-section">
                <img src="../imgs/hotel.jpg" alt="" class="login-image"/>
                <div class="centered">
                    <table class="signup">
                        <tr>
                            <td>
                                Already have an account?
                            </td>                           
                        </tr>
                        <tr>
                            <td>
                                Signin here
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button><a href="login.php" style="text-decoration: none; color: white;">Login</a></button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="login-form">   
                <?php
                
                    include_once './dbconfig.php';
                    
                    $result = mysqli_query($connect, "select *from user");
                    
                    if(isset($_POST['signup'])){
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $dob = $_POST['dob'];
                        $password = $_POST['password'];
                        
                        //encryption of password
                        $pass = md5($password);
                        
                         //calculate age
                            $dateofbirth = new DateTime($dob);
                            $now = new DateTime();

                            $diff = $now->diff($dateofbirth);

                            //echo $diff->y;
                            
                            //$insert = mysqli_query($connect,"insert into user(name, email, phone, dob, password) values('$name','$email','$phone','$dob','$pass')");
                            
                            while($res = mysqli_fetch_array($result)){
                                if($res['email'] == $email){
                                    echo '<script>'
                                    . 'alert("This email id already exits, please try another!")'
                                    . '</script>';
                                }
                                elseif($res['phone'] == $phone){
                                    echo '<script>'
                                    . 'alert("This phone number already exits, please try another!")'
                                    . '</script>';
                                }
                                elseif($diff->y < 18){
                                    echo '<script>'
                                    . 'alert("Age must be 18 years old!")'
                                    . '</script>';
                                }
                                else{
                                    /*$query = ("insert into user(name, email, phone, dob, password) values('$name','$email','$phone','$dob','$pass')");
                                    
                                    if(mysqli_query($connect, $query)){
                                        echo '<script>'
                                        . 'alert("Your account created successfully")'
                                        . '</script>';
                                    }*/
                                    $insert = mysqli_query($connect,"insert into user(name, email, phone, dob, password) values('$name','$email','$phone','$dob','$pass')");
                                    if($insert){
                                        echo '<script>'
                                        . 'alert("Your account created successfully!")'
                                        . '</script>';
                                    }
                                }
                            }
                            
                    }
                ?>
                <form action="signup.php" method="post">
                    <table id="login-form">
                        <tr>
                            <td style="text-align: center;"><h4>Create an account!</h4></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="name" placeholder="Enter your full name" class="name" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="email" name="email" placeholder="Enter your email" class="email" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="phone" placeholder="Enter your contact number" class="phone" maxlength="10" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="date" placeholder="Enter D-O-B" name="dob" class="dob" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" name="password" placeholder="Enter password" class="pass" maxlength="20" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="signup" id="signup" value="Register"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>