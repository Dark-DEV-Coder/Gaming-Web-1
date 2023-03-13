<div class="container phieunhaphang">
    <div class="row ncc">
        <a href="./quanly.php?id=PNH&n=NCC" class="col-md-2 col-sm-2 col-xs-12">Nhà cung cấp</a>
    </div>
    <div class="row titlepn">
        <div class="col-md-12 col-sm-12 col-xs-12">Phiếu nhập hàng</div>
    </div>
    <div class="row mapnncc">
        <div class="col-md-2 col-sm-2 col-xs-12">Mã phiếu nhập:</div>
        <div class="col-md-2 col-sm-2 col-xs-12"><input type="text" placeholder="Mã phiếu nhập" id="themmapn" /></div>
        <div class="col-md-2 col-sm-2 col-xs-12">
            <input type="button" value="Thêm" id="thempn" />
        </div>
    </div>
    <div class="row mapnncc">
        <div class="col-md-2 col-sm-2 col-xs-12">Mã nhà cung cấp:</div>
        <div class="col-md-2 col-sm-2 col-xs-12">
            <select id="themmancc">
                <option>Chọn</option>
            <?php
                $s="";
                $sql="select * from nhacungcap where TinhTrang=0";
                $p=new CheckConnection();
                $re=$p->Check($sql);
                while($row=mysqli_fetch_array($re)){
                    $s=$s."<option>$row[0]</option>";
                }
                echo $s;
            ?>
            </select>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-12">
            <input type="button" value="Tìm kiếm" id="tkpn" />
        </div>
    </div>
    <div class="row pn1">
        <div class="col-md-2 col-sm-2 col-xs-12">Mã phiếu nhập</div>
        <div class="col-md-2 col-sm-4 col-xs-12">Mã nhà cung cấp</div>
        <div class="col-md-2 col-sm-2 col-xs-12">Mã nhân viên</div>
        <div class="col-md-3 col-sm-4 col-xs-12">Ngày nhập hàng</div>
        <div class="col-md-3 col-sm-4 col-xs-12">Tổng tiền hàng</div>
    </div>
    <div id="hienpn">        
        <?php
            $pt=1;
            if (isset($_GET['idpt']))
                $pt=$_GET['idpt'];
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
        ?>        
    </div>
