<?php       
    include('ketnoi.php');
    include('xulydulieu.php');
    $p=new CheckConnection();
    $p1=new Xuly();
    if (isset($_GET['tkma']) && isset($_GET['tkgt']) && isset($_GET['tkhoten'])){
        $tkma=$_GET['tkma'];
        $gt=$_GET['tkgt'];
        $tkhoten=$_GET['tkhoten'];
        $tkgt=-1;
        $s="";
        if ($gt=="Giới tính")
            $tkgt=-1;
        if ($gt=="Nam")
            $tkgt=0;
        if ($gt=="Nữ")
            $tkgt=1;
        $idpt=1;
        if (isset($_GET['idpt']))
            $idpt=$_GET['idpt'];
        $trang=($idpt-1)*5;
        $den=$trang+5;
        $a=-1;
        if ($tkma=="" && $tkhoten=="" && $tkgt==-1){
            $sql0="select * from nhanvien where TinhTrang=0 limit $trang,$den";
            $sql01="select * from nhanvien where TinhTrang=0";
            $re0=$p->Check($sql0);
            $re01=$p->Check($sql01);
            while($row0=mysqli_fetch_array($re0)){
                $date=$p1->Chuyenngaythuan($row0[6]);
                $s=$s."<div class='row con5'  id='$row0[0]'>
                        <div class='col-md-2 col-sm-2'>$row0[0]</div>
                        <div class='col-md-4 col-sm-2'>$row0[2]".' '."$row0[3]</div>";
                if ($row0[7]==0)
                    $s=$s."<div class='col-md-2 col-sm-2'>Nam</div>";
                else
                    $s=$s."<div class='col-md-2 col-sm-2'>Nữ</div>";
                $s=$s."<div class='col-md-2 col-sm-2'>$date</div>
                        <div class='col-md-2 col-sm-2'>$row0[5]</div>
                    </div>";   
                            
            }   
            $a=0;
        } 
        if ($tkma!="" && $tkhoten=="" && $tkgt==-1){
            $sql1="select * from nhanvien where TinhTrang=0 AND MaNV='$tkma'";
            $re1=$p->Check($sql1);
            while($row1=mysqli_fetch_array($re1)){
                $date=$p1->Chuyenngaythuan($row1[6]);
                $s=$s."<div class='row con5'  id='$row1[0]'>
                        <div class='col-md-2 col-sm-2'>$row1[0]</div>
                        <div class='col-md-4 col-sm-2'>$row1[2]".' '."$row1[3]</div>";
                if ($row1[7]==0)
                    $s=$s."<div class='col-md-2 col-sm-2'>Nam</div>";
                else
                    $s=$s."<div class='col-md-2 col-sm-2'>Nữ</div>";
                $s=$s."<div class='col-md-2 col-sm-2'>$date</div>
                        <div class='col-md-2 col-sm-2'>$row1[5]</div>
                    </div>";   
                            
            }   
            $a=1;
        }  
        if ($tkma=="" && $tkhoten=="" && $tkgt!=-1){
            if ($tkgt==0){
                $sql2="select * from nhanvien where TinhTrang=0 AND GioiTinh=0 limit $trang,$den";
                $sql21="select * from nhanvien where TinhTrang=0 AND GioiTinh=0";
            }
            if ($tkgt==1){
                $sql2="select * from nhanvien where TinhTrang=0 AND GioiTinh=1 limit $trang,$den";
                $sql21="select * from nhanvien where TinhTrang=0 AND GioiTinh=1";
            }
            $re2=$p->Check($sql2);
            $re21=$p->Check($sql21);
            while($row2=mysqli_fetch_array($re2)){
                $date=$p1->Chuyenngaythuan($row2[6]);
                $s=$s."<div class='row con5'  id='$row2[0]'>
                        <div class='col-md-2 col-sm-2'>$row2[0]</div>
                        <div class='col-md-4 col-sm-2'>$row2[2]".' '."$row2[3]</div>";
                if ($row2[7]==0)
                    $s=$s."<div class='col-md-2 col-sm-2'>Nam</div>";
                else
                    $s=$s."<div class='col-md-2 col-sm-2'>Nữ</div>";
                $s=$s."<div class='col-md-2 col-sm-2'>$date</div>
                        <div class='col-md-2 col-sm-2'>$row2[5]</div>
                    </div>";   
                            
            }
            $a=2;
        }
        if ($tkma=="" && $tkhoten!="" && $tkgt==-1){            
            $sql3="select * from nhanvien where TinhTrang=0 limit $trang,$den";            
            $re3=$p->Check($sql3);
            $sql31="select * from nhanvien where TinhTrang=0";            
            $re31=$p->Check($sql31);
            while($row3=mysqli_fetch_array($re3)){
                $hoten=$row3[2].' '.$row3[3];
                if ($tkhoten==$hoten){
                    $date=$p1->Chuyenngaythuan($row3[6]);
                    $s=$s."<div class='row con5'  id='$row3[0]'>
                            <div class='col-md-2 col-sm-2'>$row3[0]</div>
                            <div class='col-md-4 col-sm-2'>$row3[2]".' '."$row3[3]</div>";
                    if ($row3[7]==0)
                        $s=$s."<div class='col-md-2 col-sm-2'>Nam</div>";
                    else
                        $s=$s."<div class='col-md-2 col-sm-2'>Nữ</div>";
                    $s=$s."<div class='col-md-2 col-sm-2'>$date</div>
                            <div class='col-md-2 col-sm-2'>$row3[5]</div>
                        </div>";   
                }  
            }
            $a=3;
        } 
        if ($tkma=="" && $tkhoten!="" && $tkgt!=-1){
            if ($tkgt==0){
                $sql4="select * from nhanvien where TinhTrang=0 AND GioiTinh=0 limit $trang,$den";
                $sql41="select * from nhanvien where TinhTrang=0 AND GioiTinh=0";
            }
            if ($tkgt==1){
                $sql4="select * from nhanvien where TinhTrang=0 AND GioiTinh=1 limit $trang,$den";
                $sql41="select * from nhanvien where TinhTrang=0 AND GioiTinh=1";
            }
            $re4=$p->Check($sql4);
            $re41=$p->Check($sql41);
            while($row4=mysqli_fetch_array($re4)){
                $hoten=$row4[2].' '.$row4[3];
                if ($tkhoten==$hoten){
                    $date=$p1->Chuyenngaythuan($row4[6]);
                    $s=$s."<div class='row con5'  id='$row4[0]'>
                            <div class='col-md-2 col-sm-2'>$row4[0]</div>
                            <div class='col-md-4 col-sm-2'>$row4[2]".' '."$row4[3]</div>";
                    if ($row4[7]==0)
                        $s=$s."<div class='col-md-2 col-sm-2'>Nam</div>";
                    else
                        $s=$s."<div class='col-md-2 col-sm-2'>Nữ</div>";
                    $s=$s."<div class='col-md-2 col-sm-2'>$date</div>
                            <div class='col-md-2 col-sm-2'>$row4[5]</div>
                        </div>";   
                }
            }
            $a=4;
        }
        $d=0;
        if ($a==0)
            $d=mysqli_num_rows($re01);
        if ($a==1)
            $d=mysqli_num_rows($re1);
        if ($a==2)
            $d=mysqli_num_rows($re21);
        if ($a==3)
            $d=mysqli_num_rows($re31);
        if ($a==4)
            $d=mysqli_num_rows($re41);                   
        $d1=ceil($d/5);
        $spt="";
        if ($d1>1){
            $spt=$spt."<div class='row con6' page1='$d1'>
            <div class='col-md-12 col-sm-12 con6-row'>";
            for ($i=0;$i<$d1;$i++){
                $l=$i+1;
                if ($l==$idpt)
                    $spt=$spt."<div id='$l' style='background-color:red'>$l</div>";
                else
                    $spt=$spt."<div id='$l'>$l</div>";
            }
            $spt=$spt."</div></div>";
        }
        echo $s.$spt;
    }
?>
<script>
        $(document).ready(function(){
            $(".con5").click(function(){
                var s=$(this).attr('id');             
                $.get("./xemchitietnv.php",{idctkh:s}, function(data){
                    $("#ctkh").html(data);
                    $("#ctkh").css("display","block");
                })
            });                        
            $(".con6-row div").click(function(){
                var pt=$(this).attr('id');
                var page=$(".con6").attr('page1');
                var ma=$("#tk-manv").val();
                var hoten=$("#tk-hotennv").val();
                var gt=$("#tk-gtnv").val(); 
                $.get("./timkiemnv.php",{id:'NV',idpt:pt,page:page,tkma:ma,tkgt:gt,tkhoten:hoten},function(data){
                    $("#kh-pt").html(data);
                });
            });            
        });
        function exitctkh(){
            document.getElementById('ctkh').style.display="none";
        }        
</script> 