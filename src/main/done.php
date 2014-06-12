<?php
$protocol = $_SERVER['SERVER_PORT'] == '443' ? "https" : "http";
$pluginURL = '//' . $_SERVER['HTTP_HOST'] . '/seqr-webshop-plugin';
?><!DOCTYPE html>
<html>
<head>
    <title>Webshop Demo</title>
    <meta name="viewport" content="initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo $pluginURL ?>/css/seqrShop.css">
    <style>

        body {
            font-family: "SEQR", Helvetica, Arial, sans-serif;
            margin: 10px;
            text-align: center;
        }

        h2 {
            font-family: "SEQR-Medium", Helvetica, Arial, sans-serif;
            color: #00a391;
        }

    </style>
    <script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <script>

        function getCookie(key) {
            var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
            return keyValue ? keyValue[2] : null;
        }

        $(document).ready(function () {
            var invoiceReference = getCookie("invoiceReference");
            var statusURL = "//<?php echo $_SERVER['HTTP_HOST']; ?>/seqr-webshop-api/getPaymentStatus.php?invoiceReference=" + invoiceReference;
            $.getJSON(statusURL, function (data) {
                $("#status").html(data.status);
                window.setTimeout(window.close, 1000);
            });
        });

    </script>
</head>
<body>

<p><img src="<?php echo $pluginURL ?>/images/seqr-logo.svg" width="220"/></p>

<p><img src="<?php echo $pluginURL ?>/images/loading.svg" width="55"/></p>

<h2 id="status"></h2>

</body>
</html>