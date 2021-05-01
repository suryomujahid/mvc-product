//responsive sidebar & headers
(function () {
    'use strict'

    feather.replace()

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl)
    })
})()

//datatables
$(function () {
    $('#tb-product').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [-1, 3],
        }]
    });
    $('#tb-type').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": 2,
        }]
    });
    $('#tb-user').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": 3,
        }]
    });
});