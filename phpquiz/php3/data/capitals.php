<?php
return [
    ["Bulbasaur", "Grama/Veneno", "img/img1.jpg"],
    ["Charmander", "Fogo", "img/img2.jpg"],
    ["Squirtle", "Água", "img/img3.jpg"],
    ["Pikachu", "Elétrico", "img/img4.jpg"],
    ["Jigglypuff", "Normal/Fada", "img/img5.jpg"],
    ["Meowth", "Normal", "img/img6.jpg"],
    ["Psyduck", "Água", "img/img7.jpg"],
    ["Machop", "Lutador", "img/img8.jpg"],
    ["Magnemite", "Elétrico/Aço", "img/img9.jpg"],
    ["Geodude", "Pedra/Terra", "img/img10.jpg"],
    ["Onix", "Pedra/Terra", "img/img11.jpg"],
    ["Cubone", "Terra", "img/img12.jpg"],
    ["Hitmonlee", "Lutador", "img/img13.jpg"],
    ["Hitmonchan", "Lutador", "img/img14.jpg"],
    ["Koffing", "Venenoso", "img/img15.jpg"],
    ["Rhyhorn", "Terra/Pedra", "img/img16.jpg"],
    ["Tangela", "Grama", "img/img17.jpg"],
    ["Horsea", "Água", "img/img18.jpg"],
    ["Staryu", "Água", "img/img19.jpg"],
    ["Scyther", "Inseto/Voador", "img/img20.jpg"],
    ["Electabuzz", "Elétrico", "img/img21.jpg"],
    ["Magmar", "Fogo", "img/img22.jpg"],
    ["Pinsir", "Inseto", "img/img23.jpg"],
    ["Tauros", "Normal", "img/img24.jpg"],
    ["Magikarp", "Água", "img/img25.jpg"],
    ["Gyarados", "Água/Voador", "img/img26.jpg"],
    ["Lapras", "Água/Gelo", "img/img27.jpg"],
    ["Ditto", "Normal", "img/img28.jpg"],
    ["Eevee", "Normal", "img/img29.jpg"],
    ["Vaporeon", "Água", "img/img30.jpg"],
    ["Jolteon", "Elétrico", "img/img31.jpg"],
    ["Flareon", "Fogo", "img/img32.jpg"],
    ["Porygon", "Normal", "img/img33.jpg"],
    ["Snorlax", "Normal", "img/img34.jpg"],
    ["Articuno", "Gelo/Voador", "img/img35.jpg"],
    ["Zapdos", "Elétrico/Voador", "img/img36.jpg"],
    ["Moltres", "Fogo/Voador", "img/img37.jpg"],
    ["Dratini", "Dragão", "img/img38.jpg"],
    ["Dragonair", "Dragão", "img/img39.jpg"],
    ["Dragonite", "Dragão/Voador", "img/img40.jpg"],
    ["Mewtwo", "Psíquico", "img/img41.jpg"],
    ["Mew", "Psíquico", "img/img42.jpg"],
];
$pokemons = include 'data/capitals.php';
$tipos_usados = [];
$questoes = [];

// embaralha a lista para deixar aleatório
shuffle($pokemons);

foreach ($pokemons as $pokemon) {
    $tipo = $pokemon[1];

    // se o tipo ainda não foi usado, adiciona
    if (!in_array($tipo, $tipos_usados)) {
        $questoes[] = $pokemon;
        $tipos_usados[] = $tipo;
    }
}

// exibe o resultado
foreach ($questoes as $q) {
    echo "Pokémon: {$q[0]} — Tipo: {$q[1]}<br>";
}
?>