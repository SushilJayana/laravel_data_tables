@extends('home')

@section('page')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Products</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" id="add-product">
                Add product
            </button>
            <br><br>
            <table class="table table-bordered" id="grid-products">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Edit / Delete</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {

    $.ajax({
        url: '/oauth/clients',
        type: 'GET',
       success: function(response) {
            debugger;
        }
    });


    $('#grid-products').dataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('products/productsList') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: null,
                className: "center",
                defaultContent: '<a href="" class="product-edit">Edit</a> / <a href="" class="product-remove">Delete</a>'
            }
        ]
    });

    // Add record
    $('#add-product').on('click', function(e) {
        e.preventDefault();

        const dialog = showDialog('Add Product',350,200)

        $.ajax({
            url: '/products/create',
            type: 'GET',
            success: function(response) {
                dialog.html(response);
            }
        });
    });

    // Edit record
    $('#grid-products').on('click', 'a.product-edit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '/products/edit',
            type: 'GET',
            data: {
                "id": 1
            },
            success: function(response) {
                debugger;
            }
        });
    });

    // Delete a record
    $('#grid-products').on('click', 'a.product-remove', function(e) {
        e.preventDefault();

        editor.remove($(this).closest('tr'), {
            title: 'Delete record',
            message: 'Are you sure you wish to remove this record?',
            buttons: 'Delete'
        });
    });



});
</script>
<script src="{{ asset('js/infras.js') }}" defer></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous" defer></script>


@endsection
