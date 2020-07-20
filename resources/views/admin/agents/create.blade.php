@extends('layouts.admin')

@section('title', 'Add agent')

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
                                <form method="post" action="{{ route('agents.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="text" class="form-control" name="password"/>
                                    </div>

                                    <div class="form-group fv-plugins-icon-container">
                                        <label>Display Picture</label>
                                        <br>

                                        <input type="file" class="form-control form-control-solid form-control-lg" name="display_picture" placeholder="Header web image" value="">
                                        <div class="fv-plugins-message-container"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="job_title">Role</label>
                                        <select name="role" class="form-control">
                                            <?php foreach($roles as $key=>$role){ ?>
                                                <option><?php echo $role->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="mr-2"></div>
                                        <div>
                                            <button class="btn btn-success font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-submit">Submit</button>
                                            <button class="btn btn-primary font-weight-bold text-uppercase px-9 py-4" type="reset" >Reset</button>
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
