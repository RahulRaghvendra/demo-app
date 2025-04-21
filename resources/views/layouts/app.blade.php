<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="{{asset('public/assets')}}/css/bootstrap.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('public/assets')}}/css/bootstrap.min.css">
    <!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    @stack('css_or_js')
</head>
<body class="bg-gradient-primary">

   @include('layouts._header')
   <div class="container-fluid"style="min-height:85vh;">
    <main class="col-md-12 col-lg-12">
    <!-- Page Content-->
@yield('content')
</main>
</div>
@include('layouts._footer')
    
     <!-- jQuery JS -->
     <!-- jQuery (required by DataTables) -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<!-- DataTables JS -->
<script src="{{asset('public/assets')}}/js/vendor/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

   
     <script src="{{asset('public/assets')}}/js/font-awesome.min.js"></script>

   
     <script src="{{asset('public/assets')}}/js/bootstrap.bundle.min.js"></script>
     @include('success')
    @stack('scripts')
 
</body>
</html>