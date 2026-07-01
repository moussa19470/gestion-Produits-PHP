<?php

$categories = [
    0 => [
        "code" => "coo0",
        "nom" => "categorie0",
        "produits" => [
            0 => [
                "nom" => "produit1",
                "reference" => "ref1",
                "prix" => 3000,
                "quantite" => 5
            ],
            1 => [
                "nom" => "produit2",
                "reference" => "ref2",
                "prix" => 2000,
                "quantite" => 3
            ]
        ]
    ],
    1 => [
        "code" => "coo1",
        "nom" => "categorie1",
        "produits" => []
    ]
];

// 
function afficheCategorieSansProduit(array $categories): void {
    foreach ($categories as $categorie) {
        if (empty($categorie["produits"])) {
            echo $categorie["nom"] . "\n";
        }
    }
}


// Lit une chaîne saisie par l'utilisateur
function saisieChaine(string $message): string {
    return readline($message);
}

// Vérifie qu'un champ n'est pas vide
function champObligatoire(string $value, string $message): bool {
    if (empty($value)) {
        echo $message . "\n";
        return false;
    }
    return true;
}

// Recherche une catégorie par une clé donnée (code, nom, etc.)
// Retourne l'index si trouvé, sinon false
function rechercheCategorieParCle(array $categories, string $key, string $value): int|bool {
    foreach ($categories as $index => $categorie) {
        if ($categorie[$key] === $value) {
            return $index;
        }
    }
    return false;
}

// Saisie d'un champ obligatoire ET unique (vérifié via une clé de catégorie)
function saisieChampObligatoireEtUnique(array $categories, string $smsSaisie, string $smsError, string $key): string {
    do {
        $value = saisieChaine($smsSaisie);
        $valueIsValid = champObligatoire($value, $smsError);

        if ($valueIsValid) {
            $existe = rechercheCategorieParCle($categories, $key, $value);
            $valueIsValid = ($existe === false); 
            if (!$valueIsValid) {
                echo "Cette valeur existe déjà, veuillez en choisir une autre.\n";
            }
        }
    } while (!$valueIsValid);

    return $value;
}



// Enregistre une nouvelle catégorie
function enregistrerCategorie(): void {
    global $categories;

    $code = saisieChampObligatoireEtUnique($categories, "Entrez le code : ", "Champ obligatoire : ", "code");
    $nom  = saisieChampObligatoireEtUnique($categories, "Entrez le nom : ", "Champ obligatoire : ", "nom");

    $categorie = [
        "code" => $code,
        "nom" => $nom,
        "produits" => []
    ];

    $categories[] = $categorie;
}


afficheCategorieSansProduit($categories);















?>