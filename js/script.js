document.addEventListener("DOMContentLoaded", async () => {
    const params = new URLSearchParams(window.location.search);

    if (params.has("error")) {
        document.querySelector(".error-box").style.display = "flex";
    };

    // retorna no input o usuario que foi no post para mais eficiencia na reescrita, se necessaria
    if (params.has("usuario")) {
        document.getElementById("input-usuario").value = params.get("usuario");
    };

    const openButtons = document.querySelectorAll('.open-modal');

    openButtons.forEach(button => {
        button.addEventListener('click', () => {
            const modalId = button.getAttribute('data-modal');
            const modal = document.getElementById(modalId);

            if (modalId === 'insert-modal') {
                // se o modal for de insert, o formulario abre com os campos vazios
                modal.querySelector('form').reset();
            }

            modal.showModal();
        });
    });

    const closeButtons = document.querySelectorAll('.close-modal, .modal-footer-discard-btn');

    closeButtons.forEach(button => {
        button.addEventListener('click', () => {
            const modalId = button.getAttribute('data-modal');
            const modal = document.getElementById(modalId);

            modal.close();
        });
    });

    // script que busca os dados do produto pelo id no modal de excluir produto
    let idProdutoRemover = null;

    document.querySelectorAll('.table-remove-btn').forEach(btn => {
        btn.addEventListener('click', async () => {
            idProdutoRemover = btn.getAttribute('data-id');
            const modal = document.getElementById('remove-modal');
            modal.showModal();

            // dados do produto com AJAX
            try {
                const response = await fetch(`php/get-produto.php?id=${idProdutoRemover}`);
                const produto = await response.json();

                if (produto.error) {
                    document.getElementById('remove-modal-main').innerHTML = `<p>${produto.error}</p>`;
                } else {
                    document.getElementById('remove-modal-main').innerHTML = `
                    <p><b>Nome:</b> ${produto.nome}</p>
                    <p><b>SKU:</b> ${produto.sku}</p>
                    <p><b>Quantidade:</b> ${produto.quantidade}</p>
                    <p><b>Preço:</b> R$ ${Number(produto.preco).toFixed(2)}</p>
                `;
                }
            } catch (err) {
                console.error(err);
                document.getElementById('remove-modal-main').innerHTML = `<p>Erro ao buscar produto.</p>`;
            }
        });
    });

    // script para remover o produto ao clickar no botao confirmar
    document.getElementById('remove-confirm-btn').addEventListener('click', async () => {
        if (!idProdutoRemover) return;

        try {
            const response = await fetch('php/remove-produto.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `id=${idProdutoRemover}`
            });

            const result = await response.json();

            if (result.success) {
                alert('Produto removido!');
                location.reload();
            } else {
                alert(result.error || 'Erro ao remover produto');
            }
        } catch (err) {
            console.error(err);
            alert('Erro ao remover produto.');
        }
    });

    document.querySelectorAll('.table-edit-btn').forEach(btn => {
        btn.addEventListener('click', async () => {
            const id = btn.closest('tr').querySelector('.table-remove-btn').getAttribute('data-id');
            const modal = document.getElementById('edit-modal');
            modal.showModal();

            try {
                const response = await fetch(`php/get-produto.php?id=${id}`);
                const produto = await response.json();

                if (produto.error) {
                    alert(produto.error);
                } else {
                    // ao abrir o modal de edição, busca os dados atuais do produto via AJAX e preenche os inputs
                    document.getElementById('edit-nome-produto').value = produto.nome || '';
                    document.getElementById('edit-sku-produto').value = produto.sku || '';
                    document.getElementById('edit-categoria-produto').value = produto.categoria || '';
                    document.getElementById('edit-preco-produto').value = produto.preco || '';
                    document.getElementById('edit-quantidade-produto').value = produto.quantidade || '';
                    document.getElementById('edit-fornecedor-produto').value = produto.fornecedor || '';
                    document.getElementById('edit-descricao-produto').value = produto.descricao || '';
                }

                // salva o id no formulário para usar no fetch
                document.querySelector('#edit-modal form').setAttribute('data-id', id);

            } catch (err) {
                console.error(err);
                alert('Erro ao carregar dados do produto.');
            }
        });
    });

    // faz o submit do formulário de edição
    document.querySelector('#edit-modal form').addEventListener('submit', async (e) => {
        e.preventDefault();

        const id = e.target.getAttribute('data-id');
        const formData = new FormData(e.target);
        formData.append('id', id);

        try {
            const response = await fetch('php/update-produto.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.success) {
                alert('Produto atualizado!');
                location.reload();
            } else {
                alert(result.error || 'Erro ao atualizar produto');
            }

        } catch (err) {
            console.error(err);
            alert('Erro ao atualizar produto.');
        }
    });

    // faz o submit do formulário de inserção
    document.querySelector('#insert-modal form').addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(e.target);

        try {
            const response = await fetch('php/insert-produto.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.success) {
                alert('Produto adicionado!');
                location.reload();
            } else {
                alert(result.error || 'Erro ao adicionar produto');
            }

        } catch (err) {
            console.error(err);
            alert('Erro ao adicionar produto.');
        }
    });

    // script para fazer sort das heads da tabela ao clickar
    document.querySelectorAll(".main-table th").forEach((th, colIndex) => {

        // não deixa ordenar a coluna "ações"
        if (th.innerText.trim() === "Ações") return;

        th.addEventListener("click", () => {
            const table = th.closest("table");
            const tbody = table.querySelector("tbody");
            const rows = Array.from(tbody.querySelectorAll("tr"));
            const asc = th.classList.toggle("asc");

            // limpa "asc" das outras colunas
            table.querySelectorAll("th").forEach(h => {
                if (h !== th) h.classList.remove("asc");
            });

            rows.sort((a, b) => {
                const A = a.children[colIndex].innerText.trim();
                const B = b.children[colIndex].innerText.trim();

                // remove o R$ que está indo para tabela e troca pontos e virgulas
                function normalizar(valor) {
                    return valor
                        .replace("R$", "")
                        .replace(/\./g, "")
                        .replace(",", ".")
                        .trim();
                }

                // tenta converter para número (quantidade e preço)
                const numA = parseFloat(normalizar(A));
                const numB = parseFloat(normalizar(B));

                if (!isNaN(numA) && !isNaN(numB)) {
                    return asc ? numA - numB : numB - numA;
                }
                return asc ? A.localeCompare(B) : B.localeCompare(A);
            });

            rows.forEach(row => tbody.appendChild(row));
        });
    });
});
