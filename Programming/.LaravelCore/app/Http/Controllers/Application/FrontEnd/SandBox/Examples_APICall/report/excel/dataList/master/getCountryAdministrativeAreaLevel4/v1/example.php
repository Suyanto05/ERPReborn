<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\excel\dataList\master                 |
|                 \getCountryAdministrativeAreaLevel4\v1                                                                           |
| ▪ API Key     : report.excel.dataList.master.getCountryAdministrativeAreaLevel4                                                  |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\excel\dataList\master\getCountryAdministrativeAreaLevel4\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     report.excel.dataList.master.getCountryAdministrativeAreaLevel4.v1_throughAPIGateway                 |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       report.excel.dataList.master.getCountryAdministrativeAreaLevel4.v1_throughAPIGateway               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-22                                                                                           |
        | ▪ Last Update     : 2022-07-22                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayDownloadExcel(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'report.excel.dataList.master.getCountryAdministrativeAreaLevel4', 
                'latest', 
                [
                'outputFileName' => 'Data List - Country Administrative Area Level 4.xlsx',
                'parameter' => [
                    'countryAdministrativeAreaLevel3_RefID' => 23000000000001
                    ]
                ]
                );
            }
        }
    }