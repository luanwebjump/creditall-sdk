<?php
/**
 * @author      Webjump Core Team
 * @copyright   2018 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 */
namespace Webjump\CreditallSDK\Factories;

use Webjump\CreditallSDK\Resource\CadastroCrediario\Request;

class CadastroCrediarioDataRequestFactory
{
    public static function make($data)
    {
        $dataRequest = new Request($data);
        return $dataRequest->prepareParams();
    }
}