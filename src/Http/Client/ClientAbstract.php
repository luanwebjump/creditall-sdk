<?php
/**
 * @author      Webjump Core Team <dev@webjump.com>
 * @copyright   2017 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 *
 */

namespace Webjump\Creditall_SDK\Http\Client;


abstract class ClientAbstract
{

    protected $endpoint = 'https://www.siscredit.com.br/credital/webservices/';
    protected $service='';
    protected $objectXml='';

    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    protected function getEndpoint()
    {
        return $this->endpoint;
    }

    public function setService($service)
    {
        $this->service = $service;
    }

    protected function getService()
    {
        return $this->service;
    }

    public function setObjectXml($objectXml){
        $this->objectXml =$objectXml;
    }

    protected function getObjectXml(){
        return $this->objectXml;
    }

}
