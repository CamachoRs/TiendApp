'use client';

import React, { useEffect, useState } from 'react';
import Navbar from '../components/Navbar';
import Productos from '../components/Productos';
import { getProductos } from '../services/api';
import { getMarcas } from '../services/api';
import Marcas from '@/components/Marcas';

export default function Home() {
  const [products, setProducts] = useState([]);
  const [marcas, setMarcas] = useState([]);
  const [error, setError] = useState(null);
  const [view, setView] = useState('productos');

  useEffect(() => {
    const fetchProducts = async () => {
      try {
        const data = await getProductos();
        setProducts(data);
      } catch (err) {
        console.error("No se pudieron obtener los productos:", err);
        setError("No se pudieron cargar los productos.");
      }
    };

    const fetchMarcas = async () => {
      try {
        const data = await getMarcas();
        setMarcas(data);
      } catch (err) {
        console.error("No se pudieron obtener las marcas:", err);
        setError("No se pudieron cargar las marcas.");
      }
    };

    fetchProducts();
    fetchMarcas();
  }, []);

  return (
    <div>
      <Navbar setView={setView} />
      <div className="container mx-auto mt-4">
        {error && <p className="text-red-500">{error}</p>}
        {view === 'productos' && (
          <>
            <h1 className="text-3xl font-bold text-center">Productos</h1>
            {products.length === 0 ? (
              <p className="text-gray-500">No hay productos disponibles.</p>
            ) : (
              <div className="flex flex-wrap justify-center">
                {products.map((producto) => (
                  <Productos key={producto.id} producto={producto} />
                ))}
              </div>
            )}
          </>
        )}
        {view === 'marcas' && (
          <>
            <h1 className="text-3xl font-bold text-center">Marcas</h1>
            {marcas.length === 0 ? (
              <p className="text-gray-500">No hay marcas disponibles.</p>
            ) : (
              <div className="flex flex-wrap justify-center">
                {marcas.map((marca) => (
                  <Marcas key={marca.id} marca={marca} />
                ))}
              </div>
            )}
          </>
        )}
      </div>
    </div>
  );
}