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
   1 =>      [
            "code" => "C002",
            "nom" => "categorie2",
            "produits" => []
         ]
];


  foreach ($categories as  $categorie ) {
    if (empty($categorie["produits"])) {
         echo $categorie["nom"]."\n";
    }
 }


     $codeIsValid = true;
    
   do { 
        
        $code = readline("saisir le code :");
        if (empty($code)) {
            echo "le code est obligatoire \n";
             $codeIsValid = false;
        }else{
            foreach ($categories as  $categorie ) {
               if (($categorie["code"]) === $code) {
                $codeIsValid = false;
                echo "le code existe deja ...\n"; 
         }
       }  
}
        


    } while (!$codeIsValid);
    
     $nomIsValid = true;
  do { 
        
        $nom = readline("saisir le nom : ");
        if (empty($nom)) {
            echo "le nom est obligatoire";
             $nomIsValid= false;
        }else{
            foreach ($categories as  $categorie ) {
               if (($categorie["nom"]) === $nom) {
                $nomIsValid = false;
                echo "le nom existe deja ..."; 
         }
       }  
}
    } while (!$nomIsValid);



    $categorie  =   [
            "code" => $code,
            "nom" => $nom,
            "produits" => []
         ];

         $categories[] = $categorie;


           $categorieExiste =  false;
          $code = readline("saisir le code :");
             foreach ($categories as $index => $categorie ) {
               if (($categorie["code"]) === $code) {
                    $categorieExiste = true;
                    break;
         }
       } 

       if ($categorieExiste) {
        $produit =   [
                    "nom" => readline("saisir le nom : "),
                    "reference" => readline("saisir la reference : "),
                    "prix" => (int)readline("saisir le prix : "),
                    "quantite" => (int)readline("saisir la quantité : ")
                  ] ;
          $categories[$index]["produits"][] = $produit;
       }else {
          echo " désolé , la categorie n'existe pas...";
       }













?>