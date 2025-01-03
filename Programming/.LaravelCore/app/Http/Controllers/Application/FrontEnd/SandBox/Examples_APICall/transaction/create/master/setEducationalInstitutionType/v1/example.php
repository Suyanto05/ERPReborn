<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\master                    |
|                 \setEducationalInstitutionType\v1                                                                                |
| ▪ API Key     : transaction.create.master.setEducationalInstitutionType                                                          |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\master\setEducationalInstitutionType\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.master.setEducationalInstitutionType.v1_throughAPIGateway        |
        |                     ► http://172.28.0.4/transaction.create.master.setEducationalInstitutionType.v1_throughAPIGateway     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-03                                                                                           |
        | ▪ Creation Date   : 2025-01-03                                                                                           |
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
                    'transaction.create.master.setEducationalInstitutionType', 
                    'latest', 
                    [
                    'entities' => [
                        "name" => 'Educational Institution Type Name'
                        ]
                    ]
                    );

            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.master.setEducationalInstitutionType.v1_throughAPIGatewayJQuery  |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.create.master.setEducationalInstitutionType.v1_throughAPIGatewayJQuery                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-03                                                                                           |
        | ▪ Creation Date   : 2025-01-03                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGatewayJQuery($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();
                }

            //---Java Script Library Load---
            echo 
                \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System()
                    );

            //---Core---
            echo '<input type="text" id="dataInput_Name" value="Educational Institution Type Name">';
            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken, 
                    'transaction.create.master.setEducationalInstitutionType', 
                    'latest', 
                    '{'.
                        '"entities" : {'.
                            '"name" : document.getElementById("dataInput_Name").value'.
                            '}'.
                    '}'
                    ); 
            echo "<br><button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            //dd($varJQueryFunction);
            }
        }
    }