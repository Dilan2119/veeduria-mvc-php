describe("Prueba la autenticación", () => {
  it("Prueba la autenticación correcta en /login", () => {
    cy.visit("http://localhost:3000/login");
    cy.get("h1").should("contain", "Iniciar Sesion");
    cy.get("form.formulario").should("exist");
    cy.get("#email").type("correo@correo.com");
    cy.get("#password").type("1234567");
    cy.get("form.formulario").submit();
      cy.url().should("include", "http://localhost:3000/admin");
      

      cy.get('.sidebar ul li').should('have.length', 4); // Verifica que haya 4 elementos de lista

      // Verificar los iconos y textos de los botones
      cy.get('.sidebar ul li').eq(0).find('i').should('have.class', 'bx bxs-grid-alt');
      cy.get('.sidebar ul li').eq(0).find('span.nav-item').should('contain', 'Gestion de Proyectos');
      cy.get('.sidebar ul li').eq(1).find('i').should('have.class', 'bx bx-body');
      cy.get('.sidebar ul li').eq(1).find('span.nav-item').should('contain', 'Administrar Contacto');
      cy.get('.sidebar ul li').eq(2).find('i').should('have.class', 'bx bxs-food-menu');
      cy.get('.sidebar ul li').eq(2).find('span.nav-item').should('contain', 'Participacion Ciudadana');
      cy.get('.sidebar ul li').eq(3).find('i').should('have.class', 'bx bx-log-out');
      cy.get('.sidebar ul li').eq(3).find('span.nav-item').should('contain', 'Logout');

      // Probar el botón "Gestion de Proyectos"
cy.get('.sidebar ul li').eq(0).find('a').click();
cy.url().should('include', '/proyectos/gestionProyectos');
cy.go('back'); // Regresar a la página anterior

// Probar el botón "Administrar Contacto"
cy.get('.sidebar ul li').eq(1).find('a').click();
cy.url().should('include', '/contactos/administrarContacto');
cy.go('back');

// Probar el botón "Participacion Ciudadana"
cy.get('.sidebar ul li').eq(2).find('a').click();
cy.url().should('include', '/historial/participacionCiudadana');
cy.go('back');


  });
    
});
