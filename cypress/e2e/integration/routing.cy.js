describe('Prueba la autenticación', () => {
	it('Prueba la autenticación incorrecta /login', () => {
        cy.visit('http://localhost:3000');   

        cy.get('.navbar').should('exist');
        cy.get('.navbar-brand').should('have.attr', 'href', '/');
       
        
        // Verificar los enlaces de navegación
        
        cy.get('.nav-link').eq(1).should('have.attr', 'href', '/nosotros').and('contain', 'Nosotros');
        cy.get('.nav-link').eq(2).should('have.attr', 'href', '/proyectos').and('contain', 'Proyectos');
        cy.get('.nav-link').eq(3).should('have.attr', 'href', '/HistorialParticipativo').and('contain', 'Historial Participativo');
        cy.get('.nav-link').eq(4).should('have.attr', 'href', '/informar').and('contain', 'Informar');

        cy.get('main').should('exist');
        // Aquí puedes agregar más aserciones según el contenido específico de tu página.
        
        cy.get('footer').should('exist');
cy.get('footer .nav-link').should('have.length', 4); // Verifica que haya 4 enlaces en el pie de página

// Verificar los enlaces del pie de página
cy.get('footer .nav-link').eq(0).should('have.attr', 'href', '/nosotros').and('contain', 'Nosotros');
cy.get('footer .nav-link').eq(1).should('have.attr', 'href', '/proyectos').and('contain', 'Proyectos');
cy.get('footer .nav-link').eq(2).should('have.attr', 'href', '/HistorialParticipativo').and('contain', 'Historial Participativo');
cy.get('footer .nav-link').eq(3).should('have.attr', 'href', '/informar').and('contain', 'Informar');

cy.get('footer p').should('contain', `Todos los derechos reservados ${new Date().getFullYear()}`);
    });
}) 
