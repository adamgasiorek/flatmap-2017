
    <h2 class="ui header">
        <i class="users icon"></i>
        <div class="content" style="cursor: pointer;">
            <span id="zalogujSie">Zaloguj sie!</span>
            <div class="sub header" id="zarejestrujSie">Zarejestruj sie!</div>
        </div>
    </h2>


<div class="ui buttons fluid" style="margin-top: 10px;">
    <div class="ui labeled button" id="dodajOgloszenie" >
        <div class="ui basic button">
            <i class="icons">
                <i class="home icon"></i>
                <i class="inverted corner add icon"></i>
            </i>
            &nbsp;&nbsp;&nbsp;&nbsp;Dodaj ogłoszenie:
        </div>
    </div>
    <div class="ui labeled button" id="doladujKonto" >
        <div class="ui basic button" >
            <i class="money icon"></i> Doładuj:
        </div>
        <a class="ui basic left pointing green label">0</a>
    </div>
</div>


<h4 class="ui dividing header">
    Moje ogłoszenia:
</h4>

<div class="ui message" style="margin-top: 20px;">
    <div class="header">
        Brak dodanych ogłoszeń!
    </div>
    Aby dodawać ogłoszenia, musisz się zalogować i aktywować emaila!
</div>

<!-- DOLADUJ -->
<?php
include('modal/doladuj.php');
?>

<!-- LOGOWANIE -->
<?php
include('modal/logowanie.php');
?>


<?php
include('modal/rejestracja.php');
?>

    <?php
    include('modal/zapomnialem.php');
    ?>
<!-- KONIEC -->


<script>
    $(document).ready(function() {
        $('.menu .item').tab();

        $('.checkbox').checkbox();

        $('#zalogujSie').click(function(){
            $('#modal_zalogujSie').modal('show');
        });

        $('#zarejestrujSie').click(function(){
            $('#modal_zarejestrujSie').modal('show');
        });

        $('#doladujKonto').click(function(){
            $('#modal_dodaluj').modal('show');
        });


        $('#modal_zarejestrujSie').modal('attach events', '#idzdorejestruj');
        $('#modal_zapomnialemHasla').modal('attach events', '#idzdozapomanialemhasla');
        $('#modal_zalogujSie').modal('attach events', '#idzdologowania');
        $('#modal_zalogujSie').modal('attach events', '#idzdologowania2');
        $('#modal_zalogujSie').modal('attach events', '#idzdologowania3');

        $('#dodajOgloszenie').on('click', function(){
            $('#modal_zalogujSie').modal('show');
        });

    });
</script>

