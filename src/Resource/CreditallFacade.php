<?php
/**
 * @author      Webjump Core Team <dev@webjump.com>
 * @copyright   2017 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 *
 */

namespace Webjump\Creditall_SDK\Resource;

use Webjump\Creditall_SDK\Resource\FacadeInterface;

use Webjump\Creditall_SDK\Factories\PreAnaliseDataRequestFactory;
use Webjump\Creditall_SDK\Factories\PreAnaliseRequestFactory;
use Webjump\Creditall_SDK\Factories\PreAnaliseDataResponseFactory;

use Webjump\Creditall_SDK\Factories\ConsultaCrediarioDataRequestFactory;
use Webjump\Creditall_SDK\Factories\ConsultaCrediarioRequestFactory;
use Webjump\Creditall_SDK\Factories\ConsultaCrediarioDataResponseFactory;


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