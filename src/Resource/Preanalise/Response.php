<?php
/**
 * @author      Webjump Core Team <dev@webjump.com>
 * @copyright   2017 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 *
 */

namespace Webjump\CreditallSDK\Resource\Preanalise;

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

    protected function setRequest($item)
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

    public function getData()
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
        $message = [];
        if (!$this->validateReturn()) {
            foreach ($this->getData()->Erros as $item) {
                $message[] = $item->Erro;
            }
            return implode(' ,', $message);
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

    public function getSituacao()
    {
        if ($this->validateReturn()) {
            return $this->getData()->Situacao;
        }
        return false;
    }

    public function getNome()
    {
        if ($this->validateReturn()) {
            return $this->getData()->Nome;
        }
        return false;
    }

    public function getCnfCnpj()
    {
        if ($this->validateReturn()) {
            return $this->getData()->CpfCnpj;
        }
        return false;
    }

    public function getDataNascimento()
    {
        if ($this->validateReturn()) {
            return $this->getData()->Data_Nascimento;
        }
        return false;
    }

    public function getLimiteMaximo()
    {
        if ($this->validateReturn()) {
            return $this->getData()->Limite_Maximo;
        }
        return false;
    }

    public function getLimiteParcela()
    {
        if ($this->validateReturn()) {
            return $this->getData()->Limite_Parcela;
        }
        return false;
    }

    public function getDebitosCreditall()
    {
        if ($this->validateReturn()) {
            return $this->getData()->Debitos_Creditall;
        }
        return false;
    }

    public function getLimiteSaldo()
    {
        if ($this->validateReturn()) {
            return $this->getData()->Limite_Saldo;
        }
        return false;
    }

    public function getLimiteSaldoParcela()
    {
        if ($this->validateReturn()) {
            return $this->getData()->Limite_Saldo_Parcela;
        }
        return false;
    }

    protected function _convertReturn()
    {
        $this->setData(simplexml_load_string($this->getData()));
    }
}