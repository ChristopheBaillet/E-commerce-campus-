<?php
function SelectAllElementsFromTable(PDO $db, string $table) :array
{
    $query = "SELECT * FROM $table";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function Connection(): PDO{
    return new PDO(
        'mysql:host=localhost;dbname=boutique;charset=utf8',
        'Christophe'
    );
}