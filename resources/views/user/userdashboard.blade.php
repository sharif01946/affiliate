<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Electronics Store</title>

  <link rel="stylesheet" type="text/css" href="{{ asset("assets/bootstrap/css/bootstrap.min.css") }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/style.css") }}"/>
</head>
<body>
  <header>

      <div class="top-text">
      <nav>
        <div class="container" style="color:#4500fc;">
          <ul class="nav navbar-nav navbar-left">
            <p style="padding:20px">Welcome to Worldwide Electronics Store</p>            
          </ul>
          <div class="user">
            <ul class="nav navbar-nav navbar-right">
            @if (Auth::guard('donar')->guest())
              <li><a href="{{ url('/user/login') }}">Login</a></li>
              <li><a href="{{ url('/user/register') }}">Register</a></li>
              @else
              <li><a class="dropdown-toggle"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" href="#">
                <p>Hi</p>
                {{ Auth::guard('donar')->user()->name}}
               </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                  <li><a href="{{ url('user/logout') }}"><i class="fa fa-btn fa-sign-out"></i> {{ trans('backpack::base.logout') }}</a></li>                  
                </ul>
              </li>
            @endif
            </ul>
          </div>
        </div>
      </nav>
    </div>
    
    <div class="container mid-row">
      <div class="row">
          <div class="col-sm-3 logo">
            <img class="img img-responsive" src="{{ asset("assets/img/LOGO.png") }}">
          </div>
          <div class="col-sm-5 search-item">
            <form class="form-inline" action="/search" method="get">
              {{ csrf_field() }}
                <div class="form-group">
                  <input type="text" class="form-control no-border" name="search_product" placeholder="Search for products">
                </div>
                <div class="form-group">
                  <select class="form-control no-border" name="search_category">
                    <option value="all categories">All Categories</option>
                    @foreach ($categorys as $category)
                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
                
                <button type="submit" class="btn no-border btn-default">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              
            </form>
          </div>
          <div class="col-sm-offset-4"></div>
      </div>
    </div>


    <nav class="navbar menu navbar-default">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="#">Apparel</a></li>
              <li><a href="#">Automative</a></li>
              <li><a href="#">B2B</a></li>
              <li><a href="#">Career</a></li>
              <li><a href="#">Department stores</a></li>
              <li><a href="#">Education</a></li>
              <li><a href="#">Electronics</a></li>
              <li><a href="#">Finance</a></li>
              <li><a href="#">Life Style</a></li>
              
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

  </header>

<!-- Slider -->
  <section>
    <div class="slider">
    <div class="container-fluid">
      <div id="slider-1" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">

            <div class="container">
              <div class="row">
                <div class="col-sm-6 info">
                  <div class="title"><h3>SHOP TO GET WHAT YOU LOVE</h3></div>
                  <div class="desc">
                    <h1>TIMEPIECES THAT<br>
                     MAKE A STATEMENT<br>
                     UP TO <strong>40% OFF</strong></h1> 
                  </div>
                  <button class="start">Start Buying</button>
                        </div>
                <div class="col-sm-6">
                  <img src="{{ asset("assets/img/Smartwatches.png") }}">
                </div>
              </div>
            </div>
          </div>
          <div class="item">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-6 info">
                      <div class="title"><h3>SHOP TO GET WHAT YOU LOVE</h3></div>
                      <div class="desc">
                        <h1>TIMEPIECES THAT<br>
                         MAKE A STATEMENT<br>
                         UP TO <strong>40% OFF</strong></h1> 
                      </div>
                      <button class="start">Start Buying</button>
                                </div>
                    <div class="col-sm-6">
                      <img src={{ asset("assets/img/Smartwatches.png") }}>
                    </div>
                  </div>
                </div>
          </div>
          <div class="item">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-6 info">
                      <div class="title"><h3>SHOP TO GET WHAT YOU LOVE</h3></div>
                      <div class="desc">
                        <h1>TIMEPIECES THAT<br>
                         MAKE A STATEMENT<br>
                         UP TO <strong>40% OFF</strong></h1> 
                      </div>
                      <button class="start">Start Buying</button>
                                </div>
                    <div class="col-sm-6">
                      <img src={{ asset("assets/img/Smartwatches.png") }}>
                    </div>
                  </div>
                </div>
          </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#slider-1" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#slider-1" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    </div>
  </section>

