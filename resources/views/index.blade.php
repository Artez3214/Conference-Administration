@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Conferences</h2>
            </div>
            @auth
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('conferences.post') }}"> Create New Conference</a>
            </div>
            @endauth
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>header</th>
            <th>description</th>
            <th>date</th>
            <th width="280px">address</th>
        </tr>
        @foreach ($conferences as $conference)
            <tr>
                <td>{{ $conference->id }}</td>
                <td>{{ $conference->header }}</td>
                <td>{{ $conference->description }}</td>
                <td>{{ $conference->date }}</td>
                <td>{{ $conference->address }}</td>
                <td>
                </td>
            </tr>
        @endforeach

    </table>
    {{ $conferences->links() }}


@endsection
