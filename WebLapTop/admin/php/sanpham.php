<?php      
        if (isset($_POST['themmasp']) && isset($_POST['themloaisp']) && isset($_POST['themhangsp']) && isset($_POST['themtensp']) &&isset($_POST['themhinhsp']) && isset($_POST['themmotasp'])){
            $ma=$_POST['themmasp'];
            $loai=$_POST['themloaisp'];
            $hang=$_POST['themhangsp'];
            $ten=$_POST['themtensp'];
            $hinh=$_POST['themhinhsp'];
            $mota=$_POST['themmotasp'];
            $hinh1="";  
            if ($hinh=="")
                $hinh1="sanpham.jfif";
            else{
                $hinh1=$hinh;
            }
            $ktrama="select * from sanpham where MaNhomSP='$ma'";
            $re1=$p->Check($ktrama);
            if (mysqli_num_rows($re1)>0){
                echo "<script>alert('Mã đã tồn tại')</script>";
            }
            else{
                $sql="INSERT INTO `sanpham`(`MaNhomSP`, `MaLoai`, `MaHang`, `TenSP`, `TenHinh`, `MoTa`, `SoLuong`, `GiaGoc`, `TinhTrang`) 
                        VALUES ('$ma','$loai','$hang','$ten','$hinh1','$mota',0,0,0)";
                $re2=$p->Check($sql);
                $maln=$ma.'LN';
                $sql1="INSERT INTO `loinhuan`(`MaLoiNhuan`, `MaNhomSP`, `PhanTramLoiNhuan`) 
                VALUES ('$maln','$ma',5)";
                $p->Check($sql1);
                echo "<script>alert('Thêm thành công')                   
                        </script>";        
            }
        }             
?>
<script>
    function ktrathem(){
        var ma=document.getElementById('idthemmasp');
        var loai=document.getElementById('idthemloaisp');
        var hang=document.getElementById('idthemhangsp');
        var ten=document.getElementById('idthemtensp');
        var hinh=document.getElementById('idthemhinhsp');
        var mota=document.getElementById('idthemmotasp');     
        if (ma.value==""){
            alert("Chưa nhập mã sản phẩm");
            ma.focus();
            return false;
        }
        if (loai.value=="Chọn loại"){
            alert("Chưa chọn loại sản phẩm");
            loai.focus();
            return false;
        }
        if (hang.value=="Chọn hãng"){
            alert("Chưa chọn hãng sản phẩm");
            hang.focus();
            return false;
        }
        if (ten.value==""){
            alert("Chưa nhập tên sản phẩm");
            ten.focus();
            return false;
        }
        if (mota.value==""){
            alert("Chưa nhập mô tả sản phẩm");
            mota.focus();
            return false;
        }
    }
    function ktrasuaxoa(){
        var ma=document.getElementById('idsuaxoamasp');
        var loai=document.getElementById('idsuaxoaloaisp');
        var hang=document.getElementById('idsuaxoahangsp');
        var ten=document.getElementById('idsuaxoatensp');
        var hinh=document.getElementById('idsuaxoahinhsp');
        var mota=document.getElementById('idsuaxoamotasp');         
        if (ma.value==""){
            alert("Chưa nhập mã sản phẩm");
            ma.focus();
            return false;
        }
        if (loai.value=="Chọn loại"){
            alert("Chưa chọn loại sản phẩm");
            loai.focus();
            return false;
        }
        if (hang.value=="Chọn hãng"){
            alert("Chưa chọn hãng sản phẩm");
            hang.focus();
            return false;
        }
        if (ten.value==""){
            alert("Chưa nhập tên sản phẩm");
            ten.focus();
            return false;
        }
        if (mota.value==""){
            alert("Chưa nhập mô tả sản phẩm");
            mota.focus();
            return false;
        }
    }
