<?php
/**
 * This example shows how one can use PHP Unit to control WebDriver tests
 * written using Facebook's PHP WebDriver implementation.
 *
 * The ChromeDriver must be running locally on port 9515 for that test to run
 */
require_once('vendor/facebook/webdriver/lib/__init__.php');

class ExampleTest extends PHPUnit_Framework_TestCase
{
  protected $webDriver;
  protected $something;

  public function setUp()
  {
    $capabilities = array(\WebDriverCapabilityType::BROWSER_NAME => 'chrome');
    $this->webDriver = RemoteWebDriver::create('http://localhost:9515', $capabilities);

    //this code does nothing
    $this->something = "nothing";

  }

  public function tearDown()
  {
    $this->webDriver->quit();
  }

  public function testGitHubHome()
  {
    $this->webDriver->get('https://github.com');
    $this->assertContains('GitHub', $this->webDriver->getTitle());
  }

  public function retSomething()
  {
      return $this->something;

  }
}
?>