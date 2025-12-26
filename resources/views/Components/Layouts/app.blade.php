<!DOCTYPE html>
<html lang="id">
<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8">
    <title>SEKOLAH AMAN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('Components.Layouts.style')
</head>

<body>

    @include('Components.Layouts.navbar')

    <div class="content-wrapper">
        @yield('content')
    </div>
    
    @include('Components.Layouts.back_to_top')
    @include('Components.Layouts.footer')

    @include('LandingPage.chat')

    @include('Components.Layouts.script')
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    
</body>
</html>
