<?php
/*
 * Author: Dillon Polley
 * Date: April 8th, 2021
 * Name: pokemon_index_view.class.php
 * Description: the parent class that displays a search box. The search form is commented out here since the search feature is not implemented. 
 */

class PokemonIndexView extends IndexView
{

    public static function displayHeader($title)
    {
        parent::displayHeader($title)
?>
        <script>
            //the media type
            var media = "pokemon";
        </script>
        <div id="searchbar">
            <form method="get" action="<?= BASE_URL ?>/pokemon/search">
                <input type="text" name="query-terms" id="searchtextbox" placeholder="Search pokemon by name" autocomplete="off" onkeyup="handleKeyUp(event)">
                <input type="submit" value="Go" />
            </form>
            <div id="suggestionDiv"></div>
        </div>
<?php
    }

    public static function displayFooter()
    {
        parent::displayFooter();
    }
}
