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

    public function __construct($data)
    {
        $this->setData($data);
        $this->_convertReturn();
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
        if (count($this->getData()->MENSAGEM) > 0) {
            return false;
        }
        return true;
    }

    public function getMessageFail()
    {
        if (!$this->validateReturn()) {
            return $this->getData()->MENSAGEM;
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