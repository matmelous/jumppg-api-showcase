<?php

function selectFromId($items, $table, $id, $order = '', $id_name = 'id')
{

    $link = mysqli();

    $sql = "select ";
    $a = 0;
    foreach ($items as $item) {
        if ($a > 0) {
            $sql .= ',';
        } else {
            $a++;
        }
        $sql .= $item;
    }
    $sql .= " from " . $table . "  where " . $id_name . "=? " . $order;
    $query = $link->prepare($sql) or die(mysqli_error($link));
    $query->bind_param("s", $id);
    $query->execute();

    $date = array();
    for ($i = 0; $i < count($items); $i++) {
        $var = $i;
        $$var = null;
        $date[$var] = &$$var;
    }
    call_user_func_array(array($query, 'bind_result'), $date);

    $query->fetch();

    $dados = [];
    $a = 0;
    foreach ($date as $dt) {
        $dados[$items[$a]] = $dt;
        $a++;
    }

    $query->close();

    return ($dados);
}

function selectAll($items, $table, $where = null, $order = '', $indexar = false, $join = null, $onlyActive = true)
{
//where=[(object)['key'=>'id','value'=>'1','type'=>'=','cond'=>'AND'],(object)['key'=>'id','value'=>'1','type'=>'=','cond'=>'AND']]

    $link = mysqli();

    $sql = "select ";
    $a = 0;
    foreach ($items as $item) {
        if ($a > 0) {
            $sql .= ',';
        } else {
            $a++;
        }
        $sql .= $item;
    }
    $sql .= " from " . $table . "  ";

    if ($join != null) {
        $sql .= $join;
    }

    if ($where != null || $onlyActive) {
        $sql .= 'where ';
    }

    if ($onlyActive) {
        $sql .= $table . '.deleted_at IS NULL ';
    }

    if ($where != null) {

        if ($onlyActive) {
            $sql .= 'and ';
        }
        $whereValues = [];

        $whereTypes = '';

        foreach ($where as $object) {
            if (!isset($object->type)) {
                $object->type = '=';
            }
            if (!isset($object->cond)) {
                $object->cond = '';
            }

            $useBind = true;
            if (str_contains($object->type, 'NULL')) {
                $useBind = false;
            }

            $sql .= "{$object->key} {$object->type}";
            if ($useBind) {
                $sql .= ' ? ';
            }
            $sql .= " {$object->cond} ";

            if ($useBind) {
                array_push($whereValues, $object->value);

                $whereTypes .= 's';
            }
        }
    }

    $sql .= $order;
    // echo $sql;
    $query = $link->prepare($sql) or die(mysqli_error($link));
    if ($where != null) {
        $query->bind_param($whereTypes, ...$whereValues) or die(mysqli_error($link));
    }
    $query->execute() or die(mysqli_error($link));
    $date = array();
    for ($i = 0; $i < count($items); $i++) {
        $var = $i;
        $$var = null;
        $date[$var] = &$$var;
    }
    call_user_func_array(array($query, 'bind_result'), $date);

    $dados = [];
    foreach ($items as $indice => $item) {
        if (strpos($item, '.') !== false) {
            $splitItemTable = explode('.', $item);
            $itemWithoutTable = $splitItemTable[count($splitItemTable) - 1];
            $items[$indice] = $itemWithoutTable;
        }
        if (strpos($item, 'as') !== false) {
            $splitItemAlias = explode(' as ', $item);
            $itemAsAlias = $splitItemAlias[count($splitItemAlias) - 1];
            $items[$indice] = $itemAsAlias;
        }

    }

    while ($query->fetch()) {

        $item = [];
        $a = 0;
        foreach ($date as $dt) {
            $item[$items[$a]] = $dt;
            $a++;
        }
        if ($indexar !== false) {
            $dados[$item[$indexar]] = $item;
        } else {
            array_push($dados, $item);
        }
    }

    $query->close();

    return ($dados);
}
