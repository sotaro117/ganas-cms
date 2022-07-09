describe("Login", () => {
    beforeEach(() => {
        cy.visit("/");
        cy.contains("a", "Log In").click();
    });
    describe("with invalid creadentials", () => {
        it("requires a valid email address", () => {
            cy.get("#email").type("foobar");
            cy.get("#password").focus();
        });
    });
    it("requires a valid email address", () => {
        cy.get("#email").type("foobar@gmail.com");
        cy.get("#password").focus();
        cy.contains("We can't find a user with that email address.");
    });
    it("requires valid credentials", () => {
        cy.get("#email").type("john@example.com");
        cy.get("#password").type("invalidPassword");
        cy.contains("The provided email does not exist");
    });
    describe("with valid credentials", () => {
        it("works", () => {
            cy.get("#email").type("john@example.com");
            cy.get("#password").type("password");
            cy.contains("button", "Login").click();

            cy.visit("/users/1/edit");
        });
    });
});
