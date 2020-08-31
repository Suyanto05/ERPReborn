<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Redis                                                                                                 |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Redis
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : DefaultClassPrototype                                                                                        |
    | ▪ Description : Menangani Prototype untuk diwariskan ke Class Models Redis                                                   |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | Class Properties                                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private $varKeyHeader;


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-28                                                                                           |
        | ▪ Description     : System's Default Constructor                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function __construct() 
            {
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : init                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-28                                                                                           |
        | ▪ Description     : Inisialisasi                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed) varUserSession                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        protected function init($varUserSession, string $varClassName)
            {
            $this->varKeyHeader = \App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID().'::'.(\App\Helpers\ZhtHelper\General\Helper_PHPObject::getClassNameFromNameSpace($varUserSession, $varClassName));
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataRecord                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-28                                                                                           |
        | ▪ Description     : Mendapatkan nilai dari suatu key (varKey)                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (string) varKey ► Data Key                                                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataRecord($varUserSession, string $varKey)
            {
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_Redis::getValue($varUserSession, $this->varKeyHeader.'::'.$varKey);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataTTL                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-28                                                                                           |
        | ▪ Description     : Mendapatkan TTL dari suatu key (varKey)                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (string) varKey ► Data Key                                                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataTTL($varUserSession, string $varKey)
            {
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_Redis::getTTL($varUserSession, $this->varKeyHeader.'::'.$varKey);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataDelete                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-28                                                                                           |
        | ▪ Description     : Menghapus data berdasarkan key (varKey)                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (string) varKey ► Data Key                                                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataDelete($varUserSession, string $varKey)
            {
            \App\Helpers\ZhtHelper\Database\Helper_Redis::delete($varUserSession, $this->varKeyHeader.'::'.$varKey);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataInsert                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-28                                                                                           |
        | ▪ Description     : Menambahkan data dengan key (varKey)                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (string) varKey ► Data Key                                                                                        |
        |      ▪ (mixed)  varValue ► Data Value                                                                                    |
        |      ▪ (int)    varTTL ► TTL                                                                                             |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(int $varUserSession, string $varKey, $varValue, int $varTTL = null)
            {
            \App\Helpers\ZhtHelper\Database\Helper_Redis::setValue($varUserSession, $this->varKeyHeader.'::'.$varKey, $varValue, $varTTL);
            }            


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataTTLRenewal                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-31                                                                                           |
        | ▪ Description     : Menyimpan ulang TTL data dengan key tertentu (varKey)                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (string) varKey ► Data Key                                                                                        |
        |      ▪ (int)    varTTL ► TTL                                                                                             |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataTTLRenewal(int $varUserSession, string $varKey, int $varTTL)
            {
            \App\Helpers\ZhtHelper\Database\Helper_Redis::setTTLRenewal($varUserSession, $this->varKeyHeader.'::'.$varKey, $varTTL);
            }            
        }
    }