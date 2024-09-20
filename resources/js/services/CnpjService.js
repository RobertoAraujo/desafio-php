const CnpjService = {
    async consultarCnpj(cnpj) {
        try {

            const response = await axios.get(`https://brasilapi.com.br/api/cnpj/v1/${cnpj}`);

            return response.data;
            

        } catch (error) {
            return error;
        }
    }
}

export default CnpjService;

