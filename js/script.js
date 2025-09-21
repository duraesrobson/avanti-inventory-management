document.addEventListener("DOMContentLoaded", () => {
    const params = new URLSearchParams(window.location.search);
    
    if (params.has("error")) {
        document.querySelector(".error-box").style.display = "flex";
    }

    // retorna no input o usuario que foi no post para mais eficiencia na reescrita, se necessaria
    if (params.has("usuario")) {
        document.getElementById("input-usuario").value = params.get("usuario");
    }
})