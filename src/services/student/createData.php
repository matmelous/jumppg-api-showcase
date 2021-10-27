<?php
function createLanguage($values)
{
    $items = ['id_estudante', 'idioma', 'proficiencia'];
    $table = 'idioma';
    $prefix = '';
    return database_insert($prefix, $items, $table, $values);
}
function createProject($values)
{
    $items = ['id_estudante', 'nome', 'descricao'];
    $table = 'projetos';
    $prefix = '';
    return database_insert($prefix, $items, $table, $values);
}
function createJuniorCompany($values)
{
    $items = ['id_estudante', 'nome', 'descricao'];
    $table = 'empresaJunior';
    $prefix = '';
    return database_insert($prefix, $items, $table, $values);
}
function createDisciplineNote($values)
{
    $items = ['id_estudante', 'nome', 'nota'];
    $table = 'notaDisciplina';
    $prefix = '';
    return database_insert($prefix, $items, $table, $values);
}
function createVolunteerWork($values)
{
    $items = ['id_estudante', 'nome', 'descricao'];
    $table = 'trabalhoVoluntario';
    $prefix = '';
    return database_insert($prefix, $items, $table, $values);
}
function createStudentApplied($values)
{

    $valuesObject = valuesObject($values);
    $student = studentReadStudentApplied($valuesObject->id_estudante, $valuesObject->id_vacancy);

    if (count($student) > 0) {
        return error("Você ja se aplicou a esta vaga!");
    }

    $items = ['id_estudante', 'id_vacancy'];
    $table = 'studentApplied';
    $prefix = '';
    return database_insert($prefix, $items, $table, $values);
}
