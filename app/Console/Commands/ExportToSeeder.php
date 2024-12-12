<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ExportToSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export data from existing database to seeder';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get all tables in the database
        $tables = DB::select('SHOW TABLES');
        $databaseName = env('DB_DATABASE');
        $seederPath = database_path('seeders/DatabaseSeeder.php');

        // Start the seeder content with the basic structure
        $seederContent = "<?php

use Illuminate\\Database\\Seeder;
use Illuminate\\Support\\Facades\\DB;
use Illuminate\\Support\\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks before truncating tables
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        // Truncate tables if they exist
";

        // We are adding truncation for tables while checking if they exist
        foreach ($tables as $table) {
            $tableName = $table->{"Tables_in_{$databaseName}"};

            // Check if the table exists before truncating
            if (DB::getSchemaBuilder()->hasTable($tableName)) {
                $seederContent .= "        DB::table('{$tableName}')->truncate();\n";
                $this->info("Table '{$tableName}' exists and will be truncated.");
            } else {
                $this->info("Table '{$tableName}' does not exist, skipping truncation.");
            }
        }

        // Re-enable foreign key checks after truncating
        $seederContent .= "\n        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');\n\n";

        // Insert Users data first to maintain foreign key integrity
        $seederContent .= "\n        DB::table('users')->insert([";
        $seederContent .= "\n            ['id' => 1, 'name' => 'User 1', 'email' => 'user1@example.com', 'password' => '" . Hash::make('password') . "', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],";
        $seederContent .= "\n            ['id' => 2, 'name' => 'User 2', 'email' => 'user2@example.com', 'password' => '" . Hash::make('password') . "', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],";
        $seederContent .= "\n            ['id' => 3, 'name' => 'User 3', 'email' => 'user3@example.com', 'password' => '" . Hash::make('password') . "', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]";
        $seederContent .= "\n        ]);\n";

        // Insert Checks data with user_id references to the users table
        $seederContent .= "\n        DB::table('checks')->insert([";
        $seederContent .= "\n            ['id' => 1, 'created_at' => Carbon::now(), 'date' => '2024-12-12', 'tasks' => '[]', 'type' => 2, 'updated_at' => Carbon::now(), 'user_id' => 1],";
        $seederContent .= "\n            ['id' => 2, 'created_at' => Carbon::now(), 'date' => '2024-12-12', 'tasks' => '[]', 'type' => 1, 'updated_at' => Carbon::now(), 'user_id' => 1],";
        $seederContent .= "\n            ['id' => 3, 'created_at' => Carbon::now(), 'date' => '2024-12-12', 'tasks' => '[]', 'type' => 3, 'updated_at' => Carbon::now(), 'user_id' => 1],";
        $seederContent .= "\n            ['id' => 4, 'created_at' => Carbon::now(), 'date' => '2024-12-12', 'tasks' => '[]', 'type' => 2, 'updated_at' => Carbon::now(), 'user_id' => 2],";
        $seederContent .= "\n            ['id' => 5, 'created_at' => Carbon::now(), 'date' => '2024-12-12', 'tasks' => '[]', 'type' => 1, 'updated_at' => Carbon::now(), 'user_id' => 2],";
        $seederContent .= "\n            ['id' => 6, 'created_at' => Carbon::now(), 'date' => '2024-12-12', 'tasks' => '[]', 'type' => 3, 'updated_at' => Carbon::now(), 'user_id' => 3]";
        $seederContent .= "\n        ]);\n";

        // Seed the other tables
        foreach ($tables as $table) {
            $tableName = $table->{"Tables_in_{$databaseName}"};

            // Skip the 'users' and 'checks' tables (we already inserted them above)
            if ($tableName == 'users' || $tableName == 'checks') continue;

            // Fetch data from the table
            $data = DB::table($tableName)->get()->toArray();
            
            if (empty($data)) {
                $this->info("No data found in table {$tableName}");
                continue;
            }

            // Convert data to a PHP array for seeding
            $dataArray = var_export(json_decode(json_encode($data), true), true);

            // Prepare the insertion code for the table data
            $seederDataCode = "\n        DB::table('{$tableName}')->insert({$dataArray});";

            // Append the code for this table to the seeder content
            $seederContent .= $seederDataCode;
            $this->info("Data from table '{$tableName}' added to DatabaseSeeder.php");
        }

        // End the seeder content
        $seederContent .= "\n    }\n}";

        // Write the new content back to DatabaseSeeder.php, replacing existing content
        File::put($seederPath, $seederContent);

        $this->info("All data has been added to DatabaseSeeder.php and old content has been replaced.");
    }
}
