<?php

$clientId = 'AU4ak8zhuigtmfiK83nCDocdi-htzlktUHJAfcM6485Uu3HVUMS0J7pyydwsCvuA5LKCNcoiGwkwp5Yu';
$clientSecret = 'EAjuW7aUkFWJytcdeCkw6LjN694IAopbmd5QIlTPPYjDMjVtL4FxMTLrw64cx0O2TWHxKQa-OiVfrdKx';

$apiEndpoint = 'https://api.sandbox.paypal.com'; // Para entorno de pruebas (sandbox)
$redirectUrl = 'https://localhost/eccomerce/index.php?modulo=pasarela'; // URL a la que se redirigirá al usuario después de completar el pago

if (isset($_GET['paymentId'], $_GET['token'], $_GET['PayerID'])) {
    $paymentId = $_GET['paymentId'];
    $payerId = $_GET['PayerID'];

    // Paso 1: Obtener un token de acceso
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiEndpoint.'/v1/oauth2/token');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
    curl_setopt($ch, CURLOPT_USERPWD, $clientId.':'.$clientSecret);

    $result = curl_exec($ch);
    $response = json_decode($result, true);

    if (curl_getinfo($ch, CURLINFO_HTTP_CODE) !== 200 || !isset($response['access_token'])) {
        die('Error al obtener el token de acceso de PayPal.');
    }

    $accessToken = $response['access_token'];

    // Paso 2: Obtener detalles de la transacción
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiEndpoint.'/v1/payments/payment/'.$paymentId);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer '.$accessToken
    ]);

    $result = curl_exec($ch);
    $response = json_decode($result, true);

    if (curl_getinfo($ch, CURLINFO_HTTP_CODE) !== 200 || !isset($response['state']) || $response['state'] !== 'approved') {
        die('Error al obtener los detalles de la transacción de PayPal.');
    }

    // Aquí puedes procesar los detalles de la transacción según tus necesidades
    $transactionId = $response['id'];
    $amount = $response['transactions'][0]['amount']['total'];
    $currency = $response['transactions'][0]['amount']['currency'];

    echo '¡Pago completado con éxito!';
} else {
    // Paso 1: Crear un pago y redirigir al usuario a PayPal
    $paymentAmount = 10.00; // Monto del pago
    $currency = 'USD'; // Moneda del pago

    $data = [
        'intent' => 'sale',
        'payer' => [
            'payment_method' => 'paypal'
        ],
        'transactions' => [
            [
                'amount' => [
                    'total' => $paymentAmount,
                    'currency' => $currency
                ]
            ]
        ],
        'redirect_urls' => [
            'return_url' => $redirectUrl,
            'cancel_url' => $redirectUrl
        ]
    ];

    // Paso 2: Obtener un token de acceso
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiEndpoint.'/v1/oauth2/token');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
    curl_setopt($ch, CURLOPT_USERPWD, $clientId.':'.$clientSecret);

    $result = curl_exec($ch);
    $response = json_decode($result, true);

    if (curl_getinfo($ch, CURLINFO_HTTP_CODE) !== 200 || !isset($response['access_token'])) {
        die('Error al obtener el token de acceso de PayPal.');
    }

    $accessToken = $response['access_token'];

    // Paso 3: Crear el pago y obtener la URL de aprobación
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiEndpoint.'/v1/payments/payment');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer '.$accessToken
    ]);

    $result = curl_exec($ch);
    $response = json_decode($result, true);

    if (curl_getinfo($ch, CURLINFO_HTTP_CODE) !== 201 || !isset($response['id'])) {
        die('Error al crear el pago de PayPal.');
    }

    $paymentId = $response['id'];

    $approvalUrl = '';

    foreach ($response['links'] as $link) {
        if ($link['rel'] === 'approval_url') {
            $approvalUrl = $link['href'];
            break;
        }
    }

    if (empty($approvalUrl)) {
        die('No se pudo obtener la URL de aprobación de PayPal.');
    }

    header('Location: '.$approvalUrl);
    exit;
}
?>
