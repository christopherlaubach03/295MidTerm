document.addEventListener('DOMContentLoaded', 
function() 
{
    const statsButtons = document.querySelectorAll('.stats-button');
    
    for (let i = 0; i < statsButtons.length; i++) 
    {
        const currentButton = statsButtons[i];
        currentButton.addEventListener
        ('click', function() {
        const targetId = this.dataset.target;
        const statsRow = document.getElementById(targetId);

        if (statsRow) 
            {
                if (statsRow.classList.contains('show')) 
                {
                    statsRow.classList.remove('show');
                } 
                else 
                {
                statsRow.classList.add('show');
                }
            }
        });
    }
});