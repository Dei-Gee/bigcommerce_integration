<?php 
    namespace models;

    class Customer
    {
        private $firstName;
        private $lastName;
        private $phone;
        private $email;
        private $_authentication;

        public function __construct()
        {
            $this->firstName ="";
            $this->lastName = "";
            $this->phone = "";
            $this->email = "";
            $this->_authentication = json_encode(array('password'=> "", 'password_confirmation' => ""), JSON_FORCE_OBJECT);
        }

        // setters
        public function setFirstName(string $first_name) { $this->firstName = $first_name; }
        public function setLastName(string $last_name) { $this->lastName = $last_name; }
        public function setPhone(string $phoneNumber) { $this->phone = $phoneNumber; }
        public function setEmail(string $emailAddress) { $this->email = $emailAddress; }
        public function setAuthentication(array $authObject) { $this->_authentication = json_encode($authObject, JSON_FORCE_OBJECT); }
        
        // getters
        public function getFirstName() { return $this->firstName; }
        public function getLastName() { return $this->lastName; }
        public function getPhone() { return $this->phone; }
        public function getEmail() { return $this->email; }
        public function getAuthentication() { return $this->_authentication; }

    }
?>