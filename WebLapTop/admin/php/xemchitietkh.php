<script type="text/javascript" src="./js/jquery.js"></script>
<?php
    include('./ketnoi.php');
    $p=new CheckConnection(); 
        if (isset($_GET['idctkh'])){            
            $id=$_GET['idctkh'];
            $sql2="select * from khachhang where MaKH='$id'";                                
            $result2=$p->Check($sql2);
            $s2="";
            $row2=mysqli_fetch_row($result2);
            $s2=$s2."<div class='row exit' id='ctkh-bt-exit' onclick='exitctkh();'>X</div>
            <div class='row ctkh-makh'>
                <div class='col-md-5 col-sm-5'>Mã khách hàng: </div>
                <div class='col-md-7 col-sm-7'><input id='ctkh-makh-edit' type='text' readonly value='$row2[0]' /></div>
                <div class='row' id='loimakh' style='color:red;font-size:12px;margin-left: 170px;'></div>
            </div>
            <div class='row ctkh-hokh'>
                <div class='col-md-5 col-sm-5'>Họ: </div>
                <div class='col-md-7 col-sm-7'><input id='ctkh-hokh-edit' type='text' value='$row2[2]' /></div>
                <div class='row' id='loihokh' style='color:red;font-size:12px;margin-left: 170px;'></div>
            </div>
            <div class='row ctkh-tenkh'>
                <div class='col-md-5 col-sm-5'>Tên: </div>
                <div class='col-md-7 col-sm-7'><input id='ctkh-tenkh-edit' type='text' value='$row2[3]' /></div>
                <div class='row' id='loitenkh' style='color:red;font-size:12px;margin-left: 170px;'></div>
            </div>
            <div class='row ctkh-dtkh'>
                <div class='col-md-5 col-sm-5'>Số điện thoại: </div>
                <div class='col-md-7 col-sm-7'><input id='ctkh-dtkh-edit' type='text' value='$row2[5]' /></div>
                <div class='row' id='loidtkh' style='color:red;font-size:12px;margin-left: 170px;'></div>
            </div>
            <div class='row ctkh-ngaysinhkh'>
                <div class='col-md-5 col-sm-5'>Ngày sinh: </div>
                <div class='col-md-7 col-sm-7'><input id='ctkh-ngaysinhkh-edit' type='date' value='$row2[6]' /></div>
                <div class='row' id='loinskh' style='color:red;font-size:12px;margin-left: 170px;'></div>
            </div>";
            if ($row2[7]==0){
             $s2=$s2."<div class='row ctkh-gtkh'>
                <div class='col-md-5 col-sm-5'>Giới tính: </div>
                <div class='col-md-7 col-sm-7'>
                    <select id='ctkh-gtkh-edit'>
                        <option>Giới tính</option>
                        <option selected>Nam</option>
                        <option>Nữ</option>
                    </select>
                </div>
                <div class='row' id='loigtkh' style='color:red;font-size:12px;margin-left: 170px;'></div>
            </div>";
            }
            else{
                $s2=$s2."<div class='row ctkh-gtkh'>
                <div class='col-md-5 col-sm-5'>Giới tính: </div>
                <div class='col-md-7 col-sm-7'>
                    <select id='ctkh-gtkh-edit'>
                        <option>Giới tính</option>
                        <option>Nam</option>
                        <option selected>Nữ</option>
                    </select>
                </div>
                <div class='row' id='loigtkh' style='color:red;font-size:12px;margin-left: 170px;'></div>
            </div>";
            }
            $s2=$s2."<div class='row ctkh-dckh'>
                <div class='col-md-5 col-sm-5'>Địa chỉ: </div>
                <div class='col-md-7 col-sm-7'><textarea id='ctkh-dckh-edit'>$row2[4]</textarea></div>
                <div class='row' id='loidckh' style='color:red;font-size:12px;margin-left: 170px;'></div>
            </div>
            <div class='row ctkh-button'>
                <div class='col-md-6 col-sm-6'><input type='button' id='ctkh-bt-sua' value='Sửa' /></div>
                <div class='col-md-6 col-sm-6'><input type='button' id='ctkh-bt-xoa' value='Xóa' /></div>
            </div>";
            echo $s2;
        }
        if (isset($_GET['idKH'])){
            $makh=$_GET['idKH'];           
            $hokh=$_GET['hoKH'];
            $tenkh=$_GET['tenKH'];
            $dtkh=$_GET['dtKH'];
            $ngaysinhkh=$_GET['ngaysinhKH'];
            $gtkh=$_GET['gtKH'];
            $dckh=$_GET['dcKH'];             
            if ($gtkh=="Nam")
                $gt=0; 
            if ($gtkh=="Nữ")
                $gt=1;                                      
            $sqlkh="UPDATE `khachhang` SET `Ho`='$hokh',`Ten`='$tenkh',`DiaChi`='$dckh',`DienThoai`='$dtkh',`NgaySinh`='$ngaysinhkh',`GioiTinh`=$gt WHERE MaKH='$makh'";                
            echo ($sqlkh);
            $p->Check($sqlkh);                                                                     
        }
        if (isset($_GET['idKHx'])){
            $makh=$_GET['idKHx'];           
            $hokh=$_GET['hoKH'];
            $tenkh=$_GET['tenKH'];
            $dtkh=$_GET['dtKH'];
            $ngaysinhkh=$_GET['ngaysinhKH'];
            $gtkh=$_GET['gtKH'];
            $dckh=$_GET['dcKH'];             
            if ($gtkh=="Nam")
                $gt=0; 
            if ($gtkh=="Nữ")
                $gt=1;
            $sqltk="UPDATE taikhoan,khachhang SET taikhoan.TinhTrang=2 WHERE taikhoan.MaTK=khachhang.MaTK AND khachhang.MaKH='$makh'";                                      
            $sqlkh="UPDATE `khachhang` SET `TinhTrang`=1 WHERE MaKH='$makh'";            
            $p->Check($sqlkh);
            $p->Check($sqltk);                                                                     
        }          
