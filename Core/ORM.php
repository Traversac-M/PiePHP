<?php

namespace Core;

class Orm
{
    public function create ($table, $fields)
    {
            // retourne un id
    }

    public function read ($table, $id)
    {
        $req->Database::$database->prepare("SELECT * FROM $table WHERE id = $id");
        $req->execute();
        $readInfo = $req->fetch();  
    }

    public function update ($table, $id, $fields)
    {
            // retourne un booléen  
    }

    public function delete ($table, $id)
    {
                 // retourne un booléen
    }

    public function find ($table, $params = array(
        'WHERE' => '1',
        'ORDER BY' => 'id ASC',
        'LIMIT' => ''))
    {
    // retourne un tableau d'enregistrements
    }
}

$orm = new ORM();
$orm->create('articles', array(
    'titre' => "",
    'content' => '',
    'author' => ''));

$orm->update('articles', 1, array(
    'titre' => "",
    'content' => '',
    'author' => ''));
$orm->delete('articles', 1);