<!--camera-->
  <section class="camera">
    <div class="container">
      
        <div class="row">
          <div class="col-sm-6">
            <div class="same-bgc">
              <div class="row">
                <div class="col-sm-6">
                  <img class="img img-responsive" src="{{ asset("assets/img/cameras.png") }}">
                </div>
                <div class="col-sm-6">
                  <h3>
                    CATCH HOTTEST<br>
                    <strong>Deals</strong> IN CAMERAS<br>
                    CATEGORY
                  </h3>
                  <p>Shop Now</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="same-bgc">
              <div class="row">
                <div class="col-sm-6">
                  <img class="img img-responsive" src="{{ asset("assets/img/DesktopPC.png") }}">
                </div>
                <div class="col-sm-6">
                  <h3>
                    TABLETS,<br> 
                    SMARTPHONES<br>
                    <strong>AND MORE</strong>
                  </h3>
                  <p>From<br>$799<sub>99</sub></p>
                </div>
              </div>
            </div>
          </div>
        </div>
          
    </div>
  </section>
<!--tab bar-->
  <section class="tab-bar">
    <div class="container">
      <div>

        <!-- Nav tabs -->
        <ul class="nav tab-title nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Featured</a></li>
          <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">On Sale</a></li>
          <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Top Rated</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="home">
            <div class="row">
              <div class="col-sm-3 tab-holder">
                <div class="tab-box">
                  <p>Smartphones</p>
                  <h3>Smartphone 6S 32GB<br> LTE</h3>
                  <img class="img img-responsive" src=""{{ asset("assets/img/GoldPhone-250x232.png") }}""><br>
                  <strong>$1215.00</strong>
                </div>
              </div>
              <div class="col-sm-3 tab-holder">
                <div class="tab-box">
                  <p>Laptops, Ultrabooks</p>
                  <h3>Tablet Red EliteBook  Revolve 810 G2</h3>
                  <img class="img img-responsive" src=""{{ asset("assets/img/LaptopYoga-250x232.png") }}""><br>
                  <strong>$1215.00</strong>
                </div>
              </div>
              <div class="col-sm-3 tab-holder">
                <div class="tab-box">
                  <p>Cameras</p>
                  <h3>Purple NX Mini F1 aparat SMART NX</h3>
                  <img class="img img-responsive" src=""{{ asset("assets/img/Photocamera-250x232.png") }}""><br>
                  <strong>$559.00</strong>
                </div>
              </div>
              <div class="col-sm-3 tab-holder">
                <div class="tab-box">
                  <p>Printers</p>
                  <h3>Full Color LaserJet Pro M452dn</h3>
                  <img class="img img-responsive" src=""{{ asset("assets/img/Printer-250x232.png") }}""><br>
                  <strong>$1050.00</strong>
                </div>
              </div>
            </div>
          </div>

          <div role="tabpanel" class="tab-pane" id="profile">
                  <div class="row">
                    <div class="col-sm-3 tab-holder">
                      <div class="tab-box">
                        <p>Smartphones</p>
                        <h3>Smartphone 6S 32GB<br> LTE</h3>
                        <img class="img img-responsive" src=""{{ asset("assets/img/GoldPhone-250x232.png") }}""><br>
                        <strong>$1215.00</strong>
                      </div>
                    </div>
                    <div class="col-sm-3 tab-holder">
                      <div class="tab-box">
                        <p>Laptops, Ultrabooks</p>
                        <h3>Tablet Red EliteBook  Revolve 810 G2</h3>
                        <img class="img img-responsive" src=""{{ asset("assets/img/LaptopYoga-250x232.png") }}""><br>
                        <strong>$1215.00</strong>
                      </div>
                    </div>
                    <div class="col-sm-3 tab-holder">
                      <div class="tab-box">
                        <p>Cameras</p>
                        <h3>Purple NX Mini F1 aparat SMART NX</h3>
                        <img class="img img-responsive" src=""{{ asset("assets/img/Photocamera-250x232.png") }}""><br>
                        <strong>$559.00</strong>
                      </div>
                    </div>
                    <div class="col-sm-3 tab-holder">
                      <div class="tab-box">
                        <p>Printers</p>
                        <h3>Full Color LaserJet Pro M452dn</h3>
                        <img class="img img-responsive" src=""{{ asset("assets/img/Printer-250x232.png") }}""><br>
                        <strong>$1050.00</strong>
                      </div>
                    </div>
                  </div>
          </div>

          <div role="tabpanel" class="tab-pane" id="messages">
                  <div class="row">
                    <div class="col-sm-3 tab-holder">
                      <div class="tab-box">
                        <p>Smartphones</p>
                        <h3>Smartphone 6S 32GB<br> LTE</h3>
                        <img class="img img-responsive" src="{{ asset("assets/img/GoldPhone-250x232.png") }}" <br>
                        <strong>$1215.00</strong>
                      </div>
                    </div>
                    <div class="col-sm-3 tab-holder">
                      <div class="tab-box">
                        <p>Laptops, Ultrabooks</p>
                        <h3>Tablet Red EliteBook  Revolve 810 G2</h3>
                        <img class="img img-responsive" src="{{ asset("assets/img/LaptopYoga-250x232.png") }}"><br>
                        <strong>$1215.00</strong>
                      </div>
                    </div>
                    <div class="col-sm-3 tab-holder">
                      <div class="tab-box">
                        <p>Cameras</p>
                        <h3>Purple NX Mini F1 aparat SMART NX</h3>
                        <img class="img img-responsive" src="{{ asset("assets/img/Photocamera-250x232.png") }}"><br>
                        <strong>$559.00</strong>
                      </div>
                    </div>
                    <div class="col-sm-3 tab-holder">
                      <div class="tab-box">
                        <p>Printers</p>
                        <h3>Full Color LaserJet Pro M452dn</h3>
                        <img class="img img-responsive" src="{{ asset("assets/img/Printer-250x232.png") }}"><br>
                        <strong>$1050.00</strong>
                      </div>
                    </div>
                  </div>
          </div>
        </div>

      </div>
    </div>
  </section>

