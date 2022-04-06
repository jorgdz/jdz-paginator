<?php 
namespace Jdzm\JDZPaginator\Pagination\Contracts;

/**
*	@return interface numbers pages and get paginate data
*/
interface IPaginator 
{
	function getNumbersPage ();

	function paginate();
}