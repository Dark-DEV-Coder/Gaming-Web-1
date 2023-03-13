<?php
    include('ketnoi.php');
    if (isset($_GET['ktk'])){
        $ktk=$_GET['ktk'];
        if ($ktk=='1'){
            $s="";
            $sql="select * from loai where TinhTrang=0";
            $p=new CheckConnection();
            $r=$p->Check($sql);
            $loai="";
            while($row=mysqli_fetch_array($r)){
                $loai=$loai."<option>$row[0]</option>";
            }
            $s=$s."<div class='row contk1'>
                <div class='col-md-1 col-sm-1 col-xs-12'>Từ ngày: </div>
                <div class='col-md-3 col-sm-3 col-xs-12'><input type='date' id='thongketungay' /></div>
                <div class='col-md-1 col-sm-1 col-xs-12'>Đến ngày: </div>
                <div class='col-md-3 col-sm-3 col-xs-12'><input type='date' id='thongkedenngay' /></div>
            </div>
            <div class='row contk1'>
                <div class='col-md-2 col-sm-2 col-xs-12'>Loại sản phẩm: </div>
                <div class='col-md-2 col-sm-3 col-xs-12'>
                    <select id='thongkeloai'>
                        <option>Chọn loại sản phẩm</option>";
            $s=$s.$loai;
            $s=$s."</select>
                </div>
                <div class='col-md-2 col-sm-2 col-xs-12'><input type='button' value='Thống kê' id='tkkieu1' /></div>
            </div>
            <div class='row contk2'>
                <div class='col-md-2 col-sm-2 col-xs-12'>Mã hóa đơn</div>
                <div class='col-md-2 col-sm-2 col-xs-12'>Mã khách hàng</div>
                <div class='col-md-2 col-sm-2 col-xs-12'>Mã nhân viên</div>
                <div class='col-md-3 col-sm-2 col-xs-12'>Ngày lập hóa đơn</div>
                <div class='col-md-3 col-sm-2 col-xs-12'>Tổng tiền hóa đơn</div>
            </div>
            <div id='tk1'></div>";            
            echo $s;              
        }
        if ($ktk=='2'){
            $s="";            
            $s=$s."<div class='row contk1'>
                <div class='col-md-1 col-sm-1 col-xs-12'>Từ ngày: </div>
                <div class='col-md-3 col-sm-3 col-xs-12'><input type='date' id='thongketungay' /></div>
                <div class='col-md-1 col-sm-1 col-xs-12'>Đến ngày: </div>
                <div class='col-md-3 col-sm-3 col-xs-12'><input type='date' id='thongkedenngay' /></div>
                <div class='col-md-2 col-sm-2 col-xs-12'><input type='button' value='Thống kê' id='tkkieu2' /></div>
            </div>            
            <div class='row contk2'>
                <div class='col-md-3 col-sm-2 col-xs-12'>Mã nhóm SP</div>
                <div class='col-md-3 col-sm-2 col-xs-12'>Số lượng</div>
                <div class='col-md-3 col-sm-2 col-xs-12'>Tổng tiền hóa đơn</div>
            </div>
            <div id='tk1'></div>";            
            echo $s;              
        }
        if ($ktk=='3'){
            $s="";
            $s=$s."<div class='row contk1'>
                <div class='col-md-1 col-sm-1 col-xs-12'>Từ ngày: </div>
                <div class='col-md-3 col-sm-3 col-xs-12'><input type='date' id='thongketungay' /></div>
                <div class='col-md-1 col-sm-1 col-xs-12'>Đến ngày: </div>
                <div class='col-md-3 col-sm-3 col-xs-12'><input type='date' id='thongkedenngay' /></div>
            </div>
            <div class='row contk1'>
                <div class='col-md-2 col-sm-2 col-xs-12'>Mã nhân viên: </div>
                <div class='col-md-2 col-sm-3 col-xs-12'>
                    <input type='text' placeholder='Mã nhân viên' id='thongkemanv' />
                </div>
                <div class='col-md-2 col-sm-2 col-xs-12'><input type='button' value='Thống kê' id='tkkieu3' /></div>
            </div>
            <div class='row contk2'>
                <div class='col-md-3 col-sm-2 col-xs-12'>Mã nhân viên</div>
                <div class='col-md-3 col-sm-2 col-xs-12'>Tổng tiền hóa đơn</div>
            </div>
            <div id='tk1'></div>";            
            echo $s;              
        }
    }
?>
<script>        
    $(document).ready(function(){
        $("#tkkieu1").click(function(){
            var tu=$("#thongketungay").val();
            var den=$("#thongkedenngay").val();
            var loai=$("#thongkeloai").val();
            if (tu=="" && den=="" && loai=="Chọn loại sản phẩm"){
                alert("Chựa nhập dữ liệu cần thống kê");
                return false;
            }
            $.get("./timkiemthongke.php",{ktk:'1',tungay:tu,denngay:den,loaisp:loai},function(data){
                if (data=="")
                    alert("Không tìm thấy hóa đơn cần thống kê");
                else{
                    if (data==0)
                        alert("Ngày đến lớn hơn ngày bắt đầu");
                    else
                        $("#tk1").html(data);  
                }              
            });
        });
        $("#tkkieu2").click(function(){
            var tu=$("#thongketungay").val();
            var den=$("#thongkedenngay").val();
            if (tu=="" && den==""){
                alert("Chựa nhập dữ liệu cần thống kê");
                return false;
            }
            $.get("./timkiemthongke.php",{ktk:'2',tungay:tu,denngay:den},function(data){
                console.log(data);
                if (data=="")
                    alert("Không tìm thấy hóa đơn cần thống kê");
                else{
                    if (data==0)
                        alert("Ngày đến lớn hơn ngày bắt đầu");
                    else
                        $("#tk1").html(data);  
                }              
            });
        });
        $("#tkkieu3").click(function(){
            var tu=$("#thongketungay").val();
            var den=$("#thongkedenngay").val();
            var manv=$("#thongkemanv").val();
            if (tu=="" && den=="" && manv==""){
                alert("Chựa nhập dữ liệu cần thống kê");
                return false;
            }
            $.get("./timkiemthongke.php",{ktk:'3',tungay:tu,denngay:den,manv:manv},function(data){
                if (data=="")
                    alert("Không tìm thấy hóa đơn cần thống kê");
                else{
                    if (data==0)
                        alert("Ngày đến lớn hơn ngày bắt đầu");
                    else
                        $("#tk1").html(data);  
                }              
            });
        });
    });
</script>