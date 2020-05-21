@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- <ul>
                <li><a href="products">Products</a></li>
            </ul> -->
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Products</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProduct">
                Add product
            </button>

            <!-- Modal -->
            <div class="modal fade" id="addProduct" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/products/store" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4"><span>Name</span></div>
                                    <div class="col-md-8"><input name="name" class='form-control' type="text"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

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
                defaultContent: '<a href="" class="product_edit">Edit</a> / <a href="" class="product_remove">Delete</a>'
            }
        ]
    });

    
    editor = new $.fn.dataTable.Editor({
        "ajax": "../php/staff.php",
        "table": "#grid-products",
        "fields": [{
            "label": "Name:",
            "name": "name"
        }]
    });

    // Edit record
    $('#grid-products').on('click', 'a.product_edit', function(e) {
        e.preventDefault();

        editor.edit($(this).closest('tr'), {
            title: 'Edit Product',
            buttons: 'Update'
        });
    });

    // Delete a record
    $('#grid-products').on('click', 'a.product_remove', function(e) {
        e.preventDefault();

        editor.remove($(this).closest('tr'), {
            title: 'Delete record',
            message: 'Are you sure you wish to remove this record?',
            buttons: 'Delete'
        });
    });



});
</script>
<script src="{{ asset('js/datatables.min.js') }}" defer></script>
@endsection