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
        if($pokemons===0){
            echo "No Pokemon were found.<br><br><br><br><br>";
        } else{
            //display pokemon in a grid
            foreach ($pokemons as $i=> $pokemon){
                $id = $pokemon->getId();
                $name = $pokemon->getName();
                $image = $pokemon->getImage();
                $type_1 = $pokemon->getType1();
                $type_2 = $pokemon->getType2();
                if (strpos($image, "http://")=== false AND strpos($image, "https://")=== false){
                    $image = BASE_URL . "/" .$image;
                }
                if ($i % 6 == 0) {
                    echo "<div class='row'>";
                }

                echo "<div class='col'><p><a href='", BASE_URL, "/pokemon/detail/$id'><img src='" . $image .
                    "'></a><span>$name<br>Type $type_1<br>" . $type_2 . "</span></p></div>";
                ?>
                <?php
                if ($i % 6 == 5 || $i == count($pokemons) - 1){
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
