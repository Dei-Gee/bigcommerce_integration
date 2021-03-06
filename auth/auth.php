<?php
    namespace auth;
    use models\Store;
    use utils\StoreFileReader;
    require 'models\Store.php';
    require 'utils\StoreFileReader.php';

    error_reporting(E_ALL);

    /**
     * Reading API Credentials from file and creating store instance
     */
    $credentialsFile = 'BigCommerceAPICredentials.txt';
    $myStore = new Store();
    $myStore = StoreFileReader::processFileReadOnly($credentialsFile, $myStore);
?>