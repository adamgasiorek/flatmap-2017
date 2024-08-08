<div class="ui tiny united modal" id="modal_zapomnialemHasla" style="min-height: 230px;" >
    <div class="ui center aligned teal header">
        Zapomnianie hasla
    </div>
    <form class="ui large form" id="zapomnialemform" >
        <div style="margin: 15px 15px 15px 15px;">
            <div class="field">
                <div class="ui left icon input">
                    <i class="user icon"></i>
                    <input type="text" name="email" placeholder="E-mail address">
                </div>
            </div>

            <div class="ui fluid large teal submit button" >Wyslij</div>
        </div>

        <div style="width: 90%;margin: auto auto 15px auto;" class="ui error message"></div>

        <div style="width: 90%;margin: auto;margin-bottom: 10px;" class="ui error message" id="niematakiegomeila">
            <div class="header">
                Ej ziomek bo nie ma takiego meila w bazie ;d
            </div>
        </div>

        <div style="width: 90%;margin: auto;margin-bottom: 10px;" class="ui message" id="wejdzsenameila">
            <div class="header">
                Wejdz se na meila teraz
            </div>
        </div>

    </form>

    <div class="ui icon message" style=" position: absolute;bottom: 0;">
        <i class="users icon" style="font-size: 150%;"></i>
        <div class="content">
            <div class="header" >
                Masz konto? <a style="cursor: pointer;" id="idzdologowania3">Zaloguj sie!</a>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {


        $('#niematakiegomeila').hide();
        $('#wejdzsenameila').hide();

        $('form#zapomnialemform').form({
            fields: {
                email: {
                    identifier: 'email',
                    rules: [
                        {
                            type   : 'email',
                            prompt : 'To powinnien byc email'
                        }
                    ]
                }
            },
            onFailure : function(formErrors, fields)
            {
                console.log(fields)
                return false;
            },
            onSuccess : function(event, fields)
            {
                console.log(JSON.stringify($('form#zapomnialemform').serializeObject()));

                $.ajax({
                    url: SERWER+'forgottenPassword',
                    type: "POST",
                    contentType: "application/json",
                    data : JSON.stringify($('form#zapomnialemform').serializeObject()) ,
                    success : function(data){
                        console.log("suckes")
                        $('#wejdzsenameila').show();
                        //location.reload();
                    },
                    error: function(data)
                    {
                        console.log(data.responseText)
                        if(data.responseText == "USER_DOESNT_EXISTS")
                            $('#niematakiegomeila').show();

                    }
                });

                return false;
            }
        }) ;

    });
</script>
