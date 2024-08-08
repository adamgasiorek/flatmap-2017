
<div class="ui united modal" id="formularz_podstawowe">
    <div class="header">
        <div class="ui header">
            Dodawanie ofert
        </div>
        <div class="ui huge breadcrumb">
            <div class="section">Podstawowe</div>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_adres" >Adres</a>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_zdjecia" >Zdjęcia</a>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_szczegoly" >Szczegóły</a>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_podsumowanie" >Podsumowanie</a>
            <span class="poczekaj_zdjecia" style="font-size: 90%;" ><i class="notched circle loading icon"></i>Uploading...</span>
        </div>
    </div>
    <div class="content" >
        <div class="ui form">
            <div class="field">
                <label>Tytul</label>
                <input id="formularz_TYTUL" type="text">
            </div>
            <div class="fields" >
                <div class="five wide field">
                    <label>Rodzaj mieszkania:</label>
                    <div class="ui selection dropdown" >
                        <input type="hidden" id="formularz_rodzajM">
                        <div class="default text">Type</div>
                        <i class="dropdown icon"></i>
                        <div class="menu" style="overflow:auto;max-height:300px;">
                            <div class="item" data-value="0">
                                <i class="home icon"></i>
                                Dom

                            </div>
                            <div class="item" data-value="50">
                                <i class="building icon"></i>
                                Mieszkanie
                            </div>
                            <div class="item" data-value="100">
                                <i class="bed icon"></i>
                                Pokoj
                            </div>
                            <div class="item" data-value="150">
                                <i class="tree icon"></i>
                                Działka
                            </div>
                            <div class="item" data-value="200">
                                <i class="car icon"></i>
                                Garaż
                            </div>
                            <div class="item" data-value="250">
                                <i class="travel icon"></i>
                                Lokal
                            </div>
                        </div>
                    </div>
                </div>
                <div class="six wide field">
                    <label>Rodzaj transakcji:</label>
                    <div class="ui selection dropdown" >
                        <input type="hidden" id="formularz_rodzajT" >
                        <div class="default text">Type</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <div class="item" data-value="0">
                                Wynajem
                            </div>
                            <div class="item" data-value="1">
                                Sprzedaż
                            </div>
                            <div class="item" data-value="2">
                                Pobyt
                            </div>
                        </div>
                    </div>
                </div>
                <div class="three wide field">
                    <label>Cena:</label>
                    <input type="text" id="formularz_cena" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                </div>
                <div class="two wide field">
                    <label>Waluta:</label>
                    <div class="ui selection dropdown fluid" >
                        <input type="hidden" id="formularz_waluta">
                        <div class="default text">Type</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <div class="item" data-value="0">
                                PLN
                            </div>
                            <div class="item" data-value="1">
                                $
                            </div>
                            <div class="item" data-value="2">
                                €
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="fields" style="margin-top: 15px;">
                <div class="nine wide field" >
                    <label>Opis</label>
                    <textarea rows="7" style="resize: none;" id="formularz_OPIS"></textarea>
                </div>
                <div class="seven wide field" style="margin-top: 20px;">
                    <div class="ui toggle checkbox" id="uzyjGlownykontakt">
                        <input type="checkbox" checked value="true" id="formularz_glownyKontakt"  >
                        <label>Użyj głownego kontaktu:</label>
                    </div>
                    <div class="disabled field" style="margin-top: 15px;">
                        <div class="inline field" >
                            <label>Imię:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type="text" value="Adam Gąsiorek" style="width: 70%;" id="formularz_imieKontakt" >
                        </div>
                        <div class="inline field" >
                            <label>Email:&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type="text" value="adasdsako@fmas.pl" style="width: 70%;" id="formularz_emailKontakt"  >
                        </div>
                        <div class="inline field" >
                            <label>Telefon:</label>
                            <input type="text" value="643 435 535" style="width: 70%;" id="formularz_telKontakt" >
                        </div>
                    </div>
                </div>
            </div>




        </div>

    </div>
