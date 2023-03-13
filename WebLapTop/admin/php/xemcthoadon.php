<?php
    session_start();
    include('ketnoi.php');
    include('xulydulieu.php');
    if (isset($_GET['cthd'])){
        $ma=$_GET['cthd'];
        $s="";
        $sql="select * from hoadon where MaHD='$ma'";
        $p=new CheckConnection();
        $p1=new Xuly();
        $result=$p->Check($sql);
        $row=mysqli_fetch_row($result);
        if ($row[5]==1){
            $tien1=$p1->Chuyentien($row[6]);
            $tien2=$p1->Chuyentien($row[7]);
            $tien3=$p1->Chuyentien($row[8]);
            $date=$p1->Chuyenngaythuan($row[3]);     
            $s="<div class='row tatcthd'>
                        <div class='col-md-12 col-sm-12 col-xs-12' onclick='tatct();'>X</div>
                    </div>
                    <div class='row ctma'>
                        <div class='col-md-4 col-sm-4 col-xs-12'>Mã hóa đơn: <span>$row[0]</span></div>  
                        <div class='col-md-4 col-sm-4 col-xs-12'>Mã khách hàng: <span>$row[1]</span></div>  
                        <div class='col-md-4 col-sm-4 col-xs-12'>Mã nhân viên: <span>$row[2]</span></div>                      
                    </div>
                    <div class='row ctma1'>
                            <div class='col-md-6 col-sm-6 col-xs-12'>Tổng tiền hóa đơn: <span>$tien1</span></div>
                            <div class='col-md-6 col-sm-6 col-xs-12'>Ngày lập hóa đơn: <span>$date</span></div>
                    </div>
                    <div class='row ctma2'>
                            <div class='col-md-6 col-sm-6 col-xs-12'>Tổng tiền khuyến mãi: <span>$tien2</span></div>
                            <div class='col-md-6 col-sm-6 col-xs-12'>Tình trạng: <span id='ttcthd'>Chưa xử lý</span></div>                       
                    </div>
                    <div class='row ctma3'>
                            <div class='col-md-6 col-sm-6 col-xs-12'>Tổng tiền phải trả: <span>$tien3</span></div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>Địa chỉ: </div>             
                            <div class='col-md-4 col-sm-4 col-xs-12'>
                                <textarea readonly>$row[4]</textarea>
                            </div>
                    </div>        
                    <div class='row ctma4'>
                        <div class='col-md-2 col-sm-2 col-xs-12'>Mã nhóm SP</div>
                        <div class='col-md-3 col-sm-3 col-xs-12'>Đơn giá</div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>Số lượng</div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>Tiền KM</div>
                        <div class='col-md-3 col-sm-3 col-xs-12'>Thành tiền</div>
                    </div>
                    <div id='hiencthd'>";
            $sql1="select * from chitiethoadon where MaHD='$ma'";     
            $result1=$p->Check($sql1);
            while($row1=mysqli_fetch_array($result1)){
                $s=$s."<div class='row ctma5'>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$row1[1]</div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>$row1[2]</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$row1[3]</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$row1[4]</div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>$row1[5]</div>
                        </div>";
            }
            $s=$s."</div>
                    <div class='row ctma6'>
                            <div class='col-md-6 col-sm-6 col-xs-12'><input type='button' value='Xử lý hóa đơn' id='xulyhd' p='$ma' /></div>
                            <div class='col-md-6 col-sm-6 col-xs-12'><input type='button' value='Xóa hóa đơn' id='xoahd' p='$ma' /></div>
                    </div>";
            echo $s;
        }
        else{
            $tien1=$p1->Chuyentien($row[6]);
            $tien2=$p1->Chuyentien($row[7]);
            $tien3=$p1->Chuyentien($row[8]);
            $date=$p1->Chuyenngaythuan($row[3]);     
            $s="<div class='row tatcthd'>
                        <div class='col-md-12 col-sm-12 col-xs-12' onclick='tatct();'>X</div>
                    </div>
                    <div class='row ctma'>
                        <div class='col-md-4 col-sm-4 col-xs-12'>Mã hóa đơn: <span>$row[0]</span></div>  
                        <div class='col-md-4 col-sm-4 col-xs-12'>Mã khách hàng: <span>$row[1]</span></div>  
                        <div class='col-md-4 col-sm-4 col-xs-12'>Mã nhân viên: <span>$row[2]</span></div>                      
                    </div>
                    <div class='row ctma1'>
                            <div class='col-md-6 col-sm-6 col-xs-12'>Tổng tiền hóa đơn: <span>$tien1</span></div>
                            <div class='col-md-6 col-sm-6 col-xs-12'>Ngày lập hóa đơn: <span>$date</span></div>
                    </div>
                    <div class='row ctma2'>
                            <div class='col-md-6 col-sm-6 col-xs-12'>Tổng tiền khuyến mãi: <span>$tien2</span></div>
                            <div class='col-md-6 col-sm-6 col-xs-12'>Tình trạng: <span id='ttcthd'>Đã xử lý</span></div>                       
                    </div>
                    <div class='row ctma3'>
                            <div class='col-md-6 col-sm-6 col-xs-12'>Tổng tiền phải trả: <span>$tien3</span></div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>Địa chỉ: </div>             
                            <div class='col-md-4 col-sm-4 col-xs-12'>
                                <textarea readonly>$row[4]</textarea>
                            </div>
                    </div>        
                    <div class='row ctma4'>
                        <div class='col-md-2 col-sm-2 col-xs-12'>Mã nhóm SP</div>
                        <div class='col-md-3 col-sm-3 col-xs-12'>Đơn giá</div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>Số lượng</div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>Tiền KM</div>
                        <div class='col-md-3 col-sm-3 col-xs-12'>Thành tiền</div>
                    </div>
                    <div id='hiencthd'>";
            $sql1="select * from chitiethoadon where MaHD='$ma'";     
            $result1=$p->Check($sql1);
            while($row1=mysqli_fetch_array($result1)){
                $s=$s."<div class='row ctma5'>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$row1[1]</div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>$row1[2]</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$row1[3]</div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>$row1[4]</div>
                            <div class='col-md-3 col-sm-3 col-xs-12'>$row1[5]</div>
                        </div>";
            }
            $s=$s."</div>";                    
            echo $s;
        }
    }
    if (isset($_GET['t'])){
        $t=$_GET['t'];
        $m=$_GET['idma'];
        $manv=$_SESSION['ssmanv'];        
        if ($t=='xuly'){            
            $sql="UPDATE `hoadon` SET MaNV='$manv',`TinhTrang`=2 WHERE MaHD='$m'";
            $p=new CheckConnection();
            $p->Check($sql);
            $s1="SELECT * from chitietsanphamhoadon where MaHD='$m'";
            $r1=$p->Check($s1);
            $s2="select COUNT(MaBaoHanh) as dem from phieubaohanh";
            $r2=$p->Check($s2);
            $d=mysqli_fetch_row($r2);
            $stt=$d[0]+1;
            $today=date("Y-m-d");
            $t=substr($today,0,4);
            $t1=$t+2;
            $today1=date("$t1-m-d");
            while($a=mysqli_fetch_array($r1)){                
                $mabh="BH".$stt;                
                $s3="INSERT INTO `phieubaohanh`(`MaBaoHanh`, `MaSanPham`, `TuNgay`, `DenNgay`, `TinhTrang`) 
                VALUES ('$mabh','$a[1]','$today','$today1',0)";
                $p->Check($s3);
                $s4="UPDATE chitietsanpham SET TinhTrang=2 where MaSanPham='$a[1]'";
                $p->Check($s4);
                $stt++;
            }         
        }
        if ($t=='xoa'){
            $sql="UPDATE `hoadon` SET MaNV='$manv', `TinhTrang`=3 WHERE MaHD='$m'";
            $p=new CheckConnection();
            $p->Check($sql);          
        }
    }
?>
<script>
    $(document).ready(function(){
        $("#xulyhd").click(function(){
            var ma=$(this).attr('p');
            $.get("./xemcthoadon.php",{t:'xuly',idma:ma},function(data){
                alert("Xử lý hóa đơn thành công");
                location.reload();
            });
        });
        $("#xoahd").click(function(){
            var ma=$(this).attr('p');
            $.get("./xemcthoadon.php",{t:'xoa',idma:ma},function(data){
                alert("Xóa hóa đơn thành công");
                location.reload();
            });
        });
    })
</script> 