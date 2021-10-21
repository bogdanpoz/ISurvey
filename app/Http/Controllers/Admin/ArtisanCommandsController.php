<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ArtisanCommandsController extends Controller
{
    public function index()
    {
        $commands = [
            [
                'title' => __('Flush the application cache'),
                'command' => 'cache:clear',
            ],

            [
                'title' => __('Create the symbolic links configured for the application'),
                'command' => 'storage:link',
            ],

            [
                'title' => __('Remove the configuration cache'),
                'command' => 'config:clear',
            ],

            [
                'title' => __('Remove the route cache file'),
                'command' => 'route:clear',
            ],

            [
                'title' => __('Migrate the database'),
                'command' => 'migrate',
            ],
        ];

        return view('admin.commands.index', compact('commands'));
    }

    public function execute(Request $request)
    {
        $command = $request->input('command');

        Artisan::call($command);

        flash(__('Executed the command - php artisan').$command);

        return redirect()->back();
    }
}
