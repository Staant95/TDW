import React from 'react';
import ReactDOM from 'react-dom';

export class Cart extends React.Component {
    content;

    constructor() {
        super();
        this.state = {
            items: [
                { id: 1, name: 't-shirt'},
                { id: 2, name: 'hat'}
            ]
        }
    }

    deleteItem = id => {
        let updated = this.state.items.filter(el => el.id !== id);
        console.log(updated)
        this.setState({
            items: updated
        });
    }

    render() {
        this.content = this.state.items.map(product => <li key={product.id}>{product.name} <button className="btn btn-primary" onClick={() => this.deleteItem(product.id)}>x</button></li>);

        if(!this.state.items.length) {
           return <p>Empty cart</p>
        }

        return (
            <div>
                <p>Your cart</p>
                <ul>
                    {this.content}
                </ul>
            </div>
        )
    }
}



if(document.querySelector('#cart')) {
    ReactDOM.render(<Cart/>, document.querySelector('#cart'));
}
