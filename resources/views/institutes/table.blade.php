<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="institutes-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Pan</th>
                    <th>Image</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($institutes as $institute)
                    <tr>
                        <td>{{ $institute->name }}</td>
                        <td>{{ $institute->address }}</td>
                        <td>{{ $institute->phone }}</td>
                        <td>{{ $institute->email }}</td>
                        <td>{{ $institute->pan }}</td>
                        <td><img src="{{ asset($institute->image) }}" width="120" alt=""></td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['institutes.destroy', $institute->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('institutes.show', [$institute->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('institutes.edit', [$institute->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'onclick' => "return confirm('Are you sure?')",
                                ]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $institutes])
        </div>
    </div>
</div>
