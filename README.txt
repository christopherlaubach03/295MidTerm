Include (in your README file) a summary of how you implemented requirements like  error handling, web security, and/or integration of web 
service(s) in your project, and in which files (and file sections) the relevant code can be found. 
You can also include comments about factors that influenced any major programming decisions you made (e.g. selecting between two approaches).
Include comments as appropriate to describe the purpose or function of sections of the code in each file, to make it easier to follow the code.

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


Christopher Laubach:

A form for user input was added to the top of catalog.php to allow users to search for Detroit Pistons game information by date. 
This form uses an HTML <input type="date"> field, making it easy for users to select or enter a date, and includes a submit button to 
search. When the form is submitted, the selected date is sent to the server via a GET request, where the PHP script checks if a game is 
scheduled for that date and displays the relevant details or an error message if no game is found. This feature enhances 
usability by letting users quickly find specific game information without scrolling through the entire calendar.

Error handling is implemented in the catalog.php class by providing feedback when a user searches for game information by date. 
When a date is submitted through the form, the PHP code checks if there is a scheduled game on that date within the calendar events. 
If a game exists, it displays the relevant game details. However, if no game is scheduled for the entered date, the script echo's 
'<div class="error-message"> with the  error-message, informing the user that there is no game on that date. The input date is "sanitized" 
using htmlspecialchars() to prevent any security issues. Additionally, the date input field is marked as required in the HTML form, 
ensuring that the user cannot submit the form without entering a valid date. 

The calendar feature on the site is built using a custom PHP class, which is defined in calendar.php and used in catalog.php. 
This class handles the creation, population, and rendering of the calendar, including adding and displaying events for specific dates.
The implementation allows for navigation between months and highlights scheduled games. The overall structure and logic for the calendar 
was developed by following a W3Schools tutorial.


