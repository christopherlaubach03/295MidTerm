Include (in your README file) a summary of how you implemented requirements like  error handling, web security, and/or integration of web 
service(s) in your project, and in which files (and file sections) the relevant code can be found. 
You can also include comments about factors that influenced any major programming decisions you made (e.g. selecting between two approaches).
Include comments as appropriate to describe the purpose or function of sections of the code in each file, to make it easier to follow the code.

Error handling can be found in catalog.php in the search section. If your search date is not a valid date, it echo's '<div class="error-message">.

The calendar is build with a PHP class in catalog.php and calendar.php.

Bootstrap can be found on index.html (our home page). The carousel is entirely bootstrap implemented code tailored with Detroit Pistons photos. 

Graham Eisenmann:

Error handeling was implemented on my side by having the script check the connection 
the the MySQL database. If that connection fails then it stops execution and an error 
message is displayed. Another error handeling thing incorporated was after querying the
players the code checks if the query was successful. If any rows were returned with no players
found then an error message is displayed instead of trying to loop through the empty database

I also added the google maps embed API. This was very easy to implement. This was acheived by
using the standard iframe embed code provided by google maps. This allows the user to interact with 
th emap directly on the history page. I also added a link that takes the person to google maps
in the event they want the bigger map and other features that maps has.

Instead of using a static HTML for the roster I chose a dynamic roster. 
I refractored this using PHP and MySQL for the database. This allows for 
much easier updates and managment of player data withought editing the HTML specifically

I also changed the stats display. Instead of having the cluncky box appearing below the row
i made the player name disappear and fade into the stats while increasing the size of the plyers picture.
This was implemented using CSS transitions, and JavaScript to toggle CSS classes based on user interaction. 

