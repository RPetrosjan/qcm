Feature: 'My First Test'
  Scenario: See Home Page
    Given I am on "http://qcm.local/fr/"
    Then I should see "Symfony"
    Then I click button with content 'Get Started'
    And I save a screenshot in '/DKO.JPG'
    #Then I click button "Get Started"
