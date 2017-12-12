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

class Request
{
    private $validateDataKeys = ['login', 'token', 'cpfcnpj', 'usuario', 'cep', 'cmc7', 'tipoconsulta'];
    private $dataRequest = '';

    /**
     * Request constructor.
     * @param array $data
     */
    public function __construct($data)
    {
        $this->setData($data);
    }

    public function prepareParams()
    {
        $this->validateData($this->getData());
        $this->setData($this->organizeKeys($this->getData()));
        return $this->getData();
    }

    public function setData($data)
    {
        $this->dataRequest = $data;
    }

    protected function getData()
    {
        return $this->dataRequest;
    }

    private function validateData(array $data)
    {
        if (count(array_diff($this->validateDataKeys, array_keys($data))) > 0) {
            throw new \Exception('non-standard data');

        }
        return true;
    }

    protected function organizeKeys(array $data)
    {
        $organize = [];
        foreach ($this->validateDataKeys as $key) {
            $organize[$key] = $data[$key];
        }
        return $organize;
    }
}