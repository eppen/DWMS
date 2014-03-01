<?php if (!defined('THINK_PATH')) exit();?><!-- Modal -->
<div class="modal fade" id="myModal_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">转移联单修改</h4>
            </div>
            <div class="modal-body" id="model-content">
    <div class="panel panel-primary">
        <div class="panel-heading">RFID 列表</div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="rfid_form" class="table table-striped table-bordered table-hover table-condensed">
                    
                </table>
            </div>
        </div>
    </div>

<center>
    <button class="btn btn-info btn-lg" id="button_save_1" data-loading-text="正在保存..." data-complete-text="保存成功！" onclick="ajaxAction_1()">保存</button>
    <button class="btn btn-info btn-lg" onclick="$('#myModal_1').modal('hide');">关闭页面</button>
</center>
            </div>
            <div class="modal-footer"></div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script type="text/javascript" src="__PUBLIC__/js/yourAlert.js"></script>

<form role="form" id="record_modify">
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
                            <input type="text" name="record_type" class="form-control input-sm required-cn" placeholder="<?php echo ($record["record_type"]); ?>" value="<?php echo ($record["record_type"]); ?>">
                        </td>
                        <td>转移日期</td>
                        <td>
                            <input type="date" name="record_date" class="form-control input-sm required-cn" placeholder="<?php echo ($record["record_date"]); ?>" value="<?php echo ($record["record_date"]); ?>">
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


</form>
                    
