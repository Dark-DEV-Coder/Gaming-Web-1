<?php
    include('ketnoi.php');
    include('xulydulieu.php');
    $p=new CheckConnection();
    $p1=new Xuly();
    if (isset($_GET['kieu'])){
        $kieu=$_GET['kieu'];   
        if ($kieu=='km'){
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
        }     
        if ($kieu=='pt'){
            $s="";
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
            echo $s;
        }
        if ($kieu=='themkm'){
            $s="";
            $s=$s."<div class='row tatchitiet'>
                            <div onclick='tat();'>X</div>
                    </div>
                    <div class='row conctkm0'>
                            <div class='col-md-12 col-sm-12 col-xs-12'>Thêm khuyến mãi</div>
                    </div>
                    <div class='row conctkm1'>
                            <div class='col-md-1 col-sm-1 col-xs-12'></div>
                            <div class='col-md-4 col-sm-3 col-xs-12'>Mã khuyến mãi:</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>
                                <input type='text' placeholder='Nhập mã KM' id='them-makm' />
                            </div>
                    </div>
                    <div class='row conctkm1'>
                            <div class='col-md-1 col-sm-1 col-xs-12'></div>
                            <div class='col-md-4 col-sm-3 col-xs-12'>Tên khuyến mãi:</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>
                                <input type='text' placeholder='Nhập tên KM' id='them-tenkm' />
                            </div>
                    </div>
                    <div class='row conctkm1'>
                            <div class='col-md-1 col-sm-1 col-xs-12'></div>
                            <div class='col-md-4 col-sm-3 col-xs-12'>Ngày bắt đầu:</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>
                                <input type='date' id='them-ngaybd' />
                            </div>
                    </div>
                    <div class='row conctkm1'>
                            <div class='col-md-1 col-sm-1 col-xs-12'></div>
                            <div class='col-md-4 col-sm-3 col-xs-12'>Ngày kết thúc:</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>
                                <input type='date' id='them-ngaykt' />
                            </div>
                    </div>
                    <div class='row conctkm4'>
                            <div class='col-md-12 col-sm-12 col-xs-12'><input type='button' value='Thêm' id='btthemkm' /></div>
                    </div>";
            echo $s;
        }
        if ($kieu=='xemctkm'){
            $s="";
            $makm=$_GET['makm'];
            $sql="select * from khuyenmai where MaKM='$makm'";
            $r=$p->Check($sql);
            $t=mysqli_fetch_row($r);
            $k="";
            if ($t[4]==0)
                $k="Còn hạn";
            if ($t[4]==1)
                $k="Hết hạn";
            if ($t[4]==2)
                $k="Chưa đến hạn";            
            $s=$s."<div class='row tatchitiet1'>
                        <div onclick='tat1();'>X</div>
                    </div>
                    <div class='row conxemctkm1'>
                        <div class='col-md-12 col-sm-12 col-xs-12'>Chi tiết khuyến mãi</div>
                    </div>
                    <div class='row conxemctkm2'>
                        <div class='col-md-5 col-sm-5 col-xs-12'>
                            Mã khuyến mãi: <span>$t[0]</span>
                        </div>
                        <div class='col-md-7 col-sm-7 col-xs-12'>
                            Tên khuyến mãi: <input type='text' value='$t[1]' id='suaxoa-tenkm' />
                        </div>
                    </div>
                    <div class='row conxemctkm2'>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                            Ngày bắt đầu: <input type='date' value='$t[2]' id='suaxoa-ngaybd' />
                        </div>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                            Ngày kết thúc: <input type='date' value='$t[3]' id='suaxoa-ngaykt' />
                        </div>
                    </div>
                    <div class='row conxemctkm3'>
                            <div class='col-md-4 col-sm-4 col-xs-12'>
                                Tình trạng: <span>$k</span>
                            </div>
                            <div class='col-md-4 col-sm-4 col-xs-12'>
                                <input type='button' value='Sửa' id='btsuakm' p='$t[0]' />
                            </div>
                            <div class='col-md-4 col-sm-4 col-xs-12'>
                                <input type='button' value='Xóa' id='btxoakm' p='$t[0]' />
                            </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-5 col-sm-5 col-xs-12 c1'>
                            <div class='row titlectkm'>
                                <div class='col-md-12 col-sm-12 col-xs-12'>Thêm chi tiết</div>
                            </div>
                            <div class='row conxemctkm4'>
                                <div class='col-md-6 col-sm-6 col-xs-12'>Mã sản phẩm: </div>
                                <div class='col-md-6 col-sm-6 col-xs-12'>
                                    <select id='them-maspctkm'>
                                        <option>Chọn</option>";
            $sql1="select * from sanpham where TinhTrang=0";
            $sp="";
            $r1=$p->Check($sql1);
            while($t1=mysqli_fetch_array($r1)){
                $sp=$sp."<option>$t1[0]</option>";
            }
            $s=$s.$sp;
            $s=$s."</select>
                        </div>
                    </div>
                    <div class='row conxemctkm4'>
                        <div class='col-md-6 col-sm-6 col-xs-12'>Phần trăm KM: </div>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                            <input type='text' placeholder='Nhập %KM' id='them-ptkmctkm' />
                        </div>
                    </div>
                    <div class='row conxemctkm5'>
                        <div class='col-md-12 col-sm-12 col-xs-12'>
                            <input type='button' value='Thêm' id='btthemctkm' p='$t[0]' />
                        </div>
                    </div>
                </div>
                <div class='col-md-7 col-sm-7 col-xs-12'>
                    <div class='row conxemctkm6'>
                        <div class='col-md-4 col-sm-3 col-xs-12'>Mã sản phẩm</div>
                        <div class='col-md-4 col-sm-3 col-xs-12'>%KM</div>
                        <div class='col-md-4 col-sm-3 col-xs-12'>Chức năng</div>
                    </div>
                    <div id='hienctkm1'>";
            $ctsp="";
            $sql2="select * from chitietkhuyenmai where MaKM='$makm'";
            $r2=$p->Check($sql2);
            while($t2=mysqli_fetch_array($r2)){
                $ctsp=$ctsp."<div class='row conxemctkm7'>
                                <div class='col-md-4 col-sm-3 col-xs-12'>$t2[1]</div>
                                <div class='col-md-4 col-sm-3 col-xs-12'>$t2[2]%</div>
                                <div class='col-md-4 col-sm-3 col-xs-12 chucnangxoactkm'>
                                    <div p='$t[0]' p1='$t2[1]'>Xóa</div>
                                </div>
                            </div>";
            }
            $s=$s.$ctsp;
            $s=$s."</div>
                    </div>
                </div>";
            echo $s;
        }
    }
