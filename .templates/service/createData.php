<?php
function createVacancy($values){
  $items=['id_company','nome','descricao'];
  $table='vacancy';
  $prefix='';
  return database_insert($prefix, $items, $table, $values);
}