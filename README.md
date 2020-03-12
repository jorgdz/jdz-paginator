# JDZPaginator

JDZPaginator is a Simple implementation for creating data pagination.


# Instalation

To install this package, run the command below and you will get the latest version
```
composer require jdzm/jdz-paginator
```

# Usage

```
<?php

	$products = array(
		array('id' => 1,'nombre' => 'Producto 1','precio' => 100,'created_at' => date('Y-m-d')),
		array('id' => 2,'nombre' => 'Producto 2','precio' => 200,'created_at' => date('Y-m-d')),
		array('id' => 3,'nombre' => 'Producto 3','precio' => 250,'created_at' => date('Y-m-d')),
		array('id' => 5,'nombre' => 'Producto 4','precio' => 350, 'created_at' => date('Y-m-d')),
		array('id' => 6,'nombre' => 'Producto 5','precio' => 50, 'created_at' => date('Y-m-d'))
	);

$pageNumber = 0;  // Page number for current page
	
$size = 2;   // Elements by page

$offset = $pageNumber * $size;  // get offset

$countArray = sizeof($products);
$products = array_slice($products, $offset, $size);

use Jdzm\JDZPaginator\Pagination\Paginator;
$paginator = new Paginator($pageNumber, $size, $countArray);

header('Content-Type: application/json');
	$data = [
		'data' => $products,
		'pagination' => $paginator->paginate()
	];
	
echo json_encode($data);   // GET DATA IN JSON FORMAT

```
