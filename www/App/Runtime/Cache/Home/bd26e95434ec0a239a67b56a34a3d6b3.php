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
                        <?php echo ($transport_unit["waste_location_county"]); ?>
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
                    <td>产废设施所在地</td>
                    <td>
                        <?php echo ($transport_unit["waste_location"]); ?>
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
                    <td>产生单位</td>
                    <td>
                        <?php echo ($manifest["production_unit_name"]); ?>
                    </td>
                    <td>接受单位</td>
                    <td>
                        <?php echo ($manifest["reception_unit_name"]); ?>
                    </td>
                </tr>                 
                <tr>
                    <td>危废编号</td>
                    <td>
                        <?php echo ($manifest["waste_id"]); ?>
                    </td>
                    <td>危废重量</td>
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
                        <?php echo ($manifest["transport_goal"]); ?>
                    </td>
                </tr>
                <tr>
                    <td>应急措施</td>
                    <td>
                        <?php echo ($manifest["emergency_measure"]); ?>
                    </td>
                    <td>危废发运人</td>
                    <td>
                        <?php echo ($manifest["shipper"]); ?>
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

<div class="panel panel-primary">
    <div class="panel-heading">运输单位联</div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed">
                <tr>
                    <td>第一承运人姓名</td>
                    <td>
                        <input type="text" name="carrier_1_name" class="form-control input-sm" placeholder="第一承运人姓名">  
                    </td>
                    <td>第一承运人工号</td>
                    <td>
                        <input type="text" name="carrier_1_num" class="form-control input-sm" placeholder="第一承运人工号">  
                    </td>
                </tr>
                <tr>
                    <td>运输日期</td>
                    <td>
                        <input type="text" name="transport_date_1" class="form-control input-sm" placeholder="运输日期">  
                    </td>
                    <td>车辆1 ID</td>
                    <td>
                        <input type="text" name="vehicle_id_1" class="form-control input-sm" placeholder="车辆1 ID">  
                    </td>
                </tr>
                <tr>
                    <td>道路运输证号</td>
                    <td>
                        <input type="text" name="transport_license_num_1" class="form-control input-sm" placeholder="道路运输证号">  
                    </td>
                    <td>运输起点</td>
                    <td>
                        <input type="text" name="transport_start_point_1" class="form-control input-sm" placeholder="运输起点">  
                    </td>
                </tr>
                <tr>
                    <td>经由地</td>
                    <td>
                        <input type="text" name="transport_pass_by_1" class="form-control input-sm" placeholder="经由地">  
                    </td>
                    <td>运输终点</td>
                    <td>
                        <input type="text" name="transport_destination_1" class="form-control input-sm" placeholder="运输终点">  
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
                        <input type="text" name="transport_date_2" class="form-control input-sm" placeholder="运输日期">  
                    </td>
                    <td>车辆2 ID</td>
                    <td>
                        <input type="text" name="vehicle_id_2" class="form-control input-sm" placeholder="车辆2 ID">  
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

<script type="text/javascript">
console.log(manifest_id_json);
console.log(manifest_status_json);
function ajaxAction() {
    var form_serialize = "" + $('#manifest_request').serialize();

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