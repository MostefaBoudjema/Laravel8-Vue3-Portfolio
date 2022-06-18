@include('partials/style')
<body>
    <div id="app">
        @include('partials.menu')
       <div class="container">
           <div class="row">
               <div class="col-md-8 col-md-offset-2">
                   @include('partials.flash')
               </div>
           </div>
       </div>
        @yield('content')
    </div>
    {{-- @include('partials.footer') --}}
    <!-- Scripts -->
    @yield('javascripts')

    <script src="{{ asset('/assets/js/app.js') }}"></script>   
    {{-- <script src="/assets/js/app.js"></script> --}}
</body>
</html>
