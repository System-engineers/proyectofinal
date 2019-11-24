$(function () {
    $('.js-basic-example').DataTable({
        responsive: true,
        lengthMenu: [[20, 40, 60, -1], [20, 40, 60, "Todo"]],
        ordering: true,
        language: {
            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});