</div>

<div class="ui united modal" id="formularz_adres" >
    <div class="header">
        <div class="ui header">
            Dodawanie ofert
        </div>
        <div class="ui huge breadcrumb">
            <a class="section idzDo_formularz_podstawowe" >Podstawowe</a>
            <i class="right chevron icon divider"></i>
            <div class="section" >Adres</div>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_zdjecia" >Zdjęcia</a>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_szczegoly" >Szczegóły</a>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_podsumowanie" >Podsumowanie</a>
            <span class="poczekaj_zdjecia" style="font-size: 90%;" ><i class="notched circle loading icon"></i>Uploading...</span>
        </div>
    </div>
    <div class="content">

        <div class="ui form">
            <div class="field">
                <label>Mapa</label>
                <div id="MAPA2" style="width: 100%;height: 350px;z-index: 10"></div>
                <div class="field" id="WYSZUKIWARKA_POM" style="margin-bottom: 60px;"></div>
            </div>

            <div id="ADRESY" style="margin-bottom: 30px;">
                <input type="text" name="xx" id="formularz_XX" style="display: none;">
                <input type="text" name="yy" id="formularz_YY" style="display: none;">

                <div class="fields">
                    <div class="six wide field">
                        <label>Ulica:&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input type="text" id="formularz_ulica">
                    </div>
                    <div class="four wide field">
                        <label>Miasto:</label>
                        <input type="text" id="formularz_miasto">
                    </div>
                    <div class="six wide field">
                        <label>Kraj:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input type="text" id="formularz_kraj">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="ui united modal" id="formularz_zdjecia">
    <div class="header">
        <div class="ui header">
            Dodawanie ofert
        </div>
        <div class="ui huge breadcrumb">
            <a class="section idzDo_formularz_podstawowe" >Podstawowe</a>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_adres" >Adres</a>
            <i class="right chevron icon divider"></i>
            <div class="section" >Zdjęcia</div>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_szczegoly" >Szczegóły</a>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_podsumowanie" >Podsumowanie</a>
            <span class="poczekaj_zdjecia" style="font-size: 90%;" ><i class="notched circle loading icon"></i>Uploading...</span>
        </div>
    </div>
    <div class="content">

        <div class="ui form">
            <div class="field">
                <label>Zdjęcia: </label>
                <input type="file" name="files[]" id="filer_input" multiple="multiple">
            </div>
        </div>

    </div>
</div>

