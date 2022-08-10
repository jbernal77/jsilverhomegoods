<!-- ******************************************
*  Author : Payton McCormick, Jonathan Bernal, Adam Mazur, Sajen Vasuthevan
*  Created On : Wed Aug 10 2022
*  File : adminhelp.html
******************************************* -->


<?=template_header('Admin')?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<meta name="description" content="JSilverHomegoods Admin Features">   
<meta name="keywords" content="List of Admin Features">
<?=template_navbar('Admin')?>

<h2 class="text-center bold">Admin Features</h2>
<p>&nbsp;&nbsp;As an admin on our site you will get special features not accessible to other users. These features include:<br>
	<br>
	<ul>
		<li>Add accounts.</li>
		<li>Remove acounts.</li>
		<li>Update user records.</li> 
		<li>Disable accounts without removing them.</li>
		<li>Generate a list of all registered users and generate an email list.</li>
	</ul>
	</p>
<?=template_footer('Admin')?>