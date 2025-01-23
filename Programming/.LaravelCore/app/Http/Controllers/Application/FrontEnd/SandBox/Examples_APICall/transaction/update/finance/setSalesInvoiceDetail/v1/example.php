<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance                   |
|                 \setSalesInvoiceDetail\v1                                                                                        |
| ▪ API Key     : transaction.update.finance.setSalesInvoiceDetail                                                                 |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance\setSalesInvoiceDetail\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.finance.setSalesInvoiceDetail.v1_throughAPIGateway               |
        |                     ► http://172.28.0.4/transaction.update.finance.setSalesInvoiceDetail.v1_throughAPIGateway            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2023-12-12                                                                                           |
        | ▪ Creation Date   : 2023-11-21                                                                                           |
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
                'transaction.update.finance.setSalesInvoiceDetail', 
                'latest',
                [
                "recordID" => 139000000000001,
                "entities" => [
                    "salesInvoice_RefID" => 138000000000001,
                    "salesInvoiceRequisitionDetail_RefID" => 245000000000001,
                    "product_RefID" => 88000000000002,
                    "quantity" => 10,
                    "quantityUnit_RefID" => 73000000000001,
                    "productUnitPriceCurrency_RefID" => 62000000000001,
                    "productUnitPriceCurrencyValue" => 30000,
                    "productUnitPriceCurrencyExchangeRate" => 1,
                    "productUnitPriceDiscountCurrency_RefID" => 62000000000001,
                    "productUnitPriceDiscountCurrencyValue" => 5000,
                    "productUnitPriceDiscountCurrencyExchangeRate" => 1,
                    "remarks" => 'Catatan',
                    "additionalData" => [
                        "transactionTaxItemList" => [
                            "items" => [
                                    [
                                    "recordID" => 185000000000001,
                                    "entities" => [
                                        "taxType_RefID" => 182000000000001,
                                        "tariffCurrency_RefID" => 62000000000001,
                                        "tariffCurrencyValue" => 3000,
                                        "tariffCurrencyExchangeRate" => 1,
                                        "remarks" => null
                                        ]
                                    ],
                                    [
                                    "recordID" => 185000000000002,
                                    "entities" => [
                                        "taxType_RefID" => 182000000000005,
                                        "tariffCurrency_RefID" => 62000000000001,
                                        "tariffCurrencyValue" => 4000,
                                        "tariffCurrencyExchangeRate" => 1,
                                        "remarks" => null
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.finance.setSalesInvoiceDetail.v1_throughAPIGatewayJQuery         |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.update.finance.setSalesInvoiceDetail.v1_throughAPIGatewayJQuery                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2023-12-12                                                                                           |
        | ▪ Creation Date   : 2023-11-21                                                                                           |
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
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Sales Invoice Detail Main Data</p></td></tr>';
            echo        '<tr><td>RecordID</td><td><input type="text" id="dataInput_RecordID" value=139000000000001></td></tr>';
            echo        '<tr><td>SalesInvoice_RefID</td><td><input type="text" id="dataInput_SalesInvoice_RefID" value=138000000000001></td></tr>';
            echo        '<tr><td>SalesInvoiceRequisitionDetail_RefID</td><td><input type="text" id="dataInput_SalesInvoiceRequisitionDetail_RefID" value=245000000000001></td></tr>';
            echo        '<tr><td>Product_RefID</td><td><input type="text" id="dataInput_Product_RefID" value=88000000000002></td></tr>';
            echo        '<tr><td>Quantity</td><td><input type="text" id="dataInput_Quantity" value=10></td></tr>';
            echo        '<tr><td>QuantityUnit_RefID</td><td><input type="text" id="dataInput_QuantityUnit_RefID" value=73000000000001></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrency_RefID</td><td><input type="text" id="dataInput_ProductUnitPriceCurrency_RefID" value=62000000000001></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrencyValue</td><td><input type="text" id="dataInput_ProductUnitPriceCurrencyValue" value=30000></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrencyExchangeRate</td><td><input type="text" id="dataInput_ProductUnitPriceCurrencyExchangeRate" value=1></td></tr>';
            echo        '<tr><td>ProductUnitPriceDiscountCurrency_RefID</td><td><input type="text" id="dataInput_ProductUnitPriceDiscountCurrency_RefID" value=62000000000001></td></tr>';
            echo        '<tr><td>ProductUnitPriceDiscountCurrencyValue</td><td><input type="text" id="dataInput_ProductUnitPriceDiscountCurrencyValue" value=5000></td></tr>';
            echo        '<tr><td>ProductUnitPriceDiscountCurrencyExchangeRate</td><td><input type="text" id="dataInput_ProductUnitPriceDiscountCurrencyExchangeRate" value=1></td></tr>';
            echo        '<tr><td>Remarks</td><td><input type="text" id="dataInput_Remarks" value="Catatan"></td></tr>';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Sales Invoice Detail Detail Data</p></td></tr></tr>';
            echo        '<tr><td>RecordIDDetail_RefID_1</td><td><input type="text" id="dataInput_RecordIDDetail_RefID_1" value=185000000000001></td></tr>';
            echo        '<tr><td>TaxType_RefID_1</td><td><input type="text" id="dataInput_TaxType_RefID_1" value=182000000000001></td></tr>';
            echo        '<tr><td>TariffCurrency_RefID_1</td><td><input type="text" id="dataInput_TariffCurrency_RefID_1" value=62000000000001></td></tr>';
            echo        '<tr><td>TariffCurrencyValue_1</td><td><input type="text" id="dataInput_TariffCurrencyValue_1" value=30000></td></tr>';
            echo        '<tr><td>TariffCurrencyExchangeRate_1</td><td><input type="text" id="dataInput_TariffCurrencyExchangeRate_1" value=1></td></tr>';
            echo        '<tr><td>Remarks_1</td><td><input type="text" id="dataInput_Remarks_1" value="Catatan Pertama"></td></tr>';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff"></p></td></tr></tr>';
            echo        '<tr><td>RecordIDDetail_RefID_2</td><td><input type="text" id="dataInput_RecordIDDetail_RefID_2" value=185000000000002></td></tr>';
            echo        '<tr><td>TaxType_RefID_2</td><td><input type="text" id="dataInput_TaxType_RefID_2" value=182000000000005></td></tr>';
            echo        '<tr><td>TariffCurrency_RefID_2</td><td><input type="text" id="dataInput_TariffCurrency_RefID_2" value=62000000000001></td></tr>';
            echo        '<tr><td>TariffCurrencyValue_2</td><td><input type="text" id="dataInput_TariffCurrencyValue_2" value=40000></td></tr>';
            echo        '<tr><td>TariffCurrencyExchangeRate_2</td><td><input type="text" id="dataInput_TariffCurrencyExchangeRate_2" value=1></td></tr>';
            echo        '<tr><td>Remarks_2</td><td><input type="text" id="dataInput_Remarks_2" value="Catatan Kedua"></td></tr>';
            echo '</table><br>';

            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.finance.setSalesInvoiceDetail', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"salesInvoice_RefID" : parseInt(document.getElementById("dataInput_SalesInvoice_RefID").value), '.
                        '"salesInvoiceRequisitionDetail_RefID" : parseInt(document.getElementById("dataInput_SalesInvoiceRequisitionDetail_RefID").value), '.
                        '"product_RefID" : parseInt(document.getElementById("dataInput_Product_RefID").value), '.
                        '"quantity" : parseFloat(document.getElementById("dataInput_Quantity").value), '.
                        '"quantityUnit_RefID" : parseInt(document.getElementById("dataInput_QuantityUnit_RefID").value), '.
                        '"productUnitPriceCurrency_RefID" : parseInt(document.getElementById("dataInput_ProductUnitPriceCurrency_RefID").value), '.
                        '"productUnitPriceCurrencyValue" : parseFloat(document.getElementById("dataInput_ProductUnitPriceCurrencyValue").value), '.
                        '"productUnitPriceCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_ProductUnitPriceCurrencyExchangeRate").value), '.
                        '"productUnitPriceDiscountCurrency_RefID" : parseInt(document.getElementById("dataInput_ProductUnitPriceDiscountCurrency_RefID").value), '.
                        '"productUnitPriceDiscountCurrencyValue" : parseFloat(document.getElementById("dataInput_ProductUnitPriceDiscountCurrencyValue").value), '.
                        '"productUnitPriceDiscountCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_ProductUnitPriceDiscountCurrencyExchangeRate").value), '.
                        '"remarks" : document.getElementById("dataInput_Remarks").value, '.
                        '"additionalData" : {'.
                            '"transactionTaxItemList" : {'.
                                '"items" : ['.
                                        '{'.
                                        '"recordID" : parseInt(document.getElementById("dataInput_RecordIDDetail_RefID_1").value), '.
                                        '"entities" : '.
                                            '{'.
                                            '"taxType_RefID" : parseInt(document.getElementById("dataInput_TaxType_RefID_1").value), '.
                                            '"tariffCurrency_RefID" : parseInt(document.getElementById("dataInput_TariffCurrency_RefID_1").value), '.
                                            '"tariffCurrencyValue" : parseFloat(document.getElementById("dataInput_TariffCurrencyValue_1").value), '.
                                            '"tariffCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_TariffCurrencyExchangeRate_1").value), '.
                                            '"remarks" : document.getElementById("dataInput_Remarks_1").value'.
                                            '}'.
                                        '}, '.
                                        '{'.
                                        '"recordID" : parseInt(document.getElementById("dataInput_RecordIDDetail_RefID_2").value), '.
                                        '"entities" : '.
                                            '{'.
                                            '"taxType_RefID" : parseInt(document.getElementById("dataInput_TaxType_RefID_2").value), '.
                                            '"tariffCurrency_RefID" : parseInt(document.getElementById("dataInput_TariffCurrency_RefID_2").value), '.
                                            '"tariffCurrencyValue" : parseFloat(document.getElementById("dataInput_TariffCurrencyValue_2").value), '.
                                            '"tariffCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_TariffCurrencyExchangeRate_2").value), '.
                                            '"remarks" : document.getElementById("dataInput_Remarks_2").value'.
                                            '}'.
                                        '}'.
                                    ']'.
                                '}'.
                            '}'.
                        '}'.

                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }