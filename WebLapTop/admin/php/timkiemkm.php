<?php
    include('ketnoi.php');
    include('xulydulieu.php');
    $p=new CheckConnection();
    $p1=new Xuly();
    if (isset($_GET['kieu'])){
        $kieu=$_GET['kieu'];
        if ($kieu=='tk'){
            $makm=$_GET['makm'];
            $tenkm=$_GET['tenkm'];
            $tu=$_GET['tungay'];
            $den=$_GET['denngay'];
            $tt=$_GET['tt'];
            $kt=-1;                       
            if ($makm=="" && $tenkm=="" && $tu=="" && $den=="" && $tt=="Theo tình trạng"){
                $pt=1;
                if (isset($_GET['idpt']))
                    $pt=$_GET['idpt'];
                $s="";
                $tu=($pt-1)*5;
                $sql3="select * from khuyenmai where TinhTrang!=3 limit $tu,5";
                $sql4="select * from khuyenmai where TinhTrang!=3";            
                $r3=$p->Check($sql3);
                $r4=$p->Check($sql4);
                while($t3=mysqli_fetch_array($r3)){
                    $k1="";
                    if ($t3[4]==0)
                        $k1="Còn hạn";
                    if ($t3[4]==1)
                        $k1="Hết hạn";
                    if ($t3[4]==2)
                        $k1="Chưa đến hạn";
                    $date=$p1->Chuyenngaythuan($t3[2]);
                    $date1=$p1->Chuyenngaythuan($t3[3]);
                    $s=$s."<div class='row conkm3' p='$t3[0]'>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$t3[0]</div>
                            <div class='col-md-4 col-sm-3 col-xs-12'>$t3[1]</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$date</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$date1</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$k1</div>
                        </div>";                
                }            
                $d=mysqli_num_rows($r4);
                $d1=ceil($d/5);
                if ($d1>1){
                    $s=$s."<div class='row conkm4'>
                    <div class='col-md-12 col-sm-12 col-xs-12 ptkm'>";
                    for ($i=1;$i<=$d1;$i++){
                        if ($i==$pt)
                            $s=$s."<div page='$i' style='background-color:red'>$i</div>";
                        else
                            $s=$s."<div page='$i'>$i</div>";
                    }
                    $s=$s."</div>
                        </div>   ";
                }
                echo $s;
            }
            if ($makm!="" && $tenkm=="" && $tu=="" && $den=="" && $tt=="Theo tình trạng"){
                $pt=1;
                if (isset($_GET['idpt']))
                    $pt=$_GET['idpt'];
                $s="";
                $tu=($pt-1)*5;
                $sql3="select * from khuyenmai where MaKM='$makm'";           
                $r3=$p->Check($sql3);
                if (mysqli_num_rows($r3)>0){
                    $t3=mysqli_fetch_row($r3);
                        $k1="";
                        if ($t3[4]==0)
                            $k1="Còn hạn";
                        if ($t3[4]==1)
                            $k1="Hết hạn";
                        if ($t3[4]==2)
                            $k1="Chưa đến hạn";
                        $date=$p1->Chuyenngaythuan($t3[2]);
                        $date1=$p1->Chuyenngaythuan($t3[3]);
                        $s=$s."<div class='row conkm3' p='$t3[0]'>
                                <div class='col-md-2 col-sm-2 col-xs-12'>$t3[0]</div>
                                <div class='col-md-4 col-sm-3 col-xs-12'>$t3[1]</div>
                                <div class='col-md-2 col-sm-2 col-xs-12'>$date</div>
                                <div class='col-md-2 col-sm-2 col-xs-12'>$date1</div>
                                <div class='col-md-2 col-sm-2 col-xs-12'>$k1</div>
                            </div>";                                                           
                    echo $s;
                }
                else{
                    echo "<div style='color:rgb(228,208,119)'>Không tìm thấy</div>";
                }
            }
            if ($makm=="" && $tenkm!="" && $tu=="" && $den=="" && $tt=="Theo tình trạng"){
                $pt=1;
                if (isset($_GET['idpt']))
                    $pt=$_GET['idpt'];
                $s="";
                $tu=($pt-1)*5;
                $sql3="select * from khuyenmai where TenCTKM='$tenkm'";           
                $r3=$p->Check($sql3);
                if (mysqli_num_rows($r3)>0){
                    $t3=mysqli_fetch_row($r3);
                        $k1="";
                        if ($t3[4]==0)
                            $k1="Còn hạn";
                        if ($t3[4]==1)
                            $k1="Hết hạn";
                        if ($t3[4]==2)
                            $k1="Chưa đến hạn";
                        $date=$p1->Chuyenngaythuan($t3[2]);
                        $date1=$p1->Chuyenngaythuan($t3[3]);
                        $s=$s."<div class='row conkm3' p='$t3[0]'>
                                <div class='col-md-2 col-sm-2 col-xs-12'>$t3[0]</div>
                                <div class='col-md-4 col-sm-3 col-xs-12'>$t3[1]</div>
                                <div class='col-md-2 col-sm-2 col-xs-12'>$date</div>
                                <div class='col-md-2 col-sm-2 col-xs-12'>$date1</div>
                                <div class='col-md-2 col-sm-2 col-xs-12'>$k1</div>
                            </div>";                                                           
                    echo $s;
                }
                else{
                    echo "<div style='color:rgb(228,208,119)'>Không tìm thấy</div>";
                }
            }
            if ($makm=="" && $tenkm=="" && $tu=="" && $den=="" && $tt!="Theo tình trạng"){
                $i=-1;
                if ($tt=='Còn hạn')
                    $i=0;
                if ($tt=='Hết hạn')
                    $i=1;
                if ($tt=='Chưa đến hạn')
                    $i=2;
                $pt=1;
                if (isset($_GET['idpt']))
                    $pt=$_GET['idpt'];
                $s="";
                $tu=($pt-1)*5;
                $sql3="select * from khuyenmai where TinhTrang=$i limit $tu,5";
                $sql4="select * from khuyenmai where TinhTrang=$i";            
                $r3=$p->Check($sql3);
                $r4=$p->Check($sql4);
                if (mysqli_num_rows($r3)>0){
                    while($t3=mysqli_fetch_array($r3)){
                        $k1="";
                        if ($t3[4]==0)
                            $k1="Còn hạn";
                        if ($t3[4]==1)
                            $k1="Hết hạn";
                        if ($t3[4]==2)
                            $k1="Chưa đến hạn";
                        $date=$p1->Chuyenngaythuan($t3[2]);
                        $date1=$p1->Chuyenngaythuan($t3[3]);
                        $s=$s."<div class='row conkm3' p='$t3[0]'>
                                <div class='col-md-2 col-sm-2 col-xs-12'>$t3[0]</div>
                                <div class='col-md-4 col-sm-3 col-xs-12'>$t3[1]</div>
                                <div class='col-md-2 col-sm-2 col-xs-12'>$date</div>
                                <div class='col-md-2 col-sm-2 col-xs-12'>$date1</div>
                                <div class='col-md-2 col-sm-2 col-xs-12'>$k1</div>
                            </div>";                
                    }            
                    $d=mysqli_num_rows($r4);
                    $d1=ceil($d/5);
                    if ($d1>1){
                        $s=$s."<div class='row conkm4'>
                        <div class='col-md-12 col-sm-12 col-xs-12 ptkm'>";
                        for ($i=1;$i<=$d1;$i++){
                            if ($i==$pt)
                                $s=$s."<div page='$i' style='background-color:red'>$i</div>";
                            else
                                $s=$s."<div page='$i'>$i</div>";
                        }
                        $s=$s."</div>
                            </div>   ";
                    }
                    echo $s;
                }
                else{
                    echo "<div style='color:rgb(228,208,119)'>Không tìm thấy</div>";
                }
            }
            if ($makm=="" && $tenkm=="" && $tu!="" && $den!="" && $tt=="Theo tình trạng"){
                if ($den<$tu){
                    $kt=0;    
                    echo $kt;
                }
                else{ 
                    $pt=1;
                    if (isset($_GET['idpt']))
                        $pt=$_GET['idpt'];
                    $s="";
                    $tu=($pt-1)*5;
                    $sql3="select * from khuyenmai where NgayBatDau>='$tu' AND TinhTrang!=3 AND NgayBatDau<'$den' AND NgayKetThuc>'$tu' 
                    AND NgayKetThuc<='$den' OR NgayKetThuc>'$tu' AND TinhTrang!=3 OR NgayBatDau<'$den' AND TinhTrang!=3 OR NgayBatDau<='$tu' 
                    AND NgayKetThuc>='$den' AND TinhTrang!=3 limit $tu,5";
                    $sql4="select * from khuyenmai where NgayBatDau>='$tu' AND TinhTrang!=3 AND NgayBatDau<'$den' AND NgayKetThuc>'$tu' 
                    AND NgayKetThuc<='$den' OR NgayKetThuc>'$tu' AND TinhTrang!=3 OR NgayBatDau<'$den' AND TinhTrang!=3 OR NgayBatDau<='$tu' 
                    AND NgayKetThuc>='$den' AND TinhTrang!=3";            
                    $r3=$p->Check($sql3);
                    $r4=$p->Check($sql4);
                    if (mysqli_num_rows($r3)>0){
                        while($t3=mysqli_fetch_array($r3)){
                            $k1="";
                            if ($t3[4]==0)
                                $k1="Còn hạn";
                            if ($t3[4]==1)
                                $k1="Hết hạn";
                            if ($t3[4]==2)
                                $k1="Chưa đến hạn";
                            $date=$p1->Chuyenngaythuan($t3[2]);
                            $date1=$p1->Chuyenngaythuan($t3[3]);
                            $s=$s."<div class='row conkm3' p='$t3[0]'>
                                    <div class='col-md-2 col-sm-2 col-xs-12'>$t3[0]</div>
                                    <div class='col-md-4 col-sm-3 col-xs-12'>$t3[1]</div>
                                    <div class='col-md-2 col-sm-2 col-xs-12'>$date</div>
                                    <div class='col-md-2 col-sm-2 col-xs-12'>$date1</div>
                                    <div class='col-md-2 col-sm-2 col-xs-12'>$k1</div>
                                </div>";                
                        }            
                        $d=mysqli_num_rows($r4);
                        $d1=ceil($d/5);
                        if ($d1>1){
                            $s=$s."<div class='row conkm4'>
                            <div class='col-md-12 col-sm-12 col-xs-12 ptkm'>";
                            for ($i=1;$i<=$d1;$i++){
                                if ($i==$pt)
                                    $s=$s."<div page='$i' style='background-color:red'>$i</div>";
                                else
                                    $s=$s."<div page='$i'>$i</div>";
                            }
                            $s=$s."</div>
                                </div>   ";
                        }
                        echo $s;
                    }
                    else{
                        echo "<div style='color:rgb(228,208,119)'>Không tìm thấy</div>";
                    }
                }
            }    
            if ($makm=="" && $tenkm=="" && $tu!="" && $den!="" && $tt!="Theo tình trạng"){
                $i=-1;
                if ($tt=='Còn hạn')
                    $i=0;
                if ($tt=='Hết hạn')
                    $i=1;
                if ($tt=='Chưa đến hạn')
                    $i=2;
                if ($den<$tu){
                    $kt=0;    
                    echo $kt;
                }
                else{ 
                    $pt=1;
                    if (isset($_GET['idpt']))
                        $pt=$_GET['idpt'];
                    $s="";
                    $tu=($pt-1)*5;
                    $sql3="select * from khuyenmai where NgayBatDau>='$tu' AND NgayBatDau<'$den' AND NgayKetThuc>'$tu' 
                    AND NgayKetThuc<='$den' AND TinhTrang=$i OR NgayKetThuc>'$tu' AND TinhTrang=$i OR NgayBatDau<'$den' AND TinhTrang=$i OR NgayBatDau<='$tu' 
                    AND NgayKetThuc>='$den' AND TinhTrang=$i limit $tu,5";
                    $sql4="select * from khuyenmai where NgayBatDau>='$tu' AND NgayBatDau<'$den' AND NgayKetThuc>'$tu' 
                    AND NgayKetThuc<='$den' AND TinhTrang=$i OR NgayKetThuc>'$tu' AND TinhTrang=$i OR NgayBatDau<'$den' AND TinhTrang=$i OR NgayBatDau<='$tu' 
                    AND NgayKetThuc>='$den' AND TinhTrang=$i";            
                    $r3=$p->Check($sql3);
                    $r4=$p->Check($sql4);
                    if (mysqli_num_rows($r3)>0){
                        while($t3=mysqli_fetch_array($r3)){
                            $k1="";
                            if ($t3[4]==0)
                                $k1="Còn hạn";
                            if ($t3[4]==1)
                                $k1="Hết hạn";
                            if ($t3[4]==2)
                                $k1="Chưa đến hạn";
                            $date=$p1->Chuyenngaythuan($t3[2]);
                            $date1=$p1->Chuyenngaythuan($t3[3]);
                            $s=$s."<div class='row conkm3' p='$t3[0]'>
                                    <div class='col-md-2 col-sm-2 col-xs-12'>$t3[0]</div>
                                    <div class='col-md-4 col-sm-3 col-xs-12'>$t3[1]</div>
                                    <div class='col-md-2 col-sm-2 col-xs-12'>$date</div>
                                    <div class='col-md-2 col-sm-2 col-xs-12'>$date1</div>
                                    <div class='col-md-2 col-sm-2 col-xs-12'>$k1</div>
                                </div>";                
                        }            
                        $d=mysqli_num_rows($r4);
                        $d1=ceil($d/5);
                        if ($d1>1){
                            $s=$s."<div class='row conkm4'>
                            <div class='col-md-12 col-sm-12 col-xs-12 ptkm'>";
                            for ($i=1;$i<=$d1;$i++){
                                if ($i==$pt)
                                    $s=$s."<div page='$i' style='background-color:red'>$i</div>";
                                else
                                    $s=$s."<div page='$i'>$i</div>";
                            }
                            $s=$s."</div>
                                </div>   ";
                        }
                        echo $s;
                    }
                    else{
                        echo "<div style='color:rgb(228,208,119)'>Không tìm thấy</div>";
                    }
                }
            }        
        }
    }
?>
<script>
    $(document).ready(function(){   
        $(".conkm3").click(function(){
            var p=$(this).attr('p');
            $.get("./phantrangkm.php",{kieu:'xemctkm',makm:p},function(data){
                $("#xemchitietkm1").html(data);
                $("#xemchitietkm1").css("display","block");
            });
        });    
        $(".ptkm div").click(function(){
            var ma=$("#tk-makm").val();
            var ten=$("#tk-tenkm").val();
            var tu=$("#tk-tungay").val();
            var den=$("#tk-denngay").val();
            var tt=$("#tk-tinhtrangkm").val();
            var p=$(this).attr('page');
            $.get("./timkiemkm.php",{kieu:'tk',idpt:p,makm:ma,tenkm:ten,tungay:tu,denngay:den,tt:tt},function(data){
                var x=data.split('<script>');
                if (x[0]==0)
                    alert("Ngày kết thúc lớn hơn ngày bắt đầu");
                else
                    $("#hienkm").html(data);
            })
        })
    });
</script>