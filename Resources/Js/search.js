// BARRA DE PESQUISA
const suggestionToUrlMap = {
    "Perfil": "../../abcfanfic/Public/User/perfil.php",
    "Tags": "../../abcfanfic/Public/User/tags.php",
    "Sobre": "../../abcfanfic/Public/User/sobre.php",
    "Favoritos": "../../abcfanfic/Public/User/favoritos.php",
    "Postar Fanfic": "../../abcfanfic/Public/User/post.php",
    "Ação": "../../abcfanfic/Public/User/tags/acao.php?categoria_id=1",
    "Aventura": "../../abcfanfic/Public/User/tags/aventura.php?categoria_id=2",
    "Comédia": "../../abcfanfic/Public/User/tags/comedia.php?categoria_id=3",
    "Drama": "../../abcfanfic/Public/User/tags/drama.php?categoria_id=4",
    "Fantasia": "../../abcfanfic/Public/User/tags/fantasia.php?categoria_id=5",
    "Guerra": "../../abcfanfic/Public/User/tags/guerra.php6",
    "Luta": "../../abcfanfic/Public/User/tags/luta.php?categoria_id=7",
    "Romance": "../../abcfanfic/Public/User/tags/romance.php?categoria_id=8",
    "Suspense": "../../abcfanfic/Public/User/tags/suspense.php?categoria_id=9",
    "Terror": "../../abcfanfic/Public/User/tags/terror.php?categoria_id=10",
  };
  
  const searchInput = document.getElementById('search-input');
  const suggestionsList = document.getElementById('suggestions');
  
  searchInput.addEventListener('input', function () {
    const inputValue = searchInput.value.toLowerCase();
    const filteredSuggestions = Object.keys(suggestionToUrlMap).filter(suggestion => suggestion.toLowerCase().includes(inputValue));
  
    displaySuggestions(filteredSuggestions);
  
    // Verifique se o valor do campo de entrada está vazio
    if (inputValue === '') {
        suggestionsList.style.display = 'none';
    }
  });
  
  function displaySuggestions(suggestionsArray) {
    suggestionsList.innerHTML = '';
  
    if (suggestionsArray.length === 0) {
        suggestionsList.style.display = 'none';
        return;
    }
  
    suggestionsArray.forEach(suggestion => {
        const listItem = document.createElement('li');
        listItem.textContent = suggestion;
        listItem.addEventListener('click', function () {
            redirectToPage(suggestion);
        });
        suggestionsList.appendChild(listItem);
    });
  
    suggestionsList.style.display = 'block';
  }
  
  function redirectToPage(query) {
    const url = suggestionToUrlMap[query];
    if (url) {
        window.location.href = url;
    } else {
        alert("URL não encontrada para esta sugestão.");
    }
  }