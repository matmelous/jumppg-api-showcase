<?php

function updateLanguage($values){
  $items=['id_estudante','idioma','proficiencia'];
  $table='idioma';
  $prefix='';
  return database_update($prefix, $items, $table,$values);
}
function updateProject($values){
  $items=['id_estudante','nome','descricao'];
  $table='projetos';
  $prefix='';
  return database_update($prefix, $items, $table, $values);
}
function updateJuniorCompany($values){
  $items=['id_estudante','nome','descricao'];
  $table='empresaJunior';
  $prefix='';
  return database_update($prefix, $items, $table, $values);
}
function updateDisciplineNote($values){
  $items=['id_estudante','nome','nota'];
  $table='notaDisciplina';
  $prefix='';
  return database_update($prefix, $items, $table, $values);
}
function updateVolunteerWork($values){
  $items=['id_estudante','nome','descricao'];
  $table='trabalhoVoluntario';
  $prefix='';
  return database_update($prefix, $items, $table, $values);
}