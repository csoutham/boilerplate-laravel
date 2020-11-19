<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class CrudGenerator extends Command
{
	protected $signature = 'crud:generate {name} {namespace?} {--m} {--l} {--v}';
	protected $description = 'Create CRUD operations';

	public function __construct()
	{
		parent::__construct();
	}

	public function handle()
	{
		$name = $this->argument('name');
		$namespace = $this->ask('Add namespace?');
		$modelAndMigration = $this->option('m');
		$livewireTables = $this->option('l');
		$views = $this->option('v');

		$this->controller($name, $namespace);
		$this->request($name, $namespace);

		if ($modelAndMigration) {
			$this->model($name, $namespace);
			$this->migration($name, $namespace);
		}

		if ($livewireTables) {
			$this->livewire($name, $namespace);
			$this->livewire_html($name, $namespace);

			Artisan::call('livewire:discover');
		}

		if ($views) {
			$this->views_html($name, $namespace);
		}
	}

	protected function controller($name, $namespace)
	{
		$prefix = ($namespace) ? $namespace . '/' : null;

		$controllerTemplate = $this->replaceKeywords($name, $namespace, 'Controller');

		if (!file_exists($path = app_path('/Http/Controllers/' . $prefix))) {
			mkdir($path, 0777, true);
		}

		file_put_contents(app_path("/Http/Controllers/{$prefix}" . Str::plural($name) . 'Controller.php'), $controllerTemplate);
	}

	protected function model($name, $namespace)
	{
		$modelTemplate = $this->replaceKeywords($name, $namespace, 'Model');

		file_put_contents(app_path("/Models/{$name}.php"), $modelTemplate);
	}

	protected function request($name, $namespace)
	{
		$folder = ($namespace) ? $namespace . '/' : null;
		$suffix = ($namespace) ? '\\' . $namespace : null;

		$crudOperations = ['Index', 'Create', 'Store', 'Show', 'Edit', 'Update', 'Destroy'];

		foreach ($crudOperations as $crudOperation) {
			if ($crudOperation == 'Store') {
				$rules = $name . '::$createRules';
			} elseif ($crudOperation == 'Update') {
				$rules = $name . '::$updateRules';
			} else {
				$rules = '[]';
			}

			$requestTemplate = str_replace(
				[
					'{{namespace}}',
					'{{modelName}}',
					'{{modelNamePlural}}',
					'{{crudOperation}}',
					'{{rules}}',
				],
				[
					$suffix,
					$name,
					Str::plural($name),
					$crudOperation,
					$rules,
				],
				$this->getStub('Request')
			);

			if (!file_exists($path = app_path('/Http/Requests/' . $folder . Str::plural($name)))) {
				mkdir($path, 0777, true);
			}

			file_put_contents(app_path('/Http/Requests/' . $folder . Str::plural($name) . '/' . $name . $crudOperation . 'Request.php'), $requestTemplate);
		}
	}

	protected function migration($name, $namespace)
	{
		$migrationTemplate = $this->replaceKeywords($name, $namespace, 'Migration');

		file_put_contents(database_path('/migrations/' . date('Y_m_d_His') . '_create_' . Str::snake(Str::plural($name)) . '_table.php'), $migrationTemplate);
	}

	protected function livewire($name, $namespace)
	{
		$prefix = ($namespace) ? $namespace . '/' : null;

		$livewireTemplate = $this->replaceKeywords($name, $namespace, 'Livewire');

		if (!file_exists($path = app_path('/Http/Livewire/' . $prefix))) {
			mkdir($path, 0777, true);
		}

		file_put_contents(app_path("/Http/Livewire/{$prefix}" . Str::plural($name) . 'Table.php'), $livewireTemplate);

		Artisan::call('livewire:discover');
	}

	protected function livewire_html($name, $namespace)
	{
		$prefix = ($namespace) ? $namespace . '/' : null;

		$livewireHtmlTemplate = $this->replaceKeywords($name, $namespace, 'views/livewire');

		if (!file_exists($path = resource_path('views/livewire/' . strtolower($prefix)))) {
			mkdir($path, 0777, true);
		}

		file_put_contents(resource_path('/views/livewire/' . strtolower($prefix) . Str::kebab(Str::plural($name)) . '-table.blade.php'), $livewireHtmlTemplate);
	}

	protected function views_html($name, $namespace)
	{
		$prefix = ($namespace) ? $namespace . '/' : null;

		$crudOperations = ['Index', 'Create', 'Show', 'Edit'];

		foreach ($crudOperations as $crudOperation) {
			$viewTemplate = $this->replaceKeywords($name, $namespace, 'views/' . strtolower($crudOperation));

			if (!file_exists($path = resource_path("/views/{$prefix}" . Str::snake(Str::plural($name))))) {
				mkdir($path, 0777, true);
			}

			file_put_contents(resource_path("/views/{$prefix}" . Str::snake(Str::plural($name)) . '/' . strtolower($crudOperation) . '.blade.php'),
				$viewTemplate);
		}
	}

	protected function replaceKeywords($name, $namespace, $stub)
	{
		$prefix = ($namespace) ? $namespace . '/' : null;
		$folderPrefix = str_replace('/', '.', $prefix);
		$actionPrefix = str_replace('/', '\\', $prefix);
		$suffix = ($namespace) ? '\\' . $namespace : null;

		return str_replace(
			[
				'{{folderPrefix}}',
				'{{actionPrefix}}',
				'{{namespace}}',
				'{{modelName}}',
				'{{modelNameSingularLowerCase}}',
				'{{modelNameSingularLowerCaseFirst}}',
				'{{modelNameSingularSnakeCase}}',
				'{{modelNameSingularKebabCase}}',
				'{{modelNamePlural}}',
				'{{modelNamePluralLowerCase}}',
				'{{modelNamePluralLowerCaseFirst}}',
				'{{modelNamePluralSnakeCase}}',
				'{{modelNamePluralKebabCase}}',
			],
			[
				strtolower($folderPrefix),
				$actionPrefix,
				$suffix,
				$name,
				strtolower($name),
				lcfirst($name),
				Str::snake($name),
				Str::kebab($name),
				Str::plural($name),
				strtolower(Str::plural($name)),
				lcfirst(Str::plural($name)),
				Str::snake(Str::plural($name)),
				Str::kebab(Str::plural($name)),
			],
			$this->getStub($stub)
		);
	}

	protected function getStub($type)
	{
		return file_get_contents(resource_path("stubs/$type.stub"));
	}
}
