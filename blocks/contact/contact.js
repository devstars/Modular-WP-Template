(function ($) {

    class ContactForm {
        constructor(form) {

            try {
                this.form = document.querySelector(form);
                this.events();
            } catch (err) {
                console.log(err.message);
            }
        }

        events() {

            $(this.form).find(".field-js").on("keyup", function () {
                var filled = false;

                $(this.form).find(".field-js").each(
                    function () {
                        if ($(this).val().length > 0) {
                            filled = true;
                        }
                    }
                );

                if (filled) {
                    $(".fade-in-js").fadeIn();
                } else {
                    $(".fade-in-js").fadeOut();
                }
            });


            this.form.addEventListener("submit", (e) => {
                e.preventDefault();

                const form = $(this.form);
                const rcId = form.find(".recaptcha-js").attr("id");
                const action = form.attr("send");
                const title = form.attr("title");

                $.ajax({
                    type: 'POST',
                    url: ajaxUrl,
                    dataType: 'html',
                    data: form.serialize() + '&action=' + action + '&title=' + title,
                    success: function (resp) {

                        if (resp === 'ok') {
                            form.find(".form__thanks").addClass("active");

                            form.find('input').val('');
                            form.find('textarea').val('');
                            form.find(".privacy-policy-js").prop('checked', false);
                            form.parent().find('.form__error').removeClass("active");

                            //form.find(".hide-after-js").hide();
                        } else {
                            form.parent().find('.form__error').html(resp).addClass("active");
                            form.parent().find('.form__thanks').removeClass("active");
                        }
                    },
                    error: function () {
                        form.parent().find('.form__error').html("There was an error trying to send your message. Please try again later.").addClass("active");
                        form.parent().find('.form__error').addClass("active");
                        form.parent().find('.form__thanks').removeClass("active");
                    }
                }).always(function () {
                    grecaptcha.reset(window.rcArr[rcId]);
                })

            });

        }

    }

    const cf = new ContactForm("#contact-form");

    class Map {
        constructor() {

            this.map = false;
            this.view = document.querySelector("#googleMap");
            if (!this.view) {
                return;
            }

            this.zoom = 16;

            this.markers = [];
            this.location = [];

            this.location.lat = parseFloat(latLng.lat);
            this.location.lng = parseFloat(latLng.lng);

        }

        addMarker() {

            var marker = new google.maps.Marker({
                position: {
                    lat: this.location.lat,
                    lng: this.location.lng
                },
                icon: {
                    url: themeUri + '/images/icons/marker.svg',
                    //scaledSize: new google.maps.Size(50, 50),
                }
            });

            marker.setMap(this.map);

            this.markers.push(marker);
        }

        removeMarkers() {
            for (let i = 0; i < this.markers.length; i++) {
                this.markers[i].setMap(null);
            }
        }

        init() {
            this.map = new google.maps.Map(this.view, {
                zoom: this.zoom,
                zoomControl: true,
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: false,
                rotateControl: false,
                fullscreenControl: false,

                styles: [{
                    "featureType": "all",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "saturation": 36
                    }, {
                        "color": "#333333"
                    }, {
                        "lightness": 40
                    }]
                }, {
                    "featureType": "all",
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "visibility": "on"
                    }, {
                        "color": "#ffffff"
                    }, {
                        "lightness": 16
                    }]
                }, {
                    "featureType": "all",
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }, {
                    "featureType": "administrative",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#fefefe"
                    }, {
                        "lightness": 20
                    }]
                }, {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "color": "#fefefe"
                    }, {
                        "lightness": 17
                    }, {
                        "weight": 1.2
                    }]
                }, {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#f5f5f5"
                    }, {
                        "lightness": 20
                    }]
                }, {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#f5f5f5"
                    }, {
                        "lightness": 21
                    }]
                }, {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#c3e7b4"
                    }, {
                        "lightness": 21
                    }]
                }, {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#ffffff"
                    }, {
                        "lightness": 17
                    }]
                }, {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "color": "#ffffff"
                    }, {
                        "lightness": 29
                    }, {
                        "weight": 0.2
                    }]
                }, {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#ffffff"
                    }, {
                        "lightness": 18
                    }]
                }, {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#ffffff"
                    }, {
                        "lightness": 16
                    }]
                }, {
                    "featureType": "transit",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#f2f2f2"
                    }, {
                        "lightness": 19
                    }]
                }, {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#e9e9e9"
                    }, {
                        "lightness": 17
                    }]
                }]
            });

            this.map.setCenter(this.location);

            google.maps.event.addListenerOnce(this.map, 'tilesloaded', function () {

                if ($(".details-right-js").length === 0) {
                    return;
                }                

                const bounds = this.getBounds();
                const ne = bounds.getNorthEast();
                const sw = bounds.getSouthWest();

                let distance = 0.3;

                if ($(window).width() > 1200) {
                    distance = 0.4;
                } else if ($(window).width() > 992) {
                    distance = 0.25;
                }

                const newLat = sw.lat() + (distance * (ne.lat() - sw.lat()));

                const newLng = (ne.lng() + sw.lng()) / 2;

                const newCenter = new google.maps.LatLng(newLat, newLng);
                this.setCenter(newCenter);

            });

            this.addMarker();

        }
    }

    window.map = new Map();

}(jQuery));