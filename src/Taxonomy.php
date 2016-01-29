<?php namespace Exolnet\Taxonomy;

use Exolnet\ClosureTable\Models\NodeUnordered;
use Exolnet\Translation\Traits\Translatable;

class Taxonomy extends NodeUnordered implements TaxonomyInterface {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'taxonomy';

	/**
	 * Specifies which attributes should be mass-assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['is_orderable', 'name', 'slug', 'permalink'];

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return $this
	 */
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getSlug()
	{
		return $this->slug;
	}

	/**
	 * @param string $slug
	 * @return $this
	 */
	public function setSlug($slug)
	{
		$this->slug = $slug;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getPermalink()
	{
		return $this->permalink;
	}

	/**
	 * @param string $permalink
	 * @return $this
	 */
	public function setPermalink($permalink)
	{
		$this->permalink = $permalink;

		return $this;
	}
}
