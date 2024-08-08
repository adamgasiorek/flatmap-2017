<?php

if(isset($_GET['x1']))
{
    ?>
    <div class="ui fluid two item pointing secondary menu" style="margin-top: -10px;">
        <a class="item " data-tab="jeden1" >
            <i class="star icon"></i>Obserwowane
        </a>
        <a class="item active" data-tab="dwa1" >
            <i class="clone icon"></i>Zaznaczone
        </a>
    </div>
    <div class="ui tab " data-tab="jeden1" style="height: 100%;">
        <?php
        include('lista/ulubione.php');
        ?>
    </div>
    <div class="ui tab active" data-tab="dwa1" style="height: 100%;">
        <?php
        include('lista/zaznaczone.php');
        ?>
    </div>
    <?php

}
else
{
    ?>
    <div class="ui fluid two item pointing secondary menu" style="margin-top: -10px;">
        <a class="item active" data-tab="jeden1" >
            <i class="star icon"></i>Obserwowane
        </a>
        <a class="item" data-tab="dwa1" >
            <i class="clone icon"></i>Zaznaczone
        </a>
    </div>
    <div class="ui tab active" data-tab="jeden1" style="height: 100%;">
        <?php
        include('lista/ulubione.php');
        ?>
    </div>
    <div class="ui tab" data-tab="dwa1" >
        <div class="ui icon message">
            <i class="edit icon"></i>
            <div class="content">
                <div class="header">
                    Zaznacz nieruchomość!
                </div>
                <p>Użyj wyszukiwarki albo narzędzi do rysowania i zaznacz interesujący cię obszar.</p>
            </div>
        </div>
    </div>
    <?php
}
?>




<script>
    $(document).ready(function() {
        $('.menu .item').tab();
    });
</script>