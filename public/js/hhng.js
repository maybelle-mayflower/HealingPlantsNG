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
} );