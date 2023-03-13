<?php
    include('ketnoi.php');
    include('xulydulieu.php');
    if (isset($_GET['t'])){
        $k1=$_GET['t'];
        if ($k1=='pt'){
            $pt=1;
            if (isset($_GET['page']))
                $pt=$_GET['page'];
            $tu=($pt-1)*5;
            $sql="select * from phieunhaphang where TinhTrang=0 limit $tu,5";
            $sql1="select * from phieunhaphang where TinhTrang=0";
            $p=new CheckConnection();
            $p1=new Xuly();
            $re=$p->Check($sql);
            $re1=$p->Check($sql1);
            $s="";
            while($row=mysqli_fetch_array($re)){
                $date=$p1->Chuyenngaythuan($row[3]);
                $tien=$p1->Chuyentien($row[4]);
                $s=$s."<a href='./quanly.php?id=PNH&idpn=$row[0]' class='xemctpn'><div class='row pn2'>
                    <div class='col-md-2 col-sm-2 col-xs-12'>$row[0]</div>
                    <div class='col-md-2 col-sm-4 col-xs-12'>$row[1]</div>
                    <div class='col-md-2 col-sm-2 col-xs-12'>$row[2]</div>
                    <div class='col-md-3 col-sm-4 col-xs-12'>$date</div>
                    <div class='col-md-3 col-sm-4 col-xs-12'>$tien</div>
                </div></a>";
            }
            $d=mysqli_num_rows($re1);
            $d1=ceil($d/5);
            if ($d1>1){
                $s=$s."<div class='row row-ptpn'>
                <div class='col-md-12 col-sm-12 col-xs-12 ptpn'>";
                for($i=1;$i<=$d1;$i++){
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
        if ($k1=='timkiem'){
            $mapn=$_GET['pn'];
            $mancc=$_GET['ncc'];
            if ($mapn=="" && $mancc=="Chọn"){
                $pt=1;
                if (isset($_GET['page']))
                    $pt=$_GET['page'];
                $tu=($pt-1)*5;
                $sql="select * from phieunhaphang where TinhTrang=0 limit $tu,5";
                $sql1="select * from phieunhaphang where TinhTrang=0";
                $p=new CheckConnection();
                $p1=new Xuly();
                $re=$p->Check($sql);
                $re1=$p->Check($sql1);
                $s="";
                while($row=mysqli_fetch_array($re)){
                    $date=$p1->Chuyenngaythuan($row[3]);
                    $tien=$p1->Chuyentien($row[4]);
                    $s=$s."<a href='./quanly.php?id=PNH&idpn=$row[0]' class='xemctpn'><div class='row pn2'>
                        <div class='col-md-2 col-sm-2 col-xs-12'>$row[0]</div>
                        <div class='col-md-2 col-sm-4 col-xs-12'>$row[1]</div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>$row[2]</div>
                        <div class='col-md-3 col-sm-4 col-xs-12'>$date</div>
                        <div class='col-md-3 col-sm-4 col-xs-12'>$tien</div>
                    </div></a>";
                }
                $d=mysqli_num_rows($re1);
                $d1=ceil($d/5);
                if ($d1>1){
                    $s=$s."<div class='row row-ptpn'>
                    <div class='col-md-12 col-sm-12 col-xs-12 ptpn'>";
                    for($i=1;$i<=$d1;$i++){
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
            if ($mapn!="" && $mancc=="Chọn"){
                $pt=1;
                if (isset($_GET['page']))
                    $pt=$_GET['page'];
                $tu=($pt-1)*5;
                $sql="select * from phieunhaphang where TinhTrang=0 AND MaPN='$mapn'";
                $p=new CheckConnection();
                $p1=new Xuly();
                $re=$p->Check($sql);
                $s="";
                $row=mysqli_fetch_row($re);
                    $date=$p1->Chuyenngaythuan($row[3]);
                    $tien=$p1->Chuyentien($row[4]);
                    $s=$s."<a href='./quanly.php?id=PNH&idpn=$row[0]' class='xemctpn'><div class='row pn2'>
                        <div class='col-md-2 col-sm-2 col-xs-12'>$row[0]</div>
                        <div class='col-md-2 col-sm-4 col-xs-12'>$row[1]</div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>$row[2]</div>
                        <div class='col-md-3 col-sm-4 col-xs-12'>$date</div>
                        <div class='col-md-3 col-sm-4 col-xs-12'>$tien</div>
                    </div></a>";                               
                echo $s;
            }
            if ($mapn=="" && $mancc!="Chọn"){
                $pt=1;
                if (isset($_GET['page']))
                    $pt=$_GET['page'];
                $tu=($pt-1)*5;
                $sql="select * from phieunhaphang where TinhTrang=0 AND MaNCC='$mancc' limit $tu,5";
                $sql1="select * from phieunhaphang where TinhTrang=0 AND MaNCC='$mancc'";
                $p=new CheckConnection();
                $p1=new Xuly();
                $re=$p->Check($sql);
                $re1=$p->Check($sql1);
                $s="";
                while($row=mysqli_fetch_array($re)){
                    $date=$p1->Chuyenngaythuan($row[3]);
                    $tien=$p1->Chuyentien($row[4]);
                    $s=$s."<a href='./quanly.php?id=PNH&idpn=$row[0]' class='xemctpn'><div class='row pn2'>
                        <div class='col-md-2 col-sm-2 col-xs-12'>$row[0]</div>
                        <div class='col-md-2 col-sm-4 col-xs-12'>$row[1]</div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>$row[2]</div>
                        <div class='col-md-3 col-sm-4 col-xs-12'>$date</div>
                        <div class='col-md-3 col-sm-4 col-xs-12'>$tien</div>
                    </div></a>";
                }
                $d=mysqli_num_rows($re1);
                $d1=ceil($d/5);
                if ($d1>1){
                    $s=$s."<div class='row row-ptpn'>
                    <div class='col-md-12 col-sm-12 col-xs-12 ptpn'>";
                    for($i=1;$i<=$d1;$i++){
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
?> 
<script>
    $(document).ready(function(){
        $(".ptpn div").click(function(){
            var p=$(this).attr('page');
            $.get("./phantrangpn.php",{t:'pt',page:p},function(data){
                console.log(data);
                $("#hienpn").html(data);
            });
        });
        $("#tkpn").click(function(){
            var mapn=$("#themmapn").val();
            var mancc=$("#themmancc").val();            
            $.get("./phantrangpn.php",{t:'timkiem',pn:mapn,ncc:mancc},function(data){
                $("#hienpn").html(data);
            });
        });
    });
</script>    