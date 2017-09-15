<?php
class Autoload
{
    public function autoload()
    {
        spl_autoload_register(function ($class) {

            $allowedNamspace = array(
                'controllers','core'
            );

            $prefix = 'app\\';
            $length = strlen($prefix);
            $base_directory = $_SERVER['DOCUMENT_ROOT'] . 'app/';


            foreach ($allowedNamspace as $value){
                $class1 = 'app\code\\' . $value . '\\' . $class;

                if (strncmp($prefix, $class1, $length) !== 0) {
                    continue;
                }

                $relative_class = substr($class1, $length);

                $file = $base_directory . str_replace('\\', '/', $relative_class) . '.php';

                if (file_exists($file)) {
                    $class = $class1;
                    var_dump($file);
                    require_once $file;
                    return;
                }

            }

        });
    }
}