<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gondal Travel</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('images/favicon.png')}}">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/line-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animated-headline.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link data-chunk="main" rel="stylesheet" href="{{asset('css/main.b12533ae.chunk.css')}}">
    <link data-chunk="DayViewShim" rel="stylesheet" href="{{asset('css/0.648adf95.chunk.css')}}">
    <link data-chunk="DayViewShim" rel="stylesheet" href="{{asset('css/1.4b4caba4.chunk.css')}}">
    <link data-chunk="DayViewShim" rel="stylesheet" href="{{asset('css/DayViewShim.fb6db324.chunk.css')}}">

</head>

<body>

    <!-- end cssload-loader -->
    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    <!-- Template JS Files -->
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>

    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('js/moment.min.js')}}"></script>
    <script src="{{asset('js/daterangepicker.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('js/jquery.countTo.min.js')}}"></script>
    <script src="{{asset('js/animated-headline.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('js/jquery.ripples-min.js')}}"></script>
    <script src="{{asset('js/quantity-input.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <!-- <script src="{{asset('js/airports.js')}}"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.16.1/lodash.min.js"></script>
    <script src="https://unpkg.com/fuse.js@2.5.0/src/fuse.min.js"></script>
    <script src="{{  asset('js/airports.js') }}"></script>

    @yield('scripts')

    <script>
        $(function() {
            $("#service_charges").keyup(function() {
                var currentPrice = parseFloat($("#hidden_grand_total").text());
                var service_charges = parseFloat($("#service_charges").val());

                if (service_charges > 0) {
                    var newPrice = parseFloat(service_charges - currentPrice);
                    $("#margin_total").text("€" + newPrice.toFixed(2));
                } else if (service_charges < 1) {
                    var newPrice = parseFloat(currentPrice + service_charges);
                    $("#margin_total").text("€" + newPrice.toFixed(2));
                }

            });
        });

        $(function() {
            $('#slider-container').slider({
                range: true,
                min: 299,
                max: 1099,
                values: [299, 1099],
                create: function() {
                    $("#amount").val("$299 - $1099");
                },
                slide: function(event, ui) {
                    $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                    var mi = ui.values[0];
                    var mx = ui.values[1];
                    filterSystem(mi, mx);
                }
            });

            function filterSystem(minPrice, maxPrice) {
                $("#computers div.system").hide().filter(function() {
                    var price = parseInt($(this).data("price"), 10);
                    return price >= minPrice && price <= maxPrice;
                }).show();
            }

            autocompletefrom();
            autocompleteTo();
            autocompletetoround()
            autocompletefromround();

            $('input[type="radio"]').click(function() {
                if ($(this).attr("value") == "cash") {
                    $("#payment-card").hide();
                }
                if ($(this).attr("value") == "card") {
                    $("#payment-card").show();
                }
            });
            $('input[type="radio"]').trigger('click'); // trigger the event
        });

        function valueChanged() {
            if ($('.').is(":checked"))
                $(".answer").show();
            else
                $(".answer").hide();
        }

        function autocompletefrom() {
            var options = {
                shouldSort: true,
                threshold: 0.4,
                maxPatternLength: 32,
                keys: [{
                    name: 'iata',
                    weight: 1
                }, {
                    name: 'name',
                    weight: 1
                }, {
                    name: 'city',
                    weight: 1
                }]
            };

            var fuse = new Fuse(airports, options);

            var ac = $('#autocomplete')
                .on('click', function(e) {
                    e.stopPropagation();
                })
                .on('focus keyup', search)
                .on('keydown', onKeyDown);

            var wrap = $('<div>')
                .addClass('autocomplete-wrapper')
                .insertBefore(ac)
                .append(ac);

            var list = $('<div>')
                .addClass('autocomplete-results')
                .on('click', '.autocomplete-result', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    selectIndex($(this).data('index'));
                })
                .appendTo(wrap);

            $(document).on('mouseover', '.autocomplete-result', function(e) {
                    var index = parseInt($(this).data('index'), 10);
                    if (!isNaN(index)) {
                        list.attr('data-highlight', index);
                    }
                })
                .on('click', clearResults);

            function clearResults() {
                results = [];
                numResults = 0;
                list.empty();
            }

            function selectIndex(index) {
                if (results.length >= index + 1) {
                    ac.val(results[index].iata);
                    clearResults();
                }
            }

            var results = [];
            var numResults = 0;
            var selectedIndex = -1;

            function search(e) {
                if (e.which === 38 || e.which === 13 || e.which === 40) {
                    return;
                }

                if (ac.val().length > 0) {
                    results = _.take(fuse.search(ac.val()), 7);
                    numResults = results.length;

                    var divs = results.map(function(r, i) {
                        return '<div class="autocomplete-result" data-index="' + i + '">' +
                            '<div><b>' + r.iata + '</b> - ' + r.name + '</div>' +
                            '<div class="autocomplete-location">' + r.city + ', ' + r.country + '</div>' +
                            '</div>';
                    });

                    selectedIndex = -1;
                    list.html(divs.join(''))
                        .attr('data-highlight', selectedIndex);

                } else {
                    numResults = 0;
                    list.empty();
                }
            }

            function onKeyDown(e) {
                switch (e.which) {
                    case 38: // up
                        selectedIndex--;
                        if (selectedIndex <= -1) {
                            selectedIndex = -1;
                        }
                        list.attr('data-highlight', selectedIndex);
                        break;
                    case 13: // enter
                        selectIndex(selectedIndex);
                        break;
                    case 9: // enter
                        selectIndex(selectedIndex);
                        e.stopPropagation();
                        return;
                    case 40: // down
                        selectedIndex++;
                        if (selectedIndex >= numResults) {
                            selectedIndex = numResults - 1;
                        }
                        list.attr('data-highlight', selectedIndex);
                        break;

                    default:
                        return; // exit this handler for other keys
                }
                e.stopPropagation();
                e.preventDefault(); // prevent the default action (scroll / move caret)
            }
        }

        function autocompleteTo() {
            var options = {
                shouldSort: true,
                threshold: 0.4,
                maxPatternLength: 32,
                keys: [{
                    name: 'iata',
                    weight: 0.5
                }, {
                    name: 'name',
                    weight: 0.3
                }, {
                    name: 'city',
                    weight: 0.2
                }]
            };

            var fuse = new Fuse(airports, options);


            var ac = $('#autocompleteto')
                .on('click', function(e) {
                    e.stopPropagation();
                })
                .on('focus keyup', search)
                .on('keydown', onKeyDown);

            var wrap = $('<div>')
                .addClass('autocomplete-wrapper')
                .insertBefore(ac)
                .append(ac);

            var list = $('<div>')
                .addClass('autocomplete-results')
                .on('click', '.autocomplete-result', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    selectIndex($(this).data('index'));
                })
                .appendTo(wrap);

            $(document)
                .on('mouseover', '.autocomplete-result', function(e) {
                    var index = parseInt($(this).data('index'), 10);
                    if (!isNaN(index)) {
                        list.attr('data-highlight', index);
                    }
                })
                .on('click', clearResults);

            function clearResults() {
                results = [];
                numResults = 0;
                list.empty();
            }

            function selectIndex(index) {
                if (results.length >= index + 1) {
                    ac.val(results[index].iata);
                    clearResults();
                }
            }

            var results = [];
            var numResults = 0;
            var selectedIndex = -1;

            function search(e) {
                if (e.which === 38 || e.which === 13 || e.which === 40) {
                    return;
                }

                if (ac.val().length > 0) {
                    results = _.take(fuse.search(ac.val()), 7);
                    numResults = results.length;

                    var divs = results.map(function(r, i) {
                        return '<div class="autocomplete-result" data-index="' + i + '">' +
                            '<div><b>' + r.iata + '</b> - ' + r.name + '</div>' +
                            '<div class="autocomplete-location">' + r.city + ', ' + r.country + '</div>' +
                            '</div>';
                    });

                    selectedIndex = -1;
                    list.html(divs.join(''))
                        .attr('data-highlight', selectedIndex);

                } else {
                    numResults = 0;
                    list.empty();
                }
            }

            function onKeyDown(e) {
                switch (e.which) {
                    case 38: // up
                        selectedIndex--;
                        if (selectedIndex <= -1) {
                            selectedIndex = -1;
                        }
                        list.attr('data-highlight', selectedIndex);
                        break;
                    case 13: // enter
                        selectIndex(selectedIndex);
                        break;
                    case 9: // enter
                        selectIndex(selectedIndex);
                        e.stopPropagation();
                        return;
                    case 40: // down
                        selectedIndex++;
                        if (selectedIndex >= numResults) {
                            selectedIndex = numResults - 1;
                        }
                        list.attr('data-highlight', selectedIndex);
                        break;

                    default:
                        return; // exit this handler for other keys
                }
                e.stopPropagation();
                e.preventDefault(); // prevent the default action (scroll / move caret)
            }
        }

        function autocompletefromround() {
            var options = {
                shouldSort: true,
                threshold: 0.4,
                maxPatternLength: 32,
                keys: [{
                    name: 'iata',
                    weight: 0.5
                }, {
                    name: 'name',
                    weight: 0.3
                }, {
                    name: 'city',
                    weight: 0.2
                }]
            };

            var fuse = new Fuse(airports, options);


            var ac = $('#auto_complete_round_from')
                .on('click', function(e) {
                    e.stopPropagation();
                })
                .on('focus keyup', search)
                .on('keydown', onKeyDown);

            var wrap = $('<div>')
                .addClass('autocomplete-wrapper')
                .insertBefore(ac)
                .append(ac);

            var list = $('<div>')
                .addClass('autocomplete-results')
                .on('click', '.autocomplete-result', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    selectIndex($(this).data('index'));
                })
                .appendTo(wrap);

            $(document)
                .on('mouseover', '.autocomplete-result', function(e) {
                    var index = parseInt($(this).data('index'), 10);
                    if (!isNaN(index)) {
                        list.attr('data-highlight', index);
                    }
                })
                .on('click', clearResults);

            function clearResults() {
                results = [];
                numResults = 0;
                list.empty();
            }

            function selectIndex(index) {
                if (results.length >= index + 1) {
                    ac.val(results[index].iata);
                    clearResults();
                }
            }

            var results = [];
            var numResults = 0;
            var selectedIndex = -1;

            function search(e) {
                if (e.which === 38 || e.which === 13 || e.which === 40) {
                    return;
                }

                if (ac.val().length > 0) {
                    results = _.take(fuse.search(ac.val()), 7);
                    numResults = results.length;

                    var divs = results.map(function(r, i) {
                        return '<div class="autocomplete-result" data-index="' + i + '">' +
                            '<div><b>' + r.iata + '</b> - ' + r.name + '</div>' +
                            '<div class="autocomplete-location">' + r.city + ', ' + r.country + '</div>' +
                            '</div>';
                    });

                    selectedIndex = -1;
                    list.html(divs.join(''))
                        .attr('data-highlight', selectedIndex);

                } else {
                    numResults = 0;
                    list.empty();
                }
            }

            function onKeyDown(e) {
                switch (e.which) {
                    case 38: // up
                        selectedIndex--;
                        if (selectedIndex <= -1) {
                            selectedIndex = -1;
                        }
                        list.attr('data-highlight', selectedIndex);
                        break;
                    case 13: // enter
                        selectIndex(selectedIndex);
                        break;
                    case 9: // enter
                        selectIndex(selectedIndex);
                        e.stopPropagation();
                        return;
                    case 40: // down
                        selectedIndex++;
                        if (selectedIndex >= numResults) {
                            selectedIndex = numResults - 1;
                        }
                        list.attr('data-highlight', selectedIndex);
                        break;

                    default:
                        return; // exit this handler for other keys
                }
                e.stopPropagation();
                e.preventDefault(); // prevent the default action (scroll / move caret)
            }
        }

        function autocompletetoround() {
            var options = {
                shouldSort: true,
                threshold: 0.4,
                maxPatternLength: 32,
                keys: [{
                    name: 'iata',
                    weight: 0.5
                }, {
                    name: 'name',
                    weight: 0.3
                }, {
                    name: 'city',
                    weight: 0.2
                }]
            };

            var fuse = new Fuse(airports, options);


            var ac = $('#auto_complete_round_to').on('click', function(e) {
                e.stopPropagation();
            }).on('focus keyup', search).on('keydown', onKeyDown);

            var wrap = $('<div>')
                .addClass('autocomplete-wrapper')
                .insertBefore(ac)
                .append(ac);

            var list = $('<div>')
                .addClass('autocomplete-results')
                .on('click', '.autocomplete-result', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    selectIndex($(this).data('index'));
                })
                .appendTo(wrap);

            $(document)
                .on('mouseover', '.autocomplete-result', function(e) {
                    var index = parseInt($(this).data('index'), 10);
                    if (!isNaN(index)) {
                        list.attr('data-highlight', index);
                    }
                })
                .on('click', clearResults);

            function clearResults() {
                results = [];
                numResults = 0;
                list.empty();
            }

            function selectIndex(index) {
                if (results.length >= index + 1) {
                    ac.val(results[index].iata);
                    clearResults();
                }
            }

            var results = [];
            var numResults = 0;
            var selectedIndex = -1;

            function search(e) {
                if (e.which === 38 || e.which === 13 || e.which === 40) {
                    return;
                }

                if (ac.val().length > 0) {
                    results = _.take(fuse.search(ac.val()), 7);
                    numResults = results.length;

                    var divs = results.map(function(r, i) {
                        return '<div class="autocomplete-result" data-index="' + i + '">' +
                            '<div><b>' + r.iata + '</b> - ' + r.name + '</div>' +
                            '<div class="autocomplete-location">' + r.city + ', ' + r.country + '</div>' +
                            '</div>';
                    });

                    selectedIndex = -1;
                    list.html(divs.join(''))
                        .attr('data-highlight', selectedIndex);

                } else {
                    numResults = 0;
                    list.empty();
                }
            }

            function onKeyDown(e) {
                switch (e.which) {
                    case 38: // up
                        selectedIndex--;
                        if (selectedIndex <= -1) {
                            selectedIndex = -1;
                        }
                        list.attr('data-highlight', selectedIndex);
                        break;
                    case 13: // enter
                        selectIndex(selectedIndex);
                        break;
                    case 9: // enter
                        selectIndex(selectedIndex);
                        e.stopPropagation();
                        return;
                    case 40: // down
                        selectedIndex++;
                        if (selectedIndex >= numResults) {
                            selectedIndex = numResults - 1;
                        }
                        list.attr('data-highlight', selectedIndex);
                        break;

                    default:
                        return; // exit this handler for other keys
                }
                e.stopPropagation();
                e.preventDefault(); // prevent the default action (scroll / move caret)
            }
        }

        function multicityfrom() {
            var options = {
                shouldSort: true,
                threshold: 0.4,
                maxPatternLength: 32,
                keys: [{
                    name: 'iata',
                    weight: 0.5
                }, {
                    name: 'name',
                    weight: 0.3
                }, {
                    name: 'city',
                    weight: 0.2
                }]
            };

            var fuse = new Fuse(airports, options);


            var ac = $('.multicityfrom').on('click', function(e) {
                e.stopPropagation();
            }).on('focus keyup', search).on('keydown', onKeyDown);

            var wrap = $('<div>')
                .addClass('autocomplete-wrapper')
                .insertBefore(ac)
                .append(ac);

            var list = $('<div>')
                .addClass('autocomplete-results')
                .on('click', '.autocomplete-result', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    selectIndex($(this).data('index'));
                })
                .appendTo(wrap);

            $(document)
                .on('mouseover', '.autocomplete-result', function(e) {
                    var index = parseInt($(this).data('index'), 10);
                    if (!isNaN(index)) {
                        list.attr('data-highlight', index);
                    }
                })
                .on('click', clearResults);

            function clearResults() {
                results = [];
                numResults = 0;
                list.empty();
            }

            function selectIndex(index) {
                if (results.length >= index + 1) {
                    ac.val(results[index].iata);
                    clearResults();
                }
            }

            var results = [];
            var numResults = 0;
            var selectedIndex = -1;

            function search(e) {
                if (e.which === 38 || e.which === 13 || e.which === 40) {
                    return;
                }

                if (ac.val().length > 0) {
                    results = _.take(fuse.search(ac.val()), 7);
                    numResults = results.length;

                    var divs = results.map(function(r, i) {
                        return '<div class="autocomplete-result" data-index="' + i + '">' +
                            '<div><b>' + r.iata + '</b> - ' + r.name + '</div>' +
                            '<div class="autocomplete-location">' + r.city + ', ' + r.country + '</div>' +
                            '</div>';
                    });

                    selectedIndex = -1;
                    list.html(divs.join(''))
                        .attr('data-highlight', selectedIndex);

                } else {
                    numResults = 0;
                    list.empty();
                }
            }

            function onKeyDown(e) {
                switch (e.which) {
                    case 38: // up
                        selectedIndex--;
                        if (selectedIndex <= -1) {
                            selectedIndex = -1;
                        }
                        list.attr('data-highlight', selectedIndex);
                        break;
                    case 13: // enter
                        selectIndex(selectedIndex);
                        break;
                    case 9: // enter
                        selectIndex(selectedIndex);
                        e.stopPropagation();
                        return;
                    case 40: // down
                        selectedIndex++;
                        if (selectedIndex >= numResults) {
                            selectedIndex = numResults - 1;
                        }
                        list.attr('data-highlight', selectedIndex);
                        break;

                    default:
                        return; // exit this handler for other keys
                }
                e.stopPropagation();
                e.preventDefault(); // prevent the default action (scroll / move caret)
            }
        }

        function multicityto() {
            var options = {
                shouldSort: true,
                threshold: 0.4,
                maxPatternLength: 32,
                keys: [{
                    name: 'iata',
                    weight: 0.5
                }, {
                    name: 'name',
                    weight: 0.3
                }, {
                    name: 'city',
                    weight: 0.2
                }]
            };

            var fuse = new Fuse(airports, options);


            var ac = $('.multicityto').on('click', function(e) {
                e.stopPropagation();
            }).on('focus keyup', search).on('keydown', onKeyDown);

            var wrap = $('<div>')
                .addClass('autocomplete-wrapper')
                .insertBefore(ac)
                .append(ac);

            var list = $('<div>')
                .addClass('autocomplete-results')
                .on('click', '.autocomplete-result', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    selectIndex($(this).data('index'));
                })
                .appendTo(wrap);

            $(document)
                .on('mouseover', '.autocomplete-result', function(e) {
                    var index = parseInt($(this).data('index'), 10);
                    if (!isNaN(index)) {
                        list.attr('data-highlight', index);
                    }
                })
                .on('click', clearResults);

            function clearResults() {
                results = [];
                numResults = 0;
                list.empty();
            }

            function selectIndex(index) {
                if (results.length >= index + 1) {
                    ac.val(results[index].iata);
                    clearResults();
                }
            }

            var results = [];
            var numResults = 0;
            var selectedIndex = -1;

            function search(e) {
                if (e.which === 38 || e.which === 13 || e.which === 40) {
                    return;
                }

                if (ac.val().length > 0) {
                    results = _.take(fuse.search(ac.val()), 7);
                    numResults = results.length;

                    var divs = results.map(function(r, i) {
                        return '<div class="autocomplete-result" data-index="' + i + '">' +
                            '<div><b>' + r.iata + '</b> - ' + r.name + '</div>' +
                            '<div class="autocomplete-location">' + r.city + ', ' + r.country + '</div>' +
                            '</div>';
                    });

                    selectedIndex = -1;
                    list.html(divs.join(''))
                        .attr('data-highlight', selectedIndex);

                } else {
                    numResults = 0;
                    list.empty();
                }
            }

            function onKeyDown(e) {
                switch (e.which) {
                    case 38: // up
                        selectedIndex--;
                        if (selectedIndex <= -1) {
                            selectedIndex = -1;
                        }
                        list.attr('data-highlight', selectedIndex);
                        break;
                    case 13: // enter
                        selectIndex(selectedIndex);
                        break;
                    case 9: // enter
                        selectIndex(selectedIndex);
                        e.stopPropagation();
                        return;
                    case 40: // down
                        selectedIndex++;
                        if (selectedIndex >= numResults) {
                            selectedIndex = numResults - 1;
                        }
                        list.attr('data-highlight', selectedIndex);
                        break;

                    default:
                        return; // exit this handler for other keys
                }
                e.stopPropagation();
                e.preventDefault(); // prevent the default action (scroll / move caret)
            }
        }
    </script>
</body>

</html>