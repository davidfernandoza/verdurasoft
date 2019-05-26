$(document).ready( function () {

  $('#table_id').DataTable({
    "paging": true,
    pageLength : 5,

  // lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
    "lengthChange": false,
    "searching": true,
    "order": [[ 5, 'asc']],
    "info": true,
    "autoWidth": false,
    "language": {
      "lengthMenu": "Mostrar: _MENU_ Registros.",
      "zeroRecords": "No se encontraron resultados en su busqueda",
      "searchPlaceholder": "Buscar",
      "info": "Registros del _START_ al _END_ de un total de  _TOTAL_.",
      "infoEmpty": "No existen registros",
      "infoFiltered": "(filtrado de un total de _MAX_ registros)",
      "search": "",
      "paginate": {
        "first":    "Primero",
        "last":    "Último",
        "next":    "Siguiente",
        "previous": "Anterior"
      }
    }
  });
} );
