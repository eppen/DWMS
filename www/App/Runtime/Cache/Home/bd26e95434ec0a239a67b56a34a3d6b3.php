<?php if (!defined('THINK_PATH')) exit();?><form role="form" id="manifest_request">
    <div class="panel panel-primary">
        <div class="panel-heading">运输单位信息</div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed">
                <tr>
                    <td>单位名称</td>
                    <td>
                        <?php echo ($transport_unit["transport_unit_name"]); ?>
                    </td>
                    <td>单位用户名称</td>
                    <td>
                        <?php echo ($transport_unit["transport_unit_username"]); ?>
                    </td>
                </tr>
                <tr>
                    <td>法人代码</td>
                    <td>
                        <?php echo ($transport_unit["transport_unit_legal_person_code"]); ?>
                    </td>
                    <td>单位地址</td>
                    <td>
                        <?php echo ($transport_unit["transport_unit_address"]); ?>
                    </td>
                </tr>
                <tr>
                    <td>邮政编码</td>
                    <td>
                        <?php echo ($transport_unit["transport_unit_postcode"]); ?>
                    </td>
                    <td>所在区县</td>
                    <td>
                        <?php echo ($transport_unit["transport_unit_county"]); ?>
                    </td>
                </tr>
                <tr>
                    <td>联系人姓名</td>
                    <td>
                        <?php echo ($transport_unit["transport_unit_contacts_name"]); ?>
                    </td>
                    <td>联系电话</td>
                    <td>
                        <?php echo ($transport_unit["transport_unit_contacts_phone"]); ?>
                    </td>
                </tr>
                <tr>
                    <td>单位传真</td>
                    <td>
                        <?php echo ($transport_unit["transport_unit_fax"]); ?>
                    </td>
                    <td></td>
                    <td></td>
                </tr> 
            </table>
            </div>
        </div>
    </div>     

    <div class="panel panel-primary">
        <div class="panel-heading">基本信息</div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed">
                <tr>
                    <td>生产单位</td>
                    <td>
                        <?php echo ($p_name); ?>
                    </td>
                    <td>接受单位</td>
                    <td>
                        <?php echo ($r_name); ?>
                    </td>
                </tr>                
                 <tr>
                    <td>危废数量（袋/个）</td>
                    <td>
                        <?php echo ($manifest["waste_num"]); ?>
                    </td>
                    <td>危废重量（桶/公斤）</td>
                    <td>
                        <?php echo ($manifest["waste_weight"]); ?>
                    </td>
                </tr>
                 <tr>
                    <td>危废包装方式</td>
                    <td>
                        <?php echo ($manifest["waste_package"]); ?>
                    </td>
                    <td>危废外运目的</td>
                    <td>
                        <?php echo ($manifest["waste_transport_goal"]); ?>
                    </td>
                </tr>
                <tr>
                    <td>应急措施</td>
                    <td>
                        <?php echo ($manifest["emergency_measure"]); ?>
                    </td>
                    <td>危废发运人</td>
                    <td>
                        <?php echo ($manifest["waste_shipper"]); ?>
                    </td>
                </tr>
                <tr>
                    <td>危废运达地</td>
                    <td>
                        <?php echo ($manifest["waste_destination"]); ?>
                    </td>
                    <td>危废转移时间</td>
                    <td>
                        <?php echo ($manifest["waste_transport_time"]); ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">运输单位联</div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed">
                <tr>
                    <td>第一承运人姓名</td>
                    <td>
                        <input type="text" name="carrier_1_name" class="form-control input-sm required-cn" placeholder="第一承运人姓名">  
                    </td>
                    <td>第一承运人工号</td>
                    <td>
                        <input type="text" name="carrier_1_num" class="form-control input-sm required-cn" placeholder="第一承运人工号">  
                    </td>
                </tr>
                <tr>
                    <td>运输日期</td>
                    <td>
                        <input type="date" name="transport_date_1" class="form-control input-sm required-cn" placeholder="运输日期">  
                    </td>
                    <td>车辆1 牌照</td>
                    <td>
                        <select type="text" name="vehicle_id_1" class="form-control input-sm required-cn" placeholder="车辆1 牌照" id="vehicle_1">
                        </select>  
                    </td>
                </tr>
                <tr>
                    <td>道路运输证号</td>
                    <td>
                        <input type="text" name="transport_license_num_1" class="form-control input-sm required-cn" placeholder="道路运输证号">  
                    </td>
                    <td>运输起点</td>
                    <td>
                        <input type="text" name="transport_start_point_1" class="form-control input-sm required-cn" placeholder="运输起点">  
                    </td>
                </tr>
                <tr>
                    <td>经由地</td>
                    <td>
                        <input type="text" name="transport_pass_by_1" class="form-control input-sm" placeholder="经由地">  
                    </td>
                    <td>运输终点</td>
                    <td>
                        <input type="text" name="transport_destination_1" class="form-control input-sm required-cn" placeholder="运输终点">  
                    </td>
                </tr>
                <tr>
                    <td>第二承运人姓名</td>
                    <td>
                        <input type="text" name="carrier_2_name" class="form-control input-sm" placeholder="第二承运人姓名">  
                    </td>
                    <td>第二承运人工号</td>
                    <td>
                        <input type="text" name="carrier_2_num" class="form-control input-sm" placeholder="第二承运人工号">  
                    </td>
                </tr>
                <tr>
                    <td>运输日期</td>
                    <td>
                        <input type="date" id="transport_date_2" class="form-control input-sm" placeholder="运输日期">  
                    </td>
                    <td>车辆2 牌照</td>
                    <td>
                        <select type="text" class="form-control input-sm" placeholder="车辆2 牌照" id="vehicle_2">  
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>道路运输证号</td>
                    <td>
                        <input type="text" name="transport_license_num_2" class="form-control input-sm" placeholder="道路运输证号">  
                    </td>
                    <td>运输起点</td>
                    <td>
                        <input type="text" name="transport_start_point_2" class="form-control input-sm" placeholder="运输起点">  
                    </td>
                </tr>
                <tr>
                    <td>经由地</td>
                    <td>
                        <input type="text" name="transport_pass_by_2" class="form-control input-sm" placeholder="经由地">  
                    </td>
                    <td>运输终点</td>
                    <td>
                        <input type="text" name="transport_destination_2" class="form-control input-sm" placeholder="运输终点">  
                    </td>
                </tr>

            </table>
        </div>
    </div>
