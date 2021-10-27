<?php
require __DIR__ ."/../../../services/student/index.php";

$callback=function($value){ return updateDisciplineNote($value);};
api_response(userExtraData($callback));
