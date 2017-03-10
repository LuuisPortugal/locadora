<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class MakeAPI extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (scandir(app_path('Models')) as $value) {
            dump($value);
            if (preg_match("/(\\w+).php/", $value, $newValue)) {
                if (!in_array($newValue[1], [])) {
                    Artisan::call('make:resource', ['name' => $newValue[1]]);
                    Artisan::call('make:resource:views', ['name' => $newValue[1]]);
                    Artisan::call('make:validator', ['name' => $newValue[1]]);
                    Artisan::call('make:repository', ['name' => $newValue[1]]);
                    file_put_contents(base_path("routes/web.php"), "\nRoute::resource('" . strtolower($newValue[1]) . "', '{$newValue[1]}Controller');", FILE_APPEND);
                }
            }
            dump($value);
        }
    }
}
