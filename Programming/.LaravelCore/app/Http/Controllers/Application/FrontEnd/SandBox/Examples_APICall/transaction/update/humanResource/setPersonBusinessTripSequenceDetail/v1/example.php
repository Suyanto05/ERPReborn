<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\humanResource             |
|                 \setPersonBusinessTripSequenceDetail\v1                                                                          |
| ▪ API Key     : transaction.update.humanResource.setPersonBusinessTripSequenceDetail                                             |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\humanResource\setPersonBusinessTripSequenceDetail\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.update.humanResource.setPersonBusinessTripSequenceDetail.v1_throughAPIGateway            |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.update.humanResource.setPersonBusinessTripSequenceDetail.v1_throughAPIGateway          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-11-15                                                                                           |
        | ▪ Creation Date   : 2022-09-19                                                                                           |
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
                'transaction.update.humanResource.setPersonBusinessTripSequenceDetail', 
                'latest', 
                [
                'recordID' => 80000000000001,
                'entities' => [
                    "personBusinessTripSequence_RefID" => 76000000000001,
                    "businessTripCostComponentEntity_RefID" => 81000000000001,
                    "amountCurrency_RefID" => 62000000000001,
                    "amountCurrencyValue" => 30000,
                    "amountCurrencyExchangeRate" => 1,
                    "remarks" => 'Catatan'
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.update.humanResource.setPersonBusinessTripSequenceDetail.v1_throughAPIGatewayJQuery      |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.update.humanResource.setPersonBusinessTripSequenceDetail.v1_throughAPIGatewayJQuery    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-19                                                                                           |
        | ▪ Creation Date   : 2022-09-19                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGatewayJQuery($varAPIWebToken)
            {
            /*
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<table border="1" style="border-collapse: collapse;">';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Person Work Time Sheet Main Data</p></td></tr>';
            echo        '<tr><td>RecordID</td><td><input type="text" id="dataInput_RecordID" value=48000000000001></td></tr>';
            echo        '<tr><td>DocumentDateTimeTZ</td><td><input type="text" id="dataInput_DocumentDateTimeTZ" value="2026-01-01 00:00:00 +07"></td></tr>';
            echo        '<tr><td>Person_RefID</td><td><input type="text" id="dataInput_Person_RefID" value=25000000000439></td></tr>';
            echo        '<tr><td>RequesterWorkerJobsPosition_RefID</td><td><input type="text" id="dataInput_StartDateTimeTZ" value="2026-01-01 00:00:00 +07"></td></tr>';
            echo        '<tr><td>StartDateTimeTZ</td><td><input type="text" id="dataInput_FinishDateTimeTZ" value="2026-01-14 00:00:00 +07"></td></tr>';
            echo        '<tr><td>FinishDateTimeTZ</td><td><input type="text" id="dataInput_Project_RefID" value=46000000000009></td></tr>';
            echo        '<tr><td>ColorText</td><td><input type="text" id="dataInput_ColorText" value="#000000"></td></tr>';
            echo        '<tr><td>ColorBackground</td><td><input type="text" id="dataInput_ColorBackground" value="#ababab"></td></tr>';
            echo '</table><br>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.humanResource.setPersonBusinessTripSequenceDetail', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"documentDateTimeTZ" : document.getElementById("dataInput_DocumentDateTimeTZ").value, '.
                        '"person_RefID" : parseInt(document.getElementById("dataInput_Person_RefID").value), '.
                        '"startDateTimeTZ" : document.getElementById("dataInput_StartDateTimeTZ").value, '.
                        '"finishDateTimeTZ" : document.getElementById("dataInput_FinishDateTimeTZ").value, '.
                        '"project_RefID" : parseInt(document.getElementById("dataInput_Project_RefID").value), '.
                        '"colorText" : document.getElementById("dataInput_ColorText").value, '.
                        '"colorBackground" : document.getElementById("dataInput_ColorBackground").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            */
            }
        }
    }