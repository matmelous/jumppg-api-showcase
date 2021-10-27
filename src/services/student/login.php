<?php
function login($mail, $password)
{
    $items = ["id", "created_at", "deleted_at", "ativo", "nome", "email", "sexo", "celular", "nacionalidade", "idade", "linkedin", "biografia", "instituicao", "area", "ano", "cursos", "hardskills", "softskills", "cadStatus", "userType"];
    $table = 'estudante';
    $where = [(object) ["key" => "email", "value" => $mail, "cond" => "and"], (object) ["key" => "senha", "value" => $password]];

    $users = selectAll($items, $table, $where, "", false, null, false);

    if (count($users) == 0) {
        return error(SessionErrors::NOT_FOUND);
    }

    $user = (object) $users[0];

    if ($user->ativo != 1 || $user->deleted_at != null) {
        return error(SessionErrors::NOT_ACTIVE);
    }

    $session = createSession($user->id);
    $session->user = $user;

    return $session;
}
