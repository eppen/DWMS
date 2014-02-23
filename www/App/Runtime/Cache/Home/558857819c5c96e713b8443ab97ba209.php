<?php if (!defined('THINK_PATH')) exit();?><div class="panel panel-primary" id="div_map" style="margin-bottom:0px;">
    <div class="panel panel-heading" style="margin-bottom:0px; height:40px;">
        <h3 class="panel-title" style="float:left;">转移地图展示</h3>
        <button type="button" class="btn btn-default btn-xs" id="toFullScreen" onclick="toFullScreen();" style="float:right;">全屏</button>
        <button type="button" class="btn btn-default btn-xs" id="exitFullScreen" onclick="exitFullScreen();" style="float:right;display:none;">退出全屏</button>
    </div>
    <div class="panel panel-body" style="margin-bottom:1px">
        <div class="row" id="div_input-group">
            <div class="col-md-2">当偏移距离大于</div>
            <input type="text" class="col-md-1" id="warningDistance" value="0.5" placeholder="">
            <div class="col-md-3">千米时提醒</div>
            <div class="col-md-1">大于</div>
            <input type="text" class="col-md-1" id="dangerDistance" value="1.0" placeholder="">
            <div class="col-md-2">千米时报警</div>
            <button type="button" class="col-md-1 btn btn-success btn-sm" id="setting" onclick="setting();">设置</button>
        </div>
        <div id="map_container" style="width:auto">地图加载中...</div>
    </div>
</div>

<!-- <script type="text/javascript" src="__PUBLIC__/js/shortestDist.js"></script> -->
<script type="text/javascript" src="__PUBLIC__/js/fullscreen.js"></script>

<script type="text/javascript">
if (typeof(playbackTimeout) != 'undefined') {
    clearTimeout(playbackTimeout);
}

var route_decode_object = new Array();
var markerList = new Array();
var polylineList = new Array();
var messageContent = new Array();
var infoWindowOption = new Array();
var infoWindowContent = new Array();

var warningDistance = 0.5;
var dangerDistance = 1.0;

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
    };
    BaiduMap.setMapStyle(mapStyle);

    BaiduMap.addEventListener("click", function() {
        while (polyline = polylineList.pop()) {
            BaiduMap.removeOverlay(polyline);
        }
    });

    for (var idx in route_json) {
        route_decode_object[idx] = JSON.parse(route_json[idx].route_lng_lat.replace(/&quot;/g, '"'));
    }

    $(".anchorBL").hide();
}

function loadScript() {
    var script = document.createElement("script");
    script.src = "http://api.map.baidu.com/api?v=2.0&ak=KDdzQZSRLv89h4yrti56L5Gy&callback=setBMap";
    document.body.appendChild(script);
}

loadScript();

