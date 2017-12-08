<?php
require_once("vendor/autoload.php");

use Webjump\CreditallSDK\Resource\CreditallFacade;

$creditalFacade = new CreditallFacade();

$data = [
    "login" => 9999,
    "token" => '99999999999999999999999999999999',
    "cpfcnpj" => '99999999999',
    "cep" => '99999999999',
    "usuario" => 'Nome Usuario',
    "cmc7" => '',
    "tipoconsulta" => 1
];
$return = $creditalFacade->sendPreAnalise($data);
print_r(get_class_methods($return));