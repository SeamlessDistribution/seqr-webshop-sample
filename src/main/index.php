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
        }

        #content {
            max-width: 500px;
            margin: 0 auto;
        }

        a {
            color: #00a391;
        }

    </style>
    <script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <script>

        function setCookie(key, value) {
            var expires = new Date();
            expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
            document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
        }

        function sendInvoice() {
            var invoice = {
                "title": "Grand Cinema",
                "currency": "USD",
                "items": [
                    {
                        "description": "Movie Ticket 1",
                        "amount": 16
                    },
                    {
                        "description": "Movie Ticket 2",
                        "amount": 24
                    }
                ],
                "backURL": "<?php echo $protocol; ?>://<?php echo $_SERVER['HTTP_HOST']; ?>/seqr-webshop-sample/done.php",
                "notificationUrl": "<?php echo $protocol; ?>://<?php echo $_SERVER['HTTP_HOST']; ?>/seqr-webshop-api/getPaymentStatus.php"
            };
            $.ajax({
                type: "POST",
                url: "//<?php echo $_SERVER['HTTP_HOST']; ?>/seqr-webshop-api/sendInvoice.php",
                contentType: "application/json",
                data: JSON.stringify(invoice)
            }).done(function (data) {
                setCookie("invoiceReference",data.invoiceReference);
                $("#seqrStatus").html("Injecting Script...")
                var statusURL = "//<?php echo $_SERVER['HTTP_HOST']; ?>/seqr-webshop-api/getPaymentStatus.php?invoiceReference=" + data.invoiceReference;
                var script = document.createElement('script');
                script.id = "seqrShop"
                script.type = "text/javascript";
                script.src = "//<?php echo $_SERVER['HTTP_HOST'] ?>/seqr-webshop-plugin/js/seqrShop.js#!statusCallback=statusUpdated&invoiceReference=" + data.invoiceReference + "&statusURL=" + encodeURIComponent(statusURL);
                $("#seqrShop").replaceWith(script);
            });
        }

        function statusUpdated(data) {
            $("#seqrStatus").html("Status Updated: " + data.status);
            $("#seqrRawStatus").html(JSON.stringify(data, null, 4));
        }

        $(document).ready(function () {
            sendInvoice();
        });

    </script>
</head>
<body>
<div id="content">

    <h1>SEQR Webshop Plugin Demo</h1>

    <p>
        This demo shows how an invoice is created by calling <a
            href="https://github.com/SeamlessDistribution/seqr-webshop-api">sample
            REST services</a> implemented in PHP.
    </p>

    <p>
        First a test purchase is made by calling sendInvoice. The result is then used to inject the <a
            href="https://github.com/SeamlessDistribution/seqr-webshop-plugin">SEQR Webshop Plugin</a> into the
        page. The plugin polls for an update by calling getPaymentStatus every second. When the status changes, the
        plugin
        updates it's appearance, and executes a callback that updates the status at the bottom of this page.
    </p>

    <p>
        To make a test payment you must <a href="http://developer.seqr.com/app">download the demo</a> version of the
        SEQR app and scan the QR code below. The source code for this demo is <a
            href="https://github.com/SeamlessDistribution/seqr-webshop-sample">available on GitHub</a>.
    </p>

    <div id="seqrShop"></div>

    <h3 id="seqrStatus">Sending Invoice...</h3>

    <pre><code id="seqrRawStatus"></code></pre>

</div>
</body>
</html>
