<?php

$config = include "config.php";
include "database/QueryBuilder.php";
include "database/Connections.php";

return new QueryBuilder( Connections::make($config["database"]) );