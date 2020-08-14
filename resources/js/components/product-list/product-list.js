import React, {useEffect, useState} from 'react';
import ReactDOM from 'react-dom';

function ProductList() {
    const [items, setItems] = useState([]);
    const productsURL = 'http://127.0.0.1:8000/api/products'

    // componentDidMount && componentDidUpdate
    useEffect(() => {
        async function fetchProducts() {
            const data = await fetch(productsURL);
            return await data.json();
        }
        fetchProducts().then(data => setItems([
            ...items,
            data
        ]))

    }, [])

    function handleItemAdded() {
        setItems([
            ...items,
            {
                id: 2,
                name: 'Qualcosa'
            }
        ])
    }

    return (
       <div>
           <ul>
               {items.map(el => <li key={el.id}> {el.name} </li>)}
           </ul>
           <button onClick={handleItemAdded}>add Items</button>
       </div>
    )
}

export default ProductList;

if(document.querySelector('#product-list')) {
    ReactDOM.render(<ProductList/>, document.querySelector('#product-list'))
}
