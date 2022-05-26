<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Conswan Library | Main Page</title>
    <link rel="stylesheet" href="css/landingpage.css"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>
  </head>

  <body>
    <div class="containers">
      <div class="left-container">
        <div class="logo" style="padding-top:210px;">&nbsp;&nbsp;&nbsp;WELCOME TO<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/logo_convent.png" alt=""></div>
      </div>

      <div class="right-container">
        <div class="first-block"></div>
        <!--<div class="menu-container">
          <div class="menu">
            <span></span>
            <span></span>
            <span></span>
          </div>-->
        </div>

        <div class="story">
			<!--<p style="text-align:center;" "display: block;" "margin-top: 5px;"><img src="images/logo convent.jpeg" alt=""></p>-->
          <h1 >CONSWAN &nbsp;LIBRARY</h1>
          <p>
            This is a library management system for SMK CONVENT SITIAWAN, PERAK which focuses on the process of managing the borrowing and return of books made by admin and staff for the students of this school. In fact, many more functions can be performed in this system.
          </p><br/><br/>
			<a href="login.php" style="height: 50px;" class="btn">Get Started</a>
        </div>
      </div>
      <!--<div class="center-container"></div>-->
    </div>
    <script type="text/javascript">
      TweenMax.from(".left-container", 2, {
        width: "0",
        ease: Expo.easeInOut
      });
      TweenMax.from(".right-container", 2, {
        delay: 1.0,
        width: "0",
        opacity: "0",
        ease: Expo.easeInOut
      });
      /*TweenMax.from(".center-container", 2, {
        delay: 3,
        width: "0",
        x: -20,
        ease: Expo.easeInOut
      });*/
      TweenMax.from(".logo", 2, {
        delay: 1.0,
        y: 20,
        opacity: 0,
        ease: Expo.easeInOut
      });
      TweenMax.from(".story", 2, {
        delay: 2.0,
        y: 30,
        opacity: 0,
        ease: Expo.easeInOut
      });
      TweenMax.from(".menu", 2, {
        delay: 2.5,
        y: 20,
        opacity: 0,
        rotation: 90,
        ease: Expo.easeInOut
      });
      TweenMax.staggerFrom(
        ".social ul",
        2,
        {
          delay: 3.8,
          opacity: 0,
          y: 20,
          ease: Expo.easeInOut
        },
        0.1
      );
		
	 const buttons =  document.querySelectorAll('a');
		buttons.forEach(btn => {
			btn.addEventListener('click', function(e) {
				let x = e.clientX - e.target.offsetLeft;
				let y = e.clientY - e.target.offsetTop;
			    let ripples = document.createElement('span');
			    ripples.style.left = x + 'px';
			    ripples.style.top = y + 'px';
			    this.appendChild(ripples);
				
				setTimeout(() => {
					ripples.remove()
				},800);
			})
		})
    </script>
  </body>
</html>