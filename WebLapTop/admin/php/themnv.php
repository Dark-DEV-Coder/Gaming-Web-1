<script type="text/javascript" src="./js/jquery.js"></script>
<?php
    include('ketnoi.php');
    $p=new CheckConnection();
    if(isset($_GET['idthemnv'])){
        $s="<div class='container ctkh' id='ctkh' style='display: block;'><script type='text/javascript' src='./js/jquery.js'></script>
                <div class='row exit' id='ctkh-bt-exit' onclick='exitctkh();'>X</div>
                <div class='row ctkh-makh'>
                    <div class='col-md-5 col-sm-5'>Mã nhân viên: </div>
                    <div class='col-md-7 col-sm-7'><input id='ctkh-makh-edit' type='text' value='' autofocus></div>
                    <div class='row' id='loimakh' style='color:red;font-size:12px;margin-left: 170px;'></div>
                </div>
                <div class='row ctkh-hokh'>
                    <div class='col-md-5 col-sm-5'>Họ: </div>
                    <div class='col-md-7 col-sm-7'><input id='ctkh-hokh-edit' type='text' value=''></div>
                    <div class='row' id='loihokh' style='color:red;font-size:12px;margin-left: 170px;'></div>
                </div>
                <div class='row ctkh-tenkh'>
                    <div class='col-md-5 col-sm-5'>Tên: </div>
                    <div class='col-md-7 col-sm-7'><input id='ctkh-tenkh-edit' type='text' value=''></div>
                    <div class='row' id='loitenkh' style='color:red;font-size:12px;margin-left: 170px;'></div>
                </div>
                <div class='row ctkh-dtkh'>
                    <div class='col-md-5 col-sm-5'>Số điện thoại: </div>
                    <div class='col-md-7 col-sm-7'><input id='ctkh-dtkh-edit' type='text' value=''></div>
                    <div class='row' id='loidtkh' style='color:red;font-size:12px;margin-left: 170px;'></div>
                </div>
                <div class='row ctkh-ngaysinhkh'>
                    <div class='col-md-5 col-sm-5'>Ngày sinh: </div>
                    <div class='col-md-7 col-sm-7'><input id='ctkh-ngaysinhkh-edit' type='date' value=''></div>
                    <div class='row' id='loinskh' style='color:red;font-size:12px;margin-left: 170px;'></div>
                </div><div class='row ctkh-gtkh'>
                    <div class='col-md-5 col-sm-5'>Giới tính: </div>
                    <div class='col-md-7 col-sm-7'>
                        <select id='ctkh-gtkh-edit'>
                            <option>Giới tính</option>
                            <option>Nam</option>
                            <option>Nữ</option>
                        </select>
                    </div>
                    <div class='row' id='loigtkh' style='color:red;font-size:12px;margin-left: 170px;'></div>
                </div><div class='row ctkh-dckh'>
                    <div class='col-md-5 col-sm-5'>Địa chỉ: </div>
                    <div class='col-md-7 col-sm-7'><textarea id='ctkh-dckh-edit'></textarea></div>
                    <div class='row' id='loidckh' style='color:red;font-size:12px;margin-left: 170px;'></div>
                </div>
                <div class='row ctkh-emailkh'>
                    <div class='col-md-5 col-sm-5'>Email: </div>
                    <div class='col-md-7 col-sm-7'><input id='ctkh-emailkh-edit' type='text' value='' /></div>
                    <div class='row' id='loiemailkh' style='color:red;font-size:12px;margin-left: 170px;'></div>
                </div>
                <div class='row ctkh-button'>
                    <div class='col-md-12 col-sm-12'><input type='button' id='ctnv-bt-them' value='Thêm'></div>        
                </div>
            </div>";
        echo $s;
    }
    if (isset($_GET['idNV'])){
        $makh=$_GET['idNV'];
        $matk=$makh;
        $hokh=$_GET['hoKH'];
        $tenkh=$_GET['tenKH'];
        $dtkh=$_GET['dtKH'];
        $ngaysinhkh=$_GET['ngaysinhKH'];
        $gtkh=$_GET['gtKH'];
        $dckh=$_GET['dcKH'];   
        $emailkh=$_GET['emailKH'];           
        if ($gtkh=="Nam")
            $gt=0; 
        if ($gtkh=="Nữ")
            $gt=1; 
        $today=date("Y-m-d");
        $checkmakh="select * from nhanvien where MaNV='$makh'";
        $rekh=$p->Check($checkmakh);
        $dem=mysqli_num_rows($rekh);
        if ($dem>0){
            echo $dem;
        }
        else{
            $sqltk="INSERT INTO `taikhoan`(`MaTK`, `MaQuyen`, `Username`, `Password`, `TinhTrang`, `NgayTaoTK`) VALUES ('$matk','NHANVIEN','$makh','123',1,'$today')";
            $sqlkh="INSERT INTO `nhanvien`(`MaNV`, `MaTK`, `Ho`, `Ten`, `DiaChi`, `DienThoai`, `NgaySinh`, `GioiTinh`,`Email`, `TinhTrang`) VALUES ('$makh','$matk','$hokh','$tenkh','$dckh','$dtkh','$ngaysinhkh',$gt,'$emailkh',0)";
            $p->Check($sqltk);
            $p->Check($sqlkh);           
            echo $dem;
        }
    }   
