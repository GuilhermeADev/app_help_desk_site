document.addEventListener("DOMContentLoaded", function () {
    const tokenInput = document.querySelector('input[name="token"]');
    
    function generateRandomToken() {
        const characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        let token = "";
        for (let i = 0; i < 10; i++) {
            const randomIndex = Math.floor(Math.random() * characters.length);
            token += characters.charAt(randomIndex);
        }
        return token;
    }

    function isTokenUnique(token) {
        
        return true;
    }

    function generateUniqueToken() {
        let token;
        do {
            token = generateRandomToken().toUpperCase();
        } while (!isTokenUnique(token));
        tokenInput.value = token;
    }

   
    document.addEventListener("DOMContentLoaded", function () {
        const tokenInput = document.querySelector('input[name="token"]');
        
        if (tokenInput) {
            tokenInput.addEventListener("click", function () {
            });
        } else {
            console.error('Element with name "token" not found.');
        }
    });
    
    generateUniqueToken();
});