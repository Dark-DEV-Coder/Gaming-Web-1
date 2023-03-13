<?php
    include('ketnoi.php');
    $p=new CheckConnection();
     if (isset($_GET['nametkmasp']) && isset($_GET['nametkloaisp']) && isset($_GET['nametkhangsp']) && isset($_GET['nametktensp'])){
        $tkma=$_GET['nametkmasp'];
        $tkloai=$_GET['nametkloaisp'];
        $tkhang=$_GET['nametkhangsp'];
        $tkten=$_GET['nametktensp'];
        if ($tkma=="" && $tkten=="" && $tkloai=="Theo loại" && $tkhang=="Theo hãng"){                    
            $pt=1;
            if (isset($_GET['ptsp']))
                $pt=$_GET['ptsp'];
            $tu=($pt-1)*5;                    
            $sql="select * from sanpham where TinhTrang=0 limit $tu,5";        
            $result=$p->Check($sql);
            $s="";
            while($r=mysqli_fetch_array($result)){
                $s=$s."<a href='quanly.php?id=SP&ptsp=$pt&idsp=$r[0]' class='xemsp'><div class='row sp-con2'>
                    <div class='col-md-4 col-sm-4 col-xs-12'><img src='../img/$r[4]' /></div>
                    <div class='col-md-2 col-sm-2 col-xs-12 sp-con21'>$r[0]</div>
                    <div class='col-md-2 col-sm-2 col-xs-12 sp-con21'>$r[1]</div>
                    <div class='col-md-2 col-sm-2 col-xs-12 sp-con21'>$r[2]</div>
                    <div class='col-md-2 col-sm-2 col-xs-12 sp-con21'>$r[6]</div>
                </div></a>";
            }            
            $sql1="SELECT COUNT(MaNhomSP) from sanpham WHERE TinhTrang=0";
            $re1=$p->Check($sql1);
            $t=mysqli_fetch_row($re1);            
            $d=ceil($t[0]/5);          
            $spt="";
            if ($d>1){
                $spt=$spt."<div class='row sp-con3'>
                <div class='col-md-12 col-sm-12 col-xs-12 sp-con31'>";
                for ($i=1;$i<=$d;$i++){
                    if ($i==$pt)
                        $spt=$spt."<a href='quanly.php?id=SP&ptsp=$i'><div style='color:red'>$i</div></a>";
                    else
                        $spt=$spt."<a href='quanly.php?id=SP&ptsp=$i'><div>$i</div></a>";
                }
                $spt=$spt."</div></div>";
            }
            echo $s.$spt;
        }
        if ($tkma!="" && $tkten=="" && $tkloai=="Theo loại" && $tkhang=="Theo hãng"){                                                   
            $sql="select * from sanpham where TinhTrang=0 AND MaNhomSP='$tkma'";        
            $result=$p->Check($sql);
            $s="";
            $r=mysqli_fetch_row($result);
                $s=$s."<a href='quanly.php?id=SP&idsp=$r[0]' class='xemsp'><div class='row sp-con2'>
                    <div class='col-md-4 col-sm-4 col-xs-12'><img src='../img/$r[4]' /></div>
                    <div class='col-md-2 col-sm-2 col-xs-12 sp-con21'>$r[0]</div>
                    <div class='col-md-2 col-sm-2 col-xs-12 sp-con21'>$r[1]</div>
                    <div class='col-md-2 col-sm-2 col-xs-12 sp-con21'>$r[2]</div>
                    <div class='col-md-2 col-sm-2 col-xs-12 sp-con21'>$r[6]</div>
                </div></a>";                 
            echo $s;
        }
        if ($tkma=="" && $tkten=="" && $tkloai!="Theo loại" && $tkhang=="Theo hãng"){                    
            $pt=1;
            if (isset($_GET['page']))
                $pt=$_GET['page'];
            $tu=($pt-1)*5;                    
            $sql="select * from sanpham where TinhTrang=0 AND MaLoai='$tkloai' limit $tu,5";        
            $result=$p->Check($sql);
            $s="";
            while($r=mysqli_fetch_array($result)){
                $s=$s."<a href='quanly.php?id=SP&ptsp=$pt&idsp=$r[0]' class='xemsp'><div class='row sp-con2'>
                    <div class='col-md-4 col-sm-4 col-xs-12'><img src='../img/$r[4]' /></div>
                    <div class='col-md-2 col-sm-2 col-xs-12 sp-con21'>$r[0]</div>
                    <div class='col-md-2 col-sm-2 col-xs-12 sp-con21'>$r[1]</div>
                    <div class='col-md-2 col-sm-2 col-xs-12 sp-con21'>$r[2]</div>
                    <div class='col-md-2 col-sm-2 col-xs-12 sp-con21'>$r[6]</div>
                </div></a>";
            }            
            $sql1="SELECT COUNT(MaNhomSP) from sanpham WHERE TinhTrang=0 AND MaLoai='$tkloai'";
            $re1=$p->Check($sql1);
            $t=mysqli_fetch_row($re1);            
            $d=ceil($t[0]/5);          
            $spt="";
            if ($d>1){
                $spt=$spt."<div class='row sp-con3'>
                <div class='col-md-12 col-sm-12 col-xs-12 sp-con31'>";
                for ($i=1;$i<=$d;$i++){
                    if ($i==$pt)
                        $spt=$spt."<a href='#' page='$i' class='pttkloaisp'><div style='color:red'>$i</div></a>";
                    else
                        $spt=$spt."<a href='#' page='$i' class='pttkloaisp'><div>$i</div></a>";
                }
                $spt=$spt."</div></div>";
            }
            echo $s.$spt;
        }
        if ($tkma=="" && $tkten=="" && $tkloai=="Theo loại" && $tkhang!="Theo hãng"){                    
            $pt=1;
            if (isset($_GET['page']))
                $pt=$_GET['page'];
            $tu=($pt-1)*5;                    
            $sql="select * from sanpham where TinhTrang=0 AND MaHang='$tkhang' limit $tu,5";        
            $result=$p->Check($sql);
            $s="";
            while($r=mysqli_fetch_array($result)){
                $s=$s."<a href='quanly.php?id=SP&ptsp=$pt&idsp=$r[0]' class='xemsp'><div class='row sp-con2'>
                    <div class='col-md-4 col-sm-4 col-xs-12'><img src='../img/$r[4]' /></div>
                    <div class='col-md-2 col-sm-2 col-xs-12 sp-con21'>$r[0]</div>
                    <div class='col-md-2 col-sm-2 col-xs-12 sp-con21'>$r[1]</div>
                    <div class='col-md-2 col-sm-2 col-xs-12 sp-con21'>$r[2]</div>
                    <div class='col-md-2 col-sm-2 col-xs-12 sp-con21'>$r[6]</div>
                </div></a>";
            }            
            $sql1="SELECT COUNT(MaNhomSP) from sanpham WHERE TinhTrang=0 AND MaHang='$tkhang'";
            $re1=$p->Check($sql1);
            $t=mysqli_fetch_row($re1);            
            $d=ceil($t[0]/5);          
            $spt="";
            if ($d>1){
                $spt=$spt."<div class='row sp-con3'>
                <div class='col-md-12 col-sm-12 col-xs-12 sp-con31'>";
                for ($i=1;$i<=$d;$i++){
                    if ($i==$pt)
                        $spt=$spt."<a href='#' page='$i' class='pttkhangsp'><div style='color:red'>$i</div></a>";
                    else
                        $spt=$spt."<a href='#' page='$i' class='pttkhangsp'><div>$i</div></a>";
                }
                $spt=$spt."</div></div>";
            }
            echo $s.$spt;
        }
        if ($tkma=="" && $tkten!="" && $tkloai=="Theo loại" && $tkhang=="Theo hãng"){                                                   
            $sql="select * from sanpham where TinhTrang=0 AND TenSP='$tkten'";        
            $result=$p->Check($sql);
            $s="";
            $r=mysqli_fetch_row($result);
                $s=$s."<a href='quanly.php?id=SP&idsp=$r[0]' class='xemsp'><div class='row sp-con2'>
                    <div class='col-md-4 col-sm-4 col-xs-12'><img src='../img/$r[4]' /></div>
                    <div class='col-md-2 col-sm-2 col-xs-12 sp-con21'>$r[0]</div>
                    <div class='col-md-2 col-sm-2 col-xs-12 sp-con21'>$r[1]</div>
                    <div class='col-md-2 col-sm-2 col-xs-12 sp-con21'>$r[2]</div>
                    <div class='col-md-2 col-sm-2 col-xs-12 sp-con21'>$r[6]</div>
                </div></a>";                 
            echo $s;
        }
     }
