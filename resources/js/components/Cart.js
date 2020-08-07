import React from 'react';
import ReactDOM from 'react-dom';

export class Cart extends React.Component {

    constructor() {
        super();
        this.state = {
            items: [
                { id: 1, name: 't-shirt'}
            ]
        }
    }

    content;

    render() {
        if(this.state.items.length) {
            this.content = <p>You cart is empty</p>
        }
        return (
            <div>
                <p>Your cart</p>
               <ul>

               </ul>
            </div>
        )
    }
}



if(document.querySelector('#cart')) {
    ReactDOM.render(<Cart/>, document.querySelector('#cart'));
}
