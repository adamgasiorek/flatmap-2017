<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
    <head>
        <?php
        include('szkielet/biblioteki.php');
        ?>


    </head>
    <body>
        <?php
        include('szkielet/pasek_mapa.php');

        include('szkielet/skrypty.php');
        ?>
        <script>
            if( window.location.search == "" )
                $('.menu .item').eq(2).click();
            else
            {
                byloprzegladanialista = window.location.search;
                $('.ui.menu').find('.item').tab('change tab', 'third');
                $('#LIST_DIV').load('elementy/lista.php'+window.location.search, function() {
                    $('.ui.secondary.menu').find('.item').tab('change tab', 'dwa1');
                });
                zalodowanoliste = true;
                zaladowanaListajest = true;


            }
        </script>
    </body>
</html>