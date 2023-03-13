<?php
    include('ketnoi.php');
    include('xulydulieu.php');
    $p=new CheckConnection();
    $p1=new Xuly();
    if (isset($_GET['kieu'])){
        $kieu=$_GET['kieu'];
        if ($kieu=='taikhoan' && !isset($_GET['idpt'])){            
            $s="";
            $s=$s."<div class='row titletk'>
                    <div class='col-md-12 col-sm-12 col-xs-12'>Tìm kiếm tài khoản</div>
                </div>
                <div class='row contkh1'>
                    <div class='col-md-4 col-sm-4 col-xs-12'>
                    Theo mã tài khoản: <input type='text' placeholder='Mã tài khoản' id='tk-matk' />
                    </div>  
                    <div class='col-md-4 col-sm-4 col-xs-12'>
                    Theo tên đăng nhập: <input type='text' placeholder='Tên đăng nhập' id='tk-usertk' />
                    </div>
                    <div class='col-md-2 col-sm-2 col-xs-12'>
                        <img src='../img/plus.png' id='them-taikhoan' />
                    </div>           
                </div>
                <div class='row contkh2'>
                    <div class='col-md-4 col-sm-4 col-xs-12'>
                        Theo mã quyền: 
                        <select id='tk-quyentk'>
                            <option>Chọn</option>";
            $sql="select * from quyentk";
            $r=$p->Check($sql);
            $quyen="";
            while($t=mysqli_fetch_array($r)){
                $quyen=$quyen."<option>$t[0]</option>";
            }
            $s=$s.$quyen;
            $s=$s."</select>
                    </div>
                    <div class='col-md-4 col-sm-4 col-xs-12'>
                        Theo tình trạng: 
                        <select id='tk-tinhtrangtk'>
                            <option>Chọn</option>
                            <option>Chưa kích hoạt</option>
                            <option>Đã kích hoạt</option>
                        </select>
                        <input type='button' value='Tìm kiếm' id='tkbttaikhoan' />
                    </div>
                </div>
                <div class='row contkh3'>
                    <div class='col-md-2 col-sm-2 col-xs-12'>Mã tài khoản</div>
                    <div class='col-md-2 col-sm-2 col-xs-12'>Mã quyền</div>
                    <div class='col-md-3 col-sm-3 col-xs-12'>Tên đăng nhập</div>
                    <div class='col-md-2 col-sm-2 col-xs-12'>Tình trạng</div>
                    <div class='col-md-3 col-sm-3 col-xs-12'>Ngày tạo tài khoản</div>
                </div>
                <div id='hiennhieutk'>";
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
        if ($kieu=='taikhoan' && isset($_GET['idpt'])){
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
        if ($kieu=='themtaikhoan'){
            $s="";
            $s=$s."<div class='row'>
                        <div id='tatchitiettk' onclick='tatcttk();'>X</div>
                    </div>
                    <div class='row cttk1'>
                        <div class='col-md-5 col-sm-5 col-xs-12'>Mã tài khoản: </div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>
                            <input type='text' placeholder='Nhập mã tài khoản' id='them-matk' />
                        </div>
                    </div>
                    <div class='row cttk1'>
                        <div class='col-md-5 col-sm-5 col-xs-12'>Quyền tài khoản: </div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>
                            <select id='them-quyentk'>
                                <option>Chọn</option>";
            $sql="select * from quyentk";
            $r=$p->Check($sql);
            $quyen="";
            while($t=mysqli_fetch_array($r)){
                $quyen=$quyen."<option>$t[0]</option>";
            }
            $s=$s.$quyen;
            $s=$s."</select>
                        </div>
                    </div>
                    <div class='row cttk1'>
                        <div class='col-md-5 col-sm-5 col-xs-12'>Tên đăng nhập: </div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>
                            <input type='text' placeholder='Nhập tên đăng nhập' id='them-usertk' />
                        </div>
                    </div>
                    <div class='row cttk1'>
                        <div class='col-md-5 col-sm-5 col-xs-12'>Mật khẩu: </div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>
                            <input type='text' placeholder='Nhập mật khẩu' id='them-passtk' />
                        </div>
                    </div>
                    <div class='row cttk1'>
                        <div class='col-md-5 col-sm-5 col-xs-12'>Tình trạng: </div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>
                            <select id='them-tinhtrangtk'>
                                <option>Chọn</option>
                                <option>Khóa</option>
                                <option>Kích hoạt</option>
                            </select>
                        </div>
                    </div>
                    <div class='row cttk2'>
                    <div class='col-md-12 col-sm-12 col-xs-12'>
                        <input type='button' value='Thêm' id='buttonthemtk' />
                    </div>
                    </div>";
            echo $s;
        }
        if ($kieu=='suaxoataikhoan'){
            $matk=$_GET['matk'];
            $s1="select * from taikhoan where MaTK='$matk'";
            $rt=$p->Check($s1);
            $row=mysqli_fetch_row($rt);
            $date=$p1->Chuyenngaythuan($row[5]);
            $s="";
            $s=$s."<div class='row'>
                        <div id='tatchitiettk' onclick='tatcttk();'>X</div>
                    </div>
                    <div class='row cttk1'>
                        <div class='col-md-5 col-sm-5 col-xs-12'>Mã tài khoản: </div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>
                            <input type='text' value='$row[0]' id='them-matk' readonly />
                        </div>
                    </div>
                    <div class='row cttk1'>
                        <div class='col-md-5 col-sm-5 col-xs-12'>Quyền tài khoản: </div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>
                            <select id='them-quyentk'>
                                <option>Chọn</option>";
            $sql="select * from quyentk";
            $r=$p->Check($sql);
            $quyen="";
            while($t=mysqli_fetch_array($r)){
                if ($t[0]==$row[1])
                    $quyen=$quyen."<option selected>$t[0]</option>";
                else
                    $quyen=$quyen."<option>$t[0]</option>";
            }
            $s=$s.$quyen;
            $s=$s."</select>
                        </div>
                    </div>
                    <div class='row cttk1'>
                        <div class='col-md-5 col-sm-5 col-xs-12'>Tên đăng nhập: </div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>
                            <input type='text' value='$row[2]' p='$row[2]' id='them-usertk' />
                        </div>
                    </div>
                    <div class='row cttk1'>
                        <div class='col-md-5 col-sm-5 col-xs-12'>Mật khẩu: </div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>
                            <input type='text' value='$row[3]' id='them-passtk' />
                        </div>
                    </div>
                    <div class='row cttk1'>
                        <div class='col-md-5 col-sm-5 col-xs-12'>Tình trạng: </div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>
                            <select id='them-tinhtrangtk'>";
            if ($row[4]==0)
                $s=$s."<option>Chọn</option>
                        <option selected>Khóa</option>
                        <option>Kích hoạt</option>";
            if ($row[4]==1)
                $s=$s."<option>Chọn</option>
                        <option>Khóa</option>
                        <option selected>Kích hoạt</option>";
            $s=$s."</select>
                        </div>
                    </div>
                    <div class='row cttk1'>
                        <div class='col-md-6 col-sm-6 col-xs-12'>Ngày tạo tài khoản: </div>
                        <div class='col-md-6 col-sm-6 col-xs-12'>$date</div>
                    </div>
                    <div class='row cttk2'>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                            <input type='button' value='Sửa' id='buttonsuatk' />
                        </div>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                            <input type='button' value='Xóa' id='buttonxoatk' />
                        </div>
                    </div>";
            echo $s;
        }
        if ($kieu=='themtaikhoan1'){
            $matk=$_GET['ma'];
            $quyentk=$_GET['quyen'];
            $usertk=$_GET['user'];
            $pastk=$_GET['pass'];
            $tt=$_GET['tt'];
            $tinhtrang=0;
            $today=date("Y-m-d");
            if ($tt=='Khóa')
                $tinhtrang=0;
            else
                $tinhtrang=1;
            $kt=-1;
            $sql="select * from taikhoan where MaTK='$matk'";
            $r=$p->Check($sql);
            $sql1="select * from taikhoan where Username='$usertk'";
            $r1=$p->Check($sql1);
            if (mysqli_num_rows($r)>0)
                $kt=0;
            else{
                if (mysqli_num_rows($r1)>0)
                    $kt=1;
                else{
                    $sql2="INSERT INTO `taikhoan`(`MaTK`, `MaQuyen`, `Username`, `Password`, `TinhTrang`, `NgayTaoTK`) 
                    VALUES ('$matk','$quyentk','$usertk','$pastk',$tinhtrang,'$today')";
                    $p->Check($sql2);
                    $kt=2;
                }
            }
            echo $kt;
        }
        if ($kieu=='suataikhoan1'){
            $matk=$_GET['ma'];
            $quyentk=$_GET['quyen'];
            $usermoitk=$_GET['usermoi'];
            $usercutk=$_GET['usercu'];
            $pastk=$_GET['pass'];
            $tt=$_GET['tt'];
            $tinhtrang=0;
            if ($tt=='Khóa')
                $tinhtrang=0;
            else
                $tinhtrang=1;
            $kt=-1;
            if ($usermoitk!=$usercutk){
                $sql1="select * from taikhoan where Username='$usermoitk'";
                $r1=$p->Check($sql1);
                if (mysqli_num_rows($r1)>0)
                    $kt=1;
            }
            else{
                $sql2="UPDATE `taikhoan` SET `MaQuyen`='$quyentk',`Username`='$usermoitk',`Password`='$pastk',
                `TinhTrang`=$tinhtrang WHERE MaTK='$matk'";
                $p->Check($sql2);
                $kt=2;
            } 
            echo $kt;
        }
        if ($kieu=='xoataikhoan1'){
            $matk=$_GET['ma'];            
            $sql2="UPDATE `taikhoan` SET `TinhTrang`=2 WHERE MaTK='$matk'";
            $p->Check($sql2);
        }
    }
?>
<script>
    var ktuser=/^[a-zA-Z0-9]{4,16}$/;
    $(document).ready(function(){
        $("#quyentaikhoan1").click(function(){            
            $.get("./chucnangtaikhoan.php",{kieu:'quyentaikhoan'},function(data){
                $("#hienmenutk").html(data);
            });
        });
        $("#taikhoan1").click(function(){            
            $.get("./chucnangtaikhoan.php",{kieu:'taikhoan'},function(data){
                $("#hienmenutk").html(data);
            });
        });
        $(".pttaikhoan div").click(function(){            
            var p=$(this).attr('page');
            $.get("./chucnangtaikhoan.php",{kieu:'taikhoan',idpt:p},function(data){
                $("#hiennhieutk").html(data);
            });
        });
        $("#them-taikhoan").click(function(){
            $.get("./chucnangtaikhoan.php",{kieu:'themtaikhoan'},function(data){
                $("#xemchitiettk").html(data);
                $("#xemchitiettk").css("display","block");
            });
        });
        $(".contkh4").click(function(){
            var p=$(this).attr('p');
            $.get("./chucnangtaikhoan.php",{kieu:'suaxoataikhoan',matk:p},function(data){
                $("#xemchitiettk").html(data);
                $("#xemchitiettk").css("display","block");
            });
        });
        $("#buttonthemtk").click(function(){
            var ma=$("#them-matk").val();
            var quyen=$("#them-quyentk").val();
            var user=$("#them-usertk").val();
            var pass=$("#them-passtk").val();
            var tt=$("#them-tinhtrangtk").val();
            if (ma==""){
                alert("Chưa nhập mã tài khoản");
                $("#them-matk").focus();
                return false;
            }
            if (quyen=="Chọn"){
                alert("Chưa chọn quyền tài khoản");
                $("#them-quyentk").focus();
                return false;
            }
            if (user==""){
                alert("Chưa nhập tên đăng nhập");
                $("#them-usertk").focus();
                return false;
            }
            if (ktuser.test(user)==false){
                alert("Tên đăng nhập không phù hợp");
                $("#them-usertk").focus();
                return false;
            }
            if (pass==""){
                alert("Chưa nhập mật khẩu");
                $("#them-passtk").focus();
                return false;
            }
            if (ktuser.test(pass)==false){
                alert("Mật khẩu không phù hợp");
                $("#them-passtk").focus();
                return false;
            }
            if (tt=="Chọn"){
                alert("Chưa chọn tình trạng tài khoản");
                $("#them-matk").focus();
                return false;
            }
            $.get("./chucnangtaikhoan.php",{kieu:'themtaikhoan1',ma:ma,quyen:quyen,user:user,pass:pass,tt:tt}, function(data){
                var x=data.split('<script>');
                if (x[0]==0)
                    alert("Mã tài khoản đã tồn tại");                
                if (x[0]==1)
                    alert("Tên đăng nhập đã tồn tại");
                if (x[0]==2){
                    alert("Thêm thành công");
                    location.reload();
                }
            });
        });
        $("#buttonsuatk").click(function(){
            var ma=$("#them-matk").val();
            var quyen=$("#them-quyentk").val();
            var usermoi=$("#them-usertk").val();
            var usercu=$("#them-usertk").attr('p');
            var pass=$("#them-passtk").val();
            var tt=$("#them-tinhtrangtk").val();
            if (ma==""){
                alert("Chưa nhập mã tài khoản");
                $("#them-matk").focus();
                return false;
            }
            if (quyen=="Chọn"){
                alert("Chưa chọn quyền tài khoản");
                $("#them-quyentk").focus();
                return false;
            }
            if (usermoi==""){
                alert("Chưa nhập tên đăng nhập");
                $("#them-usertk").focus();
                return false;
            }
            if (ktuser.test(usermoi)==false){
                alert("Tên đăng nhập không phù hợp");
                $("#them-usertk").focus();
                return false;
            }
            if (pass==""){
                alert("Chưa nhập mật khẩu");
                $("#them-passtk").focus();
                return false;
            }
            if (ktuser.test(pass)==false){
                alert("Mật khẩu không phù hợp");
                $("#them-passtk").focus();
                return false;
            }
            if (tt=="Chọn"){
                alert("Chưa chọn tình trạng tài khoản");
                $("#them-matk").focus();
                return false;
            }
            $.get("./chucnangtaikhoan.php",{kieu:'suataikhoan1',ma:ma,quyen:quyen,usermoi:usermoi,usercu:usercu,pass:pass,tt:tt}, function(data){
                var x=data.split('<script>');              
                if (x[0]==1)
                    alert("Tên đăng nhập đã tồn tại");
                if (x[0]==2){
                    alert("Sửa thành công");
                    location.reload();
                }
            });
        });
        $("#buttonxoatk").click(function(){
            if (confirm('Bạn có chắc muốn xóa')){
                var ma=$("#them-matk").val();            
                $.get("./chucnangtaikhoan.php",{kieu:'xoataikhoan1',ma:ma}, function(data){                    
                    alert("Xóa thành công");
                    location.reload();                    
                });
            }
        });
    });
</script>