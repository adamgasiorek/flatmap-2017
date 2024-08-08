<div class="ui message" id="brakulubionych" style="margin-top: 20px;">
    <div class="header">
        Brak ulubionych!
    </div>
</div>

<div style="height: 90%;width: 103.5%;padding-bottom: 50px;display:block; overflow:auto;position: relative;" class="ui divided items" id="mojeulubione"  ></div>


<script>
    $(document).ready(function() {
        $('#mojeulubione').perfectScrollbar();

        dodajUlubionejakiemam()
    });
</script>