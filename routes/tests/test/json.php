<?php
include('../../../helpers/index.php');

$post=json_post(true);
print_r($post);

jsonPostFormattedForDatabase();