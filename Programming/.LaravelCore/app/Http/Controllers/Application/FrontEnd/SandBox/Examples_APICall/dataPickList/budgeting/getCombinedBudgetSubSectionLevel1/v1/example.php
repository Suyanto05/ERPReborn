<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\dataPickList\budgeting                       |
|                 \getCombinedBudgetSubSectionLevel1\v1                                                                            |
| ▪ API Key     : dataPickList.budgeting.getCombinedBudgetSubSectionLevel1                                                         |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\dataPickList\budgeting\getCombinedBudgetSubSectionLevel1\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/dataPickList.budgeting.getCombinedBudgetSubSectionLevel1.v1_throughAPIGateway       |
        |                     ► http://172.28.0.4/dataPickList.budgeting.getCombinedBudgetSubSectionLevel1.v1_throughAPIGateway    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-10-31                                                                                           |
        | ▪ Creation Date   : 2022-10-31                                                                                           |
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
                'dataPickList.budgeting.getCombinedBudgetSubSectionLevel1', 
                'latest',
                [
                'parameter' => [
                    'combinedBudgetSection_RefID' => 105000000000001
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/dataPickList.budgeting.getCombinedBudgetSubSectionLevel1.v1_throughAPIGatewayJQuery |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       dataPickList.budgeting.getCombinedBudgetSubSectionLevel1.v1_throughAPIGatewayJQuery                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-10-31                                                                                           |
        | ▪ Creation Date   : 2022-10-31                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGatewayJQuery($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<br>Project RefID ► '.
                '<input type="text" id="dataInput_CombinedBudgetSection_RefID" value=105000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'dataPickList.budgeting.getCombinedBudgetSubSectionLevel1', 
                'latest', 
                '{'.
                    '"parameter" : {'.
                        '"combinedBudgetSection_RefID" : parseInt(document.getElementById("dataInput_CombinedBudgetSection_RefID").value) '.
                        '}'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }