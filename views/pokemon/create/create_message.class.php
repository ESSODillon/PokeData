<?php
/*
 * Author: 
 * Date: 
 * File: pokemon_create.class.php
 * Description: This class defines a method "display".
 *              The method accepts a Movie object and displays the details of the movie in a form to be edited.
 *
 */

class CreateMessage extends PokemonIndexView
{

    public function display()
    {
        parent::displayHeader("Pokemon Creation Successful");
?>
        <div id="create-header">Pokemon Creation Successful!</div>

        <a id="detail-back" href="<?= BASE_URL ?>/pokemon/index">Back to pokemon list</a>

<?php
        parent::displayFooter();
    }
}

?>