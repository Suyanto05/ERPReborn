<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\upload\archive\general\setFilesFromStagingArea\v1      |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\upload\archive\general\setFilesFromStagingArea\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : setFilesFromStagingArea                                                                                                     |
    | ▪ Description : Menangani API fileHandling.upload.stagingArea.general.setFilesFromStagingArea Version 1                                     |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class setFilesFromStagingArea extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-21                                                                                           |
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
        | ▪ Last Update     : 2022-08-05                                                                                           |
        | ▪ Creation Date   : 2022-08-05                                                                                           |
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
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Create RotateLog File Upload Staging Area Data (version 1)');
                try {
                    //---- ( MAIN CODE ) ------------------------------------------------------------------------- [ START POINT ] -----
                    try {
                        $varDataSend = 
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataRead(
                                $varUserSession,
                                $this->dataProcessing(
                                    $varUserSession,
                                    $varData['parameter']['archiveRecordID'],
                                    $varData['parameter']['stagingAreaRecordPK'],
                                    $varData['parameter']['deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID']
                                    )
                                );
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success($varUserSession, $varDataSend);
                        } 
                    catch (\Exception $ex) {
                        $varErrorMessage = $ex->getMessage();
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 500, 'Invalid SQL Syntax'.($varErrorMessage ? ' ('.$varErrorMessage.')' : ''));
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


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : dataProcessing                                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-05                                                                                           |
        | ▪ Creation Date   : 2022-08-05                                                                                           |
        | ▪ Description     : Fungsi Pemrosesan Data                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session (Mandatory)                                                                |
        |      ▪ (int)    varArchiveRecordID ► Archive Record ID (Mandatory)                                                       |
        |      ▪ (int)    varStagingAreaRecordPK ► Staging Area Record Primary Key (Mandatory)                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private function dataProcessing($varUserSession, int $varArchiveRecordID = null, int $varStagingAreaRecordPK = null, array $varDeleteCandidate_RefIDArray = null)
            {
            //---> Penyusunan JSON dari MasterFileRecord yang berasal dari Staging Area
            $varSQL = '
                SELECT
                    JSON_BUILD_OBJECT(
                        \'itemList\',
                            JSON_BUILD_OBJECT(
                                \'items\', "SubSQL"."JSONData"
                                )
                        )::json AS "JSONData"
                FROM
                    (
                    SELECT
                        (
                        \'[\' || 
                        STRING_AGG(
                            "SubSQL"."JSONData"::varchar,
                            \',\'
                            ) ||
                        \']\'
                        )::json AS "JSONData"
                    FROM
                        (
                        SELECT 
                            JSON_BUILD_OBJECT(
                                \'recordID\', NULL,
                                \'entities\',
                                    JSON_BUILD_OBJECT(
                                        \'log_FileUpload_Object_RefID\', null,
                                        \'rotateLog_FileUploadStagingArea_RefRPK\', "RecordReference",
                                        \'sequence\', "Sequence",
                                        \'name\', "Name",
                                        \'size\', "Size",
                                        \'MIME\', "MIME",
                                        \'extension\', "Extension",
                                        \'lastModifiedDateTimeTZ\', "LastModifiedDateTimeTZ",
                                        \'lastModifiedUnixTimestamp\', "LastModifiedUnixTimestamp",
                                        \'hashMethod_RefID\', "HashMethod_RefID",
                                        \'contentBase64Hash\', "ContentBase64Hash",
                                        \'dataCompression_RefID\', NULL
                                        )
                                ) AS "JSONData",
                            ROW_NUMBER () OVER (
                                ORDER BY
                                    "Sequence" ASC
                                ) AS "OrderSequence"
                        FROM
                            (
                            SELECT
                                *
                            FROM
                                "SchSysAsset"."Func_GetData_FileUpload_MasterFileRecord"(
                                    NULL, 
                                    '.$varStagingAreaRecordPK.'::bigint, 
                                    '.
                                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getSQLSyntax_Source_NumberArrayToBigIntArray(
                                        $varUserSession, 
                                        $varDeleteCandidate_RefIDArray).
                                    '::bigint[]
                                    )
                            WHERE
                                "SignExistOnArchive" = FALSE
                            ) AS "SubSQL"
                        ) AS "SubSQL"
                    ) AS "SubSQL"
                ';
            $varJSON_Log_FileUpload_ObjectDetail = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                $varSQL)['Data'][0]['JSONData'];
            
            //---> Pemasukan Data pada TblLog_FileUpload_Object dam TblLog_FileUpload_ObjectDetail
            $varSysID_Log_FileUpload_Object = 
                (new \App\Models\Database\SchData_OLTP_DataAcquisition\TblLog_FileUpload_Object())->setDataInsert(
                    $varUserSession, 
                    null,
                    null,
                    (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'],
                    \App\Helpers\ZhtHelper\General\Helper_SystemParameter::getApplicationParameter_BaseCurrencyID($varUserSession, (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'], 'Env.System.BaseCurrency.ID'),

                    $varStagingAreaRecordPK,

                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession, 
                        $varJSON_Log_FileUpload_ObjectDetail)
                    )['SignRecordID'];
            dd($varSysID_Log_FileUpload_Object);

/*
            $varMasterFileRecord = 
                (new \App\Models\Database\SchSysAsset\General())->getData_FileUpload_MasterFileRecord(
                    $varUserSession,
                    $varArchiveRecordID,
                    $varStagingAreaRecordPK,
                    $varDeleteCandidate_RefIDArray
                    )['Data'];
            for($i=0, $iMax=count($varMasterFileRecord); $i!=$iMax; $i++)
                {
                
                }
            dd($varMasterFileRecord);
*/            
            }
        }
    }