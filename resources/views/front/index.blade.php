
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <title>Show your art</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/templatemo-seo-dream.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animated.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.css')}}">
<!--

TemplateMo 563 SEO Dream

https://templatemo.com/tm-563-seo-dream

-->

</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <h4><img src="assets/images/logo-icon.png" alt="">Show Your Art</h4>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="#features">Member</a></li>
              <li class="scroll-to-section"><a href="#about">Posts</a></li>
              <li class="scroll-to-section"><a href="#services">Project</a></li>
              <li class="scroll-to-section"><a href="{{route('login')}}">Login</a></li>
              <li class="scroll-to-section"><div class="main-blue-button"><a href="{{route('register')}}">Register</a></div></li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  
                  
                  <div class="col-lg-12">
                    <h2>Show your art</h2>
                  </div>
                  <div class="col-lg-12">
                    <div class="main-green-button scroll-to-section">
                      <a href="register">Get Your art</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="container">
                <div class="row">
                  <div class="col-12">
                    <div class="row mt-5">
                      <form action="{{route('view.search')}}" method="POST"
                      class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                      @csrf
                        <div class="input-group">
                            <input type="text" name='text_name' class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <h3><i class="fas fa-search fa-sm"></i></h3>
                                </button>
                            </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="assets/images/banner-right-image.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="features" class="features section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="features-content">
            <div class="row">
              @foreach(\App\Models\User::get() as $listeee) 
              <div class="col-lg-3">
                <div class="features-item first-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                  <div class="first-number number">
                    <h6>User</h6>
                  </div>
                  <a href="{{url('users/view-profile',$listeee->id)}}" class="active">
                  <img src="/uploads/images/{{$listeee->image}}" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                  <h5 class="mb-1">{{$listeee->name}} {{$listeee->prenom}}<i class="mdi mdi-check-decagram text-info ms-1"></i></h5>
                  </a>
                  <div class="line-dec"></div>
                  <p>{{$listeee->art}}</p>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h2>{{ __('Posts') }}</h2></div>
  <div id="about" class="about-us section">
    <div class="container">
      <div class="row">
            <div class="col-md-12">
                <div class="row mt-5">
                  @foreach (\App\Models\Publication::where('type','=','poste')->where('droit','!=',0)->get() as $post)                     
                  
                  <div class="col-lg-4">
                    <div class="features-item first-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                      <div class="first-number number">
                                <ul class="nav">
                                  <br>
                                  <li class="scroll-to-section"><a href="{{url('users/view-profile',$post->user->id)}}" class="active"><a id="navbarDropdown" class="nav-link dropdown-toggle" href="users/view-profile/{id}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position:relative;" padding-left:50px;  >
                                    <img src="/uploads/images/{{$post->user->image}}" style="width:32px;height:32px;position:absolute; top:0.5px;left:5px; border-radius:50% ">
                                    </a></a></li>
                                  <li class="scroll-to-section"><a href="{{url('users/view-profile',$post->user->id)}}" style="width:32px;height:2px;top:4px" >{{$post->user->name}} {{$post->user->prenom}}</a></li>
                                </ul>
                                      
                                {{$post->statu}} 
                                <img height="546" width="1000" alt="Peut être une image de 1 personne et texte qui dit ’edbibo’" class="i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm bixrwtb6" referrerpolicy="origin-when-cross-origin" src="{{asset('files').'/'.$post->file}}">
                                <br>  <br>  
                              </div>
                            </div>
                          </div>
                                        {{-- <img src="{{asset('files').'/'.$post->file}}" style="width:600px;height:550px;top:4px"> --}}
                                        
                              
                          
                  @endforeach
              </div>
          </div>
    </div>
  </div>
</div>
    </div>
  </div>
