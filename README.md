# lavarel-modular-setup-plus-db-logger
Just played with Lavarel 5 and modular set up, added also a new facade/helper/serviceProvider to log errors and messaged into db. Pretty easy I must say...

Relevant files are under Modules/

##The db logger is under##
The db logger allows to add error messages (silently), from anywhere in the application, to the database.
Messages are like

$type, $message, $location, $logtime

app/Helpers/AppModel.php

app/Providers/AppModelServiceProvider.php

app/Facades/AppModel.php
