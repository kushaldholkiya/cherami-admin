@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <h1>We are in dashboard</h1>

@endsection


{{--Example for attaching css and js page by page like below --}}

{{-- Styles Section --}}
@section('styles')
    {{--    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />--}}
@endsection

{{-- Scripts Section --}}
@section('scripts')
    {{--    <script src="{{ asset('js/pages/crud/ktdatatable/base/html-table.js') }}" type="text/javascript"></script>--}}

    {{--<script>--}}
    {{--    $(document).ready(function() {--}}
    {{--        $('.select2').select2();--}}
    {{--    });--}}
    {{--</script>--}}
@endsection
