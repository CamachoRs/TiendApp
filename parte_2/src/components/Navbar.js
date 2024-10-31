import React from 'react';

const Navbar = ({ setView }) => {
    return (
        <nav className="bg-gray-800 p-4">
            <div className="container mx-auto flex justify-between items-center">
                <h1 className="text-white text-2xl">Ecommerce</h1>
                <ul className="flex space-x-4">
                    <li>
                        <button
                            onClick={() => setView('productos')}
                            className="text-gray-300 hover:text-white"
                        >
                            Productos
                        </button>
                    </li>
                    <li>
                        <button
                            onClick={() => setView('marcas')}
                            className="text-gray-300 hover:text-white"
                        >
                            Marcas
                        </button>
                    </li>
                </ul>
            </div>
        </nav>
    );
};

export default Navbar;