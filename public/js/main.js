async function fethArticleList(event) {
    const articleList = document.getElementById('articleList');

    fetch('/articles'
    )
    .then(response => {
        if (!response.ok) {
            console.log('Произошла ошибка:', response.status);
        } else {
            response.json().then(text => {
                var rows = '';
                var num = 1;
                console.log(text.data);
                for(var row in text.data) {
                    row = text.data[row];
                    rows = rows + `
                    <tr>
                        <th scope="row">${num++}</th>
                        <td>${row.title}</td>
                        <td>${row.url}</td>
                        <td>${row.len} Kb</td>
                        <td>${row.word_count}</td>
                    </tr>`
                }
                articleList.innerHTML = rows;
            });
        }
    })
}




async function importArticle(event) {
    const keyWord = document.getElementById('importKeyWord').value;
    const importResult = document.getElementById('importResult');

    fetch('/article/import?keyword=' + keyWord
    )
    .then(response => {
        if (!response.ok) {
            console.log('Произошла ошибка:', response.status);
            response.json().then(text => {
                importResult.textContent = text;
            });
        } else {
            response.json().then(text => {
                importResult.textContent = text?.error?.message ??
                    "Импорт завершен. Найдена статья:\n\n"
                    + 'Адрес: ' + text.data.articleUrl + "\n"
                    + 'Название: ' + text.data.articleTitle + "\n"
                    + 'Размер: ' + text.data.articleSize + '\n'
                    + 'Кол-во слов: ' + text.data.wordCount + '\n'
                     + 'Время импорта: ' + text.data.elapsedTime;
                fethArticleList(event);
            });
        }
    })
}

fethArticleList();
const importButton = document.getElementById('importButton');
importButton.onclick = importArticle;
