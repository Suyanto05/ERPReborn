<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\PDF\dataList\master                   |
|                 \getBusinessDocumentType\v1                                                                                      |
| ▪ API Key     : report.PDF.dataList.master.getBusinessDocumentType                                                               |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\PDF\dataList\master\getBusinessDocumentType\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/report.PDF.dataList.master.getBusinessDocumentType.v1_throughAPIGateway             |
        |                     ► http://172.28.0.4/report.PDF.dataList.master.getBusinessDocumentType.v1_throughAPIGateway          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-25                                                                                           |
        | ▪ Creation Date   : 2022-07-25                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayReport(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'report.PDF.dataList.master.getBusinessDocumentType', 
                'latest', 
                [
                'outputFileName' => 'Data List - Business Document Type.pdf',
                'parameter' => [
                    ]
                ]
                );
            var_dump($varData);
            }
        }
    }