<div class="panel panel-primary">
        <div class="panel-heading">RFID 标签选择</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table type="submit" class="table table-striped table-bordered table-hover table-condensed">
                    <tr>
                        <td><button class="btn btn-primary" data-toggle="modal" data-target="#myModal_1"> 请点击选择需要运输的危废</button></td><td></td>
                    </tr>
                    <tr>
                        <td>预计危废重量（公斤）</td>
                        <td id="weight_content">
                            <?php echo ($record["predict_output_weight"]); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>预计危废数量（个）</td>
                        <td id="num_content">
                            <?php echo ($record["predict_output_quantity"]); ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<form role="form" id="record_modify_1">
        <div class="panel panel-primary">
        <div class="panel-heading">工艺方法</div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed">
                    <tr>
                        <td>工艺序号</td>
                        <td>
                            <input type="text" name="technology_code" class="form-control input-sm" placeholder="<?php echo ($record["technology_code"]); ?>" value="<?php echo ($record["technology_code"]); ?>">

                        </td>
                        <td>工艺方法</td>
                        <td>
                            <input type="text" name="technology_method" class="form-control input-sm" placeholder="<?php echo ($record["technology_method"]); ?>" value="<?php echo ($record["technology_method"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>相关产品</td>
                        <td>
                            <input type="text" name="relational_production" class="form-control input-sm" placeholder="<?php echo ($record["relational_production"]); ?>" value="<?php echo ($record["relational_production"]); ?>">
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
                            <input type="text" name="waste_name" class="form-control input-sm" placeholder="<?php echo ($record["waste_name"]); ?>" value="<?php echo ($record["waste_name"]); ?>">
                        </td>
                        <td>主要废物形态</td>
                        <td>
                            <select type="text" name="waste_form" class="form-control input-sm" placeholder="<?php echo ($record["waste_form"]); ?>" value="<?php echo ($record["waste_form"]); ?>">
                            <option><?php echo ($record["waste_form"]); ?></option>
                            <option>半固态</option>
                            <option>固态</option>
                            <option>液态</option>
                            <option>气态</option>
                            <option>其他</option>
                            </select>  
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
                            <input type="text" name="storage_place" class="form-control input-sm" placeholder="<?php echo ($record["storage_place"]); ?>" value="<?php echo ($record["storage_place"]); ?>">
                        </td>
                        <td>贮存面积（平方米）</td>
                        <td>
                            <input type="text" name="storage_area" class="form-control input-sm number-cn" placeholder="<?php echo ($record["storage_area"]); ?>" value="<?php echo ($record["storage_area"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>危废容积（立方米）</td>
                        <td>
                            <input type="text" name="waste_volume" class="form-control input-sm number-cn" placeholder="<?php echo ($record["waste_volume"]); ?>" value="<?php echo ($record["waste_volume"]); ?>">
                        </td>
                        <td>贮存用途</td>
                        <td>
                            <input type="text" name="storage_purpose" class="form-control input-sm" placeholder="<?php echo ($record["storage_purpose"]); ?>" value="<?php echo ($record["storage_purpose"]); ?>">
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
                            <!-- <input type="text" name="transport_unit_name" class="form-control input-sm" placeholder="<?php echo ($transport_unit["transport_unit_name"]); ?>" value="<?php echo ($transport_unit["transport_unit_name"]); ?>">
                             //need to change later   --> 
                            <select type="text" id="transport_unit_id" name="transport_unit_id" class="form-control input-sm required-cn" placeholder="<?php echo ($transport_unit["transport_unit_name"]); ?>" onchange="transport_select(this.options[this.options.selectedIndex].value)">
                                <option value="<?php echo ($transport_unit["transport_unit_id"]); ?>"><?php echo ($transport_unit["transport_unit_name"]); ?></option>
                            </select>

                        </td>
                        <td>所在区县</td>
                        <td id="transport_unit_county">
                            <?php echo ($transport_unit["transport_unit_county"]); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>运输单位地址</td>
                        <td id="transport_unit_address">
                            <?php echo ($transport_unit["transport_unit_address"]); ?>
                        </td>
                        <td>运输单位邮编</td>
                        <td id="transport_unit_postcode">
                            <?php echo ($transport_unit["transport_unit_postcode"]); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>运输单位联系人姓名</td>
                        <td id="transport_unit_contacts_name">
                            <?php echo ($transport_unit["transport_unit_contacts_name"]); ?>
                        </td>
                        <td>运输单位联系电话</td>
                        <td id="transport_unit_contacts_phone">
                            <?php echo ($transport_unit["transport_unit_contacts_phone"]); ?>
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
                          <!--   <input type="text" name="reception_unit_name" class="form-control input-sm" placeholder="<?php echo ($reception_unit["reception_unit_name"]); ?>" value="<?php echo ($reception_unit["reception_unit_name"]); ?>">
 -->
                            <select type="text" id="reception_unit_id" name="reception_unit_id" class="form-control input-sm required-cn" placeholder="<?php echo ($reception_unit["reception_unit_name"]); ?>" onchange="reception_select(this.options[this.options.selectedIndex].value)">
                                <option value="<?php echo ($reception_unit["reception_unit_id"]); ?>"><?php echo ($reception_unit["reception_unit_name"]); ?></option>
                            </select>
                        </td>
                        <td>所在区县</td>
                        <td id="reception_unit_county">
                            <?php echo ($reception_unit["reception_unit_county"]); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>接受单位地址</td>
                        <td id="reception_unit_address">
                            <?php echo ($reception_unit["reception_unit_address"]); ?>
                        </td>
                        <td>接受单位邮编</td>
                        <td id="reception_unit_postcode">
                            <?php echo ($reception_unit["reception_unit_postcode"]); ?>
                        </td>

                    </tr>
                    <tr>
                        <td>接受单位联系人姓名</td>
                        <td id="reception_unit_contacts_name">
                            <?php echo ($reception_unit["reception_unit_contacts_name"]); ?>
                        </td>
                        <td>接受单位联系电话</td>
                        <td id="reception_unit_contacts_phone">
                            <?php echo ($reception_unit["reception_unit_contacts_phone"]); ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</form>

<center>
    <button class="btn btn-warning btn-lg" onclick="ajaxAction()">修改备案</button>
    <button class="btn btn-primary btn-lg" onclick="$('#myModal').modal('hide');">关闭页面</button>
</center>
<script type="text/javascript" src="__PUBLIC__/js/jquery-validate.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jquery-myvalidate.js"></script>
<script type="text/javascript">
$('#record_modify').validate();
var rfid_table_id = "";
var weight = 0.0;
var num = 0.0; 
var r_length=reception_unit_list.length;
var t_length=transport_unit_list.length;
// console.log(reception_unit_list);
// $('#transport_unit_id').html('<option>haha</option>');
for (var idx in transport_unit_list) {
    if (transport_unit_list[idx].transport_unit_id=="<?php echo ($transport_unit["transport_unit_id"]); ?>")
        continue;
$('#transport_unit_id').append('<option value="' + transport_unit_list[idx].transport_unit_id + '">' + transport_unit_list[idx].transport_unit_name + '</option>');
    }

