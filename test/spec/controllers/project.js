'use strict';

describe('Controller: ProjectCtrl', function() {

  // load the controller's module
  beforeEach(module('1393WebsiteApp'));

  var ProjectCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function($controller) {
    scope = {};
    ProjectCtrl = $controller('ProjectCtrl', {
      $scope: scope
    });
  }));

  it('should attach a list of awesomeThings to the scope', function() {
    expect(scope.awesomeThings.length).toBe(3);
  });
});
