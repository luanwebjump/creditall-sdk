<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://www.siscredit.com.br/credital/webservices/consultacrediario.php",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<ConsultaCrediario\n xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\">\n  <Cliente>\n    <Chave>a730456a264edb3978c3b82bd67cc4ea</Chave>\n  </Cliente>\n  <Consumidor>\n    <CpfCnpj>36952951806</CpfCnpj>\n    <Documento>\n      <Tipo>RG</Tipo>\n      <Numero>434725183</Numero>\n    </Documento>\n    <Nascimento>1987-06-26</Nascimento>\n    <Endereco>\n      <Cep>01306030</Cep>\n      <Numero>RUA ACARAU 14</Numero>\n    </Endereco>\n    <Telefones>\n      <Celular>\n        <DDD>11</DDD>\n        <Numero>999396993</Numero>\n      </Celular>\n      <Fixo>\n        <DDD>11</DDD>\n        <Numero>32326565</Numero>\n      </Fixo>\n    </Telefones>\n    <Email>luan@webjump.com.br</Email>\n  </Consumidor>\n  <Compra>\n    <CodigoControle>999</CodigoControle>\n    <Segmento>214</Segmento>\n    <Valor>410.15</Valor>\n    <ValorTotal>410.15</ValorTotal>\n    <Parcelas>1</Parcelas>\n    <VencimentoPrimeiraParcela>2017-11-16</VencimentoPrimeiraParcela>\n  </Compra>\n</ConsultaCrediario>",
    CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "postman-token: e57c91d4-2e95-562b-d8bd-b5cd37bc5b94"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}