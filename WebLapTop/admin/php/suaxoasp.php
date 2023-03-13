<?php
    include('ketnoi.php');
    $p=new CheckConnection();
    if (isset($_GET['id345'])){
        $suaxoa=$_GET['id345'];
        if ($suaxoa=='sua'){            
            if (isset($_GET['suaxoamasp']) && isset($_GET['suaxoaloaisp']) && isset($_GET['suaxoahangsp']) && isset($_GET['suaxoatensp']) &&isset($_GET['suaxoahinhsp']) && isset($_GET['suaxoamotasp'])){                
                $ma=$_GET['suaxoamasp'];
                $loai=$_GET['suaxoaloaisp'];
                $hang=$_GET['suaxoahangsp'];
                $ten=$_GET['suaxoatensp'];
                $hinh=$_GET['suaxoahinhsp'];
                $mota=$_GET['suaxoamotasp'];                
                $h="";
                for ($i=12;$i<strlen($hinh);$i++)
                    $h=$h.$hinh[$i];
                if ($hinh=="sanpham.jfif")
                    $h=$hinh;                                                         
                if ($hinh==""){
                    $sql="UPDATE `sanpham` SET `MaLoai`='$loai',`MaHang`='$hang',
                            `TenSP`='$ten',`MoTa`='$mota' WHERE MaNhomSP='$ma'";                    
                    $re2=$p->Check($sql);
                }
                else{
                    $sql="UPDATE `sanpham` SET `MaLoai`='$loai',`MaHang`='$hang',
                            `TenSP`='$ten',`TenHinh`='$h',`MoTa`='$mota' WHERE MaNhomSP='$ma'";                   
                    $re2=$p->Check($sql);
                }                     
            }
        }
        if ($suaxoa=='xoa'){            
            if (isset($_GET['suaxoamasp']) && isset($_GET['suaxoaloaisp']) && isset($_GET['suaxoahangsp']) && isset($_GET['suaxoatensp']) &&isset($_GET['suaxoahinhsp']) && isset($_GET['suaxoamotasp'])){                
                $ma=$_GET['suaxoamasp'];
                $loai=$_GET['suaxoaloaisp'];
                $hang=$_GET['suaxoahangsp'];
                $ten=$_GET['suaxoatensp'];
                $hinh=$_GET['suaxoahinhsp'];
                $mota=$_GET['suaxoamotasp'];                                                                                                 
                $sql="UPDATE `sanpham` SET TinhTrang=1 WHERE MaNhomSP='$ma'";                    
                $re2=$p->Check($sql);                   
            }
        }
    }
?>