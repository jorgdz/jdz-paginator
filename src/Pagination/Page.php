<?php
namespace Jdzm\JDZPaginator\Pagination;

class Page
{
	
	public $current_page;      	// Representa el inicio del limit y debe ingresarse manualmente
	public $prev;
	public $next;
	public $elementsByPage;  	// Se puede obtener de la base de datos después de especificar un limit
	public $totalElements;   	// Se puede obtener de la base de datos
	public $totalPages;

	public function __construct($current_page, $elementsByPage, $data = array())
	{
		$this->current_page = $current_page;
		$this->elementsByPage = $elementsByPage;
		$this->totalElements = count($data);

		$this->getTotalPages();
		$this->goNext();
		$this->goPrev();
	}

	public function getTotalPages ()
	{
		$value = floor($this->totalElements / $this->elementsByPage);  // ELiminamos decimales para solo dejar la parte entera

		// como la paginación va a comenzar en cero tenemos que restarle 1
		// Por ejemplo 128 / 10 = 12.8 que redondeado sería 13, y 13 * 10 = 130

		// Si el total por los elementos por páginas es menor que el total de los elementos entonces imprimimos el total completo de lo contrario le restamos 1 porque empieza en 0 las páginas
		$this->totalPages = (($value * $this->elementsByPage) < $this->totalElements) ? $value : ($value - 1);
		return $this->totalPages;
	}

	public function goNext ()
	{
		$this->next = ($this->current_page < $this->totalPages) ? ($this->current_page + 1) : $this->current_page;
		return $this->next;
	}

	public function goPrev ()
	{
		$this->prev = ($this->current_page > 0) ? ($this->current_page - 1)  : $this->current_page;
		return $this->prev;
	}
}