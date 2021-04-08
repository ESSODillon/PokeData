<?php

/*
 * Author: Dillon Polley
 * Date: April 8th, 2021
 * File: pokemon_model.class.php
 * Description: The Pokemon model
 * 
 */

class PokemonModel
{
    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblPokemon;

    private function __construct()
    {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblPokemon = $this->db->getPokemonTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars. 
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars 
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }

    //static method to ensure there is just one PokemonModel instance
    public static function getPokemonModel()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new PokemonModel();
        }
        return self::$_instance;
    }

    public function list_pokemon()
    {
        $sql = "SELECT * FROM " . $this->tblPokemon;

        //execute the query
        $query = $this->dbConnection->query($sql);

        if (!$query)
            return false;

        if ($query->num_rows == 0)
            return 0;

        $Collection = array();

        //loop through all rows in the returned record sets
        while ($obj = $query->fetch_object()) {

            $Pokemon = new Pokemon(stripslashes($obj->name), stripslashes($obj->hp), stripslashes($obj->attack), stripslashes($obj->defense), stripslashes($obj->type_1), stripslashes($obj->type_2), stripslashes($obj->ability_1), stripslashes($obj->ability_2), stripslashes($obj->hidden_ability), stripslashes($obj->mass), stripslashes($obj->color), stripslashes($obj->gender), stripslashes($obj->evolve), stripslashes($obj->description), stripslashes($obj->image));

            //set the id for the Book
            $Pokemon->setId($obj->id);

            //add the Book into the array
            $Collection[] = $Pokemon;
        }

        return $Collection;
    }

    public function view_pokemon($id)
    {
        //the select sql statement
        $sql = "SELECT * FROM " . $this->tblPokemon . " AND " . $this->tblBook . ".id='$id'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {

            $obj = $query->fetch_object();

            //create a Book object
            $Pokemon = new Pokemon(stripslashes($obj->name), stripslashes($obj->hp), stripslashes($obj->attack), stripslashes($obj->defense), stripslashes($obj->type_1), stripslashes($obj->type_2), stripslashes($obj->ability_1), stripslashes($obj->ability_2), stripslashes($obj->hidden_ability), stripslashes($obj->mass), stripslashes($obj->color), stripslashes($obj->gender), stripslashes($obj->evolve), stripslashes($obj->description), stripslashes($obj->image));

            //set the id for the Book
            $Pokemon->setId($obj->id);

            return $Pokemon;
        }

        return false;
    }
}
