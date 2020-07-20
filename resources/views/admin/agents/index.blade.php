@extends('layouts.admin')

@section('title', 'agents')

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
                    <a class="btn btn-success" href="{{ route('agents.create') }}"> Create New agent</a>
                </div>

            <?php
                if(count($agents) > 0){
                $i = 0;
            ?>
             <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agents as $agent)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $agent->name }}</td>
                                <td>{{ $agent->email }}</td>
                                <td>
                                    <form action="{{ route('agents.destroy',$agent->id) }}" method="POST">

                                        <a class="btn btn-info" href="{{ route('agents.show',$agent->id) }}">Show</a>

                                        <a class="btn btn-primary" href="{{ route('agents.edit',$agent->id) }}">Edit</a>

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {!! $agents->links() !!}
            <?php } else{
                    echo "
<h3>No agents yet !</h3>
";
                } ?>
                </div>
            </div>
        </div>
    </div>

@endsection
