<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Report\Engines\form\resume\master                                |
|                \getBusinessDocumentFilterByDocumentTypeID\v1                                                                        |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

namespace App\Http\Controllers\Application\BackEnd\System\Report\Engines\form\resume\master\getBusinessDocumentFilterByDocumentTypeID\v1 {

    use Illuminate\Support\Facades\Redis;

    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getBusinessDocumentFilterByDocumentTypeID                                                                       |
    | ▪ Description : Menangani API report.form.resume.master.getBusinessDocumentFilterByDocumentTypeID Version 1                     |
    +------------------------------------------------------------------------------------------------------------------------------+
    */

    class getBusinessDocumentFilterByDocumentTypeID extends \App\Http\Controllers\Controller
    {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-06-20                                                                                           |
        | ▪ Create date     : 2023-06-20                                                                                           |
        | ▪ Description     : System's Default Constructor                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        function __construct()
        {
        }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : main                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-06-20                                                                                           |
        | ▪ Create date     : 2023-06-20                                                                                           |
        | ▪ Description     : Fungsi Utama Engine                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        function main($varUserSession, $varData)
        {

            $varReturn = null;
            $varBufferDB =
                (new \App\Models\Database\SchData_OLTP_Master\General())->getBusinessDocumentLastVersionByBusDocType(
                    $varUserSession,
                    $varData['parameter']['recordID']
                );

            if (count($varBufferDB) > 0) {
                for ($i = 0; $i < count($varBufferDB); $i++) {
                    $varReturn =
                        (new \App\Models\Database\SchData_OLTP_Master\General())->getIDTranslation_BusinessDocumentVersionToBusinessDocumentForm(
                            $varUserSession,
                            (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'],
                            $varBufferDB[$i]['BusinessDocumentVersion_RefID']
                        );
                    if ($varReturn != []) {
                        $varReturn = $varReturn[0]['BusinessDocumentForm_RefID'];
                        break;
                    }
                }
            }

            $userSessionID = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            $branchID = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($userSessionID)['branchID'];

            $varTTL = 86400; // 24 Jam
            // GET DATA MASTER BUDGET 
            $varCheckDocumentTypeID =
                (new \App\Models\Database\SchData_OLTP_Master\General())->getReport_Form_Resume_BusinessDocumentFilterByDocumentTypeID(
                    $userSessionID,
                    $branchID,
                    $varReturn

                );

            //SET REDIS BUDGET

            \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue(
                $userSessionID,
                "CheckDocumentTypeID" . $varData['parameter']['recordID'],
                json_encode($varCheckDocumentTypeID),
                $varTTL
            );


            return [];



            // $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            // try {
            //     $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Report Form - Resume - Business Document Filter By Document Type ID (version 1)');
            //     try {
            //         //---- ( MAIN CODE ) ------------------------------------------------------------------------- [ START POINT ] -----
            //         try {
            //             $varRecordID = 
            //                 $this->dataProcess(
            //                     $varUserSession,
            //                     $varData['parameter']['recordID']
            //                     );
            //         if (is_null($varRecordID))
            //             {
            //             $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 401, 'Invalid Form Number');                            
            //             }
            //         else
            //             {
            //             if (!($varDataSend = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataRead($varUserSession, (new \App\Models\Database\SchData_OLTP_Master\General())->getReport_Form_Resume_BusinessDocumentFilterByDocumentTypeID(
            //                 $varUserSession, 
            //                 (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'],

            //                 $varRecordID

            //                 ))))
            //                 {
            //                 throw new \Exception();
            //                 }
            //             $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success($varUserSession, $varDataSend);
            //             } 
            //         }
            //         catch (\Exception $ex) {
            //             $varErrorMessage = $ex->getMessage();
            //             $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 500, 'Invalid SQL Syntax'.($varErrorMessage ? ' ('.$varErrorMessage.')' : ''));
            //             }
            //         //---- ( MAIN CODE ) --------------------------------------------------------------------------- [ END POINT ] -----
            //         \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
            //         } 
            //     catch (\Exception $ex) {
            //         $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 401, $ex->getMessage());
            //         \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
            //         }
            //     \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
            //     } 
            // catch (\Exception $ex) {
            //     }
            // return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            // }



            // private function dataProcess($varUserSession, int $BusinessDocumentTypeID)
            // {
            //     $varReturn = null;
            //     $varBufferDB = 
            //         (new \App\Models\Database\SchData_OLTP_Master\General())->getBusinessDocumentLastVersionByBusDocType(
            //             $varUserSession,
            //             $BusinessDocumentTypeID
            //             );
            //     if (count($varBufferDB) > 0) {
            //         for($i = 0; $i < count($varBufferDB); $i++){
            //             $varReturn = 
            //             (new \App\Models\Database\SchData_OLTP_Master\General())->getIDTranslation_BusinessDocumentVersionToBusinessDocumentForm(
            //                 $varUserSession, 
            //                 (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'], 
            //                 $varBufferDB[$i]['BusinessDocumentVersion_RefID']
            //                 );
            //             if($varReturn != []){
            //                 $varReturn = $varReturn[0]['BusinessDocumentForm_RefID'];
            //                 break;
            //             }
            //         }
            //     }
            //     return $varReturn;
        }
    }
}
