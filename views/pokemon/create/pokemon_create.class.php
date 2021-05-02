<?php
/*
 * Author: 
 * Date: 
 * File: pokemon_create.class.php
 * Description: This class defines a method "display".
 *              The method accepts a Movie object and displays the details of the movie in a form to be edited.
 *
 */

class PokemonCreate extends PokemonIndexView
{

    public function display()
    {
        parent::displayHeader("Create Pokemon");
?>
        <div id="create-header">Create New Pokemon</div>

        <form class="create_form" action="controllers/pokemon_controller.class.php?create=" method="get" enctype="text/plain">
            <table class="newpokemon">
                <tr>
                    <td>Pokemon Name: </td>
                    <td><input name="name" type="text" required /></td>
                </tr>
                <tr>
                    <td>HP: </td>
                    <td><input name="hp" type="text" required /></td>
                </tr>
                <tr>
                    <td>Attack: </td>
                    <td><input name="attack" type="text" required /></td>
                </tr>
                <tr>
                    <td>Defense: </td>
                    <td><input name="defense" type="text" required /></td>
                </tr>
                <tr>
                    <td>Type 1: </td>
                    <td><input name="type_1" type="text" required /></td>
                </tr>
                <tr>
                    <td>Type 2: </td>
                    <td><input name="type_2" type="text"= /></td>
                </tr>
                <tr>
                    <td>Ability 1: </td>
                    <td><input name="ability_1" type="text" required /></td>
                </tr>
                <tr>
                    <td>Ability 2: </td>
                    <td><input name="ability_2" type="text" /></td>
                </tr>
                <tr>
                    <td>Hidden Ability: </td>
                    <td><input name="hidden_ability" type="text" /></td>
                </tr>
                <tr>
                    <td>Mass: </td>
                    <td><input name="mass" type="text" required /></td>
                </tr>
                <tr>
                    <td>Color: </td>
                    <td><input name="color" type="text" required /></td>
                </tr>
                <tr>
                    <td>Gender: </td>
                    <td><input name="gender" type="text" required /></td>
                </tr>
                <tr>
                    <td>Evolve: </td>
                    <td><input name="evolve" type="text" /></td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td><input id="description_input" name="description" type="text" required /></td>
                </tr>
                <tr>
                    <td>Image URL: </td>
                    <td><input name="image" type="text" required /></td>
                </tr>


            </table>

            <br>
            <input class="create_button" type="submit" name="Submit" id="Submit" value="Create Pokemon" />
        </form>

        <a id="detail-back" href="<?= BASE_URL ?>/pokemon/index">Back to pokemon list</a>

<?php
        parent::displayFooter();
    }
}

?>