<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Finance                                                                         |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_Finance
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblPaymentFunding                                                                                            |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-Finance ► TblPaymentFunding                                         |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblPaymentFunding extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-30                                                                                           |
        | ▪ Creation Date   : 2022-09-30                                                                                           |
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
            parent::__construct(__CLASS__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataInsert                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-30                                                                                           |
        | ▪ Creation Date   : 2022-09-30                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |      ▪ (int)    varSysBaseCurrency_RefID ► System Base Currency Reference ID                                             |
        |        ----------------------------------------                                                                          |
        |      ▪ (string) varDocumentDateTimeTZ ► Document DateTimeTZ                                                              |
        |      ▪ (int)    varLog_FileUpload_Pointer_RefID ► File Attachments Reference ID                                                 |
        |      ▪ (int)    varRequesterPerson_RefID ► Requester Person Reference ID                                                 |
        |      ▪ (int)    varBeneficiaryPerson_RefID ► Beneficiary Person Reference ID                                             |
        |      ▪ (int)    varBeneficiaryBankAccount_RefID ► Beneficiary Bank Account Reference ID                                  |
        |      ▪ (string) varInternalNotes ► InternalNotes                                                                         |
        |      ▪ (string) varRemarks ► Remarks                                                                                     |
        |        ----------------------------------------                                                                          |
        |      ▪ (array)  varAdditionalData ► Additional Data                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        /*public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, int $varSysBaseCurrency_RefID = null,
            string $varDocumentDateTimeTZ = null, int $varLog_FileUpload_Pointer_RefID = null, int $varRequesterPerson_RefID = null, int $varBeneficiaryPerson_RefID = null, int $varBeneficiaryBankAccount_RefID = null, string $varInternalNotes = null, string $varRemarks = null,
            array $varAdditionalData = [])
            {
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                    $varUserSession,
                    parent::getSchemaName($varUserSession).'.Func_'.parent::getTableName($varUserSession).'_SET',
                    [
                        [$varUserSession, 'bigint'],
                        [null, 'bigint'],
                        [$varSysDataAnnotation, 'varchar'],
                        [$varSysPartitionRemovableRecordKeyRefType, 'varchar'],
                        [$varSysBranch_RefID, 'bigint'],
                        [$varSysBaseCurrency_RefID, 'bigint'],
                        
                        [$varDocumentDateTimeTZ, 'timestamptz'],
                        [$varLog_FileUpload_Pointer_RefID, 'bigint'],
                        [$varRequesterPerson_RefID, 'bigint'],
                        [$varBeneficiaryPerson_RefID, 'bigint'],
                        [$varBeneficiaryBankAccount_RefID, 'bigint'],
                        [$varInternalNotes, 'varchar'],
                        [$varRemarks, 'varchar'],

                        [((count($varAdditionalData) === 0) ? null : \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode($varUserSession, $varAdditionalData)), 'json']
                    ]
                    )
                );
            return $varReturn['Data'][0];
            }*/


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataUpdate                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-30                                                                                           |
        | ▪ Creation Date   : 2022-09-30                                                                                           |
        | ▪ Description     : Data Update                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |      ▪ (int)    varSysBaseCurrency_RefID ► System Base Currency Reference ID                                             |
        |        ----------------------------------------                                                                          |
        |      ▪ (string) varDocumentDateTimeTZ ► Document DateTimeTZ                                                              |
        |      ▪ (int)    varLog_FileUpload_Pointer_RefID ► File Attachments Reference ID                                                 |
        |      ▪ (int)    varRequesterPerson_RefID ► Requester Person Reference ID                                                 |
        |      ▪ (int)    varBeneficiaryPerson_RefID ► Beneficiary Person Reference ID                                             |
        |      ▪ (int)    varBeneficiaryBankAccount_RefID ► Beneficiary Bank Account Reference ID                                  |
        |      ▪ (string) varInternalNotes ► InternalNotes                                                                         |
        |      ▪ (string) varRemarks ► Remarks                                                                                     |
        |        ----------------------------------------                                                                          |
        |      ▪ (array)  varAdditionalData ► Additional Data                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        /*public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, int $varSysBaseCurrency_RefID = null,
            string $varDocumentDateTimeTZ = null, int $varLog_FileUpload_Pointer_RefID = null, int $varRequesterPerson_RefID = null, int $varBeneficiaryPerson_RefID = null, int $varBeneficiaryBankAccount_RefID = null, string $varInternalNotes = null, string $varRemarks = null,
            array $varAdditionalData = [])
            {
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                    $varUserSession,
                    parent::getSchemaName($varUserSession).'.Func_'.parent::getTableName($varUserSession).'_SET',
                    [
                        [$varUserSession, 'bigint'],
                        [$varSysID, 'bigint'],
                        [$varSysDataAnnotation, 'varchar'],
                        [$varSysPartitionRemovableRecordKeyRefType, 'varchar'],
                        [$varSysBranch_RefID, 'bigint'],
                        [$varSysBaseCurrency_RefID, 'bigint'],

                        [$varDocumentDateTimeTZ, 'timestamptz'],
                        [$varLog_FileUpload_Pointer_RefID, 'bigint'],
                        [$varRequesterPerson_RefID, 'bigint'],
                        [$varBeneficiaryPerson_RefID, 'bigint'],
                        [$varBeneficiaryBankAccount_RefID, 'bigint'],
                        [$varInternalNotes, 'varchar'],
                        [$varRemarks, 'varchar'],

                        [((count($varAdditionalData) === 0) ? null : \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode($varUserSession, $varAdditionalData)), 'json']
                    ]
                    )
                );
            return $varReturn['Data'][0];
            }*/
        }
    }