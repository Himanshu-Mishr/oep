
<!DOCTYPE html>
<html>
<head>
    <title>timer</title>
    <script type="text/javascript">
        function remind(msg1) {
            var msg = "This is a reminder after " + msg1 +" Secs";
            alert(msg);
        }
    </script>
</head>
<body>
<input type=radio name=rm value=no checked>No reminder
<input type=radio name=rm value=5000 OnClick="mytime=setTimeout('remind(2)',2000)">After 2 Secs
<input type=radio name=rm value=5000 OnClick="mytime=setTimeout('remind(5)',5000)">After 5 Secs
<input type=radio name=rm value=5000 OnClick="mytime=setTimeout('remind(10)',10000)">After 10 Secs
</body>
</html>
