<?php

use Exolnet\Taxonomy\Taxonomy;

class TaxonomyTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var \Exolnet\Image\Image
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