<!-- home entertainment-->
  <section>
    <div class="home-ent">
      <div class="container">
        <div class="row">

          <div class="col-sm-6">
            <img src="{{ asset("assets/img/ad-banner-3.png") }}">
          </div>

          <div class="col-sm-6">

            <h3 class="title"><span class="bot-cont">Home Entertainment</span></h3>
            <div id="slider-2" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol style="margin-bottom: -18px;

              " class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                  <div class="item active">
                    
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="slide-box">
                          <p>Smartphones</p>
                          <h3>Smartphone 6S 32GB<br> LTE</h3>
                          <img class="img img-responsive" src="{{ asset("assets/img/GoldPhone-250x232.png") }}"<br>
                          <strong>$1215.00</strong>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="slide-box">
                          <p>Smartphones</p>
                          <h3>Smartphone 6S 32GB<br> LTE</h3>
                          <img class="img img-responsive" src="{{ asset("assets/img/GoldPhone-250x232.png") }}"<br>
                          <strong>$1215.00</strong>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="slide-box">
                              <p>Smartphones</p>
                              <h3>Smartphone 6S 32GB<br> LTE</h3>
                              <img class="img img-responsive" src="{{ asset("assets/img/GoldPhone-250x232.png") }}"<br>
                              <strong>$1215.00</strong>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="slide-box">
                              <p>Smartphones</p>
                              <h3>Smartphone 6S 32GB<br> LTE</h3>
                              <img class="img img-responsive" src="{{ asset("assets/img/GoldPhone-250x232.png") }}"<br>
                              <strong>$1215.00</strong>
                            </div>
                          </div>
                        </div>
                  </div>
              
              </div>

              <!-- Controls -->
              <div class="angle">
                <a class="" href="#slider-2" role="button" data-slide="prev">
                  <i class="fa fa-angle-left" aria-hidden="true"></i>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="" href="#slider-2" role="button" data-slide="next">
                  <i class="fa fa-angle-right" aria-hidden="true"></i>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<!--slider-3-->
  <section class="laptop">
    <div class="container">
      <h3 class="title"><span class="bot-cont">Laptops & Computers</span></h3>
      <div id="slider-3" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#slider-3" data-slide-to="0" class="active"></li>
          <li data-target="#slider-3" data-slide-to="1"></li>
          <li data-target="#slider-3" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
              <div class="row">
                <div class="col-sm-6 mid-border">
                  <div class="row">
                    <div class="col-sm-6">
                      <img class="img img-responsive" src="{{ asset("assets/img/4-250x232.png") }}">
                    </div>
                    <div class="col-sm-6">
                      <div class="slide-box">
                          <p>Cameras</p>
                          <h3>Smart Camera 6200U with 500GB SDcard</h3>
                          <strong>$29999.00</strong>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-sm-6">
                      <img class="img img-responsive" src="{{ asset("assets/img/Smartwatch2-250x232.png") }}">
                    </div>
                    <div class="col-sm-6">
                      <div class="slide-box">
                          <p>Smartwatches</p>
                          <h3>Smartwatches 6200U with 50GB SDcard</h3>
                          <strong>$2999.00</strong>
                        </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6 mid-border">
                  <div class="row">
                    <div class="col-sm-6">
                      <img class="img img-responsive" src="{{ asset("assets/img/4-250x232.png") }}">
                    </div>
                    <div class="col-sm-6">
                      <div class="slide-box">
                          <p>Cameras</p>
                          <h3>Smart Camera 6200U with 500GB SDcard</h3>
                          <strong>$29999.00</strong>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-sm-6">
                      <img class="img img-responsive" src="{{ asset("assets/img/Smartwatch2-250x232.png") }}">
                    </div>
                    <div class="col-sm-6">
                      <div class="slide-box">
                          <p>Smartwatches</p>
                          <h3>Smartwatches 6200U with 50GB SDcard</h3>
                          <strong>$2999.00</strong>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="item">
              <div class="row">
                <div class="col-sm-6 mid-border">
                  <div class="row">
                    <div class="col-sm-6">
                      <img class="img img-responsive" src="{{ asset("assets/img/4-250x232.png") }}">
                    </div>
                    <div class="col-sm-6">
                      <div class="slide-box">
                          <p>Cameras</p>
                          <h3>Smart Camera 6200U with 500GB SDcard</h3>
                          <strong>$29999.00</strong>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-sm-6">
                      <img class="img img-responsive" src="{{ asset("assets/img/Smartwatch2-250x232.png") }}">
                    </div>
                    <div class="col-sm-6">
                      <div class="slide-box">
                          <p>Smartwatches</p>
                          <h3>Smartwatches 6200U with 50GB SDcard</h3>
                          <strong>$2999.00</strong>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 mid-border">
                  <div class="row">
                    <div class="col-sm-6">
                      <img class="img img-responsive" src="{{ asset("assets/img/4-250x232.png") }}">
                    </div>
                    <div class="col-sm-6">
                      <div class="slide-box">
                          <p>Cameras</p>
                          <h3>Smart Camera 6200U with 500GB SDcard</h3>
                          <strong>$29999.00</strong>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-sm-6">
                      <img class="img img-responsive" src="{{ asset("assets/img/Smartwatch2-250x232.png") }}">
                    </div>
                    <div class="col-sm-6">
                      <div class="slide-box">
                          <p>Smartwatches</p>
                          <h3>Smartwatches 6200U with 50GB SDcard</h3>
                          <strong>$2999.00</strong>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="item">
              <div class="row">
                <div class="col-sm-6 mid-border">
                  <div class="row">
                    <div class="col-sm-6">
                      <img class="img img-responsive" src="{{ asset("assets/img/4-250x232.png") }}">
                    </div>
                    <div class="col-sm-6">
                      <div class="slide-box">
                          <p>Cameras</p>
                          <h3>Smart Camera 6200U with 500GB SDcard</h3>
                          <strong>$29999.00</strong>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-sm-6">
                      <img class="img img-responsive" src="{{ asset("assets/img/Smartwatch2-250x232.png") }}">
                    </div>
                    <div class="col-sm-6">
                      <div class="slide-box">
                          <p>Smartwatches</p>
                          <h3>Smartwatches 6200U with 50GB SDcard</h3>
                          <strong>$2999.00</strong>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 mid-border">
                  <div class="row">
                    <div class="col-sm-6">
                      <img class="img img-responsive" src="{{ asset("assets/img/4-250x232.png") }}">
                    </div>
                    <div class="col-sm-6">
                      <div class="slide-box">
                          <p>Cameras</p>
                          <h3>Smart Camera 6200U with 500GB SDcard</h3>
                          <strong>$29999.00</strong>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-sm-6">
                      <img class="img img-responsive" src="{{ asset("assets/img/Smartwatch2-250x232.png") }}">
                    </div>
                    <div class="col-sm-6">
                      <div class="slide-box">
                          <p>Smartwatches</p>
                          <h3>Smartwatches 6200U with 50GB SDcard</h3>
                          <strong>$2999.00</strong>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>

        <!-- Controls -->
        <div class="angle">
          <a class="" href="#slider-3" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="" href="#slider-3" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>    
  </section>

