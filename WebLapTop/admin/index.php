<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="./css/header.css">
        <link rel="stylesheet" type="text/css" href="./css/menu.css">
        <link rel="stylesheet" type="text/css" href="./css/content.css">
        <link rel="stylesheet" type="text/css" href="./css/index.css">
        <script type="text/javascript" src="./js/jquery.js"></script>
        <style>
            body{
                background-color: rgb(36, 36, 36);
                position: relative;
            }
        </style>
        <script>
            function ktra(){                            
                var user=document.getElementById('dn-user');
                var pass=document.getElementById('dn-pass');
                if (user.value==""){                   
                    document.getElementById('baoloiuser').innerHTML="Chưa nhập tên đăng nhập";
                    user.focus();
                    return false;
                }
                if (pass.value==""){
                    document.getElementById('baoloipass').innerHTML="Chưa nhập mật khẩu";
                    pass.focus();
                    return false;
                }
                return true;
            }
        </script>
    </head>
    <body>
        <?php
            if (isset($_SESSION['matk']) && isset($_SESSION['maquyen'])){
                unset($_SESSION['matk']);
                unset($_SESSION['maquyen']);
            }
        ?>
        <div class="container dn">
            <div class="row row-dn">
                <div class="col-md-6 col-sm-6 col-xs-12 logo1">
                    <img src="./img/Logo1.png" />
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 user">
                    <form method="POST" action="./index.php" onsubmit="return ktra();">
                        <div class="row dnrow1">
                            <div>Tên đăng nhập</div>
                            <div><input type="text" name="txtuser" placeholder="Tên đăng nhập" id="dn-user" /></div>
                            <div id="baoloiuser"></div>
                        </div>
                        <div class="row dnrow2">
                            <div>Mật khẩu</div>
                            <div><input type="password" name="txtpass" placeholder="Mật khẩu" id="dn-pass" /></div>
                            <div id="baoloipass"></div>
                        </div>
                        <div class="row dnrow3">
                            <div class="erro">
                                <?php                                     
                                    if (isset($_POST['txtuser']) && isset($_POST['txtpass'])){
                                        $user=$_POST['txtuser'];
                                        $pass=$_POST['txtpass'];
                                        include('./php/ketnoi.php');
                                        $p=new CheckConnection();
                                        $sql="select MaTK,MaQuyen from taikhoan where Username='$user' AND Password='$pass' AND TinhTrang=1 AND MaQuyen!='KH'";
                                        $result=$p->Check($sql);
                                        if (mysqli_num_rows($result)>0){
                                            $row=mysqli_fetch_row($result);
                                            $_SESSION['matk']=$row[0];
                                            $_SESSION['maquyen']=$row[1];
                                            header("Location: ./php/quanly.php");                                                                                       
                                        }
                                        else
                                            echo 'Sai tên đăng nhập hoặc mật khẩu';                                        
                                    }
                                ?>
                            </div>
                            <div><input type="submit" value="Đăng nhập" id="btlogin" /></div>
                        </div>
                    </form>
                        <div class="row dnrow4">
                            <a href="../index.php">Quay lại trang chủ</a>
                        </div>                   
                </div>
            </div>
        </div>             
    </body>
</html>