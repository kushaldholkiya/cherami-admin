@extends('layouts.admin')

@section('title', 'Influencers')

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
                    <a class="btn btn-success" href="{{ route('influencers.create') }}"> Create New influencer</a>
                </div>

            <?php
                if(count($influencers) > 0){
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
                        @foreach ($influencers as $influencer)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $influencer->name }}</td>
                                <td>{{ $influencer->phone }}</td>
                                <td>
                                    <form action="{{ route('influencers.destroy',$influencer->id) }}" method="POST">

                                        <a class="btn btn-info" href="{{ route('influencers.show',$influencer->id) }}">Show</a>

                                        <a class="btn btn-primary" href="{{ route('influencers.edit',$influencer->id) }}">Edit</a>

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            <?php } else{
                    echo "
<h3>No influencers yet !</h3>
";
                } ?>
                </div>
            </div>
        </div>
    </div>

@endsection