</div>
<?php
    if (isset($_GET['idpn'])){
        $mapn=$_GET['idpn'];
        $sql="select * from phieunhaphang where MaPN='$mapn'";
        $p=new CheckConnection();
        $p1=new Xuly();
        $re=$p->Check($sql);
        $row=mysqli_fetch_row($re);
        $ncc="";
        $sql1="select MaNCC from nhacungcap where TinhTrang=0";
        $re1=$p->Check($sql1);
        while($row1=mysqli_fetch_array($re1)){
            if ($row1[0]==$row[1])
                $ncc=$ncc."<option selected>$row1[0]</option>";
            else
                $ncc=$ncc."<option>$row1[0]</option>";
        }
        $tien=$p1->Chuyentien($row[4]);
        $date=$p1->Chuyenngaythuan($row[3]);
        $s="";
        $s=$s."<div class='container xemctpn1'>
                <div class='row ctpn0'>
                    <a href='./quanly.php?id=PNH'>X</a>
                </div>
                <div class='row ctpn1'>
                    <div class='col-md-3 col-sm-3 col-xs-12'>Mã phiếu nhập: </div>
                    <div class='col-md-2 col-sm-2 col-xs-12'><span>$row[0]</span></div>
                    <div class='col-md-3 col-sm-3 col-xs-12'>Ngày nhập hàng: </div>
                    <div class='col-md-3 col-sm-3 col-xs-12'><span>$date</span></div>
                </div>
                <div class='row ctpn1'>
                    <div class='col-md-3 col-sm-3 col-xs-12'>Mã nhân viên: </div>
                    <div class='col-md-2 col-sm-2 col-xs-12'><span>$row[2]</span></div>
                    <div class='col-md-3 col-sm-3 col-xs-12'>Tổng tiền hàng: </div>
                    <div class='col-md-3 col-sm-3 col-xs-12'><span>$tien</span></div>
                </div>
                <div class='row ctpn1'>
                    <div class='col-md-4 col-sm-4 col-xs-12'>Mã nhà cung cấp: </div>
                    <div class='col-md-2 col-sm-2 col-xs-12'>
                        <select id='suancc'>
                            <option>Chọn</option>";
        $s=$s.$ncc;
        $s=$s." </select>
                    </div>
                    <div class='col-md-2 col-sm-2 col-xs-12'><input type='button' value='Sửa PN' id='suapn1' p='$row[0]' /></div>
                    <div class='col-md-2 col-sm-2 col-xs-12'><input type='button' value='Xóa PN' id='xoapn1' p='$row[0]' /></div>
                </div>
                <div class='row ctpn2'>
                    <div class='col-md-4 col-sm-4 col-xs-12'>Chọn mã sản phẩm: </div>
                    <div class='col-md-3 col-sm-3 col-xs-12'>
                        <select id='themmactpn1'>
                            <option>Chọn</option>";  
        $sql2="select MaNhomSP from sanpham where TinhTrang=0";
        $re2=$p->Check($sql2);
        $masp="";
        while($row2=mysqli_fetch_array($re2)){
            $masp=$masp."<option>$row2[0]</option>";
        }
        $s=$s.$masp;  
        $s=$s." </select>
                    </div>
                    <div class='col-md-2 col-sm-2 col-xs-12'>
                        <input type='button' value='Thêm' id='them-ctpn' p='$row[0]' />
                    </div>
                </div>
                <div class='row ctpn3'>
                    <div class='col-md-2 col-sm-2 col-xs-12'>Số lượng: </div>
                    <div class='col-md-2 col-sm-2 col-xs-12'>
                        <input type='text' placeholder='Số lượng' id='themslctpn1' />            
                    </div>
                    <div class='col-md-2 col-sm-2 col-xs-12'>Giá nhập: </div>
                    <div class='col-md-2 col-sm-2 col-xs-12'>
                        <input type='text' placeholder='Giá nhập' id='themgiactpn1' />            
                    </div>
                </div>
                <div class='row ctpn4'>
                    <div class='col-md-3 col-sm-3 col-xs-12'>Mã sản phẩm</div>
                    <div class='col-md-3 col-sm-3 col-xs-12'>Đơn giá</div>
                    <div class='col-md-2 col-sm-3 col-xs-12'>Số lượng</div>
                    <div class='col-md-4 col-sm-3 col-xs-12'>Chức năng</div>
                </div>
                <div id='hienctpn1'>";
        $sql3="select * from chitietphieunhaphang where MaPN='$mapn'";
        $re3=$p->Check($sql3);
        while($r1=mysqli_fetch_array($re3)){
            $tien=$p1->Chuyentien($r1[2]);
            $sl=$p1->Chuyentien($r1[3]);
            $s=$s."<div class='row ctpn5'>
                    <div class='col-md-3 col-sm-3 col-xs-12'>$r1[1]</div>
                    <div class='col-md-3 col-sm-3 col-xs-12'>$tien</div>
                    <div class='col-md-2 col-sm-3 col-xs-12'>$sl</div>
                    <div class='col-md-4 col-sm-3 col-xs-12 chucnangctpn'>
                        <div class='xoactpn1' p='$r1[0]' p1='$r1[1]'>Xóa</div>
                    </div>
                </div>";
        }
        $s=$s." </div>
                </div>";
        echo $s;
    }
    if(isset($_GET['n'])){
        $s="";
        $s=$s."<div class='container nhacungcap'>
                <div class='row tatncc'><a href='./quanly.php?id=PNH'>X</a></div>
                <div class='row titlencc'>
                    <div class='col-md-12 col-sm-12 col-xs-12'>Nhà cung cấp</div>
                </div>
                <div class='row nccrow1'>
                    <div class='col-md-12 col-sm-12 col-xs-12'>Mã: <input type='text' placeholder='Mã nhà cung cấp' id='nccthemma' /></div>
                </div>
                <div class='row nccrow1'>
                    <div class='col-md-12 col-sm-12 col-xs-12'>Tên: <input type='text' placeholder='Tên nhà cung cấp' id='nccthemten' /></div>
                </div>
                <div class='row nccrow1'>
                    <div class='col-md-12 col-sm-12 col-xs-12'>
                        <input type='button' value='Thêm' id='nccbtthem' />
                    </div>
                </div>
                <div class='row nccrow2'>
                        <div class='col-md-3 col-sm-2 col-xs-12'>Mã NCC</div>
                        <div class='col-md-5 col-sm-4 col-xs-12'>Tên NCC</div>
                        <div class='col-md-4 col-sm-2 col-xs-12'>Chức năng</div>
                </div>
                <div id='hienncc'> ";
        $p=new CheckConnection();
        $sql="select * from nhacungcap where TinhTrang=0";
        $re=$p->Check($sql);
        while($r=mysqli_fetch_array($re)){
            $s=$s."<div class='row nccrow3'>
                    <div class='col-md-3 col-sm-2 col-xs-12'>$r[0]</div>
                    <div class='col-md-5 col-sm-4 col-xs-12'>$r[1]</div>
                    <div class='col-md-4 col-sm-2 col-xs-12 chucnangncc'>
                        <div class='suancc' p='$r[0]'>Sửa</div>
                        <div class='xoancc' p='$r[0]'>Xóa</div>
                    </div>
                </div>";
        }
        $s=$s."</div>
            </div>";
        echo $s;
    }
