<?php if (!defined('THINK_PATH')) exit();?><div class="panel panel-primary">
    <div class="panel-heading">
        <?php echo ($unit["production_unit_name"]); ?>企业基本信息变更
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <form class="form-horizontal" role="form" method="post" id="changeform"
             action="<?php echo U('Home/ProductionBasic/change',array('id'=>'production'));?>">
                <table class="table table-hover table-striped table-bordered table-condensed">
                    <!-- <caption>企业基本信息</caption> -->
                    <tr>
                        <td>产生单位编号</td>
                        <td><?php echo ($unit["production_unit_id"]); ?></td>
                        <td>产生单位乡镇街道</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["production_unit_street"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>产生单位名称</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["production_unit_name"]); ?>">
                        </td>
                        <td>产生单位注册类型</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["production_unit_registration_type"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>产生单位用户名称</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["production_unit_username"]); ?>">
                        </td>
                        <td>产生单位企业规模</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["production_unit_enterprise_scale"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>产生单位组织机构代码</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["production_unit_code"]); ?>">
                        </td>
                        <td>产生单位环保联系人姓名</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["production_unit_contacts_name"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>产生单位电话</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["production_unit_phone"]); ?>">
                        </td>
                        <td>产生单位环保联系人电话</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["production_unit_contacts_phone"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>产生单位地址</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["production_unit_address"]); ?>">
                        </td>
                        <td>产生单位法人代码</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["production_unit_legal_person_code"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>产生单位邮编</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["production_unit_postcode"]); ?>">
                        </td>
                        <td>产生单位法人姓名</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["production_unit_legal_person_name"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>产废设施所在地</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["waste_location"]); ?>">
                        </td>
                        <td>产生单位法人电话</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["production_unit_legal_person_phone"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>产废设施所属区县</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["waste_location_county"]); ?>">
                        </td>
                        <td>产生单位传真</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["production_unit_fax"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>产废设施所在区县代码</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["waste_location_county_code"]); ?>">
                        </td>
                        <td>产生单位邮箱</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["production_unit_email"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>产生单位管辖权属</td>
                        <td>
                            <input type="text" value="<?php echo ($jurisdiction_name); ?>">
                        </td>
                        <td>产生单位中心经度</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["production_unit_longitude"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>产生单位所属行业</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["production_unit_trade"]); ?>">
                        </td>
                        <td>产生单位中心纬度</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["production_unit_latitude"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    企业信息变更原因
                                </div>
                                <div class="panel-body">
                                    <textarea multiple class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
                 <center>
                        <button type="submit" class="btn btn-warning btn-lg">提交</button>
                 </center>
            </form>
        </div>
    </div>
</div>