<?php

return [
    'debug'  => true,
    'hooks' => [
        'route:before' => function ($route, $path, $method) {
            // Liste des pages qui doivent rester accessibles sans être connecté
            $allowedPaths = ['login', 'panel', 'media', 'assets'];
            
            // On vérifie si le chemin actuel commence par l'un des chemins autorisés
            $isAllowed = false;
            foreach ($allowedPaths as $allowed) {
                if (strpos($path, $allowed) === 0) {
                    $isAllowed = true;
                    break;
                }
            }

            // Si l'utilisateur n'est pas connecté et que la page n'est pas autorisée -> Redirection
            if (!kirby()->user() && !$isAllowed) {
                go('login'); // Redirige vers votre page "site.com/login"
            }
        }
    ]
];