<?php

/**
 * Author: Kameron Someson
 * Date: 4/9/2021
 * File: pokemon_detail.class.php
 * Description:
 */
class PokemonDetail extends PokemonIndexView
{

    public function display($pokemon, $confirm = "")
    {
        //display page header
        parent::displayHeader("Pokemon Details");

        //retrieve movie details by calling get methods
        $id = $pokemon->getId();
        $name = $pokemon->getName();
        $hp = $pokemon->getHp();
        $attack = $pokemon->getAttack();
        $defense = $pokemon->getDefense();
        $type_1 = $pokemon->getType1();
        $type_2 = $pokemon->getType2();
        $ability_1 = $pokemon->getAbility1();
        $ability_2 = $pokemon->getAbility2();
        $hidden_ability = $pokemon->getHiddenAbility();
        $mass = $pokemon->getMass();
        $color = $pokemon->getColor();
        $gender = $pokemon->getGender();
        $evolve = $pokemon->getEvolve();
        $description = $pokemon->getDescription();
        $image = $pokemon->getImage();



        //if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
        //$image = BASE_URL . '/' . POKEMON_IMG . $image;
        //}
?>

        <div id="main-header">Pokemon Details</div>
        <hr>
        <!-- display movie details in a table -->
        <table id="detail">
            <tr>
                <td style="width: 150px;">
                    <img src="<?= $image ?>" alt="<?= $name ?>" />
                </td>
                <td style="width: 130px;">
                    <p><strong>Name:</strong></p>
                    <p><strong>HP:</strong></p>
                    <p><strong>Attack:</strong></p>
                    <p><strong>Defense:</strong></p>
                    <p><strong>Type 1:</strong></p>
                    <p><strong>Type 2:</strong></p>
                    <p><strong>Ability 1:</strong></p>
                    <p><strong>Ability 2:</strong></p>
                    <p><strong>Hidden Ability:</strong></p>
                    <p><strong>Mass:</strong></p>
                    <p><strong>Color:</strong></p>
                    <p><strong>Gender:</strong></p>
                    <p><strong>Evolve:</strong></p>
                    <p><strong>Description:</strong></p>
                </td>
                <td>
                    <p><?= $name ?></p>
                    <p><?= $hp ?></p>
                    <p><?= $attack ?></p>
                    <p><?= $defense ?></p>
                    <p><?= $type_1 ?></p>
                    <p><?= $type_2 ?></p>
                    <p><?= $ability_1 ?></p>
                    <p><?= $ability_2 ?></p>
                    <p><?= $hidden_ability ?></p>
                    <p><?= $mass ?></p>
                    <p><?= $color ?></p>
                    <p><?= $gender ?></p>
                    <p><?= $evolve ?></p>
                    <p class="media-description"><?= $description ?></p>
                    <div id="confirm-message"><?= $confirm ?></div>
                </td>
            </tr>
        </table>
        <a href="<?= BASE_URL ?>/pokemon/index">Go to Pokemon list</a>

<?php
        //display page footer
        parent::displayFooter();
    }

    //end of display method
}
