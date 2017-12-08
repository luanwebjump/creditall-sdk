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

use Webjump\CreditallSDK\Http\Service\ConsultaCrediario;

class ConsultaCrediarioRequestFactory
{
    public static function make($data)
    {
        $sendRequest = new ConsultaCrediario();
        return $sendRequest->request($data);
    }
}
