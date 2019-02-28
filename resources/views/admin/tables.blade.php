@extends('admin.layouts.app')


@section('content')
    <!-- Main content -->

    <!-- Page content -->
    <div class="container-fluid mt--8">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row mb-0">
                            <div class="element1 col-md-3">
                                <h3>Doctors</h3>
                            </div>
                            {{--<div class="element2 col-md-4">--}}
                                    {{--<input style="width: 550px;" type="text" name="search" id="search" class="form-control" placeholder="Search Doctor" />--}}
                            {{--</div>--}}
                            {{--<div class="element2 col-md-4">--}}
                                {{--<input type="search" name="search" class="form-control">--}}
                                {{--<span class="form-group btn">--}}
                                    {{--<button type="submit" class="btn btn-primary">Search</button>--}}
                                {{--</span>--}}
                            {{--</div>--}}
                            <div class="element2 col-md-2 offset-md-7">
                                <a href="/users/create" class="btn btn-primary">Add Doctor</a>
                            </div>
                        </div>
                    </div>

                    @if(count($users) > 0)
                        {{--dd($users);--}}
                        <div class="table-responsive">
                            <h3 align="center">Total Data : <span id="total_records"></span></h3>
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    {{--<th width="5%" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">Name <span id="id_icon"></span></th>--}}
                                    {{--<th width="38%" class="sorting" data-sorting_type="asc" data-column_name="post_title" style="cursor: pointer">Email <span id="post_title_icon"></span></th>--}}
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--@include('admin.cruddoctors.pagination_data')--}}

                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            {{$user->first_name}} {{ $user->last_name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            {{ $user->created_at }}
                                        </td>
                                        <td>
                                            <a href="/doctorprofile/{{$user->id}}" class="btn btn-default">View Profile</a>
                                        </td>
                                    </tr>

                                </tbody>
                                @endforeach

                            </table>
                            <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                            <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
                            <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
                            @else
                                <p style="text-align: center">There are no users</p>
                            @endif
                        </div>
                        <div class="card-footer py-4">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-end mb-0">

                                    {{ $users->links() }}
                                </ul>
                            </nav>
                        </div>
                </div>
            </div>
        </div>

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
    </div>

    <script>
        $(document).ready(function(){

            fetch_doctor_data();

            function fetch_doctor_data(query = '')
            {
                $.ajax({
                    url:"{{ route('doctors_action') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data)
                    {
                        $('tbody').html(data.table_data);
                        $('#total_records').text(data.total_data);
                    }
                })
            }

            $(document).on('keyup', '#search', function(){
                var query = $(this).val();
                fetch_doctor_data(query);
            });
        });
    </script>

    {{--<script>--}}
        {{--$(document).ready(function(){--}}

            {{--function clear_icon()--}}
            {{--{--}}
                {{--$('#id_icon').html('');--}}
                {{--$('#post_title_icon').html('');--}}
            {{--}--}}

            {{--function fetch_data(page, sort_type, sort_by, query)--}}
            {{--{--}}
                {{--$.ajax({--}}
                    {{--url:"/users/fetch_data?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query,--}}
                    {{--success:function(data)--}}
                    {{--{--}}
                        {{--$('tbody').html('');--}}
                        {{--$('tbody').html(data);--}}
                    {{--}--}}
                {{--})--}}
            {{--}--}}

            {{--$(document).on('keyup', '#search', function(){--}}
                {{--var query = $('#search').val();--}}
                {{--var column_name = $('#hidden_column_name').val();--}}
                {{--var sort_type = $('#hidden_sort_type').val();--}}
                {{--var page = $('#hidden_page').val();--}}
                {{--fetch_data(page, sort_type, column_name, query);--}}
            {{--});--}}

            {{--$(document).on('click', '.sorting', function(){--}}
                {{--var column_name = $(this).data('column_name');--}}
                {{--var order_type = $(this).data('sorting_type');--}}
                {{--var reverse_order = '';--}}
                {{--if(order_type == 'asc')--}}
                {{--{--}}
                    {{--$(this).data('sorting_type', 'desc');--}}
                    {{--reverse_order = 'desc';--}}
                    {{--clear_icon();--}}
                    {{--$('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-bottom"></span>');--}}
                {{--}--}}
                {{--if(order_type == 'desc')--}}
                {{--{--}}
                    {{--$(this).data('sorting_type', 'asc');--}}
                    {{--reverse_order = 'asc';--}}
                    {{--clear_icon--}}
                    {{--$('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-top"></span>');--}}
                {{--}--}}
                {{--$('#hidden_column_name').val(column_name);--}}
                {{--$('#hidden_sort_type').val(reverse_order);--}}
                {{--var page = $('#hidden_page').val();--}}
                {{--var query = $('#serach').val();--}}
                {{--fetch_data(page, reverse_order, column_name, query);--}}
            {{--});--}}

            {{--$(document).on('click', '.pagination a', function(event){--}}
                {{--event.preventDefault();--}}
                {{--var page = $(this).attr('href').split('page=')[1];--}}
                {{--$('#hidden_page').val(page);--}}
                {{--var column_name = $('#hidden_column_name').val();--}}
                {{--var sort_type = $('#hidden_sort_type').val();--}}

                {{--var query = $('#search').val();--}}

                {{--$('li').removeClass('active');--}}
                {{--$(this).parent().addClass('active');--}}
                {{--fetch_data(page, sort_type, column_name, query);--}}
            {{--});--}}

        {{--});--}}
    {{--</script>--}}

@endsection
