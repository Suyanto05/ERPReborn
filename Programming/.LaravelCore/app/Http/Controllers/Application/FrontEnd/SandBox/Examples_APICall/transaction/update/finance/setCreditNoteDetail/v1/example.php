<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance                   |
|                 \setCreditNoteDetail\v1                                                                                          |
| ▪ API Key     : transaction.update.finance.setCreditNoteDetail                                                                   |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance\setCreditNoteDetail\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.finance.setCreditNoteDetail.v1_throughAPIGateway                 |
        |                     ► http://172.28.0.4/transaction.update.finance.setCreditNoteDetail.v1_throughAPIGateway              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-13                                                                                           |
        | ▪ Creation Date   : 2025-01-13                                                                                           |
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
                        'transaction.update.finance.setCreditNoteDetail', 
                        'latest',
                    //-----[ HEADER ]-----( END )-----

                    //-----[ BODY ]-----( START )-----
                        [
                        'recordID' => 243000000000001,
                        'entities' => [
                            "creditNote_RefID" => 242000000000001,
                            "customerBankAccount_RefID" => 167000000000005,
                            "remarks" => 'Catatan 1'
                            ]
                        ]
                    //-----[ BODY ]-----( END )-----
                    );

            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.finance.setCreditNoteDetail.v1_throughAPIGatewayJQuery           |
        |                     ► http://172.28.0.4/transaction.update.finance.setCreditNoteDetail.v1_throughAPIGatewayJQuery        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-13                                                                                           |
        | ▪ Creation Date   : 2025-01-13                                                                                           |
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
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Credit Note Detail Main Data</p></td></tr>';
            echo        '<tr><td>RecordID</td><td><input type="text" id="dataInput_RecordID" value=243000000000001></td></tr>';
            echo        '<tr><td>CreditNote_RefID</td><td><input type="text" id="dataInput_CreditNote_RefID" value=242000000000001></td></tr>';
            echo        '<tr><td>CustomerBankAccount_RefID</td><td><input type="text" id="dataInput_CustomerBankAccount_RefID" value=167000000000005></td></tr>';
            echo        '<tr><td>Remarks</td><td><input type="text" id="dataInput_Remarks" value="Catatan 1"></td></tr>';
            echo '</table><br>';

            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    //-----[ HEADER ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                        $varAPIWebToken, 
                        'transaction.update.finance.setCreditNoteDetail', 
                        'latest',
                    //-----[ HEADER ]-----( END )-----

                    //-----[ BODY ]-----( START )-----
                        '{'.
                        '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                        '"entities" : {'.
                            '"creditNote_RefID" : parseInt(document.getElementById("dataInput_CreditNote_RefID").value), '.
                            '"customerBankAccount_RefID" : parseInt(document.getElementById("dataInput_CustomerBankAccount_RefID").value), '.
                            '"remarks" : document.getElementById("dataInput_Remarks").value'.
                            '}'.
                        '}'
                    //-----[ BODY ]-----( END )-----
                    );

            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";

            dd($varJQueryFunction);
            }
        }
    }