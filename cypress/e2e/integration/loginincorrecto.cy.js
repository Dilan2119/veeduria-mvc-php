describe('Prueba la autenticación', () => {
	it('Prueba la autenticación incorrecta /login', () => {
        cy.visit('http://localhost:3000/login');   

       
        // Enviar formulario vacío
cy.get('form.formulario').submit();

// Verificar mensajes de error
cy.get('.alerta.error').should('have.length', 2);
cy.get('.alerta.error').eq(0).should('contain', 'El email es obligatorio');
cy.get('.alerta.error').eq(1).should('contain', 'El password es obligatorio');

// Enviar correo electrónico inválido
cy.get('#email').type('correo-invalido');
cy.get('#password').type('1234567');
cy.get('form.formulario').submit();

// Verificar mensaje de error de correo electrónico inválido
cy.get('.alerta.error').should('contain', 'El usuario no existe');

// Enviar contraseña incorrecta
cy.get('#email').type('correo@correo.com');
cy.get('#password').type('contraseña-incorrecta');
cy.get('form.formulario').submit();

// Verificar mensaje de error de contraseña incorrecta
cy.get('.alerta.error').should('contain', 'El Password es Incorrecto');
    });
}) 








