<div class='row titlethongke'>
    <div class='col-md-12 col-sm-12 col-xs-12'>Thống kê doanh thu</div>
</div>
<div class='row kieuthongke'>
    <div class='col-md-3 col-sm-3 col-xs-12 kieu' id='thoigianvasp' onclick="active('thoigianvasp');">Theo thời gian và loại sản phẩm</div>
    <div class='col-md-3 col-sm-3 col-xs-12 kieu' id='spbanchay' onclick="active('spbanchay');">Sản phẩm bán chạy</div>
    <div class='col-md-3 col-sm-3 col-xs-12 kieu' id='doanhthunv' onclick="active('doanhthunv');">Theo doanh thu nhân viên</div>
</div>
<div id='hienkieuthongke'>

</div>
<script>
    function active(s){
        var x=document.getElementsByClassName('kieu');
        for (i=0;i<x.length;i++){
            x[i].style.color='black';
            x[i].style.backgroundColor='rgb(228,208,119)';
        }
        document.getElementById(s).style.color='rgb(228,208,119)';
        document.getElementById(s).style.backgroundColor='rgb(100,100,100)';
    }    
    $(document).ready(function(){
        $("#thoigianvasp").click(function(){
            $.get("./kieuthongke.php",{ktk:'1'},function(data){
                $("#hienkieuthongke").html(data);
            });
        });  
        $("#spbanchay").click(function(){
            $.get("./kieuthongke.php",{ktk:'2'},function(data){
                $("#hienkieuthongke").html(data);
            });
        });
        $("#doanhthunv").click(function(){
            $.get("./kieuthongke.php",{ktk:'3'},function(data){
                $("#hienkieuthongke").html(data);
            });
        });       
    });
</script>