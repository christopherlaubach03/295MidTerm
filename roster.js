document.addEventListener('DOMContentLoaded', 
function() 
{
    const statsButtons = document.querySelectorAll('.stats-button');
    
    for (let i = 0; i < statsButtons.length; i++) 
    {
        const currentButton = statsButtons[i];
        currentButton.addEventListener('click', 
        function() {
        const targetId = this.dataset.target;
        const statsRow = document.getElementById(targetId);

        const allStatsRows = document.quarrySelectorAll('.stats-row'); // For all stats row

        for(let i =0; i < allStatsRows.length; i++) //  looks through all the rows and closes them before the next row is open 
        {
            const currentRow = allStatsRows[i];
            if(currentRow !== statsRow && currentRow.classList.contains('show'))
            {
                statsRow.classList.remove('show');
            }
        }

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