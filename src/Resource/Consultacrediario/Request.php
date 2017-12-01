<?php
/**
 * @author      Webjump Core Team <dev@webjump.com>
 * @copyright   2017 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 *
 */

namespace Webjump\Creditall_SDK\Resource\Consultacrediario;

class Request
{
    private $validateDataKeys = [
        'Cliente' => 'Chave', 'Consumidor' =>
            [
                'CpfCnpj', 'Documento' =>
                [
                    'Tipo', 'Numero'
                ],
                'Nascimento', 'Endereco' =>
                [
                    'Cep', 'Numero'
                ],
                'Telefones' =>
                    [
                        'Celular' => ['DDD', 'Numero'],
                        'Fixo' => ['DDD', 'Numero'],
                    ],
                'Email'
            ],
        'Compra'=>
        [
            'CodigoControle','Segmento','Valor','ValorTotal','Parcelas','VencimentoPrimeiraParcela'
        ]
    ];
    private $dataRequest = '';

    public function __construct($data)
    {
        $this->setData($data);
    }

    public function prepareParams()
    {
        $this->validateData($this->getData());
//        $this->setData($this->organizeKeys($this->getData()));
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
        $valid = true;
        $keysproblem = [];
        foreach ($this->validateDataKeys as $keys) {
            if (!$this->validateKeysExists($data, $keys)) {
                $valid = false;
                $keysproblem = $keys;
            }
        }

        if (!$valid) {
            var_dump($keysproblem);
            throw new \Exception('non-standard data');
        }
        return true;
    }

    private function validateKeysExists(array $arr, $key)
    {
//        if(is_array($key)){
//            $this->validateData($key);
//        }
        if (!is_array($key)) {
            if (array_key_exists($key, $arr)) {
                return true;
            }
        }

        // check arrays contained in this array
        foreach ($arr as $element) {
            if (is_array($element)) {
                if ($this->validateKeysExists($element, $key)) {
                    return true;
                }
            }

        }

        return false;
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