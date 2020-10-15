The project is build using AWS Lambda functions and Step Functions.

There are three functions
1. getOrders
2. getInventory
3. updateOrder

The functions are deployed using the serverless with Bref

Setup
Bref + Serverless installation https://bref.sh/docs/installation.html
Composer Installation - https://getcomposer.org/download/
Guzzle Client - `php composer.phar require guzzle/guzzle:~3.9`



Issues
---
1. Warehouse service could be implemented to respond to one itemId. The current implementation meant a full import of the entire warehouse for every order. There was an opportunity for caching. Caching would've meant the inventory is stale which will lead to potential back-orders.
2. There was no update on the warehouse API. This would help keep the inventory system up-to-date. 
3. 