?>              
<script>
    var so=/^\d{1,5}$/;
    var tien=/^\d{7,9}$/;
    $(document).ready(function(){
        $("#nccbtthem").click(function(){
            var ma=$("#nccthemma").val();
            var ten=$("#nccthemten").val();
            if (ma==""){
                alert("Chưa nhập mã nhà cung cấp");
                $("#nccthemma").focus();
                return false;
            }
            if (ten==""){
                alert("Chưa nhập tên nhà cung cấp");
                $("#nccthemten").focus();
                return false;
            }
            $.get("./suaxoapn.php",{kieu:'themncc',mancc:ma,tenncc:ten},function(data){
                if (data!=0){                    
                    alert("Thêm thành công");
                    location.reload();
                }
                else
                    alert("Mã đã tồn tại");
            });
        });
        $(".suancc").click(function(){
            var p=$(this).attr('p');
            var ten=$("#nccthemten").val();
            if (ten==""){
                alert("Chưa nhập tên muốn sửa");
                $("#nccthemten").focus();
                return false;
            }
            $.get("./suaxoapn.php",{kieu:'suancc',ma:p,tenncc:ten},function(data){
                alert("Sửa thành công");
                location.reload();
            });
        });
        $(".xoancc").click(function(){
            if (confirm('Bạn có chắc muốn xóa')){
                var p=$(this).attr('p');            
                $.get("./suaxoapn.php",{kieu:'xoancc',ma:p},function(data){
                    alert("Xóa thành công");
                    location.reload();
                });
            }
        });
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
        $("#thempn").click(function(){
            var mapn=$("#themmapn").val();
            var mancc=$("#themmancc").val();
            if (mapn==""){
                alert("Chưa nhập mã phiếu nhập");
                $("#themmapn").focus();
                return false;
            }
            if (mancc=="Chọn"){
                alert("Chưa chọn mã nhà cung cấp");
                $("#themmancc").focus();
                return false;
            }
            $.get("./suaxoapn.php",{kieu:'them',pn:mapn,ncc:mancc},function(data){
                if (data==0){
                    alert("Mã đã tồn tại");
                }
                else{
                    alert("Thêm thành công");
                    location.reload();
                }
            });
        });
        $("#suapn1").click(function(){
            var ncc=$("#suancc").val();
            var pn=$(this).attr('p');
            if (ncc=="Chọn"){
                alert("Chưa chọn nhà cung cấp");
                return false;
            }
            $.get("./suaxoapn.php",{kieu:'sua',mncc:ncc,mpn:pn},function(data){
                alert("Sửa thành công");
                location.reload();
            });
        });
        $("#xoapn1").click(function(){
            if (confirm('Bạn có chắc muốn xóa')){
                var pn=$(this).attr('p');                
                $.get("./suaxoapn.php",{kieu:'xoa',mpn:pn},function(data){
                    alert("Xóa thành công");
                    location.replace('./quanly.php?id=PNH');
                });
            }
        }); 
        $("#them-ctpn").click(function(){
            var masp=$("#themmactpn1").val();
            var sl=$("#themslctpn1").val();
            var gia=$("#themgiactpn1").val();
            var pn=$(this).attr('p');
            if (masp=="Chọn"){
                alert("Chưa chọn mã sản phẩm");
                return false;
            }
            if (sl==""){
                alert("Chưa nhập số lượng");
                $("#themslctpn1").focus();
                return false;
            }
            if (so.test(sl)==false){
                alert("Số lượng không phù hợp");
                $("#themslctpn1").focus();
                return false;
            }
            if (gia==""){
                alert("Chưa nhập giá tiền");
                $("#themgiactpn1").focus();
                return false;
            }
            if (tien.test(gia)==false){
                alert("Giá tiền không phù hợp");
                $("#themgiactpn1").focus();
                return false;
            }
            $.get("./suaxoapn.php",{kieu:'themctpn',ma:masp,sl:sl,gia:gia,mapn:pn},function(data){
                alert("Thêm thành công");
                location.reload();
            });
        });
        $(".xoactpn1").click(function(){
            if(confirm('Bạn có chắc muốn xóa')){
                var p=$(this).attr('p');
                var p1=$(this).attr('p1');
                $.get("./suaxoapn.php",{kieu:'xoactpn',mapn:p,masp:p1},function(data){
                    alert("Xóa thành công");
                    location.reload();
                });
            }
        });        
    });
</script>                                          