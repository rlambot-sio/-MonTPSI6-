<?php

function creationPanier() { //Fonction permettant la création du panier
    if (!isset($_SESSION['panier'])) { //Si le panier n'a pas été crée, on l'initialise
        $_SESSION['panier'] = array();
        $_SESSION['panier']['id'] = array();
        $_SESSION['panier']['qte'] = array();
        $_SESSION['panier']['prix'] = array();
    }
    return true;
}

function ajouterArticle($id, $qte, $prix) { //Fonction d'ajout d'article au panier
    if (creationPanier()) { //Si le panier existe
        //s'il y a déjà une quantité, on l'ajoute à la précédente
        $positionProduit = array_search($id, $_SESSION['panier']['id']);

        if ($positionProduit !== false) {
            $_SESSION['panier']['qte'][$positionProduit] += $qte;
        } else { //Sinon on ajoute le produit
            array_push($_SESSION['panier']['id'], $id);
            array_push($_SESSION['panier']['qte'], $qte);
            array_push($_SESSION['panier']['prix'], $prix);
        }
    } else
        echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

function supprimerArticle($id) { //Fonction de suppression d'article
    if (creationPanier()) { //Si le panier existe
        //Création d'un panier temporaire
        $tmp = array();
        $tmp['id'] = array();
        $tmp['qte'] = array();
        $tmp['prix'] = array();

        for ($i = 0; $i < count($_SESSION['panier']['id']); $i++) { //On supprime la quantité existente du produit
            if ($_SESSION['panier']['id'][$i] !== $id) {
                array_push($tmp['id'], $_SESSION['panier']['id'][$i]);
                array_push($tmp['qte'], $_SESSION['panier']['qte'][$i]);
                array_push($tmp['prix'], $_SESSION['panier']['prix'][$i]);
            }
        }
        //On remplace le panier existant par le panier temporaire
        $_SESSION['panier'] = $tmp;
        //On efface le panier temporaire
        unset($tmp);
    } else
        echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

function MontantGlobal() { //Fonction calculant le montant total du panier
    $total = 0;
    for ($i = 0; $i < count($_SESSION['panier']['id']); $i++) {
        $total += $_SESSION['panier']['qte'][$i] * $_SESSION['panier']['prix'][$i];
    }
    return $total;
}

function supprimePanier() { //Fonction supprimant l'ensemble du panier
    unset($_SESSION['panier']);
}

?>