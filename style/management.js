const addFolkloreForm = document.getElementById('addFolkloreForm');
        const folkloreList = document.getElementById('folkloreList');

        addFolkloreForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const title = document.getElementById('title').value;
            const description = document.getElementById('description').value;

            const listItem = document.createElement('li');
            listItem.innerHTML = `
                <h3 class="title_add">${title}</h3>
                <p>${description}</p>
                <button class="dellet" onclick="this.parentElement.remove()">Delete</button>
            `;

            folkloreList.appendChild(listItem);

            addFolkloreForm.reset();
        });