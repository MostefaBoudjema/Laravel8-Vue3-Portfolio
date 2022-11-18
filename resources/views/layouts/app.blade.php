@include('partials.style')

<body>
    <div id="app">
        <app />
    </div>
    {{-- @include('partials.footer') --}}
    <!-- Scripts -->
    @yield('javascripts')

    <script src="{{ asset('/assets/js/app.js') }}"></script>
</body>

</html>
