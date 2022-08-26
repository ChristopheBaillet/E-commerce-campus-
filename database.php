<?php
declare(strict_types=1);
function SelectAllElementsFromTable(PDO $db, string $table) :array
{
    $query = "SELECT * FROM $table";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}