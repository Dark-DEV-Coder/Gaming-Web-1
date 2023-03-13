<div class="container content">
    <div class="row con1">
        <div class="col-md-12 col-sm-12 title-tk">Tìm kiếm khách hàng</div>
    </div>
    <div class="row con2">
        <div class="col-md-4 col-sm-12 con2-row">
            <div class="tk-makh">Theo mã khách hàng: </div>
            <div class="tk-makh-input"><input type="text" id="tk-makh" placeholder="Mã KH" /></div>
        </div>
        <div class="col-md-6 col-sm-12 con2-row">
            <div class="tk-gtkh">Theo giới tính: </div>
            <div class="tk-gtkh-input">
                <select id="tk-gtkh">
                    <option>Giới tính</option>
                    <option>Nam</option>
                    <option>Nữ</option>
                </select>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 con2-row">
            <div class="btthem" id="btthem">
                <img src="../img//plus.png" />
            </div>
        </div>
    </div>
    <div class="row con3">
        <div class="col-md-12 col-sm-12 con3-row">
            <div class="tk-hotenkh">Theo họ tên khách hàng: </div>
            <div class="tk-hotenkh-input"><input type="text" id="tk-hotenkh" placeholder="Họ tên khách hàng" /></div>
            <div class="bttimkiem"><input type="button" value="Tìm kiếm" id="button-tk" /></div>
        </div>        
    </div>
    <div class="row con4">
        <div class="col-md-2 col-sm-2">Mã khách hàng</div>
        <div class="col-md-4 col-sm-2">Họ và tên</div>
        <div class="col-md-2 col-sm-2">Giới tính</div>
        <div class="col-md-2 col-sm-2">Ngày sinh</div>
        <div class="col-md-2 col-sm-2">Số điện thoại</div>
    </div>
    <!-- Xem chi tiết khách hàng -->
    <div class="container ctkh" id="ctkh">
        
    </div> 
    <div id="kh-pt"> 
        <?php               
            $sql="select * from khachhang where TinhTrang=0 limit 0,5";
            $sql1="select * from khachhang where TinhTrang=0";
            $p=new CheckConnection();
            $p1=new Xuly();
            $result=$p->Check($sql);
            $result1=$p->Check($sql1);
            $s="";
            while($row=mysqli_fetch_array($result)){
                $date=$p1->Chuyenngaythuan($row[6]);
                $s=$s."<div class='row con5'  id='$row[0]'>
                        <div class='col-md-2 col-sm-2'>$row[0]</div>
                        <div class='col-md-4 col-sm-2'>$row[2]".' '."$row[3]</div>";
                if ($row[7]==0)
                    $s=$s."<div class='col-md-2 col-sm-2'>Nam</div>";
                else
                    $s=$s."<div class='col-md-2 col-sm-2'>Nữ</div>";
                $s=$s."<div class='col-md-2 col-sm-2'>$date</div>
                        <div class='col-md-2 col-sm-2'>$row[5]</div>
                    </div>";   
                            
            }
            echo $s;
            $d=mysqli_num_rows($result1); 
            $d1=ceil($d/5);
            $spt="<div class='row con6' page='$d1'>
            <div class='col-md-12 col-sm-12 con6-row'>";
            for ($i=0;$i<$d1;$i++){
                $l=$i+1;
                if ($i==0)
                    $spt=$spt."<div id='$l' style='background-color:red'>$l</div>";
                else
                    $spt=$spt."<div id='$l'>$l</div>";
            }
            $spt=$spt."</div></div>";
            echo $spt;
        ?> 
    </div>   
    <script>
        $(document).ready(function(){
            $(".con5").click(function(){
                var s=$(this).attr('id');             
                $.get("./xemchitietkh.php",{idctkh:s}, function(data){
                    $("#ctkh").html(data);
                    $("#ctkh").css("display","block");
                });
            });            
            $(".btthem").click(function(){
                var s=$(this).attr('id');             
                $.get("./themkh.php",{idthemkh:s}, function(data){
                    $("#ctkh").html(data);
                    $("#ctkh").css("display","block");
                });
            });
            $(".con6-row div").click(function(){
                var pt=$(this).attr('id');
                var page=$(".con6").attr('page');
                $.get("./phantrangkh.php",{id:'KH',idpt:pt,page:page},function(data){
                    $("#kh-pt").html(data);
                });
            });   
            $("#button-tk").click(function(){
                var ma=$("#tk-makh").val();
                var hoten=$("#tk-hotenkh").val();
                var gt=$("#tk-gtkh").val();               
                $.get("./timkiemkh.php",{tkma:ma,tkhoten:hoten,tkgt:gt,idpt:1},function(data){
                    $("#kh-pt").html(data);
                });
            });         
        });
        function exitctkh(){
            document.getElementById('ctkh').style.display="none";
        }        
    </script>   
</div>