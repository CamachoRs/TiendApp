import React from 'react';

const Marcas = ({ marca }) => {
    return (
        <div className="bg-gray-800 rounded-lg shadow-lg p-4 m-2 transition-transform transform hover:scale-105">
            <h2 className="text-xl font-bold text-white">{marca.nombre}</h2>
            <p className="text-gray-300">Referencia: {marca.referencia}</p>
        </div>
    );
};

export default Marcas;