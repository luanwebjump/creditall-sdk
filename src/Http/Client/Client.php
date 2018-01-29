<?php
/**
 * @author      Webjump Core Team <dev@webjump.com>
 * @copyright   2017 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 *
 */

namespace Webjump\CreditallSDK\Http\Client;

use Webjump\CreditallSDK\Http\Client\ClientAbstract;

class Client extends ClientAbstract
{

    public function request($data, $method = 'POST')
    {

        $xml_user_info = new \SimpleXMLElement($this->getObjectXml());
        $this->array_to_xml($data, $xml_user_info);
        $paramRequest = $xml_user_info->asXML();
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->getEndpoint() . $this->getService(),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 90,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $paramRequest,
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return ['request' => $paramRequest, 'response' => "cURL Error #:" . $err];
        } else {
            return ['request' => $paramRequest, 'response' => $response];
        }
    }

    private function array_to_xml($array, &$xml_user_info)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                if (!is_numeric($key)) {
                    $subnode = $xml_user_info->addChild("$key");
                    $this->array_to_xml($value, $subnode);
                } else {
                    $subnode = $xml_user_info->addChild("item$key");
                    $this->array_to_xml($value, $subnode);
                }
            } else {
                $xml_user_info->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }
}
