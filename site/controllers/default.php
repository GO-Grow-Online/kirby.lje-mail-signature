<?php

return function ($page) {

    if (!kirby()->user()) {
        go('panel');
    }

    // Le reste de la logique de votre page s'exécute ici pour les membres connectés
    return [
        // 'data' => $data
    ];

}; 
?>
