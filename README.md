# Projet Symfony - Parc d'Attractions

## Description
Ce projet Symfony implémente un système de gestion pour un parc d'attractions. 
Il permet de gérer les attractions, les avis des visiteurs, les réservations, et les forfaits associés.

## Structure du projet
Le projet se compose des entités suivantes :
- **Attraction** : Représente une attraction dans le parc.
- **Avis** : Permet aux visiteurs de laisser des avis sur les attractions.
- **Visiteur** : Représente les visiteurs du parc.
- **Reservation** : Gère les réservations d'attractions, d'expériences, et de forfaits.
- **Forfait** : Représente les forfaits disponibles pour les visiteurs.
- **Expérience** : Représente les expériences spécifiques que les visiteurs peuvent réserver.
- **Employé** : Représente le personnel du parc qui gère les attractions.
- **Relations** : Utilisation de relations pour relier les entités telles que `Attraction` avec `Avis` via une relation sans jointure explicite.
