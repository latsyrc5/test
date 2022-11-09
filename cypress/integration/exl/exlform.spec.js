describe('EXL form Test Suite', () => {

    beforeEach((() => {
        cy.visit('https://extendedlearning.ubc.ca/');
    }))

    it('can purchase a course', () =>{
        cy.get('.course-default').should('exist');
        cy.get('.course-default > .bigsearch > .span6').type('Advanced English Conversation for Professionals');
        cy.get('[id=views-exposed-form-content-search-page-3]').submit();
        cy.get('[id=block-system-main] > .content > .view > .view-content').contains('Advanced English Conversation for Professionals');
        cy.get('[id=block-system-main] > .content > .view > .view-content > .first > .panelgroup > .panel').click();
        cy.get('[id=block-system-main] > .content > .view > .view-content > .first > .panelgroup > .panel').contains('MORE').click();
        cy.get('[id=content] > .region-main').contains('Advanced English Conversation for Professionals').invoke('text').should('eq','Advanced English Conversation for Professionals');
        cy.get('#openall').click();
        cy.get('.text-right >.button').click();
        cy.wait(5000)
        cy.get('a').contains('Complete Registration').click();
        cy.get('.grand-total').contains('$405.00').invoke('text').should('eq','$405.00'); 
    })
})