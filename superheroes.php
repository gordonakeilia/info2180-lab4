<?php

$superheroes = [
  [
      "id" => 1,
      "name" => "Steve Rogers",
      "alias" => "Captain America",
      "biography" => "Recipient of the Super-Soldier serum, World War II hero Steve Rogers fights for American ideals as one of the world's mightiest heroes and the leader of the Avengers.",
  ],
  [
      "id" => 2,
      "name" => "Tony Stark",
      "alias" => "Ironman",
      "biography" => "Genius. Billionaire. Playboy. Philanthropist. Tony Stark's confidence is matched only by his high-flying abilities as the armored hero Ironman.",
  ],
  [
      "id" => 3,
      "name" => "Peter Parker",
      "alias" => "Spiderman",
      "biography" => "Bitten by a radioactive spider, Peter Parker's arachnid abilities give him amazing powers he uses to help others, while his personal life continues to offer plenty of obstacles.",
  ],
  [
      "id" => 4,
      "name" => "Carol Danvers",
      "alias" => "Captain Marvel",
      "biography" => "Carol Danvers becomes one of the universe's most powerful heroes when Earth is caught in the middle of a galactic war between two alien races.",
  ],
  [
      "id" => 5,
      "name" => "Natasha Romanoff",
      "alias" => "Black Widow",
      "biography" => "Master spy and expert hand-to-hand combatant, Natasha Romanoff is the Black Widow.",
  ],
  [
      "id" => 6,
      "name" => "Bruce Banner",
      "alias" => "Hulk",
      "biography" => "Dr. Bruce Banner lives a life transformed by gamma radiation. What powers the Hulk making him a monster who's unstoppable when angry.",
  ],
  [
      "id" => 7,
      "name" => "Clint Barton",
      "alias" => "Hawkeye",
      "biography" => "A master marksman and veteran agent of S.H.I.E.L.D., Clint Barton brings his unique skill set to the Avengers.",
  ],
  [
      "id" => 8,
      "name" => "T'Challa",
      "alias" => "Black Panther",
      "biography" => "King T'Challa is the Black Panther, protector of the technologically advanced African nation of Wakanda.",
  ],
  [
      "id" => 9,
      "name" => "Thor Odinson",
      "alias" => "Thor",
      "biography" => "The God of Thunder, Thor Odinson wields the enchanted hammer Mjolnir to protect Earth and his home world of Asgard.",
  ],
  [
      "id" => 10,
      "name" => "Wanda Maximoff",
      "alias" => "Scarlett Witch",
      "biography" => "Notable for her ability to manipulate reality and energy, Wanda Maximoff brings powerful hex powers as the Scarlet Witch.",
  ],
];

// Sanitize user input
$query = isset($_GET['query']) ? trim(filter_var($_GET['query'], FILTER_SANITIZE_STRING)) : '';

if ($query === '') {
    // If empty query, display full superhero list
    echo "<ul>";
    foreach ($superheroes as $hero) {
        echo "<li>" . htmlspecialchars($hero['alias']) . "</li>";
    }
    echo "</ul>";
} else {
    // Search for a matching superhero by name or alias
    $foundHero = null;
    foreach ($superheroes as $hero) {
        if (strcasecmp($hero['name'], $query) === 0 || strcasecmp($hero['alias'], $query) === 0) {
            $foundHero = $hero;
            break;
        }
    }

    if ($foundHero) {
        echo "<h3>" . htmlspecialchars(strtoupper($foundHero['alias'])) . "</h3>";
        echo "<h4>A.K.A " . htmlspecialchars(strtoupper($foundHero['name'])) . "</h4>";
        echo "<p>" . htmlspecialchars($foundHero['biography']) . "</p>";
    } else {
        echo "<p style='color: red; font-weight: bold;'>SUPERHERO NOT FOUND</p>";
    }
}
?>