<?php
function readLanguage($id_estudante)
{
    $items = ['id_estudante', 'idioma', 'proficiencia', 'id'];
    $table = 'idioma';
    return selectAll($items, $table, [(object) ["key" => "id_estudante", "value" => $id_estudante]]);
}
function readProject($id_estudante)
{
    $items = ['id_estudante', 'nome', 'descricao', 'id'];
    $table = 'projetos';
    return selectAll($items, $table, [(object) ["key" => "id_estudante", "value" => $id_estudante]]);
}
function readJuniorCompany($id_estudante)
{
    $items = ['id_estudante', 'nome', 'descricao', 'id'];
    $table = 'empresaJunior';
    return selectAll($items, $table, [(object) ["key" => "id_estudante", "value" => $id_estudante]]);
}
function readDisciplineNote($id_estudante)
{
    $items = ['id_estudante', 'nome', 'nota', 'id'];
    $table = 'notaDisciplina';
    return selectAll($items, $table, [(object) ["key" => "id_estudante", "value" => $id_estudante]]);
}
function readVolunteerWork($id_estudante)
{
    $items = ['id_estudante', 'nome', 'descricao', 'id'];
    $table = 'trabalhoVoluntario';
    return selectAll($items, $table, [(object) ["key" => "id_estudante", "value" => $id_estudante]]);
}
function studentReadVacancy($id)
{
    $items = ['vacancy.id', 'vacancy.numero', 'id_estudante as idCompany', 'vacancy.nome', 'descricao', "estudante.nome as nomeFantasia", "email", "celular", "telefone", "cnpj", "inscricaoEstadual", "inscricaoMunicipal", "endereco", "cep", "cidade", "estado", "razaoSocial"];
    $table = 'vacancy';
    return selectAll($items, $table, null, null, false, " inner join estudante on vacancy.id_estudante=estudante.id ");
}
function studentReadStudentApplied($id_estudante, $id_vacancy)
{
    $items = ["id"];
    $table = 'studentApplied';
    return selectAll($items, $table, [(object) ["key" => "id_estudante", "value" => $id_estudante, "cond" => "AND"], (object) ["key" => "id_vacancy", "value" => $id_vacancy]]);
}