</div>
</form>

<center>
    <button class="btn btn-warning btn-lg" onclick="ajaxAction()">保存</button>
    <button class="btn btn-info btn-lg" onclick="$('#myModal').modal('hide');">关闭页面</button>
</center>
<script type="text/javascript" src="__PUBLIC__/js/jquery-validate.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jquery-myvalidate.js"></script>
<script>
$("#manifest_request").validate();
</script>
<script type="text/javascript">
// $('#vehicle_1').html('<option value>请选择车辆牌照</option>');
for(var idx in vehicle){
    $('#vehicle_1').append('<option value = "' + vehicle[idx].vehicle_id + '">' + vehicle[idx].vehicle_num + '</option>');
}

$('#vehicle_2').html('<option value="-1">请选择车辆牌照</option>');
for(var idx in vehicle){
    $('#vehicle_2').append('<option value = "' + vehicle[idx].vehicle_id + '">' + vehicle[idx].vehicle_num + '</option>');
}

// function vehicle_2_change()

function ajaxAction() {

    if(!$('#manifest_request').valid()){
        return;
    }

    var form_serialize="";

    var selected=document.getElementById("vehicle_2"); 
    if (selected.value > 0){
        var vehicle_id_2 = selected.value;
        form_serialize = "" + $('#manifest_request').serialize() + "&vehicle_id_2=" + vehicle_id_2;
    } else{
        form_serialize = "" + $('#manifest_request').serialize();
    }  

    var selected=document.getElementById("transport_date_2"); 
    if (selected.value != ""){
        var transport_date_2 = selected.value;
        form_serialize = form_serialize + "&transport_date_2=" + transport_date_2;
    } 

    console.log(form_serialize);
    $("#model-content").html('<center style="margin:50px"><h4>提交中...</h4><div class="progress progress-striped active" style="width: 50%"><div class="progress-bar"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div></center>');

    $.ajax({
        type: "post",
        url: "transfer_manifest_handle_request_form?manifest_id=" + manifest_id_json,
        timeout: 2000,
        data: form_serialize + '&manifest_status_old=' + manifest_status_json,
        success: function(data) {
            $('#myModal').modal('hide');
            $('#myModal').on('hidden.bs.modal', function(e) {
                refresh_page();
            });
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