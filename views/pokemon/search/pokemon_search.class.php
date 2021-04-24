<?php
/**
 * Author: Kameron Someson
 * Date: 4/9/2021
 * File: pokemon_search.class.php
 * Description:
 */


class PokemonSearch extends PokemonIndexView {
    /*
     * the displays accepts an array of movie objects and displays
     * them in a grid.
     */

    public function display($terms, $Collection) {
        //display page header
        parent::displayHeader("Search Results");
        ?>
        <div id="main-header"> Search Results for <i><?= $terms ?></i></div>
        <span class="rcd-numbers">
            <?php
            echo ((!is_array($Collection)) ? "( 0 - 0 )" : "( 1 - " . count($Collection) . " )");
            ?>
        </span>
        <hr>

        <!-- display all records in a grid -->
        <div class="grid-container">
            <?php
            if ($Collection === 0) {
                echo "No Pokemon was found.<br><br><br><br><br>";
            } else {
                //display pokemon in a grid;
                foreach ($Collection as $i => $pokemon) {
                    $id = $pokemon->getId();
                    $name = $pokemon->getName();
                    $image = $pokemon->getImage();
                    $type_1 = $pokemon->getType1();
                    $type_2 = $pokemon->getType2();
                    if (strpos($image, "http://")=== false AND strpos($image, "https://")=== false){
                        $image = BASE_URL . "/" . POKEMON_IMG .$image;
                    }
                    if ($i % 6 == 0) {
                        echo "<div class='row'>";
                    }

                    echo "<div class='col'><p><a href='", BASE_URL, "/pokemon/detail/$id'><img src='" . $image .
                        "'></a><span>$name<br><br>Type I: $type_1<br><br>Type II: " . $type_2 . "</span></p></div>";
                    ?>
                    <?php
                    if ($i % 6 == 5 || $i == count($Collection) - 1){
                        echo "</div>";
                    }
                }
            }
            ?>
        </div>
        <a href="<?= BASE_URL ?>/pokemon/index">Go to pokemon list</a>
        <?php
        //display page footer
        parent::displayFooter();
    }}

//end of display method