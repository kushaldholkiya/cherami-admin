@extends('layouts.admin')

@section('title', 'organizations')

@section('content')
    <div class="card card-custom pt-5 mb-10">
        <div class="card-body p-0">
            <div class="wizard wizard-2">
                <div class="wizard-body py-8 px-8">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ $organization->name }}</td>
                            </tr>

                            <tr>
                                <th>Phone</th>
                                <td>{{ $organization->phone }}</td>
                            </tr>

                            <tr>
                                <th>Api Key</th>
                                <td>{{ $organization->api_key }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
