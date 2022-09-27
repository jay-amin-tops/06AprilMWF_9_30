<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;
class TraitMakeCommand extends GeneratorCommand
{
    protected $signature = 'make:trait {name}';
    protected $description = 'Create a new trait';
    protected $type = 'Trait';
    protected function getStub()
    {
        return __DIR__ . '\stubs\traits.stub';
    }
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\Traits';
    }
}
