<?php

require __DIR__  . '/vendor/autoload.php';

/*=============================================
Dominio
=============================================*/

$domain = "localhost/";

/*=============================================
Modo
=============================================*/

$sandbox = true;

/*=============================================
Credenciales
=============================================*/

if($sandbox){

	$public_key = "TEST-b9ce7db8-375d-4a56-8c94-1bcbcfb99e14";
	$access_token = "TEST-779059680580923-070123-b996795e2c2e7ff42e614428e58f12ba-24180870";

}else{

	$public_key = "APP_USR-22bdfc7b-81fc-49b4-867d-0aa098091336";
	$access_token = "APP_USR-779059680580923-070123-f8aacbe71e0e20f8461d8c671bb8485b-24180870";

}


/*=============================================
Petición a la API de Cambio de Moneda
=============================================*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://free.currconv.com/api/v7/convert?q=USD_MXN&compact=ultra&apiKey=7587a99b3b088e6fe855",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Cookie: __cfduid=d3959bf2dac5d017311aea627b0fde59a1594331410"
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$jsonResponse = json_decode($response, true);

/*=============================================
Formulario de MercadoPago
=============================================*/

if(isset($_GET["_x"]) && $_GET["_x"] == md5(base64_decode($_COOKIE["_x"]))){

	echo '
	<div style="width:100%; height:100vh; position:fixed; background:url(mp-bg.jpg); background-repeat:no-repeat; background-size:cover">

	<div style="text-align:center; position:absolute; top:45vh; right:120px">

	<form action="http://localhost/mp-angular/src/mercadopago/index.php" method="POST">
	  <script
	    src="https://www.mercadopago.com.mx/integrations/v1/web-tokenize-checkout.js"
	    data-public-key="'.$public_key.'"
	    data-button-label="Next"
	    data-summary-product-label="'.$_COOKIE["_p"].'"
	    data-transaction-amount="'.$jsonResponse["USD_MXN"]*base64_decode($_COOKIE["_x"]).'">
	  </script>
	</form>

	</div>

</div>';

}

/*=============================================
Recibir la respuesta de Mercado Pago
=============================================*/

if(isset($_REQUEST["token"])){

	/*=============================================
	Obtener los datos del comprador
	=============================================*/

	$token = $_REQUEST["token"];
	$payment_method_id = $_REQUEST["payment_method_id"];
	$installments = $_REQUEST["installments"];
	$issuer_id = $_REQUEST["issuer_id"];

	/*=============================================
	Realizar el pago con el SDK de Mercado Pago
	=============================================*/

	MercadoPago\SDK::setAccessToken($access_token);
    //...
    $payment = new MercadoPago\Payment();
    $payment->transaction_amount = ceil($jsonResponse["USD_MX"]*base64_decode($_COOKIE["_x"]));
    $payment->token = $token;
    $payment->description = $_COOKIE["_p"];
    $payment->installments = $installments;
    $payment->payment_method_id = $payment_method_id;
    $payment->issuer_id = $issuer_id;
    $payment->payer = array(
    "email" => $_COOKIE["_e"]
    );
    // Guarda y postea el pago
    $payment->save();

    echo $payment->status;

    //...
    // Imprime el estado del pago
    if($payment->status == "approved"){

    	setcookie('_i', $payment->id, time() + 3600, "/", $domain);
    	setcookie('_k', $public_key, time() + 3600, "/", $domain);
    	setcookie('_a', $access_token, time() + 3600, "/", $domain);

    	echo '<script>

			window.close();

    	</script>';

    }

}
