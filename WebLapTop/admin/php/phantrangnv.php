<?php
    include('ketnoi.php');
    include('xulydulieu.php');
    $p=new CheckConnection();
    $p1=new Xuly();
    if (isset($_GET['id']) && isset($_GET['idpt'])){
        $id=$_GET['id'];
        $idpt=$_GET['idpt'];
        if ($id=='NV'){ 
            $page=$_GET['page']; 
            $trang=($idpt-1)*5;
            $den=$trang+5;          
            $sql="select * from nhanvien where TinhTrang=0 limit $trang,$den";                        
            $result=$p->Check($sql);            
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
            $spt="";
            if ($page>1){                     
                $spt=$spt."<div class='row con6' page='$page'>
                <div class='col-md-12 col-sm-12 con6-row'>";
                for ($i=0;$i<$page;$i++){
                    $l=$i+1;
                    if ($l==$idpt)
                        $spt=$spt."<div id='$l' style='background-color:red'>$l</div>";
                    else
                        $spt=$spt."<div id='$l'>$l</div>";
                }
                $spt=$spt."</div></div>";
            }
            echo $s.$spt;
        }
    }
?>
<script>
        $(document).ready(function(){
            $(".con5").click(function(){
                var s=$(this).attr('id');             
                $.get("./xemchitietnv.php",{idctkh:s}, function(data){
                    $("#ctkh").html(data);
                    $("#ctkh").css("display","block");
                })
            });                        
            $(".con6-row div").click(function(){
                var pt=$(this).attr('id');
                var page=$(".con6").attr('page');
                $.get("./phantrangnv.php",{id:'NV',idpt:pt,page:page},function(data){
                    $("#kh-pt").html(data);
                });
            });            
        });
        function exitctkh(){
            document.getElementById('ctkh').style.display="none";
        }        
</script>  