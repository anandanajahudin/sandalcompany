<div id="slider" class="owl-carousel owl-theme">
    <div>
        <img class="img w-100 h-50" src="{{ asset('front/dist/images/slider/slider1.jpg') }}">
    </div>
    <div>
        <img class="img w-100 h-50" src="{{ asset('front/dist/images/slider/slider2.jpg') }}">
    </div>
    <div>
        <img class="img w-100 h-50" src="{{ asset('front/dist/images/slider/slider3.jpg') }}">
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {

            var owl = $('.owl-carousel');
            owl.owlCarousel({
                items: 1,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 8000,
                autoplayHoverPause: true
            });
            $('.play').on('click', function() {
                owl.trigger('play.owl.autoplay', [1000])
            })
            $('.stop').on('click', function() {
                owl.trigger('stop.owl.autoplay')
            })
        });
    </script>
@endpush
