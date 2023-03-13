<?php
    include('ketnoi.php');    
    $p=new CheckConnection();
    if (isset($_GET['kieu'])){
        $kieu=$_GET['kieu'];
        if ($kieu=='ln'){
            $s="";
            $s=$s."<div class='row titleln'>
                        <div class='col-md-12 col-sm-12 col-xs-12'>Tìm kiếm lợi nhuận sản phẩm</div>
                    </div>
                    <div class='row conln1'>
                        <div class='col-md-2 col-sm-2 col-xs-12'>Theo mã lợi nhuận:</div>
                        <div class='col-md-3 col-sm-3 col-xs-12'><input type='text' placeholder='Mã lợi nhuận' id='tk-maln' /></div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>Theo mã sản phẩm:</div>
                        <div class='col-md-3 col-sm-3 col-xs-12'><input type='text' placeholder='Mã sản phẩm' id='tk-maspln' /></div>
                    </div>
                    <div class='row conln1'>
                        <div class='col-md-2 col-sm-2 col-xs-12'>Theo % lợi nhuận:</div>
                        <div class='col-md-3 col-sm-3 col-xs-12'><input type='text' placeholder='% lợi nhuận' id='tk-phantramln' /></div>
                        <div class='col-md-2 col-sm-2 col-xs-12'><input type='button' value='Tìm kiếm' id='bttkln' /></div>
                    </div>
                    <div class='row conln2'>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                            <div class='row conln3'>
                                <div class='col-md-4 col-sm-4 col-xs-4'>Mã lợi nhuận</div>
                                <div class='col-md-4 col-sm-4 col-xs-4'>Mã sản phẩm</div>
                                <div class='col-md-4 col-sm-4 col-xs-4'>% lợi nhuận</div>
                            </div>
                            <div id='hienln'>";
            $sql="select * from loinhuan";
            $r=$p->Check($sql);
            $ln="";
            while($t=mysqli_fetch_array($r)){
                $ln=$ln."<div class='row conln4' p='$t[0]'>
                            <div class='col-md-4 col-sm-4 col-xs-4'>$t[0]</div>
                            <div class='col-md-4 col-sm-4 col-xs-4'>$t[1]</div>
                            <div class='col-md-4 col-sm-4 col-xs-4'>$t[2]%</div>
                        </div>";
            }
            $s=$s.$ln;
            $s=$s."</div>
                    </div>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                        <div class='row conln5'>
                            <div class='col-md-12 col-sm-12 col-xs-12'>Chỉnh sửa % lợi nhuận</div>
                        </div>
                        <div id='chinhsualn'>
                        </div>                
                    </div>
                </div>";   
            echo $s;         
        }
        if ($kieu=='ctln'){
            $maln=$_GET['maln'];
            $sql="select * from loinhuan where MaLoiNhuan='$maln'";
            $s="";
            $r=$p->Check($sql);
            $t=mysqli_fetch_row($r);
            $s=$s."<div class='row conln6'>
                    <div class='col-md-4 col-sm-4 col-xs-12'>Mã lợi nhuận:</div>
                    <div class='col-md-4 col-sm-4 col-xs-12 hienmaln'>$t[0]</div>
                </div>
                <div class='row conln6'>
                    <div class='col-md-4 col-sm-4 col-xs-12'>Mã sản phẩm:</div>
                    <div class='col-md-4 col-sm-4 col-xs-12 hienmaln'>$t[1]</div>
                </div>
                <div class='row conln6'>
                    <div class='col-md-4 col-sm-4 col-xs-12'>% lợi nhuận:</div>
                    <div class='col-md-4 col-sm-4 col-xs-12'><input type='text' value='$t[2]' id='hienptln' /></div>
                </div>
                <div class='row conln7'>
                    <div class='col-md-12 col-sm-12 col-xs-12'>
                        <input type='button' value='Sửa' id='btsualn' p='$t[0]' />
                    </div>                        
                </div>";
            echo $s;
        }
        if ($kieu=='sualn'){
            $maln=$_GET['maln'];
            $ptln=$_GET['ptln'];
            $sql="UPDATE loinhuan SET PhanTramLoiNhuan=$ptln where MaLoiNhuan='$maln'";
            $p->Check($sql);
            $sql1="select * from loinhuan";
            $r=$p->Check($sql1);
            $ln="";
            while($t=mysqli_fetch_array($r)){
                $ln=$ln."<div class='row conln4' p='$t[0]'>
                            <div class='col-md-4 col-sm-4 col-xs-4'>$t[0]</div>
                            <div class='col-md-4 col-sm-4 col-xs-4'>$t[1]</div>
                            <div class='col-md-4 col-sm-4 col-xs-4'>$t[2]%</div>
                        </div>";
            }
            echo $ln;
        }
        if ($kieu=='tk'){
            $maln=$_GET['maln'];
            $masp=$_GET['masp'];
            $ptln=$_GET['ptln'];
            if ($maln=="" && $masp=="" && $ptln==""){
                $sql1="select * from loinhuan";
                $r=$p->Check($sql1);
                $ln="";
                while($t=mysqli_fetch_array($r)){
                    $ln=$ln."<div class='row conln4' p='$t[0]'>
                                <div class='col-md-4 col-sm-4 col-xs-4'>$t[0]</div>
                                <div class='col-md-4 col-sm-4 col-xs-4'>$t[1]</div>
                                <div class='col-md-4 col-sm-4 col-xs-4'>$t[2]%</div>
                            </div>";
                }
                echo $ln;
            }
            if ($maln!="" && $masp=="" && $ptln==""){
                $sql1="select * from loinhuan where MaLoiNhuan='$maln'";
                $r=$p->Check($sql1);
                $ln="";
                if (mysqli_num_rows($r)>0){
                    while($t=mysqli_fetch_array($r)){
                        $ln=$ln."<div class='row conln4' p='$t[0]'>
                                    <div class='col-md-4 col-sm-4 col-xs-4'>$t[0]</div>
                                    <div class='col-md-4 col-sm-4 col-xs-4'>$t[1]</div>
                                    <div class='col-md-4 col-sm-4 col-xs-4'>$t[2]%</div>
                                </div>";
                    }
                    echo $ln;
                }
                else
                    echo "<div style='color:rgb(228,208,119)'>Không tìm thấy</div>";
            }
            if ($maln=="" && $masp!="" && $ptln==""){
                $sql1="select * from loinhuan where MaNhomSP='$masp'";
                $r=$p->Check($sql1);
                $ln="";
                if (mysqli_num_rows($r)>0){
                    while($t=mysqli_fetch_array($r)){
                        $ln=$ln."<div class='row conln4' p='$t[0]'>
                                    <div class='col-md-4 col-sm-4 col-xs-4'>$t[0]</div>
                                    <div class='col-md-4 col-sm-4 col-xs-4'>$t[1]</div>
                                    <div class='col-md-4 col-sm-4 col-xs-4'>$t[2]%</div>
                                </div>";
                    }
                    echo $ln;
                }
                else
                    echo "<div style='color:rgb(228,208,119)'>Không tìm thấy</div>";
            }
            if ($maln=="" && $masp=="" && $ptln!=""){
                $sql1="select * from loinhuan where PhanTramLoiNhuan='$ptln'";
                $r=$p->Check($sql1);
                $ln="";
                if (mysqli_num_rows($r)>0){
                    while($t=mysqli_fetch_array($r)){
                        $ln=$ln."<div class='row conln4' p='$t[0]'>
                                    <div class='col-md-4 col-sm-4 col-xs-4'>$t[0]</div>
                                    <div class='col-md-4 col-sm-4 col-xs-4'>$t[1]</div>
                                    <div class='col-md-4 col-sm-4 col-xs-4'>$t[2]%</div>
                                </div>";
                    }
                    echo $ln;
                }
                else
                    echo "<div style='color:rgb(228,208,119)'>Không tìm thấy</div>";
            }
        }
    }    
