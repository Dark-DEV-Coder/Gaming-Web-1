<?php
    include('ketnoi.php');
    include('xulydulieu.php');
    $p=new CheckConnection();
    $p1=new Xuly();
    if (isset($_GET['kieu'])){
        $kieu=$_GET['kieu'];
        if ($kieu=='timkiem'){
            $pt=1;
            if (isset($_GET['idpt']))
                $pt=$_GET['idpt'];
            $mabh=$_GET['mabh'];
            $masp=$_GET['masp'];
            $tu=$_GET['tu'];
            $den=$_GET['den'];
            $s="";
            if ($mabh=="" && $masp=="" && $tu=="" && $den==""){
                $tu=($pt-1)*5;
                $sql="select * from phieubaohanh limit $tu,5";
                $r=$p->Check($sql);
                $sql1="select * from phieubaohanh";
                $r1=$p->Check($sql1);
                while($t=mysqli_fetch_array($r)){
                    $date=$p1->Chuyenngaythuan($t[2]);
                    $date1=$p1->Chuyenngaythuan($t[3]);
                    $k="";
                    if ($t[4]==0)
                        $k="Còn hạn";
                    else
                        $k="Hết hạn";
                    $s=$s."<div class='row conbh3'>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$t[0]</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$t[1]</div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>$date</div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>$date1</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$k</div>
                        </div>";
                }
                $d=mysqli_num_rows($r1);
                $d1=ceil($d/5);
                if ($d1>1){
                    $s=$s."<div class='row conbh4'>
                    <div class='col-md-12 col-sm-12 col-xs-12 ptbh'>";
                    for ($i=1;$i<=$d1;$i++){
                        if ($i==$pt)
                            $s=$s."<div page='$i' style='background-color:red'>$i</div>";
                        else
                            $s=$s."<div page='$i'>$i</div>";
                    }
                    $s=$s."</div>
                        </div>";
                }
                echo $s;
            }
            if ($mabh!="" && $masp=="" && $tu=="" && $den==""){
                $tu=($pt-1)*5;
                $sql="select * from phieubaohanh where MaBaoHanh='$mabh'";
                $r=$p->Check($sql);           
                while($t=mysqli_fetch_array($r)){
                    $date=$p1->Chuyenngaythuan($t[2]);
                    $date1=$p1->Chuyenngaythuan($t[3]);
                    $k="";
                    if ($t[4]==0)
                        $k="Còn hạn";
                    else
                        $k="Hết hạn";
                    $s=$s."<div class='row conbh3'>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$t[0]</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$t[1]</div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>$date</div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>$date1</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$k</div>
                        </div>";
                }                
                echo $s;
            }
            if ($mabh=="" && $masp!="" && $tu=="" && $den==""){
                $tu=($pt-1)*5;
                $sql="select * from phieubaohanh where MaSanPham='$masp'";
                $r=$p->Check($sql);           
                while($t=mysqli_fetch_array($r)){
                    $date=$p1->Chuyenngaythuan($t[2]);
                    $date1=$p1->Chuyenngaythuan($t[3]);
                    $k="";
                    if ($t[4]==0)
                        $k="Còn hạn";
                    else
                        $k="Hết hạn";
                    $s=$s."<div class='row conbh3'>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$t[0]</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$t[1]</div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>$date</div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>$date1</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$k</div>
                        </div>";
                }                
                echo $s;
            }
            if ($mabh=="" && $masp=="" && $tu!="" && $den!=""){
                $i=-1;
                if ($den<$tu){
                    $i=0;
                    echo $i;
                }
                else{
                    $tu1=($pt-1)*5;
                    $sql="select * from phieubaohanh where TuNgay>='$tu' AND DenNgay<='$den' OR DenNgay<='$den' 
                    AND DenNgay>='$tu' OR TuNgay>='$tu' AND TuNgay<='$den' OR TuNgay<'$tu' AND DenNgay>'$den' limit $tu1,5";
                    $sql1="select * from phieubaohanh where TuNgay>='$tu' AND DenNgay<='$den' OR DenNgay<='$den' 
                    AND DenNgay>='$tu' OR TuNgay>='$tu' AND TuNgay<='$den' OR TuNgay<'$tu' AND DenNgay>'$den'";
                    $r=$p->Check($sql);
                    $r1=$p->Check($sql1);           
                    while($t=mysqli_fetch_array($r)){
                        $date=$p1->Chuyenngaythuan($t[2]);
                        $date1=$p1->Chuyenngaythuan($t[3]);
                        $k="";
                        if ($t[4]==0)
                            $k="Còn hạn";
                        else
                            $k="Hết hạn";
                        $s=$s."<div class='row conbh3'>
                                <div class='col-md-2 col-sm-2 col-xs-12'>$t[0]</div>
                                <div class='col-md-2 col-sm-2 col-xs-12'>$t[1]</div>
                                <div class='col-md-3 col-sm-3 col-xs-12'>$date</div>
                                <div class='col-md-3 col-sm-3 col-xs-12'>$date1</div>
                                <div class='col-md-2 col-sm-2 col-xs-12'>$k</div>
                            </div>";
                    } 
                    $d=mysqli_num_rows($r1);
                    $d1=ceil($d/5);
                    if ($d1>1){
                        $s=$s."<div class='row conbh4'>
                        <div class='col-md-12 col-sm-12 col-xs-12 ptbh'>";
                        for ($i=1;$i<=$d1;$i++){
                            if ($i==$pt)
                                $s=$s."<div page='$i' style='background-color:red'>$i</div>";
                            else
                                $s=$s."<div page='$i'>$i</div>";
                        }
                        $s=$s."</div>
                            </div>";
                    }               
                    echo $s;
                }
            }
        }
    }
?>
<script>
    $(document).ready(function(){
        $(".ptbh div").click(function(){
            var mabh=$("#tk-maphieu").val();
            var masp=$("#tk-masp").val();
            var tu=$("#tk-tungay").val();
            var den=$("#tk-denngay").val();
            var p=$(this).attr('page');
            $.get("./timkiempbh.php",{kieu:'timkiem',idpt:p,mabh:mabh,masp:masp,tu:tu,den:den},function(data){
                $("#hienbh").html(data);
            });
        });
    });
</script>