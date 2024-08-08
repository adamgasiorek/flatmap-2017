
<div class="ui united modal" id="formularz_podstawowe_edit">
    <div class="header">
        <div class="ui header">
            Edytowanie ofert
        </div>
        <div class="ui huge breadcrumb">
            <div class="section">Podstawowe</div>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_adres2" >Adres</a>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_zdjecia2" >Zdjęcia</a>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_szczegoly2" >Szczegóły</a>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_podsumowanie2" >Podsumowanie</a>
            <span class="poczekaj_zdjecia" style="font-size: 90%;" ><i class="notched circle loading icon"></i>Uploading...</span>
        </div>
    </div>
    <div class="content" >
        <div class="ui form">
            <div class="field">
                <label>Tytul</label>
                <input id="formularz_TYTUL_edit" type="text">
            </div>
            <div class="fields" >
                <div class="five wide field">
                    <label>Rodzaj mieszkania:</label>
                    <div class="ui selection dropdown" id="formularz_rodzajM_edit">
                        <input type="hidden" >
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
                    <div class="ui selection dropdown"  id="formularz_rodzajT_edit">
                        <input type="hidden" >
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
                    <input type="text" id="formularz_cena_edit" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                </div>
                <div class="two wide field">
                    <label>Waluta:</label>
                    <div class="ui selection dropdown fluid" >
                        <input type="hidden" id="formularz_waluta_edit">
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
                    <textarea rows="7" style="resize: none;" id="formularz_OPIS_edit"></textarea>
                </div>
                <div class="seven wide field" style="margin-top: 20px;">
                    <div class="ui toggle checkbox" id="uzyjGlownykontakt_edit">
                        <input type="checkbox" checked value="true" id="formularz_glownyKontakt_edit"  >
                        <label>Użyj głownego kontaktu:</label>
                    </div>
                    <div class="disabled field" style="margin-top: 15px;">
                        <div class="inline field" >
                            <label>Imię:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type="text" value="Adam Gąsiorek" style="width: 70%;" id="formularz_imieKontakt_edit" >
                        </div>
                        <div class="inline field" >
                            <label>Email:&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type="text" value="adasdsako@fmas.pl" style="width: 70%;" id="formularz_emailKontakt_edit"  >
                        </div>
                        <div class="inline field" >
                            <label>Telefon:</label>
                            <input type="text" value="643 435 535" style="width: 70%;" id="formularz_telKontakt_edit" >
                        </div>
                    </div>
                </div>
            </div>




        </div>

    </div>
</div>

<div class="ui united modal" id="formularz_adres_edit" >
    <div class="header">
        <div class="ui header">
            Edytowanie ofert
        </div>
        <div class="ui huge breadcrumb">
            <a class="section idzDo_formularz_podstawowe2" >Podstawowe</a>
            <i class="right chevron icon divider"></i>
            <div class="section" >Adres</div>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_zdjecia2" >Zdjęcia</a>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_szczegoly2" >Szczegóły</a>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_podsumowanie2" >Podsumowanie</a>
            <span class="poczekaj_zdjecia" style="font-size: 90%;" ><i class="notched circle loading icon"></i>Uploading...</span>
        </div>
    </div>
    <div class="content">

        <div class="ui form">
            <div class="field">
                <label>Mapa</label>
                <div id="MAPA2_edit" style="width: 100%;height: 350px;z-index: 10"></div>
                <div class="field" id="WYSZUKIWARKA_POM_edit" style="margin-bottom: 60px;"></div>
            </div>

            <div id="ADRESY_edit" style="margin-bottom: 30px;">
                <input type="text" name="xx" id="formularz_XX_edit" style="display: none;">
                <input type="text" name="yy" id="formularz_YY_edit" style="display: none;">

                <div class="fields">
                    <div class="six wide field">
                        <label>Ulica:&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input type="text" id="formularz_ulica_edit">
                    </div>
                    <div class="four wide field">
                        <label>Miasto:</label>
                        <input type="text" id="formularz_miasto_edit">
                    </div>
                    <div class="six wide field">
                        <label>Kraj:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input type="text" id="formularz_kraj_edit">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="ui united modal" id="formularz_zdjecia_edit">
    <div class="header">
        <div class="ui header">
            Edytowanie ofert
        </div>
        <div class="ui huge breadcrumb">
            <a class="section idzDo_formularz_podstawowe2" >Podstawowe</a>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_adres2" >Adres</a>
            <i class="right chevron icon divider"></i>
            <div class="section" >Zdjęcia</div>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_szczegoly2" >Szczegóły</a>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_podsumowanie2" >Podsumowanie</a>
            <span class="poczekaj_zdjecia" style="font-size: 90%;" ><i class="notched circle loading icon"></i>Uploading...</span>
        </div>
    </div>
    <div class="content">

        <div class="ui form">
            <div class="field">
                <label>Zdjęcia: </label>
                <input type="file" name="files[]" id="filer_input_edit" multiple="multiple">

                <ul class="jFiler-items-list jFiler-items-grid" style="height: 250px;margin-left: -40px;list-style-type: none;" id="obecnieDodaneimages">

                </ul>



            </div>
        </div>

    </div>
