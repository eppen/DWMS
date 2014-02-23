<?php if (!defined('THINK_PATH')) exit();?><div class="panel panel-primary" style="margin-bottom:0px;">
    <div class="panel panel-heading" style="margin-bottom:0px; height:40px;">
        <h3 class="panel-title" style="float:left;">转移路线查询</h3>
        <button type="button" class="btn btn-default btn-xs" id="toFullScreen" onclick="toFullScreen();" style="float:right;">全屏</button>
        <button type="button" class="btn btn-default btn-xs" id="exitFullScreen" onclick="exitFullScreen();" style="float:right;display:none;">退出全屏</button>
    </div>
    <div class="panel panel-body" style="margin-bottom:1px">
        <div id="noSelectionAlert"></div>
        <div class="row">
            <div class="col-md-3">
                <label class="sr-only" for="selectProductionUnit">产生单位：</label>
                <select class="form-control input-sm" id="selectProductionUnit">
                    <option>请选择生产单位</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="sr-only" for="selectReceptionUnit">接受单位：</label>
                <select class="form-control input-sm" id="selectReceptionUnit">
                    <option>请选择接受单位</option>
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-info btn-sm" id="searchRoute" onclick="searchRoute();">查询</button>
            </div>
            <div class="col-md-2">
                <button class="btn btn-danger btn-sm" id="deleteRoute" onclick="deleteRoute();">删除</button>
            </div>
        </div>
        <div id="map_container" style="width:auto">地图加载中...</div>
    </div>
</div>

<script type="text/javascript" src="__PUBLIC__/js/myAlert.js"></script>

<script type="text/javascript">
if (typeof(intervalWarning) != 'undefined') {
    clearInterval(intervalWarning);
}

function setBMap() {
    var windowHeight = $(window).height();
    $("#map_container").css("height", "" + windowHeight - 350 + "px");

    BaiduMap = new BMap.Map("map_container"); // 创建Map实例
    BaiduMap.centerAndZoom("上海", 13); // 初始化地图,设置中心点坐标和地图级别
    BaiduMap.addControl(new BMap.NavigationControl()); // 添加默认缩放平移控件
    BaiduMap.addControl(new BMap.ScaleControl()); // 添加默认比例尺控件
    BaiduMap.addControl(new BMap.OverviewMapControl()); //添加默认缩略地图控件
    BaiduMap.enableScrollWheelZoom(); //启用滚轮放大缩小
    BaiduMap.addControl(new BMap.MapTypeControl()); // 添加默认地图控件
    BaiduMap.setCurrentCity("上海"); // 设置地图显示的城市 此项是必须设置的
    var mapStyle = {
        features: ["road", "building", "water", "land", "point"],
        style: "normal"
    };
    BaiduMap.setMapStyle(mapStyle);

    for (var idx in production_unit_json) {
        $('#selectProductionUnit').append('<option id="" value="' + idx + '">' + production_unit_json[idx] + '</option>');
    }
    for (var idx in reception_unit_json) {
        $('#selectReceptionUnit').append('<option id="" value="' + idx + '">' + reception_unit_json[idx] + '</option>');
    }
}

function loadScript() {
    var script = document.createElement("script");
    script.src = "http://api.map.baidu.com/api?v=2.0&ak=KDdzQZSRLv89h4yrti56L5Gy&callback=setBMap";
    document.body.appendChild(script);
}

loadScript();

function searchRoute() {
    $.ajax({
        type: 'post',
        url: "<?php echo U('Home/DistrictMap/ajax_search_route');?>",
        dataType: 'json',
        data: {
            "production_unit_id": $('#selectProductionUnit').val(),
            "reception_unit_id": $('#selectReceptionUnit').val()
        },
        success: function(route_json) {
            BaiduMap.clearOverlays();
            if (route_json == 'fail') {
                myAlertFail("此生产单位至此接受单位的路线不存在，请先规划")
            } else {
                var route_object = JSON.parse(route_json);
                route_id = route_object.route_id;
                var route_decode = route_object.route_lng_lat.replace(/&quot;/g, '"');
                var route_decode_object = JSON.parse(route_decode);
                var pointArray = new Array();
                var lng, lat;
                for (var pointIdx in route_decode_object) {
                    lng = route_decode_object[pointIdx].lng;
                    lat = route_decode_object[pointIdx].lat;
                    pointArray.push(new BMap.Point(lng, lat));
                }
                var polyline = new BMap.Polyline(pointArray, {
                    strokeColor: "blue",
                    strokeWeight: 6,
                    strokeOpacity: 0.8
                });
                BaiduMap.addOverlay(polyline);
            }

            $(".anchorBL").hide();
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            myAlertFail("获取路线失败");
            console.log("Error:Ajax_Content_Load" + errorThrown);
            console.log("XMLHttpRequest.status:" + XMLHttpRequest.status);
            console.log("XMLHttpRequest.readyState:" + XMLHttpRequest.readyState);
            console.log("textStatus:" + textStatus);
        }
    });
}

function deleteRoute() {
    $.ajax({
        type: 'post',
        url: "<?php echo U('Home/DistrictMap/ajax_delete_route');?>",
        dataType: 'json',
        data: {
            "route_id": route_id
        },
        success: function(data) {
            if (data == "success") {
                myAlertSucc("删除成功");
                BaiduMap.clearOverlays();
            } else {
                myAlertFail("删除失败");
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            myAlertFail("删除路线失败");
            console.log("Error:Ajax_Content_Load" + errorThrown);
            console.log("XMLHttpRequest.status:" + XMLHttpRequest.status);
            console.log("XMLHttpRequest.readyState:" + XMLHttpRequest.readyState);
            console.log("textStatus:" + textStatus);
        }

    })
}

</script>