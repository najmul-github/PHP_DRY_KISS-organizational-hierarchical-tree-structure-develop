<?php

use PHPUnit\Framework\TestCase;
use Organogram\Login;

class LoginTest extends TestCase{

    public function testSuccessfulLogin() {
        // Simulate a successful login
        $login = new Login();
        $user = $login->authenticateEmployee('ceo@company2.com', '123456', 2); // Provide valid credentials

        // Assert that a user object is returned
        $this->assertInstanceOf(User::class, $user);

        // Add more assertions to verify user data or session setup
        // For example:
        $this->assertSame('Valid User', $user->getName());
        $this->assertTrue($user->isLoggedIn());
    }

    public function testFailedLogin() {
        // Simulate a failed login attempt
        $login = new Login();
        $user = $login->authenticateEmployee('ceo@company2.com', '12345', 1); // Provide invalid credentials

        // Assert that no user object is returned
        $this->assertNull($user);

        // Add more assertions for error messages or login state
        // For example:
        $this->assertFalse($login->isAuthenticated());
    }
	
}