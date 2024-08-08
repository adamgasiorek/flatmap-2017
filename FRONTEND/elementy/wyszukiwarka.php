
<div class="ui form" style="height: 100%;position: relative;padding-right: 5px;padding-left: 5px;" id="wyszukiwarkaikryteria">

    <div id="wyszukiwarka1" >
        <h4 class="ui dividing header">Wyszukiwarka:
            <span id="wyczscKryteria" style="font-size: 80%;float: right;cursor: pointer;"><i class="icon remove" style="margin-right: 2px;"></i>WYCZYSC</span>
        </h4>

        <div class="ui big header"><i class="world icon"></i>Gdzie?</div>
        <div class="ui right labeled input fluid">
            <div id="WYSZUKIWARKAGOOGLE" style="width: 80%;"></div>
            <div class="ui dropdown label" id="rodzajZasieg">
                <div class="text">+ 2 km</div>
                <i class="dropdown icon"></i>
                <div class="menu" >
                    <div class="item" data-value="1">+ 1 km</div>
                    <div class="item" data-value="2">+ 2 km</div>
                    <div class="item" data-value="3">+ 5 km</div>
                    <div class="item" data-value="4">+ 10 km</div>
                    <div class="item" data-value="5">+ 20 km</div>
                </div>
            </div>
        </div>



        <div class="ui big header"><i class="search icon"></i>Czego szukasz?</div>
        <div class="two fields">
            <div class="field" >
                <div id="rodzajNieruchomosci" data-value="propertyType" class="ui fluid selection dropdown wyborKryteria"  >
                    <input type="hidden" name="rodzaj">
                    <div class="default text">Nieruchomość</div>
                    <div class="menu" style="overflow:auto;max-height:300px;" >
                        <div class="item" data-value="-100">Dowolny</div>
                        <div class="item" data-value="0"><i class="home icon"></i>Dom</div>
                        <div class="item" data-value="50"><i class="building icon"></i>Mieszkanie</div>
                        <div class="item" data-value="100"><i class="bed icon"></i>Pokój</div>
                        <div class="item" data-value="150"><i class="tree icon"></i>Działka</div>
                        <div class="item" data-value="200"><i class="car icon"></i>Garaż</div>
                        <div class="item" data-value="250"><i class="coffee icon"></i>Lokale</div>
                    </div>
                </div>

            </div>
            <div class="field">
                <div id="rodzajTransakcji" data-value="offerType" class="ui fluid selection dropdown wyborKryteria">
                    <input type="hidden" name="rodzaj">
                    <div class="default text">Transakcja</div>
                    <div class="menu" style="overflow:auto;max-height:300px;">
                        <div class="item" data-value="-100">Dowolny</div>
                        <div class="item" data-value="0"><div class="ui blue empty circular label"></div>Wynajem</div>
                        <div class="item" data-value="1"><div class="ui red empty circular label"></div>Sprzedaż</div>
                        <div class="item" data-value="2"><div class="ui green empty circular label"></div>Pobyt</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="wyszukiwarka2" >

        <div class="ui accordion" style="min-height: 100%;position: relative;">
            <div class=" title">
                <div class="ui header" ><i class="dropdown icon"></i> Więcej parametrów:</div>
            </div>
            <div class="content" id="wiecejpokazschow">
                <div class="field fieldmarginBottom">
                    <div class="ui header tiny">
                        <i class="money icon"></i>
                        <div class="content">
                            Cena:
                        </div>
                    </div>
                    <div class="fields">
                        <div class="six wide field">
                            <input type="text" placeholder="Od" id="cenaOd">
                        </div>
                        <div class="six wide field">
                            <input type="text" placeholder="Do" id="cenaDo">
                        </div>
                        <div class="four wide field">
                            <div class="ui selection dropdown fluid" id="rodzajWaluta">
                                <input type="hidden" name="pietro">
                                <div class="default text">Waluta</div>
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <div class="item" data-value="1">
                                        PLN
                                    </div>
                                    <div class="item" data-value="2">
                                        <i class="icon dollar"></i>
                                    </div>
                                    <div class="item" data-value="3">
                                        <i class="icon euro"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <span class="wiadomoscwarn" id="cenaWiadomosc" style="color: red;"><i class="warning sign icon"></i>Cena min musi byc mniejsza od ceny max</span>

                </div>

                <div class="fieldmarginBottom" style="display: block!important;visibility: visible!important;">
                    <div class="field" id="rodzajZabudowyOnOff_HOUSE">
                        <div class="ui header tiny">
                            <i class="building icon"></i>
                            <div class="content">
                                Rodzaj zabudowy:
                            </div>
                        </div>
                        <div class="field" >
                            <select multiple="" data-value="buildingType" class="ui fluid selection wyborKryteriaMultiple rodzajBudynku">
                                <option value="">Dowolne</option>
                                <option value="0">HOUSE_DETACHED</option>
                                <option value="1">HOUSE_SEMI_DETACHED</option>
                                <option value="2">HOUSE_TERRACED</option>
                                <option value="2">HOUSE_SUMMER</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="fieldmarginBottom" style="display: block!important;visibility: visible!important;">
                    <div class="field" id="rodzajZabudowyOnOff_FLAT">
                        <div class="ui header tiny">
                            <i class="building icon"></i>
                            <div class="content">
                                Rodzaj zabudowy:
                            </div>
                        </div>
                        <div class="field" >
                            <select multiple="" data-value="buildingType" class="ui fluid selection wyborKryteriaMultiple rodzajBudynku">
                                <option value="">Dowolne</option>
                                <option value="50">FLAT_BLOCK</option>
                                <option value="51">FLAT_TENEMENT</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="fieldmarginBottom" style="display: block!important;visibility: visible!important;">
                    <div class="field" id="rodzajZabudowyOnOff_ROOM">
                        <div class="ui header tiny">
                            <i class="building icon"></i>
                            <div class="content">
                                Rodzaj zabudowy:
                            </div>
                        </div>
                        <div class="field" >
                            <select multiple="" data-value="buildingType" class="ui fluid selection wyborKryteriaMultiple rodzajBudynku">
                                <option value="">Dowolne</option>
                                <option value="100">ROOM_BLOCK</option>
                                <option value="101">ROOM_TENEMENT</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="fieldmarginBottom" style="display: block!important;visibility: visible!important;">
                    <div class="field" id="rodzajZabudowyOnOff_PARCEL">
                        <div class="ui header tiny">
                            <i class="building icon"></i>
                            <div class="content">
                                Rodzaj zabudowy:
                            </div>
                        </div>
                        <div class="field" >
                            <select multiple="" data-value="buildingType" class="ui fluid selection wyborKryteriaMultiple rodzajBudynku">
                                <option value="">Dowolne</option>
                                <option value="150">PARCEL_BUILDING</option>
                                <option value="151">PARCEL_AGRICULTURAL</option>
                                <option value="152">PARCEL_SUMMER</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="fieldmarginBottom" style="display: block!important;visibility: visible!important;">
                    <div class="field" id="rodzajZabudowyOnOff_GARAGE">
                        <div class="ui header tiny">
                            <i class="building icon"></i>
                            <div class="content">
                                Rodzaj zabudowy:
                            </div>
                        </div>
                        <div class="field" >
                            <select multiple="" data-value="buildingType" class="ui fluid selection wyborKryteriaMultiple rodzajBudynku">
                                <option value="">Dowolne</option>
                                <option value="200">GARAGE_DETACHED</option>
                                <option value="201">GARAGE_PARKINGPLACE</option>
                                <option value="202">GARAGE_PARKING</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="fieldmarginBottom" style="display: block!important;visibility: visible!important;">
                    <div class="field" id="rodzajZabudowyOnOff_LOCAL">
                        <div class="ui header tiny">
                            <i class="building icon"></i>
                            <div class="content">
                                Rodzaj zabudowy:
                            </div>
                        </div>
                        <div class="field" >
                            <select multiple="" data-value="buildingType" class="ui fluid selection wyborKryteriaMultiple rodzajBudynku">
                                <option value="">Dowolne</option>
                                <option value="250">LOCAL</option>
                                <option value="251">LOCAL_SHOP</option>
                                <option value="252">LOCAL_OFFICE</option>
                                <option value="253">LOCAL_STOREHOUSE</option>
                                <option value="254">LOCAL_HALL</option>
                                <option value="255">LOCAL_OTHER</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field fieldmarginBottom">
                    <div class="ui header tiny">
                        <i class="wait icon"></i>
                        <div class="content">
                            Aktualność ogłoszenia:
                        </div>
                    </div>
                    <div class="field">
                        <div data-value="lastAdded" class="ui selection dropdown fluid wyborKryteria" id="aktualnoscogloszenia">
                            <input type="hidden" name="pietro">
                            <div class="default text">Dowolne</div>
                            <i class="dropdown icon"></i>
                            <div class="menu">
                                <div class="item" data-value="-100">
                                    Dowolne
                                </div>
                                <div class="item" data-value="1">
                                    z ostatnich 24 godzin
                                </div>
                                <div class="item" data-value="2">
                                    z ostatnich 2 dni
                                </div>
                                <div class="item" data-value="3">
                                    z ostatnich 7 dni
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="field fieldmarginBottom">
                    <div class="ui header tiny">
                        <i class="users icon"></i>
                        <div class="content">
                            Ilość osob:
                        </div>
                    </div>
                    <div class="field">
                        <select multiple="" data-value="personcount" class="ui fluid normal selection dropdown wyborKryteriaMultiple" id="iloscosob">
                            <option value="">Dowolne</option>
                            <option value="1">1 osoba</option>
                            <option value="2">2 osoby</option>
                            <option value="3">3 osoby</option>
                        </select>
                    </div>
                </div>

                <div class="field fieldmarginBottom">
                    <div class="ui header tiny">
                        <i class="fire icon"></i>
                        <div class="content">
                            Typ ogrzewania:
                        </div>
                    </div>
                    <div class="field">
                        <select multiple="" data-value="heatingtype" class="ui fluid normal dropdown wyborKryteriaMultiple" id="typogrzewania">
                            <option value="">Dowolne</option>
                            <option value="1">Elektryczne</option>
                            <option value="2">Gazowe</option>
                            <option value="3">Miejskei</option>
                        </select>
                    </div>
                </div>

                <div class="field fieldmarginBottom">
                    <div class="ui header tiny">
                        <i class="cube icon"></i>
                        <div class="content">
                            Powierzchnia:
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field">
                            <div class="ui right labeled input">
                                <input type="text" placeholder="Od" id="areaOd" maxlength="5">
                                <div class="ui basic label">
                                    m<sup>2</sup>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui right labeled input">
                                <input type="text" placeholder="Do" id="areaDo" maxlength="5">
                                <div class="ui basic label">
                                    m<sup>2</sup>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="wiadomoscwarn" id="powierzchniaWiadomosc" style="color: red;"><i class="warning sign icon"></i>Powierzchnia min musi byc mniejsza od  max</span>
                </div>

                <div class="field fieldmarginBottom">
                    <div class="ui header tiny">
                        <i class="hourglass end icon"></i>
                        <div class="content">
                            Rok budowy:
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field">
                            <input type="text" placeholder="Od" id="rokOd" maxlength="4">
                        </div>
                        <div class="field">
                            <input type="text" placeholder="Do" id="rokDo" maxlength="4">
                        </div>
                    </div>
                    <span class="wiadomoscwarn" id="rokWiadomosc" style="color: red;"><i class="warning sign icon"></i>Rok min musi byc < od max i w (1950-2017)</span>
                </div>

                <div class="field fieldmarginBottom">
                    <div class="ui header tiny">
                        <i class="hotel icon"></i>
                        <div class="content">
                            Ilość pokoi:
                        </div>
                    </div>
                    <div class="field">
                        <select multiple="" data-value="roomcount" class="ui fluid normal dropdown wyborKryteriaMultiple" id="iloscpokoi">
                            <option value="">Dowolne</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>

                <div class="field fieldmarginBottom">
                    <div class="ui header tiny">
                        <i class="angle double up icon"></i>
                        <div class="content" >
                            Piętro:
                        </div>
                    </div>
                    <div class="field">
                        <select multiple="" data-value="floor" class="ui fluid normal dropdown wyborKryteriaMultiple" id="pietro">
                            <option value="">Dowolne</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>




                <div class="ui divider" style="margin-top: 25px;margin-bottom: 25px;"></div>

                <div class="two fields fieldmarginBottom">
                    <div class="field">
                        <label>Umeblowanie:</label>
                        <div data-value="furnished" class="ui fluid selection dropdown wyborKryteria" id="umeblowane">
                            <input type="hidden" name="gender">
                            <i class="dropdown icon"></i>
                            <div class="default text">Dowolne</div>
                            <div class="menu">
                                <div class="item" data-value="true"><i class="checkmark green icon"></i>Tak</div>
                                <div class="item" data-value="false"><i class="remove red icon"></i>Nie</div>
                                <div class="item" data-value="-100" >Dowolne</div>
                            </div>
                        </div>
                    </div>
                    <div class="field ">
                        <label>Ogłoszenie z agencji:</label>
                        <div data-value="isFromAgency" class="ui fluid selection dropdown wyborKryteria" id="zagencji">
                            <input type="hidden" name="gender">
                            <i class="dropdown icon"></i>
                            <div class="default text">Dowolne</div>
                            <div class="menu">
                                <div class="item" data-value="true"><i class="checkmark green icon"></i>Tak</div>
                                <div class="item" data-value="false"><i class="remove red icon"></i>Nie</div>
                                <div class="item" data-value="-100" >Dowolne</div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="two fields fieldmarginBottom ">
                    <div class="field">
                        <label>Winda:</label>
                        <div data-value="lift" class="ui fluid selection dropdown wyborKryteria" id="winda">
                            <input type="hidden" name="gender">
                            <i class="dropdown icon"></i>
                            <div class="default text">Dowolne</div>
                            <div class="menu">
                                <div class="item" data-value="true"><i class="checkmark green icon"></i>Tak</div>
                                <div class="item" data-value="false"><i class="remove red icon"></i>Nie</div>
                                <div class="item" data-value="-100" >Dowolne</div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Piwnica:</label>
                        <div data-value="basement" class="ui fluid selection dropdown wyborKryteria" id="piwnica">
                            <input type="hidden" name="gender">
                            <i class="dropdown icon"></i>
                            <div class="default text">Dowolne</div>
                            <div class="menu">
                                <div class="item" data-value="true"><i class="checkmark green icon"></i>Tak</div>
                                <div class="item" data-value="false"><i class="remove red icon"></i>Nie</div>
                                <div class="item" data-value="-100" >Dowolne</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="two fields fieldmarginBottom">
                    <div class="field">
                        <label>Palący:</label>
                        <div data-value="smoking" class="ui fluid selection dropdown wyborKryteria" id="palacy">
                            <input type="hidden" name="gender">
                            <i class="dropdown icon"></i>
                            <div class="default text">Dowolne</div>
                            <div class="menu">
                                <div class="item" data-value="true"><i class="checkmark green icon"></i>Tak</div>
                                <div class="item" data-value="false"><i class="remove red icon"></i>Nie</div>
                                <div class="item" data-value="-100" >Dowolne</div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Zwierzeta:</label>
                        <div data-value="pets" class="ui fluid selection dropdown wyborKryteria" id="zwierzeta">
                            <input type="hidden" name="gender">
                            <i class="dropdown icon"></i>
                            <div class="default text">Dowolne</div>
                            <div class="menu">
                                <div class="item" data-value="true"><i class="checkmark green icon"></i>Tak</div>
                                <div class="item" data-value="false"><i class="remove red icon"></i>Nie</div>
                                <div class="item" data-value="-100" >Dowolne</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="two fields fieldmarginBottom">
                    <div class="field">
                        <label>Parking:</label>
                        <div data-value="parking" class="ui fluid selection dropdown wyborKryteria" id="parking">
                            <input type="hidden" name="gender">
                            <i class="dropdown icon"></i>
                            <div class="default text">Dowolne</div>
                            <div class="menu">
                                <div class="item" data-value="true"><i class="checkmark green icon"></i>Tak</div>
                                <div class="item" data-value="false"><i class="remove red icon"></i>Nie</div>
                                <div class="item" data-value="-100" >Dowolne</div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Balkon:</label>
                        <div data-value="balcony" class="ui fluid selection dropdown wyborKryteria" id="balkon">
                            <input type="hidden" name="gender">
                            <i class="dropdown icon"></i>
                            <div class="default text">Dowolne</div>
                            <div class="menu">
                                <div class="item" data-value="true"><i class="checkmark green icon"></i>Tak</div>
                                <div class="item" data-value="false"><i class="remove red icon"></i>Nie</div>
                                <div class="item" data-value="-100" >Dowolne</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="two fields fieldmarginBottom">
                    <div class="field">
                        <label>Klimatyzacja:</label>
                        <div data-value="clima" class="ui fluid selection dropdown wyborKryteria" id="klimatyzacja">
                            <input type="hidden" name="gender">
                            <i class="dropdown icon"></i>
                            <div class="default text">Dowolne</div>
                            <div class="menu">
                                <div class="item" data-value="true"><i class="checkmark green icon"></i>Tak</div>
                                <div class="item" data-value="false"><i class="remove red icon"></i>Nie</div>
                                <div class="item" data-value="-100" >Dowolne</div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Ogród:</label>
                        <div data-value="garden" class="ui fluid selection dropdown wyborKryteria" id="ogrod">
                            <input type="hidden" name="gender">
                            <i class="dropdown icon"></i>
                            <div class="default text">Dowolne</div>
                            <div class="menu">
                                <div class="item" data-value="true"><i class="checkmark green icon"></i>Tak</div>
                                <div class="item" data-value="false"><i class="remove red icon"></i>Nie</div>
                                <div class="item" data-value="-100" >Dowolne</div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>

            <div style="height: 90px;width:100%;position: absolute;bottom: 0;overflow: hidden">
                <div class="ui divider" style="margin-bottom: 10px;width: 105%;"></div>
                <!--    <div class="ui big header">Legenda:</div>-->

                <div class="ui three column grid" id="legenda" style="height: 90%;width: 120%;" >
                    <div class="column">
                        <div class="row" >
                            <div class="column"><div style="width: 20px;" class="ui red label"></div> Sprzedaż </div>
                            <div class="column" style="padding-top: 5px;"><div style="width: 20px;" class="ui green label"></div> Pobyt </div>
                            <div class="column" style="padding-top: 5px;"><div style="width: 20px;" class="ui blue label"></div> Wynajem </div>
                        </div>
                    </div>
                    <div style="border-left:1px solid #c9c9c9;height:100%;width: 5px;margin-right: -20px;margin-left: -10px;margin-top: 3px;"></div>
                    <div class="column">
                        <div class="row">
                            <div class="column"><i class="icon building"></i>Mieszkanie</div>
                            <div class="column" style="padding-top: 5px;"><i class="icon home"></i>Dom</div>
                            <div class="column" style="padding-top: 5px;"><i class="icon coffee" ></i>Lokale</div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="row" >
                            <div class="column"><i class="icon bed"></i>Pokój</div>
                            <div class="column" style="padding-top: 5px;"><i class="icon car"></i>Garaże</div>
                            <div class="column" style="padding-top: 5px;"><i class="icon tree"></i>Działki</div>
                            <!--                        style="white-space: nowrap;overflow: hidden;"-->
                        </div>
                    </div>



                </div>
            </div>
        </div>


    </div>

