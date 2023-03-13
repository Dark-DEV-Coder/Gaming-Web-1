<?php
    session_start();
    include('ketnoi.php');
    if (isset($_GET['kieu'])){
        $kieu=$_GET['kieu'];
        if ($kieu=='them'){
            $p=new CheckConnection();
            $mapn=$_GET['pn'];
            $mancc=$_GET['ncc'];
            $manv=$_SESSION['ssmanv'];
            $today=date("Y-m-d");  
            $kt=1;
            $check="select * from phieunhaphang where MaPN='$mapn'";
            $rc=$p->Check($check);
            if (mysqli_num_rows($rc)>0){
                $kt=0;
            }
            else{          
                $sql="INSERT INTO `phieunhaphang`(`MaPN`, `MaNCC`, `MaNV`, `NgayNhap`, `TongTien`, `TinhTrang`) 
                VALUES ('$mapn','$mancc','$manv','$today',0,0)";            
                $p->Check($sql);
            }
            echo $kt;
        }
        if ($kieu=='sua'){
            $mapn=$_GET['mpn'];
            $mancc=$_GET['mncc'];
            $sql="UPDATE `phieunhaphang` SET `MaNCC`='$mancc' WHERE MaPN='$mapn'";
            $p=new CheckConnection();
            $p->Check($sql);
        }
        if ($kieu=='xoa'){
            $mapn=$_GET['mpn'];
            $sql="UPDATE `phieunhaphang` SET TinhTrang=1 WHERE MaPN='$mapn'";
            $p=new CheckConnection();
            $p->Check($sql);
        }
        if ($kieu=='themctpn'){
            $p=new CheckConnection();
            $mapn=$_GET['mapn'];
            $masp=$_GET['ma'];
            $sl=$_GET['sl'];
            $gia=$_GET['gia'];
            $t2="select COUNT(MaSanPham) as dem from chitietsanpham where MaNhomSP='$masp'";
            $r0=$p->Check($t2);
            echo $t2;
            $d=mysqli_fetch_row($r0);
            $stt=$d[0]+1;
            for ($i=0;$i<$sl;$i++){
                $h=$masp."SP".$stt;
                $t3="INSERT INTO `chitietsanpham`(`MaSanPham`, `MaNhomSP`, `TinhTrang`,`stt`) 
                VALUES ('$h','$masp',0,$stt)";
                $p->Check($t3);
                $stt++;
            }
            $h=$masp."SP".$stt;
            echo $t2.'      '.$d[0].'       '.$h;
            $kt=0;
            $ctpn="select * from chitietphieunhaphang where MaPN='$mapn'";
            $r1=$p->Check($ctpn);
            while($a1=mysqli_fetch_array($r1)){                
                if ($masp==$a1[1]){
                    $s=$sl+$a1[3];
                    $sql2="UPDATE chitietphieunhaphang SET SoLuong=$s Where MaPN='$a1[0]' AND MaNhomSP='$a1[1]'";
                    $p->Check($sql2);
                    $sp="select SoLuong from sanpham where MaNhomSP='$masp'";
                    $r=$p->Check($sp);
                    $a=mysqli_fetch_row($r);
                    $soluongmoi=$sl+$a[0];
                    $upsp="UPDATE sanpham SET SoLuong=$soluongmoi where MaNhomSP='$masp'";
                    $p->Check($upsp);
                    $kt=1;
                }
            }
            if ($kt==0){                
                $sql="INSERT INTO `chitietphieunhaphang`(`MaPN`, `MaNhomSP`, `DonGia`, `SoLuong`) 
                VALUES ('$mapn','$masp',$gia,$sl)";
                $p->Check($sql);
                $sp="select SoLuong from sanpham where MaNhomSP='$masp'";
                $r=$p->Check($sp);
                $a=mysqli_fetch_row($r);
                $soluongmoi=$sl+$a[0];
                $upsp="UPDATE sanpham SET GiaGoc=$gia, SoLuong=$soluongmoi where MaNhomSP='$masp'";
                $p->Check($upsp);
                $ctpn="select * from chitietphieunhaphang where MaPN='$mapn'";
                $r1=$p->Check($ctpn);
                $tongtien=0;
                while($a1=mysqli_fetch_array($r1)){
                    $tongtien=$tongtien+($a1[2]*$a1[3]);                    
                }
                $sql1="UPDATE `phieunhaphang` SET TongTien=$tongtien WHERE MaPN='$mapn'";
                $p->Check($sql1);
            }                        
        }
        if ($kieu=='xoactpn'){
            $p=new CheckConnection();
            $mapn=$_GET['mapn'];
            $masp=$_GET['masp'];
            $p=new CheckConnection();
            $t1="SELECT * FROM `chitietsanpham` WHERE MaNhomSP='$masp' AND TinhTrang=0 ORDER BY stt ASC";  
            $k1=$p->Check($t1);                     
            $s1="select SoLuong from chitietphieunhaphang where MaPN='$mapn' AND MaNhomSP='$masp'";
            $r1=$p->Check($s1);
            $a1=mysqli_fetch_row($r1);   
            $z=$a1[0];
            while($t2=mysqli_fetch_array($k1)){
                $sl1="DELETE FROM `chitietsanpham` WHERE MaSanPham='$t2[0]'";
                $p->Check($sl1);
                $z--;
                if ($z==0)
                    break;
            }         
            $sp="select SoLuong from sanpham where MaNhomSP='$masp'";
            $r2=$p->Check($sp);
            $a2=mysqli_fetch_row($r2);            
            $soluongmoi=$a2[0]-$a1[0];
            $upsp="UPDATE sanpham SET SoLuong=$soluongmoi where MaNhomSP='$masp'";
            $p->Check($upsp);
            $sql="DELETE FROM `chitietphieunhaphang` WHERE MaPN='$mapn' AND MaNhomSP='$masp'";
            $p->Check($sql);
            $ctpn="select * from chitietphieunhaphang where MaPN='$mapn'";
            $r3=$p->Check($ctpn);
            $tongtien=0;
            while($a3=mysqli_fetch_array($r3)){
                $tongtien=$tongtien+($a3[2]*$a3[3]);                    
            }
            $sql1="UPDATE `phieunhaphang` SET TongTien=$tongtien WHERE MaPN='$mapn'";
            $p->Check($sql1);
        }
        if ($kieu=='suancc'){
            $p=new CheckConnection();
            $mancc=$_GET['ma'];
            $tenncc=$_GET['tenncc'];
            $sql="UPDATE nhacungcap SET TenNCC='$tenncc' where MaNCC='$mancc'";
            $p->Check($sql);
        }
        if ($kieu=='xoancc'){
            $p=new CheckConnection();
            $mancc=$_GET['ma'];
            $sql="UPDATE nhacungcap SET TinhTrang=1 where MaNCC='$mancc'";
            $p->Check($sql);
        }
        if ($kieu=='themncc'){
            $p=new CheckConnection();
            $mancc=$_GET['mancc'];
            $tenncc=$_GET['tenncc'];
            $check="select * from nhacungcap where MaNCC='$mancc'";
            $c=$p->Check($check);
            $kt=1;
            if (mysqli_num_rows($c)>0)
                $kt=0;
            else{
                $sql="INSERT INTO `nhacungcap`(`MaNCC`, `TenNCC`, `TinhTrang`) VALUES ('$mancc','$tenncc',0)";
                $p->Check($sql);                
            }
            echo $kt;
        }
    }
?>