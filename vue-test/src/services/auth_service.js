import axios from "axios";

const authService = {
    async login(formData) {
        try {
            const {status, data} = await axios.post('http://rest/api/user/login', formData);
            if(status === 200) {
                return {success: true}
            }
        } catch (e) {
            this.errors = e.response.data.errors;
            return {
                success: false,
                errors: e.response.data.errors,
            }
        }
    }
}

export default authService;