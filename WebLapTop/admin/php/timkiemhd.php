<?php
    include('ketnoi.php');
    include('xulydulieu.php');
    if (isset($_GET['x'])){
        $x=$_GET['x'];
        if ($x%2==0){
            $hd="";
            $pt=1;
            $tu=($pt-1)*5;            
            $sql="SELECT * FROM hoadon WHERE TinhTrang=1 OR TinhTrang=2 ORDER BY MaHD ASC limit $tu,5";
            $sql1="select * from hoadon where TinhTrang=1 OR TinhTrang=2";
            $p=new CheckConnection();
            $p1=new Xuly();
            $result=$p->Check($sql);
            $result1=$p->Check($sql1);
            $s="";
            while($row=mysqli_fetch_array($result)){
                $date=$p1->Chuyenngaythuan($row[3]);                       
                $s=$s." <div class='row hiennhieuhd' p='$row[0]'>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$row[0]</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$row[1]</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$row[2]</div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>$date</div>";
                if ($row[5]==1)                    
                    $s=$s."<div class='col-md-3 col-sm-3 col-xs-12'>Chưa xử lý</div>
                        </div>";
                if ($row[5]==2)                    
                    $s=$s."<div class='col-md-3 col-sm-3 col-xs-12'>Đã xử lý</div>
                        </div>";
            } 
            $hd=$hd.$s;                         
            $d=mysqli_num_rows($result1);
            $d1=ceil($d/5);
            if ($d1>1){
                $hd=$hd."<div class='row m1'>
                <div class='col-md-12 col-sm-12 col-xs-12 pthd'>";
                for ($i=1;$i<=$d1;$i++){
                    if ($i==$pt)
                        $hd=$hd."<div page='$i' style='background-color:red'>$i</div>";
                    else
                        $hd=$hd."<div page='$i'>$i</div>";
                }
                $hd=$hd."</div></div>";
            }
            echo $hd;
        }
        else{
            $hd="";
            $pt=1;
            $tu=($pt-1)*5;            
            $sql="SELECT * FROM hoadon WHERE TinhTrang=1 OR TinhTrang=2 ORDER BY MaHD DESC limit $tu,5";
            $sql1="select * from hoadon where TinhTrang=1 OR TinhTrang=2";
            $p=new CheckConnection();
            $p1=new Xuly();
            $result=$p->Check($sql);
            $result1=$p->Check($sql1);
            $s="";
            while($row=mysqli_fetch_array($result)){
                $date=$p1->Chuyenngaythuan($row[3]);                       
                $s=$s." <div class='row hiennhieuhd' p='$row[0]'>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$row[0]</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$row[1]</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$row[2]</div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>$date</div>";
                if ($row[5]==1)                    
                    $s=$s."<div class='col-md-3 col-sm-3 col-xs-12'>Chưa xử lý</div>
                        </div>";
                if ($row[5]==2)                    
                    $s=$s."<div class='col-md-3 col-sm-3 col-xs-12'>Đã xử lý</div>
                        </div>";
            } 
            $hd=$hd.$s;                         
            $d=mysqli_num_rows($result1);
            $d1=ceil($d/5);
            if ($d1>1){
                $hd=$hd."<div class='row m1'>
                <div class='col-md-12 col-sm-12 col-xs-12 pthd'>";
                for ($i=1;$i<=$d1;$i++){
                    if ($i==$pt)
                        $hd=$hd."<div page='$i' style='background-color:red'>$i</div>";
                    else
                        $hd=$hd."<div page='$i'>$i</div>";
                }
                $hd=$hd."</div></div>";
            }
            echo $hd;
        }
    }
    if (isset($_GET['mahd']) && isset($_GET['manv']) && isset($_GET['makh']) && isset($_GET['tungay']) && isset($_GET['denngay'])){
        $mahd=$_GET['mahd'];
        $manv=$_GET['manv'];
        $makh=$_GET['makh'];
        $tungay=$_GET['tungay'];
        $denngay=$_GET['denngay'];
        if ($mahd=="" && $manv=="" && $makh=="" && $tungay=="" && $denngay==""){
            $pt=1;
            if (isset($_GET['idpt']))
                $pt=$_GET['idpt'];                
            $tu=($pt-1)*5;            
            $sql="select * from hoadon where TinhTrang=1 OR TinhTrang=2 limit $tu,5";
            $sql1="select * from hoadon where TinhTrang=1 OR TinhTrang=2";
            $p=new CheckConnection();
            $p1=new Xuly();
            $result=$p->Check($sql);
            $result1=$p->Check($sql1);
            $hd="";
            $s="";
            if (mysqli_num_rows($result1)>0){
                while($row=mysqli_fetch_array($result)){
                    $date=$p1->Chuyenngaythuan($row[3]);                       
                    $s=$s." <div class='row hiennhieuhd' p='$row[0]'>
                                <div class='col-md-2 col-sm-2 col-xs-12'>$row[0]</div>
                                <div class='col-md-2 col-sm-2 col-xs-12'>$row[1]</div>
                                <div class='col-md-2 col-sm-2 col-xs-12'>$row[2]</div>
                                <div class='col-md-3 col-sm-3 col-xs-12'>$date</div>";
                    if ($row[5]==1)                    
                        $s=$s."<div class='col-md-3 col-sm-3 col-xs-12'>Chưa xử lý</div>
                            </div>";
                    if ($row[5]==2)                    
                        $s=$s."<div class='col-md-3 col-sm-3 col-xs-12'>Đã xử lý</div>
                            </div>";
                } 
                $hd=$hd.$s;        
                $d=mysqli_num_rows($result1);
                $d1=ceil($d/5);
                if ($d1>1){
                    $hd=$hd."<div class='row m1'>
                    <div class='col-md-12 col-sm-12 col-xs-12 pthd'>";
                    for ($i=1;$i<=$d1;$i++){
                        if ($i==$pt)
                            $hd=$hd."<div page='$i' style='background-color:red'>$i</div>";
                        else
                            $hd=$hd."<div page='$i'>$i</div>";
                    }
                    $hd=$hd."</div></div>";
                }
                echo $hd;     
            }
            else
                echo "<div style='color:rgb(228,208,119)'>Không tìm thấy</div>";                 
        }
        if ($mahd!="" && $manv=="" && $makh=="" && $tungay=="" && $denngay==""){
            $pt=1;
            if (isset($_GET['idpt']))
                $pt=$_GET['idpt'];                
            $tu=($pt-1)*5;            
            $sql="select * from hoadon where TinhTrang=1 OR TinhTrang=2 AND MaHD='$mahd'";
            $p=new CheckConnection();
            $p1=new Xuly();
            $result=$p->Check($sql);
            $hd="";
            $s="";
            $row=mysqli_fetch_row($result);
            $date=$p1->Chuyenngaythuan($row[3]);                       
            $s=$s." <div class='row hiennhieuhd' p='$row[0]'>
                        <div class='col-md-2 col-sm-2 col-xs-12'>$row[0]</div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>$row[1]</div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>$row[2]</div>
                        <div class='col-md-3 col-sm-3 col-xs-12'>$date</div>";
            if ($row[5]==1)                    
                $s=$s."<div class='col-md-3 col-sm-3 col-xs-12'>Chưa xử lý</div>
                    </div>";
            if ($row[5]==2)                    
                $s=$s."<div class='col-md-3 col-sm-3 col-xs-12'>Đã xử lý</div>
                    </div>";
            $hd=$hd.$s;                    
            echo $hd;            
            
                // echo "<div style='color:rgb(228,208,119)'>Không tìm thấy</div>";          
        }
        if ($mahd=="" && $manv!="" && $makh=="" && $tungay=="" && $denngay==""){
            $pt=1;
            if (isset($_GET['idpt']))
                $pt=$_GET['idpt'];                
            $tu=($pt-1)*5;            
            $sql="select * from hoadon where MaNV='$manv' AND TinhTrang=1 OR TinhTrang=2 AND MaNV='$manv' limit $tu,5";
            $sql1="select * from hoadon where MaNV='$manv' AND TinhTrang=1 OR TinhTrang=2 AND MaNV='$manv'";
            $p=new CheckConnection();
            $p1=new Xuly();
            $result=$p->Check($sql);
            $result1=$p->Check($sql1);
            $hd="";
            $s="";
            while($row=mysqli_fetch_array($result)){
                $date=$p1->Chuyenngaythuan($row[3]);                       
                $s=$s." <div class='row hiennhieuhd' p='$row[0]'>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$row[0]</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$row[1]</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$row[2]</div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>$date</div>";
                if ($row[5]==1)                    
                    $s=$s."<div class='col-md-3 col-sm-3 col-xs-12'>Chưa xử lý</div>
                        </div>";
                if ($row[5]==2)                    
                    $s=$s."<div class='col-md-3 col-sm-3 col-xs-12'>Đã xử lý</div>
                        </div>";
            } 
            $hd=$hd.$s;        
            $d=mysqli_num_rows($result1);
            $d1=ceil($d/5);
            if ($d1>1){
                $hd=$hd."<div class='row m1'>
                <div class='col-md-12 col-sm-12 col-xs-12 pthd'>";
                for ($i=1;$i<=$d1;$i++){
                    if ($i==$pt)
                        $hd=$hd."<div page='$i' style='background-color:red'>$i</div>";
                    else
                        $hd=$hd."<div page='$i'>$i</div>";
                }
                $hd=$hd."</div></div>";
            }
            echo $hd;                      
        }
        if ($mahd=="" && $manv=="" && $makh!="" && $tungay=="" && $denngay==""){
            $pt=1;
            if (isset($_GET['idpt']))
                $pt=$_GET['idpt'];                
            $tu=($pt-1)*5;            
            $sql="select * from hoadon where MaKH='$makh' AND TinhTrang=1 OR TinhTrang=2 AND MaKH='$makh' limit $tu,5";
            $sql1="select * from hoadon where MaKH='$makh' AND TinhTrang=1 OR TinhTrang=2 AND MaKH='$makh'";
            $p=new CheckConnection();
            $p1=new Xuly();
            $result=$p->Check($sql);
            $result1=$p->Check($sql1);
            $hd="";
            $s="";
            while($row=mysqli_fetch_array($result)){
                $date=$p1->Chuyenngaythuan($row[3]);                       
                $s=$s." <div class='row hiennhieuhd' p='$row[0]'>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$row[0]</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$row[1]</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$row[2]</div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>$date</div>";
                if ($row[5]==1)                    
                    $s=$s."<div class='col-md-3 col-sm-3 col-xs-12'>Chưa xử lý</div>
                        </div>";
                if ($row[5]==2)                    
                    $s=$s."<div class='col-md-3 col-sm-3 col-xs-12'>Đã xử lý</div>
                        </div>";
            } 
            $hd=$hd.$s;        
            $d=mysqli_num_rows($result1);
            $d1=ceil($d/5);
            if ($d1>1){
                $hd=$hd."<div class='row m1'>
                <div class='col-md-12 col-sm-12 col-xs-12 pthd'>";
                for ($i=1;$i<=$d1;$i++){
                    if ($i==$pt)
                        $hd=$hd."<div page='$i' style='background-color:red'>$i</div>";
                    else
                        $hd=$hd."<div page='$i'>$i</div>";
                }
                $hd=$hd."</div></div>";
            }
            echo $hd;                      
        }
        if ($mahd=="" && $manv!="" && $makh!="" && $tungay=="" && $denngay==""){
            $pt=1;
            if (isset($_GET['idpt']))
                $pt=$_GET['idpt'];                
            $tu=($pt-1)*5;            
            $sql="select * from hoadon where MaNV='$manv' AND MaKH='$makh' AND TinhTrang=1 OR TinhTrang=2 AND MaKH='$makh' AND MaNV='$manv' limit $tu,5";
            $sql1="select * from hoadon where MaNV='$manv' AND MaKH='$makh' AND TinhTrang=1 OR TinhTrang=2 AND MaKH='$makh' AND MaNV='$manv'";
            $p=new CheckConnection();
            $p1=new Xuly();
            $result=$p->Check($sql);
            $result1=$p->Check($sql1);
            $hd="";
            $s="";
            while($row=mysqli_fetch_array($result)){
                $date=$p1->Chuyenngaythuan($row[3]);                       
                $s=$s." <div class='row hiennhieuhd' p='$row[0]'>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$row[0]</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$row[1]</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$row[2]</div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>$date</div>";
                if ($row[5]==1)                    
                    $s=$s."<div class='col-md-3 col-sm-3 col-xs-12'>Chưa xử lý</div>
                        </div>";
                if ($row[5]==2)                    
                    $s=$s."<div class='col-md-3 col-sm-3 col-xs-12'>Đã xử lý</div>
                        </div>";
            } 
            $hd=$hd.$s;        
            $d=mysqli_num_rows($result1);
            $d1=ceil($d/5);
            if ($d1>1){
                $hd=$hd."<div class='row m1'>
                <div class='col-md-12 col-sm-12 col-xs-12 pthd'>";
                for ($i=1;$i<=$d1;$i++){
                    if ($i==$pt)
                        $hd=$hd."<div page='$i' style='background-color:red'>$i</div>";
                    else
                        $hd=$hd."<div page='$i'>$i</div>";
                }
                $hd=$hd."</div></div>";
            }
            echo $hd;                      
        }
        if ($mahd=="" && $manv=="" && $makh=="" && $tungay!="" && $denngay!=""){
            $t=-1;
            if ($denngay<$tungay){
                $t=0;
                echo $t;
            }
            else{
                $pt=1;
                if (isset($_GET['idpt']))
                    $pt=$_GET['idpt'];                
                $tu=($pt-1)*5;            
                $sql="SELECT * from hoadon WHERE NgayLapHD>='$tungay' AND NgayLapHD<='$denngay' AND TinhTrang=1 OR NgayLapHD>='$tungay' AND NgayLapHD<='$denngay' AND TinhTrang=2 limit $tu,5";
                $sql1="SELECT * from hoadon WHERE NgayLapHD>='$tungay' AND NgayLapHD<='$denngay' AND TinhTrang=1 OR NgayLapHD>='$tungay' AND NgayLapHD<='$denngay' AND TinhTrang=2";
                $p=new CheckConnection();
                $p1=new Xuly();
                $result=$p->Check($sql);
                $result1=$p->Check($sql1);
                $hd="";
                $s="";
                while($row=mysqli_fetch_array($result)){
                    $date=$p1->Chuyenngaythuan($row[3]);                       
                    $s=$s." <div class='row hiennhieuhd' p='$row[0]'>
                                <div class='col-md-2 col-sm-2 col-xs-12'>$row[0]</div>
                                <div class='col-md-2 col-sm-2 col-xs-12'>$row[1]</div>
                                <div class='col-md-2 col-sm-2 col-xs-12'>$row[2]</div>
                                <div class='col-md-3 col-sm-3 col-xs-12'>$date</div>";
                    if ($row[5]==1)                    
                        $s=$s."<div class='col-md-3 col-sm-3 col-xs-12'>Chưa xử lý</div>
                            </div>";
                    if ($row[5]==2)                    
                        $s=$s."<div class='col-md-3 col-sm-3 col-xs-12'>Đã xử lý</div>
                            </div>";
                } 
                $hd=$hd.$s;        
                $d=mysqli_num_rows($result1);
                $d1=ceil($d/5);
                if ($d1>1){
                    $hd=$hd."<div class='row m1'>
                    <div class='col-md-12 col-sm-12 col-xs-12 pthd'>";
                    for ($i=1;$i<=$d1;$i++){
                        if ($i==$pt)
                            $hd=$hd."<div page='$i' style='background-color:red'>$i</div>";
                        else
                            $hd=$hd."<div page='$i'>$i</div>";
                    }
                    $hd=$hd."</div></div>";
                }
                echo $hd;    
            }                  
        }
    }
?>
<script>
    function tatct(){
        document.getElementById('xemcthd').style.display='none';
    }
    $(document).ready(function(){
        $(".hiennhieuhd").click(function(){
            var ma=$(this).attr('p');
            $.get("./xemcthoadon.php",{cthd:ma},function(data){
                $("#xemcthd").html(data);
                $("#xemcthd").css("display","block");
            });
        });
        $(".pthd div").click(function(){
            var mahd=$("#tk-mahd").val();
            var manv=$("#tk-manv").val();
            var makh=$("#tk-makh").val();
            var tungay=$("#tk-tungay").val();
            var denngay=$("#tk-denngay").val();  
            var page=$(this).attr('page');         
            $.get("./timkiemhd.php",{idpt:page,mahd,manv:manv,makh:makh,tungay:tungay,denngay:denngay},function(data){
                $("#hienhd").html(data);
            });
        });
    });
</script>  