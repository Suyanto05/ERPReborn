<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\fileHandling\download\general\getFileObject  |
|                 \v1                                                                                                              |
| ▪ API Key     : fileHandling.download.combined.general.getFileObject                                                             |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2024 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\fileHandling\download\general\getFileObject\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/fileHandling.download.general.getFileObject.v1_throughAPIGateway                    |
        |                     ► http://172.28.0.4/fileHandling.download.general.getFileObject.v1_throughAPIGateway                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-08-26                                                                                           |
        | ▪ Creation Date   : 2024-08-26                                                                                           |
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
                'fileHandling.download.general.getFileObject', 
                'latest', 
                [
                'parameter' => [
                    'filePath' => 'StagingAreaTemp/267000000000001/268000000000001'
                    ]
                ]
                );

                
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/fileHandling.download.general.getFileObject.v1_throughAPIGatewayJQuery             |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       fileHandling.download.general.getFileObject.v1_throughAPIGatewayJQuery                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-08-26                                                                                           |
        | ▪ Creation Date   : 2024-08-26                                                                                           |
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
            echo '<br>File Path<input type="text" id="dataInput_filePath" value="Archive/92000000000097/12000000000108">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'fileHandling.download.general.getFileObject', 
                'latest', 
                '{'.
                    '"parameter" : {'.
                        '"filePath" : document.getElementById("dataInput_filePath").value'.
                        '}'.
                '}'
                );
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }