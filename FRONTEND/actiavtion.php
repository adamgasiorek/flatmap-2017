<html>
    <head>
    <title>AKTYWACJA</title>
        <script src="LIB/jquery/jquery-1.12.4.min.js"></script>
        <script>

                var obiekt = JSON.stringify({"token" : "<?php echo $_GET['token']; ?>", "u" : "<?php echo $_GET['u']; ?>" });
            console.log( obiekt )
                $.ajax({
                    url: 'http://164.132.57.18:9999/register/activateMail',
                    type: "POST",
                    contentType: "application/json",
                    data : obiekt,
                    success : function(data){
                        localStorage.removeItem('X-Auth-Token');
                        location.href='http://localhost:8080/place/profil.php';
                    },
                    error: function(data)
                    {
                        console.log("error")
                        console.log(data)
                    }
                });
        </script>
    </head>
    <body>
        Konto aktywne mozesz sie zalogowac


    </body>
</html>