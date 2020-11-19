<?php
    namespace models;
    
    class Store 
    {
        private $apiPath;
        private $accessToken;
        private $clientId;
        private $clientSecret;
        private $name;

        public function __construct()
        {
            $this->apiPath ="";
            $this->accessToken = "";
            $this->clientId = "";
            $this->clientSecret = "";
            $this->name = "";
        }

        // setters
        public function setApiPath(string $api_path) { $this->apiPath = $api_path; }
        public function setAccessToken(string $access_token) { $this->accessToken = $access_token; }
        public function setClientID(string $client_id) { $this->clientId = $client_id; }
        public function setClientSecret(string $client_secret) { $this->clientSecret = $client_secret; }
        public function setName(string $store_name) { $this->name = $store_name; }
        
        // getters
        public function getApiPath() { return $this->apiPath; }
        public function getAccessToken() { return $this->accessToken; }
        public function getClientID() { return $this->clientId; }
        public function getClientSecret() { return $this->clientSecret; }
        public function getName() { return $this->name; }
    }

    
?>