@foreach($data as $row)
    <tr>
        <td>{{ $row->id}}</td>
        <td>{{ $row->first_name }} {{ $row->last_name }}</td>
        <td>{{ $row->email }}</td>
        <td>{{ $row->created_at }}</td>
    </tr>
@endforeach

<tr>
    <td colspan="3" align="center">
        {!! $data->links() !!}
    </td>
</tr>

{{--<div class="card-footer py-4">--}}
    {{--<nav aria-label="...">--}}
        {{--<ul class="pagination justify-content-end mb-0">--}}

            {{--{!! $data->links() !!}--}}
        {{--</ul>--}}
    {{--</nav>--}}
{{--</div>--}}