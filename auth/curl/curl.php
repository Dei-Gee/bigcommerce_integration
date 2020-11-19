<?php
    namespace auth\curl;
    use utils\Helpers;

    include 'utils\Helpers.php';

    /**
     * This static class is used to make HTTP/HTTPS requests using cURL
     */
    class CurlHandler
    {
        /*
         * This function makes a request using curl to get the data
         * @params $url The url that receives the API call
         * @params $access_token The access token 
         */
        public static function GET(string $url, string $access_token)
        {
            $curl = curl_init();

            $curlOptsSet = Helpers::SET_CURL_OPTS($curl, $url, $access_token, "GET", true, "");

            if($curlOptsSet === true)
            {
                try 
                {
                    $response = curl_exec($curl);
                    $err = curl_error($curl);

                    curl_close($curl);

                    if ($err) 
                    {
                        throw new \Exception("cURL Error => " . $err);
                        return null;
                    } 
                    else 
                    {
                        echo "\nSUCCESS: Response retrieved!\n\n";
                        return $response;
                    }
                } 
                catch (\Exception $e) 
                {
                    echo ("The following ERROR \n". $e->getMessage() ."OCCURED at => \n" . $e->getTraceAsString());
                }
            }
            else
            {
                throw new \Exception("Curl options could not be set", 1);
            }
        }

        /*
         * This function makes a request using curl to post new data
         * @params $url The url that receives the API call
         * @params $access_token The access token 
         */
        public static function POST(string $url, string $access_token, $requestBody)
        {
            $curl = curl_init();

            $curlOptsSet = Helpers::SET_CURL_OPTS($curl, $url, $access_token, "POST", true, $requestBody);

            if($curlOptsSet === true)
            {
                try 
                {
                    $response = curl_exec($curl);
                    $err = curl_error($curl);

                    curl_close($curl);

                    if ($err) 
                    {
                        throw new \Exception("cURL Error => " . $err);
                        return null;
                    } 
                    else 
                    {
                        echo "\nSUCCESS: Data sent!\n\n";
                        return $response;
                    }
                } 
                catch (\ErrorException $e) 
                {
                    echo ("The following ERROR \n". $e->getMessage() ." It OCCURED at => \n" . $e->getTraceAsString());
                }
            }
            else
            {
                throw new \Exception("Curl options could not be set", 1);
            }
        }

        /*
         * This function makes a request using curl to update existing data
         * @params $url The url that receives the API call
         * @params $access_token The access token 
         */
        public static function UPDATE(string $url, string $access_token, $requestBody)
        {
            $req = json_encode($requestBody);
            $curl = curl_init();

            $curlOptsSet = Helpers::SET_CURL_OPTS($curl, $url, $access_token, "PUT", true, $req);

            if($curlOptsSet === true)
            {
                try 
                {
                    $response = curl_exec($curl);
                    $err = curl_error($curl);

                    curl_close($curl);

                    if ($err) 
                    {
                        throw new \Exception("cURL Error => " . $err);
                        return null;
                    } 
                    else 
                    {
                        echo "\nSUCCESS: Data sent!\n\n";
                        return $response;
                    }
                } 
                catch (\ErrorException $e) 
                {
                    echo ("The following ERROR \n". $e->getMessage() ." It OCCURED at => \n" . $e->getTraceAsString());
                }
            }
            else
            {
                throw new \Exception("Curl options could not be set", 1);
            }
        }
    }
?>