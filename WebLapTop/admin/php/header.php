<div class="header">
    <div class="container">
        <div class="row header1">
            <div class="col-md-3 col-sm-12 logo">
                <img src="../img/Logo1.png" />
            </div>
            <div class="col-md-6 col-sm-12 title">
                <h1>Quản trị viên</h1>
                <h2>(Admin)</h2>
            </div>
            <div class="col-md-3 col-sm-12 account">
                <div><img src="../img/1.jpg" /></div>
                <div>
                    <?php 
                        include('./ketnoi.php');
                        $p=new CheckConnection();
                        $tk=$_SESSION['matk'];
                        $sql="select MaNV,Ho,Ten from nhanvien where MaTK='$tk'";
                        $result=$p->Check($sql);
                        $row=mysqli_fetch_row($result);
                        $_SESSION['ssmanv']=$row[0];
                        echo $row[1].' '.$row[2];
                    ?>
                </div>
                <div>
                    <a href="../index.php?id='dangxuat'">Đăng xuất</a>                    
                </div>                
            </div>
        </div>
    </div>
</div>