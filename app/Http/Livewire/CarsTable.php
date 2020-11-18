<?php

namespace App\Http\Livewire;

use App\Http\Livewire\LivewireHelper;
use App\Models\Car;
use Livewire\WithPagination;

class CarsTable extends LivewireHelper
{
	use WithPagination;

	public $perPage = 30;
	public $sortField = 'name';
	public $sortAsc = true;
	public $status = null;
	public $search = '';

	protected $queryString = ['status'];

	public function updatingSearch()
	{
		$this->resetPage();
	}

	public function sortBy($field)
	{
		if ($this->sortField === $field) {
			$this->sortAsc = !$this->sortAsc;
		} else {
			$this->sortAsc = true;
		}

		$this->sortField = $field;
	}

	public function render()
	{
		$cars = Car::searchableProperties($this->search)
		                         ->filterBy('status', $this->status)
		                         ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
		                         ->get();
		                         
        $statuses = Car::STATUSES;

		$cars = $this->paginateCollection($cars, $this->perPage);

		return view('livewire.cars-table', compact('cars', 'statuses'));
	}

	public function paginationView()
	{
		return 'partials.pagination';
	}
}
