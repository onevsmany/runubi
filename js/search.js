const candidatesList = document.getElementById('candidatesList');
let hpCharacters = [];

const loadCharacters = async () => {
    try {

        // need json script for the candidates profile cards. Something like this: https://hp-api.herokuapp.com/api/characters
        $("#searchBar").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".card").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        const res = await fetch('');
        hpCharacters = await res.json();
        displayCharacters(hpCharacters);
    } catch (err) {
        console.error(err);
    }
};

const displayCharacters = (characters) => {
    const htmlString = characters
        .map((character) => {
            return `
            <li class="character">
                <h2>${character.name}</h2>
                <p>House: ${character.house}</p>
                <img src="${character.image}"></img>
            </li>
        `;
        })
        .join('');
    candidatesList.innerHTML = htmlString;
};

loadCharacters();
