import axios from 'axios';

const api = axios.create({
    baseURL: 'http://127.0.0.1:8000/api',
});

export const getProductos = async () => {
    const response = await api.get('/productos');
    return response.data;
};

export const getMarcas = async () => {
    const response = await api.get('/marcas');
    return response.data;
};

export const getMarca = async (marcaId) => {
    const response = await api.get(`/marcas/${marcaId}`);
    return response.data;
};