<?php
    include('ketnoi.php');
    include('xulydulieu.php');
    $p=new CheckConnection();
    $p1=new Xuly();
    if (isset($_GET['kieu'])){
        $kieu=$_GET['kieu'];
        if ($kieu=='them'){
            $ma=$_GET['ma'];
            $ten=$_GET['ten'];
            $bd=$_GET['bd'];
            $kt=$_GET['kt'];
            $kt1=-2;
            $check="select * from khuyenmai where MaKM='$ma'";
            $r=$p->Check($check);
            if ($kt<$bd)
                $kt1=-1;
            else{
                if (mysqli_num_rows($r)>0)
                    $kt1=0;
                else{
                    $sql="INSERT INTO khuyenmai (MaKM,TenCTKM,NgayBatDau,NgayKetThuc,TinhTrang) VALUES 
                ('$ma','$ten','$bd','$kt',0)";
                    $p->Check($sql);
                    $kt1=1;
                }
            }
            echo $kt1;
        }
        if ($kieu=='suakm'){
            $makm=$_GET['ma'];
            $tenkm=$_GET['ten'];
            $tu=$_GET['bd'];
            $den=$_GET['kt'];
            $kt=-1;
            if ($den<$tu)
                $kt=0;
            else{
                $sql="UPDATE `khuyenmai` SET `TenCTKM`='$tenkm',`NgayBatDau`='$tu',
            `NgayKetThuc`='$den' WHERE MaKM='$makm'";
                $p->Check($sql);
                $kt=1;
            }
            echo $kt;
        }
        if ($kieu=='xoakm'){
            $makm=$_GET['ma'];
            $sql="UPDATE `khuyenmai` SET TinhTrang=3 WHERE MaKM='$makm'";
            $p->Check($sql);
        }
        if ($kieu=='themctkm'){
            $makm=$_GET['makm'];
            $masp=$_GET['masp'];
            $phantram=$_GET['pt1'];
            $kt=-1;
            $check="select * from chitietkhuyenmai where MaKM='$makm' AND MaNhomSP='$masp'";
            $t=$p->Check($check);
            if (mysqli_num_rows($t)>0){
                $kt=0;
                echo $kt;
            }    
            else{            
                $sql="INSERT INTO `chitietkhuyenmai`(`MaKM`, `MaNhomSP`, `PhanTramKM`) 
                VALUES ('$makm','$masp',$phantram)";
                $p->Check($sql);
                $sql1="select * from chitietkhuyenmai where MaKM='$makm'";
                $t1=$p->Check($sql1);
                $s="";
                while($r1=mysqli_fetch_array($t1)){
                    $s=$s."<div class='row conxemctkm7'>
                                <div class='col-md-4 col-sm-3 col-xs-12'>$r1[1]</div>
                                <div class='col-md-4 col-sm-3 col-xs-12'>$r1[2]%</div>
                                <div class='col-md-4 col-sm-3 col-xs-12 chucnangxoactkm'>
                                    <div p='$makm' p1='$r1[1]'>Xóa</div>
                                </div>
                            </div>";
                }
                echo $s;
            }            
        }
        if ($kieu=='xoactkm'){
            $makm=$_GET['makm'];
            $masp=$_GET['masp'];   
            $sql="DELETE FROM `chitietkhuyenmai` WHERE MaKM='$makm' AND MaNhomSP='$masp'";
            $p->Check($sql);
            $sql1="select * from chitietkhuyenmai where MaKM='$makm'";
            $t1=$p->Check($sql1);
            $s="";
            while($r1=mysqli_fetch_array($t1)){
                $s=$s."<div class='row conxemctkm7'>
                            <div class='col-md-4 col-sm-3 col-xs-12'>$r1[1]</div>
                            <div class='col-md-4 col-sm-3 col-xs-12'>$r1[2]%</div>
                            <div class='col-md-4 col-sm-3 col-xs-12 chucnangxoactkm'>
                                <div p='$makm' p1='$r1[1]'>Xóa</div>
                            </div>
                        </div>";
            }
            echo $s;                  
        }
    }
?>
<script>
    $(document).ready(function(){
        $(".chucnangxoactkm div").click(function(){
            var p=$(this).attr('p');
            var p1=$(this).attr('p1');
            $.get("./themsuaxoakm.php",{kieu:'xoactkm',makm:p,masp:p1},function(data){
                console.log(data);
                alert("Xóa thành công");
                $("#hienctkm1").html(data);
            });
        });
    });
</script>