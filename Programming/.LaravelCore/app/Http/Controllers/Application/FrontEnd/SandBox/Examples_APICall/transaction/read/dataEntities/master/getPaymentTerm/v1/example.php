<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\read\dataEntities\master         |
|                 \getPaymentTerm\v1                                                                                               |
| ▪ API Key     : transaction.read.dataEntities.master.getPaymentTerm                                                              |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\read\dataEntities\master\getPaymentTerm\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.read.dataEntities.master.getPaymentTerm.v1_throughAPIGateway            |
        |                     ► http://172.28.0.4/transaction.read.dataEntities.master.getPaymentTerm.v1_throughAPIGateway         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-13                                                                                           |
        | ▪ Creation Date   : 2022-09-13                                                                                           |
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
                'transaction.read.dataEntities.master.getPaymentTerm', 
                'latest', 
                [
                'parameter' => [
                    'recordIDSet' => '{174000000000001, 174000000000002}'
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.read.dataEntities.master.getPaymentTerm.v1_throughAPIGatewayJQuery      |
        |                     ► http://172.28.0.4/transaction.read.dataEntities.master.getPaymentTerm.v1_throughAPIGatewayJQuery   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-13                                                                                           |
        | ▪ Creation Date   : 2022-09-13                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGatewayJQuery($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }
            //---Core---
            echo '<input type="text" id="dataInput_RecordIDSet" value="{174000000000001, 174000000000002}">';
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.dataEntities.master.getPaymentTerm', 
                'latest', 
                '{'.
                    '"parameter" : '.
                        '{'.
                        '"recordIDSet" : document.getElementById("dataInput_RecordIDSet").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }