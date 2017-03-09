<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Models\Aluguel::class, function (Faker\Generator $faker) {
    return [
        'data_de_aluguel' => $faker->dateTimeBetween(),
        'inventario_id' => function () {
             return factory(App\Models\Inventario::class)->create()->inventario_id;
        },
        'cliente_id' => function () {
             return factory(App\Models\Cliente::class)->create()->cliente_id;
        },
        'data_de_devolucao' => $faker->dateTimeBetween(),
        'funcionario_id' => function () {
             return factory(App\Models\Funcionario::class)->create()->funcionario_id;
        },
        'ultima_atualizacao' => $faker->dateTimeBetween(),
    ];
});

$factory->define(App\Models\Ator::class, function (Faker\Generator $faker) {
    return [
        'primeiro_nome' => $faker->word,
        'ultimo_nome' => $faker->word,
        'ultima_atualizacao' => $faker->dateTimeBetween(),
    ];
});

$factory->define(App\Models\Categorium::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->word,
        'ultima_atualizacao' => $faker->dateTimeBetween(),
    ];
});

$factory->define(App\Models\Cidade::class, function (Faker\Generator $faker) {
    return [
        'cidade' => $faker->word,
        'pais_id' => function () {
             return factory(App\Models\Pai::class)->create()->pais_id;
        },
        'ultima_atualizacao' => $faker->dateTimeBetween(),
    ];
});

$factory->define(App\Models\Cliente::class, function (Faker\Generator $faker) {
    return [
        'loja_id' => function () {
             return factory(App\Models\Loja::class)->create()->loja_id;
        },
        'primeiro_nome' => $faker->word,
        'ultimo_nome' => $faker->word,
        'email' => $faker->safeEmail,
        'endereco_id' => function () {
             return factory(App\Models\Endereco::class)->create()->endereco_id;
        },
        'ativo' => $faker->boolean,
        'data_criacao' => $faker->dateTimeBetween(),
        'ultima_atualizacao' => $faker->dateTimeBetween(),
    ];
});

$factory->define(App\Models\Endereco::class, function (Faker\Generator $faker) {
    return [
        'endereco' => $faker->word,
        'endereco2' => $faker->word,
        'bairro' => $faker->word,
        'cidade_id' => function () {
             return factory(App\Models\Cidade::class)->create()->cidade_id;
        },
        'cep' => $faker->word,
        'telefone' => $faker->word,
        'ultima_atualizacao' => $faker->dateTimeBetween(),
    ];
});

$factory->define(App\Models\Filme::class, function (Faker\Generator $faker) {
    return [
        'titulo' => $faker->word,
        'descricao' => $faker->text,
        'ano_de_lancamento' => $faker->dateTimeBetween(),
        'idioma_id' => $faker->boolean,
        'idioma_original_id' => function () {
             return factory(App\Models\Idioma::class)->create()->idioma_id;
        },
        'duracao_da_locacao' => $faker->boolean,
        'preco_da_locacao' => $faker->randomFloat(),
        'duracao_do_filme' => $faker->randomNumber(),
        'custo_de_substituicao' => $faker->randomFloat(),
        'classificacao' => $faker->word,
        'recursos_especiais' => 'simple_array',
        'ultima_atualizacao' => $faker->dateTimeBetween(),
    ];
});

$factory->define(App\Models\FilmeAtor::class, function (Faker\Generator $faker) {
    return [
        'ator_id' => function () {
             return factory(App\Models\Ator::class)->create()->ator_id;
        },
        'filme_id' => function () {
             return factory(App\Models\Filme::class)->create()->filme_id;
        },
        'ultima_atualizacao' => $faker->dateTimeBetween(),
    ];
});

$factory->define(App\Models\FilmeCategorium::class, function (Faker\Generator $faker) {
    return [
        'filme_id' => function () {
             return factory(App\Models\Filme::class)->create()->filme_id;
        },
        'categoria_id' => function () {
             return factory(App\Models\Categorium::class)->create()->categoria_id;
        },
        'ultima_atualizacao' => $faker->dateTimeBetween(),
    ];
});

$factory->define(App\Models\FilmeTexto::class, function (Faker\Generator $faker) {
    return [
        'filme_id' => $faker->randomNumber(),
        'titulo' => $faker->word,
        'descricao' => $faker->text,
    ];
});

$factory->define(App\Models\Funcionario::class, function (Faker\Generator $faker) {
    return [
        'primeiro_nome' => $faker->word,
        'ultimo_nome' => $faker->word,
        'endereco_id' => function () {
             return factory(App\Models\Endereco::class)->create()->endereco_id;
        },
        'foto' => 'blob',
        'email' => $faker->safeEmail,
        'loja_id' => function () {
             return factory(App\Models\Loja::class)->create()->loja_id;
        },
        'ativo' => $faker->boolean,
        'usuario' => $faker->word,
        'senha' => $faker->word,
        'ultima_atualizacao' => $faker->dateTimeBetween(),
    ];
});

$factory->define(App\Models\Idioma::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->word,
        'ultima_atualizacao' => $faker->dateTimeBetween(),
    ];
});

$factory->define(App\Models\Inventario::class, function (Faker\Generator $faker) {
    return [
        'filme_id' => function () {
             return factory(App\Models\Filme::class)->create()->filme_id;
        },
        'loja_id' => function () {
             return factory(App\Models\Loja::class)->create()->loja_id;
        },
        'ultima_atualizacao' => $faker->dateTimeBetween(),
    ];
});

$factory->define(App\Models\Loja::class, function (Faker\Generator $faker) {
    return [
        'gerente_id' => $faker->boolean,
        'endereco_id' => function () {
             return factory(App\Models\Endereco::class)->create()->endereco_id;
        },
        'ultima_atualizacao' => $faker->dateTimeBetween(),
    ];
});

$factory->define(App\Models\Pagamento::class, function (Faker\Generator $faker) {
    return [
        'cliente_id' => function () {
             return factory(App\Models\Cliente::class)->create()->cliente_id;
        },
        'funcionario_id' => function () {
             return factory(App\Models\Funcionario::class)->create()->funcionario_id;
        },
        'aluguel_id' => function () {
             return factory(App\Models\Aluguel::class)->create()->aluguel_id;
        },
        'valor' => $faker->randomFloat(),
        'data_de_pagamento' => $faker->dateTimeBetween(),
        'ultima_atualizacao' => $faker->dateTimeBetween(),
    ];
});

$factory->define(App\Models\Pai::class, function (Faker\Generator $faker) {
    return [
        'pais' => $faker->word,
        'ultima_atualizacao' => $faker->dateTimeBetween(),
    ];
});

