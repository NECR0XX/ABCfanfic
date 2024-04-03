$(document).ready(function(){
    $('.star').on('click', function(){
        var rating = $(this).data('rating');
        var fanficId = $(this).closest('.item').data('id');
        
        // Remove a classe 'rated' de todas as estrelas no mesmo item
        $(this).siblings().removeClass('rated');
        // Adiciona a classe 'rated' a todas as estrelas até a que foi clicada
        $(this).prevAll().addBack().addClass('rated');
        console.log('Enviando dados de avaliação:', rating, fanficId);
        $.ajax({
            url: 'save_rating.php',
            method: 'POST',
            data: { rating: rating, fanficId: fanficId },
            success: function(response){
                console.log('Avaliação salva com sucesso!');
            },
            error: function(xhr, status, error){
                console.error('Erro ao salvar avaliação:', error);
            }
        });
    });
});
