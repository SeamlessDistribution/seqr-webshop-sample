<?php


$soapClient = new SoapClient("http://seqrextdev4/extclientproxy/service/v2?wsdl");

/*
  sample request:
	<context>
	    <initiatorPrincipalId>
               <id></id>
               <type>TERMINALID</type>
            </initiatorPrincipalId>
            <password>234343434</password>
         </context>
         <invoice>
	<title>Thai Massage Center</title>
            <invoiceRows>
               <invoiceRow>
                  <itemDescription>Thai Massage</itemDescription>
                  <itemTotalAmount>
                     <currency>SEK</currency>
                     <value>500</value>
                  </itemTotalAmount>
               </invoiceRow>
            </invoiceRows>
            <totalAmount>
               <currency>SEK</currency>
               <value>500</value>
            </totalAmount>
         </invoice>
*/

$params = array("context" =>
array(
    "initiatorPrincipalId" =>
    array(
        "id" => "58af556cc3794c66a32aadbb7cab0a2c",
        "type" => "TERMINALID"),
    "password" => "AnReH4NevKSXkcJ",
    "clientRequestTimeout" => "0"
),
    "invoice" =>
    array(
        "acknowledgmentMode" => "NO_ACKNOWLEDGMENT",
        "title" => "Grand Cinema",
        "totalAmount" =>
        array(
            "currency" => "USD",
            "value" => "500"
        ),
        "backURL" => "http://devapi.seqr.com/sample/done.php?foo=bar",
        "invoiceRows" =>
        array(
            "invoiceRow" =>
            array(
                "itemDescription" => "Movie Ticket",
                "itemTotalAmount" =>
                array(
                    "currency" => "USD",
                    "value" => "500"
                )
            )


        )
    ));


$result = $soapClient->sendInvoice($params);

$invoiceId = $result->return->invoiceReference;

print_r("<!--\n");
print_r($result);
print_r("-->");
?><!DOCTYPE html>
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

<h1>SEQR Demo Webshop</h1>

<script id="seqrShop"
        src="http://devapi.seqr.com/seqr-webshop-plugin/js/seqrShop.js#!invoiceId=<?php echo $invoiceId; ?>&layout=standard&successCallback=paymentDone"></script>
<br/>
<br/>
<br/>
<a href="http://developer.seqr.com/app">Make sure you have downloaded the development app to proceed with the demo!</a>

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
                With SEQR it´s a piece of cake.</p>
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
