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
        btn.addEventListener('click', () => {
            const row = btn.closest('tr');
            const nome = row.querySelector('td:nth-child(1)').textContent;
            const preco = row.querySelector('td:nth-child(3)').textContent;

            document.getElementById('remove-modal-main').innerHTML = `
      <p><b>Nome:</b> ${nome}</p>
      <p><b>Preço:</b> ${preco}</p>
    `;
        });
    });


});