<div class="ui united modal" id="formularz_szczegoly">
    <div class="header">
        <div class="ui header">
            Dodawanie ofert
        </div>
        <div class="ui huge breadcrumb">
            <a class="section active idzDo_formularz_podstawowe" >Podstawowe</a>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_adres" >Adres</a>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_zdjecia" >Zdjęcia</a>
            <i class="right chevron icon divider"></i>
            <div class="section" >Szczegóły</div>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_podsumowanie" >Podsumowanie</a>
            <span class="poczekaj_zdjecia" style="font-size: 90%;" ><i class="notched circle loading icon"></i>Uploading...</span>
        </div>
    </div>
    <div class="content">

        <div class="ui form">

            <div class="two fields">
                <div class="field disabled" id="rodzajZabudowyonczyoff">
                    <label>Rodzaj zabudowy:</label>
                    <div class="ui selection dropdown fluid">
                        <input type="hidden" id="formularz_szczegoly_propertyBuildingType" >
                        <div class="default text">Rodzaj</div>
                        <i class="dropdown icon"></i>
                        <div class="menu" >
                            <div class="item rodzajZabudowyDom" data-value="0" >HOUSE_DETACHED</div>
                            <div class="item rodzajZabudowyDom" data-value="1" >HOUSE_SEMI_DETACHED</div>
                            <div class="item rodzajZabudowyDom" data-value="2" >HOUSE_TERRACED</div>
                            <div class="item rodzajZabudowyDom" data-value="3" >HOUSE_SUMMER</div>
                            <div class="item rodzajZabudowyBlok" data-value="50" >FLAT_BLOCK</div>
                            <div class="item rodzajZabudowyBlok" data-value="51" >FLAT_TENEMENT</div>
                            <div class="item rodzajZabudowyPokoj" data-value="100" >ROOM_BLOCK</div>
                            <div class="item rodzajZabudowyPokoj" data-value="101" >ROOM_TENEMENT</div>
                            <div class="item rodzajZabudowyDzialka" data-value="150" >PARCEL_BUILDING</div>
                            <div class="item rodzajZabudowyDzialka" data-value="151" >PARCEL_BUILDING</div>
                            <div class="item rodzajZabudowyDzialka" data-value="152" >PARCEL_SUMMER</div>
                            <div class="item rodzajZabudowyGaraz" data-value="200" >GARAGE_DETACHED</div>
                            <div class="item rodzajZabudowyGaraz" data-value="201" >GARAGE_PARKINGPLACE</div>
                            <div class="item rodzajZabudowyGaraz" data-value="202" >GARAGE_PARKING</div>
                            <div class="item rodzajZabudowyLokale" data-value="250" >LOCAL</div>
                            <div class="item rodzajZabudowyLokale" data-value="251" >LOCAL_SHOP</div>
                            <div class="item rodzajZabudowyLokale" data-value="252" >LOCAL_OFFICE</div>
                            <div class="item rodzajZabudowyLokale" data-value="253" >LOCAL_STOREHOUSE</div>
                            <div class="item rodzajZabudowyLokale" data-value="254" >LOCAL_HALL</div>
                            <div class="item rodzajZabudowyLokale" data-value="255" >LOCAL_SHOP</div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>Typ ogrzewania:</label>
                    <div class="ui selection dropdown fluid">
                        <input type="hidden" id="formularz_szczegoly_propertyHeatingType">
                        <div class="default text">Type</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <div class="item" data-value="0">GAS</div>
                            <div class="item" data-value="1">ELECTRIC</div>
                            <div class="item" data-value="2">CENTRAL</div>
                            <div class="item" data-value="3">OTHER</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="two fields">
                <div class="field">
                    <label>Ilosc osob min:</label>
                    <div class="ui selection dropdown fluid">
                        <input type="hidden" id="formularz_szczegoly_propertyMinPerson" >
                        <div class="default text">Ile</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <div class="item" data-value="1">
                                1
                            </div>
                            <div class="item" data-value="2">
                                2
                            </div>
                            <div class="item" data-value="3">
                                3
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>Ilosc osob max:</label>
                    <div class="ui selection dropdown fluid">
                        <input type="hidden" id="formularz_szczegoly_propertyMaxPerson"  >
                        <div class="default text">Ile</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <div class="item" data-value="1">
                                1
                            </div>
                            <div class="item" data-value="2">
                                2
                            </div>
                            <div class="item" data-value="3">
                                3
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="two fields">
                <div class="field">
                    <label>Ilosc pokoi:</label>
                    <div  class="ui selection dropdown fluid">
                        <input type="hidden" id="formularz_szczegoly_propertyRoomCount" >
                        <div class="default text">Type</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <div class="item" data-value="0">
                                Miejskie
                            </div>
                            <div class="item" data-value="1">
                                Gazowe
                            </div>
                            <div class="item" data-value="2">
                                Jakies Tam
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>Pietro:</label>
                    <div class="ui selection dropdown fluid">
                        <input type="hidden" id="formularz_szczegoly_propertyFloor">
                        <div class="default text">Type</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <div class="item" data-value="0">
                                1
                            </div>
                            <div class="item" data-value="1">
                                2
                            </div>
                            <div class="item" data-value="2">
                                3
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="two fields">
                <div class="field">
                    <label>Rozmiar</label>
                    <input type="text" id="formularz_szczegoly_propertyArea">
                </div>
                <div class="field">
                    <label>Rocznik:</label>
                    <input type="text" id="formularz_szczegoly_propertyBuildYear" >
                </div>
            </div>

            <div class="ui divider" style="margin-top: 30px;"></div>

            <div class="fields">
                <div class="three wide field">
                    <label>Umeblowany:</label>
                    <div class="ui selection dropdown fluid">
                        <input type="hidden" id="formularz_szczegoly_propertyIsFurnished">
                        <div class="default text">Type</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <div class="item" data-value="true">
                                tak
                            </div>
                            <div class="item" data-value="false">
                                nie
                            </div>
                        </div>
                    </div>
                </div>
                <div class="three wide field">
                    <label>balcony:</label>
                    <div class="ui selection dropdown fluid">
                        <input type="hidden" id="formularz_szczegoly_propertyHasBalcony">
                        <div class="default text">Type</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <div class="item" data-value="true">
                                tak
                            </div>
                            <div class="item" data-value="false">
                                nie
                            </div>
                        </div>
                    </div>
                </div>
                <div class="three wide field">
                    <label>lift:</label>
                    <div class="ui selection dropdown fluid">
                        <input type="hidden" id="formularz_szczegoly_propertyHasLift">
                        <div class="default text">Type</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <div class="item" data-value="true">
                                tak
                            </div>
                            <div class="item" data-value="false">
                                nie
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>basement:</label>
                    <div class="ui selection dropdown fluid">
                        <input type="hidden" id="formularz_szczegoly_propertyHasBasement">
                        <div class="default text">Type</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <div class="item" data-value="true">
                                tak
                            </div>
                            <div class="item" data-value="false">
                                nie
                            </div>
                        </div>
                    </div>
                </div>
                <div class="three wide field">
                    <label>parking:</label>
                    <div class="ui selection dropdown fluid">
                        <input type="hidden" id="formularz_szczegoly_propertyHasParking">
                        <div class="default text">Type</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <div class="item" data-value="true">
                                tak
                            </div>
                            <div class="item" data-value="false">
                                nie
                            </div>
                        </div>
                    </div>
                </div>
                <div class="three wide field">
                    <label>pets:</label>
                    <div class="ui selection dropdown fluid">
                        <input type="hidden" id="formularz_szczegoly_propertyAllowPets">
                        <div class="default text">Type</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <div class="item" data-value="true">
                                tak
                            </div>
                            <div class="item" data-value="false">
                                nie
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>garden :</label>
                    <div class="ui selection dropdown fluid">
                        <input type="hidden" id="formularz_szczegoly_propertyHasGarden">
                        <div class="default text">Type</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <div class="item" data-value="true">
                                tak
                            </div>
                            <div class="item" data-value="false">
                                nie
                            </div>
                        </div>
                    </div>
                </div>
                <div class="three wide field">
                    <label>clima :</label>
                    <div class="ui selection dropdown fluid">
                        <input type="hidden" id="formularz_szczegoly_propertyHasClima">
                        <div class="default text">Type</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <div class="item" data-value="true">
                                tak
                            </div>
                            <div class="item" data-value="false">
                                nie
                            </div>
                        </div>
                    </div>
                </div>
                <div class="three wide field">
                    <label>smoking:</label>
                    <div class="ui selection dropdown fluid">
                        <input type="hidden" id="formularz_szczegoly_propertyAllowSmoking">
                        <div class="default text">Type</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <div class="item" data-value="true">
                                tak
                            </div>
                            <div class="item" data-value="false">
                                nie
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>

