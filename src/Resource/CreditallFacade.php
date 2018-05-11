<?php
/**
 * @author      Webjump Core Team
 * @copyright   2017 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 */
namespace Webjump\CreditallSDK\Resource;

use Webjump\CreditallSDK\Resource\FacadeInterface;

use Webjump\CreditallSDK\Factories\PreAnaliseDataRequestFactory;
use Webjump\CreditallSDK\Factories\PreAnaliseRequestFactory;
use Webjump\CreditallSDK\Factories\PreAnaliseDataResponseFactory;

use Webjump\CreditallSDK\Factories\ConsultaCrediarioDataRequestFactory;
use Webjump\CreditallSDK\Factories\ConsultaCrediarioRequestFactory;
use Webjump\CreditallSDK\Factories\ConsultaCrediarioDataResponseFactory;

use Webjump\CreditallSDK\Factories\CadastroCrediarioDataRequestFactory;
use Webjump\CreditallSDK\Factories\CadastroCrediarioRequestFactory;
use Webjump\CreditallSDK\Factories\CadastroCrediarioDataResponseFactory;


class CreditallFacade implements FacadeInterface
{
    public function sendPreAnalise($request)
    {
        try {
            $dataRequest = PreAnaliseDataRequestFactory::make($request);
            $return = PreAnaliseRequestFactory::make($dataRequest);
            return PreAnaliseDataResponseFactory::make($return);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function sendConsultaCrediario($request)
    {
        try {
            $dataRequest = ConsultaCrediarioDataRequestFactory::make($request);
            $return = ConsultaCrediarioRequestFactory::make($dataRequest);
            return ConsultaCrediarioDataResponseFactory::make($return);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function sendCadastroCrediario($request)
    {
        try {
            $dataRequest = CadastroCrediarioDataRequestFactory::make($request);
            $return = CadastroCrediarioRequestFactory::make($dataRequest);
            return CadastroCrediarioDataResponseFactory::make($return);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}