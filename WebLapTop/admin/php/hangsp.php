<?php
    include('ketnoi.php');
    $p=new CheckConnection();
    if (isset($_GET['a'])){
        $a=$_GET['a'];
        if ($a=='them'){
            $ma=$_GET['mahang'];
            $ten=$_GET['tenhang'];
            $kt=0;
            $checkma="select * from hang where Mahang='$ma'";
            $result=$p->Check($checkma);
            if (mysqli_num_rows($result)>0){
                echo $kt;
            }
            else{
                $kt=1;
                $sql="INSERT INTO `hang`(`Mahang`, `Tenhang`, `TinhTrang`) VALUES ('$ma','$ten',0)";
                $p->Check($sql);
                echo $kt;
            }
        }
        if ($a=='sua'){
            $ma=$_GET['mahang'];
            $ten=$_GET['tenhang'];           
            $kt=1;
            $sql="UPDATE `hang` SET `Tenhang`='$ten' WHERE Mahang='$ma'";
            $p->Check($sql);
            echo $kt;            
        }
        if ($a=='xoa'){
            $ma=$_GET['mahang'];          
            $kt=1;
            $sql="UPDATE `hang` SET TinhTrang=1 WHERE Mahang='$ma'";
            $p->Check($sql);
            echo $kt;            
        }
    }
?>