?>
<script>
    var so=/^\d{1,2}$/;
    $(document).ready(function(){
        $(".conln4").click(function(){
            var p=$(this).attr('p');
            $.get("./loinhuan.php",{kieu:'ctln',maln:p},function(data){
                $("#chinhsualn").html(data);
            });
        });
        $("#btsualn").click(function(){
            var p=$(this).attr('p');
            var ptln=$("#hienptln").val();
            if (ptln==""){
                alert("Chưa nhập % lợi nhuận");
                $("#hienptln").focus();
                return false;
            }
            if (so.test(ptln)==false){
                alert("Chỉ được nhập số và nhiếu nhất là 2 chữ số");
                $("#hienptln").focus();
                return false;
            }
            $.get("./loinhuan.php",{kieu:'sualn',maln:p,ptln:ptln},function(data){
                alert("Sửa thành công");
                $("#hienln").html(data);                
            })
        });
        $("#bttkln").click(function(){
            var ma=$("#tk-maln").val();
            var masp=$("#tk-maspln").val();
            var ptln=$("#tk-phantramln").val();
            if (ptln!=""){
                if (so.test(ptln)==false){
                    alert("Chỉ được nhập số và nhiếu nhất là 2 chữ số");
                    $("#tk-phantramln").focus();
                    return false;
                }
            }
            $.get("./loinhuan.php",{kieu:'tk',maln:ma,masp:masp,ptln:ptln},function(data){
                $("#hienln").html(data); 
            })
        });
    });
