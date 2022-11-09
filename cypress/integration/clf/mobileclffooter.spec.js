describe('CLF Mobile Footer Test Suite', () => {

    beforeEach((() => {
        cy.visit('/');
        cy.viewport('iphone-xr')
    }))

    it('contains ubc footer', () =>{
        cy.get('[id="ubc7-footer"]').should('exist');
    })

    it('contains ubc unit footer', () =>{
        cy.get('[id="ubc7-unit-footer"]').should('exist');
    })

    it('contains unit footer top border', () =>{
        cy.get('[id="ubc7-unit-footer"]').should('have.css', 'border-top');
    })

    it('contains ubc footer address element exist', () =>{
        cy.get('[id="ubc7-unit-address"]').should('exist');
    })

    it('contains ubc footer addresses info', () =>{
        cy.get('[id="ubc7-unit-address"] > .ubc7-address-unit-name').should('exist');
        cy.get('[id="ubc7-unit-address"] > .ubc7-address-street').should('exist');
    })

    it('contains ubc footer location info', () =>{
        cy.get('[id="ubc7-unit-address"] > .ubc7-address-location').should('exist');
        cy.get('[id="ubc7-unit-address"] > .ubc7-address-location > .ubc7-address-city').should('not.be.empty');
        cy.get('[id="ubc7-unit-address"] > .ubc7-address-location > .ubc7-address-province').should('not.be.empty');
        cy.get('[id="ubc7-unit-address"] > .ubc7-address-location > .ubc7-address-country').should('not.be.empty');
        cy.get('[id="ubc7-unit-address"] > .ubc7-address-location > .ubc7-address-postal').should('not.be.empty');

    })

    it('contains ubc footer address element exist', () =>{
        cy.get('[id="ubc7-unit-address"]').should('exist');
    })

    it('contains ubc back to the top', () =>{
        cy.get('[id="ubc7-unit-footer"] > .ubc7-back-to-top').should('exist');
    })

    it('ubc back to the top interactivity test', () =>{
        cy.get('[id="ubc7-unit-footer"] > .ubc7-back-to-top > .container > .span2').click();
        cy.url().should('include', '/#') 

    })

    it('contains ubc global footer', () =>{
        cy.get('[id="ubc7-global-footer"]').should('exist');
    })

    it('test ubc global footer color and height', () =>{
        cy.get('[id="ubc7-global-footer"]').should('have.css', 'background-color', 'rgb(0, 33, 69)');
        cy.get('[id="ubc7-global-footer"]').invoke('height').should('be.gt', 100);
    })

    // it('test ubc global footer logo', () =>{
    //     cy.get('[id="ubc7-signature"]').click();
    //     cy.url().should('eq', 'https://www.ubc.ca/') 
    // })

    it('contains ubc minimial footer', () =>{
        cy.get('[id="ubc7-minimal-footer"]').should('exist');
    })

    it('test ubc minimal footer css and height', () =>{
        cy.get('[id="ubc7-minimal-footer"]').should('have.css', 'background', 'rgb(0, 33, 69)');
        cy.get('[id="ubc7-minimal-footer"]').should('have.css', 'padding-top', '20px');
        cy.get('[id="ubc7-minimal-footer"]').should('have.css', 'border-top', '1px');
    })
  
})