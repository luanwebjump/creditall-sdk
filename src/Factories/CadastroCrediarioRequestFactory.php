<?php
/**
 * @author      Webjump Core Team
 * @copyright   2018 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 */
namespace Webjump\CreditallSDK\Factories;

use Webjump\CreditallSDK\Http\Services\CadastroCrediario;

class CadastroCrediarioRequestFactory
{
    public static function make($data)
    {
        $sendRequest = new CadastroCrediario();
        return $sendRequest->request($data);
    }
}