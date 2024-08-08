<div class="ui tiny united modal" id="modal_zarejestrujSie" style="min-height: 550px;">
    <div class="ui center aligned teal header">
        Rejestracja
    </div>
    <form class="ui large form" id="rejestrecjaform" >
        <div class="ui basic segment">
            <div class="field">
                <div class="ui left icon input">
                    <i class="user icon"></i>
                    <input type="text" name="email" placeholder="E-mail address">
                </div>
            </div>
            <div class="field">
                <div class="ui left icon input">
                    <i class="user icon"></i>
                    <input type="text" name="name" placeholder="Nazwa">
                </div>
            </div>
            <div class="field">
                <div class="ui left icon input">
                    <i class="call icon"></i>
                    <input type="text" name="phone" placeholder="phone" >
                </div>
            </div>
            <div class="field">
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <input type="password" name="password" placeholder="Password">
                </div>
            </div>
            <div class="field">
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <input type="password" name="password2"  placeholder="Password">
                </div>
            </div>

            <div class="two fields">
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="isAgency" checked="checked" value="false">
                        <label>Osoba prywatna</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="isAgency" value="true">
                        <label>Agent nieruchomosci</label>
                    </div>
                </div>
            </div>
            <div class="ui divider"></div>
            <div class="field">
                <div class="ui checkbox">
                    <input type="checkbox" name="terms" class="hidden">
                    <label>Oświadczam, że zapoznałem się i akceptuję <a>Regulamin</a> serwisu xxsasa </label>
                </div>
            </div>
            <div class="field">
                <div class="ui checkbox">
                    <input type="checkbox" class="hidden">
                    <label>Wyrażam zgodę na przesyłanie mi na email informacji handlowych (np. newsletterów, wiadomości itd).</label>
                </div>
            </div>

            <div class="ui fluid large teal submit button" >Zarejestruj się</div>
        </div>

        <div style="width: 90%;margin: auto auto 15px auto;" class="ui error message"></div>

        <div style="width: 90%;margin: auto;" class="ui error message" id="jestjuzmailtaki">
            <div class="header">
                Email jest już zajestrowany
            </div>
            <ul class="list">
                <li>Zaloguj się zamiast tego. <a style="cursor: pointer;" id="idzdologowania2">Zaloguj sie!</a> </li>
            </ul>
        </div>

    </form>

    <div class="ui icon message" style=" position: absolute;bottom: 0;">
        <i class="users icon" style="font-size: 150%;"></i>
        <div class="content">
            <div class="header" >
                Masz konto? <a style="cursor: pointer;" id="idzdologowania">Zaloguj sie!</a>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $.fn.serializeObject = function()
        {
            var o = {};
            var a = this.serializeArray();
            $.each(a, function() {
                if (o[this.name] !== undefined) {
                    if (!o[this.name].push) {
                        o[this.name] = [o[this.name]];
                    }
                    o[this.name].push(this.value || '');
                } else {
                    o[this.name] = this.value || '';
                }
            });

            return o;
        };

        $('#jestjuzmailtaki').hide();
        $('form#rejestrecjaform').form({
            fields: {
                email: {
                    identifier: 'email',
                    rules: [
                        {
                            type   : 'email',
                            prompt : 'To powinnien byc email'
                        }
                    ]
                },
                name: {
                    identifier: 'name',
                    rules: [
                        {
                            type   : 'empty',
                            prompt : 'Brak name'
                        }
                    ]
                },
                phone: {
                    identifier: 'phone',
                    rules: [
                        {
                            type   : 'regExp[/^[+_0-9 ]{4,16}$/]',
                            prompt : 'zly format, albo za dlugi/krotki ten nr tel'
                        }
                    ]
                },
                password: {
                    identifier: 'password',
                    rules: [
                        {
                            type   : 'empty',
                            prompt : 'Puste haslo'
                        },
                        {
                            type   : 'minLength[2]',
                            prompt : 'Nie za krotkie haselko hmm? min 2'
                        }
                    ]
                },
                password2: {
                    identifier: 'password2',
                    rules: [
                        {
                            type   : 'match[password]',
                            prompt : 'Inne hasla'
                        }
                    ]
                },
                terms: {
                    identifier: 'terms',
                    rules: [
                        {
                            type   : 'checked',
                            prompt : 'Zgodzźe sie na ten regulamin noo'
                        }
                    ]
                }
            },
            onFailure : function(formErrors, fields)
            {
                $('#modal_zarejestrujSie').modal("refresh")
                return false;
            },
            onSuccess : function(event, fields)
            {
                console.log(JSON.stringify($('form#rejestrecjaform').serializeObject()));

            $.ajax({
                url: SERWER+'register',
                type: "POST",
                contentType: "application/json",
                data : JSON.stringify($('form#rejestrecjaform').serializeObject()) ,
                success : function(data){
                    console.log("suckes")
                    console.log(data)
                    location.reload();
                },
                error: function(data)
                {
                    console.log(data.responseText)
                    if(data.responseText == "DUPLICATE_EMAIL")
                        $('#jestjuzmailtaki').show();

                }
            });

                return false;
            }
        }) ;


    });
</script>
