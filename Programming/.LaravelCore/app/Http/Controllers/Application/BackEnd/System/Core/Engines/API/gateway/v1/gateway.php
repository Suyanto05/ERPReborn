<?php


namespace App\Http\Controllers\Application\BackEnd\System\Core\Engines\API\gateway\v1
    {
    class gateway extends \App\Http\Controllers\Controller
        {
        private $varAPIIdentity;

        function __construct()
            {
            $this->varAPIIdentity = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getAPIIdentityFromClassFullName(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), __CLASS__);
            }


        function main($varUserSession, $varData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Gateway (version 1)');
                try {
                    //---- ( MAIN CODE ) ------------------------------------------------------------------------- [ START POINT ] -----
                    //---> Redirection
                    $varAPIKey = $varData['metadata']['API']['key'];
                    $varAPIVersion = $varData['metadata']['API']['version'];
                    $varData = $varData['data'];

                    if((strcmp($varAPIKey, 'authentication.general.setLoginBranchAndUserRole')!=0) AND (!(\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID']))
                        {
                        throw new \Exception('Branch ID has not been determined');
                        }
                    
                    $varDataReceive = [
                        'metadata' => [
                            'API' => [
                                'key' => $varAPIKey,
                                'version' => $varAPIVersion
                                ]
                            ],
                        'data' => $varData
                        ];

                    $varAPIVersionValidity=FALSE;
                    if(strcmp($varAPIVersion, 'latest') == 0)
                        {
                        $varAPIVersionValidity=TRUE;
                        }
                    else
                        {
                        try {
                            if(is_numeric($varAPIVersion*1)==TRUE)
                                {
                                if(is_int($varAPIVersion*1)==TRUE)
                                    {
                                    $varAPIVersionValidity=TRUE;                                    
                                    }
                                }
                            } 
                        catch (\Exception $ex) {
                            }
                        }
                    
                    if($varAPIVersionValidity == TRUE)
                        {
                        //---> Method Call
                        $varDataSend = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setCallAPIEngine($varUserSession, $varAPIKey, $varAPIVersion, $varData, null, $varDataReceive);

                        if($varDataSend['metadata']['successStatus'] == true)
                            {
                            $varReturn = 
                                \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success(
                                    $varUserSession, 
                                    $varDataSend['data'], 
                                    [
                                        'Key' => $varAPIKey, 
                                        'Version' => ((strcmp($varAPIVersion, 'latest') !=0 ) ? $varAPIVersion : (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getAPILatestVersion($varUserSession, $varAPIKey)))
                                    ]
                                    );
                            }
                        else
                            {
                            $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, $varDataSend['data']['code'], $varDataSend['data']['message']);
                            }
                        }
                    else
                        {
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 403, 'Invalid API Version');
                        }
      
                    //---- ( MAIN CODE ) --------------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 401, $ex->getMessage());
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }
        }
    }