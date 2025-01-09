<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\resume\master                    |
|                 \getBusinessDocumentDispositionHistory\v1                                                                        |
| ▪ API Key     : report.form.resume.master.getBusinessDocumentDispositionHistory                                                  |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\resume\master\getBusinessDocumentDispositionHistory\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     report.form.resume.master.getBusinessDocumentDispositionHistory.v1_throughAPIGateway                 |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       report.form.resume.master.getBusinessDocumentDispositionHistory.v1_throughAPIGateway               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-06-13                                                                                           |
        | ▪ Creation Date   : 2023-06-13                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();
                }

            //---Core---
            $varData =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken, 
                    'report.form.resume.master.getBusinessDocumentDispositionHistory', 
                    'latest',
                    [
                    'parameter' => [
                        'recordID' => 74000000020323 // 74000000000003 // Business Document ID
                        //'recordID' => 75000001493195 // Business Document Version ID
                        //'recordID' => 75000001493374
                        ]
                    ]
                    );

            var_dump($varData);
            }
        }
    }