?>
<script>
    var ma=/^[a-zA-Z0-9]{2,8}$/;
    var sdt=/^0[1-9]{9}$/;
    var email=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    $(document).ready(function(){
        $("#ctnv-bt-them").click(function(){
            var makh=$("#ctkh-makh-edit").val();
            var hokh=$("#ctkh-hokh-edit").val();
            var tenkh=$("#ctkh-tenkh-edit").val();
            var dtkh=$("#ctkh-dtkh-edit").val();
            var ngaysinhkh=$("#ctkh-ngaysinhkh-edit").val();
            var gtkh=$("#ctkh-gtkh-edit").val();
            var dckh=$("#ctkh-dckh-edit").val();
            var emailkh=$("#ctkh-emailkh-edit").val();
            if (makh==""){
                $("#loimakh").html("Chưa nhập mã");
                $("#ctkh-makh-edit").focus();
                return false;
            }
            if (makh.length>8){
                $("#loimakh").html("Mã quá 8 ký tự");
                $("#ctkh-makh-edit").focus();
                return false;
            }
            if (ma.test(makh)==false){
                $("#loimakh").html("Mã không hợp lệ");
                $("#ctkh-makh-edit").focus();
                return false;
            }               
            $("#loimakh").html("");
            if (hokh==""){
                $("#loihokh").html("Chưa nhập họ");
                $("#ctkh-hokh-edit").focus();
                return false;
            }
            $("#loihokh").html("");
            if (tenkh==""){
                $("#loitenkh").html("Chưa nhập tên");
                $("#ctkh-tenkh-edit").focus();
                return false;
            }
            $("#loitenkh").html("");
            if (dtkh==""){
                $("#loidtkh").html("Chưa nhập số điện thoại");
                $("#ctkh-dtkh-edit").focus();
                return false;
            }
            if (sdt.test(dtkh)==false){
                $("#loidtkh").html("Số điện thoại không hợp lệ");
                $("#ctkh-dtkh-edit").focus();
                return false;
            }
            $("#loidtkh").html("");
            if (ngaysinhkh==""){
                $("#loinskh").html("Chưa chọn ngày sinh");
                $("#ctkh-ngaysinhkh-edit").focus();
                return false;
            }
            $("#loinskh").html("");
            if (gtkh=="Giới tính"){
                $("#loinskh").html("Chưa chọn giới tính");
                $("#ctkh-gtkh-edit").focus();
                return false;
            }
            $("#loigtkh").html("");
            if (dckh==""){
                $("#loidckh").html("Chưa nhập địa chỉ");
                $("#ctkh-dckh-edit").focus();
                return false;
            }
            $("#loidckh").html("");
            if (emailkh==""){
                $("#loiemailkh").html("Chưa nhập email");
                $("#ctkh-emailkh-edit").focus();
                return false;
            }
            $("#loiemailkh").html("");
            if (email.test(emailkh)==false){
                $("#loiemailkh").html("Email không hợp lệ");
                $("#ctkh-emailkh-edit").focus();
                return false;
            }
            $("#loiemailkh").html("");
            $.get("./themnv.php",{idNV:makh, hoKH:hokh,tenKH:tenkh,dtKH:dtkh,ngaysinhKH:ngaysinhkh,gtKH:gtkh,dcKH:dckh,emailKH:emailkh}, function(data){
                var data1=data.split('<script>');
                var data2=data1[0].split('>');              
                alert(data);
                alert(data1);
                alert(data2);
                alert(data2[2]);                         
                if (data2[2]!=0){
                    $("#loimakh").html("Mã đã tồn tại");
                    $("#ctkh-makh-edit").focus();
                }
                else{
                    alert("Thêm thành công");
                    $("#ctkh").css("display","none");
                    location.reload();
                }
            })
        });
    });
</script>