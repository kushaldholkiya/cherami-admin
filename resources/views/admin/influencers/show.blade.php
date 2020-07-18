@extends('layouts.admin')

@section('title', 'Influencers')

@section('content')
    <div class="card card-custom pt-5 mb-10">
        <div class="card-body p-0">
            <div class="wizard wizard-2">
                <div class="wizard-body py-8 px-8">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ $influencer->name }}</td>
                            </tr>

                            <tr>
                                <th>Phone</th>
                                <td>{{ $influencer->phone }}</td>
                            </tr>

                            <tr>
                                <th>Display Name</th>
                                <td>{{ $influencer->display_name }}</td>
                            </tr>

                            <tr>
                                <th>Display Picture</th>
                                <td><img src="{{ $influencer->display_picture }}" height="300" width="300" /></td>
                            </tr>


                            <tr>
                                <th>Status</th>
                                <td><?php if($influencer->status){ echo "Active"; }else{ echo "Inactive"; }?></td>
                            </tr>


                            <tr>
                                <th>User</th>
                                <td>{{$user->name}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
