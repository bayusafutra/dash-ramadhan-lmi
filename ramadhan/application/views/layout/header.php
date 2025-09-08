<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard Ramadhan</title>

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('public') ?>/assets/css/bootstrap.css">

	<link rel="stylesheet" href="<?= base_url('public') ?>/assets/vendors/simple-datatables/style.css">

	<link rel="stylesheet" href="<?= base_url('public') ?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" href="<?= base_url('public') ?>/assets/vendors/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" href="<?= base_url('public') ?>/assets/css/app.css">
	<link rel="shortcut icon" href="<?= base_url('public') ?>/assets/images/favicon.svg" type="image/x-icon">

	<style>
		.table-responsive table th {
			width: auto !important;
			height: 60px;
			white-space: nowrap;
		}

		.table-responsive table td {
			width: auto !important;
			/* height: 20px; */
			white-space: nowrap;
		}

		.fixed-header th:first-child {
			position: sticky;
			left: 0;
			z-index: 2;
			background-color: white;
		}

		.fixed-header th:nth-child(2) {
			position: sticky;
			left: 111px;
			z-index: 2;
			background-color: white;
		}

		.fixed-nav th:first-child {
			position: sticky;
			left: 0;
			z-index: 2;
			background-color: black;
		}

		.fixed-nav th:nth-child(2) {
			position: sticky;
			left: 111px;
			z-index: 2;
			background-color: black;
		}

		.fixed-column td:first-child {
			position: sticky;
			left: 0;
			z-index: 1;
			background-color: white;
		}

		.fixed-column td:nth-child(2) {
			position: sticky;
			left: 111px;
			z-index: 1;
			background-color: white;
		}
	</style>
</head>

<body>