<br><br>
<div class="row justify-content-center">
  <div class="col-md-12">
      <div class="card">
          <div class="card-header"><h2>{{ __('Project') }}</h2></div>
  <div id="services" class="about-us section">
    <div class="container">
      <div class="row">
            <div class="col-md-12">
                <div class="row mt-5">
                  @foreach (\App\Models\Publication::where('type','=','project')->where('droit','!=',0)->get() as $post) 
                  <div class="col-lg-4">
                    <div class="features-item first-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                      <div class="first-number number">
                        <ul class="nav">
                          <br>
                          <li class="scroll-to-section"><a href="{{url('users/view-profile',$post->user->id)}}" class="active"><a id="navbarDropdown" class="nav-link dropdown-toggle" href="users/view-profile/{id}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position:relative;" padding-left:50px;  >
                            <img src="/uploads/images/{{$post->user->image}}" style="width:32px;height:32px;position:absolute; top:0.5px;left:5px; border-radius:50% ">
                            </a></a></li>
                          <li class="scroll-to-section"><a href="{{url('users/view-profile',$post->user->id)}}" style="width:32px;height:2px;top:4px" >{{$post->user->name}} {{$post->user->prenom}}</a></li>
                        </ul>
                              
                        {{$post->statu}} 
                        <img height="546" width="1000" alt="Peut être une image de 1 personne et texte qui dit ’edbibo’" class="i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm bixrwtb6" referrerpolicy="origin-when-cross-origin" src="{{asset('files').'/'.$post->file}}">
                        <br>  <br>  
                      </div></div></div>
                  @endforeach
              </div>   
          </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
  {{-- <div id="portfolio" class="our-portfolio section">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
            <h6>Our Portofolio</h6>
            <h2>Discover Our Recent <em>Projects</em> And <span>Showcases</span></h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
      <div class="row">
        <div class="col-lg-12">
          <div class="loop owl-carousel">
            <div class="item">
              <div class="portfolio-item">
                <div class="thumb">
                  <img src="assets/images/portfolio-01.jpg" alt="">
                  <div class="hover-content">
                    <div class="inner-content">
                      <a href="#"><h4>Awesome Project 101</h4></a>
                      <span>Marketing</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="portfolio-item">
                <div class="thumb">
                  <img src="assets/images/portfolio-04.jpg" alt="">
                  <div class="hover-content">
                    <div class="inner-content">
                      <a href="#"><h4>Awesome Project 102</h4></a>
                      <span>Branding</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="portfolio-item">
                <div class="thumb">
                  <img src="assets/images/portfolio-02.jpg" alt="">
                  <div class="hover-content">
                    <div class="inner-content">
                      <a href="#"><h4>Awesome Project 103</h4></a>
                      <span>Consulting</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="portfolio-item">
                <div class="thumb">
                  <img src="assets/images/portfolio-05.jpg" alt="">
                  <div class="hover-content">
                    <div class="inner-content">
                      <a href="#"><h4>Awesome Project 104</h4></a>
                      <span>Artwork</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="portfolio-item">
                <div class="thumb">
                  <img src="assets/images/portfolio-03.jpg" alt="">
                  <div class="hover-content">
                    <div class="inner-content">
                      <a href="#"><h4>Awesome Project 105</h4></a>
                      <span>Branding</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="portfolio-item">
                <div class="thumb">
                  <img src="assets/images/portfolio-06.jpg" alt="">
                  <div class="hover-content">
                    <div class="inner-content">
                      <a href="#"><h4>Awesome Project 106</h4></a>
                      <span>Artwork</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="portfolio-item">
                <div class="thumb">
                  <img src="assets/images/portfolio-04.jpg" alt="">
                  <div class="hover-content">
                    <div class="inner-content">
                      <a href="#"><h4>Awesome Project 107</h4></a>
                      <span>Creative</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="portfolio-item">
                <div class="thumb">
                  <img src="assets/images/portfolio-01.jpg" alt="">
                  <div class="hover-content">
                    <div class="inner-content">
                      <a href="#"><h4>Awesome Project 108</h4></a>
                      <span>Consulting</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="" method="post">
            <div class="row">
              <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                  <h6>Contact Us</h6>
                  <h2>Fill Out The Form Below To <span>Get</span> In <em>Touch</em> With Us</h2>
                </div>
              </div>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-lg-6">
                    <fieldset>
                      <input type="name" name="name" id="name" placeholder="Name" autocomplete="on" required>
                    </fieldset>
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <input type="surname" name="surname" id="surname" placeholder="Surname" autocomplete="on" required>
                    </fieldset>
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <input type="subject" name="subject" id="subject" placeholder="Subject" autocomplete="on">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" type="text" class="form-control" id="message" placeholder="Message" required=""></textarea>  
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="main-button ">Send Message Now</button>
                    </fieldset>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="contact-info">
                  <ul>
                    <li>
                      <div class="icon">
                        <img src="assets/images/contact-icon-01.png" alt="email icon">
                      </div>
                      <a href="#">info@company.com</a>
                    </li>
                    <li>
                      <div class="icon">
                        <img src="assets/images/contact-icon-02.png" alt="phone">
                      </div>
                      <a href="#">+001-002-0034</a>
                    </li>
                    <li>
                      <div class="icon">
                        <img src="assets/images/contact-icon-03.png" alt="location">
                      </div>
                      <a href="#">26th Street, Digital Villa</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> --}}

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2022 Show Your Art. 
          
          <br>Web Designed by <a rel="nofollow" href="https://templatemo.com" title="free CSS templates">TemplateMo</a></p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/js/owl-carousel.js')}}"></script>
  <script src="{{asset('assets/js/animation.js')}}"></script>
  <script src="{{asset('assets/js/imagesloaded.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>

</body>
</html>