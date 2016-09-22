# Project 2 for DWA15
## Trump Password Generator

## Live URL
<http://p2.jeannette.nyc/>

## Description
xkcd style password generator parsing Trump related words and taking user input for options

## Screencast Demo
<link to be here/>

## Details for Teaching Team
On load of the page we check if file 'words.csv' exists. If not, we launch the below parsing algorithm for a pre-defined hard-coded URL:
- First, we load all the contents from the url into a string
- Next, we remove all html tags, transform the string into array and thoroughly clean the array items (leaving only alphabetic values, bringing to lower case, removing the page's tech garbage, too short / too long words, duplicates, etc)
- When our words array is nice and clean we write it to the file 'words.csv'

Now, when we have our vocabulary set up, we read the contents of our file into array and shuffle it. Next we check user input for password options, creating error message if needed. Finally, we concatenate our password string according to the options, adding a symbol and number if required.

## Outside code & sources
- Bootstrap CSS: <http://netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css/>
- The words for password generator are parsed from the below webpage: <https://en.wikipedia.org/wiki/Donald_Trump/>
- The background image is borrowed from the following video: <https://www.youtube.com/watch?v=P1CqvyewyC4/>

## Project submission date
September 22, 2016


