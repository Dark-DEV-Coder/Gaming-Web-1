<?php
    include('ketnoi.php');
    include('xulydulieu.php');
    $p=new CheckConnection();
    $p1=new Xuly();
    if (isset($_GET['matk']) && isset($_GET['maq']) && isset($_GET['ten']) && isset($_GET['tt'])){
        $matk=$_GET['matk'];
        $maquyen=$_GET['maq'];
        $tentk=$_GET['ten'];
        $tinhtrang=$_GET['tt'];
        if ($matk=="" && $maquyen=="Chọn" && $tentk=="" && $tinhtrang=="Chọn"){
            $s="";
            $pt=1;
            if (isset($_GET['idpt']))
                $pt=$_GET['idpt'];
            $tu=($pt-1)*5;                
            $sql1="select * from taikhoan where TinhTrang!=2 limit $tu,5";
            $sql2="select * from taikhoan where TinhTrang!=2";
            $r1=$p->Check($sql1);
            $r2=$p->Check($sql2);
            while($t1=mysqli_fetch_array($r1)){
                $k="";
                $date=$p1->Chuyenngaythuan($t1[5]);
                if ($t1[4]==0)
                    $k="Chưa kích hoạt";
                else
                    $k="Đã kích hoạt";
                $s=$s."<div class='row contkh4' p='$t1[0]'>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$t1[0]</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$t1[1]</div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>$t1[2]</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$k</div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>$date</div>
                        </div>";
            }
            $d=mysqli_num_rows($r2);
            $d1=ceil($d/5);
            if ($d1>1){
                $s=$s."<div class='row contkh5'>
                        <div class='col-md-12 col-sm-12 col-xs-12 pttaikhoan'>";                
                for ($i=1;$i<=$d1;$i++){
                    if ($i==$pt)
                        $s=$s."<div page='$i' style='background-color:red'>$i</div>";
                    else
                        $s=$s."<div page='$i'>$i</div>";
                }
                $s=$s."</div>
                    </div>
                </div>";
            }
            echo $s;
        }
        if ($matk!="" && $maquyen=="Chọn" && $tentk=="" && $tinhtrang=="Chọn"){
            $s="";
            $pt=1;
            if (isset($_GET['idpt']))
                $pt=$_GET['idpt'];
            $tu=($pt-1)*5;                
            $sql1="select * from taikhoan where TinhTrang!=2 AND MaTK='$matk'";
            $r1=$p->Check($sql1);
            $t1=mysqli_fetch_row($r1);
            $k="";
            $date=$p1->Chuyenngaythuan($t1[5]);
            if ($t1[4]==0)
                $k="Chưa kích hoạt";
            else
                $k="Đã kích hoạt";
            $s=$s."<div class='row contkh4' p='$t1[0]'>
                        <div class='col-md-2 col-sm-2 col-xs-12'>$t1[0]</div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>$t1[1]</div>
                        <div class='col-md-3 col-sm-3 col-xs-12'>$t1[2]</div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>$k</div>
                        <div class='col-md-3 col-sm-3 col-xs-12'>$date</div>
                    </div>";                            
            echo $s;
        }
        if ($matk=="" && $maquyen=="Chọn" && $tentk!="" && $tinhtrang=="Chọn"){
            $s="";
            $pt=1;
            if (isset($_GET['idpt']))
                $pt=$_GET['idpt'];
            $tu=($pt-1)*5;                
            $sql1="select * from taikhoan where TinhTrang!=2 AND Username='$tentk'";
            $r1=$p->Check($sql1);
            $t1=mysqli_fetch_row($r1);
            $k="";
            $date=$p1->Chuyenngaythuan($t1[5]);
            if ($t1[4]==0)
                $k="Chưa kích hoạt";
            else
                $k="Đã kích hoạt";
            $s=$s."<div class='row contkh4' p='$t1[0]'>
                        <div class='col-md-2 col-sm-2 col-xs-12'>$t1[0]</div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>$t1[1]</div>
                        <div class='col-md-3 col-sm-3 col-xs-12'>$t1[2]</div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>$k</div>
                        <div class='col-md-3 col-sm-3 col-xs-12'>$date</div>
                    </div>";                            
            echo $s;
        }
        if ($matk=="" && $maquyen!="Chọn" && $tentk=="" && $tinhtrang=="Chọn"){
            $s="";
            $pt=1;
            if (isset($_GET['idpt']))
                $pt=$_GET['idpt'];
            $tu=($pt-1)*5;                
            $sql1="select * from taikhoan where TinhTrang!=2 AND MaQuyen='$maquyen' limit $tu,5";
            $sql2="select * from taikhoan where TinhTrang!=2 AND MaQuyen='$maquyen'";
            $r1=$p->Check($sql1);
            $r2=$p->Check($sql2);
            while($t1=mysqli_fetch_array($r1)){
                $k="";
                $date=$p1->Chuyenngaythuan($t1[5]);
                if ($t1[4]==0)
                    $k="Chưa kích hoạt";
                else
                    $k="Đã kích hoạt";
                $s=$s."<div class='row contkh4' p='$t1[0]'>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$t1[0]</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$t1[1]</div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>$t1[2]</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$k</div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>$date</div>
                        </div>";
            }
            $d=mysqli_num_rows($r2);
            $d1=ceil($d/5);
            if ($d1>1){
                $s=$s."<div class='row contkh5'>
                        <div class='col-md-12 col-sm-12 col-xs-12 pttaikhoan'>";                
                for ($i=1;$i<=$d1;$i++){
                    if ($i==$pt)
                        $s=$s."<div page='$i' style='background-color:red'>$i</div>";
                    else
                        $s=$s."<div page='$i'>$i</div>";
                }
                $s=$s."</div>
                    </div>
                </div>";
            }
            echo $s;
        }
        if ($matk=="" && $maquyen=="Chọn" && $tentk=="" && $tinhtrang!="Chọn"){
            $kt=0;
            if ($tinhtrang=="Chưa kích hoạt")
                $kt=0;
            else    
                $kt=1;
            $s="";
            $pt=1;
            if (isset($_GET['idpt']))
                $pt=$_GET['idpt'];
            $tu=($pt-1)*5;                
            $sql1="select * from taikhoan where TinhTrang=$kt limit $tu,5";
            $sql2="select * from taikhoan where TinhTrang=$kt";
            $r1=$p->Check($sql1);
            $r2=$p->Check($sql2);
            while($t1=mysqli_fetch_array($r1)){
                $k="";
                $date=$p1->Chuyenngaythuan($t1[5]);
                if ($t1[4]==0)
                    $k="Chưa kích hoạt";
                else
                    $k="Đã kích hoạt";
                $s=$s."<div class='row contkh4' p='$t1[0]'>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$t1[0]</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$t1[1]</div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>$t1[2]</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$k</div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>$date</div>
                        </div>";
            }
            $d=mysqli_num_rows($r2);
            $d1=ceil($d/5);
            if ($d1>1){
                $s=$s."<div class='row contkh5'>
                        <div class='col-md-12 col-sm-12 col-xs-12 pttaikhoan'>";                
                for ($i=1;$i<=$d1;$i++){
                    if ($i==$pt)
                        $s=$s."<div page='$i' style='background-color:red'>$i</div>";
                    else
                        $s=$s."<div page='$i'>$i</div>";
                }
                $s=$s."</div>
                    </div>
                </div>";
            }
            echo $s;
        }
    }
?>
<script>
    $(document).ready(function(){        
        $(".pttaikhoan div").click(function(){
            var p=$(this).attr('page');
            var matk=$("#tk-matk").val();
            var tentk=$("#tk-usertk").val();
            var maquyen=$("#tk-quyentk").val();
            var tinhtrang=$("#tk-tinhtrangtk").val();
            $.get("./timkiemtaikhoan.php",{idpt:p,matk:matk,ten:tentk,maq:maquyen,tt:tinhtrang},function(data){
                $("#hiennhieutk").html(data);
            });
        });
    });
</script>