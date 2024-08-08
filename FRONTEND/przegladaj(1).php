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
                $('.menu .item').eq(1).click();
            else
            {
                byloprzegladania = window.location.search;
                $('.ui.menu').find('.item').tab('change tab', 'second');
                $('#PRZEGLADAJ_DIV').load('elementy/przegladaj.php'+window.location.search );
                zalodowanoprzegladanie = true;

                //map.setView(e.latlng, 13);
                //console.log("przejdz do tego mieszkania")
            }
        </script>
    </body>
</html>