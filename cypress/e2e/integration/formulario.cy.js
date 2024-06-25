describe('Prueba la autenticación', () => {
	it('Prueba formulario', () => {
        cy.visit('http://localhost:3000/informar'); 

cy.get('form.formulario').should('exist');
cy.get('input#nombre').should('exist');
cy.get('select#opciones').should('exist');
cy.get('textarea#mensaje').should('exist');
cy.get('input[type="radio"][name="informar[contacto]"]').should('have.length', 2);
cy.get('input[type="file"]').should('exist');
        cy.get('input[type="submit"]').should('exist');

        cy.get('input#nombre').type('Nombre de Prueba');
        cy.get('select#opciones').select('Ejecucion'); // Seleccionar la opción "En Ejecucion"
        cy.get('textarea#mensaje').type('Mensaje de prueba');
        cy.get('input[type="radio"][name="informar[contacto]"]').eq(0).check(); // Seleccionar la opción "Teléfono"

        cy.get('form.formulario').submit();
    });
}) 
