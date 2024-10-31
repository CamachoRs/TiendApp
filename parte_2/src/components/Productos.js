import React, { useEffect, useState } from 'react';
import { getMarca } from '../services/api';

const Productos = ({ producto }) => {
    const [marca, setMarca] = useState(null);

    useEffect(() => {
        const fetchMarca = async () => {
            if (producto.marca_id) {
                try {
                    const fetchedMarca = await getMarca(producto.marca_id);
                    setMarca(fetchedMarca);
                } catch (err) {
                    console.error("No se pudo obtener la marca:", err);
                }
            }
        };

        fetchMarca();
    }, [producto.marca_id]);

    return (
        <div className="bg-gray-800 rounded-lg shadow-lg p-4 m-2 transition-transform transform hover:scale-105">
            <h2 className="text-xl font-bold text-white">{producto.nombre}</h2>
            <p className="text-gray-300">Unidad de medida: {producto.unidad_medida}</p>
            <p className="text-gray-300">Cantidad: {producto.cantidad_inventario}</p>
            <p className="text-gray-300">Fecha de embarque: {producto.fecha_embarque}</p>
            <p className="text-gray-300">Observaciones: {producto.observaciones}</p>
            {marca && (
                <p className="text-gray-300">Referencia de la marca: {marca.referencia}</p>
            )}
        </div>
    );
};

export default Productos;