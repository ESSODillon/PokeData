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
?>

        <div id="list-header">Pokemon Details</div>
        <hr>
        <!-- display movie details in a table -->
        <table id="detail">
            <tr>
                <td style="width: 150px;">
                    <img src="<?= $image ?>" alt="<?= $name ?>" />
                </td>
                <td style="width: 130px;">
                    <p id="detail-title">Name:</p>
                    <br>
                    <p id="detail-title">HP:</p>
                    <p id="detail-title">Attack:</p>
                    <p id="detail-title">Defense:</p>
                    <br>
                    <p id="detail-title">Type 1:</p>
                    <p id="detail-title">Type 2:</p>
                    <br>
                    <p id="detail-title">Ability 1:</p>
                    <p id="detail-title">Ability 2:</p>
                    <br>
                    <p id="detail-title">Hidden Ability:</p>
                    <br>
                    <p id="detail-title">Mass:</p>
                    <p id="detail-title">Color:</p>
                    <p id="detail-title">Gender:</p>
                    <br>
                    <p id="detail-title">Evolve:</p>
                    <br>
                    <p id="detail-title">Description:</p>
                </td>
                <td>
                    <p id="detail-subtitle"><?= $name ?></p>
                    <br>
                    <p id="detail-subtitle"><?= $hp ?></p>
                    <p id="detail-subtitle"><?= $attack ?></p>
                    <p id="detail-subtitle"><?= $defense ?></p>
                    <br>
                    <p id="detail-subtitle"><?= $type_1 ?></p>
                    <p id="detail-subtitle"><?= $type_2 ?></p>
                    <br>
                    <p id="detail-subtitle"><?= $ability_1 ?></p>
                    <p id="detail-subtitle"><?= $ability_2 ?></p>
                    <br>
                    <p id="detail-subtitle"><?= $hidden_ability ?></p>
                    <br>
                    <p id="detail-subtitle"><?= $mass ?></p>
                    <p id="detail-subtitle"><?= $color ?></p>
                    <p id="detail-subtitle"><?= $gender ?></p>
                    <br>
                    <p id="detail-subtitle"><?= $evolve ?></p>
                    <br>
                    <p id="detail-subtitle" class="media-description"><?= $description ?></p>
                    <div id="confirm-message"><?= $confirm ?></div>
                </td>
            </tr>
        </table>
        <br><br>
        <a id="detail-back" href="<?= BASE_URL ?>/pokemon/index">Go back to Pokemon List</a>

<?php
        //display page footer
        parent::displayFooter();
    }

    //end of display method
}