</div>

<div class="ui united modal" id="formularz_szczegoly_edit">
    <div class="header">
        <div class="ui header">
            Edytowanie ofert
        </div>
        <div class="ui huge breadcrumb">
            <a class="section active idzDo_formularz_podstawowe2" >Podstawowe</a>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_adres2" >Adres</a>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_zdjecia2" >Zdjęcia</a>
            <i class="right chevron icon divider"></i>
            <div class="section" >Szczegóły</div>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_podsumowanie2" >Podsumowanie</a>
            <span class="poczekaj_zdjecia" style="font-size: 90%;" ><i class="notched circle loading icon"></i>Uploading...</span>
        </div>
    </div>
    <div class="content">

        <div class="ui form">

            <div class="two fields">
                <div class="field disabled" id="rodzajZabudowyonczyoff_edit">
                    <label>Rodzaj zabudowy:</label>
                    <div class="ui selection dropdown fluid">
                        <input type="hidden" id="formularz_szczegoly_propertyBuildingType_edit" >
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
                        <input type="hidden" id="formularz_szczegoly_propertyHeatingType_edit">
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
                        <input type="hidden" id="formularz_szczegoly_propertyMinPerson_edit" >
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
                        <input type="hidden" id="formularz_szczegoly_propertyMaxPerson_edit"  >
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
                        <input type="hidden" id="formularz_szczegoly_propertyRoomCount_edit" >
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
                        <input type="hidden" id="formularz_szczegoly_propertyFloor_edit">
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
                    <input type="text" id="formularz_szczegoly_propertyArea_edit">
                </div>
                <div class="field">
                    <label>Rocznik:</label>
                    <input type="text" id="formularz_szczegoly_propertyBuildYear_edit" >
                </div>
            </div>

            <div class="ui divider" style="margin-top: 30px;"></div>

            <div class="fields">
                <div class="three wide field">
                    <label>Umeblowany:</label>
                    <div class="ui selection dropdown fluid">
                        <input type="hidden" id="formularz_szczegoly_propertyIsFurnished_edit">
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
                        <input type="hidden" id="formularz_szczegoly_propertyHasBalcony_edit">
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
                        <input type="hidden" id="formularz_szczegoly_propertyHasLift_edit">
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
                        <input type="hidden" id="formularz_szczegoly_propertyHasBasement_edit">
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
                        <input type="hidden" id="formularz_szczegoly_propertyHasParking_edit">
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
                        <input type="hidden" id="formularz_szczegoly_propertyAllowPets_edit">
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
                        <input type="hidden" id="formularz_szczegoly_propertyHasGarden_edit">
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
                        <input type="hidden" id="formularz_szczegoly_propertyHasClima_edit">
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
                        <input type="hidden" id="formularz_szczegoly_propertyAllowSmoking_edit">
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

