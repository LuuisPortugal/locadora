<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to make models for testing and seeding your
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
        'inventario_id' => rand(1, 5),
        'cliente_id' => rand(1, 5),
        'data_de_devolucao' => $faker->dateTimeBetween(),
        'funcionario_id' => rand(1, 5)
    ];
});

$factory->define(App\Models\Ator::class, function (Faker\Generator $faker) {
    return [
        'primeiro_nome' => $faker->word,
        'ultimo_nome' => $faker->word
    ];
});

$factory->define(App\Models\Categorium::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->word
    ];
});

$factory->define(App\Models\Cidade::class, function (Faker\Generator $faker) {
    return [
        'cidade' => $faker->word,
        'pais_id' => rand(1, 5)
    ];
});

$factory->define(App\Models\Cliente::class, function (Faker\Generator $faker) {
    return [
        'loja_id' => rand(1, 5),
        'primeiro_nome' => $faker->word,
        'ultimo_nome' => $faker->word,
        'email' => $faker->safeEmail,
        'endereco_id' => rand(1, 5),
        'ativo' => $faker->boolean,
        'data_criacao' => $faker->dateTimeBetween()
    ];
});

$factory->define(App\Models\Endereco::class, function (Faker\Generator $faker) {
    return [
        'endereco' => $faker->word,
        'endereco2' => $faker->word,
        'bairro' => $faker->word,
        'cidade_id' => rand(1, 5),
        'cep' => $faker->randomLetter,
        'telefone' => $faker->randomLetter
    ];
});

$factory->define(App\Models\Filme::class, function (Faker\Generator $faker) {
    return [
        'titulo' => $faker->word,
        'descricao' => $faker->text,
        'ano_de_lancamento' => $faker->dateTimeBetween()->format("Y"),
        'idioma_id' => rand(1, 5),
        'idioma_original_id' => rand(1, 5),
        'duracao_da_locacao' => $faker->boolean,
        'preco_da_locacao' => $faker->randomFloat(2, 0, 99),
        'duracao_do_filme' => $faker->randomFloat(0, 0, 99),
        'custo_de_substituicao' => $faker->randomFloat(2, 0, 99),
        'classificacao' => null,
        'recursos_especiais' => null
    ];
});

$factory->define(App\Models\FilmeAtor::class, function (Faker\Generator $faker) {
    return [
        'ator_id' => rand(1, 5),
        'filme_id' => rand(1, 5)
    ];
});

$factory->define(App\Models\FilmeCategorium::class, function (Faker\Generator $faker) {
    return [
        'filme_id' => rand(1, 5),
        'categoria_id' => rand(1, 5)
    ];
});

$factory->define(App\Models\FilmeTexto::class, function (Faker\Generator $faker) {
    return [
        'filme_id' => rand(1, 5),
        'titulo' => $faker->word,
        'descricao' => $faker->text,
    ];
});

$factory->define(App\Models\Funcionario::class, function (Faker\Generator $faker) {
    return [
        'primeiro_nome' => $faker->word,
        'ultimo_nome' => $faker->word,
        'endereco_id' => rand(1, 5),
        'foto' => 'blob',
        'email' => $faker->safeEmail,
        'loja_id' => rand(1, 5),
        'ativo' => $faker->boolean,
        'usuario' => $faker->word,
        'senha' => $faker->word
    ];
});

$factory->define(App\Models\Idioma::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->word
    ];
});

$factory->define(App\Models\Inventario::class, function (Faker\Generator $faker) {
    return [
        'filme_id' => rand(1, 5),
        'loja_id' => rand(1, 5)
    ];
});

$factory->define(App\Models\Loja::class, function (Faker\Generator $faker) {
    return [
        'gerente_id' => rand(1, 5),
        'endereco_id' => rand(1, 5)
    ];
});

$factory->define(App\Models\Pagamento::class, function (Faker\Generator $faker) {
    return [
        'cliente_id' => rand(1, 5),
        'funcionario_id' => rand(1, 5),
        'aluguel_id' => rand(1, 5),
        'valor' => $faker->randomFloat(2, 0, 99),
        'data_de_pagamento' => $faker->dateTimeBetween()
    ];
});

$factory->define(App\Models\Pai::class, function (Faker\Generator $faker) {
    return [
        'pais' => $faker->word
    ];
});

