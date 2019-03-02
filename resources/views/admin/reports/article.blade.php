@extends('admin.layouts.app')


@section('content')
    <!-- Main content -->
    <title>Users - Reports</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>


    <div class="container-fluid mt--5">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row mb-0">
                    <div class="element1 col-md-4">
                        <h2>List of Maternal Guide Articles</h2>
                    </div>
                </div>
            </div>

            <h2 align="center"></h2>

            <table id="users" class="table table-hover table-striped align-items-center table-flush">
                <div class="element1 col-md-4">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Cover Image</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Cover Image</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>
    </div>
<!-- Footer -->
<!-- Footer -->
<footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
                &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
        </div>
        <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                <li class="nav-item">
                    <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                    <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
                </li>
            </ul>
        </div>
    </div>
</footer>



<script type="text/javascript">
    $('#users').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url":"<?= route('articleProcessing') ?>",
            "dataType":"json",
            "type":"POST",
            "data":{"_token":"<?= csrf_token() ?>"}
        },
        "columns":[
            {"data":"id"},
            {"data":"title"},
            {"data":"body"},
            {"data":"cover_image"},
            {"data":"created_at"},
            {"data":"updated_at"},
        ],
    } );
</script>

@endsection

