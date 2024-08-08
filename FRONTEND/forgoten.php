<html>
    <head>
    <title>Zapomanieles haselka</title>
        <script src="LIB/jquery/jquery-1.12.4.min.js"></script>
        <link rel="stylesheet" type="text/css" href="LIB/semantic/semantic.min.css">
        <script src="LIB/semantic/semantic.min.js"></script>

        <script>
            $(document).ready(function() {

                $('#juzktoswycofal').hide();
                $('.ui.form').form({
                    fields: {
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
                        }
                    },
                    onFailure : function(formErrors, fields)
                    {
                        return false;
                    },
                    onSuccess : function(event, fields)
                    {
                        var obiekt = JSON.stringify({"password" : fields.password,"token" : "<?php echo $_GET['token']; ?>", "requestId" : "<?php echo $_GET['u']; ?>" });
                        console.log(obiekt);

                        $.ajax({
                            url: 'http://164.132.57.18:9999/forgottenPassword/changePassword',
                            type: "POST",
                            contentType: "application/json",
                            data : obiekt ,
                            success : function(data){
                                console.log("suckes")
                                location.href='http://localhost:8080/place/profil.php';
                            },
                            error: function(data)
                            {
                                console.log(data.responseText)
                                if(data.responseText == "INVALID_DATA")
                                {
                                    $('#juzktoswycofal').show();
                                }
                            }
                        });

                        return false;
                    }
                }) ;

            }) ;
        </script>

        <style type="text/css">
            body {
                background-color: #DADADA;
            }
            body > .grid {
                height: 100%;
            }
            .image {
                margin-top: -100px;
            }
            .column {
                max-width: 450px;
            }
        </style>
    </head>
    <body>
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui teal header">
                <div class="content">
                    Zmien haselko sklerozo
                </div>
            </h2>
            <form class="ui large form">
                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="password2" placeholder="Password">
                        </div>
                    </div>
                    <div class="ui fluid large teal submit button">Login</div>
                </div>

                <div class="ui error message"></div>
                <div style="width: 90%;margin: auto;" class="ui error message" id="juzktoswycofal">
                    <div class="header">
                        Ziom ktos cie uprzedil i wycofal
                    </div>
                </div>

            </form>

        </div>
    </div>


    </body>
</html>