<!--Bestsellers-->
<section>
  
  <div class="bestseller">
    <div class="container">
      <div class="row">
        <h3 class="title"><span class="bot-cont">Bestsellers</span></h3>
        <div class="col-sm-7">
          <div class="row">
            <div class="col-sm-4">
              <div class="slide-box">
                  <p>Smartphones</p>
                  <h4>Smartphone 6S 32GB<br> LTE</h4>
                  <img class="img img-responsive" src="{{ asset("assets/img/GoldPhone-250x232.png") }}"<br>
                  <strong><p>$1215.00</p></strong>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="slide-box">
                  <p>Smartphones</p>
                  <h4>Smartphone 6S 32GB<br> LTE</h4>
                  <img class="img img-responsive" src="{{ asset("assets/img/GoldPhone-250x232.png") }}"<br>
                  <strong><p>$1215.00</p></strong>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="slide-box">
                  <p>Smartphones</p>
                  <h4>Smartphone 6S 32GB<br> LTE</h4>
                  <img class="img img-responsive" src="{{ asset("assets/img/GoldPhone-250x232.png") }}"<br>
                  <strong><p>$1215.00</p></strong>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              <div class="slide-box">
                  <p>Smartphones</p>
                  <h4>Smartphone 6S 32GB<br> LTE</h4>
                  <img class="img img-responsive" src="{{ asset("assets/img/GoldPhone-250x232.png") }}"<br>
                  <strong><p>$1215.00</p></strong>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="slide-box">
                  <p>Smartphones</p>
                  <h4>Smartphone 6S 32GB<br> LTE</h4>
                  <img class="img img-responsive" src="{{ asset("assets/img/GoldPhone-250x232.png") }}"<br>
                  <strong><p>$1215.00</p></strong>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="slide-box">
                  <p>Smartphones</p>
                  <h4>Smartphone 6S 32GB<br> LTE</h4>
                  <img class="img img-responsive" src="{{ asset("assets/img/GoldPhone-250x232.png") }}"<br>
                  <strong><p>$1215.00</p></strong>
              </div>
            </div>
          </div>

          
        </div>
        <div class="col-sm-5"></div>
      </div>
    </div>
  </div>
