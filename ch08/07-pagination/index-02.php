<?php 
	require_once "connect.php";
	require_once "class/Pagination.class.php";

	$totalItems   	= $db->totalItems("SELECT COUNT(`id`) AS total_items FROM `$params[table]`");
	$itemsPerPage 	= 1;	
	$pageRange 		= 5;	
	$totalPage 		= ceil($totalItems / $itemsPerPage);	
	$currentPage  	= (isset($_GET['page']) == 1) ? $_GET['page'] : 1;

	$paginator = new Pagination($totalItems, $itemsPerPage, $pageRange, $currentPage);

	$paginationHTML = $paginator->showPaging();
	
	
	$pos = ($currentPage - 1) * $itemsPerPage;

	$query[] = "SELECT `id`, `username`, CONCAT(`firstname`, ' ', `lastname`) AS `fullname`, `email`, `birthday`, `status`, `ordering`";
	$query[] = "FROM `$params[table]`";
	$query[] = "LIMIT $pos, $itemsPerPage";

	$query = implode(' ', $query);

	$list = $db->listRecord($query);

	if (!empty($list)) {
		$xhtml = '';
		$i = 0;
		foreach ($list as $key => $item) {
			$status = ($item['status'] == 0) ? 'Inactive' : 'Active';
			$row = ($i % 2 == 0) ? 'odd' : 'even' ;
			$xhtml  .= '<div class="row '. $row .'">
							<p class="id">'. $item['id'].'</p>
							<p class="username">'. $item['username'].'</p>
							<p class="fullname">'. $item['fullname'].'</p>
							<p class="email">'. $item['email'].'</p>
							<p class="birthday">'. date('d/m/Y', strtotime($item['birthday'])).'</p>
							<p class="status">'. $status .'</p>
							<p class="ordering">'. $item['ordering'].'</p>
						</div>';
			$i++;
		}
	} else {
		$xhtml = 'Dữ liệu đang cập nhật';
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Manage User</title>
</head>
<body>
	<div id="wrapper">
		<div class="title">Manage User</div>
		<div class="list">
			<div class="row head">
				<p class="id">ID</p>
				<p class="username">UserName</p>
				<p class="fullname">Full Name</p>
				<p class="email">Email</p>
				<p class="birthday">Birthday</p>
				<p class="status">Status</p>
				<p class="ordering">Ordering</p>
			</div>
			<?php echo $xhtml; ?>
		</div>
		<div id="pagination">
			<?php echo $paginationHTML; ?>
		</div>
	</div>
</body>
</html>
