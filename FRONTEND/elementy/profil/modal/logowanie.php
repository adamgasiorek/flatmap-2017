<div class="ui tiny united modal" id="modal_zalogujSie" style="min-height: 280px;">
    <div class="ui center aligned teal header">
        Zaloguj się
    </div>
    <form class="ui large form" >
        <div class="ui basic segment">
            <div class="field">
                <div class="ui left icon input">
                    <i class="user icon"></i>
                    <input type="text" name="email" placeholder="E-mail address" id="MOJLOGIN">
                </div>
            </div>
            <div class="field">
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <input type="password" name="password" placeholder="Password" id="MOJHASLO">
                </div>
            </div>
            <div class="ui fluid large teal submit button">Login</div>
        </div>
<!--        <div style="width: 90%;margin: auto auto 15px auto;" class="ui error message"></div>-->
    </form>
    <div style="width: 90%;margin: auto auto 60px auto;position: relative;" class="ui error message" id="zlyloginalbohaslo">
        <div class="header">
            Niepoprawny login albo hasło
        </div>
        <ul class="list">
            <li>Sprawdz czy nie masz walczego capslocka.</li>
            <li>no nie wiem radz sobie.</li>
        </ul>
    </div>
    <div class="ui icon message" style=" position: absolute;bottom: 0;">
        <i class="users icon" style="font-size: 150%;"></i>
        <div class="content">
            <div class="header" >
                Jestes nowy? <a style="cursor: pointer;" id="idzdorejestruj">Zarejestruj się!</a> lub <a style="cursor: pointer;" id="idzdozapomanialemhasla">Zapomniales hasla?</a>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#zlyloginalbohaslo').hide();
        $('.ui.form').form({
                fields: {
                    email: {
                        identifier: 'email',
                        rules: [
                            {
                                type   : 'empty',
                                prompt : 'Puste email'
                            }
                        ]
                    },
                    password: {
                        identifier: 'password',
                        rules: [
                            {
                                type   : 'empty',
                                prompt : 'Puste haslo'
                            }
                        ]
                    }
                },
                onSuccess : function(event, fields)
                {
                    $.ajax({
                        url: SERWER+"person/session/login",
                        type: "POST",
                        contentType: "application/json",
                        data: JSON.stringify({login: $('#MOJLOGIN').val(), password: $('#MOJHASLO').val()}),
                        success : function(data){
                            console.log("dobrzez")
                            console.log(data);
                            localStorage.setItem("X-Auth-Token",data);
                            location.reload();
                        },
                        error: function(data)
                        {
                            //console.log("error")
                            if(data.status == 403)
                            $('#zlyloginalbohaslo').show();
                        }
                    });

                    return false;
                }
            }) ;


    });
</script>
