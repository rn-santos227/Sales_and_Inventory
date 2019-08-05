<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MySqlRestore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:restore {sqlfile}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Restores database using info from .env';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    public $sqlfile;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $sqlfilename = $this->argument('sqlfile');

        $ds = DIRECTORY_SEPARATOR;
        $host = env('DB_HOST');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $database = env('DB_DATABASE');

        $mysqlpath = 'C:\xampp\mysql\bin\mysql';
        $backuppath = 'C:\salesandinventory\Backups\\';

        $command = sprintf($mysqlpath . ' --user=' . $username . ' --password=' . $password . ' --host=' . $host . ' ' . $database . ' < ' . $backuppath . $sqlfilename);

        exec($command);
    }
}
