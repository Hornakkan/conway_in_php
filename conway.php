<?php

function sequence($nbr) {

    if ($nbr >= 0) {
        if($nbr === 0) {
            echo "1\n";
        } else if($nbr === 1) {
            echo "1\n11\n";
        } else {
            
            // $nbr = nombre de lignes attendues

            $valeur = "";      // initialiser la valeur de départ
            $affichage = "1";   // initialiser l'affichage de départ
            $compteur = 0;         // intialiser le $compteur

            echo $affichage."\n"; // premier affichage avec la valeur 1

            for($ligne = 0; $ligne < $nbr; $ligne++) {
                $split = str_split($affichage);     // je split le dernier nombre affiché dans un tableau pour le lire
                $reference = $split[0];             // prendre le premier chiffre du tableau pour initialiser $reference
                $compteur = 0;                      // initialiser le $compteur

                for($i=0; $i<count($split); $i++) {  // faire une boucle sur toute la longueur du tableau pour lire le split du $affichage
                    if($split[$i] == $reference) {  // si le chifre lu correspond à ma $reference
                        $compteur++;                // alors jincrémente le compteur
                    } else {                                            
                        $referenceNew = $split[$i];                    
                        $valeur .= $compteur.$reference;    // sinon j'alimente $valeur avec le $compteur et la $reference
                        $reference = $referenceNew;         // je change la valeur de $reference avec celle du nouveau chiffre lu
                        $compteur = 1;                      // je réinitialise le $compteur car nouveau chiffre
                    }       
                    if($i == (count($split)-1)){            // si j'arrive en fin de chaîne je dois alimenter $valeur
                        $valeur .= $compteur.$reference;
                    }             
                } 
        
                // j'ai terminé de lire tout les chiffres de $affichage
                // donc je renvoie la $valeur et je modifie $affichage en conséquence
                // puis je réinitialise $valeur

                echo $valeur."\n";
                $affichage = $valeur;
                $valeur="";
            }
        }

    } else {
        return;
    }

}

//sequence(5);