function transferWarning() {
    $.ajax({
        type: "GET",
        url: "<?php echo U('Home/DistrictMap/ajax_gps_data');?>",
        timeout: 5000,
        success: function(gps_data_array) {
            while (marker = markerList.pop()) {
                BaiduMap.removeOverlay(marker);
            }

            for (var idx in gps_data_array) {
                var lng = gps_data_array[idx].lng;
                var lat = gps_data_array[idx].lat;
                var gps_lng_lat = {
                    "lng": lng,
                    "lat": lat
                };

                //var distance = shortestDist(gps_lng_lat, route_decode_object[idx]);
                var distance = gps_data_array[idx].offset_distance;
                distance = Math.round(distance * 1000) / 1000;

                var iconPoint = new BMap.Point(lng, lat);
                if (distance < warningDistance) {
                    var lorryIcon = new BMap.Icon("__PUBLIC__/image/truck_green.png", new BMap.Size(32, 40), {
                        // 指定定位位置。
                        // 当标注显示在地图上时，其所指向的地理位置距离图标左上
                        // 角各偏移16像素和20像素。您可以看到在本例中该位置即是
                        // 图标中央下端的尖角位置。
                        anchor: new BMap.Size(16, 40),
                        // 设置图片偏移。
                        // 当您需要从一幅较大的图片中截取某部分作为标注图标时，您
                        // 需要指定大图的偏移位置，此做法与css sprites技术类似。
                        imageOffset: new BMap.Size(0, 0) // 设置图片偏移
                    });
                    var warningText = "<p style='color:#00FF00;'>偏离" + distance + "千米，安全。</p>";

                } else if (distance > warningDistance && distance < dangerDistance) {
                    var lorryIcon = new BMap.Icon("__PUBLIC__/image/truck_yellow.png", new BMap.Size(32, 40), {
                        anchor: new BMap.Size(16, 40),
                        imageOffset: new BMap.Size(0, 0) // 设置图片偏移
                    });
                    var warningText = "<p style='color:#FFFF00;'>偏离" + distance + "千米，注意！</p>";
                } else {
                    var lorryIcon = new BMap.Icon("__PUBLIC__/image/truck_red.png", new BMap.Size(32, 40), {
                        anchor: new BMap.Size(16, 40),
                        imageOffset: new BMap.Size(0, 0) // 设置图片偏移
                    });
                    var warningText = "<p style='color:#FF0000;'>偏离" + distance + "千米，报警!</p>";
                }

                // 创建标注对象并添加到地图
                var marker = new BMap.Marker(iconPoint, {
                    icon: lorryIcon,
                    title: "危废运输车辆"
                });
                marker.setTitle(idx);
                BaiduMap.addOverlay(marker);
                markerList.push(marker);

                var geoCoder = new BMap.Geocoder();
                var pointLocation = "";
                geoCoder.getLocation(iconPoint, function(rs) {
                    var addComp = rs.addressComponents;
                    pointLocation = "" + addComp.province + addComp.city + addComp.district + addComp.street + addComp.streetNumber;
                });

                messageContent[idx] = "车辆牌照为：" + join_json[idx].vehicle_num + "的" + join_json[idx].vehicle_type + "，大致位置为：" + pointLocation;

                infoWindowOption[idx] = {
                    width: 0, // 信息窗口宽度
                    height: 0, // 信息窗口高度
                    title: warningText, // 信息窗口标题
                    message: messageContent[idx]
                };
                infoWindowContent[idx] = "<p>运输车辆牌照：" + join_json[idx].vehicle_num + "</p><p>运输车辆类型：" + join_json[idx].vehicle_type + "</p><p>运输单位名称：" + join_json[idx].transport_unit_name + "</p><p>运输单位地址：" + join_json[idx].transport_unit_address + "</p><p>运输单位电话：" + join_json[idx].transport_unit_phone + "</p><p>运输单位环保联系人姓名：" + join_json[idx].transport_unit_contacts_name + "</p><p>运输单位环保联系人电话：" + join_json[idx].transport_unit_contacts_phone;

                marker.addEventListener("click", function(e) {

                    BaiduMap.openInfoWindow(new BMap.InfoWindow(infoWindowContent[this.getTitle() - '0'], infoWindowOption[this.getTitle() - '0']), this.getPosition()); // 打开信息窗口

                });

                marker.addEventListener("rightclick", function(e) {
                    var idx = this.getTitle() - '0';
                    var pointArray = new Array();
                    var lng, lat;
                    for (var pointIdx in route_decode_object[idx]) {
                        lng = route_decode_object[idx][pointIdx].lng;
                        lat = route_decode_object[idx][pointIdx].lat;
                        pointArray.push(new BMap.Point(lng, lat));
                    }
                    var polyline = new BMap.Polyline(pointArray, {
                        strokeColor: "blue",
                        strokeWeight: 5, // 折线的宽度，以像素为单位。
                        strokeOpacity: 0.8 // 折线的透明度，取值范围0 - 1。
                    });
                    BaiduMap.addOverlay(polyline);
                    polylineList.push(polyline);

                });
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log("获取 GPS数据 失败");
            console.log("Error:Ajax_Content_Load" + errorThrown);
            console.log("XMLHttpRequest.status:" + XMLHttpRequest.status);
            console.log("XMLHttpRequest.readyState:" + XMLHttpRequest.readyState);
            console.log("textStatus:" + textStatus);
        }
    });
}

transferWarning();
var intervalWarning = setInterval("transferWarning()", 15000);

function setting() {
    if ($('#warningDistance').val() == null) {
        warningDistance = 0.5;
    } else {
        warningDistance = $('#warningDistance').val();
    }
    if ($('#dangerDistance').val() == null) {
        dangerDistance = 1.0;
    } else {
        dangerDistance = $('#dangerDistance').val();
    }
}
</script>