//用于显示系统的日期和时间

function showDateTime() {
    var DateObj = new Date();
    var DateTime = DateObj.toLocaleString();
    $("#datetime").html("当前时间：" + DateTime);
}
showDateTime();
setInterval("showDateTime()", 1000);
