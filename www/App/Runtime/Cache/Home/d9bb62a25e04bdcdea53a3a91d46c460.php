<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-cn">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>危险废物管理信息系统</title>
    <!-- Bootstrap core CSS -->
    <link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet">
    <link href="__PUBLIC__/css/jquery.dataTables.css" rel="stylesheet">
    <!-- My CSS -->
    <link href="__PUBLIC__/css/layout.css" rel="stylesheet">

</head>

<body style="background:url(__PUBLIC__/image/bg_4.jpg);background-position:center;background-repeat: no-repeat;background-attachment:fixed">
    <div class="container" id="div_container">
        <script type="text/javascript" src="__PUBLIC__/js/yourAlert.js"></script>
<script type="text/javascript">
function hide_page()
{
    $('#myModal_pass').modal('hide');
}

function show_page() {
     $("#model-content_pass").html('<center style="margin:50px"><h4>正在加载中...</h4><div class="progress progress-striped active" style="width: 50%"><div class="progress-bar"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div></center>');
      $.ajax({
        type: "get",
        url: "<?php echo U('Home/Login/show_page');?>",
        dataType: "json",
        success: function(data) {
            $("#model-content_pass").html(data);
            $('#myModal_pass').modal('show');
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log("Error:Ajax_Content_Load" + errorThrown);
            console.log("XMLHttpRequest.status:" + XMLHttpRequest.status);
            console.log("XMLHttpRequest.readyState:" + XMLHttpRequest.readyState);
            console.log("textStatus:" + textStatus);
        }
    });
}

function ajaxAction(){
   
   //$("#model-content").html("<h1>hello</h1>");
   if(!$('#pass_list').valid()){
        return;
    }
    var passbag={};
   // var form_serialize = "" + $('#record_modify').serialize();
    //console.log(passbag);
    // if ($('#new_pass').val()!=$('#new_pass_again').val())
    // {
    //     //alert("新密码不一样");
    //     $('#new_prompt').html("输入新密码");
    //     $('#newnew_prompt').html("重新输入新密码 <font color='red'>密码不一致</font>");
    //     return;
    // }
    // if ($('#new_pass').val().length<6)
    // {
    //     $('#new_prompt').html("输入新密码 <font color='red'>密码长度至少为6位</font>");
    //     $('#newnew_prompt').html("重新输入新密码");
    //     return;
    // }
    passbag.old_pass=$.md5($('#old_pass').val());
    passbag.new_pass=$.md5($('#password').val());
    passbag.user_id=<?php echo (session('user_id')); ?>;
//    console.log(passbag);

     // $("#model-content_pass").html('<center style="margin:50px"><h4>修改中...</h4><div class="progress progress-striped active" style="width: 50%"><div class="progress-bar"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div></center>');

    $.ajax({
        type: "post",
        url: "<?php echo U('Home/Login/changepwd');?>",
        timeout: 2000,
        data: passbag,
        success: function(data) {
            console.log(data);
            if (data=="0")
                     // $("#model-content_pass").html("<h1>密码有误</h1> <center><button class='btn btn-info btn-lg' onclick='hide_page();'>关闭页面</button><center>");
                 myAlertFail("密码有误！");
            else if (data=="1")
                     // $("#model-content_pass").html("<h1>修改成功</h1> <center><button class='btn btn-info btn-lg' onclick='hide_page();'>关闭页面</button><center>");
                 myAlertSucc("修改成功！");
            else 
                     // $("#model-content_pass").html("<h1>未知错误</h1> <center><button class='btn btn-info btn-lg' onclick='hide_page();'>关闭页面</button><center>");   
                 myAlertFail("修改失败！");


 //           $('#myModal').html(data);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log("Error: Ajax_Content_Load " + errorThrown);
            console.log("XMLHttpRequest.status: " + XMLHttpRequest.status);
            console.log("XMLHttpRequest.readyState: " + XMLHttpRequest.readyState);
            console.log("textStatus: " + textStatus);
        }
    });

}
</script>
<!-- Modal -->
<div class="modal fade" id="myModal_pass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">修改密码</h4>
            </div>
            <div class="modal-body" id="model-content_pass">
                
            </div>
            <div class="modal-footer"></div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="panel panel-default" id="div_header" style="margin-top:15px">
    <div class="panel-body" style="padding-top:0px">
        <img id="logo" src="__PUBLIC__/image/header_logo.jpg" alt="logo"/>
        <div id="webpage_title">
            <div id="datetime"></div>
            <h2 id="title">危险废物管理信息系统</h2>
            <p id="welcome">
                <span class="glyphicon glyphicon-user"></span> 欢迎您，<?php echo ((session('username'))?(session('username')):"先生"); ?>
                <a id="password" href="#" onclick="show_page()"><span class="glyphicon glyphicon-edit"></span> 修改密码</a>
                <a id="logout" href="<?php echo U('Home/Login/logout');?>"><span class="glyphicon glyphicon-log-out"></span> 退出登录</a>
            </p>

        </div>
         <div id="header_button_container"></div>
    </div>
