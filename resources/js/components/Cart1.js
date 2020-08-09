import React from 'react';
import ReactDOM from 'react-dom';



export default class Cart1 extends React.Component{
    constructor() {
        super();
        this.state = {
            items: []
        }
    }

    render() {
        return (
            <div className="container">Hello World</div>
        )
    }
}


if(document.querySelector('#cart1')) {
    ReactDOM.render(<Cart1/>, document.querySelector('#cart1'));
}