</script>
<?php
    if (isset($_GET['k'])){
        $k=$_GET['k'];
        if ($k=='loai'){
            $loaisp="";
            $loaisp=$loaisp."<div class='container loaisp'>
                <div class='row tatloaisp'><a href='./quanly.php?id=SP'>X</a></div>
                <div class='row titleloaisp'>
                    <div class='col-md-12 col-sm-12 col-xs-12'>Loại sản phẩm</div>
                </div>
                <div class='row'>
                    <div class='col=md-4 col-sm-4 col-xs-12'>Mã loại: </div>
                    <div class='col=md-6 col-sm-6 col-xs-12'><input type='text' id='themmaloai' placeholder='Mã loại' /></div>
                </div>
                <div class='row'>
                    <div class='col=md-4 col-sm-4 col-xs-12'>Tên loại: </div>
                    <div class='col=md-6 col-sm-6 col-xs-12 buttonthemloai'>
                        <input type='text' id='themtenloai' placeholder='Tên loại' />        
                    </div>
                    <div class='col=md-2 col-sm-2 col-xs-12 buttonthemloai'>            
                        <input type='button' id='btthemloai' value='Thêm' />
                    </div>
                </div>
                <div class='bangloaisp'>
                    <table class='container tbloai'>
                        <tr class='row'>
                            <td class='col-md-3 col-sm-3'>Mã loại</td>
                            <td class='col-md-6 col-sm-6'>Tên loại</td>
                            <td class='col-md-3 col-sm-3'>Chức năng</td>
                        </tr>";
            $p=new CheckConnection();
            $sql="select * from loai where TinhTrang=0";
            $result=$p->Check($sql);
            while($row=mysqli_fetch_array($result)){
                $loaisp=$loaisp."<tr class='row bangloai1'>
                <td class='col-md-3 col-sm-3'>$row[0]</td>
                <td class='col-md-6 col-sm-6'>$row[1]</td>
                <td class='col-md-3 col-sm-3 chucnang'>
                    <div class='sualoai' p='$row[0]'>Sửa</div>
                    <div class='xoaloai' p='$row[0]'>Xóa</div>
                </td>
            </tr>";
            }          
            $loaisp=$loaisp."</table>
                                </div>
                            </div>";
            echo $loaisp;
        }
        if ($k=='hang'){
            $hangsp="";
            $hangsp=$hangsp."<div class='container loaisp'>
                <div class='row tatloaisp'><a href='./quanly.php?id=SP'>X</a></div>
                <div class='row titleloaisp'>
                    <div class='col-md-12 col-sm-12 col-xs-12'>Hãng sản phẩm</div>
                </div>
                <div class='row'>
                    <div class='col=md-4 col-sm-4 col-xs-12'>Mã hãng: </div>
                    <div class='col=md-6 col-sm-6 col-xs-12'><input type='text' id='themmahang' placeholder='Mã hãng' /></div>
                </div>
                <div class='row'>
                    <div class='col=md-4 col-sm-4 col-xs-12'>Tên hang: </div>
                    <div class='col=md-6 col-sm-6 col-xs-12 buttonthemloai'>
                        <input type='text' id='themtenhang' placeholder='Tên hãng' />        
                    </div>
                    <div class='col=md-2 col-sm-2 col-xs-12 buttonthemloai'>            
                        <input type='button' id='btthemhang' value='Thêm' />
                    </div>
                </div>
                <div class='bangloaisp'>
                    <table class='container tbloai'>
                        <tr class='row'>
                            <td class='col-md-3 col-sm-3'>Mã hãng</td>
                            <td class='col-md-6 col-sm-6'>Tên hãng</td>
                            <td class='col-md-3 col-sm-3'>Chức năng</td>
                        </tr>";
            $p=new CheckConnection();
            $sql="select * from hang where TinhTrang=0";
            $result=$p->Check($sql);
            while($row=mysqli_fetch_array($result)){
                $hangsp=$hangsp."<tr class='row bangloai1'>
                <td class='col-md-3 col-sm-3'>$row[0]</td>
                <td class='col-md-6 col-sm-6'>$row[1]</td>
                <td class='col-md-3 col-sm-3 chucnang'>
                    <div class='suahang' p='$row[0]'>Sửa</div>
                    <div class='xoahang' p='$row[0]'>Xóa</div>
                </td>
            </tr>";
            }          
            $hangsp=$hangsp."</table>
                                </div>
                            </div>";
            echo $hangsp;
        }
    }
