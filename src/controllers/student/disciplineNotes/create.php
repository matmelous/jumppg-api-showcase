<?php
require __DIR__ ."/../../../services/student/index.php";

$callback=function($value){ return createDisciplineNote($value);};
api_response(userExtraData($callback,8));
