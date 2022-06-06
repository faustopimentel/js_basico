<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula JS</title>
</head>
<body>
    <div>
        <div>
            <label for="">title <input type="text" name="title"></label>
        </div>

        <div>
            <label for="">content <input type="text" name="content"></label>
        </div>

        <div>
           <button type="button" button-action="add">Add</button>
        </div>
    </div>

    <div>
        <ul class="app"></ul>
    </div>

<script>
    /** *
    document.querySelectorAll('.app').forEach(function(app, index){
        app.style.height = '90px'
        app.addEventListener('mouseenter', function(event){
            event.target.style.background = 'red'
            console.log(`mouse enter ${index}`)
        })
        app.addEventListener('mouseout', function(event){
            event.target.style.background = 'blue'
            console.log(`mouse out ${index}`)
        })
    })

    document.querySelector('button').addEventListener('click', function(event){
        var paragrafo = document.createElement('p')
        paragrafo.innerHTML = 'mensagem de teste 1245'

        document.querySelector('.app').appendChild(paragrafo)

        paragrafo.addEventListener('mouseenter', function(event){
            event.target.style.background = 'red'
        })

        paragrafo.addEventListener('mouseout', function(event){
            event.target.style.background = 'blue'
        })
    })

    //usando o Placeholder
    fetch('https://jsonplaceholder.typicode.com/todos/')
    .then(response => response.json())
    .then(allData => {
        allData.forEach(data => {
            var paragrafo = document.createElement('p')
            paragrafo.innerHTML = `Id: ${data.id} ${data.title}`
            document.querySelector('.app').appendChild(paragrafo)
        })
    })
    /**/
</script>

<script>
    function removeItem(itemAlvo) {
        if (!itemAlvo) {
            return;
        }

        let item = document.querySelector(`[item-id="${itemAlvo}"]`);

        if (!item) {
            console.log(itemAlvo);
            return;
        }

        item.remove();
    }

    function addItem(data) {
        if (!data || !data.title || !data.id || !data.content) {
            return;
        }

        let template = `
            <div>
                <h4>TITULO</h4>
            </div>

            <div>
                <p>CONTEUDO</p>

                <div>
                    <button button-action="remove" item-alvo="ITEM_ID">Remove</button>
                </div>
            </div>
        `;

        let html =  template.replaceAll('ITEM_ID', data.id)
                            .replaceAll('CONTEUDO', data.content)
                            .replaceAll('TITULO', data.title);

        let li = document.createElement('li');
        li.setAttribute('item-id', data.id);

        li.innerHTML = html;

        document.querySelector('.app').appendChild(li);

        li.querySelector('button[button-action="remove"]').addEventListener('click', event => {
            let itemAlvo = event.target.getAttribute('item-alvo');

            if (!itemAlvo) {
                return
            }

            removeItem(itemAlvo);
        })
    }

    document.querySelector('button[button-action="add"]').addEventListener('click', event => {

        let fakeId = parseInt(Math.random()*1000) + '' + parseInt(Math.random()*1000);
        let titleElement = document.querySelector('input[name="title"]');

        if (!titleElement) {
            return
        }

        let contentElement = document.querySelector('input[name="content"]');

        if (!contentElement) {
            return
        }

        addItem({
            id: fakeId,
            content: contentElement.value,
            title: titleElement.value
        })

        contentElement.value = '';
        titleElement.value = '';
    })


    /*
        pegar o valor dentro do input e colocar no coteúdo e título quando clicar em adicionar
        limpar o input apos
    */

</script>

</body>
</html>
