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
        </head>

        <body>

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
