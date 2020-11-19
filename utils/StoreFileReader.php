<?php
    namespace utils;
    use models\Store;
    use FFI\Exception;
    
    class StoreFileReader
    {
        // process the file and pass its values to the Store object
        public static function processFileReadOnly (string $file_path, Store $store) : Store
        {
            // open file and read
            $myFile = fopen($file_path, 'r') or die('Unable to open file (File may not exist)');

            // read each line until the end of the file has been reached
            while(!feof($myFile))
            {
                /* 
                *   Explode the line to get the variable and the value
                *   e.g. "SAMPLE VARIABLE: 39jnds9w3ejeskss9es3" will be split by `: ` to become 'SAMPLE VARIABLE' and '39jnds9w3ejeskss9es3'
                */
                $str = explode("=", fgets($myFile));

                // check what the first half of the line is to set it to the appropriate field in the Store object
                switch ($str[0]) 
                {
                    case 'ACCESS TOKEN':
                        # code...
                        $store->setAccessToken($str[1]);
                    break;

                    case 'CLIENT ID':
                        # code...
                        $store->setClientID($str[1]);
                    break;

                    case 'CLIENT SECRET':
                        # code...
                        $store->setClientSecret($str[1]);
                    break;

                    case 'NAME':
                        # code...
                        $store->setName($str[1]);
                    break;

                    case 'API PATH':
                        # code...
                        $store->setApiPath($str[1]);
                    break;
                    
                    default:
                        throw new Exception("Error Processing Request", 1);
                    break;
                }
            }

            // close the file
            fclose($myFile);
            //  return the store with the new values
            return $store;
        }
    }
?>