<div class="ui united modal" id="formularz_podsumowanie_edit">
    <div class="header">
        <div class="ui header">
            Edytowanie ofert
        </div>
        <div class="ui huge breadcrumb">
            <a class="section active idzDo_formularz_podstawowe2" >Podstawowe</a>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_adres2" >Adres</a>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_zdjecia2" >Zdjęcia</a>
            <i class="right chevron icon divider"></i>
            <a class="section idzDo_formularz_szczegoly2">Szczegóły</a>
            <i class="right chevron icon divider"></i>
            <div class="section" >Podsumowanie</div>
        </div>
    </div>
    <div class="content">

        <form class="ui form" id="FORMULARZ_DODAWANIA_edit">
            <div class="field" style="display: none;">
                <label>Tytul</label>
                <input name="tytul" id="set_formularz_TYTUL_edit" type="text">
                <input name="opis" id="set_formularz_OPIS_edit" type="text">
                <input name="rodzajT" id="set_formularz_RodzajT_edit" type="text">
                <input name="rodzajM" id="set_formularz_RodzajM_edit" type="text">
                <input name="cena" id="set_formularz_Cena_edit" type="text">
                <input name="waluta" id="set_formularz_Waluta_edit" type="text">
                <input name="ulica" id="set_formularz_Ulica_edit" type="text">
                <input name="miasto" id="set_formularz_Miasto_edit" type="text">
                <input name="kraj" id="set_formularz_Kraj_edit" type="text">
                <input name="xx" id="set_formularz_XX_edit" type="text">
                <input name="yy" id="set_formularz_YY_edit" type="text">

                <input name="glownyKontakt" id="set_formularz_glownyKontakt_edit" type="text">
                <input name="imieKontakt" id="set_formularz_imieKontakt_edit" type="text">
                <input name="emailKontakt" id="set_formularz_emailKontakt_edit" type="text">
                <input name="telKontakt" id="set_formularz_telKontakt_edit" type="text">


                <!-- SZCEGOLYYYYYY-->
                <input name="propertyBuildingType" id="set_formularz_szczegoly_propertyBuildingType_edit" type="text">
                <input name="propertyMinPerson" id="set_formularz_szczegoly_propertyMinPerson_edit" type="text">
                <input name="propertyMaxPerson" id="set_formularz_szczegoly_propertyMaxPerson_edit" type="text">
                <input name="propertyHeatingType" id="set_formularz_szczegoly_propertyHeatingType_edit" type="text">
                <input name="propertyArea" id="set_formularz_szczegoly_propertyArea_edit" type="text">
                <input name="propertyRoomCount" id="set_formularz_szczegoly_propertyRoomCount_edit" type="text">
                <input name="propertyFloor" id="set_formularz_szczegoly_propertyFloor_edit" type="text">
                <input name="propertyBuildYear" id="set_formularz_szczegoly_propertyBuildYear_edit" type="text">
                <input name="propertyIsFurnished" id="set_formularz_szczegoly_propertyIsFurnished_edit" type="text">
                <input name="propertyHasBalcony" id="set_formularz_szczegoly_propertyHasBalcony_edit" type="text">
                <input name="propertyHasLift" id="set_formularz_szczegoly_propertyHasLift_edit" type="text">
                <input name="propertyHasBasement" id="set_formularz_szczegoly_propertyHasBasement_edit" type="text">
                <input name="propertyHasParking" id="set_formularz_szczegoly_propertyHasParking_edit" type="text">
                <input name="propertyAllowPets" id="set_formularz_szczegoly_propertyAllowPets_edit" type="text">
                <input name="propertyHasGarden" id="set_formularz_szczegoly_propertyHasGarden_edit" type="text">
                <input name="propertyHasClima" id="set_formularz_szczegoly_propertyHasClima_edit" type="text">
                <input name="propertyAllowSmoking" id="set_formularz_szczegoly_propertyAllowSmoking_edit" type="text">




            </div>

            <div id="PODGLAD_edit" style="height: auto;">
                <div class="two fields" >
                    <div class="field" style="margin-right: 15px;">
                        <div id="niemaZdjec_edit" class="ui message" style="width: 400px;height: 400px;" >
                            <div class="header">
                                Nie ma zdjec ziom
                            </div>
                        </div>
                        <div class="popup-gallery"  style="width: 87%;">
                            <div id="podglad_obrazy_glowne_edit" ></div>
                            <div id="podglad_obrazy_mini_edit" class="MINIATURKI" ></div>
                        </div>
                    </div>
                    <div class="field">
                        <div style="left: 48%;top: 20px;">
                            <h3 class="ui header">
                                <div id="podglad_tytul_edit">Tytul mieszkania</div>
                            </h3>

                            <h1 class="ui header" style="margin-top: -10px;">
                                <span id="podglad_ulica_edit">Starowiejska</span>
                                <div class="sub header"><span id="podglad_kraj_edit">Kraj</span> - <span id="podglad_miasto_edit">Miasto</span> </div>
                            </h1>

                            <div class="ui clearing" style="margin-bottom: 50px;">
                                <h3 class="ui left floated header" id="podglad_offertyp_edit">Dom</h3>
                                <h5 class="ui left floated header" style="margin-top: 2px;">na</h5>
                                <h3 class="ui left floated header" id="podglad_typ_edit">Sprzedaz</h3>

                                <h2 class="ui right floated header" style="margin-left: 35px;margin-top: -5px;">
                                    <span id="podglad_cena_edit">100</span> <span id="podglad_cena_waluta_edit"></span>
                                </h2>
                            </div>

                            <div class="ui accordion" style="height: 100%;">
                                <div class="title">
                                    <i class="dropdown icon"></i>
                                    Szczegóły
                                </div>
                                <div class="content">
                                    <div class="ui divided middle aligned selection list" id="podglad_szczegoly_edit" ></div>
                                </div>
                                <div class="title">
                                    <i class="dropdown icon"></i>
                                    Opis
                                </div>
                                <div class="content" id="podglad_opis_edit">No super zapraszam do kontkar</div>
                                <div class="title">
                                    <i class="dropdown icon"></i>
                                    Kontakt
                                </div>
                                <div class="content" id="podglad_kontakt_edit">
                                    kontakt
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>

            <div id="ERORKIFORM_edit" style="margin-top: 30px;" class="ui error message"></div>

            <div class="ui button fluid primary" style="margin-top: 10px;" id="WYSLIJ_FORMULARZ_edit">EDYTUJ</div>
        </form>






    </div>
</div>



