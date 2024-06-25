describe('Prueba la autenticación', () => {
    it('Prueba la autenticación incorrecta /login', () => {
        cy.visit("http://localhost:3000/login");
    cy.get("h1").should("contain", "Iniciar Sesion");
    cy.get("form.formulario").should("exist");
    cy.get("#email").type("correo@correo.com");
    cy.get("#password").type("1234567");
    cy.get("form.formulario").submit();
      cy.url().should("include", "http://localhost:3000/admin");
        cy.visit('http://localhost:3000/historial/participacionCiudadana');   
// Verificar la existencia de los elementos principales
cy.get('h1').should('contain', 'Administrador de Proyectos');
cy.get('a.boton-amarillo').should('have.attr', 'href', '/admin');
cy.get('a.boton-verde').should('have.attr', 'href', '/historial/crear');
cy.get('h2').should('contain', 'Historial De Participacion Ciudadana');
cy.get('table.propiedades').should('exist');

// Verificar la tabla de historial
cy.get('table.propiedades tbody tr').should('have.length.greaterThan', 0); // Verifica que haya al menos una fila

cy.get('table.propiedades tbody tr').each(($tr, index) => {
  cy.wrap($tr).find('td').eq(0).should('exist'); // Verificar la existencia de la columna "Id"
  cy.wrap($tr).find('td').eq(1).should('exist'); // Verificar la existencia de la columna "Título"
  cy.wrap($tr).find('td').eq(2).find('img').should('exist'); // Verificar la existencia de la columna "Imagen"
  cy.wrap($tr).find('td').eq(3).should('exist'); // Verificar la existencia de la columna "Fecha"

  // Verificar los botones de acción
  cy.wrap($tr).find('td').eq(4).find('form').should('exist');
  cy.wrap($tr).find('td').eq(4).find('form input[type="submit"]').should('have.value', 'Eliminar');
  cy.wrap($tr).find('td').eq(4).find('a').should('exist');
  cy.wrap($tr).find('td').eq(4).find('a').should('have.attr', 'href').and('include', '/historial/actualizar');
});
});
});
    
