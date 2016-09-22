# Project 2 for DWA15
## Trump Password Generator

## Live URL
<http://p2.jeannette.nyc/>

## Description
xkcd style password generator creating vocabulary from a pre-determined hard-coded URL and taking user input for options

## Screencast Demo
<http://screencast-o-matic.com/watch/cDQ3rhjqRy/>
PS: Truly apologize for the screencast sound quality. It was recorded in the Harvard HES Library supposedly silent student work room (I travel from NJ, so had no other silent place to go to).

## Details for Teaching Team
On load of the page we check if file 'words.csv' exists. If not, we launch the below parsing algorithm for a pre-defined hard-coded URL:
- We inform the user that we are generating a new dictionary and indicate the source url
- Then, we load all the contents from the url into a string
- Next, we remove all html tags, transform the string into array and thoroughly clean the array items (leaving only alphabetic values, bringing to lower case, removing the page's tech garbage, too short / too long words, duplicates, etc)
- When our words array is nice and clean we write it to the file 'words.csv'

Now, when we have our vocabulary set up, we read the contents of our file into array and shuffle it. Next we check user input for password options, creating error message if needed. Finally, we concatenate our password string according to the options, adding a symbol and number if required.

## Outside code & sources
- Bootstrap CSS: <http://netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css/>
- The words for password generator are parsed from the below webpage: <http://www.politico.com/story/2016/07/full-transcript-donald-trump-nomination-acceptance-speech-at-rnc-225974>
- The background image is borrowed from the following video: <https://www.youtube.com/watch?v=P1CqvyewyC4/>

## Project submission date
September 22, 2016
