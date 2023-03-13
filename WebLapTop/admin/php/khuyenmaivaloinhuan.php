<div class="container khuyenmaivaloinhuan">
    <div class="row menukmln">
        <div class="col-md-2 col-sm-2 col-xs-12" id="km">Khuyến mãi</div>
        <div class="col-md-2 col-sm-2 col-xs-12" id="ln">Lợi nhuận</div>
    </div>
    <div id="hienmenukm">
        <?php
            $p=new CheckConnection();
            $p1=new Xuly();
            $today=date("Y-m-d");
            $sql="select * from khuyenmai where NgayBatDau<='$today' AND NgayKetThuc>='$today' AND TinhTrang!=3";
            $sql1="select * from khuyenmai where NgayKetThuc<'$today' AND TinhTrang!=3";
            $sql2="select * from khuyenmai where NgayBatDau>'$today' AND TinhTrang!=3";
            $r=$p->Check($sql);
            $r1=$p->Check($sql1);
            $r2=$p->Check($sql2);
            while ($t=mysqli_fetch_array($r)){
                $k="UPDATE khuyenmai SET TinhTrang=0 where MaKM='$t[0]'";
                $p->Check($k);
            }
            while ($t1=mysqli_fetch_array($r1)){
                $k="UPDATE khuyenmai SET TinhTrang=1 where MaKM='$t1[0]'";
                $p->Check($k);
            }
            while ($t2=mysqli_fetch_array($r2)){
                $k="UPDATE khuyenmai SET TinhTrang=2 where MaKM='$t2[0]'";
                $p->Check($k);
            }
            $s="<div class='row titlekm'>
                    <div class='col-md-12 col-sm-12 col-xs-12'>Tìm kiếm chương trình khuyến mãi</div>
                </div>
                <div class='row conkm1'>
                    <div class='col-md-4 col-sm-5 col-xs-12'>
                        Theo mã khuyến mãi:<input type='text' placeholder='Mã khuyến mãi' id='tk-makm' />
                    </div>
                    <div class='col-md-4 col-sm-5 col-xs-12'>
                        Theo tên khuyến mãi:<input type='text' placeholder='Tên khuyến mãi' id='tk-tenkm' />
                    </div>
                    <div class='col-md-2 col-sm-2 col-xs-12 themkm'>
                        <img src='../img/plus.png' />
                    </div>
                </div>
                <div class='row conkm1'>
                    <div class='col-md-4 col-sm-5 col-xs-12'>
                        Ngày bắt đầu:<input type='date' id='tk-tungay' />
                    </div>
                    <div class='col-md-4 col-sm-5 col-xs-12'>
                        Ngày kết thúc:<input type='date' id='tk-denngay' />
                    </div>
                    <div class='col-md-2 col-sm-2 col-xs-12'>
                        <select id='tk-tinhtrangkm'>
                            <option>Theo tình trạng</option>
                            <option>Còn hạn</option>
                            <option>Hết hạn</option>
                            <option>Chưa đến hạn</option>
                        </select>
                    </div>
                    <div class='col-md-2 col-sm-2 col-xs-12'>
                        <input type='button' value='Tìm kiếm' id='bttkkm' />
                    </div>
                </div>
                <div class='row conkm2'>
                    <div class='col-md-2 col-sm-2 col-xs-12'>Mã khuyến mãi</div>
                    <div class='col-md-4 col-sm-3 col-xs-12'>Tên chương trình khuyến mãi</div>
                    <div class='col-md-2 col-sm-2 col-xs-12'>Ngày bắt đầu</div>
                    <div class='col-md-2 col-sm-2 col-xs-12'>Ngày kết thúc</div>
                    <div class='col-md-2 col-sm-2 col-xs-12'>Tình trạng</div>
                </div>
                <div id='hienkm'>";
            $pt=1;
            if (isset($_GET['idpt']))
                $pt=$_GET['idpt'];
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
            $s=$s."</div>";
            echo $s;
        ?>
        
    </div>
</div>
<div class="container" id="xemchitietkm">
    
</div>
<div class="container" id="xemchitietkm1">
    
</div>
<script>
    function tat(){
        document.getElementById('xemchitietkm').style.display='none';
    }
    function tat1(){
        document.getElementById('xemchitietkm1').style.display='none';
    }
    $(document).ready(function(){
        $("#km").click(function(){
            $.get("./phantrangkm.php",{kieu:'km'},function(data){
                $("#hienmenukm").html(data);
            });
        });
        $("#ln").click(function(){
            $.get("./loinhuan.php",{kieu:'ln'},function(data){
                $("#hienmenukm").html(data);
            });
        });
        $(".conkm3").click(function(){
            var p=$(this).attr('p');
            $.get("./phantrangkm.php",{kieu:'xemctkm',makm:p},function(data){
                $("#xemchitietkm1").html(data);
                $("#xemchitietkm1").css("display","block");
            });
        });
        $(".themkm img").click(function(){
            $.get("./phantrangkm.php",{kieu:'themkm'},function(data){
                $("#xemchitietkm").html(data);
                $("#xemchitietkm").css("display","block");
            });
        });
        $(".ptkm div").click(function(){
            var p=$(this).attr('page');
            $.get("./phantrangkm.php",{kieu:'pt',idpt:p},function(data){
                $("#hienkm").html(data);
            });
        });
        $("#bttkkm").click(function(){
            var ma=$("#tk-makm").val();
            var ten=$("#tk-tenkm").val();
            var tu=$("#tk-tungay").val();
            var den=$("#tk-denngay").val();
            var tt=$("#tk-tinhtrangkm").val();
            $.get("./timkiemkm.php",{kieu:'tk',makm:ma,tenkm:ten,tungay:tu,denngay:den,tt:tt},function(data){
                var x=data.split('<script>');
                if (x[0]==0)
                    alert("Ngày kết thúc lớn hơn ngày bắt đầu");
                else
                    $("#hienkm").html(data);
            })
        })
    });
</script>