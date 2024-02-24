<?php
require_once(BASE_PATH . '/Model/dal.php');

function getAllCards()
{
    $sql = "SELECT * FROM CARD ";
    $result = mysqli_query(getConnection(), $sql);

    return $result;
}

function getCard($id){

    $sql = "SELECT * FROM CARD WHERE PK= ?";
    $result = getRow($sql,'i',[$id]);
    return $result;
}

function getAllCardsByLimit($from,$to){

    $sql = "SELECT * FROM CARD LIMIT ?,?";
    $result = getRows($sql,'ii',[$from,$to]);
    return $result;
}

function insertCard($title, $description,$image)
{


    $sql = "INSERT INTO Card (title, description,image) VALUES (?,?,?)";
    execute($sql, 'sss', [$title,$description,$image]);

}

function deleteCard($id){

    $sql = "DELETE FROM CARD WHERE PK=".$id;
    execute($sql, 'i', [$id]);
}





?>