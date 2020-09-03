<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\System\BackEnd                                                                             |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\System\BackEnd
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_API                                                                                                   |
    | ▪ Description : Menangani segala parameter yang terkait API                                                                  |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_API
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setCallAPIEngine                                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000001                                                                                       |
        | ▪ Last Update     : 2020-09-02                                                                                           |
        | ▪ Description     : Memanggil API Engine                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (array)  varAPIKey ► API Key                                                                                      |
        |      ▪ (array)  varAPIVersion ► API Version                                                                              |
        |      ▪ (array)  varData ► Data yang akan diproses                                                                        |
        |      ▪ (string) varFunctionName ► Nama Fungsi yang akan dipanggil                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (mixed)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setCallAPIEngine($varUserSession, $varAPIKey, $varAPIVersion, array $varData, string $varFunctionName=null)
            {
            $varAPIKeyData = explode('.', $varAPIKey);
            $varAPIService = \App\Helpers\ZhtHelper\General\Helper_String::getUpperCaseFirstCharacter($varUserSession, array_shift($varAPIKeyData));
            $varAPIStructure = implode('.', $varAPIKeyData);

            //---> Cek Nama Fungsi yang akan dieksekusi
            if(!$varFunctionName)
                {
                //---> Bila Null, maka disamakan dengan nama fungsi parent yang menginisiasi objek ini
                $varFunctionName = debug_backtrace()[1]['function'];
                }

            //---> Latest Version Translation
            if(strcmp($varAPIVersion, 'latest') == 0)
                {
                $varFileVersionHeader = 'v';
                $varFolderArray = \App\Helpers\ZhtHelper\General\Helper_File::getFilesListInFolder($varUserSession, getcwd().'/./../app/Http/Controllers/Application/BackEnd/System/'.$varAPIService.'/Engines/'.str_replace('.', '/', $varAPIStructure));
                $varLastVersion = 0;
                for($i=0; $i!=count($varFolderArray); $i++)
                    {
                    $varCheckVersion = str_replace($varFileVersionHeader, '', $varFolderArray[$i]);
                    if($varLastVersion < $varCheckVersion)
                        {
                        $varLastVersion = $varCheckVersion;
                        }
                    }
                $varAPIVersion=$varLastVersion;
                }

            //---> Main Process
            $varClass = 'App\\Http\\Controllers\\Application\\BackEnd\\System\\'.$varAPIService.'\\Engines\\'.str_replace('.', '\\', $varAPIStructure).'\\v'.$varAPIVersion.'\\'.$varAPIKeyData[count($varAPIKeyData)-1];
            $varFilePath = \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchFilePath($varUserSession, getcwd(), '/./../'.str_replace('App/', 'app/', str_replace('\\', '/', $varClass)).'.php');
            if(!$varFilePath)
                {
                throw new \Exception('API with Key `'.$varAPIKey.'` version `'.$varAPIVersion.'` does not found');
                }
            require_once($varFilePath);
            $varReturn = (new $varClass())->{$varFunctionName}($varUserSession, $varData);
            return $varReturn;
            }
            
            
            
            

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setEngineResponseDataReturn_Fail                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-27                                                                                           |
        | ▪ Description     : Mendapatkan Fail Engine Return HTTP Response                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (int)    varHTTPErrorCode ► Error Code HTTP Response                                                              |
        |      ▪ (string) varHTTPErrorMessage ► Error Message HTTP Response                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setEngineResponseDataReturn_Fail($varUserSession, int $varHTTPErrorCode, string $varHTTPErrorMessage = null)
            {
            if(!$varHTTPErrorMessage)
                {
                $varHTTPErrorMessage = '';
                }
            $varReturn = [
                "metadata" => [
                    "successStatus" => false
                    ],
                "data" => [
                    "code" => $varHTTPErrorCode,
                    "message" => $varHTTPErrorMessage
                    ]
                ];
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setEngineResponseDataReturn_Success                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-27                                                                                           |
        | ▪ Description     : Mendapatkan Success Engine Return HTTP Response                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (array)  varData ► Data yang akan dikirim oleh HTTP Response                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setEngineResponseDataReturn_Success($varUserSession, array $varData, string $varFullClassName = null)
            {
            if(!$varFullClassName)
                {
                $varFullClassName = '';
                }
            $APIKey = explode('\\', explode('\Engines', explode('App\\Http\\Controllers\\Application\\BackEnd\\System\\', $varFullClassName)[1])[0].explode('\Engines', explode('App\\Http\\Controllers\\Application\\BackEnd\\System\\', $varFullClassName)[1])[1]);
            array_pop($APIKey);
            $APIVersion = str_replace('v', '', array_pop($APIKey));
            $APIKey = \App\Helpers\ZhtHelper\General\Helper_String::getLowerCaseFirstCharacter($varUserSession, implode('.', $APIKey));
            
            $varReturn = [
                "metadata" => [
                    "APIResponse" =>
                        [
                        'key' => $APIKey,
                        'version' => $APIVersion,
                        ],
                    "successStatus" => true
                    ],
                "data" => $varData
                ];
            return $varReturn;
            }
        }
    }