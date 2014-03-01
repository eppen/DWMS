<?php if (!defined('THINK_PATH')) exit();?><form role="form" id="manifest_request">
    <div class="panel panel-primary">
        <div class="panel-heading">产生单位信息</div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed">
                <tr>
                    <td>单位名称</td>
                    <td>
                        <?php echo ($production_unit["production_unit_name"]); ?>
                    </td>
                    <td>单位用户名称</td>
                    <td>
                        <?php echo ($production_unit["production_unit_username"]); ?>
                    </td>
                </tr>
                <tr>
                    <td>法人代码</td>
                    <td>
                        <?php echo ($production_unit["production_unit_legal_person_code"]); ?>
                    </td>
                    <td>单位地址</td>
                    <td>
                        <?php echo ($production_unit["production_unit_address"]); ?>
                    </td>
                </tr>
                <tr>
                    <td>邮政编码</td>
                    <td>
                        <?php echo ($production_unit["production_unit_postcode"]); ?>
                    </td>
                    <td>所在区县</td>
                    <td>
                        <?php echo ($production_unit["waste_location_county"]); ?>
                    </td>
                </tr>
                <tr>
                    <td>联系人姓名</td>
                    <td>
                        <?php echo ($production_unit["production_unit_contacts_name"]); ?>
                    </td>
                    <td>联系电话</td>
                    <td>
                        <?php echo ($production_unit["production_unit_contacts_phone"]); ?>
                    </td>
                </tr>
                <tr>
                    <td>单位传真</td>
                    <td>
                        <?php echo ($production_unit["production_unit_fax"]); ?>
                    </td>
                    <td>产废设施所在地</td>
                    <td>
                        <?php echo ($production_unit["waste_location"]); ?>
                    </td>
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
                    <td>运输单位</td>
                    <td>
                        <?php echo ($t_name); ?>
                    </td>
                    <td>接受单位</td>
                    <td>
                        <?php echo ($r_name); ?>
                    </td>
                </tr>                 
                <tr>
                    <td>危废数量（袋/个）</td>
                    <td>
                        <?php echo ($record["predict_output_quantity"]); ?>
                    </td>
                    <td>危废重量（桶/公斤）</td>
                    <td>
                        <?php echo ($record["predict_output_weight"]); ?>
                    </td>
                </tr>
                <tr>
                    <td>危废主要包装方式</td>
                    <td>
                        <select type="text" name="waste_package" id="waste_package" class="form-control input-sm required-cn" placeholder="危废包装方式">

                        </select>
                    </td>
                    <td>危废外运目的</td>
                    <td>
                        <select type="text" name="waste_transport_goal" id="waste_transport_goal" class="form-control input-sm required-cn" placeholder="危废外运目的">

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>应急措施</td>
                    <td>
                        <input type="text" name="emergency_measure" class="form-control input-sm" placeholder="应急措施">
                    </td>
                    <td>危废发运人</td>
                    <td>
                        <input type="text" name="waste_shipper" class="form-control input-sm required-cn" placeholder="危废发运人">
                    </td>
                </tr>
                <tr>
                    <td>危废运达地</td>
                    <td>
                        <input type="text" name="waste_destination" class="form-control input-sm required-cn" placeholder="危废运达地">
                        <!-- <?php echo ($reception_unit["reception_unit_address"]); ?> -->
                    </td>
                    <td>危废转移时间</td>
                    <td>
                        <?php echo ($record["record_date"]); ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

</form>

<center>
    <button class="btn btn-info btn-lg" id="button_save" data-loading-text="正在保存..." data-complete-text="保存成功！" onclick="ajaxAction(0)">保存</button>
    <button class="btn btn-warning btn-lg" id="button_submit" data-loading-text="正在提交..." data-complete-text="提交成功！" onclick="ajaxAction(1)">提交</button>
    <button class="btn btn-primary btn-lg" onclick="$('#myModal').modal('hide');">关闭页面</button>
</center>
<script type="text/javascript" src="__PUBLIC__/js/jquery-validate.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jquery-myvalidate.js"></script>
<script>
$("#manifest_request").validate();
</script>
<script type="text/javascript">

for(var idx in package_method){   
    $("#waste_package").append('<option value="' + package_method[idx].package_method + '">' + package_method[idx].package_method + '</option>')
}
for(var idx in waste_disposal_method){   
    $("#waste_transport_goal").append('<option value="' + waste_disposal_method[idx].waste_disposal_method + '">' + waste_disposal_method[idx].waste_disposal_method + '</option>')
}

function ajaxAction(actionID,transport_unit_name) {
    if(!$('#manifest_request').valid()){
        return;
    }
    switch (actionID) {
        case 0:
            $('#button_save').button('loading');
            $('#button_submit').addClass('disabled');
            break;
        case 1:
            $('#button_save').addClass('disabled');
            $('#button_submit').button('loading');
            break;
        default:
            break;
    }
    console.log($('#manifest_request').serialize());
    $.ajax({
        type: "post",
        url: "transfer_manifest_request_form?record_id=" + record_json.record_id,
        timeout: 2000,
        // data: $('#manifest_request').serialize() + '&manifest_status=' + actionID +'&reception_unit_name=' + + '&transport_unit_name=' + transport_unit_name ,
        data: $('#manifest_request').serialize() + '&manifest_status=' + actionID  + '&transport_unit_id=' + record_json.transport_unit_id + '&reception_unit_id=' + record_json.reception_unit_id + '&waste_weight=' + record_json.predict_output_weight + '&waste_num=' + record_json.predict_output_quantity + '&rfid_table_id=' + record_json.rfid_table_id + '&waste_transport_time=' + record_json.record_date,
        success: function(data) {
            switch (actionID) {
                case 0:
                    $('#button_save').button('complete');
                    $('#button_submit').removeClass('disabled');
                    setTimeout("$('#button_save').button('reset')", 3000);
                    break;
                case 1:
                    $('#button_save').removeClass('disabled');
                    $('#button_submit').button('complete');
                    setTimeout("$('#button_submit').button('reset')", 3000);
                    break;
                default:
                    break;
            }
            $('input').val('');
            $('#myModal').modal('hide');
            $('#myModal').on('hidden.bs.modal', function(e) {
                refresh_page();
            });
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert('保存失败，请重新保存。');
            console.log("Error: Ajax_Content_Load " + errorThrown);
            console.log("XMLHttpRequest.status: " + XMLHttpRequest.status);
            console.log("XMLHttpRequest.readyState: " + XMLHttpRequest.readyState);
            console.log("textStatus: " + textStatus);
        }
    });

}
</script>