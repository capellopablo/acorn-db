<?php

namespace TinyPixel\AcornDB\Console\Commands\Migrate;

use function Roots\base_path;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Database\Migrations\MigrationCreator;
use TinyPixel\AcornDB\Console\Commands\Migrate\BaseCommand;

/**
 * Console Command: make:migration
 *
 * Usage: `wp acorn make:seeder`
 *
 * @author     Kelly Mears <developers@tinypixel.dev>
 * @license    MIT
 * @version    1.0.0
 * @since      1.0.0
 * @package    AcornDB
 * @subpackage Console\Commands
 **/
class MakeCommand extends BaseCommand
{
    /**
     * The console command name.
     *
     * @var string
     **/
    protected $name = 'make:migration';

    /**
     * The console command signature.
     *
     * @var string
     **/
    protected $signature = 'make:migration {name : The name of your migration}
                            {table : The table to migrate.}
                            {--create : Creates table}';

    /**
     * The description of the command.
     *
     * @var string
     **/
    protected $description = 'Create a new migration file';

    /**
     * The migration creator instance.
     *
     * @var \Illuminate\Database\Migrations\MigrationCreator
     **/
    protected $creator;

    public function __construct(MigrationCreator $creator)
    {
        parent::__construct();

        $this->creator = $creator;
    }

    /**
     * Execute the console command.
     *
     * @return void
     **/
    public function handle()
    {
        $name = $this->argument('name');

        $table = $this->argument('table');

        $create = $this->option('create');

        if (! $table && is_string($create)) {
            $table = $create;
        }

        $this->writeMigration($name, $table, $create);
    }

    /**
     * Write the migration file to disk.
     *
     * @param  string  $name
     * @param  string  $table
     * @param  bool    $create
     * @return string
     **/
    protected function writeMigration($name, $table, $create)
    {
        $path = $this->getMigrationPath();

        $this->creator->create($name, $path, $table, $create);

        $this->output->newLine();
        $this->output->writeln("<bg=blue;fg=white;>Migration created!</>");
        $this->output->writeln("<info>Name:</info> {$name}");
        $this->output->write("<info>Table:</info> {$table}");

        if ($create) {
            $this->output->write(" <bg=blue;fg=white;>Note: new database table created.</>");
        }

        $this->output->newLine();
        $this->output->writeln("<info>Directory:</info> {$path}");
        $this->output->newLine();
    }

    protected function getMigrationPath()
    {
        return base_path() . '/database/migrations';
    }
}
