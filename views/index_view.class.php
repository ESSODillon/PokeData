<?php
/*
 * Author: Louie Zhu
 * Date: March 26, 2021
 * Name: index_view.class.php
 * Description: the parent class for all view classes. The two functions display page header and footer.
 */

class IndexView
{
    static public function displayHeader($page_title)
    {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $page_title ?></title>
            <link type='text/css' rel='stylesheet' href='<?= BASE_URL ?>/www/css/app_style.css' />
        </head>

        <body>
            <div id="top"></div>
            <div id='wrapper'>
                <div id="banner">
                    <a href="<?= BASE_URL ?>/index.php" style="text-decoration: none" title="PokeData">
                        <div id="left">
                            <h1 id="title"'>PokeData</h1>
                            <div id="subtitle">Gotta catch ' em all!</div>
                        </div>
                    </a>
                    <div id="right">
                        <img id="logo_banner" src="<?= BASE_URL ?>/www/img/charizard.png" />
                    </div>
                </div>

            <?php
        }
        public static function displayFooter()
        {
            ?>
                <script type="text/javascript" src="<?= BASE_URL ?>/www/js/ajax_autosuggestion.js"></script>
        </body>

        </html>
<?php
        }
    }
