<?php
$protocol = $_SERVER['SERVER_PORT'] == '443' ? "https" : "http";
?><!DOCTYPE html>
<html>
<head>
    <title>seqr-webshop-sample</title>
    <style>
        body {
            width: 190px;
            margin: 0 auto;
            font-family: Tahoma, Verdana, Arial, sans-serif;
        }
    </style>
</head>
<body>
<img src="<?php echo $protocol; ?>://<?php echo $_SERVER['HTTP_HOST'] ?>/seqr-webshop-plugin/images/paymentdone.png"/>
</body>
</html>