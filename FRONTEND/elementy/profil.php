<script>

    if(localStorage.getItem("X-Auth-Token") !== null)
        $("#PROFIL_DIV").load("elementy/profil/zalogowany.php");
    else
        $("#PROFIL_DIV").load("elementy/profil/niezalogowany.php");
</script>