</script>
<!-- <div class='row titleln'>
            <div class='col-md-12 col-sm-12 col-xs-12'>Tìm kiếm lợi nhuận sản phẩm</div>
        </div>
        <div class='row conln1'>
            <div class='col-md-2 col-sm-2 col-xs-12'>Theo mã lợi nhuận:</div>
            <div class='col-md-3 col-sm-3 col-xs-12'><input type='text' placeholder='Mã lợi nhuận' id='tk-maln' /></div>
            <div class='col-md-2 col-sm-2 col-xs-12'>Theo mã sản phẩm:</div>
            <div class='col-md-3 col-sm-3 col-xs-12'><input type='text' placeholder='Mã sản phẩm' id='tk-maspln' /></div>
        </div>
        <div class='row conln1'>
            <div class='col-md-2 col-sm-2 col-xs-12'>Theo % lợi nhuận:</div>
            <div class='col-md-3 col-sm-3 col-xs-12'><input type='text' placeholder='% lợi nhuận' id='tk-phantramln' /></div>
            <div class='col-md-2 col-sm-2 col-xs-12'><input type='button' value='Tìm kiếm' id='bttkln' /></div>
        </div>
        <div class='row conln2'>
            <div class='col-md-6 col-sm-6 col-xs-12'>
                <div class='row conln3'>
                    <div class='col-md-4 col-sm-4 col-xs-4'>Mã lợi nhuận</div>
                    <div class='col-md-4 col-sm-4 col-xs-4'>Mã sản phẩm</div>
                    <div class='col-md-4 col-sm-4 col-xs-4'>% lợi nhuận</div>
                </div>
                <div id='hienln'>
                    <div class='row conln4'>
                        <div class='col-md-4 col-sm-4 col-xs-4'>A01LN</div>
                        <div class='col-md-4 col-sm-4 col-xs-4'>A01</div>
                        <div class='col-md-4 col-sm-4 col-xs-4'>10%</div>
                    </div>
                </div>
            </div>
            <div class='col-md-6 col-sm-6 col-xs-12'>
                <div class='row conln5'>
                    <div class='col-md-12 col-sm-12 col-xs-12'>Chỉnh sửa % lợi nhuận</div>
                </div>
                <div id='chinhsualn'>
                    <div class='row conln6'>
                        <div class='col-md-4 col-sm-4 col-xs-12'>Mã lợi nhuận:</div>
                        <div class='col-md-4 col-sm-4 col-xs-12 hienmaln'>A01LN</div>
                    </div>
                    <div class='row conln6'>
                        <div class='col-md-4 col-sm-4 col-xs-12'>Mã sản phẩm:</div>
                        <div class='col-md-4 col-sm-4 col-xs-12 hienmaln'>A01</div>
                    </div>
                    <div class='row conln6'>
                        <div class='col-md-4 col-sm-4 col-xs-12'>% lợi nhuận:</div>
                        <div class='col-md-4 col-sm-4 col-xs-12'><input type='text' id='hienptln' /></div>
                    </div>
                    <div class='row conln7'>
                        <div class='col-md-12 col-sm-12 col-xs-12'>
                            <input type='button' value='Sửa' id='btsualn' />
                        </div>                        
                    </div>
                </div>                
            </div>
        </div> -->