// $('#reception_unit_id').html('<option>hehe</option>');
for (var idx in reception_unit_list) {
    if (reception_unit_list[idx].reception_unit_id=="<?php echo ($reception_unit["reception_unit_id"]); ?>")
        continue;
$('#reception_unit_id').append('<option value="' + reception_unit_list[idx].reception_unit_id + '">' + reception_unit_list[idx].reception_unit_name + '</option>');
    }   

function transport_select(transport_unit_id){
    // console.log(transport_unit_id);
     var index=transport_unit_id;
    for (var i=0;i<t_length;i++)
    {
        if (transport_unit[i].transport_unit_id==transport_unit_id)
            {index=i;break;}
    }
    $('#transport_unit_county').html(transport_unit[index].transport_unit_county);
    $('#transport_unit_address').html(transport_unit[index].transport_unit_address);
    $('#transport_unit_postcode').html(transport_unit[index].transport_unit_postcode);
    $('#transport_unit_contacts_name').html(transport_unit[index].transport_unit_contacts_name);
    $('#transport_unit_contacts_phone').html(transport_unit[index].transport_unit_contacts_phone);
    
}

function reception_select(reception_unit_id){
    // console.log(reception_unit_id);
    var index=reception_unit_id;
    for (var i=0;i<r_length;i++)
    {
        if (reception_unit[i].reception_unit_id==reception_unit_id)
            {index=i;break;}
    }
    $('#reception_unit_county').html(reception_unit[index].reception_unit_county);
    $('#reception_unit_address').html(reception_unit[index].reception_unit_address);
    $('#reception_unit_postcode').html(reception_unit[index].reception_unit_postcode);
    $('#reception_unit_contacts_name').html(reception_unit[index].reception_unit_contacts_name);
    $('#reception_unit_contacts_phone').html(reception_unit[index].reception_unit_contacts_phone);
    
}

function ajaxAction() {
    if(!$('#record_modify').valid()){
        return;}
    var form_serialize = "" + $('#record_modify').serialize() + '&' + $('#record_modify_1').serialize() + '&rfid_table_id=' + rfid_table_id + '&predict_output_quantity=' + num + '&predict_output_weight=' + weight;
    console.log(form_serialize);
    $("#model-content").html('<center style="margin:50px"><h4>提交中...</h4><div class="progress progress-striped active" style="width: 50%"><div class="progress-bar"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div></center>');

    $.ajax({
        type: "post",
        url: "transfer_record_query_modified?record_id=" + record_id_json,
        timeout: 2000,
        data: form_serialize + '&record_status_old=' + record_status_json,
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
$('#rfid_form').html('<tr><td>请选择 RFID 标签</td><td>包装方式</td><td>重量/数量</td></tr>');
for (var idx in rfid) {
    if(rfid[idx].add_method == "0"){
        $('#rfid_form').append('<tr><td><input type="checkbox" id="' + idx + '" name="' + rfid[idx].add_method + '" value="' + rfid[idx].waste_total + '">' + rfid[idx].rfid_id + '</td><td>桶装</td><td>' + rfid[idx].waste_total + '</td></tr>');
    } else{
        $('#rfid_form').append('<tr><td><input type="checkbox" id="' + idx + '" name="' + rfid[idx].add_method + '" value="' + rfid[idx].waste_total + '">' + rfid[idx].rfid_id + '</td><td>袋装</td><td>' + rfid[idx].waste_total + '</td></tr>');
    }
}
function ajaxAction_1() {
    $('#button_save_1').button('loading');

    var selected_1=document.getElementsByName("0"); 
    weight = 0.0;
    for(var i=0;i <selected_1.length;i++){ 
      if(selected_1[i].checked==true){ 
          weight = parseFloat(selected_1[i].value) + weight;  
          rfid_table_id=rfid_table_id+rfid[selected_1[i].id].rfid_id + ",";    
        } 
    }
    
    var selected_2=document.getElementsByName("1"); 
    num = 0.0;
    for(var i=0;i <selected_2.length;i++){ 
      if(selected_2[i].checked==true){ 
          num = parseFloat(selected_2[i].value) + num;
          rfid_table_id=rfid_table_id+rfid[selected_2[i].id].rfid_id + ",";     
        } 
    }

    $('#button_save_1').button('complete');
    setTimeout("$('#button_save_1').button('reset')", 3000);
    $('#myModal_1').modal('hide');

    $('#weight_content').html(weight);
    $('#num_content').html(num);
    
}

</script>