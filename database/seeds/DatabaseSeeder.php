<?php

error_reporting(0);

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        //Desativo as Foregn Keys
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        //Executo as factories
        dump(factory("App\\Models\\Aluguel", 2)->create()->toJson());
        dump(factory("App\\Models\\Ator", 2)->create()->toJson());
        dump(factory("App\\Models\\Categorium", 2)->create()->toJson());
        dump(factory("App\\Models\\Cidade", 2)->create()->toJson());
        dump(factory("App\\Models\\Cliente", 2)->create()->toJson());
        dump(factory("App\\Models\\Endereco", 2)->create()->toJson());
        dump(factory("App\\Models\\Filme", 2)->create()->toJson());
        dump(factory("App\\Models\\FilmeAtor", 2)->create()->toJson());
        dump(factory("App\\Models\\FilmeCategorium", 2)->create()->toJson());
        dump(factory("App\\Models\\FilmeTexto", 2)->create()->toJson());
        dump(factory("App\\Models\\Funcionario", 2)->create()->toJson());
        dump(factory("App\\Models\\Idioma", 2)->create()->toJson());
        dump(factory("App\\Models\\Inventario", 2)->create()->toJson());
        dump(factory("App\\Models\\Loja", 2)->create()->toJson());
        dump(factory("App\\Models\\Pagamento", 2)->create()->toJson());
        dump(factory("App\\Models\\Pai", 2)->create()->toJson());

        //Ativo as Foregn Keys
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
