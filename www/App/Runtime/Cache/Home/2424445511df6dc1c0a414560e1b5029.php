<?php if (!defined('THINK_PATH')) exit();?><div class="panel panel-primary">
    <div class="panel-heading">
        <?php echo ($unit["reception_unit_name"]); ?>企业基本信息变更
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <form class="form-horizontal" role="form">
                <table class="table table-hover table-striped table-bordered table-condensed">
                    <!-- <caption>企业基本信息</caption> -->
                    <tr>
                        <td>处置单位编号</td>
                        <td><?php echo ($unit["reception_unit_id"]); ?></td>
                        <td>处置单位乡镇街道</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["reception_unit_street"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>处置单位名称</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["reception_unit_name"]); ?>">
                        </td>
                        <td>处置单位注册类型</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["reception_unit_registration_type"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>处置单位用户名称</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["reception_unit_username"]); ?>">
                        </td>
                        <td>处置单位企业规模</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["reception_unit_enterprise_scale"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>处置单位组织机构代码</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["reception_unit_code"]); ?>">
                        </td>
                        <td>处置单位环保联系人姓名</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["reception_unit_contacts_name"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>处置单位电话</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["reception_unit_phone"]); ?>">
                        </td>
                        <td>处置单位环保联系人电话</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["reception_unit_contacts_phone"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>处置单位地址</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["reception_unit_address"]); ?>">
                        </td>
                        <td>处置单位法人代码</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["reception_unit_legal_person_code"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>处置单位邮编</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["reception_unit_postcode"]); ?>">
                        </td>
                        <td>处置单位法人姓名</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["reception_unit_legal_person_name"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>处置单位法人电话</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["reception_unit_legal_person_phone"]); ?>">
                        </td>
                        <td>处置单位邮箱</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["reception_unit_email"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>处置单位所属行业</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["reception_unit_trade"]); ?>">
                        </td>
                        <td>处置单位传真</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["reception_unit_fax"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>处置单位中心经度</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["reception_unit_longitude"]); ?>">
                        </td>
                        <td>处置单位中心纬度</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["reception_unit_latitude"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>运输单位许可证编号</td>
                        <td>
                            <input type="text" value="<?php echo ($unit["reception_unit_license_num"]); ?>">
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
            </form>
        </div>
    </div>
</div>