<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
<meta name="csrf-token" content="{{csrf_token() }}" >
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <title>@yield('title')</title>
  {{-- <link rel="icon" type="image/png" href="{{asset('frontend/images/favicon.png')}}"> --}}
  <link rel="stylesheet" href="{{asset('backend/assets/modules/summernote/summernote-bs4.css')}}">

  <link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}">

  <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/jquery.nice-number.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/jquery.calendar.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/add_row_custon.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/mobile_menu.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/jquery.exzoom.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/multiple-image-video.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/ranger_style.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/jquery.classycountdown.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/venobox.min.css')}}">
    {{-- datatable --}}
  <link rel="stylesheet" href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

  <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">


  <!-- <link rel="stylesheet" href="css/rtl.css"> -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <script>
    const USER = {
        id: "{{auth()->user()->id}}",
        name: "{{auth()->user()->name}}",
        image: "{{asset(auth()->user()->image)}}"
    };
    const PUSHER = {
        key: "{{$pusherSetting->pusher_key}}",
        cluster: "{{$pusherSetting->pusher_cluster}}"
    };

  </script>
  @vite(['resources/js/app.js', 'resources/js/frontend.js'])
</head>
<style>
    .box-shadow {
        box-shadow: inset 0 0 0 9999px rgb(184 221 196 / 90%) !important;
    }
</style>

<body style="background-color: #EFE8E6;">


  <!--=============================
    DASHBOARD MENU START
  ==============================-->
  <div class="wsus__dashboard_menu" style="background-color: #4E784F;">
    <div class="wsusd__dashboard_user">
      <img src="{{Auth::user()->image ? asset(Auth::user()->image) : asset('frontend/images/ts-2.jpg')}}" alt="img" class="img-fluid">
      <p>{{Auth::user()->name}}</p>
    </div>
  </div>
  <!--=============================
    DASHBOARD MENU END
  ==============================-->


  <!--=============================
    DASHBOARD START
  ==============================-->
  @yield('content')
  <!--=============================
    DASHBOARD START
  ==============================-->


  <!--============================
      SCROLL BUTTON START
    ==============================-->
  <div class="wsus__scroll_btn">
    <i class="fas fa-chevron-up"></i>
  </div>
  <!--============================
    SCROLL BUTTON  END
  ==============================-->


  <!--jquery library js-->
  <script src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
  <!--bootstrap js-->
  <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
  <!--font-awesome js-->
  <script src="{{asset('frontend/js/Font-Awesome.js')}}"></script>
  <!--select2 js-->
  <script src="{{asset('frontend/js/select2.min.js')}}"></script>
  <!--slick slider js-->
  <script src="{{asset('frontend/js/slick.min.js')}}"></script>
  <!--simplyCountdown js-->
  <script src="{{asset('frontend/js/simplyCountdown.js')}}"></script>
  <!--product zoomer js-->
  <script src="{{asset('frontend/js/jquery.exzoom.js')}}"></script>
  <!--nice-number js-->
  <script src="{{asset('frontend/js/jquery.nice-number.min.js')}}"></script>
  <!--counter js-->
  <script src="{{asset('frontend/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.countup.min.js')}}"></script>
  <!--add row js-->
  <script src="{{asset('frontend/js/add_row_custon.js')}}"></script>
  <!--multiple-image-video js-->
  <script src="{{asset('frontend/js/multiple-image-video.js')}}"></script>
  <!--sticky sidebar js-->
  <script src="{{asset('frontend/js/sticky_sidebar.js')}}"></script>
  <!--price ranger js-->
  <script src="{{asset('frontend/js/ranger_jquery-ui.min.js')}}"></script>
  <script src="{{asset('frontend/js/ranger_slider.js')}}"></script>
  <!--isotope js-->
  <script src="{{asset('frontend/js/isotope.pkgd.min.js')}}"></script>
  <!--venobox js-->
  <script src="{{asset('frontend/js/venobox.min.js')}}"></script>
  <!--classycountdown js-->
  <script src="{{asset('frontend/js/jquery.classycountdown.js')}}"></script>

  <!--main/custom js-->
  <script src="{{asset('frontend/js/main.js')}}"></script>
  <script src="{{asset('backend/assets/modules/summernote/summernote-bs4.js')}}"></script>

  {{-- sweet alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  {{-- toastr --}}
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  {{-- datatable --}}

  <script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
  <script>
    @if ($errors->any())
        @foreach ($errors->all() as $error )
            toastr.error("{{$error}}")
        @endforeach
    @endif
</script>


{{-- end toastr --}}

<script>
    $('.summernote').summernote({
        height:200
    })
</script>

<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $('body').on('click', '.delete-item', function(event){
            event.preventDefault();

            let deleteUrl = $(this).attr('href');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                if (result.isConfirmed) {
                    // route for delete using ajax

                    $.ajax({
                        type: 'DELETE',
                        url: deleteUrl,

                        success: function(data){

                            if(data.status == 'success'){
                            Swal.fire(
                                'DELETED',
                                data.message
                            )
                                window.location.reload();
                            }else if (data.status == 'error'){
                                Swal.fire(
                                'Cannot Delete',
                                data.message
                            )
                            }

                        },
                        error: function(xhr, status, error){
                            console.log(error);
                        }

                    })






            }
});
        })
    })

</script>
@stack('scripts')
</body>

</html>
