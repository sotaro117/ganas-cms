describe("The Home Page", () => {
    it("successfully loads", () => {
        cy.visit("/");
    });

    it("shows all the posts", () => {
        cy.server();
        cy.route("/posts", "fixture:posts");
        cy.visit("/posts").get("title").should("contain", "First Post");
    });
});
