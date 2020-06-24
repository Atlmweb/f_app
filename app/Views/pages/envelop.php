<html>
	<head>
		
		<style>

			@font-face {
			  font-family: 'Norican';
			  font-style: normal;
			  font-weight: 400;
			  src: local('Norican Regular'), local('Norican-Regular'), url(http://themes.googleusercontent.com/static/fonts/norican/v1/WG5BKl7e-3DIN75Tz4bREg.woff) format('woff');
			}

			@font-face {
			  font-family: 'Bilbo Swash Caps';
			  font-style: normal;
			  font-weight: 400;
			  src: local('Bilbo Swash Caps'), local('BilboSwashCaps-Regular'), url(http://themes.googleusercontent.com/static/fonts/bilboswashcaps/v4/UB_-crLvhx-PwGKW1oosDpbko4ywDBcg2f1uYutDOWY.woff) format('woff');
			}

 
			 .open{ 	
			 	position:absolute;
			 	top:60%;
			 	left:50%;
			 	margin-left:-250px;
			 	margin-top:-150px;
			 	width:0;
			 	height:0;
			 	border:solid 250px transparent;
			 	border-top:solid 150px #E3E3E3;
			 	border-bottom:none;
			 	z-index:3;
			 	-webkit-transform-origin: 50% 0;
				-moz-transform-origin: 50% 0;
				transform-origin: 50% 0;

				-webkit-transform: perspective(500);
				-moz-transform: perspective(500);
				transform: perspective(500);

				-webkit-transition: all 1.0s 100ms linear;
				-moz-transition: all 1.0s 100ms linear;
				transition: all 1.0s linear;
				-webkit-filter: drop-shadow(0 0 0 gray);
			 }

			 .envelope > p{
			 	position:absolute;
			 	right:15px;
			 	bottom:25px;
			 	font-family: 'Norican';
			 	color:#00698C;
			 	text-shadow:0 1px 0 black;
			 	font-size:15px;
			 }
 
			 .envelope  span{
			 	font-family: 'Arial';
			 	font-weight:bold;
			 }

 
			 .envelope > p:nth-child(2){
			 	bottom:0;
			 }

			 .envelope{
			 	position:absolute;
				left:50%;
				top:60%;
			 	width:500px;
			 	height:300px;
			 	margin-left:-250px;
			 	margin-top:-150px;
			 	background: #EBEBEB;
			 	background: -webkit-linear-gradient(90deg, #EBEBEB 0%, #F7F7F7 50%);
				background: -moz-linear-gradient(90deg, #EBEBEB 0%, #F7F7F7 50%);
				background: linear-gradient(90deg, #EBEBEB 0%, #F7F7F7 50%);

				box-shadow:0 1px 5px -2px black;
	
			 }
 

			 .content{	
			 	position:absolute; 
			 	top:60%;
			 	left:50%;
			 	margin-left:-200px;
			 	margin-top:-150px;
			 	width:400px; 	
			 	height:0;
				overflow:hidden;
			 	background:#00698C;
			  background: -webkit-radial-gradient( ellipse, 
			rgba(240,241,242,0.8) 10px, transparent  10px) 
			0 0 repeat-y, -webkit-linear-gradient(90deg, rgba(0,105,140,0.8) 0%, 
			white 5%, rgba(0,105,140,0.8) 0%)0 0 repeat-y,
			    -webkit-linear-gradient(0deg, transparent   0%, 
			gray 5%, transparent   0%)40px 0 repeat-y;
			background: -moz-radial-gradient( ellipse, 
			rgba(240,241,242,0.8) 10px, transparent  10px) 
			0 0 repeat-y, -moz-linear-gradient(90deg, rgba(0,105,140,0.8) 0%, 
			white 5%, rgba(0,105,140,0.8) 0%)0 0 repeat-y,
			-moz-linear-gradient(0deg, transparent   0%, 
			gray 5%, transparent   0%)40px 0 repeat-y;
			background:radial-gradient( ellipse, 
			rgba(240,241,242,0.8) 10px, transparent  10px) 
			0 0 repeat-y, 
			linear-gradient(to top, rgba(0,105,140,0.8) 0%, 
			white 5%, rgba(0,105,140,0.8) 0%)0 0 repeat-y,
			    -webkit-linear-gradient(0deg, transparent   0%, 
			gray 5%, transparent   0%)50px 0 repeat-y;

			-webkit-background-size: 30px 30px, 100% 30px;
			-moz-background-size: 30px 30px, 100% 30px;
			background-size: 30px 30px, 100% 30px, 30px 100%;

			 	z-index:3;
				-webkit-transition: all 1s linear;
				-moz-transition: all 1s linear;
				transition: all 1s linear;

				-webkit-box-shadow: 1px 0 2px black, -1px 0 2px black;
				box-shadow: 1px 0 2px black, -1px 0 2px black;

			}
 
			.content > p{	
				width:300px;
				margin:0 auto;
				font-family: 'Bilbo Swash Caps';
				text-align:left;
				font-size:25px;
				color:#FFF;
				text-shadow:1px 1px 0 black;
				line-height:30px;
			    text-align:justify;

			}

			.content > p:nth-child(2){	
				font-family: 'Norican';
				font-size:20px;
			    text-align:center;
			}

			 .envelope:hover + .open{
			 	-webkit-transform: rotateX(180deg);
				-moz-transform: rotateX(180deg);
				transform: rotateX(180deg);
			 }
 
			 .envelope:hover ~ .content{ 	
				-webkit-transition: all 1s 1.5s linear;
				-moz-transition: all 1s 1.5s linear;
				transition: all 1s 1s linear;
				height:130px;
				margin-top:-280px;
				opacity:1;
			 }

			 .envelope:before {
				display: block;
				position: absolute;
				top: 65%;
				left: -2%;
				content: "";
				background-color: transparent;
				width: 80px;
				height: 43px;
				border-radius: 1%;

				-webkit-transform: matrix(2.13,-0.23,0.33,1.68,0,0);
				-moz-transform: matrix(2.13,-0.23,0.33,1.68,0,0);
				transform: matrix(2.13,-0.23,0.33,1.68,0,0);

				-webkit-transform-origin: center;
				-moz-transform-origin: center;
				transform-origin: center;

				-webkit-box-shadow: 42px 31px 20px rgba(0,0,0,0.85);
				box-shadow: 42px 31px 20px rgba(0,0,0,0.85);
				 z-index:   -1;
	
			}

			.envelope:after {
				display: block;
				position: absolute;
				top: 59%;
				left: 50%;
				content: "";
				background-color: transparent;
				width: 80px;
				height: 43px;
				border-radius: 1%;

				-webkit-transform: matrix(-2.17,-0.16,-0.22,1.71,0,0);
				-moz-transform: matrix(-2.17,-0.16,-0.22,1.71,0,0);
				transform: matrix(-2.17,-0.16,-0.22,1.71,0,0);

				-webkit-transform-origin: center;
				-moz-transform-origin: center;
				transform-origin: center;

				-webkit-box-shadow: -42px 31px 20px rgba(0,0,0,0.85);
				box-shadow: -42px 31px 20px rgba(0,0,0,0.85);
	
				z-index:   -1;
	
			}
		</style>
	</head>
	
	<body>
		
		<div class="envelope">
			<p>From: <span>Faustina Awuntayami</span></p>
			<p>To: <span>Christ Embassy Nungua</span></p> 
		  </div>
		  <div class="open"></div>
		  <div class="content">
			<p>Total amount: $500.</p>
			<p>Healing school, Rhapsody Innercity Mision.</p>
			<p>Thank you very much for your seed</p>
			
		
		  </div>
	</body>
	
</html>