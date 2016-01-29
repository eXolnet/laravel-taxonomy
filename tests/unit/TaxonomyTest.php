<?php

use Exolnet\Taxonomy\Taxonomy;

class TaxonomyTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var \Exolnet\Taxonomy\Taxonomy
	 */
	protected $model;

	public function setUp()
	{
		$this->model = new Taxonomy;
	}

	public function testItIsInitializable()
	{
		$this->assertInstanceOf(Taxonomy::class, $this->model);
	}
}
