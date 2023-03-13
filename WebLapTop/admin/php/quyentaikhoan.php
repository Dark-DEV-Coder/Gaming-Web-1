<?php
    include('ketnoi.php');
    $p=new CheckConnection();
    if (isset($_GET['kieu'])){
        $kieu=$_GET['kieu'];
        if ($kieu=='quyentk'){
            $s="";
            $s=$s."<div class='row titlequyentk'>
                    <div class='col-md-12 col-sm-12 col-xs-12'>Quyền tài khoản</div>
                </div>
                <div class='row quyen1'>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                        <div class='row quyenrow1'>
                            <div class='col-md-5 col-sm-3 col-xs-12'>Mã quyền</div>
                            <div class='col-md-7 col-sm-3 col-xs-12'>Tên quyền</div>
                        </div>
                    <div id='hienquyen'>";
            $sql="select * from quyentk";
            $r=$p->Check($sql);
            while($row=mysqli_fetch_array($r)){
                $s=$s."<div class='row quyenrow2' p='$row[0]'>
                            <div class='col-md-5 col-sm-3 col-xs-12'>$row[0]</div>
                            <div class='col-md-7 col-sm-3 col-xs-12'>$row[1]</div>
                        </div>";
            }
            $s=$s." </div>
                </div>
                <div class='col-md-6 col-sm-6 col-xs-12'>
                    <div class='row quyen3'>
                        <div class='col-md-8 col-sm-2 col-xs-2'></div>
                        <div class='col-md-4 col-sm-2 col-xs-2' id='them-quyen'>Thêm quyền</div>
                    </div>
                    <div id='xemchitietquyen'>
                        <div class='row quyen4'>
                            <div class='col-md-12 col-sm-12 col-xs-12'>Thêm</div>
                        </div>
                        <div class='row quyen5'>
                            <div class='col-md-2 col-sm-2 col-xs-12'></div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>Mã quyền: </div>
                            <div class='col-md-4 col-sm-4 col-xs-12'>
                                <input type='text' placeholder='Nhập mã quyền' id='them-maquyen' />
                            </div>
                        </div>
                        <div class='row quyen5'>
                            <div class='col-md-2 col-sm-2 col-xs-12'></div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>Tên quyền: </div>
                            <div class='col-md-4 col-sm-4 col-xs-12'>
                                <input type='text' placeholder='Nhập tên quyền' id='them-tenquyen' />
                            </div>
                        </div>
                        <div class='row quyen5'>
                            <div class='col-md-4 col-sm-4 col-xs-12'>Chọn chức năng:</div>                        
                        </div>
                        <div class='row quyen6'>
                            <div class='col-md-12 col-sm-12 col-xs-12'>
                                <div class='row'>";
            $sql1="select * from chucnang";
            $r1=$p->Check($sql1);
            while($row1=mysqli_fetch_array($r1)){
                $s=$s."<div class='col-md-6 col-sm-6 col-xs-12 chucnang1'>
                        <input type='checkbox' class='chucnang2' value='$row1[0]' /> $row1[1]
                    </div>";
            }
            $s=$s."</div>
                            </div>                       
                        </div>
                        <div class='row quyen7'>
                            <div class='col-md-12 col-sm-12 col-xs-12'>
                                <input type='button' value='Thêm' id='btthemquyen' />
                            </div>
                        </div>
                    </div>
                </div>
                </div>";
            echo $s;
        }
        if ($kieu=='themquyen1'){
            $s="";
            $s=$s."<div class='row quyen4'>
                            <div class='col-md-12 col-sm-12 col-xs-12'>Thêm</div>
                        </div>
                        <div class='row quyen5'>
                            <div class='col-md-2 col-sm-2 col-xs-12'></div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>Mã quyền: </div>
                            <div class='col-md-4 col-sm-4 col-xs-12'>
                                <input type='text' placeholder='Nhập mã quyền' id='them-maquyen' />
                            </div>
                        </div>
                        <div class='row quyen5'>
                            <div class='col-md-2 col-sm-2 col-xs-12'></div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>Tên quyền: </div>
                            <div class='col-md-4 col-sm-4 col-xs-12'>
                                <input type='text' placeholder='Nhập tên quyền' id='them-tenquyen' />
                            </div>
                        </div>
                        <div class='row quyen5'>
                            <div class='col-md-4 col-sm-4 col-xs-12'>Chọn chức năng:</div>                        
                        </div>
                        <div class='row quyen6'>
                            <div class='col-md-12 col-sm-12 col-xs-12'>
                                <div class='row'>";
            $sql1="select * from chucnang";
            $r1=$p->Check($sql1);
            while($row1=mysqli_fetch_array($r1)){
                $s=$s."<div class='col-md-6 col-sm-6 col-xs-12 chucnang1'>
                        <input type='checkbox' class='chucnang2' value='$row1[0]' /> $row1[1]
                    </div>";
            }
            $s=$s."</div>
                            </div>                       
                        </div>
                        <div class='row quyen7'>
                            <div class='col-md-12 col-sm-12 col-xs-12'>
                                <input type='button' value='Thêm' id='btthemquyen' />
                            </div>
                        </div>";
            echo $s;
        }
        if ($kieu=='ctquyentk'){
            $maq=$_GET['ma'];
            $sql="select * from quyentk where MaQuyen='$maq'";
            $r=$p->Check($sql);
            $a=mysqli_fetch_row($r);
            $s="";
             $s=$s."<div class='row quyen4'>
                            <div class='col-md-12 col-sm-12 col-xs-12'>Xem chi tiết</div>
                        </div>
                        <div class='row quyen5'>
                            <div class='col-md-2 col-sm-2 col-xs-12'></div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>Mã quyền: </div>
                            <div class='col-md-4 col-sm-4 col-xs-12'>
                                <input type='text' value='$a[0]' id='them-maquyen' readonly />
                            </div>
                        </div>
                        <div class='row quyen5'>
                            <div class='col-md-2 col-sm-2 col-xs-12'></div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>Tên quyền: </div>
                            <div class='col-md-4 col-sm-4 col-xs-12'>
                                <input type='text' value='$a[1]' id='them-tenquyen' />
                            </div>
                        </div>
                        <div class='row quyen5'>
                            <div class='col-md-4 col-sm-4 col-xs-12'>Chọn chức năng:</div>                        
                        </div>
                        <div class='row quyen6'>
                            <div class='col-md-12 col-sm-12 col-xs-12'>
                                <div class='row'>";
            if ($maq!='KH'){
                $sql2="select * from chitietquyen where MaQuyen='$maq' ORDER BY stt ASC";
                $arr=array();
                $r2=$p->Check($sql2);
                while($t=mysqli_fetch_array($r2)){
                    array_push($arr,$t[1]);
                }
                $sql1="select * from chucnang";
                $r1=$p->Check($sql1);
                $stt=0;
                while($row1=mysqli_fetch_array($r1)){
                    if ($arr[$stt]==$row1[0]){
                        $s=$s."<div class='col-md-6 col-sm-6 col-xs-12 chucnang1'>
                                <input type='checkbox' class='chucnang2' value='$row1[0]' checked /> $row1[1]
                            </div>";
                        $stt++;
                        if ($stt==count($arr))
                            $stt=0;
                    }
                    else{
                        $s=$s."<div class='col-md-6 col-sm-6 col-xs-12 chucnang1'>
                                <input type='checkbox' class='chucnang2' value='$row1[0]' /> $row1[1]
                            </div>";
                    }
                }
            }
            else{
                $sql1="select * from chucnang";
                $r1=$p->Check($sql1);
                $stt=0;
                while($row1=mysqli_fetch_array($r1)){                    
                    $s=$s."<div class='col-md-6 col-sm-6 col-xs-12 chucnang1'>
                            <input type='checkbox' class='chucnang2' value='$row1[0]' /> $row1[1]
                        </div>";                    
                }
            }
            $s=$s."</div>
                            </div>                       
                        </div>
                        <div class='row quyen7'>
                            <div class='col-md-12 col-sm-12 col-xs-12'>
                                <input type='button' value='Sửa' class='btsuaquyen' />
                            </div>
                        </div>
                    </div>
                </div>
                </div>";
            echo $s;
        }
        if ($kieu=='themquyen'){
            $a=$_GET['arr'];
            $sl=$_GET['sl'];
            $maq=$_GET['maq'];
            $tenq=$_GET['tenq'];
            $sql1="select * from quyentk where MaQuyen='$maq'";
            $r=$p->Check($sql1);
            $kt=-1;
            if (mysqli_num_rows($r)>0){
                $kt=0;
            }
            else{
                $kt=1;
                $sql="INSERT INTO `quyentk`(`MaQuyen`, `TenQuyen`) VALUES ('$maq','$tenq')";
                $p->Check($sql);
                for ($i=0;$i<$sl;$i++){
                    $stt=$i+1;
                    $s1="INSERT INTO `chitietquyen`(`MaQuyen`, `MaChucNang`,`stt`) VALUES ('$maq','$a[$i]',$stt)";
                    $p->Check($s1);
                }
            }
            echo $kt;
        }
        if ($kieu=='suaquyen'){
            $a=$_GET['arr'];
            $sl=$_GET['sl'];
            $maq=$_GET['maq'];
            $tenq=$_GET['tenq'];            
            $sql="UPDATE `quyentk` SET `TenQuyen`='$tenq' WHERE MaQuyen='$maq'";
            $p->Check($sql);
            $sql1="DELETE FROM `chitietquyen` WHERE MaQuyen='$maq'";
            $p->Check($sql1);
            for ($i=0;$i<$sl;$i++){
                $stt=$i+1;
                $s1="INSERT INTO `chitietquyen`(`MaQuyen`, `MaChucNang`,`stt`) VALUES ('$maq','$a[$i]',$stt)";
                $p->Check($s1);
            }            
        }
    }
