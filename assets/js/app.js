jQuery(function ($) {

    console.log('js loaded');

    $('.btn--copy').on('click', function(e) {
        e.preventDefault();
        console.log('btn--copy');
        const targetId = $(this).attr('data-id'); 
        copyToClipboard(targetId);
    });

    function copyToClipboard(elementId) {
        const container = document.getElementById(elementId);
        
        if (!container) {
            console.error("Impossible de trouver la signature avec l'ID : " + elementId);
            return;
        }

        const range = document.createRange();
        range.selectNode(container);
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);
        
        try {
            document.execCommand('copy');
            alert('Signature copiée dans le presse-papier ! Vous pouvez maintenant la coller (Ctrl+V / Cmd+V) dans votre client mail.');
        } catch(err) {
            alert('Oups, impossible de copier la signature. Veuillez la sélectionner manuellement.');
        }
        
        window.getSelection().removeAllRanges();
    }

});