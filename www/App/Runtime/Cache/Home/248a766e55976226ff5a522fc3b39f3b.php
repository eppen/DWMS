<?php if (!defined('THINK_PATH')) exit();?><div class="panel panel-primary">
    <div class="panel-heading">
        <?php echo ($unit["production_unit_name"]); ?>企业基本信息
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <!-- <caption>企业基本信息</caption> -->
                <tr>
                    <td>产生单位名称</td>
                    <td><?php echo ($unit["production_unit_name"]); ?></td>
                    <td>产生单位乡镇街道</td>
                    <td><?php echo ($unit["production_unit_street"]); ?></td>
                </tr>
                <tr>
                    <td>产生单位所属行业</td>
                    <td><?php echo ($unit["production_unit_trade"]); ?></td>
                    <td>产生单位注册类型</td>
                    <td><?php echo ($unit["production_unit_registration_type"]); ?></td>
                </tr>
                <tr>
                    <td>产生单位用户名称</td>
                    <td><?php echo ($unit["production_unit_username"]); ?></td>
                    <td>产生单位企业规模</td>
                    <td><?php echo ($unit["production_unit_enterprise_scale"]); ?></td>
                </tr>
                <tr>
                    <td>产生单位组织机构代码</td>
                    <td><?php echo ($unit["production_unit_code"]); ?></td>
                    <td>产生单位环保联系人姓名</td>
                    <td><?php echo ($unit["production_unit_contacts_name"]); ?></td>
                </tr>
                <tr>
                    <td>产生单位电话</td>
                    <td><?php echo ($unit["production_unit_phone"]); ?></td>
                    <td>产生单位环保联系人电话</td>
                    <td><?php echo ($unit["production_unit_contacts_phone"]); ?></td>
                </tr>
                <tr>
                    <td>产生单位地址</td>
                    <td><?php echo ($unit["production_unit_address"]); ?></td>
                    <td>产生单位法人代码</td>
                    <td><?php echo ($unit["production_unit_legal_person_code"]); ?></td>
                </tr>
                <tr>
                    <td>产生单位邮编</td>
                    <td><?php echo ($unit["production_unit_postcode"]); ?></td>
                    <td>产生单位法人姓名</td>
                    <td><?php echo ($unit["production_unit_legal_person_name"]); ?></td>
                </tr>
                <tr>
                    <td>产废设施所在地</td>
                    <td><?php echo ($unit["waste_location"]); ?></td>
                    <td>产生单位法人电话</td>
                    <td><?php echo ($unit["production_unit_legal_person_phone"]); ?></td>
                </tr>
                <tr>
                    <td>产废设施所属区县</td>
                    <td><?php echo ($unit["waste_location_county"]); ?></td>
                    <td>产生单位传真</td>
                    <td><?php echo ($unit["production_unit_fax"]); ?></td>
                </tr>
                <tr>
                    <td>产废设施所在区县代码</td>
                    <td><?php echo ($unit["waste_location_county_code"]); ?></td>
                    <td>产生单位邮箱</td>
                    <td><?php echo ($unit["production_unit_email"]); ?></td>
                </tr>
                <tr>
                    <td>产生单位管辖权属</td>
                    <td><?php echo ($jurisdiction_name); ?></td>
                    <td>产生单位中心经度</td>
                    <td><?php echo ($unit["production_unit_longitude"]); ?></td>
                </tr>
                <tr>
                    
                    <td>产生单位中心纬度</td>
                    <td><?php echo ($unit["production_unit_latitude"]); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>