?>
<div class="container sanpham">
        <div class="row loaihang">           
            <a href="./quanly.php?id=SP&k=loai" class="col-md-2 col-sm-2 col-xs-12">Loại</a>
            <a href="./quanly.php?id=SP&k=hang" class="col-md-2 col-sm-2 col-xs-12">Hãng</a>
        </div>
        <div class="row title-sp">
            <div class="col-md-12 col-sm-12 col-xs-12">Tìm kiếm sản phẩm</div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div>Theo mã sản phẩm: </div>
                <div><input type="text" placeholder="Mã sản phẩm" id="tk-masp" /></div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div>Theo loại: </div>
                <div>
                    <select id="tk-loaisp">
                        <option>Theo loại</option>
                        <?php                         
                            $sql="select * from loai where TinhTrang=0";
                            $p=new CheckConnection();
                            $result=$p->Check($sql);
                            while ($row=mysqli_fetch_array($result)){
                                echo "<option>$row[0]</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div>Theo hãng: </div>
                <div>
                    <select id="tk-hangsp">
                        <option>Theo hãng</option>
                        <?php                         
                            $sql="select * from hang where TinhTrang=0";
                            $p=new CheckConnection();
                            $result=$p->Check($sql);
                            while ($row=mysqli_fetch_array($result)){
                                echo "<option>$row[0]</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12 btthemsp">
                <a href="./quanly.php?id=SP&idthem=them"><img src="../img/plus.png" /></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div>Theo tên sản phẩm: </div>
                <div><input type="text" placeholder="Tên sản phẩm" id="tk-tensp" /></div> 
                <div><input type="button" value="Tìm kiếm" id="bt-tksp" /></div> 
            </div>        
        </div>
</div>
<div class="container hienthisanpham">
        <div class="row sp-con1">
            <div class="col-md-4 col-sm-4 col-xs-12">Hình ảnh</div>
            <div class="col-md-2 col-sm-2 col-xs-12">Mã sản phẩm</div>
            <div class="col-md-2 col-sm-2 col-xs-12">Loại</div>
            <div class="col-md-2 col-sm-2 col-xs-12">Hãng</div>
            <div class="col-md-2 col-sm-2 col-xs-12">Số lượng</div>
        </div>
        <div id="hienthisp">
            <?php
                $p=new CheckConnection();                                                                
                $pt=1;
                if (isset($_GET['ptsp']))
                    $pt=$_GET['ptsp'];
                $tu=($pt-1)*5;                    
                $sql="select * from sanpham where TinhTrang=0 limit $tu,5";        
                $result=$p->Check($sql);
                $s="";
                while($r=mysqli_fetch_array($result)){
                    $s=$s."<a href='quanly.php?id=SP&ptsp=$pt&idsp=$r[0]' class='xemsp'><div class='row sp-con2'>
                        <div class='col-md-4 col-sm-4 col-xs-12'><img src='../img/$r[4]' /></div>
                        <div class='col-md-2 col-sm-2 col-xs-12 sp-con21'>$r[0]</div>
                        <div class='col-md-2 col-sm-2 col-xs-12 sp-con21'>$r[1]</div>
                        <div class='col-md-2 col-sm-2 col-xs-12 sp-con21'>$r[2]</div>
                        <div class='col-md-2 col-sm-2 col-xs-12 sp-con21'>$r[6]</div>
                    </div></a>";
                }
                echo $s;
                $sql1="SELECT COUNT(MaNhomSP) from sanpham WHERE TinhTrang=0";
                $re1=$p->Check($sql1);
                $t=mysqli_fetch_row($re1);            
                $d=ceil($t[0]/5);          
                $spt="";
                if ($d>1){
                    $spt=$spt."<div class='row sp-con3'>
                    <div class='col-md-12 col-sm-12 col-xs-12 sp-con31'>";
                    for ($i=1;$i<=$d;$i++){
                        if ($i==$pt)
                            $spt=$spt."<a href='quanly.php?id=SP&ptsp=$i'><div style='color:red'>$i</div></a>";
                        else
                            $spt=$spt."<a href='quanly.php?id=SP&ptsp=$i'><div>$i</div></a>";
                    }
                    $spt=$spt."</div></div>";
                }
                echo $spt;            
            ?>        
        </div>    
</div>
<?php
    if(isset($_GET['idthem'])){        
        $s="";
        $s="<div class='container them1sp'>
            <form method='POST' action='./quanly.php?id=SP' onsubmit='return ktrathem();'>
                <div class='row tatthemsp'><a href='./quanly.php?id=SP'>X</a></div>
                <div class='row'>
                    <div class='col-md-4 col-sm-4 col-xs-12'>Mã sản phẩm:</div>
                    <div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='themmasp' id='idthemmasp' placeholder='Mã sản phẩm' /></div>
                </div>
                <div class='row'>
                    <div class='col-md-4 col-sm-4 col-xs-12'>Loại sản phẩm:</div>
                    <div class='col-md-8 col-sm-8 col-xs-12'>
                        <select name='themloaisp' id='idthemloaisp'>
                            <option>Chọn loại</option>";                                    
        $sql='select * from loai where TinhTrang=0';
        $p=new CheckConnection();
        $result=$p->Check($sql);
        while ($row=mysqli_fetch_array($result)){
            $s=$s."<option>$row[0]</option>";
        }                    
        $s=$s."</select>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-4 col-sm-4 col-xs-12'>Hãng sản phẩm:</div>
                    <div class='col-md-8 col-sm-8 col-xs-12'>
                        <select name='themhangsp' id='idthemhangsp'>
                            <option>Chọn hãng</option>";                                       
        $sql='select * from hang where TinhTrang=0';
        $p=new CheckConnection();
        $result=$p->Check($sql);
        while ($row=mysqli_fetch_array($result)){
            $s=$s."<option>$row[0]</option>";
        }                     
        $s=$s."</select>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-4 col-sm-4 col-xs-12'>Tên sản phẩm:</div>
                    <div class='col-md-8 col-sm-8 col-xs-12'><input type='text' id='idthemtensp' name='themtensp' placeholder='Tên sản phẩm' /></div>
                </div>
                <div class='row'>            
                    <div class='col-md-12 col-sm-12 col-xs-12'>
                        <input type='file' id='idthemhinhsp' name='themhinhsp' />
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-4 col-sm-4 col-xs-12'>Mô tả sản phẩm:</div>
                    <div class='col-md-8 col-sm-8 col-xs-12'>
                        <textarea name='themmotasp' id='idthemmotasp'></textarea>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-12 col-sm-12 col-xs-12'>
                        <input type='submit' value='Thêm sản phẩm' id='form-btthem' />
                    </div>            
                </div>
            </form>
        </div>";
        echo $s;
    }
    if(isset($_GET['idsp'])){ 
        $ma=$_GET['idsp'];
        $ktrama="select * from sanpham where MaNhomSP='$ma'";
        $re1=$p->Check($ktrama); 
        $row1=mysqli_fetch_row($re1);      
        $s="";
        $s="<div class='container them1sp'>
                <div class='row tatthemsp'><a href='./quanly.php?id=SP'>X</a></div>
                <div class='row'>
                    <div class='col-md-4 col-sm-4 col-xs-12'>Mã sản phẩm:</div>
                    <div class='col-md-8 col-sm-8 col-xs-12'><input type='text' value='$row1[0]' name='suaxoamasp' id='idsuaxoamasp' placeholder='Mã sản phẩm' readonly /></div>
                </div>
                <div class='row'>
                    <div class='col-md-4 col-sm-4 col-xs-12'>Loại sản phẩm:</div>
                    <div class='col-md-8 col-sm-8 col-xs-12'>
                        <select name='suaxoaloaisp' id='idsuaxoaloaisp'>
                            <option>Chọn loại</option>";                                    
        $sql='select * from loai where TinhTrang=0';
        $p=new CheckConnection();
        $result=$p->Check($sql);
        while ($row=mysqli_fetch_array($result)){
            if ($row[0]==$row1[1])
                $s=$s."<option selected>$row[0]</option>";
            else
                $s=$s."<option>$row[0]</option>";
        }                    
        $s=$s."</select>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-4 col-sm-4 col-xs-12'>Hãng sản phẩm:</div>
                    <div class='col-md-8 col-sm-8 col-xs-12'>
                        <select name='suaxoahangsp' id='idsuaxoahangsp'>
                            <option>Chọn hãng</option>";                                       
        $sql='select * from hang where TinhTrang=0';
        $p=new CheckConnection();
        $result=$p->Check($sql);
        while ($row=mysqli_fetch_array($result)){
            if ($row[0]==$row1[2])
                $s=$s."<option selected>$row[0]</option>";
            else
                $s=$s."<option>$row[0]</option>";
        }     
        $p1=new Xuly();
        $tien=$p1->Chuyentien($row1[7]);
        $s=$s."</select>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-4 col-sm-4 col-xs-12'>Tên sản phẩm:</div>
                    <div class='col-md-8 col-sm-8 col-xs-12'><input type='text' value='$row1[3]' id='idsuaxoatensp' name='suaxoatensp' placeholder='Tên sản phẩm' /></div>
                </div>
                <div class='row'>            
                    <div class='col-md-12 col-sm-12 col-xs-12'>
                        <input type='file' value='$row1[4]' id='idsuaxoahinhsp' name='suaxoahinhsp' />
                        <input type='checkbox' value='sanpham.jfif' id='bochonhinhsp' />Bỏ chọn hình
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-4 col-sm-4 col-xs-12'>Mô tả sản phẩm: </div>
                    <div class='col-md-8 col-sm-8 col-xs-12'>
                        <textarea name='suaxoamotasp' id='idsuaxoamotasp'>$row1[5]</textarea>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-6 col-sm-5 col-xs-12'>Giá nhập: $tien</div>                    
                </div>
                <div class='row'>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                        <a href='./quanly.php?id=SP'><input type='button' value='Sửa' id='form-btsua' /></a>
                    </div>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                        <a href='./quanly.php?id=SP'><input type='button' value='Xóa' id='form-btxoa' /></a>
                    </div>             
                </div>
        </div>";
        echo $s;
    }     
?>
<script>
    $(document).ready(function(){        
        $("#form-btsua").click(function(){
            var ma=$("#idsuaxoamasp").val();
            var loai=$("#idsuaxoaloaisp").val();
            var hang=$("#idsuaxoahangsp").val();
            var ten=$("#idsuaxoatensp").val();
            var hinh=$("#idsuaxoahinhsp").val();
            var mota=$("#idsuaxoamotasp").val();
            if($("#bochonhinhsp").is(":checked"))
                hinh="sanpham.jfif";            
            if (ma==""){
                alert("Chưa nhập mã sản phẩm");
                $("#idsuaxoamasp").focus();
                return false;
            }
            if (loai=="Chọn loại"){
                alert("Chưa chọn loại sản phẩm");
                $("#idsuaxoaloaisp").focus();
                return false;
            }
            if (hang=="Chọn hãng"){
                alert("Chưa chọn hãng sản phẩm");
                $("#idsuaxoahangsp").focus();
                return false;
            }
            if (ten==""){
                alert("Chưa nhập tên sản phẩm");
                $("#idsuaxoatensp").focus();
                return false;
            }
            if (mota==""){
                alert("Chưa nhập mô tả sản phẩm");
                $("#idsuaxoamotasp").focus();
                return false;
            }            
            $.get("./suaxoasp.php",{id345:'sua',suaxoamasp:ma,suaxoaloaisp:loai,suaxoahangsp:hang,suaxoatensp:ten,suaxoahinhsp:hinh,suaxoamotasp:mota},function(data){
                alert("Sửa thành công");           
            });
        });
        $("#form-btxoa").click(function(){
            if(confirm('Bạn có chắc muốn xóa')){
                var ma=$("#idsuaxoamasp").val();
                var loai=$("#idsuaxoaloaisp").val();
                var hang=$("#idsuaxoahangsp").val();
                var ten=$("#idsuaxoatensp").val();
                var hinh=$("#idsuaxoahinhsp").val();
                var mota=$("#idsuaxoamotasp").val();              
                if (ma==""){
                    alert("Chưa nhập mã sản phẩm");
                    $("#idsuaxoamasp").focus();
                    return false;
                }
                if (loai=="Chọn loại"){
                    alert("Chưa chọn loại sản phẩm");
                    $("#idsuaxoaloaisp").focus();
                    return false;
                }
                if (hang=="Chọn hãng"){
                    alert("Chưa chọn hãng sản phẩm");
                    $("#idsuaxoahangsp").focus();
                    return false;
                }
                if (ten==""){
                    alert("Chưa nhập tên sản phẩm");
                    $("#idsuaxoatensp").focus();
                    return false;
                }
                if (mota==""){
                    alert("Chưa nhập mô tả sản phẩm");
                    $("#idsuaxoamotasp").focus();
                    return false;
                }            
                $.get("./suaxoasp.php",{id345:'xoa',suaxoamasp:ma,suaxoaloaisp:loai,suaxoahangsp:hang,suaxoatensp:ten,suaxoahinhsp:hinh,suaxoamotasp:mota},function(data){
                    alert("Xóa thành công");           
                });
            }
        });
        $("#bt-tksp").click(function(){
            var ma=$("#tk-masp").val();
            var loai=$("#tk-loaisp").val();
            var hang=$("#tk-hangsp").val();
            var ten=$("#tk-tensp").val();
            $.get("./timkiemsp.php",{nametkmasp:ma,nametkloaisp:loai,nametkhangsp:hang,nametktensp:ten},function(data){
                $("#hienthisp").html(data);                               
            });
        });
        $(".pttkloaisp").click(function(){
            var ma=$("#tk-masp").val();
            var loai=$("#tk-loaisp").val();
            var hang=$("#tk-hangsp").val();
            var ten=$("#tk-tensp").val();
            var page=$(this).attr('page');
            alert("true");
            $.get("./timkiemsp.php",{page:page,nametkmasp:ma,nametkloaisp:loai,nametkhangsp:hang,nametktensp:ten},function(data){
                $("#hienthisp").html(data);                               
            });
        });
        $("#btthemloai").click(function(){
            var ma=$("#themmaloai").val();
            var ten=$("#themtenloai").val();
            if (ma==""){
                alert("Chưa nhập mã loại");
                $("#themmaloai").focus();
                return false;
            }
            if (ten==""){
                alert("Chưa nhập tên loại");
                $("#themtenloai").focus();
                return false;
            }
            $.get("./loaisp.php",{a:'them',maloai:ma,tenloai:ten},function(data){
                if (data!=0){
                    alert("Thêm thành công");
                    location.reload();
                }
                else
                    alert("Mã đã tồn tại");
            });
        });
        $(".sualoai").click(function(){            
            var ten=$("#themtenloai").val();
            var ma1=$(this).attr('p');                        
            if (ten==""){
                alert("Chưa nhập tên loại muốn sửa");
                $("#themtenloai").focus();
                return false;
            }
            $.get("./loaisp.php",{a:'sua',maloai:ma1,tenloai:ten},function(data){
                if (data!=0){
                    alert("Sửa thành công");
                    location.reload();
                }                
            });
        });
        $(".xoaloai").click(function(){     
            if(confirm('Bạn có chắc muốn xóa')){      
                var ma1=$(this).attr('p');             
                $.get("./loaisp.php",{a:'xoa',maloai:ma1},function(data){
                    if (data!=0){
                        alert("Xóa thành công");
                        location.reload();
                    }                
                });
            }
        });
        $("#btthemhang").click(function(){
            var ma=$("#themmahang").val();
            var ten=$("#themtenhang").val();
            if (ma==""){
                alert("Chưa nhập mã hãng");
                $("#themmahang").focus();
                return false;
            }
            if (ten==""){
                alert("Chưa nhập tên hãng");
                $("#themtenhang").focus();
                return false;
            }
            $.get("./hangsp.php",{a:'them',mahang:ma,tenhang:ten},function(data){
                if (data!=0){
                    alert("Thêm thành công");
                    location.reload();
                }
                else
                    alert("Mã đã tồn tại");
            });
        });
        $(".suahang").click(function(){            
            var ten=$("#themtenhang").val();
            var ma1=$(this).attr('p');                                  
            if (ten==""){
                alert("Chưa nhập tên loại muốn sửa");
                $("#themtenhang").focus();
                return false;
            }
            $.get("./hangsp.php",{a:'sua',mahang:ma1,tenhang:ten},function(data){
                if (data!=0){
                    alert("Sửa thành công");
                    location.reload();
                }                
            });
        });
        $(".xoahang").click(function(){     
            if(confirm('Bạn có chắc muốn xóa')){      
                var ma1=$(this).attr('p');             
                $.get("./hangsp.php",{a:'xoa',mahang:ma1},function(data){
                    if (data!=0){
                        alert("Xóa thành công");
                        location.reload();
                    }                
                });
            }
        });
    });
</script>