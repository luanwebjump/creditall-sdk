<?php
/**
 * @author      Webjump Core Team <dev@webjump.com>
 * @copyright   2017 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 *
 */

namespace Webjump\Creditall_SDK\Http\Service;

use Webjump\Creditall_SDK\Http\Client\ClientAbstract;
use Webjump\Creditall_SDK\Factories\ClientHttpFactory;

class ConsultaCrediario extends ClientAbstract
{
    CONST SERVICE_CONSULTACREDITO = 'consultacrediario.php';
    CONST OBJECTXML = "<?xml version=\"1.0\" encoding=\"utf-8\"?><ConsultaCrediario xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\"></ConsultaCrediario>";
    private $clientHttp;


    /**
     * Consulta Crédito constructor.
     */
    public function __construct()
    {
        $this->clientHttp = ClientHttpFactory::make();
        $this->clientHttp->setService(self::SERVICE_CONSULTACREDITO);
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
