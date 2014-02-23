<?php if (!defined('THINK_PATH')) exit();?><div class="panel panel-primary" style="margin-bottom:0px;">
    <div class="panel panel-heading" style="margin-bottom:0px; height:40px;">
        <h3 class="panel-title" style="float:left;">仓库地图展示</h3>
        <button type="button" class="btn btn-default btn-xs" id="toFullScreen" onclick="toFullScreen();" style="float:right;">全屏</button>
        <button type="button" class="btn btn-default btn-xs" id="exitFullScreen" onclick="exitFullScreen();" style="float:right;display:none;">退出全屏</button>
    </div>
    <div class="panel-body">
        <div class="row" id="div_input-group">
            <div class="col-md-3">
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="checkbox" name="checkbox" checked="true" id="productionUnit" onclick="">
                    </span>
                    <span class="form-control  input-sm">
                        &nbsp; 生产单位
                    </span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="checkbox" name="checkbox" checked="true" id="receptionUnit" onclick="">
                    </span>
                    <span class="form-control input-sm">
                        &nbsp; 接受单位
                    </span>
                </div>
            </div>
        </div>
        <div id="map_container" style="width:auto">地图加载中...</div>
    </div>
</div>

<script type="text/javascript" src="__PUBLIC__/js/fullscreen.js"></script>

<script type="text/javascript">
if (typeof(intervalWarning) != 'undefined') {
    clearInterval(intervalWarning);
}

var markerList_p = new Array();
var messageContent_p = new Array();
var infoWindowOption_p = new Array();
var infoWindowContent_p = new Array();

var markerList_r = new Array();
var messageContent_r = new Array();
var infoWindowOption_r = new Array();
var infoWindowContent_r = new Array();

