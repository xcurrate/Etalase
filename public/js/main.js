document.addEventListener('DOMContentLoaded', () => {
    const voteButtons = document.querySelectorAll('.vote-btn');
    voteButtons.forEach(btn => {
        btn.addEventListener('click', async e => {
            const id = e.target.dataset.creator;
            const res = await fetch('/vote', {
                method:'POST',
                headers:{'Content-Type':'application/x-www-form-urlencoded'},
                body: new URLSearchParams({creator_id:id})
            });
            const j = await res.json();
            alert(j.ok ? 'Vote tercatat' : j.msg || 'Gagal');
        });
    });
});