?>
<script>
    $(document).ready(function(){        
        $("#form-btsua").click(function(){
            var ma=$("#idsuaxoamasp").val();
            var loai=$("#idsuaxoaloaisp").val();
            var hang=$("#idsuaxoahangsp").val();
            var ten=$("#idsuaxoatensp").val();
            var hinh=$("#idsuaxoahinhsp").val();
            var mota=$("#idsuaxoamotasp").val();              
            if (ma==""){
                alert("Chưa nhập mã sản phẩm");
                $("#idsuaxoamasp").focus();
                return false;
            }
            if (loai=="Chọn loại"){
                alert("Chưa chọn loại sản phẩm");
                $("#idsuaxoaloaisp").focus();
                return false;
            }
            if (hang=="Chọn hãng"){
                alert("Chưa chọn hãng sản phẩm");
                $("#idsuaxoahangsp").focus();
                return false;
            }
            if (ten==""){
                alert("Chưa nhập tên sản phẩm");
                $("#idsuaxoatensp").focus();
                return false;
            }
            if (mota==""){
                alert("Chưa nhập mô tả sản phẩm");
                $("#idsuaxoamotasp").focus();
                return false;
            }            
            $.get("./suaxoasp.php",{id345:'sua',suaxoamasp:ma,suaxoaloaisp:loai,suaxoahangsp:hang,suaxoatensp:ten,suaxoahinhsp:hinh,suaxoamotasp:mota},function(data){
                alert("Sửa thành công");           
            });
        });
        $("#form-btxoa").click(function(){
            if(confirm('Bạn có chắc muốn xóa')){
                var ma=$("#idsuaxoamasp").val();
                var loai=$("#idsuaxoaloaisp").val();
                var hang=$("#idsuaxoahangsp").val();
                var ten=$("#idsuaxoatensp").val();
                var hinh=$("#idsuaxoahinhsp").val();
                var mota=$("#idsuaxoamotasp").val();              
                if (ma==""){
                    alert("Chưa nhập mã sản phẩm");
                    $("#idsuaxoamasp").focus();
                    return false;
                }
                if (loai=="Chọn loại"){
                    alert("Chưa chọn loại sản phẩm");
                    $("#idsuaxoaloaisp").focus();
                    return false;
                }
                if (hang=="Chọn hãng"){
                    alert("Chưa chọn hãng sản phẩm");
                    $("#idsuaxoahangsp").focus();
                    return false;
                }
                if (ten==""){
                    alert("Chưa nhập tên sản phẩm");
                    $("#idsuaxoatensp").focus();
                    return false;
                }
                if (mota==""){
                    alert("Chưa nhập mô tả sản phẩm");
                    $("#idsuaxoamotasp").focus();
                    return false;
                }            
                $.get("./suaxoasp.php",{id345:'xoa',suaxoamasp:ma,suaxoaloaisp:loai,suaxoahangsp:hang,suaxoatensp:ten,suaxoahinhsp:hinh,suaxoamotasp:mota},function(data){
                    alert("Xóa thành công");           
                });
            }
        });
        $(".pttkloaisp").click(function(){
            var ma=$("#tk-masp").val();
            var loai=$("#tk-loaisp").val();
            var hang=$("#tk-hangsp").val();
            var ten=$("#tk-tensp").val();
            var page=$(this).attr('page');        
            $.get("./timkiemsp.php",{page:page,nametkmasp:ma,nametkloaisp:loai,nametkhangsp:hang,nametktensp:ten},function(data){
                $("#hienthisp").html(data);                               
            });
        });
        $(".pttkhangsp").click(function(){
            var ma=$("#tk-masp").val();
            var loai=$("#tk-loaisp").val();
            var hang=$("#tk-hangsp").val();
            var ten=$("#tk-tensp").val();
            var page=$(this).attr('page');        
            $.get("./timkiemsp.php",{page:page,nametkmasp:ma,nametkloaisp:loai,nametkhangsp:hang,nametktensp:ten},function(data){
                $("#hienthisp").html(data);                               
            });
        });
    });
</script>