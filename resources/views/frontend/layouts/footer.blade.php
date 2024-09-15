<footer class="footer">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-4">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">Contact us</h5>
                        <h4 class="title">{{$footerData->phone}}</h4>
                    </div>
                    <div class="footer__widget__text">
                        {!! $footerData->description !!}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">my address</h5>
                        <h4 class="title">AUSTRALIA</h4>
                    </div>
                    <div class="footer__widget__address">
                        <p>{{$footerData->address}}</p>
                        <a href="mailto:{{$footerData->email}}" class="mail">{{$footerData->email}}</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">Follow me</h5>
                        <h4 class="title">socially connect</h4>
                    </div>
                    <div class="footer__widget__social">
                        <p>Lorem ipsum dolor sit amet enim. <br> Etiam ullamcorper.</p>
                        <ul class="footer__social__list">
                            <li><a href="{{$footerData->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{$footerData->twitter}}"><i class="fab fa-twitter"></i></a></li>
{{--                            <li><a href="#"><i class="fab fa-behance"></i></a></li>--}}
{{--                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>--}}
{{--                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>--}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright__wrap">
            <div class="row">
                <div class="col-12">
                    <div class="copyright__text text-center">
                        <p>{{$footerData->copyright}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
