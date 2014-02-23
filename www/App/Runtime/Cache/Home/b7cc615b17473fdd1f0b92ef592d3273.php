<?php if (!defined('THINK_PATH')) exit();?><form role="form" id="manifest_submit">
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
                    <td>运输单位</td>
                    <td>
                        <?php echo ($manifest["transport_unit_name"]); ?>
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
                <tr>
                    <td>第一承运人姓名</td>
                    <td>
                        <?php echo ($manifest["carrier_1_name"]); ?> 
                    </td>
                    <td>第一承运人工号</td>
                    <td>
                        <?php echo ($manifest["carrier_1_num"]); ?> 
                    </td>
                </tr>
                <tr>
                    <td>运输日期</td>
                    <td>
                        <?php echo ($manifest["transport_date_1"]); ?>
                    </td>
                    <td>车辆1 ID</td>
                    <td>
                        <?php echo ($manifest["vehicle_id_1"]); ?>
                    </td>
                </tr>
                <tr>
                    <td>道路运输证号</td>
                    <td>
                       <?php echo ($manifest["transport_license_num_1"]); ?>
                    </td>
                    <td>运输起点</td>
                    <td>
                        <?php echo ($manifest["transport_start_point_1"]); ?>
                    </td>
                </tr>
                <tr>
                    <td>经由地</td>
                    <td>
                        <?php echo ($manifest["transport_pass_by_1"]); ?>
                    </td>
                    <td>运输终点</td>
                    <td>
                        <?php echo ($manifest["transport_destination_1"]); ?> 
                    </td>
                </tr>
                    <tr>
                    <td>第一承运人姓名</td>
                    <td>
                        <?php echo ($manifest["carrier_2_name"]); ?> 
                    </td>
                    <td>第一承运人工号</td>
                    <td>
                       <?php echo ($manifest["carrier_2_num"]); ?>
                    </td>
                </tr>
                <tr>
                    <td>运输日期</td>
                    <td>
                       <?php echo ($manifest["transport_date_2"]); ?>  
                    </td>
                    <td>车辆1 ID</td>
                    <td>
                        <?php echo ($manifest["vehicle_id_2"]); ?> 
                    </td>
                </tr>
                <tr>
                    <td>道路运输证号</td>
                    <td>
                        <?php echo ($manifest["transport_license_num_2"]); ?>  
                    </td>
                    <td>运输起点</td>
                    <td>
                        <?php echo ($manifest["transport_start_point_2"]); ?>
                    </td>
                </tr>
                <tr>
                    <td>经由地</td>
                    <td>
                        <?php echo ($manifest["transport_pass_by_2"]); ?>  
                    </td>
                    <td>运输终点</td>
                    <td>
                        <?php echo ($manifest["transport_destination_2"]); ?>  
                    </td>
                </tr>

            </table>
        </div>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">接受单位联</div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed">
                <tr>
                    <td>接受单位经营许可证号</td>
                    <td>
                        <?php echo ($manifest["reception_unit_license_num"]); ?> 
                    </td>
                    <td>接收人姓名</td>
                    <td>
                        <?php echo ($manifest["receiver_name"]); ?> 
                    </td>
                </tr>
                <tr>
                    <td>接收人工号</td>
                    <td>
                        <?php echo ($manifest["receiver_num"]); ?>  
                    </td>
                    <td>接收日期</td>
                    <td>
                        <?php echo ($manifest["receive_date"]); ?>  
                    </td>
                </tr>
                <tr>
                    <td>废物处置方式</td>
                    <td>
                        <?php echo ($manifest["waste_disposal_method"]); ?>  
                    </td>
                    <td>接受单位负责人姓名</td>
                    <td>
                        <?php echo ($manifest["reception_unit_principal_name"]); ?>
                    </td>
                </tr>
                <tr>
                    <td>接受单位负责人审核日期</td>
                    <td>
                        <?php echo ($manifest["reception_unit_audit_date"]); ?>  
                    </td>
                    <td></td>
                    <td>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
</form>

<center>
    <button class="btn btn-warning btn-lg" onclick="ajaxAction()">提交联单</button>
    <button class="btn btn-info btn-lg" onclick="$('#myModal').modal('hide');">关闭页面</button>
</center>
<script type="text/javascript">
console.log(manifest_id_json);
function ajaxAction() {
    $("#model-content").html('<center style="margin:50px"><h4>提交中...</h4><div class="progress progress-striped active" style="width: 50%"><div class="progress-bar"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div></center>');
    $.ajax({
        type: "post",
        url: "transfer_manifest_handle_submited?manifest_id=" + manifest_id_json,
        timeout: 2000,
        data: {
            manifest_status_old: manifest_status_json
        },
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