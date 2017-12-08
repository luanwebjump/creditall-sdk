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

use Webjump\CreditallSDK\Http\Client\Client;

class ClientHttpFactory
{
    /**
     * @return ClientHttp
     */
    public static function make()
    {
        return new Client();
    }
}
