<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="css/conswancss/about.css">
<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small><a href="home.php">Home /</a></small> About Us
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
							<br />
							<br />
                    <h1 style="color:#000;" class="heading">Team Members</h1>
	<br>
	<div class="image-container">
		<div class="image" onClick="fetch_info(0)">
			<img src="images/faris.jpg">
		</div>
		<div class="image" onClick="fetch_info(1)">
			<img src="images/imran.jpeg">
		</div>
		<div class="image" onClick="fetch_info(2)">
			<img src="images/wan.jpeg">
		</div>
	</div>
	
	<div class="info-container">
		<img class="profile" id="profile" src="images/faris.jpg">
		<div class="info">
			<h1 class="name" id="name">Muhammad Faris</h1>
			<h3 class="status" id="status">Leader</h3>
			<p class="about" id="about">
				Hello there, I am Muhammad Faris, I am 20 years old. I am originally from Johor Bahru Johor and currently live in Sitiawan, Perak. I am a diploma student in information and communication technology (digital technology) at Sultan Abdul Halim Muadzam Shah Jitra Polytechnic, Kedah.
			</p>
		</div>
	</div>
	<script>
		function fetch_info(i) {
			let profile =["images/faris.jpg","images/imran.jpeg","images/wan.jpeg"];
			let name =[
				"Muhammad Faris",
				"Muhammad Imran",
				"Wan Zikri Izat"
			];
			let status =[
				"Leader",
				"Art Designer",
				"Tester"
			];
			let origin =[
				"Johor Bahru, Johor",
				"Taiping, Perak",
				"Sungai Petani, Kedah"
			];
			let residence =[
				"Taman Kiara, Sitiawan, Perak",
				"Kampung Jambu, Taiping, Perak",
				"Bandar Amanjaya, Sungai Petani, Kedah"
			];
			
			
			document.getElementById("profile").src = profile[i];
			document.getElementById("name").innerHTML = name[i];
			document.getElementById("status").innerHTML = status[i];
			document.getElementById("about").innerHTML=
				"Hello there, I am " + name[i] + 
				". I am 20 years old. I am originally from " + origin[i] + " and currently live in " + residence[i] + ". I am a diploma student in information and communication technology (digital technology) at Sultan Abdul Halim Muadzam Shah Jitra Polytechnic, Kedah.  ";
		}
					</script>
				</div>
			</div>
</div>
        

<?php include ('footer.php'); ?>