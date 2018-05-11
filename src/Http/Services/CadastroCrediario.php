<?php
/**
 * @author      Webjump Core Team
 * @copyright   2018 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 */
namespace Webjump\CreditallSDK\Http\Services;

use Webjump\CreditallSDK\Http\Client\ClientAbstract;
use Webjump\CreditallSDK\Factories\ClientHttpFactory;

class CadastroCrediario extends ClientAbstract
{
    CONST SERVICE_CADASTRO_CREDIARIO = 'cadastrocrediario.php';

    CONST OBJECTXML = "<?xml version=\"1.0\" encoding=\"utf-8\"?><CadastroCrediario xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\"></CadastroCrediario>";

    private $clientHttp;

    public function __construct()
    {
        $this->clientHttp = ClientHttpFactory::make();
        $this->clientHttp->setService(self::SERVICE_CADASTRO_CREDIARIO);
        $this->clientHttp->setObjectXml(self::OBJECTXML);
    }

    public function request($data)
    {
        try {
            return $this->clientHttp->request($data);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}