@extends('layouts.admin')

@section('title', 'Agent')

@section('content')
    <div class="card card-custom pt-5 mb-10">
        <div class="card-body p-0">
            <div class="wizard wizard-2">
                <div class="wizard-body py-8 px-8">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ $agent->name }}</td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td>{{ $agent->email }}</td>
                            </tr>

                            <tr>
                                <th>Role</th>
                                <td>{{ $agent->role }}</td>
                            </tr>

                            <tr>
                                <th>Display Picture</th>
                                <td><img src="{{ $agent->display_picture }}" height="300" width="300" /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
