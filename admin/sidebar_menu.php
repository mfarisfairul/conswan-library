<div class="col-md-3 left_col">
	<div class="left_col scroll-view">
		<div class="navbar nav_title" style="border: 5;">
			<a href="home.php" class="site_title"> <span> Conswan Library</span></a>
		</div>
		
		<div class="clearfix"></div>
		<a href="">
			<div class="profile" >
				
				
				<div class="profile_pic" >
					&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="home.php"><img src="images/logo_convent.png" style="height:97px; width:93px;" class="img-square profile_img"></a>
				</div>
				<?php  
				?>
			</div>
		</a>
		<br />
		<!-- sidebar menu -->
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
			<div class="menu_section">
				<h3 style="margin-top: 95px;">Main Menu</h3>
				<div class="separator"></div>
				<ul class="nav side-menu">
					<li>
						<a href="home.php" class="active"><i class="fa fa-home"></i> Dashboard</a>
					</li>
					<?php
					$user_query  = mysqli_query($con,"select * from admin_staff where admin_id = '$id_session'")or die(mysqli_error());
					$user_row =mysqli_fetch_array($user_query);
					$admin_type  = $user_row['admin_type'];
					?>
					
					<?php
					if ($admin_type != 'Staff') {
					?>
					
					<li>
						<a href="admin.php"><i class="fa fa-user"></i> Admin & Staff</a>
					</li>
					<?php  } 
					?>
					<li>
						<a href="user.php"><i class="fa fa-users"></i> Students</a>
					</li>
					<li>
						<a href="book.php"><i class="fa fa-book"></i> Books</a>
					</li>
				</ul>
			</div>
			
			<div class="menu_section">
				<h3>Book Transaction</h3>
				<div class="separator"></div>
				<ul class="nav side-menu">
					
					<li>
						<a href="borrowed.php"><i class="fa fa-book"></i> Borrowed Books</a>
					</li>
					<li>
						<a href="returned_book.php"><i class="fa fa-book"></i> Returned Books</a>
					</li>
					<li>
						<a href="settings.php"><i class= "fa fa-cog"></i> Settings</a>
					</li>
					<li>
						<a href="report.php"><i class= "fa fa-file"></i> Report</a>
					</li>
					<li>
						<a href="about.php"><i class="fa fa-info"></i> Developer Info</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- /sidebar menu -->
	</div>
</div>
<!-- end of sidebar navigation -->