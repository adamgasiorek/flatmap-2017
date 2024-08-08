<a id="idzdowyszsukiwarki" style="cursor: pointer;">
    <div class="ui icon message">
        <i class="search icon"></i>
        <div class="content">
            <div class="header">
                Wybierz nieruchomość!
            </div>
            <p>Użyj wyszukiwarki i wybierz interesujący cię znacznik.</p>
        </div>
    </div>

</a>

<script>
    document.title = "FlatMap | PRZEGLADAJ";
    $("#idzdowyszsukiwarki").click(function(e){
        $('.menu .item').eq(0).click();
        window.history.pushState('MAPA', '', 'wyszukiwarka.php');
        $('#WYSZUKIWANIE_DIV').load('elementy/wyszukiwarka.php');
    });
</script>