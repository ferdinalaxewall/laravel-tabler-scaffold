<script>
    iziToast.settings({
        timeout: 3500,
        position: "topCenter",
        pauseOnHover: false,
        transitionIn: "bounceInDown",
        transitionOut: "fadeOutUp",
        transitionInMobile: "bounceInDown",
        transitionOutMobile: "fadeOutUp",
    });
</script>

@if(session('toastSuccess'))
    <script>
        iziToast.success({
            title: 'Success',
            message : '{{ session('toastSuccess') }}',
        });
    </script>
@elseif(session('toastError'))
    <script>
        iziToast.error({
            title: 'Failed',
            message : '{{ session('toastError') }}',
        });
    </script>
@elseif(session('toastInfo'))
    <script>
        iziToast.info({
            title: 'Info'
            message : '{{ session('toastInfo') }}',
        });
    </script>
@elseif(session('toastWarning'))
    <script>
        iziToast.warning({
            title: 'Caution'
            message : '{{ session('toastWarning') }}',
        });
    </script>
@endif
