<?php
require_once(BASE_PATH . '/Model/dal.php');

function getAllCards()
{
    $sql = "SELECT * FROM CARD ";
    $result = getRows($sql);

    return $result;
}

function getCard($id){

    $sql = "SELECT * FROM CARD WHERE PK= ?";
    $result = getRow($sql,'i',[$id]);
    return $result;
}

function getAllCardsByLimit($category ,$from,$to){

    $sql_Condition = '';
    $type = '';
    $vals = [$from,$to];

    if($category  != null){
        $sql_Condition = 'WHERE Categories = ?'; 
        $type = 'i';
        $vals = [$category,$from,$to];
    }
    
    $sql = "SELECT * FROM CARD ".$sql_Condition." LIMIT ?,?";
    $result = getRows($sql,'ii'.$type,$vals);
    return $result;
}

function insertCard($title, $description,$image,$category)
{


    $sql = "INSERT INTO Card (title, description,image,categories) VALUES (?,?,?,?)";
    execute($sql, 'sssi', [$title,$description,$image,$category]);

}

function deleteCard($id){

    $sql = "DELETE FROM CARD WHERE PK=".$id;
    execute($sql, 'i', [$id]);
}


function getAllCategories(){

    $sql = "SELECT PK,NAME FROM Categories ";
    $result = mysqli_query(getConnection(), $sql);

    return $result;
}

// function getCardsWithCategory($category){

    
//     $sql = "SELECT C.* FROM CARD C 
//     INNER JOIN categories cat on C.Categories = cat.pk
//     WHERE cat.pk = ?";
//     $result = getRows($sql,'i',[$category]);

//     return $result;


// }





?>