?>
<script>
    var so=/^\d{1,2}$/;
    $(document).ready(function(){
        $(".conkm3").click(function(){
            var p=$(this).attr('p');
            $.get("./phantrangkm.php",{kieu:'xemctkm',makm:p},function(data){
                $("#xemchitietkm1").html(data);
                $("#xemchitietkm1").css("display","block");
            });
        });
        $(".ptkm div").click(function(){
            var p=$(this).attr('page');
            $.get("./phantrangkm.php",{kieu:'pt',idpt:p},function(data){
                $("#hienkm").html(data);
            });
        });
        $("#btthemkm").click(function(){
            var ma=$("#them-makm").val();
            var ten=$("#them-tenkm").val();
            var bd=$("#them-ngaybd").val();
            var kt=$("#them-ngaykt").val();
            if (ma==""){
                alert("Chưa nhập mã khuyến mãi");
                $("#them-makm").focus();
                return false;
            }
            if (ten==""){
                alert("Chưa nhập tên khuyến mãi");
                $("#them-tenkm").focus();
                return false;
            }
            if (bd==""){
                alert("Chưa chọn ngày bắt đầu");
                $("#them-ngaybd").focus();
                return false;
            }
            if (kt==""){
                alert("Chưa chọn ngày kết thúc");
                $("#them-ngaytk").focus();
                return false;
            }
            $.get("./themsuaxoakm.php",{kieu:'them',ma:ma,ten:ten,bd:bd,kt:kt},function(data){
                if (data==-1)
                    alert("Ngày kết thúc lớn hơn ngày bắt đầu");
                if (data==0)
                    alert("Mã khuyến mãi đã tồn tại");
                if (data==1){
                    alert("Thêm thành công");
                    location.reload();
                }
            })
        })
        $("#btsuakm").click(function(){
            var ten=$("#suaxoa-tenkm").val();
            var bd=$("#suaxoa-ngaybd").val();
            var kt=$("#suaxoa-ngaykt").val();
            var ma=$(this).attr('p');
            if (ten==""){
                alert("Chưa nhập tên khuyến mãi");
                $("#suaxoa-tenkm").focus();
                return false;
            }
            if (bd==""){
                alert("Chưa chọn ngày bắt đầu");
                $("#suaxoa-ngaybd").focus();
                return false;
            }
            if (kt==""){
                alert("Chưa chọn ngày kết thúc");
                $("#suaxoa-ngaykt").focus();
                return false;
            }
            $.get("./themsuaxoakm.php",{kieu:'suakm',ma:ma,ten:ten,bd:bd,kt:kt},function(data){
                if (data==0)
                    alert("Ngày kết thúc lớn hơn ngày bắt đầu");
                else{
                    alert("Sửa thành công");
                    location.reload();
                }
            });
        });
        $("#btxoakm").click(function(){
            var ma=$(this).attr('p');
            $.get("./themsuaxoakm.php",{kieu:'xoakm',ma:ma},function(data){
                alert("Xóa thành công");
                location.reload();                
            });
        });
        $("#btthemctkm").click(function(){
            var p=$(this).attr('p');
            var mctsp=$("#them-maspctkm").val();
            var ptkm=$("#them-ptkmctkm").val();
            if (mctsp=="Chọn"){
                alert("Chưa chọn mã sản phẩm");
                return false;
            }
            if (ptkm==""){
                alert("Chưa nhập phần trăm khyến mãi");
                $("#them-ptkmctkm").focus();
                return false;
            }
            if (so.test(ptkm)==false){
                alert("Chỉ được nhập số và có nhiều nhất 2 chữ số");
                $("#them-ptkmctkm").focus();
                return false;
            }
            $.get("./themsuaxoakm.php",{kieu:'themctkm',makm:p,masp:mctsp,pt1:ptkm},function(data){
                var x=data.split('<script>');
                if (x[0]==0)
                    alert("Mã sản phẩm này đã trong chi tiết khuyến mãi");
                else{
                    alert("Thêm thành công");
                    $("#hienctkm1").html(data);
                }
            });
        });
        $(".chucnangxoactkm div").click(function(){
            var p=$(this).attr('p');
            var p1=$(this).attr('p1');
            $.get("./themsuaxoakm.php",{kieu:'xoactkm',makm:p,masp:p1},function(data){
                alert("Xóa thành công");
                $("#hienctkm1").html(data);
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