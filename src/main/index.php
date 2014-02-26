<!DOCTYPE html>
<html>
<head>
    <title>Webshop Demo</title>
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

<h1>SEQR Demo Webshop </h1>

<script id="seqrShop" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/seqr-webshop-plugin/js/seqrShop.js">
    {

        "invoice" : {
            "title" : "Grand Cinema",
            "currency" : "USD",
            "items" : [
                {
                    "description" : "Movie Ticket 1",
                    "amount" : 16
                },
                {
                    "description" : "Movie Ticket 2",
                    "amount" : 24
                }
            ],
            "backURL" : "http://<?php echo $_SERVER['HTTP_HOST']; ?>/seqr-webshop-sample/done.php"
        },

        "layout" : "standard",
        "paidCallback" : "paymentDone",
        "apiURL" : "http://<?php echo $_SERVER['HTTP_HOST']; ?>/seqr-webshop-api",
        "pollFreq" : 500

    }
</script>
<p>
    <a href="http://developer.seqr.com/app">Make sure you have downloaded the development app to proceed with the demo!</a>
</p>
<p>
    <a href="https://github.com/SeamlessDistribution/seqr-webshop-sample">Source code for this sample, check how easy it is!</a>
</p>
<div class="span12">
    <div class="row">

        <div class="span6">
            <h2>Simple payment</h2>

            <p class="big">Scan the QR-code at the checkout with your SEQR app, confirm with your PIN and you are done!
                You just made a payment with SEQR.</p>
        </div>

        <div class="span6">
            <h2>Send and receive money</h2>

            <p class="big">Does your best friend owe you money for the cab? Or do you want to send money to your mother?
                With SEQR it's a piece of cake.</p>
        </div>

        <div class="span6">
            <h2>Receipts in your phone</h2>

            <p class="big">Forget about lost receipts. With SEQR you are always in control. And the receipt history is
                always kept safe, even if you were to lose your phone.</p>
        </div>

        <div class="span6">
            <h2>Valuable offers</h2>

            <p class="big">With SEQR you receive great offers valid both online and in the shop around the corner. Be on
                the lookout in your SEQR app so that you don't miss out!</p>
        </div>

    </div>
</div>

</body>
</html>
