<?php
/**
 * @author      Webjump Core Team <dev@webjump.com>
 * @copyright   2017 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 *
 */

namespace Webjump\CreditallSDK\Resource;

use Webjump\CreditallSDK\Resource\FacadeInterface;

use Webjump\CreditallSDK\Factories\PreAnaliseDataRequestFactory;
use Webjump\CreditallSDK\Factories\PreAnaliseRequestFactory;
use Webjump\CreditallSDK\Factories\PreAnaliseDataResponseFactory;

use Webjump\CreditallSDK\Factories\ConsultaCrediarioDataRequestFactory;
use Webjump\CreditallSDK\Factories\ConsultaCrediarioRequestFactory;
use Webjump\CreditallSDK\Factories\ConsultaCrediarioDataResponseFactory;


class CreditallFacade implements FacadeInterface
{
    public function sendPreAnalise($data)
    {
        try {
            $dataRequest = PreAnaliseDataRequestFactory::make($data);
            $return = PreAnaliseRequestFactory::make($dataRequest);
            return PreAnaliseDataResponseFactory::make($return);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function sendConsultaCrediario($data)
    {
        try {
            $dataRequest = ConsultaCrediarioDataRequestFactory::make($data);
            $return = ConsultaCrediarioRequestFactory::make($dataRequest);
            return $return;
//            return ConsultaCrediarioResponseFactory::make($return);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}