<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/fontawesome.min.css"
        integrity="sha512-R+xPS2VPCAFvLRy+I4PgbwkWjw1z5B5gNDYgJN5LfzV4gGNeRQyVrY7Uk59rX+c8tzz63j8DeZPLqmXvBxj8pA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css"
        integrity="sha512-vebUliqxrVkBy3gucMhClmyQP9On/HAWQdKDXRaAlb/FKuTbxkjPKUyqVOxAcGwFDka79eTF+YXwfke1h3/wfg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Products</title>
    <style>
        nav svg {
            height: 20px;
        }

        .btn {
            margin: 2px;
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col md-8 offset-md-1">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <a href="{{ url('/') }}">
                            <h4>All Produts</h4>
                        </a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#productaddmodal"><i
                                class="fa fa-plus" aria-hidden="true">ADD</i></button>
                    </div>
                    <div class="card-body">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($products as $key => $product)
                                    <tr>
                                        <th>{{ $product->id }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>
                                            <form action="">
                                                <a href="" class="btn btn-primary"><i
                                                        class="las la-edit"></i></a>
                                                <button type="submit" class="btn btn-danger"><i
                                                        class="las la-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach --}}


                            </tbody>
                        </table>
                        {{-- {!! $data->links() !!} --}}

                        {{-- Add model start --}}
                        <!-- Modal -->
                        <div class="modal fade" id="productaddmodal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="errormessage m-2">

                                        </div>

                                        <form id="addproductid">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" name="name" id="name" class="form-control"
                                                    placeholder="Enter Your Name">
                                                <span class="text-danger" id="nameError"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Price</label>
                                                <input type="number" name="price" id="price" class="form-control"
                                                    placeholder="Enter Your Price">
                                                <span class="text-danger" id="priceError"></span>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="add_product"
                                            onclick="addData()">ADD
                                            Product</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Add model end --}}


                        {{-- edit model start --}}
                        <div class="modal fade" id="producteditmodal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="errormessage m-2">

                                        </div>

                                        <form id="editproductid">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" name="name" id="ename"
                                                    class="form-control" placeholder="Enter Your Name">
                                                <span class="text-danger" id="enameError"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Price</label>
                                                <input type="number" name="price" id="eprice"
                                                    class="form-control" placeholder="Enter Your Price">
                                                <span class="text-danger" id="epriceError"></span>
                                            </div>
                                            <input type="hidden" id="id">
                                        </form>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="update_product"
                                            onclick="updateP()">Update
                                            Product</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- edit model end --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('product_js')

</body>

</html>
