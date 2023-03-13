<div class='container taikhoan'>
    <div class='row menutaikhoan'>
        <div class='col-md-2 col-sm-2 col-xs-12' id='taikhoan1'>Quản lý tài khoản</div>
        <div class='col-md-2 col-sm-2 col-xs-12' id='quyentaikhoan1'>Quyền tài khoản</div>
    </div>
    <div id='hienmenutk'>
        <?php
            $p=new CheckConnection();
            $p1=new Xuly();
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
        ?>                
    </div>
</div>

<div class='container chitiettaikhoan' id='xemchitiettk'>
                        
                
</div>
<script>
    function tatcttk(){
        document.getElementById('xemchitiettk').style.display='none';
    }
    $(document).ready(function(){
        $("#quyentaikhoan1").click(function(){            
            $.get("./quyentaikhoan.php",{kieu:'quyentk'},function(data){
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
        $("#tkbttaikhoan").click(function(){
            var matk=$("#tk-matk").val();
            var tentk=$("#tk-usertk").val();
            var maquyen=$("#tk-quyentk").val();
            var tinhtrang=$("#tk-tinhtrangtk").val();
            $.get("./timkiemtaikhoan.php",{matk:matk,ten:tentk,maq:maquyen,tt:tinhtrang},function(data){
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
        
    })
</script>