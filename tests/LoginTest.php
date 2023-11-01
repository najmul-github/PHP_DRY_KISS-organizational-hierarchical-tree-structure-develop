<?php

use PHPUnit\Framework\TestCase;
use Organogram\Login;

class LoginTest extends TestCase{

    public function testSuccessfulLogin() {
        // Simulate a successful login
        $login = new Login();
        $user = $login->authenticateEmployee('ceo@company2.com', '123456', 2); // valid credentials

        // Assert that a user object is returned
        $this->assertInstanceOf(User::class, $user);

        // assertions to verify user data or session setup
        $this->assertSame('Valid User', $user->getName());
        $this->assertTrue($user->isLoggedIn());
    }

    public function testFailedLogin() {
        // Simulate a failed login attempt
        $login = new Login();
        $user = $login->authenticateEmployee('ceo@company2.com', '12345', 1); // invalid credentials

        // Assert that no user object is returned
        $this->assertNull($user);

        // assertions for error messages or login state
        $this->assertFalse($login->isAuthenticated());
    }
	
}