</div>

<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=KDdzQZSRLv89h4yrti56L5Gy">
</script>
<script type="text/javascript" src="__PUBLIC__/js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/bootstrap.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/highcharts.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/md5.js"></script>

        <div class="panel panel-default">
            <div class="panel-body" id="content-container-panel"><script type="text/javascript">
DWMS_page_config = {
    "menu": [{
        "id": 0,
        "name": "首页",
        "url": "<?php echo U('Home/LoginDistrict/homepage');?>"
    }, {
        "id": 1,
        "name": "转移地图",
        "url": "<?php echo U('Home/DistrictMap/map_sidebar');?>"
    }, {
        "id": 2,
        "name": "产生单位",
        "url": "<?php echo U('Home/DistrictProduction/production_sidebar');?>"
    }, {
        "id": 3,
        "name": "运输单位",
        "url": "<?php echo U('Home/DistrictTransport/transport_sidebar');?>"
    }, {
        "id": 4,
        "name": "处置单位",
        "url": "<?php echo U('Home/DistrictReception/reception_sidebar');?>"
    }, {
        "id": 5,
        "name": "危废转移",
        "url": "<?php echo U('Home/DistrictTransfer/transfer_sidebar');?>"
    }, {
        "id": 6,
        "name": "业务办理",
        "url": "<?php echo U('Home/DistrictBusiness/business_sidebar');?>"
    }, {
        "id": 7,
        "name": "系统管理",
        "url": "<?php echo U('Home/DistrictSystem/system_sidebar');?>"
    }]
}
</script>

<script type="text/javascript">
DWMS_page_config.pageid = 0;
</script>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">（生产、运输、接受）企业统计图</h3>
    </div>
    <div class="panel-body">
        <div id="statistics_graph_enterprise_container"></div>
    </div>
</div>
    </div>
    <div class="col-md-6">
       <div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">本区企业信息统计表</h3>
    </div>
    <div class="panel-body">
        <table class="table" id="statistics_table_enterprise_container">
        </table>
    </div>
</div>
    </div>
</div>
<!-- <div class="row">
    <div class="col-md-6">
         <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">（转移联单及其危废重量）危废统计图</h3>
          </div>
          <div class="panel-body">   
            <div id="statistics_graph_waste_container"></div>
          </div>
</div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">（转移联单及其危废重量）危废统计表</h3>
    </div>
    <div class="panel-body">
        <table class="table" id="statistics_table_waste_container">
        </table>
    </div>
</div>
    </div>
</div> -->


