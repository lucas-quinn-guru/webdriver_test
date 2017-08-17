# WebDriver Test

Once you have cloned this repository, run composer update to get the latest libraries to run the script.  After composer has updated the repository, you'll be able to run the webdriver.php script.  If configured properly, a new chrome window will appear.  It will be directed to a website and automatically search for an item.

## Dependencies

- PHP - https://www.php.net
- Composer - https://getcomposer.org/download
- Chrome Web Browser - https://www.google.com/chrome
- ChromeDriver - https://sites.google.com/a/chromium.org/chromedriver/

## Installation

Clone this repository.  From there run composer update.
    
    php composer.phar update

This will read the existing composer.json file and install all dependancies.

## Running the Example

    php webdriver.php
    
If the example worked, a chrome browser window open. It will automatically navigate to www.amazon.com and run a search.  If you see a web page with PJ Masks, the process was a success.  Eventually, the browser window that was opened, will close.

You may get an error because our test script cannot find ChromeDriver. Find the following line around line 26

    putenv('webdriver.chrome.driver=/opt/local/sbin/chromedriver');
    
Change this line to reference the path to where you downloaded your ChromeDriver.  Use the full path, not the relative path.
