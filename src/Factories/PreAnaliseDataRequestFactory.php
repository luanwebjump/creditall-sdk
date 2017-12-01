<?php
/**
 * @author      Webjump Core Team <dev@webjump.com>
 * @copyright   2017 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 *
 */

namespace Webjump\Creditall_SDK\Factories;

use Webjump\Creditall_SDK\Resource\Preanalise\Request;

class PreAnaliseDataRequestFactory
{
    public static function make($data)
    {
        $dataRequest = new Request($data);
        return $dataRequest->prepareParams();
    }
}
