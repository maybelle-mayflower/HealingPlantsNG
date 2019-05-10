$(document).ready(function() {


    $('#recipebase').DataTable({
        "columnDefs": [
            {
                "targets": [ 2 ],
                "visible": false,
                "searchable": true
            }
        ],
        "language": {
            "emptyTable": "No recipes available"
          }
    });

    $('#carttable').DataTable({
        searching: false, paging: false, info: false,
        "language": {
            "emptyTable": "Shopping Cart is empty"
          }
    });
} );