<?php
/*
 * Author: Dillon Polley
 * Date: April 8th, 2021
 * File: pokemon_error.class.php
 * Description:
 *
 */
class PokemonError extends PokemonIndexView
{

    public function display($message)
    {

        //display page header
        parent::displayHeader("Error");
?>

        <div id="main-header">Error</div>
        <hr>
        <table style="width: 100%; border: none">
            <tr>
                <td style="vertical-align: middle; text-align: center; width:100px">
                    <img src='https://usernamehw.gallerycdn.vsassets.io/extensions/usernamehw/errorlens/3.2.6/1618696879515/Microsoft.VisualStudio.Services.Icons.Default' style="width: 80px; border: none" />
                </td>
                <td style="text-align: left; vertical-align: top;">
                    <h3> Sorry, but an error has occurred.</h3>
                    <div style="color: red">
                        <?= urldecode($message) ?>
                    </div>
                    <br>
                </td>
            </tr>
        </table>
        <br><br><br><br>
        <hr>
        <a href="<?= BASE_URL ?>/pokemon/index">Back to pokemon list</a>
<?php
        //display page footer
        parent::displayFooter();
    }
}
