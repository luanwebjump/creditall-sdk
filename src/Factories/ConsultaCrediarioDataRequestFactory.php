<?php
/**
 * @author      Webjump Core Team <dev@webjump.com>
 * @copyright   2017 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 *
 */

namespace Webjump\CreditallSDK\Factories;

use Webjump\CreditallSDK\Resource\Consultacrediario\Request;

class ConsultaCrediarioDataRequestFactory
{
    public static function make($data)
    {
        $dataRequest = new Request($data);
        return $dataRequest->prepareParams();
    }
}
