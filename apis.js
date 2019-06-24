const formulario = $("#formulario");
const resultado = $("#resultado");
const pesquisa = $("#pesquisa");
const login = $("#btnIniciar");
const logout = $("#btnSair");
const apiUrl = "https://api.github.com/search/users";
const apiRepoUrl = "https://api.github.com/users//repos";

login.click(function() {
    window.open("./login.php", "_self", false);
});

logout.click(function() {
    window.open("./logout.php", "_self", false);
});

formulario.submit(function(e) {
    e.preventDefault();
    if (pesquisa.val().length <= 0) return;
    const pesquisaAtual = pesquisa.val();
    pesquisa.val("");

    $.ajax({
        url: apiUrl,
        data: {
            q: pesquisaAtual,
            per_page: 5
        },
        method: "GET",
        dataType: "JSON",
        success: function({ items }) {
            const armazena = [items[0], items[1], items[2], items[3], items[4]];
            if (items[0] == null) {
                resultado.html("");
                resultado.append(empty());
                return;
            }

            const card = armazena.map(user => createCardUser(user.login, user.avatar_url, user.html_url));
            resultado.html("");
            card.forEach(user => resultado.append(card));
        }
    });
});

function createCardUser(login, avatar_url, html_url) {
    const conteudo = $("<div class = row mx-auto my-5>");
    const conteudoL = $('<div class="col-md-6 mx-auto my-5">');
    const username = $('<p style="text-align: center; font-family: Comfortaa; font-size: 20px " class=mt-1>').html(login);
    const imagem = $('<img class="img-fluid mx-auto d-block alt="Responsive image">').attr("src", avatar_url);
    const link = $('<a class="btn btn-warning ml-2 mb-5 d-block px-md-5" style="float:center;" target="_blank"></a>')
        .attr("href", html_url)
        .html("See Profile");
    const conteudoR = $('<div class="col-md-6 mx-auto my-5">');
    const reposDiv = $("<div>");

    $.ajax({
        url: "https://api.github.com/users/" + login + "/repos",
        method: "GET",
        data: {
            per_page: 5
        },
        dataType: "JSON",
        success: function(repos) {
            console.log(reposDiv);
            reposDiv.html(repos.map(r => createCardRepoHTML(r.name, r.private, r.html_url)).join(""));
        }
    });
    if (reposDiv.html() == null) {
        reposDiv.html("Esta Conta não tem repositorios");
    }

    conteudoL
        .append(imagem)
        .append(username)
        .append(link);

    conteudoR.append(reposDiv);

    return conteudo.append(conteudoL).append(conteudoR);
}
function empty() {
    const vazio = $('<div class="col-12 mx-auto my-5">');
    const label = $('<p style="text-align: center; font-family: Comfortaa; font-size: 20px " class=mt-1>').html("Não Existem perfis com esse nome");
    return vazio.append(label);
}

function createCardRepoHTML(name, private, url) {
    return `
        <div class="col">
            <div class="">
                <div class="card card-body">
                <p class="card-text">Repositorio: ${name}</p>
                <p class="card-text">Privado: ${private}</p>
                <a class="btn btn-success" href="${url}">Mais do Repositorio</a> 
                </div>
            </div>
        </div>
        `;
}
