<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="Newaz Sharif">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"
        integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/front/template/css/') }}/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/front/template/css/') }}/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('assets/front/template/css/') }}/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('assets/front/template/css/') }}/style.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('assets/exzoom/') }}/jquery.exzoom.css">
    @stack('css')

</head>

<body>
    <!-- top bar -->
    @include('front.layouts.top_bar')
    <!-- top bar end-->
    <!-- header section -->
    @include('front.layouts.header')
    <!--- header section end--->

    <!---floating side cart section--->
    {{-- @include('front.layouts.floating_sidebar') --}}
    <!--- floating side cart section end --->

    <!--- navbar section --->
    @include('front.layouts.navbar')
    <!-- slider section  -->
    <main>
        @yield('content')
    </main>

    <!-- footer section -->
    @include('front.layouts.footer')
    <!-- footer section end-->
    <div class="whatsapp_icon">
        <a href="https://wa.me/+8801743640467?text=I'm%20interested%20in%20your%20car%20for%20sale" target="_blank" style="color: rgb(193, 193, 193)"><img src="{{ asset('assets/whatsapp-logo.png') }}" alt="Whatsapp Logo" width="70" height="70"><small>Click to Chat</small> </a>
    </div>



    <script src="{{ asset('assets/front/template/js') }}/jquery.min.js"></script>
    <script src="{{ asset('assets/front/template/js') }}/popper.min.js"></script>
    <script src="{{ asset('assets/front/template/js') }}/bootstrap.min.js"></script>
    <script src="{{ asset('assets/front/template/js') }}/owl.carousel.min.js"></script>
    <script src="{{ asset('assets/front/template/js') }}/custom.js"></script>
    <script src="{{ asset('assets/front/template/js') }}/main.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('assets/exzoom/') }}/jquery.exzoom.js"></script>
    {!! Toastr::message() !!}

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/62dadd4754f06e12d88adbad/1g8jf0ohn';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

    @stack('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    </script>
</body>

</html>
