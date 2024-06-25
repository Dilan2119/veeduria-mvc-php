
describe('veeduria digital', () => {
    it('frontpage can be opened', () =>{
        cy.visit('http://localhost:3000')
        cy.contains('Construyendo juntos el desarrollo de El Zulia, un proyecto a la vez.')
    })

    it('header can be opened', () =>{
        cy.visit('http://localhost:3000')
        cy.contains('Nosotros').click()
    })
    it('header can be opened', () =>{
        cy.visit('http://localhost:3000')
        cy.contains('Proyectos').click()
    })
    it('header can be opened', () =>{
        cy.visit('http://localhost:3000')
        cy.contains('Historial Participativo').click()
    })
    it('header can be opened', () =>{
        cy.visit('http://localhost:3000')
        cy.contains('Informar').click()
    })
    
})