</section>

<!--Top Categories-->
  <section>
    <div class="container">
      <div class="top-cat">
        <div class="row">
          <h3 class="title"><span class="bot-cont">Top Categories of this Month</span></h3>
          <div class="col-sm-4 mid-border">
            <div class="cat-item">  
                  <div class="col-sm-6">
                    <img class="img img-responsive" src="{{ asset("assets/img/Mobiles-250x232.jpg") }}">
                  </div>
                  <div class="col-sm-6 cat-info">
                    <strong>Smart Phones & Tablets</strong>
                    <p>Accessories<br>Chargers<br>Powerbanks<br>Smartphones</p>
                    <strong class="see">See all</strong>
                  </div>                  
                </div>
                <div class="clearfix"></div>
                <div class="cat-item">  
                  <div class="col-sm-6">
                    <img class="img img-responsive" src="{{ asset("assets/img/Mobiles-250x232.jpg") }}">
                  </div>
                  <div class="col-sm-6 cat-info">
                    <strong>Smart Phones & Tablets</strong>
                    <p>Accessories<br>Chargers<br>Powerbanks<br>Smartphones</p>
                    <strong class="see">See all</strong>
                  </div>                  
                </div>
          </div>
          <div class="col-sm-4 mid-border">
            <div class="cat-item">  
                  <div class="col-sm-6">
                    <img class="img img-responsive" src="{{ asset("assets/img/Mobiles-250x232.jpg") }}">
                  </div>
                  <div class="col-sm-6 cat-info">
                    <strong>Smart Phones & Tablets</strong>
                    <p>Accessories<br>Chargers<br>Powerbanks<br>Smartphones</p>
                    <strong class="see">See all</strong>
                  </div>                  
                </div>
                <div class="clearfix"></div>
                <div class="cat-item">  
                  <div class="col-sm-6">
                    <img class="img img-responsive" src="{{ asset("assets/img/Mobiles-250x232.jpg") }}">
                  </div>
                  <div class="col-sm-6 cat-info">
                    <strong>Smart Phones & Tablets</strong>
                    <p>Accessories<br>Chargers<br>Powerbanks<br>Smartphones</p>
                    <strong class="see">See all</strong>
                  </div>                  
                </div>
          </div>
          <div class="col-sm-4 mid-border">
            <div class="cat-item">  
                  <div class="col-sm-6">
                    <img class="img img-responsive" src="{{ asset("assets/img/Mobiles-250x232.jpg") }}">
                  </div>
                  <div class="col-sm-6 cat-info">
                    <strong>Smart Phones & Tablets</strong>
                    <p>Accessories<br>Chargers<br>Powerbanks<br>Smartphones</p>
                    <strong class="see">See all</strong>
                  </div>                  
                </div>
                <div class="clearfix"></div>
                <div class="cat-item">  
                  <div class="col-sm-6">
                    <img class="img img-responsive" src="{{ asset("assets/img/Mobiles-250x232.jpg") }}">
                  </div>
                  <div class="col-sm-6 cat-info">
                    <strong>Smart Phones & Tablets</strong>
                    <p>Accessories<br>Chargers<br>Powerbanks<br>Smartphones</p>
                    <strong class="see">See all</strong>
                  </div>                  
                </div>
          </div>          
        </div>
      </div>
    </div>
  </section>


