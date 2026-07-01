<?php

$categories = [

    0 => [
        "code" => "C001",
        "nom" => "categorie1",
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
        "code" => "C002",
        "nom" => "categorie2",
        "produits" => []
    ]
];



echo "Catégories sans produit :\n";

foreach ($categories as $categorie) {
    if (empty($categorie["produits"])) {
        echo $categorie["nom"] . "\n";
    }
}



$codeIsValid = true;

do {

    $codeIsValid = true;
    $code = readline("Saisir le code : ");

    if (empty($code)) {
        echo "Le code est obligatoire.\n";
        $codeIsValid = false;
    } else {
        foreach ($categories as $categorie) {
            if ($categorie["code"] === $code) {
                echo "Le code existe déjà.\n";
                $codeIsValid = false;
                break;
            }
        }
    }

} while (!$codeIsValid);

$nomIsValid = true;

do {

    $nomIsValid = true;
    $nom = readline("Saisir le nom : ");

    if (empty($nom)) {
        echo "Le nom est obligatoire.\n";
        $nomIsValid = false;
    } else {
        foreach ($categories as $categorie) {
            if ($categorie["nom"] === $nom) {
                echo "Le nom existe déjà.\n";
                $nomIsValid = false;
                break;
            }
        }
    }

} while (!$nomIsValid);

$categorie = [
    "code" => $code,
    "nom" => $nom,
    "produits" => []
];

$categories[] = $categorie;

echo "Catégorie ajoutée avec succès.\n";



$categorieExiste = false;

$code = readline("Saisir le code de la catégorie : ");

foreach ($categories as $index => $categorie) {

    if ($categorie["code"] === $code) {
        $categorieExiste = true;
        break;
    }

}

if ($categorieExiste) {

    $nomProduit = readline("Saisir le nom : ");
    $reference = readline("Saisir la référence : ");

    do {
        $prix = (int) readline("Saisir le prix : ");
        if ($prix <= 0) {
            echo "Le prix doit être positif.\n";
        }
    } while ($prix <= 0);

    do {
        $quantite = (int) readline("Saisir la quantité : ");
        if ($quantite <= 0) {
            echo "La quantité doit être positive.\n";
        }
    } while ($quantite <= 0);

    $produit = [
        "nom" => $nomProduit,
        "reference" => $reference,
        "prix" => $prix,
        "quantite" => $quantite
    ];

    $categories[$index]["produits"][] = $produit;

    echo "Produit ajouté avec succès.\n";

} else {

    echo "Désolé, cette catégorie n'existe pas.\n";

}


$codeIsValid = true;

do {

    $codeIsValid = true;
    $code = readline("Saisir le code : ");

    if (empty($code)) {
        echo "Le code est obligatoire.\n";
        $codeIsValid = false;
    } else {
        foreach ($categories as $categorie) {
            if ($categorie["code"] === $code) {
                echo "Le code existe déjà.\n";
                $codeIsValid = false;
                break;
            }
        }
    }

} while (!$codeIsValid);

$nomIsValid = true;

do {

    $nomIsValid = true;
    $nom = readline("Saisir le nom : ");

    if (empty($nom)) {
        echo "Le nom est obligatoire.\n";
        $nomIsValid = false;
    } else {
        foreach ($categories as $categorie) {
            if ($categorie["nom"] === $nom) {
                echo "Le nom existe déjà.\n";
                $nomIsValid = false;
                break;
            }
        }
    }

} while (!$nomIsValid);

$produits = [];

do {

    $nomProduit = readline("Saisir le nom : ");
    $reference = readline("Saisir la référence : ");

    do {
        $prix = (int) readline("Saisir le prix : ");
        if ($prix <= 0) {
            echo "Le prix doit être positif.\n";
        }
    } while ($prix <= 0);

    do {
        $quantite = (int) readline("Saisir la quantité : ");
        if ($quantite <= 0) {
            echo "La quantité doit être positive.\n";
        }
    } while ($quantite <= 0);

    $produit = [
        "nom" => $nomProduit,
        "reference" => $reference,
        "prix" => $prix,
        "quantite" => $quantite
    ];

    $produits[] = $produit;

    $choix = strtolower(readline("Voulez-vous ajouter un autre produit ? (oui/non) : "));

} while ($choix === "oui");

$categorie = [
    "code" => $code,
    "nom" => $nom,
    "produits" => $produits
];

$categories[] = $categorie;

echo "Catégorie avec produits ajoutée avec succès.\n";



var_dump($categories);

?>