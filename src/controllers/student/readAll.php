<?php
require __DIR__ . "/../../services/student/index.php";


function doReadStudent(){
	$post=json_post();
	$token=$post->token;
  $response=readStudent($token);

	$response->user->volunteerWorks=readVolunteerWork($response->user->id);
	$response->user->disciplineNotes=readDisciplineNote($response->user->id);
	$response->user->juniorCompanies=readJuniorCompany($response->user->id);
	$response->user->languages=readLanguage($response->user->id);
	$response->user->projects=readProject($response->user->id);
	return($response);
}
api_response(doReadStudent());