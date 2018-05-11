<?php
/**
 * @author      Webjump Core Team
 * @copyright   2018 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 */
namespace Webjump\CreditallSDK\Resource\CadastroCrediario;

class Request
{
	private $dataRequest;

    private $validateDataKeys = [
        'Cliente' => 'Chave',
        'Consumidor' => [
            'CpfCnpj',
            'Documento' => [
                'Tipo',
                'Numero'
            ],
            'Nascimento',
            'Endereco' => [
                'Cep',
                'Numero'
            ],
            'Telefones' => [
                'Celular' => [
                	'DDD',
                	'Numero'
                ],
                'Fixo' => [
                	'DDD',
                	'Numero'
                ]
            ],
            'Email'
        ],
        'Compra' => [
            'CodigoControle',
            'Segmento',
            'Valor',
            'ValorTotal',
            'Parcelas',
            'VencimentoPrimeiraParcela'
        ]
    ];

    public function __construct($data)
    {
        $this->setData($data);
    }

    public function prepareParams()
    {
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

    private function validateData(Array $data)
    {
        $valid = true;
        $keysProblem = [];
        foreach ($this->validateDataKeys as $keys) {
            if (!$this->validateKeysExists($data, $keys)) {
                $valid = false;
                $keysProblem[] = $keys;
            }
        }

        if (!$valid) {
            throw new \Exception('non-standard data' . implode(' ', $keysProblem));
        }

        return true;
    }

    private function validateKeysExists(Array $arr, $key)
    {
        if (!is_array($key)) {
            if (array_key_exists($key, $arr)) {
                return true;
            }
        }

        // Check arrays contained in this array
        foreach ($arr as $element) {
            if (is_array($element)) {
                if ($this->validateKeysExists($element, $key)) {
                    return true;
                }
            }
        }

        return false;
    }

    protected function organizeKeys(Array $data)
    {
        $organize = [];
        foreach ($this->validateDataKeys as $key) {
            $organize[$key] = $data[$key];
        }

        return $organize;
    }
}