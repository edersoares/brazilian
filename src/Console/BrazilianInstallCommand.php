<?php

namespace Brazilian\Console;

use Brazilian\City;
use Brazilian\State;
use Illuminate\Console\Command;

class BrazilianInstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'brazilian:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the brazilian package';

    /**
     * Return the brazilian state model.
     *
     * @return string
     */
    protected function getStateModel()
    {
        return State::class;
    }

    /**
     * Return the brazilian city model.
     *
     * @return string
     */
    protected function getCityModel()
    {
        return City::class;
    }

    /**
     * Return the CSV filename of the brazilian states.
     *
     * @return string
     */
    protected function getStateFilename()
    {
        return __DIR__.'/../../database/data/brazilian-states.csv';
    }

    /**
     * Return the CSV filename of the brazilian cities.
     *
     * @return string
     */
    protected function getCityFilename()
    {
        return __DIR__.'/../../database/data/brazilian-cities.csv';
    }

    /**
     * Import a CSV file to database.
     *
     * @param string $model    Model name to import
     * @param string $filename CSV filename
     *
     * @return int
     */
    protected function import($model, $filename)
    {
        $file = fopen($filename, 'r');
        $cols = fgetcsv($file);

        $this->info("Importing: {$model}");

        for ($i = 0; $line = fgetcsv($file); $i++) {

            $data = array_combine($cols, $line);

            $model::unguarded(function () use ($model, $data) {
                $model::create($data);
            });

            if ($i % 500 === 0) {
                $this->info("  Imported: {$i}");
            }
        }

        return $i;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('migrate');

        $states = $this->import(
            $this->getStateModel(),
            $this->getStateFilename()
        );

        $this->info("Brazilian states imported: {$states}");

        $cities = $this->import(
            $this->getCityModel(),
            $this->getCityFilename()
        );

        $this->info("Brazilian cities imported: {$cities}");
    }
}
