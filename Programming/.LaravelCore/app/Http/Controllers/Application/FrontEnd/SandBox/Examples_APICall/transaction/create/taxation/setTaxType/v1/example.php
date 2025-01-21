<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\taxation\setTaxType\v1    |
| ▪ API Key     : transaction.create.taxation.setTaxType                                                                           |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\taxation\setTaxType\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.taxation.setTaxType.v1_throughAPIGateway                         |
        |                     ► http://172.28.0.4/transaction.create.taxation.setTaxType.v1_throughAPIGateway                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-21                                                                                           |
        | ▪ Creation Date   : 2025-01-21                                                                                           |
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
                    //-----[ HEADER ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken, 
                        'transaction.create.taxation.setTaxType', 
                        'latest',
                    //-----[ HEADER ]-----( END )-----

                    //-----[ BODY ]-----( START )-----
                        [
                        'entities' => [
                            "name" => 'Tax Name',
                            "annotation" => 'My Annotation',
                            ]
                        ]                    
                    //-----[ BODY ]-----( END )-----
                    );

            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.taxation.setTaxType.v1_throughAPIGatewayJQuery                   |
        |                     ► http://172.28.0.4/transaction.create.taxation.setTaxType.v1_throughAPIGatewayJQuery                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-21                                                                                           |
        | ▪ Creation Date   : 2025-01-21                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGatewayJQuery($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();
                }

            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());

            echo '<table border="1" style="border-collapse: collapse;">';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Tax Type Main Data</p></td></tr>';
            echo        '<tr><td>Name</td><td><input type="text" id="dataInput_Name" value="Tax Name"></td></tr>';
            echo        '<tr><td>Annotation</td><td><input type="text" id="dataInput_Annotation" value="My Annotation"></td></tr>';
            echo '</table><br>';

            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    //-----[ HEADER ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                        $varAPIWebToken, 
                        'transaction.create.taxation.setTaxType', 
                        'latest',
                    //-----[ HEADER ]-----( END )-----

                    //-----[ BODY ]-----( START )-----
                        '{'.
                        '"entities" : {'.
                                '"name" : document.getElementById("dataInput_Name").value, '.
                                '"annotation" : document.getElementById("dataInput_Annotation").value'.
                            '}'.
                        '}'
                    //-----[ BODY ]-----( END )-----
                    );

            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";

            dd($varJQueryFunction);
            }
        }
    }