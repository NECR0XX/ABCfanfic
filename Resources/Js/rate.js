$(document).ready(function(){
    $('.star').on('click', function(){
        var rating = $(this).data('rating');
        var itemId = $(this).closest('.item').data('id');
        $.ajax({
            url: 'save_rating.php',
            method: 'POST',
            data: { rating: rating, itemId: itemId },
            success: function(response){
                console.log('Avaliação salva com sucesso!');
            },
            error: function(xhr, status, error){
                console.error('Erro ao salvar avaliação:', error);
            }
        });
    });
});
