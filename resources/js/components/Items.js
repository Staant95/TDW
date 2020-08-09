import React from 'react';
import ReactDOM from 'react-dom';

export default function Items() {
    const items = [
        {id: 1, name: 'Pantaloni'},
        {id: 2, name: 'Felpa'},
        {id: 3, name: 'Jeans'}
    ]
    const itemHandler = id => {
        fetch('http://127.0.0.1:8000/api/cart', {
            method: 'GET'
        })
        .then( data => data.json())
        .then(items => {
            if(items.user === null) window.location = 'http://127.0.0.1:8000/home';
        });
    }

    return (
        <div className="container mt-5">
            <ul>
                { items.map(el => <li key={el.id}> {el.name} <button className="btn btn-primary" onClick={() => itemHandler(el.id)}>Add</button></li>) }
            </ul>
        </div>
    )
}

if(document.querySelector('#items')) {
    ReactDOM.render(<Items/>, document.querySelector('#items'));
}
