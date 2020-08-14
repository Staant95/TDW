import React, {useEffect, useRef, useState} from 'react';
import ReactDOM from 'react-dom';

function Cart() {
    const [items, setItems] = useState([]);
    const [input, setInput] = useState('');
    const inputEl = useRef(null);


    function handleInputChanged(val) {
        setInput(val);
    }

    function handleItemAdded() {
        setItems([
            ...items,
            {
                myobj: 'hehe'
            }
        ]);

        setInput('');
        inputEl.current.value = '';
    }

    function handleAjax() {
        fetch('http://127.0.0.1:8000/api/cart', {
            method: 'POST',
            body: JSON.stringify({name : 'Qualcos'}),
            headers: {
                'Content-Type': 'application/json'

            }
        })
            .then(data => data.json())
            .then(data => console.log(data));
    }
    function handleIndex() {
        fetch('http://127.0.0.1:8000/api/cart', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'

            }
        })
            .then(data => data.json())
            .then(data => console.log(data));
    }

    // componentDidMount
    // useEffect( () => {
    //    async function fetchData() {
    //        const resp = await fetch('http://127.0.0.1:8000/api/random');
    //        return await resp.json();
    //    }
    //    fetchData().then(data => console.log(data));
    //    // setItems(result.str);
    // }, []);

    return (
        <div>
            {/*<ul>*/}
            {/*    {items.map(el => <li key={el.id}> {el.name}</li>)}*/}
            {/*</ul>*/}
            {/*<input ref={inputEl} onChange={event => handleInputChanged(event.target.value)} />*/}
            {/*<br/>*/}
            {/*<p>{input}</p>*/}
            {/*<button onClick={handleItemAdded}>Add item</button>*/}
            <div> -------------------- </div>
            <button onClick={handleAjax}>send ajax</button>
            <button onClick={handleIndex}>get items</button>
        </div>
    )

}

export default Cart;

if(document.querySelector('#cart')) {
    ReactDOM.render(<Cart/>, document.querySelector('#cart'));
}
