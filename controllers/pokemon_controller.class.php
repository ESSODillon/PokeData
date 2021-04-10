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
        $Collection = $this->pokemon_model->list_pokemon();

        if (!$Collection) {
            //display an error
            $message = "There was a problem displaying Pokemon.";
            $this->error($message);
            return;
        }

        // display all books
        $view = new PokemonIndex();
        $view->display($Collection);
    }

    //show details of pokemon
    public function detail($id){
        //retrieve specific pokemon
        $pokemon = $this->pokemon_model->view_pokemon($id);

        if (!$pokemon){
            $pokemon = "There was a problem displaying the pokemon id='" . $id . "'.";
            $this->error($pokemon);
            return;
        }

        //display pokemon details
        $view = new PokemonDetail();
        $view->display($pokemon);
    }

    //search pokemon
    public function search() {
        //retrieve query terms from search form
        $query_terms = trim($_GET['query-terms']);

        //if search term is empty, list all pokemon
        if ($query_terms == "") {
            $this->index();
        }

        //search the database for matching pokemon
        $pokemons = $this->pokemon_model->search_pokemon($query_terms);

        if ($pokemons === false) {
            //handle error
            $message = "An error has occurred.";
            $this->error($message);
            return;
        }
        //display matched movies
        $search = new PokemonSearch();
        $search->display($query_terms, $pokemons);
    }

    //autosuggestion
    public function suggest($terms) {
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $pokemons = $this->pokemon_model->search_pokemon($query_terms);

        //retrieve all pokemon names and store them in an array
        $names = array();
        if ($pokemons) {
            foreach ($pokemons as $pokemon) {
                $names[] = $pokemon->getName();
            }
        }

        echo json_encode($names);
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
