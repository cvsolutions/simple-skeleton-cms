$(document).ready(function () {
    /**
     * Isotope
     */
    if ($('#is-filter').length > 0) {
        // init Isotope
        var $grid = $('.card-columns').isotope({
            // options
        });
        // filter items on button click
        $('.filter-button-group').on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({filter: filterValue});
        });
    }
    /**
     * home counters
     */
    if ($('#is-counter').length > 0) {
        $('.count').counterUp({
            delay: 10,
            time: 1000
        });
    }

    $('.multiple-items').slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        dots: true,
        arrows: true
    });

    /**
     * lavora con noi
     */
    //display or hide select posizioni aperte
    $('#object').change(function (e) {
        if (this.options[e.target.selectedIndex].text === "Candidatura su posizione aperta") {
            $('#posizioneAperta').removeClass('invisible');
        } else {
            $('#posizioneAperta').addClass('invisible');
        }
    });
    //display or hide select specializzazione
    $('#title').change(function (e) {
        $("select#specialization option").remove();
        var select = $('select#specialization');
        //specializzazione medico
        if (this.options[e.target.selectedIndex].text === "Medico") {
            var specializzazione = [
                "--Seleziona--",
                "Allergologia ed Immunologia clinica",
                "Anatomia Patologica",
                "Anestesia Rianimazione",
                "Anestesia Rianimazione, Cardio-Anestesia",
                "Anestesia Rianimazione, Terapia Intensiva e del dolore",
                "Angiologia",
                "Area Odontoiatrica",
                "Audiologia e foniatria",
                "Cardiochirurgia",
                "Cardiologia",
                "Cardiologia Interventistica",
                "Chirurgia Generale",
                "Chirurgia Maxillo-Facciale",
                "Chirurgia pediatrica",
                "Chirurgia plastica, ricostruttiva ed estetica",
                "Chirurgia Toracica",
                "Chirurgia Vascolare",
                "Dermatologia e Venereologia",
                "Direttore Sanitario",
                "Ematologia",
                "Endocrinologia e malattie del metabolismo",
                "Epidemiologia",
                "Farmacologia e Tossicologia Clinica",
                "Gastroenterologia ed Endoscopia Digestiva",
                "Genetica medica",
                "Geriatria",
                "Ginecologia ed Ostetricia",
                "Igiene e Medicina Preventiva",
                "Malattie Infettive e Tropicali",
                "Medicina d’urgenza",
                "Medicina del Lavoro",
                "Medicina dello sport e dell’esercizio fisico",
                "Medicina fisica e riabilitativa",
                "Medicina interna",
                "Medicina Legale",
                "Medicina nucleare",
                "Medico Chirurgo (senza specializzazione)",
                "Microbiologia e Virologia",
                "Nefrologia",
                "Neonatologia",
                "Neurochirurgia",
                "Neurologia",
                "Neuropsichiatria infantile",
                "Oftalmologia",
                "Oncologia medica",
                "Ortopedia e traumatologia",
                "Otorinolaringoiatria",
                "Patologia Clinica e Biochimica Clinica",
                "Pediatria",
                "Pneumologia",
                "Primario",
                "Psichiatria",
                "Radiodiagnostica",
                "Radioterapia",
                "Reumatologia",
                "Scienza dell’alimentazione",
                "Statistica sanitaria e Biometria",
                "Urologia"
            ];
            for (i = 0; i < specializzazione.length; ++i) {
                var o = new Option(specializzazione[i], specializzazione[i]);
                $(o).html(specializzazione[i]);
                select.append(o);
            }
            $('#specializzazione').removeClass('invisible');
        }
        //specializzazione infermiere
        if (this.options[e.target.selectedIndex].text === "Infermiere") {
            var specializzazione = [
                "--Seleziona--",
                "Infermiere",
                "Caposala",
                "Sala Operatoria",
                "Infermiere Pediatrico",
                "Infermiere Psichiatrico"
            ];
            for (i = 0; i < specializzazione.length; ++i) {
                var o = new Option(specializzazione[i], specializzazione[i]);
                $(o).html(specializzazione[i]);
                select.append(o);
            }
            $('#specializzazione').removeClass('invisible');
        }

        //specializzazione altre professioni sanitarie
        if (this.options[e.target.selectedIndex].text === "Altre professioni sanitarie") {
            var specializzazione = [
                "--Seleziona--",
                "Assistente Sanitario",
                "Assistente Sociale",
                "Biologo",
                "Dietista",
                "Educatore Professionale",
                "Farmacista",
                "Fisioterapista",
                "Logopedista",
                "Ortottista – Assistente di Oftalmologia",
                "Ostetrica - Ostetrico",
                "Podologo",
                "Psicologo",
                "Tecnico Audiometrista",
                "Tecnico della Fisiopatologia Cardiovascolare",
                "Tecnico della Prevenzione nell’Ambiente e nei luoghi di lavoro",
                "Tecnico di Neurofisiopatologia",
                "Tecnico Riabilitazione Psichiatrica",
                "Tecnico Sanitario di Laboratorio Biomedico",
                "Tecnico Sanitario di Radiologia Medica",
                "Terapista della Neuro e Psicomotricità dell’Età Evolutiva",
                "Terapista Occupazionale"
            ];
            for (i = 0; i < specializzazione.length; ++i) {
                var o = new Option(specializzazione[i], specializzazione[i]);
                $(o).html(specializzazione[i]);
                select.append(o);
            }
            $('#specializzazione').removeClass('invisible');
        }
        //specializzazione professioni non sanitarie
        if (this.options[e.target.selectedIndex].text === "Professioni non sanitarie") {
            var specializzazione = [
                "--Seleziona--",
                "Massofisioterapista",
                "Odontotecnico",
                "Operatore socio-sanitario",
                "Puericultrice",
                "Addetto alla Manutenzione",
                "Addetto alla Piscina",
                "Direzione Amministrativa",
                "Programmatore",
                "Risk Manager",
                "Segreteria Amministrativa",
                "Ufficio Legale"
            ];
            for (i = 0; i < specializzazione.length; ++i) {
                var o = new Option(specializzazione[i], specializzazione[i]);
                $(o).html(specializzazione[i]);
                select.append(o);
            }
            $('#specializzazione').removeClass('invisible');
        }
        if (this.options[e.target.selectedIndex].text === "--Seleziona--") {
            $('#specializzazione').addClass('invisible');
        }
    });
});