<script type="text/javascript">
var p_number, r_number, t_number, sum, tong_num, dai_num, count_waste,manifestnum;
function decimal(num,v)
{
    var vv = Math.pow(10,v);
    return Math.round(num*vv)/vv;
}
$.ajax({
        type: "get",
        url: "<?php echo U('Home/DistrictBusiness/get_chart');?>",
        dataType: "json",
        success: function(data) {
            var result=JSON.parse(data);
            console.log(result.str);
            p_number=parseInt(result.pnum);
            r_number=parseInt(result.rnum);
            t_number=parseInt(result.tnum);
            manifestnum=parseInt(result.manifestnum);
            count_waste=parseInt(result.count_waste);
            tong_num=parseFloat(result.tong_num);
            dai_num=parseInt(result.dai_num);
            sum=p_number+r_number+t_number;
            p_ptg=parseFloat(decimal(100*p_number/sum,1));
            r_ptg=parseFloat(decimal(100*r_number/sum,1));
            t_ptg=parseFloat(decimal(100*t_number/sum,1));
            $('#statistics_graph_enterprise_container').highcharts({
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false
    },
    title: {
        text: '企业统计图'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                color: '#000000',
                connectorColor: '#000000',
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'company numbers',
         data: [
                    
                    {
                        name: '生产企业',
                        y: p_ptg,
                        sliced: true,
                        selected: true
                    },
                    ['运输企业',    t_ptg],
                    ['接受企业',     (100-p_ptg-t_ptg) ],
                  
        ]
    }]

});


$('#statistics_table_enterprise_container').dataTable({
    "aaData": [
        /* Reduced data set */
        ["生产企业数量",p_number ],
        ["运输企业数量", t_number],
        ["接受企业数量", r_number],
        ["联单总数", manifestnum],
        ["废物类型总数", count_waste],
        ["桶装废物总量", tong_num+" 公斤"],
        ["袋装废物总量", dai_num+" 个"],
    ],
    "aoColumns": [{
        "sTitle": "统计类型"
    }, {
        "sTitle": "统计总数"
    }],
    "iDisplayLength": 7,
    "sPaginationType": "full_numbers",
    "bLengthChange": false,
    "bInfo": false,
    "bFilter": false,
    "bSort": false,
    "oLanguage": {
            "oPaginate": {
                "sFirst": "首页",
                "sPrevious": "前一页",
                "sNext": "后一页",
                "sLast": "尾页"
            },
            // "sZeroRecords": "没有检索到数据"
            /*"sProcessing": "<img src='./loading.gif' />"*/
        }

});
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log("Error:Ajax_Content_Load" + errorThrown);
            console.log("XMLHttpRequest.status:" + XMLHttpRequest.status);
            console.log("XMLHttpRequest.readyState:" + XMLHttpRequest.readyState);
            console.log("textStatus:" + textStatus);
        }
    });
            // console.log(p_number);

</script>

</div>
        </div>
        <!-- My JavaScript-->
<script type="text/javascript" src="__PUBLIC__/js/datetime.js"></script>

<div class="panel panel-info" id="div_footer">
    <div class="panel-heading"></div>
    <div class="panel panel-body" id="footer-content">
    	<b>危险废物管理信息系统 DWMS</b> Powered By ThinkPHP
        <br/>Copyright © 2014-2015<br/> <span class="glyphicon glyphicon-send"></span> SJTU OMNILab
    </div>
</div>


        <script type="text/javascript">
function menu_generator() {
    if (typeof(DWMS_page_config) == 'undefined') {
        console.log("Error:var DWMS_page_config Not Found.");
        return;
    }
    var idx;
    var newHtml = '<ul class="nav nav-pills">';
    for (idx in DWMS_page_config.menu) {

        if (DWMS_page_config.menu[idx].id == DWMS_page_config.pageid) {
            newHtml += '<li class="active"><a><span class="glyphicon glyphicon-folder-open"></span> ' + DWMS_page_config.menu[idx].name + '</a></li>';
        } else {
            newHtml += '<li><a href="' + DWMS_page_config.menu[idx].url + '"><span class="glyphicon glyphicon-folder-close"></span> ' + DWMS_page_config.menu[idx].name + '</a></li>';
        }
    }
    newHtml += "</ul>";
    $("#header_button_container").html(newHtml);
}

menu_generator();

</script>

    </div>
</body>

</html>