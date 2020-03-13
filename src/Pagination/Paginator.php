<?php
namespace Jdzm\JDZPaginator\Pagination;

use Jdzm\JDZPaginator\Pagination\Contracts\IPaginator;

class Paginator extends Page implements IPaginator
{
	public $data = array();
	public $numbersPage = array();

	public function __construct($currentPage, $size, $data = array())
	{
		$this->data = $data;
		parent::__construct($currentPage, $size, $data);
		$this->getNumbersPage();
	}

	/**
	*	@return numbers page
	*/
	public function getNumbersPage ()
	{		
		$first = ($this->current_page) > 4 ? ($this->current_page - 3) : 1;

		while ($first <= ($this->current_page + 3) && $first <= ($this->totalPages + 1)) 
		{
			array_push($this->numbersPage, $first);
			$first ++;
		}
		return $this->numbersPage;
	}


	/**
	*	@return paginator render
	*/
	public function paginate()
	{
		return array(
			'data' => $this->data,
			'current_page' => $this->current_page,
			'prev' => $this->prev,
			'next' => $this->next,
			'elementsByPage' => $this->elementsByPage,
			'totalElements' => $this->totalElements,
			'totalPages' => $this->totalPages,
			'numbersPage' => $this->numbersPage
		);
	}
}