jQuery(document).ready(function ($) {
    "use strict";
    /**
     * onload event.
     *
     * Bind an event handler to the "navigate".
     */
    window.onload = function() {
        setTimeout(function(){ spchatityplus_countdown(); }, 1000);
    }
    /* Custom Map for Single Event */
    google.maps.event.addDomListener(window, 'load', zkEventMap);
    function zkEventMap() {
        var map = new google.maps.Map(document.getElementById('zkEventMap'), {
            zoom: 16,
            scrollwheel: false,
            scaleControl: false,
            draggable: true,
            center: {lat: -34.397, lng: 150.644},
            styles: [{"stylers":[{"hue":"#ff1a00"},{"invert_lightness":true},{"saturation":-100},{"lightness":33},{"gamma":0.5}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2D333C"}]}]
        });
        var geocoder = new google.maps.Geocoder();
        var address = jQuery(document).find('.event-meta span.map-add').html();
        geocodeAddress(address, geocoder, map);
    }
    function geocodeAddress(address, geocoder, resultsMap) {
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              icon: CMSOptions.map_marker,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
    }
    /* CMS Countdown. */
    var _e_countdown = [];
    function spchatityplus_countdown(){
        "use strict";
        $('.cms-countdown').each(function () {
            var event_date = $(this).find('.cms-countdown-bar');
            var data_count = event_date.data('count');
            var server_offset = event_date.data('timezone');
            /* get local time zone */
            var offset = (new Date()).getTimezoneOffset();
            offset = (- offset / 60) - server_offset;
            
            if(data_count != undefined){
                var data_label = event_date.attr('data-label');
                
                if(data_label != undefined && data_label != ''){
                    data_label = data_label.split(',')
                } else {
                    data_label = ['DAYS','HOURS','MINUTES','SECONDS'];
                }
                data_count = data_count.split(',')
                var austDay = new Date(data_count[0],parseInt(data_count[1]) - 1,data_count[2],parseInt(data_count[3]) + offset,data_count[4],data_count[5]);
                _e_countdown.push(event_date.countdown({
                    until: austDay,
                    layout:'<div class="cms-count-day"><span class="h5">'+data_label[0]+'</span><div class="cms-count h3">{dn}</div></div><div class="cms-count-hours"><span class="h5">'+data_label[1]+'</span><div class="cms-count h3">{hn}</div></div><div class="cms-count-minutes"><span class="h5">'+data_label[2]+'</span><div class="cms-count h3">{mn}</div></div><div class="cms-count-second"><span class="h5">'+data_label[3]+'</span><div class="cms-count h3">{sn}</div></div>'
                }));
            }
        });
    }
});
/* Ajax Complete */
jQuery(document).ajaxComplete(function(event, xhr, settings){
    /* Count Down */    
    $.each(_e_countdown, function(__index, __e) {
        __e.countdown('destroy');
    });
    spchatityplus_countdown();
});