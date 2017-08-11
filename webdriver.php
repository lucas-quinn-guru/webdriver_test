<?php

/*
 * Note: I had to make a change to /vendor/facebook/lib/Net/URLChecker.php.
 * It was timing out to fast.
 *
 * I changed the following line from
 *
 * const CONNECT_TIMEOUT_MS = 500;
 *
 * to this
 *
 * const CONNECT_TIMEOUT_MS = 5000;
 */

require( dirname( __FILE__ ) . "/vendor/autoload.php" );

use \Facebook\WebDriver\Remote\DesiredCapabilities;
use \Facebook\WebDriver\Chrome\ChromeOptions;
use \Facebook\WebDriver\Chrome\ChromeDriver;
use \Facebook\WebDriver\WebDriverDimension;
use \Facebook\WebDriver\WebDriverExpectedCondition;
use \Facebook\WebDriver\WebDriverBy;


putenv('webdriver.chrome.driver=/opt/local/sbin/chromedriver');

/*
 * Uncomment the following four lines to turn this process into a headless
 * browser.  Meaning, no browser window will be opened when executing.  This
 * is best for server side scheduled tasks.
 */
$options = new ChromeOptions();
//$options->addArguments([ "--headless", "--disable-gpu" ]);

$capabilities = DesiredCapabilities::chrome();
$capabilities->setCapability(ChromeOptions::CAPABILITY, $options );

$driver = ChromeDriver::start( $capabilities );

/*
 * Set the screen size
 */
$browser_window_dimension = new WebDriverDimension( 1400, 700 );
$driver->manage()->window()->setSize( $browser_window_dimension );

/*
 * Make actual web request
 */
$driver->get( 'https://www.amazon.com' );

/*
 * Wait for page to load.
 *
 * The following is waiting for no longer than 10 seconds for the
 * search text box to appear.
 */
$driver->wait( 10 )->until(
	WebDriverExpectedCondition::presenceOfElementLocated( WebDriverBy::id( "twotabsearchtextbox" ) )
);

/*
 * Let's create a input field element object to that we can
 * manipulate it.
 */
$search_input_field = $driver->findElement( WebDriverBy::id( "twotabsearchtextbox" ) );

/*
 * Emulate an individual typing into the search field
 */
$search_input_field->sendKeys( "PJ Masks Costume" );

/*
 * Let's create an search form element object so that we can submit it
 */
$search_form = $driver->findElement( WebDriverby::name( "site-search" ) );

/*
 * Submit the search form
 */
$search_form->submit();

/*
 * Adding a sleep process, so we can visually see response before browser
 * window is closed. This is not needed.
 */
sleep( 5 );

/*
 * End Session and close emulated browser window
 */
$driver->close();
