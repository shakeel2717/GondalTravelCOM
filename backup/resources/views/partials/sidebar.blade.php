<style>
    .slider {
        -webkit-appearance: none;
        width: 100%;
        height: 25px;
        background: #d3d3d3;
        outline: none;
        opacity: 0.7;
        -webkit-transition: .2s;
        transition: opacity .2s;
    }

    .slider:hover {
        opacity: 1;
    }

    .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 25px;
        height: 25px;
        background: #287dfa;
        cursor: pointer;
    }

    .slider::-moz-range-thumb {
        width: 25px;
        height: 25px;
        background: #287dfa;
        cursor: pointer;
    }
</style>

<div class="col-lg-4 mb-5">
    <div class="sidebar mt-0">
        <div class="sidebar-widget">
            <h3 class="title stroke-shape">Flights Filters <a href="javascript:void(0)" onclick="showAllFlights()">Show All</a></h3>
            <div class="row">
                @foreach ($availableFlights as $flight)
                <div class="m-2">
                    <label>
                        <input type="radio" name="options" id="{{ $flight->iata }}" style="display: none;" autocomplete="off">
                        <img width="70" height="40" onclick="showOnlyThis('flimg' + '{{ $flight->iata }}')" src="https://www.skyscanner.net/images/airlines/small/{{ $flight->iata }}.png" alt="{{ $flight->iata }}">
                    </label>
                </div>
                @endforeach
            </div>
        </div>
        <div class="sidebar-widget">
            <h3 class="title stroke-shape">Filter by Price: <a href="javascript:void(0)" onclick="showAllFlights()">Show All</a></h3>
            <div class="sidebar-price-range w-100">
                <div class="slider-range-wrap">
                    <div class="price-slider-amount padding-bottom-20px">
                        <div class="d-flex justify-content-between">
                            <label for="amount2" class="filter__label mb-4">Max Price:</label>
                            <input type="text" id="filterByPriceFilter" class="amounts" name="ammout">
                        </div>
                        <input type="range" class="form-range slider" onchange="livePriceFilter()" max="3000" id="filterByPriceFilterSlide" value="{{request()->get('ammout')}}">
                    </div><!-- end price-slider-amount -->
                </div><!-- end slider-range-wrap -->
            </div>
        </div>
    </div><!-- end sidebar -->
</div><!-- end col-lg-4 -->

<script>
    var one = document.getElementById('oneway')
    var ret = document.getElementById('return')
    ret.style.display = "none";
    flightss();
    avalue()

    function flightss() {
        var type = document.getElementById('type')
        if (type.value === "1") {
            one.style.display = "";
            ret.style.display = "none";
        } else if (type.value === "2") {
            one.style.display = "none";
            ret.style.display = "";
        }
    }

    function avalue() {
        document.getElementById('amot').value = document.getElementById('customRange1').value;
    }

    
</script>