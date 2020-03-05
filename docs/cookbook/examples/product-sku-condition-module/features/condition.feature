Feature: Example Product sku condition module

  Scenario: Get conditions dictionary and test our  existence our new condition
    Given I am Authenticated as "test@ergonode.com"
    When I send a GET request to "/api/v1/EN/dictionary/conditions"
    Then the response status code should be 200
    And the JSON nodes should contain:
      | YOUR_NAME_SPACE_PRODUCT_SKU_CONDITION | YOUR_NAME_SPACE_PRODUCT_SKU_CONDITION |
