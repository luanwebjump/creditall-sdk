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

class PreAnalise extends ClientAbstract
{
    CONST SERVICE_PREANALISE = 'preanalise.php';
    CONST OBJECTXML = "<?xml version=\"1.0\" encoding=\"utf-8\"?><preanalise></preanalise>";
    private $clientHttp;


    /**
     * PreAnalise constructor.
     */
    public function __construct($dataRequest)
    {
        $this->clientHttp = ClientHttpFactory::make();
        $this->clientHttp->setService(self::SERVICE_PREANALISE);
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
