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

    /**
     * @param $item
     */
    protected function setResponse($item)
    {
        $this->response = $item;
    }

    /**
     * @return string
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param $item
     */
    public function setRequest($item)
    {
        $this->request = $item;
    }

    /**
     * @return string
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    protected function getData()
    {
        return $this->data;
    }

    /**
     * @return bool
     */
    public function validateReturn()
    {
        $data = $this->getData();
        if (count($data->Erros) > 0 || (current($data->Dados->Situacao) == "NEGADO")
        ) {
            return false;
        }
        return true;
    }

    /**
     * @return bool|mixed|string
     */
    public function getMessageFail()
    {
        $retorno = array();
        $data = $this->getData();
        if (!$this->validateReturn()) {
            if (!empty($data->Dados->Situacao) && current($data->Dados->Situacao) == "NEGADO") {
                return current($data->Dados->Mensagem);
            }

            if (!empty($data->Erros)) {
                foreach ($data->Erros as $item) {
                    $retorno[] = $item->Erro;
                }
            }

            return implode(' ,', $retorno);
        }
        
        return false;
    }

    /**
     * @return bool
     */
    public function getNumeroControle()
    {
        if ($this->validateReturn()) {
            return $this->getData()->Numero_Controle;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function getNumeroAprovacao(){
        if ($this->validateReturn()) {
            return $this->getData()->Numero_Aprovacao;
        }
        return false;
    }

    /**
     * @return bool|string
     */
    public function getDate(){
        if ($this->validateReturn()) {
            return $this->getData()->Data.' '.$this->getData()->Hora;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function getStatus(){
        if ($this->validateReturn()) {
            return $this->getData()->Status;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function getSituacao(){
        if ($this->validateReturn()) {
            return $this->getData()->Situacao;
        }
        return false;
    }

    /**
     * @return bool
     */
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