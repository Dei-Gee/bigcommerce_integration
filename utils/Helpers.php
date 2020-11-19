<?php
    namespace utils;

    /**
     * This static class is used to perform repetitive tasks such as setting cURL options
     */
    class Helpers 
    {
        /*
        *   This function sets the curl options and fills in the url and access token
        *   @param $c The curl session
        *   @param $u The URL that receives the API call
        *   @param $token The access token 
        */
        public static function SET_CURL_OPTS($c, string $u, string $token, string $request_type, bool $return_transfer, $post_fields) : bool
        {
            $options = array(
                CURLOPT_URL => $u,
                CURLOPT_RETURNTRANSFER => $return_transfer,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_HTTPHEADER => array(
                    "Accept: application/json",
                    "Content-type: application/json",
                    "X-Auth-Token: " . trim($token)
                )
            );

            switch($request_type)
            {
                case "GET":
                    // 
                    $options[CURLOPT_CUSTOMREQUEST] = $request_type;
                    $options[CURLOPT_POST] = 0;
                    $options[CURLOPT_PUT] = 0;
                    $options[CURLOPT_POSTFIELDS] = "";
                    //  => "{\"name\":\"BigCommerce Coffee Mug\",\"quantity\":1,\"price_inc_tax\":12.45,\"price_ex_tax\":10.12,\"sku\":\"MUG-GRY\"}",
                break;

                case "POST": 
                    // 
                    $options[CURLOPT_CUSTOMREQUEST] = $request_type;
                    $options[CURLOPT_POST] = 1;
                    $options[CURLOPT_PUT] = 0;
                    $options[CURLOPT_POSTFIELDS] = $post_fields;
                    array_push($options[CURLOPT_HTTPHEADER], "Content-length: " . strlen($post_fields));
                break;

                case "PUT": 
                    // 
                    $options[CURLOPT_CUSTOMREQUEST] = $request_type;
                    $options[CURLOPT_POSTFIELDS] = $post_fields;
                    array_push($options[CURLOPT_HTTPHEADER], "Content-length: " . strlen($post_fields));
                break;

                default:
            }
            
            return curl_setopt_array($c, $options);
        }
        
    }
?>