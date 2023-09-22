<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\documentForm\general             |
|                 \getAllDocumentTypeByFormNumber\v1                                                                               |
| ▪ API Key     : report.form.documentForm.general.getAllDocumentTypeByFormNumber                                                  |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\documentForm\general\getAllDocumentTypeByFormNumber\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     report.form.documentForm.general.getAllDocumentTypeByFormNumber.v1_throughAPIGateway                 |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       report.form.documentForm.general.getAllDocumentTypeByFormNumber.v1_throughAPIGateway               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-09-21                                                                                           |
        | ▪ Creation Date   : 2023-09-21                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'report.form.documentForm.general.getAllDocumentTypeByFormNumber', 
                'latest',
                [
                'parameter' => [
                    'formNumber' => 'PR/QDC/2023/000017',
                    'approverEntity_RefID' => 164000000000196
                    ]
                ]
                );
            //dd($varData);
            var_dump($varData);
            //var_dump(json_encode($varData));
            }
        }
    }