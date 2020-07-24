<?php

namespace App\Http\Controllers\Application\BackEnd\SandBox
    {
    use Illuminate\Http\Request;
 
    class Controller_Main extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            //$this->middleware(\App\Http\Middleware\Application\BackEnd\RequestHandler_General::class);
            }
        
        public function webServices()
            {
            $res['message'] = "Success!";
            return response($res);
            }
            
        public function test()
            {
            \App\Helpers\ZhtHelper\General\Helper_Session::delete(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());

            // create digest auth
//            $auth = \Intervention\HttpAuth\HttpAuth::make();
  //          $auth->digest();
    //        $auth->realm('Secure');
  //          $auth->username('admin');
//            $auth->password('secret');
            
//            var_dump($auth);
            
//            $auth->secure();
            
            $varDataArray = [
                'System' => [],
                'Data' => []
            ];
            //$x = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(000000, $varDataArray);
            $x = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(000000, \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(000000, $varDataArray));
            var_dump($x);
            
            \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::setRequest(
                000000, 
                'http://172.28.0.3/api/webservices', 
                'POST', 
                80
               );
            
            
           
            echo "<br>Finish";
            }




























            
        public function testEncrypt()
            {
            \App\Helpers\ZhtHelper\General\Helper_Session::delete(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
            
            \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getEncryptedURLParameter([]);
            
//            $x = \App\Helpers\ZhtHelper\General\Helper_Compression::getBZip2Decompress(00000, \App\Helpers\ZhtHelper\General\Helper_Compression::getBZip2Compress(00000, 'Ini contoh datanya'));
//            $x = \App\Helpers\ZhtHelper\General\Helper_Compression::getZLibDecompress(00000, \App\Helpers\ZhtHelper\General\Helper_Compression::getZLibCompress(00000, 'Ini contoh datanya'));
//            echo $x;
//            echo \App\Helpers\ZhtHelper\General\Helper_Array::isSequentialArray(000000, [1,2,3]);
            
            $ServiceName = 'service.core.userAuthentication';
            $ServiceAction = 'get';
            
            $dll='Lorem ipsum dolor sit amet, enim non in erat in diam leo, ligula nec odio nibh sit rhoncus viverra, vitae et arcu massa et molestie leo, erat massa. Error nonummy, et adipiscing lectus malesuada integer cursus dignissim, ut dolor tincidunt volutpat interdum arcu eget. Et cras, dolor mauris amet consequat pulvinar erat. Magnis id ad hac lacus amet vulputate, laoreet imperdiet sed quam, eros accumsan lobortis, tempor libero commodo odio non. Aliquam curabitur sit enim vivamus est a, ac ac dapibus lectus nisl quisque nisl, rutrum turpis vel felis eleifend, metus nunc ac leo. Sit eleifend amet libero commodo, elit tellus sed mollis venenatis feugiat, pede ut vel quaerat mauris. Mi quis nulla vel, neque nisl bibendum, quis odio est sem amet, nulla sed, urna wisi. Sagittis donec condimentum. Fames aliquet sunt, nonummy nulla doloribus, nam nullam gravida, vitae exercitation malesuada faucibus pellentesque donec. Taciti magna, non non vel, at sollicitudin congue enim suspendisse. Pede ut tellus adipiscing duis non fusce, lobortis mi consequat purus, quis non felis velit, etiam tellus non ipsum vitae lorem lorem, et metus mauris. Nec felis. Volutpat dui dignissim quisque quis eu, curae suscipit, commodo ultrices, sed parturient lacinia justo wisi totam, orci nam. Nisl excepturi sit dolor viverra suscipit asperiores. Morbi ut lacus proin viverra posuere, sociis ultrices, odio nullam quis, egestas suscipit eros. Mauris dignissim nulla nonummy. Diam ultrices adipiscing nibh mi dui, aliquam libero pulvinar dapibus, sociosqu aut sodales, ultricies elementum, ut inceptos. Odio ullamcorper tincidunt aenean rhoncus, ut aliquet interdum sint tortor vestibulum adipisicing, cursus eum, facilisis nibh varius magna a. Praesent odio, sit purus est, nam justo sed. Id lorem tempor, tristique amet commodo lectus lorem dictum natoque, augue suscipit eros vel turpis, habitant consectetuer eros. Vestibulum magna, proin blandit mauris mauris fames nibh, in aliquam lectus semper ipsum, justo cursus laoreet dui turpis in. Dolor ultricies sit, placerat per imperdiet nisl eget lacinia sit, amet vestibulum delectus nisl odio, aliquam mi, non quisque. Lorem vehicula amet dictumst, orci lorem. Laoreet enim, quam et aliquam, rutrum in beatae nullam, eget arcu mattis vitae vestibulum neque. Molestie tincidunt, libero convallis quis sodales, aenean lacus lobortis erat id amet sapien. Dolor cursus, auctor augue cursus. Quibusdam mauris augue, eleifend massa nulla sollicitudin sed lacus. Felis dui viverra nulla totam risus, fermentum magna natoque vel fusce augue erat, pretium ut enim ipsum in cursus, massa diam arcu eu. Pellentesque cras egestas et pede morbi nec, pellentesque dolor sollicitudin, orci bibendum quam scelerisque tincidunt mi, metus in. Ante duis turpis et, pulvinar duis. Faucibus est, aut ligula mauris congue. Pede non odio. Aliquam vivamus dapibus sed, elit posuere integer eros, quis sit consequuntur in. Nulla scelerisque.';
            
            
            //$varURLParameterPlain = '/'.$ServiceName.'/'.$ServiceAction.'/teguhpratama789';
            $varURLParameterPlain = $ServiceName.'/'.$ServiceAction.'/teguhpratama789/'.$dll;
            echo '<br>URL Parameter Plain : <br>'.$varURLParameterPlain;
            echo "<br>-------------------------------------------------------------------------------------------";
            $varURLParameterPlainEncapsulated = \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getURLEncapsulation(000000, $varURLParameterPlain);
            echo '<br>URL Parameter Encapsulation : <br>'.$varURLParameterPlainEncapsulated;
            echo "<br>-------------------------------------------------------------------------------------------";
            $varURLParameterPlainDecapsulated = \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getURLDecapsulation(000000, $varURLParameterPlainEncapsulated);
            echo '<br>URL Parameter Decapsulation : <br>'.$varURLParameterPlainDecapsulated;
            }





        public function testNEW()
            {

            \App\Helpers\ZhtHelper\General\Helper_Session::delete(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
//            \App\Helpers\ZhtHelper\System\Helper_Registry::init();
            echo "<br>xxxxxxxxxxxxxxxxxxxxx<br>";
            echo \App\Helpers\ZhtHelper\General\Helper_Array::isSequentialArray(000000, [1,2,3]);
            echo "<br>xxxxxxxxxxxxxxxxxxxxx<br>";
            echo \App\Helpers\ZhtHelper\General\Helper_Array::isSequentialArray(000000, ['a'=>1, 'b'=>2, 'c'=>3]);
            echo "<br>xxxxxxxxxxxxxxxxxxxxx<br>";
            $x=\App\Helpers\ZhtHelper\General\Helper_Array::getOnlyArrayValueWithoutKey(000000, ['a'=>1, 'b'=>2, 'c'=>3]);
            echo "<br>xxxxxxxxxxxxxxxxxxxxx<br>";
            echo \App\Helpers\ZhtHelper\General\Helper_Encryption::getBase64Decode(000000, \App\Helpers\ZhtHelper\General\Helper_Encryption::getBase64Encode(000000, 'Pesan Rahasia'));
            echo "<br>xxxxxxxxxxxxxxxxxxxxx<br>";
//            echo \App\Helpers\ZhtHelper\General\Helper_Encryption::getOpenSSLEncode(000000, 'Ini data rahasianya', 'AES-128-CTR', 'Kunci Enkripsiku', 0, '1234567891011121');
            echo \App\Helpers\ZhtHelper\General\Helper_Encryption::getOpenSSLDecode(000000, \App\Helpers\ZhtHelper\General\Helper_Encryption::getOpenSSLEncode(000000, 'Ini data rahasianya', 'AES-128-CTR', 'Kunci Enkripsiku', 0, '1234567891011121'), 'AES-128-CTR', 'Kunci Enkripsiku', 0, '1234567891011121');
            }





        public function testxxx()
            {
            echo "<br>".time()."<br>";

            
            
            
            \App\Helpers\ZhtHelper\General\Helper_Session::delete(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
            

            echo \App\Helpers\ZhtHelper\General\Helper_Array::isAssociativeArray(000000, [1,2,3]);
            
            
            
            //$varDataSession = \App\Helpers\ZhtHelper\General\Session::get(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());         

            
//            echo \App\Helpers\ZhtHelper\General\ArrayHandler::getArrayValue($varDataSession, 'Registry::Global::Environment::Application::Name');

            echo "<br>----------------<br>";

//            var_dump($varDataSession);
            echo "<br>----------------<br>";







//            \App\Helpers\ZhtHelper\System\Registry::setSpecificRegistry(0, 'Zzz::Xxx', '$varValue');
//            echo \App\Helpers\ZhtHelper\System\Registry::getSpecificRegistry(0, 'Zzz::Xxx');
            
            
//            \App\Helpers\ZhtHelper\Logger\SystemLog::setLogOutut(000000, 'Helper::ZhtHelper', 'xxxx');
//            \App\Helpers\ZhtHelper\Logger\SystemLog::setLogOutput(000000, 'Helper::ZhtHelper', 'yyyy');
            
//            \App\Helpers\ZhtHelper\Logger\SystemLog::setLogError(000000, 'Helper::ZhtHelper', 'Error yyyy');



            //\App\Helpers\ZhtHelper\System\Registry::init();
            //echo "<br>-----------";
            //echo \App\Helpers\ZhtHelper\General\Session::isExist(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());
            //echo "-----------";
            
            
            
            
            
            
//            \App\Helpers\ZhtHelper\Logger\SystemLog::setLogOutput('Helper::ZhtHelper', 000000, 'xxxx');
//            echo \App\Helpers\ZhtHelper\Logger\SystemLog::getLogOutput('Log::Helper::ZhtHelper', 000000);








            //$varRegistry['Registry']['Global']['Environment']['Database']['Type']='PostgreSQL';

            echo \App\Helpers\ZhtHelper\General\Helper_Hash::getMD5(000000, 'xxxxxxxxxxxxxx');
            
            \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::init(000000);
            \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStatusAvailability(000000);
            $x = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(000000, "SELECT 1 AS xxx");
            echo \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getDateTimeTZ(000000);


            

            
            //var_dump(\App\Helpers\ZhtHelper\Database\Helper_Redis::getDateTimeTZ());
            var_dump(\App\Helpers\ZhtHelper\Database\Helper_Redis::getValue(000000, 'myKey2'));
            \App\Helpers\ZhtHelper\Database\Helper_Redis::setValue(000000, 'myKey2', 'myValue', 1);
            \App\Helpers\ZhtHelper\Database\Helper_Redis::isExist(000000, 'myKey2');
            echo "<br><br>Delete:";
            \App\Helpers\ZhtHelper\Database\Helper_Redis::delete(000000, 'myKey2');
            echo "<br><br>TTL:";
            var_dump(\App\Helpers\ZhtHelper\Database\Helper_Redis::getTTL(000000, 'myKey2'));
            echo "<br><br>GetValue:";
            var_dump(\App\Helpers\ZhtHelper\Database\Helper_Redis::getValue(000000, 'myKey2'));
            echo "<br><br>DateTime:";
            var_dump(\App\Helpers\ZhtHelper\Database\Helper_Redis::getDateTime(000000));
            echo "<br><br>Info:";
            var_dump(\App\Helpers\ZhtHelper\Database\Helper_Redis::getInfo(000000));
            //var_dump($x);
            
            //phpinfo();
            
            
            
            echo "<br>"; echo "<br>"; echo "<br>";
            echo "weleh";

            echo "weleh";
            
            
            
//            var_dump(\App\Helpers\ZhtHelper\General\Session::get('ERPReborn'));
  //          echo \App\Helpers\ZhtHelper\General\Session::delete('ERPReborn');
    //        echo "Terhapuskah";
      //      var_dump(\App\Helpers\ZhtHelper\General\Session::get('ERPReborn'));     
            echo "<br>".time()."<br>";

            
            }
        }
    }
 
?>