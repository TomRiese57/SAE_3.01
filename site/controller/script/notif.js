document.getElementById('notif').addEventListener('click', () => {
    window.location.href = 'notification.php';
});

// Demandes d'amis
document.getElementById('accepter').addEventListener('click', () => {
    const idNotif = button.closest('tr').dataset.id;
        fetch(`handleNotification.php?action=accept&notifId=${idNotif}`)
            .then(() => {
                alert("Demande refusée !");
                location.reload();
            })
            .catch(err => console.error(err));
});

document.getElementById('refuser').addEventListener('click', () => {
    const idNotif = button.closest('tr').dataset.id;
        fetch(`handleNotification.php?action=decline&notifId=${idNotif}`)
            .then(() => {
                alert("Demande refusée !");
                location.reload();
            })
            .catch(err => console.error(err));
});
// Nouveau Meilleur Temps
document.getElementById('marquerCommeLue').addEventListener('click', () => {
    const idNotif = button.closest('tr').dataset.id;
        fetch(`handleNotification.php?action=markAsRead&notifId=${idNotif}`)
            .then(() => {
                alert("Demande refusée !");
                location.reload();
            })
            .catch(err => console.error(err));
});