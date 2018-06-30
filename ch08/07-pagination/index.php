<?php 
	require_once "connect.php";

	// Tổng số phần tử.
	$totalItems   	= $db->totalItems("SELECT COUNT(`id`) AS total_items FROM `$params[table]`");

	// Tống số phần tử trên 1 trang.
	$itemSPerPage 	= 1;

	// Tống số phần tử trên 1 trang.
	$pageRange 		= 5;
	if($pageRange % 2 == 0) $pageRange = $pageRange + 1;

	// Tổng số trang
	$totalPage 		= ceil($totalItems / $itemSPerPage);

	// Trang hiện tại.
	$currentPage  	= (isset($_GET['page']) == 1) ? $_GET['page'] : 1;

	if ($currentPage < 1 || $currentPage > $totalPage) {
		header('location: errors.php');
		exit();
	}	

	$listPage 	    = '';
	$paginationHTML = '';

	if ($totalPage > 1) {
		$first = '<li>First</li>';
		$prev  = '<li>Previous</li>';
		if ($currentPage > 1) {
			$first = '<li><a href="?page=1">First</a></li>';
			$prev = '<li><a href="?page='. ($currentPage - 1) .'">Previous</a></li>';
		}

		$next  = '<li>Next</li>';
		$last   = '<li>Last</li>';
		if ($currentPage < $totalPage) {
			$next = '<li><a href="?page='. ($currentPage + 1) .'">Next</a></li>';
			$last = '<li><a href="?page='. $totalPage .'">Last</a></li>';
		}
		
		if ($pageRange < $totalPage) {
			if ($currentPage == 1) {
				$start 	  = 1;
				$end 	  = $pageRange;
			} else if($currentPage == $totalPage) {
				$start 	  = $totalPage - $pageRange + 1;
				$end 	  = $totalPage;
			} else {
				$start 	  = $currentPage - ($pageRange-1)/2;
				$end 	  = $currentPage + ($pageRange-1)/2;

				if ($start < 1) {
					$start = 1;
					$end   = $end + 1;
				}

				if ($end > $totalPage) {
					$end   = $totalPage;
					$start = $end - $pageRange + 1;
				}
			}
		} else {
			$start 	  = 1;
			$end 	  = $totalPage;
		}
		
		for ($i = $start; $i <= $end; $i++) { 
			if ($i == $currentPage) {
				$listPage .= '<li class="active"><a href="?page='. $i .'">'. $i .'</a></li>';
			} else {
				$listPage .= '<li><a href="?page='. $i .'">'. $i .'</a></li>';
			}
		}
		
		// Pagination
		$paginationHTML = '<ul class="pagination">' . $first . $prev . $listPage . $next . $last . '</ul>';
	}
	
	
	$pos = ($currentPage - 1) * $itemSPerPage;

	$query[] = "SELECT `id`, `username`, CONCAT(`firstname`, ' ', `lastname`) AS `fullname`, `email`, `birthday`, `status`, `ordering`";
	$query[] = "FROM `$params[table]`";
	$query[] = "LIMIT $pos, $itemSPerPage";

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
