<?php namespace Exolnet\Taxonomy;

class TaxonomyService
{
	/**
	 * @var \Exolnet\Taxonomy\TaxonomyRepository
	 */
	protected $taxonomyRepository;

	/**
	 * TaxonomyService constructor.
	 *
	 * @param \Exolnet\Taxonomy\TaxonomyRepository $taxonomyRepository
	 */
	public function __construct(TaxonomyRepository $taxonomyRepository)
	{
		$this->taxonomyRepository = $taxonomyRepository;
	}

	/**
	 * Get a taxonomy by it's permalink.
	 *
	 * @param  string $permalink
	 * @param null $locale
	 * @return \Exolnet\Taxonomy\Taxonomy|null
	 */
	public function getByPermalink($permalink, $locale = null)
	{
		$permalink = trim($permalink, '/');

		return Taxonomy::whereTranslation('permalink', '=', $permalink, $locale)->first();
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Collection
	 */
	public function getTaxonomies()
	{
		return $this->taxonomyRepository->all();
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Collection
	 */
	public function getRootTaxonomies()
	{
		return $this->taxonomyRepository->getRoots();
	}

	/**
	 * @param array $data
	 * @return \Exolnet\Taxonomy\Taxonomy
	 */
	public function create(array $data)
	{
		$taxonomy = new Taxonomy;

		// TODO-AD: WIP <adeschambeault@exolnet.com>
		$this->update($taxonomy, $data);

		return $taxonomy;
	}

	/**
	 * @param \Exolnet\Taxonomy\Taxonomy $taxonomy
	 * @param array $data
	 * @return void
	 */
	public function update(Taxonomy $taxonomy, array $data)
	{
		// TODO-AD: WIP <adeschambeault@exolnet.com>
		$taxonomy->fill($data);

		$this->taxonomyRepository->update($taxonomy);
	}

	/**
	 * @param \Exolnet\Taxonomy\Taxonomy $taxonomy
	 * @return bool|null
	 */
	public function delete(Taxonomy $taxonomy)
	{
		// TODO-AD: WIP <adeschambeault@exolnet.com>
		return $this->taxonomyRepository->delete($taxonomy);
	}
}
