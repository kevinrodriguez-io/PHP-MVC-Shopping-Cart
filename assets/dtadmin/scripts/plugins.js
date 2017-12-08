(function () {
  $('.dt-datatable').dataTable({ 
    'order': [], 
    'columnDefs': [{ 'targets': 'no-sort', 'orderable': false }] ,
    'language': {
      'url': 'assets/dtadmin/scripts/dataTables.spanish.json'
    },
  });
} ())