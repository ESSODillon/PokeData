<?php

/*
 * Author: Dillon Polley
 * Date: April 8th, 2021
 * File: pokemon_controller.class.php
 * Description: the Pokemon controller
 *
 */

class PokemonController
{
    private $pokemon_model;

    //default constructor
    public function __construct()
    {
        //create an instance of the BookModel class
        $this->pokemon_model = PokemonModel::getPokemonModel();
    }

    //index action that displays all books
    public function index()
    {
        $collection = $this->pokemon_model->list_pokemon();

        if (!$collection) {
            //display an error
            $message = "There was a problem displaying Pokemon.";
            $this->error($message);
            return;
        }

        // display all books
        $view = new PokemonIndex();
        $view->display($collection);
    }



    //handle an error
    public function error($message)
    {
        //create an object of the Error class
        $error = new PokemonError();

        //display the error page
        $error->display($message);
    }
}
