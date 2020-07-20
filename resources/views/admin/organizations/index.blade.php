@extends('layouts.admin')

@section('title', 'organizations')

@section('content')
    <div class="card card-custom pt-5 mb-10">
        <div class="card-body p-0">
            <div class="wizard wizard-2">
                <div class="wizard-body py-8 px-8">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

                <div style="float:right" class="mb-5">
                    <a class="btn btn-success" href="{{ route('organizations.create') }}"> Create New organization</a>
                </div>

            <?php
                if(count($organizations) > 0){
                $i = 0;
            ?>
             <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($organizations as $organization)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $organization->name }}</td>
                                <td>{{ $organization->phone }}</td>
                                <td>
                                    <form action="{{ route('organizations.destroy',$organization->phone) }}" method="POST">

                                        <a class="btn btn-info" href="{{ route('organizations.show',$organization->phone) }}">Show</a>

                                        <a class="btn btn-primary" href="{{ route('organizations.edit',$organization->phone) }}">Edit</a>

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {!! $organizations->links() !!}
            <?php } else{
                    echo "
<h3>No organizations yet !</h3>
";
                } ?>
                </div>
            </div>
        </div>
    </div>

@endsection
