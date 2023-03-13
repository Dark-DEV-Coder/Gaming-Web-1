<?php
    include('ketnoi.php');
    include('xulydulieu.php');
    $p=new CheckConnection();
    $p1=new Xuly();
    if (isset($_GET['kieu'])){
        $kieu=$_GET['kieu'];
        if ($kieu=='pt'){
            $pt=1;
            if (isset($_GET['idpt']))
                $pt=$_GET['idpt'];
            $s="";            
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
            if ($d>1){
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
        }
    }
?>
<script>
    $(document).ready(function(){
        $(".ptbh div").click(function(){
            var p=$(this).attr('page');
            $.get("./phantrangpbh.php",{kieu:'pt',idpt:p},function(data){
                $("#hienbh").html(data);
            });
        });        
    });
</script>