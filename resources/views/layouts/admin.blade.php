<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }} {{ Metronic::printClasses('html') }}>
<head>
    <meta charset="utf-8"/>

    {{-- Title Section --}}
    <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>

    {{-- Meta Data --}}
    <meta name="description" content="@yield('page_description', $page_description ?? '')"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />

    {{-- Fonts --}}
    {{ Metronic::getGoogleFontsInclude() }}

    {{-- Global Theme Styles (used by all pages) --}}
    @foreach(config('layout.resources.css') as $style)
        <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style) }}" rel="stylesheet" type="text/css"/>
    @endforeach

    {{-- Layout Themes (used by all pages) --}}
    @foreach (Metronic::initThemes() as $theme)
        <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($theme)) : asset($theme) }}" rel="stylesheet" type="text/css"/>
    @endforeach

    {{-- Includable CSS --}}
    @yield('styles')
    <style>
        .custom-dropdown{
            width : 150px;
            margin-top : -6%;
            margin-bottom: 2%;
            float : right;
        }
        .has-error{
            border-color: #ea2723 !important;
        }
        .errorClass{
            color: #ea2723 !important;
        }
    </style>
</head>

<body id="test" {{ Metronic::printAttrs('body') }} {{ Metronic::printClasses('body') }}>

@if (config('layout.page-loader.type') != '')
    @include('layouts.partials._page-loader')
@endif

@include('layouts.base._layout')

<script>var HOST_URL = "{{ route('quick-search') }}";</script>

{{-- Global Config (global config for global JS scripts) --}}
<script>
    var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) !!};
</script>

{{-- Global Theme JS Bundle (used by all pages)  --}}
@foreach(config('layout.resources.js') as $script)
    <script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach

{{-- Includable JS --}}
@yield('scripts')

<script>
    $( "textarea" ).each(function( index ) {
        var dir = $(this).attr("dir");
        if(dir == "rtl"){
            $(this).parent().css('direction','rtl');
        }
    });
    var KTSummernoteDemo = function () {
        // Private functions
        var demos = function () {
            $(' textarea ').summernote({
                toolbar: [
                    ['style', ['style']],
                    ['fontsize', ['fontsize']],
                    ['font', ['bold','italic','underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['insert', ['link']],
                ],
                height: 150
            });
        };

        return {
            // public functions
            init: function() {
                demos();
            }
        };
    }();

    // Initialization
    jQuery(document).ready(function() {
        KTSummernoteDemo.init();
        {{--@if(\Illuminate\Support\Facades\Auth::user()->hasRole('viewer'))
            $("input").prop("disabled", true);
            $("a").attr("disabled", "disabled");
            $("button").attr("disabled", "disabled");
            $("select").attr("disabled", "disabled");
            $(".note-editable").attr("contenteditable","false");
        @endif--}}
    });
</script>

</body>
</html>

