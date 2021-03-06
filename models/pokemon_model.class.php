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

            $Pokemon = new Pokemon(stripslashes($obj->Name), stripslashes($obj->HP), stripslashes($obj->Attack), stripslashes($obj->Defense), stripslashes($obj->Type_I), stripslashes($obj->Type_II), stripslashes($obj->Ability_I), stripslashes($obj->Ability_II), stripslashes($obj->Hidden_Ability), stripslashes($obj->Mass), stripslashes($obj->Color), stripslashes($obj->Gender), stripslashes($obj->Evolve), stripslashes($obj->Description), stripslashes($obj->Image));
            //set the id for the Book
            $Pokemon->setId($obj->ID);

            //add the Book into the array
            $Collection[] = $Pokemon;
        }

        return $Collection;
    }

    public function view_pokemon($id)
    {
        //the select sql statement
        $sql = "SELECT * FROM " . $this->tblPokemon . " WHERE " . $this->tblPokemon . ".id='$id'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {

            $obj = $query->fetch_object();

            //create a Book object
            $Pokemon = new Pokemon(stripslashes($obj->Name), stripslashes($obj->HP), stripslashes($obj->Attack), stripslashes($obj->Defense), stripslashes($obj->Type_I), stripslashes($obj->Type_II), stripslashes($obj->Ability_I), stripslashes($obj->Ability_II), stripslashes($obj->Hidden_Ability), stripslashes($obj->Mass), stripslashes($obj->Color), stripslashes($obj->Gender), stripslashes($obj->Evolve), stripslashes($obj->Description), stripslashes($obj->Image));

            //set the id for the Book
            $Pokemon->setId($obj->ID);

            return $Pokemon;
        }

        return false;
    }

    public function create_pokemon()
    {
        $name = $this->objDBConnection->real_escape_string(trim(filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING)));
        $hp = $this->objDBConnection->real_escape_string(trim(filter_input(INPUT_GET, 'hp', FILTER_SANITIZE_STRING)));
        $attack = $this->objDBConnection->real_escape_string(trim(filter_input(INPUT_GET, 'attack', FILTER_SANITIZE_STRING)));
        $defense = $this->objDBConnection->real_escape_string(trim(filter_input(INPUT_GET, 'defense', FILTER_SANITIZE_STRING)));
        $type_1 = $this->objDBConnection->real_escape_string(trim(filter_input(INPUT_GET, 'type_1', FILTER_SANITIZE_STRING)));
        $type_2 = $this->objDBConnection->real_escape_string(trim(filter_input(INPUT_GET, 'type_2', FILTER_SANITIZE_STRING)));
        $ability_1 = $this->objDBConnection->real_escape_string(trim(filter_input(INPUT_GET, 'ability_1', FILTER_SANITIZE_STRING)));
        $ability_2 = $this->objDBConnection->real_escape_string(trim(filter_input(INPUT_GET, 'ability_2', FILTER_SANITIZE_STRING)));
        $hidden_ability = $this->objDBConnection->real_escape_string(trim(filter_input(INPUT_GET, 'hidden_ability', FILTER_SANITIZE_STRING)));
        $mass = $this->objDBConnection->real_escape_string(trim(filter_input(INPUT_GET, 'mass', FILTER_SANITIZE_STRING)));
        $color = $this->objDBConnection->real_escape_string(trim(filter_input(INPUT_GET, 'color', FILTER_SANITIZE_STRING)));
        $gender = $this->objDBConnection->real_escape_string(trim(filter_input(INPUT_GET, 'gender', FILTER_SANITIZE_STRING)));
        $evolve = $this->objDBConnection->real_escape_string(trim(filter_input(INPUT_GET, 'evolve', FILTER_SANITIZE_STRING)));
        $description = $this->objDBConnection->real_escape_string(trim(filter_input(INPUT_GET, 'description', FILTER_SANITIZE_STRING)));
        $image = $this->objDBConnection->real_escape_string(trim(filter_input(INPUT_GET, 'image', FILTER_SANITIZE_STRING)));

        $sql = "INSERT INTO " . $this->tblPokemon . " (name, hp, attack, defense, type_1, type_2, ability_1, ability_2, hidden_ability, mass, color, gender, evolve, description, image) VALUES ('$name', '$hp', '$attack', '$defense', '$type_1', '$type_2', '$ability_1', '$ability_2', '$hidden_ability', '$mass', '$color', '$gender', '$evolve','$description','$image',)";

        $query = $this->dbConnection->query($sql);

        if (!$query)
            return false;
    }
    //search the database for pokemon that match words in titles. Return an array of pokemon if succeed; false otherwise.
    public function search_pokemon($terms)
    {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        //select statement for AND serach
        $sql = "SELECT * FROM " . $this->tblPokemon . " WHERE ";

        foreach ($terms as $term) {
            $sql .= " Name LIKE '%" . $term . "%' AND";
        }

        //$sql .= ")";

        $sql = rtrim($sql, "AND");
        //echo $sql;

        //execute the query
        $query = $this->dbConnection->query($sql);

        //error from multiple terms from the user
        try {
            if (!$query) {
                throw new SearchException();
            }
        } catch (SearchException $e) {
            $view = new SearchError();
            $view->display();
            die();
        }

        // the search failed, return false.
        if (!$query)
            return false;


        if ($query->num_rows == 0)
            return 0;


        $Collection = array();


        while ($obj = $query->fetch_object()) {
            //$Pokemon = new Pokemon($obj->Name, $obj->Type_1, $obj->Type_2, $obj->Image, $obj->HP, $obj->Attack, $obj->Defense, $obj->Ability_1, $obj->Ability_2, $obj->Hidden_Ability, $obj->Mass, $obj->Color, $obj->Gender, $obj->Evolve, $obj->Description);
            $Pokemon = new Pokemon($obj->Name, $obj->HP, $obj->Attack, $obj->Defense, $obj->Type_I, $obj->Type_II, $obj->Ability_I, $obj->Ability_II, $obj->Hidden_Ability, $obj->Mass, $obj->Color, $obj->Gender, $obj->Evolve, $obj->Description, $obj->Image);
            //set the id for the pokemon
            $Pokemon->setId($obj->ID);

            //add the pokemon into the array
            $Collection[] = $Pokemon;
        }
        return $Collection;
    }
}
