<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Project                                                                         |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 - 2024 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_Project
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblProjectSection                                                                                            |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-Project ► TblProjectSection                                         |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblProjectSection extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-09                                                                                           |
        | ▪ Creation Date   : 2020-09-09                                                                                           |
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
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2024-05-10                                                                                           |
        | ▪ Creation Date   : 2021-07-07                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |      ▪ (int)    varSysBaseCurrency_RefID ► System Base Currency Reference ID                                             |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varBusinessDocumentVersion_RefID ► Business Document Version Reference ID                                |
        |      ▪ (int)    varProject_RefID ► Project Reference ID                                                                  |
        |      ▪ (string) varName ► Name                                                                                           |
        |      ▪ (string) varCode ► Project Section Code                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, int $varSysBaseCurrency_RefID = null,
            int $varBusinessDocumentVersion_RefID = null, int $varProject_RefID = null, string $varName = null, string $varCode = null)
            {
            $varReturn =
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
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

                            [$varBusinessDocumentVersion_RefID, 'bigint'],
                            [$varProject_RefID, 'bigint'],
                            [$varName, 'varchar'],
                            [$varCode, 'varchar']
                        ]
                        )
                    );

            return $varReturn['Data'][0];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataSynchronize                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-16                                                                                           |
        | ▪ Creation Date   : 2020-11-16                                                                                           |
        | ▪ Description     : Data Synchronize                                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataSynchronize($varUserSession)
            {
            $varReturn =
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig-Synchronize.Func_'.parent::getSchemaName($varUserSession).'_'.parent::getTableName($varUserSession),
                        []
                        )
                    );
            $varReturn = [];

            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataUpdate                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2024-05-10                                                                                           |
        | ▪ Creation Date   : 2021-07-07                                                                                           |
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
        |      ▪ (int)    varBusinessDocumentVersion_RefID ► Business Document Version Reference ID                                |
        |      ▪ (int)    varProject_RefID ► Project Reference ID                                                                  |
        |      ▪ (string) varName ► Name                                                                                           |
        |      ▪ (string) varCode ► Project Section Code                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, int $varSysBaseCurrency_RefID = null,
            int $varBusinessDocumentVersion_RefID = null, int $varProject_RefID = null, string $varName = null, string $varCode = null)
            {
            $varReturn =
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
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

                            [$varBusinessDocumentVersion_RefID, 'bigint'],
                            [$varProject_RefID, 'bigint'],
                            [$varName, 'varchar'],
                            [$varCode, 'varchar']
                        ],
                        )
                    );

            return $varReturn['Data'][0];            
            }
        }
    }