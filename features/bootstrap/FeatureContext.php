<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\TranslatableContext;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\MinkExtension\Context\MinkContext;
use Behat\MinkExtension\Context\RawMinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends RawMinkContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Then I click button with content :arg2
     */
    public function iClickWithContent($arg2)
    {
        $page = $this->getSession()->getPage();
     //   $element = $page->findButton($arg2);
        $element = $page->find('named', array('button', $arg2));
        if (empty($element)) {
            throw new Exception("No html element found for the selector ('$arg2')");
        }
        $element->click();
    }


    /**
     * @Then I click :arg1 with content :arg2

    public function iClickWithContent($arg1, $arg2)
    {
        $page = $this->getSession()->getPage();
        $element = $page->find($arg1, $arg2);
        if (empty($element)) {
            throw new Exception("No html element found for the selector ('$arg1')");
        }

        $element->click();
    }

    /**
     * @Then /^I click on "([^"]*)"$/

    public function iClickTheElement($selector)
    {
        $page = $this->getSession()->getPage();
        $element = $page->find('css', $selector);

        if (empty($element)) {
            throw new Exception("No html element found for the selector ('$selector')");
        }

        $element->click();
    }
    */
}