function setBMap() {
    var windowHeight = $(window).height();
    $("#map_container").css("height", "" + windowHeight - 350 + "px");

    BaiduMap = new BMap.Map("map_container"); // 创建Map实例
    BaiduMap.centerAndZoom("上海", 11); // 初始化地图,设置中心点坐标和地图级别
    BaiduMap.addControl(new BMap.NavigationControl()); // 添加默认缩放平移控件
    BaiduMap.addControl(new BMap.ScaleControl()); // 添加默认比例尺控件
    BaiduMap.addControl(new BMap.OverviewMapControl()); //添加默认缩略地图控件
    BaiduMap.enableScrollWheelZoom(); //启用滚轮放大缩小
    BaiduMap.addControl(new BMap.MapTypeControl()); // 添加默认地图控件
    BaiduMap.setCurrentCity("上海"); // 设置地图显示的城市 此项是必须设置的
    var mapStyle = {
        features: ["road", "building", "water", "land", "point"],
        style: "light"
    }
    BaiduMap.setMapStyle(mapStyle);

    for (var idx in production_unit_json) {
        var iconPoint = new BMap.Point(production_unit_json[idx].production_unit_longitude, production_unit_json[idx].production_unit_latitude);
        var productionUnitIcon = new BMap.Icon("__PUBLIC__/image/02green_48.png", new BMap.Size(48, 48), {
            // 指定定位位置。
            // 当标注显示在地图上时，其所指向的地理位置距离图标左上
            // 角各偏移16像素和20像素。您可以看到在本例中该位置即是
            // 图标中央下端的尖角位置。
            anchor: new BMap.Size(24, 24),
            // 设置图片偏移。
            // 当您需要从一幅较大的图片中截取某部分作为标注图标时，您
            // 需要指定大图的偏移位置，此做法与css sprites技术类似。
            imageOffset: new BMap.Size(0, 0) // 设置图片偏移
        });
        // 创建标注对象并添加到地图
        var marker = new BMap.Marker(iconPoint, {
            icon: productionUnitIcon,
            title: "危废产生单位"
        });
        marker.setTitle(idx);
        BaiduMap.addOverlay(marker);
        markerList_p.push(marker);

        var geoCoder = new BMap.Geocoder();
        var pointLocation = "";
        geoCoder.getLocation(iconPoint, function(rs) {
            var addComp = rs.addressComponents;
            pointLocation = "" + addComp.province + addComp.city + addComp.district + addComp.street + addComp.streetNumber;
        });

        messageContent_p[idx] = "生产单位名称：" + production_unit_json[idx].production_unit_name + "，大致位置为：" + pointLocation;

        infoWindowOption_p[idx] = {
            width: 0, // 信息窗口宽度
            height: 0, // 信息窗口高度
            // title: "", // 信息窗口标题
            message: messageContent_p[idx]
        };
        infoWindowContent_p[idx] = "<p>生产单位名称：" + production_unit_json[idx].production_unit_name + "</p><p>生产单位电话：" + production_unit_json[idx].production_unit_phone + "</p><p>生产单位地址：" + production_unit_json[idx].production_unit_address + "</p><p>环保联系人姓名：" + production_unit_json[idx].production_unit_contacts_name + "</p><p>环保联系人电话：" + production_unit_json[idx].production_unit_contacts_phone;

        marker.addEventListener("click", function(e) {

            BaiduMap.openInfoWindow(new BMap.InfoWindow(infoWindowContent_p[this.getTitle() - '0'], infoWindowOption_p[this.getTitle() - '0']), this.getPosition()); // 打开信息窗口

        });
    }

    for (var idx in reception_unit_json) {
        var iconPoint = new BMap.Point(reception_unit_json[idx].reception_unit_longitude, reception_unit_json[idx].reception_unit_latitude);
        var receptionUnitIcon = new BMap.Icon("__PUBLIC__/image/04yellow_48.png", new BMap.Size(48, 48), {
            // 指定定位位置。
            // 当标注显示在地图上时，其所指向的地理位置距离图标左上
            // 角各偏移16像素和20像素。您可以看到在本例中该位置即是
            // 图标中央下端的尖角位置。
            anchor: new BMap.Size(24, 24),
            // 设置图片偏移。
            // 当您需要从一幅较大的图片中截取某部分作为标注图标时，您
            // 需要指定大图的偏移位置，此做法与css sprites技术类似。
            imageOffset: new BMap.Size(0, 0) // 设置图片偏移
        });
        // 创建标注对象并添加到地图
        var marker = new BMap.Marker(iconPoint, {
            icon: receptionUnitIcon,
            title: "危废接受单位"
        });
        marker.setTitle(idx);
        BaiduMap.addOverlay(marker);
        markerList_r.push(marker);

        var geoCoder = new BMap.Geocoder();
        var pointLocation = "";
        geoCoder.getLocation(iconPoint, function(rs) {
            var addComp = rs.addressComponents;
            pointLocation = "" + addComp.province + addComp.city + addComp.district + addComp.street + addComp.streetNumber;
        });

        messageContent_r[idx] = "生产单位名称：" + reception_unit_json[idx].reception_unit_name + "，大致位置为：" + pointLocation;

        infoWindowOption_r[idx] = {
            width: 0, // 信息窗口宽度
            height: 0, // 信息窗口高度
            // title: "", // 信息窗口标题
            message: messageContent_r[idx]
        };
        infoWindowContent_r[idx] = "<p>生产单位名称：" + reception_unit_json[idx].reception_unit_name + "</p>";

        marker.addEventListener("click", function(e) {

            BaiduMap.openInfoWindow(new BMap.InfoWindow(infoWindowContent_r[this.getTitle() - '0'], infoWindowOption_r[this.getTitle() - '0']), this.getPosition()); // 打开信息窗口

        });
    }

    $(".anchorBL").hide();
}

function loadScript() {
    var script = document.createElement("script");
    script.src = "http://api.map.baidu.com/api?v=2.0&ak=KDdzQZSRLv89h4yrti56L5Gy&callback=setBMap";
    document.body.appendChild(script);
}

loadScript();

$('#productionUnit').on('click', function() {
    if ($(this).is(':checked')) {
        for (var idx in markerList_p) {
            // BaiduMap.addOverlay(markerList_p[idx]);
            markerList_p[idx].show();
        }
    } else {
        for (var idx in markerList_p) {
            // BaiduMap.removeOverlay(markerList_p[idx]);
            markerList_p[idx].hide();
        }
    }
});

$('#receptionUnit').on('click', function() {
    if ($(this).is(':checked')) {
        for (var idx in markerList_r) {
            // BaiduMap.addOverlay(markerList_r[idx]);
            markerList_r[idx].show();
        }
    } else {
        for (var idx in markerList_r) {
            // BaiduMap.removeOverlay(markerList_r[idx]);
            markerList_r[idx].hide();
        }
    }
});
</script>