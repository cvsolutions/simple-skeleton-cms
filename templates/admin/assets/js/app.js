$(document).ready(function () {
    $('.js-validate').validate({
        errorElement: "em",
        errorPlacement: function (error, element) {
            // Add the `invalid-feedback` class to the error element
            error.addClass("invalid-feedback");
            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.next("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
    $('.js-datatable').DataTable({
        "language": {
            "sEmptyTable": "Nessun dato presente nella tabella",
            "sInfo": "Vista da _START_ a _END_ di _TOTAL_ elementi",
            "sInfoEmpty": "Vista da 0 a 0 di 0 elementi",
            "sInfoFiltered": "(filtrati da _MAX_ elementi totali)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "Visualizza _MENU_ elementi",
            "sLoadingRecords": "Caricamento...",
            "sProcessing": "Elaborazione...",
            "sSearch": "Cerca:",
            "sZeroRecords": "La ricerca non ha portato alcun risultato.",
            "oPaginate": {
                "sFirst": "Inizio",
                "sPrevious": "Precedente",
                "sNext": "Successivo",
                "sLast": "Fine"
            },
            "oAria": {
                "sSortAscending": ": attiva per ordinare la colonna in ordine crescente",
                "sSortDescending": ": attiva per ordinare la colonna in ordine decrescente"
            }
        }
    });
    $('[data-toggle="tooltip"]').tooltip();
    $('.datepicker').datepicker({
        language: 'it'
    });
    $('.js-select2').select2({});

    //
    var ckeditorConfiguration = {
        language: 'it',
        height: 480
    };
    if ($('#description_it').length > 0) {
        CKEDITOR.replace('description_it', ckeditorConfiguration);
    }
    if ($('#training_it').length > 0) {
        CKEDITOR.replace('training_it', ckeditorConfiguration);
    }
    if ($('#professional_experiences_it').length > 0) {
        CKEDITOR.replace('professional_experiences_it', ckeditorConfiguration);
    }
    CKEDITOR.config.allowedContent = true;
});