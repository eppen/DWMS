<?php if (!defined('THINK_PATH')) exit();?><form role="form" id="record_request">
    <div class="panel panel-primary">
        <div class="panel-heading">基本信息</div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed">
                    <tr>
                        <td>单位名称</td>
                        <td>
                            <?php echo ($unit["production_unit_name"]); ?>
                        </td>
                        <td>单位用户名称</td>
                        <td>
                            <?php echo ($unit["production_unit_username"]); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>备案类型</td>
                        <td>
                            <input type="text" name="record_type" class="form-control input-sm" placeholder="备案类型">
                        </td>
                        <td>备案日期</td>
                        <td>
                            <input type="date" name="record_date" class="form-control input-sm" placeholder="备案日期">
                        </td>
                    </tr>
                    <tr>
                        <td>法人代码</td>
                        <td>
                            <?php echo ($unit["production_unit_legal_person_code"]); ?>
                        </td>
                        <td>单位地址</td>
                        <td>
                            <?php echo ($unit["production_unit_address"]); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>邮政编码</td>
                        <td>
                            <?php echo ($unit["production_unit_postcode"]); ?>
                        </td>
                        <td>所在区县</td>
                        <td>
                            <?php echo ($unit["waste_location_county"]); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>联系人姓名</td>
                        <td>
                            <?php echo ($unit["production_unit_contacts_name"]); ?>
                        </td>
                        <td>联系电话</td>
                        <td>
                            <?php echo ($unit["production_unit_contacts_phone"]); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>单位传真</td>
                        <td>
                            <?php echo ($unit["production_unit_fax"]); ?>
                        </td>
                        <td>产废设施所在地</td>
                        <td>
                            <?php echo ($unit["waste_location"]); ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">工艺方法</div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed">
                    <tr>
                        <td>工艺序号</td>
                        <td>
                            <input type="text" name="technology_code" class="form-control input-sm" placeholder="工艺序号">
                        </td>
                        <td>工艺方法</td>
                        <td>
                            <input type="text" name="technology_method" class="form-control input-sm" placeholder="工艺方法">
                        </td>
                    </tr>
                    <tr>
                        <td>危废代码</td>
                        <td>
                            <input type="text" name="waste_code" class="form-control input-sm" placeholder="危废代码">
                        </td>
                        <td>相关产品</td>
                        <td>
                            <input type="text" name="relational_production" class="form-control input-sm" placeholder="相关产品">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">危险废物产生情况</div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed">
                    <tr>
                        <td>废物名称</td>
                        <td>
                            <input type="text" name="waste_name" class="form-control input-sm" placeholder="废物代码">
                        </td>
                        <td>废物形态</td>
                        <td>
                            <input type="text" name="waste_form" class="form-control input-sm" placeholder="废物形态">
                        </td>
                    </tr>
                    <tr>
                        <td>预计危废重量（吨）</td>
                        <td>
                            <input type="text" name="predict_output_weight" class="form-control input-sm" placeholder="预计危废重量（吨）">
                        </td>
                        <td>预计危废数量（桶）</td>
                        <td>
                            <input type="text" name="predict_output_quantity" class="form-control input-sm" placeholder="预计危废数量（桶）">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">危废仓库贮存情况</div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed">
                    <tr>
                        <td>贮存场所</td>
                        <td>
                            <input type="text" name="storage_place" class="form-control input-sm" placeholder="贮存场所">
                        </td>
                        <td>贮存面积（平方米）</td>
                        <td>
                            <input type="text" name="storage_area" class="form-control input-sm" placeholder="贮存面积（平方米）">
                        </td>
                    </tr>
                    <tr>
                        <td>危废容积（立方米）</td>
                        <td>
                            <input type="text" name="waste_volume" class="form-control input-sm" placeholder="危废容积（立方米）">
                        </td>
                        <td>贮存用途</td>
                        <td>
                            <input type="text" name="storage_purpose" class="form-control input-sm" placeholder="贮存用途">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">运输单位</div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed">
                    <tr>
                        <td>运输单位名称</td>
                        <td>
                            <input type="text" name="transport_unit_name" class="form-control input-sm" placeholder="运输单位名称">
                        </td>
                        <td>所在区县</td>
                        <td>
                            <input type="text" name="transport_unit_county" class="form-control input-sm" placeholder="所在区县">
                        </td>
                    </tr>
                    <tr>
                        <td>运输单位地址</td>
                        <td>
                            <input type="text" name="transport_unit_address" class="form-control input-sm" placeholder="运输单位地址">
                        </td>
                        <td>运输单位邮编</td>
                        <td>
                            <input type="text" name="transport_unit_postcode" class="form-control input-sm" placeholder="运输单位邮编">
                        </td>

                    </tr>
                    <tr>
                        <td>运输单位联系人姓名</td>
                        <td>
                            <input type="text" name="transport_unit_contacts_name" class="form-control input-sm" placeholder="运输单位联系人姓名">
                        </td>
                        <td>运输单位联系电话</td>
                        <td>
                            <input type="text" name="transport_unit_contacts_phone" class="form-control input-sm" placeholder="运输单位联系电话">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">接受单位</div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed">
                    <tr>
                        <td>接受单位名称</td>
                        <td>
                            <input type="text" name="reception_unit_name" class="form-control input-sm" placeholder="接受单位名称">
                        </td>
                        <td>所在区县</td>
                        <td>
                            <input type="text" name="reception_unit_county" class="form-control input-sm" placeholder="所在区县">
                        </td>
                    </tr>
                    <tr>
                        <td>接受单位地址</td>
                        <td>
                            <input type="text" name="reception_unit_address" class="form-control input-sm" placeholder="接受单位地址">
                        </td>
                        <td>接受单位邮编</td>
                        <td>
                            <input type="text" name="reception_unit_postcode" class="form-control input-sm" placeholder="接受单位邮编">
                        </td>

                    </tr>
                    <tr>
                        <td>接受单位联系人姓名</td>
                        <td>
                            <input type="text" name="reception_unit_contacts_name" class="form-control input-sm" placeholder="接受单位联系人姓名">
                        </td>
                        <td>接受单位联系电话</td>
                        <td>
                            <input type="text" name="reception_unit_contacts_phone" class="form-control input-sm" placeholder="接受单位联系电话">
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
</center>

<script type="text/javascript">
function ajaxAction(actionID) {
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

    $.ajax({
        type: "post",
        url: "transfer_record_request_form",
        timeout: 2000,
        data: $('#record_request').serialize() + '&record_status=' + actionID,
        /*data: {
            record_status: actionID
        },*/

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