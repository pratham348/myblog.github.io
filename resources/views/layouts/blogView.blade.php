<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Catalog</title>
    <link rel="stylesheet" href="{{asset('blog_view/fontawesome/css/all.min.css')}}"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!-- https://fonts.google.com/ -->
    <link rel="stylesheet" href="{{asset('blog_view/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('blog_view/css/templatemo-video-catalog.css')}}">
<!--

TemplateMo 552 Video Catalog

https://templatemo.com/tm-552-video-catalog

-->
</head>

<body>
    <div class="tm-page-wrap mx-auto">
        <div class="position-relative ">
            <div class="position-relative">
                <div class="container-fluid position-relative">
                    <div class="row">
                        
                        <div class="col-8 col-md-12 ml-auto mr-0" >
                            <div class="tm-site-nav">
                                <nav class="navbar navbar-expand-lg navbar-light bg-light"  id="tm-main-nav">
                                   
                                    <div class="collapse navbar-collapse" id="navbar-nav">
                                        <ul class="navbar-nav me-auto mb-1 mb-lg-0 text-uppercase">
                                                    
                                            <li class="nav-item active">
                                                <img src="{{asset('blog_view/img/logo3.png')}}" width="100px" height="52px">
                                            </li>
                                            <li class="nav-item active">
                                                <a class="nav-link tm-nav-link"  href="{{url('index')}}"><p class="tm-text-primary">Home <span class="sr-only sr-only-focusable">(current)</span></p></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link tm-nav-link"  href="{{url('ShowCategory')}}"><p class="tm-text-primary">Categories</p></a>
                                            </li>                                            
                                            <li class="nav-item">
                                                <a class="nav-link tm-nav-link"  href="{{url('newUploads')}}"><p class="tm-text-primary">NewUploads</p></a>
                                            </li>                                            
                                            <li class="nav-item">
                                                <a class="nav-link tm-nav-link"  href="{{url('feedback')}}"><p class="tm-text-primary">Feedback</p></a>
                                            </li>                                            
                                            <li class="nav-item">
                                                <a class="nav-link tm-nav-link"  href="{{url('about')}}"><p class="tm-text-primary">About</p></a>
                                            </li>
                                            
                                            
                                        </ul>
                                        <form class="d-flex" action="search" method="GET" role="search">
                                            <input class="form-control me-2" name="q" type="text" placeholder="Search" aria-label="Search" style="width:50%;">
                                            <button type="submit" class="btn tm-btn-small"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            

    
 
        <div class="container-fluid" >
            <div id="content" class="mx-auto tm-content-container"  >
                <main>
                    @yield('content')
                </main>
            </div>
                <!-- Subscribe form and footer links -->
                <div class="row mt-5 pt-3">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="p-5 tm-bg-gray h-100">
                            <h3 class="tm-text-primary mb-4">Our Pages</h3>
                            <ul class="list-unstyled tm-footer-links">
                                <li><a href="{{url('index')}}">Home</a></li>
                                <li><a href="{{url('ShowCategory')}}">Categories</a></li>
                                <li><a href="{{url('newUploads')}}">New Uploads</a></li>
                                <li><a href="{{url('feedback')}}">Feedback</a></li>
                                <li><a href="{{url('about')}}">About</a></li>
                            </ul>
                        </div>                        
                    </div>
                    <div class="col-xl-6 col-lg-12 mb-4">
                        <div class="tm-bg-gray p-5 h-100">
                            <h3 class="tm-text-primary mb-3">Do you want to get our latest updates?</h3>
                            <p class="mb-5">Please subscribe our newsletter for upcoming new videos and latest information about our
                                work. Thank you.</p>
                                @if (Session::get('fail'))
                                <div class="alert alert-danger">
                                    {{Session::get('fail')}}
                                </div>
                                @endif
                                @if (Session::get('success'))
                                <div class="alert alert-success">
                                    {{Session::get('success')}}
                                </div>
                                @endif
                            <form action="doSubscribe" method="POST" class="tm-subscribe-form">
                                @csrf
                                <input type="text" name="email" placeholder="Your Email..." required>
                                <button type="submit" class="btn rounded-0 btn-primary tm-btn-small">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- row -->

                <footer class="row pt-5">
                    <div class="col-12">
                        <p class="text-right">Copyright 2020-2021 The Blog Creator Company 
                        
                        - Designed and Maintain by <a  rel="nofollow" target="_parent">Pratham Chauhan</a></p>
                    </div>
                </footer>
            </div> <!-- tm-content-container -->
        </div>

    </div> <!-- .tm-page-wrap -->

    <script src="{{asset('blog_view/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('blog_view/js/bootstrap.min.js')}}"></script>
    
    <script>
        function setVideoSize() {
            const vidWidth = 1920;
            const vidHeight = 1080;
            let windowWidth = window.innerWidth;
            let newVidWidth = windowWidth;
            let newVidHeight = windowWidth * vidHeight / vidWidth;
            let marginLeft = 0;
            let marginTop = 0;

            if (newVidHeight < 500) {
                newVidHeight = 500;
                newVidWidth = newVidHeight * vidWidth / vidHeight;
            }

            if(newVidWidth > windowWidth) {
                marginLeft = -((newVidWidth - windowWidth) / 2);
            }

            if(newVidHeight > 720) {
                marginTop = -((newVidHeight - $('#tm-video-container').height()) / 2);
            }

            const tmVideo = $('#tm-video');

            tmVideo.css('width', newVidWidth);
            tmVideo.css('height', newVidHeight);
            tmVideo.css('margin-left', marginLeft);
            tmVideo.css('margin-top', marginTop);
        }

        $(document).ready(function () {
            /************** Video background *********/

            setVideoSize();

            // Set video background size based on window size
            let timeout;
            window.onresize = function () {
                clearTimeout(timeout);
                timeout = setTimeout(setVideoSize, 100);
            };

            // Play/Pause button for video background      
            const btn = $("#tm-video-control-button");

            btn.on("click", function (e) {
                const video = document.getElementById("tm-video");
                $(this).removeClass();

                if (video.paused) {
                    video.play();
                    $(this).addClass("fas fa-pause");
                } else {
                    video.pause();
                    $(this).addClass("fas fa-play");
                }
            });
        })
    </script>
</body>

</html>