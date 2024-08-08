<div class="ui modal" id="modal_dodaluj"  >

    <div class="ui center aligned teal header">
        Doładowywanie
    </div>


<div style="width: 95%;padding-bottom: 80px;">
    <div class="ui dividing header" style="margin: 20px 50px 20px 50px;">
       Wybierz interesujacie cie kwote:
    </div>
    <div class="ui three stackable cards" style="margin-left: 50px;margin-right: 50px;">
        <div class="card">
            <div class="image">
                <img src="img/money.jpg" style="pointer-events: none;">
            </div>
            <div class="content" style="margin: 0 auto;">
                <div class="ui labeled fluid button" style="">
                    <div class="ui basic blue button buttonrodzajilosci">
                        <i class="money icon"></i><span> Wybierz</span>
                    </div>
                    <a class="ui basic left pointing blue label">
                        50
                    </a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="img/money.jpg" style="pointer-events: none">
            </div>
            <div class="content" style="margin: 0 auto;">
                <div class="ui labeled fluid button" style="">
                    <div class="ui basic blue button buttonrodzajilosci">
                        <i class="money icon"></i><span> Wybierz</span>
                    </div>
                    <a class="ui basic left pointing blue label">
                        100
                    </a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="img/money.jpg" style="pointer-events: none">
            </div>
            <div class="content" style="margin: 0 auto;">
                <div class="ui labeled fluid button" style="">
                    <div class="ui basic blue button buttonrodzajilosci">
                        <i class="money icon"></i><span> Wybierz</span>
                    </div>
                    <a class="ui basic left pointing blue label">
                        150
                    </a>
                </div>
            </div>
        </div>

    </div>

    <div class="ui dividing header" style="margin: 20px 50px 20px 50px;">
        Wybierz metode:
    </div>
    <div class="ui three stackable cards" style="margin-left: 50px;margin-right: 50px;">
        <div class="card">
            <div class="ui header" style="margin: 5px auto;">Przelew</div>
            <div class="image">
                <img src="img/przelew.jpg" style="pointer-events: none;">
            </div>
            <div class="content" style="margin: 0 auto;">
                <div class="ui labeled fluid button" style="">
                    <div class="ui basic blue button buttonrodzajplatnosci">
                        <i class="money icon"></i><span> Wybierz</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="ui header" style="margin: 5px auto;">Karta kredytowa</div>
            <div class="image">
                <img src="img/karta.jpg" style="pointer-events: none">
            </div>
            <div class="content" style="margin: 0 auto;">
                <div class="ui labeled fluid button" style="">
                    <div class="ui basic blue button buttonrodzajplatnosci">
                        <i class="money icon"></i><span> Wybierz</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="ui header" style="margin: 5px auto;">Paypal</div>
            <div class="image">
                <img src="img/paypal.png" style="pointer-events: none">
            </div>
            <div class="content" style="margin: 0 auto;">
                <div class="ui labeled fluid button" style="">
                    <div class="ui basic blue button buttonrodzajplatnosci">
                        <i class="money icon"></i><span> Wybierz</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div style="position: absolute;right: 13%;margin-top: 50px;">
        <span class="ui warning message" id="wiadomoscwybierzmetode" style="margin-right: 20px;">Wybierz metode platności i ilosc!</span>
        <span style="margin-right: 20px;">0 zł</span>
        <button class="ui right positive floated button" id="zamow">Zamawiam i płace</button>
    </div>

</div>




</div>


<script>
    $(document).ready(function() {
        $('#wiadomoscwybierzmetode').hide();
        var rodzajPlatnosci = 0,rodzajIlosci = 0;

        $('.buttonrodzajilosci').click(function () {
            rodzajIlosci = $('.buttonrodzajilosci').index($(this))+1;

            $('.buttonrodzajilosci').addClass('basic').removeClass('positive');
            $('.buttonrodzajilosci').next().removeClass('green').addClass('blue');
            $('.buttonrodzajilosci').find('span').text(' Wybierz');

            $(this).removeClass('basic').addClass('positive');
            $(this).next().addClass('green').removeClass('blue');
            $(this).find('span').text(' Wybrano');

            console.log(rodzajIlosci)
        });

        $('.buttonrodzajplatnosci').click(function () {
            rodzajPlatnosci = $('.buttonrodzajplatnosci').index($(this))+1;

            $('.buttonrodzajplatnosci').addClass('basic').removeClass('positive');
            $('.buttonrodzajplatnosci').find('span').text(' Wybierz');

            $(this).removeClass('basic').addClass('positive');
            $(this).find('span').text(' Wybrano');

            console.log(rodzajPlatnosci)
        });

        $('#zamow').click(function () {
           if(rodzajPlatnosci == 0 || rodzajIlosci == 0)
           {
               $('#wiadomoscwybierzmetode').show();
           }
           else
           {
               $('#wiadomoscwybierzmetode').hide();
                console.log("wybrano metode : " + rodzajPlatnosci + " ile: " + rodzajIlosci )
           }
        });

    });
</script>