<div class="ui united modal" id="formularz_podsumowanie">
    <div class="header">
        <div class="ui header">
            Dodawanie ofert
        </div>
        <div class="ui huge breadcrumb">
            <a class="section active idzDo_formularz_podstawowe" >Podstawowe</a>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_adres" >Adres</a>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_zdjecia" >Zdjęcia</a>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_szczegoly">Szczegóły</a>
            <i class="right chevron icon divider"></i>
            <div class="section" >Podsumowanie</div>
        </div>
    </div>
    <div class="content">

        <form class="ui form" id="FORMULARZ_DODAWANIA">
            <div class="field" style="display: none;">
                <label>Tytul</label>
                <input name="tytul" id="set_formularz_TYTUL" type="text">
                <input name="opis" id="set_formularz_OPIS" type="text">
                <input name="rodzajT" id="set_formularz_RodzajT" type="text">
                <input name="rodzajM" id="set_formularz_RodzajM" type="text">
                <input name="cena" id="set_formularz_Cena" type="text">
                <input name="waluta" id="set_formularz_Waluta" type="text">
                <input name="ulica" id="set_formularz_Ulica" type="text">
                <input name="miasto" id="set_formularz_Miasto" type="text">
                <input name="kraj" id="set_formularz_Kraj" type="text">
                <input name="xx" id="set_formularz_XX" type="text">
                <input name="yy" id="set_formularz_YY" type="text">

                <input name="glownyKontakt" id="set_formularz_glownyKontakt" type="text">
                <input name="imieKontakt" id="set_formularz_imieKontakt" type="text">
                <input name="emailKontakt" id="set_formularz_emailKontakt" type="text">
                <input name="telKontakt" id="set_formularz_telKontakt" type="text">


                <!-- SZCEGOLYYYYYY-->
                <input name="propertyBuildingType" id="set_formularz_szczegoly_propertyBuildingType" type="text">
                <input name="propertyMinPerson" id="set_formularz_szczegoly_propertyMinPerson" type="text">
                <input name="propertyMaxPerson" id="set_formularz_szczegoly_propertyMaxPerson" type="text">
                <input name="propertyHeatingType" id="set_formularz_szczegoly_propertyHeatingType" type="text">
                <input name="propertyArea" id="set_formularz_szczegoly_propertyArea" type="text">
                <input name="propertyRoomCount" id="set_formularz_szczegoly_propertyRoomCount" type="text">
                <input name="propertyFloor" id="set_formularz_szczegoly_propertyFloor" type="text">
                <input name="propertyBuildYear" id="set_formularz_szczegoly_propertyBuildYear" type="text">
                <input name="propertyIsFurnished" id="set_formularz_szczegoly_propertyIsFurnished" type="text">
                <input name="propertyHasBalcony" id="set_formularz_szczegoly_propertyHasBalcony" type="text">
                <input name="propertyHasLift" id="set_formularz_szczegoly_propertyHasLift" type="text">
                <input name="propertyHasBasement" id="set_formularz_szczegoly_propertyHasBasement" type="text">
                <input name="propertyHasParking" id="set_formularz_szczegoly_propertyHasParking" type="text">
                <input name="propertyAllowPets" id="set_formularz_szczegoly_propertyAllowPets" type="text">
                <input name="propertyHasGarden" id="set_formularz_szczegoly_propertyHasGarden" type="text">
                <input name="propertyHasClima" id="set_formularz_szczegoly_propertyHasClima" type="text">
                <input name="propertyAllowSmoking" id="set_formularz_szczegoly_propertyAllowSmoking" type="text">




            </div>

            <div id="PODGLAD" style="height: auto;">
                <div class="two fields" >
                    <div class="field" style="margin-right: 15px;">
                        <div id="niemaZdjec" class="ui message" style="width: 400px;height: 400px;" >
                            <div class="header">
                                Nie ma zdjec ziom
                            </div>
                        </div>
                        <div class="popup-gallery"  style="width: 87%;">
                            <div id="podglad_obrazy_glowne" ></div>
                            <div id="podglad_obrazy_mini" class="MINIATURKI" ></div>
                        </div>
                    </div>
                    <div class="field">
                        <div style="left: 48%;top: 20px;">
                            <h3 class="ui header">
                                <div id="podglad_tytul">Tytul mieszkania</div>
                            </h3>

                            <h1 class="ui header" style="margin-top: -10px;">
                                <span id="podglad_ulica">Starowiejska</span>
                                <div class="sub header"><span id="podglad_kraj">Kraj</span> - <span id="podglad_miasto">Miasto</span> </div>
                            </h1>

                            <div class="ui clearing" style="margin-bottom: 50px;">
                                <h3 class="ui left floated header" id="podglad_offertyp">Dom</h3>
                                <h5 class="ui left floated header" style="margin-top: 2px;">on</h5>
                                <h3 class="ui left floated header" id="podglad_typ">Sprzedaz</h3>

                                <h2 class="ui right floated header" style="margin-left: 35px;margin-top: -5px;">
                                    <span id="podglad_cena">100</span> <span id="podglad_cena_waluta"></span>
                                </h2>
                            </div>

                            <div class="ui accordion" style="height: 100%;">
                                <div class="title">
                                    <i class="dropdown icon"></i>
                                    Szczegóły
                                </div>
                                <div class="content">
                                    <div class="ui divided middle aligned selection list" id="podglad_szczegoly" ></div>
                                </div>
                                <div class="title">
                                    <i class="dropdown icon"></i>
                                    Opis
                                </div>
                                <div class="content" id="podglad_opis">No super zapraszam do kontkar</div>
                                <div class="title">
                                    <i class="dropdown icon"></i>
                                    Kontakt
                                </div>
                                <div class="content" id="podglad_kontakt">
                                    kontakt
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>

            <div id="ERORKIFORM" style="margin-top: 30px;" class="ui error message"></div>

            <div class="ui button fluid primary" style="margin-top: 10px;" id="WYSLIJ_FORMULARZ">WYSLIJ</div>
        </form>






    </div>
