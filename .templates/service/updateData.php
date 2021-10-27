<?php

function updateLanguage($values){
  $items=['id_estudante','idioma','proficiencia'];
  $table='idioma';
  $prefix='';
  return database_update($prefix, $items, $table,$values);
}