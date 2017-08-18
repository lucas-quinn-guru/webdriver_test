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

### Notes

When I was first working with Facebook\WebDriver and ChromeDriver, I always got the following error.

    PHP Fatal error:  Uncaught Facebook\WebDriver\Exception\TimeOutException: Timed out waiting for http://localhost:9515/status to become available after 20000 ms. in /Users/user/projects/webdriver_test/vendor/facebook/webdriver/lib/Net/URLChecker.php:37
    
To solve this, go into your project directory and find and edit the vendor/facebook/webdirver/lib/Net/URLChecker.php. Change the following line from

    const CONNECT_TIMEOUT_MS = 500;

To 

    const CONNECT_TIMEOUT_MS = 5000;

For some reason, 500ms isn't long enough for my computer to think things through.