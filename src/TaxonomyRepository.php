<?php namespace Exolnet\Taxonomy;

use Exolnet\Database\Eloquent\EloquentRepository;

class TaxonomyRepository extends EloquentRepository
{
	/**
	 * @var string
	 */
	protected $model = Taxonomy::class;

	/**
	 * @param array $columns
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getRoots(array $columns = ['*'])
	{
		return Taxonomy::roots()->get($columns);
	}
}
