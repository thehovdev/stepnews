<?php

namespace App\Console\Commands;

use App\MenuItem;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DeleteInactiveMenus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:menus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes inactive menu items/subitems';

    /**
     * Create a new command instance.
     *
     * @return void
     */
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
        $menu = DB::table('menu_items')->where('status', 0)->whereNull('deleted_at')->update(['deleted_at' => Carbon::now()]);;
        $submenu = DB::table('menu_subitems')->where('status', 0)->whereNull('deleted_at')->update(['deleted_at' => Carbon::now()]);
        $response =  ($menu == 0 && $submenu == 0) ? "There is no InActive menu/subitems items to delete" : $menu . ' menu ' . $submenu . ' submenu items were deleted';
    
        $this->info($response);
    }
}
