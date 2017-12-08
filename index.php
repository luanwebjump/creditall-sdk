<?php
require_once("vendor/autoload.php");

use Webjump\CreditallSDK\Resource\CreditallFacade;

$creditalFacade = new CreditallFacade();
//
//$data = [
//    "login" => 14045,
//    "token" => 'a730456a264edb3978c3b82bd67cc4ea',
//    "cpfcnpj" => '22947758803',
//    "cep" => '01306030',
//    "usuario" => 'Luan Alves',
//    "cmc7" => '',
//    "tipoconsulta" => 1
//];
//$retorno = $creditalFacade->sendPreAnalise($data);
//print_r(get_class_methods($retorno));


$data = [
    'Cliente' =>
        ['Chave' => 'a730456a264edb3978c3b82bd67cc4ea'],
    'Consumidor' =>
        [
            'CpfCnpj' => '36952951806',
            'Documento' =>
                [
                    'Tipo' => 'RG',
                    'Numero' => '434725183'
                ],
            'Nascimento' => '1987-06-26',
            'Endereco' =>
                [
                    'Cep' => '01306030',
                    'Numero' => '14'
                ],
            'Telefones' =>
                [
                    'Celular' =>
                        [
                            'DDD' => '11',
                            'Numero' => '999396993'
                        ],
                    'Fixo' =>
                        [
                            'DDD' => '11',
                            'Numero' => '999396993'
                        ],

                ],
            'Email' => 'luan@webjump.com.br'
        ],
    'Compra' =>
        [
            'CodigoControle' => '999',
            'Segmento' => '214',
            'Valor' => '410.15',
            'ValorTotal' => '410.15',
            'Parcelas' => '1',
            'VencimentoPrimeiraParcela' => '2017-12-16'
        ]
];
echo $creditalFacade->sendConsultaCrediario($data);