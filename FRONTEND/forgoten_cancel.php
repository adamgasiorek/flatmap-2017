<html>
    <head>
    <title>Zapomanieles haselka</title>
        <script src="LIB/jquery/jquery-1.12.4.min.js"></script>
        <script>
            var obiekt = JSON.stringify({"token" : "<?php echo $_GET['token']; ?>", "requestId" : "<?php echo $_GET['u']; ?>" });
            console.log(obiekt);

            $.ajax({
                url: 'http://164.132.57.18:9999/forgottenPassword/cancel',
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

                }
            });
        </script>

    </head>
    <body>

    </body>
</html>