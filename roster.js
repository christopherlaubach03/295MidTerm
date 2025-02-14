document.addEventListener('DOMContentLoaded', function() {
    const statsButtons = document.querySelectorAll('.stats-button');

    statsButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.dataset.target;
            const statsRow = document.getElementById(targetId);

          
            document.querySelectorAll('.stats-row.show').forEach(row => {
                if (row !== statsRow) {
                    row.classList.remove('show');
                }
            });

           
            if (statsRow) {
                statsRow.classList.toggle('show');
            }
        });
    });
});