<script src="{{ asset('public/assets/js/swal.js') }}"></script>
<script>
const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    }
});
</script>
<div class="col-12">
    @if ($message = Session::get('success'))
    <script>
    Toast.fire({
        icon: "success",
        title: "{{$message}}"
    });
    </script>
    @endif

    @if ($message = Session::get('error'))
    <script>
    Toast.fire({
        icon: "error",
        title: "{{$message}}"
    });
    </script>
    @endif

    @if ($message = Session::get('warning'))
    <script>
    Toast.fire({
        icon: "warning",
        title: "{{$message}}"
    });
    </script>
    @endif

    @if ($message = Session::get('info'))
    <script>
    Toast.fire({
        icon: "info",
        title: "{{$message}}"
    });
    </script>
    @endif

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <script>
    Toast.fire({
        icon: "error",
        title: "{{$error}}"
    });
    </script>
    @endforeach



    @endif
</div>