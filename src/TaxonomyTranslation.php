<?php namespace Exolnet\Taxonomy;

use Illuminate\Database\Eloquent\Model;

class TaxonomyTranslation extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'taxonomy_translation';

	/**
	 * Disabling Auto Timestamps
	 *
	 * @var boolean
	 */
	public $timestamps = false;

	/**
	 * Specifies which attributes should be mass-assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'slug', 'permalink', 'description', 'locale'];

	/**
	 * @return string
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

	/**
	 * @return string
	 */
	public function getLocale()
	{
		return $this->locale;
	}

	/**
	 * @param string $locale
	 * @return $this
	 */
	public function setLocale($locale)
	{
		$this->locale = $locale;

		return $this;
	}
}
