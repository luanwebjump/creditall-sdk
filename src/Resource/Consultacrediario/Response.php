<?php
/**
 * @author      Webjump Core Team <dev@webjump.com>
 * @copyright   2017 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 *
 */

namespace Webjump\CreditallSDK\Resource\Consultacrediario;

class Response
{
    private $data = '';
    private $response = '';
    private $request = '';

    public function __construct($data)
    {
        $this->setResponse($data['response']);
        $this->setRequest($data['request']);
        $this->setData($data['response']);
        $this->_convertReturn();
    }

    protected function setResponse($item)
    {
        $this->response = $item;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function setRequest($item)
    {
        $this->request = $item;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    protected function getData()
    {
        return $this->data;
    }

    public function validateReturn()
    {
        if (count($this->getData()->Erros) > 0) {
            return false;
        }
        return true;
    }

    public function getMessageFail()
    {
        $retorno = array();
        if (!$this->validateReturn()) {
            foreach ($this->getData()->Erros as $item) {
                $retorno[] = $item->Erro;
            }
            return implode(' ,', $retorno);
        }
        return false;
    }

    public function getNumeroControle()
    {
        if ($this->validateReturn()) {
            return $this->getData()->Numero_Controle;
        }
        return false;
    }

    public function getNumeroAprovacao(){
        if ($this->validateReturn()) {
            return $this->getData()->Numero_Aprovacao;
        }
        return false;
    }

    public function getDate(){
        if ($this->validateReturn()) {
            return $this->getData()->Data.' '.$this->getData()->Hora;
        }
        return false;
    }

    public function getStatus(){
        if ($this->validateReturn()) {
            return $this->getData()->Status;
        }
        return false;
    }

    public function getSituacao(){
        if ($this->validateReturn()) {
            return $this->getData()->Situacao;
        }
        return false;
    }

    public function getMensagem()
    {
        if ($this->validateReturn()) {
            return $this->getData()->Mensagem;
        }
        return false;
    }
    protected function _convertReturn()
    {
        $this->setData(simplexml_load_string($this->getData()));
    }
}