?>   
<script>
    $(document).ready(function(){
        $("#them-quyen").click(function(){
            $.get("./hienquyentk.php",{kieu:'themquyen1'},function(data){                
                $("#xemchitietquyen").html(data);
            });
        });
        $(".quyenrow2").click(function(){
            var p=$(this).attr('p');
            $.get("./hienquyentk.php",{kieu:'ctquyentk',ma:p},function(data){                
                $("#xemchitietquyen").html(data);
            });
        });
        $("#btthemquyen").click(function(){
            var arr=[];
            var d=0;
            var ma=$("#them-maquyen").val();
            var ten=$("#them-tenquyen").val();
            var x=document.getElementsByClassName('chucnang2');
            var sl=0;
            for (i=0;i<x.length;i++){
                if (x[i].checked==true){
                    arr.push(x[i].value);
                    sl++;
                }   
                else
                    d++;
            }
            if (ma==""){
                alert("Chưa nhập mã quyền");
                $("#them-maquyen").focus();
                return false;
            }
            if (ten==""){
                alert("Chưa nhập tên quyền");
                $("#them-tenquyen").focus();
                return false;
            }
            if (d==x.length){
                alert("Chưa chọn chức năng");
                return false;
            }
            $.get("./quyentaikhoan.php",{kieu:'themquyen',sl:sl,arr:arr,maq:ma,tenq:ten},function(data){
                var k=data.split('<script>');
                if (k[0]==0){
                    alert("Mã đã tồn tại");
                }
                else{
                    alert("Thêm thành công");
                    location.reload();
                }
            })
        });
        $(".btsuaquyen").click(function(){
            alert("true");
        })      
    });
</script>                                                                                                                                                               