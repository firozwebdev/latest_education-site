<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Database\Seeders\CountrySeeder;

class SeedCountriesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:countries {--fresh : Truncate the countries table before seeding}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed the countries table with a comprehensive list of countries';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if ($this->option('fresh')) {
            $this->info('Truncating countries table...');
            DB::table('countries')->truncate();
        }

        $this->info('Seeding countries...');
        $seeder = new CountrySeeder();
        $seeder->run();

        $count = DB::table('countries')->count();
        $this->info("Successfully seeded {$count} countries!");

        return Command::SUCCESS;
    }
}