<!--Sign-up-->
  <section>
    <div class="sign-up">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <h2>Sign up to Newsletter</h2>
          </div>
          <div class="col-sm-6">
            <form class="form-inline">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter your email address">
              </div>
              
              <button type="submit" class="btn btn-default">Subscribe</button>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

<!--Footer-->   
<footer>
  <section>
    <div class="container">
      <div class="footer-top">
        <div class="row">
          <div class="col-sm-4">
            <img class="img img-responsive" src="{{ asset("assets/img/LOGO.png") }}" alt="">
            <div class="fsize">
              <strong>Got Questions ? Call us 24/7!</strong><br> 
              (800) 8001-8588, (0600) 874 548
            </div>
            <div class="contact fsize">
              <strong>Contact Info</strong><br>
              17 Princess Road, London, Greater<br> 
              London NW1 8JR, UK
            </div>
            <div class="icon">
              <ul>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="fsize">
              <div class="title">
                <strong>Find It Fast</strong>
              </div>
              <p>Laptops & Computers</p>
              <p>Cameras & Photography</p>
              <p>Smart Phones & Tablets</p>
              <p>Video Games & Consoles</p>
              <p>TV & Audio</p>
              <p>Gadgets</p>
              <p>Car Electronic & GPS</p>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="fsize">
              <div class="title">
                <strong>Customer Care</strong>
              </div>
              <p>Customer Info</p>
              <p>My Account</p>
              <p>Customer Service</p>
              <p>Returns/Exchange</p>
              <p>FAQs</p>
              <p>Product Support</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="text col-sm-4">
            <h3>© Elavanto - All Rights Reserved</h3>
          </div>
          <div class="col-sm-8">
            <ul>
              <li><a href="#"><img class="img img-responsive" src="{{ asset("assets/img/payment-discover.png" ) }}" alt=""></a></li>
              <li><a href="#"><img class="img img-responsive" src="{{ asset("assets/img/payment-master.png" ) }}" alt=""></a></li>
              <li><a href="#"><img class="img img-responsive" src="{{ asset("assets/img/payment-paypal.png" ) }}" alt=""></a></li>
              <li><a href="#"><img class="img img-responsive" src="{{ asset("assets/img/payment-skrill.png" ) }}" alt=""></a></li>
              <li><a href="#"><img class="img img-responsive" src="{{ asset("assets/img/payment-visa.png" ) }}" alt=""></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="{{ asset("assets/bootstrap/js/bootstrap.min.js") }}"></script>
</body>
</html>