<script>
    var rodzjaBtms;

    $(document).ready(function() {
//        $("#filer_input_edit").change( handleFileSelect );
        $('#podglad_obrazy_mini_edit').slick({
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            variableWidth: true
        });

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

    var zdjeciapodgladwoezaladwoano = false;
    $(document).on('click', '.editdodane', function(){

        var idektegogowna = $(this).parent().parent().find('.idtegogowna').text();
        $.get(SERWER+'offer/get?id='+idektegogowna,function(data){

            var getTytul = data.title;
            var getOpis = data.description;
            var getRodzajT = data.offerType;
            var getRodzajM = data.property.propertyType;
            rodzjaBtms = getRodzajM;

            var getCena = data.price.value;
            var getWaluta = data.price.currency;

            var getUlica = data.property.address.street;
            var getMiasto = data.property.address.city;
            var getKraj = data.property.address.country;

            var getXX = data.latitude;
            var getYY = data.longitude;

            var getKontaktName = data.contact.name;
            var getKontaktEmail = data.contact.email;
            var getKontaktPhone = data.contact.phoneNumber;



            $('#formularz_TYTUL_edit').val(getTytul);
            $('#formularz_OPIS_edit').val(getOpis);
            $('#formularz_rodzajT_edit').dropdown('set value',getRodzajT);
            $('#formularz_rodzajM_edit').dropdown('set value',getRodzajM);
            $('#formularz_cena_edit').val(getCena);
            $('#formularz_waluta_edit').val(getWaluta);
            $('#formularz_ulica_edit').val(getUlica);
            $('#formularz_miasto_edit').val(getMiasto);
            $('#formularz_kraj_edit').val(getKraj);
            $('#formularz_XX_edit').val(getXX);
            $('#formularz_YY_edit').val(getYY);
            $('#formularz_imieKontakt_edit').val(getKontaktName);
            $('#formularz_emailKontakt_edit').val(getKontaktEmail);
            $('#formularz_telKontakt_edit').val(getKontaktPhone);

            $('#podglad_szczegoly_edit').empty();
            $('#podglad_szczegoly_edit').append(divekSzczegolik("Rozmiar",intToRodzajBT($('#formularz_szczegoly_propertyBuildingType_edit').val()),''));
            $('#podglad_szczegoly_edit').append(divekSzczegolik("Rozmiar",$('#formularz_szczegoly_propertyArea_edit').val(),'m<sup>2</sup>'));
            $('#podglad_szczegoly_edit').append(divekSzczegolik("Ogrzewanie",intToHeating($('#formularz_szczegoly_propertyHeatingType_edit').val()),''));
            $('#podglad_szczegoly_edit').append(divekSzczegolik("Piwnica",$('#formularz_szczegoly_propertyHasBasement_edit').val(),''));
            $('#podglad_szczegoly_edit').append(divekSzczegolik("Balkon",$('#formularz_szczegoly_propertyHasBalcony_edit').val(),''));
            $('#podglad_szczegoly_edit').append(divekSzczegolik("Rok budowy",$('#formularz_szczegoly_propertyBuildYear_edit').val(),''));
            $('#podglad_szczegoly_edit').append(divekSzczegolik("Klimatyzacja",$('#formularz_szczegoly_propertyHasClima_edit').val(),''));
            $('#podglad_szczegoly_edit').append(divekSzczegolik("Pietro",$('#formularz_szczegoly_propertyFloor_edit').val(),''));
            $('#podglad_szczegoly_edit').append(divekSzczegolik("Umeblowanie",$('#formularz_szczegoly_propertyIsFurnished_edit').val(),''));
            $('#podglad_szczegoly_edit').append(divekSzczegolik("Garden",$('#formularz_szczegoly_propertyHasGarden_edit').val(),''));
            $('#podglad_szczegoly_edit').append(divekSzczegolik("Winda",$('#formularz_szczegoly_propertyHasLift_edit').val(),''));
            $('#podglad_szczegoly_edit').append(divekSzczegolik("Pets",$('#formularz_szczegoly_propertyAllowPets_edit').val(),''));
            $('#podglad_szczegoly_edit').append(divekSzczegolik("Ilosc pokoi",$('#formularz_szczegoly_propertyRoomCount_edit').val(),''));
            $('#podglad_szczegoly_edit').append(divekSzczegolik("Maksymlanie ludzi",$('#formularz_szczegoly_propertyMaxPerson_edit').val(),''));
            $('#podglad_szczegoly_edit').append(divekSzczegolik("Parking",$('#formularz_szczegoly_propertyHasParking_edit').val(),''));


              $('#podglad_tytul_edit').text( getTytul );
              $('#podglad_opis_edit').text( getOpis );
              $('#podglad_typ_edit').text( intToRodzajT(getRodzajT) );
              $('#podglad_offertyp_edit').text( intToRodzajM(getRodzajM) );
             $('#podglad_cena_edit').html(getCena);


                if(getRodzajT == 0)
                    $('#podglad_cena_waluta_edit').html('<sup style="font-size: 70%;">'+intToWaluta(getWaluta)+'</sup>&frasl;<sub style="font-size: 60%;">MONTH</sub>');
                else if(getRodzajT == 1)
                    $('#podglad_cena_waluta_edit').html('<span style="font-size: 70%;">'+intToWaluta(getWaluta)+'</span>');
                else if(getRodzajT == 2)
                    $('#podglad_cena_waluta_edit').html('<sup style="font-size: 70%;">'+intToWaluta(getWaluta)+'</sup>&frasl;<sub style="font-size: 60%;">NOC</sub>');


            $('#podglad_ulica_edit').html(getUlica);
            $('#podglad_miasto_edit').html(getMiasto);
            $('#podglad_kraj_edit').html(getKraj);


            //SZCZEGOLY
            if(data.property.buildingType != null)
                $('#set_formularz_szczegoly_propertyBuildingType_edit').val( $('#formularz_szczegoly_propertyBuildingType_edit').val(data.property.buildingType) )

//            if(data.property.buildingType != null)
//                $('#set_formularz_szczegoly_propertyMinPerson').val( $('#formularz_szczegoly_propertyBuildingType').val(data.property.buildingType) )

            if(data.property.maxPerson != null)
                $('#set_formularz_szczegoly_propertyMaxPerson_edit').val( $('#formularz_szczegoly_propertyMaxPerson_edit').val(data.property.maxPerson) )

            if(data.property.heatingType != null)
                $('#set_formularz_szczegoly_propertyHeatingType_edit').val( $('#formularz_szczegoly_propertyHeatingType_edit').val(data.property.heatingType) )

            if(data.property.area != null)
                $('#set_formularz_szczegoly_propertyArea_edit').val( $('#formularz_szczegoly_propertyArea_edit').val(data.property.area) )

            if(data.property.roomCount != null)
                $('#set_formularz_szczegoly_propertyRoomCount_edit').val( $('#formularz_szczegoly_propertyRoomCount_edit').val(data.property.roomCount) )

            if(data.property.floor != null)
                $('#set_formularz_szczegoly_propertyFloor_edit').val( $('#formularz_szczegoly_propertyFloor_edit').val(data.property.floor) )

            if(data.property.builtYear != null)
                $('#set_formularz_szczegoly_propertyBuildYear_edit').val( $('#formularz_szczegoly_propertyBuildYear_edit').val(data.property.builtYear) )

            if(data.property.furnished != null)
                $('#set_formularz_szczegoly_propertyIsFurnished_edit').val( $('#formularz_szczegoly_propertyIsFurnished_edit').val(data.property.furnished) )

            if(data.property.balcony != null)
                $('#set_formularz_szczegoly_propertyHasBalcony_edit').val( $('#formularz_szczegoly_propertyHasBalcony_edit').val(data.property.balcony) )

            if(data.property.lift != null)
                $('#set_formularz_szczegoly_propertyHasLift_edit').val( $('#formularz_szczegoly_propertyHasLift_edit').val(data.property.lift) )

            if(data.property.basement != null)
                $('#set_formularz_szczegoly_propertyHasBasement_edit').val( $('#formularz_szczegoly_propertyHasBasement_edit').val(data.property.basement) )

            if(data.property.parkingPlace != null)
                $('#set_formularz_szczegoly_propertyHasParking_edit').val( $('#formularz_szczegoly_propertyHasParking_edit').val(data.property.parkingPlace) )

            if(data.property.pets != null)
                $('#set_formularz_szczegoly_propertyAllowPets_edit').val( $('#formularz_szczegoly_propertyAllowPets_edit').val(data.property.pets) )

            if(data.property.garden != null)
                $('#set_formularz_szczegoly_propertyHasGarden_edit').val( $('#formularz_szczegoly_propertyHasGarden_edit').val(data.property.garden) )

            if(data.property.climatisation != null)
                $('#set_formularz_szczegoly_propertyHasClima_edit').val( $('#formularz_szczegoly_propertyHasClima_edit').val(data.property.climatisation) )


            if(data.property.photos.length != 0 && !zdjeciapodgladwoezaladwoano )
            {
                for (var i = 0; i < data.property.photos.length; ++i) {
                    var ktory;
                    if(i==0)
                        ktory = "Glowny";
                    else
                        ktory = i;

                    var mini =  SERWER+'photo/thumb/'+data.property.photos[i].id;

                    $('#obecnieDodaneimages').append('<li class="jFiler-item">'+
                        '<div class="jFiler-item-container">'+
                        '<div class="jFiler-item-inner">'+
                        '<div class="jFiler-item-thumb" style="background: url('+mini+') no-repeat center;">'+
                        '</div>'+
                        '<div class="jFiler-item-assets jFiler-row">'+
                        '<ul class="list-inline pull-right" style="list-style-type: none;">'+
                        '<li style="float: left;margin-right: 15px;"><a class="glownezdjecie">'+ktory+'</a><input type="text" name="photos" class="kolejnosc" style="display: none;" /></li>'+
                        '<li style="float: left;margin-right: 15px;"><a class="WLEWO2"><i class="chevron left icon"></i></a></li>'+
                        '<li style="float: left;margin-right: 15px;" class="WPRAWO2"><a><i class="chevron right icon"></i></a></li>'+
                        '<li style="float: left;"><a class="icon-jfi-trash jFiler-item-trash-action akcja2"></a></li>'+
                        '</ul>'+
                        '</div>'+
                        '</div>'+
                        '</div>'+
                        '</li>')
                }

                $('#niemaZdjec_edit').hide();
                zdjeciapodgladwoezaladwoano = true;


                $('#podglad_obrazy_glowne_edit').prepend('<a href="'+SERWER+'photo/'+data.property.photos[0].id+'" title="">'+
                    '<div class="glowne_zdjecie_div_back"><div class="glowne_zdjecie_div">'+
                    '<img  src="'+SERWER+'photo/'+data.property.photos[0].id+'" /></div></div>'+
                    '</a>');


                for (var i = 1; i < data.property.photos.length; ++i) {
                    var normal =  SERWER+'photo/'+data.property.photos[i].id;
                    var mini =  SERWER+'photo/thumb/'+data.property.photos[i].id;

                    $('#podglad_obrazy_mini_edit').slick('slickAdd','<a href="'+normal+'" title="">'+
                        '<div class="miniaturka_div_back"><div class="miniaturka_div"><img src="'+mini+'" /></div></div>'+
                        '</a>');
                }

                if($('#podglad_obrazy_mini_edit a').size() <= 4)
                    $('#podglad_obrazy_mini_edit').css("margin-left","-17px");



            }



            $('.dropdown').dropdown();
            $("#formularz_rodzajM_edit").dropdown({
                onChange: function (val) {
                    rodzjaBtms = val;
                }
            });


            $('#formularz_podstawowe_edit').modal('show');
        });

    });

    $(document).on('click', '.WLEWO2', function(){
        $('#podglad_obrazy_mini_edit').slick('unslick');
        if($(this).index(".WLEWO2") != 0)
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

                var div1 = $('#podglad_obrazy_glowne_edit > a img').eq(0);
                var div2 = $('#podglad_obrazy_mini_edit > a img').eq(0);

                var tdiv1 = div1.clone();
                var tdiv2 = div2.clone();

                div1.replaceWith(tdiv2);
                div2.replaceWith(tdiv1);

            }
            else
            {
                ten.find('.glownezdjecie').text( $(ten).index('.jFiler-item')+1 );
                lewy.find('.glownezdjecie').text( $(lewy).index('.jFiler-item')+1 );

                var div1 = $('#podglad_obrazy_mini_edit > a img').eq($(ten).index('.jFiler-item')-1);
                var div2 = $('#podglad_obrazy_mini_edit > a img').eq($(lewy).index('.jFiler-item')-1);

                var tdiv1 = div1.clone();
                var tdiv2 = div2.clone();

                div1.replaceWith(tdiv2);
                div2.replaceWith(tdiv1);

            }

        }

        $('#podglad_obrazy_mini_edit').slick({
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            variableWidth: true
        });
    });

    $(document).on('click', '.WPRAWO2', function(){
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


    $(document).on('click', '.akcja2', function(){
        console.log('usun2')
        var index = $(this).index('.jFiler-item-trash-action');


        if(index ==0 && $('.glownezdjecie').length == 1)
        {
            $('#niemaZdjec').show();
            niemazdjec = true;
        }

        if( index == 0)
        {
            $('#podglad_obrazy_mini_edit').slick('unslick');

            var div1 = $('#podglad_obrazy_glowne_edit > a img').eq(0);
            var div2 = $('#podglad_obrazy_mini_edit > a img').eq(0);

            var tdiv1 = div1.clone();
            var tdiv2 = div2.clone();

            div1.replaceWith(tdiv2);
            div2.replaceWith(tdiv1);

            $('#podglad_obrazy_mini_edit').slick({
                infinite: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                variableWidth: true
            });

            $('#podglad_obrazy_mini_edit').slick('slickRemove',index);

            //console.log( $('#podglad_obrazy_mini a img').size() + ' ' + $('#podglad_obrazy_glowne a img').size()  )
            if($('#podglad_obrazy_mini_edit a img').size() == 0 && $('#podglad_obrazy_glowne_edit a img').size() == 0 )
                $('#podglad_obrazy_glowne_edit').empty();

            //itemEl.next('.jFiler-item').find('.glownezdjecie').text('Głowne');
            for (var i = index+2; i < $('.glownezdjecie').length; i++) {
                $('.glownezdjecie').eq(i).text(i);
            }
        }
        else
        {
            //$('.glownezdjecie').eq(0).text('Glowne');
            for (var i = index; i < $('.glownezdjecie').length; i++) {
                $('.glownezdjecie').eq(i).text(i);
            }
            $('#podglad_obrazy_mini_edit').slick('slickRemove',index-1);

           $(this).parentsUntil('.jFiler-item').parent().remove();
        }


    });



    $('.idzDo_formularz_szczegoly2').on('click', function() {
        $('.rodzajZabudowyDom,.rodzajZabudowyBlok,.rodzajZabudowyLokale, .rodzajZabudowyPokoj, .rodzajZabudowyGaraz, .rodzajZabudowyDzialka').hide();

            $('#rodzajZabudowyonczyoff_edit').removeClass('disabled');

            if(rodzjaBtms == 0)
                $('.rodzajZabudowyDom').show();
            else if(rodzjaBtms == 50)
                $('.rodzajZabudowyBlok').show();
            else if(rodzjaBtms == 100)
                $('.rodzajZabudowyPokoj').show();
            else if(rodzjaBtms == 150)
                $('.rodzajZabudowyDzialka').show();
            else if(rodzjaBtms == 200)
                $('.rodzajZabudowyGaraz').show();
            else if(rodzjaBtms == 250)
                $('.rodzajZabudowyLokale').show();


    });


    var bylo2 = false;
    $(document).on('click', '.idzDo_formularz_adres',function(){
        if(!bylo2)
        {
            bylo2 = true;

            var MAPA2 = L.map('MAPA2_edit', { center: L.latLng(50.088488, 19.937890),zoom: 12, attributionControl: false });
            window.dispatchEvent(new Event('resize'));
            L.tileLayer('https://a.tiles.mapbox.com/v3/mi.0ad4304c/{z}/{x}/{y}.png').addTo(MAPA2);

            new L.Control.GPlaceAutocomplete({
                position: "topleft",
                prepend : false,
                autocomplete_options : {
                    types:  ['geocode']
                }
            }).addTo(MAPA2);

            $("#MAPA2_edit .leaflet-gac-container.leaflet-control").appendTo("#WYSZUKIWARKA_POM_edit").css({width: "100%"});

            setTimeout(function(){
                MAPA2.invalidateSize();
                MAPA2.setView([50.088488, 19.937890],12);
            },300);
        }
    });

    $('.idzDo_formularz_zdjecia2').on('click', function(){
        console.log("refresh")
        $('#formularz_zdjecia_edit').modal('show');
        $('#formularz_zdjecia_edit').modal('refresh');
    });

//    var tablicaLadujacychSie = [];
//    var niemazdjec = true;
//    $(document).ready(function() {
//
//        $('.dropdown').dropdown();
//
//
//
//        $("#filer_input").change( handleFileSelect );
//
//        $('.poczekaj_zdjecia').hide();
//
//
//
//
//        $('.popup-gallery').magnificPopup({
//            delegate: 'a',
//            type: 'image',
//            tLoading: 'Loading image #%curr%...',
//            mainClass: 'mfp-img-mobile',
//            gallery: {
//                enabled: true,
//                navigateByImgClick: true,
//                preload: [0,1] // Will preload 0 - before current, and 1 after the current image
//            },
//            image: {
//                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
//                titleSrc: function(item) {
//                    return item.el.attr('title');
//                }
//            }
//        });
//
//    });
//
//
//    $(document).on('click', '.WLEWO', function(){
//        $('#podglad_obrazy_mini').slick('unslick');
//        if($(this).index(".WLEWO") != 0)
//        {
//            var ten = $(this).parentsUntil('.jFiler-item').parent();
//            var lewy = $(this).parentsUntil('.jFiler-item').parent().prev('.jFiler-item');
//
//            var strDiv1Cont = ten.html();
//            var strDiv2Cont = lewy.html();
//
//            ten.html(strDiv2Cont);
//            lewy.html(strDiv1Cont);
//
//            if($(ten).index('.jFiler-item') == 1)
//            {
//                ten.find('.glownezdjecie').text($(ten).index('.jFiler-item')+1);
//                lewy.find('.glownezdjecie').text('Głowne');
//
//                var div1 = $('#podglad_obrazy_glowne > a img').eq(0);
//                var div2 = $('#podglad_obrazy_mini > a img').eq(0);
//
//                var tdiv1 = div1.clone();
//                var tdiv2 = div2.clone();
//
//                div1.replaceWith(tdiv2);
//                div2.replaceWith(tdiv1);
//
//            }
//            else
//            {
//                ten.find('.glownezdjecie').text( $(ten).index('.jFiler-item')+1 );
//                lewy.find('.glownezdjecie').text( $(lewy).index('.jFiler-item')+1 );
//
//                var div1 = $('#podglad_obrazy_mini > a img').eq($(ten).index('.jFiler-item')-1);
//                var div2 = $('#podglad_obrazy_mini > a img').eq($(lewy).index('.jFiler-item')-1);
//
//                var tdiv1 = div1.clone();
//                var tdiv2 = div2.clone();
//
//                div1.replaceWith(tdiv2);
//                div2.replaceWith(tdiv1);
//
//            }
//
//        }
//
//        $('#podglad_obrazy_mini').slick({
//            infinite: false,
//            slidesToShow: 4,
//            slidesToScroll: 1,
//            variableWidth: true
//        });
//    });
//
//    $(document).on('click', '.WPRAWO', function(){
//        $('#podglad_obrazy_mini').slick('unslick');
//        if( $(this).index(".WPRAWO")+1 != $(".WPRAWO").size() )
//        {
//            var ten = $(this).parentsUntil('.jFiler-item').parent();
//            var prawy = $(this).parentsUntil('.jFiler-item').parent().next('.jFiler-item');
//
//            var strDiv1Cont = ten.html();
//            var strDiv2Cont = prawy.html();
//
//
//            ten.html(strDiv2Cont);
//            prawy.html(strDiv1Cont);
//
//            if($(ten).index('.jFiler-item') == 0)
//            {
//                ten.find('.glownezdjecie').text('Głowne');
//                prawy.find('.glownezdjecie').text($(prawy).index('.jFiler-item')+1);
//
//                var div1 = $('#podglad_obrazy_glowne > a img').eq(0);
//                var div2 = $('#podglad_obrazy_mini > a img').eq(0);
//
//                var tdiv1 = div1.clone();
//                var tdiv2 = div2.clone();
//
//                div1.replaceWith(tdiv2);
//                div2.replaceWith(tdiv1);
//            }
//            else
//            {
//                ten.find('.glownezdjecie').text( $(ten).index('.jFiler-item')+1 );
//                prawy.find('.glownezdjecie').text( $(prawy).index('.jFiler-item')+1 );
//
//                var div1 = $('#podglad_obrazy_mini > a img').eq($(ten).index('.jFiler-item')-1);
//                var div2 = $('#podglad_obrazy_mini > a img').eq($(prawy).index('.jFiler-item')-1);
//
//                var tdiv1 = div1.clone();
//                var tdiv2 = div2.clone();
//
//                div1.replaceWith(tdiv2);
//                div2.replaceWith(tdiv1);
//            }
//
//        }
//
//        $('#podglad_obrazy_mini').slick({
//            infinite: false,
//            slidesToShow: 4,
//            slidesToScroll: 1,
//            variableWidth: true
//        });
//    });
//
//
//    $(document).on('click', '.jFiler-item-trash-action', function(){
//
//        var index = $(this).index('.jFiler-item-trash-action');
//        var indexx = tablicaLadujacychSie.indexOf( index );
//        tablicaLadujacychSie.splice(indexx, 1);
//
//
//        if(tablicaLadujacychSie.length == 0)
//        {
//            $('.idzDo_formularz_podsumowanie').show();
//            $('.poczekaj_zdjecia').hide();
//        }
//
//
//        if(index ==0 && $('.glownezdjecie').length == 1)
//        {
//            $('#niemaZdjec').show();
//            niemazdjec = true;
//        }
//
//        if( index == 0)
//        {
//            $('#podglad_obrazy_mini').slick('unslick');
//
//            var div1 = $('#podglad_obrazy_glowne > a img').eq(0);
//            var div2 = $('#podglad_obrazy_mini > a img').eq(0);
//
//            var tdiv1 = div1.clone();
//            var tdiv2 = div2.clone();
//
//            div1.replaceWith(tdiv2);
//            div2.replaceWith(tdiv1);
//
//            $('#podglad_obrazy_mini').slick({
//                infinite: false,
//                slidesToShow: 4,
//                slidesToScroll: 1,
//                variableWidth: true
//            });
//
//            $('#podglad_obrazy_mini').slick('slickRemove',index);
//
//            //console.log( $('#podglad_obrazy_mini a img').size() + ' ' + $('#podglad_obrazy_glowne a img').size()  )
//            if($('#podglad_obrazy_mini a img').size() == 0 && $('#podglad_obrazy_glowne a img').size() == 0 )
//                $('#podglad_obrazy_glowne').empty();
//
//            //itemEl.next('.jFiler-item').find('.glownezdjecie').text('Głowne');
//            for (var i = index+2; i < $('.glownezdjecie').length; i++) {
//                $('.glownezdjecie').eq(i).text(i);
//            }
//        }
//        else
//        {
//            for (var i = index; i < $('.glownezdjecie').length; i++) {
//                $('.glownezdjecie').eq(i).text(i);
//            }
//            $('#podglad_obrazy_mini').slick('slickRemove',index-1);
//        }
//
//
//    });


</script>