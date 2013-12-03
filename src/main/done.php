<!DOCTYPE html>
<html>
<head>
    <title>seqr-webshop-sample</title>
    <style>
        body {
            width: 35em;
            margin: 0 auto;
            font-family: Tahoma, Verdana, Arial, sans-serif;
        }
    </style>
    <script>
        function paymentDone(data) {
            console.log(data);
        }
    </script>
</head>
<body>
<h1>Payment completed!</h1>
<img src="http://devapi.seqr.com/seqr-webshop-plugin/images/paymentdone.png"/>
</body>
</html>