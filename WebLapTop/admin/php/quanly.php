<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/header.css">
        <link rel="stylesheet" type="text/css" href="../css/menu1.css">
        <link rel="stylesheet" type="text/css" href="../css/content.css">
        <link rel="stylesheet" type="text/css" href="../css/index.css">
        <script type="text/javascript" src="../js/jquery.js"></script>
        <style>
            body{
                background-color: rgb(36, 36, 36);
                position: relative;
            }
        </style>        
    </head>
    <body>
        <?php
            session_start();           
            if (isset($_SESSION['matk']) && isset($_SESSION['maquyen'])){                              
                require('./header.php'); 
                require('./menu.php'); 
                require('./content.php'); 
            }
        ?>   
    </body>
</html>