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
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('migrate --force');
        $this->info('Brazilian states imported: ' . $this->importStates());
        $this->info('Brazilian cities imported: ' . $this->importCities());
    }

    /**
     * Import brazilian states and return the number of states imported.
     *
     * @return int
     */
    protected function importStates()
    {
        $file = fopen(__DIR__.'/../../database/data/brazilian-states.csv', 'r');
        $cols = fgetcsv($file);

        for ($i = 0; $line = fgetcsv($file); $i++) {

            $data = array_combine($cols, $line);

            State::unguarded(function () use ($data) {
                State::create($data);
            });
        }

        return $i;
    }

    /**
     * Import brazilian cities and return the number of cities imported.
     *
     * @return int
     */
    protected function importCities()
    {
        $file = fopen(__DIR__.'/../../database/data/brazilian-cities.csv', 'r');
        $cols = fgetcsv($file);

        for ($i = 0; $line = fgetcsv($file); $i++) {

            $data = array_combine($cols, $line);

            City::unguarded(function () use ($data) {
                City::create($data);
            });
        }

        return $i;
    }
}
