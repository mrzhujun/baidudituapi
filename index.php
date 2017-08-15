<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
        body, html{width: 100%;height: 100%;margin:0;font-family:"微软雅黑";}
        #allmap{height:500px;width:100%;}
        #r-result{width:100%; font-size:14px;}
    </style>
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=xQtxorADpuFoRKLLfzpSBitGqzHrOTqa"></script>
    <title>城市名定位</title>
</head>
<body>
<div id="allmap"></div>
<div id="r-result">
    城市名: <input id="cityName" type="text" style="width:100px; margin-right:10px;" />
    <input type="text" id="jingdu" />
    <input type="text" id="weidu" />
    <input type="button" value="查询" onclick="theLocation()" />
</div>
</body>
</html>
<script type="text/javascript">
    // 百度地图API功能
    var map = new BMap.Map("allmap");
    var point = new BMap.Point(116.331398,39.897445);
    map.centerAndZoom(point,11);

    function theLocation(){
        //设置地图
        var city = document.getElementById("cityName").value;
        if(city != ""){
            map.centerAndZoom(city,11);      // 用城市名设置地图中心点
        }

        var localSearch = new BMap.LocalSearch(map);
        localSearch.enableAutoViewport(); //允许自动调节窗体大小
        //查询城市坐标的方法
        var keyword = document.getElementById("cityName").value;
        localSearch.setSearchCompleteCallback(function (searchResult) {
            var poi = searchResult.getPoi(0);
            console.log(searchResult);
            document.getElementById("jingdu").value = poi.point.lng; //获取经度和纬度，将结果显示在文本框中
            document.getElementById("weidu").value = poi.point.lat; //获取经度和纬度，将结果显示在文本框中
        });
        localSearch.search(keyword);
    }

</script>
