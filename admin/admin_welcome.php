<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin - Welcome</title>
        <script src="https://code.jquery.com/jquery-3.6.0.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
        // put your code here
        include_once 'dbconfig.php';
        include_once 'admin_session.php';
        
        echo $login_session1;
        ?>
    </body>
</html>
