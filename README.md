# Integration for an E-Commerce Store on BigCommerce
This project is to serve as a starting point for the integration of a store hosted on BigCommerce. Please note that this is a rough attempt and more for educational purposes and small scale stores. I will add more to it as time goes on. You may fork and use as you wish but remember to credit me. Thank you for using my repo!

## Overview
The folder structure of this project is designed to be easy to understand. The root directory contains the scripts for perfoming tasks on your store over the [BigCommerce API](https://developer.bigcommerce.com/api-reference "BigCommerce API Reference").

The folder structure is as follows:
* <b>root directory</b>: This contains the scripts that contain the functions you call to perform actions on the store e.g. creating new orders, getting a product by id and so on.

* <b>/auth</b>: This contains the script that creates an instance of the Store class so you can run operations on it. It also contains the sub-folder for the class that handles all HTTP/HTTPS requests made using the built in cURL functions in php.

* <b>/models</b>: This contains the models for everything in the project ranging e.g. Store, Customer, Product and Order.

* <b>/utils</b>: This contains static classes which in turn contain re-usable functions that can be called anywhere in the project. This to mitigate the chances of repitition in the project.

## Usage
You can use this project however you want. You may insert it into a larger more complex project or use as is by running each script separately. Having the php command installed globally is very useful when running it in development. Remember, this is primarily for educational purposes and to make life easier. You don't have to set everything up from scratch. 

<b>NOTE:</b> Please make sure you have a .txt file in the root directly named "<i>BigCommerceAPICredentials.txt</i>". It should be in the follwing format (p.s. none of these credentials are real):
```
ACCESS TOKEN=abcdefgh1234567
CLIENT ID=1a2b3c4d5e6f7g8h9i10j11k12l
CLIENT SECRET=34jn3i4un3i4ni34ni34n3iun43i4un34uni3
NAME=MyBigCommerceAPIAccount
API PATH=https://api.bigcommerce.com/stores/{store_hash}/
```
<b>Make sure there are no spaces before or after the '=' sign and make sure there are spaces between the words on the left side of the '=' and that they are in uppercase</b>. If you do not do this, the class that reads the file will be unable to do so and will throw an error. 

Please open an issue if there is a problem. Thanks again for using my repo!