<?php namespace Exolnet\Taxonomy;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TaxonomySeeder extends Seeder
{
	/**
	 * @var array
	 */
	protected $taxonomies = [];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->importTaxonomies($this->taxonomies);
	}

	/**
	 * @return array
	 */
	protected function getTaxonomies()
	{
		return $this->taxonomies;
	}

	/**
	 * @param array $taxonomies
	 * @param \Exolnet\Taxonomy\Taxonomy|null $parent
	 * @return array
	 */
	protected function importTaxonomies(array $taxonomies, Taxonomy $parent = null)
	{
		$importedTaxonomies = [];

		foreach ($taxonomies as $taxonomy) {
			$importedTaxonomies[] = $this->importTaxonomy($taxonomy, $parent);
		}

		return $importedTaxonomies;
	}

	/**
	 * @param array $data
	 * @param \Exolnet\Taxonomy\Taxonomy|null $parent
	 * @return \Exolnet\Taxonomy\Taxonomy
	 */
	protected function importTaxonomy(array $data, Taxonomy $parent = null)
	{
		$taxonomy = $this->newTaxonomy();

		$attributes = array_except($data, 'children');
		$children = (array)array_get($data, 'children', []);

		// Assign attributes
		$taxonomy->fillWithTranslations($attributes);

		// Assign computed attributes
		foreach ($taxonomy->getTranslations() as $translation) {
			if ($translation->getSlug() === null) {
				$slug = Str::slug($translation->getName());
				$translation->setSlug($slug);
			}

			if ($translation->getPermalink() === null) {
				$permalink = ltrim(($parent ? $parent->getPermalink() . '/' : '') . $translation->getSlug(), '/');
				$translation->setPermalink($permalink);
			}
		}

		// Save the taxonomy
		if ($parent) {
			$taxonomy->insertAsChildOf($parent);
		} else {
			$taxonomy->insertAsRoot();
		}

		// Import children
		$this->importTaxonomies($children, $taxonomy);

		return $taxonomy;
	}

	/**
	 * @return \Exolnet\Taxonomy\Taxonomy
	 */
	protected function newTaxonomy()
	{
		return new Taxonomy;
	}
}
