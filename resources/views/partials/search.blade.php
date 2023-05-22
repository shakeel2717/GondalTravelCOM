<div class="container">
    <div class="row">
        <div class="col-lg-10 mx-auto responsive--column-l">
            <div class="hero-content pb-5">
                <div class="section-heading">
                    <h2 class="sec__title cd-headline zoom">
                        {{__('lang.title')}} <span class="cd-words-wrapper">
                                <b class="is-visible">{{__('lang.message')}}</b>
                                <b>{{__('lang.message1')}}</b>
                                <b>{{__('lang.message2')}}</b>
                                <b>{{__('lang.message3')}}</b>
                                <b>{{__('lang.message4')}}</b>
                                </span>

                        {{__('lang.waiting')}}
                    </h2>
                </div>
            </div><!-- end hero-content -->
            @include('partials.flight-search',['isArray' => false])
        </div><!-- end col-lg-12 -->
    </div><!-- end row -->
</div><!-- end container -->



