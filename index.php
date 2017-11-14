<?php include("common/head.html"); ?>
<title>Foodie</title>
<?php include("common/header.html"); ?>
<?php
//connect database and get cities
require_once("functions.php");
if(!connectDb()){
die('Could not connect tourism: ' . mysql_error());
}
$query = "SELECT * FROM city";
$result = mysql_query($query);
$city_name = [];
$i = 0;
$len = mysql_num_rows($result);
while($row=mysql_fetch_assoc($result))
{
$city_id[$i] = $row['city_id'];
$city_name[$i++] = $row['name'];
}

?>

<div class="header">
	<div class="container">
		<div class="header-main">
			  <div class="logo">
			  	<h1><a href="index.php">Foodie</a></h1>
			  </div>
        </div>
	</div>
</div>			
<div class="navg-strip">
    <div class="container">
      <div class="navg-main">
		 <div class="top-nav">
		 	 <span class="menu"> <img src="images/icon.png" alt=""/></span>
			<ul class="res">
				<li><a href="index.php" class="active">Home</a></li>
				<li><a class="scroll" href="#services">Services</a></li>
				<li><a class="scroll" href="#about">About Us</a></li>
				<li><a class="scroll" href="#contact">Contact</a></li>
			</ul>

		 </div>
		 <div class="header-right">
<!--			<div class="search-in" >-->
<!--				<div class="search" >-->
<!--					<form >-->
<!--						<input type="text"  class="text">-->
<!--						<input type="submit" value="SEARCH">-->
<!--					</form>-->
<!--					<div class="close-in"><img src="images/s-close.png" alt="" /></div>-->
<!--				</div>-->
<!--				<div class="right"><button> </button></div>-->
<!--		   </div>-->
<!--		   <script type="text/javascript">-->
<!--				$('.search').hide();-->
<!--				$('button').click(function (){-->
<!--				$('.search').show();-->
<!--				$('.text').focus();-->
<!--				}-->
<!--				);-->
<!--				$('.close-in').click(function(){-->
<!--				$('.search').hide();-->
<!--				});-->
<!--			</script>-->
			 <?php
				 //start session
				 session_start();
				 if (get_user_name()==null) {
					 echo '<div class="r-float">';
					 echo '<a href="login.php"><button type="button" class="btn btn-success" id="login-user-btn">Log In</button></a>';
					 echo '<a href="register.php"><button type="button" class="btn btn-default" id="signup-user-btn" style="margin-left: 20px;">Sign Up</button></a>';
				 	 echo '</div>';
				 } else {
					 echo '<div class="r-float">';
					 if(get_user_status()==2){
						 echo "Hello, <a href=\"merchant/index.php\">".get_user_name()."</a>";
					 }
					 else{
						 echo "Hello, <a href=\"customer/index.php\">".get_user_name()."</a>";
					 }
					 echo '</div>';
				 }
			 ?>
<!--			 <a href="login.php"><button type="button" class="btn btn-success" id="login-user-btn">Log In</button></a>-->
<!--			 <a href="register.php"><button type="button" class="btn btn-default" id="signup-user-btn">Sign Up</button></a>-->

		  <div class="clearfix"> </div>
		</div>
	  <div class="clearfix"> </div>
   </div>
  </div>
</div>
<!--header end here-->
<!--banner start here-->
<div class="banner">
	<div class="container">
		<div class="banner-title col-sm-12 col-lg-12">
			<h2>Your best assistant of tourism</h2>

		</div>
		<div class="banner-main">
			<div class="col-sm-5 panel panel-default form-box">
				<div class="panel-heading" style="color:#f8565d; font-size: large; font-weight: bold">
					SEARCH FOR PLACES TO EAT
				</div>
				<div class="panel-body">
					<form role="form" action="search_controller.php" method="post" id="searchForm" data-parsley-validate>
						<div class="form-group col-sm-12">
							<div class="col-sm-4">
								<label style="vertical-align: middle" for="city">City:</label>
							</div>
							<div class="col-sm-8">
								<select name="city" class="selectpicker">
									<?php
									for ($i=0;$i<$len;$i++){
										echo "<option value=".$city_id[$i].">".$city_name[$i]."</option >";
									}
									?>
								</select>
							</div>
						</div>

						<div class="form-group col-sm-12">
							<div class="col-sm-4">
								<label style="vertical-align: middle" for="form-type">Type:</label>
							</div>
							<div class="col-sm-8">
								<select name="type" class="selectpicker">
									<option value="default">please select</option >
									<option value="sea">Seafood</option >
									<option value="cafe">Cafe/Beverage</option >
									<option value="dessert">Dessert</option >
									<option value="fast_food">Fast Food</option >
									<option value="bbq">BBQ</option >
									<option value="sushi">Sushi</option >
								</select>
							</div>
						</div>
						<div class="form-group col-sm-12">
							<div class="col-sm-4">
								<label style="vertical-align: middle" for="form-price">Price range:</label>
							</div>
							<div class="col-sm-8">
								<select name="price" class="selectpicker">
									<option value="default">please select</option >
									<option value="1">1~50</option >
									<option value="51">51~100</option >
									<option value="101">101~200</option >
									<option value="201">201~400</option >
									<option value="401">401~800</option >
								</select>
							</div>
						</div>
						<div class="form-group col-sm-12">
							<div class="col-sm-4">
								<label style="vertical-align: middle" for="form-other">Other requirements:</label>
							</div>
							<div class="col-sm-8">
								<input type="text" name="other" placeholder="Key words like landmark or dishes"
									   class="form-control" id="form-other"  data-parsley-trigger="blur" data-parsley-required>
							</div>
						</div>
						<button type="submit" class="btn btn-block sign-up-main btn-warning" ><strong>Search!</strong></button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div
