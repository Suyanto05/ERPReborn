<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance                   |
|                 \setProformaInvoiceSupplierDetail\v1                                                                             |
| ▪ API Key     : transaction.update.finance.setProformaInvoiceSupplierDetail                                                      |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance\setProformaInvoiceSupplierDetail\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.finance.setProformaInvoiceSupplierDetail.v1_throughAPIGateway    |
        |                     ► http://172.28.0.4/transaction.update.finance.setProformaInvoiceSupplierDetail.v1_throughAPIGateway |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-28                                                                                           |
        | ▪ Creation Date   : 2022-09-28                                                                                           |
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
                'transaction.update.finance.setInvoiceSupplierDetail', 
                'latest', 
                [
                'recordID' => 206000000000001,
                'entities' => [
                    "proformaInvoiceSupplier_RefID" => 205000000000001,
                    "purchaseOrderDetail_RefID" => 86000000000001,
                    "product_RefID" => 88000000000689,
                    "quantity" => 10.00,
                    "quantityUnit_RefID" => 73000000000001,
                    "priceCurrency_RefID" => 62000000000001,
                    "priceCurrencyValue" => 30000.00,
                    "priceCurrencyExchangeRate" => 1,
                    "remarks" => 'My Remarks'
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.update.finance.setProformaInvoiceSupplierDetail.v1_throughAPIGatewayJQuery               |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.update.finance.setProformaInvoiceSupplierDetail.v1_throughAPIGatewayJQuery             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-28                                                                                           |
        | ▪ Creation Date   : 2022-09-28                                                                                           |
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
            echo '<table border="1" style="border-collapse: collapse;">';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Invoice Supplier Main Data</p></td></tr>';
            echo    '<tr><td>RecordID</td><td><input type="text" id="dataInput_RecordID" value=206000000000001></td></tr>';
            echo    '<tr><td>ProformaInvoiceSupplier_RefID</td><td><input type="text" id="dataInput_ProformaInvoiceSupplier_RefID" value=205000000000001></td></tr>';
            echo    '<tr><td>PurchaseOrderDetail_RefID</td><td><input type="text" id="dataInput_PurchaseOrderDetail_RefID" value=86000000000001></td></tr>';
            echo    '<tr><td>Product_RefID</td><td><input type="text" id="dataInput_Product_RefID" value=88000000000689></td></tr>';
            echo    '<tr><td>Quantity</td><td><input type="text" id="dataInput_Quantity" value=10></td></tr>';
            echo    '<tr><td>QuantityUnit_RefID</td><td><input type="text" id="dataInput_QuantityUnit_RefID" value=73000000000001></td></tr>';
            echo    '<tr><td>PriceCurrency_RefID</td><td><input type="text" id="dataInput_PriceCurrency_RefID" value=62000000000001></td></tr>';
            echo    '<tr><td>PriceCurrencyValue</td><td><input type="text" id="dataInput_PriceCurrencyValue" value=30000.00></td></tr>';
            echo    '<tr><td>PriceCurrencyExchangeRate</td><td><input type="text" id="dataInput_PriceCurrencyExchangeRate" value=1.00></td></tr>';
            echo    '<tr><td>Remarks</td><td><input type="text" id="dataInput_Remarks" value="Catatan"></td></tr>';
            echo '</table><br>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.finance.setInvoiceSupplierDetail', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"proformaInvoiceSupplier_RefID" : parseInt(document.getElementById("dataInput_ProformaInvoiceSupplier_RefID").value), '.
                        '"purchaseOrderDetail_RefID" : parseInt(document.getElementById("dataInput_PurchaseOrderDetail_RefID").value), '.
                        '"product_RefID" : parseInt(document.getElementById("dataInput_Product_RefID").value), '.
                        '"quantity" : parseFloat(document.getElementById("dataInput_Quantity").value), '.
                        '"quantityUnit_RefID" : parseInt(document.getElementById("dataInput_QuantityUnit_RefID").value), '.
                        '"priceCurrency_RefID" : parseInt(document.getElementById("dataInput_PriceCurrency_RefID").value), '.
                        '"priceCurrencyValue" : parseFloat(document.getElementById("dataInput_PriceCurrencyValue").value), '.
                        '"priceCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_PriceCurrencyExchangeRate").value), '.
                        '"remarks" : document.getElementById("dataInput_Remarks").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }