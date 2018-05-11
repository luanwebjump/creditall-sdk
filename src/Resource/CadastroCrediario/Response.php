<?php
/**
 * @author      Webjump Core Team
 * @copyright   2018 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 */
namespace Webjump\CreditallSDK\Resource\CadastroCrediario;

class Response
{
    protected $data;

    protected $response;

    protected $request;

    public function __construct(Array $data)
    {
        $this->setResponse($data['response']);
        $this->setRequest($data['request']);
        $this->setData($data['response']);
        $this->_convertReturn();
    }

    protected function setResponse($data)
    {
        $this->response = $data;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function setData($data)
    {
        $this->data = $data->Dados;
    }

    protected function getData()
    {
        return $this->data;
    }

    public function setRequest($data)
    {
        $this->request = $data;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getErros()
    {
        return $this->getResponse()->Erros;
    }

    public function validateReturn()
    {
        $data = $this->getData();
        if (count($this->getErros()) > 0 OR (current($this->getSituacao()) == "NEGADO")) {
            return false;
        }

        return true;
    }

    public function getMessageFail()
    {
        $retorno = [];

        $data = $this->getData();
        if (!$this->validateReturn()) {
            if (!empty($this->getSituacao()) && current($this->getSituacao()) == "NEGADO") {
                return current($data->Dados->Mensagem);
            }

            if (!empty($this->getErros())) {
                foreach ($this->getErros() as $item) {
                    $retorno[] = $item->Erro;
                }

                return implode('; ', $retorno);
            }
        }

        return false;
    }

    public function getNumeroControle()
    {
        if ($this->validateReturn()) {
            return $this->getData()->Numero_Controle;
        }
    }

    public function getDataHora()
    {
        if ($this->validateReturn()) {
            /** A parametro Hora retorna a Data e a Hora (Y-m-d H:i:s) */
            return $this->getData()->Hora;
        }
    }

    public function getStatus(){
        if ($this->validateReturn()) {
            return $this->getData()->Status;
        }
    }

    public function getSituacao(){
        if ($this->validateReturn()) {
            return $this->getData()->Situacao;
        }
    }

    public function getCpfCnpj(){
        if ($this->validateReturn()) {
            return $this->getData()->CpfCnpj;
        }
    }

    public function getNome(){
        if ($this->validateReturn()) {
            return $this->getData()->Nome;
        }
    }

    public function getNomeMae(){
        if ($this->validateReturn()) {
            return $this->getData()->Nome_Mae;
        }
    }

    public function getMensagem()
    {
        if ($this->validateReturn()) {
            return $this->getData()->Mensagem;
        }
    }

    public function getComposicao()
    {
        if ($this->validateReturn()) {
            return $this->getData()->Composicao;
        }
    }

    public function getRisco()
    {
        if ($this->validateReturn()) {
            return $this->getComposicao()->Risco;
        }
    }

    public function getEndividamentoFuturo()
    {
        if ($this->validateReturn()) {
            return $this->getComposicao()->Endividamento_Futuro;
        }
    }

    public function getLimite()
    {
        if ($this->validateReturn()) {
            return $this->getComposicao()->Limite;
        }
    }

    public function getLimteMaximoParcela()
    {
        if ($this->validateReturn()) {
            /** Sim, está escrito "Limte", no retorno */
            return $this->getComposicao()->Limte_Maximo_Parcela;
        }
    }

    public function getMaximoSegmento()
    {
        if ($this->validateReturn()) {
            return $this->getComposicao()->Maximo_Segmento;
        }
    }

    public function getGastosCreditall()
    {
        if ($this->validateReturn()) {
            return $this->getComposicao()->Gastos_Creditall;
        }
    }

    public function getSaldoLimite()
    {
        if ($this->validateReturn()) {
            return $this->getComposicao()->Saldo_Limite;
        }
    }

    public function getSaldoMaximoParcela()
    {
        if ($this->validateReturn()) {
            return $this->getComposicao()->Saldo_Maximo_Parcela;
        }
    }

    protected function _convertReturn()
    {
        $this->setData(simplexml_load_string($this->getData()));
    }
}