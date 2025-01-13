// Fenêtre modale
const openModalButton = document.getElementById('open-profile');
const closeModalButton = document.getElementById('close-profile');
const modalOverlay = document.getElementById('profile-overlay');

openModalButton.addEventListener('click', () => {
    modalOverlay.classList.add('active');
});

closeModalButton.addEventListener('click', () => {
    modalOverlay.classList.remove('active');
});

window.addEventListener('click', (e) => {
    if (e.target === modalOverlay) {
        modalOverlay.classList.remove('active');
    }
});

// Voir le profil
const viewProfileButton = document.getElementById('view-profile');

viewProfileButton.addEventListener('click', () => {
    window.location.href = 'profil.php';
})

// Partager le profil
const shareProfileButton = document.getElementById('share-profile');

shareProfileButton.addEventListener('click', () => {
    const profileLink = "https://example.com/profil/pseudo"; // Remplacez par le lien du profil réel
    navigator.clipboard.writeText(profileLink)
    .then(() => {
        alert("Lien du profil copié dans le presse-papiers !");
    })
    .catch(err => {
        console.error("Échec de la copie du lien :", err);
    });
})

// Supprimé le compte
const deleteProfileButton = document.getElementById('delete-profile');

deleteProfileButton.addEventListener('click', () => {
    window.location.href = 'deleteProfile.php';
})

// Déconnecté le compte
const logoutProfileButton = document.getElementById('logout-profile');

logoutProfileButton.addEventListener('click', () => {
    window.location.href = 'logout.php';
})