?>
<script>
    var ma=/^[a-zA-Z0-9]{2,8}$/;
    var sdt=/^0[1-9]{9}$/;
    $(document).ready(function(){
        $("#ctkh-bt-sua").click(function(){
            var makh=$("#ctkh-makh-edit").val();
            var hokh=$("#ctkh-hokh-edit").val();
            var tenkh=$("#ctkh-tenkh-edit").val();
            var dtkh=$("#ctkh-dtkh-edit").val();
            var ngaysinhkh=$("#ctkh-ngaysinhkh-edit").val();
            var gtkh=$("#ctkh-gtkh-edit").val();
            var dckh=$("#ctkh-dckh-edit").val();           
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
            $.get("./xemchitietkh.php",{idKH:makh, hoKH:hokh,tenKH:tenkh,dtKH:dtkh,ngaysinhKH:ngaysinhkh,gtKH:gtkh,dcKH:dckh}, function(data){                                               
                alert("Sửa thành công");
                $("#ctkh").css("display","none");   
                location.reload();             
            })            
        });
        $("#ctkh-bt-xoa").click(function(){
            if (confirm('Bạn có chắc muốn xóa')){
                var makh=$("#ctkh-makh-edit").val();
                var hokh=$("#ctkh-hokh-edit").val();
                var tenkh=$("#ctkh-tenkh-edit").val();
                var dtkh=$("#ctkh-dtkh-edit").val();
                var ngaysinhkh=$("#ctkh-ngaysinhkh-edit").val();
                var gtkh=$("#ctkh-gtkh-edit").val();
                var dckh=$("#ctkh-dckh-edit").val();           
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
                $.get("./xemchitietkh.php",{idKHx:makh, hoKH:hokh,tenKH:tenkh,dtKH:dtkh,ngaysinhKH:ngaysinhkh,gtKH:gtkh,dcKH:dckh}, function(data){                                               
                    alert("Xóa thành công");
                    $("#ctkh").css("display","none");   
                    location.reload();             
                });
            }            
        });
    });    
</script>