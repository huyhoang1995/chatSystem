const chatService = {
    data: {
        insertChat: function (content, type, images) {
            const params = new FormData();
            params.append("content", content || "");
            params.append("type", type || "");
            params.append("images", images || "");
            return params;
        },
        login:function (account, password) {
            return{
                account: account || "",
                password: password || "",
            }
        }
    },

    action: {
        listChat: function () {
            let url = siteUrl + '/api/v1/listChat';
            return axios.get(url);
        },
        insertChat: function (data) {
            let url = siteUrl + '/api/v1/insertChat';
            return axios.post(url, data);
        },
        login: function (data) {
            let url = siteUrl + '/login';
            return axios.post(url, data);
        }

    }
}

export default chatService;