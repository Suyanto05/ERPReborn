<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\Logger                                                                                     |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

namespace App\Helpers\ZhtHelper\Logger
    {

    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : SystemLog                                                                                                    |
    | ▪ Description : Menangani Log Sistem                                                                                         |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class SystemLog
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | Class Properties                                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static $varNameSpace;
        private static $varDataLogErrorMaxSize;
        private static $varDataLogOutputMaxSize;
        private static $varDataLogErrorIndentantionTab;
        private static $varDataLogOutputIndentantionTab;
        
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : init                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-10                                                                                           |
        | ▪ Description     : Inisialisasi                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function init()
            {
            self::$varNameSpace=get_class();
            self::$varDataLogErrorMaxSize=10;
            self::$varDataLogOutputMaxSize=10;
            self::$varDataLogErrorIndentantionTab=5;
            self::$varDataLogOutputIndentantionTab=5;
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getLogError                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-10                                                                                           |
        | ▪ Description     : Mendapatkan data Log Error sesuai User Session tertentu (varUserSession)                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getLogError($varUserSession)
            {
            //---> Cek apakah session sudah terbentuk
            if(!\App\Helpers\ZhtHelper\General\Session::isExist(\App\Helpers\ZhtHelper\System\Environment::getApplicationID()))
                {
                \App\Helpers\ZhtHelper\System\Registry::init();
                self::init();
                }            

            $varDataSession = \App\Helpers\ZhtHelper\General\Session::get(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());

            if(\App\Helpers\ZhtHelper\General\ArrayHandler::isKeyExistOnSubArray($varDataSession, 'Log::Specific::'.$varUserSession.'::Error')==false)
                {
                $varDataSession['Log']['Specific'][$varUserSession]['Error']=[];
                }
            
            $varReturn = '';
            for($i=count($varDataSession['Log']['Specific'][$varUserSession]['Error']); $i!=0; $i--)
                {
                $varReturn .= $varDataSession['Log']['Specific'][$varUserSession]['Error'][$i-1].'<br>';
                }
            return $varReturn;
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getLogOutput                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-10                                                                                           |
        | ▪ Description     : Mendapatkan data Log Output sesuai User Session tertentu (varUserSession)                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getLogOutput($varUserSession)
            {
            //---> Cek apakah session sudah terbentuk
            if(!\App\Helpers\ZhtHelper\General\Session::isExist(\App\Helpers\ZhtHelper\System\Environment::getApplicationID()))
                {
                \App\Helpers\ZhtHelper\System\Registry::init();
                self::init();
                }            

            $varDataSession = \App\Helpers\ZhtHelper\General\Session::get(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());

            if(\App\Helpers\ZhtHelper\General\ArrayHandler::isKeyExistOnSubArray($varDataSession, 'Log::Specific::'.$varUserSession.'::Output')==false)
                {
                $varDataSession['Log']['Specific'][$varUserSession]['Output']=[];
                $varDataSession['Log']['Specific'][$varUserSession]['OutputIndentation']=0;
                }
            
            $varReturn = '';
            for($i=count($varDataSession['Log']['Specific'][$varUserSession]['Output']); $i!=0; $i--)
                {
                $varReturn .= $varDataSession['Log']['Specific'][$varUserSession]['Output'][$i-1].'<br>';
                }
            return $varReturn;
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setLogError                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-10                                                                                           |
        | ▪ Description     : Menyimpan data Log Error (varMessage) sesuai User Session tertentu (varUserSession) dengan penanda   |
        |                     khusus (varCallerID)                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (string) varCallerID ► ID Penanda Khusus Caller                                                                   |
        |      ▪ (string) varMessage ► Pesan Error                                                                                 |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setLogError($varUserSession, $varCallerID, $varMessage=null)
            {
            //---> Cek apakah session sudah terbentuk
            if(!\App\Helpers\ZhtHelper\General\Session::isExist(\App\Helpers\ZhtHelper\System\Environment::getApplicationID()))
                {
                \App\Helpers\ZhtHelper\System\Registry::init();
                self::init();
                }            

            $varDataSession = \App\Helpers\ZhtHelper\General\Session::get(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());

            if(\App\Helpers\ZhtHelper\General\ArrayHandler::isKeyExistOnSubArray($varDataSession, 'Log::Specific::'.$varUserSession.'::Error')==false)
                {
                $varDataSession['Log']['Specific'][$varUserSession]['Error']=[];
                $varDataSession['Log']['Specific'][$varUserSession]['ErrorIndentation']=0;
                }
                
            if(count($varDataSession['Log']['Specific'][$varUserSession]['Error']) == self::$varDataLogErrorMaxSize)
                {
                array_shift($varDataSession['Log']['Specific'][$varUserSession]['Error']);
                }
            array_push($varDataSession['Log']['Specific'][$varUserSession]['Error'], \App\Helpers\ZhtHelper\System\Environment::getApplicationDateTimeTZ().' ['.$varCallerID.'] '.$varMessage);

            //---> Data Store
            \App\Helpers\ZhtHelper\General\Session::set(\App\Helpers\ZhtHelper\System\Environment::getApplicationID(), $varDataSession);
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setLogOutput                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-10                                                                                           |
        | ▪ Description     : Menyimpan data Log Output (varMessage) sesuai User Session tertentu (varUserSession) dengan penanda  |
        |                     khusus (varCallerID)                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (string) varCallerID ► ID Penanda Khusus Caller                                                                   |
        |      ▪ (string) varMessage ► Pesan Output                                                                                |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setLogOutput($varUserSession, $varCallerID, $varMessage=null)
            {            
            //---> Cek apakah session sudah terbentuk
            if(!\App\Helpers\ZhtHelper\General\Session::isExist(\App\Helpers\ZhtHelper\System\Environment::getApplicationID()))
                {
                \App\Helpers\ZhtHelper\System\Registry::init();
                self::init();
                }

            $varDataSession = \App\Helpers\ZhtHelper\General\Session::get(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());

            if(\App\Helpers\ZhtHelper\General\ArrayHandler::isKeyExistOnSubArray($varDataSession, 'Log::Specific::'.$varUserSession.'::Output')==false)
                {
                $varDataSession['Log']['Specific'][$varUserSession]['Output']=[];
                }
                
            if(count($varDataSession['Log']['Specific'][$varUserSession]['Output']) == self::$varDataLogOutputMaxSize)
                {
                array_shift($varDataSession['Log']['Specific'][$varUserSession]['Output']);
                }
            array_push($varDataSession['Log']['Specific'][$varUserSession]['Output'], \App\Helpers\ZhtHelper\System\Environment::getApplicationDateTimeTZ().' ['.$varCallerID.'] '.str_repeat('&nbsp;', ($varDataSession['Log']['Specific'][$varUserSession]['OutputIndentation']<0?0:$varDataSession['Log']['Specific'][$varUserSession]['OutputIndentation'])).$varMessage);

            //---> Data Store
            \App\Helpers\ZhtHelper\General\Session::set(\App\Helpers\ZhtHelper\System\Environment::getApplicationID(), $varDataSession);
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setLogIndentationIncrease                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-10                                                                                           |
        | ▪ Description     : Menambahkan indentasi untuk Log Output sesuai User Session (varUserSession)                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setLogIndentationIncrease($varUserSession)
            {
            $varDataSession = \App\Helpers\ZhtHelper\General\Session::get(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());
            if(\App\Helpers\ZhtHelper\General\ArrayHandler::isKeyExistOnSubArray($varDataSession, 'Log::Specific::'.$varUserSession.'::OutputIndentation')==false)
                {
                self::init();
                \App\Helpers\ZhtHelper\General\ArrayHandler::setArrayValue($varDataSession, 'Log::Specific::'.$varUserSession.'::OutputIndentation', -self::$varDataLogOutputIndentantionTab);
                $varDataSession['Log']['Specific'][$varUserSession]['OutputIndentation']=-self::$varDataLogOutputIndentantionTab;
                //var_dump($varDataSession);
                }
            $varOutputIndentation = \App\Helpers\ZhtHelper\General\ArrayHandler::getArrayValue($varDataSession, 'Log::Specific::'.$varUserSession.'::OutputIndentation') + self::$varDataLogOutputIndentantionTab;
            \App\Helpers\ZhtHelper\General\ArrayHandler::setArrayValue($varDataSession, 'Log::Specific::'.$varUserSession.'::OutputIndentation', $varOutputIndentation);
            \App\Helpers\ZhtHelper\General\Session::set(\App\Helpers\ZhtHelper\System\Environment::getApplicationID(), $varDataSession);
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setLogIndentationDecrease                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-10                                                                                           |
        | ▪ Description     : Mengurangi indentasi untuk Log Output sesuai User Session (varUserSession)                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setLogIndentationDecrease($varUserSession)
            {
            $varDataSession = \App\Helpers\ZhtHelper\General\Session::get(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());
            $varOutputIndentation = \App\Helpers\ZhtHelper\General\ArrayHandler::getArrayValue($varDataSession, 'Log::Specific::'.$varUserSession.'::OutputIndentation') - self::$varDataLogOutputIndentantionTab;
            \App\Helpers\ZhtHelper\General\ArrayHandler::setArrayValue($varDataSession, 'Log::Specific::'.$varUserSession.'::OutputIndentation', $varOutputIndentation);            
            \App\Helpers\ZhtHelper\General\Session::set(\App\Helpers\ZhtHelper\System\Environment::getApplicationID(), $varDataSession);
            }
        }
    }

?>
