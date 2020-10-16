The project is build using AWS Lambda functions and Step Functions.

There are four functions
1. getOrders
2. getInventory
3. updateOrder
4. matchItemWithInventory

The functions are deployed using the serverless with Bref

Setup
Bref + Serverless installation https://bref.sh/docs/installation.html
Composer Installation - https://getcomposer.org/download/
Guzzle Client - `php composer.phar require guzzle/guzzle:~3.9`

Monitoring
---
The application was monitored using Cloudwatch, logs were sent to Cloudwatch for analysis.

AWS StepFunctions
---
StepFunctions are used to orchestrate the sequence of execution of the Lambda functions. Each Lambda function changes state and passes on to the next state.

Suggestions
---
1. Warehouse service could be implemented to respond to one itemId. The current implementation meant a full import of the entire warehouse for every order. There was an opportunity for caching. Caching would've meant the inventory is stale which will lead to potential back-orders.
2. There was no update on the warehouse API. This would help keep the inventory system up-to-date. 

Optimizations
---
1. Because we are not updated the Warehouse API, Inventory calls could be cached per run.