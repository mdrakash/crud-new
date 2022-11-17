<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Country CRUD</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Country</div>
                    <div class="card-body">
                        <table class="table" id="country-list-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Country Name</th>
                                    <th>Country City</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                    </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add New Country</div>
                    <div class="card-body">
                        <form action="{{route('add.country')}}" method="POST" id="add-country">
                            @csrf
                            <div class="form-group">
                                <label for="country_name">Country Name</label>
                                <input type="text" class="form-control" name="country_name" placeholder="Country Name">
                                <span class="text-danger error-text country_name_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="city">Country City</label>
                                <input type="text" class="form-control" name="country_city" placeholder="Country City">
                                <span class="text-danger error-text country_city_error"></span>
                            </div>
                            <div class="d-grid mt-2">
                                <button class="btn btn-success" type="submit">Save</button>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('editCountry')
    </div>











    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('../datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('../datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('../sweetalaert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('../toostr/toastr.min.js') }}"></script>
    <script src="{{ asset('js/index.js') }}" type="text/javascript"></script>
    <script>
        $(function () {
            
        });

    </script>
</body>
</html>