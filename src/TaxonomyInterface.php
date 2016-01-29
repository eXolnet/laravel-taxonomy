<?php namespace Exolnet\Taxonomy;

interface TaxonomyInterface
{
	/**
	 * @return int
	 */
	public function getId();

	/**
	 * @return string
	 */
	public function getName();

	/**
	 * @param string $name
	 * @return $this
	 */
	public function setName($name);

	/**
	 * @return string
	 */
	public function getSlug();

	/**
	 * @param string $slug
	 * @return $this
	 */
	public function setSlug($slug);

	/**
	 * @return string
	 */
	public function getPermalink();

	/**
	 * @param string $permalink
	 * @return $this
	 */
	public function setPermalink($permalink);
}
