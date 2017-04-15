<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Electronics Store</title>

  <link rel="stylesheet" type="text/css" href="{{ asset("assets/bootstrap/css/bootstrap.min.css") }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/style.css") }}"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.6/css/jquery.fancybox.min.css" />
   <script>
   	var current_product_link = undefined;
   	function get_affiliate_link(){
   		var uid = "{{ Auth::guard('donar')->user()->id}}";
   		var chid = document.getElementById("charity-list").value;
   		var url = current_product_link+"?cid="+chid;
   		if(uid!="") url += "&uid="+uid;
   		// window.location.href=url;
   		console.log(url);   		
   	}
   </script>
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
              <div class="form-group">
                <input type="text" class="form-control no-border" name="search_product" placeholder="Search for products">
              </div>
              <div class="form-group">
                <select class="form-control no-border" name="search_category" style="outline:none;
    box-shadow: none;">
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
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					@foreach($articles as $artical)												  
					    <div class="col-sm-4">
			              <div class="slide-box" style="width: 100%;text-align: center;">			              
			                  <h4>{{ $artical->name}}</h4>			             
			                  <a href="#mxf" class="various" onclick="current_product_link='{{ $artical->url }}'"><img class="img img-responsive" style="width: 100%;" src="{{ asset("upload/images/".$artical->image_path) }}"</a>
			                  <strong><p>$1215.00</p></strong>
			              </div>
			            </div>								
					@endforeach									
				</div>
			</div>				
			<div class="col-md-4">
			  <h3 class="title"><span class="bot-cont">Home Entertainment</span></h3>
			  <div id="slider-2" class="carousel slide" data-ride="carousel">
			    <!-- Indicators -->
			    <ol style="margin-bottom: -18px;

			    " class="carousel-indicators">
			      <li data-target="#slider-2" data-slide-to="0" class="active"></li>
			      <li data-target="#slider-2" data-slide-to="1"></li>
			    </ol>

			    <!-- Wrapper for slides -->
			    <div class="carousel-inner" role="listbox" style="text-align:center">
			        <div class="item active">
			          
			          <div class="row">
			            <div class="col-sm-12">
			              <div class="slide-box">
			                <p>Smartphones</p>
			                <h3>Smartphone 6S 32GB<br> LTE</h3>
			                <img class="img" src="{{ asset("assets/img/GoldPhone-250x232.png") }}"<br>
			                <p><strong>$1215.00</strong></p>
			              </div>
			            </div>
			            <!-- <div class="col-sm-4">
			              <div class="slide-box">
			                <p>Smartphones</p>
			                <h3>Smartphone 6S 32GB<br> LTE</h3>
			                <img class="img img-responsive" src="{{ asset("assets/img/GoldPhone-250x232.png") }}"<br>
			                <strong>$1215.00</strong>
			              </div>
			            </div> -->
			          </div>
			        </div>
			        <div class="item">
			              <div class="row">
			                <div class="col-sm-12">
			                  <div class="slide-box">
			                    <p>Smartphones</p>
			                    <h3>Smartphone 6S 32GB<br> LTE</h3>
			                    <img class="img " src="{{ asset("assets/img/GoldPhone-250x232.png") }}"<br>
			                    <p><strong>$1215.00</strong></p>
			                  </div>
			                </div>
			                <!-- <div class="col-sm-4">
			                  <div class="slide-box">
			                    <p>Smartphones</p>
			                    <h3>Smartphone 6S 32GB<br> LTE</h3>
			                    <img class="img img-responsive" src="{{ asset("assets/img/GoldPhone-250x232.png") }}"<br>
			                    <strong>$1215.00</strong>
			                  </div>
			                </div> -->
			    
			    </div>

			    <!-- Controls -->
			    <!-- <div class="angle">
			      <a class="" href="#slider-2" role="button" data-slide="prev">
			        <i class="fa fa-angle-left" aria-hidden="true"></i>
			        <span class="sr-only">Previous</span>
			      </a>
			      <a class="" href="#slider-2" role="button" data-slide="next">
			        <i class="fa fa-angle-right" aria-hidden="true"></i>
			        <span class="sr-only">Next</span>
			      </a>
			    </div> -->
					  </div>
					</div>
				</div>
			</div>				
		</div>
		<div id="mxf" class="popup_window" style="display:none;width:500px;height:250px;max-width:100%">
			<h4>Select your Charity to donate</h4>
			<div class="text-center">
				<select class="form-control seclect_form" id="charity-list">
					@foreach($charitys as $charity)
						<option value="{{$charity->id}}">{{ $charity->name }}</option>
					@endforeach
				</select>				
			</div>
			<div>
				<button onclick="get_affiliate_link()" style="background-color:#ff7706" class="btn  link_button">Product Link</button>				
			</div>
		</div>
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="{{ asset("assets/bootstrap/js/bootstrap.min.js") }}"></script>
	<script src ="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.6/js/jquery.fancybox.min.js"></script>
	<script>
		$(function(e)
			{
				$('.various').fancybox({
					openEffect	: 'elastic',
			    	closeEffect	: 'elastic',
					maxWidth: 500,
					maxHeight:300,
					padding:00,
				});
			});
	</script>
</body>

</html>