@extends('front.layouts.app')

@section('title', 'Thank You')

@push('css')

@endpush

@section('content')
<div class="jumbotron text-center py-5">
    <h1 class="display-3 pb-1">Thank You!</h1>
    <p class="lead"><strong>Your order has been received.</strong> We'll contact you shortly.</p>
    <hr>
    {{-- <p>
      Having trouble? <a href="">Contact us</a>
    </p> --}}
    <p class="lead pt-3">
      <a class="btn btn-primary btn-sm" href="{{ route('front') }}" role="button">Continue to homepage</a>
    </p>
  </div>


@endsection


@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
</script>
@endpush
