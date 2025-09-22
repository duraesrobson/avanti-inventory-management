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

    const closeButtons = document.querySelectorAll('.close-modal, .edit-modal-footer-discard-btn');

    closeButtons.forEach(button => {
        button.addEventListener('click', () => {
            const modalId = button.getAttribute('data-modal');
            const modal = document.getElementById(modalId);

            modal.close();
        });
    });

});
