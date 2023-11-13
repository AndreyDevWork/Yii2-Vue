import axios from "axios";
import authService from "./auth_service.js";

let config = {
    baseURL: 'http://rest/api/'
}

const httpClient = axios.create(config);

const authInterceptor = config => {
    config.headers.Authorization = `Bearer ${authService.getToken()}`
    return config;
};


httpClient.interceptors.request.use(authInterceptor);
httpClient.interceptors.response.use(
    (response) => {
        return response;
    },
    (error) => {
        if (error.response.status === 401) {
            router.push({name: 'login'});
        }
        return Promise.reject(error);
    }
);

export default httpClient;