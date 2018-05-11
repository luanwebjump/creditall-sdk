<?php
/**
 * @author      Webjump Core Team
 * @copyright   2018 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 */
namespace Webjump\CreditallSDK\Factories;

use Webjump\CreditallSDK\Resource\CadastroCrediario\Response;

class CadastroCrediarioDataResponseFactory
{
    public static function make($data)
    {
        return $dataResponse = new Response($data);
    }
}
