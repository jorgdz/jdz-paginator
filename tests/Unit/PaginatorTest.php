<?php 
namespace Tests\Unit;

use Jdzm\JDZPaginator\Pagination\Page;

class PaginatorTest extends \PHPUnit\Framework\TestCase
{
	private $currentPage = 0;
	private $size = 3;
	private $page;
    private $totalElements = 13;

	/**
     * @before
     */
	public function init ()
	{
     	$this->page = new Page($this->currentPage, $this->size, $this->totalElements);
	}

	public function testGetTotalPages()
    {
    	// 28 / 5 = 5  y  (5*5)  = 25 siendo 25 < totalElementos por lo tanto el total de páginas debe ser 5
     	print 'Total de páginas: '. $this->page->getTotalPages();
     	$this->assertTrue(($this->page->getTotalPages() == 4) ? true : false);
    }

    public function testGoNext ()
    {
    	print PHP_EOL.'Next Val: '.$this->page->next;
     	$this->assertSame($this->page->next, 1);
    }

    public function testGoPrev ()
    {
    	// La primera página por defecto es 0, y no debe decrementar más si la actual está en 0
    	print PHP_EOL.'Prev Val: '.$this->page->prev;
    	$this->assertSame($this->page->prev, 0);	
    }
}