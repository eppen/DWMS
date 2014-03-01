<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html lang="zh-cn">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="__PUBLIC__/image/favicon.png">

    <title>危险废物管理信息系统</title>

    <!-- Bootstrap core CSS -->
    <link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="__PUBLIC__/css/signin.css" rel="stylesheet">

    <script type="text/javascript" src="__PUBLIC__/js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/jquery-validate.min.js"></script>

</head>
<script type="text/javascript">
/*
var mydata=["运输单位编号","transport_unit_id",
"用户编号","user_id",
"运输单位名称","transport_unit_name",
"运输单位用户名称","transport_unit_username",
"运输单位组织机构代码","transport_unit_code",
"运输单位电话","transport_unit_phone",
"运输单位地址","transport_unit_address",
"运输单位邮编","transport_unit_postcode",
"运输单位所在区县","transport_unit_county",
"运输单位所在区县代码","transport_unit_county_code",
"运输单位管辖权属","transport_unit_jurisdiction",
"运输单位所属行业","transport_unit_trade",
"运输单位乡镇街道","transport_unit_street",
"运输单位注册类型","transport_unit_registration_type",
"运输单位企业规模","transport_unit_enterprise_scale",
"运输单位许可证编号","transport_unit_license_num",
"运输单位许可证文号","transport_unit_reference_num",
"许可证发证机关","license_issuing_authority",
"许可证发证日期","license_issuing_date",
"许可证有效期至","license_expiry_date",
"运输单位环保联系人姓名","transport_unit_contacts_name",
"运输单位环保联系人电话","transport_unit_contacts_phone",
"运输单位法人代码","transport_unit_legal_person_code",
"运输单位法人姓名","transport_unit_legal_person_name",
"运输单位法人电话","transport_unit_legal_person_phone",
"运输单位传真","transport_unit_fax",
"运输单位邮箱地址","transport_unit_email",
"运输单位中心经度","transport_unit_longitude",
"运输单位中心纬度","transport_unit_latitude",
];

newHtml="";
for(var a=0;a<mydata.length;a+=4)
{
newHtml+="<tr><td>"
+mydata[a]
+'</td><td><input type="text" class="form-control input-md"'
+' name="'+mydata[a+1]+'" '
+' id="'+mydata[a+1]+'" '
+" ></td>"
+"<td>"
+mydata[a+2]
+'</td><td><input type="text" class="form-control input-md"'
+'name="'+mydata[a+3]+'" '
+'id="'+mydata[a+3]+'" '
+" ></td>"
+"</tr>";
}
console.log(newHtml);
*/
function sel_city(province_id){
        console.log(province_id);
          $.ajax({
            type: "post",
            url: "<?php echo U('Home/Register/select_city_name');?>",
            dataType: "json",
            data:{
                'id': province_id
            },
            success: function(city_name_json) {
                city_name = JSON.parse(city_name_json);
                $('#city_name').html('<option>请选择所在市</option>');
                for (var idx in city_name) {
                $('#city_name').append('<option value="' + city_name[idx].county_id + '">' + city_name[idx].county_name + '</option>');
                }   
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log("Error:Ajax_Content_Load" + errorThrown);
                console.log("XMLHttpRequest.status:" + XMLHttpRequest.status);
                console.log("XMLHttpRequest.readyState:" + XMLHttpRequest.readyState);
                console.log("textStatus:" + textStatus);
            }
         });
    }
    function sel_county(city_id){
        console.log(city_id);
          $.ajax({
            type: "post",
            url: "<?php echo U('Home/Register/select_county_name');?>",
            dataType: "json",
            data:{
                'id': city_id
            },
            success: function(county_name_json) {
                county_name = JSON.parse(county_name_json);
                $('#county_name').html('<option>请选择所在区县</option>');
                for (var idx in county_name) {
                $('#county_name').append('<option value="' + county_name[idx].county_name + '">' + county_name[idx].county_name + '</option>');
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log("Error:Ajax_Content_Load" + errorThrown);
                console.log("XMLHttpRequest.status:" + XMLHttpRequest.status);
                console.log("XMLHttpRequest.readyState:" + XMLHttpRequest.readyState);
                console.log("textStatus:" + textStatus);
            }
         });
    }

    function county_code_jurisdiction(county_name){
        console.log(county_name);
        $.ajax({
            type: "post",
            url: "<?php echo U('Home/Register/select_code_jurisdiction');?>",
            dataType: "json",
            data:{
                'name': county_name
            },
            success: function(jurisdiction_json) {
                // county_code = JSON.parse(county_code_json);
                // $('#waste_location_county_code').html('<option>区县代码</option>');
                // for (var idx in county_code) {
                // $('#waste_location_county_code').append('<option value="' + county_code[idx].county_id + '">' + county_name[idx].county_code + '</option>');
                // }
                jurisdiction = JSON.parse(jurisdiction_json);  
                $('#jurisdiction_id').html('<option value="' + jurisdiction[0].jurisdiction_id + '">' + jurisdiction[0].jurisdiction_name + '</option>');
              

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log("Error:Ajax_Content_Load" + errorThrown);
                console.log("XMLHttpRequest.status:" + XMLHttpRequest.status);
                console.log("XMLHttpRequest.readyState:" + XMLHttpRequest.readyState);
                console.log("textStatus:" + textStatus);
            }
        });
    $.ajax({
            type: "post",
            url: "<?php echo U('Home/Register/select_code');?>",
            dataType: "json",
            data:{
                'name': county_name
            },
            success: function(code_json) {
                // county_code = JSON.parse(county_code_json);
                // $('#waste_location_county_code').html('<option>区县代码</option>');
                // for (var idx in county_code) {
                // $('#waste_location_county_code').append('<option value="' + county_code[idx].county_id + '">' + county_name[idx].county_code + '</option>');
                // }
                code = JSON.parse(code_json);  
                $('#transport_unit_county_code').html('<option value="' + code[0].county_code + '">' + code[0].county_code + '</option>');
                 

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log("Error:Ajax_Content_Load" + errorThrown);
                console.log("XMLHttpRequest.status:" + XMLHttpRequest.status);
                console.log("XMLHttpRequest.readyState:" + XMLHttpRequest.readyState);
                console.log("textStatus:" + textStatus);
            }
        });
    }
</script>

<body style="background:url(__PUBLIC__/image/bg_3.jpg) no-repeat;  background-color:#3D80AD;">
    <div class="container">

        <div class="panel panel-primary" id="login-panel" style="margin-top:20px">
            <div class="panel-heading">
                <h4>注册运输单位</h4>
            </div>
            <div class="panel-body">

                <form role="form" method="post" id="transportForm" action="<?php echo U('Home/Register/do_reg',array('id'=>'transport'));?>">
                    <div class="table-responsive">
                        <big>

                            <div class="alert alert-info">账户信息</div>
                            <table class="table table-striped table-bordered table-hover table-condensed">
                                <tr>
                                    <td>用户名</td>
                                    <td>
                                        <input type="text" class="form-control required-cn pwdEqual_1" name="username" id="username" placeholder="用户名">
                                    </td>
                                </tr>
                                <tr>
                                    <td>密码</td>
                                    <td>
                                        <input type="password" class="form-control required-cn" name="password" id="password" placeholder="密码">
                                    </td>
                                </tr>
                                <tr>
                                    <td>确认密码</td>
                                    <td>
                                        <input type="password" class="form-control required-cn pwdEqual" id="re-password" placeholder="确认密码">
                                    </td>
                                </tr>
                                <tr>
                                    <td>电子邮件</td>
                                    <td>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="电子邮件">
                                    </td>
                                </tr>
                                <tr>
                                    <td>手机号码</td>
                                    <td>
                                        <input type="text" class="form-control" name="phone_num" id="phone_num" placeholder="手机号码">
                                    </td>
                                </tr>
                            </table>
                            <div class="alert alert-info">企业信息</div>
                            <table class="table table-striped table-bordered table-hover table-condensed">

                                <tr>
                                    <td>运输单位名称</td>
                                    <td>
                                        <input type="text" class="form-control input-md required-cn" name="transport_unit_name" id="transport_unit_name">
                                    </td>
                                    <td>运输单位用户名称</td>
                                    <td>
                                        <input type="text" class="form-control input-md required-cn" name="transport_unit_username" id="transport_unit_username">
                                    </td>
                                </tr>
                                <tr>
                                    <td>运输单位组织机构代码</td>
                                    <td>
                                        <input type="text" class="form-control input-md required-cn" name="transport_unit_code" id="transport_unit_code">
                                    </td>
                                    <td>运输单位电话</td>
                                    <td>
                                        <input type="text" class="form-control input-md required-cn" name="transport_unit_phone" id="transport_unit_phone">
                                    </td>
                                </tr>
                                <tr>
                                    <td>运输单位地址</td>
                                    <td>
                                        <input type="text" class="form-control input-md required-cn" name="transport_unit_address" id="transport_unit_address">
                                    </td>
                                    <td>运输单位邮编</td>
                                    <td>
                                        <input type="text" class="form-control input-md required-cn" name="transport_unit_postcode" id="transport_unit_postcode">
                                    </td>
                                </tr>
                                <tr>
                                    <td>运输单位所在省</td>
                                    <td>
                                        <select type="text" class="form-control input-md required-cn" name="transport_unit_province" id="province_name" onchange="sel_city(this.options[this.options.selectedIndex].value)">
                                          <option value="1"><?php echo ($county_code[0]["county_name"]); ?></option>
                                          <option value="2"><?php echo ($county_code[1]["county_name"]); ?></option>
                                          <option value="3"><?php echo ($county_code[2]["county_name"]); ?></option>
                                          <option value="4"><?php echo ($county_code[3]["county_name"]); ?></option>
                                          <option value="5"><?php echo ($county_code[4]["county_name"]); ?></option>
                                          <option value="6"><?php echo ($county_code[5]["county_name"]); ?></option>
                                          <option value="7"><?php echo ($county_code[6]["county_name"]); ?></option>
                                          <option value="8"><?php echo ($county_code[7]["county_name"]); ?></option>
                                          <option value="9"><?php echo ($county_code[8]["county_name"]); ?></option>
                                          <option value="10"><?php echo ($county_code[9]["county_name"]); ?></option>
                                          <option value="11"><?php echo ($county_code[10]["county_name"]); ?></option>
                                          <option value="12"><?php echo ($county_code[11]["county_name"]); ?></option>
                                          <option value="13"><?php echo ($county_code[12]["county_name"]); ?></option>
                                          <option value="14"><?php echo ($county_code[13]["county_name"]); ?></option>
                                          <option value="15"><?php echo ($county_code[14]["county_name"]); ?></option>
                                          <option value="16"><?php echo ($county_code[15]["county_name"]); ?></option>
                                          <option value="17"><?php echo ($county_code[16]["county_name"]); ?></option>
                                          <option value="18"><?php echo ($county_code[17]["county_name"]); ?></option>
                                          <option value="19"><?php echo ($county_code[18]["county_name"]); ?></option>
                                          <option value="20"><?php echo ($county_code[19]["county_name"]); ?></option>
                                          <option value="21"><?php echo ($county_code[20]["county_name"]); ?></option>
                                          <option value="22"><?php echo ($county_code[21]["county_name"]); ?></option>
                                          <option value="23"><?php echo ($county_code[22]["county_name"]); ?></option>
                                          <option value="24"><?php echo ($county_code[23]["county_name"]); ?></option>
                                          <option value="25"><?php echo ($county_code[24]["county_name"]); ?></option>
                                          <option value="26"><?php echo ($county_code[25]["county_name"]); ?></option>
                                          <option value="27"><?php echo ($county_code[26]["county_name"]); ?></option>
                                          <option value="28"><?php echo ($county_code[27]["county_name"]); ?></option>
                                          <option value="29"><?php echo ($county_code[28]["county_name"]); ?></option>
                                          <option value="30"><?php echo ($county_code[29]["county_name"]); ?></option>
                                          <option value="31"><?php echo ($county_code[30]["county_name"]); ?></option>
                                          <option value="32"><?php echo ($county_code[31]["county_name"]); ?></option>
                                          <option value="33"><?php echo ($county_code[32]["county_name"]); ?></option>
                                        </select>
                                    </td>
                                    <td>运输单位所在市</td>
                                    <td>
                                        <label class="sr-only" for="city_name">所在市：</label>
                                        <select type="text" class="form-control input-md required-cn" name="transport_unit_city" id="city_name" onchange="sel_county(this.options[this.options.selectedIndex].value)">
                                            <option>请选择所在市</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>    
                                    <td>运输单位所在区县</td>
                                    <td>
                                        <label class="sr-only" for="county_name">所在县：</label>
                                        <select type="text" class="form-control input-md required-cn" name="transport_unit_county" id="county_name" onchange="county_code_jurisdiction(this.options[this.options.selectedIndex].value)">     
                                            <option>请选择所在区县</option>
                                        </select>
                                    </td>
                                    <td>运输单位所在区县代码</td>
                                    <td>
                                        <label class="sr-only" for="transport_unit_county_code">区县代码：</label>
                                        <select type="text" class="form-control input-md required-cn" name="transport_unit_county_code" id="transport_unit_county_code">
                                            <option>区县代码</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>运输单位管辖权属</td>
                                    <td>
                                        <label class="sr-only" for="jurisdiction_id">管辖权属：</label>
                                        <select type="text" class="form-control input-md required-cn" name="jurisdiction_id" id="jurisdiction_id">
                                        <option>管辖权属</option>
                                    </td>
                                    <td>运输单位所属行业</td>
                                    <td>
                                        <select type="text" class="form-control input-md" name="transport_unit_trade" id="transport_unit_trade">
                                        <option value=1><?php echo ($tradecode[1]["trade_name"]); ?></option>
                                        <option value=2><?php echo ($tradecode[2]["trade_name"]); ?></option>
                                        <option value=3><?php echo ($tradecode[3]["trade_name"]); ?></option>
                                        <option value=4><?php echo ($tradecode[4]["trade_name"]); ?></option>
                                        <option value=5><?php echo ($tradecode[5]["trade_name"]); ?></option>
                                        <option value=6><?php echo ($tradecode[6]["trade_name"]); ?></option>
                                        <option value=7><?php echo ($tradecode[7]["trade_name"]); ?></option>
                                        <option value=8><?php echo ($tradecode[8]["trade_name"]); ?></option>
                                        <option value=9><?php echo ($tradecode[9]["trade_name"]); ?></option>
                                        <option value=10><?php echo ($tradecode[10]["trade_name"]); ?></option>
                                        <option value=11><?php echo ($tradecode[11]["trade_name"]); ?></option>
                                        <option value=12><?php echo ($tradecode[12]["trade_name"]); ?></option>
                                        <option value=13><?php echo ($tradecode[13]["trade_name"]); ?></option>
                                        <option value=14><?php echo ($tradecode[14]["trade_name"]); ?></option>
                                        <option value=15><?php echo ($tradecode[15]["trade_name"]); ?></option>
                                        <option value=16><?php echo ($tradecode[16]["trade_name"]); ?></option>
                                        <option value=17><?php echo ($tradecode[17]["trade_name"]); ?></option>
                                        <option value=18><?php echo ($tradecode[18]["trade_name"]); ?></option>
                                        <option value=19><?php echo ($tradecode[19]["trade_name"]); ?></option>
                                        <option value=20><?php echo ($tradecode[20]["trade_name"]); ?></option>
                                        <option value=21><?php echo ($tradecode[21]["trade_name"]); ?></option>
                                        <option value=22><?php echo ($tradecode[22]["trade_name"]); ?></option>
                                        <option value=23><?php echo ($tradecode[23]["trade_name"]); ?></option>
                                        <option value=24><?php echo ($tradecode[24]["trade_name"]); ?></option>
                                        <option value=25><?php echo ($tradecode[25]["trade_name"]); ?></option>
                                        <option value=26><?php echo ($tradecode[26]["trade_name"]); ?></option>
                                        <option value=27><?php echo ($tradecode[27]["trade_name"]); ?></option>
                                        <option value=28><?php echo ($tradecode[28]["trade_name"]); ?></option>
                                        <option value=29><?php echo ($tradecode[29]["trade_name"]); ?></option>
                                        <option value=30><?php echo ($tradecode[30]["trade_name"]); ?></option>
                                        <option value=31><?php echo ($tradecode[31]["trade_name"]); ?></option>
                                        <option value=32><?php echo ($tradecode[32]["trade_name"]); ?></option>
                                        <option value=33><?php echo ($tradecode[33]["trade_name"]); ?></option>
                                        <option value=34><?php echo ($tradecode[34]["trade_name"]); ?></option>
                                        <option value=35><?php echo ($tradecode[35]["trade_name"]); ?></option>
                                        <option value=36><?php echo ($tradecode[36]["trade_name"]); ?></option>
                                        <option value=37><?php echo ($tradecode[37]["trade_name"]); ?></option>
                                        <option value=38><?php echo ($tradecode[38]["trade_name"]); ?></option>
                                        <option value=39><?php echo ($tradecode[39]["trade_name"]); ?></option>
                                        <option value=40><?php echo ($tradecode[40]["trade_name"]); ?></option>
                                        <option value=41><?php echo ($tradecode[41]["trade_name"]); ?></option>
                                        <option value=42><?php echo ($tradecode[42]["trade_name"]); ?></option>
                                        <option value=43><?php echo ($tradecode[43]["trade_name"]); ?></option>
                                        <option value=44><?php echo ($tradecode[44]["trade_name"]); ?></option>
                                        <option value=45><?php echo ($tradecode[45]["trade_name"]); ?></option>
                                        <option value=46><?php echo ($tradecode[46]["trade_name"]); ?></option>
                                        <option value=47><?php echo ($tradecode[47]["trade_name"]); ?></option>
                                        <option value=48><?php echo ($tradecode[48]["trade_name"]); ?></option>
                                        <option value=49><?php echo ($tradecode[49]["trade_name"]); ?></option>
                                        <option value=50><?php echo ($tradecode[50]["trade_name"]); ?></option>
                                        <option value=51><?php echo ($tradecode[51]["trade_name"]); ?></option>
                                        <option value=52><?php echo ($tradecode[52]["trade_name"]); ?></option>
                                        <option value=53><?php echo ($tradecode[53]["trade_name"]); ?></option>
                                        <option value=54><?php echo ($tradecode[54]["trade_name"]); ?></option>
                                        <option value=55><?php echo ($tradecode[55]["trade_name"]); ?></option>
                                        <option value=56><?php echo ($tradecode[56]["trade_name"]); ?></option>
                                        <option value=57><?php echo ($tradecode[57]["trade_name"]); ?></option>
                                        <option value=58><?php echo ($tradecode[58]["trade_name"]); ?></option>
                                        <option value=59><?php echo ($tradecode[59]["trade_name"]); ?></option>
                                        <option value=60><?php echo ($tradecode[60]["trade_name"]); ?></option>
                                        <option value=61><?php echo ($tradecode[61]["trade_name"]); ?></option>
                                        <option value=62><?php echo ($tradecode[62]["trade_name"]); ?></option>
                                        <option value=63><?php echo ($tradecode[63]["trade_name"]); ?></option>
                                        <option value=64><?php echo ($tradecode[64]["trade_name"]); ?></option>
                                        <option value=65><?php echo ($tradecode[65]["trade_name"]); ?></option>
                                        <option value=66><?php echo ($tradecode[66]["trade_name"]); ?></option>
                                        <option value=67><?php echo ($tradecode[67]["trade_name"]); ?></option>
                                        <option value=68><?php echo ($tradecode[68]["trade_name"]); ?></option>
                                        <option value=69><?php echo ($tradecode[69]["trade_name"]); ?></option>
                                        <option value=70><?php echo ($tradecode[70]["trade_name"]); ?></option>
                                        <option value=71><?php echo ($tradecode[71]["trade_name"]); ?></option>
                                        <option value=72><?php echo ($tradecode[72]["trade_name"]); ?></option>
                                        <option value=73><?php echo ($tradecode[73]["trade_name"]); ?></option>
                                        <option value=74><?php echo ($tradecode[74]["trade_name"]); ?></option>
                                        <option value=75><?php echo ($tradecode[75]["trade_name"]); ?></option>
                                        <option value=76><?php echo ($tradecode[76]["trade_name"]); ?></option>
                                        <option value=77><?php echo ($tradecode[77]["trade_name"]); ?></option>
                                        <option value=78><?php echo ($tradecode[78]["trade_name"]); ?></option>
                                        <option value=79><?php echo ($tradecode[79]["trade_name"]); ?></option>
                                        <option value=80><?php echo ($tradecode[80]["trade_name"]); ?></option>
                                        <option value=81><?php echo ($tradecode[81]["trade_name"]); ?></option>
                                        <option value=82><?php echo ($tradecode[82]["trade_name"]); ?></option>
                                        <option value=83><?php echo ($tradecode[83]["trade_name"]); ?></option>
                                        <option value=84><?php echo ($tradecode[84]["trade_name"]); ?></option>
                                        <option value=85><?php echo ($tradecode[85]["trade_name"]); ?></option>
                                        <option value=86><?php echo ($tradecode[86]["trade_name"]); ?></option>
                                        <option value=87><?php echo ($tradecode[87]["trade_name"]); ?></option>
                                        <option value=88><?php echo ($tradecode[88]["trade_name"]); ?></option>
                                        <option value=89><?php echo ($tradecode[89]["trade_name"]); ?></option>
                                        <option value=90><?php echo ($tradecode[90]["trade_name"]); ?></option>
                                        <option value=91><?php echo ($tradecode[91]["trade_name"]); ?></option>
                                        <option value=92><?php echo ($tradecode[92]["trade_name"]); ?></option>
                                        <option value=93><?php echo ($tradecode[93]["trade_name"]); ?></option>
                                        <option value=94><?php echo ($tradecode[94]["trade_name"]); ?></option>
                                        <option value=95><?php echo ($tradecode[95]["trade_name"]); ?></option>
                                        <option value=96><?php echo ($tradecode[96]["trade_name"]); ?></option>
                                        <option value=97><?php echo ($tradecode[97]["trade_name"]); ?></option>
                                        <option value=98><?php echo ($tradecode[98]["trade_name"]); ?></option>
                                        <option value=99><?php echo ($tradecode[99]["trade_name"]); ?></option>
                                        <option value=100><?php echo ($tradecode[100]["trade_name"]); ?></option>
                                        <option value=101><?php echo ($tradecode[101]["trade_name"]); ?></option>
                                        <option value=102><?php echo ($tradecode[102]["trade_name"]); ?></option>
                                        <option value=103><?php echo ($tradecode[103]["trade_name"]); ?></option>
                                        <option value=104><?php echo ($tradecode[104]["trade_name"]); ?></option>
                                        <option value=105><?php echo ($tradecode[105]["trade_name"]); ?></option>
                                        <option value=106><?php echo ($tradecode[106]["trade_name"]); ?></option>
                                        <option value=107><?php echo ($tradecode[107]["trade_name"]); ?></option>
                                        <option value=108><?php echo ($tradecode[108]["trade_name"]); ?></option>
                                        <option value=109><?php echo ($tradecode[109]["trade_name"]); ?></option>
                                        <option value=110><?php echo ($tradecode[110]["trade_name"]); ?></option>
                                        <option value=111><?php echo ($tradecode[111]["trade_name"]); ?></option>
                                        <option value=112><?php echo ($tradecode[112]["trade_name"]); ?></option>
                                        <option value=113><?php echo ($tradecode[113]["trade_name"]); ?></option>
                                        <option value=114><?php echo ($tradecode[114]["trade_name"]); ?></option>
                                        <option value=115><?php echo ($tradecode[115]["trade_name"]); ?></option>
                                        <option value=116><?php echo ($tradecode[116]["trade_name"]); ?></option>
                                        <option value=117><?php echo ($tradecode[117]["trade_name"]); ?></option>
                                        <option value=118><?php echo ($tradecode[118]["trade_name"]); ?></option>
                                        <option value=119><?php echo ($tradecode[119]["trade_name"]); ?></option>
                                        <option value=120><?php echo ($tradecode[120]["trade_name"]); ?></option>
                                        <option value=121><?php echo ($tradecode[121]["trade_name"]); ?></option>
                                        <option value=122><?php echo ($tradecode[122]["trade_name"]); ?></option>
                                        <option value=123><?php echo ($tradecode[123]["trade_name"]); ?></option>
                                        <option value=124><?php echo ($tradecode[124]["trade_name"]); ?></option>
                                        <option value=125><?php echo ($tradecode[125]["trade_name"]); ?></option>
                                        <option value=126><?php echo ($tradecode[126]["trade_name"]); ?></option>
                                        <option value=127><?php echo ($tradecode[127]["trade_name"]); ?></option>
                                        <option value=128><?php echo ($tradecode[128]["trade_name"]); ?></option>
                                        <option value=129><?php echo ($tradecode[129]["trade_name"]); ?></option>
                                        <option value=130><?php echo ($tradecode[130]["trade_name"]); ?></option>
                                        <option value=131><?php echo ($tradecode[131]["trade_name"]); ?></option>
                                        <option value=132><?php echo ($tradecode[132]["trade_name"]); ?></option>
                                        <option value=133><?php echo ($tradecode[133]["trade_name"]); ?></option>
                                        <option value=134><?php echo ($tradecode[134]["trade_name"]); ?></option>
                                        <option value=135><?php echo ($tradecode[135]["trade_name"]); ?></option>
                                        <option value=136><?php echo ($tradecode[136]["trade_name"]); ?></option>
                                        <option value=137><?php echo ($tradecode[137]["trade_name"]); ?></option>
                                        <option value=138><?php echo ($tradecode[138]["trade_name"]); ?></option>
                                        <option value=139><?php echo ($tradecode[139]["trade_name"]); ?></option>


                                        </select>   
                                    </td>
                                </tr>
                                <tr>
                                    <td>运输单位乡镇街道</td>
                                    <td>
                                        <input type="text" class="form-control input-md" name="transport_unit_street" id="transport_unit_street">
                                    </td>
                                    <td>运输单位注册类型</td>
                                    <td>
                                        <select type="text" class="form-control input-md" name="transport_unit_registration_type" id="transport_unit_registration_type">
                                            <option><?php echo ($enterprise_register_type[0]["enterprise_register_type_name"]); ?></option>
                                            <option><?php echo ($enterprise_register_type[1]["enterprise_register_type_name"]); ?></option>
                                            <option><?php echo ($enterprise_register_type[2]["enterprise_register_type_name"]); ?></option>
                                            <option><?php echo ($enterprise_register_type[3]["enterprise_register_type_name"]); ?></option>
                                            <option><?php echo ($enterprise_register_type[4]["enterprise_register_type_name"]); ?></option>
                                            <option><?php echo ($enterprise_register_type[5]["enterprise_register_type_name"]); ?></option>
                                            <option><?php echo ($enterprise_register_type[6]["enterprise_register_type_name"]); ?></option>
                                            <option><?php echo ($enterprise_register_type[7]["enterprise_register_type_name"]); ?></option>
                                            <option><?php echo ($enterprise_register_type[8]["enterprise_register_type_name"]); ?></option>
                                            <option><?php echo ($enterprise_register_type[9]["enterprise_register_type_name"]); ?></option>
                                            <option><?php echo ($enterprise_register_type[10]["enterprise_register_type_name"]); ?></option>
                                            <option><?php echo ($enterprise_register_type[11]["enterprise_register_type_name"]); ?></option>
                                            <option><?php echo ($enterprise_register_type[12]["enterprise_register_type_name"]); ?></option>
                                            <option><?php echo ($enterprise_register_type[13]["enterprise_register_type_name"]); ?></option>
                                            <option><?php echo ($enterprise_register_type[14]["enterprise_register_type_name"]); ?></option>
                                            <option><?php echo ($enterprise_register_type[15]["enterprise_register_type_name"]); ?></option>
                                            <option><?php echo ($enterprise_register_type[16]["enterprise_register_type_name"]); ?></option>
                                            <option><?php echo ($enterprise_register_type[17]["enterprise_register_type_name"]); ?></option>
                                            <option><?php echo ($enterprise_register_type[18]["enterprise_register_type_name"]); ?></option>
                                            <option><?php echo ($enterprise_register_type[19]["enterprise_register_type_name"]); ?></option>
                                            <option><?php echo ($enterprise_register_type[20]["enterprise_register_type_name"]); ?></option>
                                            <option><?php echo ($enterprise_register_type[21]["enterprise_register_type_name"]); ?></option>
                                            <option><?php echo ($enterprise_register_type[22]["enterprise_register_type_name"]); ?></option>
                                            <option><?php echo ($enterprise_register_type[23]["enterprise_register_type_name"]); ?></option>
                                            <option><?php echo ($enterprise_register_type[24]["enterprise_register_type_name"]); ?></option>

                                        </select>  
                                    </td>
                                </tr>
                                <tr>
                                    <td>运输单位企业规模</td>
                                    <td>
                                        <select type="text" class="form-control input-md" name="transport_unit_enterprise_scale" id="transport_unit_enterprise_scale">
                                            <option><?php echo ($enterprise_scale[0]["enterprise_scale_name"]); ?></option>
                                            <option><?php echo ($enterprise_scale[1]["enterprise_scale_name"]); ?></option>
                                            <option><?php echo ($enterprise_scale[2]["enterprise_scale_name"]); ?></option>
                                            <option><?php echo ($enterprise_scale[3]["enterprise_scale_name"]); ?></option>
                                            <option><?php echo ($enterprise_scale[4]["enterprise_scale_name"]); ?></option>
                                            <option><?php echo ($enterprise_scale[5]["enterprise_scale_name"]); ?></option>
                                            <option><?php echo ($enterprise_scale[6]["enterprise_scale_name"]); ?></option>
                                        </select>  
                                    </td>
                                    <td>运输单位许可证编号</td>
                                    <td>
                                        <input type="text" class="form-control input-md required-cn" name="transport_unit_license_num" id="transport_unit_license_num">
                                    </td>
                                </tr>
                                <tr>
                                    <td>运输单位许可证文号</td>
                                    <td>
                                        <input type="text" class="form-control input-md required-cn" name="transport_unit_reference_num" id="transport_unit_reference_num">
                                    </td>
                                    <td>许可证发证机关</td>
                                    <td>
                                        <input type="text" class="form-control input-md required-cn" name="license_issuing_authority" id="license_issuing_authority">
                                    </td>
                                </tr>
                                <tr>
                                    <td>许可证发证日期</td>
                                    <td>
                                        <input type="date" class="form-control input-md required-cn" name="license_issuing_date" id="license_issuing_date">
                                    </td>
                                    <td>许可证有效期至</td>
                                    <td>
                                        <input type="date" class="form-control input-md required-cn" name="license_expiry_date" id="license_expiry_date">
                                    </td>
                                </tr>
                                <tr>
                                    <td>运输单位环保联系人姓名</td>
                                    <td>
                                        <input type="text" class="form-control input-md required-cn" name="transport_unit_contacts_name" id="transport_unit_contacts_name">
                                    </td>
                                    <td>运输单位环保联系人电话</td>
                                    <td>
                                        <input type="text" class="form-control input-md required-cn" name="transport_unit_contacts_phone" id="transport_unit_contacts_phone">
                                    </td>
                                </tr>
                                <tr>
                                    <td>运输单位法人代码</td>
                                    <td>
                                        <input type="text" class="form-control input-md required-cn" name="transport_unit_legal_person_code" id="transport_unit_legal_person_code">
                                    </td>
                                    <td>运输单位法人姓名</td>
                                    <td>
                                        <input type="text" class="form-control input-md required-cn" name="transport_unit_legal_person_name" id="transport_unit_legal_person_name">
                                    </td>
                                </tr>
                                <tr>
                                    <td>运输单位法人电话</td>
                                    <td>
                                        <input type="text" class="form-control input-md required-cn" name="transport_unit_legal_person_phone" id="transport_unit_legal_person_phone">
                                    </td>
                                    <td>运输单位传真</td>
                                    <td>
                                        <input type="text" class="form-control input-md" name="transport_unit_fax" id="transport_unit_fax">
                                    </td>
                                </tr>
                                <tr>
                                    <td>运输单位邮箱地址</td>
                                    <td>
                                        <input type="text" class="form-control input-md" name="transport_unit_email" id="transport_unit_email">
                                    </td>
                                    <td>运输单位中心经度</td>
                                    <td>
                                        <input type="text" class="form-control input-md number-cn" name="transport_unit_longitude" id="transport_unit_longitude">
                                    </td>
                                </tr>
                                <tr>
                                    <td>运输单位中心纬度</td>
                                    <td>
                                        <input type="text" class="form-control input-md number-cn" name="transport_unit_latitude" id="transport_unit_latitude">
                                    </td>
                                </tr>
                            </table>
                        </big>
                    </div>

                    <center>
                        <button type="submit" class="btn btn-warning btn-lg">提交</button>
                    </center>
                </form>

                <script type="text/javascript" src="__PUBLIC__/js/jquery-myvalidate.js"></script>
                <script>
                $("#transportForm").validate();
                </script>



            </div>
        </div>
        <div class="panel panel-info" id="login-panel" style="margin-top:20px">
            <div class="panel-heading">
                <h3></h3>
            </div>
            <div class="panel-body">
                <footer class="bs-footer" role="contentinfo">
                    <div class="text-center padder clearfix txt-shadow">

                        <div class="blank-div"></div>
                        危险废物管理信息系统
                        <br/>Copyright © 2014-2015
                        <br/>
                        <span class="glyphicon glyphicon-send"></span>
                        <b>SJTU OMNILab</b>
                    </div>

                </footer>
            </div>
        </div>
    </div>
    <!-- /container -->

    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery core JavaScript -->

</body>

</html>