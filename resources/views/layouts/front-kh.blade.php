<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @if($post != null)
        <meta name="description" content="{{$post->title}}">
        @if($post->featured_image != null)
            <link rel="image_src" href="{{asset('uploads/posts/'.$post->featured_image)}}" width="100%" >
        @else 
            <link rel="image_src" href="{{asset('uploads/posts/logo.png')}}" width="100%" >
        @endif
    @endif
    <meta name="author" content="Sor Vichey">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>akp.gov.kh</title>
    <link rel="icon" href="{{asset('fronts/img/core-img/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('fronts/css/style.css')}}">
</head>
<body>
    <header class="header-area">
        <div class="top-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-header-content d-flex align-items-center justify-content-between">
                            <div class="logo">
                                <a href="{{url('/kh')}}"><img src="{{asset('fronts/img/core-img/logo.png')}}" width="420" alt=""></a>
                            </div>
                            <div class="login-search-area d-flex align-items-center">
                                <div>
                                    <a href="{{url('/')}}" style="text-decoration:none;"> <img src="{{asset('fronts/img/core-img/UK.png')}}" width="30" alt=""> ENGLISH &nbsp;</a>
                                    <a href="{{url('/fr')}}" style="text-decoration:none;"><img src="{{asset('fronts/img/core-img/France.png')}}" width="30" alt=""> FRENCH &nbsp;</a>
                                </div>
                                <div class="search-form">
                                    <div class="search-form">
                                        <form action="{{url('/kh/search')}}"  method="get">
                                            <input type="text" id="q" name="q" value="{{$query}}" class="form-control" placeholder="Search">
                                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar Area -->
        <div class="newspaper-main-menu" id="stickyMenu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <nav class="classy-navbar justify-content-between" id="newspaperNav">
                        <div class="logo">
                            <a href="index.html"><img src="{{asset('fronts/img/core-img/logo.png')}}" alt=""></a>
                        </div>
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>
                        <div class="classy-menu">
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <div class="classynav">
                                <ul>
                                    <li>
                                        <a href="{{url('/kh')}}"><i class="fa fa-home"></i>
                                            ទំព័រមុខ
                                        </a>
                                    </li>
                                    @foreach($sub_menus as $sm) 
                                       <li>
                                           <a href="{{url('kh/post/category/'.$sm->id)}}">{{$sm->name}}</a>
                                       </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    @yield('content')

    <footer class="footer-area">
        <div class="main-footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="footer-widget-area mt-30">
                            <div class="footer-logo">
                                <a href="{{url('/kh')}}"><img src="{{asset('fronts/img/core-img/logo.png')}}" width="400" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-12 col-sm-5 col-lg-5">
                        <div class="footer-widget-area mt-30">
                            <ul class="list">
                                <li><a href="mailto:ask@akp.gov.kh">អុីម៉ែល : ask@akp.gov.kh</a></li>
                                <li><a href="tel:+4352782883884">លេខទូរស័ព្ទ : ​+855 23 430 564</a></li>
                                <li><a href="#">អាសយដ្ឋាន : ​#62, Preah Monivong Blvd., Phnom Penh, Cambodia</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-2 col-lg-2">
                        <div class="footer-widget-area mt-30 mb-30">
                            <h6 class="widget-title">បណ្តាញសង្គម</h6>
                            <a  href="https://www.facebook.com/akp.official/" target="_blank"><span class="social">  <i class="fa fa-facebook  fa-3x text-primary"></i></span></a>
                            <a href="https://www.youtube.com/channel/UC_pMdWNb4Ta3n44fAMMf98g" target="_blank"><span class="social">  <i class="fa fa-youtube fa-3x text-danger"></i></span></a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 ">
                        <p class="text-white text-copyright">
                            &copy; រក្សា​សិទ្ធិ​គ្រប់​យ៉ាង​ដោយ​ ទីភ្នាក់ងារសារព័ត៌មានជាតិកម្ពុជា ឆ្នាំ​២០១៨  
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{asset('fronts/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <script src="{{asset('fronts/js/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('fronts/js/plugins/plugins.js')}}"></script>
    <script src="{{asset('fronts/js/active.js')}}"></script>
    @yield('js')
</body>
</html>
