document.addEventListener('DOMContentLoaded', function() {
    const statsButtons = document.querySelectorAll('.stats-button');
    const allPlayerDetailCells = document.querySelectorAll('.player-details-cell'); 
    const allPlayerInfoRows = document.querySelectorAll('.player-info-row'); 

    if (typeof rosterData === 'undefined' || !Array.isArray(rosterData)) {
        console.error("Error: rosterData is not defined or not an array.");
        
        return;
    }

    statsButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.stopPropagation(); 

            const playerId = this.dataset.playerId; 
            const parentCell = this.closest('.player-details-cell'); 
            const parentRow = this.closest('.player-info-row'); 
            const targetOverlay = parentCell ? parentCell.querySelector('.stats-overlay') : null; 

            if (!parentCell || !parentRow || !targetOverlay) {
                console.error(`Error: Could not find necessary elements for player ID: ${playerId}`);
                return;
            }

            const isCurrentlyShown = parentCell.classList.contains('show-stats');

            
            allPlayerDetailCells.forEach(cell => {
                if (cell !== parentCell) { 
                    cell.classList.remove('show-stats');
                    
                    const otherOverlay = cell.querySelector('.stats-overlay');
                    if (otherOverlay) otherOverlay.innerHTML = '';
                }
            });
            allPlayerInfoRows.forEach(row => {
                 if (row !== parentRow) { 
                    row.classList.remove('stats-showing');
                 }
            });
            

            
            if (!isCurrentlyShown) {
                
                const playerData = rosterData.find(player => player.statsTargetId === playerId);

                if (playerData) {
                  
                    targetOverlay.innerHTML = `
                        <p>Games: ${playerData.stats.games ?? 'N/A'}</p>
                        <p>PPG: ${playerData.stats.ppg ?? 'N/A'}</p>
                        <p>RPG: ${playerData.stats.rpg ?? 'N/A'}</p>
                        <p>APG: ${playerData.stats.apg ?? 'N/A'}</p>
                    `;
                    
                    parentCell.classList.add('show-stats');
                    parentRow.classList.add('stats-showing');
                } else {
                    console.error(`Error: Could not find player data for ID: ${playerId}`);
                    targetOverlay.innerHTML = '<p style="color: #ffdddd;">Stats data unavailable.</p>';
                    
                    parentCell.classList.add('show-stats'); 
                    parentRow.classList.remove('stats-showing'); 
                }
            } else {
                
                parentCell.classList.remove('show-stats');
                parentRow.classList.remove('stats-showing');
                
                 setTimeout(() => {
                    
                     if (!parentCell.classList.contains('show-stats')) {
                        targetOverlay.innerHTML = '';
                     }
                 }, 350); 
            }
            
        });
    });

    
     document.addEventListener('click', function(event) {
        
        if (!event.target.closest('.stats-button') && !event.target.closest('.stats-overlay.show')) {
            allPlayerDetailCells.forEach(cell => cell.classList.remove('show-stats'));
            allPlayerInfoRows.forEach(row => row.classList.remove('stats-showing'));
            
         }
     });

});