<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générateur de Signatures LJE</title>
    <?= css('assets/css/style.css') ?>

    <meta name="robots" content="noindex, nofollow">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

    <h1>Générateur de Signatures LJE</h1>

    <?php 
    // On récupère toutes les pages créées avec le blueprint "signature"
    $signatures = $site->pages()->template('signature');
    
    if ($signatures->isNotEmpty()):
        foreach ($signatures as $signature): 
            // On crée un ID unique pour le javascript
            $sigId = 'sig-' . $signature->slug(); 
    ?>
    
    <div class="signature-card">
        <h2 class="signature-card__title"><?= $signature->firstname() ?> <?= $signature->lastname() ?></h2>
        
        <div class="signature-card__signature" id="<?= $sigId ?>">
            <table cellpadding="0" cellspacing="0" border="0" style="font-family: Montserrat, Arial, Helvetica, sans-serif; font-size: 12px; color: #628d9c;">
                <tr>
                    <td style="padding-right: 20px; vertical-align: top;">
                        <img src="<?= $site->url() ?>/signature-assets/logo.png" alt="Les Jeunes Entreprises" width="130" style="display:block; border:none;">
                    </td>
                    <td style="vertical-align: top;">
                        <table cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td style="font-size: 16px; font-weight: bold; color: #216173; padding-bottom: 2px;">
                                    <?= $signature->firstname()->html() ?> <?= $signature->lastname()->html() ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 13px; font-style: italic; color: #81a8b5; padding-bottom: 5px;">
                                    <?= $signature->role()->html() ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 13px; color: #628d9c;">
                                    <?= $signature->phone()->html() ?>
                                </td>
                            </tr>
                            <?php if($signature->email()->isNotEmpty()): ?>
                            <tr>
                                <td style="font-size: 13px; color: #628d9c;">
                                    <a href="mailto:<?= $signature->email() ?>" style="color: #628d9c; text-decoration: none;"><?= $signature->email()->html() ?></a>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <td style="padding-top: 15px; font-size: 13px; font-weight: bold; color: #216173;">
                                    Les Jeunes Entreprises ASBL
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; color: #628d9c; padding-top: 2px;">
                                    Rue Dr Elie Lambotte, 10 &bull; 1030 Bruxelles
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; color: #628d9c; padding-top: 2px;">
                                    +32 (0)2 245 13 80 &bull; <a href="https://www.lje.be" style="color: #628d9c; text-decoration: none;">www.lje.be</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 10px;">
                                    <?php if($signature->linkedin()->isNotEmpty()): ?>
                                    <a href="<?= $signature->linkedin() ?>"><img src="<?= $site->url() ?>/signature-assets/linkedin.png" alt="LinkedIn" width="22" height="22" style="display:inline-block; border:none; margin-right:4px;"></a>
                                    <?php endif; ?>
                                    
                                    <?php if($signature->youtube()->isNotEmpty()): ?>
                                    <a href="<?= $signature->youtube() ?>"><img src="<?= $site->url() ?>/signature-assets/youtube.png" alt="YouTube" width="22" height="22" style="display:inline-block; border:none; margin-right:4px;"></a>
                                    <?php endif; ?>
                                    
                                    <?php if($signature->facebook()->isNotEmpty()): ?>
                                    <a href="<?= $signature->facebook() ?>"><img src="<?= $site->url() ?>/signature-assets/facebook.png" alt="Facebook" width="22" height="22" style="display:inline-block; border:none; margin-right:4px;"></a>
                                    <?php endif; ?>
                                    
                                    <?php if($signature->instagram()->isNotEmpty()): ?>
                                    <a href="<?= $signature->instagram() ?>"><img src="<?= $site->url() ?>/signature-assets/instagram.png" alt="Instagram" width="22" height="22" style="display:inline-block; border:none; margin-right:4px;"></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <button class="signature-card__btn btn btn--copy" data-id="<?= $sigId ?>">Copier cette signature</button>
    </div>

    <?php 
        endforeach;
    else: 
    ?>
        <p>Aucune signature n'a été créée. Rendez-vous dans le Panel Kirby (<code>/panel</code>) pour ajouter votre première signature.</p>
    <?php endif; ?>

    <?= js('assets/js/api/jquery.js') ?>
    <?= js('assets/js/app.js') ?>

</body>
</html>