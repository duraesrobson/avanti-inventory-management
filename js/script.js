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


});
