<?php
$protocol = $_SERVER['SERVER_PORT'] == '443' ? "https" : "http";
$pluginURL = '//' . $_SERVER['HTTP_HOST'] . '/seqr-webshop-plugin';
?><!DOCTYPE html>
<html>
<head>
    <title>Webshop Demo</title>
    <meta name="viewport" content="initial-scale=1">
    <style>

        @font-face {
            font-family: 'Whitney-Book';
            src: url('<?php echo $pluginURL ?>/fonts/book/whitneybookprogkcy.eot');
            src: url('<?php echo $pluginURL ?>/fonts/book/whitneybookprogkcy.eot?#iefix') format('embedded-opentype'),
            url('<?php echo $pluginURL ?>/fonts/book/whitneybookprogkcy.woff') format('woff'),
            url('<?php echo $pluginURL ?>/fonts/book/whitneybookprogkcy.ttf') format('truetype'),
            url('<?php echo $pluginURL ?>/fonts/book/whitneybookprogkcy.svg#whitneybookprogkcy') format('svg');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: "Whitney-Book", Tahoma, Verdana, Arial, sans-serif;
            margin: 10px;
            text-align: center;
        }

        h2 {
            color: #00a391;
        }
    </style>
    <script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <script>

        function getCookie(key) {
            var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
            return keyValue ? keyValue[2] : null;
        }
        
        function closeWindow() {
            window.close();
        }

        $(document).ready(function () {
            var invoiceReference = getCookie("invoiceReference");
            var statusURL = "//<?php echo $_SERVER['HTTP_HOST']; ?>/seqr-webshop-api/getPaymentStatus.php?invoiceReference=" + invoiceReference;
            $.getJSON(statusURL, function (data) {
                $("#status").html(data.status);
                window.setTimeout(closeWindow, 1000);
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