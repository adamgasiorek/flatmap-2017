<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
    <head>
        <?php
        include('szkielet/biblioteki.php');
        ?>

        <style>
            .modal{
                padding-bottom: 50px;
            }
        </style>
    </head>
    <body>
        <?php
        include('szkielet/pasek_mapa.php');

        include('szkielet/skrypty.php');
        ?>
        <script>
            $('.menu .item').eq(3).click();
        </script>
    </body>
</html>