</div>



<script>
    var tablicaLadujacychSie = [];
    var niemazdjec = true;
    $(document).ready(function() {

        $('.dropdown').dropdown();



        $("#filer_input").change( handleFileSelect );

        $('.poczekaj_zdjecia').hide();




        $('.popup-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function(item) {
                    return item.el.attr('title');
                }
            }
        });

    });


    $(document).on('click', '.WLEWO', function(){
        $('#podglad_obrazy_mini').slick('unslick');
        if($(this).index(".WLEWO") != 0)
        {
            var ten = $(this).parentsUntil('.jFiler-item').parent();
            var lewy = $(this).parentsUntil('.jFiler-item').parent().prev('.jFiler-item');

            var strDiv1Cont = ten.html();
            var strDiv2Cont = lewy.html();

            ten.html(strDiv2Cont);
            lewy.html(strDiv1Cont);

            if($(ten).index('.jFiler-item') == 1)
            {
                ten.find('.glownezdjecie').text($(ten).index('.jFiler-item')+1);
                lewy.find('.glownezdjecie').text('Głowne');

                var div1 = $('#podglad_obrazy_glowne > a img').eq(0);
                var div2 = $('#podglad_obrazy_mini > a img').eq(0);

                var tdiv1 = div1.clone();
                var tdiv2 = div2.clone();

                div1.replaceWith(tdiv2);
                div2.replaceWith(tdiv1);

            }
            else
            {
                ten.find('.glownezdjecie').text( $(ten).index('.jFiler-item')+1 );
                lewy.find('.glownezdjecie').text( $(lewy).index('.jFiler-item')+1 );

                var div1 = $('#podglad_obrazy_mini > a img').eq($(ten).index('.jFiler-item')-1);
                var div2 = $('#podglad_obrazy_mini > a img').eq($(lewy).index('.jFiler-item')-1);

                var tdiv1 = div1.clone();
                var tdiv2 = div2.clone();

                div1.replaceWith(tdiv2);
                div2.replaceWith(tdiv1);

            }

        }

        $('#podglad_obrazy_mini').slick({
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            variableWidth: true
        });
    });

    $(document).on('click', '.WPRAWO', function(){
        $('#podglad_obrazy_mini').slick('unslick');
        if( $(this).index(".WPRAWO")+1 != $(".WPRAWO").size() )
        {
            var ten = $(this).parentsUntil('.jFiler-item').parent();
            var prawy = $(this).parentsUntil('.jFiler-item').parent().next('.jFiler-item');

            var strDiv1Cont = ten.html();
            var strDiv2Cont = prawy.html();


            ten.html(strDiv2Cont);
            prawy.html(strDiv1Cont);

            if($(ten).index('.jFiler-item') == 0)
            {
                ten.find('.glownezdjecie').text('Głowne');
                prawy.find('.glownezdjecie').text($(prawy).index('.jFiler-item')+1);

                var div1 = $('#podglad_obrazy_glowne > a img').eq(0);
                var div2 = $('#podglad_obrazy_mini > a img').eq(0);

                var tdiv1 = div1.clone();
                var tdiv2 = div2.clone();

                div1.replaceWith(tdiv2);
                div2.replaceWith(tdiv1);
            }
            else
            {
                ten.find('.glownezdjecie').text( $(ten).index('.jFiler-item')+1 );
                prawy.find('.glownezdjecie').text( $(prawy).index('.jFiler-item')+1 );

                var div1 = $('#podglad_obrazy_mini > a img').eq($(ten).index('.jFiler-item')-1);
                var div2 = $('#podglad_obrazy_mini > a img').eq($(prawy).index('.jFiler-item')-1);

                var tdiv1 = div1.clone();
                var tdiv2 = div2.clone();

                div1.replaceWith(tdiv2);
                div2.replaceWith(tdiv1);
            }

        }

        $('#podglad_obrazy_mini').slick({
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            variableWidth: true
        });
    });


    $(document).on('click', '.akcja1', function(){

        var index = $(this).index('.jFiler-item-trash-action');
        var indexx = tablicaLadujacychSie.indexOf( index );
        tablicaLadujacychSie.splice(indexx, 1);


        if(tablicaLadujacychSie.length == 0)
        {
            $('.idzDo_formularz_podsumowanie').show();
            $('.poczekaj_zdjecia').hide();
        }


        if(index ==0 && $('.glownezdjecie').length == 1)
        {
            $('#niemaZdjec').show();
            niemazdjec = true;
        }

        if( index == 0)
        {
            $('#podglad_obrazy_mini').slick('unslick');

            var div1 = $('#podglad_obrazy_glowne > a img').eq(0);
            var div2 = $('#podglad_obrazy_mini > a img').eq(0);

            var tdiv1 = div1.clone();
            var tdiv2 = div2.clone();

            div1.replaceWith(tdiv2);
            div2.replaceWith(tdiv1);

            $('#podglad_obrazy_mini').slick({
                infinite: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                variableWidth: true
            });

            $('#podglad_obrazy_mini').slick('slickRemove',index);

            //console.log( $('#podglad_obrazy_mini a img').size() + ' ' + $('#podglad_obrazy_glowne a img').size()  )
            if($('#podglad_obrazy_mini a img').size() == 0 && $('#podglad_obrazy_glowne a img').size() == 0 )
                $('#podglad_obrazy_glowne').empty();

            //itemEl.next('.jFiler-item').find('.glownezdjecie').text('Głowne');
            for (var i = index+2; i < $('.glownezdjecie').length; i++) {
                $('.glownezdjecie').eq(i).text(i);
            }
        }
        else
        {
            for (var i = index; i < $('.glownezdjecie').length; i++) {
                $('.glownezdjecie').eq(i).text(i);
            }
            $('#podglad_obrazy_mini').slick('slickRemove',index-1);
        }


    });


</script>
<script src="LIB/jQuery.filer-1.3.0/js/custom.js"></script>