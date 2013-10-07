<?php
    if(!isset($_SESSION))
        session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title> .:: ::. </title>
        <script src = "/js/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/css/reset.css">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="/css/style.css"/>
	</head>
	<body>

<div id="header">
    <a href = "/viewer/home_view"><button>Home</button></a>
<?php
    if(!isset($_SESSION['logged_in'])){
        $this->load->view("/site_nav.php");
    }else{
    /*put what the admin can see here
    e.g. Nav bar for the admin
    */
        $this->load->view("/admin_views/admin_nav.php");
    }
?>
</div>