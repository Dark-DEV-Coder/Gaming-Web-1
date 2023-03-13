<div class='container phieubaohanh'>
    <div class='row titlepbh'>
        <div class='col-md-12 col-sm-12 col-xs-12'>Tìm kiếm phiếu bảo hành</div>
    </div>
    <div class='row conbh1'>
        <div class='col-md-5 col-sm-5 col-xs-12'>
            Theo mã phiếu bảo hành: <input type='text' placeholder='Mã phiếu' id='tk-maphieu' />
        </div>
        <div class='col-md-5 col-sm-5 col-xs-12'>
            Theo mã sản phẩm: <input type='text' placeholder='Mã sản phẩm' id='tk-masp' />
        </div>
    </div>
    <div class='row conbh1'>
        <div class='col-md-4 col-sm-4 col-xs-12'>
            Từ ngày: <input type='date'  id='tk-tungay' />
        </div>
        <div class='col-md-4 col-sm-4 col-xs-12'>
            Đến ngày: <input type='date'  id='tk-denngay' />
        </div>
        <div class='col-md-2 col-sm-2 col-xs-12'>
            <input type='button' value='Tìm kiếm' id='bttkbh' />
        </div>
    </div>
    <div class='row conbh2'>
        <div class='col-md-2 col-sm-2 col-xs-12'>Mã PBH</div>
        <div class='col-md-2 col-sm-2 col-xs-12'>Mã sản phẩm</div>
        <div class='col-md-3 col-sm-3 col-xs-12'>Từ ngày</div>
        <div class='col-md-3 col-sm-3 col-xs-12'>Đến ngày</div>
        <div class='col-md-2 col-sm-2 col-xs-12'>Tình trạng</div>
    </div>
    <div id='hienbh'>
        <?php
            $p=new CheckConnection();
            $p1=new Xuly();
            $s="";
            $pt=1;
            $tu=($pt-1)*5;
            $sql="select * from phieubaohanh limit $tu,5";
            $r=$p->Check($sql);
            $sql1="select * from phieubaohanh";
            $r1=$p->Check($sql1);
            while($t=mysqli_fetch_array($r)){
                $date=$p1->Chuyenngaythuan($t[2]);
                $date1=$p1->Chuyenngaythuan($t[3]);
                $k="";
                if ($t[4]==0)
                    $k="Còn hạn";
                else
                    $k="Hết hạn";
                $s=$s."<div class='row conbh3'>
                        <div class='col-md-2 col-sm-2 col-xs-12'>$t[0]</div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>$t[1]</div>
                        <div class='col-md-3 col-sm-3 col-xs-12'>$date</div>
                        <div class='col-md-3 col-sm-3 col-xs-12'>$date1</div>
                        <div class='col-md-2 col-sm-2 col-xs-12'>$k</div>
                    </div>";
            }
            $d=mysqli_num_rows($r1);
            $d1=ceil($d/5);
            if ($d1>1){
                $s=$s."<div class='row conbh4'>
                <div class='col-md-12 col-sm-12 col-xs-12 ptbh'>";
                for ($i=1;$i<=$d1;$i++){
                    if ($i==$pt)
                        $s=$s."<div page='$i' style='background-color:red'>$i</div>";
                    else
                        $s=$s."<div page='$i'>$i</div>";
                }
                $s=$s."</div>
                    </div>";
            }
            echo $s;
        ?>                                    
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".ptbh div").click(function(){
            var p=$(this).attr('page');            
            $.get("./phantrangpbh.php",{kieu:'pt',idpt:p},function(data){                
                $("#hienbh").html(data);
            });
        });
        $("#bttkbh").click(function(){
            var mabh=$("#tk-maphieu").val();
            var masp=$("#tk-masp").val();
            var tu=$("#tk-tungay").val();
            var den=$("#tk-denngay").val();
            $.get("./timkiempbh.php",{kieu:'timkiem',mabh:mabh,masp:masp,tu:tu,den:den},function(data){
                var x=data.split('<script>');
                if (x[0]==0)
                    alert("Ngày đến lớn hơn ngày bắt đầu");
                else
                    $("#hienbh").html(data);
            });
        });
    });
</script>