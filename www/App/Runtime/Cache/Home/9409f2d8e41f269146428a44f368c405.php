<?php if (!defined('THINK_PATH')) exit();?><div class="panel panel-primary" style="margin-bottom:0px;">
    <div class="panel panel-heading" style="margin-bottom:0px; height:40px;">
        <h3 class="panel-title" style="float:left;">运输路线规划</h3>
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
                <label class="sr-only" for="selectStrategy">驾车策略：</label>
                <select class="form-control input-sm" id="selectStrategy">
                    <option value="0">最小时间</option>
                    <option value="1">最短距离</option>
                    <option value="2">避开高速</option>
                </select>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-info btn-sm" onclick="search();">查询</button>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-warning btn-sm" id="clearButton" onclick="BaiduMap.clearOverlays();">清除</button>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-success btn-sm" onclick="submit();">提交</button>
            </div>
        </div>
        <div id="map_container" style="width:auto"></div>
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

    var selectProductionUnit = $('#selectProductionUnit');
    for (var idx in production_unit_json) {
        selectProductionUnit.append('<option id="" value="' + production_unit_json[idx].production_unit_id + '">' + production_unit_json[idx].production_unit_name + '</option>');
    }
    var selectReceptionUnit = $('#selectReceptionUnit');
    for (var idx in reception_unit_json) {
        selectReceptionUnit.append('<option id="" value="' + reception_unit_json[idx].reception_unit_id + '">' + reception_unit_json[idx].reception_unit_name + '</option>');
    }

    $(".anchorBL").hide();
}

function loadScript() {
    var script = document.createElement("script");
    script.src = "http://api.map.baidu.com/api?v=2.0&ak=KDdzQZSRLv89h4yrti56L5Gy&callback=setBMap";
    document.body.appendChild(script);
}

loadScript();

var path = new Array();
var route_detail = '';
var p1, p2;
var routePolicy = [BMAP_DRIVING_POLICY_LEAST_TIME, BMAP_DRIVING_POLICY_LEAST_DISTANCE, BMAP_DRIVING_POLICY_AVOID_HIGHWAYS];

var searchComplete = function(results) {
    path = [];
    route_detail = '';
    if (transit.getStatus() == BMAP_STATUS_SUCCESS) { //检索成功。对应数值“0”。
        // 获取第一个方案，目前仅有一条驾车方案，但是以后可能会同时给出多条方案
        var plan = results.getPlan(0);
        /*
        // 获取方案的驾车线路，索引0表示第一条线路。
        var route = plan.getRoute(0);
        // 获取驾车路线的经纬度坐标
        path = route.getPath();
        */
        var steps = new Array();
        for (var idx = 0; idx < plan.getNumRoutes(); ++idx) {
            var route = plan.getRoute(idx);
            var tmpPath = route.getPath();
            path = path.concat(tmpPath);
            for (var i = 0; i < route.getNumSteps(); ++i) {
                var step = route.getStep(i);
                steps.push((idx + 1) + "." + (i + 1) + " " + step.getDescription());
            }
        }
        route_detail = steps.join('<br/>');
        /*setTimeout(function(){
            BaiduMap.setViewport([p1,p2]);   //调整到最佳视野
        },1000);*/

        //console.log(path);
        //console.log(route_detail);

    } else if (transit.getStatus() == BMAP_STATUS_UNKNOWN_ROUTE) { //导航结果未知。对应数值“3”。
        return;
    } else {
        return;
    }
};

function search() {
    BaiduMap.clearOverlays();
    if (typeof(transit) != 'undefined') {
        transit.clearResults(); //清除导航结果
    }

    path = [];
    route_detail = '';

    var options = {
        renderOptions: {
            map: BaiduMap,
            autoViewport: false, //启用自动调整地图层级，当指定了搜索结果所展现的地图时有效。
            enableDragging: true //起终点可进行拖拽
        },
        policy: routePolicy[$('#selectStrategy').val()],
        onSearchComplete: searchComplete
    };

    transit = new BMap.DrivingRoute(BaiduMap, options);

    var p1_lng, p1_lat;
    var p2_lng, p2_lat;
    var selectProductionUnit = $('#selectProductionUnit');
    for (var idx in production_unit_json) {
        if (production_unit_json[idx].production_unit_id == selectProductionUnit.val()) {
            p1_lng = production_unit_json[idx].production_unit_longitude;
            p1_lat = production_unit_json[idx].production_unit_latitude;
        }
    }
    var selectReceptionUnit = $('#selectReceptionUnit');
    for (var idx in reception_unit_json) {
        if (reception_unit_json[idx].reception_unit_id == selectReceptionUnit.val()) {
            p2_lng = reception_unit_json[idx].reception_unit_longitude;
            p2_lat = reception_unit_json[idx].reception_unit_latitude;
        }
    }
    p1 = new BMap.Point(p1_lng, p1_lat);
    p2 = new BMap.Point(p2_lng, p2_lat);
    transit.search(p1, p2);
}

function submit() {
    if (path == []) {
        myAlertFail("数据为空，不能提交");
        return;
    }
    /*
    var BMapPointArray = new Array();
    for (var point_idx in path) {
        var BMapPoint = {
            "lng": path[point_idx].lng,
            "lat": path[point_idx].lat
        };
        BMapPointArray.push(BMapPoint);
    }
    */

    $.ajax({
        type: "POST",
        url: "<?php echo U('Home/DistrictMap/ajax_transfer_route_plan');?>",
        timeout: 2000,
        data: {
            "production_unit_id": $('#selectProductionUnit').val(),
            "reception_unit_id": $('#selectReceptionUnit').val(),
            "route_lng_lat": JSON.stringify(path),
            "route_detail": route_detail
        },
        success: function(data) {
            switch (data) {
                case 'exist':
                    myAlertFail("此生产单位到此接受单位的路线已存在，需要调整请删除后重新规划");
                    break;
                case 'success':
                    myAlertSucc("提交成功");
                    $("#clearButton").click();
                    path = [];
                    break;
                case 'fail':
                    myAlertFail("提交失败");
                    break;
                default:
                    myAlertFail("未知错误");
                    break;
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            myAlertFail("提交失败");
            console.log("Error:Ajax_Content_Load" + errorThrown);
            console.log("XMLHttpRequest.status:" + XMLHttpRequest.status);
            console.log("XMLHttpRequest.readyState:" + XMLHttpRequest.readyState);
            console.log("textStatus:" + textStatus);
        }
    });
}
</script>