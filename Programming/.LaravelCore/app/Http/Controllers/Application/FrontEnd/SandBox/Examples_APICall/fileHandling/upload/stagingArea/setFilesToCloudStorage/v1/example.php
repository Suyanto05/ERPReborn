<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\fileHandling\upload\stagingArea\             |
|                 \setFilesToCloudStorage\v1                                                                                       |
| ▪ API Key     : fileHandling.upload.stagingArea.setFilesToCloudStorage                                                           |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\fileHandling\upload\stagingArea\setFilesToCloudStorage\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/fileHandling.upload.stagingArea.setFilesToCloudStorage.v1_throughAPIGateway         |
        |                     ► http://172.28.0.4/fileHandling.upload.stagingArea.setFilesToCloudStorage.v1_throughAPIGateway      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-25                                                                                           |
        | ▪ Last Update     : 2022-07-25                                                                                           |
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
                'fileHandling.upload.stagingArea.setFilesToCloudStorage', 
                'latest', 
                [
                'rotateLog_FileUploadStagingArea_RefRPK' => 1,
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/fileHandling.upload.stagingArea.setFilesToCloudStorage.v1_throughAPIGatewayJQuery   |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       fileHandling.upload.stagingArea.setFilesToCloudStorage.v1_throughAPIGatewayJQuery                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-25                                                                                           |
        | ▪ Last Update     : 2022-07-25                                                                                           |
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
            echo '<br>FileUploadStagingArea_RefRPK<input type="text" id="dataInput_rotateLog_FileUploadStagingArea_RefRPK" value=1>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'fileHandling.upload.stagingArea.setFilesToCloudStorage', 
                'latest', 
                '{'.
                    '"rotateLog_FileUploadStagingArea_RefRPK" : parseInt(document.getElementById("dataInput_rotateLog_FileUploadStagingArea_RefRPK").value)'.
                '}'
                );
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }