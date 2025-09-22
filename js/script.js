document.addEventListener("DOMContentLoaded", () => {
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

    document.querySelectorAll('.table-remove-btn').forEach(btn => {
        btn.addEventListener('click', async () => {
            const id = btn.getAttribute('data-id');
            const modal = document.getElementById('remove-modal');
            modal.showModal();

            // Buscar dados do produto via AJAX
            try {
                const response = await fetch(`php/get-produto.php?id=${id}`);
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



});
