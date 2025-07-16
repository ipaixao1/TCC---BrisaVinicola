// Seleciona o banner e os botões
const cookieBanner = document.getElementById('cookie-banner');
const acceptBtn = document.getElementById('accept-cookies');
const rejectBtn = document.getElementById('reject-cookies');

// Função para mostrar o banner de cookies
function showCookieBanner() {
    cookieBanner.style.display = 'block';
}

// Função para esconder o banner de cookies
function hideCookieBanner() {
    cookieBanner.style.display = 'none';
}

// Verifica se o usuário já aceitou ou rejeitou os cookies
function checkCookiesConsent() {
    if (!localStorage.getItem('cookiesAccepted')) {
        showCookieBanner();
    }
}

// Salva a decisão do usuário no armazenamento local (localStorage)
function setCookiesConsent(consent) {
    localStorage.setItem('cookiesAccepted', consent);
    hideCookieBanner();
}

// Adiciona os event listeners aos botões
acceptBtn.addEventListener('click', function() {
    setCookiesConsent('accepted');
});

rejectBtn.addEventListener('click', function() {
    setCookiesConsent('rejected');
});

// Verifica o status do consentimento ao carregar a página
checkCookiesConsent();
