describe('Prueba la autenticación', () => {
    it('Prueba la autenticación incorrecta /login', () => {
        cy.visit("http://localhost:3000/login");
    cy.get("h1").should("contain", "Iniciar Sesion");
    cy.get("form.formulario").should("exist");
    cy.get("#email").type("correo@correo.com");
    cy.get("#password").type("1234567");
    cy.get("form.formulario").submit();
      cy.url().should("include", "http://localhost:3000/admin");
        cy.visit('http://localhost:3000/proyectos/gestionProyectos');   
cy.get('h1').should('contain', 'Administrador de Proyectos');
cy.get('a.boton-amarillo').should('exist');
cy.get('a.boton-verde').eq(0).should('have.attr', 'href', '/proyectos/crear');
cy.get('h2').eq(0).should('contain', 'PROYECTOS EN FORMULACIÓN');
cy.get('table.propiedades').eq(0).should('exist');
cy.get('h2').eq(1).should('contain', 'PROYECTOS EN EJECUCIÓN');
cy.get('a.boton-verde').eq(1).should('have.attr', 'href', '/proyectos_ejecucion/crear');
        cy.get('table.propiedades').eq(1).should('exist');

        cy.get('table.propiedades').eq(0).find('tbody tr').should('have.length.greaterThan', 0); // Verifica que haya al menos una fila

cy.get('table.propiedades').eq(0).find('tbody tr').each(($tr, index) => {
  cy.wrap($tr).find('td').eq(0).should('exist'); // Verificar la existencia de la columna "Id"
  cy.wrap($tr).find('td').eq(1).should('exist'); // Verificar la existencia de la columna "Titulo"
  cy.wrap($tr).find('td').eq(2).find('img').should('exist'); // Verificar la existencia de la columna "Imagen"
  cy.wrap($tr).find('td').eq(3).should('exist'); // Verificar la existencia de la columna "Inversion"

  // Verificar los botones de acción
  cy.wrap($tr).find('td').eq(4).find('form').should('exist');
  cy.wrap($tr).find('td').eq(4).find('form input[type="submit"]').should('have.value', 'Eliminar');
  cy.wrap($tr).find('td').eq(4).find('a').should('exist');
    cy.wrap($tr).find('td').eq(4).find('a').should('have.attr', 'href').and('include', '/proyectos/actualizar');
    
    cy.get('table.propiedades').eq(1).find('tbody tr').should('have.length.greaterThan', 0); // Verifica que haya al menos una fila

cy.get('table.propiedades').eq(1).find('tbody tr').each(($tr, index) => {
  cy.wrap($tr).find('td').eq(0).should('exist'); // Verificar la existencia de la columna "Id"
  cy.wrap($tr).find('td').eq(1).should('exist'); // Verificar la existencia de la columna "Titulo"
  cy.wrap($tr).find('td').eq(2).find('img').should('exist'); // Verificar la existencia de la columna "Imagen"
  cy.wrap($tr).find('td').eq(3).should('exist'); // Verificar la existencia de la columna "Inversion"

  // Verificar los botones de acción
  cy.wrap($tr).find('td').eq(4).find('form').should('exist');
  cy.wrap($tr).find('td').eq(4).find('form input[type="submit"]').should('have.value', 'Eliminar');
  cy.wrap($tr).find('td').eq(4).find('a').should('exist');
  cy.wrap($tr).find('td').eq(4).find('a').should('have.attr', 'href').and('include', '/proyectos_ejecucion/actualizar');
});
});
    });
}) 