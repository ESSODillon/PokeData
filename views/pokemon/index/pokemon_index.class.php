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

    public function display($Collection)
    {
        //display page header
        parent::displayHeader("List All Pokemon");
?>

        <div id="list-header">Generation 1 Pokemon</div>
        <div class="grid-container">
            <?php
            if ($Collection === 0) {
                echo "No Pokemon were found.<br><br><br><br><br>";
            } else {
                //display pokemon in a grid
                foreach ($Collection as $i => $pokemon) {
                    $id = $pokemon->getId();
                    $name = $pokemon->getName();
                    $image = $pokemon->getImage();
                    $type_1 = $pokemon->getType1();
                    $type_2 = $pokemon->getType2();

                    if ($i % 6 == 0) {
                        echo "<div class='row'>";
                    }

                    echo "<div class='col'><p><a href='", BASE_URL, "/pokemon/detail/$id'><img src='" . $image .
                        "'></a><span>$name<br><br>Type I: $type_1<br><br>Type II: " . $type_2 . "</span></p></div>";
            ?>
            <?php
                    if ($i % 6 == 5 || $i == count($Collection) - 1) {
                        echo "</div>";
                    }
                }
            }
            ?>


    <?php
        //display page footer
        parent::displayFooter();
    } //end of display method
}
