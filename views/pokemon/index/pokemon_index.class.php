<?php
/*
 * Author: Louie Zhu
 * Date: March 26, 2021
 * Name: book_index.class.php
 * Description: This class defines a method called "display", which displays all books.
 */
class PokemonIndex extends PokemonIndexView
{
    /*
     * the display method accepts an array of book objects and displays
     * them in a grid.
     */

    public function display($pokemons)
    {
        //display page header
        parent::displayHeader("List All Pokemon");
?>

        <div id="main-header">PokeData All Pokemon</div>


<?php
        //display page footer
        parent::displayFooter();
    } //end of display method
}
