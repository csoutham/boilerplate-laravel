<?php

namespace App\Http\Livewire;

use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;

class LivewireHelper extends Component
{
	public function paginateCollection($collection, $perPage, $pageName = 'page', $fragment = null)
	{
		$currentPage = LengthAwarePaginator::resolveCurrentPage($pageName);
		$currentPageItems = $collection->slice(($currentPage - 1) * $perPage, $perPage);

		parse_str(request()->getQueryString(), $query);

		unset($query[$pageName]);

		$paginator = new LengthAwarePaginator(
			$currentPageItems,
			$collection->count(),
			$perPage,
			$currentPage,
			[
				'pageName' => $pageName,
				'path' => LengthAwarePaginator::resolveCurrentPath(),
				'query' => $query,
				'fragment' => $fragment,
			]
		);

		return $paginator;
	}
}