<!--banner end here-->

<!--services start here-->
<div class="services" id="services">
	<div class="services-main">
		<div class="ser-top">
			<h3>Services</h3>
			<p>Foodie is a travel plan customization system providing you detailed travel plans based on the food.</p>
		</div>
		<div class="ser-bottom">
		  <div class="col-md-6 service-left">
		  	<img src="images/ser1.jpg" alt="" class="img-responsive">
		  </div>
		  <div class="col-md-6 services-right">
		  	<div class="ser-grid">
		  		<span class="glyphicon glyphicon-plane ser-icon" aria-hidden="true"> </span>
		  		<div class="ser-text">
		  			<h4>Good Journey</h4>
		  			<p>We provide you travel plans to over 300 countries and regions.</p>
		  		</div>
		  	   <div class="clearfix"> </div>
		  	</div>
		  	<div class="ser-grid">
		  		<span class="glyphicon glyphicon-glass ser-icon" aria-hidden="true"> </span>
		  		<div class="ser-text">
		  			<h4>Good Scenery</h4>
		  			<p>Man who travels far knows more. </p>
		  		</div>
		  	   <div class="clearfix"> </div>
		  	</div>
		  	<div class="ser-grid">
		  		<span class="glyphicon glyphicon-cutlery ser-icon" aria-hidden="true"> </span>
		  		<div class="ser-text">
		  			<h4>Good Food</h4>
		  			<p>There is no love sincerer than the love of food.</p>
		  		</div>
		  	   <div class="clearfix"> </div>
		  	</div>
		  </div>
		   <div class="clearfix"> </div>
	    </div>
	</div>
</div>
<!--services end here-->
	<!--about start here-->
	<div class="about" id="about">
		<div class="container">
			<div class="about-main">
				<div class="about-bottom">
					<div class="col-md-6 about-left">
						<h4>Foodie</h4>
						<h5>Never fail to live up to delicacy and love</h5>
						<p>If, for the sake of amour and cuisine, I must pay,I would then give my life away</p>
						<div class="about-grid">
							<div class="ab-sub-gd">
								<span class="glyphicon glyphicon-star-empty ab-gd-img" aria-hidden="true"> </span>
								<div class="ab-gd-text">
									<h6>Looking for something sweet?</h6>
									<p>Check for the <a href="http://www.openrice.com/en/hongkong/article/top-15-afternoon-tea-hotspots/1913">Top 15 Afternoon Tea Hotspots</a></p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="ab-sub-gd">
								<span class="glyphicon glyphicon-cloud ab-gd-img" aria-hidden="true"> </span>
								<div class="ab-gd-text">
									<h6>Looking for something fancy?</h6>
									<p>Check for the <a href="http://www.openrice.com/en/hongkong/article/top-5-fancy-ice-creams-for-summer/2194?tc=art&con=lastest">Top 5 Fancy Ice Creams for Summer</a></p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="ab-sub-gd">
								<span class="glyphicon glyphicon-leaf ab-gd-img" aria-hidden="true"> </span>
								<div class="ab-gd-text">
									<h6>Looking for something special?</h6>
									<p>Check for the <a href="http://www.openrice.com/info/novfeast/index-en.html?utm_campaign=novfeast&utm_medium=home&utm_source=or&utm_content=indextop&utm_term=en">Discover a world</a></p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 about-right">
						<a href="single.html"><img src="images/ab.jpg" alt="" class="img-responsive"></a>
						<p>We plan, we toil, we suffer - in the hope of what?  A camel-load of idol's eyes? The title deeds of Radio City? The empire of Asia? A trip to the moon? No, no, no, no. Simply to wake just in time to smell coffee and bacon and eggs. -J.B. Priestly</p>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
	<!--contaact start here-->
	<div class="contact" id="contact">
		<div class="container">
			<div class="contact-main">
				<div class="contact-top">
					<h3>Contact</h3>
					<p>Cannot find a particular restaurant here? Have some advise on our website? Please send us an email.</p>
				</div>
				<div class="contact-bottom">
					<div class="col-md-6 contact-left">
						<input type="text" placeholder="Name" required="">
						<input type="text" placeholder="Email" required="">
						<input type="text" placeholder="Phone" required="">
					</div>
					<div class="col-md-6 contact-right">
						<textarea placeholder="Message" required=""></textarea>
						<input type="submit"  value="Submit">
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
	<!--contact end here-->

<?php include("common/footer.html");?>
<?php include("common/foot.html"); ?>
