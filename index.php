<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<script src="js/jquery-3.7.0.slim.js" defer></script>
	<script src="main.js" async></script>
	<script src="app.js" defer></script>
    <script src="js/bootstrap/bootstrap.min.js" defer></script>
	<link rel="stylesheet" href="DataTables/datatables.min.css">
	<script src="DataTables/datatables.min.js" defer></script>
	<title>CampusLands</title>
</head>
<body>
    	<!-- SIDEBAR -->
		<section id="sidebar">
			<a href="#" class="brand"><i class='bx bxs-smile icon'></i> CampusLands</a>
			<ul class="side-menu">
				<li><a href="#" class="active"><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
				<li class="divider" data-text="main">Principal</li>
				<li>
					<a href="#"><i class='bx bxs-inbox icon' ></i> Ubicaciones <i class='bx bx-chevron-right icon-right' ></i></a>
					<ul class="side-dropdown">
						<li><a class="enlace" data-urldestino="view/Paises/mainPais.php" href="#">Paises</a></li>
						<li><a class="enlace" data-urldestino="view/Departamentos/mainDepartamento.php" href="#">Departamentos</a></li>
						<li><a class="enlace" data-urldestino="view/Regiones/maiRegiones.php" href="#">Regiones</a></li>
					</ul>
				</li>
				<li><a href="#"><i class='bx bxs-chart icon' ></i> Gráficos</a></li>
				<li><a href="#"><i class='bx bxs-widget icon' ></i> Widgets</a></li>
				<li class="divider" data-text="table and forms">Tabla y formularios</li>
				<li><a href="#"><i class='bx bx-table icon' ></i> Tables</a></li>
				<li>
					<a href="#"><i class='bx bxs-notepad icon' ></i> formularios <i class='bx bx-chevron-right icon-right' ></i></a>
					<ul class="side-dropdown">
						<li><a href="#">Básico</a></li>
						<li><a href="#">Seleccionar</a></li>
						<li><a href="#">Caja</a></li>
						<li><a href="#">Radio</a></li>
					</ul>
				</li>
			</ul>
		</section>
		<!-- SIDEBAR -->

		<!-- NAVBAR -->
		<section id="content">
			<!-- NAVBAR -->
			<nav>
				<i class='bx bx-menu toggle-sidebar' ></i>
				<form action="#">
					
				</form>
				
				<span class="divider"></span>
				<div class="profile">
					<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ51iCwdnV1WSULONgxt3RyvL20ScvxrQdSVYd7saFKLA&s" alt="">
					<ul class="profile-link">
						<li><a href="#"><i class='bx bxs-user-circle icon' ></i> Perfil</a></li>
						<li><a href="#"><i class='bx bxs-cog' ></i> Ajustes</a></li>
						<li><a href="#"><i class='bx bxs-log-out-circle' ></i> Cerrar sesión</a></li>
					</ul>
				</div>
			</nav>
			<!-- NAVBAR -->

			<!-- MAIN -->
			<main>
				<div class="container">
					<div class="container-content mt-2" id="contentphp">

					</div>
				</div>
			</main>
			<!-- MAIN -->
		</section>
		<!-- NAVBAR -->
</body>
</html>