@extends('include.layout')

@section('javascripts')
    <script>

        function add(map) {
            /* ADD A MARKER ON CLICK IN MAP AND ALSO SAVE TO DATABASE */
            google.maps.event.addListener(map, 'click', function (event) {
                var lat = (event.latLng).lat(), lng = (event.latLng).lng();
                $('#lat').val(lat); $('#lng').val(lng);
                /*$.ajax({
                    method: "POST",
                    url: "{{url('add')}}",
                    data: {"_token": "{{csrf_token()}}", "lat": lat, "lng": lng},
                    success: function (data) {
                        if (data.added) {
                            marker = new google.maps.Marker({
                                position: event.latLng,
                                map: map
                            });
                        }
                    },
                    error: function (data) {
                        alert('Error');
                    }
                });*/
            });

            google.maps.event.addDomListener(document.getElementById('test-button'), 'click', function () {
                map.setOptions({center: {lat: 27, lng: 112}, zoom: 15});
            });
        }

    </script>
@endsection