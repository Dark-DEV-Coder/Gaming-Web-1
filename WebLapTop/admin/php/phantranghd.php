<?php
    include('ketnoi.php');
    include('xulydulieu.php');
    if (isset($_GET['id']) && !isset($_GET['k'])){
        $pt=1;
        if (isset($_GET['idpt']))
            $pt=$_GET['idpt'];
        $hd="";
        $hd="<div class='row titlehd'>
            <div class='col-md-12 col-sm-12 col-xs-12'>Tìm kiếm hóa đơn$pt</div>
        </div>
        <div class='row mahdkhnv'>
            <div class='col-md-2 col-sm-2 col-xs-12'><input type='text' placeholder='Theo mã hóa đơn' id='tk-mahd' /></div>
            <div class='col-md-2 col-sm-2 col-xs-12'><input type='text' placeholder='Theo mã nhân viên' id='tk-manv' /></div>
            <div class='col-md-2 col-sm-2 col-xs-12'><input type='text' placeholder='Theo mã khách hàng' id='tk-makh' /></div>
        </div>
        <div class='row tungaydenngay'>
            <div class='col-md-1 col-sm-2 col-xs-12'>Từ ngày: </div>
            <div class='col-md-2 col-sm-2 col-xs-12'><input type='date' id='tk-tungay' /></div>
            <div class='col-md-1 col-sm-2 col-xs-12'>Đến ngày: </div>
            <div class='col-md-2 col-sm-2 col-xs-12'><input type='date' id='tk-denngay' /></div>
            <div class='col-md-2 col-sm-2 col-xs-12'><input type='button' value='Tìm kiếm' id='bttkhd' /></div>
        </div>
        <div class='row titlehienhd'>
            <div class='col-md-2 col-sm-2 col-xs-12'>Mã hóa đơn</div>
            <div class='col-md-2 col-sm-2 col-xs-12'>Mã khách hàng</div>
            <div class='col-md-2 col-sm-2 col-xs-12'>Mã nhân viên</div>
            <div class='col-md-3 col-sm-3 col-xs-12'>Ngày lập hóa đơn</div>
            <div class='col-md-3 col-sm-3 col-xs-12'>Tình trạng</div>
        </div>
        <div id='hienhd'>";
        $tu=($pt-1)*5;            
        $sql="select * from hoadon where TinhTrang=1 OR TinhTrang=2 limit $tu,5";
        $sql1="select * from hoadon where TinhTrang=1 OR TinhTrang=2";
        $p=new CheckConnection();
        $p1=new Xuly();
        $result=$p->Check($sql);
        $result1=$p->Check($sql1);
        $s="";
        while($row=mysqli_fetch_array($result)){
            $date=$p1->Chuyenngaythuan($row[3]);                       
            $s=$s." <div class='row hiennhieuhd' p='$row[0]'>
                        <div class='col-md-2 col-sm-2 col-xs-12'>$row[0]</div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>$row[1]</div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>$row[2]</div>
                        <div class='col-md-3 col-sm-3 col-xs-12'>$date</div>";
            if ($row[5]==1)                    
                $s=$s."<div class='col-md-3 col-sm-3 col-xs-12'>Chưa xử lý</div>
                    </div>";
            if ($row[5]==2)                    
                $s=$s."<div class='col-md-3 col-sm-3 col-xs-12'>Đã xử lý</div>
                    </div>";
        } 
        $hd=$hd.$s;        
        $hd=$hd."</div>";  
        $d=mysqli_num_rows($result1);
        $d1=ceil($d/5);
        if ($d1>1){
            $hd=$hd."<div class='row m1'>
            <div class='col-md-12 col-sm-12 col-xs-12 pthd'>";
            for ($i=1;$i<=$d1;$i++){
                if ($i==$pt)
                    $hd=$hd."<div page='$i' style='background-color:red'>$i</div>";
                else
                    $hd=$hd."<div page='$i'>$i</div>";
            }
            $hd=$hd."</div></div>";
        }
        echo $hd;              
    }
?>
<script>
    function tatct(){
        document.getElementById('xemcthd').style.display='none';
    }
    $(document).ready(function(){
        $(".hiennhieuhd").click(function(){
            var ma=$(this).attr('p');
            $.get("./xemcthoadon.php",{cthd:ma},function(data){
                $("#xemcthd").html(data);
                $("#xemcthd").css("display","block");
            });
        });
        $(".pthd div").click(function(){
            var page=$(this).attr('page');
            $.get("./phantranghd.php",{id:'HD',idpt:page},function(data){
                $("#hienhdthongke").html(data);
            });
        })
    });
</script> 