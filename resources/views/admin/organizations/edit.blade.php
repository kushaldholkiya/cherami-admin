@extends('layouts.admin')

@section('title', 'Edit organization')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="card card-custom">
        <div class="card-body p-0">
            <!--begin: Wizard-->
            <div class="wizard wizard-2">
                <!--begin: Wizard Body-->
                <div class="wizard-body py-8 px-8">
                    <!--begin: Wizard Form-->
                    <div class="row">
                        <div class="col-xxl-12">
                            <div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div><br />
                                @endif
                                <form method="post" action="{{ route('organizations.update', $organization->phone) }}" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $organization->name }}"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{ $organization->phone }}"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="api_key">Api Key</label>
                                        <input type="text" class="form-control" name="api_key" value="{{ $organization->api_key }}"/>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <div class="mr-2"></div>
                                        <div>
                                            <button class="btn btn-success font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--end: Wizard-->
                    </div>
                </div>
                <!--end: Wizard Body-->
            </div>
            <!--end: Wizard-->
        </div>
    </div>
@endsection