</div>




<script>
    var czyszcze = false,czyszcze2 = false;
    stary_tekst = tekst;
    function wygenerujlinkzparametrami(parametr,wartosc)
    {
        if(!czyszcze && !czyszcze2 )
        {
            console.log("robi a nie powinno generowac" + czyszcze)
//            if( parametr=='propertyType' )
//                wygenerujlinkzparametrami('buildingType',-100);

            var nazwa = '&'+parametr+'=';
            tekst = removeParam(parametr, tekst);

            tekst_parametry += nazwa+wartosc;
            var tablica = parseQuery(tekst_parametry);

            if(wartosc == -100)
                delete tablica[parametr];

            delete tablica[''];
            var blkstr = [];
            $.each(tablica, function(idx2,val2) {
                var str = idx2 + "=" + val2;
                if(!(parametr=='propertyType' && idx2 == 'buildingType') )
                    blkstr.push(str);
            });

            tekst_parametry = '&'+blkstr.join("&");

            tekst = stary_tekst + tekst_parametry;

            console.log(tekst)

            usunwszystkieMarkery();
            wlaczone_chowanie = false;
            $('#LADOWANIE').show();
            $.get(tekst,dodajMARKERY ).done(function() {
                if(Object.keys(narysowanenaMapie._layers).length == 1)
                    pochowajMarkery(stary_polygonSW,stary_polygonNE);
            });
        }


    }


    $(document).ready(function() {
        $('#wyczscKryteria').hide();

        $('#rodzajZabudowyOnOff_HOUSE').hide();
        $('#rodzajZabudowyOnOff_FLAT').hide();
        $('#rodzajZabudowyOnOff_ROOM').hide();
        $('#rodzajZabudowyOnOff_PARCEL').hide();
        $('#rodzajZabudowyOnOff_GARAGE').hide();
        $('#rodzajZabudowyOnOff_LOCAL').hide();
        $('.wiadomoscwarn').hide();
        // Przygotowane jak jest zaznaczona lista zeby pozaznazcac jak trzeba
        if(byloprzegladanialista != "")
        {
            $('#wyczscKryteria').show();
            var propertyType = getParameterByName('propertyType',byloprzegladanialista);
            $('#rodzajNieruchomosci').dropdown('set selected', propertyType);

            var offerType = getParameterByName('offerType',byloprzegladanialista);
            $('#rodzajTransakcji').dropdown('set selected', offerType);

            var buildtingtype = getParameterByName('buildingType',byloprzegladanialista);
            $('.rodzajBudynku').dropdown('set selected', buildtingtype);
            if(propertyType ==0)
                $('#rodzajZabudowyOnOff_HOUSE').show();
            else if(propertyType == 50)
                $('#rodzajZabudowyOnOff_FLAT').show();
            else if(propertyType == 100)
                $('#rodzajZabudowyOnOff_ROOM').show();
            else if(propertyType == 150)
                $('#rodzajZabudowyOnOff_PARCEL').show();
            else if(propertyType == 200)
                $('#rodzajZabudowyOnOff_GARAGE').show();
            else if(propertyType == 250)
                $('#rodzajZabudowyOnOff_LOCAL').show();

            var price = getParameterByName('price',byloprzegladanialista);
            if(price != null)
            {
                var cenki = price.split("-");
                $('#cenaOd').val(cenki[0]);
                $('#cenaDo').val(cenki[1]);
                $('#rodzajWaluta').val(cenki[2]);
            }

            var lastAdded = getParameterByName('lastAdded',byloprzegladanialista);
            $('#aktualnoscogloszenia').dropdown('set selected', lastAdded);

            var iloscosob = getParameterByName('personcount',byloprzegladanialista);
            if(iloscosob != null)
            {
                var iloscosobtab = iloscosob.split("-");
                for(var i=0;i<iloscosobtab.length;i++)
                    $('#iloscosob').dropdown('set selected', iloscosobtab[i]);
            }

            var typogrzewania = getParameterByName('heatingtype',byloprzegladanialista);
            if(typogrzewania != null)
            {
                var typogrzewaniatab = typogrzewania.split("-");
                for(var i=0;i<typogrzewaniatab.length;i++)
                    $('#typogrzewania').dropdown('set selected', typogrzewaniatab[i]);
            }

            var rokk = getParameterByName('year',byloprzegladanialista);
            if(rokk != null)
            {
                var rokktab = rokk.split("-");
                $('#rokOd').val(rokktab[0]);
                $('#rokDo').val(rokktab[1]);
            }

            var areaa = getParameterByName('area',byloprzegladanialista);
            if(areaa != null)
            {
                var areaatab = areaa.split("-");
                $('#areaOd').val(areaatab[0]);
                $('#areaDo').val(areaatab[1]);
            }


            var iloscpokoi = getParameterByName('roomcount',byloprzegladanialista);
            if(iloscpokoi != null)
            {
                var iloscpokoitab = iloscpokoi.split("-");
                for(var i=0;i<iloscpokoitab.length;i++)
                    $('#iloscpokoi').dropdown('set selected', iloscpokoitab[i]);
            }

            var pietro = getParameterByName('floor',byloprzegladanialista);
            if(pietro != null)
            {
                var pietrotab = pietro.split("-");
                for(var i=0;i<pietrotab.length;i++)
                    $('#pietro').dropdown('set selected', pietrotab[i]);
            }

            $('#umeblowane').dropdown('set selected', getParameterByName('furnished',byloprzegladanialista));
            $('#balkon').dropdown('set selected', getParameterByName('balcony',byloprzegladanialista));
            $('#winda').dropdown('set selected', getParameterByName('lift',byloprzegladanialista));
            $('#piwnica').dropdown('set selected', getParameterByName('basement',byloprzegladanialista));
            $('#palacy').dropdown('set selected', getParameterByName('smoking',byloprzegladanialista));
            $('#zwierzeta').dropdown('set selected', getParameterByName('pets',byloprzegladanialista));
            $('#parking').dropdown('set selected', getParameterByName('parking',byloprzegladanialista));
            $('#ogrod').dropdown('set selected', getParameterByName('garden',byloprzegladanialista));
            $('#klimatyzacja').dropdown('set selected', getParameterByName('clima',byloprzegladanialista));
            $('#zagencji').dropdown('set selected', getParameterByName('isFromAgency',byloprzegladanialista));

        }

        $('#WYSZUKIWANIE_DIV').perfectScrollbar();

        $('.accordion').accordion({
            onOpen : function(){
                $('#wyszukiwarkaikryteria').perfectScrollbar('update');
            },
            onClosing : function () {
                $('#wyszukiwarkaikryteria').perfectScrollbar('update');
            }
        });


        new L.Control.GPlaceAutocomplete({
            position: "topleft",
            prepend : false,
            autocomplete_options : {
                types:  ['geocode'],
                componentRestrictions: {country: "pl"}
            }
        }).addTo(MAPA);

        $("#MAPA .leaflet-gac-container.leaflet-control").appendTo("#WYSZUKIWARKAGOOGLE").css('width', '100%');

        $("#WYSZUKIWARKAGOOGLE input").change(function(){
            tekstjestgotowy = false;
            $('#wyczscKryteria').show();
        });

        $('#rodzajZasieg').dropdown({
            onChange : function(value, text, $choice){
                if(value == 1)
                    $('#ZASIEG').text('0.01');
                else if(value == 2)
                    $('#ZASIEG').text('0.02');
                else if(value == 3)
                    $('#ZASIEG').text('0.05');
                else if(value == 4)
                    $('#ZASIEG').text('0.1');
                else if(value == 5)
                    $('#ZASIEG').text('0.2');

                if(tekstjestgotowy)
                {
                    narysowanenaMapie.removeLayer(narysowanaFiguradousueniecia);
                    wyszukiwanie_google(lokalizacja,MAPA);
                }


            }
        });

        $('#wyczscKryteria').click(function(){
//            czyszcze = true;
//            $('.wyborKryteria').dropdown('clear');
//            $('.wyborKryteriaMultiple').dropdown('clear');
            czyszcze2 = true;
            $('.wyborKryteria').dropdown('clear');
            $('.wyborKryteriaMultiple').dropdown('clear');
            czyszcze2 = false;

            $("#WYSZUKIWARKAGOOGLE input").val("");
            kosz.removeFrom(MAPA);
            narysowanenaMapie.removeLayer(narysowanaFiguradousueniecia);


            $('#wyczscKryteria').hide();
            wygenerujlinkzparametrami('propertyType',-100); // tak dla przykaldu
        });


        $('.wyborKryteria').dropdown({
            direction : 'downward',
            onChange: function (value, text, $choice) {
                $('#wyczscKryteria').show();
                if($(this).data("value") == 'propertyType')
                {

                    if(value != -100)
                    {
                        $('#rodzajZabudowyOnOff_HOUSE').hide();
                        $('#rodzajZabudowyOnOff_FLAT').hide();
                        $('#rodzajZabudowyOnOff_ROOM').hide();
                        $('#rodzajZabudowyOnOff_PARCEL').hide();
                        $('#rodzajZabudowyOnOff_GARAGE').hide();
                        $('#rodzajZabudowyOnOff_LOCAL').hide();

                        czyszcze = true;
                        $('#rodzajZabudowyOnOff_HOUSE .wyborKryteriaMultiple').dropdown('clear');
                        $('#rodzajZabudowyOnOff_FLAT .wyborKryteriaMultiple').dropdown('clear');
                        $('#rodzajZabudowyOnOff_ROOM .wyborKryteriaMultiple').dropdown('clear');
                        $('#rodzajZabudowyOnOff_PARCEL .wyborKryteriaMultiple').dropdown('clear');
                        $('#rodzajZabudowyOnOff_GARAGE .wyborKryteriaMultiple').dropdown('clear');
                        $('#rodzajZabudowyOnOff_LOCAL .wyborKryteriaMultiple').dropdown('clear');
                        czyszcze = false;

                        if(value ==0)
                            $('#rodzajZabudowyOnOff_HOUSE').show();
                        else if(value == 50)
                            $('#rodzajZabudowyOnOff_FLAT').show();
                        else if(value == 100)
                            $('#rodzajZabudowyOnOff_ROOM').show();
                        else if(value == 150)
                            $('#rodzajZabudowyOnOff_PARCEL').show();
                        else if(value == 200)
                            $('#rodzajZabudowyOnOff_GARAGE').show();
                        else if(value == 250)
                            $('#rodzajZabudowyOnOff_LOCAL').show();

                    }
                    else
                    {
                        console.log("zablokuje")
                        $('#rodzajZabudowyOnOff_HOUSE').hide();
                        $('#rodzajZabudowyOnOff_FLAT').hide();
                        $('#rodzajZabudowyOnOff_ROOM').hide();
                        $('#rodzajZabudowyOnOff_PARCEL').hide();
                        $('#rodzajZabudowyOnOff_GARAGE').hide();
                        $('#rodzajZabudowyOnOff_LOCAL').hide();

                    }


                }

                    wygenerujlinkzparametrami($(this).data("value"),value)
            }
        });

        $('.wyborKryteriaMultiple').dropdown({
            direction : 'downward',
            maxSelections: 3,
            onChange: function (value, text, $choice) {
                $('#wyczscKryteria').show();
                if(value.length != 0)
                    wygenerujlinkzparametrami($(this).data("value"),value.join("-"));
                else
                    wygenerujlinkzparametrami($(this).data("value"),-100);

            }
        });


        // w zaleznosci do jezyka
        $('#rodzajWaluta').dropdown('set selected', 1);
        waluta = 1;

        var zmianaCena = false;
        $("#cenaOd,#cenaDo").keyup(function () {zmianaCena = true;});

        var cena ='',cenamin ='',cenamax='',waluta;
        $("#cenaOd").focusout(function( event ) {
            $('#wyczscKryteria').show();
            if(zmianaCena)
            {
                zmianaCena = false;
                $('#cenaWiadomosc').hide();
                cenamin = $(this).val();
                cena = cenamin+'-'+cenamax+'-'+waluta;

                if(cenamax == '')
                {
                    if(cena.substring(0,2) != "--")
                        wygenerujlinkzparametrami("price",cena);
                    else
                        wygenerujlinkzparametrami("price",-100);
                }
                else
                {
                    if( (parseInt(cenamin) < parseInt(cenamax) ) )
                        if(cena.substring(0,2) != "--")
                            wygenerujlinkzparametrami("price",cena);
                        else
                            wygenerujlinkzparametrami("price",-100);
                    else
                    {
                        wygenerujlinkzparametrami("price",-100);
                        $('#cenaWiadomosc').show();
                    }
                }
            }
        });

        $("#cenaDo").focusout(function( event ) {
            $('#wyczscKryteria').show();
            if(zmianaCena)
            {
                zmianaCena = false;
                $('#cenaWiadomosc').hide();
                cenamax = $(this).val();
                cena = cenamin + '-' + cenamax + '-' + waluta;

                if(cenamin == '')
                {
                    if(cena.substring(0,2) != "--")
                        wygenerujlinkzparametrami("price",cena);
                    else
                        wygenerujlinkzparametrami("price",-100);
                }
                else
                {
                    if( (parseInt(cenamin) < parseInt(cenamax) ) )
                        if(cena.substring(0,2) != "--")
                            wygenerujlinkzparametrami("price",cena);
                        else
                            wygenerujlinkzparametrami("price",-100);
                    else
                    {
                        wygenerujlinkzparametrami("price",-100);
                        $('#cenaWiadomosc').show();
                    }

                }

            }
        });

        var zmianaRok = false;
        $("#rokOd,#rokDo").keyup(function () {zmianaRok = true;});
        var rok ='',rokmin ='',rokmax='';
        $("#rokOd").focusout(function( event ) {
            $('#wyczscKryteria').show();
            if(zmianaRok)
            {
                zmianaRok = false;
                $('#rokWiadomosc').hide();
                rokmin = $(this).val();
                rok = rokmin+'-'+rokmax;

                if(rokmax == '')
                {
                    if(rok.length != 1)
                        wygenerujlinkzparametrami("year",rok);
                    else
                        wygenerujlinkzparametrami("year",-100);
                }
                else
                {

                    if( (parseInt(rokmin) < parseInt(rokmax) && !(parseInt(rokmin) < 1950 || parseInt(rokmax) > 2017)  ) )
                        if(rok.length != 1)
                            wygenerujlinkzparametrami("year",rok);
                        else
                            wygenerujlinkzparametrami("year",-100);
                    else
                    {
                        wygenerujlinkzparametrami("year",-100);
                        $('#rokWiadomosc').show();
                    }
                }
            }
        });

        $("#rokDo").focusout(function( event ) {
            $('#wyczscKryteria').show();
            if(zmianaRok)
            {
                zmianaRok = false;
                $('#rokWiadomosc').hide();
                rokmax = $(this).val();
                rok = rokmin+'-'+rokmax;

                if(rokmin == '')
                {
                    if(rok.length != 1)
                        wygenerujlinkzparametrami("year",rok);
                    else
                        wygenerujlinkzparametrami("year",-100);
                }
                else
                {

                    if( (parseInt(rokmin) < parseInt(rokmax) && !(parseInt(rokmin) < 1950 || parseInt(rokmax) > 2017) ) )
                        if(rok.length != 1)
                            wygenerujlinkzparametrami("year",rok);
                        else
                            wygenerujlinkzparametrami("year",-100);
                    else
                    {
                        wygenerujlinkzparametrami("year",-100);
                        $('#rokWiadomosc').show();
                    }
                }
            }
        });

        var zmianaArea = false;
        $("#areaOd,#areaDo").keyup(function () {zmianaArea = true;});
        var area ='',areamin ='',areamax='';
        $("#areaOd").focusout(function( event ) {
            $('#wyczscKryteria').show();
            if(zmianaArea)
            {
                zmianaArea = false;
                $('#powierzchniaWiadomosc').hide();
                areamin = $(this).val();
                area = areamin+'-'+areamax;

                if(areamax == '')
                {
                    if(area.length != 1)
                        wygenerujlinkzparametrami("area",area);
                    else
                        wygenerujlinkzparametrami("area",-100);
                }
                else
                {

                    if( (parseInt(areamin) < parseInt(areamax) ) )
                        if(area.length != 1)
                            wygenerujlinkzparametrami("area",area);
                        else
                            wygenerujlinkzparametrami("area",-100);
                    else
                    {
                        wygenerujlinkzparametrami("area",-100);
                        $('#powierzchniaWiadomosc').show();
                    }
                }
            }
        });

        $("#areaDo").focusout(function( event ) {
            $('#wyczscKryteria').show();
            if(zmianaArea)
            {
                zmianaArea = false;
                $('#powierzchniaWiadomosc').hide();
                areamax = $(this).val();
                area = areamin+'-'+areamax;

                if(areamin == '')
                {
                    if(area.length != 1)
                        wygenerujlinkzparametrami("area",area);
                    else
                        wygenerujlinkzparametrami("area",-100);
                }
                else
                {

                    if( (parseInt(areamin) < parseInt(areamax) ) )
                        if(area.length != 1)
                            wygenerujlinkzparametrami("area",area);
                        else
                            wygenerujlinkzparametrami("area",-100);
                    else
                    {
                        wygenerujlinkzparametrami("area",-100);
                        $('#powierzchniaWiadomosc').show();
                    }
                }
            }
        });



});
</script>