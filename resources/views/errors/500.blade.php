<!DOCTYPE html>
<html>
<head>
    <title>Error 500</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    {!! Html::style('public/css/message.css') !!} 
</head>
<body onload="header()">
    <div class="wrap">
        <div class="logo">
            <h1>500</h1>
            <p>Error occurred! - System Error</p>
            <div class="sub">
                <p><a href="/excel_laravel">Back <span id="timer"></span></a></p>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    function header() {
        var i = 5;
        setInterval(function () {
            document.getElementById("timer").innerHTML = "(" + i + ")";
            i--;
        }, 800);
        setTimeout(function () {
            window.location.replace('/excel_laravel');
        }, 5000);
    }
</script>