<?php
    include('ketnoi.php');
    $p=new CheckConnection();
    if (isset($_GET['a'])){
        $a=$_GET['a'];
        if ($a=='them'){
            $ma=$_GET['maloai'];
            $ten=$_GET['tenloai'];
            $kt=0;
            $checkma="select * from loai where MaLoai='$ma'";
            $result=$p->Check($checkma);
            if (mysqli_num_rows($result)>0){
                echo $kt;
            }
            else{
                $kt=1;
                $sql="INSERT INTO `loai`(`MaLoai`, `TenLoai`, `TinhTrang`) VALUES ('$ma','$ten',0)";
                $p->Check($sql);
                echo $kt;
            }
        }
        if ($a=='sua'){
            $ma=$_GET['maloai'];
            $ten=$_GET['tenloai'];           
            $kt=1;
            $sql="UPDATE `loai` SET `TenLoai`='$ten' WHERE MaLoai='$ma'";
            $p->Check($sql);
            echo $kt;            
        }
        if ($a=='xoa'){
            $ma=$_GET['maloai'];          
            $kt=1;
            $sql="UPDATE `loai` SET TinhTrang=1 WHERE MaLoai='$ma'";
            $p->Check($sql);
            echo $kt;            
        }
    }
?>