<!-- ================================
       START FOOTER AREA
================================= -->
<section class="footer-area section-bg padding-top-100px padding-bottom-30px">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 text-center responsive-column" style="display: flex;justify-content: center;">
                <div class="footer-item">
                    <div class="footer-logo padding-bottom-30px" style="width: 150px;height:150px;">
                        <a href="{{url('')}}" class="foot__logo"><img src="{{asset('images/logo.png')}}" width="100%" alt="logo"></a>
                    </div><!-- end logo -->

                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-4  responsive-column" style="display: flex;justify-content: center;">
                <div class="footer-item">
                    <h4 class="title curve-shape pb-3 margin-bottom-20px" data-text="curvs">{{__('lang.about')}}</h4>
                    <p class="footer__desc">{{__('lang.about_msg')}}</p>

                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->

            <div class="col-lg-2  responsive-column" style="display: flex;justify-content: center;" >
                <div class="footer-item">
                    <h4 class="title curve-shape pb-3 margin-bottom-20px" data-text="curvs">{{__('lang.company')}}</h4>
                    <ul class="list-items list--items">
                        <li><a href="{{route('index')}}">{{__('lang.flight')}}</a></li>
                        <li><a href="{{route('about')}}">{{__('lang.about')}}</a></li>
                        <li><a href="{{route('faqs')}}">FAQs</a></li>
                        <li><a href="{{route('contact')}}">{{__('lang.contact_us')}}</a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column" style="display: flex;justify-content: center;">
                <div class="footer-item">
                    <h4 class="title curve-shape pb-3 margin-bottom-5px" data-text="curvs">Contact</h4>
                    <ul class="list-items pt-3">
                        <li><strong>France {{__('lang.phone')}}:</strong>  +33 187653786
                         </li><li><strong> USA {{__('lang.phone')}}:</strong>  +1 8143008040</li>
                         <li><strong>UK {{__('lang.phone')}}:</strong> +44 800 707 4285</li>
                        <li><i class="far fa-envelope"></i><strong> {{__('lang.email2')}}:</strong> hello@gondaltravel.com</li>
                        <!--<li><i class="fas fa-map-marked"></i><strong> {{__('lang.address')}}:</strong> 89 Av. du Groupe Manouchian, 94400 Vitry-sur-Seine, France</li>-->
                    </ul>

                        <ul class="social-profile">
                            <li><a href="{{__('https://www.facebook.com/profile.php?id=100076931238767')}}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://instagram.com/gondaltravel?r=nametag"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>


                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
        <div class="row align-items-center">
            <div class="col-lg-8" >
                <div class="term-box footer-item">
                    <ul class="list-items list--items d-flex align-items-center">
                        <li><a href="#">{{__('lang.terms_and_conditions')}}</a></li>
                        <li><a href="#">{{__('lang.privacy_policy')}}</a></li>
                        <li><a href="#">{{__('lang.help_center')}}</a></li>
                    </ul>
                </div>
            </div><!-- end col-lg-8 -->
             <div class="col-lg-4" >
                <div class="footer-social-box text-right">
                    <div class="copy-right-content d-flex align-items-center justify-content-end padding-top-30px">
                        <h3 class="title font-size-15 pr-2">{{__('lang.we_accept')}}</h3>
                        <img src="{{asset('images/payment-img.png')}}" alt="">
                    </div><!-- end copy-right-content -->
                </div>
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <div class="section-block mt-4"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 text-center" >
                <div class="copy-right padding-top-30px">
                    <p class="copy__desc">
                        &copy; Copyright © GondalTravel <?php echo date('Y'); ?>. All Rights Reserved.<a href="https://Logixbit.com"></a>
                    </p>
                </div><!-- end copy-right -->
            </div><!-- end col-lg-7 -->

        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end footer-area -->
<!-- ================================
       START FOOTER AREA
================================= -->

<!-- start back-to-top -->
<div id="back-to-top">
    <i class="fa fa-angle-up" title="Go top"></i>
</div>
<!-- end back-to-top -->
