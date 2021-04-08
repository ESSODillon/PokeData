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

        <div class="grid-container">
            <?php
            if ($pokemons === 0) {
                echo "No book was found.<br><br><br><br><br>";
            } else {
                //display books in a grid; six movies per row
                foreach ($pokemons as $i => $pokemon) {
                    $id = $pokemon->getId();
                    $title = $pokemon->getTitle();
                    $category = $pokemon->getCategory();
                    $image = $pokemon->getImage();
                    if ($i % 6 == 0) {
                        echo "<div class='row'>";
                    }

                    echo "<div class='col'><p><a href='", BASE_URL, "/book/detail/$id'><img src='" . $image .
                        "'></a><span>$title<br>$category<br>" . "</span></p></div>";
            ?>
            <?php
                    if ($i % 6 == 5 || $i == count($pokemons) - 1) {
                        echo "</div>";
                    }
                }
            }
            ?>
        </div>


<?php
        //display page footer
        parent::displayFooter();
    } //end of display method
}
